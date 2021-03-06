<?php
/**
 * The group module zh-cn file of RanZhi.
 *
 * @copyright   Copyright 2009-2018 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Chunsheng Wang <chunsheng@cnezsoft.com>
 * @package     group
 * @version     $Id: zh-cn.php 4719 2013-05-03 02:20:28Z chencongzhi520@gmail.com $
 * @link        http://www.ranzhi.org
 */
$lang->group->common             = '权限分组';
$lang->group->browse             = '浏览分组';
$lang->group->create             = '新增分组';
$lang->group->edit               = '编辑分组';
$lang->group->copy               = '复制分组';
$lang->group->delete             = '删除分组';
$lang->group->manageAppPriv      = '应用';
$lang->group->managePriv         = '权限';
$lang->group->managePrivByGroup  = '权限维护';
$lang->group->managePrivByModule = '按模块分配权限';
$lang->group->byModuleTips       = '<span class="tips">（可以按住shift或者control键进行多选）</span>';
$lang->group->manageMember       = '成员';
$lang->group->linkMember         = '关联用户';
$lang->group->unlinkMember       = '移除用户';
$lang->group->confirmDelete      = '您确定删除该用户分组吗？';
$lang->group->successSaved       = '成功保存';
$lang->group->errorNotSaved      = '没有保存，请确认选择了权限数据。';

$lang->group->id       = '编号';
$lang->group->name     = '分组名称';
$lang->group->desc     = '分组描述';
$lang->group->users    = '用户列表';
$lang->group->module   = '模块';
$lang->group->method   = '方法';
$lang->group->priv     = '权限';
$lang->group->option   = '选项';
$lang->group->inside   = '组内用户';
$lang->group->outside  = '组外用户';
$lang->group->other    = '其他模块';
$lang->group->all      = '所有权限';
$lang->group->extent   = '权限范围';
$lang->group->havePriv = '已授权';
$lang->group->noPriv   = '未授权';

$lang->group->manageAll = '可浏览所有客户和订单';

$lang->group->copyOptions['copyPriv'] = '复制权限';
$lang->group->copyOptions['copyUser'] = '复制用户';

$lang->group->placeholder = new stdclass();
$lang->group->placeholder->tree = '类目包括对区域、行业、收入科目、支出科目、论坛版块、博客类目、部门的权限设置';
$lang->group->placeholder->lang = '设置包括对产品状态、产品线、客户类型、客户规模、客户级别、客户状态、货币设置、维护角色的权限设置';

include (dirname(__FILE__) . '/resource.php');
