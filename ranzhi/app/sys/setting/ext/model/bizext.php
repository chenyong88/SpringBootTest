<?php
public function setItem($path, $value = '', $type = 'config')
{
    return $this->loadExtension('bizext')->setItem($path, $value, $type);
}
