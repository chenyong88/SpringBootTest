<?php
$lang->overtime->reviewers      = 'Reviewed by';
$lang->overtime->multiReviewer  = 'Multi-level approval';
$lang->overtime->copyReviewer   = 'Copy reviewer';
$lang->overtime->selectReviewer = 'Select a module to copy';

global $config;
if(!empty($config->overtime->multiReviewer))
{
    $lang->overtime->reviewedBy = 'Reviewer';
}

$lang->overtime->statusList['doing']  = 'Doing';

$lang->overtime->multiReviewerStatusList[1] = 'On';
$lang->overtime->multiReviewerStatusList[0] = 'Off';

$lang->overtime->emptyDeptOrManager = 'The reviewer of overtime is dept manager. You do not belong to any dept or your dept do not set manager.';
$lang->overtime->waitingOvertimes   = 'There are overtimes that are waiting to be reviewed. Please review them first.';
