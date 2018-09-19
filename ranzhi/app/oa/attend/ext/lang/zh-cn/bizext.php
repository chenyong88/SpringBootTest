<?php
$lang->attend->import          = '导入';
$lang->attend->importSettings  = '导入模板';
$lang->attend->importFile      = '模板文件';
$lang->attend->importSuccess   = '导入成功';
$lang->attend->encode          = '编码';
$lang->attend->fileNode        = '文件格式为csv';
$lang->attend->delmiter        = '分隔符';
$lang->attend->importFirstRow  = '导入第一行';
$lang->attend->reset           = '重置模板';
$lang->attend->showImportError = '导入错误';
$lang->attend->line            = '行号：%s';

$lang->attend->encodeList['gbk']  = 'GBK';
$lang->attend->encodeList['utf8'] = 'UTF-8';

$lang->attend->delmiterList[',']  = '逗号 ，';
$lang->attend->delmiterList[';']  = '分号 ；';
$lang->attend->delmiterList['|']  = '管道符 |';
$lang->attend->delmiterList['^']  = '插入符 ^';
$lang->attend->delmiterList['~']  = '波浪号 ~';
$lang->attend->delmiterList['\t'] = '制表符 tab';

$lang->attend->importFirstRowList['0'] = '否';
$lang->attend->importFirstRowList['1'] = '是';

$lang->attend->clientList['mobile'] = '移动版';

$lang->attend->importFields['account']  = '账号';
$lang->attend->importFields['realname'] = '真实姓名';
$lang->attend->importFields['date']     = '日期';
$lang->attend->importFields['signIn']   = '签到时间';
$lang->attend->importFields['signOut']  = '签退时间';
$lang->attend->importFields['ip']       = '签到IP';
$lang->attend->importFields['desc']     = '备注';

$lang->attend->placeholder = new stdclass();
$lang->attend->placeholder->selectField = '选择项目';

$lang->attend->tips = new stdclass();
$lang->attend->tips->account  = '必须和系统内账号一致，否则不会被导入。';
$lang->attend->tips->realname = '必须和系统内姓名一致，且不能重复。导入账号时此项不会被导入。';
$lang->attend->tips->signIn   = '可以设置多个，以逗号隔开，取最小值为签到时间。';
$lang->attend->tips->signOut  = '可以设置多个，以逗号隔开，取最大值为签退时间。';
$lang->attend->tips->delmiter = 'csv文件的数据分隔符，默认为逗号。';

$lang->attend->error = new stdclass();
$lang->attend->error->userNotExist            = '该用户在系统中不存在';
$lang->attend->error->emptySchema             = '请选择对应的项目';
$lang->attend->error->emptyImportSchema       = '没有设置导入模板';
$lang->attend->error->emptyAccountAndRealname = '<strong>账号</strong>和<strong>真实姓名</strong>不能同时为空。';
