<?php
if(!isset($lang->app)) $lang->app = new stdclass();
$lang->app->name ='FLOW'; 

if(!isset($lang->menu)) $lang->menu = new stdclass();
if(!isset($lang->menu->flow)) $lang->menu->flow = new stdclass();
$lang->menu->flow->workflow  = 'Flow|workflow|browse|mode=all&type=flow';

if(!isset($lang->workflow)) $lang->workflow = new stdclass();
if(!isset($lang->workflow->menu)) $lang->workflow->menu = new stdclass();
$lang->workflow->menu->flow       = 'All Flows|workflow|browse|parent=all&type=flow';
$lang->workflow->menu->database   = 'Database|workflow|browse|parent=all&type=table';
$lang->workflow->menu->datasource = 'DataSource|workflow|admindatasource|';
$lang->workflow->menu->rules      = 'Rule|workflow|adminrule|';
include(dirname(__FILE__) . '/menuOrder.php');
