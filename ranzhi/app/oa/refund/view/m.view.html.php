<?php
/**
 * The view mobile view file of refund module of RanZhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Tingting Dai <daitingting@xirangit.com>
 * @package     refund 
 * @version     $Id
 * @link        http://www.ranzhico.com
 */

if($extView = $this->getExtViewFile(__FILE__)){include $extView; return helper::cd();}

$moduleMenu = false;
$bodyClass  = 'with-nav-bottom';
$browseLink = $this->session->refundList ? $this->session->refundList : inlink('personal');

include "../../common/view/m.header.html.php";
?>
<div id='page' class='list-with-actions'>
  <div class='section no-margin'>
    <div class='heading gray'>
      <div class='title'><i class='icon-calendar'> </i><?php echo $lang->refund->view;?></div>
      <nav class='nav'><a class='btn primary' href='<?php echo $browseLink;?>'><?php echo $lang->goback;?></a></nav>
    </div>
    <div class='box'>
      <table class='table bordered table-detail'>
        <tr>
          <td class='w-80px'><?php echo $lang->refund->createdBy;?></td>
          <td><?php echo zget($users, $refund->createdBy);?></td>
        </tr>
        <tr>
          <td><?php echo $lang->refund->money;?></td>
          <td><?php echo zget($currencySign, $refund->currency) . $refund->money;?></td>
        </tr>
        <?php if(!empty($refund->category)):?>
        <tr>
          <td><?php echo $lang->refund->category;?></td>
          <td><?php echo zget($categories, $refund->category, ' ')?></td>
        </tr>
        <?php endif;?>
        <tr>
          <td><?php echo $lang->refund->status;?></td>
          <td><span class='label status-<?php echo $refund->status?>-pale'><?php echo zget($lang->refund->statusList, $refund->status)?></span></td>
        </tr>
        <tr>
          <td><?php echo $lang->refund->date;?></td>
          <td><?php echo $refund->date?></td>
        </tr>
        <tr>
          <td><?php echo $lang->refund->related;?></td>
          <?php $related = ''; foreach(explode(',', trim($refund->related, ',')) as $account) $related .= ' ' . zget($users, $account)?>
          <td><?php echo $related?></td>
        </tr>
        <tr>
          <td><?php echo $lang->refund->createdBy;?></td>
          <td><?php echo zget($users, $refund->createdBy) . $lang->at . $refund->createdDate;?></td>
        </tr>
        <?php if($refund->editedBy):?>
        <tr>
          <td><?php echo $lang->refund->editedBy;?></td>
          <td><?php echo zget($users, $refund->editedBy) . $lang->at . $refund->editedDate;?></td>
        </tr>
        <?php endif; ?>
        <?php if($refund->firstReviewer):?>
        <tr>
          <td><?php echo $lang->refund->firstReviewer;?></td>
          <td><?php echo zget($users, $refund->firstReviewer) . $lang->at . $refund->firstReviewDate;?></td>
        </tr>
        <?php endif; ?>
        <?php if($refund->secondReviewer):?>
        <tr>
          <td><?php echo $lang->refund->secondReviewer;?></td>
          <td><?php echo zget($users, $refund->secondReviewer) . $lang->at . $refund->secondReviewDate;?></td>
        </tr>
        <?php endif; ?>
        <?php if($refund->refundBy):?>
        <tr>
          <td><?php echo $lang->refund->refundBy;?></td>
          <td><?php echo zget($users, $refund->refundBy) . $lang->at . $refund->refundDate;?></td>
        </tr>
        <?php endif; ?>
        <?php if($refund->desc):?>
        <tr>
          <td><?php echo $lang->refund->desc;?></td>
          <td><?php echo $refund->desc;?></td>
        </tr>
        <?php endif; ?>
        <?php if($refund->reason):?>
        <tr>
          <td><?php echo $lang->refund->statusList[$refund->status] . $lang->refund->reason;?></td>
          <td><?php echo $refund->reason;?></td>
        </tr>
        <?php endif; ?>
      </table>
    </div>

    <?php if(!empty($refund->files)):?>
    <div class='heading gray'>
      <div class='title'><i class='icon icon-file-text-o'> </i><?php echo $lang->file->common;?></div>
    </div>
    <div class='list'>
      <?php echo $this->fetch('file', 'printFiles', array('files' => $refund->files, 'fieldset' => 'false'))?>
    </div>
    <?php endif;?>

    <?php if(!empty($refund->detail)):?>
    <div class='box'>
      <table class='table bordered'>
        <tr class='text-center'>
          <th class='w-100px'><?php echo $lang->refund->date;?></th>
          <th class='w-90px'><?php echo $lang->refund->money;?></th>
          <th><?php echo $lang->refund->desc;?></th>
          <th class='w-90px'><?php echo $lang->refund->status;?></th>
        </tr>
        <?php foreach($refund->detail as $d):?>
        <?php $related = ''; foreach(explode(',', trim($d->related, ',')) as $account) $related .= ' ' . zget($users, $account)?>
        <tr>
          <td><?php echo $d->date?></td>
          <td class='text-right'><?php echo zget($currencySign, $d->currency) . $d->money?></td>
          <td><?php echo $d->desc;?></td>
          <td><span class='label status-<?php echo $d->status;?>-pale'><?php echo zget($lang->refund->statusList, $d->status)?></span></td>
        </tr>
        <?php endforeach;?>
      </table>
    </div>
    <?php endif;?>
  </div>

  <div class='section' id='history'>
    <?php echo $this->fetch('action', 'history', "objectType=refund&objectID={$refund->id}");?>
  </div>

  <nav class='nav affix dock-bottom nav-auto footer-actions'>
    <?php
    if($refund->createdBy == $this->app->user->account and ($refund->status == 'wait' or $refund->status == 'draft'))
    {
        echo "<a data-remote='{$this->createLink('oa.refund', 'edit', "refundID={$refund->id}")}' data-display='modal' data-placement='bottom'>{$lang->edit}</a>";
        echo "<a data-remote='{$this->createLink('oa.refund', 'delete', "refundID=$refund->id")}' class='text-danger' data-display='ajaxAction' data-ajax-delete='true' data-locate='{$this->createLink('oa.refund', 'browse')}'>{$lang->delete}</a>";

        if($refund->status == 'wait' or $refund->status == 'draft')
        {
            $action = $refund->status == 'wait' ? $lang->refund->cancel : $lang->refund->commit;
            echo "<a data-remote='{$this->createLink('oa.refund', 'switchstatus', "id=$refund->id")}' data-display='ajaxAction' data-locate='self'>{$action}</a>";
        }
        if(strpos($_SERVER['HTTP_USER_AGENT'], 'MicroMessenger') !== false and isset($this->config->wechat->chooseImage) and $this->config->wechat->chooseImage == 'open') echo "<a href='javascript:;' class='chooseImage' data-url='{$this->createLink('sys.wechat', 'uploadImage', "image=imageID&objectType=refund&objectID={$refund->id}")}' data-placement='bottom'>{$lang->files}</a>";
    }

    if($mode == 'todo' && $refund->status == 'pass' && commonModel::hasPriv('refund', 'reimburse')) echo "<a data-remote='{$this->createLink('refund', 'reimburse', "refundID=$refund->id")}' data-display='ajaxAction' data-confirm='{$lang->refund->createTradeTip}' data-locate='{$this->createLink('oa.refund', 'createTrade', "refundID=$refund->id")}' data-locate-display='modal'>{$lang->refund->reimburse}</a>";
    if($mode == 'review' && ($refund->status == 'wait' or $refund->status == 'doing') && commonModel::hasPriv('refund', 'review')) echo "<a data-remote='{$this->createLink('oa.refund', 'review', "id=$refund->id")}' data-display='modal' data-placement='bottom'>{$lang->refund->review}</a>";
    ?>
  </nav>
</div>

<?php include "../../common/view/m.footer.html.php"; ?>
