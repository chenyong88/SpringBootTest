<?php 
$lang->history2 = 'Actions';

$lang->action->objectTypes['commission']         = 'Commission';
$lang->action->objectTypes['effort']             = 'Effort';
$lang->action->objectTypes['feedback']           = 'Feedback';
$lang->action->objectTypes['invoice']            = 'Invoice';
$lang->action->objectTypes['receivable']         = 'Receivables';
$lang->action->objectTypes['payable']            = 'Payables';
$lang->action->objectTypes['psiorder']           = 'Order of PSI';
$lang->action->objectTypes['workflow']           = 'Flow';
$lang->action->objectTypes['workflowfield']      = 'Field';
$lang->action->objectTypes['workflowaction']     = 'Action';
$lang->action->objectTypes['workflowmenu']       = 'Menu';
$lang->action->objectTypes['workflowdatasource'] = 'Datasource';
$lang->action->objectTypes['workflowrule']       = 'Rule';

$lang->action->label->commission         = 'Commission|commission|browse|';
$lang->action->label->effort             = 'Effort|effort|calendar|';
$lang->action->label->feedback           = 'Feedback|feedback|view|issueID=%s';
$lang->action->label->invoice            = 'Invoice|invoice|view|invoiceID=%s';
$lang->action->label->receivable         = 'Receivables|receivable|view|moduleID=%s';
$lang->action->label->payable            = 'Payables|payable|view|moduleID=%s';
$lang->action->label->psiorder           = 'PSI Order|order|detail|orderID=%s';
$lang->action->label->workflow           = 'Flow|workflow|browse|';
$lang->action->label->workflowfield      = 'Field|workflow|adminField|moduleID=%s';
$lang->action->label->workflowaction     = 'Action|workflow|adminAction|moduleID=%s';
$lang->action->label->workflowmenu       = 'Menu|workflow|adminModuleMenu|moduleID=%s';
$lang->action->label->workflowdatasource = 'Datasource|workflow|adminDatasource|datasourceID=%s';
$lang->action->label->workflowrule       = 'Rule|workflow|viewrule|ruleID=%s';

/* Leads sync. */
$lang->action->desc->site_open            = '$date, <strong>$actor</strong> $extra in <strong>$origin</strong>.' . "\n";
$lang->action->desc->site_renew           = '$date, <strong>$actor</strong> $extra in <strong>$origin</strong>.' . "\n";
$lang->action->desc->site_free2charged    = '$date, <strong>$actor</strong> $extra in <strong>$origin</strong>.' . "\n";
$lang->action->desc->site_charged2charged = '$date, <strong>$actor</strong> $extra in <strong>$origin</strong>.' . "\n";
                                                                                                            
$lang->action->desc->order_score          = '$date, <strong>$actor</strong> $extra in <strong>$origin</strong>.' . "\n";
$lang->action->desc->order_license        = '$date, <strong>$actor</strong> $extra in <strong>$origin</strong>.' . "\n";
$lang->action->desc->order_theme          = '$date, <strong>$actor</strong> $extra in <strong>$origin</strong>.' . "\n";
                                                                                                            
$lang->action->desc->extension_demo       = '$date, <strong>$actor</strong> $extra in <strong>$origin</strong>.' . "\n";
$lang->action->desc->extension_year       = '$date, <strong>$actor</strong> $extra in <strong>$origin</strong>.' . "\n";
$lang->action->desc->extension_life       = '$date, <strong>$actor</strong> $extra in <strong>$origin</strong>.' . "\n";
                                                                                                            
$lang->action->desc->thread_post          = '$date, <strong>$actor</strong> $extra in <strong>$origin</strong>.' . "\n";
$lang->action->desc->thread_reply         = '$date, <strong>$actor</strong> $extra in <strong>$origin</strong>.' . "\n";
                                                                                                            
$lang->action->desc->message_message      = '$date, <strong>$actor</strong> $extra in <strong>$origin</strong>.' . "\n";
$lang->action->desc->message_comment      = '$date, <strong>$actor</strong> $extra in <strong>$origin</strong>.' . "\n";
$lang->action->desc->message_reply        = '$date, <strong>$actor</strong> $extra in <strong>$origin</strong>.' . "\n";
                                                                                                            
$lang->action->desc->ask_question         = '$date, <strong>$actor</strong> $extra in <strong>$origin</strong>.' . "\n";
$lang->action->desc->ask_answer           = '$date, <strong>$actor</strong> $extra in <strong>$origin</strong>.' . "\n";
                                                                                                            
$lang->action->desc->other_usercase       = '$date, <strong>$actor</strong> $extra in <strong>$origin</strong>.' . "\n";
$lang->action->desc->other_donation       = '$date, <strong>$actor</strong> $extra in <strong>$origin</strong>.' . "\n";

$lang->action->desc->lastlogin            = '$date, <strong>$actor</strong> logined <strong>$origin</strong>.' . "\n";
$lang->action->desc->sync                 = '$date, synchronized by <strong>$actor</strong>.' . "\n";

/* Effort */
$lang->action->desc->recordestimate       = '$date, man-hour recorded by <strong>$actor</strong> and it consumed <strong>$extra</strong> hours.';

/* Feedback. */
$lang->action->desc->replied              = '$date, replied by <strong>$actor</strong>.' . "\n";
$lang->action->desc->doubted              = '$date, doubted by <strong>$actor</strong>.' . "\n";
$lang->action->desc->createfeedback       = '$date, <strong>$actor</strong> created issue: <strong>$extra</strong>.' . "\n";
$lang->action->desc->editfeedback         = '$date, <strong>$actor</strong> edited issue: <strong>$extra</strong>.' . "\n";

/* Expense */
$lang->action->desc->createorderexpense    = '$date, <strong>$actor</strong> created expense for order: <strong>$extra</strong>。' . "\n";
$lang->action->desc->createcontractexpense = '$date, <strong>$actor</strong> created expense for contract: <strong>$extra</strong>。' . "\n";
$lang->action->desc->createcustomerexpense = '$date, <strong>$actor</strong> created expense for customer: <strong>$extra</strong>。' . "\n";

/* Invoice. */
$lang->action->desc->createdinvoice    = '$date, created an invoice by <strong>$actor</strong> : <strong>$extra</strong>.' . "\n";
$lang->action->desc->drawninvoice      = '$date, drawn an invoice by <strong>$actor</strong> : <strong>$extra</strong>.' . "\n";
$lang->action->desc->expressedinvoice  = '$date, expressed an invoice by <strong>$actor</strong> : <strong>$extra</strong>.' . "\n";
$lang->action->desc->sentinvoice       = '$date, sent an invoice by <strong>$actor</strong> : <strong> $extra </strong>.';
$lang->action->desc->canceledinvoice   = '$date, canceled an invoice by <strong>$actor</strong>.' . "\n";
$lang->action->desc->redinvoice        = '$date, red an invoice by <strong>$actor</strong>.' . "\n";
$lang->action->desc->createinvoiceinfo = '$date, added invoice information by <strong>$actor</strong> : <strong> $extra </strong>.';
$lang->action->desc->editinvoiceinfo   = '$date, edited invoice information by <strong>$actor</strong> : <strong> $extra </strong>.';
$lang->action->desc->deleteinvoiceinfo = '$date, deleted invoice information by <strong>$actor</strong> : <strong> $extra </strong>.';

/* PSI */
$lang->action->desc->sendmail              = '$date, <strong>$actor</strong> sent email.'; 
$lang->action->desc->assignedtopick        = '$date, <strong>$actor</strong> assigned to <strong>$extra</strong> to pick products of <strong>$batch</strong>.'; 
$lang->action->desc->assignedtopurchase    = '$date, <strong>$actor</strong> notified <strong>$extra</strong> to purchase products.'; 
$lang->action->desc->editedpick            = '$date, <strong>$actor</strong> edited pick infomation of <strong>$extra</strong>.';
$lang->action->desc->editeddeliver         = '$date, <strong>$actor</strong> edited delivery infomation of <strong>$extra</strong>.';
$lang->action->desc->editedreceive         = '$date, <strong>$actor</strong> edited receipt infomation of <strong>$extra</strong>.'; 
$lang->action->desc->picked                = '$date, <strong>$actor</strong> picked.';
$lang->action->desc->deliver               = '$date, <strong>$actor</strong> delivered.';
$lang->action->desc->received              = '$date, <strong>$actor</strong> received.';
$lang->action->desc->createorderproduct    = '$date, <strong>$actor</strong> created a product <strong>$extra</strong>。';
$lang->action->desc->editorderproduct      = '$date, <strong>$actor</strong> edited a product <strong>$extra</strong>。';
$lang->action->desc->deleteorderproduct    = '$date, <strong>$actor</strong> deleted a product <strong>$extra</strong>。';
$lang->action->desc->editproductinpick     = '$date, <strong>$actor</strong> edited the amount of <strong>$extra</strong> to picked.';
$lang->action->desc->editproductinrecive   = '$date, <strong>$actor</strong> edited the amount of <strong>$extra</strong> to received.';

/* Receivables & Payables. */
$lang->action->desc->tradein  = '$date, <strong>$actor</strong> received: <strong>$extra</strong>.' . "\n";
$lang->action->desc->tradeout = '$date, <strong>$actor</strong> paid: <strong>$extra</strong>.' . "\n";

/* Salary. */
$lang->action->desc->confirmed            = '$date, confirmed by <strong>$actor</strong>.' . "\n";

/* Workflow */
$lang->action->desc->userdefined          = '$date, <strong>$actor</strong> $extra.' . "\n";

$lang->action->label->confirmed             = 'confirmed';
$lang->action->label->recordestimate        = 'recorded Man-Hour';
$lang->action->label->userdefined           = 'execute userdefined action';
$lang->action->label->replied               = 'replied';
$lang->action->label->doubted               = 'doubted';
$lang->action->label->createfeedback        = 'created issue';
$lang->action->label->editfeedback          = 'edited issue';
$lang->action->label->createorderexpense    = 'created expense for order';
$lang->action->label->createcontractexpense = 'created expense for contract';
$lang->action->label->createcustomerexpense = 'created expense for customer';
$lang->action->label->tradein               = 'received';
$lang->action->label->tradeout              = 'paid';
$lang->action->label->sendmail              = 'sent mail'; 
$lang->action->label->assignedtopick        = 'assigned to pick'; 
$lang->action->label->assignedtopurchase    = 'assigend to purchase'; 
$lang->action->label->editedpick            = 'edited pick info';
$lang->action->label->editeddeliver         = 'edited deliver info';
$lang->action->label->editedreceive         = 'edited receive info'; 
$lang->action->label->picked                = 'picked';
$lang->action->label->deliver               = 'delivered';
$lang->action->label->received              = 'received';
$lang->action->label->createorderproduct    = 'created a product for order ';
$lang->action->label->editorderproduct      = 'edited a product of order';
$lang->action->label->deleteorderproduct    = 'deleted a product of order ';
$lang->action->label->editproductinpick     = 'edited pick number of product of order';
$lang->action->label->editproductinrecive   = 'edited receive number of product of order';

$lang->action->search->label['confirmed']             = $lang->action->label->confirmed;             
$lang->action->search->label['recordestimate']        = $lang->action->label->recordestimate;        
$lang->action->search->label['userdefined']           = $lang->action->label->userdefined;           
$lang->action->search->label['replied']               = $lang->action->label->replied;               
$lang->action->search->label['doubted']               = $lang->action->label->doubted;               
$lang->action->search->label['createfeedback']        = $lang->action->label->createfeedback;        
$lang->action->search->label['editfeedback']          = $lang->action->label->editfeedback;          
$lang->action->search->label['createorderexpense']    = $lang->action->label->createorderexpense;    
$lang->action->search->label['createcontractexpense'] = $lang->action->label->createcontractexpense; 
$lang->action->search->label['createcustomerexpense'] = $lang->action->label->createcustomerexpense; 
$lang->action->search->label['tradein']               = $lang->action->label->tradein;               
$lang->action->search->label['tradeout']              = $lang->action->label->tradeout;              
$lang->action->search->label['sendmail']              = $lang->action->label->sendmail;              
$lang->action->search->label['assignedtopick']        = $lang->action->label->assignedtopick;        
$lang->action->search->label['assignedtopurchase']    = $lang->action->label->assignedtopurchase;    
$lang->action->search->label['editedpick']            = $lang->action->label->editedpick;            
$lang->action->search->label['editeddeliver']         = $lang->action->label->editeddeliver;         
$lang->action->search->label['editedreceive']         = $lang->action->label->editedreceive;         
$lang->action->search->label['picked']                = $lang->action->label->picked;                
$lang->action->search->label['deliver']               = $lang->action->label->deliver;               
$lang->action->search->label['received']              = $lang->action->label->received;              
$lang->action->search->label['createorderproduct']    = $lang->action->label->createorderproduct;    
$lang->action->search->label['editorderproduct']      = $lang->action->label->editorderproduct;      
$lang->action->search->label['deleteorderproduct']    = $lang->action->label->deleteorderproduct;    
$lang->action->search->label['editproductinpick']     = $lang->action->label->editproductinpick;     
$lang->action->search->label['editproductinrecive']   = $lang->action->label->editproductinrecive;   
