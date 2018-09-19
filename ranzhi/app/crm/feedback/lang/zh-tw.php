<?php
/**
 * The zh-tw file of feedback module of Ranzhi.
 *
 * @copyright   Copyright 2009-2016 青島易軟天創網絡科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商業軟件，非開源軟件
 * @author      Yidong wang <yidong@cnezsoft.com>
 * @package     feedback 
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */
if(!isset($lang->feedback)) $lang->feedback = new stdclass();

$lang->feedback->common   = '售後';
$lang->feedback->browse   = '瀏覽問題';
$lang->feedback->company  = '所有問題';
$lang->feedback->personal = '指派給我';
$lang->feedback->create   = '創建問題';
$lang->feedback->list     = '問題列表';
$lang->feedback->edit     = '編輯問題';
$lang->feedback->view     = '查看問題';
$lang->feedback->assignTo = '指派問題';
$lang->feedback->close    = '關閉問題';
$lang->feedback->activate = '激活問題';
$lang->feedback->delete   = '刪除問題';
$lang->feedback->transfer = '轉交';
$lang->feedback->reply    = '回覆';
$lang->feedback->doubt    = '追問';

$lang->feedback->id             = '編號';
$lang->feedback->product        = '所屬產品';
$lang->feedback->customer       = '所屬客戶';
$lang->feedback->contact        = '所屬聯繫人';
$lang->feedback->pri            = '優先順序';
$lang->feedback->title          = '標題';
$lang->feedback->desc           = '問題描述';
$lang->feedback->type           = '類型';
$lang->feedback->addedBy        = '由誰創建';
$lang->feedback->addedDate      = '添加時間';
$lang->feedback->assignedTo     = '指派給';
$lang->feedback->assignedBy     = '由誰指派';
$lang->feedback->assignedDate   = '指派日期';
$lang->feedback->repliedBy      = '由誰回覆';
$lang->feedback->repliedDate    = '回覆日期';
$lang->feedback->transferedBy   = '由誰轉交';
$lang->feedback->transferedDate = '轉交日期';
$lang->feedback->editedBy       = '最後修改';
$lang->feedback->editedDate     = '修改日期';
$lang->feedback->closedBy       = '由誰關閉';
$lang->feedback->closedDate     = '關閉日期';
$lang->feedback->closedReason   = '關閉原因';
$lang->feedback->activatedBy    = '由誰激活';
$lang->feedback->activatedDate  = '激活日期';
$lang->feedback->status         = '狀態';

$lang->feedback->lblPri = 'P';

$lang->feedback->legendBasic  = '基本信息';
$lang->feedback->legendEffort = '問題的一生';

$lang->feedback->typeList['feedback'] = '反饋';
$lang->feedback->typeList['idea']     = '想法';

$lang->feedback->priList[0] = '';
$lang->feedback->priList[3] = 3;
$lang->feedback->priList[1] = 1;
$lang->feedback->priList[2] = 2;
$lang->feedback->priList[4] = 4;

$lang->feedback->statusList['']           = '';
$lang->feedback->statusList['wait']       = '等待處理';
$lang->feedback->statusList['viewed']     = '已查看';
$lang->feedback->statusList['replied']    = '已回覆';
$lang->feedback->statusList['doubted']    = '追問中';
$lang->feedback->statusList['transfered'] = '已轉交';
$lang->feedback->statusList['closed']     = '已關閉';

$lang->feedback->closedReasonList['']        = '';
$lang->feedback->closedReasonList['done']    = '已完成';
$lang->feedback->closedReasonList['storied'] = '轉需求';
$lang->feedback->closedReasonList['buged']   = '轉Bug';

/* For fields check. */
$lang->issue = clone $lang->feedback;
