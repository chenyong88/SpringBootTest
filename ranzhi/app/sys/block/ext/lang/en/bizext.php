<?php
$lang->block->default['hr']['1']['title'] = 'Salary List';
$lang->block->default['hr']['1']['block'] = 'salary';
$lang->block->default['hr']['1']['grid']  = 4;

$lang->block->default['hr']['1']['params']['num'] = 15;

if(!isset($lang->block->moreLinkList)) $lang->block->moreLinkList = new stdclass();
$lang->block->moreLinkList->salary = 'All|hr|salary|company|';

$lang->block->moreLinkList->sale['assignedToMe'] = 'Assigned to Me|psi|sale|browse|status=assignedTo';
$lang->block->moreLinkList->sale['underway']     = 'Underway|psi|sale|browse|status=underway';
$lang->block->moreLinkList->sale['picking']      = 'Picking|psi|sale|browse|status=picking';

$lang->block->moreLinkList->purchase['assignedToMe'] = 'Assigned to Me|psi|purchase|browse|status=assignedTo';
$lang->block->moreLinkList->purchase['underway']     = 'Underway|psi|purchase|browse|status=underway';
