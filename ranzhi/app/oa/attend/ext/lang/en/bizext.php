<?php
$lang->attend->import          = 'Import';
$lang->attend->importSettings  = 'Import Settings';
$lang->attend->importFile      = 'Template File';
$lang->attend->importSuccess   = 'Import Success.';
$lang->attend->encode          = 'Encode';
$lang->attend->fileNode        = 'The format is csv.';
$lang->attend->delmiter        = 'Delmiter';
$lang->attend->importFirstRow  = 'Import First Row';
$lang->attend->reset           = 'Reset';
$lang->attend->showImportError = 'Errors';
$lang->attend->line            = 'Line : %s';

$lang->attend->encodeList['gbk']  = 'GBK';
$lang->attend->encodeList['utf8'] = 'UTF-8';

$lang->attend->delmiterList[',']  = 'Commas ,';
$lang->attend->delmiterList[';']  = 'Semi-colons ;';
$lang->attend->delmiterList['|']  = 'Pipes |';
$lang->attend->delmiterList['^']  = 'Carets ^';
$lang->attend->delmiterList['~']  = 'tildes ~';
$lang->attend->delmiterList['\t'] = 'Tabs tab';

$lang->attend->importFirstRowList['0'] = 'No';
$lang->attend->importFirstRowList['1'] = 'Yes';

$lang->attend->clientList['mobile'] = 'Mobile';

$lang->attend->importFields['account']  = 'Account';
$lang->attend->importFields['realname'] = 'Real Name';
$lang->attend->importFields['date']     = 'Date';
$lang->attend->importFields['signIn']   = 'Sign In';
$lang->attend->importFields['signOut']  = 'Sign Out';
$lang->attend->importFields['ip']       = 'IP';
$lang->attend->importFields['desc']     = 'Description';

$lang->attend->placeholder = new stdclass();
$lang->attend->placeholder->selectField = 'Select Field';

$lang->attend->tips = new stdclass();
$lang->attend->tips->account  = 'The account must be same as the system account, or will not be imported.';
$lang->attend->tips->realname = 'The real name must be same as the system real name, and must be unique. If the account is imported this one will be ignore.';
$lang->attend->tips->signIn   = 'You can set multiple options, separated by commas, take the minimum as the sign in time.';
$lang->attend->tips->signOut  = 'You can set multiple options, separated by commas, take the maximum as the sign out time.';
$lang->attend->tips->delmiter = 'Delmiter of csv file, commas as default.';

$lang->attend->error = new stdclass();
$lang->attend->error->userNotExist            = 'The user do not exist.';
$lang->attend->error->emptySchema             = 'Please select a field.';
$lang->attend->error->emptyImportSchema       = 'No import settings.';
$lang->attend->error->emptyAccountAndRealname = '<strong> Account </strong> and <strong> Real Name </strong> can not be empty at the same time.';
