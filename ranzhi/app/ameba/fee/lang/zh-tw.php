<?php
/**
 * The zh-tw lang file of fee module of Ranzhi.
 *
 * @copyright   Copyright 2009-2017 青島易軟天創網絡科技有限公司 
 * @license     商業軟件，非開源軟件
 * @author      Gang Liu
 * @package     fee 
 * @version     $Id$
 * @link        http://www.ranzhi.org 
 */
if(!isset($lang->fee)) $lang->fee = new stdclass();
$lang->fee->common     = '分攤支出';
$lang->fee->browse     = '瀏覽分攤規則';
$lang->fee->create     = '添加分攤規則';
$lang->fee->edit       = '編輯分攤規則';
$lang->fee->view       = '分攤規則詳情';
$lang->fee->delete     = '刪除分攤規則';
$lang->fee->share      = '分攤';
$lang->fee->sharedFees = '分攤明細';
$lang->fee->basic      = '基本信息';
$lang->fee->detail     = '詳細信息';
$lang->fee->rule       = '分配收入';

$lang->fee->id          = '編號';
$lang->fee->year        = '年份';
$lang->fee->month       = '月份';
$lang->fee->type        = '類型';
$lang->fee->category    = '支出科目';
$lang->fee->dept        = '部門';
$lang->fee->period      = '周期';
$lang->fee->shareType   = '分攤類型';
$lang->fee->money       = '金額';
$lang->fee->desc        = '公攤說明';
$lang->fee->createdBy   = '由誰創建';
$lang->fee->createdDate = '創建日期';
$lang->fee->editedBy    = '由誰編輯';
$lang->fee->editedDate  = '編輯日期';

$lang->fee->rate        = '分攤比例';
$lang->fee->total       = '合計';

$lang->fee->typeList['budget'] = '預算型';
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

$lang->fee->shareTypeList['person'] = '按人數分攤';
$lang->fee->shareTypeList['manual'] = '手動分攤';

$lang->fee->moneyTips = '分攤金額根據預算自動計算。';
$lang->fee->shareTips = '部門重複按最後一條計算，部門為空不計算。';

$lang->fee->totalMoney = '分攤金額總計 %s.';

$lang->fee->error = new stdclass();
$lang->fee->error->shareLimited = '沒有權限分攤支出。';
$lang->fee->error->exist        = '已經有相同年份、科目和部門的支出存在。';
$lang->fee->error->totalRate    = '分攤比例之和應該小於100%。';

$lang->ameba_fee = $lang->fee;
