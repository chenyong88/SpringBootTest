<?php
if(!isset($lang->commission)) $lang->commission = new stdclass();
$lang->commission->common            = '提成';
$lang->commission->browse            = '瀏覽提成';
$lang->commission->create            = '添加提成';
$lang->commission->batchCreate       = '批量添加提成';
$lang->commission->report            = '提成統計';
$lang->commission->setting           = '提成規則';
$lang->commission->setCategory       = '忽略科目';
$lang->commission->batchSetting      = '批量設置';
$lang->commission->setSaleCommission = '設置訂單提成';
$lang->commission->setLineCommission = '設置產品綫提成';
$lang->commission->single            = '單筆設置';
$lang->commission->together          = '共同設置';
$lang->commission->export            = '導出';
$lang->commission->switchIgnore      = '忽略/恢復';
$lang->commission->batchSwitchIgnore = '批量忽略/批量恢復';
$lang->commission->restore           = '恢復';
$lang->commission->reset             = '重置';

$lang->commission->id           = '編號';
$lang->commission->trader       = '商戶';
$lang->commission->product      = '產品';
$lang->commission->detail       = '詳情';
$lang->commission->account      = '姓名';
$lang->commission->line         = '產品綫';
$lang->commission->handlers     = '參與者';
$lang->commission->contribution = '貢獻度';
$lang->commission->rate         = '比例';
$lang->commission->money        = '銷售額';
$lang->commission->amount       = '提成金額';
$lang->commission->search       = '搜索';
$lang->commission->commission   = '設置提成';
$lang->commission->commissioned = '提成明細';
$lang->commission->base         = '可提成額度';
$lang->commission->type         = '類型';
$lang->commission->rule         = '提成規則';
$lang->commission->rowTotal     = '小計';
$lang->commission->total        = '合計';

$lang->commission->default = '預設視圖';
$lang->commission->matrix  = '矩陣圖';

$lang->commission->matrixShowType['amount'] = '顯示提成金額';
$lang->commission->matrixShowType['rate']   = '顯示提成比例';

$lang->commission->dept  = '部門';
$lang->commission->user  = '用戶';
$lang->commission->month = '月份';

$lang->commission->modeList['both'] = '用戶';
$lang->commission->modeList['sale'] = '訂單';
$lang->commission->modeList['line'] = '產品綫';

$lang->commission->typeList['sale'] = '訂單提成';
$lang->commission->typeList['line'] = '產品綫提成';

$lang->commission->saleCommission = new stdclass();
$lang->commission->saleCommission->common   = '訂單提成';
$lang->commission->saleCommission->rule     = '計算規則';
$lang->commission->saleCommission->interval = '區間';
$lang->commission->saleCommission->more     = '以上';

$lang->commission->saleCommission->ruleList['multistep'] = '階梯提成';
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
$lang->commission->lineCommission->common      = '產品綫提成';
$lang->commission->lineCommission->lineList    = '產品綫';
$lang->commission->lineCommission->remainRates = '剩餘提成比例';

$lang->commission->moreUser          = '多人';
$lang->commission->emptyDept         = '無部門';
$lang->commission->amountTips        = '提成金額和提成比例同時存在時按提成金額計算。';
$lang->commission->contributionTips  = '固定提成：<br/>提成金額=SUM(可提成額度*比例)<br/>階梯提成：<br/>銷售業績=SUM(可提成額度*貢獻度)';
$lang->commission->totalTips         = '本頁面所有收入的提成總額。';
$lang->commission->errorContribution = '貢獻度總和不能大於 100%。';
$lang->commission->errorRate         = '提成比例總和不能大於 100%。';
$lang->commission->errorAmount       = '提成金額總和不能大於 %s。';
$lang->commission->notEqual          = '%s 提成的比例與金額不匹配';
$lang->commission->categoryTips      = '選中的科目在計算提成時將被忽略';
$lang->commission->confirmReset      = '重置會刪除已保存的提成數據，確定要重置嗎？';
$lang->commission->salaryExist       = '已經生成當月工資，重置可能會導致工資數據和提成數據不一致，確定要重置嗎？';

$lang->commission->excel = new stdclass();
$lang->commission->excel->title = new stdclass();
$lang->commission->excel->title->saleDetail = '訂單提成明細';
$lang->commission->excel->title->lineDetail = '產品綫提成明細';
$lang->commission->excel->title->summary    = '提成彙總'; 
$lang->commission->excel->title->matrix     = '矩陣圖'; 
