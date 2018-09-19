<?php
if(!isset($lang->deal)) $lang->deal = new stdclass();
$lang->deal->common                 = '内部交易';
$lang->deal->browse                 = '已确认交易';
$lang->deal->browseWait             = '待确认交易';
$lang->deal->browseIncome           = '浏览收入';
$lang->deal->browseExpense          = '浏览支出';
$lang->deal->batchShare             = '批量分配';
$lang->deal->list                   = '交易列表';
$lang->deal->create                 = '添加交易';
$lang->deal->batchCreate            = '批量添加';
$lang->deal->edit                   = '编辑交易';
$lang->deal->view                   = '交易详情';
$lang->deal->delete                 = '删除交易';
$lang->deal->confirm                = '确认交易';
$lang->deal->basic                  = '基本信息';
$lang->deal->detail                 = '详细信息';
$lang->deal->switchTradeStatus      = '忽略/恢复';
$lang->deal->batchSwitchTradeStatus = '批量忽略/恢复';

$lang->deal->id               = '编号';
$lang->deal->from             = '交易发起方';
$lang->deal->date             = '日期';
$lang->deal->amebaAccount     = '交易类型';
$lang->deal->fromAmebaAccount = '发起方交易类型';
$lang->deal->dept             = '部门';
$lang->deal->fromDept         = '发起部门';
$lang->deal->toDept           = '交易对象';
$lang->deal->category         = '交易科目';
$lang->deal->fromCategory     = '发起方交易科目';
$lang->deal->product          = '交易产品';
$lang->deal->type             = '交易来源';
$lang->deal->trade            = '收支记录';
$lang->deal->contract         = '合同';
$lang->deal->money            = '金额';
$lang->deal->desc             = '描述';
$lang->deal->status           = '状态';
$lang->deal->createdBy        = '由谁创建';
$lang->deal->createdDate      = '创建日期';
$lang->deal->editedBy         = '最后编辑';
$lang->deal->editedDate       = '编辑日期';
$lang->deal->confirmedBy      = '由谁确认';
$lang->deal->confirmedDate    = '确认日期';

$lang->deal->batchShareSuccess['in']  = '批量分配成功';
$lang->deal->batchShareSuccess['out'] = '批量分摊成功';

$lang->deal->incomeList['wait']    = '待分配收入';
$lang->deal->incomeList['shared']  = '已分配收入';
$lang->deal->incomeList['ignored'] = '已忽略收入';

$lang->deal->expenseList['wait']    = '待分摊支出';
$lang->deal->expenseList['shared']  = '已分摊支出';
$lang->deal->expenseList['ignored'] = '已忽略支出';

$lang->deal->amebaAccountList['internalIncome']  = '内部收入';
$lang->deal->amebaAccountList['internalDeal']    = '巴巴交易';
$lang->deal->amebaAccountList['internalExpense'] = '巴内支出';
$lang->deal->amebaAccountList['shareExpense']    = '公摊费用';

$lang->deal->typeList['contract'] = '合同回款';
$lang->deal->typeList['in']       = '收入分配';
$lang->deal->typeList['out']      = '支出分摊';
$lang->deal->typeList['manual']   = '手工创建';

$lang->deal->tradeType['in']  = '收入';
$lang->deal->tradeType['out'] = '支出';

$lang->deal->statusList['wait']   = '等待确认';
$lang->deal->statusList['normal'] = '正常';

$lang->deal->batchShareList['in']  = '批量分配收入';
$lang->deal->batchShareList['out'] = '批量分摊支出';

$lang->deal->batchShareSuccess['in']  = '批量分配成功';
$lang->deal->batchShareSuccess['out'] = '批量分摊成功';

$lang->deal->totalIncome  = '内部收入总计 %s.';
$lang->deal->totalExpense = '内部支出总计 %s.';

$lang->deal->tips = new stdclass();
$lang->deal->tips->empty = '必填项为空的记录不会被保存。';

$lang->ameba_deal = $lang->deal;
