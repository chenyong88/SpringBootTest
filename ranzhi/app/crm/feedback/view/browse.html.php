<?php
/**
 * The browse view file of feedback module of Ranzhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商业软件，非开源软件
 * @author      Yidong Wang <yidong@cnezsoft.com>
 * @package     feedback
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */
?>
<?php include '../../common/view/header.html.php';?>
<?php js::set('mode', $type);?>
<li id='bysearchTab'><?php echo html::a('#', "<i class='icon-search icon'></i>" . $lang->search->common)?></li>
<div id='menuActions'>
  <?php commonModel::printLink('feedback', 'create', '', '<i class="icon-plus"></i> ' . $lang->feedback->create, 'class="btn btn-primary"');?>
</div>
<div class='panel'>
  <table class='table table-bordered table-hover table-striped tablesorter table-data table-fixed'>
    <thead>
      <tr class='text-center'>
        <?php $vars = "orderBy=%s&recTotal={$pager->recTotal}&recPerPage={$pager->recPerPage}&pageID={$pager->pageID}";?>
        <th class='w-60px'> <?php commonModel::printOrderLink('id',         $orderBy, $vars, $lang->feedback->id);?></th>
        <th class='w-40px'> <?php commonModel::printOrderLink('pri',        $orderBy, $vars, $lang->feedback->lblPri);?></th>
        <th>                <?php commonModel::printOrderLink('title',      $orderBy, $vars, $lang->feedback->title);?></th>
        <th class='w-100px'><?php commonModel::printOrderLink('product',    $orderBy, $vars, $lang->feedback->product);?></th>
        <th class='w-200px'><?php commonModel::printOrderLink('customer',   $orderBy, $vars, $lang->feedback->customer);?></th>
        <th class='w-120px'><?php commonModel::printOrderLink('contact',    $orderBy, $vars, $lang->feedback->contact);?></th>
        <th class='w-150px'><?php commonModel::printOrderLink('addedDate',  $orderBy, $vars, $lang->feedback->addedDate);?></th>
        <th class='w-100px'><?php commonModel::printOrderLink('assignedTo', $orderBy, $vars, $lang->feedback->assignedTo);?></th>
        <th class='w-80px'> <?php commonModel::printOrderLink('status',     $orderBy, $vars, $lang->feedback->status);?></th>
        <?php $class = $this->app->clientLang == 'en' ? 'w-160px' : 'w-150px';?>
        <th class='<?php echo $class;?>'><?php echo $lang->actions;?></th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($issues as $issue):?>
      <tr class='text-center' data-url='<?php echo inlink('view', "issueID={$issue->id}&type=$type");?>'>
        <td><?php echo $issue->id;?></td>
        <td><?php echo $lang->feedback->priList[$issue->pri];?></td>
        <td class='text-left' title='<?php echo $issue->title;?>'><?php echo $issue->title;?></td>
        <td><?php echo zget($products, $issue->product);?></td>
        <td title='<?php echo zget($customers, $issue->customer);?>'><?php echo zget($customers, $issue->customer);?></td>
        <td><?php echo zget($contacts, $issue->contact);?></td>
        <td><?php echo $issue->addedDate;?></td>
        <td><?php echo zget($users, $issue->assignedTo);?></td>
        <td><?php echo zget($lang->feedback->statusList, $issue->status);?></td>
        <td>
          <?php
          if($issue->status == 'closed')
          {
              if(commonModel::hasPriv('feedback', 'edit')) echo html::a('#', $lang->edit,   "disabled='disabled'");
              if(commonModel::hasPriv('feedback', 'assignTo')) echo html::a('#', $lang->assign, "disabled='disabled'");
              commonModel::printLink('feedback', 'activate', "issueID={$issue->id}", $lang->activate, "data-toggle='modal'");
          }
          else
          {
              commonModel::printLink('feedback', 'edit',     "issueID={$issue->id}&type=$type", $lang->edit);
              commonModel::printLink('feedback', 'assignto', "issueID={$issue->id}", $lang->assign, "data-toggle='modal'");
              commonModel::printLink('feedback', 'close',    "issueID={$issue->id}", $lang->close,  "data-toggle='modal'");
          }
          commonModel::printLink('feedback', 'delete',   "issueID={$issue->id}", $lang->delete, "class='deleter'");
          ?>
        </td>
      </tr>
      <?php endforeach;?>
    </tbody>
    <tfoot><tr><td colspan='10'><?php $pager->show();?></td></tr></tfoot>
  </table>
</div>
<?php include '../../common/view/footer.html.php';?>
