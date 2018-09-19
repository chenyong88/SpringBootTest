<table class='table table-bordered datatable' data-fixed-Left-Width='200'>
  <thead>
    <tr class='text-center'>
      <th data-width='80' class='text-center'><?php echo $lang->my->company->dept?></th>
      <th data-width='80' class='text-center'><?php echo $lang->my->company->account?></th>
      <?php foreach($dateList as $currentDate):?>
      <th data-width='200' class='text-center flex-col'><?php echo date('Y-m-d', $currentDate)?></th>
      <?php endforeach;?>
    </tr>
  </thead>
  <?php foreach($dataList as $user => $todos):?>
  <tr>
    <td class='text-center text-middle'><?php echo zget($deptList, $userDept[$user], ' ')?></td>
    <td class='text-center text-middle'><?php echo zget($users, $user)?></td>
    <?php foreach($dateList as $currentDate):?>
    <td>
      <?php foreach($todos as $todo):?>
        <?php if($todo->date == date('Y-m-d', $currentDate)):?>
          <div class='text-nowrap text-ellipsis w-180px <?php echo $todo->status?>' title='<?php echo $todo->name?>'>
            <?php if(!empty($todo->begin)) echo "{$todo->begin}~{$todo->end}"?>
            <?php if($todo->type != 'leave' and $todo->type != 'trip'):?>
            <?php echo html::a($this->createLink('todo', 'view', "todoID={$todo->id}"), $todo->name, "data-toggle='modal' data-width='80%'")?>
            <?php elseif($todo->type == 'leave'):?>
            <div class='text-danger'><?php echo $todo->name;?>
            <?php else:?>
            <div class='text-warning'><?php echo $todo->name;?>
            <?php endif;?>
          </div>
        <?php endif;?>
      <?php endforeach;?>
    </td>
    <?php endforeach;?>
  </tr>
  <?php endforeach;?>
</table>
