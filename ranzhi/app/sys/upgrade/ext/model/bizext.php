<?php
public function execute($fromVersion)
{
    return $this->loadExtension('bizext')->execute($fromVersion);
}

/**
 * Create the confirm contents.
 * 
 * @param  int    $fromVersion 
 * @param  string $fromVersion 
 * @access public
 * @return void
 */
public function getConfirm($fromVersion)
{
    return $this->loadExtension('bizext')->getConfirm($fromVersion);
}

public function upgradeFreeToPro()
{
    return $this->loadExtension('bizext')->upgradeFreeToPro();
}

public function fixSalaryPassword()
{
    return $this->loadExtension('bizext')->fixSalaryPassword();
}

public function processActionConditions()
{
    return $this->loadExtension('bizext')->processActionConditions();
}

public function processFlowPosition()
{
    return $this->loadExtension('bizext')->processFlowPosition();
}

public function fixFlowPurchase()
{
    return $this->loadExtension('bizext')->fixFlowPurchase();
}

public function fixFlowDatabase()
{
    return $this->loadExtension('bizext')->fixFlowDatabase();
}

public function fixSubModules()
{
    return $this->loadExtension('bizext')->fixSubModules();
}

public function createWechatMenu()
{
    return $this->loadExtension('bizext')->createWechatMenu();
}

public function fixFlowDatasource()
{
    return $this->loadExtension('bizext')->fixFlowDatasource();
}

public function updateSalaryBasic()
{
    return $this->loadExtension('bizext')->updateSalaryBasic();
}

public function processSalarySSF()
{
    return $this->loadExtension('bizext')->processSalarySSF();
}

public function processCompanyInfo()
{
    return $this->loadExtension('bizext')->processCompanyInfo();
}

public function processProductLine()
{
    return $this->loadExtension('bizext')->processProductLine();
}

public function processBudget()
{
    return $this->loadExtension('bizext')->processBudget();
}

public function processDatabase()
{
    return $this->loadExtension('bizext')->processDatabase();
}
