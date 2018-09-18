<?php
if(!isset($config->effort)) $config->effort = new stdclass();

$config->effort->require = new stdclass();
$config->effort->require->create = 'work';
$config->effort->require->edit   = 'work';

$config->effort->editor = new stdclass();
$config->effort->editor->createweekly = array('id' => 'content', 'tools' => 'full');
$config->effort->editor->editweekly   = array('id' => 'content', 'tools' => 'full');

$config->effort->times = new stdclass();
$config->effort->times->delta = 10;

$config->effort->list = new stdclass();
$config->effort->list->exportFields = 'id, account, date, consumed, left, work, objectType'; 

$config->effort->limitLength = 255;
