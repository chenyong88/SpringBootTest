<?php
/**
 * The en file of crm block module of RanZhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商业软件，非开源软件
 * @author      Xiying Guan <guanxiying@xirangit.com>
 * @package     block 
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */
$lang->block->common   = 'Blocks';
$lang->block->num      = 'Amount';
$lang->block->type     = 'Type';
$lang->block->orderBy  = 'Order By';
$lang->block->status   = 'Status';
$lang->block->actions  = 'Options';
$lang->block->lblBlock = 'Block';

$lang->block->admin    = 'Manage Blocks';
$lang->block->availableBlocks = new stdclass();

$lang->block->availableBlocks->sale     = 'Sale Order';
$lang->block->availableBlocks->purchase = 'Purchase Order';
//$lang->block->availableBlocks->batch    = 'Batch';

$lang->block->orderByList = new stdclass();

$lang->block->orderByList->sale = array();
$lang->block->orderByList->sale['id_asc']            = 'ID ASC';
$lang->block->orderByList->sale['id_desc']           = 'ID DESC';
$lang->block->orderByList->sale['trader_asc']        = 'trader ASC';
$lang->block->orderByList->sale['money_asc']         = 'Money ASC';
$lang->block->orderByList->sale['money_desc']        = 'Money DESC';
$lang->block->orderByList->sale['finishedDate_asc']  = 'FinishedDate ASC';
$lang->block->orderByList->sale['finishedDate_desc'] = 'FinishedDate DESC';

$lang->block->orderByList->purchase = array();
$lang->block->orderByList->purchase['id_asc']            = 'ID ASC ';
$lang->block->orderByList->purchase['id_desc']           = 'ID DESC';
$lang->block->orderByList->purchase['trader_asc']        = 'Trader ASC';
$lang->block->orderByList->purchase['money_asc']         = 'Money ASC';
$lang->block->orderByList->purchase['money_desc']        = 'Money DESC';
$lang->block->orderByList->purchase['finishedDate_asc']  = 'FinishedDate ASC';
$lang->block->orderByList->purchase['finishedDate_desc'] = 'FinishedDate Desc';

$lang->block->orderByList->batch = array();
$lang->block->orderByList->batch['id_asc']     = 'ID ASC ';
$lang->block->orderByList->batch['id_desc']    = 'ID DESC';
$lang->block->orderByList->batch['trader_asc'] = 'Trader';
$lang->block->orderByList->batch['money_asc']  = 'Money ASC';
$lang->block->orderByList->batch['money_desc'] = 'Money DESC';

$lang->block->typeList = new stdclass();

$lang->block->typeList->sale['assignedToMe'] = 'Assigned To Me';
$lang->block->typeList->sale['underway']     = 'Underway';
$lang->block->typeList->sale['picking']      = 'Picking';

$lang->block->typeList->purchase['assignedToMe'] = 'Assigned To Me';
$lang->block->typeList->purchase['underway']     = 'Underway';

$lang->block->typeList->batch['picking']   = 'Picking';
$lang->block->typeList->batch['delivered'] = 'Delivered';
$lang->block->typeList->batch['received']  = 'Received';
