<?php
/**
 * The setting view file of wechat module of RanZhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商业软件，非开源软件
 * @author      Tingting Dai <daitingting@xirangit.com>
 * @package     wechat 
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */
?>
<?php include '../../common/view/header.html.php';?>
<div class='panel'>
  <div class='panel-heading'>
    <strong><?php echo $lang->wechat->common;?></strong>
    <div class='panel-actions pull-right'>
      <?php $syncUserUrl = inlink('syncUsers');?>
      <?php $syncDeptUrl = inlink('replaceDeptToWechat');?>
      <?php echo html::a('javascript:;', $lang->wechat->syncUserToWechat, "class='btn btn-primary btn-wechat' data-url='{$syncUserUrl}'");?>
      <?php echo html::a('javascript:;', $lang->wechat->syncDeptToWechat, "class='btn btn-primary btn-wechat' data-url='{$syncDeptUrl}'");?>
      <?php echo html::a(inlink('replaceDeptToSystem'), $lang->wechat->syncDeptToSystem, "class='btn btn-primary'");?>
      <?php echo html::a(inlink('replaceUsersToSystem'), $lang->wechat->syncUserToSystem, "class='btn btn-primary'");?>
    </div>
  </div>
  <div class='panel-body'>
    <form id='ajaxForm' method='post'>
      <table class='table table-form w-p80'>
        <tr>
          <th class='w-80px'><?php echo $lang->wechat->corpID;?></th>
          <td colspan='3'><?php echo html::input('corpID', isset($this->config->wechat->corpID) ? $this->config->wechat->corpID : '', "class='form-control'");?></td>
        </tr>
        <tr>
          <th><?php echo $lang->wechat->agent;?></th>
          <td class='w-120px'><?php echo html::input('name', isset($this->config->wechat->name) ? $this->config->wechat->name : '', "class='form-control' placeholder='{$lang->wechat->agentName}'");?></td> 
          <td class='w-100px'><?php echo html::input('agentID', isset($this->config->wechat->agentID) ? $this->config->wechat->agentID : '', "class='form-control' placeholder='{$lang->wechat->agentID}'");?></td> 
          <td><?php echo html::input('secret', isset($this->config->wechat->secret) ? $this->config->wechat->secret : '', "class='form-control' placeholder='{$lang->wechat->secret}'");?></td> 
        </tr>
        <tr>
          <th><?php echo $lang->wechat->contact;?></th>
          <td class='w-120px'><?php echo html::input('', '', "class='form-control' disabled='disabled'");?></td> 
          <td class='w-100px'><?php echo html::input('', '', "class='form-control' disabled='disabled'");?></td> 
          <td><?php echo html::input('contact[secret]', isset($this->config->wechat->contact->secret) ? $this->config->wechat->contact->secret : '', "class='form-control' placeholder='{$lang->wechat->secret}'");?></td> 
        </tr>
        <tr>
          <th><?php echo $lang->wechat->sendMessage;?></th>
          <td colspan='3'><?php echo html::radio('sendMessage', $lang->wechat->sendMessageList, isset($this->config->wechat->sendMessage) ? $this->config->wechat->sendMessage : '');?></td>
        </tr>
        <tr>
          <th><?php echo $lang->wechat->chooseImage;?></th>
          <td colspan='3'><?php echo html::radio('chooseImage', $lang->wechat->chooseImageList, isset($this->config->wechat->chooseImage) ? $this->config->wechat->chooseImage : '');?></td>
        </tr>
        <tr>
          <th><?php echo $lang->wechat->scan;?></th>
          <td colspan='3'><?php echo html::radio('scan', $lang->wechat->scanList, isset($this->config->wechat->scan) ? $this->config->wechat->scan : '');?></td>
        </tr>
        <tr>
          <th></th>
          <td colspan='3'><?php echo html::submitButton();?></td>
        </tr>
        <tr>
          <td colspan='4'><div class='alert alert-danger'><?php echo $lang->wechat->note;?></div></td>
        </tr>
      </table>
    </form>
  </div>
</div>
<?php include '../../common/view/footer.html.php';?>
