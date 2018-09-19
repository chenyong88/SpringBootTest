<?php
if(!isset($config->salary)) $config->salary = new stdclass();

$config->salary->commission = new stdclass();
$config->salary->commission->defaultRule = 'both';

$config->salary->fields       = array('basic', 'benefit', 'bonus', 'allowance', 'exemption', 'deduction', 'deserved', 'actual', 'companySSF', 'companyHPF');
$config->salary->userFields   = array('realname', 'dept');
$config->salary->basicFields  = array('basic', 'benefit', 'deserved', 'actual');
$config->salary->detailFields = array('bonus', 'allowance', 'exemption', 'deduction');
$config->salary->numberFields = $config->salary->fields; 
$config->salary->customWidth  = array('basic' => 12, 'benefit' => 12, 'deserved' => 12, 'actual' => 12, 'companySSF' => 15, 'companyHPF' => 18);

$config->salary->tax = new stdclass();
$config->salary->tax->start = 3500;
    
$config->salary->tax->money[1] = 0;
$config->salary->tax->money[2] = 1500;
$config->salary->tax->money[3] = 4500;
$config->salary->tax->money[4] = 9000;
$config->salary->tax->money[5] = 35000;
$config->salary->tax->money[6] = 55000;
$config->salary->tax->money[7] = 80000;

$config->salary->tax->rate[1] = 3/100;
$config->salary->tax->rate[2] = 10/100;
$config->salary->tax->rate[3] = 20/100;
$config->salary->tax->rate[4] = 25/100;
$config->salary->tax->rate[5] = 30/100;
$config->salary->tax->rate[6] = 35/100;
$config->salary->tax->rate[7] = 45/100;

$config->salary->tax->deduction[1] = 0;
$config->salary->tax->deduction[2] = 105;
$config->salary->tax->deduction[3] = 555;
$config->salary->tax->deduction[4] = 1005;
$config->salary->tax->deduction[5] = 2755;
$config->salary->tax->deduction[6] = 5505;
$config->salary->tax->deduction[7] = 13505;

global $lang;
$config->salary->search['module'] = 'salary';

$config->salary->search['fields']['dept']    = $lang->salary->dept;
$config->salary->search['fields']['account'] = $lang->salary->account;
$config->salary->search['fields']['month']   = $lang->salary->month;

$config->salary->search['params']['dept']    = array('operator' => '=', 'control' => 'select', 'values' => 'set in control');
$config->salary->search['params']['account'] = array('operator' => '=', 'control' => 'select', 'values' => 'users');
$config->salary->search['params']['month']   = array('operator' => '=', 'control' => 'select', 'values' => 'set in control');

/* Excel items. */
$config->excel->freeze->salaryDetail = 'item';
