<?php if(!empty($config->refund->multiReviewer)):?>
<?php
$reviewedBy = '';
$reviewers  = '';

if(strpos(',wait,doing,', ",$refund->status,") !== false)
{
    $reviewedBy = zget($users, $refund->assignedTo);
}
elseif($refund->reviewers)
{
    $reviewers  = array_keys($refund->reviewers);
    $reviewedBy = zget($users, end($reviewers));
}

$reviewedBy = <<<EOT
<tr>
  <th>{$lang->refund->reviewedBy}</th>
  <td>{$reviewedBy}</td>
</tr>
EOT;

if(isset($refund->reviewers) && is_array($refund->reviewers))
{
    $reviewers  = '<tr>';
    $reviewers .= "<th>{$lang->refund->reviewers}</th>";
    $reviewers .= "<td colspan='3'>";
    foreach($refund->reviewers as $reviewer => $status)
    {
        $reviewers .= "<span class='refund-$status'>" . zget($users, $reviewer) . '</span>';
    }
    $reviewers .= '</td>';
    $reviewers .= '</tr>';
}
?>
<script>
<?php if($reviewedBy):?>
$('#firstReviewer').before(<?php echo helper::jsonEncode($reviewedBy);?>);
<?php endif;?>
<?php if($reviewers):?>
$('#firstReviewer').before(<?php echo helper::jsonEncode($reviewers);?>);
$('#firstReviewer, #secondReviewer').remove();
<?php endif;?>
</script>
<?php endif;?>
