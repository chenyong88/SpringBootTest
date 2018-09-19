<?php
$config->version = 'pro2.7';
$config->dashboard->modules = 'my,todo,effort';

$config->psi = new stdclass();
$config->psi->turnon = true;

if(!defined('TABLE_FUND'))               define('TABLE_FUND',               '`' . $config->db->prefix . 'cash_fund`');
if(!defined('TABLE_INVOICE'))            define('TABLE_INVOICE',            '`' . $config->db->prefix . 'cash_invoice`');
if(!defined('TABLE_INVOICEDETAIL'))      define('TABLE_INVOICEDETAIL',      '`' . $config->db->prefix . 'cash_invoicedetail`');
if(!defined('TABLE_CUSTOMERINVOICE'))    define('TABLE_CUSTOMERINVOICE',    '`' . $config->db->prefix . 'crm_customerinvoice`');
if(!defined('TABLE_ORDERACTION'))        define('TABLE_ORDERACTION',        '`' . $config->db->prefix . 'crm_orderaction`');
if(!defined('TABLE_ORDERFIELD'))         define('TABLE_ORDERFIELD',         '`' . $config->db->prefix . 'crm_orderfield`');
if(!defined('TABLE_COMMISSIONRULE'))     define('TABLE_COMMISSIONRULE',     '`' . $config->db->prefix . 'hr_commissionrule`');
if(!defined('TABLE_SALARY'))             define('TABLE_SALARY',             '`' . $config->db->prefix . 'hr_salary`');
if(!defined('TABLE_SALARYDETAIL'))       define('TABLE_SALARYDETAIL',       '`' . $config->db->prefix . 'hr_salarydetail`');
if(!defined('TABLE_SALARYCOMMISSION'))   define('TABLE_SALARYCOMMISSION',   '`' . $config->db->prefix . 'hr_salarycommission`');
if(!defined('TABLE_TRADECOMMISSION'))    define('TABLE_TRADECOMMISSION',    '`' . $config->db->prefix . 'hr_tradecommission`');
if(!defined('TABLE_BATCH'))              define('TABLE_BATCH',              '`' . $config->db->prefix . 'psi_batch`');
if(!defined('TABLE_BATCHPRODUCT'))       define('TABLE_BATCHPRODUCT',       '`' . $config->db->prefix . 'psi_batchproduct`');
if(!defined('TABLE_PSI_ORDER'))          define('TABLE_PSI_ORDER',          '`' . $config->db->prefix . 'psi_order`');
if(!defined('TABLE_PSI_ORDERPRODUCT'))   define('TABLE_PSI_ORDERPRODUCT',   '`' . $config->db->prefix . 'psi_orderproduct`');
if(!defined('TABLE_PSI_ORDERREFUND'))    define('TABLE_PSI_ORDERREFUND',    '`' . $config->db->prefix . 'psi_orderrefund`');
if(!defined('TABLE_PURCHASEPRODUCT'))    define('TABLE_PURCHASEPRODUCT',    '`' . $config->db->prefix . 'psi_purchaseproduct`');
if(!defined('TABLE_COMPANY'))            define('TABLE_COMPANY',            '`' . $config->db->prefix . 'sys_company`');
if(!defined('TABLE_EFFORT'))             define('TABLE_EFFORT',             '`' . $config->db->prefix . 'sys_effort`');
if(!defined('TABLE_ISSUE'))              define('TABLE_ISSUE',              '`' . $config->db->prefix . 'sys_issue`');
if(!defined('TABLE_STORE'))              define('TABLE_STORE',              '`' . $config->db->prefix . 'sys_store`');
if(!defined('TABLE_WECHATAGENT'))        define('TABLE_WECHATAGENT',        '`' . $config->db->prefix . 'sys_wechatagent`');
if(!defined('TABLE_WEEKLY'))             define('TABLE_WEEKLY',             '`' . $config->db->prefix . 'sys_weekly`');
if(!defined('TABLE_WORKFLOW'))           define('TABLE_WORKFLOW',           '`' . $config->db->prefix . 'sys_workflow`');
if(!defined('TABLE_WORKFLOWFIELD'))      define('TABLE_WORKFLOWFIELD',      '`' . $config->db->prefix . 'sys_workflowfield`');
if(!defined('TABLE_WORKFLOWACTION'))     define('TABLE_WORKFLOWACTION',     '`' . $config->db->prefix . 'sys_workflowaction`');
if(!defined('TABLE_WORKFLOWVERSION'))    define('TABLE_WORKFLOWVERSION',    '`' . $config->db->prefix . 'sys_workflowversion`');
if(!defined('TABLE_WORKFLOWLAYOUT'))     define('TABLE_WORKFLOWLAYOUT',     '`' . $config->db->prefix . 'sys_workflowlayout`');
if(!defined('TABLE_WORKFLOWSQL'))        define('TABLE_WORKFLOWSQL',        '`' . $config->db->prefix . 'sys_workflowsql`');
if(!defined('TABLE_WORKFLOWDATASOURCE')) define('TABLE_WORKFLOWDATASOURCE', '`' . $config->db->prefix . 'sys_workflowdatasource`');
if(!defined('TABLE_WORKFLOWRULE'))       define('TABLE_WORKFLOWRULE',       '`' . $config->db->prefix . 'sys_workflowrule`');
if(!defined('TABLE_WORKFLOWMENU'))       define('TABLE_WORKFLOWMENU',       '`' . $config->db->prefix . 'sys_workflowmenu`');
if(!defined('TABLE_OAUTH'))              define('TABLE_OAUTH',              '`' . $config->db->prefix . 'sys_oauth`');
if(!defined('TABLE_SEARCHINDEX'))        define('TABLE_SEARCHINDEX',        '`' . $config->db->prefix . 'sys_searchindex`');
if(!defined('TABLE_SEARCHDICT'))         define('TABLE_SEARCHDICT',         '`' . $config->db->prefix . 'sys_searchdict`');

$config->objectTables['effort']             = TABLE_EFFORT;
$config->objectTables['feedback']           = TABLE_ISSUE;
$config->objectTables['invoice']            = TABLE_INVOICE;
$config->objectTables['payable']            = TABLE_FUND;
$config->objectTables['receivable']         = TABLE_FUND;
$config->objectTables['psiorder']           = TABLE_PSI_ORDER;
$config->objectTables['weekly']             = TABLE_WEEKLY;
$config->objectTables['workflow']           = TABLE_WORKFLOW;
$config->objectTables['workflowaction']     = TABLE_WORKFLOWACTION;
$config->objectTables['workflowversion']    = TABLE_WORKFLOWVERSION;
$config->objectTables['workflowdatasource'] = TABLE_WORKFLOWDATASOURCE;
$config->objectTables['workflowfield']      = TABLE_WORKFLOWFIELD;
$config->objectTables['workflowlayout']     = TABLE_WORKFLOWLAYOUT;
$config->objectTables['workflowmenu']       = TABLE_WORKFLOWMENU;
$config->objectTables['workflowsql']        = TABLE_WORKFLOWSQL;
$config->objectTables['workflowrule']       = TABLE_WORKFLOWRULE;

$config->rights->member['customer']['showImport']              = 'showImport';
$config->rights->member['customer']['ajaxgetcustomerinvoices'] = 'ajaxgetcustomerinvoices';

$config->rights->member['order']['getroles']                = 'getroles';
$config->rights->member['order']['operate']                 = 'operate';
$config->rights->member['order']['tasks']                   = 'tasks';
$config->rights->member['order']['ajaxGetProducts']         = 'ajaxGetProducts';
$config->rights->member['order']['ajaxGetCompanyOrderList'] = 'ajaxGetCompanyOrderList';
$config->rights->member['order']['ajaxGetOrderProductList'] = 'ajaxGetOrderProductList';

$config->rights->member['product']['checkfieldlength'] = 'checkfieldlength';

$config->rights->member['feedback']['personal']        = 'personal';
$config->rights->member['feedback']['browse']          = 'browse';
$config->rights->member['feedback']['ajaxgetcontacts'] = 'ajaxgetcontacts';

$config->rights->member['salary']['personal']         = 'personal';
$config->rights->member['salary']['browse']           = 'browse';
$config->rights->member['salary']['view']             = 'view';
$config->rights->member['salary']['setcommission']    = 'setcommission';
$config->rights->member['salary']['ajaxgettax']       = 'ajaxgettax';
$config->rights->member['salary']['ajaxgetdeptusers'] = 'ajaxgetdeptusers';

$config->rights->member['commission']['getremainrates'] = 'getremainrates';

$config->rights->member['workflow']['checkfieldlength']     = 'checkfieldlength';
$config->rights->member['workflow']['addsqlvar']            = 'addsqlvar';
$config->rights->member['workflow']['delsqlvar']            = 'delsqlvar';
$config->rights->member['workflow']['buildvarcontrol']      = 'buildvarcontrol';
$config->rights->member['workflow']['sortModuleMenu']       = 'sortModuleMenu';
$config->rights->member['workflow']['checkregex']           = 'checkregex';
$config->rights->member['workflow']['ajaxgettablefields']   = 'ajaxgettablefields';
$config->rights->member['workflow']['ajaxgetparamoptions']  = 'ajaxgetparamoptions';
$config->rights->member['workflow']['ajaxgetappmodules']    = 'ajaxgetappmodules';
$config->rights->member['workflow']['ajaxgetmodulemethods'] = 'ajaxgetmodulemethods';
$config->rights->member['workflow']['ajaxgetmethodcomment'] = 'ajaxgetmethodcomment';
$config->rights->member['workflow']['ajaxgetmethodparams']  = 'ajaxgetmethodparams';
$config->rights->member['workflow']['ajaxgetfieldcontrol']  = 'ajaxgetfieldcontrol';
$config->rights->member['flow']['displaylayout']            = 'displaylayout';

$config->rights->member['my']['salary']        = 'salary';
$config->rights->member['my']['search']        = 'search';
$config->rights->member['my']['viewsalary']    = 'viewsalary';
$config->rights->member['my']['setpassword']   = 'setpassword';
$config->rights->member['my']['checkpassword'] = 'checkpassword';
$config->rights->member['my']['effort']        = 'effort';

$config->rights->member['effort']['batchcreate']     = 'batchcreate';
$config->rights->member['effort']['createforobject'] = 'createforobject';
$config->rights->member['effort']['edit']            = 'edit';
$config->rights->member['effort']['batchedit']       = 'batchedit';
$config->rights->member['effort']['view']            = 'view';
$config->rights->member['effort']['delete']          = 'delete';
$config->rights->member['effort']['export']          = 'export';
$config->rights->member['effort']['calendar']        = 'calendar';
$config->rights->member['effort']['browseweekly']    = 'browseweekly';
$config->rights->member['effort']['viewweekly']      = 'viewweekly';
$config->rights->member['effort']['createweekly']    = 'createweekly';
$config->rights->member['effort']['editweekly']      = 'editweekly';
$config->rights->member['effort']['deleteweekly']    = 'deleteweekly';

$config->rights->member['sale']['index']     = 'index';
$config->rights->member['purchase']['index'] = 'index';

$config->rights->member['receivable']['index']            = 'index';
$config->rights->member['receivable']['ajaxGetContracts'] = 'ajaxGetContracts';
$config->rights->member['receivable']['ajaxGetOrders']    = 'ajaxGetOrders';
$config->rights->member['receivable']['ajaxGetBatches']   = 'ajaxGetBatches';

$config->rights->member['payable']['index']          = 'index';
$config->rights->member['payable']['ajaxGetOrders']  = 'ajaxGetOrders';
$config->rights->member['payable']['ajaxGetBatches'] = 'ajaxGetBatches';

$config->rights->member['invoice']['index']                 = 'index';
$config->rights->member['invoice']['ajaxGetDrawnMoney']     = 'ajaxGetDrawnMoney';
$config->rights->member['invoice']['ajaxGetInvoiceCount']   = 'ajaxGetInvoiceCount';
$config->rights->member['invoice']['ajaxGetInvoiceDetails'] = 'ajaxGetInvoiceDetails';

$config->rights->member['wechat']['uploadimage'] = 'uploadimage';
$config->rights->member['wechat']['binduser']    = 'binduser';
$config->rights->member['wechat']['unbinduser']  = 'unbinduser';

$config->rights->member['search']['index'] = 'index';

$config->rights->member['flow']['export'] = 'export';

$filter->wechat = new stdclass();
$filter->wechat->oauthcallback = new stdclass();
$filter->wechat->oauthcallback->get['code'] = 'reg::common';

$filter->api = new stdclass();
$filter->api->default = new stdclass();
$filter->api->default->get['lang'] = 'reg::lang';

$filter->my->search = new stdclass();
$filter->my->search->get['words'] = 'reg::any';
$filter->my->search->get['module'] = 'code';

$filter->user->importldap = new stdclass();
$filter->user->importldap->cookie['pagerUserImportldap'] = 'int';

$filter->effort = new stdclass();
$filter->effort->export = new stdclass();
$filter->effort->export->cookie['checkedItem'] = 'reg::checked';

$filter->order = new stdclass();
$filter->order->export = new stdclass();
$filter->order->export->cookie['checkedItem'] = 'reg::checked';
