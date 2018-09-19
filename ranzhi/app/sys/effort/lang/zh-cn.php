<?php
/**
 * The zh-cn file of effort module of RanZhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商业软件，非开源软件
 * @author      Tingting Dai <daitingting@xirangit.com>
 * @package     effort 
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */
$lang->effort->common          = '日志';
$lang->effort->index           = "日志一览";
$lang->effort->create          = "新增日志";
$lang->effort->batchCreate     = "新增日志";
$lang->effort->createForObject = "对象详情添加日志";
$lang->effort->edit            = "更新日志";
$lang->effort->batchEdit       = "批量编辑";
$lang->effort->view            = "日志详情";
$lang->effort->viewAB          = "详情";
$lang->effort->comment         = '备注';
$lang->effort->export          = "导出";
$lang->effort->delete          = "删除日志";
$lang->effort->browse          = "浏览日志";
$lang->effort->history         = "已登记日志";
$lang->effort->hour            = "小时";
$lang->effort->clean           = "清除";

$lang->effort->id          = '编号';
$lang->effort->account     = '登记人';
$lang->effort->date        = '日期';
$lang->effort->left        = '剩余';
$lang->effort->consumed    = '耗时';
$lang->effort->objectType  = '对象';
$lang->effort->objectID    = '对象ID';
$lang->effort->work        = '工作内容';
$lang->effort->deal        = '处理';
$lang->effort->allDept     = '所有';

$lang->effort->calendar     = '日历';
$lang->effort->month        = '本月';
$lang->effort->week         = '星期';
$lang->effort->today        = '今天';
$lang->effort->weekDateList = '一,二,三,四,五,六,天';

$lang->effort->objectTypeList['custom']   = '';
$lang->effort->objectTypeList['task']     = '任务';
$lang->effort->objectTypeList['todo']     = 'TODO';
$lang->effort->objectTypeList['customer'] = '客户';
$lang->effort->objectTypeList['order']    = '订单';
$lang->effort->objectTypeList['contract'] = '合同';

$lang->effort->todayEfforts     = '今日';
$lang->effort->yesterdayEfforts = '昨日';
$lang->effort->thisWeekEfforts  = '本周';
$lang->effort->lastWeekEfforts  = '上周';
$lang->effort->thisMonthEfforts = '本月';
$lang->effort->lastMonthEfforts = '上月';
$lang->effort->allDaysEfforts   = '所有日志';

$lang->effort->notEmpty          = '不能为空;';
$lang->effort->notNegative       = "不能为负！";
$lang->effort->isNumber          = '需为数字;';
$lang->effort->tooLong           = 'ID%s 日志内容过长';
$lang->effort->nowork            = "ID%s 工作内容不能为空！";
$lang->effort->notice            = '(注：1、%s为空视为此行无效；2、若%s不是%s，%s为空也视为此行无效)';
$lang->effort->confirmDelete     = "您确定要删除该条日志吗？";
$lang->effort->noticeClean       = "只清除所有系统计算生成的日志";
$lang->effort->noticeFinish      = "有剩余工时为零的任务日志，系统将自动完成该任务，是否继续？";
$lang->effort->noticeSaveRecord  = '您有尚未保存的工时记录，请先将其保存。';

$lang->effort->weekly = new stdclass();
$lang->effort->weekly->common      = '周报';
$lang->effort->weekly->id          = '编号';
$lang->effort->weekly->date        = '日期';
$lang->effort->weekly->dateRange   = '起止时间';
$lang->effort->weekly->title       = '名称';
$lang->effort->weekly->summary     = '总结';
$lang->effort->weekly->week        = '周';
$lang->effort->weekly->content     = '内容';
$lang->effort->weekly->status      = '状态';
$lang->effort->weekly->createdBy   = '由谁创建';
$lang->effort->weekly->createdDate = '创建时间';
$lang->effort->weekly->editedBy    = '由谁编辑';
$lang->effort->weekly->editedDate  = '编辑时间';

$lang->effort->weekly->browse = '周报列表';
$lang->effort->weekly->create = '创建周报';
$lang->effort->weekly->edit   = '编辑周报';
$lang->effort->weekly->delete = '删除周报';
$lang->effort->weekly->view   = '周报详情';

$lang->effort->weekly->statusList['draft']  = '草稿';
$lang->effort->weekly->statusList['normal'] = '正常';

$lang->effort->weekly->weekList[0] = '周日';
$lang->effort->weekly->weekList[1] = '周一';
$lang->effort->weekly->weekList[2] = '周二';
$lang->effort->weekly->weekList[3] = '周三';
$lang->effort->weekly->weekList[4] = '周四';
$lang->effort->weekly->weekList[5] = '周五';
$lang->effort->weekly->weekList[6] = '周六';
