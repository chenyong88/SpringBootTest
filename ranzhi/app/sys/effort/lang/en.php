<?php
/**
 * The en file of effort module of RanZhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商业软件，非开源软件
 * @author      Tingting Dai <daitingting@xirangit.com>
 * @package     effort 
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */
$lang->effort->common          = 'EFFORT';
$lang->effort->index           = "Index";
$lang->effort->create          = "Create";
$lang->effort->batchCreate     = "Create";
$lang->effort->createForObject = "Create for object";
$lang->effort->edit            = "Edit";
$lang->effort->batchEdit       = "Batch edit";
$lang->effort->view            = "Info";
$lang->effort->viewAB          = "Info";
$lang->effort->comment         = 'Comment';
$lang->effort->export          = "Export";
$lang->effort->delete          = "Delete";
$lang->effort->browse          = "Browse";
$lang->effort->history         = "History";
$lang->effort->hour            = "hour";
$lang->effort->clean           = "Clean";

$lang->effort->id          = 'ID';
$lang->effort->account     = 'Owner';
$lang->effort->date        = 'Date';
$lang->effort->left        = 'Left';
$lang->effort->consumed    = 'Consumed';
$lang->effort->objectType  = 'objectType';
$lang->effort->objectID    = 'objectID';
$lang->effort->work        = 'Work';
$lang->effort->deal        = 'deal with ';
$lang->effort->allDept     = 'All';

$lang->effort->calendar     = 'Calendar';
$lang->effort->month        = 'This Month';
$lang->effort->week         = '(l)';  // date function's param.
$lang->effort->today        = 'Today';
$lang->effort->weekDateList = '';

$lang->effort->objectTypeList['custom']   = '';
$lang->effort->objectTypeList['task']     = 'Task';
$lang->effort->objectTypeList['todo']     = 'TODO';
$lang->effort->objectTypeList['customer'] = 'Customer';
$lang->effort->objectTypeList['order']    = 'Order';
$lang->effort->objectTypeList['contract'] = 'Contract';

$lang->effort->todayEfforts     = 'Today';
$lang->effort->yesterdayEfforts = 'Yesterday';
$lang->effort->thisWeekEfforts  = 'Thisweek';
$lang->effort->lastWeekEfforts  = 'Lastweek';
$lang->effort->thisMonthEfforts = 'Thismonth';
$lang->effort->lastMonthEfforts = 'Lastmonth';
$lang->effort->allDaysEfforts   = 'All';

$lang->effort->notEmpty          = 'must be not empty.';
$lang->effort->notNegative       = "must be not negative.";
$lang->effort->isNumber          = 'must be number.';
$lang->effort->tooLong           = 'Effore content of ID%s is too lang.';
$lang->effort->nowork            = "Work content of ID%s must be not empty!";
$lang->effort->notice            = '(notice:1.if the %s is empty, it is invalid;2.if the %s is not equal %s and %s is empty, it is invalid)';
$lang->effort->confirmDelete     = "Are you sure to delete this effort?";
$lang->effort->noticeClean       = "Only removal of all system generated effort";
$lang->effort->noticeFinish      = "There are log that left is zero, the system will automatically complete the task, do you want to continue?";
$lang->effort->noticeSaveRecord  = 'Please save the estimate record which has not been saved.';

$lang->effort->weekly = new stdclass();
$lang->effort->weekly->common      = 'Weekly';
$lang->effort->weekly->id          = 'ID';
$lang->effort->weekly->date        = 'Date';
$lang->effort->weekly->dateRange   = 'Date Range';
$lang->effort->weekly->title       = 'Title';
$lang->effort->weekly->summary     = 'Summary';
$lang->effort->weekly->week        = 'Week';
$lang->effort->weekly->content     = 'Content';
$lang->effort->weekly->status      = 'Status';
$lang->effort->weekly->createdBy   = 'Created By';
$lang->effort->weekly->createdDate = 'Created Date';
$lang->effort->weekly->editedBy    = 'Edited By';
$lang->effort->weekly->editedDate  = 'Edited Date';

$lang->effort->weekly->browse = 'Browse Weekly';
$lang->effort->weekly->create = 'Create Weekly';
$lang->effort->weekly->edit   = 'Edit Weekly';
$lang->effort->weekly->delete = 'Delete Weekly';
$lang->effort->weekly->view   = 'View';

$lang->effort->weekly->statusList['draft']  = 'Draft';
$lang->effort->weekly->statusList['normal'] = 'Normal';

$lang->effort->weekly->weekList[0] = 'Sunday';
$lang->effort->weekly->weekList[1] = 'Monday';
$lang->effort->weekly->weekList[2] = 'Tuesday';
$lang->effort->weekly->weekList[3] = 'Wednesday';
$lang->effort->weekly->weekList[4] = 'Thursday';
$lang->effort->weekly->weekList[5] = 'Friday';
$lang->effort->weekly->weekList[6] = 'Saturday';
