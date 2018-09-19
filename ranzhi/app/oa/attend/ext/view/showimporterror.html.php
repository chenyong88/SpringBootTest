<?php
/**
 * The show import error view file of attend module of RanZhi.
 *
 * @copyright   Copyright 2009-2017 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Gang Liu <liugang@cnezsoft.com>
 * @package     attend 
 * @version     $Id$
 * @link        http://www.ranzhi.org
 */
?>
<?php include '../../../common/view/header.html.php';?>
<div id='menuActions'>
  <?php commonModel::printLink('attend', 'import', '', $lang->attend->import, "class='btn btn-primary' data-toggle='modal'");?>
  <?php commonModel::printLink('attend', 'exportDetail', '', $lang->attend->export, "class='iframe btn btn-primary'")?>
</div>
<div class='panel'>
  <div class='panel-heading'>
    <strong><?php echo $lang->attend->showImportError;?></strong>
  </div>
  <table class='table table-condensed table-bordered table-hover table-striped'>
    <?php if(is_array($errorList)):?>
    <?php foreach($errorList as $key => $error):?>
    <tr>
      <td class='w-80px'><?php printf($lang->attend->line, $key);?></td>
      <?php $datas = zget($error, 'data', array());?>
      <?php foreach($datas as $data):?>
      <td><?php echo $data;?></td>
      <?php endforeach;?>
      <td title='<?php echo zget($error, 'error', '');?>'><?php echo zget($error, 'error', '');?></td>
    </tr>
    <?php endforeach;?>
    <?php endif;?>
  </table>
</div>
<?php include '../../../common/view/footer.html.php';?>
