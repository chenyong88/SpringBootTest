<?php
/**
 * The build index view file of search module of Ranzhi.
 *
 * @copyright   Copyright 2009-2017 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商业软件，非开源软件
 * @author      Gang Liu <liugang@cnezsoft.com>
 * @package     search 
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */
?>
<?php include '../../../common/view/header.html.php';?>
<div class='panel'>
  <div class='panel-heading'><strong><i class='icon-refresh'></i> <?php echo $lang->search->buildIndex;?></strong></div>
  <div class='panel-body'>
    <div class='form-group'>
      <ul id='resultBox'></ul>
    </div>
    <div class='from-group'><?php echo html::a(inlink('buildIndex'), $lang->search->buildIndex, "class='btn btn-primary' id='execButton'");?></div>
  </div>
</div>
<?php include '../../../common/view/footer.html.php';?>
