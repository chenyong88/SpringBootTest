<?php
/**
 * The zh-cn lang file of purchase module of Ranzhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商业软件，非开源软件
 * @author      Gang Liu <liugang@cnezsoft.com>
 * @package     purchase 
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */
$this->loadLang('order', 'psi');
if(isset($lang->purchase->menu)) $menu = $lang->purchase->menu;
$lang->purchase = $lang->order;
$lang->purchase->common = '采购';
$lang->purchase->refund = '采购退货';
if(isset($menu)) $lang->purchase->menu   = $menu;
