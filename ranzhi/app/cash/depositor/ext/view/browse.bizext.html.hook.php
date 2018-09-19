<div class='companyInfo hide'>
  <?php foreach($depositors as $depositor):?>
  <div id="company<?php echo $depositor->id;?>">
    <dl class='dl-horizontal'>
      <dt><?php echo $lang->depositor->company . $lang->colon;?></dt>
      <dd><?php echo zget($companys, $depositor->company, '');?></dd>
    </dl>
  </div>
  <?php endforeach;?>
</div>

<script>
$('.card-caption.row').each(function()
{
    var currentID = $(this).data('id');
    $(this).prepend($('.companyInfo #company' + currentID).html());
})
</script>
