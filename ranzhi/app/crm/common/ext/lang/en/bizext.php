<?php
$lang->menu->crm->feedback = 'Feedback|feedback|personal|';
$lang->crm->menuOrder[44]  = 'feedback';

$lang->menu->crm->invoice = 'Invoice|invoice|browse|';
$lang->crm->menuOrder[43] = 'invoice';

$lang->contract->menu->setting  = 'Settings|contract|setting|';

$lang->leads->menu->setting = array('link' => 'Settings|leads|adminsites|', 'alias' => 'createsite, editsite, setting, setmailtemplate, setsmstemplate');

$lang->feedback = new stdclass();
$lang->feedback->menu = new stdclass();
$lang->feedback->menu->personal = 'Assigned To Me|feedback|personal|';
$lang->feedback->menu->company  = array('link' => 'All|feedback|company|', 'alias' => 'create');

$lang->feedback->menuOrder[5]  = 'personal';
$lang->feedback->menuOrder[10] = 'company';
