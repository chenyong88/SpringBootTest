<?php include '../../../common/view/header.html.php';?>
<?php include '../../../../sys/common/view/chosen.html.php';?>
<div class='panel'>
  <div class='panel-heading'><strong><?php echo $lang->user->importLDAP?></strong></div>
  <form id='ajaxForm' method='post'>
    <table class='table table-condensed table-striped table-hover'>
      <tr class='text-center'>
        <th class='w-50px'><?php echo $lang->user->id?></th>
        <th><?php echo $lang->user->ldapUser;?></th>
        <th class='account required'><?php echo $lang->user->ranzhiUser;?></th>
        <th class='required'><?php echo $lang->user->realname?></th>
        <th class='w-80px'><?php echo $lang->user->gender?></th>
        <th class='w-140px'><?php echo $lang->user->dept?></th>
        <th class='w-120px'><?php echo $lang->user->role?></th>
        <th class='w-120px'><?php echo $lang->user->group?></th>
        <th class='w-160px required'><?php echo $lang->user->email?></th>
      </tr>
      <?php foreach($ldapUsers as $i => $user):?>
      <tr class='text-middle'>
        <td class='text-center'><input type='checkbox' name='add[<?php echo $i?>]' value='<?php echo $i?>' checked=true class='add'><?php printf("%03d", $i + 1)?></td>
        <td title='<?php echo $user['account'];?>'><?php echo $user['account'] . "<input id='ldapAccount$i' name='ldapAccount[$i]' value='{$user['account']}' type='hidden' />"?></td>
        <td>
          <div class='input-group'>
            <span class='input-group-btn newAccount' style='display: none'><?php echo html::a('javascript:;', $lang->user->asLDAP, "class='btn btn-default asLDAP'");?></span>
            <?php echo html::input("newAccount[$i]", '', "id='newAccount$i' class='form-control newAccount' style='display: none'");?>
            <?php echo html::select("account[$i]", $users, '', "id='account$i' class='form-control chosen'");?>
            <span class='input-group-addon'>
              <label class='checkbox-inline'>
                <input type='checkbox' id='createAccount<?php echo $i;?>' name='createAccount[<?php echo $i;?>]' value='1'>
                <?php echo $lang->create;?>
              </label>
            </span>
          </div>
        </td>
        <td><?php echo html::input("realname[$i]", '', "id='realname$i' class='form-control'");?></td>
        <td><?php echo html::select("gender[$i]", $genders, $i == 0 ? '' : 'ditto', "class='form-control'");?></td>
        <td><?php echo html::select("dept[$i]", $depts, $i == 0 ? '' : 'ditto', "class='form-control chosen'");?></td>
        <td><?php echo html::select("role[$i]", $roles, $i == 0 ? '' : 'ditto', "class='form-control chosen'");?></td>
        <td><?php echo html::select("group[$i]", $groups, $i == 0 ? '' : 'ditto', "class='form-control chosen'");?></td>
        <td><?php echo html::input("email[$i]", $user['email'], "id='email$i' class='form-control'");?></td>
      </tr>
      <?php endforeach;?>
    </table>
    <div class='page-actions'>
      <div class='pull-left'>
        <?php if($ldapUsers):?>
        <div class='btn-group'>
          <a id='allCheck' class='btn' href='javascript:;' ><?php echo $lang->selectAll;?></a>
          <a id='reverseCheck' class='btn' href='javascript:;'><?php echo $lang->selectReverse;?></a>
        </div>
        <?php endif;?>
      </div>
      <?php echo html::submitButton();?>
      <?php echo html::backButton();?>
      <?php echo $lang->user->notice->checkbox;?>
      <?php $pager->show();?>
    </div>
  </form>
</div>
<?php include '../../../common/view/footer.html.php';?>
