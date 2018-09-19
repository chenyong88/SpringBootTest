<?php
$lang->trade->alipayTradeNo = '支付宝交易号';

$lang->trade->syncAlipay        = '同步交易记录';
$lang->trade->syncAlipaySuccess = '交易记录同步成功';

$lang->trade->groupbytag   = '按账号标签分组';
$lang->trade->item         = '项目';
$lang->trade->summary      = '汇总';
$lang->trade->exportDetail = '导出明细';

$lang->trade->detailList['in']       = '收入';
$lang->trade->detailList['out']      = '支出';
$lang->trade->detailList['transfer'] = '转账';
$lang->trade->detailList['invest']   = '投资';
$lang->trade->detailList['loan']     = '借贷';

$lang->trade->modeList['all']             = '账目明细表';
$lang->trade->modeList['depositor']       = '账号盈亏表';
$lang->trade->modeList['productLine']     = '产品线收入';
$lang->trade->modeList['category']        = '科目收入汇总';
$lang->trade->modeList['productCategory'] = '产品科目透视';

$lang->trade->excel->title->all             = '帐目明细表';
$lang->trade->excel->title->in              = '收入明细表';
$lang->trade->excel->title->out             = '支出明细表';
$lang->trade->excel->title->transfer        = '转账明细表';
$lang->trade->excel->title->invest          = '投资明细表';
$lang->trade->excel->title->loan            = '借贷明细表';
$lang->trade->excel->title->productLine     = '产品线收入';
$lang->trade->excel->title->category        = '科目收入汇总';
$lang->trade->excel->title->productCategory = '产品科目透视';

$lang->trade->excel->help->depositortag    = '本报表不区分币种，并且按照账号的标签分组显示。';
$lang->trade->excel->help->productLine     = '本报表不区分币种，仅统计交易类型为收入的帐目。';
$lang->trade->excel->help->category        = '本报表不区分币种，仅统计交易类型为收入的帐目。';
$lang->trade->excel->help->productCategory = '本报表不区分币种，仅统计交易类型为收入的帐目。';

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
$lang->compare->typeList['profit']  = '盈亏';
$lang->compare->report = new stdclass();
foreach($lang->compare->typeList as $key => $type)
{
    $lang->compare->report->charts[$key]  = $type . '年度对比表';
}
