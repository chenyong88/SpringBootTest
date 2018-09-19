<?php
$lang->refund->reviewers      = 'Reviewed by';
$lang->refund->multiReviewer  = 'Multi-level approval';
$lang->refund->copyReviewer   = 'Copy reviewer';
$lang->refund->selectReviewer = 'Select a module to copy';

global $config;
if(!empty($config->refund->multiReviewer))
{
    $lang->refund->reviewedBy = 'Reviewer';
}

$lang->refund->multiReviewerStatusList[1] = 'On';
$lang->refund->multiReviewerStatusList[0] = 'Off';

$lang->refund->emptyDeptOrManager = 'The reviewer of refund is dept manager. You do not belong to any dept or your dept do not set manager.';
$lang->refund->waitingRefunds     = 'There are refunds that are waiting to be reviewed. Please review them first.';
