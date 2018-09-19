<?php
if(!isset($lang->commission)) $lang->commission = new stdclass();
$lang->commission->common            = 'Commission';
$lang->commission->browse            = 'Browse';
$lang->commission->create            = 'Create';
$lang->commission->batchCreate       = 'Batch Create';
$lang->commission->report            = 'Report';
$lang->commission->setting           = 'Settings';
$lang->commission->setCategory       = 'Ignored Categories';
$lang->commission->batchSetting      = 'Batch Setting';
$lang->commission->setSaleCommission = 'Sale Commission';
$lang->commission->setLineCommission = 'Line Commission';
$lang->commission->single            = 'Single';
$lang->commission->together          = 'Together';
$lang->commission->export            = 'Export';
$lang->commission->switchIgnore      = 'Ignore/Restore';
$lang->commission->batchSwitchIgnore = 'Batch Ignore/Batch Restore';
$lang->commission->restore           = 'Restore';
$lang->commission->reset             = 'Reset';

$lang->commission->id           = 'ID';
$lang->commission->trader       = 'Customer';
$lang->commission->product      = 'Product';
$lang->commission->detail       = 'Detail';
$lang->commission->account      = 'Name';
$lang->commission->line         = 'Product Line';
$lang->commission->handlers     = 'Users';
$lang->commission->contribution = 'Contribution';
$lang->commission->rate         = 'Rate';
$lang->commission->money        = 'Sales';
$lang->commission->amount       = 'Commission';
$lang->commission->search       = 'Search';
$lang->commission->commission   = 'Set Commission';
$lang->commission->commissioned = 'Commission Details';
$lang->commission->base         = 'Commission Amount';
$lang->commission->type         = 'Type';
$lang->commission->rule         = 'Rule';
$lang->commission->rowTotal     = 'Row Total';
$lang->commission->total        = 'Total';

$lang->commission->default = 'Default';
$lang->commission->matrix  = 'Matrix Diagram';

$lang->commission->matrixShowType['amount'] = 'Show amount';
$lang->commission->matrixShowType['rate']   = 'Show rate';

$lang->commission->dept  = 'Dept';
$lang->commission->user  = 'User';
$lang->commission->month = 'Month';

$lang->commission->modeList['both'] = 'Users';
$lang->commission->modeList['sale'] = 'Sales';
$lang->commission->modeList['line'] = 'Product Line';

$lang->commission->typeList['sale'] = 'Sale';
$lang->commission->typeList['line'] = 'Line';

$lang->commission->saleCommission = new stdclass();
$lang->commission->saleCommission->common   = 'Sale Commission';
$lang->commission->saleCommission->rule     = 'Rule';
$lang->commission->saleCommission->interval = 'Interval';
$lang->commission->saleCommission->more     = 'More';

$lang->commission->saleCommission->ruleList['multistep'] = 'Multistep';
$lang->commission->saleCommission->ruleList['fixed']     = 'Fixed';

$lang->commission->saleCommission->start[1] = 0;
$lang->commission->saleCommission->start[2] = 10000;
$lang->commission->saleCommission->start[3] = 20000;
$lang->commission->saleCommission->start[4] = 40000;

$lang->commission->saleCommission->end[1] = 10000;
$lang->commission->saleCommission->end[2] = 20000;
$lang->commission->saleCommission->end[3] = 40000;
$lang->commission->saleCommission->end[4] = '';

$lang->commission->saleCommission->rate[1] = 10;
$lang->commission->saleCommission->rate[2] = 8;
$lang->commission->saleCommission->rate[3] = 6;
$lang->commission->saleCommission->rate[4] = 5;

$lang->commission->lineCommission = new stdclass();
$lang->commission->lineCommission->common      = 'Line Commission';
$lang->commission->lineCommission->lineList    = 'Product Lines';
$lang->commission->lineCommission->remainRates = 'Remain Rates';

$lang->commission->moreUser          = 'More';
$lang->commission->emptyDept         = 'No Dept';
$lang->commission->amountTips        = 'If the amount and rate both exists, the amount work.';
$lang->commission->contributionTips  = 'Fixed：<br/>Commission=SUM(Commission Amount * Rate)；<br/>Multistep：<br/>Income=SUM(Commission Amount * Contribution)';
$lang->commission->totalTips         = 'Sum of all trades in this page.';
$lang->commission->errorContribution = 'Sum of contribution can not greater than 100%. ';
$lang->commission->errorRate         = 'Sum of rate can not greater than 100%. ';
$lang->commission->errorAmount       = "Commission can't be greater then %s. ";
$lang->commission->notEqual          = '%s The rate and amount are not equal.';
$lang->commission->categoryTips      = 'The selected categories will be ignored when compute commission.';
$lang->commission->confirmReset      = 'Reset will delete saved commission data, are you sure to continue?';
$lang->commission->salaryExist       = 'Salary of this month existed. Reset will make difference between salary and commission data, are you sure to continue?';

$lang->commission->excel = new stdclass();
$lang->commission->excel->title = new stdclass();
$lang->commission->excel->title->saleDetail = 'Details of Sale';
$lang->commission->excel->title->lineDetail = 'Details of Product Line';
$lang->commission->excel->title->summary    = 'Summary'; 
$lang->commission->excel->title->matrix     = 'Matrix Diagram'; 
