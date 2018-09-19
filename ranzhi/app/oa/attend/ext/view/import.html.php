<?php
/**
 * The import view file of attend module of RanZhi.
 *
 * @copyright   Copyright 2009-2017 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Gang Liu <liugang@cnezsoft.com>
 * @package     attend 
 * @version     $Id$
 * @link        http://www.ranzhi.org
 */
?>
<?php include '../../../../sys/common/view/header.modal.html.php';?>
<form id='ajaxForm' method='post' enctype='multipart/form-data' action='<?php echo inlink('import');?>'>
  <table class='table table-form'>
    <tr>
      <th><?php echo $lang->attend->importFile;?></th>
      <td>
        <div class='input-group'>
          <?php echo html::file('files', "class='form-control'");?>
          <span class='input-group-addon'><?php echo $lang->attend->encode;?></span>
          <?php echo html::select('encode', $lang->attend->encodeList, '', "class='form-control'");?>
        </div>
      </td>
    </tr>
    <tr>
      <th></th>
      <td><?php echo html::submitButton() . $lang->attend->fileNode;?></td>
    </tr>
  </table>
</form>
<?php include '../../../../sys/common/view/footer.modal.html.php';?>
