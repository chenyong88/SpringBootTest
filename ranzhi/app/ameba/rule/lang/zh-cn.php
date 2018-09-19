<?php
if(!isset($lang->rule)) $lang->rule = new stdclass();
$lang->rule->common      = '分配收入';
$lang->rule->browse      = '浏览分配规则';
$lang->rule->create      = '添加分配规则';
$lang->rule->edit        = '编辑分配规则';
$lang->rule->view        = '分配规则详情';
$lang->rule->delete      = '删除分配规则';
$lang->rule->share       = '明细';
$lang->rule->sharedRules = '分配明细';
$lang->rule->basic       = '基本信息';
$lang->rule->detail      = '详细信息';
$lang->rule->fee         = '分摊费用';

$lang->rule->id           = '编号';
$lang->rule->year         = '年份';
$lang->rule->month        = '月份';
$lang->rule->product      = '产品';
$lang->rule->category     = '收入科目';
$lang->rule->from         = '甲方部门';
$lang->rule->fromCategory = '甲方支出科目';
$lang->rule->to           = '乙方部门';
$lang->rule->toCategory   = '乙方收入科目';
$lang->rule->rate         = '分配比例';
$lang->rule->desc         = '规则说明';
$lang->rule->createdBy    = '由谁创建';
$lang->rule->createdDate  = '创建日期';
$lang->rule->editedBy     = '最后编辑';
$lang->rule->editedDate   = '编辑日期';
$lang->rule->total        = '合计';

$lang->rule->monthList['']   = '';
$lang->rule->monthList['01'] = '一月';
$lang->rule->monthList['02'] = '二月';
$lang->rule->monthList['03'] = '三月';
$lang->rule->monthList['04'] = '四月';
$lang->rule->monthList['05'] = '五月';
$lang->rule->monthList['06'] = '六月';
$lang->rule->monthList['07'] = '七月';
$lang->rule->monthList['08'] = '八月';
$lang->rule->monthList['09'] = '九月';
$lang->rule->monthList['10'] = '十月';
$lang->rule->monthList['11'] = '十一月';
$lang->rule->monthList['12'] = '十二月';

$lang->rule->shareTips = '乙方部门重复按最后一条计算，任意项为空不计算。';

$lang->rule->error = new stdclass();
$lang->rule->error->shareLimited = '没有权限分摊费用。';
$lang->rule->error->exist        = '已经有相同年份、产品、甲方部门和收入科目的规则存在。';
$lang->rule->error->bothEmpty    = '<strong>产品</strong> 和 <strong>收入科目</strong> 不能同时为空。';
$lang->rule->error->totalRate    = '分配比例之和应该小于100%。';

$lang->ameba_rule = $lang->rule;
