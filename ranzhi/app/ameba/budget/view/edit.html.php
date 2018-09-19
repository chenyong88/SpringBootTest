<?php
/**
 * The edit view file of budget module of RanZhi.
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
<form id='ajaxForm' method='post' action='<?php echo inlink('edit', "budgetID=$budget->id");?>'>
  <table class='table table-form'>
    <tr>
      <th class='w-80px'><?php echo $lang->budget->year;?></th>
      <td class='w-300px'><?php echo html::select('year', $yearList, $budget->year, "class='form-control chosen'");?></td>
      <td></td>
    </tr>
    <tr>
      <th><?php echo $lang->budget->amebaAccount;?></th>
      <td><?php echo html::select('amebaAccount', $lang->budget->amebaAccountList, $budget->amebaAccount, "class='form-control chosen'");?></td>
      <td></td>
    </tr>
    <tr>
      <th><?php echo $lang->budget->line;?></th>
      <td><?php echo html::select('line', $productLines, $budget->line, "class='form-control chosen'");?></td>
      <td></td>
    </tr>
    <tr>
      <th><?php echo $lang->budget->category;?></th>
      <td><?php echo html::select('category', $categoryList, $budget->category, "class='form-control chosen'");?></td>
      <td></td>
    </tr>
    <tr>
      <th><?php echo $lang->budget->lastMoney;?></th>
      <td><?php echo html::input('lastMoney', '', "class='form-control' disabled='disabled'");?></td>
      <td></td>
    </tr>
    <tr>
      <th><?php echo $lang->budget->money;?></th>
      <td><?php echo html::input('money', $budget->money, "class='form-control'");?></td>
      <td></td>
    </tr>
    <tr>
      <th><?php echo $lang->budget->desc;?></th>
      <td colspan='2'><?php echo html::input('desc', $budget->desc, "class='form-control'");?></td>
    </tr>
    <tr>
      <th></th>
      <td colspan='2'>
        <?php echo html::hidden('dept', $budget->dept);?>
        <?php echo html::submitButton();?>
      </td>
    </tr>
  </table>
</form>
<?php include '../../../sys/common/view/footer.modal.html.php';?>
