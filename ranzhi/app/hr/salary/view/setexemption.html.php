<?php
/**
 * The set bonus view file of salary module of RanZhi.
 *
 * @copyright   Copyright 2009-2017 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商业软件，非开源软件
 * @author      Gang Liu <liugang@cnezsoft.com>
 * @package     salary 
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */
?>
<?php include '../../common/view/header.html.php';?>
<div class='main'>
  <form id='ajaxForm' method='post'>
    <div class='panel'>
      <div class='panel-heading'>
        <strong><i class="icon-wrench"></i> <?php echo $lang->salary->setExemption;?></strong>
      </div>
      <div class='panel-body'>
        <table class='table table-condensed table-borderless'>
          <tr class='text-center'>
            <th class='w-200px'><?php echo $lang->salary->name;?></th>
            <th class='w-200px'><?php echo $lang->salary->amount;?></th>
            <th></th>
          </tr>
          <?php $i = 0;?>
          <?php foreach($exemptionList as $name => $exemption):?>
          <tr class='text-middle'>
            <td class='text-center'>
              <?php echo $name;?>
              <?php echo html::hidden("names[$i]", $name);?>
            </td>
            <?php $readonly    = $name == $lang->salary->exemptionList['basic'] ? "readonly='readonly'" : '';?>
            <?php $placeholder = $name == $lang->salary->exemptionList['basic'] ? "placeholder='{$lang->salary->placeholder->basicExemption}'" : '';?>
            <td><?php echo html::input("amounts[$i]", $exemption->amount, "class='form-control amount' $readonly $placeholder");?></td>
            <td>
              <?php if(!in_array($name, $lang->salary->exemptionList)):?>
              <a href='javascript:;' class='btn btn-mini add'><i class='icon-plus'></i></a>
              <a href='javascript:;' class='btn btn-mini remove'><i class='icon-remove'></i></a>
              <?php endif;?>
            </td>
          </tr>
          <?php $i++;?>
          <?php endforeach;?>
          <tr class='text-center'>
            <td><?php echo html::input("names[$i]", '', "class='form-control'");?></td>
            <td><?php echo html::input("amounts[$i]", '', "class='form-control amount'");?></td>
            <td class='text-left text-middle'>
              <a href='javascript:;' class='btn btn-mini add'><i class='icon-plus'></i></a>
              <a href='javascript:;' class='btn btn-mini remove'><i class='icon-remove'></i></a>
            </td>
          </tr>
          <tr>
            <th class='text-center'><?php echo $lang->salary->total;?></td>
            <td class='text-right' id='total'></td>
            <td colspan='2'></td>
          </tr>
          <tr>
            <td colspan='4'><?php echo html::submitButton();?></td>
          </tr>
        </table>
      </div>
    </div>
  </form>
</div>
<?php
$itemRow = <<<EOT
  <tr class='text-center'>
    <td>
      <input type='text' value="" name="names[key]" class='form-control'>
    </td>
    <td>
      <input type='text' value="" name="amounts[key]" class='form-control amount'>
    </td>
    <td class='text-left text-middle'>
      <a href='javascript:;' class='btn btn-mini add'><i class='icon-plus'></i></a>
      <a href='javascript:;' class='btn btn-mini remove'><i class='icon-remove'></i></a>
    </td>
  </tr>
EOT;
?>
<?php js::set('itemRow', $itemRow);?>
<?php js::set('key', ++$i);?>
<?php include '../../common/view/footer.html.php';?>
