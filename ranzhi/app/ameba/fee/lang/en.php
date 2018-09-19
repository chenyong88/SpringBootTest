<?php
/**
 * The zh-cn lang file of fee module of Ranzhi.
 *
 * @copyright   Copyright 2009-2017 青岛易软天创网络科技有限公司 
 * @license     商业软件，非开源软件
 * @author      Gang Liu
 * @package     fee 
 * @version     $Id$
 * @link        http://www.ranzhi.org 
 */
if(!isset($lang->fee)) $lang->fee = new stdclass();
$lang->fee->common     = 'Expense Share Rules';
$lang->fee->browse     = 'Browse';
$lang->fee->create     = 'Create';
$lang->fee->edit       = 'Edit';
$lang->fee->view       = 'View Detail';
$lang->fee->delete     = 'Delete';
$lang->fee->share      = 'Share';
$lang->fee->sharedFees = 'Shared Details';
$lang->fee->basic      = 'Basic Info';
$lang->fee->detail     = 'Detail';
$lang->fee->rule       = 'Income Share Rules';

$lang->fee->id          = 'ID';
$lang->fee->year        = 'Year';
$lang->fee->month       = 'Month';
$lang->fee->type        = 'Type';
$lang->fee->category    = 'Category';
$lang->fee->dept        = 'Dept';
$lang->fee->period      = 'Period';
$lang->fee->shareType   = 'Share Type';
$lang->fee->money       = 'Money';
$lang->fee->desc        = 'Desc';
$lang->fee->createdBy   = 'Created By';
$lang->fee->createdDate = 'Created Date';
$lang->fee->editedBy    = 'Edited By';
$lang->fee->editedDate  = 'Edited Date';

$lang->fee->rate        = 'Share Rate';
$lang->fee->total       = 'Total';

$lang->fee->typeList['budget'] = 'Budget';
$lang->fee->typeList['period'] = 'Period';

$lang->fee->monthList['']   = '';
$lang->fee->monthList['01'] = 'Jan.';
$lang->fee->monthList['02'] = 'Feb.';
$lang->fee->monthList['03'] = 'Mar.';
$lang->fee->monthList['04'] = 'Apr.';
$lang->fee->monthList['05'] = 'May.';
$lang->fee->monthList['06'] = 'Jun.';
$lang->fee->monthList['07'] = 'Jul.';
$lang->fee->monthList['08'] = 'Aug.';
$lang->fee->monthList['09'] = 'Sep.';
$lang->fee->monthList['10'] = 'Oct.';
$lang->fee->monthList['11'] = 'Nov.';
$lang->fee->monthList['12'] = 'Dec.';

$lang->fee->periodList['year']    = 'Year';
$lang->fee->periodList['quarter'] = 'Quarter';
$lang->fee->periodList['month']   = 'Month';

$lang->fee->shareTypeList['person'] = 'By Person';
$lang->fee->shareTypeList['manual'] = 'Manually';

$lang->fee->moneyTips = 'The money is computed according to budget records.';
$lang->fee->shareTips = 'The record with same dept will be ignored except the last one. The record with empty dept will be ignored.';

$lang->fee->totalMoney = 'The total is %s.';

$lang->fee->error = new stdclass();
$lang->fee->error->shareLimited = 'Access Limited.';
$lang->fee->error->exist        = 'A record with same year and same category and same dept exists.';
$lang->fee->error->totalRate    = 'The sum of share rate must less than 100%.';

$lang->ameba_fee = $lang->fee;
