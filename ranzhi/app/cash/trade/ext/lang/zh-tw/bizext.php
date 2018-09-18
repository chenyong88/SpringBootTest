<?php
$lang->trade->alipayTradeNo = '支付寶交易號';

$lang->trade->syncAlipay        = '同步交易記錄';
$lang->trade->syncAlipaySuccess = '交易記錄同步成功';

$lang->trade->groupbytag   = '按賬號標籤分組';
$lang->trade->item         = '項目';
$lang->trade->summary      = '彙總';
$lang->trade->exportDetail = '導出明細';

$lang->trade->detailList['in']       = '收入';
$lang->trade->detailList['out']      = '支出';
$lang->trade->detailList['transfer'] = '轉賬';
$lang->trade->detailList['invest']   = '投資';
$lang->trade->detailList['loan']     = '借貸';

$lang->trade->modeList['all']             = '賬目明細表';
$lang->trade->modeList['depositor']       = '賬號盈虧表';
$lang->trade->modeList['productLine']     = '產品綫收入';
$lang->trade->modeList['category']        = '科目收入彙總';
$lang->trade->modeList['productCategory'] = '產品科目透視';

$lang->trade->excel->title->all             = '帳目明細表';
$lang->trade->excel->title->in              = '收入明細表';
$lang->trade->excel->title->out             = '支出明細表';
$lang->trade->excel->title->transfer        = '轉賬明細表';
$lang->trade->excel->title->invest          = '投資明細表';
$lang->trade->excel->title->loan            = '借貸明細表';
$lang->trade->excel->title->productLine     = '產品綫收入';
$lang->trade->excel->title->category        = '科目收入彙總';
$lang->trade->excel->title->productCategory = '產品科目透視';

$lang->trade->excel->help->depositortag    = '本報表不區分幣種，並且按照賬號的標籤分組顯示。';
$lang->trade->excel->help->productLine     = '本報表不區分幣種，僅統計交易類型為收入的帳目。';
$lang->trade->excel->help->category        = '本報表不區分幣種，僅統計交易類型為收入的帳目。';
$lang->trade->excel->help->productCategory = '本報表不區分幣種，僅統計交易類型為收入的帳目。';

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
$lang->compare->typeList['income']  = '收入';
$lang->compare->typeList['expense'] = '支出';
$lang->compare->typeList['profit']  = '盈虧';
$lang->compare->report = new stdclass();
foreach($lang->compare->typeList as $key => $type)
{
    $lang->compare->report->charts[$key]  = $type . '年度對比表';
}
