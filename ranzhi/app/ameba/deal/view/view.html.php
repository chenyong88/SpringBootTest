<?php
/**
 * The detail view file of deal module of RanZhi.
 *
 * @copyright   Copyright 2009-2017 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Gang Liu <liugang@cnezsoft.com>
 * @package     deal 
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */
?>
<?php include '../../common/view/header.html.php';?>
<div class='row-table'>
  <div class='col-main'>
    <div class='panel'>
      <div class='panel-heading'><strong><?php echo $lang->deal->desc;?></strong></div>
      <div class='panel-body'>
        <p><?php echo $deal->desc;?></p>
      </div> 
    </div> 
    <?php echo $this->fetch('action', 'history', "objectType=deal&objectID=$deal->id");?>
    <div class='page-actions'>
      <div class='btn-group'>
        <?php
        if($deal->status == 'wait') 
        {
            if($deal->from) 
            {
                commonModel::printLink('deal', 'confirm', "dealID=$deal->id", $lang->confirm, "class='btn btn-primary' data-toggle='modal'");
            }
            else
            {
                echo html::a('#', $lang->confirm, "class='btn' disabled='disabled'");
            }
        }
        if(strpos(',internalIncome,internalDeal,', ",$deal->amebaAccount,") !== false)
        {
            commonModel::printLink('deal', 'edit',    "dealID=$deal->id", $lang->edit,    "class='btn btn-primary' data-toggle='modal'");
            commonModel::printLink('deal', 'delete',  "dealID=$deal->id", $lang->delete,  "class='btn btn-primary deleter'");
        }
        else
        {
            echo html::a('###', $lang->edit,   "class='btn btn-default' disabled='disabled'");
            echo html::a('###', $lang->delete, "class='btn btn-default' disabled='disabled'");
        }
        ?>
      </div>
      <?php echo html::backButton();?>
    </div>
  </div>
  <div class='col-side'>
    <div class='panel'>
      <div class='panel-heading'>
        <strong><i class='icon-file-text-alt'></i> <?php echo $lang->deal->basic;?></strong>
      </div>
      <div class='panel-body'>
        <table class='table table-info'>
          <tr>
            <th class='w-80px'><?php echo $lang->deal->id;?></th>
            <td><?php echo $deal->id;?></td>
          </tr>
          <tr>
            <th><?php echo $lang->deal->date;?></th>
            <td><?php echo $deal->date;?></td>
          </tr>
          <tr>
            <th><?php echo $lang->deal->dept;?></th>
            <td><?php echo zget($deptPairs, $deal->dept, '');?></td>
          </tr>
          <?php if($deal->toDept):?>
          <tr>
            <th><?php echo $lang->deal->toDept;?></th>
            <td><?php echo zget($deptPairs, $deal->toDept, '');?></td>
          </tr>
          <?php endif;?>
          <tr>
            <th><?php echo $lang->deal->amebaAccount;?></th>
            <td><?php echo zget($lang->deal->amebaAccountList, $deal->amebaAccount);?></td>
          </tr>
          <tr>
            <th><?php echo $lang->deal->category;?></th>
            <td><?php echo zget($categoryPairs, $deal->category, '');?></td>
          </tr>
          <tr>
            <th><?php echo $lang->deal->product;?></th>
            <td><?php echo zget($productPairs, $deal->product, '');?></td>
          </tr>
          <tr>
            <th><?php echo $lang->deal->type;?></th>
            <td><?php echo zget($lang->deal->typeList, $deal->type);?></td>
          </tr>
          <tr>
            <th><?php echo $lang->deal->money;?></th>
            <td><?php echo formatMoney($deal->money);?></td>
          </tr>
          <?php if($deal->contract):?>
          <tr>
            <th><?php echo $lang->deal->contract;?></th>
            <td><?php if(!commonModel::printLink('crm.contract', 'view', "contractID=$deal->contract", zget($contractPairs, $deal->contract), "class='contract'")) echo zget($contractPairs, $deal->contract);?></td>
          </tr>
          <?php endif;?>
          <?php if($deal->trade):?>
          <tr>
            <th><?php echo $lang->deal->trade;?></th>
            <td><?php if(!commonModel::printLink('cash.trade', 'view', "tradeID=$deal->trade", zget($tradePairs, $deal->trade), "class='trade'")) echo zget($tradePairs, $deal->trade);?></td>
          </tr>
          <?php endif;?>
          <tr>
            <th><?php echo $lang->deal->createdBy;?></th>
            <td><?php echo zget($userPairs, $deal->createdBy);?></td>
          </tr>
          <tr>
            <th><?php echo $lang->deal->createdDate;?></th>
            <td><?php echo formatTime($deal->createdDate, DT_DATE1);?></td>
          </tr>
          <tr>
            <th><?php echo $lang->deal->editedBy;?></th>
            <td><?php echo zget($userPairs, $deal->editedBy);?></td>
          </tr>
          <tr>
            <th><?php echo $lang->deal->editedDate;?></th>
            <td><?php echo formatTime($deal->editedDate, DT_DATE1);?></td>
          </tr>
          <tr>
            <th><?php echo $lang->deal->confirmedBy;?></th>
            <td><?php echo zget($userPairs, $deal->confirmedBy);?></td>
          </tr>
          <tr>
            <th><?php echo $lang->deal->confirmedDate;?></th>
            <td><?php echo formatTime($deal->confirmedDate, DT_DATE1);?></td>
          </tr>
        </table>
      </div>
    </div>
  </div>
</div>
<?php include '../../common/view/footer.html.php';?>
