<?php
public function syncData($origin = '')
{
    return $this->loadExtension('bizext')->syncData($origin);
}

public function syncIncrement($origin = '')
{
    return $this->loadExtension('bizext')->syncIncrement($origin);
}
