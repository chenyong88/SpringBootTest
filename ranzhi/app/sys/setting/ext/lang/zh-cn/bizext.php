<?php
$lang->setting->syncAlipay = '同步';
$lang->setting->alipay     = '支付宝设置';
$lang->setting->pid        = '合作者ID';
$lang->setting->alipayKey  = '合作者KEY';
$lang->setting->email      = '支付宝邮箱';
$lang->setting->depositor  = '支付宝账户';
$lang->setting->tradeType  = '交易类型';

$lang->setting->tradeTypeList['']    = '';
$lang->setting->tradeTypeList[3011]  = '转账(含红包、集分宝等)';
$lang->setting->tradeTypeList[3012]  = '收费';
$lang->setting->tradeTypeList[4003]  = '充值';
$lang->setting->tradeTypeList[5004]  = '提现';
$lang->setting->tradeTypeList[5103]  = '退票';
$lang->setting->tradeTypeList[6001]  = '在线支付';

$lang->setting->placeholder->pid       = '合作身份者id，以2088开头的16位纯数字';
$lang->setting->placeholder->key       = '安全检验码，以数字和字母组成的32位字符';
$lang->setting->placeholder->email     = '支付宝商家邮箱';
$lang->setting->placeholder->depositor = '系统内的支付宝账户';
$lang->setting->placeholder->tradeType = '可导入的交易类型，为空表示导入所有交易类型';

$lang->setting->psi    = '进销存设置';
$lang->setting->status = '状态';

$lang->setting->psiStatus['1'] = '开启';
$lang->setting->psiStatus['0'] = '关闭';

$lang->setting->invoice = new stdclass();
$lang->setting->invoice->fields = array();
$lang->setting->invoice->fields['itemList'] = '发票服务';
