<?php
/**
 * The share view file of rule module of RanZhi.
 *
 * @copyright   Copyright 2009-2017 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Gang Liu <liugang@cnezsoft.com>
 * @package     rule 
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */
?>
<?php include '../../../sys/common/view/header.modal.html.php';?>
<?php include '../../../sys/common/view/chosen.html.php';?>
<form id='ajaxForm' method='post' action='<?php echo inlink('share', "ruleID=$rule->id");?>'>
  <table class='table table-borderless table-condensed'>
    <tr class='text-center'>
      <th class='w-220px'><?php echo $lang->rule->from;?></th>
      <th class='w-160px'><?php echo $lang->rule->fromCategory;?></th>
      <th class='w-220px'><?php echo $lang->rule->to;?></th>
      <th class='w-160px'><?php echo $lang->rule->toCategory;?></th>
      <th class='w-110px'><?php echo $lang->rule->rate;?></th>
      <th class='w-70px'><?php echo $lang->actions;?></th>
    </tr>
    <?php foreach($rule->sharedRules as $sharedRule):?>
    <tr>
      <td><?php echo html::select('shareRules[from][]', $deptList, $sharedRule->from, "class='form-control chosen'");?></td>
      <td><?php echo html::select('shareRules[fromCategory][]', $expenseList, $sharedRule->fromCategory, "class='form-control chosen'");?></td>
      <td><?php echo html::select('shareRules[to][]', $deptList, $sharedRule->to, "class='form-control chosen'");?></td>
      <td><?php echo html::select('shareRules[toCategory][]', $incomeList, $sharedRule->toCategory, "class='form-control chosen'");?></td>
      <td>
        <div class='input-group'>
          <?php echo html::input('shareRules[rate][]', $sharedRule->rate, "class='form-control'");?>
          <span class='input-group-addon'>%</span>
        </div>
      </td>
      <td class='text-middle'>
        <a class='btn btn-xs addItem'><i class='icon icon-plus'></i></a>
        <a class='btn btn-xs delItem'><i class='icon icon-remove'></i></a>
      </td>
    </tr>
    <?php endforeach;?>
    <?php for($i = 0; $i < $config->rule->shareCount - count($rule->sharedRules); $i++):?>
    <tr>
      <td><?php echo html::select('shareRules[from][]', $deptList, '', "class='form-control chosen'");?></td>
      <td><?php echo html::select('shareRules[fromCategory][]', $expenseList, '', "class='form-control chosen'");?></td>
      <td><?php echo html::select('shareRules[to][]', $deptList, '', "class='form-control chosen'");?></td>
      <td><?php echo html::select('shareRules[toCategory][]', $incomeList, '', "class='form-control chosen'");?></td>
      <td>
        <div class='input-group'>
          <?php echo html::input('shareRules[rate][]', '', "class='form-control'");?>
          <span class='input-group-addon'>%</span>
        </div>
      </td>
      <td class='text-middle'>
        <a class='btn btn-xs addItem'><i class='icon icon-plus'></i></a>
        <a class='btn btn-xs delItem'><i class='icon icon-remove'></i></a>
      </td>
    </tr>
    <?php endfor;?>
    <tr>
      <th class='text-center'><?php echo $lang->rule->total;?></th>
      <td id='totalRate' class='text-center'></td>
      <td colspan='3'></td>
    </tr>
    <tr>
      <td class='text-middle text-danger' colspan='2'>
        <span><strong><?php echo $lang->rule->shareTips;?></strong></span>
      </td>
      <td><?php echo html::submitButton();?></td>
      <td colspan='2'></td>
    </tr>
  </table>
</form>
<?php include '../../common/view/footer.html.php';?>
