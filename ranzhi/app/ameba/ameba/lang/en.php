<?php
$lang->ameba->common    = 'Ameba';
$lang->ameba->settings  = 'Ameba Settings';
$lang->ameba->company   = 'Company';
$lang->ameba->dept      = 'Manage Dept';
$lang->ameba->showLevel = 'Display Level';

$lang->ameba->name            = 'Name';
$lang->ameba->type            = 'Type';
$lang->ameba->status          = 'Status';
$lang->ameba->period          = 'Period';
$lang->ameba->beginDate       = 'Begin Date';
$lang->ameba->excludeCategory = 'Exclude Categories';
$lang->ameba->shareDepts      = 'Service Depts';
$lang->ameba->taxRate         = 'Tax Rate';
$lang->ameba->levelFormat     = 'Display level %level%';

$lang->ameba->parent     = 'Parent Dept';
$lang->ameba->children   = 'Sub Dept';
$lang->ameba->moderators = 'Manager';

$lang->ameba->turnonList['1'] = 'On';
$lang->ameba->turnonList['0'] = 'Off';

$lang->ameba->periodList['day']   = 'Day';
$lang->ameba->periodList['week']  = 'Week';
$lang->ameba->periodList['month'] = 'Month';

$lang->ameba->typeList['capital'] = 'Capital';
$lang->ameba->typeList['profit']  = 'Profit';
$lang->ameba->typeList['cost']    = 'Cost';
$lang->ameba->typeList['budget']  = 'Budget';

$lang->ameba->isAmebaDept = 'As ameba';

$lang->ameba->placeholder = new stdclass();
$lang->ameba->placeholder->name = 'Name could be empty.';

$lang->ameba->tips = new stdclass();
$lang->ameba->tips->period            = 'Period of statement.';
$lang->ameba->tips->beginDate         = 'The date begin to run ameba. It is suggested to be 1th of each month.';
$lang->ameba->tips->excludeCategories = 'The exclude categories will be skip when compute share fees.';
$lang->ameba->tips->shareDepts        = 'The expenses of service depts will be shared by other ameba depts.';
$lang->ameba->tips->taxRate           = 'The tax rate is used to compute tax of outcome.';
