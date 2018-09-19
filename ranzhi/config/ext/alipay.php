<?php
$config->alipay = new stdclass();
$config->alipay->payGW    = 'https://mapi.alipay.com/gateway.do?';
$config->alipay->service  = 'account.page.query'; 
$config->alipay->signType = 'MD5';
$config->alipay->charset  = 'utf-8';

$config->alipay->pid        = '';  /* Partner ID. */
$config->alipay->key        = '';  /* Partner KEY. */
$config->alipay->email      = '';  /* Alipay email. */
$config->alipay->depositor  = '';  /* Depositor defined in depositor module for alipay. */
$config->alipay->tradeType  = '';  /* Trade type. */
$config->alipay->recPerPage = 100; /* Count of records to import each request. */

$config->alipay->map['service'] = 'service';
$config->alipay->map['charset'] = '_input_charset';
$config->alipay->map['pid']     = 'partner';
$config->alipay->map['begin']   = 'gmt_start_time';
$config->alipay->map['end']     = 'gmt_end_time';
