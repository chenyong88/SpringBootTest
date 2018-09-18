<?php
if(!isset($lang->wechat)) $lang->wechat = new stdclass();
$lang->wechat->common         = 'Wechat';
$lang->wechat->corpID         = 'CorpID';
$lang->wechat->agent          = 'Agent';
$lang->wechat->agentName      = 'Agent Name';
$lang->wechat->agentID        = 'Agent ID';
$lang->wechat->secret         = 'Secret';
$lang->wechat->contact        = 'Sync Contact';
$lang->wechat->sendMessage    = 'Send Message';
$lang->wechat->scan           = 'Scan';
$lang->wechat->chooseImage    = 'Choose Image';
$lang->wechat->apply          = 'My Applys';
$lang->wechat->review         = 'My Reviews';

$lang->wechat->admin       = 'Manage';
$lang->wechat->createAgent = 'Create Agent';
$lang->wechat->editAgent   = 'Edit Agent';
$lang->wechat->deleteAgent = 'Delete Agent';
$lang->wechat->viewAgent   = 'Agent Detail';
$lang->wechat->setting     = 'Settings';

$lang->wechat->applys['attend']   = 'Attend Apply';
$lang->wechat->applys['leave']    = 'Leave Apply';
$lang->wechat->applys['overtime'] = 'Overtime Apply';
$lang->wechat->applys['lieu']     = 'Lieu Apply';
$lang->wechat->applys['refund']   = 'Refund Apply';

$lang->wechat->reviews['attend']   = 'Attend Reviews';
$lang->wechat->reviews['leave']    = 'Leave Reviews';
$lang->wechat->reviews['overtime'] = 'Overtime Reviews';
$lang->wechat->reviews['lieu']     = 'Lieu Reviews';
$lang->wechat->reviews['refund']   = 'Refund Reviews';

$lang->wechat->userFields['name']       = 'Name';
$lang->wechat->userFields['userid']     = 'Account';
$lang->wechat->userFields['mobile']     = 'Mobile';
$lang->wechat->userFields['email']      = 'Email';
$lang->wechat->userFields['department'] = 'Dept';
$lang->wechat->userFields['position']   = 'Position';

$lang->wechat->deptFields['name']     = 'Dept Name';
$lang->wechat->deptFields['id']       = 'Dept ID';
$lang->wechat->deptFields['parentid'] = 'Parent Dept';
$lang->wechat->deptFields['order']    = 'Order';

$lang->wechat->sendMessageList['open']  = 'Open';
$lang->wechat->sendMessageList['close'] = 'Close';

$lang->wechat->chooseImageList['open']  = 'Open';
$lang->wechat->chooseImageList['close'] = 'Close';

$lang->wechat->scanList['open']  = 'Open';
$lang->wechat->scanList['close'] = 'Close';

$lang->wechat->syncUserToSystem = 'Synchronize Users To System';
$lang->wechat->syncDeptToSystem = 'Synchronize Departments To System';
$lang->wechat->syncUserToWechat = 'Synchronize Users To Wechat';
$lang->wechat->syncDeptToWechat = 'Synchronize Departments To Wechat';
$lang->wechat->bindUser         = 'Bind Wechat User';
$lang->wechat->selectUser       = 'Select Wechat User';

$lang->wechat->note = 'corpID is in <strong>[Profile]</strong> - <strong>[Enterprise]</strong> of wechat background(must be administrator), agentID and secret is in <strong>[Apps]</strong> - <strong>[app view]</strong>, contact secret is in <strong>[Manage Tools]</strong> - <strong>[Contacts Api]</strong>.';

$lang->wechat->emptyContactSecret = 'Can not sync user or department because secret of sync contact is empty.';
