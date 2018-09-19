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

$lang->block->availableBlocks->salary = '工资列表';

$lang->block->orderByList = new stdclass();

$lang->block->orderByList->order = array();
$lang->block->orderByList->order['id_asc']       = 'ID 递增 ';
$lang->block->orderByList->order['id_desc']      = 'ID 递减';
$lang->block->orderByList->order['customer_asc'] = '客户';
$lang->block->orderByList->order['product_asc']  = '产品';

$lang->block->typeList = new stdclass();

$lang->block->typeList->order['assignedTo']   = '指派给我';
$lang->block->typeList->order['createdBy']    = '由我创建';
$lang->block->typeList->order['signedBy']     = '由我签约';
$lang->block->typeList->order['closedBy']     = '由我关闭';
$lang->block->typeList->order['activatedBy']  = '由我激活';
$lang->block->typeList->order['normalstatus'] = '正常';
$lang->block->typeList->order['signedstatus'] = '已签约';
$lang->block->typeList->order['closedstatus'] = '已关闭';
