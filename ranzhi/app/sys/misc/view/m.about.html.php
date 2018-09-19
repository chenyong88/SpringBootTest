<style>
#aboutContent > img {margin: 1rem 0}
#aboutContent > .nav {-webkit-flex-wrap: wrap; flex-wrap: wrap; width: 10rem; margin: 1rem auto}
#aboutContent > .nav > a {width: 50%}
</style>

<div class='heading divider'>
  <div class='title'><strong><?php echo $lang->about ?></strong></div>
  <nav class='nav'><a data-dismiss='display'><i class='icon-remove muted'></i></a></nav>
</div>

<div class='content box text-center' id='aboutContent'>
  <img src='<?php echo $config->webRoot . 'mobile/img/logo.png' ?>' alt='<?php echo $lang->ranzhi ?>'>
  <h4><?php printf($lang->misc->version, $config->version);?></h4>
  <nav class='nav'>
    <?php echo html::a('http://www.ranzhico.com', "<i class='icon-globe'></i>&nbsp;" . $lang->misc->offcialSite, "target='_blank'")?>
    <?php echo html::a('https://www.ranzhico.com/page/support.html', "<i class='icon-question-sign'></i>&nbsp;" . $lang->misc->support, "target='_blank'")?>
    <?php echo html::a('https://www.ranzhico.com/book/', "<i class='icon-book'></i>&nbsp;" . $lang->misc->userbook, "target='_blank'")?>
    <?php echo html::a('https://www.ranzhico.com/forum/', "<i class='icon-comments-alt'></i>&nbsp;" . $lang->misc->forum, "target='_blank'")?>
  </nav>
</div>
