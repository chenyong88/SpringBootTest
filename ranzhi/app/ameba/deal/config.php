<?php
$config->deal->batchCreateNumber = 10;

$config->deal->require = new stdclass();
$config->deal->require->create  = 'date, amebaAccount, dept, category, money, fromDept, toDept';
$config->deal->require->edit    = 'date, amebaAccount, dept, category, money';
$config->deal->require->confirm = 'date, amebaAccount, dept, category, money';

global $lang, $app;
$config->deal->search['module'] = 'deal';

$config->deal->search['fields']['date']          = $lang->deal->date;
$config->deal->search['fields']['dept']          = $lang->deal->dept;
$config->deal->search['fields']['amebaAccount']  = $lang->deal->amebaAccount;
$config->deal->search['fields']['category']      = $lang->deal->category;
$config->deal->search['fields']['product']       = $lang->deal->product;
$config->deal->search['fields']['type']          = $lang->deal->type;
$config->deal->search['fields']['contract']      = $lang->deal->contract;
$config->deal->search['fields']['money']         = $lang->deal->money;
$config->deal->search['fields']['desc']          = $lang->deal->desc;
$config->deal->search['fields']['status']        = $lang->deal->status;
$config->deal->search['fields']['createdBy']     = $lang->deal->createdBy;
$config->deal->search['fields']['createdDate']   = $lang->deal->createdDate;
$config->deal->search['fields']['confirmedBy']   = $lang->deal->confirmedBy;
$config->deal->search['fields']['confirmedDate'] = $lang->deal->confirmedDate;

$config->deal->search['params']['date']          = array('operator' => '=',       'control' => 'input',  'values' => '', 'class' => 'date');
$config->deal->search['params']['dept']          = array('operator' => '=',       'control' => 'select', 'values' => 'depts');
$config->deal->search['params']['amebaAccount']  = array('operator' => '=',       'control' => 'select', 'values' => array('') + $lang->deal->amebaAccountList);
$config->deal->search['params']['category']      = array('operator' => '=',       'control' => 'select', 'values' => '');
$config->deal->search['params']['product']       = array('operator' => '=',       'control' => 'select', 'values' => '');
$config->deal->search['params']['type']          = array('operator' => '=',       'control' => 'select', 'values' => array('') + $lang->deal->typeList);
$config->deal->search['params']['contract']      = array('operator' => '=',       'control' => 'select', 'values' => '');
$config->deal->search['params']['money']         = array('operator' => '=',       'control' => 'input',  'values' => '');
$config->deal->search['params']['desc']          = array('operator' => 'include', 'control' => 'input',  'values' => '');
$config->deal->search['params']['status']        = array('operator' => '=',       'control' => 'select', 'values' => array('') + $lang->deal->statusList);
$config->deal->search['params']['createdBy']     = array('operator' => '=',       'control' => 'select', 'values' => 'users');
$config->deal->search['params']['createdDate']   = array('operator' => '=',       'control' => 'input',  'values' => '', 'class' => 'date');
$config->deal->search['params']['confirmedBy']   = array('operator' => '=',       'control' => 'select', 'values' => 'users');
$config->deal->search['params']['confirmedDate'] = array('operator' => '=',       'control' => 'input',  'values' => '', 'class' => 'date');
