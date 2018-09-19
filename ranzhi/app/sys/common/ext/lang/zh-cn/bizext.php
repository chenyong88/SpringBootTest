<?php
$lang->proName  = '专业版';
$lang->searchAB = '搜索';

$lang->scan = '扫一扫';

$lang->apps->hr   = '人资';
$lang->apps->flow = '工作流';
$lang->apps->psi  = '进销存';

$lang->menu->sys->company = '公司|company|index|';

$lang->effort= new stdclass();
$lang->effort->menu = new stdclass();
$lang->effort->menu->calendar  = '日志|effort|calendar|';
$lang->effort->menu->today     = '今天|my|effort|date=today';
$lang->effort->menu->yesterday = '昨天|my|effort|date=yesterday';
$lang->effort->menu->thisweek  = '本周|my|effort|date=thisweek';
$lang->effort->menu->lastweek  = '上周|my|effort|date=lastweek';
$lang->effort->menu->thismonth = '本月|my|effort|date=thismonth';
$lang->effort->menu->lastmonth = '上月|my|effort|date=lastmonth';
$lang->effort->menu->all       = '所有|my|effort|date=all';
$lang->effort->menu->weekly    = '周报|effort|browseWeekly|';

$lang->effort->menuOrder[5]  = 'calendar';
$lang->effort->menuOrder[10] = 'today';
$lang->effort->menuOrder[15] = 'yesterday';
$lang->effort->menuOrder[20] = 'thisweek';
$lang->effort->menuOrder[25] = 'lastweek';
$lang->effort->menuOrder[30] = 'thismonth';
$lang->effort->menuOrder[35] = 'lastmonth';
$lang->effort->menuOrder[40] = 'all';
$lang->effort->menuOrder[45] = 'weekly';

$lang->product->menu->browse   = array('link' => $lang->product->menu->browse, 'alias' => 'batchcreate');
$lang->product->menu->settings = '设置|product|browseProperties|module=product&section=models';

$lang->product->menuOrder[5]  = 'browse';
$lang->product->menuOrder[35] = 'settings';

$lang->receivable = new stdclass();
$lang->receivable->menu = new stdclass();
$lang->receivable->menu->receivable = '应收款|receivable|receivable|';
$lang->receivable->menu->received   = '已收款|receivable|received|';

$lang->receivable->menuOrder[5]  = 'receivable';
$lang->receivable->menuOrder[10] = 'received';

$lang->payable = new stdclass();
$lang->payable->menu = new stdclass();
$lang->payable->menu->payable = '应付款|payable|payable|';
$lang->payable->menu->paid    = '已付款|payable|paid|';

$lang->payable->menuOrder[5]  = 'payable';
$lang->payable->menuOrder[10] = 'paid';

$lang->menu->dashboard->effort = '日志|effort|calendar|';
$lang->menu->dashboard->salary = '工资|my|salary|type=personal';

$lang->sys->dashboard->menuOrder[6]  = 'effort';
$lang->sys->dashboard->menuOrder[45] = 'salary';

$lang->my->salary= new stdclass();
$lang->my->salary->menu = new stdclass();
$lang->my->salary->menu->personal = '我的工资|my|salary|type=personal';

$lang->my->salary->menuOrder[5] = 'personal';

$lang->my->company = new stdclass();
$lang->my->company->menu = new stdclass();
$lang->my->company->menu->todo   = '待办|my|company|type=todo';
$lang->my->company->menu->effort = '日志|my|company|type=effort';
$lang->my->company->menu->weekly = '周报|my|company|type=weekly';

$lang->my->company->menuOrder[5]  = 'todo';
$lang->my->company->menuOrder[10] = 'effort';
$lang->my->company->menuOrder[15] = 'weekly';

$lang->system->menu->psi        = '进销存|setting|psi|';
$lang->system->menu->wechat     = array('link' => '企业微信|wechat|setting|', 'alias' => 'replaceUsersToSystem, replaceDeptToSystem');
$lang->system->menu->ldap       = 'LDAP配置|ldap|set|';
$lang->system->menu->buildIndex = '重建索引|search|buildindex|';
$lang->system->menu->license    = '授权|admin|license|';

$lang->system->menuOrder[3]  = 'psi';
$lang->system->menuOrder[4]  = 'wechat';
$lang->system->menuOrder[25] = 'ldap';
$lang->system->menuOrder[30] = 'buildIndex';
$lang->system->menuOrder[35] = 'license';

$lang->wechat = new stdclass();
$lang->wechat->menu = $lang->system->menu;
$lang->menuGroups->wechat = 'system';

$lang->ldap = new stdclass();
$lang->ldap->menu = $lang->system->menu;
$lang->menuGroups->ldap = 'system';

$lang->admin->menu = $lang->system->menu;
$lang->menuGroups->admin = 'system';

$lang->wechat->menuOrder = $lang->system->menuOrder;
$lang->mail->menuOrder   = $lang->system->menuOrder;
$lang->action->menuOrder = $lang->system->menuOrder;
$lang->cron->menuOrder   = $lang->system->menuOrder;
$lang->backup->menuOrder = $lang->system->menuOrder;
$lang->admin->menuOrder  = $lang->system->menuOrder;
$lang->ldap->menuOrder   = $lang->system->menuOrder;

if(!isset($lang->invoice)) $lang->invoice = new stdclass();
$lang->invoice->menu = new stdclass();
