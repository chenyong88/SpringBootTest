<?php
public function saveImportSettings()
{
    return $this->loadExtension('bizext')->saveImportSettings();
}

public function import()
{
    return $this->loadExtension('bizext')->import();
}
