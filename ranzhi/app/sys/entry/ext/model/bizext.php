<?php
/**
 * Get all entries. 
 * 
 * @param  string $type custom|system
 * @param  int    $category
 * @param  string $target
 * @access public
 * @return array
 */
public function getEntries($type = 'custom', $category = 0, $target = '')
{
    return $this->loadExtension('bizext')->getEntries($type, $category, $target);
}

/**
 * Get entry pairs. 
 * 
 * @param  string $params 
 * @param  int    $buildin 
 * @access public
 * @return array 
 */
public function getPairs($params = '', $buildin = 1)
{
    return $this->loadExtension('bizext')->getPairs($params, $buildin);
}
