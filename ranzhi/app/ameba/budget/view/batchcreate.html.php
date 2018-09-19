<?php
/**
 * The batch create view file of budget module of RanZhi.
 *
 * @copyright   Copyright 2009-2017 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Gang Liu <liugang@cnezsoft.com>
 * @package     budget 
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */
?>
<?php include '../../common/view/header.html.php';?>
<?php include '../../../sys/common/view/chosen.html.php';?>
<div class='panel'>
  <div class='panel-heading'>
    <strong><?php echo $lang->budget->batchCreate;?></strong>
  </div>
  <form id='ajaxForm' method='post'>
    <table class='table table-borderless'>
      <thead>
      <tr class='text-center'>
        <th class='w-100px required'><?php echo $lang->budget->year;?></th>
        <th class='w-160px required'><?php echo $lang->budget->dept;?></th>
        <th class='w-120px required'><?php echo $lang->budget->amebaAccount;?></th>
        <th class='w-160px'><?php echo $lang->budget->line;?></th>
        <th class='w-240px required'><?php echo $lang->budget->category;?></th>
        <th class='w-150px'><?php echo $lang->budget->lastMoney;?></th>
        <th class='w-150px required'><?php echo $lang->budget->money;?></th>
        <th><?php echo $lang->budget->desc;?></th>
      </tr>
      </thead>
      <?php for($i = 0; $i < $config->budget->batchCreateCount; $i++):?>
      <tr>
        <td><?php echo html::select('year[]', $yearList, $year, "class='form-control chosen'");?></td>
        <td><?php echo html::select('dept[]', $deptList, $this->app->user->dept, "class='form-control chosen'");?></td>
        <td><?php echo html::select('amebaAccount[]', $lang->budget->amebaAccountList, '', "class='form-control chosen'");?></td>
        <td><?php echo html::select('line[]', $productLines, '', "class='form-control chosen'");?></td>
        <td><?php echo html::select('category[]', $categoryList, '', "class='form-control chosen'");?></td>
        <td><?php echo html::input('lastMoney[]', '', "class='form-control' disabled='disabled'");?></td>
        <td><?php echo html::input('money[]', '', "class='form-control'");?></td>
        <td><?php echo html::textarea('desc[]', '', "rows='1' class='form-control'");?></td>
      </tr>
      <?php endfor;?>
    </table>
    <div class='page-actions'>
      <?php echo html::submitButton();?>
      <?php echo html::backButton();?>
      <span class='text-danger'><strong><?php echo $lang->budget->tips->empty;?></strong></span>
    </div>
  </form>
</div>
<?php include '../../common/view/footer.html.php';?>
