<?php
public function create()
{
    return $this->loadExtension('bizext')->create();
}

public function update($contractID)
{
    return $this->loadExtension('bizext')->update($contractID);
}

public function receive($contractID)
{
    return $this->loadExtension('bizext')->receive($contractID);
}

public function editReturn($return, $contract)
{
    return $this->loadExtension('bizext')->editReturn($return, $contract);
}

public function deleteReturn($returnID)
{
    return $this->loadExtension('bizext')->deleteReturn($returnID);
}

public function cancel($contractID)
{
    return $this->loadExtension('bizext')->cancel($contractID);
}

public function finish($contractID)
{
    return $this->loadExtension('bizext')->finish($contractID);
}

public function setCodeFormat()
{
    return $this->loadExtension('bizext')->setCodeFormat();
}

public function buildCodeForm()
{
    return $this->loadExtension('bizext')->buildCodeForm();
}

public function parseCode()
{
    return $this->loadExtension('bizext')->parseCode();
}

public function getSumReturn()
{
    return $this->loadExtension('bizext')->getSumReturn();
}
