<?php
/**
 * The zh-cn file of crm block module of RanZhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商业软件，非开源软件
 * @author      Yidong Wang <yidong@cnezsoft.com>
 * @package     block 
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */
$lang->block->common   = '区块';
$lang->block->num      = '数量';
$lang->block->type     = '类型';
$lang->block->orderBy  = '排序';
$lang->block->status   = '状态';
$lang->block->actions  = '操作';
$lang->block->lblBlock = '区块';

$lang->block->admin    = '管理区块';
$lang->block->availableBlocks = new stdclass();

$lang->block->availableBlocks->sale     = '销售订单';
$lang->block->availableBlocks->purchase = '采购订单';
//$lang->block->availableBlocks->batch    = '仓储';

$lang->block->orderByList = new stdclass();

$lang->block->orderByList->sale = array();
$lang->block->orderByList->sale['id_asc']            = 'ID 递增 ';
$lang->block->orderByList->sale['id_desc']           = 'ID 递减';
$lang->block->orderByList->sale['trader_asc']        = '客户';
$lang->block->orderByList->sale['money_asc']         = '金额递增';
$lang->block->orderByList->sale['money_desc']        = '金额递减';
$lang->block->orderByList->sale['finishedDate_asc']  = '交付日期递增';
$lang->block->orderByList->sale['finishedDate_desc'] = '交付日期递减';

$lang->block->orderByList->purchase = array();
$lang->block->orderByList->purchase['id_asc']            = 'ID 递增 ';
$lang->block->orderByList->purchase['id_desc']           = 'ID 递减';
$lang->block->orderByList->purchase['trader_asc']        = '客户';
$lang->block->orderByList->purchase['money_asc']         = '金额递增';
$lang->block->orderByList->purchase['money_desc']        = '金额递减';
$lang->block->orderByList->purchase['finishedDate_asc']  = '交付日期递增';
$lang->block->orderByList->purchase['finishedDate_desc'] = '交付日期递减';

$lang->block->orderByList->batch = array();
$lang->block->orderByList->batch['id_asc']     = 'ID 递增 ';
$lang->block->orderByList->batch['id_desc']    = 'ID 递减';
$lang->block->orderByList->batch['trader_asc'] = '客户';
$lang->block->orderByList->batch['money_asc']  = '金额递增';
$lang->block->orderByList->batch['money_desc'] = '金额递减';

$lang->block->typeList = new stdclass();

$lang->block->typeList->sale['assignedToMe'] = '指派给我';
$lang->block->typeList->sale['underway']     = '进行中';
$lang->block->typeList->sale['picking']      = '待配货';

$lang->block->typeList->purchase['assignedToMe'] = '指派给我';
$lang->block->typeList->purchase['underway']     = '进行中';

$lang->block->typeList->batch['picking']   = '配货中';
$lang->block->typeList->batch['delivered'] = '已发货';
$lang->block->typeList->batch['received']  = '已收货';
