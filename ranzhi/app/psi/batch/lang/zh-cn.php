<?php
/**
 * The zh-cn lang file of batch module of Ranzhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商业软件，非开源软件
 * @author      chujilu <chujilu@cnezsoft.com>
 * @package     batch
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */
if(!isset($lang->batch)) $lang->batch = new stdclass();
$lang->batch->common               = '仓储';
$lang->batch->browse               = '待发货';
$lang->batch->browsePurchaseOrders = '待收货';
$lang->batch->browseFinished       = '已完成';
$lang->batch->create               = '收货';
$lang->batch->detail               = '详情';
$lang->batch->editPick             = '编辑配货信息';
$lang->batch->editDeliver          = '编辑发货信息';
$lang->batch->editReceive          = '编辑收货信息';
$lang->batch->printBatch           = '打印出入库单据';
$lang->batch->showBatchProducts    = '查看出入库明细';
$lang->batch->createExpress        = '新建';

$lang->batch->order         = '订单';
$lang->batch->pickedBy      = '配货人';
$lang->batch->pickedDate    = '配货日期';
$lang->batch->express       = '快递';
$lang->batch->waybill       = '运单号';

$lang->batch->id              = '编号';
$lang->batch->batchNo         = '业务单号';
$lang->batch->product         = '品名';
$lang->batch->model           = '规格';
$lang->batch->unit            = '单位';
$lang->batch->price           = '单价';
$lang->batch->amount          = '数量';
$lang->batch->money           = '金额';
$lang->batch->status          = '状态';
$lang->batch->pickedAmount    = '已配货数量';
$lang->batch->deliveredAmount = '已发货数量';
$lang->batch->receivedAmount  = '已收货数量';
$lang->batch->orderAmount     = '订单数量';
$lang->batch->batchInfo       = '第%s批次';

$lang->batch->type          = '出/入库类型';
$lang->batch->expressedBy   = '经办人';
$lang->batch->expressedDate = '经办日期';
$lang->batch->sendSuccess   = '记录成功！';

$lang->batch->batchNoList['out'] = '出库单号';
$lang->batch->batchNoList['in']  = '入库单号';

$lang->batch->trader = new stdclass();
$lang->batch->trader->common = '客户/供应商';
$lang->batch->trader->out    = '客户';
$lang->batch->trader->in     = '供应商';

$lang->batch->pick = new stdclass();
$lang->batch->pick->common        = '配货';
$lang->batch->pick->info          = '配货信息';
$lang->batch->pick->amount        = '本次配货数量';
$lang->batch->pick->edit          = '编辑配货信息';
$lang->batch->pick->expressedBy   = '发货人';
$lang->batch->pick->expressedDate = '发货日期';

$lang->batch->deliver = new stdclass();
$lang->batch->deliver->common        = '发货';
$lang->batch->deliver->info          = '发货信息';
$lang->batch->deliver->amount        = '本次发货数量';
$lang->batch->deliver->edit          = '编辑发货信息';
$lang->batch->deliver->expressedBy   = '发货人';
$lang->batch->deliver->expressedDate = '发货日期';

$lang->batch->receive = new stdclass();
$lang->batch->receive->common        = '收货';
$lang->batch->receive->info          = '收货信息';
$lang->batch->receive->amount        = '本次收货数量';
$lang->batch->receive->edit          = '编辑收货信息';
$lang->batch->receive->expressedBy   = '收货人';
$lang->batch->receive->expressedDate = '收货日期';

$lang->batch->finished = new stdclass();
$lang->batch->finished->common        = '已完成';

$lang->batch->statusList['']          = '';
$lang->batch->statusList['picking']   = '配货中';
$lang->batch->statusList['delivered'] = '已发货';
$lang->batch->statusList['received']  = '已收货';

$lang->batch->error = new stdclass();
$lang->batch->error->emptyAmount = '<strong>%s</strong>不能全部为零。';

$lang->batch->print = new stdclass();
$lang->batch->print->out = '发货单';
$lang->batch->print->in  = '收货单';
