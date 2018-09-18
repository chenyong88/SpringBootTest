<?php
/**
 * The ext order module zh-tw file of Ranzhi.
 *
 * @copyright   Copyright 2009-2016 青島易軟天創網絡科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商業軟件，非開源軟件
 * @author      Xiying Guan <guanxiying@xirangit.com>
 * @package     order
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */
$lang->order->createTasks = '創建任務';
$lang->order->team        = '團隊';

$lang->team = new stdclass();
$lang->team->account = '用戶名';
$lang->team->role    = '角色';

$lang->order->fields = array();
$lang->order->fields['plan'] = new stdclass();
$lang->order->fields['plan']->field   = 'plan';
$lang->order->fields['plan']->control = 'input';

$lang->order->fields['real'] = new stdclass();
$lang->order->fields['real']->field   = 'real';
$lang->order->fields['real']->control = 'input';

$lang->order->fields['status'] = new stdclass();
$lang->order->fields['status']->field   = 'status';
$lang->order->fields['status']->control = 'select';
$lang->order->fields['status']->options = $lang->order->statusList;

$lang->order->fields['assignedTo'] = new stdclass();
$lang->order->fields['assignedTo']->field   = 'assignedTo';
$lang->order->fields['assignedTo']->control = 'input';

$lang->order->fields['assignedBy'] = new stdclass();
$lang->order->fields['assignedBy']->field   = 'assignedBy';
$lang->order->fields['assignedBy']->control = 'input';

$lang->order->fields['assignedDate'] = new stdclass();
$lang->order->fields['assignedDate']->field   = 'assignedDate';
$lang->order->fields['assignedDate']->control = 'input';

$lang->order->fields['signedBy'] = new stdclass();
$lang->order->fields['signedBy']->field   = 'signedBy';
$lang->order->fields['signedBy']->control = 'input';

$lang->order->fields['signedDate'] = new stdclass();
$lang->order->fields['signedDate']->field   = 'signedDate';
$lang->order->fields['signedDate']->control = 'input';

$lang->order->fields['closedBy'] = new stdclass();
$lang->order->fields['closedBy']->field   = 'closedBy';
$lang->order->fields['closedBy']->control = 'input';

$lang->order->fields['closedDate'] = new stdclass();
$lang->order->fields['closedDate']->field   = 'closedDate';
$lang->order->fields['closedDate']->control = 'input';

$lang->order->fields['closedReason'] = new stdclass();
$lang->order->fields['closedReason']->field   = 'closedReason';
$lang->order->fields['closedReason']->control = 'select';
$lang->order->fields['closedReason']->options = $lang->order->closedReasonList;

$lang->order->fields['activatedBy'] = new stdclass();
$lang->order->fields['activatedBy']->field   = 'activatedBy';
$lang->order->fields['activatedBy']->control = 'input';

$lang->order->fields['activatedDate'] = new stdclass();
$lang->order->fields['activatedDate']->field   = 'activatedDate';
$lang->order->fields['activatedDate']->control = 'input';

$lang->order->fields['contactedBy'] = new stdclass();
$lang->order->fields['contactedBy']->field   = 'contactedBy';
$lang->order->fields['contactedBy']->control = 'input';

$lang->order->fields['contactedDate'] = new stdclass();
$lang->order->fields['contactedDate']->field   = 'contactedDate';
$lang->order->fields['contactedDate']->control = 'input';

$lang->order->logicalOperators = array();
$lang->order->logicalOperators['']    = '';
$lang->order->logicalOperators['and'] = '並且';
$lang->order->logicalOperators['or']  = '或者';

$lang->order->operaterList = array();
$lang->order->operaterList['']         = '';
$lang->order->operaterList['equal']    = '等於';
$lang->order->operaterList['notequal'] = '不等於';
$lang->order->operaterList['gt']       = '大於';
$lang->order->operaterList['ge']       = '大於等於';
$lang->order->operaterList['lt']       = '小於';
$lang->order->operaterList['le']       = '小於等於';

$lang->order->resultsOptions = array();
$lang->order->resultsOptions['today']       = '操作日期';
$lang->order->resultsOptions['now']         = '操作時間';
$lang->order->resultsOptions['actor']       = '操作人';
$lang->order->resultsOptions['userdefined'] = '自定義';
