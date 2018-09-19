<?php
public function getByID($companyID)
{
    return $this->loadExtension('bizext')->getByID($companyID);
}

public function getList($orderBy, $pager = null)
{
    return $this->loadExtension('bizext')->getList($orderBy, $pager);
}

public function getPairs($orderBy = 'major_desc, id_desc')
{
    return $this->loadExtension('bizext')->getPairs($orderBy);
}

public function getMainCompany()
{
    return $this->loadExtension('bizext')->getMainCompany();
}

public function create()
{
    return $this->loadExtension('bizext')->create();
}

public function update($companyID)
{
    return $this->loadExtension('bizext')->update($companyID);
}

public function cancel($companyID)
{
    return $this->loadExtension('bizext')->cancel($companyID);
}

public function setMajor($companyID)
{
    return $this->loadExtension('bizext')->setMajor($companyID);
}

public function setConfigCompany()
{
    return $this->loadExtension('bizext')->setConfigCompany();
}
