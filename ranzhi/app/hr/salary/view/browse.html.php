<?php
/**
 * The browse view file of salary module of RanZhi.
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
<?php js::set('mode', $mode);?>
<?php js::set('fromSetting', strpos($this->server->http_referer, $this->createLink('salary', 'setBasic')) !== false);?>
<li id='bysearchTab'><?php echo html::a('#', "<i class='icon-search icon'></i>" . $lang->search->common)?></li>
<div id='menuActions'>
  <button data-toggle="dropdown" class="btn btn-primary dropdown-toggle" type="button"><i class="icon-upload-alt"> </i><?php echo $lang->export;?><span class="caret"></span></button>
  <ul class='dropdown-menu'>
    <li><?php commonModel::printLink('salary', 'export', "mode=basic&month=$currentYear$currentMonth",  $lang->salary->exportBasic,  "class='iframe' data-width='700'");?></li>
    <li><?php commonModel::printLink('salary', 'export', "mode=detail&month=$currentYear$currentMonth", $lang->salary->exportDetail, "class='iframe' data-width='700'");?></li>
  </ul>
  <?php commonModel::printLink('salary', 'batchCreate', '', "<i class='icon icon-plus'> </i>" . $lang->salary->batchCreate, "class='btn btn-primary jsoner'");?>
</div>
<div class='panel'>
  <form id='ajaxForm' method='post'>
    <table class='table table-data table-hover table-fixed tablesorter table-fixedHeader text-center'>
      <thead>
        <tr class='text-center'>
          <?php $vars = "&mode={$mode}&month=$currentYear$currentMonth&orderBy=%s";?>
          <th class='w-60px'><?php commonModel::printOrderLink('id',      $orderBy, $vars, $lang->salary->id);?></th>
          <th class='w-80px'><?php commonModel::printOrderLink('month',   $orderBy, $vars, $lang->salary->month);?></th>
          <th class='w-60px'><?php commonModel::printOrderLink('dept',    $orderBy, $vars, $lang->user->dept);?></th>
          <th class='w-80px'><?php commonModel::printOrderLink('account', $orderBy, $vars, $lang->salary->account);?></th>
          <th class='w-80px'><?php echo $lang->salary->basic;?></th>
          <th class='w-80px'><?php echo $lang->salary->benefit;?></th>
          <th class='w-80px'><?php echo $lang->salary->bonus;?></th>
          <th class='w-80px'><?php echo $lang->salary->allowance;?></th>
          <th class='w-80px'><?php echo $lang->salary->exemption;?></th>
          <th class='w-80px'><?php echo $lang->salary->deduction;?></th>
          <th class='w-80px'><?php echo $lang->salary->deserved;?></th>
          <th class='w-80px'><?php echo $lang->salary->actual;?></th>
          <th class='w-80px'><?php echo $lang->salary->companyPay;?></th>
          <th><?php echo $lang->salary->desc;?></th>
          <th class='w-60px'><?php echo $lang->salary->status;?></th>
          <?php $class = $this->app->clientLang == 'en' ? 'w-180px' : 'w-150px';?>
          <th class='<?php echo $class;?>'><?php echo $lang->actions;?></th>
        </tr>
      </thead>
      <?php foreach($salaryList as $salary):?>
      <tr>
        <td>
          <?php if($type == 'company'):?>
          <label class='checkbox-inline'><input type='checkbox' name='salaryIDList[]' value='<?php echo $salary->id;?>'/> <?php echo $salary->id;?></label>
          <?php else:?>
          <?php echo $salary->id;?>
          <?php endif;?>
        </td>
        <td class='w-80px'><?php echo $salary->month;?></td>
        <td><?php echo zget($deptList, $salary->dept, '');?></td>
        <td><?php echo zget($userList, $salary->account);?></td>
        <td><?php echo formatMoney($salary->basic);?></td>
        <td><?php echo formatMoney($salary->benefit);?></td>
        <td><?php echo formatMoney($salary->bonus);?></td>
        <td><?php echo formatMoney($salary->allowance);?></td>
        <td><?php echo formatMoney($salary->exemption);?></td>
        <td><?php echo formatMoney($salary->deduction);?></td>
        <td><?php echo formatMoney($salary->deserved);?></td>
        <td><?php echo formatMoney($salary->actual);?></td>
        <td><?php echo formatMoney($salary->companySSF + $salary->companyHPF);?></td>
        <td title='<?php echo $salary->desc;?>'><?php echo $salary->desc;?></td>
        <td class='salary-<?php echo $salary->status;?>'><?php echo zget($this->lang->salary->statusList, $salary->status);?></td>
        <td>
          <?php 
          echo html::a(inlink('view', "id={$salary->id}&type={$type}"), $lang->view);
          if($type == 'company')
          {
              if($salary->status == 'wait') 
              {                    
                  commonModel::printLink('salary', 'edit', "id={$salary->id}", $lang->edit);
                  commonModel::printLink('salary', 'confirm', "id={$salary->id}", $lang->confirm, "class='jsoner'");
              }
              else
              {
                  echo html::a('#', $lang->edit, "disabled='disabled'");
                  echo html::a('#', $lang->confirm, "disabled='disabled'");
              }
              commonModel::printLink('salary', 'delete', "id={$salary->id}", $lang->delete, "class='deleter'");
          }
          ?>
        </td>
      </tr>
      <?php endforeach;?>
    </table>
    <div class='table-footer'>
      <?php if($salaryList):?>
      <div class='pull-left'>
        <?php if($type == 'company'):?>
        <?php echo html::selectButton();?>
        <div class='btn-group dropup'>
        <?php $confirmActionLink = inlink('batchConfirm');?>
        <?php if(commonModel::hasPriv('salary', 'batchConfirm')) echo html::commonButton($lang->confirm, 'btn btn-primary', "onclick=\"setFormAction('$confirmActionLink')\"");?>
        <?php if(commonModel::hasPriv('salary', 'batchDelete')):?>
        <button class='btn btn-primary dropdown-toggle' data-toggle='dropdown'><i class='icon-caret-up'></i></button>
        <ul class='dropdown-menu' role='menu'>
          <?php if(commonModel::hasPriv('salary', 'batchDelete')):?>
          <li>
          <?php $confirmActionLink = inlink('batchDelete');?>
          <?php echo html::a('#', $lang->delete, "onclick=\"setFormAction('$confirmActionLink')\"");?>
          </li>
          <?php endif;?>
        </ul>        
        <?php endif;?>
        </div>
        <?php endif;?>
        <strong><span class='text-danger'><?php $this->salary->countMoney($salaryList);?></span></strong>
      </div>
      <?php endif;?>
      <?php $pager->show();?>
    </div>
  </form>
</div>
<?php include '../../common/view/footer.html.php';?>
