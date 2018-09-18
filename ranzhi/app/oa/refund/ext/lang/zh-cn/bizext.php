<?php
$lang->refund->reviewers      = '审批人';
$lang->refund->multiReviewer  = '多级审批';
$lang->refund->copyReviewer   = '复制审批流程';
$lang->refund->selectReviewer = '请选择一个审批流程来复制';

global $config;
if(!empty($config->refund->multiReviewer))
{
    $lang->refund->reviewedBy = '当前审批人';
}

$lang->refund->multiReviewerStatusList[1] = '开启';
$lang->refund->multiReviewerStatusList[0] = '关闭';

$lang->refund->emptyDeptOrManager = '报销的审批人是部门经理。您尚未设置所属部门或者所属部门尚未设置部门经理，不能提交审批！';
$lang->refund->waitingRefunds     = '有报销记录处于审批流程中，请审批完再更改审批设置。';
