<?php
$lang->makeup->reviewers      = 'Reviewed by';
$lang->makeup->multiReviewer  = 'Multi-level approval';
$lang->makeup->copyReviewer   = 'Copy reviewer';
$lang->makeup->selectReviewer = 'Select a module to copy';

global $config;
if(!empty($config->makeup->multiReviewer))
{
    $lang->makeup->reviewedBy = 'Reviewer';
}

$lang->makeup->statusList['doing']  = 'Doing';

$lang->makeup->multiReviewerStatusList[1] = 'On';
$lang->makeup->multiReviewerStatusList[0] = 'Off';

$lang->makeup->emptyDeptOrManager = 'The reviewer of makeup is dept manager. You do not belong to any dept or your dept do not set manager.';
$lang->makeup->waitingMakeups     = 'There are makeups that are waiting to be reviewed. Please review them first.';
