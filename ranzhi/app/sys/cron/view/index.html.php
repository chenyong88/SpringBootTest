<?php
/**
 * The index view file of cron module of RanZhi.
 *
 * @copyright   Copyright 2009-2018 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Yidong Wang <yidong@cnezsoft.com>
 * @package     cron
 * @version     $Id$
 * @link        http://www.ranzhi.org
 */
?>
<?php include '../../common/view/header.html.php';?>
<?php if(!empty($config->global->cron)):?>
<div id='menuActions'>
  <?php commonModel::printLink('cron', 'turnon', '', $lang->cron->turnonList[0], "class='btn btn-primary' data-type='iframe' data-toggle='modal'");?>
  <?php commonModel::printLink('cron', 'create', '', $lang->cron->create, "class='btn btn-primary'")?>
</div>
<div class='panel'>
  <table class='table table-hover table-border'>
    <thead>
      <tr class='text-center'>
        <th class='w-60px'><?php echo $lang->cron->m?></th>
        <th class='w-60px'><?php echo $lang->cron->h?></th>
        <th class='w-60px'><?php echo $lang->cron->dom?></th>
        <th class='w-60px'><?php echo $lang->cron->mon?></th>
        <th class='w-60px'><?php echo $lang->cron->dow?></th>
        <th><?php echo $lang->cron->command?></th>
        <th class='w-130px'><?php echo $lang->cron->remark?></th>
        <th class='w-130px'><?php echo $lang->cron->lastTime?></th>
        <th class='w-60px'><?php echo $lang->cron->status?></th>
       <?php $class = $this->app->clientLang == 'en' ? 'w-130px' : 'w-120px';?>
        <th class='<?php echo $class;?>'><?php echo $lang->actions;?></th>
      </tr>
    </thead>
    <tbody class='text-center'>
    <?php foreach($crons as $cron):?>
      <tr>
        <td><?php echo $cron->m;?></td>
        <td><?php echo $cron->h;?></td>
        <td><?php echo $cron->dom;?></td>
        <td><?php echo $cron->mon;?></td>
        <td><?php echo $cron->dow;?></td>
        <td class='text-left' title='<?php echo $cron->command?>'><?php echo $cron->command;?></td>
        <td class='text-left' title='<?php echo $cron->remark?>'><?php echo $cron->remark;?></td>
        <td><?php echo substr($cron->lastTime, 2);?></td>
        <td><?php echo zget($lang->cron->statusList, $cron->status);?></td>
        <td class='text-left'>
          <?php
          if(!empty($cron->command)) commonModel::printLink('cron', 'toggle', "id=$cron->id&status=" . ($cron->status == 'stop' ? 'normal' :  'stop'), $cron->status == 'stop' ? $lang->cron->toggleList['start'] : $lang->cron->toggleList['stop']);
          commonModel::printLink('cron', 'edit', "id=$cron->id", $lang->edit);
          commonModel::printLink('cron', 'delete', "id=$cron->id", $lang->delete, "class='deleter'");
          ?>
        </td>
      </tr>
    <?php endforeach;?>
    </tbody>
  </table>
</div>
<?php else:?>
<div class='panel'>
  <div class='panel-body'>
    <?php
    echo $lang->cron->introduction;
    printf($lang->cron->confirmOpen, inlink('turnon'));
    ?>
  </div>
</div>
<?php endif;?>
<?php include '../../common/view/footer.html.php';?>
