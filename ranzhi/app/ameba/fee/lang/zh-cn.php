<?php
/**
 * The zh-cn lang file of fee module of Ranzhi.
 *
 * @copyright   Copyright 2009-2017 青岛易软天创网络科技有限公司 
 * @license     商业软件，非开源软件
 * @author      Gang Liu
 * @package     fee 
 * @version     $Id$
 * @link        http://www.ranzhi.org 
 */
if(!isset($lang->fee)) $lang->fee = new stdclass();
$lang->fee->common     = '分摊支出';
$lang->fee->browse     = '浏览分摊规则';
$lang->fee->create     = '添加分摊规则';
$lang->fee->edit       = '编辑分摊规则';
$lang->fee->view       = '分摊规则详情';
$lang->fee->delete     = '删除分摊规则';
$lang->fee->share      = '分摊';
$lang->fee->sharedFees = '分摊明细';
$lang->fee->basic      = '基本信息';
$lang->fee->detail     = '详细信息';
$lang->fee->rule       = '分配收入';

$lang->fee->id          = '编号';
$lang->fee->year        = '年份';
$lang->fee->month       = '月份';
$lang->fee->type        = '类型';
$lang->fee->category    = '支出科目';
$lang->fee->dept        = '部门';
$lang->fee->period      = '周期';
$lang->fee->shareType   = '分摊类型';
$lang->fee->money       = '金额';
$lang->fee->desc        = '公摊说明';
$lang->fee->createdBy   = '由谁创建';
$lang->fee->createdDate = '创建日期';
$lang->fee->editedBy    = '由谁编辑';
$lang->fee->editedDate  = '编辑日期';

$lang->fee->rate        = '分摊比例';
$lang->fee->total       = '合计';

$lang->fee->typeList['budget'] = '预算型';
$lang->fee->typeList['period'] = '周期型';

$lang->fee->monthList['']   = '';
$lang->fee->monthList['01'] = '一月';
$lang->fee->monthList['02'] = '二月';
$lang->fee->monthList['03'] = '三月';
$lang->fee->monthList['04'] = '四月';
$lang->fee->monthList['05'] = '五月';
$lang->fee->monthList['06'] = '六月';
$lang->fee->monthList['07'] = '七月';
$lang->fee->monthList['08'] = '八月';
$lang->fee->monthList['09'] = '九月';
$lang->fee->monthList['10'] = '十月';
$lang->fee->monthList['11'] = '十一月';
$lang->fee->monthList['12'] = '十二月';

$lang->fee->periodList['year']    = '年';
$lang->fee->periodList['quarter'] = '季度';
$lang->fee->periodList['month']   = '月';

$lang->fee->shareTypeList['person'] = '按人数分摊';
$lang->fee->shareTypeList['manual'] = '手动分摊';

$lang->fee->moneyTips = '分摊金额根据预算自动计算。';
$lang->fee->shareTips = '部门重复按最后一条计算，部门为空不计算。';

$lang->fee->totalMoney = '分摊金额总计 %s.';

$lang->fee->error = new stdclass();
$lang->fee->error->shareLimited = '没有权限分摊支出。';
$lang->fee->error->exist        = '已经有相同年份、科目和部门的支出存在。';
$lang->fee->error->totalRate    = '分摊比例之和应该小于100%。';

$lang->ameba_fee = $lang->fee;
