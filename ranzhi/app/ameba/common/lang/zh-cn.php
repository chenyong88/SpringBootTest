<?php
$lang->internalExpense['basic']     = '岗位工资';
$lang->internalExpense['benefit']   = '绩效';
$lang->internalExpense['bonus']     = '提成';
$lang->internalExpense['allowance'] = '福利';
$lang->internalExpense['SSF']       = '社保';
$lang->internalExpense['HPF']       = '公积金';
$lang->internalExpense['tax']       = '税费';

$lang->shareExpense['shareLaborCost'] = '公摊人力成本';

if(!isset($lang->app)) $lang->app = new stdclass();
$lang->app->name = '阿米巴';

if(!isset($lang->menu)) $lang->menu = new stdclass();
if(!isset($lang->menu->ameba)) $lang->menu->ameba = new stdclass();
$lang->menu->ameba->amebareport = '报表|amebareport|index|';
$lang->menu->ameba->deal        = '交易|deal|index|';
$lang->menu->ameba->budget      = '预算|budget|index|';
$lang->menu->ameba->fee         = '规则|fee|index|';
$lang->menu->ameba->category    = '科目|tree|browse|type=amebaAccount';
$lang->menu->ameba->ameba       = '组织|ameba|index|';

$lang->ameba = new stdclass();
$lang->ameba->menu = new stdclass();
$lang->ameba->menu->index = '组织结构图|ameba|index|';

$lang->amebareport = new stdclass();
$lang->amebareport->menu = new stdclass();
$lang->amebareport->menu->month = '月报表|amebareport|monthlyReport|';
$lang->amebareport->menu->week  = '周报表|amebareport|weeklyReport|';
$lang->amebareport->menu->day   = '日报表|amebareport|dailyReport|';

$lang->deal = new stdclass();
$lang->deal->menu = new stdclass();

$lang->budget = new stdclass();
$lang->budget->menu = new stdclass();
$lang->budget->menu->report = array('link' => '报表|budget|report|', 'alias' => 'create, batchcreate, edit, view');
$lang->budget->menu->browse = '列表|budget|browse|';

$lang->fee = new stdclass();
$lang->fee->menu = new stdclass(); 
$lang->fee->menu->browse = array('link' => '分摊费用|fee|browse|', 'alias' => 'create, edit, view');
$lang->fee->menu->rule   = '分配收入|rule|browse|';

$lang->rule = new stdclass();
$lang->rule->menu = new stdclass();
$lang->rule->menu->fee    = '分摊费用|fee|browse|';
$lang->rule->menu->browse = array('link' => '分配收入|rule|browse|', 'alias' => 'create, edit, view');

$lang->menuGroups->rule = 'fee';
