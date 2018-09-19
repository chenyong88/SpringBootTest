<?php
if(!isset($lang->deal)) $lang->deal = new stdclass();
$lang->deal->common                 = '內部交易';
$lang->deal->browse                 = '已確認交易';
$lang->deal->browseWait             = '待確認交易';
$lang->deal->browseIncome           = '瀏覽收入';
$lang->deal->browseExpense          = '瀏覽支出';
$lang->deal->batchShare             = '批量分配';
$lang->deal->list                   = '交易列表';
$lang->deal->create                 = '添加交易';
$lang->deal->batchCreate            = '批量添加';
$lang->deal->edit                   = '編輯交易';
$lang->deal->view                   = '交易詳情';
$lang->deal->delete                 = '刪除交易';
$lang->deal->confirm                = '確認交易';
$lang->deal->basic                  = '基本信息';
$lang->deal->detail                 = '詳細信息';
$lang->deal->switchTradeStatus      = '忽略/恢復';
$lang->deal->batchSwitchTradeStatus = '批量忽略/恢復';

$lang->deal->id               = '編號';
$lang->deal->from             = '交易發起方';
$lang->deal->date             = '日期';
$lang->deal->amebaAccount     = '交易類型';
$lang->deal->fromAmebaAccount = '發起方交易類型';
$lang->deal->dept             = '部門';
$lang->deal->fromDept         = '發起部門';
$lang->deal->toDept           = '交易對象';
$lang->deal->category         = '交易科目';
$lang->deal->fromCategory     = '發起方交易科目';
$lang->deal->product          = '交易產品';
$lang->deal->type             = '交易來源';
$lang->deal->trade            = '收支記錄';
$lang->deal->contract         = '合同';
$lang->deal->money            = '金額';
$lang->deal->desc             = '描述';
$lang->deal->status           = '狀態';
$lang->deal->createdBy        = '由誰創建';
$lang->deal->createdDate      = '創建日期';
$lang->deal->editedBy         = '最後編輯';
$lang->deal->editedDate       = '編輯日期';
$lang->deal->confirmedBy      = '由誰確認';
$lang->deal->confirmedDate    = '確認日期';

$lang->deal->batchShareSuccess['in']  = '批量分配成功';
$lang->deal->batchShareSuccess['out'] = '批量分攤成功';

$lang->deal->incomeList['wait']    = '待分配收入';
$lang->deal->incomeList['shared']  = '已分配收入';
$lang->deal->incomeList['ignored'] = '已忽略收入';

$lang->deal->expenseList['wait']    = '待分攤支出';
$lang->deal->expenseList['shared']  = '已分攤支出';
$lang->deal->expenseList['ignored'] = '已忽略支出';

$lang->deal->amebaAccountList['internalIncome']  = '內部收入';
$lang->deal->amebaAccountList['internalDeal']    = '巴巴交易';
$lang->deal->amebaAccountList['internalExpense'] = '巴內支出';
$lang->deal->amebaAccountList['shareExpense']    = '公攤費用';

$lang->deal->typeList['contract'] = '合同回款';
$lang->deal->typeList['in']       = '收入分配';
$lang->deal->typeList['out']      = '支出分攤';
$lang->deal->typeList['manual']   = '手工創建';

$lang->deal->tradeType['in']  = '收入';
$lang->deal->tradeType['out'] = '支出';

$lang->deal->statusList['wait']   = '等待確認';
$lang->deal->statusList['normal'] = '正常';

$lang->deal->batchShareList['in']  = '批量分配收入';
$lang->deal->batchShareList['out'] = '批量分攤支出';

$lang->deal->batchShareSuccess['in']  = '批量分配成功';
$lang->deal->batchShareSuccess['out'] = '批量分攤成功';

$lang->deal->totalIncome  = '內部收入總計 %s.';
$lang->deal->totalExpense = '內部支出總計 %s.';

$lang->deal->tips = new stdclass();
$lang->deal->tips->empty = '必填項為空的記錄不會被保存。';

$lang->ameba_deal = $lang->deal;
