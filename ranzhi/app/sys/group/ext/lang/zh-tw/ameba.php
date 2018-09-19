<?php
$lang->resource->trade->share = 'share';

$lang->trade->methodOrder[100] = 'share';

$lang->resource->tree->merge = 'deleteAmebaCategory';

$lang->tree->methodOrder[100] = 'deleteAmebaCategory';

/* ameba */
$lang->appModule->ameba = array();
//$lang->appModule->ameba[] = 'ameba';
$lang->appModule->ameba[] = 'amebareport';
$lang->appModule->ameba[] = 'budget';
$lang->appModule->ameba[] = 'deal';
$lang->appModule->ameba[] = 'fee';
$lang->appModule->ameba[] = 'rule';

$lang->moduleOrder[101] = 'ameba';
$lang->moduleOrder[102] = 'amebareport';
$lang->moduleOrder[103] = 'budget';
$lang->moduleOrder[104] = 'deal';
$lang->moduleOrder[105] = 'fee';
$lang->moduleOrder[106] = 'rule';

/* ameba */
$lang->resource->ameba = new stdclass();
$lang->resource->ameba->index = 'company';

$lang->ameba->methodOrder[5] = 'index';

/* amebareport */
$lang->resource->amebareport = new stdclass();
$lang->resource->amebareport->dailyReport     = 'dailyReport';
$lang->resource->amebareport->weeklyReport    = 'weeklyReport';
$lang->resource->amebareport->monthlyReport   = 'monthlyReport';
$lang->resource->amebareport->updateStatement = 'updateStatement';
$lang->resource->amebareport->showDetail      = 'showDetail';
$lang->resource->amebareport->archive         = 'archive';

$lang->amebareport->methodOrder[5]  = 'dailyReport';
$lang->amebareport->methodOrder[10] = 'weeklyReport';
$lang->amebareport->methodOrder[15] = 'monthlyReport';
$lang->amebareport->methodOrder[20] = 'updateStatement';
$lang->amebareport->methodOrder[25] = 'showDetail';
$lang->amebareport->methodOrder[30] = 'archive';

/* budget */
$lang->resource->budget = new stdclass();
$lang->resource->budget->browse      = 'browse';
$lang->resource->budget->create      = 'create';
$lang->resource->budget->batchCreate = 'batchCreate';
$lang->resource->budget->edit        = 'edit';
$lang->resource->budget->view        = 'view';
$lang->resource->budget->delete      = 'delete';
$lang->resource->budget->report      = 'report';

$lang->budget->methodOrder[5]  = 'browse';
$lang->budget->methodOrder[10] = 'create';
$lang->budget->methodOrder[15] = 'batchCreate';
$lang->budget->methodOrder[20] = 'edit';
$lang->budget->methodOrder[25] = 'view';
$lang->budget->methodOrder[30] = 'delete';
$lang->budget->methodOrder[35] = 'report';

/* deal */
$lang->resource->deal = new stdclass();
$lang->resource->deal->browse                 = 'browse';
$lang->resource->deal->browseWait             = 'browseWait';
$lang->resource->deal->browseIncome           = 'browseIncome';
$lang->resource->deal->browseExpense          = 'browseExpense';
$lang->resource->deal->create                 = 'create';
$lang->resource->deal->batchCreate            = 'batchCreate';
$lang->resource->deal->edit                   = 'edit';
$lang->resource->deal->view                   = 'view';
$lang->resource->deal->delete                 = 'delete';
$lang->resource->deal->confirm                = 'confirm';
$lang->resource->deal->switchTradeStatus      = 'switchTradeStatus';
$lang->resource->deal->batchSwitchTradeStatus = 'batchSwitchTradeStatus';
$lang->resource->deal->batchShare             = 'batchShare';

$lang->deal->methodOrder[5]  = 'browse';
$lang->deal->methodOrder[10] = 'browseWait';
$lang->deal->methodOrder[15] = 'browseIncome';
$lang->deal->methodOrder[20] = 'browseExpense';
$lang->deal->methodOrder[25] = 'create';
$lang->deal->methodOrder[30] = 'batchCreate';
$lang->deal->methodOrder[35] = 'edit';
$lang->deal->methodOrder[40] = 'view';
$lang->deal->methodOrder[45] = 'delete';
$lang->deal->methodOrder[50] = 'confirm';
$lang->deal->methodOrder[55] = 'switchTradeStatus';
$lang->deal->methodOrder[60] = 'batchSwitchTradeStatus';
$lang->deal->methodOrder[65] = 'batchShare';

/* fee */
$lang->resource->fee = new stdclass();
$lang->resource->fee->browse = 'browse';
$lang->resource->fee->create = 'create';
$lang->resource->fee->edit   = 'edit';
$lang->resource->fee->view   = 'view';
$lang->resource->fee->delete = 'delete';

$lang->fee->methodOrder[5]  = 'browse';
$lang->fee->methodOrder[15] = 'create';
$lang->fee->methodOrder[20] = 'edit';
$lang->fee->methodOrder[25] = 'view';
$lang->fee->methodOrder[30] = 'delete';

/* rule */
$lang->resource->rule = new stdclass();
$lang->resource->rule->browse = 'browse';
$lang->resource->rule->create = 'create';
$lang->resource->rule->edit   = 'edit';
$lang->resource->rule->view   = 'view';
$lang->resource->rule->delete = 'delete';

$lang->rule->methodOrder[5]  = 'browse';
$lang->rule->methodOrder[10] = 'create';
$lang->rule->methodOrder[15] = 'edit';
$lang->rule->methodOrder[20] = 'view';
$lang->rule->methodOrder[25] = 'delete';
