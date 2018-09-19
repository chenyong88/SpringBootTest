<table class='table table-condensed table-borderless'>
  <tr class='text-center'>
    <th><?php echo $lang->trade->fromDept;?></th>
    <th><?php echo $lang->trade->fromCategory;?></th>
    <th><?php echo $lang->trade->toDept;?></th>
    <th><?php echo $lang->trade->toCategory;?></th>
    <th class='w-100px'><?php echo $lang->trade->money;?></th>
    <th class='w-100px'><?php echo $lang->trade->shareRate;?></th>
    <th class='w-80px'><?php echo $lang->actions;?></th>
  </tr>
  <?php foreach($trade->deals as $deal):?>
  <tr>
    <td><?php echo html::select('fromDept[]', $deptList, $deal->fromDept, "class='form-control chosen'");?></td>
    <td><?php echo html::select('fromCategory[]', $expenseList, $deal->fromCategory, "class='form-control chosen'");?></td>
    <td><?php echo html::select('toDept[]', $deptList, $deal->toDept, "class='form-control chosen'");?></td>
    <td><?php echo html::select('toCategory[]', $incomeList, $deal->toCategory, "class='form-control chosen'");?></td>
    <td><?php echo html::input('money[]', $deal->money, "class='form-control'");?></td>
    <td>
      <div class='input-group'>
        <?php echo html::input('rate[]', round($deal->money / ($trade->money * $trade->exchangeRate) * 100, 2), "class='form-control'");?>
        <span class='input-group-addon'>%</span>
      </div>
    </td>
    <td class='text-center text-middle'>
      <a class='btn btn-xs addItem'><i class='icon icon-plus'></i></a>
      <a class='btn btn-xs delItem'><i class='icon icon-remove'></i></a>
    </td>
  </tr>
  <?php endforeach;?>
  <?php for($i = 0; $i < $config->trade->shareCount - count($trade->deals); $i++):?>
  <tr>
    <td><?php echo html::select('fromDept[]', $deptList, '', "class='form-control chosen'");?></td>
    <td><?php echo html::select('fromCategory[]', $expenseList, '', "class='form-control chosen'");?></td>
    <td><?php echo html::select('toDept[]', $deptList, '', "class='form-control chosen'");?></td>
    <td><?php echo html::select('toCategory[]', $incomeList, '', "class='form-control chosen'");?></td>
    <td><?php echo html::input('money[]', '', "class='form-control'");?></td>
    <td><?php echo html::input('rate[]', '', "class='form-control'");?></td>
    <td class='text-center text-middle'>
      <a class='btn btn-xs addItem'><i class='icon icon-plus'></i></a>
      <a class='btn btn-xs delItem'><i class='icon icon-remove'></i></a>
    </td>
  </tr>
  <?php endfor;?>
  <tr>
    <th class='text-center'><?php echo $lang->trade->total;?></th>
    <td colspan='3'></td>
    <th id='totalMoney' class='text-right'></th>
    <th id='totalRate' class='text-right'></th>
    <td></td>
  </tr>
  <tr>
    <td colspan='2'>
      <span class='text-danger shareTips'><strong><?php echo $lang->trade->shareIncomeTips;?></strong></span>
    </td>
    <td class='text-center'><?php echo html::submitButton();?></td>
    <td colspan='3'></td>
  </tr>
</table>
