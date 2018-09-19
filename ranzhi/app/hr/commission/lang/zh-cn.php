<?php
if(!isset($lang->commission)) $lang->commission = new stdclass();
$lang->commission->common            = '提成';
$lang->commission->browse            = '浏览提成';
$lang->commission->create            = '添加提成';
$lang->commission->batchCreate       = '批量添加提成';
$lang->commission->report            = '提成统计';
$lang->commission->setting           = '提成规则';
$lang->commission->setCategory       = '忽略科目';
$lang->commission->batchSetting      = '批量设置';
$lang->commission->setSaleCommission = '设置订单提成';
$lang->commission->setLineCommission = '设置产品线提成';
$lang->commission->single            = '单笔设置';
$lang->commission->together          = '共同设置';
$lang->commission->export            = '导出';
$lang->commission->switchIgnore      = '忽略/恢复';
$lang->commission->batchSwitchIgnore = '批量忽略/批量恢复';
$lang->commission->restore           = '恢复';
$lang->commission->reset             = '重置';

$lang->commission->id           = '编号';
$lang->commission->trader       = '商户';
$lang->commission->product      = '产品';
$lang->commission->detail       = '详情';
$lang->commission->account      = '姓名';
$lang->commission->line         = '产品线';
$lang->commission->handlers     = '参与者';
$lang->commission->contribution = '贡献度';
$lang->commission->rate         = '比例';
$lang->commission->money        = '销售额';
$lang->commission->amount       = '提成金额';
$lang->commission->search       = '搜索';
$lang->commission->commission   = '设置提成';
$lang->commission->commissioned = '提成明细';
$lang->commission->base         = '可提成额度';
$lang->commission->type         = '类型';
$lang->commission->rule         = '提成规则';
$lang->commission->rowTotal     = '小计';
$lang->commission->total        = '合计';

$lang->commission->default = '默认视图';
$lang->commission->matrix  = '矩阵图';

$lang->commission->matrixShowType['amount'] = '显示提成金额';
$lang->commission->matrixShowType['rate']   = '显示提成比例';

$lang->commission->dept  = '部门';
$lang->commission->user  = '用户';
$lang->commission->month = '月份';

$lang->commission->modeList['both'] = '用户';
$lang->commission->modeList['sale'] = '订单';
$lang->commission->modeList['line'] = '产品线';

$lang->commission->typeList['sale'] = '订单提成';
$lang->commission->typeList['line'] = '产品线提成';

$lang->commission->saleCommission = new stdclass();
$lang->commission->saleCommission->common   = '订单提成';
$lang->commission->saleCommission->rule     = '计算规则';
$lang->commission->saleCommission->interval = '区间';
$lang->commission->saleCommission->more     = '以上';

$lang->commission->saleCommission->ruleList['multistep'] = '阶梯提成';
$lang->commission->saleCommission->ruleList['fixed']     = '固定提成';

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
$lang->commission->lineCommission->common      = '产品线提成';
$lang->commission->lineCommission->lineList    = '产品线';
$lang->commission->lineCommission->remainRates = '剩余提成比例';

$lang->commission->moreUser          = '多人';
$lang->commission->emptyDept         = '无部门';
$lang->commission->amountTips        = '提成金额和提成比例同时存在时按提成金额计算。';
$lang->commission->contributionTips  = '固定提成：<br/>提成金额=SUM(可提成额度*比例)<br/>阶梯提成：<br/>销售业绩=SUM(可提成额度*贡献度)';
$lang->commission->totalTips         = '本页面所有收入的提成总额。';
$lang->commission->errorContribution = '贡献度总和不能大于 100%。';
$lang->commission->errorRate         = '提成比例总和不能大于 100%。';
$lang->commission->errorAmount       = '提成金额总和不能大于 %s。';
$lang->commission->notEqual          = '%s 提成的比例与金额不匹配';
$lang->commission->categoryTips      = '选中的科目在计算提成时将被忽略';
$lang->commission->confirmReset      = '重置会删除已保存的提成数据，确定要重置吗？';
$lang->commission->salaryExist       = '已经生成当月工资，重置可能会导致工资数据和提成数据不一致，确定要重置吗？';

$lang->commission->excel = new stdclass();
$lang->commission->excel->title = new stdclass();
$lang->commission->excel->title->saleDetail = '订单提成明细';
$lang->commission->excel->title->lineDetail = '产品线提成明细';
$lang->commission->excel->title->summary    = '提成汇总'; 
$lang->commission->excel->title->matrix     = '矩阵图'; 
