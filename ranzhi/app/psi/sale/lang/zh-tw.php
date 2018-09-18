<?php
/**
 * The zh-tw lang file of sale module of Ranzhi.
 *
 * @copyright   Copyright 2009-2016 青島易軟天創網絡科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商業軟件，非開源軟件
 * @author      Gang Liu <liugang@cnezsoft.com>
 * @package     sale 
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */
$this->loadLang('order', 'psi');
if(isset($lang->sale->menu)) $menu = $lang->sale->menu;
$lang->sale = $lang->order;
$lang->sale->common = '銷售';
$lang->sale->refund = '銷售退貨';
if(isset($menu)) $lang->sale->menu   = $menu;
