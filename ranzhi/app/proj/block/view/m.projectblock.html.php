<?php
/**
 * The project block mobile view file of block module of RanZhi.
 *
 * @copyright   Copyright 2009-2015 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Hao Sun <sunhao@cnezsoft.com>
 * @package     block
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */
?>
<table class='table bordered'>
  <thead>
    <tr>
      <th><?php echo $lang->project->name;?></th>
      <th class='w-110px text-center'><?php echo $lang->project->dateRange;?></th>
      <th class='w-70px text-center'><?php echo $lang->project->status;?></th>
    </tr>
  </thead>
  <?php foreach($projects as $project):?>
  <tr class='text-center' data-url='<?php echo $this->createLink('proj.task', 'browse', "projectID={$project->id}")?>' data-id=<?php echo $project->id;?>>
    <td class='text-left'><?php echo $project->name;?> </td>
    <td><?php echo substr($project->begin, 5, 5) . '~' . substr($project->end, 5, 5);?></td>
    <td><span class='label status-<?php echo $project->status;?>-pale'><?php echo zget($lang->project->statusList, $project->status);?></span></td>
  </tr>
  <?php endforeach;?>
</table>
