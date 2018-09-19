<?php
/**
 * The batch edit view file of salary module of RanZhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商业软件，非开源软件
 * @author      Gang Liu <liugang@cnezsoft.com>
 * @package     salary 
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */
?>
<?php include '../../common/view/header.html.php';?>
<form id='ajaxForm' method='post' action='<?php echo inlink('batchEdit');?>'>
  <div class='panel'>
    <table class='table table-data table-hover text-center table-fixed tablesorter'>
      <tr class='text-center'>
        <th rowspan='2' class='text-middle'><?php echo $lang->salary->basic;?></th>
        <th rowspan='2' class='text-middle'><?php echo $lang->salary->benefit;?></th>
        <th colspan='<?php echo count($salary->bonusList);?>'><?php echo $lang->salary->bonus;?></th>
        <th colspan='<?php echo count($salary->allowanceList);?>'><?php echo $lang->salary->allowance;?></th>
        <th colspan='<?php echo count($salary->deductionList);?>'><?php echo $lang->salary->deduction;?></th>
        <th rowspan='2' class='text-middle'><?php echo $lang->salary->deserved;?></th>
        <th rowspan='2' class='text-middle'><?php echo $lang->salary->actual;?></th>
      </tr>
      <tr class='text-center'>
        <?php foreach($salary->bonusList as $bonus):?>
        <th><?php echo $bonus->type;?></th>
        <?php endforeach;?>
        <?php foreach($salary->allowanceList as $allowance):?>
        <th><?php echo $allowance->type;?></th>
        <?php endforeach;?>
        <?php foreach($salary->deductionList as $deduction):?>
        <th><?php echo $deduction->type;?></th>
        <?php endforeach;?>
      </tr>
      <tr class='text-center'>
        <td><?php echo $salary->basic;?></td>
        <td><?php echo $salary->benefit;?></td>
        <?php foreach($salary->bonusList as $bonus):?>
        <td><?php echo $bonus->amount;?></td>
        <?php endforeach;?>
        <?php foreach($salary->allowanceList as $allowance):?>
        <td><?php echo $allowance->amount;?></td>
        <?php endforeach;?>
        <?php foreach($salary->deductionList as $deduction):?>
        <td><?php echo $deduction->amount;?></td>
        <?php endforeach;?>
        <td><?php echo $salary->deserved;?></td>
        <td><?php echo $salary->actual;?></td>
      </tr>
      <?php foreach($salaryList as $salary):?>
      <tr>
        <td><?php echo zget($users, $salary->account);?></td>
        <td><?php echo html::input('basic', $salary->basic, "class='form-control'");?></td>
        <td><?php echo html::input('benefit', $salary->benefit, "class='form-control'");?></td>
        <?php foreach($salary->bonusList as $bonus):?>
        <td><?php echo html::input('amounts[]', $bonus->amount, "class='form-control bonus'");?></td>
        <?php endforeach;?>
        <?php foreach($salary->allowanceList as $allowance):?>
        <td><?php echo html::input('amounts[]', $allowance->amount, "class='form-control allowance'");?></td>
        <?php endforeach;?>
        <?php foreach($salary->deductionList as $deduction):?>
        <td><?php echo html::input('amounts[]', $deduction->amount, "class='form-control deduction'");?></td>
        <?php endforeach;?>
        <td><?php echo html::input('deserved', $salary->deserved, "class='form-control'");?></td>
        <td><?php echo html::input('actual', $salary->actual, "class='form-control'");?></td>
      </tr>
      <?php endforeach;?>
    </table>
    <div class='text-center'><?php echo html::submitButton();?></div>
  </div>
</form>
<?php include '../../common/view/footer.html.php';?>
