<?php
public function getAmebaCategoryById($categoryID = 0, $type = 'article')
{
    return $this->loadExtension('ameba')->getAmebaCategoryById($categoryID, $type);
}

public function getByID($categoryID, $type = 'article', $month = '')
{
    return $this->loadExtension('ameba')->getByID($categoryID, $type, $month);
}

public function getPairs($categories = '', $type = 'article', $month = '')
{
    return $this->loadExtension('ameba')->getPairs($categories, $type, $month);
}

public function getListByType($type = 'article', $orderBy = 'id_asc', $month = '')
{
    return $this->loadExtension('ameba')->getListByType($type, $orderBy, $month);
}

public function getOrigin($categoryID, $type = '')
{
    return $this->loadExtension('ameba')->getOrigin($categoryID, $type);
}

public function getFamily($categoryID, $type = '', $root = 0, $month = '')
{
    return $this->loadExtension('ameba')->getFamily($categoryID, $type, $root, $month);
}

public function getChildren($categoryID, $type = 'article', $root = 0)
{
    return $this->loadExtension('ameba')->getChildren($categoryID, $type, $root);
}

public function getOptionMenu($type = 'article', $startCategory = 0, $removeRoot = false, $root = 0, $removeGrade = 3, $month = '')
{
    return $this->loadExtension('ameba')->getOptionMenu($type, $startCategory, $removeRoot, $root, $removeGrade, $month);
}

public function getTreeMenu($type = 'article', $startCategoryID = 0, $userFunc, $root = 0)
{
    return $this->loadExtension('ameba')->getTreeMenu($type, $startCategoryID, $userFunc, $root);
}

public function getTreeStructure($rootID, $type, $month = '')
{
    return $this->loadExtension('ameba')->getTreeStructure($rootID, $type, $month);
}

public function createAmebaAccountLink($category)
{
    return $this->loadExtension('ameba')->createAmebaAccountLink($category);
}

public function checkAmebaDepts($month)
{
    return $this->loadExtension('ameba')->checkAmebaDepts($month);
}

public function update($categoryID)
{
    return $this->loadExtension('ameba')->update($categoryID);
}

public function delete($categoryID, $null = null)
{
    return $this->loadExtension('ameba')->delete($categoryID, $null);
}

public function updateAmebaCategory($category)
{
    return $this->loadExtension('ameba')->updateAmebaCategory($category);
}

public function manageChildren($type, $parent, $children, $root = 0)
{
    return $this->loadExtension('ameba')->manageChildren($type, $parent, $children, $root);
}

public function merge($type)
{
    return $this->loadExtension('ameba')->merge($type);
}

public function checkAmebaCategory($categoryID)
{
    return $this->loadExtension('ameba')->checkAmebaCategory($categoryID);
}
