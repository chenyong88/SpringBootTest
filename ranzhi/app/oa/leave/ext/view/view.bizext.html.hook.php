<?php if(!empty($config->leave->multiReviewer)):?>
<?php 
$reviewedBy    = '';
$reviewers     = '';
$backReviewers = '';

if(strpos(',wait,doing,', ",$leave->status,") !== false)
{
    $reviewedBy = zget($users, $leave->assignedTo);
}
else
{
    $reviewedBy = zget($users, $leave->reviewedBy);
}

if(isset($leave->reviewers) && is_array($leave->reviewers))
{
    $reviewers  = '<tr>';
    $reviewers .= "<th>{$lang->leave->reviewers}</th>";
    $reviewers .= "<td colspan='3'>";
    foreach($leave->reviewers as $reviewer => $status)
    {
        $reviewers .= "<span class='leave-{$status}'>" . zget($users, $reviewer) . '</span>';
    }
    $reviewers .= '</td>';
    $reviewers .= '</tr>';
}

if(isset($leave->backReviewers) && is_array($leave->backReviewers))
{
    $backReviewers  = '<tr>';
    $backReviewers .= "<th>{$lang->leave->backReviewers}</th>";
    $backReviewers .= "<td colspan='3'>";
    foreach($leave->backReviewers as $reviewer => $status)
    {
        $backReviewers .= "<span class='leave-{$status}'>" . zget($users, $reviewer) . '</span>';
    }
    $backReviewers .= '</td>';
    $backReviewers .= '</tr>';
}
?>
<script>
$('#reviewedBy').html('<?php echo $reviewedBy;?>');
<?php if($reviewers):?>
$('.leaveTable').append(<?php echo helper::jsonEncode($reviewers);?>);
<?php endif;?>
<?php if($backReviewers):?>
$('.leaveTable').append(<?php echo helper::jsonEncode($backReviewers);?>);
<?php endif;?>
</script>
<?php endif;?>
