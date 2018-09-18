<?php
/**
 * The batch create view file of effort module of RanZhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商业软件，非开源软件
 * @author      Tingting Dai <daitingting@xirangit.com>
 * @package     effort 
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */
?>
<?php include '../../../sys/common/view/header.modal.html.php';?>
<?php include '../../../sys/common/view/datepicker.html.php';?>
<form class='form-condensed' id='ajaxForm' method='post' action='<?php echo $this->createLink('effort', 'batchcreate');?>'>
  <div id='titlebar'>
    <div class='input-group w-200px' id='datepicker'>
      <span class='input-group-addon'><?php echo $lang->effort->date;?></span>
      <?php echo html::input('date', $date, "class='form-control form-date' onchange='updateAction(this.value)'");?>
    </div>
  </div>

  <div class='panel'>
    <table class='table table-form table-fixed' id='objectTable'>
      <thead>
        <tr class='text-middle'>
          <th class='w-50px'><?php echo $lang->effort->id;?></th>
          <th><?php echo $lang->effort->work;?></th>
          <th class='w-70px'><?php echo $lang->effort->consumed . '(' . $lang->effort->hour . ')';?></th>
          <th class='w-300px'><?php echo $lang->effort->objectType;?></th>
          <th class='w-70px'><?php echo $lang->effort->left . '(' . $lang->effort->hour . ')';?></th>
          <th class='w-60px'><?php echo html::commonButton($lang->effort->clean, 'btn btn-default', "onclick='cleanEffort()' title='{$lang->effort->noticeClean}'")?></th>
        </tr>
      </thead>
      <tbody>
        <?php $i = 1;?>
        <?php foreach($actions as $action):?>
        <tr class='effortBox computed'>
          <td class='text-center'><?php echo '<span class="effortID">' . $i . '</span>' . html::hidden("id[]", $i);?></td>
          <td><?php echo html::input("work[]", $action->work, 'class="form-control" ' . (empty($action->work) ? '' : 'tabindex="9999"'));?></td>
          <td><?php echo html::input("consumed[]", '', 'autocomplete="off" class="form-control text-center"');?></td>
          <td>
            <?php
            echo html::select("objectType[]", $typeList, "{$action->objectType}_{$action->objectID}", "class='form-control chosen' tabindex='9999' onchange=controlInput(this)");
            echo html::hidden("actionID[]", $action->id);
            ?> 
          </td>
          <td><?php $disabled = $action->objectType == 'task' ? '' : 'disabled'; echo html::input("left[]", '', "autocomplete='off' class='form-control $disabled text-center' " . $disabled);?></td>
          <td class='text-center'>
            <a href='javascript:;' onclick='addEffort(this)' tabindex="9999" class='btn-icon'><i class="icon-plus"></i></a>
            <a href='javascript:;' onclick='deleteEffort(this)' tabindex="9999" class='btn-icon'><i class="icon-remove"></i></a>
          </td>
        </tr>
        <?php $i++;?>
        <?php endforeach;?>
        <?php for($j = 0; $j < 8; $j++, $i++):?>
        <tr class="effortBox new">
          <td align='center'><?php echo '<span class="effortID">' . $i . '</span>' . html::hidden("id[]", $i);?></td>
          <td><?php echo html::input("work[]", '', 'class=form-control');?></td>
          <td><?php echo html::input("consumed[]", '', 'autocomplete="off" class="form-control text-center"');?></td>
          <td><?php echo html::select("objectType[]", $typeList, 'custom', "tabindex='9999' onchange=setLeftInput(this) class='form-control chosen'");?></td> 
          <td><?php echo html::input("left[]", '', 'autocomplete="off" disabled class="disabled form-control text-center"');?></td>
          <td align='center'>
            <a href='javascript:;' onclick='addEffort(this)' tabindex="9999" class='btn-icon'><i class="icon-plus"></i></a>
            <a href='javascript:;' onclick='deleteEffort(this)' tabindex="9999" class='btn-icon'><i class="icon-remove"></i></a>
          </td>
        </tr>
        <?php endfor;?>
      </tbody>
      <tfoot>
        <tr>
          <td colspan='6' class='text-center'>
            <?php echo html::submitButton('', 'btn btn-primary', "onclick='return checkTaskLeft(\"{$lang->effort->noticeFinish}\")'");?>
            <?php echo html::commonButton($lang->goback, 'btn btn-back', "data-dismiss='modal'");?>
          </td>
        </tr>
      </tfoot>
    </table>
  </div>
</form>
<?php js::set('num', $i)?>
<?php include '../../../sys/common/view/footer.modal.html.php';?>
