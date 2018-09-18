<?php
/**
 * The zh-tw file of effort module of RanZhi.
 *
 * @copyright   Copyright 2009-2016 青島易軟天創網絡科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商業軟件，非開源軟件
 * @author      Tingting Dai <daitingting@xirangit.com>
 * @package     effort 
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */
$lang->effort->common          = '日誌';
$lang->effort->index           = "日誌一覽";
$lang->effort->create          = "新增日誌";
$lang->effort->batchCreate     = "新增日誌";
$lang->effort->createForObject = "對象詳情添加日誌";
$lang->effort->edit            = "更新日誌";
$lang->effort->batchEdit       = "批量編輯";
$lang->effort->view            = "日誌詳情";
$lang->effort->viewAB          = "詳情";
$lang->effort->comment         = '備註';
$lang->effort->export          = "導出";
$lang->effort->delete          = "刪除日誌";
$lang->effort->browse          = "瀏覽日誌";
$lang->effort->history         = "已登記日誌";
$lang->effort->hour            = "小時";
$lang->effort->clean           = "清除";

$lang->effort->id          = '編號';
$lang->effort->account     = '登記人';
$lang->effort->date        = '日期';
$lang->effort->left        = '剩餘';
$lang->effort->consumed    = '耗時';
$lang->effort->objectType  = '對象';
$lang->effort->objectID    = '對象ID';
$lang->effort->work        = '工作內容';
$lang->effort->deal        = '處理';
$lang->effort->allDept     = '所有';

$lang->effort->calendar     = '日曆';
$lang->effort->month        = '本月';
$lang->effort->week         = '星期';
$lang->effort->today        = '今天';
$lang->effort->weekDateList = '一,二,三,四,五,六,天';

$lang->effort->objectTypeList['custom']   = '';
$lang->effort->objectTypeList['task']     = '任務';
$lang->effort->objectTypeList['todo']     = 'TODO';
$lang->effort->objectTypeList['customer'] = '客戶';
$lang->effort->objectTypeList['order']    = '訂單';
$lang->effort->objectTypeList['contract'] = '合同';

$lang->effort->todayEfforts     = '今日';
$lang->effort->yesterdayEfforts = '昨日';
$lang->effort->thisWeekEfforts  = '本週';
$lang->effort->lastWeekEfforts  = '上周';
$lang->effort->thisMonthEfforts = '本月';
$lang->effort->lastMonthEfforts = '上月';
$lang->effort->allDaysEfforts   = '所有日誌';

$lang->effort->notEmpty          = '不能為空;';
$lang->effort->notNegative       = "不能為負！";
$lang->effort->isNumber          = '需為數字;';
$lang->effort->tooLong           = 'ID%s 日誌內容過長';
$lang->effort->nowork            = "ID%s 工作內容不能為空！";
$lang->effort->notice            = '(註：1、%s為空視為此行無效；2、若%s不是%s，%s為空也視為此行無效)';
$lang->effort->confirmDelete     = "您確定要刪除該條日誌嗎？";
$lang->effort->noticeClean       = "只清除所有系統計算生成的日誌";
$lang->effort->noticeFinish      = "有剩餘工時為零的任務日誌，系統將自動完成該任務，是否繼續？";
$lang->effort->noticeSaveRecord  = '您有尚未保存的工時記錄，請先將其保存。';

$lang->effort->weekly = new stdclass();
$lang->effort->weekly->common      = '周報';
$lang->effort->weekly->id          = '編號';
$lang->effort->weekly->date        = '日期';
$lang->effort->weekly->dateRange   = '起止時間';
$lang->effort->weekly->title       = '名稱';
$lang->effort->weekly->summary     = '總結';
$lang->effort->weekly->week        = '周';
$lang->effort->weekly->content     = '內容';
$lang->effort->weekly->status      = '狀態';
$lang->effort->weekly->createdBy   = '由誰創建';
$lang->effort->weekly->createdDate = '創建時間';
$lang->effort->weekly->editedBy    = '由誰編輯';
$lang->effort->weekly->editedDate  = '編輯時間';

$lang->effort->weekly->browse = '周報列表';
$lang->effort->weekly->create = '創建周報';
$lang->effort->weekly->edit   = '編輯周報';
$lang->effort->weekly->delete = '刪除周報';
$lang->effort->weekly->view   = '周報詳情';

$lang->effort->weekly->statusList['draft']  = '草稿';
$lang->effort->weekly->statusList['normal'] = '正常';

$lang->effort->weekly->weekList[0] = '周日';
$lang->effort->weekly->weekList[1] = '周一';
$lang->effort->weekly->weekList[2] = '周二';
$lang->effort->weekly->weekList[3] = '周三';
$lang->effort->weekly->weekList[4] = '周四';
$lang->effort->weekly->weekList[5] = '周五';
$lang->effort->weekly->weekList[6] = '周六';
