<?php
$lang->block->default['hr']['1']['title'] = '工資列表';
$lang->block->default['hr']['1']['block'] = 'salary';
$lang->block->default['hr']['1']['grid']  = 4;

$lang->block->default['hr']['1']['params']['num'] = 15;

if(!isset($lang->block->moreLinkList)) $lang->block->moreLinkList = new stdclass();
$lang->block->moreLinkList->salary = '所有工資|hr|salary|company|';

$lang->block->moreLinkList->sale['assignedToMe'] = '指派給我|psi|sale|browse|status=assignedToMe';
$lang->block->moreLinkList->sale['underway']     = '進行中|psi|sale|browse|status=underway';
$lang->block->moreLinkList->sale['picking']      = '待配貨|psi|sale|browse|status=picking';

$lang->block->moreLinkList->purchase['assignedToMe'] = '指派給我|psi|purchase|browse|status=assignedToMe';
$lang->block->moreLinkList->purchase['underway']     = '進行中|psi|purchase|browse|status=underway';
