<?php
if(!empty($config->refund->multiReviewer))
{
    $config->refund->search['fields']['reviewers'] = $lang->refund->reviewers;
    $config->refund->search['params']['reviewers'] = array('operator' => 'include', 'control' => 'select',  'values' => 'users');

    unset($config->refund->search['fields']['firstReviewer']);
    unset($config->refund->search['fields']['firstReviewDate']);
    unset($config->refund->search['fields']['secondReviewer']);
    unset($config->refund->search['fields']['secondReviewDate']);
    unset($config->refund->search['params']['firstReviewer']);
    unset($config->refund->search['params']['firstReviewDate']);
    unset($config->refund->search['params']['secondReviewer']);
    unset($config->refund->search['params']['secondReviewDate']);
}
