<?php if(commonModel::hasPriv('attend', 'import')):?>
<?php $importBtn = html::a(inlink('import'), $lang->attend->import, "class='btn btn-primary' data-toggle='modal'");?>
<script>
$('#menuActions').prepend(<?php echo helper::jsonEncode($importBtn);?>);
</script>
<?php endif;?>
