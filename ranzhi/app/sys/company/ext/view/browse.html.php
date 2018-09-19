<?php
/**
 * The browse file of company module of RanZhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商业软件，非开源软件
 * @author      Tingting Dai <daitingting@xirangit.com>
 * @package     company 
 * @version     $Id$
 * @link        http://www.ranzhi.org
 */
?>
<?php include $app->getModuleRoot() . 'common/view/header.html.php';?>
<?php js::set('confirmCancel', $lang->company->confirmCancel);?>
<div class='panel'>
  <div class='panel-heading'>
    <strong><i class='icon-group'></i> <?php echo $lang->company->browse;?></strong>
    <div class='pull-right panel-actions'><?php commonModel::printLink('company', 'create', '', $lang->company->create, "class='btn btn-primary' data-toggle='modal'");?></div>
  </div>
  <div class='panel-body'>
    <div class='cards'>
      <?php foreach($companyList as $company):?>
      <div class='col-md-4 col-sm-6'>
        <div class='card card-company'>
          <div class='card-heading'>
            <h4 class='title'>
              <?php echo $company->name?>
              <?php if($company->major):?>
              <span class='label label-primary'><?php echo $lang->company->major;?></span>
              <?php endif;?>
              <?php $status = $company->status == 'normal' ? 'label-success' : 'label-muted';?>
              <span class='label <?php echo $status;?>'><?php echo zget($lang->company->statusList, $company->status);?></span>
            </h4>
          </div>

          <div class='card-caption row'>
            <dl class='dl-horizontal'>
              <dt class='<?php echo $this->app->clientLang;?>'><?php echo $lang->company->taxNumber;?></dt>
              <dd><?php echo $company->taxNumber;?></dd>
            </dl>
            <dl class='dl-horizontal'>
              <dt class='<?php echo $this->app->clientLang;?>'><?php echo $lang->company->registedAddress;?></dt>
              <dd><?php echo $company->registedAddress;?></dd>
            </dl>
            <dl class='dl-horizontal'>
              <dt class='<?php echo $this->app->clientLang;?>'><?php echo $lang->company->phone;?></dt>
              <dd><?php echo $company->phone;?></dd>
            </dl>
            <dl class='dl-horizontal'>
              <dt class='<?php echo $this->app->clientLang;?>'><?php echo $lang->company->bankName;?></dt>
              <dd><?php echo $company->bankName;?></dd>
            </dl>
            <dl class='dl-horizontal'>
              <dt class='<?php echo $this->app->clientLang;?>'><?php echo $lang->company->bankAccount;?></dt>
              <dd><?php echo $company->bankAccount;?></dd>
            </dl>
            <dl class='dl-horizontal content'>
              <dt class='<?php echo $this->app->clientLang;?>'><?php echo $lang->company->content;?></dt>
              <dd><?php echo $company->content;?></dd>
            </dl>
          </div>

          <div class='card-actions'>
            <div class='pull-right'>
              <?php if(!$company->major):?>
              <?php commonModel::printLink('company', 'setMajor', "companyID={$company->id}", $lang->company->setMajor, "class='major'");?>
              <?php endif;?>
              <?php commonModel::printLink('company', 'edit', "companyID={$company->id}", $lang->edit, "data-toggle='modal'");?>
              <?php if($company->status == 'canceled'):?>
              <?php echo html::a('javascript:;', $lang->company->cancel, "class='disabled'")?>
              <?php else:?>
              <?php commonModel::printLink('company', 'cancel', "companyID={$company->id}", $lang->company->cancel, "class='cancel'");?>
              <?php endif;?>
            </div>
          </div>
        </div>
      </div>
      <?php endforeach;?>
    </div>
    <?php $pager->show();?>
  </div>
</div>
<?php include $app->getModuleRoot() . 'common/view/footer.html.php';?>
