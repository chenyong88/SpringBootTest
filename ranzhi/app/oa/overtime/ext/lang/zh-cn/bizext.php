<?php
$lang->overtime->reviewers      = '审核者';
$lang->overtime->multiReviewer  = '多级审批';
$lang->overtime->copyReviewer   = '复制审批流程';
$lang->overtime->selectReviewer = '请选择一个审批流程来复制';

global $config;
if(!empty($config->overtime->multiReviewer))
{
    $lang->overtime->reviewedBy = '当前审核者';
}

$lang->overtime->statusList['doing'] = '审核中';

$lang->overtime->multiReviewerStatusList[1] = '开启';
$lang->overtime->multiReviewerStatusList[0] = '关闭';

$lang->overtime->emptyDeptOrManager = '加班的审批人是部门经理。您尚未设置所属部门或者所属部门尚未设置部门经理，不能提交审批！';
$lang->overtime->waitingOvertimes   = '有加班记录处于审批流程中，请审批完再更改审批设置。';
