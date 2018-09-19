<?php
$config->ameba = new stdclass();
$config->ameba->version           = '1.0';
$config->ameba->turnon            = true;
$config->ameba->period            = 'day';
$config->ameba->beginDate         = '2017-06-01';
$config->ameba->beginMonths       = 7;
$config->ameba->excludeCategories = '';
$config->ameba->shareDepts        = '';
$config->ameba->taxRate           = 3;

if(!defined('TABLE_AMEBA_CATEGORY'))  define('TABLE_AMEBA_CATEGORY',  '`' . $config->db->prefix . 'ameba_category`');
if(!defined('TABLE_AMEBA_BUDGET'))    define('TABLE_AMEBA_BUDGET',    '`' . $config->db->prefix . 'ameba_budget`');
if(!defined('TABLE_AMEBA_DEAL'))      define('TABLE_AMEBA_DEAL',      '`' . $config->db->prefix . 'ameba_deal`');
if(!defined('TABLE_AMEBA_FEE'))       define('TABLE_AMEBA_FEE',       '`' . $config->db->prefix . 'ameba_fee`');
if(!defined('TABLE_AMEBA_SHAREFEE'))  define('TABLE_AMEBA_SHAREFEE',  '`' . $config->db->prefix . 'ameba_sharefee`');
if(!defined('TABLE_AMEBA_RULE'))      define('TABLE_AMEBA_RULE',      '`' . $config->db->prefix . 'ameba_rule`');
if(!defined('TABLE_AMEBA_STATEMENT')) define('TABLE_AMEBA_STATEMENT', '`' . $config->db->prefix . 'ameba_statement`');
if(!defined('TABLE_AMEBA_DEPT'))      define('TABLE_AMEBA_DEPT',      '`' . $config->db->prefix . 'ameba_dept`');
if(!defined('TABLE_AMEBA_USER'))      define('TABLE_AMEBA_USER',      '`' . $config->db->prefix . 'ameba_user`');
if(!defined('TABLE_AMEBA_SETTING'))   define('TABLE_AMEBA_SETTING',   '`' . $config->db->prefix . 'ameba_setting`');

$config->objectTables['budget'] = TABLE_AMEBA_BUDGET;
$config->objectTables['deal']   = TABLE_AMEBA_DEAL;
$config->objectTables['fee']    = TABLE_AMEBA_FEE;
$config->objectTables['rule']   = TABLE_AMEBA_RULE;

$config->rights->member['ameba']['index']            = 'index';
$config->rights->member['amebareport']['index']      = 'index';
$config->rights->member['budget']['index']           = 'index';
$config->rights->member['budget']['ajaxGetCategory'] = 'ajaxGetCategory';
$config->rights->member['budget']['ajaxGetMoney']    = 'ajaxGetMoney';
$config->rights->member['deal']['index']             = 'index';
$config->rights->member['deal']['ajaxGetCategory']   = 'ajaxGetCategory';
$config->rights->member['deal']['ajaxGetTrade']      = 'ajaxGetTrade';
$config->rights->member['fee']['index']              = 'index';
$config->rights->member['fee']['ajaxGetMoney']       = 'ajaxGetMoney';
$config->rights->member['rule']['index']             = 'index';
