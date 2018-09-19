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

    $this->loadExtension('bizext')->loadCustomLang();
}

public function updatePrivByGroup($groupID, $menu, $version)
{
    return $this->loadExtension('bizext')->updatePrivByGroup($groupID, $menu, $version);
}
