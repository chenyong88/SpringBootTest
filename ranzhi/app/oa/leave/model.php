<?php
/**
 * The model file of leave module of Ranzhi.
 *
 * @copyright   Copyright 2009-2018 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      chujilu <chujilu@cnezsoft.com>
 * @package     leave
 * @version     $Id$
 * @link        http://www.ranzhi.org
 */
class leaveModel extends model
{
    public function __construct($appName = '')
    {
        parent::__construct($appName);
        $this->loadModel('attend', 'oa');
    }

    /**
     * Get a leave by id.
     *
     * @param  int    $id
     * @access public
     * @return object
     */
    public function getById($id)
    {
        return $this->dao->select('*')->from(TABLE_LEAVE)->where('id')->eq($id)->fetch();
    }

    /**
     * Get by idList.
     *
     * @param  array|string $idList
     * @access public
     * @return array
     */
    public function getByIdList($idList)
    {
        return $this->dao->select('*')->from(TABLE_LEAVE)->where('id')->in($idList)->fetchAll('id');
    }

    /**
     * Get leave list.
     *
     * @param  string $type
     * @param  string $year
     * @param  string $month
     * @param  string $account
     * @param  string $dept
     * @param  string $status
     * @param  string $orderBy
     * @access public
     * @return array
     */
    public function getList($type = 'personal', $year = '', $month = '', $account = '', $dept = '', $status = '', $orderBy = 'id_desc')
    {
        $date = '';
        if($year)
        {
            if(!$month) $date = "$year-%";
            if($month)  $date = "$year-$month-%";
        }
        else
        {
            if($month) $date = "%-$month-%";
        }

        $leaveList = $this->dao->select('t1.*, t2.realname, t2.dept')
            ->from(TABLE_LEAVE)->alias('t1')
            ->leftJoin(TABLE_USER)->alias('t2')->on("t1.createdBy=t2.account")
            ->where(1)
            ->beginIf($date)
            ->andWhere('t1.begin', true)->like($date)
            ->orWhere('t1.end')->like($date)
            ->markRight(1)
            ->fi()
            ->beginIf($account != '')->andWhere('t1.createdBy')->eq($account)->fi()
            ->beginIf($dept != '')->andWhere('t2.dept')->in($dept)->fi()
            ->beginIf($status != '')->andWhere('t1.status')->in($status)->fi()
            ->beginIf($type == 'browseReview')->andWhere('t1.status')->in('wait,back')->fi()
            ->beginIf($type == 'company')->andWhere('t1.status')->ne('draft')->fi()
            ->orderBy("t2.dept,t1.{$orderBy}")
            ->fetchAll();
        $this->session->set('leaveQueryCondition', $this->dao->get());

        return $this->processStatus($leaveList);
    }

    /**
     * Process status of leave list.
     *
     * @param  array  $leaveList
     * @access public
     * @return array
     */
    public function processStatus($leaveList)
    {
        $users    = $this->loadModel('user')->getPairs();
        $managers = $this->user->getUserManagerPairs();
        foreach($leaveList as $leave)
        {
            $leave->statusLabel = zget($this->lang->leave->statusList, $leave->status);

            if(strpos(',wait,back,', ",$leave->status,") !== false)
            {
                $reviewer = $this->getReviewedBy();
                if(!$reviewer)
                {
                    $reviewer = trim(zget($managers, $leave->createdBy, ''), ',');
                }
                if($reviewer) $leave->statusLabel = zget($users, $reviewer) . $this->lang->leave->statusList['doing'];
            }
        }

        return $leaveList;
    }

    /**
     * Get leave by date and account.
     *
     * @param  string    $date
     * @param  string    $account
     * @access public
     * @return object
     */
    public function getByDate($date, $account)
    {
        $leaves = $this->dao->select('*')->from(TABLE_LEAVE)->where('begin')->le($date)->andWhere('end')->ge($date)->andWhere('createdBy')->eq($account)->fetchAll();
        if(count($leaves) == 1) return current($leaves);
        return null;
    }

    /**
     * Get all month of leave's begin.
     *
     * @param  string $type
     * @access public
     * @return array
     */
    public function getAllMonth($type)
    {
        $monthList = array();
        $dateList  = $this->dao->select('begin, end')->from(TABLE_LEAVE)
            ->beginIF($type == 'personal')->where('createdBy')->eq($this->app->user->account)->fi()
            ->beginIF($type == 'company')->where('status')->ne('draft')->fi()
            ->groupBy('begin')
            ->orderBy('begin_desc')
            ->fetchAll('begin');
        foreach($dateList as $date)
        {
            $year  = substr($date->end, 0, 4);
            $month = substr($date->end, 5, 2);
            if(!isset($monthList[$year][$month])) $monthList[$year][$month] = $month;

            $year  = substr($date->begin, 0, 4);
            $month = substr($date->begin, 5, 2);
            if(!isset($monthList[$year][$month])) $monthList[$year][$month] = $month;
        }
        return $monthList;
    }

    /**
     * Get list by date.
     *
     * @param  string    $date
     * @param  string    $account
     * @access public
     * @return array
     */
    public function getListByDate($date, $account)
    {
        $begin = strtolower($date['begin']);
        $end   = strtolower($date['end']);

        return $this->dao->select('*')->from(TABLE_LEAVE)
            ->where('status')->eq('pass')
            ->andWhere('createdBy')->eq($account)
            ->andWhere('begin')->ge($begin)
            ->andWhere('end')->le($end)
            ->fetchAll();
    }

    /**
     * Get reviewed by.
     *
     * @access public
     * @return string
     */
    public function getReviewedBy()
    {
        return !isset($this->config->leave->reviewedBy) ? (!isset($this->config->attend->reviewedBy) ? '' : $this->config->attend->reviewedBy) : $this->config->leave->reviewedBy;
    }

    /**
     * Create a leave.
     *
     * @access public
     * @return bool
     */
    public function create()
    {
        $leave = fixer::input('post')
            ->add('status', 'wait')
            ->add('createdBy', $this->app->user->account)
            ->add('createdDate', helper::now())
            ->get();
        if(isset($leave->begin) and $leave->begin != '') $leave->year = substr($leave->begin, 0, 4);

        $result = $this->checkDate($leave);
        if($result['result'] == 'fail') return $result;

        $this->dao->insert(TABLE_LEAVE)
            ->data($leave)
            ->autoCheck()
            ->batchCheck($this->config->leave->require->create, 'notempty')
            ->check('end', 'ge', $leave->begin)
            ->exec();

        return $this->dao->lastInsertID();
    }

    /**
     * update leave.
     *
     * @param  int    $id
     * @access public
     * @return bool
     */
    public function update($id)
    {
        $oldLeave = $this->getById($id);

        $leave = fixer::input('post')
            ->remove('status')
            ->remove('createdBy')
            ->remove('createdDate')
            ->get();

        if(isset($leave->begin) and $leave->begin != '') $leave->year = substr($leave->begin, 0, 4);
        if($oldLeave->status == 'reject') $leave->status = 'wait';

        $result = $this->checkDate($leave, $id);
        if(!empty($result['result']) && $result['result'] == 'fail') return $result;

        $this->dao->update(TABLE_LEAVE)
            ->data($leave)
            ->autoCheck()
            ->batchCheck($this->config->leave->require->edit, 'notempty')
            ->check('end', 'ge', $leave->begin)
            ->where('id')->eq($id)
            ->exec();

        return commonModel::createChanges($oldLeave, $leave);
    }

    /**
     * Check date.
     *
     * @param  object $date
     * @param  int    $id
     * @access public
     * @return void
     */
    public function checkDate($date, $id = 0)
    {
        //if(substr($date->begin, 0, 7) != substr($date->end, 0, 7)) return array('result' => 'fail', 'message' => $this->lang->leave->sameMonth);
        if("$date->end $date->finish" <= "$date->begin $date->start") return array('result' => 'fail', 'message' => $this->lang->leave->wrongEnd);

        $existLeave = $this->checkLeave($date, $this->app->user->account, $id);
        if(!empty($existLeave)) return array('result' => 'fail', 'message' => sprintf($this->lang->leave->unique, implode(', ', $existLeave)));

        $existMakeup = $this->loadModel('makeup', 'oa')->checkMakeup($date, $this->app->user->account);
        if(!empty($existMakeup)) return array('result' => 'fail', 'message' => sprintf($this->lang->makeup->unique, implode(', ', $existMakeup)));

        $existOvertime = $this->loadModel('overtime', 'oa')->checkOvertime($date, $this->app->user->account);
        if(!empty($existOvertime)) return array('result' => 'fail', 'message' => sprintf($this->lang->overtime->unique, implode(', ', $existOvertime)));

        $existTrip = $this->loadModel('trip', 'oa')->checkTrip('trip', $date, $this->app->user->account);
        if(!empty($existTrip)) return array('result' => 'fail', 'message' => sprintf($this->lang->trip->unique, implode(', ', $existTrip)));

        $this->app->loadLang('egress', 'oa');
        $existEgress = $this->trip->checkTrip('egress', $date, $this->app->user->account);
        if(!empty($existEgress)) return array('result' => 'fail', 'message' => sprintf($this->lang->egress->unique, implode(', ', $existEgress)));

        $existLieu = $this->loadModel('lieu', 'oa')->checkLieu($date, $this->app->user->account);
        if(!empty($existLieu)) return array('result' => 'fail', 'message' => sprintf($this->lang->lieu->unique, implode(', ', $existLieu)));

        return array('result' => 'success');
    }

    /**
     * Check leave.
     *
     * @param  object $currentLeave
     * @param  string $account
     * @param  int    $id
     * @access public
     * @return bool
     */
    public function checkLeave($currentLeave = null, $account = '', $id = 0)
    {
        if($id)
        {
            $oldLeave = $this->getById($id);
            if($oldLeave->createdBy != $account) $account = $oldLeave->createdBy;
        }
        $beginTime  = date('Y-m-d H:i:s', strtotime($currentLeave->begin . ' ' . $currentLeave->start));
        $endTime    = date('Y-m-d H:i:s', strtotime($currentLeave->end   . ' ' . $currentLeave->finish));
        $leaveList  = $this->getList($type = '', $year = '', $month = '', $account, $dept = '', $status = '', $orderBy = 'begin, start');
        $existLeave = array();
        foreach($leaveList as $leave)
        {
            if($leave->id == $id) continue;
            if($leave->status == 'reject') continue;

            $begin = $leave->begin . ' ' . $leave->start;
            $end   = $leave->end   . ' ' . $leave->finish;
            if(($beginTime > $begin && $beginTime < $end)
                || ($endTime > $begin && $endTime < $end)
                || ($beginTime <= $begin && $endTime >= $end))
            {
                $existLeave[] = substr($begin, 0, 16) . ' ~ ' . substr($end, 0, 16);
            }
        }
        return $existLeave;
    }

    /**
     * Back to the company.
     *
     * @param  int    $id
     * @access public
     * @return bool | array
     */
    public function back($id)
    {
        $oldLeave = $this->getById($id);
        $leave    = clone $oldLeave;
        $leave->status   = 'back';
        $leave->backDate = $this->post->backDate;

        $this->dao->update(TABLE_LEAVE)->data($leave)->autoCheck()->where('id')->eq($id)->exec();

        if(dao::isError()) return false;

        return commonModel::createChanges($oldLeave, $leave);
    }

    /**
     * review
     *
     * @param  int    $id
     * @param  string $status
     * @access public
     * @return bool
     */
    public function review($id, $status)
    {
        if(!isset($this->lang->leave->statusList[$status])) return false;

        $data = new stdclass();
        $data->status       = $status;
        $data->reviewedBy   = $this->app->user->account;
        $data->reviewedDate = helper::now();

        $this->dao->update(TABLE_LEAVE)->data($data)->autoCheck()->where('id')->eq($id)->exec();

        if(!dao::isError() && $status == 'pass')
        {
            $leave = $this->getById($id);
            $dates = range(strtotime($leave->begin), strtotime($leave->end), 60*60*24);
            $this->loadModel('attend', 'oa')->batchUpdate($dates, $leave->createdBy, 'leave', '', $leave);
        }

        return !dao::isError();
    }

    /**
     * Review back date.
     *
     * @param  int    $id
     * @param  string $status
     * @access public
     * @return void
     */
    public function reviewBackDate($id, $status)
    {
        $oldLeave = $this->getById($id);
        if($status == 'reject')
        {
            $this->dao->update(TABLE_LEAVE)->set('backDate')->eq('0000-00-00 00:00:00')->where('id')->eq($id)->exec();
            $leave = clone $oldLeave;
            $leave->status   = 'pass';
            $leave->backDate = '0000-00-00 00:00:00';

            if(dao::isError()) return false;

            return commonModel::createChanges($oldLeave, $leave);
        }

        $begin  = $oldLeave->begin;
        $start  = $oldLeave->start;
        $end    = substr($oldLeave->backDate, 0, 10);
        $finish = substr($oldLeave->backDate, 11);

        if($oldLeave->begin == $end)
        {
            $hours = round((strtotime("{$end} {$finish}") - strtotime("{$end} {$oldLeave->start}")) / 3600, 2);
            if($hours > $this->config->attend->workingHours) $hours = $this->config->attend->workingHours;
        }
        else
        {
            $hoursStart   = round((strtotime("{$begin} {$this->config->attend->signOutLimit}") - strtotime("{$begin} {$start}")) / 3600, 2);
            $hoursEnd     = round((strtotime("{$end} {$finish}") - strtotime("{$end} {$this->config->attend->signInLimit}")) / 3600, 2);
            $days         = (strtotime("{$end}") - strtotime("{$begin}")) / 3600 / 24;
            $hoursContent = $days > 1 ? (($days - 1)  * $this->config->attend->workingHours) : 0;

            if($hoursStart > $this->config->attend->workingHours) $hoursStart = $this->config->attend->workingHours;
            if($hoursEnd > $this->config->attend->workingHours)   $hoursEnd   = $this->config->attend->workingHours;
            $hours = $hoursStart + $hoursEnd + $hoursContent;
        }

        $data = new stdclass();
        $data->status       = 'pass';
        $data->end          = $end;
        $data->finish       = $finish;
        $data->hours        = $hours;
        $data->reviewedBy   = $this->app->user->account;
        $data->reviewedDate = helper::now();

        $this->dao->update(TABLE_LEAVE)->data($data)->where('id')->eq($id)->exec();

        if(dao::isError()) return false;

        $leave = $this->getById($id);
        $dates = range(strtotime($leave->begin), strtotime($leave->end), 60*60*24);
        $this->loadModel('attend', 'oa')->batchUpdate($dates, $leave->createdBy, 'leave', '', $leave);

        if($oldLeave->end > $leave->end)
        {
            $oldDates = range(strtotime($leave->end), strtotime($oldLeave->end), 60*60*24);
            $this->loadModel('attend', 'oa')->batchUpdate($oldDates, $leave->createdBy);
        }

        return commonModel::createChanges($oldLeave, $leave);
    }

    /**
     * delete leave.
     *
     * @param  int    $id
     * @access public
     * @return bool
     */
    public function delete($id, $null = null)
    {
        $oldLeave = $this->getById($id);

        $this->dao->delete()->from(TABLE_LEAVE)->where('id')->eq($id)->exec();

        if(!dao::isError())
        {
            $oldDates = range(strtotime($oldLeave->begin), strtotime($oldLeave->end), 60*60*24);
            $this->loadModel('attend', 'oa')->batchUpdate($oldDates, $oldLeave->createdBy, '');
        }

        return !dao::isError();
    }

    /**
     * check date is in leave.
     *
     * @param  string $date
     * @param  string $account
     * @access public
     * @return bool
     */
    public function isLeave($date, $account)
    {
        static $leaveList = array();
        if(!isset($leaveList[$account])) $leaveList[$account] = $this->getList($type = 'company', $year = '', $month = '', $account, $dept = '', 'pass');

        foreach($leaveList[$account] as $leave)
        {
            if(strtotime($date) >= strtotime($leave->begin) and strtotime($date) <= strtotime($leave->end)) return true;
        }

        return false;
    }

    /**
     * Save personal annual days.
     * 
     * @access public
     * @return void
     */
    public function savePersonalAnnual()
    {
        $this->dao->delete()->from(TABLE_CONFIG)
            ->where('`owner`')->eq('system')
            ->andWhere('`app`')->eq('oa')
            ->andWhere('`module`')->eq('leave')
            ->andWhere('`key`')->eq('annualSetting')
            ->exec();

        $data = new stdclass();
        $totalAnnuals = array();
        foreach($this->post->account as $key => $account)
        {
            $totalDays = $this->post->totalDays[$key];
            $begin = $this->post->begin[$key];
            $end   = $this->post->end[$key];

            if(!$account or !$totalDays or !$begin or !$end) continue;

            $totalAnnuals[$account] = new stdclass();
            $totalAnnuals[$account]->totalDays = $totalDays;
            $totalAnnuals[$account]->begin     = $begin;
            $totalAnnuals[$account]->end       = $end;
        }

        $data->annualSetting = helper::jsonEncode($totalAnnuals);

        if($totalAnnuals) $this->loadModel('setting')->setItems('system.oa.leave', $data);
        return !dao::isError();
    }

    /**
     * Compute annual days 
     * 
     * @access public
     * @return array
     */
    public function computeAnnualDays()
    {
        if(!isset($this->config->leave->annualSetting)) return array();

        $annualSettings = json_decode($this->config->leave->annualSetting);

        $leaves = $this->dao->select('*')->from(TABLE_LEAVE)->where('type')->eq('annual')->andWhere('status')->eq('pass')->fetchAll();

        $usedAnnualDays = array();
        foreach($leaves as $leave)
        {
            if(!isset($annualSettings->{$leave->createdBy})) continue;
            $currentAnnualSetting = $annualSettings->{$leave->createdBy};

            $attendWorkingHours = $this->config->attend->workingHours;

            if(!isset($usedAnnualDays[$leave->createdBy])) $usedAnnualDays[$leave->createdBy] = 0;

            if($leave->begin == $leave->end)
            {
                if($leave->begin < $currentAnnualSetting->begin || $leave->begin > $currentAnnualSetting->end) continue;
                $usedAnnualDays[$leave->createdBy] += round($leave->hours / $attendWorkingHours, 2);
            }
            else
            {
                $totalHours = 0;
                $dates = range(strtotime($leave->begin), strtotime($leave->end), 86400);
                foreach($dates as $datetime)
                {
                    $date = date('Y-m-d', $datetime);

                    if($date < $currentAnnualSetting->begin) continue;
                    if($date > $currentAnnualSetting->end) continue;

                    $signIn       = strtotime($date . ' ' . $this->config->attend->signInLimit);
                    $signOut      = strtotime($date . ' ' . $this->config->attend->signOutLimit);
                    $workingHours = $attendWorkingHours;

                    $hours = 0;
                    if($date == $leave->begin)
                    {
                        $hours = round(($signOut - strtotime($leave->begin . ' ' . $leave->start)) / 3600, 2);
                    }
                    elseif($date == $leave->end)
                    {
                        $hours = round((strtotime($leave->end . ' ' . $leave->finish) - $signIn) / 3600, 2);
                    }
                    else
                    {
                        $hours = $workingHours;
                    }

                    if($hours < 0) $hours = 0;
                    if($hours > $workingHours) $hours = $workingHours;
                    if($hours > $leave->hours) $hours = $leave->hours;
                    if($hours) $totalHours += $hours;
                }
                $usedAnnualDays[$leave->createdBy] += round($totalHours / $attendWorkingHours, 2);
            }
        }

        $leftAnnualDays = array();
        foreach($annualSettings as $account => $annualSetting)
        {
            $leftAnnualDays[$account] = isset($usedAnnualDays[$account]) ? $annualSetting->totalDays - $usedAnnualDays[$account] : $annualSetting->totalDays;
        }
        return $leftAnnualDays;
    }
}
