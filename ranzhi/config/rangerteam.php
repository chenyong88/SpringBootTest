<?php
/**
 * The config file of RanZhi.
 *
 * Don't modify this file directly, copy the item to my.php and change it.
 *
 * @copyright   Copyright 2009-2017 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Chunsheng Wang <chunsheng@cnezsoft.com>
 * @package     config
 * @version     $Id: config.php 4211 2017-06-20 14:30:10Z pengjx $
 * @link        http://www.ranzhi.org
 */

if(!function_exists('getRanzhiWebRoot')){function getRanzhiWebRoot(){}}
/* 基本设置。Rangerteam basic settings. */
$config->webRoot       = getRanzhiWebRoot(); // URL根目录。                               The root path of the url.
$config->cookiePath    = '/';                // cookies路径分隔符。                       The path of cookies.
$config->checkVersion  = true;               // 是否自动检测新版本。                      Auto check for new version or not.
$config->timeout       = 30 * 1000;          // ajax请求超时时间，单位毫秒。              The timeout of ajax request.
$config->pingInterval  = 60;                 // 心跳请求发送间隔，单位秒。                The interval of ping request, seconds.
$config->customerLimit = 50;                 // 页面加载时载入客户的最大数量。            The maximum number of customers that are loaded when the page loads.
$config->searchLimit   = 50;                 // 使用ajax搜索客户时页面显示的最大条目数量。The maximum number of customers displays in search customer page.

/* Supported charsets. */
$config->charsets['zh-cn']['utf-8'] = 'UTF-8';
$config->charsets['zh-cn']['gbk']   = 'GBK';
$config->charsets['zh-tw']['utf-8'] = 'UTF-8';
$config->charsets['zh-tw']['big5']  = 'BIG5';
$config->charsets['en']['utf-8']    = 'UTF-8';

$config->dashboard = new stdclass();
$config->dashboard->modules = 'my,todo';

/* IP white list settings.*/
$config->ipWhiteList = '*';
$config->allowedTags = '<p><span><h1><h2><h3><h4><h5><em><u><strong><br><ol><ul><li><img><a><b><font><hr><pre><div><table><td><th><tr><tbody><embed><style>';

/* Excel items. */
$config->excel = new stdclass();
$config->excel->width = new stdclass();
$config->excel->width->title   = 30;
$config->excel->width->content = 100;

$config->excel->titleFields  = array();
$config->excel->centerFields = array();
$config->excel->dateFields   = array();
$config->excel->freeze       = new stdclass();

/* Tables for basic system. */
if(!defined('TABLE_CONFIG'))      define('TABLE_CONFIG',      '`' . $config->db->prefix . 'sys_config`');
if(!defined('TABLE_PACKAGE'))     define('TABLE_PACKAGE',     '`' . $config->db->prefix . 'sys_package`');
if(!defined('TABLE_USER'))        define('TABLE_USER',        '`' . $config->db->prefix . 'sys_user`');
if(!defined('TABLE_GROUP'))       define('TABLE_GROUP',       '`' . $config->db->prefix . 'sys_group`');
if(!defined('TABLE_ACTION'))      define('TABLE_ACTION',      '`' . $config->db->prefix . 'sys_action`');
if(!defined('TABLE_FILE'))        define('TABLE_FILE',        '`' . $config->db->prefix . 'sys_file`');
if(!defined('TABLE_HISTORY'))     define('TABLE_HISTORY',     '`' . $config->db->prefix . 'sys_history`');
if(!defined('TABLE_CATEGORY'))    define('TABLE_CATEGORY',    '`' . $config->db->prefix . 'sys_category`');
if(!defined('TABLE_ARTICLE'))     define('TABLE_ARTICLE',     '`' . $config->db->prefix . 'sys_article`');
if(!defined('TABLE_EXTENSION'))   define('TABLE_EXTENSION',   '`' . $config->db->prefix . 'sys_extension`');
if(!defined('TABLE_WEBAPP'))      define('TABLE_WEBAPP',      '`' . $config->db->prefix . 'sys_webapp`');
if(!defined('TABLE_LANG'))        define('TABLE_LANG',        '`' . $config->db->prefix . 'sys_lang`');
if(!defined('TABLE_ENTRY'))       define('TABLE_ENTRY',       '`' . $config->db->prefix . 'sys_entry`');
if(!defined('TABLE_SSO'))         define('TABLE_SSO',         '`' . $config->db->prefix . 'sys_sso`');
if(!defined('TABLE_TASK'))        define('TABLE_TASK',        '`' . $config->db->prefix . 'sys_task`');
if(!defined('TABLE_TEAM'))        define('TABLE_TEAM',        '`' . $config->db->prefix . 'sys_team`');
if(!defined('TABLE_TAG'))         define('TABLE_TAG',         '`' . $config->db->prefix . 'sys_tag`');
if(!defined('TABLE_BLOCK'))       define('TABLE_BLOCK',       '`' . $config->db->prefix . 'sys_block`');
if(!defined('TABLE_SCHEMA'))      define('TABLE_SCHEMA',      '`' . $config->db->prefix . 'sys_schema`');
if(!defined('TABLE_RELATION'))    define('TABLE_RELATION',    '`' . $config->db->prefix . 'sys_relation`');
if(!defined('TABLE_CRON'))        define('TABLE_CRON',        '`' . $config->db->prefix . 'sys_cron`');
if(!defined('TABLE_USERGROUP'))   define('TABLE_USERGROUP',   '`' . $config->db->prefix . 'sys_usergroup`');
if(!defined('TABLE_GROUPPRIV'))   define('TABLE_GROUPPRIV',   '`' . $config->db->prefix . 'sys_grouppriv`');
if(!defined('TABLE_USERQUERY'))   define('TABLE_USERQUERY',   '`' . $config->db->prefix . 'sys_userquery`');
if(!defined('TABLE_QUEUE'))       define('TABLE_QUEUE',       '`' . $config->db->prefix . 'sys_queue`');
if(!defined('TABLE_USERCONTACT')) define('TABLE_USERCONTACT', '`' . $config->db->prefix . 'sys_usercontact`');

/* Tables for crm. */
if(!defined('TABLE_ADDRESS'))       define('TABLE_ADDRESS',       '`' . $config->db->prefix . 'crm_address`');
if(!defined('TABLE_PRODUCT'))       define('TABLE_PRODUCT',       '`' . $config->db->prefix . 'sys_product`');
if(!defined('TABLE_ORDER'))         define('TABLE_ORDER',         '`' . $config->db->prefix . 'crm_order`');
if(!defined('TABLE_CUSTOMER'))      define('TABLE_CUSTOMER',      '`' . $config->db->prefix . 'crm_customer`');
if(!defined('TABLE_RESUME'))        define('TABLE_RESUME',        '`' . $config->db->prefix . 'crm_resume`');
if(!defined('TABLE_CONTACT'))       define('TABLE_CONTACT',       '`' . $config->db->prefix . 'crm_contact`');
if(!defined('TABLE_CONTRACT'))      define('TABLE_CONTRACT',      '`' . $config->db->prefix . 'crm_contract`');
if(!defined('TABLE_CONTRACTORDER')) define('TABLE_CONTRACTORDER', '`' . $config->db->prefix . 'crm_contractorder`');
if(!defined('TABLE_PLAN'))          define('TABLE_PLAN',          '`' . $config->db->prefix . 'crm_plan`');
if(!defined('TABLE_DELIVERY'))      define('TABLE_DELIVERY',      '`' . $config->db->prefix . 'crm_delivery`');
if(!defined('TABLE_SALESGROUP'))    define('TABLE_SALESGROUP',    '`' . $config->db->prefix . 'crm_salesgroup`');
if(!defined('TABLE_SALESPRIV'))     define('TABLE_SALESPRIV',     '`' . $config->db->prefix . 'crm_salespriv`');
if(!defined('TABLE_DATING'))        define('TABLE_DATING',        '`' . $config->db->prefix . 'crm_dating`');

/* Tables for oa. */
if(!defined('TABLE_TODO'))       define('TABLE_TODO',       '`' . $config->db->prefix . 'oa_todo`');
if(!defined('TABLE_PROJECT'))    define('TABLE_PROJECT',    '`' . $config->db->prefix . 'oa_project`');
if(!defined('TABLE_DOC'))        define('TABLE_DOC',        '`' . $config->db->prefix . 'oa_doc`');
if(!defined('TABLE_DOCCONTENT')) define('TABLE_DOCCONTENT', '`' . $config->db->prefix . 'oa_doccontent`');
if(!defined('TABLE_DOCLIB'))     define('TABLE_DOCLIB',     '`' . $config->db->prefix . 'oa_doclib`');
if(!defined('TABLE_ATTEND'))     define('TABLE_ATTEND',     '`' . $config->db->prefix . 'oa_attend`');
if(!defined('TABLE_ATTENDSTAT')) define('TABLE_ATTENDSTAT', '`' . $config->db->prefix . 'oa_attendstat`');
if(!defined('TABLE_HOLIDAY'))    define('TABLE_HOLIDAY',    '`' . $config->db->prefix . 'oa_holiday`');
if(!defined('TABLE_LEAVE'))      define('TABLE_LEAVE',      '`' . $config->db->prefix . 'oa_leave`');
if(!defined('TABLE_OVERTIME'))   define('TABLE_OVERTIME',   '`' . $config->db->prefix . 'oa_overtime`');
if(!defined('TABLE_LIEU'))       define('TABLE_LIEU',       '`' . $config->db->prefix . 'oa_lieu`');
if(!defined('TABLE_TRIP'))       define('TABLE_TRIP',       '`' . $config->db->prefix . 'oa_trip`');
if(!defined('TABLE_REFUND'))     define('TABLE_REFUND',     '`' . $config->db->prefix . 'oa_refund`');

/* Tables for cash. */
if(!defined('TABLE_DEPOSITOR')) define('TABLE_DEPOSITOR', '`' . $config->db->prefix . 'cash_depositor`');
if(!defined('TABLE_BALANCE'))   define('TABLE_BALANCE',   '`' . $config->db->prefix . 'cash_balance`');
if(!defined('TABLE_TRADE'))     define('TABLE_TRADE',     '`' . $config->db->prefix . 'cash_trade`');

/* Tables for team. */
if(!defined('TABLE_THREAD'))  define('TABLE_THREAD',  '`' . $config->db->prefix . 'team_thread`');
if(!defined('TABLE_REPLY'))   define('TABLE_REPLY',   '`' . $config->db->prefix . 'team_reply`');
if(!defined('TABLE_MESSAGE')) define('TABLE_MESSAGE', '`' . $config->db->prefix . 'sys_message`');

/* The mapping list of object and tables. */
$config->objectTables['announce']    = TABLE_ARTICLE;
$config->objectTables['article']     = TABLE_ARTICLE;
$config->objectTables['attend']      = TABLE_ATTEND;
$config->objectTables['blog']        = TABLE_ARTICLE;
$config->objectTables['contact']     = TABLE_CONTACT;
$config->objectTables['contract']    = TABLE_CONTRACT;
$config->objectTables['cron']        = TABLE_CRON;
$config->objectTables['customer']    = TABLE_CUSTOMER;
$config->objectTables['depositor']   = TABLE_DEPOSITOR;
$config->objectTables['doc']         = TABLE_DOC;
$config->objectTables['doclib']      = TABLE_DOCLIB;
$config->objectTables['holiday']     = TABLE_HOLIDAY;
$config->objectTables['leads']       = TABLE_CONTACT;
$config->objectTables['leave']       = TABLE_LEAVE;
$config->objectTables['lieu']        = TABLE_LIEU;
$config->objectTables['makeup']      = TABLE_OVERTIME;
$config->objectTables['order']       = TABLE_ORDER;
$config->objectTables['overtime']    = TABLE_OVERTIME;
$config->objectTables['product']     = TABLE_PRODUCT;
$config->objectTables['project']     = TABLE_PROJECT;
$config->objectTables['provider']    = TABLE_CUSTOMER;
$config->objectTables['refund']      = TABLE_REFUND;
$config->objectTables['reply']       = TABLE_REPLY;
$config->objectTables['resume']      = TABLE_RESUME;
$config->objectTables['schema']      = TABLE_SCHEMA;
$config->objectTables['task']        = TABLE_TASK;
$config->objectTables['thread']      = TABLE_THREAD;
$config->objectTables['todo']        = TABLE_TODO;
$config->objectTables['trade']       = TABLE_TRADE;
$config->objectTables['user']        = TABLE_USER;
$config->objectTables['dating']      = TABLE_DATING;
$config->objectTables['usercontact'] = TABLE_USERCONTACT;
