<?php
/**
 * The report module English file of RanZhi.
 *
 * @copyright   Copyright 2009-2018 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Chunsheng Wang <chunsheng@cnezsoft.com>
 * @package     report
 * @version     $Id: en.php 5080 2013-07-10 00:46:59Z wyd621@gmail.com $
 * @link        http://www.zdoo.org
 */
if(!isset($lang->report)) $lang->report = new stdclass();
$lang->report->common     = 'Report';
$lang->report->browse     = 'View Report';
$lang->report->list       = 'Reports';
$lang->report->item       = 'Item';
$lang->report->value      = 'Value';
$lang->report->percent    = 'Percent';
$lang->report->undefined  = 'Undefined';
$lang->report->time       = 'Time';
$lang->report->select     = 'Pleace select the type of reports';
$lang->report->create     = 'Generate';
$lang->report->tip        = 'Note: Report is generated from search results. Please search in the list page before you generate a report.';

$lang->report->options = new stdclass();
$lang->report->options->type   = 'pie';
$lang->report->options->width  = 500;
$lang->report->options->height = 140;

$lang->report->options->graph = new stdclass();
$lang->report->options->graph->xAxisName = 'DEFAULT';
$lang->report->options->graph->caption   = 'DEFAULT';   // 是否显示柱状图阴影。

$lang->report->customer = new stdclass();
$lang->report->customer->common = 'Customer Report';
$lang->report->customer->chartList['assignedTo'] = 'Assigned To';
$lang->report->customer->chartList['status']     = 'Status';
$lang->report->customer->chartList['level']      = 'Level';
$lang->report->customer->chartList['type']       = 'Type';
$lang->report->customer->chartList['size']       = 'Size';
$lang->report->customer->chartList['area']       = 'Area';
$lang->report->customer->chartList['industry']   = 'Industry';

$lang->report->customer->item['assignedTo'] = 'User';
$lang->report->customer->item['status']     = 'Status';
$lang->report->customer->item['level']      = 'Level';
$lang->report->customer->item['type']       = 'Type';
$lang->report->customer->item['size']       = 'Size';
$lang->report->customer->item['area']       = 'Area';
$lang->report->customer->item['industry']   = 'Industry';

$lang->report->customer->value['assignedTo'] = 'Customer';
$lang->report->customer->value['status']     = 'Customer';
$lang->report->customer->value['level']      = 'Customer';
$lang->report->customer->value['type']       = 'Customer';
$lang->report->customer->value['size']       = 'Customer';
$lang->report->customer->value['area']       = 'Customer';
$lang->report->customer->value['industry']   = 'Customer';

/* order setting. */
$lang->report->order = new stdclass();
$lang->report->order->common = 'Order Report';
$lang->report->order->chartList['product']      = 'Product (Number)';
$lang->report->order->chartList['productLine']  = 'Product Line (Number)';
$lang->report->order->chartList['status']       = 'Status (Number)';
$lang->report->order->chartList['assignedTo']   = 'Assigned To (Number)';
$lang->report->order->chartList['createdBy']    = 'Created by (Number)';
$lang->report->order->chartList['year']         = 'Year (Number)';
$lang->report->order->chartList['month']        = 'Month (Number)';
$lang->report->order->chartList['productA']     = 'Product (Amount)';
$lang->report->order->chartList['productLineA'] = 'Product Line (Amount)';
$lang->report->order->chartList['statusA']      = 'Status (Amount)';
$lang->report->order->chartList['assignedToA']  = 'Assigned  To(Amount)';
$lang->report->order->chartList['createdByA']   = 'Created By (Amount)';
$lang->report->order->chartList['yearA']        = 'Year (Amount)';
$lang->report->order->chartList['monthA']       = 'Month (Amount)';

$lang->report->order->item['product']      = 'Product';
$lang->report->order->item['productLine']  = 'Product Line';
$lang->report->order->item['status']       = 'Status';
$lang->report->order->item['assignedTo']   = 'User';
$lang->report->order->item['createdBy']    = 'User';
$lang->report->order->item['year']         = 'Year';
$lang->report->order->item['month']        = 'Month';
$lang->report->order->item['productA']     = 'Product';
$lang->report->order->item['productLineA'] = 'Product Line';
$lang->report->order->item['statusA']      = 'Status';
$lang->report->order->item['assignedToA']  = 'User';
$lang->report->order->item['createdByA']   = 'User';
$lang->report->order->item['yearA']         = 'Year';
$lang->report->order->item['monthA']        = 'Month';

$lang->report->order->value['product']      = 'Order';
$lang->report->order->value['productLine']  = 'Order';
$lang->report->order->value['status']       = 'Order';
$lang->report->order->value['assignedTo']   = 'Order';
$lang->report->order->value['createdBy']    = 'Order';
$lang->report->order->value['year']         = 'Order';
$lang->report->order->value['month']        = 'Order';
$lang->report->order->value['productA']     = 'Real money';
$lang->report->order->value['productLineA'] = 'Real money';
$lang->report->order->value['statusA']      = 'Real money';
$lang->report->order->value['assignedToA']  = 'Real money';
$lang->report->order->value['createdByA']   = 'Real money';
$lang->report->order->value['yearA']        = 'Real money';
$lang->report->order->value['monthA']       = 'Real money';

$lang->report->order->options = new stdclass();
$lang->report->order->options->typeList['year']    = 'bar';
$lang->report->order->options->typeList['month']   = 'bar';
$lang->report->order->options->typeList['yearA']   = 'bar';
$lang->report->order->options->typeList['monthA']  = 'bar';

$lang->report->contract = new stdclass();
$lang->report->contract->common = 'Contract Report';
$lang->report->contract->chartList['status']       = 'Status (Number)';
$lang->report->contract->chartList['delivery']     = 'Delivery (Number)';
$lang->report->contract->chartList['return']       = 'Payment (Number)';
$lang->report->contract->chartList['createdBy']    = 'Created By (Number)';
$lang->report->contract->chartList['signedBy']     = 'Signed By (Number)';
$lang->report->contract->chartList['deliveredBy']  = 'Delivered By (Number)';
//$lang->report->contract->chartList['handlers']     = 'Handlers(Number)';
$lang->report->contract->chartList['contactedBy']  = 'Contacted By (Number)';
$lang->report->contract->chartList['year']         = 'Year (Number)';
$lang->report->contract->chartList['month']        = 'Month (Number)';
$lang->report->contract->chartList['statusA']      = 'Status (Amount)';
$lang->report->contract->chartList['deliveryA']    = 'Delivery (Amount)';
$lang->report->contract->chartList['returnA']      = 'Payment (Amount)';
$lang->report->contract->chartList['createdByA']   = 'Created By (Amount)';
$lang->report->contract->chartList['signedByA']    = 'Signed By (Amount)';
$lang->report->contract->chartList['deliveredByA'] = 'Delivered By (Amount)';
//$lang->report->contract->chartList['handlersA']    = 'Handlers(Money)';
$lang->report->contract->chartList['contactedByA'] = 'Contacted By(Amount)';
$lang->report->contract->chartList['yearA']        = 'Year (Amount)';
$lang->report->contract->chartList['monthA']       = 'Month (Amount)';

$lang->report->contract->item['status']       = 'Stuatus';
$lang->report->contract->item['delivery']     = 'Delivery';
$lang->report->contract->item['return']       = 'Payment';
$lang->report->contract->item['createdBy']    = 'User';
$lang->report->contract->item['signedBy']     = 'User';
$lang->report->contract->item['deliveredBy']  = 'User';
$lang->report->contract->item['handlers']     = 'User';
$lang->report->contract->item['contactedBy']  = 'User';
$lang->report->contract->item['year']         = 'Year';
$lang->report->contract->item['month']        = 'Month';
$lang->report->contract->item['statusA']      = 'Status';
$lang->report->contract->item['deliveryA']    = 'Delivery';
$lang->report->contract->item['returnA']      = 'Payment';
$lang->report->contract->item['createdByA']   = 'User';
$lang->report->contract->item['signedByA']    = 'User';
$lang->report->contract->item['deliveredByA'] = 'User';
$lang->report->contract->item['handlersA']    = 'User';
$lang->report->contract->item['contactedByA'] = 'User';
$lang->report->contract->item['yearA']        = 'Year';
$lang->report->contract->item['monthA']       = 'Month';

$lang->report->contract->value['status']       = 'Number';
$lang->report->contract->value['delivery']     = 'Number';
$lang->report->contract->value['return']       = 'Number';
$lang->report->contract->value['createdBy']    = 'Number';
$lang->report->contract->value['signedBy']     = 'Number';
$lang->report->contract->value['deliveredBy']  = 'Number';
$lang->report->contract->value['handlers']     = 'Number';
$lang->report->contract->value['contactedBy']  = 'Number';
$lang->report->contract->value['year']         = 'Year';
$lang->report->contract->value['month']        = 'Month';
$lang->report->contract->value['statusA']      = 'Amount';
$lang->report->contract->value['deliveryA']    = 'Amount';
$lang->report->contract->value['returnA']      = 'Amount';
$lang->report->contract->value['createdByA']   = 'Amount';
$lang->report->contract->value['signedByA']    = 'Amount';
$lang->report->contract->value['deliveredByA'] = 'Amount';
$lang->report->contract->value['handlersA']    = 'Amount';
$lang->report->contract->value['contactedByA'] = 'Amount';
$lang->report->contract->value['yearA']        = 'Amount';
$lang->report->contract->value['monthA']       = 'Amount';

$lang->report->contract->options = new stdclass();
$lang->report->contract->options->typeList['year']    = 'bar';
$lang->report->contract->options->typeList['month']   = 'bar';
$lang->report->contract->options->typeList['yearA']   = 'bar';
$lang->report->contract->options->typeList['monthA']  = 'bar';

/* daily reminder. */
$lang->report->idAB         = 'ID';
$lang->report->orderTitle   = 'Order Title';
$lang->report->taskName     = 'Task Name';
$lang->report->todoName     = 'Todo Name';
$lang->report->customerName = 'Customer Name';

$lang->report->mailTitle           = new stdclass();
$lang->report->mailTitle->begin    = 'Notice: You have';
$lang->report->mailTitle->order    = " Urgent orders(%s),";
$lang->report->mailTitle->task     = " Tasks(%s),";
$lang->report->mailTitle->todo     = " Todos(%s),";
$lang->report->mailTitle->customer = " Urgent customers(%s),";
$lang->report->mailTitle->contractCount = " Tracked contracts(%s),";
