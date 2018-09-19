<?php
if(!isset($lang->invoice)) $lang->invoice = new stdclass();

$lang->invoice->common          = '發票';
$lang->invoice->id              = '編號';
$lang->invoice->sn              = '發票號碼';
$lang->invoice->money           = '金額';
$lang->invoice->detail          = '明細';
$lang->invoice->company         = '開票公司';
$lang->invoice->customer        = '客戶';
$lang->invoice->contract        = '合同';
$lang->invoice->contractReturn  = '合同回款';
$lang->invoice->contact         = '聯繫人';
$lang->invoice->address         = '郵寄地址';
$lang->invoice->type            = '類型';
$lang->invoice->taxRate         = '稅率';
$lang->invoice->invoiceType     = '發票性質';
$lang->invoice->invoiceTitle    = '抬頭';
$lang->invoice->taxNumber       = '稅號';
$lang->invoice->registedAddress = '註冊地址';
$lang->invoice->phone           = '電話';
$lang->invoice->bankName        = '開戶行';
$lang->invoice->bankAccount     = '賬號';
$lang->invoice->express         = '快遞';
$lang->invoice->send            = '發送';
$lang->invoice->sendway         = '發送方式';
$lang->invoice->sendAccount     = '接收賬號';
$lang->invoice->waybill         = '運單號';
$lang->invoice->status          = '狀態';
$lang->invoice->desc            = '備註';
$lang->invoice->item            = '項目';
$lang->invoice->model           = '規格型號';
$lang->invoice->unit            = '單位';
$lang->invoice->amount          = '數量';
$lang->invoice->price           = '單價';
$lang->invoice->taxMoney        = '稅額';
$lang->invoice->file            = '掃瞄件';
$lang->invoice->upload          = '請上傳電子發票檔案';
$lang->invoice->createdBy       = '由誰申請';
$lang->invoice->createdDate     = '申請時間';
$lang->invoice->editedBy        = '由誰編輯';
$lang->invoice->editedDate      = '編輯時間';
$lang->invoice->receivedBy      = '由誰收款';
$lang->invoice->receivedDate    = '收款時間';
$lang->invoice->checkedBy       = '由誰覆核';
$lang->invoice->checkedDate     = '覆核時間';
$lang->invoice->drawnBy         = '由誰開票';
$lang->invoice->drawnDate       = '開票時間';
$lang->invoice->expressedBy     = '由誰快遞';
$lang->invoice->expressedDate   = '快遞日期';
$lang->invoice->sentBy          = '由誰發送';
$lang->invoice->sentDate        = '發送日期';
$lang->invoice->taxRefundedBy   = '由誰退票';
$lang->invoice->taxRefundedDate = '退票日期';
$lang->invoice->canceledBy      = '由誰作廢';
$lang->invoice->canceledDate    = '作廢時間';
$lang->invoice->redBy           = '由誰沖紅';
$lang->invoice->redDate         = '沖紅時間';
$lang->invoice->titles          = '發票信息';
$lang->invoice->drawnMoney      = '已開金額';
$lang->invoice->subject         = '郵件主題';
$lang->invoice->content         = '郵件正文';
$lang->invoice->returnMoney     = '回款金額';
$lang->invoice->returnDetails   = '回款明細';
$lang->invoice->month           = '月';
$lang->invoice->total           = '合計';

$lang->invoice->all       = '所有';
$lang->invoice->browse    = '發票列表';
$lang->invoice->create    = '申請發票';
$lang->invoice->edit      = '編輯發票';
$lang->invoice->view      = '發票詳情';
$lang->invoice->drawn     = '開票';
$lang->invoice->express   = '快遞';
$lang->invoice->taxRefund = '退票';
$lang->invoice->cancel    = '作廢';
$lang->invoice->red       = '沖紅';
$lang->invoice->export    = '導出';

$lang->invoice->lifetime = '發票的一生';
$lang->invoice->baseInfo = '基本信息';
$lang->invoice->detail   = '發票明細';
$lang->invoice->default  = '預設';

$lang->invoice->exportTypeList['detail']   = '發票明細(xls/xlsx)';
$lang->invoice->exportTypeList['customer'] = '百旺稅控軟件客戶編碼(xml)';

$lang->invoice->statusList = array();
$lang->invoice->statusList['wait']     = '未開票';
$lang->invoice->statusList['normal']   = '已開票';
$lang->invoice->statusList['canceled'] = '作廢';
$lang->invoice->statusList['red']      = '沖紅';

$lang->invoice->typeList = array();
$lang->invoice->typeList['companyOrdinary']   = '企業增值稅普通發票';
$lang->invoice->typeList['companySpecial']    = '企業增值稅專用發票';
$lang->invoice->typeList['personalOrdinary']  = '個人增值稅普通發票';
$lang->invoice->typeList['OrganizedOrdinary'] = '組織增值稅普通發票';

$lang->invoice->invoiceTypeList = array();
$lang->invoice->invoiceTypeList['paper']   = '紙質發票';
$lang->invoice->invoiceTypeList['digital'] = '電子發票';

$lang->invoice->sendwayList = array();
$lang->invoice->sendwayList['email']  = '郵箱';
$lang->invoice->sendwayList['qq']     = 'QQ';
$lang->invoice->sendwayList['weixin'] = '微信';
$lang->invoice->sendwayList['other']  = '其他';

$lang->invoice->itemList = array();
$lang->invoice->itemList[''] = '';

$lang->invoice->monthList['01'] = '一月';
$lang->invoice->monthList['02'] = '二月';
$lang->invoice->monthList['03'] = '三月';
$lang->invoice->monthList['04'] = '四月';
$lang->invoice->monthList['05'] = '五月';
$lang->invoice->monthList['06'] = '六月';
$lang->invoice->monthList['07'] = '七月';
$lang->invoice->monthList['08'] = '八月';
$lang->invoice->monthList['09'] = '九月';
$lang->invoice->monthList['10'] = '十月';
$lang->invoice->monthList['11'] = '十一月';
$lang->invoice->monthList['12'] = '十二月';

$lang->invoice->report = new stdclass();
$lang->invoice->report->common = '報表';
$lang->invoice->report->title  = '開票統計';

$lang->invoice->report->unitList[1]       = '元';
$lang->invoice->report->unitList[1000]    = '千元';
$lang->invoice->report->unitList[10000]   = '萬元';
$lang->invoice->report->unitList[1000000] = '百萬';

$lang->invoice->totalMoney = '發票金額總計 %s，已開票 %s。';

$lang->invoice->placeholder = new stdclass();
$lang->invoice->placeholder->money = '發票金額已經超出合同金額';

$lang->invoice->error = new stdclass();
$lang->invoice->error->mailNotConfigure = '沒有打開郵件配置，請手工發送。';
$lang->invoice->error->sendMailFailed   = '郵件發送失敗，請手工發送。失敗原因是：';

/* Invoice actions. */
$lang->invoice->action = new stdclass();
$lang->invoice->action->drawn     = '$date, 由 <strong>$actor</strong> 開票。' . "\n";
$lang->invoice->action->expressed = '$date, 由 <strong>$actor</strong> 快遞。' . "\n";
$lang->invoice->action->sent      = '$date, 由 <strong>$actor</strong> 發送。' . "\n";
$lang->invoice->action->canceled  = '$date, 由 <strong>$actor</strong> 作廢。' . "\n";
$lang->invoice->action->red       = '$date, 由 <strong>$actor</strong> 沖紅。' . "\n";
$lang->invoice->action->deleted   = '$date, 由 <strong>$actor</strong> 刪除。' . "\n";

if(!isset($lang->excel))        $lang->excel = new stdclass();
if(!isset($lang->excel->title)) $lang->excel->title = new stdclass();
$lang->excel->title->invoice = '發票明細';
