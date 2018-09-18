<?php
if(!isset($lang->budget)) $lang->budget = new stdclass();
$lang->budget->common      = '预算';
$lang->budget->browse      = '浏览预算';
$lang->budget->create      = '新建预算';
$lang->budget->batchCreate = '批量新建';
$lang->budget->edit        = '编辑预算';
$lang->budget->view        = '预算详情';
$lang->budget->delete      = '删除预算';
$lang->budget->report      = '报表';
$lang->budget->list        = '列表';
$lang->budget->basic       = '基本信息';
$lang->budget->detail      = '详细信息';

$lang->budget->id           = '编号';
$lang->budget->year         = '年份';
$lang->budget->dept         = '部门';
$lang->budget->amebaAccount = '类型';
$lang->budget->line         = '产品线';
$lang->budget->category     = '科目';
$lang->budget->money        = '金额';
$lang->budget->desc         = '说明';
$lang->budget->createdBy    = '由谁创建';
$lang->budget->createdDate  = '创建日期';
$lang->budget->editedBy     = '最后编辑';
$lang->budget->editedDate   = '编辑日期';

$lang->budget->item       = '项目';
$lang->budget->income     = '收入';
$lang->budget->expense    = '支出';
$lang->budget->total      = '总计';
$lang->budget->profit     = '利润';
$lang->budget->profitRate = '利润率';
$lang->budget->rate       = '变动比';
$lang->budget->lastMoney  = '上年金额';

$lang->budget->amebaAccountList['externalIncome']  = '外部收入';
$lang->budget->amebaAccountList['internalIncome']  = '内部收入';
$lang->budget->amebaAccountList['internalDeal']    = '巴巴交易';
$lang->budget->amebaAccountList['internalExpense'] = '巴内支出';
$lang->budget->amebaAccountList['shareExpense']    = '公共分摊';
$lang->budget->amebaAccountList['total']           = '总计';

$lang->budget->totalMoney = '预算金额总计 %s ；';

$lang->budget->tips = new stdclass();
$lang->budget->tips->empty = '必填项为空的记录不会被保存。';

$lang->budget->error = new stdclass();
$lang->budget->error->exist = '已经有相同年份和科目的预算存在。';

$lang->ameba_budget = $lang->budget;
