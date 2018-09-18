<?php
$lang->ldap->common = 'LDAP Setting';
$lang->ldap->index  = 'Setting Index';
$lang->ldap->base   = 'Basic Setting';
$lang->ldap->attr   = 'Attribute Setting';
$lang->ldap->import = 'Import user from LDAP';

$lang->ldap->turnon     = 'Status';
$lang->ldap->type       = 'Server Type';
$lang->ldap->host       = 'LDAP Server';
$lang->ldap->port       = 'Port';
$lang->ldap->admin      = 'Administor account';
$lang->ldap->password   = 'Account password';
$lang->ldap->baseDN     = 'Base DN';
$lang->ldap->account    = 'Account';
$lang->ldap->realname   = 'Realname';
$lang->ldap->email      = 'Email Field';
$lang->ldap->phone      = 'Work Phone';
$lang->ldap->mobile     = 'Mobile';
$lang->ldap->anonymous  = 'Anonymous';

$lang->ldap->example     = 'For example:';
$lang->ldap->accountPS   = 'Corresponding to the account field in the LDAP server';
$lang->ldap->groupPS     = 'LDAP user login after the grouping in which';

$lang->ldap->successSave    = 'Success save';

$lang->ldap->error          = new stdclass();
$lang->ldap->error->connect = "Can't connect to the LDAP server, might LDAP address or port error!";
$lang->ldap->error->verify  = 'Account or password is error';

$lang->ldap->turnonList[0] = 'OFF';
$lang->ldap->turnonList[1] = 'ON';

$lang->ldap->typeList['ldap'] = "LDAP Server";
$lang->ldap->typeList['ad']   = "Active Directory";

$lang->ldap->noldap          = new stdclass();
$lang->ldap->noldap->header  = "ERROR：Didn't load the PHP LDAP extension";
$lang->ldap->noldap->content = 'This configuration depend on the PHP LDAP extension, need to load the LDAP extension, you can modify the php.ini file, or you can install the LDAP extension. Specific operation can refer to the document <a href="http://www.ranzhi.org/book/ranzhipro/ldap-90.html" target="_blank">http://www.ranzhi.org/book/ranzhipro/ldap-90.html</a>';
