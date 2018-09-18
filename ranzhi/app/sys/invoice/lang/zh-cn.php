<?php
if(!isset($lang->invoice)) $lang->invoice = new stdclass();

$lang->invoice->common          = '发票';
$lang->invoice->id              = '编号';
$lang->invoice->sn              = '发票号码';
$lang->invoice->money           = '金额';
$lang->invoice->detail          = '明细';
$lang->invoice->company         = '开票公司';
$lang->invoice->customer        = '客户';
$lang->invoice->contract        = '合同';
$lang->invoice->contractReturn  = '合同回款';
$lang->invoice->contact         = '联系人';
$lang->invoice->address         = '邮寄地址';
$lang->invoice->type            = '类型';
$lang->invoice->taxRate         = '税率';
$lang->invoice->invoiceType     = '发票性质';
$lang->invoice->invoiceTitle    = '抬头';
$lang->invoice->taxNumber       = '税号';
$lang->invoice->registedAddress = '注册地址';
$lang->invoice->phone           = '电话';
$lang->invoice->bankName        = '开户行';
$lang->invoice->bankAccount     = '账号';
$lang->invoice->express         = '快递';
$lang->invoice->send            = '发送';
$lang->invoice->sendway         = '发送方式';
$lang->invoice->sendAccount     = '接收账号';
$lang->invoice->waybill         = '运单号';
$lang->invoice->status          = '状态';
$lang->invoice->desc            = '备注';
$lang->invoice->item            = '项目';
$lang->invoice->model           = '规格型号';
$lang->invoice->unit            = '单位';
$lang->invoice->amount          = '数量';
$lang->invoice->price           = '单价';
$lang->invoice->taxMoney        = '税额';
$lang->invoice->file            = '扫描件';
$lang->invoice->upload          = '请上传电子发票文件';
$lang->invoice->createdBy       = '由谁申请';
$lang->invoice->createdDate     = '申请时间';
$lang->invoice->editedBy        = '由谁编辑';
$lang->invoice->editedDate      = '编辑时间';
$lang->invoice->receivedBy      = '由谁收款';
$lang->invoice->receivedDate    = '收款时间';
$lang->invoice->checkedBy       = '由谁复核';
$lang->invoice->checkedDate     = '复核时间';
$lang->invoice->drawnBy         = '由谁开票';
$lang->invoice->drawnDate       = '开票时间';
$lang->invoice->expressedBy     = '由谁快递';
$lang->invoice->expressedDate   = '快递日期';
$lang->invoice->sentBy          = '由谁发送';
$lang->invoice->sentDate        = '发送日期';
$lang->invoice->taxRefundedBy   = '由谁退票';
$lang->invoice->taxRefundedDate = '退票日期';
$lang->invoice->canceledBy      = '由谁作废';
$lang->invoice->canceledDate    = '作废时间';
$lang->invoice->redBy           = '由谁冲红';
$lang->invoice->redDate         = '冲红时间';
$lang->invoice->titles          = '发票信息';
$lang->invoice->drawnMoney      = '已开金额';
$lang->invoice->subject         = '邮件主题';
$lang->invoice->content         = '邮件正文';
$lang->invoice->returnMoney     = '回款金额';
$lang->invoice->returnDetails   = '回款明细';
$lang->invoice->month           = '月';
$lang->invoice->total           = '合计';

$lang->invoice->all       = '所有';
$lang->invoice->browse    = '发票列表';
$lang->invoice->create    = '申请发票';
$lang->invoice->edit      = '编辑发票';
$lang->invoice->view      = '发票详情';
$lang->invoice->drawn     = '开票';
$lang->invoice->express   = '快递';
$lang->invoice->taxRefund = '退票';
$lang->invoice->cancel    = '作废';
$lang->invoice->red       = '冲红';
$lang->invoice->export    = '导出';

$lang->invoice->lifetime = '发票的一生';
$lang->invoice->baseInfo = '基本信息';
$lang->invoice->detail   = '发票明细';
$lang->invoice->default  = '默认';

$lang->invoice->exportTypeList['detail']   = '发票明细(xls/xlsx)';
$lang->invoice->exportTypeList['customer'] = '百旺税控软件客户编码(xml)';

$lang->invoice->statusList = array();
$lang->invoice->statusList['wait']     = '未开票';
$lang->invoice->statusList['normal']   = '已开票';
$lang->invoice->statusList['canceled'] = '作废';
$lang->invoice->statusList['red']      = '冲红';

$lang->invoice->typeList = array();
$lang->invoice->typeList['companyOrdinary']   = '企业增值税普通发票';
$lang->invoice->typeList['companySpecial']    = '企业增值税专用发票';
$lang->invoice->typeList['personalOrdinary']  = '个人增值税普通发票';
$lang->invoice->typeList['OrganizedOrdinary'] = '组织增值税普通发票';

$lang->invoice->invoiceTypeList = array();
$lang->invoice->invoiceTypeList['paper']   = '纸质发票';
$lang->invoice->invoiceTypeList['digital'] = '电子发票';

$lang->invoice->sendwayList = array();
$lang->invoice->sendwayList['email']  = '邮箱';
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
$lang->invoice->report->common = '报表';
$lang->invoice->report->title  = '开票统计';

$lang->invoice->report->unitList[1]       = '元';
$lang->invoice->report->unitList[1000]    = '千元';
$lang->invoice->report->unitList[10000]   = '万元';
$lang->invoice->report->unitList[1000000] = '百万';

$lang->invoice->totalMoney = '发票金额总计 %s，已开票 %s。';

$lang->invoice->placeholder = new stdclass();
$lang->invoice->placeholder->money = '发票金额已经超出合同金额';

$lang->invoice->error = new stdclass();
$lang->invoice->error->mailNotConfigure = '没有打开邮件配置，请手工发送。';
$lang->invoice->error->sendMailFailed   = '邮件发送失败，请手工发送。失败原因是：';

/* Invoice actions. */
$lang->invoice->action = new stdclass();
$lang->invoice->action->drawn     = '$date, 由 <strong>$actor</strong> 开票。' . "\n";
$lang->invoice->action->expressed = '$date, 由 <strong>$actor</strong> 快递。' . "\n";
$lang->invoice->action->sent      = '$date, 由 <strong>$actor</strong> 发送。' . "\n";
$lang->invoice->action->canceled  = '$date, 由 <strong>$actor</strong> 作废。' . "\n";
$lang->invoice->action->red       = '$date, 由 <strong>$actor</strong> 冲红。' . "\n";
$lang->invoice->action->deleted   = '$date, 由 <strong>$actor</strong> 删除。' . "\n";

if(!isset($lang->excel))        $lang->excel = new stdclass();
if(!isset($lang->excel->title)) $lang->excel->title = new stdclass();
$lang->excel->title->invoice = '发票明细';
