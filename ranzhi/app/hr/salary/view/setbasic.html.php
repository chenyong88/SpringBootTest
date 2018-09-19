<?php
/**
 * The set basic view file of salary module of RanZhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商业软件，非开源软件
 * @author      Gang Liu <liugang@cnezsoft.com>
 * @package     salary 
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */
?>
<?php include '../../common/view/header.html.php';?>
<?php include '../../../sys/common/view/treeview.html.php';?>
<div class='main'>
  <div class='col-xs-2 col-md-2'>
    <div class='panel'>
      <div class='panel-heading'><strong><i class="icon-building"></i> <?php echo $lang->dept->common;?></strong></div>
      <div class='panel-body'>
        <div id='treeMenuBox'><?php echo $treeMenu;?></div>
      </div>
    </div>
  </div>
  <div class='col-xs-10 col-md-10'>
    <form id='ajaxForm' method='post'>
      <div class='panel'>
        <table class='table table-condensed table-bordered table-hover text-center text-middle table-fixedHeader'>
          <thead>
            <tr class='text-center'>
              <th class='w-100px'><?php echo $lang->salary->account;?></th>
              <th><?php echo $lang->salary->basic;?></th>
              <th><?php echo $lang->salary->benefit;?></th>
              <th><?php echo $lang->salary->exemption;?></th>
              <th class='w-60px'><?php echo $lang->salary->SSF;?></th>
              <th class='w-60px'><?php echo $lang->salary->HPF;?></th>
              <th class='w-100px'><?php echo $lang->salary->total;?></th>
              <th class='w-100px'><?php echo $lang->actions;?></th>
            </tr>
          </thead>
          <?php
          foreach($users as $user):
          if(isset($basicList[$user->account]))
          {
              $basic = $basicList[$user->account];
          }
          else
          {
              $basic = new stdclass();
              $basic->basic     = '';
              $basic->benefit   = '';
              $basic->exemption = '';
              $basic->ssf       = '';
              $basic->hpf       = '';
          }
          ?>
          <tr>
            <td>
              <?php echo $user->realname;?>
              <?php echo html::hidden("account[$user->id]", $user->account);?>
            </td>
            <td>
              <?php 
              if($basic->basic)
              {
                  echo "<span class='basic basicItem'>" . $basic->basic . "</span>";
                  echo html::input("basic[$user->id]",   $basic->basic, "class='form-control amount basic basicItem' style='display:none'");
              }
              else
              {
                  echo html::input("basic[$user->id]",   $basic->basic, "class='form-control amount basic'");
              }
              ?>
            </td>
            <td>
              <?php 
              if($basic->benefit)
              {
                  echo "<span class='benefit basicItem'>" . $basic->benefit. "</span>";
                  echo html::input("benefit[$user->id]", $basic->benefit, "class='form-control amount benefit basicItem' style='display:none'");
              }
              else
              {
                  echo html::input("benefit[$user->id]", $basic->benefit, "class='form-control amount benefit'");
              }
              ?>
            </td>
            <td>
              <?php 
              if($basic->exemption)
              {
                  echo "<span class='exemption basicItem'>" . $basic->exemption. "</span>";
                  echo html::input("exemption[$user->id]", $basic->exemption, "class='form-control amount exemption basicItem' style='display:none'");
              }
              else
              {
                  echo html::input("exemption[$user->id]", $basic->exemption, "class='form-control amount exemption'");
              }
              ?>
            </td>
            <?php $checked = $basic->ssf ? 'checked' : '';?>
            <td><input type='checkbox' name='ssf[<?php echo $user->id;?>]' value='1' <?php echo $checked;?>/></td>
            <?php $checked = $basic->hpf ? 'checked' : '';?>
            <td><input type='checkbox' name='hpf[<?php echo $user->id;?>]' value='1' <?php echo $checked;?>/></td>
            <td class='text-middle' id='total'></td>
            <td>
              <?php echo html::a('javascript:;', "<i class='icon-remove'></i>", "class='btn btn-mini delItem'");?>
              <?php if($basic->basic) echo html::a('javascript:;', "<i class='icon-pencil'></i>", "class='btn btn-mini editItem'");?>
            </td>
          </tr>
          <?php endforeach;?>
          <tr class='text-center footer'>
            <th><?php echo $lang->salary->total;?></th>
            <th id='totalBasic'></th>
            <th id='totalBenefit'></th>
            <th id='totalExemption'></th>
            <th></th>
            <th></th>
            <th id='totalMoney'></th>
            <th></th>
          </tr>
          <tr>
            <td class='text-left' colspan='8'>
              <?php echo html::submitButton();?>
              <?php $pager->show();?>
            </td>
          </tr>
        </table>
      </div>
    </form>
  </div>
</div>
<?php include '../../common/view/footer.html.php';?>
