<?php
public function getById($id)
{
    return $this->loadExtension('bizext')->getById($id);
}

public function getList($mode = 'company', $type = '', $date = '', $deptID = '', $status = '', $createdBy = '', $orderBy = 'id_desc', $pager = null)
{
    return $this->loadExtension('bizext')->getList($mode, $type, $date, $deptID, $status, $createdBy, $orderBy, $pager);
}

public function processRefund($refund)
{
    return $this->loadExtension('bizext')->processRefund($refund);
}

public function review($refundID)
{
    return $this->loadExtension('bizext')->review($refundID);
}

public function checkWaitingRefunds($account = '')
{
    return $this->loadExtension('bizext')->checkWaitingRefunds($account);
}
