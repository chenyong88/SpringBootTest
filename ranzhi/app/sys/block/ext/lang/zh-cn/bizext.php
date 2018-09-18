<?php
$lang->block->default['hr']['1']['title'] = '工资列表';
$lang->block->default['hr']['1']['block'] = 'salary';
$lang->block->default['hr']['1']['grid']  = 4;

$lang->block->default['hr']['1']['params']['num'] = 15;

if(!isset($lang->block->moreLinkList)) $lang->block->moreLinkList = new stdclass();
$lang->block->moreLinkList->salary = '所有工资|hr|salary|company|';

$lang->block->moreLinkList->sale['assignedToMe'] = '指派给我|psi|sale|browse|status=assignedToMe';
$lang->block->moreLinkList->sale['underway']     = '进行中|psi|sale|browse|status=underway';
$lang->block->moreLinkList->sale['picking']      = '待配货|psi|sale|browse|status=picking';

$lang->block->moreLinkList->purchase['assignedToMe'] = '指派给我|psi|purchase|browse|status=assignedToMe';
$lang->block->moreLinkList->purchase['underway']     = '进行中|psi|purchase|browse|status=underway';
