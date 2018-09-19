<?php
public function getByIDList($contactIDList = array())
{
    return $this->loadExtension('bizext')->getByIDList($contactIDList);
}

public function syncUsers($users, $origin)
{
    return $this->loadExtension('bizext')->syncUsers($users, $origin);
}
