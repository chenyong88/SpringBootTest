<?php
if(!isset($lang->rule)) $lang->rule = new stdclass();
$lang->rule->common      = 'Income Share Rules';
$lang->rule->browse      = 'Browse';
$lang->rule->create      = 'Create';
$lang->rule->edit        = 'Edit';
$lang->rule->view        = 'View';
$lang->rule->delete      = 'Delete';
$lang->rule->share       = 'Share';
$lang->rule->sharedRules = 'Shared Details';
$lang->rule->basic       = 'Basic Info';
$lang->rule->detail      = 'Details';
$lang->rule->fee         = 'Expense Share Rules';

$lang->rule->id           = 'ID';
$lang->rule->year         = 'Year';
$lang->rule->month        = 'Month';
$lang->rule->product      = 'Product';
$lang->rule->category     = 'Income Category';
$lang->rule->from         = 'From Dept';
$lang->rule->fromCategory = 'From Category';
$lang->rule->to           = 'To Dept';
$lang->rule->toCategory   = 'To Category';
$lang->rule->rate         = 'Share Rate';
$lang->rule->desc         = 'Desc';
$lang->rule->createdBy    = 'Created By';
$lang->rule->createdDate  = 'Created Date';
$lang->rule->editedBy     = 'Edited By';
$lang->rule->editedDate   = 'Edited Date';
$lang->rule->total        = 'Total';

$lang->rule->monthList['']   = '';
$lang->rule->monthList['01'] = 'Jan.';
$lang->rule->monthList['02'] = 'Feb.';
$lang->rule->monthList['03'] = 'Mar.';
$lang->rule->monthList['04'] = 'Apr.';
$lang->rule->monthList['05'] = 'May.';
$lang->rule->monthList['06'] = 'Jun.';
$lang->rule->monthList['07'] = 'Jul.';
$lang->rule->monthList['08'] = 'Aug.';
$lang->rule->monthList['09'] = 'Sep.';
$lang->rule->monthList['10'] = 'Oct.';
$lang->rule->monthList['11'] = 'Nov.';
$lang->rule->monthList['12'] = 'Dec.';

$lang->rule->shareTips = 'The record with same to dept will be ignored except the last one. The record with empty item will be ignored.';

$lang->rule->error = new stdclass();
$lang->rule->error->shareLimited = 'Access Limited.';
$lang->rule->error->exist        = 'A record with same from dept, same year, same product and same category exists.';
$lang->rule->error->bothEmpty    = '<strong>Product</strong> and <strong>Income Category</strong> can bot be empty at the same time.';
$lang->rule->error->totalRate    = 'The sum of share rate must be less than 100%.';

$lang->ameba_rule = $lang->rule;
