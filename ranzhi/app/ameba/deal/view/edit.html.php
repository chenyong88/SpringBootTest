<?php
/**
 * The edit view file of deal module of RanZhi.
 *
 * @copyright   Copyright 2009-2017 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Gang Liu <liugang@cnezsoft.com>
 * @package     deal 
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */
?>
<?php include '../../../sys/common/view/header.modal.html.php';?>
<?php include '../../../sys/common/view/chosen.html.php';?>
<?php include '../../../sys/common/view/datepicker.html.php';?>
<form id='ajaxForm' method='post' action='<?php echo inlink('edit', "dealID=$deal->id");?>'>
  <table class='table table-form'>
    <tr>
      <th class='w-100px'><?php echo $lang->deal->date;?></th>
      <td><?php echo html::input('date', $deal->date, "class='form-control form-date date-picker-down'");?></td>
      <td class='w-80px'></td>
    </tr>
    <tr>
      <th><?php echo $lang->deal->toDept;?></th>
      <td><?php echo html::select('toDept', $deptPairs, $deal->toDept, "class='form-control' disabled='disabled'");?></td>
      <td></td>
    </tr>
    <tr>
      <th><?php echo $lang->deal->category;?></th>
      <td><?php echo html::select('category', $categoryPairs, $deal->category, "class='form-control chosen'");?></td>
      <td></td>
    </tr>
    <tr>
      <th><?php echo $lang->deal->product;?></th>
      <td><?php echo html::select('product', $productPairs, $deal->product, "class='form-control chosen'");?></td>
      <td></td>
    </tr>
    <tr>
      <th><?php echo $lang->deal->type;?></th>
      <td><?php echo html::select('type', $lang->deal->typeList, $deal->type, "class='form-control'");?></td>
      <td></td>
    </tr>
    <tr>
      <th><?php echo $lang->deal->contract;?></th>
      <td>
        <div class='required required-wrapper'></div>
        <?php echo html::select('contract', $contractPairs, $deal->contract, "class='form-control chosen'");?>
      </td>
      <td></td>
    </tr>
    <tr>
      <th><?php echo $lang->deal->trade;?></th>
      <td><?php echo html::select('trade', $tradePairs, $deal->trade, "class='form-control chosen'");?></td>
      <td></td>
    </tr>
    <tr>
      <th><?php echo $lang->deal->money;?></th>
      <td><?php echo html::input('money', $deal->money, "class='form-control'");?></td>
      <td></td>
    </tr>
    <tr>
      <th><?php echo $lang->deal->desc;?></th>
      <td><?php echo html::input('desc', $deal->desc, "class='form-control'");?></td>
      <td></td>
    </tr>
    <tr>
      <th></th>
      <td colspan='2'><?php echo html::submitButton();?></td>
    </tr>
  </table>
</form>
<?php include '../../../sys/common/view/footer.modal.html.php';?>
