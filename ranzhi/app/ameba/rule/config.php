<?php
$config->rule->shareCount = 5;

$config->rule->require = new stdclass();
$config->rule->require->create = 'category,from';
$config->rule->require->edit   = 'category,from';
