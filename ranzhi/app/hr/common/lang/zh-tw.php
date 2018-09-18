<?php
/**
 * The zh-tw file of common module of RanZhi.
 *
 * @copyright   Copyright 2009-2016 青島易軟天創網絡科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商業軟件，非開源軟件
 * @author      Chunsheng wang <chunsheng@cnezsoft.com>
 * @package     common 
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */
if(!isset($lang->app)) $lang->app = new stdclass();
$lang->app->name = '人力資源';

if(!isset($lang->menu)) $lang->menu = new stdclass();
if(!isset($lang->menu->hr)) $lang->menu->hr = new stdclass();
$lang->menu->hr->salary     = '工資|salary|company|';
$lang->menu->hr->commission = '提成|commission|browse|';
$lang->menu->hr->report     = '報表|salary|report|';
$lang->menu->hr->setting    = '設置|salary|setBasic|';

/* Menu of salary module. */
if(!isset($lang->salary)) $lang->salary = new stdclass();
if(!isset($lang->salary->menu)) $lang->salary->menu = new stdclass();

if(!isset($lang->commission)) $lang->commission = new stdclass();
if(!isset($lang->commission->menu)) $lang->commission->menu = new stdclass();
$lang->commission->menu->uncommission = '未提成交易|commission|browse|type=uncommission';
$lang->commission->menu->commissioned = '已提成交易|commission|browse|type=commissioned';
$lang->commission->menu->ignored      = '已忽略交易|commission|browse|type=ignored';
$lang->commission->menu->report       = '提成統計|commission|report|';
$lang->commission->menu->category     = '忽略科目|commission|setcategory|';

if(!isset($lang->setting)) $lang->setting = new stdclass();
if(!isset($lang->setting->menu)) $lang->setting->menu = new stdclass();
$lang->setting->menu->setBasic     = '基礎設置|salary|setbasic|';
$lang->setting->menu->setBonus     = '績效獎金|salary|setbonus|';
$lang->setting->menu->setAllowance = '福利|salary|setallowance|';
$lang->setting->menu->setExemption = '抵稅項|salary|setexemption|';
$lang->setting->menu->defaultSSF   = '五險一金（預設）|salary|setssf|mode=default&dept=&account=default';
$lang->setting->menu->personalSSF  = '五險一金（個人）|salary|setssf|mode=list';
$lang->setting->menu->commission   = array('link' => '提成規則|commission|setting|', 'alias' => 'setsalecommission, setlinecommission');

if(!isset($lang->report)) $lang->report = new stdclass();
if(!isset($lang->report->menu)) $lang->report->menu = new stdclass();
$lang->report->menu->salary = '工資彙總表|salary|report|';
include(dirname(__FILE__) . '/menuOrder.php');
