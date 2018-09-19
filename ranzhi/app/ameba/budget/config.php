<?php
$config->budget->require = new stdclass();
$config->budget->require->create = 'year, dept, amebaAccount, category, money';
$config->budget->require->edit   = 'year, dept, amebaAccount, category, money';

$config->budget->batchCreateCount = 10;
