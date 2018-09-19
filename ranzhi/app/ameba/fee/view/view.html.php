<?php
/**
 * The detail view file of fee module of Ranzhi.
 *
 * @copyright   Copyright 2009-2017 青岛易软天创网络科技有限公司 
 * @license     商业软件，非开源软件
 * @author      Gang Liu <liugang@cnezsoft.com>
 * @package     fee 
 * @version     $Id$
 * @link        http://www.ranzhi.org 
 */
?>
<?php include '../../common/view/header.html.php';?>
<div class='row-table'>
  <div class='col-main'>
    <div class='panel'>
      <div class='panel-heading'><strong><?php echo $lang->fee->desc;?></strong></div>
      <div class='panel-body'>
        <p><?php echo $fee->desc;?></p>
      </div> 
    </div> 
    <?php if($fee->sharedFees):?>
    <div class='panel'>
      <div class='panel-heading'><strong><?php echo $lang->fee->sharedFees;?></strong></div>
      <table class='table table-condensed table-bordered table-hover table-striped'>
        <tr class='text-center'> 
          <th class='w-200px'><?php echo $lang->fee->dept;?></th> 
          <th class='w-120px'><?php echo $lang->fee->rate;?></th> 
          <th class='w-120px'><?php echo $lang->fee->money;?></th> 
          <th><?php echo $lang->fee->desc;?></th> 
        </tr>
        <?php $totalRate  = 0;?>
        <?php $totalMoney = 0;?>
        <?php foreach($fee->sharedFees as $sharedFee):?>
        <?php $totalRate  += $sharedFee->rate;?>
        <?php $totalMoney += round($fee->money * $sharedFee->rate / 100, 2);?>
        <tr>
          <td><?php echo zget($deptList, $sharedFee->dept);?></td>
          <td class='text-right'><?php echo $sharedFee->rate . '%';?></td>
          <td class='text-right'><?php echo round($fee->money * $sharedFee->rate / 100, 2);?></td>
          <td title='<?php echo $sharedFee->desc;?>'><?php echo $sharedFee->desc;?></td>
        </tr>
        <?php endforeach;?>
        <tr>
          <th class='text-center'><?php echo $lang->fee->total;?></th>
          <th class='text-right'><?php echo $totalRate . '%';?></th>
          <th class='text-right'><?php echo $totalMoney;?></th>
          <td></td>
        </tr>
      </table>
    </div> 
    <?php endif;?>
    <?php echo $this->fetch('action', 'history', "objectType=fee&objectID=$fee->id");?>
    <div class='page-actions'>
      <div class='btn-group'>
        <?php commonModel::printLink('fee', 'edit',   "feeID=$fee->id", $lang->edit, "class='btn btn-primary'");?>
        <?php commonModel::printLink('fee', 'delete', "feeID=$fee->id", $lang->delete, "class='btn btn-primary deleter'");?>
      </div>
      <?php echo html::backButton();?>
    </div>
  </div>
  <div class='col-side'>
    <div class='panel'>
      <div class='panel-heading'>
        <strong><i class='icon-file-text-alt'></i> <?php echo $lang->fee->basic;?></strong>
      </div>
      <div class='panel-body'>
        <table class='table table-info'>
          <tr>
            <th class='w-80px'><?php echo $lang->fee->id;?></th>
            <td><?php echo $fee->id;?></td>
          </tr>
          <tr>
            <th><?php echo $lang->fee->year;?></th>
            <td><?php echo $fee->month;?></td>
          </tr>
          <tr>
            <th><?php echo $lang->fee->type;?></th>
            <td><?php echo zget($lang->fee->typeList, $fee->type);?></td>
          </tr>
          <tr>
            <th><?php echo $lang->fee->category;?></th>
            <td><?php echo zget($categoryList, $fee->category);?></td>
          </tr>
          <tr>
            <th><?php echo $lang->fee->dept;?></th>
            <td><?php echo zget($deptList, $fee->dept);?></td>
          </tr>
          <tr>
            <th><?php echo $lang->fee->period;?></th>
            <td><?php echo zget($lang->fee->periodList, $fee->period);?></td>
          </tr>
          <tr>
            <th><?php echo $lang->fee->shareType;?></th>
            <td><?php echo zget($lang->fee->shareTypeList, $fee->shareType);?></td>
          </tr>
          <tr>
            <th><?php echo $lang->fee->money;?></th>
            <td><?php echo $fee->money;?></td>
          </tr>
          <tr>
            <th><?php echo $lang->fee->createdBy;?></th>
            <td><?php echo zget($userList, $fee->createdBy);?></td>
          </tr>
          <tr>
            <th><?php echo $lang->fee->createdDate;?></th>
            <td><?php echo formatTime($fee->createdDate, DT_DATE1);?></td>
          </tr>
          <tr>
            <th><?php echo $lang->fee->editedBy;?></th>
            <td><?php echo zget($userList, $fee->editedBy);?></td>
          </tr>
          <tr>
            <th><?php echo $lang->fee->editedDate;?></th>
            <td><?php echo formatTime($fee->editedDate, DT_DATE1);?></td>
          </tr>
        </table>
      </div>
    </div>
  </div>
</div>
<?php include '../../common/view/footer.html.php';?>
