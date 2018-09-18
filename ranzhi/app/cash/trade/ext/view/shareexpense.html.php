<table class='table table-condensed table-borderless'>
  <tr class='text-center'>
    <th><?php echo $lang->trade->expenseDept;?></th>
    <?php if($trade->expenses):?>
    <th><?php echo $lang->trade->expenseCategory;?></th>
    <?php endif;?>
    <th class='w-120px'><?php echo $lang->trade->money;?></th>
    <th class='w-120px'><?php echo $lang->trade->shareRate;?></th>
    <th class='w-80px'><?php echo $lang->actions;?></th>
  </tr>
  <?php foreach($trade->expenses as $expense):?>
  <tr>
    <td><?php echo html::select('expenseDept[]', $deptList, $expense->dept, "class='form-control chosen'");?></td>
    <td><?php echo html::select('expenseCategory[]', $expenseList, $expense->category, "class='form-control' disabled='disabled'");?></td>
    <td><?php echo html::input('money[]', $expense->money, "class='form-control'");?></td>
    <td>
      <div class='input-group'>
        <?php echo html::input('rate[]', round($expense->money / ($trade->money * $trade->exchangeRate) * 100, 2), "class='form-control'");?>
        <span class='input-group-addon'>%</span>
      </div>
    </td>
    <td class='text-center text-middle'>
      <a class='btn btn-xs addItem'><i class='icon icon-plus'></i></a>
      <a class='btn btn-xs delItem'><i class='icon icon-remove'></i></a>
    </td>
  </tr>
  <?php endforeach;?>
  <?php for($i = 0; $i < $config->trade->shareCount - count($trade->expenses); $i++):?>
  <tr>
    <td><?php echo html::select('expenseDept[]', $deptList, '', "class='form-control'");?></td>
    <?php if($trade->expenses):?>
    <td><?php echo html::select('expenseCategory[]', $expenseList, '', "class='form-control chosen' disabled='disabled'");?></td>
    <?php endif;?>
    <td><?php echo html::input('money[]', '', "class='form-control'");?></td>
    <td>
      <div class='input-group'>
        <?php echo html::input('rate[]', '', "class='form-control'");?>
        <span class='input-group-addon'>%</span>
      </div>
    </td>
    <td class='text-center text-middle'>
      <a class='btn btn-xs addItem'><i class='icon icon-plus'></i></a>
      <a class='btn btn-xs delItem'><i class='icon icon-remove'></i></a>
    </td>
  </tr>
  <?php endfor;?>
  <tr>
    <th class='text-center'><?php echo $lang->trade->total;?></th>
    <?php if($trade->expenses):?>
    <td></td>
    <?php endif;?>
    <th id='totalMoney' class='text-right'></th>
    <th id='totalRate' class='text-right'></th>
    <td></td>
  </tr>
  <tr>
    <?php $colspan = $trade->expenses ? '3' : '2';?>
    <td class='text-right' colspan='<?php echo $colspan;?>'>
      <span class='text-danger pull-left shareTips'><strong><?php echo $lang->trade->shareExpenseTips;?></strong></span>
      <?php echo html::submitButton();?>
    </td>
    <td></td>
    <td></td>
  </tr>
</table>
