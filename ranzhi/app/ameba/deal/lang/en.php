<?php
if(!isset($lang->deal)) $lang->deal = new stdclass();
$lang->deal->common                 = 'Trade';
$lang->deal->browse                 = 'Confirmed';
$lang->deal->browseWait             = 'Wait';
$lang->deal->browseIncome           = 'Incomes';
$lang->deal->browseExpense          = 'Expenses';
$lang->deal->batchShare             = 'Batch Share';
$lang->deal->list                   = 'Trade List';
$lang->deal->create                 = 'Create';
$lang->deal->batchCreate            = 'Batch Create';
$lang->deal->edit                   = 'Edit';
$lang->deal->view                   = 'View Detail';
$lang->deal->delete                 = 'Delete';
$lang->deal->confirm                = 'Confirm';
$lang->deal->basic                  = 'Basic Info';
$lang->deal->detail                 = 'Detail';
$lang->deal->switchTradeStatus      = 'Ignore / Restore';
$lang->deal->batchSwitchTradeStatus = 'Batch Ignore / Restore';

$lang->deal->id               = 'ID';
$lang->deal->from             = 'From';
$lang->deal->date             = 'Date';
$lang->deal->amebaAccount     = 'Ameba Category';
$lang->deal->fromAmebaAccount = 'From Ameba Category';
$lang->deal->dept             = 'Dept';
$lang->deal->fromDept         = 'From Dept';
$lang->deal->toDept           = 'To Dept';
$lang->deal->category         = 'Category';
$lang->deal->fromCategory     = 'From Category';
$lang->deal->product          = 'Product';
$lang->deal->type             = 'Type';
$lang->deal->trade            = 'Trade';
$lang->deal->contract         = 'Contract';
$lang->deal->money            = 'Amount';
$lang->deal->desc             = 'Description';
$lang->deal->status           = 'Status';
$lang->deal->createdBy        = 'Created By';
$lang->deal->createdDate      = 'Created On';
$lang->deal->editedBy         = 'Edited By';
$lang->deal->editedDate       = 'Edited On';
$lang->deal->confirmedBy      = 'Confirmed By';
$lang->deal->confirmedDate    = 'Confirmed On';

$lang->deal->batchShareSuccess['in']  = 'Batch share incomes success.';
$lang->deal->batchShareSuccess['out'] = 'Batch share expenses success.';

$lang->deal->incomeList['wait']    = 'Incomes to share';
$lang->deal->incomeList['shared']  = 'Shared Incomes';
$lang->deal->incomeList['ignored'] = 'Ignroed Incomes';

$lang->deal->expenseList['wait']    = 'Expenses to share';
$lang->deal->expenseList['shared']  = 'Shared Expenses';
$lang->deal->expenseList['ignored'] = 'Ignored Expenses';

$lang->deal->amebaAccountList['internalIncome']  = 'Internal Incomes';
$lang->deal->amebaAccountList['internalDeal']    = 'Internal Trades';
$lang->deal->amebaAccountList['internalExpense'] = 'Internal Expenses';
$lang->deal->amebaAccountList['shareExpense']    = 'Share Expenses';

$lang->deal->typeList['contract'] = 'Contract Receive';
$lang->deal->typeList['in']       = 'Share Income';
$lang->deal->typeList['out']      = 'Share Expense';
$lang->deal->typeList['manual']   = 'Manually Created';

$lang->deal->tradeType['in']  = 'Income';
$lang->deal->tradeType['out'] = 'Expense';

$lang->deal->statusList['wait']   = 'Wait';
$lang->deal->statusList['normal'] = 'Normal';

$lang->deal->batchShareList['in']  = 'Batch share incomes';
$lang->deal->batchShareList['out'] = 'Batch share expenses';

$lang->deal->batchShareSuccess['in']  = 'Batch share incomes success.';
$lang->deal->batchShareSuccess['out'] = 'Batch share expenses success.';

$lang->deal->totalIncome  = 'Total incomes %s.';
$lang->deal->totalExpense = 'Total expenses %s.';

$lang->deal->tips = new stdclass();
$lang->deal->tips->empty = 'If the required field is empty, it will not be saved.';

$lang->ameba_deal = $lang->deal;
