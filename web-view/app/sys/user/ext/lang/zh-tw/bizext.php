<?php
$lang->user->importLDAP = '從LDAP導入用戶';
$lang->user->group      = '權限分組';
$lang->user->bind       = '綁定企業微信';
$lang->user->unbind     = '解除綁定';
$lang->user->asLDAP     = '同LDAP';
$lang->user->ldapUser   = 'LDAP賬號';
$lang->user->ranzhiUser = '然之賬號';
$lang->user->parent     = '父賬號';
$lang->user->unofficial = '編外人員';

$lang->user->unofficialList = '編外人員列表';

if(!isset($lang->user->error)) $lang->user->error = new stdclass();
$lang->user->error->repeat     = '%s，因為用戶名重複，不能添加！，請修改用戶名後再添加';
$lang->user->error->illaccount = '%s，因為用戶名不合法，添加失敗！，請修改用戶名後再添加';
$lang->user->error->userLimit  = '用戶數已經達到授權的上限。';
$lang->user->error->reviewer   = '操作失敗，原因是 %s 存在該用戶未審批的數據或該用戶屬於審批人。';
$lang->user->error->length     = '<strong>%s</strong>長度應當不超過<strong>%s</strong>。';

$lang->user->notice = new stdclass();
$lang->user->notice->checkbox = '沒有勾選，則不導入！';
$lang->user->notice->ldapoff  = 'LDAP處于關閉狀態。';

$lang->user->confirmUnbind = '您確定要解除綁定嗎？';
