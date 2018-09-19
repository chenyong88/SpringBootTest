<?php
$lang->internalExpense['basic']     = 'Basic';
$lang->internalExpense['benefit']   = 'Benefit';
$lang->internalExpense['bonus']     = 'Bonus';
$lang->internalExpense['allowance'] = 'Allowance';
$lang->internalExpense['SSF']       = 'SSF';
$lang->internalExpense['HPF']       = 'HPF';
$lang->internalExpense['tax']       = 'Tax';

$lang->shareExpense['shareLaborCost'] = 'Labor Cost to Share';

if(!isset($lang->app)) $lang->app = new stdclass();
$lang->app->name = 'AMEBA';

if(!isset($lang->menu)) $lang->menu = new stdclass();
if(!isset($lang->menu->ameba)) $lang->menu->ameba = new stdclass();
$lang->menu->ameba->amebareport = 'Report|amebareport|index|';
$lang->menu->ameba->deal        = 'Trade|deal|index|';
$lang->menu->ameba->budget      = 'Budget|budget|index|';
$lang->menu->ameba->fee         = 'Rule|fee|index|';
$lang->menu->ameba->category    = 'Category|tree|browse|type=amebaAccount';
$lang->menu->ameba->ameba       = 'Company|ameba|index|';

$lang->ameba = new stdclass();
$lang->ameba->menu = new stdclass();
$lang->ameba->menu->index = 'Company|ameba|index|';

$lang->amebareport = new stdclass();
$lang->amebareport->menu = new stdclass();
$lang->amebareport->menu->month = 'Monthly Report|amebareport|monthlyReport|';
$lang->amebareport->menu->week  = 'Weekly Report|amebareport|weeklyReport|';
$lang->amebareport->menu->day   = 'Daily Report|amebareport|dailyReport|';

$lang->deal = new stdclass();
$lang->deal->menu = new stdclass();

$lang->budget = new stdclass();
$lang->budget->menu = new stdclass();
$lang->budget->menu->report = array('link' => 'Report|budget|report|', 'alias' => 'create, batchcreate, edit, view');
$lang->budget->menu->browse = 'Budget List|budget|browse|';

$lang->fee = new stdclass();
$lang->fee->menu = new stdclass(); 
$lang->fee->menu->browse = array('link' => 'Expense Share Rules|fee|browse|', 'alias' => 'create, edit, view');
$lang->fee->menu->rule   = 'Income Share Rules|rule|browse|';

$lang->rule = new stdclass();
$lang->rule->menu = new stdclass();
$lang->rule->menu->fee    = 'Expense Share Rules|fee|browse|';
$lang->rule->menu->browse = array('link' => 'Income Share Rules|rule|browse|', 'alias' => 'create, edit, view');

$lang->menuGroups->rule = 'fee';
