<?php
$config->product->action = new stdclass();
$config->product->action->common = new stdclass();
$config->product->action->common->createOrder = new stdclass();
$config->product->action->common->createOrder->conditions = array();
$config->product->action->common->createOrder->inputs     = array();

$config->product->require->createaction = 'name, action, product';
$config->product->require->editaction   = 'name, action';
$config->product->require->createfield  = 'name, field, product, control';
$config->product->require->editfield    = 'name, field, control';

$orderInputs = array('customer' => array('rules' => 'notempty'));

$config->product->field = new stdclass();
$config->product->field->controlTypeList = array();
$config->product->field->controlTypeList['input']    = 'varchar(200)';
$config->product->field->controlTypeList['textarea'] = 'text';
$config->product->field->controlTypeList['date']     = 'date';
$config->product->field->controlTypeList['datetime'] = 'datetime';
$config->product->field->controlTypeList['select']   = 'varchar(200)';
$config->product->field->controlTypeList['radio']    = 'varchar(200)';
$config->product->field->controlTypeList['checkbox'] = 'varchar(200)';
$config->product->field->controlTypeList['user']     = 'varchar(200)';
$config->product->field->controlTypeList['contact']  = 'varchar(200)';
$config->product->field->controlTypeList['customer'] = 'varchar(200)';

$config->product->field->lengthList[10]  = ',date,';
$config->product->field->lengthList[19]  = ',datetime,';
$config->product->field->lengthList[200] = ',input,select,radio,checkbox,user,contact,customer,';

$config->product->batchCreateCount           = 10;
$config->product->batchCreatePropertiesCount = 10;

if($config->psi->turnon && $this->appName == 'psi')
{
    $config->product->require->create          = 'name, category, code';
    $config->product->require->createfromorder = 'name, category, code';
    $config->product->require->edit            = 'name, category, code';
    $config->product->require->batchCreate     = 'name, category, code';
    $config->product->require->batchEdit       = 'name, category, code';

    $config->product->search['fields']['model.key'] = $lang->product->model;
    $config->product->search['fields']['unit.key']  = $lang->product->unit;
    $config->product->search['fields']['barcode']   = $lang->product->barcode;
    $config->product->search['fields']['brand']     = $lang->product->brand;
    $config->product->search['fields']['store']     = $lang->product->store;
    $config->product->search['fields']['amount']    = $lang->product->amount;

    $config->product->search['params']['model.key'] = array('operator' => '=',        'control' => 'select', 'values' => array('' => '') + $lang->product->models);
    $config->product->search['params']['unit.key']  = array('operator' => '=',        'control' => 'select', 'values' => array('' => '') + $lang->product->units);
    $config->product->search['params']['barcode']   = array('operator' => 'include',  'control' => 'input',  'values' => '');
    $config->product->search['params']['brand']     = array('operator' => 'include',  'control' => 'input',  'values' => '');
    $config->product->search['params']['store']     = array('operator' => '=',        'control' => 'select', 'values' => 'set in control');
    $config->product->search['params']['amount']    = array('operator' => '>=',       'control' => 'input',  'values' => '');
}
