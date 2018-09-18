<?php
$lang->lieu->reviewers      = 'Reviewed by';
$lang->lieu->multiReviewer  = 'Multi-level approval';
$lang->lieu->copyReviewer   = 'Copy reviewer';
$lang->lieu->selectReviewer = 'Select a module to copy';

global $config;
if(!empty($config->lieu->multiReviewer))
{
    $lang->lieu->reviewedBy = 'Reviewer';
}

$lang->lieu->statusList['doing']  = 'Doing';

$lang->lieu->multiReviewerStatusList[1] = 'On';
$lang->lieu->multiReviewerStatusList[0] = 'Off';

$lang->lieu->emptyDeptOrManager = 'The reviewer of lieu is dept manager. You do not belong to any dept or your dept do not set manager.';
$lang->lieu->waitingLieus       = 'There are lieus that are waiting to be reviewed. Please review them first.';
