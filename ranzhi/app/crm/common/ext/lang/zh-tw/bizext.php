<?php
$lang->menu->crm->feedback = '售後|feedback|personal|';
$lang->crm->menuOrder[44]  = 'feedback';

$lang->menu->crm->invoice = '發票|invoice|browse|';
$lang->crm->menuOrder[43] = 'invoice';

$lang->contract->menu->setting  = '設置|contract|setting|';

$lang->leads->menu->setting = array('link' => '設置|leads|adminsites|', 'alias' => 'createsite, editsite, setting, setmailtemplate, setsmstemplate');

$lang->feedback = new stdclass();
$lang->feedback->menu = new stdclass();
$lang->feedback->menu->personal = '指派給我|feedback|personal|';
$lang->feedback->menu->company  = array('link' => '所有問題|feedback|company|', 'alias' => 'create');

$lang->feedback->menuOrder[5]  = 'personal';
$lang->feedback->menuOrder[10] = 'company';
