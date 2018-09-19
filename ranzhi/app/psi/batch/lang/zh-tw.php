<?php
/**
 * The zh-tw lang file of batch module of Ranzhi.
 *
 * @copyright   Copyright 2009-2016 青島易軟天創網絡科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商業軟件，非開源軟件
 * @author      chujilu <chujilu@cnezsoft.com>
 * @package     batch
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */
if(!isset($lang->batch)) $lang->batch = new stdclass();
$lang->batch->common               = '倉儲';
$lang->batch->browse               = '待發貨';
$lang->batch->browsePurchaseOrders = '待收貨';
$lang->batch->browseFinished       = '已完成';
$lang->batch->create               = '收貨';
$lang->batch->detail               = '詳情';
$lang->batch->editPick             = '編輯配貨信息';
$lang->batch->editDeliver          = '編輯發貨信息';
$lang->batch->editReceive          = '編輯收貨信息';
$lang->batch->printBatch           = '打印出入庫單據';
$lang->batch->showBatchProducts    = '查看出入庫明細';
$lang->batch->createExpress        = '新建';

$lang->batch->order         = '訂單';
$lang->batch->pickedBy      = '配貨人';
$lang->batch->pickedDate    = '配貨日期';
$lang->batch->express       = '快遞';
$lang->batch->waybill       = '運單號';

$lang->batch->id              = '編號';
$lang->batch->batchNo         = '業務單號';
$lang->batch->product         = '品名';
$lang->batch->model           = '規格';
$lang->batch->unit            = '單位';
$lang->batch->price           = '單價';
$lang->batch->amount          = '數量';
$lang->batch->money           = '金額';
$lang->batch->status          = '狀態';
$lang->batch->pickedAmount    = '已配貨數量';
$lang->batch->deliveredAmount = '已發貨數量';
$lang->batch->receivedAmount  = '已收貨數量';
$lang->batch->orderAmount     = '訂單數量';
$lang->batch->batchInfo       = '第%s批次';

$lang->batch->type          = '出/入庫類型';
$lang->batch->expressedBy   = '經辦人';
$lang->batch->expressedDate = '經辦日期';
$lang->batch->sendSuccess   = '記錄成功！';

$lang->batch->batchNoList['out'] = '出庫單號';
$lang->batch->batchNoList['in']  = '入庫單號';

$lang->batch->trader = new stdclass();
$lang->batch->trader->common = '客戶/供應商';
$lang->batch->trader->out    = '客戶';
$lang->batch->trader->in     = '供應商';

$lang->batch->pick = new stdclass();
$lang->batch->pick->common        = '配貨';
$lang->batch->pick->info          = '配貨信息';
$lang->batch->pick->amount        = '本次配貨數量';
$lang->batch->pick->edit          = '編輯配貨信息';
$lang->batch->pick->expressedBy   = '發貨人';
$lang->batch->pick->expressedDate = '發貨日期';

$lang->batch->deliver = new stdclass();
$lang->batch->deliver->common        = '發貨';
$lang->batch->deliver->info          = '發貨信息';
$lang->batch->deliver->amount        = '本次發貨數量';
$lang->batch->deliver->edit          = '編輯發貨信息';
$lang->batch->deliver->expressedBy   = '發貨人';
$lang->batch->deliver->expressedDate = '發貨日期';

$lang->batch->receive = new stdclass();
$lang->batch->receive->common        = '收貨';
$lang->batch->receive->info          = '收貨信息';
$lang->batch->receive->amount        = '本次收貨數量';
$lang->batch->receive->edit          = '編輯收貨信息';
$lang->batch->receive->expressedBy   = '收貨人';
$lang->batch->receive->expressedDate = '收貨日期';

$lang->batch->finished = new stdclass();
$lang->batch->finished->common        = '已完成';

$lang->batch->statusList['']          = '';
$lang->batch->statusList['picking']   = '配貨中';
$lang->batch->statusList['delivered'] = '已發貨';
$lang->batch->statusList['received']  = '已收貨';

$lang->batch->error = new stdclass();
$lang->batch->error->emptyAmount = '<strong>%s</strong>不能全部為零。';

$lang->batch->print = new stdclass();
$lang->batch->print->out = '發貨單';
$lang->batch->print->in  = '收貨單';
