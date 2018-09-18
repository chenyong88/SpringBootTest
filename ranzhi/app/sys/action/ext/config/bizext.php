<?php
$config->action->objectAppNaems['commission']         = 'hr';
$config->action->objectAppNames['effort']             = 'sys';
$config->action->objectAppNames['feedback']           = 'crm';
$config->action->objectAppNames['invoice']            = 'cash';
$config->action->objectAppNames['receivable']         = 'cash'; 
$config->action->objectAppNames['payable']            = 'cash'; 
$config->action->objectAppNames['psiorder']           = 'psi';
$config->action->objectAppNames['workflow']           = 'flow';
$config->action->objectAppNames['workflowfield']      = 'flow';
$config->action->objectAppNames['workflowaction']     = 'flow';
$config->action->objectAppNames['workflowmenu']       = 'flow';
$config->action->objectAppNames['workflowdatasource'] = 'flow';
$config->action->objectAppNames['workflowrule']       = 'flow';

$config->action->objectNameFields['commission']         = 'id';
$config->action->objectNameFields['effort']             = 'work'; 
$config->action->objectNameFields['feedback']           = 'title';
$config->action->objectNameFields['invoice']            = 'sn'; 
$config->action->objectNameFields['receivable']         = 'id'; 
$config->action->objectNameFields['payable']            = 'id'; 
$config->action->objectNameFields['psiorder']           = 'id';
$config->action->objectNameFields['workflow']           = 'name'; 
$config->action->objectNameFields['workflowfield']      = 'name'; 
$config->action->objectNameFields['workflowaction']     = 'name'; 
$config->action->objectNameFields['workflowmenu']       = 'label'; 
$config->action->objectNameFields['workflowdatasource'] = 'name'; 
$config->action->objectNameFields['workflowrule']       = 'name'; 

$config->action->objectModalLinks .= 'effort,';
