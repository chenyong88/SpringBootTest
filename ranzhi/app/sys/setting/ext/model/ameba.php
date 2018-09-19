<?php
public function ameba()
{
    return $this->loadExtension('ameba')->ameba();
}

public function getAmebaConfig($month = '')
{
    return $this->loadExtension('ameba')->getAmebaConfig($month);
}
