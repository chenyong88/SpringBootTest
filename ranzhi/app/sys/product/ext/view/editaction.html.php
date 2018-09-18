<?php 
/**
 * The edit action view file of product module of Ranzhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商业软件，非开源软件
 * @author      Xiying Guan <guanxiying@xirangit.com>
 * @package     product 
 * @version     $Id $
 * @link        http://www.ranzhico.com
 */
?>
<?php include '../../../common/view/header.modal.html.php'; ?>
<form method='post' action="<?php echo inlink('editaction', "actionID={$action->id}");?>" id='ajaxForm'>
  <table class='table table-form'>
    <tr>
      <th class='w-60px'><?php echo $lang->product->action->name;?></th>
      <td><?php echo html::input('name', $action->name, "class='form-control'");?></td>
    </tr>
    <tr>
      <th><?php echo $lang->product->action->action;?></th>
      <td><?php echo html::input('action', $action->action, "class='form-control'");?></td>
    </tr>
    <tr>
      <th></th>
      <td><?php echo html::submitButton();?></td>
    </tr>
  </table>
</form>
<?php include '../../../common/view/footer.modal.html.php'; ?>
