<table class='table table-hover table-bordered table-fixed'>
  <thead>
    <tr class='text-center'>
      <th class='w-100px'><?php echo $lang->my->company->account?></th>
      <th class='w-160px'><?php echo $lang->effort->weekly->dateRange;?></th>
      <th class='w-200px'><?php echo $lang->effort->weekly->title;?></th>
      <th><?php echo $lang->effort->weekly->summary;?></th>
      <th class='w-140px'><?php echo $lang->effort->weekly->createdDate;?></th>
      <th class='w-60px'><?php echo $lang->actions;?></th>
    </tr>
  </thead>
  <?php foreach($dataList as $account => $weeklyList):?>
  <?php foreach($weeklyList as $weekly):?>
  <tr class='text-center'>
    <td><?php echo zget($users, $account);?></td>
    <td><?php echo $weekly->begin . '~' . $weekly->end;?></td>
    <td class='text-left'><?php echo $weekly->title;?></td>
    <td class='text-left'><?php echo $weekly->summary;?></td>
    <td><?php echo $weekly->createdDate;?></td>
    <td><?php commonModel::printLink('effort', 'viewWeekly', "id=$weekly->id&from=company", $lang->view);?></td>
  </tr>
  <?php endforeach;?>
  <?php endforeach;?>
  <tfoot>
    <tr><td colspan='6'><?php $pager->show('right', 'short');?></td></tr>
  </tfoot>
</table>
