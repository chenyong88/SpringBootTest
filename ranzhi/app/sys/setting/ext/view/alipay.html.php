<?php
/**
 * The configure psi view file of trade module of RanZhi.
 *
 * @copyright   Copyright 2009-2017 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商业软件，非开源软件
 * @author      Gang Liu <liugang@cnezsoft.com>
 * @package     trade 
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */
?>
<?php include '../../../common/view/header.html.php';?>
<?php include '../../../common/view/chosen.html.php';?>
<div class='panel'>
  <div class='panel-heading'>
    <strong><?php echo $lang->setting->alipay;?></strong>
  </div>
  <form id='ajaxForm' method='post'>
    <table class='table table-form'>
      <tr>
        <th class='w-100px'><?php echo $lang->setting->pid;?></th>
        <td class='w-300px'>
          <div class='required required-wrapper'></div>
          <?php echo html::input('pid', $config->alipay->pid, "id='pid' class='form-control' placeholder='{$lang->setting->placeholder->pid}'");?>
        </td>
        <td></td>
      </tr>
      <tr>
        <th><?php echo $lang->setting->alipayKey;?></th>
        <td>
          <div class='required required-wrapper'></div>
          <?php echo html::input('key', $config->alipay->key, "id='key' class='form-control' placeholder='{$lang->setting->placeholder->key}'");?>
        </td>
        <td></td>
      </tr>
      <tr>
        <th><?php echo $lang->setting->email;?></th>
        <td>
          <div class='required required-wrapper'></div>
          <?php echo html::input('email', $config->alipay->email, "id='email' class='form-control' placeholder='{$lang->setting->placeholder->email}'");?>
        </td>
        <td></td>
      </tr>
      <tr>
        <th><?php echo $lang->setting->depositor;?></th>
        <td>
          <div class='required required-wrapper'></div>
          <?php echo html::select('depositor', $depositors, $config->alipay->depositor, "id='depositor' class='form-control chosen' placeholder='{$lang->setting->placeholder->depositor}'");?>
        </td>
        <td></td>
      </tr>
      <tr>
        <th><?php echo $lang->setting->tradeType;?></th>
        <td><?php echo html::select('tradeType[]', $lang->setting->tradeTypeList, $config->alipay->tradeType, "id='tradeType' class='form-control chosen' multiple data-placeholder='{$lang->setting->placeholder->tradeType}'");?></td>
        <td></td>
      </tr>
      <tr>
        <th></th>
        <td>
          <?php echo html::submitButton();?>
          <?php commonModel::printLink('cash.trade', 'syncAlipay', '', $lang->setting->syncAlipay, "class='btn btn-primary'");?>
        </td>
      </tr>
    </table>
  </form>
</div>
<?php include '../../../common/view/footer.html.php';?>
