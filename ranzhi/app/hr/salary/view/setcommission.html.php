<?php
/**
 * The edit view file of salary module of Ranzhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商业软件，非开源软件
 * @author      Gang Liu <liugang@cnezsoft.com>
 * @package     salary 
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */
?>
<?php include '../../../sys/common/view/header.modal.html.php';?>
<?php include '../../../sys/common/view/chosen.html.php';?>
<form id='commissionForm' method='post' action='<?php echo inlink('setCommission', "salaryID={$salaryID}");?>'>
  <table class='table table-condensed table-bordered table-hover text-center text-middle'>
    <thead>
      <tr class='text-center'>
        <th class='w-80px'><?php echo $lang->commission->type;?></th>
        <th class='w-180px'><?php echo $lang->salary->lineList;?></th>
        <th><?php echo $lang->salary->amount;?></th>
        <th><?php echo $lang->salary->rate;?></th>
        <th><?php echo $lang->salary->commission;?></th>
        <th class='w-90px'></th>
      </tr>
    </thead>
    <?php $i = 0;?>
    <?php foreach($commissionList as $commission):?>
    <tr>
      <?php if($commission->type == 'sale' || $i == 0):?>
      <th id='<?php echo "rowspan{$commission->type}";?>' class='text-center text-middle' rowspan='<?php echo $commission->type == 'line' ? count($commissionList) - 1 : '';?>'>
        <?php echo $lang->commission->typeList[$commission->type];?>
      </th>
      <?php endif;?>
      <?php 
          if($commission->type == 'line')
          {
              echo '<td>' . html::select('lines[]', $lineList, $commission->line, "class='form-control chosen'") . '</td>';
              echo '<td>' . html::input('amounts[]', $commission->amount, "class='form-control'") . '</td>';
              echo '<td>';
              echo "<div class='input-group'>";
              echo html::input('rates[]', $commission->rate, "class='form-control'");
              echo "<span class='input-group-addon'>{$lang->percent}</span>";
              echo '</div>';
              echo '</td>';
          }
          else
          {
              echo '<td>' . html::hidden('lines[]', '') . '</td>';
              echo '<td>' . html::hidden('amounts[]', '') . '</td>';
              echo '<td>' . html::hidden('rates[]', '') . '</td>';
          }
      ?>  
      <td>
        <?php echo html::input('commissions[]', $commission->commission, "class='form-control'");?>
        <?php echo html::hidden('types[]', $commission->type);?>
      </td>
      <td>
        <?php if($commission->type == 'line'):?>
        <a href='#' class='btn btn-mini addCommission'><i class='icon-plus'></i></a> 
        <a href='#' class='btn btn-mini delCommission'><i class='icon-remove'></i></a> 
        <?php endif;?>
      </td>
    </tr>
    <?php if($commission->type == 'line') $i++;?>
    <?php endforeach;?>
    <tr>
      <th class='text-center'><?php echo $lang->salary->total;?></th>
      <td colspan='4' class='text-right totalCommission'></td>
      <td></td>
    </tr>
  </table>
  <div class='text-center'>
    <?php echo html::submitButton() . html::commonButton($lang->close, 'btn', "data-dismiss='modal'");?>
  </div>
</form>
<?php
$th      = "<th id='rowspanline' class='text-center text-middle'>{$lang->commission->typeList['line']}</th>";
$select  = html::select('lines[]', $lineList, '', "class='form-control'");
$itemRow = <<<EOT
  <tr>
    <td>{$select}</td>
    <td><input type="text" name="amounts[]" value="" class="form-control"></td>
    <td>
      <div class="input-group">
        <input type="text" name="rates[]"   value="" class="form-control">
        <span class="input-group-addon">{$lang->percent}</span>
      </div>
    </td>
    <td>
      <input type="text" name="commissions[]" value="" class="form-control">
      <input type="hidden" name="types[]" value="line">
    </td>
    <td>
      <a href="#" class="btn btn-mini addCommission"><i class="icon-plus"></i></a> 
      <a href="#" class="btn btn-mini delCommission"><i class="icon-remove"></i></a> 
    </td>
  </tr>
EOT;
js::set('itemTH', $th);
js::set('itemRow', $itemRow);
?>
<?php ?>
<?php include '../../../sys/common/view/footer.modal.html.php';?>
