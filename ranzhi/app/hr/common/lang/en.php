<?php
/**
 * The zh-cn file of common module of RanZhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商业软件，非开源软件
 * @author      Chunsheng wang <chunsheng@cnezsoft.com>
 * @package     common 
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */
if(!isset($lang->app)) $lang->app = new stdclass();
$lang->app->name = 'HR';

if(!isset($lang->menu)) $lang->menu = new stdclass();
if(!isset($lang->menu->hr)) $lang->menu->hr = new stdclass();
$lang->menu->hr->salary     = 'Salary|salary|company|';
$lang->menu->hr->commission = 'Commission|commission|browse|';
$lang->menu->hr->report     = 'Report|salary|report|';
$lang->menu->hr->setting    = 'Setting|salary|setBasic|';

/* Menu of salary module. */
if(!isset($lang->salary)) $lang->salary = new stdclass();
if(!isset($lang->salary->menu)) $lang->salary->menu = new stdclass();

if(!isset($lang->commission)) $lang->commission = new stdclass();
if(!isset($lang->commission->menu)) $lang->commission->menu = new stdclass();
$lang->commission->menu->uncommission = 'Uncommission Trade|commission|browse|type=uncommission';
$lang->commission->menu->commissioned = 'Commissioned Trade|commission|browse|type=commissioned';
$lang->commission->menu->ignored      = 'Ignored Trade|commission|browse|type=ignored';
$lang->commission->menu->report       = 'Report|commission|report|';
$lang->commission->menu->category     = 'Ignored Category|commission|setCategory|';

if(!isset($lang->setting)) $lang->setting = new stdclass();
if(!isset($lang->setting->menu)) $lang->setting->menu = new stdclass();
$lang->setting->menu->setBasic     = 'Basic Salary|salary|setbasic|';
$lang->setting->menu->setBonus     = 'Bonus|salary|setbonus|';
$lang->setting->menu->setAllowance = 'Allowance|salary|setallowance|';
$lang->setting->menu->setExemption = 'Exemption|salary|setexemption|';
$lang->setting->menu->defaultSSF   = 'SSF(default)|salary|setssf|mode=default&dept=&account=default';
$lang->setting->menu->personalSSF  = 'SSF(personal)|salary|setssf|mode=list';
$lang->setting->menu->commission   = array('link' => 'Commission Rules|commission|setting|', 'alias' => 'setsalecommission, setlinecommission');

if(!isset($lang->report)) $lang->report = new stdclass();
if(!isset($lang->report->menu)) $lang->report->menu = new stdclass();
$lang->report->menu->salary = 'Salary Analysis|salary|report|';
include(dirname(__FILE__) . '/menuOrder.php');
