<?php
$lang->user->importLDAP = 'Import user from LDAP';
$lang->user->group      = 'Power group';
$lang->user->bind       = 'Bind Wechat';
$lang->user->unbind     = 'Unbind from wechat';
$lang->user->asLDAP     = 'As LDAP';
$lang->user->ldapUser   = 'LDAP';
$lang->user->ranzhiUser = 'Account';
$lang->user->parent     = 'Parent';
$lang->user->unofficial = 'Unofficial';

$lang->user->unofficialList = 'Unofficial List';

if(!isset($lang->user->error)) $lang->user->error = new stdclass();
$lang->user->error->repeat     = '%s,Because the user name repeat, can not be added! , Modify the user name and then add';
$lang->user->error->illaccount = '%s,Because the user name is not legitimate, adding to fail! , Modify the user name and then add';
$lang->user->error->userLimit  = 'The number of users has reached the upper limit of the license.';
$lang->user->error->reviewer   = 'Error, there are records created by this user or this user is a reviewer in %s processes.';
$lang->user->error->length     = '<strong>%s</strong> length should be less than <strong>%s</strong>.';

$lang->user->notice = new stdclass();
$lang->user->notice->checkbox = 'Only checked rows will be imported.';
$lang->user->notice->ldapoff  = "LDAP's status is off.";

$lang->user->confirmUnbind = 'Are you shure to unbind from wechat?';
