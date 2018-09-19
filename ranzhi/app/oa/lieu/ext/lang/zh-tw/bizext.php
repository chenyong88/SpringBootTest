<?php
$lang->lieu->reviewers      = '審核者';
$lang->lieu->multiReviewer  = '多級審批';
$lang->lieu->copyReviewer   = '複製審批流程';
$lang->lieu->selectReviewer = '請選擇一個審批流程來複制';

global $config;
if(!empty($config->lieu->multiReviewer))
{
    $lang->lieu->reviewedBy = '當前審核者';
}

$lang->lieu->statusList['doing'] = '審核中';

$lang->lieu->multiReviewerStatusList[1] = '開啟';
$lang->lieu->multiReviewerStatusList[0] = '關閉';

$lang->lieu->emptyDeptOrManager = '調休的審批人是部門經理。您尚未設置所屬部門或者所屬部門尚未設置部門經理，不能提交審批！';
$lang->lieu->waitingLieus       = '有調休記錄處于審批流程中，請審批完再更改審批設置。';
