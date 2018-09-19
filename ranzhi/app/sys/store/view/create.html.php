<?php 
/**
 * The create view file of store module of Ranzhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商业软件，非开源软件
 * @author      Chunsheng Wang <chunsheng@cnezsoft.com>
 * @package     store 
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */
?>
<?php include '../../common/view/header.modal.html.php';?>
<form action="<?php echo inlink('create');?>" id='ajaxForm' method='post'>
  <table class='table table-form'>
    <tr>
      <th class='w-70px'><?php echo $lang->store->name;?></th>
      <td><?php echo html::input('name', '', "class='form-control chosen'");?></td>
      <td class='w-40px'></td>
    </tr>
    <tr>
      <th><?php echo $lang->store->location;?></th>
      <td><?php echo html::input('location', '', "class='form-control'");?></td>
    </tr>
    <tr>
      <th><?php echo $lang->store->manager;?></th>
      <td><?php echo html::input('manager', '', "class='form-control'");?></td>
    </tr>
    <tr>
      <th><?php echo $lang->store->desc;?></th>
      <td><?php echo html::textarea('desc', '', "class='form-control' rows='4'");?></td>
    </tr>
    <tr>
      <th></th>
      <td><?php echo html::submitButton() . html::commonButton($lang->close, 'btn', "data-dismiss='modal'");?></td>
    </tr>
  </table>
</form>
<?php include '../../common/view/footer.modal.html.php';?>
