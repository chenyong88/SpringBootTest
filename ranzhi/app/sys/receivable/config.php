<?php
$config->receivable->require = new stdclass();
$config->receivable->require->create  = 'type,trader,deserved';
$config->receivable->require->edit    = 'type';
$config->receivable->require->receive = 'depositor,money,handlers,date';

$config->receivable->floatFields = 'deserved,actual,balance'; 
