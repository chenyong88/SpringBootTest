<?php $ldapHtml       = commonModel::hasPriv('user', 'importLDAP') ? html::a($this->createLink('user', 'importLDAP'), $lang->user->importLDAP, "class='btn btn-primary btn-xs'") : '';?>
<?php $unofficialHtml = html::a($this->createLink('user', 'admin', "deptID=&mode=unofficial"), $lang->user->unofficialList, "class='btn btn-primary pull-left' style='margin-left: 10px'");?>
<script language='Javascript'>
$(function()
{
    $('.row .col-md-2 .panel .panel-body').append(<?php echo helper::jsonEncode($ldapHtml)?>);
    $('.row .col-md-10 .panel .panel-heading .panel-actions').append(<?php echo helper::jsonEncode($unofficialHtml)?>);
})
</script>
