<?php
/**
 * __construct  
 * 
 * @access public
 * @return void
 */
public function __construct($appName = '')
{
    parent::__construct($appName);

    if(version_compare($this->config->global->version, 'pro1.0', '>'))
    {
        $this->loadExtension('bizext')->loadCustomLang();
    }
    
    /* The method loadConfigFromDB is extended in saas extension, so set main company here. */
    if(version_compare($this->config->global->version, 'pro2.5', '>='))
    {
        $this->loadModel('company')->setConfigCompany();
    }
}

/**
 * Check invoice priviledge.
 * 
 * @param  array    $checkByID 
 * @static
 * @access public
 * @return array
 */
public static function checkInvoicePriv($checkByID)
{
    $checkByID['invoice'] = ',edit,drawn,express,taxRefund,';
    return $checkByID;
}
