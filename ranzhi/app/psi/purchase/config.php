<?php
/**
 * The config file of purchase module of Ranzhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商业软件，非开源软件
 * @author      Gang Liu <liugang@cnezsoft.com>
 * @package     purchase 
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */
$config->purchase->editor = new stdclass();
$config->purchase->editor->assignto = array('id' => 'comment', 'tools' => 'simple');
$config->purchase->editor->cancel   = array('id' => 'comment', 'tools' => 'simple');
$config->purchase->editor->activate = array('id' => 'comment', 'tools' => 'simple');
$config->purchase->editor->finish   = array('id' => 'comment', 'tools' => 'simple');
