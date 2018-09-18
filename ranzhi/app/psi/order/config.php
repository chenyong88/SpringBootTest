<?php
/**
 * The config file of order module of Ranzhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商业软件，非开源软件
 * @author      Gang Liu <liugang@cnezsoft.com>
 * @package     order
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */
$config->order->newItemsCount     = 5;
$config->order->printItems        = 8;

$config->order->excel = new stdclass();
$config->order->excel->fields       = array('orderNo', 'trader', 'createdBy', 'createdDate', 'finishedDate', 'money', 'status', 'settlement', 'desc');
$config->order->excel->detailFields = array('product', 'model', 'unit', 'amount', 'price', 'totalPrice');
$config->order->excel->numberFields = array('money', 'amount', 'price', 'totalPrice');
$config->order->excel->customWidth  = array('orderNo' => 20, 'contract' => 20, 'trader' => 15, 'money' => 10, 'finishedDate' => 10, 'createdBy' => 10, 'createdDate' => 10, 'status' => 10, 'settlement' => 10, 'desc' => 15, 'product' => 20, 'model' => 15, 'unit' => 10, 'amount' => 10, 'price' => 10, 'totalPrice' => 10);

$config->order->require = new stdclass();
$config->order->require->create           = 'trader, finishedDate'; 
$config->order->require->edit             = 'trader, finishedDate';
$config->order->require->createProduct    = 'trader'; 
$config->order->require->assign           = 'assignedTo, status';
$config->order->require->assignToPurchase = 'assignedTo';
$config->order->require->finish           = 'finishedDate';

$config->order->editor = new stdclass();
$config->order->editor->assignto = array('id' => 'comment', 'tools' => 'simple');
$config->order->editor->cancel   = array('id' => 'comment', 'tools' => 'simple');
$config->order->editor->activate = array('id' => 'comment', 'tools' => 'simple');
$config->order->editor->finish   = array('id' => 'comment', 'tools' => 'simple');

$config->order->print = new stdClass();
$config->order->print->maxLines  = 16;

$config->order->orderNo = new stdclass();
$config->order->orderNo->tables['sale']           = TABLE_PSI_ORDER;
$config->order->orderNo->tables['saleRefund']     = TABLE_PSI_ORDER;
$config->order->orderNo->tables['purchase']       = TABLE_PSI_ORDER;
$config->order->orderNo->tables['purchaseRefund'] = TABLE_PSI_ORDER;
$config->order->orderNo->tables['in']             = TABLE_BATCH;
$config->order->orderNo->tables['out']            = TABLE_BATCH;

$config->order->orderNo->fields[TABLE_PSI_ORDER] = 'orderNo';
$config->order->orderNo->fields[TABLE_BATCH]     = 'batchNo';
