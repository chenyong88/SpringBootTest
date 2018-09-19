<?php
/**
 * The commission view file of commission module of RanZhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商业软件，非开源软件
 * @author      Gang Liu <liugang@cnezsoft.com>
 * @package     commission 
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */
?>
<?php include '../../common/view/header.html.php';?>
<form id='ajaxForm' method='post'>
  <div class='panel'>
    <div class='panel-heading'>
      <strong><?php echo $lang->commission->categoryTips;?></strong>
    </div>
    <div class='panel-body'>
    <?php echo html::checkbox('category', $categories, $config->commission->ignoredCategories, '', 'block');?>
    <?php echo html::submitButton() . html::hidden('postvar');?>
    </div>
  </div>
</form>
<?php include '../../common/view/footer.html.php';?>
