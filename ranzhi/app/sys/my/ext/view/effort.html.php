<?php
/**
 * The effort view file of my module of Ranzhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商业软件，非开源软件
 * @author      Tingting Dai <daitingting@xirangit.com>
 * @package     my
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */
?>
<?php include '../../../../sys/my/view/header.html.php';?>
<?php include '../../../../sys/common/view/datepicker.html.php';?>
<div id='menuActions' class='actions'>
  <?php commonModel::printLink('effort', 'export', "account={$this->app->user->account}&orderBy=date_asc&date=_date_", "<i class='icon icon-download-alt'></i> " . $lang->export, "class='iframe btn btn-primary' data-width='700'");?></li>
</div>
<form action='<?php echo $this->createLink('effort', 'batchEdit', "from=browse")?>' method='post'>
  <div class='panel'>
    <table class='table table-bordered table-hover table-striped tablesorter table-fixed'>
      <?php $vars = "type=$type&orderBy=%s&recTotal=$pager->recTotal&recPerPage=$pager->recPerPage"; ?>
      <thead>
        <tr class='text-center'>
          <th class='w-50px'> <?php commonModel::printOrderLink('id',         $orderBy, $vars, $lang->effort->id);?></th>
          <th class='w-100px'><?php commonModel::printOrderLink('date',       $orderBy, $vars, $lang->effort->date);?></th>
          <th>                <?php commonModel::printOrderLink('work',       $orderBy, $vars, $lang->effort->work);?></th>
          <th class='w-100px'><?php commonModel::printOrderLink('consumed',   $orderBy, $vars, $lang->effort->consumed . '('. $lang->effort->hour . ')');?></th>
          <th class='w-100px'><?php commonModel::printOrderLink('left',       $orderBy, $vars, $lang->effort->left . '('. $lang->effort->hour . ')');?></th>
          <th class='w-300px'><?php commonModel::printOrderLink('objectType', $orderBy, $vars, $lang->effort->objectType);?></th>
          <th class='w-80px'> <?php echo $lang->actions;?></th>
        </tr>
      </thead>
      <tbody>
        <?php $times = 0?>
        <?php foreach($efforts as $effort):?>
        <tr class='text-center'>
          <td><label class='checkbox-inline'><input type='checkbox' name='effortIDList[]' value='<?php echo $effort->id;?>'/> <?php echo $effort->id;?></label></td>
          <td><?php echo $effort->date;?></td>
          <td class='text-left'><?php echo html::a($this->createLink('effort', 'view', "id=$effort->id&from=my"), $effort->work, "data-toggle='modal'");?></td>
          <td><?php echo $effort->consumed;?></td>
          <td><?php echo $effort->objectType == 'task' ? $effort->left : '';?></td>
          <td class='text-left objectLink'>
            <?php
            if($effort->objectType != 'custom')
            {
                $module = ((strpos(',order,customer,contract,', ",$effort->objectType,") !== false) ? 'crm.' : (($effort->objectType == 'task') ? 'oa.' : '')) . $effort->objectType;
                echo html::a($this->createLink($module, 'view', "id=$effort->objectID"), $effort->objectTitle, $effort->objectType == 'todo' ? "data-toggle='modal'" : '');
            }
            ?>
          </td>
          <td>
            <?php commonModel::printLink('effort', 'edit', "id=$effort->id", $lang->edit, "data-toggle='modal'");?>
            <?php commonModel::printLink('effort', 'delete', "id=$effort->id", $lang->delete, "class='deleter'");?>
          </td>
        </tr>
        <?php $times += $effort->consumed;?>
        <?php endforeach;?>
      </tbody>
      <tfoot>
        <tr>
          <td colspan='7'>
            <div class='pull-left'>
              <?php
              if($efforts)
              {
                  echo html::selectButton();
                  if(commonModel::hasPriv('effort', 'batchEdit')) echo html::submitButton($lang->effort->batchEdit);
              }
              ?>
            </div>
            <?php $pager->show();?>
          </td>
        </tr>
      </tfoot>
    </table>
  </div>
</form>
<?php
if($type == 'bydate')
{
    if($date == date('Y-m-d')) $type = 'today';
    if($date == date('Y-m-d', strtotime('-1 day'))) $type = 'yesterday'; 
}
js::set('type', $type)
?>
<?php include '../../../../sys/common/view/footer.html.php';?>
