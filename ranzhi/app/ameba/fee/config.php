<?php
$config->fee->require = new stdclass();
$config->fee->require->create = 'type,category,dept,period,shareType';
$config->fee->require->edit   = 'type,category,dept,period,shareType';

$config->fee->shareCount = 5;
