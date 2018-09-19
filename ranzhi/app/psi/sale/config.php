<?php
/**
 * The config file of sale module of Ranzhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商业软件，非开源软件
 * @author      Gang Liu <liugang@cnezsoft.com>
 * @package     sale 
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */
$config->sale->editor = new stdclass();
$config->sale->editor->assignto = array('id' => 'comment', 'tools' => 'simple');
$config->sale->editor->cancel   = array('id' => 'comment', 'tools' => 'simple');
$config->sale->editor->activate = array('id' => 'comment', 'tools' => 'simple');
$config->sale->editor->finish   = array('id' => 'comment', 'tools' => 'simple');

$config->sale->require = new stdclass();
$config->sale->require->assigntopick = 'pickedBy';
