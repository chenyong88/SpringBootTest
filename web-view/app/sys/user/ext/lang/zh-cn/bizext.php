<?php
$lang->user->importLDAP = '从LDAP导入用户';
$lang->user->group      = '权限分组';
$lang->user->bind       = '绑定企业微信';
$lang->user->unbind     = '解除绑定';
$lang->user->asLDAP     = '同LDAP';
$lang->user->ldapUser   = 'LDAP账号';
$lang->user->ranzhiUser = '然之账号';
$lang->user->parent     = '父账号';
$lang->user->unofficial = '编外人员';

$lang->user->unofficialList = '编外人员列表';

if(!isset($lang->user->error)) $lang->user->error = new stdclass();
$lang->user->error->repeat     = '%s，因为用户名重复，不能添加！，请修改用户名后再添加';
$lang->user->error->illaccount = '%s，因为用户名不合法，添加失败！，请修改用户名后再添加';
$lang->user->error->userLimit  = '用户数已经达到授权的上限。';
$lang->user->error->reviewer   = '操作失败，原因是 %s 存在该用户未审批的数据或该用户属于审批人。';
$lang->user->error->length     = '<strong>%s</strong>长度应当不超过<strong>%s</strong>。';

$lang->user->notice = new stdclass();
$lang->user->notice->checkbox = '没有勾选，则不导入！';
$lang->user->notice->ldapoff  = 'LDAP处于关闭状态。';

$lang->user->confirmUnbind = '您确定要解除绑定吗？';
