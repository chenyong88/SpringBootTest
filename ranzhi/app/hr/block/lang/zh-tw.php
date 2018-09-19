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

$lang->block->availableBlocks->salary = '工資列表';

$lang->block->orderByList = new stdclass();

$lang->block->orderByList->order = array();
$lang->block->orderByList->order['id_asc']       = 'ID 遞增 ';
$lang->block->orderByList->order['id_desc']      = 'ID 遞減';
$lang->block->orderByList->order['customer_asc'] = '客戶';
$lang->block->orderByList->order['product_asc']  = '產品';

$lang->block->typeList = new stdclass();

$lang->block->typeList->order['assignedTo']   = '指派給我';
$lang->block->typeList->order['createdBy']    = '由我創建';
$lang->block->typeList->order['signedBy']     = '由我簽約';
$lang->block->typeList->order['closedBy']     = '由我關閉';
$lang->block->typeList->order['activatedBy']  = '由我激活';
$lang->block->typeList->order['normalstatus'] = '正常';
$lang->block->typeList->order['signedstatus'] = '已簽約';
$lang->block->typeList->order['closedstatus'] = '已關閉';
