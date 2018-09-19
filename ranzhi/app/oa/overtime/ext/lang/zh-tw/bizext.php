<?php
$lang->overtime->reviewers      = '審核者';
$lang->overtime->multiReviewer  = '多級審批';
$lang->overtime->copyReviewer   = '複製審批流程';
$lang->overtime->selectReviewer = '請選擇一個審批流程來複制';

global $config;
if(!empty($config->overtime->multiReviewer))
{
    $lang->overtime->reviewedBy = '當前審核者';
}

$lang->overtime->statusList['doing'] = '審核中';

$lang->overtime->multiReviewerStatusList[1] = '開啟';
$lang->overtime->multiReviewerStatusList[0] = '關閉';

$lang->overtime->emptyDeptOrManager = '加班的審批人是部門經理。您尚未設置所屬部門或者所屬部門尚未設置部門經理，不能提交審批！';
$lang->overtime->waitingOvertimes   = '有加班記錄處于審批流程中，請審批完再更改審批設置。';
