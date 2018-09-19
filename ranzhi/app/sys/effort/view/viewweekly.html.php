<?php
/**
 * The view weekly view file of effort module of RanZhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商业软件，非开源软件
 * @author      Tingting Dai <daitingting@xirangit.com>
 * @package     effort 
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */
?>
<?php include '../../../sys/my/view/header.html.php';?>
<?php js::set('from', $from);?>
<div class='panel'>
  <div class='panel-heading'>
    <strong><?php echo $weekly->title;?></strong>
  </div>
  <div>
    <table class='table table-bordered'>
      <tr>
        <th class='w-80px text-right'><?php echo $lang->effort->weekly->date;?></th>
        <td colspan='3'><?php echo $weekly->begin . '~' . $weekly->end;?></td> 
      </tr>
      <tr>
        <th class='text-right'><?php echo $lang->effort->weekly->summary;?></th>
        <td colspan='3'><?php echo $weekly->summary;?></td> 
      </tr>
      <?php if(!empty($efforts)):?>
      <tr>
        <th class='text-right'><?php echo $lang->effort->common;?></th>
        <td colspan='3' style='padding:0'>
          <table class='table table-bordered'>
            <?php $dates = range(strtotime($weekly->begin), strtotime($weekly->end), 60 * 60 * 24);?>
            <tr>
              <?php foreach($dates as $key => $datetime):?>
              <?php $date = date('Y-m-d', $datetime);?>
              <?php if(empty($efforts[$date])):?>
              <?php unset($dates[$key]); continue;?>
              <?php endif;?>
              <?php $width = (1 / count($dates) * 100) . '%';?>
              <th style='width:<?php echo $width;?>'><?php echo zget($lang->effort->weekly->weekList, date('w', $datetime));?></th> 
              <?php endforeach;?>
            </tr>
            <tr>
              <?php foreach($dates as $datetime):?>
              <?php $date = date('Y-m-d', $datetime);?>
              <td>
                <?php if(!empty($efforts[$date])):?>
                <ol>
                  <?php foreach($efforts[$date] as $effort):?>
                  <li><?php echo $effort->work;?></li>
                  <?php endforeach;?>
                </ol>
                <?php endif;?>
              </td>
              <?php endforeach;?>
            </tr>
          </table>
        </td>
      </tr>
      <?php endif;?>
      <tr>
        <th class='text-right'><?php echo $lang->effort->weekly->content;?></th>
        <td colspan='3'><?php echo $weekly->content;?></td> 
      </tr>
      <tr>
        <th class='text-right'><?php echo $lang->effort->weekly->createdBy;?></th>
        <td><?php echo zget($users, $weekly->createdBy);?></td> 
        <th class='w-80px'><?php echo $lang->effort->weekly->createdDate;?></th>
        <td><?php echo $weekly->createdDate;?></td> 
      </tr>
      <tr>
        <th class='text-right'><?php echo $lang->effort->weekly->editedBy;?></th>
        <td><?php echo zget($users, $weekly->editedBy);?></td> 
        <th class='w-80px'><?php echo $lang->effort->weekly->editedDate;?></th>
        <td><?php echo $weekly->editedDate;?></td> 
      </tr>
      <tr>
        <th class='text-right'><?php echo $lang->effort->weekly->status;?></th>
        <td colspan='3'><?php echo zget($lang->effort->weekly->statusList, $weekly->status);?></td> 
      </tr>
    </table>
  </div>
</div>
<div class='page-actions'>
  <?php if($weekly->createdBy == $this->app->user->account):?>
  <div class='btn-group'>
    <?php commonModel::printLink('effort', 'editWeekly', "id=$weekly->id", $lang->edit, "class='btn'")?>
    <?php commonModel::printLink('effort', 'deleteWeekly', "id=$weekly->id", $lang->delete, "class='btn deleter'")?>
  </div>
  <?php endif;?>
  <?php echo html::backButton('');?>
</div>
<?php include '../../../sys/common/view/footer.html.php'; ?>
