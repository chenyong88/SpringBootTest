<?php
$lang->trade->alipayTradeNo = 'Alipay Trade Number';

$lang->trade->groupbytag   = 'Group by Tag';
$lang->trade->item         = 'Item';
$lang->trade->summary      = 'Summary';
$lang->trade->exportDetail = 'Export Detail';

$lang->trade->detailList['in']       = 'In';
$lang->trade->detailList['out']      = 'Out';
$lang->trade->detailList['transfer'] = 'Transfer';
$lang->trade->detailList['invest']   = 'Invest';
$lang->trade->detailList['loan']     = 'Loan';

$lang->trade->modeList['all']             = 'All';
$lang->trade->modeList['depositor']       = 'Depositor Profit and Loss';
$lang->trade->modeList['productLine']     = 'Income of Product Line';
$lang->trade->modeList['category']        = 'Income Summary';
$lang->trade->modeList['productCategory'] = 'Income of Product Line and Category';

$lang->trade->excel->title->all             = 'Bills';
$lang->trade->excel->title->in              = 'Income';
$lang->trade->excel->title->out             = 'Expense';
$lang->trade->excel->title->transfer        = 'Transfer';
$lang->trade->excel->title->invest          = 'Inveset';
$lang->trade->excel->title->loan            = 'Loan';
$lang->trade->excel->title->productLine     = 'Product Line';
$lang->trade->excel->title->category        = 'Income Summary';
$lang->trade->excel->title->productCategory = 'Income of Product Line and Category';

$lang->trade->excel->help->depositortag    = "This report don't differentiate currencies, and the results will be grouped by tags of depositors.";
$lang->trade->excel->help->productLine     = "This report don't differentiate currencies, and just contains the trades whose type is 'in'.";
$lang->trade->excel->help->category        = "This report don't differentiate currencies, and just contains the trades whose type is 'in'.";
$lang->trade->excel->help->productCategory = "This report don't differentiate currencies, and just contains the trades whose type is 'in'.";

$lang->annual = new stdclass();
$lang->annual->report = new stdclass();
$lang->annual->report->charts['annual'] = $lang->trade->report->annual;
foreach($lang->trade->chartList as $k => $mode)
{
    foreach(array('in' => $lang->trade->in, 'out' => $lang->trade->out) as $j => $type)
    {
        $lang->annual->report->charts["$j-$k"] = $type . $mode;
    }
}

$lang->compare = new stdclass();
$lang->compare->typeList['income']  = 'Income';
$lang->compare->typeList['expense'] = 'Expense';
$lang->compare->typeList['profit']  = 'Profit';
$lang->compare->report = new stdclass();
foreach($lang->compare->typeList as $key => $type)
{
    $lang->compare->report->charts[$key]  = $type . ' Annual Compare';
}
