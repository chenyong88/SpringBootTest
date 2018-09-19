<?php
public function getList($mode = 'browse', $status = '', $category = '', $orderBy = 'order_desc', $pager = null, $store = 0)
{
    if($this->config->psi->turnon && $this->appName == 'psi')
    {
        return $this->loadExtension('bizext')->getList($mode, $category, $store, $status, $orderBy, $pager);
    }
    else
    {
        return parent::getList($mode, $status, $category, $orderBy, $pager);
    }
}

public function create()
{
    if($this->config->psi->turnon && $this->appName == 'psi')
    {
        return $this->loadExtension('bizext')->create();
    }
    else
    {
        return parent::create();
    }
}

public function batchCreate()
{
    return $this->loadExtension('bizext')->batchCreate();
}

/**
 * update 
 * 
 * @param  int    $productID 
 * @access public
 * @return void
 */
public function update($productID = 0)
{
   return $this->loadExtension('bizext')->update($productID);
}

public function createCategoryMenu($orderBy = 'order_desc', $recPerPage = 20)
{
    return $this->loadExtension('bizext')->createCategoryMenu($orderBy, $recPerPage);
}

public function createStoreMenu($orderBy = 'order_desc', $recPerPage = 20)
{
    return $this->loadExtension('bizext')->createStoreMenu($orderBy, $recPerPage);
}

public function getPropertyList($module = '', $section = '', $query = '', $orderBy = 'id_desc', $pager = null)
{
    return $this->loadExtension('bizext')->getPropertyList($module, $section, $query, $orderBy, $pager);
}

public function formatProductNameInList($products = array())
{
    return $this->loadExtension('bizext')->formatProductNameInList($products);
}

/**
 * Copy product.
 * 
 * @param  int    $productID 
 * @access public
 * @return void
 */
public function copy($productID = 0)
{
   return $this->loadExtension('bizext')->copy($productID);
}

/**
 * Get field by id. 
 * 
 * @param  int    $fieldID 
 * @access public
 * @return object
 */
public function getFieldByID($fieldID = 0)
{
   return $this->loadExtension('bizext')->getFieldByID($fieldID);
}

/**
 * Get field list.
 * 
 * @param  int    $productID 
 * @access public
 * @return void
 */
public function getFieldList($productID = 0)
{
   return $this->loadExtension('bizext')->getFieldList($productID);
}

/**
 * Build order form of a product.
 * 
 * @param  int       $productID 
 * @param  object    $values 
 * @access public
 * @return void
 */
public function buildFieldForm($productID = 0, $values = '')
{
    return $this->loadExtension('bizext')->buildFieldForm($productID, $values);
}

/**
 * Build control of a field.
 * 
 * @param  int    $field 
 * @param  mix    $value 
 * @access public
 * @return void
 */
public function buildControl($field = 0, $value = null)
{
    return $this->loadExtension('bizext')->buildControl($field, $value);
}

/**
 * Create a field.
 * 
 * @param  int    $productID 
 * @access public
 * @return int|bool
 */
public function createField($productID = 0, $field = null)
{
    return $this->loadExtension('bizext')->createField($productID, $field);
}

/**
 * Update field.
 * 
 * @param  int    $fieldID 
 * @access public
 * @return bool
 */
public function updateField($fieldID = 0)
{
    return $this->loadExtension('bizext')->updateField($fieldID);
}

/**
 * Delete field. 
 * 
 * @param  int    $fieldID 
 * @param  string $table 
 * @access public
 * @return bool
 */
public function deleteField($fieldID = 0, $table = null)
{
    return $this->loadExtension('bizext')->deleteField($fieldID, $table);
}

/**
 * Get action by ID.
 * 
 * @param  int    $actionID 
 * @access public
 * @return void
 */
public function getActionByID($actionID = 0)
{
    return $this->loadExtension('bizext')->getActionByID($actionID);
}

/**
 * Get actions of a product.
 * 
 * @param  int    $productID 
 * @access public
 * @return void
 */
public function getActionList($productID = 0)
{
    return $this->loadExtension('bizext')->getActionList($productID);
}

/**
 * Create an action of product's order.
 * 
 * @param  int    $productID 
 * @access public
 * @return void
 */
public function createAction($productID = 0, $action = null)
{
    return $this->loadExtension('bizext')->createAction($productID, $action);
}

/**
 * Update an action.
 * 
 * @param  int    $actionID 
 * @access public
 * @return void
 */
public function updateAction($actionID = 0)
{
    return $this->loadExtension('bizext')->updateAction($actionID);
}

/**
 * Delete an action.
 * 
 * @access public
 * @return void
 */
public function deleteAction($actionID = 0)
{
    return $this->loadExtension('bizext')->deleteAction($actionID);
}

/**
 * Save conditions of an action.
 * 
 * @param  int    $actionID 
 * @access public
 * @return void
 */
public function saveConditions($actionID = 0)
{
    return $this->loadExtension('bizext')->saveConditions($actionID);
}

/**
 * Save inputs of an action.
 * 
 * @param  int    $actionID 
 * @access public
 * @return void
 */
public function saveInputs($actionID = 0)
{
    return $this->loadExtension('bizext')->saveInputs($actionID);
}

/**
 * Create a result of an action.
 * 
 * @param  object    $action 
 * @access public
 * @return void
 */
public function createResult($action = 0)
{
    return $this->loadExtension('bizext')->createResult($action);
}

/**
 * Update a result of an action.
 * 
 * @param  object    $action 
 * @param  int       $key 
 * @access public
 * @return void
 */
public function updateResult($action = null, $key = 0)
{
    return $this->loadExtension('bizext')->updateResult($action, $key);
}

/**
 * Delete result. 
 * 
 * @param  int    $actionID 
 * @param  int    $key 
 * @access public
 * @return bool
 */
public function deleteResult($actionID = 0, $key = 0)
{
    return $this->loadExtension('bizext')->deleteResult($actionID, $key);
}

/**
 * Save tasks of an action.
 * 
 * @param  int    $actionID 
 * @access public
 * @return void
 */
public function saveTasks($actionID = 0)
{
    return $this->loadExtension('bizext')->saveTasks($actionID);
}

/**
 * Get roles of a product.
 * 
 * @param  int    $productID 
 * @access public
 * @return int|bool
 */
public function getRoleList($productID = 0)
{
    return $this->loadExtension('bizext')->getRoleList($productID);
}

/**
 * Admin a product's roles.
 *
 * @param  int    $productID 
 * @access public
 * @return bool
 */
public function adminRoles($productID = 0, $roles = null)
{
    return $this->loadExtension('bizext')->adminRoles($productID, $roles);
}
