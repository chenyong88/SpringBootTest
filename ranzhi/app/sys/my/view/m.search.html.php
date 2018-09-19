<?php
/**
 * The search mobile view file of my module of RanZhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Gang Liu <liugang@cnezsoft.com>
 * @package     my
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */

if($extView = $this->getExtViewFile(__FILE__)){include $extView; return helper::cd();}

include "../../common/view/m.header.html.php";
?>

<div class='heading divider'>
  <div class='title'><i class='icon icon-search'></i> <strong><?php echo $lang->search->index;?></strong></div>
</div>

<div class='control-group'>
  <?php echo html::input('words', $words, "class='input'");?>
  <div class='select' style='min-width: 5rem'>
    <?php echo html::select('module', $lang->searchObjects, $module);?> 
  </div>
  <a class='btn btn-search primary'><i class='icon icon-search icon-large'></i></a>
</div>
<section id='page' class='section list-with-actions list-with-pager list-scroll'>
  <?php $refreshUrl = $this->createLink('my', 'search', "recTotal={$pager->recTotal}&pageID={$pager->pageID}&words={$words}&module={$module}");?>
  <div class='list with-divider with-avatar' data-page='<?php echo $pager->pageID;?>' data-refresh-url='<?php echo $refreshUrl;?>'>
  <?php foreach($results as $object):?>
    <a data-id='<?php echo $object->id ?>' class='item item-contract multi-lines' href='<?php echo $object->url;?>'>
      <div class='content'>
        <div class='title'>
          <label class='label success'><?php echo $lang->searchObjects[$object->objectType];?></label>
          <?php echo $object->title;?>
        </div>
        <div><?php echo $object->summary;?></div>
      </div>
    </a>
  <?php endforeach;?>
  </div>
  <nav class='nav justify pager'>
    <?php $pager->show($align = 'justify');?>
  </nav>
  <nav class='nav nav-auto affix dock-bottom '>
    <?php echo html::a('javascript:history.go(-1);', $lang->goback, "class='btn primary'");?>
  </nav>
</section>
<script>
    $(function()
    {
        $('#searchbox #searchQuery').val(<?php echo json_encode($words)?>);
        $('.btn-search').click(function()
        {   
            var link = createLink('sys.my', 'search') + (config.requestType == 'GET' ? '&' : '?') + 'words=' + $('#words').val() + '&module=' + $('#module').val();
            window.location.href = link;
        });
    })
</script>
<?php include "../../common/view/m.footer.html.php";?>
