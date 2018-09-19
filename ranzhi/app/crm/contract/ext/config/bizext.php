<?php
$config->contract->require->expense = 'depositor, money, handlers';

$config->contract->excel = new stdclass();
$config->contract->excel->numberFields = array('id', 'amount');
$config->contract->excel->customWidth  = array('id' => 5, 'customer' => 15, 'order' => 15, 'name' => 15, 'code' => 10, 
    'amount' => 10, 'currency' => 10, 'begin' => 10, 'end' => 10,'delivery' => 10, 'return' => 10, 'status' => 10, 
    'contact' => 15, 'address' => 15, 'handlers' => 10, 'signedBy' => 10, 'signedDate' => 10,'deliveredBy' => 10, 
    'deliveredDate' => 10, 'returnedBy' => 10, 'returnedDate' => 10, 'finishedBy' => 10, 'finishedDate' => 10,
    'canceledBy' => 10, 'canceledDate' => 10, 'createdBy' => 10, 'createdDate' => 10, 'editedBy' => 10, 'editedDate' => 10,
    'contactedBy' => 10, 'contactedDate' => 10, 'nextDate' => 10, 'items' => 20, 'files' => 20);
