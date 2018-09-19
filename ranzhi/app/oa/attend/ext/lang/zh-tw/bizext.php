<?php
$lang->attend->import          = '導入';
$lang->attend->importSettings  = '導入模板';
$lang->attend->importFile      = '模板檔案';
$lang->attend->importSuccess   = '導入成功';
$lang->attend->encode          = '編碼';
$lang->attend->fileNode        = '檔案格式為csv';
$lang->attend->delmiter        = '分隔符';
$lang->attend->importFirstRow  = '導入第一行';
$lang->attend->reset           = '重置模板';
$lang->attend->showImportError = '導入錯誤';
$lang->attend->line            = '行號：%s';

$lang->attend->encodeList['gbk']  = 'GBK';
$lang->attend->encodeList['utf8'] = 'UTF-8';

$lang->attend->delmiterList[',']  = '逗號 ，';
$lang->attend->delmiterList[';']  = '分號 ；';
$lang->attend->delmiterList['|']  = '管道符 |';
$lang->attend->delmiterList['^']  = '插入符 ^';
$lang->attend->delmiterList['~']  = '波浪號 ~';
$lang->attend->delmiterList['\t'] = '製表符 tab';

$lang->attend->importFirstRowList['0'] = '否';
$lang->attend->importFirstRowList['1'] = '是';

$lang->attend->clientList['mobile'] = '移動版';

$lang->attend->importFields['account']  = '賬號';
$lang->attend->importFields['realname'] = '真實姓名';
$lang->attend->importFields['date']     = '日期';
$lang->attend->importFields['signIn']   = '簽到時間';
$lang->attend->importFields['signOut']  = '簽退時間';
$lang->attend->importFields['ip']       = '簽到IP';
$lang->attend->importFields['desc']     = '備註';

$lang->attend->placeholder = new stdclass();
$lang->attend->placeholder->selectField = '選擇項目';

$lang->attend->tips = new stdclass();
$lang->attend->tips->account  = '必須和系統內賬號一致，否則不會被導入。';
$lang->attend->tips->realname = '必須和系統內姓名一致，且不能重複。導入賬號時此項不會被導入。';
$lang->attend->tips->signIn   = '可以設置多個，以逗號隔開，取最小值為簽到時間。';
$lang->attend->tips->signOut  = '可以設置多個，以逗號隔開，取最大值為簽退時間。';
$lang->attend->tips->delmiter = 'csv檔案的數據分隔符，預設為逗號。';

$lang->attend->error = new stdclass();
$lang->attend->error->userNotExist            = '該用戶在系統中不存在';
$lang->attend->error->emptySchema             = '請選擇對應的項目';
$lang->attend->error->emptyImportSchema       = '沒有設置導入模板';
$lang->attend->error->emptyAccountAndRealname = '<strong>賬號</strong>和<strong>真實姓名</strong>不能同時為空。';
