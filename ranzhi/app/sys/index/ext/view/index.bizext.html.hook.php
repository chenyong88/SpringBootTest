<div id='searchDIV' class='hide'>
  <?php $this->app->loadLang('search');?>
  <div class='input-group'>
    <?php echo html::input('words', '', "class='form-control'");?>
    <span class='input-group-btn'><?php echo html::a('#', $lang->search->common, "class='btn btn-primary searchBtn'");?></span>
  </div>
</div>
<div id="searchModal"></div>
<script>
  $('#bottomRightBar .bar-menu').prepend('<li>' + $('#searchDIV').html() + '</li>');
  $('#bottomRightBar .copyright a').html("<?php printf($lang->poweredBy, $config->version, str_replace('pro', $lang->proName . ' ', $config->version));?>");
</script>
