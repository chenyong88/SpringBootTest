<?php
/**
 * The commission view file of commission module of RanZhi.
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
<?php include '../../../sys/common/view/treeview.html.php';?>
<?php js::set('mode', $mode);?>
<?php js::set('dept', $dept);?>
<?php js::set('lineCount', count($lineList));?>
<div id='menuActions'>
  <?php if($mode == 'both' || $mode == 'sale'):?>
  <?php commonModel::printLink('commission', 'setSaleCommission', "step=create&mode={$mode}&dept={$dept}", "<i class='icon-plus'> </i>" . $lang->commission->saleCommission->common, "class='btn btn-primary'");?>
  <?php endif;?>
  <?php if($mode == 'both' || $mode == 'line'):?>
  <?php commonModel::printLink('commission', 'setLineCommission', "step=create&mode={$mode}&dept={$dept}", "<i class='icon-plus'> </i>" . $lang->commission->lineCommission->common, "class='btn btn-primary'");?>
  <?php endif;?>
</div>
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
      <form method='post'>
        <table class='table table-condensed table-bordered table-commission'>
          <thead>
            <?php if(count($lineList) > 1):?>
            <tr class='text-center'>
              <th class='w-100px accountHeader text-middle' rowspan='2'><?php echo $lang->commission->account;?></th>
              <?php if($mode == 'both' || $mode == 'sale'):?>
              <th class='typeHeader text-middle' rowspan='2'><?php echo $lang->commission->typeList['sale'];?></th>
              <?php endif;?>
              <?php if($mode == 'both' || $mode == 'line'):?>
              <th class='typeHeader' colspan='<?php echo count($lineList);?>'><?php echo $lang->commission->typeList['line'];?></th>
              <?php endif;?>
              <?php if($mode == 'both'):?>
              <th class='w-220px text-middle actions' rowspan='2'><?php echo $lang->actions;?></th>
              <?php else:?>
              <th class='w-110px text-middle actions' rowspan='2'><?php echo $lang->actions;?></th>
              <?php endif;?>
            </tr>
            <tr class='text-center'>
              <?php if($mode == 'both' || $mode == 'line'):?>
              <?php foreach($lineList as $line):?>
              <th class='line'><?php echo $line;?></th>
              <?php endforeach;?>
              <?php endif;?>
            </tr>
            <?php else:?>
            <tr class='text-center'>
              <th class='w-100px accountHeader text-middle'><?php echo $lang->commission->account;?></th>
              <?php if($mode == 'both' || $mode == 'sale'):?>
              <th class='typeHeader text-middle'><?php echo $lang->commission->typeList['sale'];?></th>
              <?php endif;?>
              <?php if($mode == 'both' || $mode == 'line'):?>
              <th class='typeHeader'><?php echo current($lineList) . $lang->commission->typeList['line'];?></th>
              <?php endif;?>
              <?php if($mode == 'both'):?>
              <th class='w-200px text-middle actions'><?php echo $lang->actions;?></th>
              <?php else:?>
              <th class='w-100px text-middle actions'><?php echo $lang->actions;?></th>
              <?php endif;?>
            </tr>
            <?php endif;?>
          </thead>

          <?php foreach($userList as $user):?>
          <tr class='text-middle text-center'>
            <td class='text-left'>
              <label class='checkbox-inline'><input type='checkbox' name='accountList[]' value='<?php echo $user->account;?>'/> <?php echo $user->realname;?></label>
            </td>
            <?php if($mode == 'both' || $mode == 'sale'):?>
            <td>
              <?php
              $saleCommissionRule = $user->saleCommission;
              if($saleCommissionRule->rule == 'fixed') echo zget($lang->commission->saleCommission->ruleList, $saleCommissionRule->rule, ' ');
              if($saleCommissionRule->rule == 'multistep')
              {
                  foreach($saleCommissionRule->ruleList as $rule)
                  {
                      if($rule->end)
                      {
                          echo $rule->start . ' - ' . $rule->end . '，' . $rule->rate . $lang->percent . '；';
                      }
                      else
                      {
                          echo $rule->start . $lang->commission->saleCommission->more . '，' . $rule->rate . $lang->percent . '；';
                      }
                  }
              }
              ?>
            </td>
            <?php if($mode == 'sale'):?>
            <td><?php commonModel::printLink('commission', 'setSaleCommission', "step=&mode={$mode}&dept={$dept}&account={$user->account}", $lang->commission->setSaleCommission);?></td>
            <?php endif;?>
            <?php endif;?>

            <?php if($mode == 'both' || $mode == 'line'):?>
            <?php if(count($lineList) > 1):?>
            <?php foreach($lineList as $key => $line):?>
            <td class='line'><?php echo isset($user->lineCommission->$key) ? $user->lineCommission->$key : '';?></td>
            <?php endforeach;?>
            <td>
              <?php if($mode == 'both'):?>
              <?php commonModel::printLink('commission', 'setSaleCommission', "step=&mode={$mode}&dept={$dept}&account={$user->account}", $lang->commission->setSaleCommission);?>
              <?php endif;?>
              <?php commonModel::printLink('commission', 'setLineCommission', "step=&mode={$mode}&dept={$dept}&account={$user->account}", $lang->commission->setLineCommission);?>
            </td>
            <?php else:?>
            <?php foreach($lineList as $key => $line):?>
            <td><?php echo isset($user->lineCommission->$key) ? $user->lineCommission->$key : '';?></td>
            <?php endforeach;?>
            <td>
              <?php if($mode == 'both'):?>
              <?php commonModel::printLink('commission', 'setSaleCommission', "step=&mode={$mode}&dept={$dept}&account={$user->account}", $lang->commission->setSaleCommission);?>
              <?php endif;?>
              <?php commonModel::printLink('commission', 'setLineCommission', "step=&mode={$mode}&dept={$dept}&account={$user->account}", $lang->commission->setLineCommission);?>
            </td>
            <?php endif;?>
            <?php endif;?>
          </tr>
          <?php endforeach;?>
          <tfoot>
            <tr>
              <td colspan='<?php echo count($lineList) > 0 ? count($lineList) + 3 : 4;?>'>
                <?php if(!empty($userList)):?>
                <?php echo html::selectButton();?>
                <?php if($mode == 'both'):?>
                <div class='btn-group'>
                  <?php echo html::a('#', $lang->commission->batchSetting . " <i class='icon-caret-down'></i>", "class='btn btn-primary dropdown-toggle' data-toggle='dropdown'");?>
                  <ul class='dropdown-menu' role='menu'>
                    <?php foreach($lang->commission->typeList as $key => $type):?>
                    <li>
                    <?php $actionLink = inlink("set" . ucfirst($key) . "Commission", "step=form&mode={$mode}&dept=$dept");?>
                    <?php echo html::a('#', $lang->commission->{$key . 'Commission'}->common, "onclick=\"setFormAction('$actionLink')\"");?>
                    </li>
                    <?php endforeach;?>
                  </ul>        
                </div>
                <?php elseif($mode == 'sale'):?>
                <?php $actionLink = inlink('setSaleCommission', "step=form&mode={$mode}&dept=$dept");?>
                <?php if(commonModel::hasPriv('commission', 'setSaleCommission')) echo html::a('#', $lang->commission->batchSetting, "class='btn btn-primary' onclick=\"setFormAction('$actionLink')\"");?>
                <?php elseif($mode == 'line'):?>
                <?php $actionLink = inlink('setLineCommission', "step=form&mode={$mode}&dept=$dept");?>
                <?php if(commonModel::hasPriv('commission', 'setLineCommission')) echo html::a('#', $lang->commission->batchSetting, "class='btn btn-primary' onclick=\"setFormAction('$actionLink')\"");?>
                <?php endif;?>
                <?php endif;?>
                <?php $pager->show();?>
              </td>
            </tr>
          </tfoot>
        </table>
      </form>
    </div>
  </div>
</div>
<?php include '../../common/view/footer.html.php';?>
