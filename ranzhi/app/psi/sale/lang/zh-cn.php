<?php
/**
 * The zh-cn lang file of sale module of Ranzhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商业软件，非开源软件
 * @author      Gang Liu <liugang@cnezsoft.com>
 * @package     sale 
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */
$this->loadLang('order', 'psi');
if(isset($lang->sale->menu)) $menu = $lang->sale->menu;
$lang->sale = $lang->order;
$lang->sale->common = '销售';
$lang->sale->refund = '销售退货';
if(isset($menu)) $lang->sale->menu   = $menu;
