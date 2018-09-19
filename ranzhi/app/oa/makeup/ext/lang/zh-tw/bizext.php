<?php
$lang->makeup->reviewers      = '審核者';
$lang->makeup->multiReviewer  = '多級審批';
$lang->makeup->copyReviewer   = '複製審批流程';
$lang->makeup->selectReviewer = '請選擇一個審批流程來複制';

global $config;
if(!empty($config->makeup->multiReviewer))
{
    $lang->makeup->reviewedBy = '當前審核者';
}

$lang->makeup->statusList['doing'] = '審核中';

$lang->makeup->multiReviewerStatusList[1] = '開啟';
$lang->makeup->multiReviewerStatusList[0] = '關閉';

$lang->makeup->emptyDeptOrManager = '補班的審批人是部門經理。您尚未設置所屬部門或者所屬部門尚未設置部門經理，不能提交審批！';
$lang->makeup->waitingMakeups     = '有補班記錄處于審批流程中，請審批完再更改審批設置。';
