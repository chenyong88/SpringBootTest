<?php
/**
 * The detail view file of project module of RanZhi.
 *
 * @copyright   Copyright 2009-2018 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Gang Liu <liugang@cnezsoft.com>
 * @package     project 
 * @version     $Id$
 * @link        http://www.ranzhi.org
 */
?>
<?php include '../../../sys/common/view/header.modal.html.php';?>
<table class='table table-bordered'>
  <tr>
    <th class='w-100px'><?php echo $lang->project->status;?></th>
    <td><?php echo zget($lang->project->statusList, $project->status);?></td>
  </tr>
  <tr>
    <th><?php echo $lang->project->begin;?></th>
    <td><?php echo $project->begin;?></td>
  </tr>
  <tr>
    <th><?php echo $lang->project->end;?></th>
    <td><?php echo $project->end;?></td>
  </tr>
  <tr>
    <th><?php echo $lang->project->manager;?></th>
    <td><?php echo zget($users, $project->PM);?></td>
  </tr>
  <tr>
    <th><?php echo $lang->project->member;?></th>
    <td><?php foreach($project->members as $member) if($member->role == 'member') echo zget($users, $member->account) . ' ';?></td>
  </tr>
  <tr>
    <th><?php echo $lang->project->desc;?></th>
    <td><?php echo $project->desc;?></td>
  </tr>
</table>
<?php echo $this->fetch('action', 'history', "objectType=project&objectID=$project->id");?>
<?php include '../../../sys/common/view/footer.modal.html.php';?>
