<?php
/**
 * The zh-cn lang file of order module of Ranzhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商业软件，非开源软件
 * @author      Gang Liu <liugang@cnezsoft.com>
 * @package     order
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */
$lang->order->common           = '订单';
$lang->order->browse           = '订单列表';
$lang->order->create           = '创建订单';
$lang->order->createRefund     = '创建退货单';
$lang->order->edit             = '编辑订单';
$lang->order->editRefund       = '编辑退货单';
$lang->order->cancel           = '取消订单';
$lang->order->activate         = '激活订单';
$lang->order->finish           = '完成订单';
$lang->order->detail           = '订单详情';
$lang->order->view             = '订单详情';
$lang->order->assignToPick     = '通知配货';
$lang->order->assignToPurchase = '通知采购';
$lang->order->purchase         = '采购需求';
$lang->order->printOrder       = '打印';
$lang->order->sale             = '销售';
$lang->order->history          = '历史订单';
$lang->order->setOrderNo       = '单据编号';
$lang->order->sendMail         = '邮件通知';

$lang->order->common       = '订单';
$lang->order->id           = '编号';
$lang->order->refundNo     = '退货单号';
$lang->order->money        = '金额';
$lang->order->taxed        = '是否含税';
$lang->order->finishedDate = '交付日期';
$lang->order->desc         = '备注';
$lang->order->createdBy    = '下单人员';
$lang->order->createdDate  = '下单日期';
$lang->order->status       = '订单状态';
$lang->order->refundStatus = '退货单状态';
$lang->order->type         = '订单类型';
$lang->order->contract     = '销售合同';
$lang->order->settlement   = '结款方式';
$lang->order->assignedTo   = '指派给';
$lang->order->assignedBy   = '由谁指派';
$lang->order->assignedDate = '指派日期';
$lang->order->page         = '第    %s    页    共    %s    页';

$lang->order->typeList = array();
$lang->order->typeList['sale']           = '销售';
$lang->order->typeList['purchase']       = '采购';
//$lang->order->typeList['saleRefund']     = '销售退货';
//$lang->order->typeList['purchaseRefund'] = '采购退货';
$lang->order->typeList['out']            = '仓库出库';
$lang->order->typeList['in']             = '仓库入库';

$lang->order->orderAmount    = '订单数量';
$lang->order->storeAmount    = '库存数量';
$lang->order->purchaseAmount = '采购数量';
$lang->order->showProducts   = '显示产品详情';
$lang->order->createTrader   = '新建';
$lang->order->createBuyOrder = '创建采购订单';
$lang->order->createProduct  = '新增库存产品';

$lang->order->all          = '所有订单';
$lang->order->assignedToMe = '指派给我';
$lang->order->canceled     = '已取消';
$lang->order->finished     = '已完成';
$lang->order->titleLBL     = '%s : %s';

$lang->order->batchNumber  = '批次编号：<strong> %s </strong>';

$lang->order->exportOrder             = array();
$lang->order->exportOrder['purchase'] = '采购单列表';
$lang->order->exportOrder['sale']     = '销售单列表';
$lang->order->exportOrder['default']  = '订单列表';

$lang->order->trader['sale']           = '客户';
$lang->order->trader['purchase']       = '供应商';
$lang->order->trader['saleRefund']     = $lang->order->trader['sale'];
$lang->order->trader['purchaseRefund'] = $lang->order->trader['purchase'];

$lang->order->batch['sale']           = '发货';
$lang->order->batch['purchase']       = '收货';
$lang->order->batch['saleRefund']     = $lang->order->batch['purchase'];
$lang->order->batch['purchaseRefund'] = $lang->order->batch['sale'];

$lang->order->product        = '产品';
$lang->order->total          = '合计';
$lang->order->subtotal       = '小计';
$lang->order->canceledReason = '取消原因';
$lang->order->canceledTips   = '取消订单将删除收/发货记录。';
$lang->order->pick           = '通知配货';
$lang->order->moneyInWords   = '大写金额';

$lang->order->mail = new stdclass();
$lang->order->mail->send       = '发送';
$lang->order->mail->sendMail   = '发送邮件';
$lang->order->mail->endnote    = "本邮件由<a href='http://www.ranzhi.org'>然之协同</a>自动生成";
$lang->order->mail->choseUser  = '请选择收件人';

$lang->order->mail->orderType['purchase']       = '采购单详情.xls';
$lang->order->mail->orderType['sale']           = '销售单详情.xls';
$lang->order->mail->orderType['purchaseRefund'] = '采购退货单详情.xls';
$lang->order->mail->orderType['saleRefund']     = '销售退货单详情.xls';

$lang->order->mail->subject['purchase']       = "%s 采购单";
$lang->order->mail->subject['sale']           = "%s 销售单";
$lang->order->mail->subject['purchaseRefund'] = "%s 采购退货单";
$lang->order->mail->subject['saleRefund']     = "%s 销售退货单";

$lang->order->statusList['']              = '';
$lang->order->statusList['all']           = '所有订单';
$lang->order->statusList['assignedToMe']  = '指派给我';
$lang->order->statusList['underway']      = '进行中';
$lang->order->statusList['pending']       = '待处理';
$lang->order->statusList['toReceive']     = '待收货';
$lang->order->statusList['received']      = '已收货';
$lang->order->statusList['partReceived']  = '部分收货';
$lang->order->statusList['toPurchase']    = '待采购';
$lang->order->statusList['purchasing']    = '采购中';
$lang->order->statusList['purchased']     = '已采购';
$lang->order->statusList['picking']       = '待配货';
$lang->order->statusList['toDeliver']     = '待发货';
$lang->order->statusList['delivered']     = '已发货';
$lang->order->statusList['partDelivered'] = '部分发货';
$lang->order->statusList['canceled']      = '已取消';
$lang->order->statusList['finished']      = '已完成';

$lang->order->settlementList[0] = '';
$lang->order->settlementList[1] = '现金';
$lang->order->settlementList[2] = '银行电汇';
$lang->order->settlementList[3] = '转账支票';
$lang->order->settlementList[4] = '承兑汇票';
$lang->order->settlementList[5] = '委托代收货款';

$lang->order->taxedList[1] = '含税';
$lang->order->taxedList[0] = '不含税';

$lang->order->orderNo = new stdclass();
$lang->order->orderNo->common    = '订单号';
$lang->order->orderNo->type      = '编号类型';
$lang->order->orderNo->length    = '长度';
$lang->order->orderNo->clearType = '清零方式';
$lang->order->orderNo->preview   = '编号预览';

$lang->order->orderNo->typeList['fixed'] = '固定值';
$lang->order->orderNo->typeList['year']  = '年';
$lang->order->orderNo->typeList['month'] = '月';
$lang->order->orderNo->typeList['day']   = '日';
$lang->order->orderNo->typeList['AI']    = '自增长';

$lang->order->orderNo->yearLength[2] = '两位';
$lang->order->orderNo->yearLength[4] = '四位';

$lang->order->orderNo->AI['length'][2] = '两位';
$lang->order->orderNo->AI['length'][3] = '三位';
$lang->order->orderNo->AI['length'][4] = '四位';

$lang->order->orderNo->AI['clearType']['day']   = '按日清零';
$lang->order->orderNo->AI['clearType']['month'] = '按月清零';
$lang->order->orderNo->AI['clearType']['year']  = '按年清零';

$lang->order->orderNo->placeholder = new stdclass();
$lang->order->orderNo->placeholder->fixed = '输入一个固定值，如SO';

$lang->order->orderNo->tips = '系统正式启用后请勿修改单据编号规则！';

$lang->order->orderNo->error = new stdclass(); 
$lang->order->orderNo->error->emptyAI = '至少选择一个编号类型为<strong>自增长</strong>，否则可能会出现重复的单据编号。';

$lang->order->print = new stdclass();
$lang->order->print->common         = '打印';
$lang->order->print->page           = '第%s页';
$lang->order->print->pageTitle      = '第%s页/共%s页';
$lang->order->print->purchase       = '采购订单';
$lang->order->print->sale           = '销售订单';
$lang->order->print->purchaseRefund = '采购退货单';
$lang->order->print->saleRefund     = '销售退货单';
$lang->order->print->pick           = '配货单';
$lang->order->print->deliver        = '发货单';
$lang->order->print->contract       = '订单(合同)号 ';
$lang->order->print->product        = '名称';
$lang->order->print->tabulation     = '制单：';
$lang->order->print->check          = '审核：';
$lang->order->print->delivery       = '配送：';
$lang->order->print->finishedDate   = '<strong>注意事项</strong>：以上产品交货日期为%s';
$lang->order->print->hidePrice      = '隐藏单价和金额';
$lang->order->print->tel            = 'TEL：';
$lang->order->print->fax            = 'FAX：';
$lang->order->print->to             = 'T  O：';
$lang->order->print->attn           = 'ATTN：';
$lang->order->print->from           = 'FROM：';
$lang->order->print->settlement     = '二、结款方式：';
$lang->order->print->desc           = '三、备注：';
$lang->order->print->help           = '打印帮助';

$lang->order->print->sign['sale']           = '客户签收：';
$lang->order->print->sign['purchase']       = '供方签收：';
$lang->order->print->sign['saleRefund']     = $lang->order->print->sign['sale'];
$lang->order->print->sign['purchaseRefund'] = $lang->order->print->sign['purchase'];

$lang->order->print->taxedList[0] = '一、报价不含税';
$lang->order->print->taxedList[1] = '一、报价含税（17%增值税）';

$lang->order->print->trader['sale']           = '购货单位 ';
$lang->order->print->trader['purchase']       = '送货单位 ';
$lang->order->print->trader['saleRefund']     = '退货单位 ';
$lang->order->print->trader['purchaseRefund'] = '退货单位 ';

$lang->order->print->orderNo['sale']           = '销售单号 ';
$lang->order->print->orderNo['purchase']       = '采购单号 ';
//$lang->order->print->orderNo['saleRefund']     = '退货单号 ';
//$lang->order->print->orderNo['purchaseRefund'] = '退货单号 ';

$lang->order->error = new stdclass();
$lang->order->error->noRecord    = '请录入有效的产品信息。';
$lang->order->error->notSelected = '请选择要采购的产品。';
$lang->order->error->notFinished = '产品未完成%s，订单不能完成。';
$lang->order->error->hasSent     = '产品已%s，不能删除。';
$lang->order->error->errorAmount = '产品已%s%s，订单数量不能小于已发货数量。';
$lang->order->error->cantChange  = '产品已%s，不能更改品名。';

/* item */
$lang->order->pickedBy      = '配货人';
$lang->order->expressedBy   = '发货人';
$lang->order->receivedBy    = '收货人';
$lang->order->express       = '快递';
$lang->order->waybill       = '运单号';
$lang->order->expressedDate = '发货日期';
$lang->order->pickedDate    = '配货日期';
$lang->order->receivedDate  = '收货日期';

$lang->orderProduct = new stdclass();
$lang->orderProduct->product    = '名称';
$lang->orderProduct->amount     = '数量';
$lang->orderProduct->model      = '规格';
$lang->orderProduct->unit       = '单位';
$lang->orderProduct->price      = '单价';
$lang->orderProduct->totalPrice = '总价';

$lang->order->deny = '您没有创建%s的权限。';

$lang->order->report = new stdclass();
$lang->order->report->common   = '报表';
$lang->order->report->sale     = '销售报表';
$lang->order->report->purchase = '采购报表';
$lang->order->report->showDesc = '显示备注';
$lang->order->report->noDesc   = '没有备注';
$lang->order->report->money    = '金额总计：%s，本页金额合计：%s。';
$lang->order->report->noPriv   = '没有可用的报表，请联系管理员获取权限。';
$lang->order->report->search   = '搜索';

$lang->order->report->date['thismonth'] = '本月';
$lang->order->report->date['lastmonth'] = '上月';
$lang->order->report->date['thisyear']  = '本年';
$lang->order->report->date['lastyear']  = '上年';
$lang->order->report->date['all']       = '所有';

$lang->order->report->select['orderNo']  = '--请输入订单号--';
$lang->order->report->select['customer'] = '--请选择客户--';
$lang->order->report->select['provider'] = '--请选择供应商--';
$lang->order->report->select['product']  = '--请选择产品--';
$lang->order->report->select['category'] = '--请选择类目--';
$lang->order->report->select['model']    = '--请选择规格--';
$lang->order->report->select['begin']    = '--请选择起始日期--';
$lang->order->report->select['end']      = '--请选择截止日期--';

$lang->psiorder = $lang->order;
foreach($lang->orderProduct as $key => $value)
{
    $lang->psiorder->$key = $value;
}
