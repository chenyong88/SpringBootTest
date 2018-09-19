<?php
/**
 * The zh-cn file of feedback module of Ranzhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商业软件，非开源软件
 * @author      Yidong wang <yidong@cnezsoft.com>
 * @package     feedback 
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */
if(!isset($lang->feedback)) $lang->feedback = new stdclass();

$lang->feedback->common   = 'Feedback';
$lang->feedback->browse   = 'Browse';
$lang->feedback->company  = 'Company';
$lang->feedback->personal = 'Assign To Me';
$lang->feedback->create   = 'Create';
$lang->feedback->list     = 'List';
$lang->feedback->edit     = 'Edit';
$lang->feedback->view     = 'View';
$lang->feedback->assignTo = 'Assign To';
$lang->feedback->close    = 'Close';
$lang->feedback->activate = 'Activate';
$lang->feedback->delete   = 'Delete';
$lang->feedback->transfer = 'Transfer';
$lang->feedback->reply    = 'Reply';
$lang->feedback->doubt    = 'Doubt';

$lang->feedback->id             = 'ID';
$lang->feedback->product        = 'Product';
$lang->feedback->customer       = 'Customer';
$lang->feedback->contact        = 'Contact';
$lang->feedback->pri            = 'Pri';
$lang->feedback->title          = 'Title';
$lang->feedback->desc           = 'Desc';
$lang->feedback->type           = 'Type';
$lang->feedback->addedBy        = 'Added By';
$lang->feedback->addedDate      = 'Added Date';
$lang->feedback->assignedTo     = 'Assigned To';
$lang->feedback->assignedBy     = 'Assigned By';
$lang->feedback->assignedDate   = 'Assigned Date';
$lang->feedback->repliedBy      = 'Replied By';
$lang->feedback->repliedDate    = 'Replied Date';
$lang->feedback->transferedBy   = 'Transfered By';
$lang->feedback->transferedDate = 'Transfered Date';
$lang->feedback->editedBy       = 'Edited By';
$lang->feedback->editedDate     = 'Edited Date';
$lang->feedback->closedBy       = 'Closed By';
$lang->feedback->closedDate     = 'Closed Date';
$lang->feedback->closedReason   = 'Closed Reason';
$lang->feedback->activatedBy    = 'Activated By';
$lang->feedback->activatedDate  = 'Activated Date';
$lang->feedback->status         = 'Status';

$lang->feedback->lblPri = 'P';

$lang->feedback->legendBasic  = 'Basic Info';
$lang->feedback->legendEffort = 'Lifetime';

$lang->feedback->typeList['feedback'] = 'Feedback';
$lang->feedback->typeList['idea']     = 'Idea';

$lang->feedback->priList[0] = '';
$lang->feedback->priList[3] = 3;
$lang->feedback->priList[1] = 1;
$lang->feedback->priList[2] = 2;
$lang->feedback->priList[4] = 4;

$lang->feedback->statusList['']           = '';
$lang->feedback->statusList['wait']       = 'Wait';
$lang->feedback->statusList['viewed']     = 'Viewed';
$lang->feedback->statusList['replied']    = 'Replied';
$lang->feedback->statusList['doubted']    = 'Doubted';
$lang->feedback->statusList['transfered'] = 'Transfered';
$lang->feedback->statusList['closed']     = 'Closed';

$lang->feedback->closedReasonList['']        = '';
$lang->feedback->closedReasonList['done']    = 'Done';
$lang->feedback->closedReasonList['storied'] = 'Storied';
$lang->feedback->closedReasonList['buged']   = 'Buged';

/* For fields check. */
$lang->issue = clone $lang->feedback;
