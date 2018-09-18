<?php
$lang->setting->syncAlipay = '同步';
$lang->setting->alipay     = '支付寶設置';
$lang->setting->pid        = '合作者ID';
$lang->setting->alipayKey  = '合作者KEY';
$lang->setting->email      = '支付寶郵箱';
$lang->setting->depositor  = '支付寶賬戶';
$lang->setting->tradeType  = '交易類型';

$lang->setting->tradeTypeList['']    = '';
$lang->setting->tradeTypeList[3011]  = '轉賬(含紅包、集分寶等)';
$lang->setting->tradeTypeList[3012]  = '收費';
$lang->setting->tradeTypeList[4003]  = '充值';
$lang->setting->tradeTypeList[5004]  = '提現';
$lang->setting->tradeTypeList[5103]  = '退票';
$lang->setting->tradeTypeList[6001]  = '在綫支付';

$lang->setting->placeholder->pid       = '合作身份者id，以2088開頭的16位純數字';
$lang->setting->placeholder->key       = '安全檢驗碼，以數字和字母組成的32位字元';
$lang->setting->placeholder->email     = '支付寶商家郵箱';
$lang->setting->placeholder->depositor = '系統內的支付寶賬戶';
$lang->setting->placeholder->tradeType = '可導入的交易類型，為空表示導入所有交易類型';

$lang->setting->psi    = '進銷存設置';
$lang->setting->status = '狀態';

$lang->setting->psiStatus['1'] = '開啟';
$lang->setting->psiStatus['0'] = '關閉';

$lang->setting->invoice = new stdclass();
$lang->setting->invoice->fields = array();
$lang->setting->invoice->fields['itemList'] = '發票服務';
