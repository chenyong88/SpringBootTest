<?php
public function select($projects, $projectID, $currentModule, $currentMethod, $extra = '')
{
    return $this->loadExtension('bizext')->select($projects, $projectID, $currentModule, $currentMethod, $extra = '');
}

public function getEfforts4Calendar($projectID, $account = '')
{
    return $this->loadExtension('bizext')->getEfforts4Calendar($projectID, $account);
}
