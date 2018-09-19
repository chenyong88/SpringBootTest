<?php
public function getById($tradeID = 0, $getFiles = true, $shareDetails = false)
{
    return $this->loadExtension('bizext')->getById($tradeID, $getFiles, $shareDetails);
}

public function create($type)
{
    return $this->loadExtension('bizext')->create($type);
}

public function batchCreate()
{
    return $this->loadExtension('bizext')->batchCreate();
}

public function update($tradeID)
{
    return $this->loadExtension('bizext')->update($tradeID);
}

public function batchUpdate()
{
    return $this->loadExtension('bizext')->batchUpdate();
}

public function saveImport($depositorID)
{
    return $this->loadExtension('bizext')->saveImport($depositorID);
}

public function share($tradeID = 0)
{
    return $this->loadExtension('bizext')->share($tradeID);
}

public function checkShareIncome($trade)
{
    return $this->loadExtension('bizext')->checkShareIncome($trade);
}

public function checkShareExpense($trade)
{
    return $this->loadExtension('bizext')->checkShareExpense($trade);
}
