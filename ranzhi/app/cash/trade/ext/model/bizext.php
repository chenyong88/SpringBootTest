<?php
public function delete($tradeID, $null = null)
{
    return $this->loadExtension('bizext')->delete($tradeID);
}

/**
 * Get data to export. 
 * 
 * @param  string $mode 
 * @access public
 * @return object 
 */
public function getExportData($mode = 'all')
{
    return $this->loadExtension('bizext')->getExportData($mode);
}

public function createModuleMenu()
{
    return $this->loadExtension('bizext')->createModuleMenu();
}

public function syncAlipay($begin = '', $end = '', $pageID = 1)
{
    return $this->loadExtension('bizext')->syncAlipay($begin, $end, $pageID);
}
