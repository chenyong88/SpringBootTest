<?php
/**
 * The en file of psi common module of RanZhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商业软件，非开源软件
 * @author      Gang Liu <liugang@cnezsoft.com> 
 * @package     common 
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */
$lang->app = new stdclass();
$lang->app->name = 'PSI';

$lang->menu->psi = new stdclass();
$lang->menu->psi->sale     = 'Sale|sale|index|';
$lang->menu->psi->purchase = 'Purchase|purchase|index|';
$lang->menu->psi->batch    = 'Inventory|batch|browse|status=picking';
$lang->menu->psi->customer = 'Customer|customer|index|';
$lang->menu->psi->provider = 'Provider|provider|index|';
$lang->menu->psi->product  = 'Product|product|index|';
$lang->menu->psi->setting  = 'Settings|setting|index|';

/* Menu of sale module. */
$lang->sale = new stdclass();
$lang->sale->menu = new stdclass();
$lang->sale->menu->assignedToMe = 'AssignedToMe|sale|browse|status=assignedToMe';
$lang->sale->menu->underway     = 'Underway|sale|browse|status=underway';
$lang->sale->menu->all          = 'All|sale|browse|status=all';
$lang->sale->menu->picking      = 'Distributing|sale|browse|status=picking';
$lang->sale->menu->canceled     = 'Cancelled|sale|browse|status=canceled';
$lang->sale->menu->finished     = 'Finished|sale|browse|status=finished';
$lang->sale->menu->report       = 'Report|sale|report|';

/* Menu of purchase module. */
$lang->purchase = new stdclass();
$lang->purchase->menu = new stdclass();
$lang->purchase->menu->assignedToMe = 'AssigendToMe|purchase|browse|status=assignedToMe';
$lang->purchase->menu->underway     = 'Underway|purchase|browse|status=underway';
$lang->purchase->menu->all          = 'All|purchase|browse|status=all';
$lang->purchase->menu->toPurchase   = 'To Purchased|purchase|purchase|';
$lang->purchase->menu->canceled     = 'Cancelled|purchase|browse|status=canceled';
$lang->purchase->menu->finished     = 'Finished|purchase|browse|status=finished';
$lang->purchase->menu->report       = 'Report|purchase|report|';

/* Menu of batch module. */
$lang->batch = new stdclass();
$lang->batch->menu = new stdclass();
$lang->batch->menu->pick     = array('link' => 'To Be Delivered|batch|browse|status=picking', 'alias' => 'printbatch');
$lang->batch->menu->receive  = 'To Be Received|batch|browsePurchaseOrders|';
$lang->batch->menu->finished = 'Finished|batch|browseFinished|';

/* Menu of setting module. */
$lang->setting = new stdclass();
$lang->setting->menu = new stdclass();
$lang->setting->menu->store   = 'Store|store|browse|';
$lang->setting->menu->express = 'Express|product|browseProperties|module=product&section=expresses';
$lang->setting->menu->orderno = 'Voucher No.|order|setOrderNo|type=sale';

$lang->store = new stdclass();
$lang->store->menu = $lang->setting->menu;

$lang->menuGroups->store = 'setting';
include(dirname(__FILE__) . '/menuOrder.php');
