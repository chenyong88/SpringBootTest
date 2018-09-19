<?php
$config->queue = new stdClass();
$config->queue->objectTypes = array();
$config->queue->objectTypes['todo'] = array('assigned', 'created');

$config->queue->available['mail']['todo'] = $config->queue->objectTypes['todo'];

$config->queue->available['webhook'] = array();

$config->queue->available['message']['todo'] = array();

$config->queue->available['xuanxuan']['todo'] = $config->queue->objectTypes['todo'];

$config->queue->setting['mail']['setting']     = $config->queue->available['mail'];
$config->queue->setting['message']['setting']  = $config->queue->available['message'];
$config->queue->setting['webhook']['setting']  = $config->queue->available['webhook'];
$config->queue->setting['xuanxuan']['setting'] = $config->queue->available['xuanxuan'];

