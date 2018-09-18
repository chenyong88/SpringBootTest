<?php if(!empty($config->makeup->multiReviewer)):?>
<?php 
$reviewedBy = '';
$reviewers  = '';

if(strpos(',wait,doing,', ",$makeup->status,") !== false)
{
    $reviewedBy = zget($users, $makeup->assignedTo);
}
else
{
    $reviewedBy = zget($users, $makeup->reviewedBy);
}

if(isset($makeup->reviewers) && is_array($makeup->reviewers))
{
    $reviewers  = '<tr>';
    $reviewers .= "<th>{$lang->makeup->reviewers}</th>";
    $reviewers .= "<td colspan='3'>";
    foreach($makeup->reviewers as $reviewer => $status)
    {
        $reviewers .= "<span class='makeup-{$status}'>" . zget($users, $reviewer) . '</span>';
    }
    $reviewers .= '</td>';
    $reviewers .= '</tr>';
}
?>
<script>
$('#reviewedBy').html('<?php echo $reviewedBy;?>');
<?php if($reviewers):?>
$('.makeupTable').append(<?php echo helper::jsonEncode($reviewers);?>);
<?php endif;?>
</script>
<?php endif;?>
