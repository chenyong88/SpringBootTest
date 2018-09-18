<?php
if(!isset($lang->lieu)) $lang->lieu = new stdclass();
$lang->lieu->common = 'Lieu';
$lang->lieu->browse = 'Lieus';
$lang->lieu->create = 'Create';
$lang->lieu->edit   = 'Edit';
$lang->lieu->view   = 'View';
$lang->lieu->delete = 'Delete';
$lang->lieu->review = 'Review';
$lang->lieu->cancel = 'Cancel';
$lang->lieu->commit = 'Commit';

$lang->lieu->personal     = 'My Lieus';
$lang->lieu->browseReview = 'Reviews';
$lang->lieu->company      = 'All';
$lang->lieu->setReviewer  = 'Settings';
$lang->lieu->batchReview  = 'Batch Review';
$lang->lieu->batchPass    = 'Batch Pass';

$lang->lieu->id           = 'ID';
$lang->lieu->year         = 'Year';
$lang->lieu->begin        = 'Begin';
$lang->lieu->end          = 'End';
$lang->lieu->start        = 'Start';
$lang->lieu->finish       = 'Finish';
$lang->lieu->hours        = 'Hours';
$lang->lieu->overtime     = 'Overtimes';
$lang->lieu->status       = 'Status';
$lang->lieu->desc         = 'Description';
$lang->lieu->createdBy    = 'Created By';
$lang->lieu->createdDate  = 'Created On';
$lang->lieu->reviewedBy   = 'Reviewed By';
$lang->lieu->reviewedDate = 'Reviewed On';
$lang->lieu->date         = 'Date';
$lang->lieu->time         = 'Time';
$lang->lieu->rejectReason = 'Reject Reason';

$lang->lieu->statusList['draft']  = 'Draft';
$lang->lieu->statusList['wait']   = 'Wait';
$lang->lieu->statusList['doing']  = 'Doing';
$lang->lieu->statusList['pass']   = 'Pass';
$lang->lieu->statusList['reject'] = 'Reject';

$lang->lieu->confirmReview['pass']   = 'Are you sure to pass it?';
$lang->lieu->confirmReview['reject'] = 'Are you sure to reject it?';

$lang->lieu->notExist      = 'The record nto exist';
$lang->lieu->checkHours    = 'Check Hours';
$lang->lieu->denied        = 'Access denied.';
$lang->lieu->unique        = 'There was a record of lieu in %s.';
$lang->lieu->sameMonth     = 'Lieu must be in the same month.';
$lang->lieu->wrongEnd      = 'End time should be greater than begin time.';
$lang->lieu->nodata        = 'Select no data.';
$lang->lieu->reviewSuccess = 'Review success';
$lang->lieu->wrongHours    = 'Overtime <strong>%s</strong> hours. Lieu hours can not be greater than overtime hours.';
$lang->lieu->nobccomp      = 'Please install the extension php-bcmath.';

$lang->lieu->hoursTip = 'Hours';

$lang->lieu->checkHoursList['0'] = 'Not check';
$lang->lieu->checkHoursList['1'] = 'Lieu hours can not be greater than overtime hours (%s)';

$lang->lieu->reviewStatusList['pass']   = 'Pass';
$lang->lieu->reviewStatusList['reject'] = 'Reject';
