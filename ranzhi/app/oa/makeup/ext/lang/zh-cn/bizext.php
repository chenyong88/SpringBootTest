<?php
$lang->makeup->reviewers      = '审核者';
$lang->makeup->multiReviewer  = '多级审批';
$lang->makeup->copyReviewer   = '复制审批流程';
$lang->makeup->selectReviewer = '请选择一个审批流程来复制';

global $config;
if(!empty($config->makeup->multiReviewer))
{
    $lang->makeup->reviewedBy = '当前审核者';
}

$lang->makeup->statusList['doing'] = '审核中';

$lang->makeup->multiReviewerStatusList[1] = '开启';
$lang->makeup->multiReviewerStatusList[0] = '关闭';

$lang->makeup->emptyDeptOrManager = '补班的审批人是部门经理。您尚未设置所属部门或者所属部门尚未设置部门经理，不能提交审批！';
$lang->makeup->waitingMakeups     = '有补班记录处于审批流程中，请审批完再更改审批设置。';
