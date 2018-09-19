<?php 
/**
 * The tasks view file of order module of Ranzhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商业软件，非开源软件
 * @author      Xiying Guan <guanxiying@xirangit.com>
 * @package     order 
 * @version     $Id $
 * @link        http://www.ranzhico.com
 */
?>
<?php include '../../../common/view/header.html.php';?>
<?php js::set('key', count($action->tasks));?>
<div class='panel'>
  <div class='panel-heading'>
    <strong><i class="icon-plus"></i> <?php echo $lang->product->action->tasks;?></strong>
  </div>
  <div class='panel-body'>
    <form method='post' id='ajaxForm'>
      <table class='table table-form'>
        <tr class='text-center'>
          <th class='w-120px'><?php echo $lang->task->assignedTo;?></th>
          <th><?php echo $lang->task->name;?></th>
          <th class='w-160px'><?php echo $lang->task->estStarted;?></th>
          <th class='w-120px'><?php echo $lang->task->estimate;?></th>
          <th><?php echo $lang->task->desc;?></th>
        </tr>
        <?php foreach($action->tasks as $task):?>
        <tr>
          <th><?php echo $this->user->printSelect('assignedTo[]', isset($team[$task->role]) ? $team[$task->role] : '', "class='form-control'");?></th>
          <td><?php echo html::input("name[]", $task->name, "class='form-control'")?></td>
          <td><?php echo html::input("estStarted[]", date('Y-m-d', strtotime("+{$task->days} days")), "class='form-control'"); ?></td>
          <td><?php echo html::input("estimate[]", $task->estimate, "class='form-control'")?></td>
          <td><?php echo html::input("desc[]", $task->desc, "class='form-control'")?></td>
          <td>
            <?php echo html::a('javascript:;', $lang->add, "class='plus'")?>
            <?php echo html::a('javascript:;', $lang->delete, "class='condition-deleter'")?>
          </td>
        </tr>
        <?php endforeach;?>
        <tr><td colspan='3'><?php echo html::submitButton();?></td></tr>
      </table>
    </form>
    <table class='hide'>
      <tr id='originTR'>
        <th><?php echo $this->user->printSelect('assignedTo[]', '', "class='form-control'");?></th>
        <td><?php echo html::input("estStarted[]", '', "class='form-control'"); ?></td>
        <td><?php echo html::input("name[]", '', "class='form-control'")?></td>
        <td>
          <?php echo html::a('javascript:;', $lang->add, "class='plus'")?>
          <?php echo html::a('javascript:;', $lang->delete, "class='condition-deleter'")?>
        </td>
      </tr>
    </table>
  </div>
</div>
<?php include '../../../common/view/footer.html.php';?>
