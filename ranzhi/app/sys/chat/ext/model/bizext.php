<?php
public function getUserList($status = '', $idList = array(), $idAsKey = true)
{
    return $this->loadExtension('bizext')->getUserList($status, $idList, $idAsKey);
}
