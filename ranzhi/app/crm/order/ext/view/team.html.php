<?php 
/**
 * The team view file of order module of RanZhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商业软件，非开源软件
 * @author      Tingting Dai <daitingting@xirangit.com>
 * @package     order 
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */
?>
<?php include '../../../../sys/common/view/header.modal.html.php';?>
<?php include '../../../../sys/common/view/chosen.html.php';?>
<?php $key = 0;?>
<form id='ajaxForm' method='post' action='<?php echo $this->createLink('crm.order', 'team', "orderID={$order->id}")?>'>
  <table class='table table-hover table-form no-td-padding'>
    <?php foreach($members as $member):?>
    <tr>
      <td><?php echo html::select("member[$key]", $users, $member->account, "id='member$key' class='form-control chosen' onchange='updateMember()' data-placeholder={$lang->team->account}")?></td>
      <td class='w-200px'><?php echo html::select("role[$key]", $roles, $member->role, "id='role$key' class='form-control chosen' data-placeholder={$lang->team->role}")?></td>
      <td class='w-100px'><i class='btn icon-plus'></i> <i class='btn icon-remove'></i></td>
    </tr>
    <?php $key++;?>
    <?php endforeach;?>
    <?php for($i = 0; $i < 3; $i++):?>
    <tr>
      <td><?php echo html::select("member[$key]", $users, '', "id='member$key' class='form-control chosen' onchange='updateMember()' data-placeholder={$lang->team->account}")?></td>
      <td class='w-200px'><?php echo html::select("role[$key]", $roles, '', "id='role$key' class='form-control chosen' data-placeholder={$lang->team->role}")?></td>
      <td class='w-100px'><i class='btn icon-plus'></i> <i class='btn icon-remove'></i></td>
    </tr>
    <?php $key++;?>
    <?php endfor;?>
    <tr><td colspan='3'><?php echo html::submitButton();?></td></tr>
  </table>
</form>
<script type='text/template' id='memberTpl'>
  <tr>
    <td><?php echo html::select("member[key]", $users, '', "id='memberkey' class='form-control chosen' onchange='updateMember()' data-placeholder={$lang->team->account}")?></td>
    <td class='w-200px'><?php echo html::select("role[key]", $roles, '', "id='rolekey' class='form-control chosen' data-placeholder={$lang->team->role}")?></td>
    <td class='w-100px'><i class='btn icon-plus'></i> <i class='btn icon-remove'></i></td>
  </tr>
</script>
<?php js::set('key', $key);?>
<?php include '../../../../sys/common/view/footer.modal.html.php';?>
