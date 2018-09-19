<?php
/**
 * The create view file of budget module of RanZhi.
 *
 * @copyright   Copyright 2009-2017 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Gang Liu <liugang@cnezsoft.com>
 * @package     budget 
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */
?>
<?php include '../../../sys/common/view/header.modal.html.php';?>
<?php include '../../../sys/common/view/chosen.html.php';?>
<form id='ajaxForm' method='post' action='<?php echo inlink('create');?>'>
  <table class='table table-form'>
    <tr>
      <th class='w-80px'><?php echo $lang->budget->year;?></th>
      <td class='w-300px'><?php echo html::select('year', $yearList, date('Y'), "class='form-control chosen'");?></td>
      <td></td>
    </tr>
    <tr>
      <th><?php echo $lang->budget->dept;?></th>
      <td><?php echo html::select('dept', $deptList, $this->app->user->dept, "class='form-control chosen'");?></td>
      <td></td>
    </tr>
    <tr>
      <th><?php echo $lang->budget->amebaAccount;?></th>
      <td><?php echo html::select('amebaAccount', $lang->budget->amebaAccountList, '', "class='form-control chosen'");?></td>
      <td></td>
    </tr>
    <tr>
      <th><?php echo $lang->budget->line;?></th>
      <td><?php echo html::select('line', $productLines, '', "class='form-control chosen'");?></td>
      <td></td>
    </tr>
    <tr>
      <th><?php echo $lang->budget->category;?></th>
      <td><?php echo html::select('category', $categoryList, '', "class='form-control chosen'");?></td>
      <td></td>
    </tr>
    <tr>
      <th><?php echo $lang->budget->lastMoney;?></th>
      <td><?php echo html::input('lastMoney', '', "class='form-control' disabled='disabled'");?></td>
      <td></td>
    </tr>
    <tr>
      <th><?php echo $lang->budget->money;?></th>
      <td><?php echo html::input('money', '', "class='form-control'");?></td>
      <td></td>
    </tr>
    <tr>
      <th><?php echo $lang->budget->desc;?></th>
      <td colspan='2'><?php echo html::input('desc', '', "class='form-control'");?></td>
    </tr>
    <tr>
      <th></th>
      <td colspan='2'><?php echo html::submitButton();?></td>
    </tr>
  </table>
</form>
<?php include '../../../sys/common/view/footer.modal.html.php';?>
