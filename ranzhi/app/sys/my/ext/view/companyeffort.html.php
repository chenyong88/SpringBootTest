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
  <?php foreach($dataList as $user => $efforts):?>
  <tr>
    <td class='text-center text-middle'><?php echo zget($deptList, $userDept[$user], ' ')?></td>
    <td class='text-center text-middle'><?php echo zget($users, $user)?></td>
    <?php foreach($dateList as $currentDate):?>
    <td>
      <?php foreach($efforts as $effort):?>
      <?php if($effort->date == date('Y-m-d', $currentDate)):?>
      <div class='text-nowrap text-ellipsis w-180px' title='<?php echo $effort->work?>'>
        <?php echo html::a($this->createLink('effort', 'view', "effortID={$effort->id}"), $effort->work, "data-toggle='modal' data-width='80%'")?>
      </div>
      <?php endif;?>
      <?php endforeach;?>
    </td>
    <?php endforeach;?>
  </tr>
  <?php endforeach;?>
</table>
