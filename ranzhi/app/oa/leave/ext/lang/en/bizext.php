<?php
$lang->leave->reviewers      = 'Reviewed by';
$lang->leave->backReviewers  = 'Back Reviewed by';
$lang->leave->multiReviewer  = 'Multi-level approval';
$lang->leave->copyReviewer   = 'Copy reviewer';
$lang->leave->selectReviewer = 'Select a module to copy';

global $config;
if(!empty($config->leave->multiReviewer))
{
    $lang->leave->reviewedBy = 'Reviewer';
}

$lang->leave->statusList['doing']  = 'Doing';

$lang->leave->multiReviewerStatusList[1] = 'On';
$lang->leave->multiReviewerStatusList[0] = 'Off';

$lang->leave->emptyDeptOrManager = 'The reviewer of leave is dept manager. You do not belong to any dept or your dept do not set manager.';
$lang->leave->waitingLeaves      = 'There are leaves that are waiting to be reviewed. Please review them first.';
