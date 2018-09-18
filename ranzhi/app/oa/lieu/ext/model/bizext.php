<?php
public function getById($id)
{
    return $this->loadExtension('bizext')->getById($id);
}

public function getList($type = 'personal', $year = '', $month = '', $account = '', $dept = '', $status = '', $orderBy = 'id_desc')
{
    return $this->loadExtension('bizext')->getList($type, $year, $month, $account, $dept, $status, $orderBy);
}

public function getReviewedBy()
{
    return $this->loadExtension('bizext')->getReviewedBy();
}

public function getReviewModules()
{
    return $this->loadExtension('bizext')->getReviewModules();
}

public function create()
{
    return $this->loadExtension('bizext')->create();
}

public function update($id)
{
    return $this->loadExtension('bizext')->update($id);
}

public function review($id, $status)
{
    return $this->loadExtension('bizext')->review($id, $status);
}

public function checkWaitingLieus($account = '')
{
    return $this->loadExtension('bizext')->checkWaitingLieus($account);
}
