<?php
public function installEntry()
{
    return $this->loadExtension('bizext')->installEntry();
}

public function createAdmin()
{
    return $this->loadExtension('bizext')->createAdmin();
}
