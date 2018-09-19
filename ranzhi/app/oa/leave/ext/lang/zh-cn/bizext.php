<?php
$lang->leave->reviewers      = '审核者';
$lang->leave->backReviewers  = '销假审核者';
$lang->leave->multiReviewer  = '多级审批';
$lang->leave->copyReviewer   = '复制审批流程';
$lang->leave->selectReviewer = '请选择一个审批流程来复制';

global $config;
if(!empty($config->leave->multiReviewer))
{
    $lang->leave->reviewedBy = '当前审核者';
}

$lang->leave->statusList['doing'] = '审核中';

$lang->leave->multiReviewerStatusList[1] = '开启';
$lang->leave->multiReviewerStatusList[0] = '关闭';

$lang->leave->emptyDeptOrManager = '请假的审批人是部门经理。您尚未设置所属部门或者所属部门尚未设置部门经理，不能提交审批！';
$lang->leave->waitingLeaves      = '有请假记录处于审批流程中，请审批完再更改审批设置。';
