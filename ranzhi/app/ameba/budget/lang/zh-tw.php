<?php
if(!isset($lang->budget)) $lang->budget = new stdclass();
$lang->budget->common      = '預算';
$lang->budget->browse      = '瀏覽預算';
$lang->budget->create      = '新建預算';
$lang->budget->batchCreate = '批量新建';
$lang->budget->edit        = '編輯預算';
$lang->budget->view        = '預算詳情';
$lang->budget->delete      = '刪除預算';
$lang->budget->report      = '報表';
$lang->budget->list        = '列表';
$lang->budget->basic       = '基本信息';
$lang->budget->detail      = '詳細信息';

$lang->budget->id           = '編號';
$lang->budget->year         = '年份';
$lang->budget->dept         = '部門';
$lang->budget->amebaAccount = '類型';
$lang->budget->line         = '產品綫';
$lang->budget->category     = '科目';
$lang->budget->money        = '金額';
$lang->budget->desc         = '說明';
$lang->budget->createdBy    = '由誰創建';
$lang->budget->createdDate  = '創建日期';
$lang->budget->editedBy     = '最後編輯';
$lang->budget->editedDate   = '編輯日期';

$lang->budget->item       = '項目';
$lang->budget->income     = '收入';
$lang->budget->expense    = '支出';
$lang->budget->total      = '總計';
$lang->budget->profit     = '利潤';
$lang->budget->profitRate = '利潤率';
$lang->budget->rate       = '變動比';
$lang->budget->lastMoney  = '上年金額';

$lang->budget->amebaAccountList['externalIncome']  = '外部收入';
$lang->budget->amebaAccountList['internalIncome']  = '內部收入';
$lang->budget->amebaAccountList['internalDeal']    = '巴巴交易';
$lang->budget->amebaAccountList['internalExpense'] = '巴內支出';
$lang->budget->amebaAccountList['shareExpense']    = '公共分攤';
$lang->budget->amebaAccountList['total']           = '總計';

$lang->budget->totalMoney = '預算金額總計 %s ；';

$lang->budget->tips = new stdclass();
$lang->budget->tips->empty = '必填項為空的記錄不會被保存。';

$lang->budget->error = new stdclass();
$lang->budget->error->exist = '已經有相同年份和科目的預算存在。';

$lang->ameba_budget = $lang->budget;
