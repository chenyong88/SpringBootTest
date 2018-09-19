<?php
$config->wechat = new stdclass();

global $lang;

$config->wechat->menus['apply']['attend']['type']   = 'view';
$config->wechat->menus['apply']['attend']['name']   = $lang->wechat->applys['attend'];
$config->wechat->menus['apply']['attend']['app']    = 'oa';
$config->wechat->menus['apply']['attend']['module'] = 'attend';
$config->wechat->menus['apply']['attend']['method'] = 'edit';

$config->wechat->menus['apply']['leave']['type']   = 'view';
$config->wechat->menus['apply']['leave']['name']   = $lang->wechat->applys['leave'];
$config->wechat->menus['apply']['leave']['app']    = 'oa';
$config->wechat->menus['apply']['leave']['module'] = 'leave';
$config->wechat->menus['apply']['leave']['method'] = 'create';

$config->wechat->menus['apply']['overtime']['type']   = 'view';
$config->wechat->menus['apply']['overtime']['name']   = $lang->wechat->applys['overtime'];
$config->wechat->menus['apply']['overtime']['app']    = 'oa';
$config->wechat->menus['apply']['overtime']['module'] = 'overtime';
$config->wechat->menus['apply']['overtime']['method'] = 'create';

$config->wechat->menus['apply']['lieu']['type']   = 'view';
$config->wechat->menus['apply']['lieu']['name']   = $lang->wechat->applys['lieu'];
$config->wechat->menus['apply']['lieu']['app']    = 'oa';
$config->wechat->menus['apply']['lieu']['module'] = 'lieu';
$config->wechat->menus['apply']['lieu']['method'] = 'create';

$config->wechat->menus['apply']['refund']['type']   = 'view';
$config->wechat->menus['apply']['refund']['name']   = $lang->wechat->applys['refund'];
$config->wechat->menus['apply']['refund']['app']    = 'oa';
$config->wechat->menus['apply']['refund']['module'] = 'refund';
$config->wechat->menus['apply']['refund']['method'] = 'create';

$config->wechat->menus['review']['attend']['type']   = 'view';
$config->wechat->menus['review']['attend']['name']   = $lang->wechat->reviews['attend'];
$config->wechat->menus['review']['attend']['app']    = 'oa';
$config->wechat->menus['review']['attend']['module'] = 'attend';
$config->wechat->menus['review']['attend']['method'] = 'browseReview';

$config->wechat->menus['review']['leave']['type']   = 'view';
$config->wechat->menus['review']['leave']['name']   = $lang->wechat->reviews['leave'];
$config->wechat->menus['review']['leave']['app']    = 'oa';
$config->wechat->menus['review']['leave']['module'] = 'leave';
$config->wechat->menus['review']['leave']['method'] = 'browseReview';

$config->wechat->menus['review']['overtime']['type']   = 'view';
$config->wechat->menus['review']['overtime']['name']   = $lang->wechat->reviews['overtime'];
$config->wechat->menus['review']['overtime']['app']    = 'oa';
$config->wechat->menus['review']['overtime']['module'] = 'overtime';
$config->wechat->menus['review']['overtime']['method'] = 'browseReview';

$config->wechat->menus['review']['lieu']['type']   = 'view';
$config->wechat->menus['review']['lieu']['name']   = $lang->wechat->reviews['lieu'];
$config->wechat->menus['review']['lieu']['app']    = 'oa';
$config->wechat->menus['review']['lieu']['module'] = 'lieu';
$config->wechat->menus['review']['lieu']['method'] = 'browseReview';

$config->wechat->menus['review']['refund']['type']   = 'view';
$config->wechat->menus['review']['refund']['name']   = $lang->wechat->reviews['refund'];
$config->wechat->menus['review']['refund']['app']    = 'oa';
$config->wechat->menus['review']['refund']['module'] = 'refund';
$config->wechat->menus['review']['refund']['method'] = 'browseReview';
