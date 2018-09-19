<?php 
/**
 * The actiontask view of product module of Ranzhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商业软件，非开源软件
 * @author      Xiying Guan <guanxiying@xirangit.com>
 * @package     product 
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */
?>
<?php include '../../../common/view/header.html.php';?>
<?php include 'bread.html.php';?>
<div class='panel'>
  <form method='post' id='ajaxForm'>
    <table class='table table-form'>
      <thead>
        <tr class='text-center'>
          <th><?php echo $lang->product->task->role;?></th>
          <th><?php echo $lang->product->task->name;?></th>
          <th class='w-100px'><?php echo $lang->product->task->days;?></th>
          <th class='w-100px'><?php echo $lang->product->task->estimate;?></th>
          <th><?php echo $lang->product->task->desc;?></th>
          <th class='w-100px'></th>
        </tr>
      </thead>
      <?php foreach($action->tasks as $task):?>
      <tr>
        <td><?php echo html::select('role[]', $roles, $task->role, "class='form-control'");?></td>
        <td><?php echo html::input("name[]", $task->name, "class='form-control'")?></td>
        <td class='w-150px'><?php echo html::select('days[]', $lang->product->task->daysOptions, $task->days, "class='form-control'");?></td>
        <td><?php echo html::input("estimate[]", $task->estimate, "class='form-control'")?></td>
        <td><?php echo html::textarea("desc[]", $task->desc, "class='form-control' rows='1'")?></td>
        <td>
          <?php echo html::a('javascript:;', $lang->add, "class='plus'")?>
          <?php echo html::a('javascript:;', $lang->delete, "class='condition-deleter'")?>
        </td>
      </tr>
      <?php endforeach;?>
      <tr><td colspan='4'><?php echo html::submitButton();?><?php commonModel::printLink('product', 'adminAction', "productID={$product->id}", $lang->goback, "class='btn btn-default'");?></td></tr>
    </table>
  </form>
  <table class='hide'>
    <tr id='originTR'>
      <td><?php echo html::select('role[]', $roles, '', "class='form-control'");?></td>
      <td><?php echo html::input('name[]', '', "class='form-control'")?></td>
      <td class='w-150px'><?php echo html::select('days[]', $lang->product->task->daysOptions, '', "class='form-control'");?></td>
      <td><?php echo html::input("estimate[]", '', "class='form-control'")?></td>
      <td><?php echo html::textarea("desc[]", '', "class='form-control' rows='1'")?></td>
      <td>
        <?php echo html::a('javascript:;', $lang->add, "class='plus'")?>
        <?php echo html::a('javascript:;', $lang->delete, "class='condition-deleter'")?>
      </td>
    </tr>
  </table>
</div>
<?php include '../../../common/view/footer.html.php';?>
