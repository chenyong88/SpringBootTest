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

public function create($objectType, $objectID, $actionType, $comment = '', $extra = '', $actor = '', $customer = 0, $contact = 0)
{
    $actionID = parent::create($objectType, $objectID, $actionType, $comment, $extra, $actor, $customer, $contact);
    $this->loadExtension('bizext')->saveIndex($objectType, $objectID, $actionType);
    return $actionID;
}

/**
 * Get actions of an object.
 * 
 * @param  string $objectType 
 * @param  int    $objectID 
 * @param  string $action 
 * @param  object $pager
 * @param  string $origin 
 * @access public
 * @return array 
 */
public function getList($objectType, $objectID, $action = '', $pager = null, $origin = '')
{
    return $this->loadExtension('bizext')->getList($objectType, $objectID, $action, $pager, $origin);
}

/**
 * Print actions of an object.
 * 
 * @param  array    $action 
 * @access public
 * @return void
 */
public function printAction($action)
{
    return $this->loadExtension('bizext')->printAction($action);
}

/**
 * Get actions as dynamic.
 * 
 * @param  string $account 
 * @param  string $period 
 * @param  string $orderBy 
 * @param  object $pager
 * @access public
 * @return array
 */
public function getDynamic($account = 'all', $period = 'all', $orderBy = 'date_desc', $pager = null)
{
    return $this->loadExtension('bizext')->getDynamic($account, $period, $orderBy, $pager);
}

/**
 * Transform the actions for display.
 * 
 * @param  int    $actions 
 * @access public
 * @return void
 */
public function transformActions($actions)
{
    return $this->loadExtension('bizext')->transformActions($actions);
}

/**
 * Get deleted objects.
 * 
 * @param  string    $type all|hidden 
 * @param  string    $orderBy 
 * @param  object    $pager 
 * @access public
 * @return array
 */
public function getTrashes($type, $orderBy, $pager)
{
    return $this->loadExtension('bizext')->getTrashes($type, $orderBy, $pager);
}

public function sendNotice($actionID, $reader, $onlyNotice = false)
{
    return $this->loadExtension('bizext')->sendNotice($actionID, $reader, $onlyNotice);
}
