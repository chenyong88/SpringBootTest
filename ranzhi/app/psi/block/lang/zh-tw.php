<?php
/**
 * The zh-tw file of crm block module of RanZhi.
 *
 * @copyright   Copyright 2009-2016 青島易軟天創網絡科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商業軟件，非開源軟件
 * @author      Yidong Wang <yidong@cnezsoft.com>
 * @package     block 
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */
$lang->block->common   = '區塊';
$lang->block->num      = '數量';
$lang->block->type     = '類型';
$lang->block->orderBy  = '排序';
$lang->block->status   = '狀態';
$lang->block->actions  = '操作';
$lang->block->lblBlock = '區塊';

$lang->block->admin    = '管理區塊';
$lang->block->availableBlocks = new stdclass();

$lang->block->availableBlocks->sale     = '銷售訂單';
$lang->block->availableBlocks->purchase = '採購訂單';
//$lang->block->availableBlocks->batch    = '倉儲';

$lang->block->orderByList = new stdclass();

$lang->block->orderByList->sale = array();
$lang->block->orderByList->sale['id_asc']            = 'ID 遞增 ';
$lang->block->orderByList->sale['id_desc']           = 'ID 遞減';
$lang->block->orderByList->sale['trader_asc']        = '客戶';
$lang->block->orderByList->sale['money_asc']         = '金額遞增';
$lang->block->orderByList->sale['money_desc']        = '金額遞減';
$lang->block->orderByList->sale['finishedDate_asc']  = '交付日期遞增';
$lang->block->orderByList->sale['finishedDate_desc'] = '交付日期遞減';

$lang->block->orderByList->purchase = array();
$lang->block->orderByList->purchase['id_asc']            = 'ID 遞增 ';
$lang->block->orderByList->purchase['id_desc']           = 'ID 遞減';
$lang->block->orderByList->purchase['trader_asc']        = '客戶';
$lang->block->orderByList->purchase['money_asc']         = '金額遞增';
$lang->block->orderByList->purchase['money_desc']        = '金額遞減';
$lang->block->orderByList->purchase['finishedDate_asc']  = '交付日期遞增';
$lang->block->orderByList->purchase['finishedDate_desc'] = '交付日期遞減';

$lang->block->orderByList->batch = array();
$lang->block->orderByList->batch['id_asc']     = 'ID 遞增 ';
$lang->block->orderByList->batch['id_desc']    = 'ID 遞減';
$lang->block->orderByList->batch['trader_asc'] = '客戶';
$lang->block->orderByList->batch['money_asc']  = '金額遞增';
$lang->block->orderByList->batch['money_desc'] = '金額遞減';

$lang->block->typeList = new stdclass();

$lang->block->typeList->sale['assignedToMe'] = '指派給我';
$lang->block->typeList->sale['underway']     = '進行中';
$lang->block->typeList->sale['picking']      = '待配貨';

$lang->block->typeList->purchase['assignedToMe'] = '指派給我';
$lang->block->typeList->purchase['underway']     = '進行中';

$lang->block->typeList->batch['picking']   = '配貨中';
$lang->block->typeList->batch['delivered'] = '已發貨';
$lang->block->typeList->batch['received']  = '已收貨';
