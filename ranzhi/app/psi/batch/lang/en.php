<?php
/**
 * The zh-cn lang file of batch module of Ranzhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商业软件，非开源软件
 * @author      Gang Liu <liugang@cnezsoft.com> 
 * @package     batch
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */
if(!isset($lang->batch)) $lang->batch = new stdclass();
$lang->batch->common               = 'Storage';
$lang->batch->browse               = 'To Delivered';
$lang->batch->browsePurchaseOrders = 'To Purchased';
$lang->batch->browseFinished       = 'Finished';
$lang->batch->create               = 'Receipt';
$lang->batch->detail               = 'Detail';
$lang->batch->editPick             = 'Edit Distribution';
$lang->batch->editDeliver          = 'Edit Delivery';
$lang->batch->editReceive          = 'Edit Receipt';
$lang->batch->printBatch           = 'Print Voucher';
$lang->batch->showBatchProducts    = 'Details';
$lang->batch->createExpress        = 'New';

$lang->batch->order         = 'Order';
$lang->batch->pickedBy      = 'Distributed By';
$lang->batch->pickedDate    = 'Distributed On';
$lang->batch->express       = 'Express';
$lang->batch->waybill       = 'Waybill No.';

$lang->batch->id              = 'ID';
$lang->batch->batchNo         = 'Bill No.';
$lang->batch->product         = 'Product';
$lang->batch->model           = 'Spec';
$lang->batch->unit            = 'Unit';
$lang->batch->price           = 'Price';
$lang->batch->amount          = 'Quantity';
$lang->batch->money           = 'Amount';
$lang->batch->status          = 'Status';
$lang->batch->pickedAmount    = 'Distributed Qty';
$lang->batch->deliveredAmount = 'Delivered Qty';
$lang->batch->receivedAmount  = 'Received Qty';
$lang->batch->orderAmount     = 'Ordered Qty';
$lang->batch->batchInfo       = 'NO. %s';

$lang->batch->type          = 'Type';
$lang->batch->expressedBy   = 'Handler';
$lang->batch->expressedDate = 'Date';
$lang->batch->sendSuccess   = 'Send Success';

$lang->batch->batchNoList['out'] = 'Storage No.';
$lang->batch->batchNoList['in']  = 'Storage No.';

$lang->batch->trader = new stdclass();
$lang->batch->trader->common = 'Client & Provider';
$lang->batch->trader->out    = 'Client';
$lang->batch->trader->in     = 'Provider';

$lang->batch->pick = new stdclass();
$lang->batch->pick->common        = 'Distributing';
$lang->batch->pick->info          = 'Distribution';
$lang->batch->pick->amount        = 'Quantity';
$lang->batch->pick->edit          = 'Edit';
$lang->batch->pick->expressedBy   = 'Sent By';
$lang->batch->pick->expressedDate = 'Sent On';

$lang->batch->deliver = new stdclass();
$lang->batch->deliver->common        = 'Delivery';
$lang->batch->deliver->info          = 'Delivery Infomation';
$lang->batch->deliver->amount        = 'Quantity';
$lang->batch->deliver->edit          = 'Edit';
$lang->batch->deliver->expressedBy   = 'Sent By';
$lang->batch->deliver->expressedDate = 'Sent On';

$lang->batch->receive = new stdclass();
$lang->batch->receive->common        = 'Receipt';
$lang->batch->receive->info          = 'Receipt Infomation';
$lang->batch->receive->amount        = 'Quantity';
$lang->batch->receive->edit          = 'Edit';
$lang->batch->receive->expressedBy   = 'Received By';
$lang->batch->receive->expressedDate = 'Received On';

$lang->batch->finished = new stdclass();
$lang->batch->finished->common        = 'Finished';

$lang->batch->statusList['']          = '';
$lang->batch->statusList['picking']   = 'Distributing';
$lang->batch->statusList['delivered'] = 'Delivered';
$lang->batch->statusList['received']  = 'Received';

$lang->batch->error = new stdclass();
$lang->batch->error->emptyAmount = '<strong>%s</strong> must have a non-zero value.';

$lang->batch->print = new stdclass();
$lang->batch->print->out = 'Invoice';
$lang->batch->print->in  = 'Receipt';
