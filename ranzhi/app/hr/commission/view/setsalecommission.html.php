<?php
/**
 * The set sale commission view file of commission module of RanZhi.
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
<?php js::set('rule', !empty($commission->rule) ? $commission->rule : '');?>
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
      <form id='ajaxForm' method='post' action='<?php echo inlink('setSaleCommission', "step=save&mode=$mode&dept=$dept&account=$account");?>'>
        <div class='panel w-p60'>
          <div class='panel-heading'>
            <strong>
              <?php if($step == 'create'):?>
              <?php echo $lang->commission->saleCommission->common . ' :: ' . $lang->create;?>
              <?php elseif($account):?>
              <?php echo $lang->commission->saleCommission->common . ' :: ' . zget($userList, $account, ' ');?>
              <?php else:?>
              <?php echo $lang->commission->saleCommission->common . ' :: ' . $lang->commission->batchSetting;?>
              <?php endif;?>
            </strong>
          </div>
          <div class='panel-body'>
            <table class='table table-condensed table-borderless'>
              <?php if($step == 'create'):?>
              <tr>
                <th class='w-80px text-middle'><?php echo $lang->commission->account;?></th>
                <td><?php echo html::select('accountList[]', $userList, '', "class='form-control chosen'");?></td>
              </tr>
              <?php endif;?>
              <tr>
                <th class='w-80px text-middle'><?php echo $lang->commission->saleCommission->rule;?></th>
                <td><?php echo html::radio('rule', $lang->commission->saleCommission->ruleList);?></td>
              </tr>
              <tr id='stepRuleTR' class='hide'>
                <th class='text-middle'><?php echo $lang->commission->rule;?></th>
                <td>
                  <?php if(isset($commission)):?>
                  <?php $i = 0;?>
                  <?php foreach($commission->ruleList as $rule):?>
                  <div class='input-group'>
                    <span class='input-group-addon'><?php echo $lang->commission->saleCommission->interval;?></span>
                    <?php echo html::input("starts[$i]", $rule->start, "class='form-control start'");?>
                    <span class='input-group-addon fix-border'>-</span>
                    <?php echo html::input("ends[$i]", $rule->end, "class='form-control end'");?>
                    <span class='input-group-addon fix-border'><?php echo $lang->commission->rate;?></span>
                    <?php echo html::input("rates[$i]", $rule->rate, "class='form-control'");?>
                    <span class='input-group-addon fix-border'><?php echo $lang->percent;?></span>
                    <span class='input-group-btn'>
                     <a href='javascript:;' class='btn add'><i class='icon-plus'></i></a>
                     <a href='javascript:;' class='btn remove'><i class='icon-remove'></i></a>
                    </span>
                  </div>
                  <?php $i++;?>
                  <?php endforeach;?>
                  <?php endif;?>
                  <div class='input-group'>
                    <span class='input-group-addon'><?php echo $lang->commission->saleCommission->interval;?></span>
                    <?php echo html::input("starts[$i]", '', "class='form-control start'");?>
                    <span class='input-group-addon fix-border'>-</span>
                    <?php echo html::input("ends[$i]", '', "class='form-control end'");?>
                    <span class='input-group-addon fix-border'><?php echo $lang->commission->rate;?></span>
                    <?php echo html::input("rates[$i]", '', "class='form-control'");?>
                    <span class='input-group-addon fix-border'><?php echo $lang->percent;?></span>
                    <span class='input-group-btn'>
                     <a href='javascript:;' class='btn add'><i class='icon-plus'></i></a>
                     <a href='javascript:;' class='btn remove'><i class='icon-remove'></i></a>
                    </span>
                  </div>
                </td>
              </tr>
              <tr>
                <td colspan='5'>
                  <?php echo html::submitButton() . ' ' . html::backButton();?>
                  <?php if(!isset($accountList)) commonModel::printLink('commission', 'setSaleCommission', "step=delete&mode={$mode}&dept={$dept}&account={$account}", $lang->cancel . $lang->commission->common, "class='btn btn-default deleter'");?>
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
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<?php
$itemRow = <<<EOT
  <div class='input-group'>
    <span class='input-group-addon'>{$lang->commission->saleCommission->interval}</span>
    <input type='text' value="" name="starts[key]" class='form-control start'>
    <span class='input-group-addon fix-border'>-</span>
    <input type='text' value="" name="ends[key]" class='form-control end'>
    <span class='input-group-addon fix-border'>{$lang->commission->rate}</span>
    <input type='text' value="" name="rates[key]" class='form-control'>
    <span class='input-group-addon fix-border'>{$lang->percent}</span>
    <span class='input-group-btn'>
     <a href='javascript:;' class='btn add'><i class='icon-plus'></i></a>
     <a href='javascript:;' class='btn remove'><i class='icon-remove'></i></a>
    </span>
  </div>
EOT;
js::set('itemRow', $itemRow);
js::set('key', ++$i);
?>
<?php include '../../common/view/footer.html.php';?>
