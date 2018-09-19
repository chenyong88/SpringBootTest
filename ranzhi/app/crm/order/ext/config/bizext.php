<?php
$config->order->excel = new stdclass();
$config->order->excel->numberFields = array('id', 'plan', 'real');
$config->order->excel->customWidth  = array('id' => 5, 'product' => 15, 'customer' => 20, 'plan' => 10, 'real' => 10, 
    'currency' => 10, 'status' => 10, 'createdBy' => 10, 'createdDate' => 10, 'editedBy' => 10, 'editedDate' => 10, 
    'assignedTo' => 10, 'assignedBy' => 10, 'assignedDate' => 10, 'signedBy' => 10, 'signedDate' => 10, 'closedBy' => 10, 
    'closedDate' => 10, 'closedReason' => 10, 'activatedBy' => 10, 'activatedDate' => 10, 'contactedBy' => 10, 
    'contactedDate' => 10, 'nextDate' => 10);
