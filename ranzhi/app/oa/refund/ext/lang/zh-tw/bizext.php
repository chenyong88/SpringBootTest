<?php
$lang->refund->reviewers      = '審批人';
$lang->refund->multiReviewer  = '多級審批';
$lang->refund->copyReviewer   = '複製審批流程';
$lang->refund->selectReviewer = '請選擇一個審批流程來複制';

global $config;
if(!empty($config->refund->multiReviewer))
{
    $lang->refund->reviewedBy = '當前審批人';
}

$lang->refund->multiReviewerStatusList[1] = '開啟';
$lang->refund->multiReviewerStatusList[0] = '關閉';

$lang->refund->emptyDeptOrManager = '報銷的審批人是部門經理。您尚未設置所屬部門或者所屬部門尚未設置部門經理，不能提交審批！';
$lang->refund->waitingRefunds     = '有報銷記錄處于審批流程中，請審批完再更改審批設置。';
