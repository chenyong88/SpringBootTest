<?php
$config->ldap = new stdclass();
$config->ldap->require = new stdclass();
$config->ldap->require->set = 'host,port,baseDN,account,admin';

$config->ldap->turnon = false;
