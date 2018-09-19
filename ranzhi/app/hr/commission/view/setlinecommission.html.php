<?php
/**
 * The set line commission view file of commission module of RanZhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商业软件，非开源软件
 * @author      Gang Liu <liugang@cnezsoft.com>
 * @package     commission 
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */
?>
<?php include '../../common/view/header.html.php';?>
<?php include '../../../sys/common/view/chosen.html.php';?>
<?php include '../../../sys/common/view/treeview.html.php';?>
<?php js::set('dept', $dept);?>
<?php js::set('account', empty($accountList) ? $account : helper::jsonEncode($accountList));?>
<?php js::set('noResultsMatch', $lang->noResultsMatch);?>
<div class='with-side'>
  <?php include './side.html.php';?>
  <div class='main'>
    <div class='col-xs-2'>
      <div class='panel'>
        <div class='panel-heading'><strong><i class="icon-building"></i> <?php echo $lang->dept->common;?></strong></div>
        <div class='panel-body'>
          <?php echo $treeMenu;?>
        </div>
      </div>
    </div>
    <div class='col-xs-10'>
      <form id='ajaxForm' method='post' action='<?php echo inlink('setLineCommission', "step=save&mode=$mode&dept=$dept&account=$account");?>'>
        <div class='panel w-p60'>
          <div class='panel-heading'>
            <strong>
              <?php if($step == 'create'):?>
              <?php echo $lang->commission->lineCommission->common . ' :: ' . $lang->create;?>
              <?php elseif($account):?>
              <?php echo $lang->commission->lineCommission->common . ' :: ' . zget($userList, $account, ' ');?>
              <?php else:?>
              <?php echo $lang->commission->lineCommission->common . ' :: ' . $lang->commission->batchSetting;?>
              <?php endif;?>
            </strong>
          </div>
          <div class='panel-body'>
            <?php $i = 0;?>
            <?php if(empty($lineList)):?>
            <?php commonModel::printLink('crm.tree', 'browse', 'type=product', $lang->commission->lineCommission->lineList, "class='btn btn-primary setting'");?>
            <?php else:?>
            <table class='table table-form'>
              <?php if($step == 'create'):?>
              <tr>
                <th class='w-50px'><?php echo $lang->commission->account;?></th>
                <td><?php echo html::select('accountList[]', $userList, '', "class='form-control chosen'");?></td>
              </tr>
              <?php endif;?>
              <?php if($account):?>
              <?php foreach($commissionList as $line => $rate):?>
              <tr>
                <th class='w-50px'><?php echo $lang->commission->lineCommission->lineList;?></th>
                <td><?php echo html::select("lines[$i]", array('' => '') + $lineList, $line, "class='form-control chosen'");?></td>
                <th class='w-90px'><?php echo $lang->commission->lineCommission->remainRates;?></th>
                <td class='w-40px' id='remainRates'></td>
                <th class='w-40px'><?php echo $lang->commission->rate;?></th>
                <td class='w-180px'>
                  <div class='input-group'>
                    <?php echo html::input("rates[$i]", !is_object($rate) ? $rate : '', "class='form-control rate'");?>
                    <span class='input-group-addon fix-border'><?php echo $lang->percent;?></span>
                    <span class='input-group-btn'>
                      <a href='#' class='btn add'><i class='icon-plus'></i></a>
                      <a href='#' class='btn remove'><i class='icon-remove'></i></a>
                    </span>
                  </div>
                </td>
              </tr>
              <?php $i++;?>
              <?php endforeach;?>
              <?php endif;?>
              <tr>
                <th class='w-50px'><?php echo $lang->commission->lineCommission->lineList;?></th>
                <td><?php echo html::select("lines[$i]", array('' => '') + $lineList, '', "class='form-control chosen'");?></td>
                <th class='w-90px'><?php echo $lang->commission->lineCommission->remainRates;?></th>
                <td class='w-40px' id='remainRates'></td>
                <th class='w-40px'><?php echo $lang->commission->rate;?></th>
                <td class='w-180px'>
                  <div class='input-group'>
                    <?php echo html::input("rates[$i]", '', "class='form-control rate'");?>
                    <span class='input-group-addon fix-border'><?php echo $lang->percent;?></span>
                    <span class='input-group-btn'>
                      <a href='#' class='btn add'><i class='icon-plus'></i></a>
                      <a href='#' class='btn remove'><i class='icon-remove'></i></a>
                    </span>
                  </div>
                </td>
              </tr>
              <tr>
                <td colspan='5'>
                  <?php echo html::submitButton() . ' ' . html::backButton();?>
                  <?php if(!isset($accountList)) commonModel::printLink('commission', 'setLineCommission', "step=delete&mode={$mode}&dept={$dept}&account={$account}", $lang->cancel . $lang->commission->common, "class='btn btn-default deleter'");?>
                </td>
              </tr>
            </table>
            <?php if(isset($accountList)):?>
            <div class='hide'>
              <?php foreach($accountList as $curAccount):?>
              <?php echo html::hidden('accountList[]', $curAccount);?>
              <?php endforeach;?>
            </div>
            <?php endif;?>
            <?php endif;?>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<?php
$select  = html::select('lines[key]', array('' => '') + $lineList, '', "class='form-control chosen'");
$itemRow = <<<EOT
  <tr>
    <th class='w-50px'>{$lang->commission->lineCommission->lineList}</th>
    <td>{$select}</td>
    <th class='w-90px'>{$lang->commission->lineCommission->remainRates}</th>
    <td class='w-40px' id='remainRates'></td>
    <th class='w-40px'>{$lang->commission->rate}</th>
    <td class='w-180px'>
      <div class='input-group'>
        <input type='text' value="" name="rates[key]" class='form-control rate'>
        <span class='input-group-addon fix-border'>{$lang->percent}</span>
        <span class='input-group-btn'>
          <a href='#' class='btn add'><i class='icon-plus'></i></a>
          <a href='#' class='btn remove'><i class='icon-remove'></i></a>
        </span>
      </div>
    </td>
  </tr>
EOT;
js::set('itemRow', $itemRow);
js::set('key', ++$i);
?>
<?php include '../../common/view/footer.html.php';?>
