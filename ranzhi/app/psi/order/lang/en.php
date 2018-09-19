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
$lang->order->common           = 'Order';
$lang->order->browse           = 'Orders';
$lang->order->create           = 'Create an Order';
$lang->order->createRefund     = 'Add a Return';
$lang->order->edit             = 'Edit Order';
$lang->order->editRefund       = 'Edit Return';
$lang->order->cancel           = 'Cancel Order';
$lang->order->activate         = 'Activate Order';
$lang->order->finish           = 'Finish Order';
$lang->order->detail           = 'Order Detail';
$lang->order->view             = 'Order Details';
$lang->order->assignToPick     = 'Distribute';
$lang->order->assignToPurchase = 'Purchase';
$lang->order->purchase         = 'Purchase';
$lang->order->printOrder       = 'Print';
$lang->order->sale             = 'Sales';
$lang->order->history          = 'History';
$lang->order->setOrderNo       = 'Order No.';
$lang->order->sendMail         = 'Send Email';

$lang->order->common       = 'Order';
$lang->order->id           = 'ID';
$lang->order->refundNo     = 'Return No.';
$lang->order->money        = 'Amount';
$lang->order->taxed        = 'Tax';
$lang->order->finishedDate = 'Delivered On';
$lang->order->desc         = 'Description';
$lang->order->createdBy    = 'Created By';
$lang->order->createdDate  = 'Created On';
$lang->order->status       = 'Status';
$lang->order->refundStatus = 'Status of Return';
$lang->order->type         = 'Type';
$lang->order->contract     = 'Contract';
$lang->order->settlement   = 'Settlement';
$lang->order->assignedTo   = 'Assigned To';
$lang->order->assignedBy   = 'Assigend By';
$lang->order->assignedDate = 'Assigend On';
$lang->order->page         = 'Page %s, Total Pages %s';

$lang->order->typeList = array();
$lang->order->typeList['sale']           = 'Sale';
$lang->order->typeList['purchase']       = 'Purchase';
//$lang->order->typeList['saleRefund']     = 'Sale Return';
//$lang->order->typeList['purchaseRefund'] = 'Purchase Return'; 
$lang->order->typeList['out']            = 'Warehouse Shipment';
$lang->order->typeList['in']             = 'Warehouse Storage';

$lang->order->orderAmount    = 'Order';
$lang->order->storeAmount    = 'Stock';
$lang->order->purchaseAmount = 'To Purchase';
$lang->order->showProducts   = 'Product Details';
$lang->order->createTrader   = 'New';
$lang->order->createBuyOrder = 'Create Purchase Order';
$lang->order->createProduct  = 'Add a Prodcut';

$lang->order->all          = 'All';
$lang->order->assignedToMe = 'Assigned To Me';
$lang->order->canceled     = 'Cancelled';
$lang->order->finished     = 'Finished';
$lang->order->titleLBL     = '%s : %s';

$lang->order->batchNumber  = 'Batch No. <strong> %s </strong>';

$lang->order->exportOrder = array();
$lang->order->exportOrder['purchase'] = 'Purchase List';
$lang->order->exportOrder['sale']     = 'Sale List';
$lang->order->exportOrder['default']  = 'Order List';

$lang->order->trader['sale']           = 'Customer';
$lang->order->trader['purchase']       = 'Provider';
$lang->order->trader['saleRefund']     = $lang->order->trader['sale'];
$lang->order->trader['purchaseRefund'] = $lang->order->trader['purchase'];

$lang->order->batch['sale']           = 'Delivery';
$lang->order->batch['purchase']       = 'Receipt';
$lang->order->batch['saleRefund']     = $lang->order->batch['purchase'];
$lang->order->batch['purchaseRefund'] = $lang->order->batch['sale'];

$lang->order->product        = 'Product';
$lang->order->total          = 'Total';
$lang->order->subtotal       = 'Sub Total';
$lang->order->canceledReason = 'Cancel Reason';
$lang->order->canceledTips   = 'Cancellation will delete the delivery & receipt records.';
$lang->order->pick           = 'Distribute';
$lang->order->moneyInWords   = 'Amount in Characters';

$lang->order->mail = new stdclass();
$lang->order->mail->send       = 'Send';
$lang->order->mail->sendMail   = 'Send Mail';
$lang->order->mail->endnote    = "Powerd by <a href='http://http://www.zdoo.org/'>Zdoo</a>";
$lang->order->mail->choseUser  = 'Select a receiver';

$lang->order->mail->orderType['purchase']       = 'Purchase Details.xls';
$lang->order->mail->orderType['sale']           = 'Sale Details.xls';
$lang->order->mail->orderType['purchaseRefund'] = 'Purchase Return Details.xls';
$lang->order->mail->orderType['saleRefund']     = 'Sale Return Details.xls';

$lang->order->mail->subject['purchase']       = "%s Purhcase Bill";
$lang->order->mail->subject['sale']           = "%s Sale Bill";
$lang->order->mail->subject['purchaseRefund'] = "%s Purchase Return Bill";
$lang->order->mail->subject['saleRefund']     = "%s Sale Return Bill";

$lang->order->statusList['']              = '';
$lang->order->statusList['all']           = 'All';
$lang->order->statusList['assignedToMe']  = 'Assigend To Me';
$lang->order->statusList['underway']      = 'Underway';
$lang->order->statusList['pending']       = 'Pending';
$lang->order->statusList['toReceive']     = 'To Received';
$lang->order->statusList['received']      = 'Received';
$lang->order->statusList['partReceived']  = 'Part Received';
$lang->order->statusList['toPurchase']    = 'To Purchased';
$lang->order->statusList['purchasing']    = 'Purchasing';
$lang->order->statusList['purchased']     = 'Purchased';
$lang->order->statusList['picking']       = 'Distributing';
$lang->order->statusList['toDeliver']     = 'To Delivered';
$lang->order->statusList['delivered']     = 'Delivered';
$lang->order->statusList['partDelivered'] = 'Part Delivered';
$lang->order->statusList['canceled']      = 'Cancelled';
$lang->order->statusList['finished']      = 'Finished';

$lang->order->settlementList[0] = '';
$lang->order->settlementList[1] = 'Cash';
$lang->order->settlementList[2] = 'Bank Wire';
$lang->order->settlementList[3] = 'Check';
$lang->order->settlementList[4] = 'Exchange Bill';
$lang->order->settlementList[5] = 'Collection';

$lang->order->taxedList[1] = 'Tax included';
$lang->order->taxedList[0] = 'Tax excluded';

$lang->order->orderNo = new stdclass();
$lang->order->orderNo->common    = 'Order No.';
$lang->order->orderNo->type      = 'Type';
$lang->order->orderNo->length    = 'Length';
$lang->order->orderNo->clearType = 'Reset';
$lang->order->orderNo->preview   = 'Preview';

$lang->order->orderNo->typeList['fixed'] = 'Fixed Value';
$lang->order->orderNo->typeList['year']  = 'Year';
$lang->order->orderNo->typeList['month'] = 'Month';
$lang->order->orderNo->typeList['day']   = 'Day';
$lang->order->orderNo->typeList['AI']    = 'Auto Increment';

$lang->order->orderNo->yearLength[2] = '2';
$lang->order->orderNo->yearLength[4] = '4';

$lang->order->orderNo->AI['length'][2] = '2';
$lang->order->orderNo->AI['length'][3] = '3';
$lang->order->orderNo->AI['length'][4] = '4';

$lang->order->orderNo->AI['clearType']['day']   = 'Reset Every Day';
$lang->order->orderNo->AI['clearType']['month'] = 'Reset Every Month';
$lang->order->orderNo->AI['clearType']['year']  = 'Reset Every Year';

$lang->order->orderNo->placeholder = new stdclass();
$lang->order->orderNo->placeholder->fixed = 'Input a value, eg. SO';

$lang->order->orderNo->tips = 'Do not modify this page after the system is officially activated.';

$lang->order->orderNo->error = new stdclass(); 
$lang->order->orderNo->error->emptyAI = 'Must have one line which type is Auto Increment.';

$lang->order->print = new stdclass();
$lang->order->print->common         = 'Print';
$lang->order->print->page           = 'Pgae %s';
$lang->order->print->pageTitle      = 'Page %s / Total %s';
$lang->order->print->purchase       = 'Purchase Order';
$lang->order->print->sale           = 'Sale Order';
$lang->order->print->purchaseRefund = 'Purchase Return Order';
$lang->order->print->saleRefund     = 'Sale Return Order';
$lang->order->print->pick           = 'Distribution Voucher';
$lang->order->print->deliver        = 'Delivery Bill';
$lang->order->print->contract       = 'Contract';
$lang->order->print->product        = 'Product';
$lang->order->print->tabulation     = 'Tabulation:';
$lang->order->print->check          = 'Check:';
$lang->order->print->delivery       = 'Delivery:';
$lang->order->print->finishedDate   = '<strong>Attention</strong>: %s to deliver above products.';
$lang->order->print->hidePrice      = 'Hide price and amount';
$lang->order->print->tel            = 'TEL：';
$lang->order->print->fax            = 'FAX：';
$lang->order->print->to             = 'To：';
$lang->order->print->attn           = 'ATTN：';
$lang->order->print->from           = 'FROM：';
$lang->order->print->settlement     = '2. Settlement: ';
$lang->order->print->desc           = '3. Description: ';
$lang->order->print->help           = 'Help';

$lang->order->print->sign['sale']           = 'Signed Person: ';
$lang->order->print->sign['purchase']       = 'Signed Person: ';
$lang->order->print->sign['saleRefund']     = $lang->order->print->sign['sale'];
$lang->order->print->sign['purchaseRefund'] = $lang->order->print->sign['purchase'];

$lang->order->print->taxedList[0] = '1. Not tax included.';
$lang->order->print->taxedList[1] = '1. Include tax (17%).';

$lang->order->print->trader['sale']           = 'Buyer';
$lang->order->print->trader['purchase']       = 'Delivered By';
$lang->order->print->trader['saleRefund']     = $lang->order->print->trader['sale'];
$lang->order->print->trader['purchaseRefund'] = $lang->order->print->trader['purchase'];

$lang->order->print->orderNo['sale']           = 'Sales Order No. ';
$lang->order->print->orderNo['purchase']       = 'Purchase Order No. ';
//$lang->order->print->orderNo['saleRefund']     = 'Sales Return Order No. ';
//$lang->order->print->orderNo['purchaseRefund'] = 'Purchase Return Order No. ';

$lang->order->error = new stdclass();
$lang->order->error->noRecord    = 'Input a valid product.';
$lang->order->error->notSelected = 'Choose products to purchased.';
$lang->order->error->notFinished = 'The products have not been %s, can not finish the order.';
$lang->order->error->hasSent     = 'The product has been %s, can not delete it.';
$lang->order->error->errorAmount = 'The product has been %s%s, the amount of order can not be less than the delivered amount.';
$lang->order->error->cantChange  = 'The product has been %s, can not modify name.';

/* item */
$lang->order->pickedBy      = 'Distributed By';
$lang->order->expressedBy   = 'Delivered By';
$lang->order->receivedBy    = 'Received By';
$lang->order->express       = 'Express';
$lang->order->waybill       = 'Express Waybill';
$lang->order->expressedDate = 'Delivered On';
$lang->order->pickedDate    = 'Distributed On';
$lang->order->receivedDate  = 'Received On';

$lang->orderProduct = new stdclass();
$lang->orderProduct->product    = 'Product';
$lang->orderProduct->amount     = 'Quantity';
$lang->orderProduct->model      = 'Spec';
$lang->orderProduct->unit       = 'Unit';
$lang->orderProduct->price      = 'Price';
$lang->orderProduct->totalPrice = 'Total';

$lang->order->deny = 'Denied';

$lang->order->report = new stdclass();
$lang->order->report->common   = 'Report';
$lang->order->report->sale     = 'Sale Report';
$lang->order->report->purchase = 'Purchase Report';
$lang->order->report->showDesc = 'Show Desc.';
$lang->order->report->noDesc   = 'No description.';
$lang->order->report->money    = 'Total amount is  %s, %s on this page.';
$lang->order->report->noPriv   = 'No permissions.';
$lang->order->report->search   = 'Search';

$lang->order->report->date['thismonth'] = 'This Month';
$lang->order->report->date['lastmonth'] = 'Last Month';
$lang->order->report->date['thisyear']  = 'This Year';
$lang->order->report->date['lastyear']  = 'Last Year';
$lang->order->report->date['all']       = 'All';

$lang->order->report->select['orderNo']  = '--Input an order No.--';
$lang->order->report->select['customer'] = '--Select a customer--';
$lang->order->report->select['provider'] = '--Select a provider--';
$lang->order->report->select['product']  = '--Select a product--';
$lang->order->report->select['category'] = '--Select a category--';
$lang->order->report->select['model']    = '--Select a spec--';
$lang->order->report->select['begin']    = '--Input begin date--';
$lang->order->report->select['end']      = '--Input end date--';

$lang->psiorder = $lang->order;
foreach($lang->orderProduct as $key => $value)
{
    $lang->psiorder->$key = $value;
}
