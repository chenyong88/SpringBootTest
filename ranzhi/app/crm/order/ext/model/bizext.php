<?php
/**
 * Get order by id.
 * 
 * @param  int    $id 
 * @access public
 * @return object|bool
 */
public function getByID($id = 0)
{
    return $this->loadExtension('bizext')->getByID($id);
}

/** 
 * Get order list.
 * 
 *
 * @param  string $mode
 * @param  string $param
 * @param  string $owner
 * @param  string $orderBy 
 * @param  object $pager 
 * @access public
 * @return array
 */
public function getList($mode = 'all', $param = null, $owner = '', $needQueryCondition = true, $orderBy = 'id_desc', $pager = null)
{
    return $this->loadExtension('bizext')->getList($mode, $param, $owner, $needQueryCondition, $orderBy, $pager);
}

/**
 * Create an order.
 * 
 * @access public
 * @return void
 */
public function create()
{
   return $this->loadExtension('bizext')->create();
}

/**
 * Do an operation of an order.
 * 
 * @param  object    $order 
 * @param  object    $action 
 * @access public
 * @return void
 */
public function operate($order, $action)
{
    return $this->loadExtension('bizext')->operate($order, $action);
}

/**
 * Create tasks after operation of an order.
 * 
 * @param  object    $order 
 * @access public
 * @return void
 */
public function createTasks($order)
{
    return $this->loadExtension('bizext')->createTasks($order);
}

/**
 * Get team members. 
 * 
 * @param  int    $orderID 
 * @access public
 * @return array
 */
public function getTeamMembers($orderID)
{
    return $this->loadExtension('bizext')->getTeamMembers($orderID);
}

/**
 * Get team roles. 
 * 
 * @param  int    $orderID 
 * @access public
 * @return array
 */
public function getRoleList($orderID)
{
    return $this->loadExtension('bizext')->getRoleList($orderID);
}

/**
 * Manage team members.
 * 
 * @param  int    $orderID 
 * @access public
 * @return void
 */
public function manageMembers($orderID)
{
    return $this->loadExtension('bizext')->manageMembers($orderID);
}

/**
 * Build operate menu.
 * 
 * @param  object    $order 
 * @access public
 * @return void
 */
public function buildOperateMenu($order)
{
    return $this->loadExtension('bizext')->buildOperateMenu($order);
}
