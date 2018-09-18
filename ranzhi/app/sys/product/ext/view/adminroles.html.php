<?php 
/**
 * The admin roles view file of product module of Ranzhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商业软件，非开源软件
 * @author      Tingting Dai <daitingting@xirangit.com>
 * @package     product 
 * @version     $Id $
 * @link        http://www.ranzhico.com
 */
?>
<?php include '../../../common/view/header.modal.html.php';?>
<form id='ajaxForm' method='post' action='<?php echo inlink('adminRoles', "productID=$productID");?>'>
  <table class='table table-form'>
    <?php $key = 0;?>
    <?php foreach($roles as $value => $text):?>
    <tr>
      <td><?php echo html::input("code[$key]", $value, "id='code$key' class='form-control' placeholder={$lang->product->roleCode}");?></td>
      <td><?php echo html::input("name[$key]", $text,  "id='name$key' class='form-control' placeholder={$lang->product->roleName}");?></td>
      <td class='w-100px'>
        <i class='btn icon-plus'></i> 
        <i class='btn icon-remove'></i>
      </td>
    </tr>
    <?php $key++;?>
    <?php endforeach;?>
    <tr>
      <td><?php echo html::input("code[$key]", '', "id='code$key' class='form-control' placeholder={$lang->product->roleCode}");?></td>
      <td><?php echo html::input("name[$key]", '', "id='name$key' class='form-control' placeholder={$lang->product->roleName}");?></td>
      <td class='w-100px'>
        <i class='btn icon-plus'></i> 
        <i class='btn icon-remove'></i>
      </td>
    </tr>
    <tr><td colspan='3'><?php echo html::submitButton();?></td></tr>
  </table>
</form>
<script type='text/template' id='roleTpl'>
  <tr>
    <td><?php echo html::input('code[key]', '', "id='codekey' class='form-control' placeholder={$lang->product->roleCode}");?></td>
    <td><?php echo html::input('name[key]', '', "id='namekey' class='form-control' placeholder={$lang->product->roleName}");?></td>
    <td class='w-100px'><i class='btn icon-plus'></i> <i class='btn icon-remove'></i></td>
  </tr>
</script>
<?php js::set('key', ++$key);?>
<?php include '../../../common/view/footer.modal.html.php';?>
