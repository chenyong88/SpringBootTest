<?php
$config->group->methods = new stdclass();
$config->group->methods->product = new stdclass();
$config->group->methods->product->common = array('browse', 'create', 'edit', 'view', 'delete');
$config->group->methods->product->psi    = array('batchCreate', 'browseProperties', 'batchCreateProperties', 'editProperty', 'deleteProperty', 'createFromOrder');
