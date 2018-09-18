<?php
if(!isset($lang->rule)) $lang->rule = new stdclass();
$lang->rule->common      = '分配收入';
$lang->rule->browse      = '瀏覽分配規則';
$lang->rule->create      = '添加分配規則';
$lang->rule->edit        = '編輯分配規則';
$lang->rule->view        = '分配規則詳情';
$lang->rule->delete      = '刪除分配規則';
$lang->rule->share       = '明細';
$lang->rule->sharedRules = '分配明細';
$lang->rule->basic       = '基本信息';
$lang->rule->detail      = '詳細信息';
$lang->rule->fee         = '分攤費用';

$lang->rule->id           = '編號';
$lang->rule->year         = '年份';
$lang->rule->month        = '月份';
$lang->rule->product      = '產品';
$lang->rule->category     = '收入科目';
$lang->rule->from         = '甲方部門';
$lang->rule->fromCategory = '甲方支出科目';
$lang->rule->to           = '乙方部門';
$lang->rule->toCategory   = '乙方收入科目';
$lang->rule->rate         = '分配比例';
$lang->rule->desc         = '規則說明';
$lang->rule->createdBy    = '由誰創建';
$lang->rule->createdDate  = '創建日期';
$lang->rule->editedBy     = '最後編輯';
$lang->rule->editedDate   = '編輯日期';
$lang->rule->total        = '合計';

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

$lang->rule->shareTips = '乙方部門重複按最後一條計算，任意項為空不計算。';

$lang->rule->error = new stdclass();
$lang->rule->error->shareLimited = '沒有權限分攤費用。';
$lang->rule->error->exist        = '已經有相同年份、產品、甲方部門和收入科目的規則存在。';
$lang->rule->error->bothEmpty    = '<strong>產品</strong> 和 <strong>收入科目</strong> 不能同時為空。';
$lang->rule->error->totalRate    = '分配比例之和應該小於100%。';

$lang->ameba_rule = $lang->rule;
