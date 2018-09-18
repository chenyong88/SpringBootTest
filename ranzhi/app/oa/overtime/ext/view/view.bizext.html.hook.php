<?php if(!empty($config->overtime->multiReviewer)):?>
<?php 
$reviewedBy = '';
$reviewers  = '';

if(strpos(',wait,doing,', ",$overtime->status,") !== false)
{
    $reviewedBy = zget($users, $overtime->assignedTo);
}
else
{
    $reviewedBy = zget($users, $overtime->reviewedBy);
}

if(isset($overtime->reviewers) && is_array($overtime->reviewers))
{
    $reviewers  = '<tr>';
    $reviewers .= "<th>{$lang->overtime->reviewers}</th>";
    $reviewers .= "<td colspan='3'>";
    foreach($overtime->reviewers as $reviewer => $status)
    {
        $reviewers .= "<span class='overtime-{$status}'>" . zget($users, $reviewer) . '</span>';
    }
    $reviewers .= '</td>';
    $reviewers .= '</tr>';
}
?>
<script>
$('#reviewedBy').html('<?php echo $reviewedBy;?>');
<?php if($reviewers):?>
$('.overtimeTable').append(<?php echo helper::jsonEncode($reviewers);?>);
<?php endif;?>
</script>
<?php endif;?>
