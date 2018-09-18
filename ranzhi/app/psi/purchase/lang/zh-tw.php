<?php
/**
 * The zh-tw lang file of purchase module of Ranzhi.
 *
 * @copyright   Copyright 2009-2016 青島易軟天創網絡科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商業軟件，非開源軟件
 * @author      Gang Liu <liugang@cnezsoft.com>
 * @package     purchase 
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */
$this->loadLang('order', 'psi');
if(isset($lang->purchase->menu)) $menu = $lang->purchase->menu;
$lang->purchase = $lang->order;
$lang->purchase->common = '採購';
$lang->purchase->refund = '採購退貨';
if(isset($menu)) $lang->purchase->menu   = $menu;
