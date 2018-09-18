<?php
/**
 * The config file of batch module of Ranzhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商业软件，非开源软件
 * @author      Gang Liu <liugang@cnezsoft.com>
 * @package     batch 
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */
$config->batch->printItems = 8;

$config->batch->require = new stdclass();
$config->batch->require->deliver = 'pickedBy,pickedDate,expressedBy,expressedDate';
$config->batch->require->receive = 'expressedBy,expressedDate';

$config->batch->editor = new stdclass();
$config->batch->editor->deliver = array('id' => 'comment', 'tools' => 'simple');
$config->batch->editor->editdeliver = array('id' => 'comment', 'tools' => 'simple');

$config->batch->action = new stdclass();
$config->batch->action->receive = array(); 
$config->batch->action->receive['expressedBy']   = 'receivedBy';
$config->batch->action->receive['expressedDate'] = 'receivedDate'; 

$config->batch->action->update = array();
$config->batch->action->update['editPick']    = 'editedPick';
$config->batch->action->update['editDeliver'] = 'editedDeliver';
$config->batch->action->update['editReceive'] = 'editedReceive';

$config->batch->action->recordProductsChange = array();
$config->batch->action->recordProductsChange['editPick']    = 'editproductinpick';
$config->batch->action->recordProductsChange['editReceive'] = 'editproductinrecive';
