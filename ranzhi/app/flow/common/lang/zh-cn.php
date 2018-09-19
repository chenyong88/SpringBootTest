<?php
if(!isset($lang->app)) $lang->app = new stdclass();
$lang->app->name ='工作流'; 

if(!isset($lang->menu)) $lang->menu = new stdclass();
if(!isset($lang->menu->flow)) $lang->menu->flow = new stdclass();
$lang->menu->flow->workflow  = '流程|workflow|browse|mode=all&type=flow';

if(!isset($lang->workflow)) $lang->workflow = new stdclass();
if(!isset($lang->workflow->menu)) $lang->workflow->menu = new stdclass();
$lang->workflow->menu->flow       = '流程|workflow|browse|parent=all&type=flow';
$lang->workflow->menu->database   = '数据库|workflow|browse|parent=all&type=table';
$lang->workflow->menu->datasource = '数据源|workflow|admindatasource|';
$lang->workflow->menu->rules      = '验证规则|workflow|adminrule|';
include(dirname(__FILE__) . '/menuOrder.php');
