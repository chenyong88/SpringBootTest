<?php
if(!isset($lang->budget)) $lang->budget = new stdclass();
$lang->budget->common      = 'Budget';
$lang->budget->browse      = 'Browse';
$lang->budget->create      = 'Create';
$lang->budget->batchCreate = 'Batch Create';
$lang->budget->edit        = 'Edit';
$lang->budget->view        = 'View Detail';
$lang->budget->delete      = 'Delete';
$lang->budget->report      = 'Report';
$lang->budget->list        = 'List';
$lang->budget->basic       = 'Baisc Info';
$lang->budget->detail      = 'Detail';

$lang->budget->id           = 'ID';
$lang->budget->year         = 'Year';
$lang->budget->dept         = 'Dept';
$lang->budget->amebaAccount = 'Ameba Category';
$lang->budget->line         = 'Product Line';
$lang->budget->category     = 'Category';
$lang->budget->money        = 'Money';
$lang->budget->desc         = 'Desc';
$lang->budget->createdBy    = 'Created By';
$lang->budget->createdDate  = 'Created Date';
$lang->budget->editedBy     = 'Edited By';
$lang->budget->editedDate   = 'Edited Date';

$lang->budget->item       = 'Item';
$lang->budget->income     = 'Income';
$lang->budget->expense    = 'Expense';
$lang->budget->total      = 'Total';
$lang->budget->profit     = 'Profit';
$lang->budget->profitRate = 'Profit Rate';
$lang->budget->rate       = 'Changing Rate';
$lang->budget->lastMoney  = 'Money of Last Year';

$lang->budget->amebaAccountList['externalIncome']  = 'External Incomes';
$lang->budget->amebaAccountList['internalIncome']  = 'Internal Incomes';
$lang->budget->amebaAccountList['internalDeal']    = 'Internal Trades';
$lang->budget->amebaAccountList['internalExpense'] = 'Internal Expenses';
$lang->budget->amebaAccountList['shareExpense']    = 'Share Expenses';
$lang->budget->amebaAccountList['total']           = 'Total';

$lang->budget->totalMoney = 'The total is %s :';

$lang->budget->tips = new stdclass();
$lang->budget->tips->empty = 'The record that the required column is empty will not be saved.';

$lang->budget->error = new stdclass();
$lang->budget->error->exist = 'A record with same year and same category exists.';

$lang->ameba_budget = $lang->budget;
