<?php
/**
 * The contact view file of my module of RanZhi.
 *
 * @copyright   Copyright 2009-2018 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Gang Liu <liugang@cnezsoft.com>
 * @package     my 
 * @version     $Id$
 * @link        http://www.ranzhi.org
 */
?>
<?php include './header.html.php';?>
<div class='panel'>
  <table class='table table-hover table-striped'>
    <thead>
    <tr class='text-center'>
      <th class='w-60px'><?php echo $lang->usercontact->id;?></th>
      <th class='w-200px text-left'><?php echo $lang->usercontact->name;?></th>
      <th class='text-left'><?php echo $lang->usercontact->member;?></th>
      <th class='w-120px text-right createContact'><?php commonModel::printLink('usercontact', 'create', '', '<i class="icon-plus"></i> ' . $lang->usercontact->create, "class='btn btn-primary' data-toggle='modal'");?></th>
    </tr>
    </thead>
    <?php foreach($contacts as $contact):?>
    <tr class='text-center'>
      <td><?php echo $contact->id;?></td>
      <td class='text-left'><?php echo $contact->name;?></td>
      <td class='text-left'><?php foreach($contact->member as $member) echo zget($users, $member) . ' ';?></td>
      <td class='actions'>
        <?php commonModel::printLink('usercontact', 'edit',   "contactID=$contact->id", $lang->edit,   "data-toggle='modal'");?>
        <?php commonModel::printLink('usercontact', 'delete', "contactID=$contact->id", $lang->delete, "class='deleter'");?>
      </td>
    </tr>
    <?php endforeach;?>
  </table>
</div>
<?php include '../../common/view/footer.html.php';?>
