<?php
$config->payable->require = new stdclass();
$config->payable->require->create  = 'type,trader,origin,deserved';
$config->payable->require->edit    = 'type,origin';
$config->payable->require->receive = 'depositor,money,handlers,date';

$config->payable->floatFields = 'deserved,actual,balance'; 
