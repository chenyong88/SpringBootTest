<?php
if(!isset($lang->invoice)) $lang->invoice = new stdclass();

$lang->invoice->common          = 'Invoice';
$lang->invoice->id              = 'ID';
$lang->invoice->sn              = 'SN';
$lang->invoice->money           = 'Money';
$lang->invoice->detail          = 'Detail';
$lang->invoice->company         = 'Company';
$lang->invoice->customer        = 'Customer';
$lang->invoice->contract        = 'Contract';
$lang->invoice->contractReturn  = 'Contract';
$lang->invoice->contact         = 'Contact Payment';
$lang->invoice->address         = 'Mailing Address';
$lang->invoice->type            = 'Type';
$lang->invoice->taxRate         = 'Taxrate';
$lang->invoice->invoiceType     = 'Invoice Type';
$lang->invoice->invoiceTitle    = 'Invoice Title';
$lang->invoice->taxNumber       = 'Taxnumber';
$lang->invoice->registedAddress = 'Registed Address';
$lang->invoice->phone           = 'Registed Phone';
$lang->invoice->bankName        = 'Bank Name';
$lang->invoice->bankAccount     = 'Bank Account';
$lang->invoice->express         = 'Express';
$lang->invoice->send            = 'Send';
$lang->invoice->sendway         = 'Send Way';
$lang->invoice->sendAccount     = 'Receive Account';
$lang->invoice->waybill         = 'Waybill';
$lang->invoice->status          = 'Status';
$lang->invoice->desc            = 'Comment';
$lang->invoice->item            = 'Item';
$lang->invoice->model           = 'Model';
$lang->invoice->unit            = 'Unit';
$lang->invoice->amount          = 'Amount';
$lang->invoice->price           = 'Price';
$lang->invoice->taxMoney        = 'Tax';
$lang->invoice->file            = 'File';
$lang->invoice->upload          = 'Upload Invoice Files';
$lang->invoice->createdBy       = 'Applied By';
$lang->invoice->createdDate     = 'Applied Date';
$lang->invoice->editedBy        = 'Edited By';
$lang->invoice->editedDate      = 'Edited Date';
$lang->invoice->receivedBy      = 'Received By';
$lang->invoice->receivedDate    = 'Received Date';
$lang->invoice->checkedBy       = 'Checked By';
$lang->invoice->checkedDate     = 'Checked Date';
$lang->invoice->drawnBy         = 'Drawn By';
$lang->invoice->drawnDate       = 'Drawn Date';
$lang->invoice->expressedBy     = 'Expressed By';
$lang->invoice->expressedDate   = 'Expressed Date';
$lang->invoice->sentBy          = 'Sent By';
$lang->invoice->sentDate        = 'Sent Date';
$lang->invoice->taxRefundedBy   = 'TaxRefunded By';
$lang->invoice->taxRefundedDate = 'TaxRefunded Date';
$lang->invoice->canceledBy      = 'Canceled By';
$lang->invoice->canceledDate    = 'Canceled Date';
$lang->invoice->redBy           = 'TaxRefunded By';
$lang->invoice->redDate         = 'TaxRefunded Date';
$lang->invoice->titles          = 'Titles';
$lang->invoice->drawnMoney      = 'Dranw Money';
$lang->invoice->subject         = 'Subject';
$lang->invoice->content         = 'Content';
$lang->invoice->returnMoney     = 'Returned Money';
$lang->invoice->returnDetails   = 'Returned Details';
$lang->invoice->month           = 'Month';
$lang->invoice->total           = 'Total';

$lang->invoice->all       = 'All Invoice';
$lang->invoice->browse    = 'Browse Invoice';
$lang->invoice->create    = 'Create Invoice';
$lang->invoice->edit      = 'Edit Invoice';
$lang->invoice->view      = 'View Invoice';
$lang->invoice->drawn     = 'Drawn';
$lang->invoice->express   = 'Express';
$lang->invoice->taxRefund = 'Tax Refund';
$lang->invoice->cancel    = 'Cancel';
$lang->invoice->red       = 'taxRefund';
$lang->invoice->export    = 'Export';

$lang->invoice->lifetime = 'Lifetime';
$lang->invoice->baseInfo = 'Base Information';
$lang->invoice->detail   = 'Invoice Details';
$lang->invoice->default  = 'Default';

$lang->invoice->exportTypeList['excel']    = 'Export Excel';
$lang->invoice->exportTypeList['customer'] = 'Customer Code';

$lang->invoice->statusList = array();
$lang->invoice->statusList['wait']     = 'Wait';
$lang->invoice->statusList['normal']   = 'Normal';
$lang->invoice->statusList['canceled'] = 'Canceled';
$lang->invoice->statusList['red']      = 'TaxRefunded';

$lang->invoice->typeList = array();
$lang->invoice->typeList['companyOrdinary']   = 'Enterprise VAT ordinary invoice';
$lang->invoice->typeList['companySpecial']    = 'Enterprise VAT special invoice';
$lang->invoice->typeList['personalOrdinary']  = 'Personal VAT invoice';
$lang->invoice->typeList['OrganizedOrdinary'] = 'Organization VAT ordinary invoice';

$lang->invoice->invoiceTypeList = array();
$lang->invoice->invoiceTypeList['paper']   = 'Paper Invoice';
$lang->invoice->invoiceTypeList['digital'] = 'E-Invoice';

$lang->invoice->sendwayList = array();
$lang->invoice->sendwayList['email']  = 'Email';
$lang->invoice->sendwayList['qq']     = 'QQ';
$lang->invoice->sendwayList['weixin'] = 'Wechat';
$lang->invoice->sendwayList['other']  = 'Other';

$lang->invoice->itemList = array();
$lang->invoice->itemList[''] = '';

$lang->invoice->monthList['01'] = 'January';
$lang->invoice->monthList['02'] = 'February';
$lang->invoice->monthList['03'] = 'March';
$lang->invoice->monthList['04'] = 'April';
$lang->invoice->monthList['05'] = 'May';
$lang->invoice->monthList['06'] = 'June';
$lang->invoice->monthList['07'] = 'July';
$lang->invoice->monthList['08'] = 'August';
$lang->invoice->monthList['09'] = 'September';
$lang->invoice->monthList['10'] = 'October';
$lang->invoice->monthList['11'] = 'November';
$lang->invoice->monthList['12'] = 'December';

$lang->invoice->report = new stdclass();
$lang->invoice->report->common = 'Report';
$lang->invoice->report->title  = ' Invoice List';

$lang->invoice->report->unitList[1]       = '$';
$lang->invoice->report->unitList[1000]    = 'K$';
$lang->invoice->report->unitList[10000]   = '10K$';
$lang->invoice->report->unitList[1000000] = 'M$';

$lang->invoice->totalMoney = 'The total amount of invoice is %s, %s has invoiced.';

$lang->invoice->placeholder = new stdclass();
$lang->invoice->placeholder->money = 'The amount of the invoice has exceeded the amount of the contract';

$lang->invoice->error = new stdclass();
$lang->invoice->error->mailNotConfigure = 'Mail not configured.';
$lang->invoice->error->sendMailFailed   = 'Sent mail failed because: ';

/* Invoice actions. */
$lang->invoice->action = new stdclass();
$lang->invoice->action->drawn     = '$date, drawn by <strong>$actor</strong>.'       . "\n";
$lang->invoice->action->expressed = '$date, expressed by <strong>$actor</strong>.'   . "\n";
$lang->invoice->action->sent      = '$date, sent by <strong>$actor</strong>.'        . "\n";
$lang->invoice->action->canceled  = '$date, canceled by <strong>$actor</strong>.'    . "\n";
$lang->invoice->action->red       = '$date, taxRefunded by <strong>$actor</strong>.' . "\n";
$lang->invoice->action->deleted   = '$date, deleted by <strong>$actor</strong>.' . "\n";

if(!isset($lang->excel))        $lang->excel = new stdclass();
if(!isset($lang->excel->title)) $lang->excel->title = new stdclass();
$lang->excel->title->invoice = 'Invoice Details';
