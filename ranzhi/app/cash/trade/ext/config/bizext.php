<?php
$config->trade->excel->fields            = array('id', 'date', 'trader', 'money', 'handlers', 'product', 'productLine', 'category', 'depositor', 'tags', 'type', 'desc');  
$config->trade->excel->productLineFields = array('productLine', 'money');
$config->trade->excel->categoryFields    = array('category', 'item', 'desc', 'money');
$config->trade->excel->numberFields      = array('id', 'money', 'undefined', 'total');
$config->trade->excel->customWidth       = array('id' => 5, 'date' => 10, 'trader' => 30, 'money' => 10, 'handlers' => 20, 'product' => 30, 'productLine' => 15, 'category' => 20, 'depositor' => 15, 'tags' => 10, 'type' => 5, 'desc' => 30, 'item' => 20, 'undefined' => 15, 'total' => 15);

$config->trade->report->compare = array('income', 'expense', 'profit');

$config->annual = new stdclass();
$config->annual->report = new stdclass();
$config->annual->report->width = array();
$config->annual->report->width['name']    = 4000;
$config->annual->report->width['value']   = 1800;
$config->annual->report->width['percent'] = 1800;

/* Do not initial array as array(), otherwise the array defined in other extensions will be override. */
$config->trade->categoryMap[] = '';
$config->trade->deptMap[]     = '';
$config->trade->productMap[]  = '';
