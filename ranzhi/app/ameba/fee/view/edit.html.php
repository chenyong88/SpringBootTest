<?php
/**
 * The edit view file of fee module of Ranzhi.
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
<?php include '../../../sys/common/view/chosen.html.php';?>
<?php $totalUser = (int)$deptUsers['total'];?>
<?php js::set('totalUser', $totalUser);?>
<?php js::set('totalMoney', $fee->money);?>
<?php js::set('averageRate', $totalUser ? round(1 / $totalUser * 100, 2) : 0);?>
<div class='panel'>
  <div class='panel-heading'>
    <strong><?php echo $lang->fee->create;?></strong>
  </div>
  <div class='panel-body'>
    <form id='ajaxForm' method='post'>
      <table class='table table-form'>
        <tr>
          <th class='w-80px'><?php echo $lang->fee->year;?></th>
          <td class='w-220px'><?php echo html::select('year', $yearList, substr($fee->month, 0, 4), "class='form-control chosen'");?></td>
          <td class='w-120px'></td>
          <td class='w-120px'></td>
          <td></td>
          <td class='w-100px'></td>
        </tr>
        <tr>
          <th><?php echo $lang->fee->month;?></th>
          <td><?php echo html::select('month', $lang->fee->monthList, substr($fee->month, 4, 2), "class='form-control chosen'");?></td>
          <td colspan='4'></td>
        </tr>
        <tr>
          <th><?php echo $lang->fee->type;?></th>
          <td><?php echo html::select('type', $lang->fee->typeList, $fee->type, "class='form-control'");?></td>
          <td colspan='4'></td>
        </tr>
        <tr>
          <th><?php echo $lang->fee->category;?></th>
          <td><?php echo html::select('category', $categoryList, $fee->category, "class='form-control chosen'");?></td>
          <td colspan='4'></td>
        </tr>
        <tr>
          <th><?php echo $lang->fee->dept;?></th>
          <td><?php echo html::select('dept', $deptList, $fee->dept, "class='form-control chosen'");?></td>
          <td colspan='4'></td>
        </tr>
        <tr>
          <th><?php echo $lang->fee->period;?></th>
          <td>
            <?php echo html::select('period', $lang->fee->periodList, $fee->period, "class='form-control'");?>
            <?php echo html::hidden('period', 'year');?>
          </td>
          <td colspan='4'></td>
        </tr>
        <tr>
          <th><?php echo $lang->fee->shareType;?></th>
          <td><?php echo html::select('shareType', $lang->fee->shareTypeList, $fee->shareType, "class='form-control'");?></td>
          <td colspan='4'></td>
        </tr>
        <tr>
          <th><?php echo $lang->fee->money;?></th>
          <td><?php echo html::input('money', $fee->money, "class='form-control' readonly='readonly'");?></td>
          <td class='moneyTips' colspan='4'><?php echo $lang->fee->moneyTips;?></td>
        </tr>
        <tr>
          <th><?php echo $lang->fee->sharedFees;?></th>
          <td class='nopaddingleft' colspan='5'>
            <table class='table table-form table-condensed table-shareFees'>
              <?php foreach($fee->sharedFees as $sharedFee):?>
              <tr>
                <td class='w-220px'>
                  <select id='shareFees[dept]' name='shareFees[dept][]' class='form-control chosen' data-placeholder='<?php echo $lang->fee->dept;?>'>
                    <option data-person='0'></option>
                    <?php foreach($deptPairs as $id => $dept):?>
                    <option value='<?php echo $id;?>' <?php if($sharedFee->dept == $id) echo 'selected';?> data-person='<?php echo zget($deptUsers, $id, 0);?>'><?php echo $dept;?></option>
                    <?php endforeach;?>
                  </select>
                </td>
                <td class='w-120px fixpadding'>
                  <div class='input-group'>
                    <?php echo html::input('shareFees[rate][]', $sharedFee->rate, "class='form-control' placeholder='{$lang->fee->rate}'");?>
                    <span class='input-group-addon'>%</span>
                  </div>
                </td>
                <td class='w-120px fixpadding'><?php echo html::input('shareFees[money][]', round($sharedFee->rate * $fee->money / 100, 2), "class='form-control' placeholder='{$lang->fee->money}'");?></td>
                <td class='fixpadding'><?php echo html::input('shareFees[desc][]', $sharedFee->desc, "class='form-control' placeholder='{$lang->fee->desc}'");?></td>
                <td class='w-100px action'>
                  <a class='btn btn-xs addItem'><i class='icon icon-plus'></i></a>
                  <a class='btn btn-xs delItem'><i class='icon icon-remove'></i></a>
                </td>
              </tr>
              <?php endforeach;?>
              <?php if(empty($fee->sharedFees)):?>
              <tr>
                <td class='w-220px'>
                  <select id='shareFees[dept]' name='shareFees[dept][]' class='form-control chosen' data-placeholder='<?php echo $lang->fee->dept;?>'>
                    <option data-person='0'></option>
                    <?php foreach($deptPairs as $id => $dept):?>
                    <option value='<?php echo $id;?>' data-person='<?php echo zget($deptUsers, $id, 0);?>'><?php echo $dept;?></option>
                    <?php endforeach;?>
                  </select>
                </td>
                <td class='w-120px fixpadding'>
                  <div class='input-group'>
                    <?php echo html::input('shareFees[rate][]', '', "class='form-control' placeholder='{$lang->fee->rate}'");?>
                    <span class='input-group-addon'>%</span>
                  </div>
                </td>
                <td class='w-120px fixpadding'><?php echo html::input('shareFees[money][]', '', "class='form-control' placeholder='{$lang->fee->money}'");?></td>
                <td class='fixpadding'><?php echo html::input('shareFees[desc][]', '', "class='form-control' placeholder='{$lang->fee->desc}'");?></td>
                <td class='w-100px action'>
                  <a class='btn btn-xs addItem'><i class='icon icon-plus'></i></a>
                  <a class='btn btn-xs delItem'><i class='icon icon-remove'></i></a>
                </td>
              </tr>
              <?php endif;?>
            </table>
          </td>
        </tr>
        <tr>
          <th><?php echo $lang->fee->total;?></th>
          <td></td>
          <td id='totalRate'  class='text-center fixpadding'></td>
          <td id='totalMoney' class='text-center fixpadding'></td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <th><?php echo $lang->fee->desc;?></th>
          <td colspan='4'><?php echo html::textarea('desc', $fee->desc, "rows='3' class='form-control'");?></td>
          <td></td>
        </tr>
        <tr>
          <th></th>
          <td colspan='5'>
            <?php echo html::submitButton();?>
            <?php echo html::backButton();?>
            <span class='text-danger shareTips'><strong><?php echo $lang->fee->shareTips;?></strong></span>
          </td>
        </tr>
      </table>
    </form>
  </div>
</div>
<?php include '../../common/view/footer.html.php';?>
