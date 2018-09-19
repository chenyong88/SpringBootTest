<?php
/**
 * The action view of common module of RanZhi.
 *
 * @copyright   Copyright 2009-2018 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Chunsheng Wang <chunsheng@cnezsoft.com>
 * @package     common 
 * @version     $Id: chosen.html.php 7417 2013-12-23 07:51:50Z wwccss $
 * @link        http://www.ranzhi.org
 */
?>
<?php if($extView = $this->getExtViewFile(__FILE__)){include $extView; return helper::cd();}?>
<script src='<?php echo $config->webRoot;?>js/jquery/reverseorder/raw.js' type='text/javascript'></script>

<style>
.wordwrap {word-wrap:break-word;word-break:break-all;}
</style>

<?php if(strpos(',order,contract,customer,provider,contact,leads,', ",{$objectType},") !== false && $datingList):?>
<div class='panel panel-nextContact'>
  <table class='table table-bordered'>
    <thead>
      <tr class='text-center'>
        <th class='w-100px'><?php echo $lang->action->record->nextDate;?></th>
        <?php if($objectType != 'contact' && $objectType != 'leads'):?>
        <th class='w-90px'><?php echo $lang->action->record->nextContact;?></th>
        <?php endif;?>
        <th class='w-80px'><?php echo $lang->action->record->contactedBy;?></th>
        <th><?php echo $lang->action->record->desc;?></th>
        <th class='w-80px'><?php echo $lang->action->record->status;?></th>
        <th class='w-80px'><?php echo $lang->action->record->createdBy;?></th>
        <th class='w-90px'><?php echo $lang->action->record->createdDate;?></th>
        <th class='w-100px'><?php echo $lang->actions;?></th>
      </tr>
    </thead>
    <?php foreach($datingList as $dating):?>
    <tr class='text-center'>
      <td><?php echo $dating->date;?></td>
      <?php if($objectType != 'contact' && $objectType != 'leads'):?>
      <td><?php echo zget($contacts, $dating->contact, '');?></td>
      <?php endif;?>
      <td><?php echo zget($users, $dating->account);?></td>
      <td class='text-left' title='<?php echo $dating->desc;?>'><?php echo $dating->desc;?></td>
      <td><?php echo zget($lang->action->record->statusList, $dating->status);?></td>
      <td><?php echo zget($users, $dating->createdBy);?></td>
      <td><?php echo formatTime($dating->createdDate, DT_DATE1);?></td>
      <td>
        <?php 
        if($dating->status == 'wait') 
        {
            commonModel::printLink('action', 'finishDating', "id={$dating->id}", $lang->finish, "class='finishDating'");
            commonModel::printLink('action', 'deleteDating', "id={$dating->id}", $lang->delete, "class='deleter'");
        }
        ?>
      </td>
    </tr>
    <?php endforeach;?>
  </table>
</div>
<?php endif;?>

<div class='panel panel-history'>
  <div class='panel-heading'>
    <strong><?php echo $lang->history?></strong>
    <div class='panel-actions'>
      <span class='btn btn-mini sorter hand'> <?php echo "<span title='$lang->reverse' class='log-asc'></span>";?></span>
      <span class='btn btn-mini toggle-all change-show hand' title="<?php echo $lang->switchDisplay;?>"></span>
    </div>
  </div>
  <div class='panel-body'>
    <ol>
      <?php $i = 1; ?>
      <?php foreach($actions as $action):?>
      <?php $canEditComment = ($action->action != 'record' and end($actions) == $action and $action->comment and (strpos($this->server->request_uri, 'view') !== false) and $action->actor == $this->app->user->account);?>
      <li value='<?php echo $i ++;?>'>
      <?php
      if(isset($users[$action->actor])) $action->actor = $users[$action->actor];
      if($action->action == 'assigned' and isset($users[$action->extra]) ) $action->extra = $users[$action->extra];
      if(strpos($action->actor, ':') !== false) $action->actor = substr($action->actor, strpos($action->actor, ':') + 1);
      ?>
      <span>
        <?php $this->action->printAction($action);?>
        <?php if(!empty($action->history)) echo "<span id='switchButton$i' class='hand toggle change-show btn btn-mini'></span>";?>
      </span>
      <?php if(!empty($action->comment) or !empty($action->history)):?>
      <?php if(!empty($action->comment)) echo "<div class='history'>";?>
        <div class='changes history' style='display:none;'>
        <?php echo $this->action->printChanges($action->objectType, $action->history, $action->action);?>
        </div>
        <?php if($canEditComment):?>
        <span class='link-button pull-right text-muted comment<?php echo $action->id;?>'><?php echo html::a('#lastCommentBox', '<i class="icon-edit"></i>', "onclick='toggleComment($action->id)'")?></span>
        <?php endif;?>
        <?php if($action->action == 'record'):?>
        <span class='link-button text-muted pull-right'>
        <?php 
        if(helper::isAjaxRequest())
        {
            $append = $from == 'record' ? "class='loadInModal'" : '';
        }
        else
        {
            $append = $from == 'view' ?  "data-toggle='modal'" : '';
        }
        $editUrl =$this->createLink('action', 'editRecord', "id={$action->id}&from={$from}");

        echo html::a($editUrl, '<i class="icon-edit"></i>', $append)
        ?>
        </span>
        <?php endif;?>
        <?php 
        if($action->comment) 
        {
            echo "<div class='comment$action->id wordwrap'>";
            echo strip_tags($action->comment) == $action->comment ? nl2br($action->comment) : $action->comment; 
            echo "</div>";
        }
        ?>
        <?php if($canEditComment):?>
        <div id='lastCommentBox' style='display:none'>
          <form method='post' id='ajaxForm' action='<?php echo $this->createLink('action', 'editComment', "actionID=$action->id")?>'>
            <p><?php echo html::textarea('lastComment', $action->comment);?></p>
            <p><?php echo html::submitButton() . html::commonButton($lang->goback, 'btn btn-default', "onclick='toggleComment($action->id)'");?></p>
          </form>
        </div>
        <?php endif;?>
        <?php if(!empty($action->files)):?>
        <p class='files'>
          <span><strong><?php echo $lang->action->record->uploadFile;?></strong></span>
          <?php foreach($action->files as $file) echo "<span style='margin-right:5px'>" . html::a(helper::createLink('file', 'download', "fileID=$file->id&mouse=left"), $file->title, "target='_blank'") . '</span>';?>
        </ul>
        <?php endif;?>
        <?php if(!empty($action->comment)) echo "</div>";?>
        <?php endif;?>
      </li>
      <?php endforeach;?>
    </ol>
  </div>
</div>
<?php js::execute($pageJS);?>
