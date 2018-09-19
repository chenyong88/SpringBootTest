<?php
$lang->leave->reviewers      = '審核者';
$lang->leave->backReviewers  = '銷假審核者';
$lang->leave->multiReviewer  = '多級審批';
$lang->leave->copyReviewer   = '複製審批流程';
$lang->leave->selectReviewer = '請選擇一個審批流程來複制';

global $config;
if(!empty($config->leave->multiReviewer))
{
    $lang->leave->reviewedBy = '當前審核者';
}

$lang->leave->statusList['doing'] = '審核中';

$lang->leave->multiReviewerStatusList[1] = '開啟';
$lang->leave->multiReviewerStatusList[0] = '關閉';

$lang->leave->emptyDeptOrManager = '請假的審批人是部門經理。您尚未設置所屬部門或者所屬部門尚未設置部門經理，不能提交審批！';
$lang->leave->waitingLeaves      = '有請假記錄處于審批流程中，請審批完再更改審批設置。';
