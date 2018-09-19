<?php
/**
 * The zh-cn file of feedback module of Ranzhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商业软件，非开源软件
 * @author      Yidong wang <yidong@cnezsoft.com>
 * @package     feedback 
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */
if(!isset($lang->feedback)) $lang->feedback = new stdclass();

$lang->feedback->common   = '售后';
$lang->feedback->browse   = '浏览问题';
$lang->feedback->company  = '所有问题';
$lang->feedback->personal = '指派给我';
$lang->feedback->create   = '创建问题';
$lang->feedback->list     = '问题列表';
$lang->feedback->edit     = '编辑问题';
$lang->feedback->view     = '查看问题';
$lang->feedback->assignTo = '指派问题';
$lang->feedback->close    = '关闭问题';
$lang->feedback->activate = '激活问题';
$lang->feedback->delete   = '删除问题';
$lang->feedback->transfer = '转交';
$lang->feedback->reply    = '回复';
$lang->feedback->doubt    = '追问';

$lang->feedback->id             = '编号';
$lang->feedback->product        = '所属产品';
$lang->feedback->customer       = '所属客户';
$lang->feedback->contact        = '所属联系人';
$lang->feedback->pri            = '优先级';
$lang->feedback->title          = '标题';
$lang->feedback->desc           = '问题描述';
$lang->feedback->type           = '类型';
$lang->feedback->addedBy        = '由谁创建';
$lang->feedback->addedDate      = '添加时间';
$lang->feedback->assignedTo     = '指派给';
$lang->feedback->assignedBy     = '由谁指派';
$lang->feedback->assignedDate   = '指派日期';
$lang->feedback->repliedBy      = '由谁回复';
$lang->feedback->repliedDate    = '回复日期';
$lang->feedback->transferedBy   = '由谁转交';
$lang->feedback->transferedDate = '转交日期';
$lang->feedback->editedBy       = '最后修改';
$lang->feedback->editedDate     = '修改日期';
$lang->feedback->closedBy       = '由谁关闭';
$lang->feedback->closedDate     = '关闭日期';
$lang->feedback->closedReason   = '关闭原因';
$lang->feedback->activatedBy    = '由谁激活';
$lang->feedback->activatedDate  = '激活日期';
$lang->feedback->status         = '状态';

$lang->feedback->lblPri = 'P';

$lang->feedback->legendBasic  = '基本信息';
$lang->feedback->legendEffort = '问题的一生';

$lang->feedback->typeList['feedback'] = '反馈';
$lang->feedback->typeList['idea']     = '想法';

$lang->feedback->priList[0] = '';
$lang->feedback->priList[3] = 3;
$lang->feedback->priList[1] = 1;
$lang->feedback->priList[2] = 2;
$lang->feedback->priList[4] = 4;

$lang->feedback->statusList['']           = '';
$lang->feedback->statusList['wait']       = '等待处理';
$lang->feedback->statusList['viewed']     = '已查看';
$lang->feedback->statusList['replied']    = '已回复';
$lang->feedback->statusList['doubted']    = '追问中';
$lang->feedback->statusList['transfered'] = '已转交';
$lang->feedback->statusList['closed']     = '已关闭';

$lang->feedback->closedReasonList['']        = '';
$lang->feedback->closedReasonList['done']    = '已完成';
$lang->feedback->closedReasonList['storied'] = '转需求';
$lang->feedback->closedReasonList['buged']   = '转Bug';

/* For fields check. */
$lang->issue = clone $lang->feedback;
