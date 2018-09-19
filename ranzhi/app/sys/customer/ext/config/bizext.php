<?php
$config->customer->require->createinvoice = 'invoiceTitle,taxNumber';
$config->customer->require->editinvoice   = 'invoiceTitle,taxNumber';

$config->customer->excel = new stdclass();
$config->customer->excel->listFields     = array('type', 'status', 'size', 'level', 'public', 'area', 'industry');
$config->customer->excel->sysListFields  = array('area', 'industry');
$config->customer->excel->templateFields = array('name', 'contact', 'phone', 'email', 'qq', 'depositor', 'public', 'type', 'size', 'industry', 'area', 'status', 'level', 'desc');
$config->customer->excel->numberFields   = array('id');
$config->customer->excel->customWidth    = array('id' => 5, 'name' => 20, 'type' => 10, 'relation' => 5, 'size' => 5, 
    'industry' => 20, 'area' => 20, 'status' => 5, 'level' => 5, 'intension' => 15, 'site' => 15, 'weibo' => 10, 
    'weixin' => 10, 'public' => 5, 'createdBy' => 10, 'createdDate' => 10, 'assignedBy' => 10, 'assignedDate' => 10, 
    'assignedTo' => 10, 'editedBy' => 10, 'editedDate' => 10, 'contactedBy' => 10, 'contactedDate' => 10, 'nextDate' => 10, 
    'desc' => 20, 'contact' => 10, 'phone' => 15, 'email' => 15, 'qq' => 15, 'depositor' => 20);

$config->customer->import = new stdclass();
$config->customer->import->ignoreFields = array();

/* Excel items. */
if(!isset($config->excel)) $config->excel = new stdclass();
$config->excel->titleFields  = array('area', 'industry', 'site');
$config->excel->centerFields = array('status', 'type', 'level', 'public', 'size');
