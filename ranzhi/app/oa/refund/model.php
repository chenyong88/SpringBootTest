<?php
/**
 * The model file of refund module of RanZhi.
 *
 * @copyright   Copyright 2009-2018 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Tingting Dai <daitingting@xirangit.com>
 * @package     refund
 * @version     $Id$
 * @link        http://www.ranzhi.org
 */
class refundModel extends model
{
    /**
     * Get a refund by id.
     * 
     * @param  int    $ID 
     * @access public
     * @return void
     */
    public function getByID($ID)
    {
        $refund = $this->dao->select('*')->from(TABLE_REFUND)->where('id')->eq($ID)->fetch();
        if($refund)
        {
            $details = $this->dao->select('*')->from(TABLE_REFUND)->where('parent')->eq($ID)->fetchAll('id');
            $refund->detail = $details;
            $refund->files  = $this->loadModel('file')->getByObject('refund', $ID);

            $objectType = '';
            if($refund->customer) $objectType  = 'customer';
            if($refund->order)    $objectType  = 'order';
            if($refund->contract) $objectType  = 'contract';
            if($refund->project)  $objectType .= ',project';
            $refund->objectType = explode(',', trim($objectType, ','));
        }
        return $refund;
    }

    /**
     * Get refund list. 
     * 
     * @param  string $mode 
     * @param  string $date
     * @param  string $deptID 
     * @param  string $status 
     * @param  string $createdBy 
     * @param  string $orderBy 
     * @param  object $pager 
     * @access public
     * @return array
     */
    public function getList($mode = 'company', $type = '', $date = '', $deptID = '', $status = '', $createdBy = '', $orderBy = 'id_desc', $pager = null)
    {
        if($this->session->refundQuery == false) $this->session->set('refundQuery', ' 1 = 1');
        $refundQuery = $this->loadModel('search', 'sys')->replaceDynamic($this->session->refundQuery);

        $users   = $this->loadModel('user')->getPairs('noclosed,noempty', $deptID);
        $refunds = $this->dao->select('*')->from(TABLE_REFUND)
            ->where('parent')->eq('0')
            ->beginIf($deptID != '')->andWhere('createdBy')->in(array_keys($users))->fi()
            ->beginIf($status != '')->andWhere('status')->in($status)->fi()
            ->beginIf($createdBy != '')->andWhere('createdBy')->in($createdBy)->fi()
            ->beginIf($mode != 'personal')->andWhere('status')->ne('draft')->fi()
            ->beginIf($date != '')->andWhere('date')->like("$date%")->fi()
            ->beginIf($mode == 'browseReview' and $status == 'pass,finish')
            ->andWhere('firstReviewer', true)->eq($this->app->user->account)
            ->orWhere('secondReviewer')->eq($this->app->user->account)
            ->markRight(1)
            ->fi()
            ->beginIF($type == 'bysearch')->andWhere($refundQuery)->fi()
            ->orderBy($orderBy)
            ->page($pager)
            ->fetchAll('id');

        /* Set pre and next condition. */
        $this->session->set('refundQueryCondition', $this->dao->get());

        $details = $this->dao->select('*')->from(TABLE_REFUND)->where('parent')->in(array_keys($refunds))->fetchGroup('parent', 'id');
        foreach($refunds as $key => $refund) $refund->detail = isset($details[$key]) ? $details[$key] : array();

        return $this->processStatus($refunds, $users);
    }

    /**
     * Process status of refunds. 
     * 
     * @param  array  $refunds 
     * @param  array  $users 
     * @access public
     * @return array
     */
    public function processStatus($refunds, $users)
    {
        $managers = $this->loadModel('user')->getUserManagerPairs();
        foreach($refunds as $refund)
        {
            $refund->statusLabel = zget($this->lang->refund->statusList, $refund->status);

            if(strpos(',wait,doing,', ",$refund->status,") !== false)
            {
                $reviewer = '';
                if($refund->firstReviewer)
                {
                    if(!empty($this->config->refund->secondReviewer)) $reviewer = $this->config->refund->secondReviewer;
                }
                else
                {
                    if(empty($this->config->refund->firstReviewer))
                    {
                        $reviewer = trim(zget($managers, $refund->createdBy, ''), ',');
                    }
                    else
                    {
                        $reviewer = $this->config->refund->firstReviewer;
                    }
                }
                if($reviewer) $refund->statusLabel = zget($users, $reviewer) . $this->lang->refund->statusList['doing'];
            }
        }
        return $refunds;
    }

    /**
     * Get all month of refund.
     * 
     * @param  string $mode
     * @param  string $status
     * @access public
     * @return array
     */
    public function getAllMonth($mode = '', $status = '')
    {
        $monthList = array();
        $dateList  = $this->dao->select('date')->from(TABLE_REFUND)
            ->where(1)
            ->beginIF($mode == 'personal')->andWhere('createdBy')->eq($this->app->user->account)->fi()
            ->beginIF($status == 'reviewed')
            ->andWhere('firstReviewer', true)->eq($this->app->user->account)
            ->orWhere('secondReviewer')->eq($this->app->user->account)
            ->markRight(1)
            ->fi()
            ->groupBy('date')
            ->orderBy('date_desc')
            ->fetchAll('date');
        foreach($dateList as $date)
        {
            $year  = substr($date->date, 0, 4);
            $month = substr($date->date, 5, 2);
            if(!isset($monthList[$year][$month])) $monthList[$year][$month] = $month;
        }
        return $monthList;
    }

    /**
     * Create a refund.
     * 
     * @access public
     * @return bool
     */
    public function create()
    {
        $refund = fixer::input('post')
            ->add('status', 'wait')
            ->add('createdBy', $this->app->user->account)
            ->add('createdDate', helper::now()) 
            ->join('related', ',')
            ->setDefault('date', helper::today())
            ->setForce('money', (float)$this->post->money)
            ->remove('customer,order,contract,project,objectType,dateList,moneyList,categoryList,descList,relatedList,files,labels')
            ->get();

        $result = $this->processRefund($refund);
        if(is_array($result)) return $result;
        $refund = $result;

        if($this->post->objectType)
        {
            foreach($this->post->objectType as $objectType) 
            {
                $refund->$objectType = $this->post->$objectType;
                if($objectType == 'order' or $objectType == 'contract') $refund->customer = $this->post->customer;

                $this->config->refund->require->create .= ',' . $objectType;
            }
        }

        $this->dao->insert(TABLE_REFUND)
            ->data($refund)
            ->batchCheck($this->config->refund->require->create, 'notempty')
            ->autoCheck()
            ->exec();

        if(dao::isError()) return false;

        $refundID = $this->dao->lastInsertID();
        $this->loadModel('file')->saveUpload('refund', $refundID);

        if(!$this->saveDetails($refundID))
        {
            $this->delete($refundID);
            return false;
        }

        return $refundID;
    } 

    /**
     * update a refund.
     * 
     * @param  int    $refundID 
     * @access public
     * @return object|bool
     */
    public function update($refundID)
    {
        $oldRefund = $this->getByID($refundID);
        $refund = fixer::input('post')
            ->add('editedBy', $this->app->user->account)
            ->add('editedDate', helper::now())
            ->add('firstReviewer', '')
            ->add('firstReviewDate', '0000-00-00')
            ->add('secondReviewer', '')
            ->add('secondReviewDate', '0000-00-00')
            ->join('related', ',')
            ->setDefault('date', helper::today())
            ->setForce('money', (float)$this->post->money)
            ->remove('customer,order,contract,project,objectType,dateList,moneyList,categoryList,descList,relatedList,files,labels')
            ->get();

        $result = $this->processRefund($refund);
        if(is_array($result)) return $result;
        $refund = $result;

        if($this->post->objectType)
        {
            foreach($this->post->objectType as $objectType) 
            {
                $refund->$objectType = $this->post->$objectType;
                if($objectType == 'order' or $objectType == 'contract') $refund->customer = $this->post->customer;

                $this->config->refund->require->edit .= ',' . $objectType;
            }
        }

        $this->dao->update(TABLE_REFUND)
            ->data($refund)
            ->batchCheck($this->config->refund->require->edit, 'notempty')
            ->autoCheck()
            ->where('id')->eq($refundID)
            ->exec();

        if(dao::isError()) return false;

        $this->loadModel('file')->saveUpload('refund', $refundID);

        $this->saveDetails($refundID);

        return commonModel::createChanges($oldRefund, $refund);
    }

    /**
     * Process a refund. 
     * 
     * @param  object $refund 
     * @access public
     * @return object
     */
    public function processRefund($refund)
    {
        if(!empty($this->config->refund->firstReviewer) && $this->config->refund->firstReviewer == $this->app->user->account) 
        {
            $refund->status          = 'doing';
            $refund->firstReviewer   = $this->app->user->account;
            $refund->firstReviewDate = helper::now();

            if(empty($this->config->refund->secondReviewer) or (isset($this->config->refund->money) and $refund->money < $this->config->refund->money)) $refund->status = 'pass';
            if(!empty($this->config->refund->secondReviewer) && $this->config->refund->secondReviewer == $this->app->user->account)
            {
                $refund->status = 'pass';
                $refund->secondReviewer   = $this->app->user->account;
                $refund->secondReviewDate = helper::now();
            }
        }

        return $refund;
    }

    /**
     * Save details of a refund. 
     * 
     * @param  int    $refundID 
     * @access public
     * @return bool 
     */
    public function saveDetails($refundID)
    {
        $this->dao->delete()->from(TABLE_REFUND)->where('parent')->eq($refundID)->exec();

        /* Insert detail */
        if(!empty($_POST['moneyList']))
        {
            foreach($this->post->moneyList as $key => $money)
            {
                if(!(float)$money) continue;
                $detail = new stdclass();
                $detail->parent      = $refundID;
                $detail->category    = $this->post->categoryList[$key];
                $detail->currency    = $this->post->currency;
                $detail->date        = $this->post->dateList[$key] ? $this->post->dateList[$key] : helper::today();
                $detail->money       = (float)$money;
                $detail->desc        = $this->post->descList[$key];
                $detail->related     = implode(',', $this->post->relatedList[$key]);
                $detail->status      = 'wait';
                $detail->createdBy   = $this->app->user->account;
                $detail->createdDate = helper::now();

                $this->dao->insert(TABLE_REFUND)->data($detail)->autoCheck()->exec();
            }
        }

        return !dao::isError();
    }

    /**
     * delete a refund.
     * 
     * @param  int    $refundID 
     * @param  null   $null 
     * @access public
     * @return bool
     */
    public function delete($refundID, $null = null)
    {
        $this->dao->delete()->from(TABLE_REFUND)->where('id')->eq($refundID)->orWhere('parent')->eq($refundID)->exec();
        return dao::isError();
    }

    /**
     * Set refund category. 
     * 
     * @param  array   $expenseIdList 
     * @access public
     * @return void
     */
    public function setCategory($expenseIdList)
    {
        $refundCategories   = $this->post->refundCategories ? $this->post->refundCategories : array();
        $unRefundCategories = array_diff($expenseIdList, $refundCategories);

        foreach($refundCategories as $refundCategory) $this->dao->update(TABLE_CATEGORY)->set('refund')->eq(1)->where('id')->eq($refundCategory)->exec();
        foreach($unRefundCategories as $unRefundCategory) $this->dao->update(TABLE_CATEGORY)->set('refund')->eq(0)->where('id')->eq($unRefundCategory)->exec();

        return !dao::isError();
    }

    /**
     * Get refund categories.
     * 
     * @access public
     * @return void
     */
    public function getCategory()
    {
        return $this->dao->select('*')->from(TABLE_CATEGORY)->where('type')->eq('out')->andWhere('refund')->eq(1)->fetchAll('id');
    }

    /**
     * Get refund category pairs.
     * 
     * @access public
     * @return void
     */
    public function getCategoryPairs()
    {
        $categories       = $this->loadModel('tree')->getOptionMenu('out', 0, $removeRoot = true);
        $refundCategories = $this->dao->select('id, name')->from(TABLE_CATEGORY)->where('type')->eq('out')->andWhere('refund')->eq(1)->fetchPairs();
        $newCategories = array();
        foreach($categories as $key => $category)
        {
            if(isset($refundCategories[$key])) 
            {
                $path = explode('/', trim($category, '/'));
                $path = array_slice($path, 1);
                $newCategories[$key] = '/' . implode('/', $path);
            }
        }

        return array('/') + $newCategories;
    }

    /**
     * Review a refund.
     * 
     * @param  int    $refundID 
     * @param  int    $status 
     * @access public
     * @return bool
     */
    public function review($refundID)
    {
        $refund  = $this->getByID($refundID);
        $account = $this->app->user->account;
        $now     = helper::now();
        $data    = new stdclass();

        if($this->post->allReject or $this->post->status == 'reject')
        {
            $status = 'reject';
            $data->reason = $this->post->reason;
        }
        else
        {
            $status = 'pass';
            $data->money = $this->post->money;
            if(!empty($this->config->refund->secondReviewer) and isset($this->config->refund->money) and $data->money > $this->config->refund->money)
            {
                $status = 'doing';
                if($this->config->refund->secondReviewer == $account) $status = 'pass';
                if($this->config->refund->secondReviewer == $refund->createdBy) $status = 'pass';
            } 
        }

        $data->status = $status;
        if($refund->status == 'wait')
        {
            $data->firstReviewer   = $account;
            $data->firstReviewDate = $now;

            if($status == 'pass' && !empty($this->config->refund->secondReviewer) and isset($this->config->refund->money) and $data->money > $this->config->refund->money)
            {
                if($this->config->refund->secondReviewer == $account) $data->secondReviewer = $account;
                if($this->config->refund->secondReviewer == $refund->createdBy) $data->secondReviewer = $refund->createdBy;
                $data->secondReviewDate = $now;
            } 
        }

        if($refund->status == 'doing')
        {
            $data->secondReviewer   = $account;
            $data->secondReviewDate = $now;
        }

        if(isset($data->money) and $data->money > $refund->money) return array('result' => 'fail', 'message' => $this->lang->refund->correctMoney);
        $this->dao->update(TABLE_REFUND)->data($data)->check('money', 'notempty')->where('id')->eq($refundID)->exec();

        if(!empty($refund->detail))
        {
            foreach($refund->detail as $detail)
            {
                if($_POST["status{$detail->id}"] == 'reject') $data->status = 'reject';
                $this->dao->update(TABLE_REFUND)->data($data, $skip = 'money')->where('id')->eq($detail->id)->exec();
            }
        }

        return !dao::isError();
    }

    /**
     * Refund a reimbursement.
     * 
     * @param  int    $refundID 
     * @access public
     * @return void
     */
    public function reimburse($refundID)
    {
        $refund = $this->getByID($refundID);

        $data = new stdclass();
        $data->status     = 'finish';
        $data->refundBy   = $this->app->user->account;
        $data->refundDate = helper::now(); 

        $this->dao->update(TABLE_REFUND)->data($data)->where('id')->eq($refundID)->exec();
        foreach($refund->detail as $detail)
        {
            if($detail->status != 'reject') $this->dao->update(TABLE_REFUND)->data($data)->where('id')->eq($detail->id)->exec();
        }
        return !dao::isError();
    }

    /**
     * Create a trade for a reimbursement.
     * 
     * @param  int    $refundID 
     * @access public
     * @return void
     */
    public function createTrade($refundID)
    {
        $refund = $this->getByID($refundID);

        $trade = new stdclass();
        $trade->type        = 'out';
        $trade->depositor   = $this->post->depositor;
        $trade->trader      = $refund->customer;
        $trade->order       = $refund->order;
        $trade->contract    = $refund->contract;
        $trade->project     = $refund->project;
        $trade->money       = $refund->money;
        $trade->currency    = $refund->currency;
        $trade->date        = date('Y-m-d');
        $trade->handlers    = $this->post->handlers ? trim(implode(',', $this->post->handlers), ',') : '';
        $trade->category    = $this->post->category;
        $trade->dept        = $this->post->dept;
        $trade->desc        = $refund->desc;
        $trade->createdBy   = $this->app->user->account;
        $trade->createdDate = helper::now();

        $this->dao->insert(TABLE_TRADE)->data($trade)->batchCheck($this->config->refund->require->createTrade, 'notempty')->autoCheck()->exec();
        if(dao::isError()) return false;

        $tradeID = $this->dao->lastInsertID();
        $extra   = html::a(helper::createLink('oa.refund', 'view', "refundID=$refundID"), $refund->name);
        $this->loadModel('action')->create('trade', $tradeID, 'reimburse', '', $extra);

        if(!empty($refund->detail))
        {
            foreach($refund->detail as $detail)
            {
                if($detail->status != 'finish') continue;

                $tradeDetail = new stdclass();
                $tradeDetail->type        = 'out';
                $tradeDetail->parent      = $tradeID;
                $tradeDetail->money       = $detail->money;
                $tradeDetail->date        = $detail->date;
                $tradeDetail->handlers    = $detail->related;
                $tradeDetail->category    = $detail->category;
                $tradeDetail->desc        = $detail->desc;
                $tradeDetail->createdBy   = $this->app->user->account;
                $tradeDetail->createdDate = helper::now();

                $this->dao->insert(TABLE_TRADE)->data($tradeDetail)->exec();
            }
        }

        return $tradeID;
    }

    /**
     * Total refund list.
     * 
     * @param  array    $refunds 
     * @access public
     * @return string
     */
    public function total($refunds)
    {
        $totalMoney  = array();
        $currencyList = $this->loadModel('common', 'sys')->getCurrencySign();

        foreach($currencyList as $key => $currency)
        {
            $totalMoney[$key] = 0;
            foreach($refunds as $refund)
            {
                if($refund->currency != $key) continue;
                $totalMoney[$key] += $refund->money;
            }
        }

        $totalInfo = '';
        foreach($totalMoney as $currency => $money)
        {
            if(!$money) continue;
            $tidyMoney = "<span title='" . $money . "'>" . commonModel::tidyMoney($money) . '</span>';
            $totalInfo .= sprintf($this->lang->refund->totalMoney, $currencyList[$currency], $tidyMoney);
        }

        return $totalInfo;
    }
}
