<?php
/**
 * The config file of feedback module of Ranzhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商业软件，非开源软件
 * @author      Yidong Wang <yidong@cnezsoft.com>
 * @package     feedback 
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */
$config->feedback->editor = new stdclass();
$config->feedback->editor->create   = array('id' => 'desc', 'tools' => 'simple');
$config->feedback->editor->edit     = array('id' => 'desc', 'tools' => 'simple');
$config->feedback->editor->view     = array('id' => 'reply,lastComment,doubt', 'tools' => 'simple');
$config->feedback->editor->close    = array('id' => 'comment', 'tools' => 'simple');
$config->feedback->editor->activate = array('id' => 'comment', 'tools' => 'simple');
$config->feedback->editor->assignto = array('id' => 'comment', 'tools' => 'simple');

$config->feedback->require = new stdclass();
$config->feedback->require->create   = 'product,customer,contact,title';
$config->feedback->require->edit     = 'product,customer,contact,title';
$config->feedback->require->reply    = 'reply';
$config->feedback->require->doubt    = 'doubt';
$config->feedback->require->assignto = 'assignedTo';
$config->feedback->require->close    = 'closedReason';
$config->feedback->require->activate = 'assignedTo';

global $lang;
$config->feedback->search['module'] = 'feedback';

$config->feedback->search['fields']['product']        = $lang->feedback->product;
$config->feedback->search['fields']['customer']       = $lang->feedback->customer;
$config->feedback->search['fields']['contact']        = $lang->feedback->contact;
$config->feedback->search['fields']['pri']            = $lang->feedback->pri;
$config->feedback->search['fields']['title']          = $lang->feedback->title;
$config->feedback->search['fields']['desc']           = $lang->feedback->desc;
$config->feedback->search['fields']['addedBy']        = $lang->feedback->addedBy;
$config->feedback->search['fields']['addedDate']      = $lang->feedback->addedDate;
$config->feedback->search['fields']['assignedTo']     = $lang->feedback->assignedTo;
$config->feedback->search['fields']['assignedBy']     = $lang->feedback->assignedBy;
$config->feedback->search['fields']['assignedDate']   = $lang->feedback->assignedDate;
$config->feedback->search['fields']['repliedBy']      = $lang->feedback->repliedBy;
$config->feedback->search['fields']['repliedDate']    = $lang->feedback->repliedDate;
$config->feedback->search['fields']['transferedBy']   = $lang->feedback->transferedBy;
$config->feedback->search['fields']['transferedDate'] = $lang->feedback->transferedDate;
$config->feedback->search['fields']['editedBy']       = $lang->feedback->editedBy;
$config->feedback->search['fields']['editedDate']     = $lang->feedback->editedDate;
$config->feedback->search['fields']['closedBy']       = $lang->feedback->closedBy;
$config->feedback->search['fields']['closedDate']     = $lang->feedback->closedDate;
$config->feedback->search['fields']['closedReason']   = $lang->feedback->closedReason;
$config->feedback->search['fields']['activatedBy']    = $lang->feedback->activatedBy;
$config->feedback->search['fields']['activatedDate']  = $lang->feedback->activatedDate;
$config->feedback->search['fields']['status']         = $lang->feedback->status;

$config->feedback->search['params']['product']        = array('operator' => '=',       'control' => 'select', 'values' => 'products');
$config->feedback->search['params']['customer']       = array('operator' => '=',       'control' => 'select', 'values' => 'set in control');
$config->feedback->search['params']['contact']        = array('operator' => '=',       'control' => 'select', 'values' => 'contacts');
$config->feedback->search['params']['pri']            = array('operator' => '=',       'control' => 'select', 'values' => $lang->feedback->priList);
$config->feedback->search['params']['title']          = array('operator' => 'include', 'control' => 'input',  'values' => '');
$config->feedback->search['params']['desc']           = array('operator' => 'include', 'control' => 'input',  'values' => '');
$config->feedback->search['params']['addedBy']        = array('operator' => '=',       'control' => 'select', 'values' => 'users');
$config->feedback->search['params']['addedDate']      = array('operator' => '=',       'control' => 'input',  'values' => '', 'class' => 'date');
$config->feedback->search['params']['assignedTo']     = array('operator' => '=',       'control' => 'select', 'values' => 'users');
$config->feedback->search['params']['assignedBy']     = array('operator' => '=',       'control' => 'select', 'values' => 'users');
$config->feedback->search['params']['assignedDate']   = array('operator' => '>=',      'control' => 'input',  'values' => '', 'class' => 'date');
$config->feedback->search['params']['repliedBy']      = array('operator' => '=',       'control' => 'select', 'values' => 'users');
$config->feedback->search['params']['repliedDate']    = array('operator' => '>=',      'control' => 'input',  'values' => '', 'class' => 'date');
$config->feedback->search['params']['transferedBy']   = array('operator' => '=',       'control' => 'select', 'values' => 'users');
$config->feedback->search['params']['transferedDate'] = array('operator' => '>=',      'control' => 'input',  'values' => '', 'class' => 'date');
$config->feedback->search['params']['editedBy']       = array('operator' => '=',       'control' => 'select', 'values' => 'users');
$config->feedback->search['params']['editedDate']     = array('operator' => '>=',      'control' => 'input',  'values' => '', 'class' => 'date');
$config->feedback->search['params']['closedBy']       = array('operator' => '=',       'control' => 'select', 'values' => 'users');
$config->feedback->search['params']['closedDate']     = array('operator' => '>=',      'control' => 'input',  'values' => '', 'class' => 'date');
$config->feedback->search['params']['closedReason']   = array('operator' => 'include', 'control' => 'input',  'values' => '');
$config->feedback->search['params']['activatedBy']    = array('operator' => '=',       'control' => 'select', 'values' => 'users');
$config->feedback->search['params']['activatedDate']  = array('operator' => '>=',      'control' => 'input',  'values' => '', 'class' => 'date');
$config->feedback->search['params']['status']         = array('operator' => '=',       'control' => 'select', 'values' => $lang->feedback->statusList);
