<?php
/**
 * The configure psi view file of setting module of RanZhi.
 *
 * @copyright   Copyright 2009-2017 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商业软件，非开源软件
 * @author      Gang Liu <liugang@cnezsoft.com>
 * @package     setting 
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */
?>
<?php include '../../../common/view/header.html.php';?>
<div class='panel'>
  <div class='panel-heading'>
    <strong><?php echo $lang->setting->psi;?></strong>
  </div>
  <form id='psiForm' method='post'>
    <table class='table table-form'>
      <tr>
        <th class='w-100px'><?php echo $lang->setting->status;?></th>
        <td><?php echo html::radio('turnon', $lang->setting->psiStatus, $config->psi->turnon);?></td>
      </tr>
      <tr>
        <th></th><td><?php echo html::submitButton();?></td>
      </tr>
    </table>
  </form>
</div>
<?php include '../../../common/view/footer.html.php';?>
