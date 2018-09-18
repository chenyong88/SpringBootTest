<?php
if(!isset($config->commission)) $config->commission = new stdclass();

$config->commission->ignoredCategories = 'profit';

$config->commission->excel = new stdclass();
$config->commission->excel->saleFields    = array('id', 'trader', 'product', 'money', 'base');
$config->commission->excel->lineFields    = array('line', 'money', 'base');
$config->commission->excel->summaryFields = array('account', 'saleCommission', 'lineCommission', 'total');
$config->commission->excel->customWidth   = array('id' => 5, 'trader' => 30, 'product' => 30, 'money' => 10, 'base' => 15, 'commission' => 10, 'line' => 20, 'account' => 10, 'saleCommission' => 15, 'lineCommission' => 15, 'total' => 15);
$config->commission->excel->numberFields  = array('id', 'money', 'base', 'saleCommission', 'lineCommission', 'total');

/* Excel items. */
$config->excel->freeze->saleDetail = 'base';
$config->excel->freeze->lineDetail = 'base';
$config->excel->freeze->matrix     = 'amount';
