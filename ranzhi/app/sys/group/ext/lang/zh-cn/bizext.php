<?php
/* CRM */
$lang->appModule->crm[] = 'feedback';

$lang->methodOrder[22] = 'feedback';

/* PSI */
$lang->appModule->psi[] = 'sale';
$lang->appModule->psi[] = 'purchase';
$lang->appModule->psi[] = 'batch';
$lang->appModule->psi[] = 'customer';
$lang->appModule->psi[] = 'provider';
$lang->appModule->psi[] = 'product';
$lang->appModule->psi[] = 'store';

$lang->moduleOrder[7]  = 'sale';
$lang->moduleOrder[8]  = 'purchase';
$lang->moduleOrder[9]  = 'batch';
$lang->moduleOrder[10] = 'customer';
$lang->moduleOrder[11] = 'provider';
$lang->moduleOrder[12] = 'product';
$lang->moduleOrder[14] = 'store';

/* CASH */
$lang->appModule->cash[] = 'receivable';
$lang->appModule->cash[] = 'payable';
$lang->appModule->cash[] = 'invoice';

$lang->moduleOrder[31] = 'receivable';
$lang->moduleOrder[32] = 'payable';
$lang->moduleOrder[33] = 'invoice';

/* HR */
$lang->appModule->hr = array();
$lang->appModule->hr[] = 'salary';
$lang->appModule->hr[] = 'commission';

$lang->moduleOrder[95] = 'salary';
$lang->moduleOrder[96] = 'commission';

/* Flow*/
$lang->appModule->flow = array();
$lang->appModule->flow[] = 'workflow';

$lang->moduleOrder[100] = 'workflow';

$lang->appModule->superadmin[] = 'company';

$lang->moduleOrder[124] = 'company';

/* Attend */
$lang->resource->attend->importSettings  = 'importSettings';
$lang->resource->attend->import          = 'import';
$lang->resource->attend->showImportError = 'showImportError';

$lang->attend->methodOrder[85] = 'importSettings';
$lang->attend->methodOrder[90] = 'import';
$lang->attend->methodOrder[95] = 'showImportError';

/* Contract */
$lang->resource->contract->expense = 'expense';
$lang->resource->contract->setting = 'setting';
$lang->resource->contract->invoice = 'invoice';

$lang->contract->methodOrder[75] = 'expense';
$lang->contract->methodOrder[80] = 'setting';
$lang->contract->methodOrder[85] = 'invoice';

/* Customer */
$lang->resource->customer->import         = 'import';
$lang->resource->customer->exportTemplate = 'exportTemplate';
$lang->resource->customer->invoice        = 'invoice';
$lang->resource->customer->invoiceInfo    = 'invoiceInfo';
$lang->resource->customer->createInvoice  = 'createInvoice';
$lang->resource->customer->editInvoice    = 'editInvoice';
$lang->resource->customer->deleteInvoice  = 'deleteInvoice';

$lang->customer->methodOrder[75]  = 'import';
$lang->customer->methodOrder[80]  = 'exportTemplate';
$lang->customer->methodOrder[85]  = 'invoice';
$lang->customer->methodOrder[90]  = 'invoiceInfo';
$lang->customer->methodOrder[95]  = 'createInvoice';
$lang->customer->methodOrder[100] = 'editInvoice';
$lang->customer->methodOrder[105] = 'deleteInvoice';

/* Order */
$lang->resource->order->team = 'team';

$lang->order->methodOrder[60] = 'team';

/* Product */
$lang->resource->product->copy             = 'copy';
$lang->resource->product->adminaction      = 'adminaction';
$lang->resource->product->createaction     = 'createaction';
$lang->resource->product->editaction       = 'editaction';
$lang->resource->product->deleteaction     = 'deleteaction';
$lang->resource->product->actionconditions = 'actionconditions';
$lang->resource->product->actioninputs     = 'actioninputs';
$lang->resource->product->actiontasks      = 'actiontasks';
$lang->resource->product->adminfield       = 'adminfield';
$lang->resource->product->createfield      = 'createfield';
$lang->resource->product->editfield        = 'editfield';
$lang->resource->product->deletefield      = 'deletefield';
$lang->resource->product->actionresults    = 'actionresults';
$lang->resource->product->createresult     = 'createresult';
$lang->resource->product->editresult       = 'editresult';
$lang->resource->product->deleteresult     = 'deleteresult';
$lang->resource->product->adminroles       = 'adminroles';

$lang->product->methodOrder[45]  = 'copy';
$lang->product->methodOrder[50]  = 'adminaction';
$lang->product->methodOrder[55]  = 'createaction';
$lang->product->methodOrder[60]  = 'editaction';
$lang->product->methodOrder[65]  = 'deleteaction';
$lang->product->methodOrder[70]  = 'actionconditions';
$lang->product->methodOrder[75]  = 'actioninputs';
$lang->product->methodOrder[80]  = 'actiontasks';
$lang->product->methodOrder[85]  = 'adminfield';
$lang->product->methodOrder[90]  = 'createfield';
$lang->product->methodOrder[95]  = 'editfield';
$lang->product->methodOrder[100] = 'deletefield';
$lang->product->methodOrder[105] = 'actionresults';
$lang->product->methodOrder[110] = 'createresult';
$lang->product->methodOrder[115] = 'editresult';
$lang->product->methodOrder[120] = 'deleteresult';
$lang->product->methodOrder[130] = 'adminroles';
                                   
/* Leads */
$lang->resource->leads->adminSites = 'adminSites';
$lang->resource->leads->createSite = 'createSite';
$lang->resource->leads->editSite   = 'editSite';
$lang->resource->leads->deleteSite = 'deleteSite';
$lang->resource->leads->sync       = 'sync';

$lang->leads->methodOrder[45] = 'adminSites';
$lang->leads->methodOrder[50] = 'createSite';
$lang->leads->methodOrder[55] = 'editSite';
$lang->leads->methodOrder[60] = 'deleteSite';
$lang->leads->methodOrder[65] = 'sync';

/* Feedback */
$lang->resource->feedback = new stdclass();
$lang->resource->feedback->company  = 'company';
$lang->resource->feedback->create   = 'create';
$lang->resource->feedback->edit     = 'edit';
$lang->resource->feedback->view     = 'view';
$lang->resource->feedback->reply    = 'reply';
$lang->resource->feedback->doubt    = 'doubt';
$lang->resource->feedback->transfer = 'transfer';
$lang->resource->feedback->assignTo = 'assignTo';
$lang->resource->feedback->close    = 'close';
$lang->resource->feedback->activate = 'activate';
$lang->resource->feedback->delete   = 'delete';

$lang->feedback->methodOrder[5]  = 'company';
$lang->feedback->methodOrder[10] = 'create';
$lang->feedback->methodOrder[15] = 'edit';
$lang->feedback->methodOrder[20] = 'view';
$lang->feedback->methodOrder[25] = 'reply';
$lang->feedback->methodOrder[30] = 'doubt';
$lang->feedback->methodOrder[35] = 'transfer';
$lang->feedback->methodOrder[40] = 'assignTo';
$lang->feedback->methodOrder[45] = 'close';
$lang->feedback->methodOrder[50] = 'activate';
$lang->feedback->methodOrder[55] = 'delete';

/*  Sale */
$lang->resource->sale = new stdclass();
$lang->resource->sale->browse           = 'browse';
$lang->resource->sale->create           = 'create';
$lang->resource->sale->edit             = 'edit';
$lang->resource->sale->delete           = 'delete';
$lang->resource->sale->detail           = 'detail';
$lang->resource->sale->cancel           = 'cancel';
$lang->resource->sale->activate         = 'activate';
$lang->resource->sale->finish           = 'finish';
$lang->resource->sale->assignToPick     = 'assignToPick';
$lang->resource->sale->assignToPurchase = 'assignToPurchase';
$lang->resource->sale->printOrder       = 'printOrder';
//$lang->resource->sale->export           = 'export';
//$lang->resource->sale->createRefund     = 'createRefund';
//$lang->resource->sale->editRefund       = 'editRefund';
$lang->resource->sale->report           = 'report';

$lang->sale->methodOrder[5]   = 'browse';
$lang->sale->methodOrder[10]  = 'create';
$lang->sale->methodOrder[15]  = 'edit';
$lang->sale->methodOrder[20]  = 'delete';
$lang->sale->methodOrder[25]  = 'detail';
$lang->sale->methodOrder[30]  = 'cancel';
$lang->sale->methodOrder[35]  = 'activate';
$lang->sale->methodOrder[40]  = 'finish';
$lang->sale->methodOrder[45]  = 'assignToPick';
$lang->sale->methodOrder[50]  = 'assignToPurchase';
$lang->sale->methodOrder[60]  = 'printOrder';
$lang->sale->methodOrder[75]  = 'export';
$lang->sale->methodOrder[80]  = 'createRefund';
$lang->sale->methodOrder[85]  = 'editRefund';
$lang->sale->methodOrder[90]  = 'report';

/* Purchase */
$lang->resource->purchase = new stdclass();
$lang->resource->purchase->browse       = 'browse';
$lang->resource->purchase->create       = 'create';
$lang->resource->purchase->edit         = 'edit';
$lang->resource->purchase->delete       = 'delete';
$lang->resource->purchase->detail       = 'detail';
$lang->resource->purchase->cancel       = 'cancel';
$lang->resource->purchase->activate     = 'activate';
$lang->resource->purchase->finish       = 'finish';
$lang->resource->purchase->purchase     = 'purchase';                
$lang->resource->purchase->sendMail     = 'sendMail';
$lang->resource->purchase->printOrder   = 'printOrder';
//$lang->resource->purchase->export       = 'export';
//$lang->resource->purchase->createRefund = 'createRefund';
//$lang->resource->purchase->editRefund   = 'editRefund';
$lang->resource->purchase->report       = 'report';

$lang->purchase->methodOrder[5]  = 'browse';
$lang->purchase->methodOrder[10] = 'create';
$lang->purchase->methodOrder[15] = 'edit';
$lang->purchase->methodOrder[20] = 'delete';
$lang->purchase->methodOrder[25] = 'detail';
$lang->purchase->methodOrder[30] = 'cancel';
$lang->purchase->methodOrder[35] = 'activate';
$lang->purchase->methodOrder[40] = 'finish';
$lang->purchase->methodOrder[55] = 'purchase';                
$lang->purchase->methodOrder[60] = 'sendMail';
$lang->purchase->methodOrder[65] = 'printOrder';
$lang->purchase->methodOrder[75] = 'export';
$lang->purchase->methodOrder[80] = 'createRefund';
$lang->purchase->methodOrder[85] = 'editRefund';
$lang->purchase->methodOrder[90] = 'report';

/* Batch */
$lang->resource->batch = new stdclass();
$lang->resource->batch->browse               = 'browse';
$lang->resource->batch->browsePurchaseOrders = 'browsePurchaseOrders';
$lang->resource->batch->browseFinished       = 'browseFinished';
$lang->resource->batch->detail               = 'detail';
$lang->resource->batch->deliver              = 'deliver';
$lang->resource->batch->editDeliver          = 'editDeliver';
$lang->resource->batch->receive              = 'receive';
$lang->resource->batch->editReceive          = 'editReceive';
$lang->resource->batch->editPick             = 'editPick';
$lang->resource->batch->printBatch           = 'printBatch';

$lang->batch->methodOrder[5]  = 'browse';
$lang->batch->methodOrder[10] = 'browsePurchaseOrders';
$lang->batch->methodOrder[15] = 'browseFinished';
$lang->batch->methodOrder[20] = 'detail';
$lang->batch->methodOrder[25] = 'deliver';
$lang->batch->methodOrder[30] = 'editDeliver';
$lang->batch->methodOrder[35] = 'receive';
$lang->batch->methodOrder[40] = 'editReceive';
$lang->batch->methodOrder[45] = 'editPick';
$lang->batch->methodOrder[50] = 'printBatch';

/* Receivable */
$lang->resource->receivable = new stdclass();
$lang->resource->receivable->receivable = 'receivable';
$lang->resource->receivable->received   = 'received';
$lang->resource->receivable->create     = 'create';
$lang->resource->receivable->edit       = 'edit';
$lang->resource->receivable->view       = 'view';
$lang->resource->receivable->delete     = 'delete';
$lang->resource->receivable->receive    = 'receive';

$lang->receivable->methodOrder[5]  = 'receivable';
$lang->receivable->methodOrder[10] = 'received';
$lang->receivable->methodOrder[15] = 'create';
$lang->receivable->methodOrder[20] = 'edit';
$lang->receivable->methodOrder[25] = 'view';
$lang->receivable->methodOrder[30] = 'delete';
$lang->receivable->methodOrder[35] = 'receive';

/* Payable */
$lang->resource->payable = new stdclass();
$lang->resource->payable->payable = 'payable';
$lang->resource->payable->paid    = 'paid';
$lang->resource->payable->create  = 'create';
$lang->resource->payable->edit    = 'edit';
$lang->resource->payable->view    = 'view';
$lang->resource->payable->delete  = 'delete';
$lang->resource->payable->pay     = 'pay';

$lang->payable->methodOrder[5]  = 'payable';
$lang->payable->methodOrder[10] = 'paid';
$lang->payable->methodOrder[15] = 'create';
$lang->payable->methodOrder[20] = 'edit';
$lang->payable->methodOrder[25] = 'view';
$lang->payable->methodOrder[30] = 'delete';
$lang->payable->methodOrder[35] = 'pay';

/* Invoice */
$lang->resource->invoice = new stdclass();
$lang->resource->invoice->browse    = 'browse';
$lang->resource->invoice->create    = 'create';
$lang->resource->invoice->edit      = 'edit';
$lang->resource->invoice->view      = 'view';
$lang->resource->invoice->drawn     = 'drawn';
$lang->resource->invoice->express   = 'express';
$lang->resource->invoice->taxRefund = 'taxRefund';
$lang->resource->invoice->export    = 'export';
$lang->resource->invoice->report    = 'report';

$lang->invoice->method[5]  = 'browse';
$lang->invoice->method[10] = 'create';
$lang->invoice->method[15] = 'edit';
$lang->invoice->method[20] = 'view';
$lang->invoice->method[25] = 'drawn';
$lang->invoice->method[30] = 'express';
$lang->invoice->method[35] = 'taxRefund';
$lang->invoice->method[40] = 'export';
$lang->invoice->method[45] = 'report';

/* Salary */
$lang->resource->salary = new stdclass();
$lang->resource->salary->company      = 'company';
$lang->resource->salary->dept         = 'dept';
$lang->resource->salary->edit         = 'edit';
$lang->resource->salary->delete       = 'delete';
$lang->resource->salary->confirm      = 'confirm';
$lang->resource->salary->batchCreate  = 'batchCreate';
$lang->resource->salary->batchEdit    = 'batchEdit';
$lang->resource->salary->batchDelete  = 'batchDelete';
$lang->resource->salary->batchConfirm = 'batchConfirm';
$lang->resource->salary->setBasic     = 'setBasic';
$lang->resource->salary->setBonus     = 'setBonus';
$lang->resource->salary->setAllowance = 'setAllowance';
$lang->resource->salary->setExemption = 'setExemption';
$lang->resource->salary->setSSF       = 'setSSF';
$lang->resource->salary->report       = 'report';
$lang->resource->salary->export       = 'export';

$lang->salary->methodOrder[10] = 'company';
$lang->salary->methodOrder[15] = 'dept';
$lang->salary->methodOrder[20] = 'edit';
$lang->salary->methodOrder[25] = 'delete';
$lang->salary->methodOrder[30] = 'confirm';
$lang->salary->methodOrder[35] = 'batchCreate';
$lang->salary->methodOrder[40] = 'batchEdit';
$lang->salary->methodOrder[45] = 'batchDelete';
$lang->salary->methodOrder[50] = 'batchConfirm';
$lang->salary->methodOrder[55] = 'setBasic';
$lang->salary->methodOrder[60] = 'setBonus';
$lang->salary->methodOrder[65] = 'setAllowance';
$lang->salary->methodOrder[70] = 'setExemption';
$lang->salary->methodOrder[75] = 'setSSF';
$lang->salary->methodOrder[80] = 'report';
$lang->salary->methodOrder[85] = 'export';

/* Commission */
$lang->resource->commission = new stdclass();
$lang->resource->commission->browse            = 'browse';
$lang->resource->commission->create            = 'create';
$lang->resource->commission->report            = 'report';
$lang->resource->commission->setting           = 'setting';
$lang->resource->commission->setSaleCommission = 'setSaleCommission';
$lang->resource->commission->setLineCommission = 'setLineCommission';
$lang->resource->commission->setCategory       = 'setCategory';
$lang->resource->commission->export            = 'export';
$lang->resource->commission->switchIgnore      = 'switchIgnore';
$lang->resource->commission->batchSwitchIgnore = 'batchSwitchIgnore';

$lang->commission->methodOrder[5]  = 'browse';
$lang->commission->methodOrder[10] = 'create';
$lang->commission->methodOrder[15] = 'report';
$lang->commission->methodOrder[20] = 'setting';
$lang->commission->methodOrder[25] = 'setSaleCommission';
$lang->commission->methodOrder[30] = 'setLineCommission';
$lang->commission->methodOrder[35] = 'setCategory';
$lang->commission->methodOrder[40] = 'export';
$lang->commission->methodOrder[45] = 'switchIgnore';
$lang->commission->methodOrder[50] = 'batchSwitchIgnore';

/* workflow */
$lang->resource->workflow = new stdclass();
$lang->resource->workflow->browse           = 'browse';
$lang->resource->workflow->create           = 'create';
$lang->resource->workflow->edit             = 'edit';
$lang->resource->workflow->delete           = 'delete';
$lang->resource->workflow->view             = 'view';
$lang->resource->workflow->backup           = 'backup';
$lang->resource->workflow->upgrade          = 'upgrade';
$lang->resource->workflow->setSubModule     = 'setSubModule';
$lang->resource->workflow->adminField       = 'adminField';
$lang->resource->workflow->createField      = 'createField';
$lang->resource->workflow->editField        = 'editField';
$lang->resource->workflow->deleteField      = 'deleteField';
$lang->resource->workflow->exportField      = 'exportField';
$lang->resource->workflow->adminAction      = 'adminAction';
$lang->resource->workflow->createAction     = 'createAction';
$lang->resource->workflow->editAction       = 'editAction';
$lang->resource->workflow->deleteAction     = 'deleteAction';
$lang->resource->workflow->adminCondition   = 'adminCondition';
$lang->resource->workflow->adminLayout      = 'adminLayout';
$lang->resource->workflow->adminResult      = 'adminResult';
$lang->resource->workflow->createResult     = 'createResult';
$lang->resource->workflow->editResult       = 'editResult';
$lang->resource->workflow->deleteResult     = 'deleteResult';
$lang->resource->workflow->verification     = 'verification';
$lang->resource->workflow->setNotice        = 'setNotice';
$lang->resource->workflow->adminDatasource  = 'adminDatasource';
$lang->resource->workflow->createDatasource = 'createDatasource';
$lang->resource->workflow->editDatasource   = 'editDatasource';
$lang->resource->workflow->deleteDatasource = 'deleteDatasource';
$lang->resource->workflow->adminRule        = 'adminRule';
$lang->resource->workflow->createRule       = 'createRule';
$lang->resource->workflow->editRule         = 'editRule';
$lang->resource->workflow->viewRule         = 'viewRule';
$lang->resource->workflow->deleteRule       = 'deleteRule';
$lang->resource->workflow->adminModuleMenu  = 'adminModuleMenu';
$lang->resource->workflow->createModuleMenu = 'createModuleMenu';
$lang->resource->workflow->editModuleMenu   = 'editModuleMenu';
$lang->resource->workflow->deleteModuleMenu = 'deleteModuleMenu';

$lang->workflow->methodOrder[5]   = 'browse';
$lang->workflow->methodOrder[10]  = 'create';
$lang->workflow->methodOrder[15]  = 'edit';
$lang->workflow->methodOrder[20]  = 'delete';
$lang->workflow->methodOrder[22]  = 'view';
$lang->workflow->methodOrder[23]  = 'backup';
$lang->workflow->methodOrder[25]  = 'upgrade';
$lang->workflow->methodOrder[27]  = 'setSubModule';
$lang->workflow->methodOrder[30]  = 'adminField';
$lang->workflow->methodOrder[35]  = 'createField';
$lang->workflow->methodOrder[40]  = 'editField';
$lang->workflow->methodOrder[45]  = 'deleteField';
$lang->workflow->methodOrder[47]  = 'exportField';
$lang->workflow->methodOrder[50]  = 'adminAction';
$lang->workflow->methodOrder[55]  = 'createAction';
$lang->workflow->methodOrder[60]  = 'editAction';
$lang->workflow->methodOrder[65]  = 'deleteAction';
$lang->workflow->methodOrder[70]  = 'adminCondition';
$lang->workflow->methodOrder[75]  = 'adminLayout';
$lang->workflow->methodOrder[80]  = 'adminResult';
$lang->workflow->methodOrder[85]  = 'createResult';
$lang->workflow->methodOrder[90]  = 'editResult';
$lang->workflow->methodOrder[95]  = 'deleteResult';
$lang->workflow->methodOrder[97]  = 'verification';
$lang->workflow->methodOrder[98]  = 'setNotice';
$lang->workflow->methodOrder[100] = 'adminDatasource';
$lang->workflow->methodOrder[105] = 'createDatasource';
$lang->workflow->methodOrder[110] = 'editDatasource';
$lang->workflow->methodOrder[115] = 'deleteDatasource';
$lang->workflow->methodOrder[120] = 'adminRule';
$lang->workflow->methodOrder[125] = 'createRule';
$lang->workflow->methodOrder[130] = 'editRule';
$lang->workflow->methodOrder[135] = 'viewRule';
$lang->workflow->methodOrder[140] = 'deleteRule';
$lang->workflow->methodOrder[145] = 'adminModuleMenu';
$lang->workflow->methodOrder[150] = 'createModuleMenu';
$lang->workflow->methodOrder[155] = 'editModuleMenu';
$lang->workflow->methodOrder[160] = 'deleteModuleMenu';

/* User */
$lang->resource->adminUser->importLDAP = 'importLDAP';

$lang->adminUser->methodOrder[] = 'importLDAP';

/* Product */
$lang->resource->product->batchCreate           = 'batchCreate';
$lang->resource->product->browseProperties      = 'browseProperties';
$lang->resource->product->batchCreateProperties = 'batchCreateProperties';
$lang->resource->product->editProperty          = 'editProperty';
$lang->resource->product->deleteProperty        = 'deleteProperty';
$lang->resource->product->createFromOrder       = 'createFromOrder';

/* Do not set key to make the option display first. */
$lang->product->methodOrder[11] = 'batchCreate';
$lang->product->methodOrder[]   = 'browseProperties';
$lang->product->methodOrder[]   = 'batchCreateProperties';
$lang->product->methodOrder[]   = 'editProperty';
$lang->product->methodOrder[]   = 'deleteProperty';
$lang->product->methodOrder[]   = 'createFromOrder';

/* Store */
$lang->resource->store = new stdclass();
$lang->resource->store->browse = 'browse';
$lang->resource->store->create = 'create';
$lang->resource->store->edit   = 'edit';
$lang->resource->store->delete = 'delete';

$lang->store->methodOrder[] = 'browse';
$lang->store->methodOrder[] = 'create';
$lang->store->methodOrder[] = 'edit';
$lang->store->methodOrder[] = 'delete';

/* My */
$lang->resource->my->deptSalary = 'deptSalary';

$lang->my->methodOrder[10] = 'deptSalary';

/* Company. */
$lang->resource->company = new stdclass();
$lang->resource->company->index    = 'index';
$lang->resource->company->browse   = 'browse';
$lang->resource->company->create   = 'create';
$lang->resource->company->edit     = 'edit';
$lang->resource->company->cancel   = 'cancel';
$lang->resource->company->setMajor = 'setMajor';

$lang->company->methodOrder[5]  = 'index';
$lang->company->methodOrder[10] = 'browse';
$lang->company->methodOrder[15] = 'create';
$lang->company->methodOrder[20] = 'edit';
$lang->company->methodOrder[25] = 'cancel';
$lang->company->methodOrder[30] = 'setMajor';
