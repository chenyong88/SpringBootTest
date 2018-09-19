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
$lang->block->common   = 'Block';
$lang->block->num      = 'Num';
$lang->block->type     = 'Type';
$lang->block->orderBy  = 'Order By';
$lang->block->status   = 'Status';
$lang->block->actions  = 'Action';
$lang->block->lblBlock = 'Block';

$lang->block->admin           = 'Blocks';
$lang->block->availableBlocks = new stdclass();

$lang->block->availableBlocks->salary = 'Salary List';

$lang->block->orderByList = new stdclass();

$lang->block->orderByList->order = array();
$lang->block->orderByList->order['id_asc']       = 'ID ASC ';
$lang->block->orderByList->order['id_desc']      = 'ID DESC';
$lang->block->orderByList->order['customer_asc'] = 'Customer ASC';
$lang->block->orderByList->order['product_asc']  = 'Product ASC';

$lang->block->typeList = new stdclass();

$lang->block->typeList->order['assignedTo']   = 'Assigend To Me';
$lang->block->typeList->order['createdBy']    = 'My Created';
$lang->block->typeList->order['signedBy']     = 'My Signed';
$lang->block->typeList->order['closedBy']     = 'My Closed';
$lang->block->typeList->order['activatedBy']  = 'My Activated';
$lang->block->typeList->order['normalstatus'] = 'Normal';
$lang->block->typeList->order['signedstatus'] = 'Signed';
$lang->block->typeList->order['closedstatus'] = 'Closed';
