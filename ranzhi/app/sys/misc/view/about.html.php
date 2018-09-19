<style>
#aboutNav {margin: 10px 0;}
#aboutNav > li > a {display: block; padding: 7px 8px 7px 40px;}
#aboutNav > li > a:hover, #aboutNav > li > a:active {background-color: #e5e5e5; text-decoration: none;}
</style>
<div class='row'>
  <div class='col-xs-6 text-center'>
    <?php echo html::image($this->config->webRoot . 'theme/default/images/main/logo.png'); ?>
    <h4><?php printf($lang->misc->version, $config->version);?></h4>
  </div>
  <div class='col-xs-6' style='border-left: 1px solid #ddd'>
    <ul class='list-unstyled' id='aboutNav'>
      <li><?php echo html::a($lang->misc->offcialSite['url'], "<i class='icon-globe'></i> " . $lang->misc->offcialSite['label'], "target='_blank'")?></li>
      <li><?php echo html::a($lang->misc->support['url'], "<i class='icon-question-sign'></i> " . $lang->misc->support['label'], "target='_blank'")?></li>
      <li><?php echo html::a($lang->misc->userbook['url'], "<i class='icon-book'></i> " . $lang->misc->userbook['label'], "target='_blank'")?></li>
      <li><?php echo html::a($lang->misc->forum['url'], "<i class='icon-comments-alt'></i> " . $lang->misc->forum['label'], "target='_blank'")?></li>
    </ul>
  </div>
</div>
