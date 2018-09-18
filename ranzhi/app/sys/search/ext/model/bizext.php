<?php
public function __construct($appName = '')
{
    parent::__construct($appName);
    if($this->app->clientDevice == 'mobile')
    {
        unset($this->config->search->fields->effort);
        unset($this->config->search->fields->provider);
        unset($this->config->search->fields->blog);

        unset($this->lang->searchObjects['effort']);
        unset($this->lang->searchObjects['provider']);
        unset($this->lang->searchObjects['blog']);
    }
}

public function getList($keywords, $module, $pager)
{
    return $this->loadExtension('bizext')->getList($keywords, $module, $pager);
}

/**
 * Save an index item.
 * 
 * @param  string    $objectType article|blog|page|product|thread|reply|
 * @param  int       $objectID 
 * @access public
 * @return void
 */
public function saveIndex($objectType, $object)
{
    return $this->loadExtension('bizext')->saveIndex($objectType, $object);
}

/**
 * Save dict info. 
 * 
 * @param  array    $words 
 * @access public
 * @return void
 */
public function saveDict($dict)
{
    return $this->loadExtension('bizext')->saveDict($dict);
}

public function buildIndexQuery($type, $testDeleted = true)
{
    return $this->loadExtension('bizext')->buildIndexQuery($type, $testDeleted);
}

/**
 * Build all search index.
 * 
 * @access public
 * @return bool
 */
public function buildAllIndex($type = '', $lastID = 0)
{
    return $this->loadExtension('bizext')->buildAllIndex($type, $lastID);
}

/**
 * Delete index of an object.
 * 
 * @param  string    $objectType 
 * @param  int       $objectID 
 * @access public
 * @return void
 */
public function deleteIndex($objectType, $objectID)
{
    return $this->loadExtension('bizext')->deleteIndex($objectType, $objectID);
}
