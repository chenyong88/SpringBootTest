<?php
/**
 * The index view file of ldap module of ZenTaoPMS.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商业软件，非开源软件
 * @author      Yidong Wang <yidong@cnezsoft.com>
 * @package     ldap
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */
?>
<?php include '../../common/view/header.html.php';?>
<?php if(!extension_loaded('ldap')):?>
<div class='box-title'><?php echo $lang->ldap->noldap->header?></div>
<div class='box-content'><?php echo $lang->ldap->noldap->content?></div>
<?php else:?>
<div class='panel w-700px'>
  <div class='panel-heading'><strong><?php echo $lang->ldap->common;?></strong></div>
  <form method='post' id='ajaxForm'>
    <table class='table table-form'>
      <tr>
        <th class='text-danger'><?php echo $lang->ldap->base?></th>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <th class='w-100px'><?php echo $lang->ldap->turnon?></th>
        <td><?php echo html::select('turnon', $lang->ldap->turnonList, empty($ldapConfig->turnon) ? '' : $ldapConfig->turnon, "class='form-control'")?></td>
      </tr>
      <tr>
        <th><?php echo $lang->ldap->type?></th>
        <td><?php echo html::select('type', $lang->ldap->typeList, empty($ldapConfig->type) ? '' : $ldapConfig->type, "class='form-control'")?></td>
        <td>
          <?php $checked = isset($ldapConfig->anonymous) ? 'checked' : '';?>
          <label class="checkbox-inline"><input type="checkbox" id="anonymous" name="anonymous" value="1" <?php echo $checked?> ><?php echo $lang->ldap->anonymous?></label>
        </td>
      </tr>
      <tr>
        <th><?php echo $lang->ldap->host?></th>
        <td><?php echo html::input('host', empty($ldapConfig->host) ? '' : $ldapConfig->host, "class='form-control' autocomplete='off'")?></td>
        <td class='tips'><?php echo $lang->ldap->example . 'ldap.test.com'?></td>
      </tr>
      <tr>
        <th><?php echo $lang->ldap->port?></th>
        <td><?php echo html::input('port', empty($ldapConfig->port) ? '389' : $ldapConfig->port, "class='form-control' autocomplete='off'")?></td>
      </tr>
      <tr class='adshow'>
        <th><?php echo $lang->ldap->admin?></th>
        <td><?php echo html::input('admin', empty($ldapConfig->admin) ? '' : $ldapConfig->admin, "class='form-control' autocomplete='off'")?></td>
      </tr>
      <tr class='adshow'>
        <th><?php echo $lang->ldap->password?></th>
        <td>
          <input type='password' style="display:none"> <!-- for disable autocomplete all browser -->
          <?php echo html::password('password', empty($ldapConfig->password) ? '' : $ldapConfig->password, "class='form-control' autocomplete='off'")?>
        </td>
      </tr>
      <tr>
        <th><?php echo $lang->ldap->baseDN?></th>
        <td><?php echo html::input('baseDN', empty($ldapConfig->baseDN) ? '' : $ldapConfig->baseDN, "class='form-control' autocomplete='off'")?></td>
        <td class='tips'><?php echo $lang->ldap->example . 'dc=test,dc=com'?></td>
      </tr>
      <tr>
        <th class='text-danger'><?php echo $lang->ldap->attr?></th>
        <td></td>
      </tr>
      <tr>
        <th><?php echo $lang->ldap->account?></th>
        <td><?php echo html::input('account', empty($ldapConfig->account) ? 'samaccountname' : $ldapConfig->account, "class='form-control' autocomplete='off'")?></td>
        <td class='tips'><?php echo $lang->ldap->accountPS?></td>
      </tr>
      <tr>
        <th><?php echo $lang->ldap->realname?></th>
        <td><?php echo html::input('realname', empty($ldapConfig->realname) ? 'name' : $ldapConfig->realname, "class='form-control' autocomplete='off'")?></td>
      </tr>
      <tr>
        <th><?php echo $lang->ldap->email?></th>
        <td><?php echo html::input('email', empty($ldapConfig->email) ? 'Email' : $ldapConfig->email, "class='form-control' autocomplete='off'")?></td>
      </tr>
      <tr>
        <th><?php echo $lang->ldap->mobile?></th>
        <td><?php echo html::input('mobile', empty($ldapConfig->mobile) ? 'mobile' : $ldapConfig->mobile, "class='form-control' autocomplete='off'")?></td>
      </tr>
      <tr>
        <th><?php echo $lang->ldap->phone?></th>
        <td><?php echo html::input('phone', empty($ldapConfig->phone) ? 'telephonenumber' : $ldapConfig->phone, "class='form-control' autocomplete='off'")?></td>
      </tr>
      <tr>
        <td></td>
        <td colspan='2'>
          <?php echo html::submitButton();?>
          <?php echo html::backButton();?>
          <?php echo html::a($this->createLink('user', 'importLDAP'), $lang->ldap->import, "class='btn btn-primary'");?>
        </td>
      </tr>
    </table>
  </form>
</div>
<?php endif;?>
<?php include '../../common/view/footer.html.php';?>
