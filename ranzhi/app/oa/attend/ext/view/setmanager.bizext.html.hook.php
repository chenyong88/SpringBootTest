<?php if(commonModel::hasPriv('attend', 'importSettings')):?>
<?php $settings = '<li>' . html::a(inlink('importSettings'), $lang->attend->importSettings) . '</li>';?>
<script>
$('.menu .nav').append(<?php echo helper::jsonEncode($settings);?>);
</script>
<?php endif;?>
