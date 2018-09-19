<?php
/**
 * The control file of queue of RanZhi.
 *
 * @copyright   Copyright 2009-2015 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Memory <lvtao@cnezsoft.com>
 * @package     queue
 * @version     $Id$
 * @link        http://www.ranzhi.org
 */
class queue extends control
{
    /**
     * Index
     *
     * @access public
     * @return void
     */
    public function index()
    {
        foreach($this->lang->message->typeList as $type => $typeName)
        {
            if(isset($this->config->message->typeLink[$type]))
            {
                list($moduleName, $methodName) = explode('|', $this->config->message->typeLink[$type]);
                if(common::hasPriv($moduleName, $methodName)) $this->locate($this->createLink($moduleName, $methodName));
            }
        }

        if(common::hasPriv('message', 'setting')) $this->locate($this->createLink('message', 'setting'));
    }

    /**
     * Setting
     *
     * @access public
     * @return void
     */
    public function setting()
    {
        if($_POST)
        {
            $data = fixer::input('post')->get();
            $data->messageSetting = json_encode($data->messageSetting);
            $this->loadModel('setting')->setItem('system.message.setting', $data->messageSetting);
            die(js::reload('parent'));
        }

        $this->loadModel('webhook');
        $this->loadModel('action');

        $this->view->title      = $this->lang->message->setting;
        $this->view->position[] = $this->lang->message->common;
        $this->view->position[] = $this->lang->message->setting;

        $users = $this->loadModel('user')->getPairs('noletter');
        unset($users['']);

        $this->view->users         = $users;
        $this->view->objectTypes   = $this->message->getObjectTypes();
        $this->view->objectActions = $this->message->getObjectActions();
        $this->display();
    }

    /**
     * Ajax get message.
     *
     * @access public
     * @return void
     */
    public function ajaxGetMessage($windowBlur = false)
    {
        $waitMessages = $this->message->getMessages('wait');
        $todos = $this->message->getNoticeTodos();
        if(empty($waitMessages) and empty($todos)) die();

        $messages = '';
        $newline  = $windowBlur ? "\n" : '<br />';
        $idList   = array();
        foreach($waitMessages as $message)
        {
            $messages .= $message->data . $newline;
            $idList[]  = $message->id;
        }
        $this->dao->update(TABLE_NOTIFY)->set('status')->eq('sent')->set('sendTime')->eq(helper::now())->where('id')->in($idList)->exec();

        foreach($todos as $todo) $messages .= $todo->data . $newline;
        if($windowBlur) $messages = strip_tags($messages);

        if($windowBlur)
        {
            echo json_encode(array('message' => $messages));
        }
        else
        {
            echo <<<EOT
<div class='alert alert-info with-icon alert-dismissable' style='width:380px; position:fixed; bottom:25px; right:15px; z-index: 9999;'>
   <i class='icon icon-envelope-alt'>  </i>
   <div class='content'>{$messages}</div>
   <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
 </div>
EOT;
        }

        $this->dao->delete()->from(TABLE_NOTIFY)->where('objectType')->eq('message')->andWhere('status')->ne('wait')->exec();
    }

    /**
     * Processing queues.
     * @access public
     * @return void
     */
    public function getQueue()
    {
        $queueList = $this->queue->getQueues('wait');
        if(empty($queueList))
        {
            echo "ok\n";
            return;
        }
        $this->dao->update(TABLE_QUEUE)->set('status')->eq('sent')->set('sendTime')->eq(helper::now())->where('id')->in(array_keys($queueList))->exec();
        foreach($queueList as $queue)
        {
            $this->queue->send($queue);
        }
        $this->dao->delete()->from(TABLE_QUEUE)->where('status')->eq('sent')->exec();
        echo "ok\n";
    }

    /**
     * Check for additional.
     * @account public
     * @return void
     */
    public function additional()
    {
        $this->loadModel('todo')->notCreateTodo();
        echo "ok\n";
    }
}
