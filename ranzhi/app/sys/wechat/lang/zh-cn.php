<?php
if(!isset($lang->wechat)) $lang->wechat = new stdclass();
$lang->wechat->common         = '企业微信';
$lang->wechat->corpID         = 'CorpID';
$lang->wechat->agent          = '企业应用';
$lang->wechat->agentName      = '应用名称';
$lang->wechat->agentID        = '应用ID';
$lang->wechat->secret         = 'Secret';
$lang->wechat->contact        = '通讯录同步';
$lang->wechat->sendMessage    = '发送消息';
$lang->wechat->scan           = '扫描功能';
$lang->wechat->chooseImage    = '选择图片';
$lang->wechat->apply          = '我的申请';
$lang->wechat->review         = '我的审批';

$lang->wechat->admin       = '微信管理';
$lang->wechat->createAgent = '新增应用';
$lang->wechat->editAgent   = '编辑应用';
$lang->wechat->deleteAgent = '删除应用';
$lang->wechat->viewAgent   = '应用详情';
$lang->wechat->setting     = '设置';

$lang->wechat->applys['attend']   = '考勤补录';
$lang->wechat->applys['leave']    = '请假申请';
$lang->wechat->applys['overtime'] = '加班申请';
$lang->wechat->applys['lieu']     = '调休申请';
$lang->wechat->applys['refund']   = '报销申请';

$lang->wechat->reviews['attend']   = '考勤审批';
$lang->wechat->reviews['leave']    = '请假审批';
$lang->wechat->reviews['overtime'] = '加班审批';
$lang->wechat->reviews['lieu']     = '调休审批';
$lang->wechat->reviews['refund']   = '报销审批';

$lang->wechat->userFields['name']       = '姓名';
$lang->wechat->userFields['userid']     = '帐号';
$lang->wechat->userFields['mobile']     = '手机号';
$lang->wechat->userFields['email']      = '邮箱';
$lang->wechat->userFields['department'] = '所在部门';
$lang->wechat->userFields['position']   = '职位';

$lang->wechat->deptFields['name']     = '部门名称';
$lang->wechat->deptFields['id']       = '部门ID';
$lang->wechat->deptFields['parentid'] = '父部门ID';
$lang->wechat->deptFields['order']    = '排序';

$lang->wechat->sendMessageList['open']  = '开启';
$lang->wechat->sendMessageList['close'] = '禁用';

$lang->wechat->chooseImageList['open']  = '开启';
$lang->wechat->chooseImageList['close'] = '禁用';

$lang->wechat->scanList['open']  = '开启';
$lang->wechat->scanList['close'] = '禁用';

$lang->wechat->syncUserToSystem = '同步用户到然之';
$lang->wechat->syncDeptToSystem = '同步部门到然之';
$lang->wechat->syncUserToWechat = '同步用户到微信';
$lang->wechat->syncDeptToWechat = '同步部门到微信';
$lang->wechat->bindUser         = '绑定企业微信用户';
$lang->wechat->selectUser       = '选择企业微信用户';

$lang->wechat->note = 'corpID在企业微信后台 <strong>我的企业</strong> 菜单下 <strong>企业信息</strong> 中查看（需要有管理员权限），应用ID和secret在微信后台 <strong>企业应用</strong> 菜单下该应用详情中查看，通讯录同步secret在 <strong>管理工具</strong> 菜单下选择 <strong>通讯录同步</strong> 并开启 <strong>API接口同步</strong> 后查看。';

$lang->wechat->emptyContactSecret = '没有设置通讯录同步secret，不能使用同步功能。';
