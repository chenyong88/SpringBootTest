<?php
/**
 * The control file of action module of RanZhi.
 *
 * @copyright   Copyright 2009-2018 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Yidong Wang <yidong@cnezsoft.com>
 * @package     action
 * @version     $Id$
 * @link        http://www.ranzhi.org
 */
class action extends control
{
    /**
     * browse history actions and records. 
     * 
     * @param  string    $objectType
     * @param  int       $objectID 
     * @param  string    $action
     * @param  string    $from
     * @access public
     * @return void
     */
    public function history($objectType, $objectID, $action = '', $from = 'view')
    {
        $this->view->actions    = $this->action->getList($objectType, $objectID, $action);
        $this->view->datingList = $this->action->getDatingList($objectType, $objectID);
        $this->view->objectType = $objectType;
        $this->view->objectID   = $objectID;
        $this->view->users      = $this->loadModel('user')->getPairs();
        $this->view->contacts   = $this->loadModel('contact', 'crm')->getPairs();
        $this->view->from       = $from;
        $this->view->behavior   = $action;
        $this->display();
    }

    /**
     * Edit comment of an action.
     * 
     * @param  int    $actionID 
     * @access public
     * @return void
     */
    public function editComment($actionID)
    {
        if(!strip_tags($this->post->lastComment)) $this->send(array('result' => 'success', 'locate' => $this->server->http_referer));
        $this->action->updateComment($actionID);
        $this->send(array('result' => 'success', 'message' => $this->lang->saveSuccess, 'locate' => $this->server->http_referer));
    }

    /**
     * Create one record of an object.
     * 
     * @param  string    $objectType  order|contact|customer
     * @param  int       $objectID 
     * @param  int       $customer 
     * @param  bool      $history
     * @access public
     * @return void
     */
    public function createRecord($objectType, $objectID, $customer = 0, $history = true)
    {
        if($customer) $this->loadModel('common', 'sys')->checkPrivByCustomer($customer);

        if($_POST)
        {
            if($this->post->nextDate && !$this->action->checkDatingPrivilege($objectType, $objectID))
            {
                $user = $this->loadModel('user')->getByAccount($this->post->contactedBy);
                $this->send(array('result' => 'fail', 'message' => sprintf($this->lang->action->record->noPrivilege, $user->realname)));;
            }

            /* Can create contact when objectType is customer. */
            if($this->post->createContact and $objectType == 'customer')
            {
                $contact = new stdclass();
                $contact->realname = $this->post->realname;
                $contact->customer = $objectID;
                $contact->email    = '';
                $return = $this->loadModel('contact', 'crm')->create($contact);
                if($return['result'] == 'success')
                {
                    $this->post->set('contact', $return['contactID']);
                }
                else
                {
                    $this->send($return);
                }
            }

            if($this->post->contract)
            {
                $objectType = 'contract';
                $objectID   = $this->post->contract;
            }

            if($this->post->order)
            {
                $objectType = 'order';
                $objectID   = $this->post->order;
            }

            if($this->post->customer) $customer = $this->post->customer;

            $result = $this->action->createRecord($objectType, $objectID, $customer, $this->post->contact);
            if(dao::isError()) $this->send(array('result' => 'fail', 'message' => dao::getError()));

            if(isset($result['sendmail']) && $result['sendmail'] == true && isset($result['action']))
            {
                /* If set the date of next dating and assign anyone else to contact, send notice. */
                if($this->post->contactedBy != $this->app->user->account && $this->post->nextDate)
                {
                    $nextContact = $this->post->nextContact == 'ditto' ? $this->post->contact : $this->post->nextContact;
                    $this->sendmail($result['action'], $nextContact, $this->post->nextDate);
                }
            }

            $this->send(array('result' => 'success', 'message' => $this->lang->saveSuccess, 'locate' => $this->server->http_referer));
        }
        
        if($objectType == 'contact')
        {
            $this->view->customers = $this->loadModel('contact', 'crm')->getCustomerPairs($objectID);
        }

        if($objectType == 'customer')
        {
            $this->view->orders    = array('') + $this->loadModel('order', 'crm')->getPairs($objectID);
            $this->view->contracts = array('') + $this->loadModel('contract', 'crm')->getPairs($objectID);
        }

        $contactPairs = array();
        $contacts     = $this->loadModel('contact', 'crm')->getList($customer, $objectType == 'provider' ? 'provider' : '');
        foreach($contacts as $contact) $contactPairs[$contact->id] = $contact->realname;

        $this->loadModel('file');
        $this->view->title          = "<i class='icon-comment-alt'> </i>" . $this->lang->action->record->create;
        $this->view->objectType     = $objectType == 'provider' ? 'customer' : $objectType;
        $this->view->isCustomer     = $objectType == 'customer';
        $this->view->objectID       = $objectID;
        $this->view->customer       = $customer;
        $this->view->history        = $history;
        $this->view->contacts       = $contacts;
        $this->view->contactPairs   = $contactPairs;
        $this->view->pinyinContacts = commonModel::convert2Pinyin($contactPairs);
        $this->view->users          = $this->loadModel('user')->getPairs('noclosed, nodeleted, noempty, noforbidden');
        $this->view->modalWidth     = '800'; // Keep the modal dialog display normal if it was reloaded.

        $this->display();
    }

    /**
     * Send email.
     *
     * @param  int    $actionID
     * @param  int    $nextContact
     * @param  string $nextDate
     * @access public
     * @return void
     */
    public function sendmail($actionID, $nextContact, $nextDate)
    {
        /* Reset $this->output. */
        $this->clear();

        /* Get action info. */
        $action = $this->loadModel('action')->getById($actionID);
        if($action->action != 'dating') return false;

        $history = $this->action->getHistory($actionID);
        $action->history = isset($history[$actionID]) ? $history[$actionID] : array();

        /* Set toList and ccList. */
        $users    = $this->loadModel('user')->getPairs();
        $customer = $this->loadModel('customer')->getById($action->customer);
        $contact  = $this->loadModel('contact', 'crm')->getById($nextContact);
        $toList   = $this->post->contactedBy;
        $subject  = $this->lang->action->record->next . '# ' . $nextDate;
        if($customer) $subject .= ' ' . $customer->name;
        if($contact)  $subject .= ' ' . $contact->realname;

        /* send notice if user is online and return failed accounts. */
        $toList = $this->loadModel('action')->sendNotice($actionID, $toList);

        if(!$toList) return true;

        $table  = $this->config->action->datingTables[$action->objectType];
        $object = $this->dao->select('*')->from($table)->where('id')->eq($action->objectID)->fetch();
        $module = $action->objectType;
        if($action->objectType == 'customer') $module = $object->relation == 'provider' ? 'provider' : 'customer';
        if($action->objectType == 'contact')  $module = $object->status == 'normal' ? 'contact' : 'leads';
        $viewUrl = commonModel::getSysURL() . helper::createLink("crm.{$module}", 'view', "id={$object->id}");

        /* Create the email content. */
        $this->view->action    = $action;
        $this->view->users     = $users;
        $this->view->mailTitle = $subject;
        $this->view->nextDate  = $nextDate;
        $this->view->customer  = $customer;
        $this->view->contact   = $contact;
        $this->view->viewUrl   = $viewUrl;

        $mailContent = $this->parse($this->moduleName, 'sendmail');

        /* Send emails. */
        $this->loadModel('mail')->send($toList, $subject, $mailContent);
        if($this->mail->isError()) trigger_error(join("\n", $this->mail->getError()));
    }

   /**
     * Edit one record of an object.
     * 
     * @param  int    $recordID
     * @access public
     * @return void
     */
    public function editRecord($recordID, $from = '')
    {
        $record = $this->loadModel('action')->getByID($recordID);
        if($record->customer) $this->loadModel('common', 'sys')->checkPrivByCustomer($record->customer);
        if($record->action != 'record') exit;
        $object = $this->loadModel($record->objectType)->getByID($record->objectID);

        if($_POST)
        {
            $action = fixer::input('post')->get();
            $this->action->update($action, $recordID);
            if(dao::isError()) $this->send(array('result' => 'fail', 'message' => dao::getError()));
            $this->send(array('result' => 'success', 'message' => $this->lang->saveSuccess, 'locate' => $this->post->referer));
        }

        $contactPairs = array();
        if(!empty($object->relation) && $object->relation == 'provider')
        {
            $contacts = $this->loadModel('contact', 'crm')->getList($object->id, 'provider');
        }
        else
        {
            $contacts = $this->loadModel('contact', 'crm')->getList($record->objectType == 'customer' ? $object->id : $object->customer);
        }
        foreach($contacts as $contact) $contactPairs[$contact->id] = $contact->realname;

        $this->view->title          = $this->lang->action->record->edit;
        $this->view->from           = $from;
        $this->view->record         = $record;
        $this->view->contacts       = $contacts;
        $this->view->pinyinContacts = commonModel::convert2Pinyin($contactPairs);
        $this->display();
    }

    /**
     * Trash 
     * 
     * @param  string $type all|hidden 
     * @param  string $orderBy 
     * @param  int    $recTotal 
     * @param  int    $recPerPage 
     * @param  int    $pageID 
     * @access public
     * @return void
     */
    public function trash($type = 'all', $orderBy = 'id_desc', $recTotal = 0, $recPerPage = 20, $pageID = 1)
    {
        $this->lang->menuGroups->action = 'system';
        $this->lang->action->menu       = $this->lang->system->menu;
        $this->lang->action->menuOrder  = $this->lang->system->menuOrder;

        /* Save session. */
        $uri = $this->app->getURI(true);
        $this->session->set('projectList', $uri);
        $this->session->set('taskList',    $uri);
        $this->session->set('docList',     $uri);

        /* Get deleted objects. */
        $this->app->loadClass('pager', $static = true);
        $pager = pager::init($recTotal, $recPerPage, $pageID);

        $trashes = $this->action->getTrashes($type, $orderBy, $pager);

        /* Title and position. */
        $this->view->title   = $this->lang->action->trash;
        $this->view->trashes = $trashes;
        $this->view->type    = $type;
        $this->view->orderBy = $orderBy;
        $this->view->pager   = $pager;
        $this->view->users   = $this->loadModel('user')->getPairs();
        $this->display();
    }

    /**
     * Hide an deleted object. 
     * 
     * @param  int    $actionID 
     * @access public
     * @return void
     */
    public function hideOne($actionID)
    {
        $this->action->hideOne($actionID);
        $this->send(array('result' => 'success', 'locate' => inlink('trash')));
    }

    /**
     * Hide all deleted objects.
     * 
     * @param  string $confirm 
     * @access public
     * @return void
     */
    public function hideAll($confirm = 'no')
    {
        $this->action->hideAll();
        $this->send(array('result' => 'success', 'locate' => inlink('trash', "type=hidden")));
    }

    /**
     * Undelete an object.
     * 
     * @param  int    $actionID 
     * @access public
     * @return void
     */
    public function undelete($actionID)
    {
        $this->action->undelete($actionID);
        $this->send(array('result' => 'success', 'locate' => $this->server->http_referer));
    }

    /**
     * read a notice.
     * 
     * @param  int    $actionID 
     * @param  string $type 
     * @access public
     * @return void
     */
    public function read($actionID, $type = 'action')
    {
        $this->action->read($actionID, $type);
        die('success');
    }

    /**
     * Finish a dating.
     * 
     * @param  int    $id 
     * @access public
     * @return void
     */
    public function finishDating($id)
    {
        $user = $this->app->user->account;

        $dating = $this->action->getDatingById($id);
        if($dating->status != 'wait') $this->send(array('result' => 'success'));
        if($this->app->user->admin != 'super' && $dating->account != $user && $dating->createdBy != $user) $this->send(array('result' => 'fail', 'message' => $this->lang->admin->record->finishDenied));

        $dating->status     = 'done';
        $dating->editedBy   = $user;
        $dating->editedDate = helper::now();
        $this->dao->update(TABLE_DATING)->data($dating)->where('id')->eq($id)->exec();

        $this->action->updateOriginTable($dating->objectType, $dating->objectID);

        $this->send(array('result' => 'success'));
    }

    /**
     * Delete a dating.
     * 
     * @param  int    $id 
     * @access public
     * @return void
     */
    public function deleteDating($id)
    {
        $dating = $this->action->getDatingById($id);
        if($dating->status != 'wait') $this->send(array('result' => 'fail', 'message' => $this->lang->action->record->deleteFail));
        if($this->app->user->admin != 'super' && $dating->createdBy != $this->app->user->account) $this->send(array('result' => 'fail', 'message' => $this->lang->admin->record->deleteDenied));

        $this->dao->delete()->from(TABLE_DATING)->where('id')->eq($id)->exec();

        $this->action->updateOriginTable($dating->objectType, $dating->objectID);

        $this->send(array('result' => 'success'));
    }
}
