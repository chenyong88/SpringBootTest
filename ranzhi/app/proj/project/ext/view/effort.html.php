<?php
/**
 * The effort view file of project module of RanZhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商业软件，非开源软件
 * @author      Tingting Dai <daitingting@xirangit.com>
 * @package     project
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */
?>
<?php include $app->getModuleRoot() . 'common/view/header.html.php';?>
<?php include '../../../../sys/common/view/datepicker.html.php';?>
<?php $this->loadModel('project', 'proj')->setMenu($projects, $projectID);?>
<div id='menuActions' class='actions'>
  <?php commonModel::printLink('effort', 'export', "account={$account}&orderBy=date_asc&date=_date_", "<i class='icon icon-download-alt'></i> " . $lang->export, "class='iframe btn btn-primary' data-width='700'");?></li>
</div>

<div class='panel'>
  <table id='effortList' class='table table-condensed table-hover table-striped tablesorter table-fixed'>
    <?php $vars = "projectID=$projectID&date=$date&account=$account&orderBy=%s&recTotal=$pager->recTotal&recPerPage=$pager->recPerPage"; ?>
    <thead>
      <tr class='colhead'>
        <th class='w-50px'> <?php commonModel::printOrderLink('id',         $orderBy, $vars, $lang->effort->id);?></th>
        <th class='w-100px'><?php commonModel::printOrderLink('date',       $orderBy, $vars, $lang->effort->date);?></th>
        <th class='w-80px'> <?php commonModel::printOrderLink('account',    $orderBy, $vars, $lang->effort->account);?></th>
        <th>                <?php commonModel::printOrderLink('work',       $orderBy, $vars, $lang->effort->work);?></th>
        <th class='w-100px'><?php commonModel::printOrderLink('consumed',   $orderBy, $vars, $lang->effort->consumed . '('. $lang->effort->hour . ')');?></th>
        <th class='w-100px'><?php commonModel::printOrderLink('left',       $orderBy, $vars, $lang->effort->left . '('. $lang->effort->hour . ')');?></th>
        <th class='w-300px'><?php commonModel::printOrderLink('objectType', $orderBy, $vars, $lang->effort->objectType);?></th>
      </tr>
    </thead>
    <tbody>
    <?php $times = 0?>
    <?php foreach($efforts as $effort):?>
    <tr class='text-center'>
      <td><?php echo $effort->id;?></td>
      <td><?php echo $effort->date;?></td>
      <td><?php echo $accounts[$effort->account];?></td>
      <td class='text-left'><?php echo html::a($this->createLink('effort', 'view', "id=$effort->id&from=my", '', true), $effort->work, '', "class='effortview iframe'");?></td>
      <td><?php echo $effort->consumed;?></td>
      <td><?php echo $effort->left;?></td>
      <td class='text-left'><?php if($effort->objectType != 'custom') echo html::a($this->createLink($effort->objectType, 'view', "id=$effort->objectID"),$effort->objectTitle);?></td>
    </tr>
    <?php $times += $effort->consumed;?>
    <?php endforeach;?>
    </tbody>
    <tfoot>
      <tr><td colspan='7'><?php $pager->show();?></td></tr>
    </tfoot>
  </table>
</div>
<?php js::set('currentDate', $date);?>
<script>
$(document).ready(function()
{
    $('#menu .nav >li').removeClass('active').find('a[href*=effort][href*=' + v.currentDate + ']').parent('li').css('font-weight', 'bold');
})

function changeUser(projectID, account)
{
    location.href = createLink('project', 'effort', 'projectID=' + projectID + '&date=' + v.currentDate + '&account=' + account); 
}
</script>
<?php include '../../../../sys/common/view/footer.html.php';?>
