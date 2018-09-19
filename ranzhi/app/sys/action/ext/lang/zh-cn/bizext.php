<?php 
$lang->history2 = '行为记录';

$lang->action->objectTypes['commission']         = '提成';
$lang->action->objectTypes['effort']             = '日志';
$lang->action->objectTypes['feedback']           = '售后工单';
$lang->action->objectTypes['invoice']            = '发票';
$lang->action->objectTypes['receivable']         = '应收款';
$lang->action->objectTypes['payable']            = '应付款';
$lang->action->objectTypes['psiorder']           = '进销存订单';
$lang->action->objectTypes['workflow']           = '流程';
$lang->action->objectTypes['workflowfield']      = '字段';
$lang->action->objectTypes['workflowaction']     = '动作';
$lang->action->objectTypes['workflowmenu']       = '标签';
$lang->action->objectTypes['workflowdatasource'] = '数据源';
$lang->action->objectTypes['workflowrule']       = '验证规则';

$lang->action->label->commission         = '提成|commission|browse|';
$lang->action->label->effort             = '日志|effort|view|effortID=%s';
$lang->action->label->feedback           = '售后工单|feedback|view|issueID=%s';
$lang->action->label->invoice            = '发票|invoice|view|invoiceID=%s';
$lang->action->label->receivable         = '应收款|receivable|view|moduleID=%s';
$lang->action->label->payable            = '应付款|payable|view|moduleID=%s';
$lang->action->label->psiorder           = '进销存订单|order|detail|orderID=%s';
$lang->action->label->workflow           = '流程|workflow|browse|';
$lang->action->label->workflowfield      = '字段|workflow|adminField|module=%s';
$lang->action->label->workflowaction     = '动作|workflow|adminAction|module=%s';
$lang->action->label->workflowmenu       = '标签|workflow|adminModuleMenu|module=%s';
$lang->action->label->workflowdatasource = '数据源|workflow|adminDatasource|datasourceID=%s';
$lang->action->label->workflowrule       = '验证规则|workflow|viewrule|ruleID=%s';

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

$lang->action->desc->lastlogin            = '$date, <strong>$actor</strong> 登录了 <strong>$origin</strong> 。' . "\n";
$lang->action->desc->sync                 = '$date, 由 <strong>$actor</strong> 同步。' . "\n";

/* Effort. */
$lang->action->desc->recordestimate       = '$date, 由 <strong>$actor</strong> 记录工时，消耗 <strong>$extra</strong> 小时。';

/* Expense */
$lang->action->desc->createorderexpense    = '$date, 由 <strong>$actor</strong> 创建订单支出：<strong>$extra</strong>。' . "\n";
$lang->action->desc->createcontractexpense = '$date, 由 <strong>$actor</strong> 创建合同支出：<strong>$extra</strong>。' . "\n";
$lang->action->desc->createcustomerexpense = '$date, 由 <strong>$actor</strong> 创建客户支出：<strong>$extra</strong>。' . "\n";

/* Feedback */
$lang->action->desc->replied        = '$date, 由 <strong>$actor</strong> 回复。' . "\n";
$lang->action->desc->doubted        = '$date, 由 <strong>$actor</strong> 追问。' . "\n";
$lang->action->desc->createfeedback = '$date, 由 <strong>$actor</strong> 创建售后工单：<strong>$extra</strong>。' . "\n";
$lang->action->desc->editfeedback   = '$date, 由 <strong>$actor</strong> 编辑售后工单：<strong>$extra</strong>。' . "\n";

/* Invoice */
$lang->action->desc->createdinvoice    = '$date, 由 <strong>$actor</strong> 申请发票：<strong>$extra</strong>。' . "\n";
$lang->action->desc->drawninvoice      = '$date, 由 <strong>$actor</strong> 开具发票：<strong>$extra</strong>。' . "\n";
$lang->action->desc->expressedinvoice  = '$date, 由 <strong>$actor</strong> 快递发票：<strong>$extra</strong>。' . "\n";
$lang->action->desc->sentinvoice       = '$date, 由 <strong>$actor</strong> 通过<strong> $extra </strong>发送电子发票。';
$lang->action->desc->canceledinvoice   = '$date, 由 <strong>$actor</strong> 作废发票。' . "\n";
$lang->action->desc->deletedinvoice    = '$date, 由 <strong>$actor</strong> 删除发票。';
$lang->action->desc->redinvoice        = '$date, 由 <strong>$actor</strong> 冲红发票。' . "\n";
$lang->action->desc->createinvoiceinfo = '$date, 由 <strong>$actor</strong> 添加税务信息：<strong> $extra </strong>。';
$lang->action->desc->editinvoiceinfo   = '$date, 由 <strong>$actor</strong> 编辑税务信息：<strong> $extra </strong>。';
$lang->action->desc->deleteinvoiceinfo = '$date, 由 <strong>$actor</strong> 删除税务信息：<strong> $extra </strong>。';

/* PSI */
$lang->action->desc->sendmail              = '$date, 由 <strong>$actor</strong> 发送邮件通知。'; 
$lang->action->desc->assignedtopick        = '$date, 由 <strong>$actor</strong> 指派 <strong>$extra</strong> 给 <strong>$batch</strong> 配货。'; 
$lang->action->desc->assignedtopurchase    = '$date, 由 <strong>$actor</strong> 通知 <strong>$extra</strong> 采购。'; 
$lang->action->desc->editedpick            = '$date, 由 <strong>$actor</strong> 编辑 <strong>$extra</strong> 的配货信息。';
$lang->action->desc->editeddeliver         = '$date, 由 <strong>$actor</strong> 编辑 <strong>$extra</strong> 的发货信息。';
$lang->action->desc->editedreceive         = '$date, 由 <strong>$actor</strong> 编辑 <strong>$extra</strong> 的收货信息。'; 
$lang->action->desc->picked                = '$date, 由 <strong>$actor</strong> 配货。';
$lang->action->desc->deliver               = '$date, 由 <strong>$actor</strong> 发货。';
$lang->action->desc->received              = '$date, 由 <strong>$actor</strong> 收货。';
$lang->action->desc->createorderproduct    = '$date, 由 <strong>$actor</strong> 添加产品 <strong>$extra</strong>。';
$lang->action->desc->editorderproduct      = '$date, 由 <strong>$actor</strong> 编辑产品 <strong>$extra</strong>。';
$lang->action->desc->deleteorderproduct    = '$date, 由 <strong>$actor</strong> 删除产品 <strong>$extra</strong>。';
$lang->action->desc->editproductinpick     = '$date, 由 <strong>$actor</strong> 编辑产品 <strong>$extra</strong> 的配货数量。';
$lang->action->desc->editproductinrecive   = '$date, 由 <strong>$actor</strong> 编辑产品 <strong>$extra</strong> 的收货数量。';

/* Receivables & Payables. */
$lang->action->desc->tradein  = '$date, 由 <strong>$actor</strong> 收款：<strong>$extra</strong>。' . "\n";
$lang->action->desc->tradeout = '$date, 由 <strong>$actor</strong> 付款：<strong>$extra</strong>。' . "\n";

/* Salary */
$lang->action->desc->confirmed            = '$date, 由 <strong>$actor</strong> 确认。' . "\n";

/* Workflow */
$lang->action->desc->userdefined          = '$date, 由 <strong>$actor</strong> $extra。' . "\n";

$lang->action->label->confirmed             = '确认了';
$lang->action->label->recordestimate        = '记录了工时';
$lang->action->label->userdefined           = '执行自定义动作';
$lang->action->label->replied               = '回复了';
$lang->action->label->doubted               = '追问了';
$lang->action->label->createfeedback        = '创建售后工单';
$lang->action->label->editfeedback          = '编辑售后工单';
$lang->action->label->createorderexpense    = '创建订单支出';
$lang->action->label->createcontractexpense = '创建合同支出';
$lang->action->label->createcustomerexpense = '创建客户支出';
$lang->action->label->tradein               = '收款';
$lang->action->label->tradeout              = '付款';
$lang->action->label->sendmail              = '发送邮件通知'; 
$lang->action->label->assignedtopick        = '通知配货'; 
$lang->action->label->assignedtopurchase    = '通知采购'; 
$lang->action->label->editedpick            = '编辑配货信息';
$lang->action->label->editeddeliver         = '编辑发货信息';
$lang->action->label->editedreceive         = '编辑收货信息'; 
$lang->action->label->picked                = '配货';
$lang->action->label->deliver               = '发货';
$lang->action->label->received              = '收货';
$lang->action->label->createorderproduct    = '添加订单产品 ';
$lang->action->label->editorderproduct      = '编辑订单产品 ';
$lang->action->label->deleteorderproduct    = '删除订单产品 ';
$lang->action->label->editproductinpick     = '编辑订单产品的配货数量。';
$lang->action->label->editproductinrecive   = '编辑订单产品的收货数量。';

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
