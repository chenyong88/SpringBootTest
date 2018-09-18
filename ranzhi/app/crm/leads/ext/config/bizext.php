<?php
$config->leads->syncLimitList['10']   = 10;
$config->leads->syncLimitList['50']   = 50;
$config->leads->syncLimitList['100']  = 100;
$config->leads->syncLimitList['200']  = 200;
$config->leads->syncLimitList['500']  = 500;
$config->leads->syncLimitList['1000'] = 1000;

if(!isset($config->leads->require)) $config->leads->require = new stdclass();
$config->leads->require->createSite = array('name', 'code', 'url', 'key', 'modules');
$config->leads->require->editSite   = array('name', 'code', 'url', 'key', 'modules');

$config->leads->editor->setmailtemplate = array('id' => 'content', 'tools' => 'full');
$config->leads->editor->setsmstemplate  = array('id' => 'content', 'tools' => 'full');

$config->leads->methodList['forum']   = 'leads-getForums';
$config->leads->methodList['message'] = 'leads-getMessages';

$config->leads->search['fields']['register'] = $lang->leads->register;
$config->leads->search['params']['register'] = array('operator' => '>=', 'control' => 'input',  'values' => '', 'class' => 'date');
