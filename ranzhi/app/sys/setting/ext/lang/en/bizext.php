<?php
$lang->setting->syncAlipay = 'Sync Alipay';
$lang->setting->alipay     = 'Alipay Settings';
$lang->setting->pid        = 'Partner ID';
$lang->setting->alipayKey  = 'Partner KEY';
$lang->setting->email      = 'Alipay Email';
$lang->setting->depositor  = 'Depositor';
$lang->setting->tradeType  = 'Trade Type';

$lang->setting->tradeTypeList['']    = '';
$lang->setting->tradeTypeList[3011]  = 'Transfer';
$lang->setting->tradeTypeList[3012]  = 'Toll';
$lang->setting->tradeTypeList[4003]  = 'Recharge';
$lang->setting->tradeTypeList[5004]  = 'Withdraw';
$lang->setting->tradeTypeList[5103]  = 'Refunds';
$lang->setting->tradeTypeList[6001]  = 'Online Payment';

$lang->setting->placeholder->pid       = 'Corporate identity to ID, 16 number begin with 2088.';
$lang->setting->placeholder->key       = 'Security checking code, 32 characters of numbers and letters.';
$lang->setting->placeholder->email     = 'Alipay Email';
$lang->setting->placeholder->depositor = 'Depositor of alipay defined in depositor module.';
$lang->setting->placeholder->tradeType = 'Trade types to import. Import all types if it is empty.';

$lang->setting->psi    = 'PSI Settings';
$lang->setting->status = 'Status';

$lang->setting->psiStatus['1'] = 'On';
$lang->setting->psiStatus['0'] = 'Off';

$lang->setting->invoice = new stdclass();
$lang->setting->invoice->fields = array();
$lang->setting->invoice->fields['itemList'] = 'Invoice items';
