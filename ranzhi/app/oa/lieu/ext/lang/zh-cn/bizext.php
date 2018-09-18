<?php
$lang->lieu->reviewers      = '审核者';
$lang->lieu->multiReviewer  = '多级审批';
$lang->lieu->copyReviewer   = '复制审批流程';
$lang->lieu->selectReviewer = '请选择一个审批流程来复制';

global $config;
if(!empty($config->lieu->multiReviewer))
{
    $lang->lieu->reviewedBy = '当前审核者';
}

$lang->lieu->statusList['doing'] = '审核中';

$lang->lieu->multiReviewerStatusList[1] = '开启';
$lang->lieu->multiReviewerStatusList[0] = '关闭';

$lang->lieu->emptyDeptOrManager = '调休的审批人是部门经理。您尚未设置所属部门或者所属部门尚未设置部门经理，不能提交审批！';
$lang->lieu->waitingLieus       = '有调休记录处于审批流程中，请审批完再更改审批设置。';
