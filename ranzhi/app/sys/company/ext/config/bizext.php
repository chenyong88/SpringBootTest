<?php
$config->company->editor->create = array('id' => 'content', 'tools' => 'simple');
$config->company->editor->edit   = array('id' => 'content', 'tools' => 'simple');

$config->company->require = new stdclass();
$config->company->require->create = 'name';
$config->company->require->edit   = 'name';
