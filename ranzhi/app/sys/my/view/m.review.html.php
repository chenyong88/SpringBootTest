<?php
/**
 * The review browse mobile view file of my module of RanZhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Tingting Dai <daitingting@xirangit.com>
 * @package     my 
 * @version     $Id
 * @link        http://www.ranzhico.com
 */

if($extView = $this->getExtViewFile(__FILE__)){include $extView; return helper::cd();}

$moduleMenu = $this->my->createModuleMenu($this->methodName);
include "../../common/view/m.header.html.php";
?>

<style>.align-middle td{vertical-align: middle;}</style>

<?php if($type == 'all' && !empty($attends) || $type == 'attend'):?>
<section id='page' class='section list-with-pager'>
  <?php $refreshUrl = $this->createLink('my', 'review', "type=$type&orderBy=$orderBy");?>
  <div class='box' data-refresh-url='<?php echo $refreshUrl ?>'>
    <table class='table bordered'>
      <thead>
        <tr>
         <th class='w-70px text-center'><?php echo $lang->attend->account;?></th>
         <th class='text-center'><?php echo $lang->attend->manualIn;?></th>
         <th class='text-center'><?php echo $lang->attend->status;?></th>
         <th class='w-120px text-center'><?php echo $lang->actions;?></th>
        </tr>
      </thead>
      <?php foreach($attends as $attend):?>
      <tr class='text-center align-middle'>
        <td><?php echo zget($users, $attend->account);?></td>
        <td><?php echo substr($attend->manualIn, 0, 5) . (substr($attend->manualOut, 0, 5) == '00:00' ? '' : '~' . substr($attend->manualOut, 0, 5));?></td>
        <td><?php echo zget($lang->attend->statusList, $attend->status);?></td>
        <td>
          <?php echo "<a class='btn btn-xs success' data-remote='{$this->createLink('oa.attend', 'review', "id={$attend->id}&status=pass")}' data-display='ajaxAction' data-confirm='{$lang->attend->confirmReview['pass']}' data-locate='self'>{$lang->attend->reviewStatusList['pass']}</a>";?>
          <?php echo "<a class='btn btn-xs warning' data-remote='{$this->createLink('oa.attend', 'review', "id={$attend->id}&status=reject")}' data-display='ajaxAction' data-confirm='{$lang->attend->confirmReview['reject']}' data-locate='self'>{$lang->attend->reviewStatusList['reject']}</a>";?>
        </td>
      </tr>
      <?php endforeach;?>
    </table>
  </div>
</section>
<?php elseif($type == 'leave'):?>
<section id='page' class='section list-with-pager'>
  <?php $refreshUrl = $this->createLink('my', 'review', "type=$type&orderBy=$orderBy");?>
  <div class='box' data-refresh-url='<?php echo $refreshUrl ?>'>
    <table class='table bordered'>
      <thead>
        <tr>
         <th class='w-70px text-center'><?php echo $lang->leave->createdBy;?></th>
         <th class='w-50px text-center'><?php echo $lang->leave->type;?></th>
         <th class='text-center'><?php echo $lang->leave->date;?></th>
         <th class='w-70px text-center'><?php echo $lang->actions;?></th>
        </tr>
      </thead>
      <?php foreach($leaveList as $leave):?>
      <tr class='text-center align-middle'>
        <td><?php echo html::a($this->createLink('oa.leave', 'view', "leaveID=$leave->id&type=browseReview"), zget($users, $leave->createdBy));?></td>
        <td><?php echo zget($lang->leave->typeList, $leave->type);?></td>
        <td><?php echo substr($leave->begin, 5) . ' ' . substr($leave->start, 0, 5) . ' ~ ' . substr($leave->end, 5) . ' ' . substr($leave->finish, 0, 5);?></td>
        <td>
          <?php echo "<a class='btn btn-xs success' data-remote='{$this->createLink('oa.leave', 'review', "id={$leave->id}&status=pass")}' data-display='ajaxAction' data-confirm='{$lang->leave->confirmReview['pass']}' data-locate='self'>{$lang->leave->statusList['pass']}</a>";?>
          <?php echo "<a class='btn btn-xs warning' data-remote='{$this->createLink('oa.leave', 'review', "id={$leave->id}&status=reject")}' data-display='ajaxAction' data-confirm='{$lang->leave->confirmReview['reject']}' data-locate='self'>{$lang->leave->statusList['reject']}</a>";?>
        </td>
      </tr>
      <?php endforeach;?>
    </table>
  </div>
</section>
<?php elseif($type == 'makeup'):?>
<section id='page' class='section list-with-pager'>
  <?php $refreshUrl = $this->createLink('my', 'review', "type=$type&orderBy=$orderBy");?>
  <div class='box' data-refresh-url='<?php echo $refreshUrl ?>'>
    <table class='table bordered'>
      <thead>
        <tr>
         <th class='w-70px text-center'><?php echo $lang->makeup->createdBy;?></th>
         <th class='w-100px text-center'><?php echo $lang->makeup->type;?></th>
         <th class='text-center'><?php echo $lang->makeup->date;?></th>
         <th class='w-70px text-center'><?php echo $lang->actions;?></th>
        </tr>
      </thead>
      <?php foreach($makeupList as $makeup):?>
      <tr class='text-center align-middle'>
        <td><?php echo html::a($this->createLink('oa.makeup', 'view', "makeupID=$makeup->id&type=browseReview"), zget($users, $makeup->createdBy));?></td>
        <td><?php echo zget($lang->makeup->typeList, $makeup->type);?></td>
        <td><?php echo substr($makeup->begin, 5) . ' ' . substr($makeup->start, 0, 5) . ' ~ ' . substr($makeup->end, 5) . ' ' . substr($makeup->finish, 0, 5);?></td>
        <td>
          <?php echo "<a class='btn btn-xs success' data-remote='{$this->createLink('oa.makeup', 'review', "id={$makeup->id}&status=pass")}' data-display='ajaxAction' data-confirm='{$lang->makeup->confirmReview['pass']}' data-locate='self'>{$lang->makeup->statusList['pass']}</a>";?>
          <?php echo "<a class='btn btn-xs warning' data-remote='{$this->createLink('oa.makeup', 'review', "id={$makeup->id}&status=reject")}' data-display='ajaxAction' data-confirm='{$lang->makeup->confirmReview['reject']}' data-locate='self'>{$lang->makeup->statusList['reject']}</a>";?>
        </td>
      </tr>
      <?php endforeach;?>
    </table>
  </div>
</section>
<?php elseif($type == 'overtime'):?>
<section id='page' class='section list-with-pager'>
  <?php $refreshUrl = $this->createLink('my', 'review', "type=$type&orderBy=$orderBy");?>
  <div class='box' data-refresh-url='<?php echo $refreshUrl ?>'>
    <table class='table bordered'>
      <thead>
        <tr>
         <th class='w-70px text-center'><?php echo $lang->overtime->createdBy;?></th>
         <th class='w-100px text-center'><?php echo $lang->overtime->type;?></th>
         <th class='text-center'><?php echo $lang->overtime->date;?></th>
         <th class='w-70px text-center'><?php echo $lang->actions;?></th>
        </tr>
      </thead>
      <?php foreach($overtimeList as $overtime):?>
      <tr class='text-center align-middle'>
        <td><?php echo html::a($this->createLink('oa.overtime', 'view', "overtimeID=$overtime->id&type=browseReview"), zget($users, $overtime->createdBy));?></td>
        <td><?php echo zget($lang->overtime->typeList, $overtime->type);?></td>
        <td><?php echo substr($overtime->begin, 5) . ' ' . substr($overtime->start, 0, 5) . ' ~ ' . substr($overtime->end, 5) . ' ' . substr($overtime->finish, 0, 5);?></td>
        <td>
          <?php echo "<a class='btn btn-xs success' data-remote='{$this->createLink('oa.overtime', 'review', "id={$overtime->id}&status=pass")}' data-display='ajaxAction' data-confirm='{$lang->overtime->confirmReview['pass']}' data-locate='self'>{$lang->overtime->statusList['pass']}</a>";?>
          <?php echo "<a class='btn btn-xs warning' data-remote='{$this->createLink('oa.overtime', 'review', "id={$overtime->id}&status=reject")}' data-display='ajaxAction' data-confirm='{$lang->overtime->confirmReview['reject']}' data-locate='self'>{$lang->overtime->statusList['reject']}</a>";?>
        </td>
      </tr>
      <?php endforeach;?>
    </table>
  </div>
</section>
<?php elseif($type == 'all' && !empty($lieuList) || $type == 'lieu'):?>
<section id='page' class='section list-with-pager'>
  <?php $refreshUrl = $this->createLink('my', 'review', "type=$type&orderBy=$orderBy");?>
  <div class='box' data-refresh-url='<?php echo $refreshUrl ?>'>
    <table class='table bordered'>
      <thead>
        <tr>
         <th class='w-70px text-center'><?php echo $lang->lieu->createdBy;?></th>
         <th class='text-center'><?php echo $lang->lieu->date;?></th>
         <th class='w-70px text-center'><?php echo $lang->actions;?></th>
        </tr>
      </thead>
      <?php foreach($lieuList as $lieu):?>
      <tr class='text-center align-middle'>
        <td><?php echo html::a($this->createLink('oa.lieu', 'view', "lieuID=$lieu->id&type=browseReview"), zget($users, $lieu->createdBy));?></td>
        <td><?php echo substr($lieu->begin, 5) . ' ' . substr($lieu->start, 0, 5) . ' ~ ' . substr($lieu->end, 5) . ' ' . substr($lieu->finish, 0, 5);?></td>
        <td>
          <?php echo "<a class='btn btn-xs success' data-remote='{$this->createLink('oa.lieu', 'review', "id={$lieu->id}&status=pass")}' data-display='ajaxAction' data-confirm='{$lang->lieu->confirmReview['pass']}' data-locate='self'>{$lang->lieu->statusList['pass']}</a>";?>
          <?php echo "<a class='btn btn-xs warning' data-remote='{$this->createLink('oa.lieu', 'review', "id={$lieu->id}&status=reject")}' data-display='ajaxAction' data-confirm='{$lang->lieu->confirmReview['reject']}' data-locate='self'>{$lang->lieu->statusList['reject']}</a>";?>
        </td>
      </tr>
      <?php endforeach;?>
    </table>
  </div>
</section>
<?php elseif($type == 'all' && !empty($refunds) || $type == 'refund'):?>
<section id='page' class='section list-with-pager'>
  <?php $refreshUrl = $this->createLink('my', 'review', "type={$type}");?>
  <div class='box' data-refresh-url='<?php echo $refreshUrl;?>'>
    <table class='table bordered'>
      <thead>
        <tr>
         <th class='w-70px text-center'><?php echo $lang->refund->createdBy;?></th>
         <th class='text-center'><?php echo $lang->refund->name;?></th>
         <th class='w-80px text-center'><?php echo $lang->refund->money;?></th>
         <th class='w-70px text-center'><?php echo $lang->actions;?></th>
        </tr>
      </thead>
      <?php foreach($refunds as $refund):?>
      <tr class='text-center align-middle'>
        <td><?php echo zget($users, $refund->createdBy);?></td>
        <td><?php echo html::a($this->createLink('oa.refund', 'view', "refundID=$refund->id&type=review"), $refund->name);?></td>
        <td class='text-right'><?php echo zget($currencySign, $refund->currency) . $refund->money;?></td>
        <td>
          <?php echo "<a class='btn btn-xs primary' data-remote='{$this->createLink('oa.refund', 'review', "id={$refund->id}")}' data-display='modal' data-placement='bottom'>{$lang->refund->review}</a>";?>
        </td>
      </tr>
      <?php endforeach;?>
    </table>
  </div>
</section>
<?php endif;?>
<?php if($type == 'all' && (!empty($leaveList) || !empty($makeup) || !empty($overtime))):?>
<section id='page' class='section list-with-pager'>
  <?php $refreshUrl = $this->createLink('my', 'review', "type=$type&orderBy=$orderBy");?>
  <div class='box' data-refresh-url='<?php echo $refreshUrl ?>'>
    <table class='table bordered'>
      <thead>
        <tr>
         <th class='w-70px text-center'><?php echo $lang->leave->createdBy;?></th>
         <th class='w-50px text-center'><?php echo $lang->leave->type;?></th>
         <th class='text-center'><?php echo $lang->leave->date;?></th>
         <th class='w-70px text-center'><?php echo $lang->actions;?></th>
        </tr>
      </thead>
        <?php if(!empty($leaveList)):?>
        <?php foreach($leaveList as $leave):?>
        <tr class='text-center align-middle'>
          <td><?php echo html::a($this->createLink('oa.leave', 'view', "leaveID=$leave->id&type=browseReview"), zget($users, $leave->createdBy));?></td>
          <td><?php echo zget($lang->leave->typeList, $leave->type);?></td>
          <td><?php echo substr($leave->begin, 5) . ' ' . substr($leave->start, 0, 5) . ' ~ ' . substr($leave->end, 5) . ' ' . substr($leave->finish, 0, 5);?></td>
          <td>
            <?php echo "<a class='btn btn-xs success' data-remote='{$this->createLink('oa.leave', 'review', "id={$leave->id}&status=pass")}' data-display='ajaxAction' data-confirm='{$lang->leave->confirmReview['pass']}' data-locate='self'>{$lang->leave->statusList['pass']}</a>";?>
            <?php echo "<a class='btn btn-xs warning' data-remote='{$this->createLink('oa.leave', 'review', "id={$leave->id}&status=reject")}' data-display='ajaxAction' data-confirm='{$lang->leave->confirmReview['reject']}' data-locate='self'>{$lang->leave->statusList['reject']}</a>";?>
          </td>
        </tr>
        <?php endforeach;?>
        <?php endif;?>
        <?php if(!empty($makeup)):?>
        <?php foreach($makeupList as $makeup):?>
        <tr class='text-center align-middle'>
          <td><?php echo html::a($this->createLink('oa.makeup', 'view', "makeupID=$makeup->id&type=browseReview"), zget($users, $makeup->createdBy));?></td>
          <td><?php echo zget($lang->makeup->typeList, $makeup->type);?></td>
          <td><?php echo substr($makeup->begin, 5) . ' ' . substr($makeup->start, 0, 5) . ' ~ ' . substr($makeup->end, 5) . ' ' . substr($makeup->finish, 0, 5);?></td>
          <td>
            <?php echo "<a class='btn btn-xs success' data-remote='{$this->createLink('oa.makeup', 'review', "id={$makeup->id}&status=pass")}' data-display='ajaxAction' data-confirm='{$lang->makeup->confirmReview['pass']}' data-locate='self'>{$lang->makeup->statusList['pass']}</a>";?>
            <?php echo "<a class='btn btn-xs warning' data-remote='{$this->createLink('oa.makeup', 'review', "id={$makeup->id}&status=reject")}' data-display='ajaxAction' data-confirm='{$lang->makeup->confirmReview['reject']}' data-locate='self'>{$lang->makeup->statusList['reject']}</a>";?>
          </td>
        </tr>
        <?php endforeach;?>
        <?php endif;?>
        <?php if(!empty($overtimeList)):?>
        <?php foreach($overtimeList as $overtime):?>
        <tr class='text-center align-middle'>
          <td><?php echo html::a($this->createLink('oa.overtime', 'view', "overtimeID=$overtime->id&type=browseReview"), zget($users, $overtime->createdBy));?></td>
          <td><?php echo zget($lang->overtime->typeList, $overtime->type);?></td>
          <td><?php echo substr($overtime->begin, 5) . ' ' . substr($overtime->start, 0, 5) . ' ~ ' . substr($overtime->end, 5) . ' ' . substr($overtime->finish, 0, 5);?></td>
          <td>
            <?php echo "<a class='btn btn-xs success' data-remote='{$this->createLink('oa.overtime', 'review', "id={$overtime->id}&status=pass")}' data-display='ajaxAction' data-confirm='{$lang->overtime->confirmReview['pass']}' data-locate='self'>{$lang->overtime->statusList['pass']}</a>";?>
            <?php echo "<a class='btn btn-xs warning' data-remote='{$this->createLink('oa.overtime', 'review', "id={$overtime->id}&status=reject")}' data-display='ajaxAction' data-confirm='{$lang->overtime->confirmReview['reject']}' data-locate='self'>{$lang->overtime->statusList['reject']}</a>";?>
          </td>
        </tr>
        <?php endforeach;?>
        <?php endif;?>
      </tbody>
    </table>
  </div>
</section>
<?php endif;?>
<script>
$('#menu > a').removeClass('active').filter('[href*="<?php echo $type ?>"]').addClass('active');
</script>
<?php include "../../common/view/m.footer.html.php"; ?>
