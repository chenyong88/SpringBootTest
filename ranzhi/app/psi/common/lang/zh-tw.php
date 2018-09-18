<?php
/**
 * The zh-tw file of psi common module of RanZhi.
 *
 * @copyright   Copyright 2009-2016 青島易軟天創網絡科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商業軟件，非開源軟件
 * @author      Gang Liu <liugang@cnezsoft.com> 
 * @package     common 
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */
$lang->app = new stdclass();
$lang->app->name = '進銷存';

$lang->menu->psi = new stdclass();
$lang->menu->psi->sale     = '銷售|sale|index|';
$lang->menu->psi->purchase = '採購|purchase|index|';
$lang->menu->psi->batch    = '倉儲|batch|browse|status=picking';
$lang->menu->psi->customer = '客戶|customer|index|';
$lang->menu->psi->provider = '供應商|provider|index|';
$lang->menu->psi->product  = '產品|product|index|';
$lang->menu->psi->setting  = '設置|setting|index|';

/* Menu of sale module. */
$lang->sale = new stdclass();
$lang->sale->menu = new stdclass();
$lang->sale->menu->assignedToMe = '指派給我|sale|browse|status=assignedToMe';
$lang->sale->menu->underway     = '進行中|sale|browse|status=underway';
$lang->sale->menu->all          = '所有訂單|sale|browse|status=all';
$lang->sale->menu->picking      = '待配貨|sale|browse|status=picking';
$lang->sale->menu->canceled     = '已取消|sale|browse|status=canceled';
$lang->sale->menu->finished     = '已完成|sale|browse|status=finished';
$lang->sale->menu->report       = '報表|sale|report|';

/* Menu of purchase module. */
$lang->purchase = new stdclass();
$lang->purchase->menu = new stdclass();
$lang->purchase->menu->assignedToMe = '指派給我|purchase|browse|status=assignedToMe';
$lang->purchase->menu->underway     = '進行中|purchase|browse|status=underway';
$lang->purchase->menu->all          = '所有訂單|purchase|browse|status=all';
$lang->purchase->menu->toPurchase   = '採購需求|purchase|purchase|';
$lang->purchase->menu->canceled     = '已取消|purchase|browse|status=canceled';
$lang->purchase->menu->finished     = '已完成|purchase|browse|status=finished';
$lang->purchase->menu->report       = '報表|purchase|report|';

/* Menu of batch module. */
$lang->batch = new stdclass();
$lang->batch->menu = new stdclass();
$lang->batch->menu->pick     = array('link' => '待發貨|batch|browse|status=picking', 'alias' => 'printbatch');
$lang->batch->menu->receive  = '待收貨|batch|browsePurchaseOrders|';
$lang->batch->menu->finished = '已完成|batch|browseFinished|';

/* Menu of setting module. */
$lang->setting = new stdclass();
$lang->setting->menu = new stdclass();
$lang->setting->menu->store   = '倉庫管理|store|browse|';
$lang->setting->menu->express = '快遞管理|product|browseProperties|module=product&section=expresses';
$lang->setting->menu->orderno = '單據編號|order|setOrderNo|type=sale';

$lang->store = new stdclass();
$lang->store->menu = $lang->setting->menu;

$lang->menuGroups->store = 'setting';
include(dirname(__FILE__) . '/menuOrder.php');
