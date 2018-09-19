<?php if(!empty($config->lieu->multiReviewer)):?>
<?php 
$reviewedBy = '';
$reviewers  = '';

if(strpos(',wait,doing,', ",$lieu->status,") !== false)
{
    $reviewedBy = zget($users, $lieu->assignedTo);
}
else
{
    $reviewedBy = zget($users, $lieu->reviewedBy);
}

if(isset($lieu->reviewers) && is_array($lieu->reviewers))
{
    $reviewers  = '<tr>';
    $reviewers .= "<th>{$lang->lieu->reviewers}</th>";
    $reviewers .= "<td colspan='3'>";
    foreach($lieu->reviewers as $reviewer => $status)
    {
        $reviewers .= "<span class='lieu-{$status}'>" . zget($users, $reviewer) . '</span>';
    }
    $reviewers .= '</td>';
    $reviewers .= '</tr>';
}
?>
<script>
$('#reviewedBy').html('<?php echo $reviewedBy;?>');
<?php if($reviewers):?>
$('.lieuTable').append(<?php echo helper::jsonEncode($reviewers);?>);
<?php endif;?>
</script>
<?php endif;?>
