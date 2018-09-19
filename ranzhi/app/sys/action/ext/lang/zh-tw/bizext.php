<?php 
$lang->history2 = '行為記錄';

$lang->action->objectTypes['commission']         = '提成';
$lang->action->objectTypes['effort']             = '日誌';
$lang->action->objectTypes['feedback']           = '售後工單';
$lang->action->objectTypes['invoice']            = '發票';
$lang->action->objectTypes['receivable']         = '應收款';
$lang->action->objectTypes['payable']            = '應付款';
$lang->action->objectTypes['psiorder']           = '進銷存訂單';
$lang->action->objectTypes['workflow']           = '流程';
$lang->action->objectTypes['workflowfield']      = '欄位';
$lang->action->objectTypes['workflowaction']     = '動作';
$lang->action->objectTypes['workflowmenu']       = '標籤';
$lang->action->objectTypes['workflowdatasource'] = '數據源';
$lang->action->objectTypes['workflowrule']       = '驗證規則';

$lang->action->label->commission         = '提成|commission|browse|';
$lang->action->label->effort             = '日誌|effort|view|effortID=%s';
$lang->action->label->feedback           = '售後工單|feedback|view|issueID=%s';
$lang->action->label->invoice            = '發票|invoice|view|invoiceID=%s';
$lang->action->label->receivable         = '應收款|receivable|view|moduleID=%s';
$lang->action->label->payable            = '應付款|payable|view|moduleID=%s';
$lang->action->label->psiorder           = '進銷存訂單|order|detail|orderID=%s';
$lang->action->label->workflow           = '流程|workflow|browse|';
$lang->action->label->workflowfield      = '欄位|workflow|adminField|module=%s';
$lang->action->label->workflowaction     = '動作|workflow|adminAction|module=%s';
$lang->action->label->workflowmenu       = '標籤|workflow|adminModuleMenu|module=%s';
$lang->action->label->workflowdatasource = '數據源|workflow|adminDatasource|datasourceID=%s';
$lang->action->label->workflowrule       = '驗證規則|workflow|viewrule|ruleID=%s';

/* Leads sync. */
$lang->action->desc->site_open            = '$date, <strong>$actor</strong> 在 <strong>$origin</strong> $extra' . "\n";
$lang->action->desc->site_renew           = '$date, <strong>$actor</strong> 在 <strong>$origin</strong> $extra' . "\n";
$lang->action->desc->site_free2charged    = '$date, <strong>$actor</strong> 在 <strong>$origin</strong> $extra' . "\n";
$lang->action->desc->site_charged2charged = '$date, <strong>$actor</strong> 在 <strong>$origin</strong> $extra' . "\n";

$lang->action->desc->order_score          = '$date, <strong>$actor</strong> 在 <strong>$origin</strong> $extra' . "\n";
$lang->action->desc->order_license        = '$date, <strong>$actor</strong> 在 <strong>$origin</strong> $extra' . "\n";
$lang->action->desc->order_theme          = '$date, <strong>$actor</strong> 在 <strong>$origin</strong> $extra' . "\n";

$lang->action->desc->extension_demo       = '$date, <strong>$actor</strong> 在 <strong>$origin</strong> $extra' . "\n";
$lang->action->desc->extension_year       = '$date, <strong>$actor</strong> 在 <strong>$origin</strong> $extra' . "\n";
$lang->action->desc->extension_life       = '$date, <strong>$actor</strong> 在 <strong>$origin</strong> $extra' . "\n";

$lang->action->desc->thread_post          = '$date, <strong>$actor</strong> 在 <strong>$origin</strong> $extra' . "\n";
$lang->action->desc->thread_reply         = '$date, <strong>$actor</strong> 在 <strong>$origin</strong> $extra' . "\n";

$lang->action->desc->message_message      = '$date, <strong>$actor</strong> 在 <strong>$origin</strong> $extra' . "\n";
$lang->action->desc->message_comment      = '$date, <strong>$actor</strong> 在 <strong>$origin</strong> $extra' . "\n";
$lang->action->desc->message_reply        = '$date, <strong>$actor</strong> 在 <strong>$origin</strong> $extra' . "\n";
 
$lang->action->desc->ask_question         = '$date, <strong>$actor</strong> 在 <strong>$origin</strong> $extra' . "\n";
$lang->action->desc->ask_answer           = '$date, <strong>$actor</strong> 在 <strong>$origin</strong> $extra' . "\n";

$lang->action->desc->other_usercase       = '$date, <strong>$actor</strong> 在 <strong>$origin</strong> $extra' . "\n";
$lang->action->desc->other_donation       = '$date, <strong>$actor</strong> 在 <strong>$origin</strong> $extra' . "\n";

$lang->action->desc->lastlogin            = '$date, <strong>$actor</strong> 登錄了 <strong>$origin</strong> 。' . "\n";
$lang->action->desc->sync                 = '$date, 由 <strong>$actor</strong> 同步。' . "\n";

/* Effort. */
$lang->action->desc->recordestimate       = '$date, 由 <strong>$actor</strong> 記錄工時，消耗 <strong>$extra</strong> 小時。';

/* Expense */
$lang->action->desc->createorderexpense    = '$date, 由 <strong>$actor</strong> 創建訂單支出：<strong>$extra</strong>。' . "\n";
$lang->action->desc->createcontractexpense = '$date, 由 <strong>$actor</strong> 創建合同支出：<strong>$extra</strong>。' . "\n";
$lang->action->desc->createcustomerexpense = '$date, 由 <strong>$actor</strong> 創建客戶支出：<strong>$extra</strong>。' . "\n";

/* Feedback */
$lang->action->desc->replied        = '$date, 由 <strong>$actor</strong> 回覆。' . "\n";
$lang->action->desc->doubted        = '$date, 由 <strong>$actor</strong> 追問。' . "\n";
$lang->action->desc->createfeedback = '$date, 由 <strong>$actor</strong> 創建售後工單：<strong>$extra</strong>。' . "\n";
$lang->action->desc->editfeedback   = '$date, 由 <strong>$actor</strong> 編輯售後工單：<strong>$extra</strong>。' . "\n";

/* Invoice */
$lang->action->desc->createdinvoice    = '$date, 由 <strong>$actor</strong> 申請發票：<strong>$extra</strong>。' . "\n";
$lang->action->desc->drawninvoice      = '$date, 由 <strong>$actor</strong> 開具發票：<strong>$extra</strong>。' . "\n";
$lang->action->desc->expressedinvoice  = '$date, 由 <strong>$actor</strong> 快遞發票：<strong>$extra</strong>。' . "\n";
$lang->action->desc->sentinvoice       = '$date, 由 <strong>$actor</strong> 通過<strong> $extra </strong>發送電子發票。';
$lang->action->desc->canceledinvoice   = '$date, 由 <strong>$actor</strong> 作廢發票。' . "\n";
$lang->action->desc->deletedinvoice    = '$date, 由 <strong>$actor</strong> 刪除發票。';
$lang->action->desc->redinvoice        = '$date, 由 <strong>$actor</strong> 沖紅髮票。' . "\n";
$lang->action->desc->createinvoiceinfo = '$date, 由 <strong>$actor</strong> 添加稅務信息：<strong> $extra </strong>。';
$lang->action->desc->editinvoiceinfo   = '$date, 由 <strong>$actor</strong> 編輯稅務信息：<strong> $extra </strong>。';
$lang->action->desc->deleteinvoiceinfo = '$date, 由 <strong>$actor</strong> 刪除稅務信息：<strong> $extra </strong>。';

/* PSI */
$lang->action->desc->sendmail              = '$date, 由 <strong>$actor</strong> 發送郵件通知。'; 
$lang->action->desc->assignedtopick        = '$date, 由 <strong>$actor</strong> 指派 <strong>$extra</strong> 給 <strong>$batch</strong> 配貨。'; 
$lang->action->desc->assignedtopurchase    = '$date, 由 <strong>$actor</strong> 通知 <strong>$extra</strong> 採購。'; 
$lang->action->desc->editedpick            = '$date, 由 <strong>$actor</strong> 編輯 <strong>$extra</strong> 的配貨信息。';
$lang->action->desc->editeddeliver         = '$date, 由 <strong>$actor</strong> 編輯 <strong>$extra</strong> 的發貨信息。';
$lang->action->desc->editedreceive         = '$date, 由 <strong>$actor</strong> 編輯 <strong>$extra</strong> 的收貨信息。'; 
$lang->action->desc->picked                = '$date, 由 <strong>$actor</strong> 配貨。';
$lang->action->desc->deliver               = '$date, 由 <strong>$actor</strong> 發貨。';
$lang->action->desc->received              = '$date, 由 <strong>$actor</strong> 收貨。';
$lang->action->desc->createorderproduct    = '$date, 由 <strong>$actor</strong> 添加產品 <strong>$extra</strong>。';
$lang->action->desc->editorderproduct      = '$date, 由 <strong>$actor</strong> 編輯產品 <strong>$extra</strong>。';
$lang->action->desc->deleteorderproduct    = '$date, 由 <strong>$actor</strong> 刪除產品 <strong>$extra</strong>。';
$lang->action->desc->editproductinpick     = '$date, 由 <strong>$actor</strong> 編輯產品 <strong>$extra</strong> 的配貨數量。';
$lang->action->desc->editproductinrecive   = '$date, 由 <strong>$actor</strong> 編輯產品 <strong>$extra</strong> 的收貨數量。';

/* Receivables & Payables. */
$lang->action->desc->tradein  = '$date, 由 <strong>$actor</strong> 收款：<strong>$extra</strong>。' . "\n";
$lang->action->desc->tradeout = '$date, 由 <strong>$actor</strong> 付款：<strong>$extra</strong>。' . "\n";

/* Salary */
$lang->action->desc->confirmed            = '$date, 由 <strong>$actor</strong> 確認。' . "\n";

/* Workflow */
$lang->action->desc->userdefined          = '$date, 由 <strong>$actor</strong> $extra。' . "\n";

$lang->action->label->confirmed             = '確認了';
$lang->action->label->recordestimate        = '記錄了工時';
$lang->action->label->userdefined           = '執行自定義動作';
$lang->action->label->replied               = '回覆了';
$lang->action->label->doubted               = '追問了';
$lang->action->label->createfeedback        = '創建售後工單';
$lang->action->label->editfeedback          = '編輯售後工單';
$lang->action->label->createorderexpense    = '創建訂單支出';
$lang->action->label->createcontractexpense = '創建合同支出';
$lang->action->label->createcustomerexpense = '創建客戶支出';
$lang->action->label->tradein               = '收款';
$lang->action->label->tradeout              = '付款';
$lang->action->label->sendmail              = '發送郵件通知'; 
$lang->action->label->assignedtopick        = '通知配貨'; 
$lang->action->label->assignedtopurchase    = '通知採購'; 
$lang->action->label->editedpick            = '編輯配貨信息';
$lang->action->label->editeddeliver         = '編輯發貨信息';
$lang->action->label->editedreceive         = '編輯收貨信息'; 
$lang->action->label->picked                = '配貨';
$lang->action->label->deliver               = '發貨';
$lang->action->label->received              = '收貨';
$lang->action->label->createorderproduct    = '添加訂單產品 ';
$lang->action->label->editorderproduct      = '編輯訂單產品 ';
$lang->action->label->deleteorderproduct    = '刪除訂單產品 ';
$lang->action->label->editproductinpick     = '編輯訂單產品的配貨數量。';
$lang->action->label->editproductinrecive   = '編輯訂單產品的收貨數量。';

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
