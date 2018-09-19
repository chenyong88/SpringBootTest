<?php
/**
 * The member mobile view file of project module of RanZhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Tingting Dai <daitingting@xirangit.com>
 * @package     project 
 * @version     $Id
 * @link        http://www.ranzhico.com
 */

if($extView = $this->getExtViewFile(__FILE__)){include $extView; return helper::cd();}?>

<div class='heading divider'>
  <div class='title'><strong><?php echo $lang->project->member;?></strong></div>
  <nav class='nav'><a data-dismiss='display'><i class='icon-remove muted'></i></a></nav>
</div>

<form class='content box' data-form-refresh='#page' method='post' id='projectMemberForm' action='<?php echo $this->createLink('proj.project', 'member', "projectID={$project->id}")?>'>
  <div class='control' id='members'>
    <?php $key = 0;?>
    <?php foreach($project->members as $member):?>
    <?php if($member->role == 'manager') continue;?>
    <div class='row flex-nowrap'>
      <div class='cell-6'>
        <div class='select fluid'>
          <?php echo html::select("member[$key]", $users, $member->account);?>
        </div>
      </div>
      <div class='cell-5'>
        <div class='select fluid'>
          <?php echo html::select("role[$key]", $lang->project->roleList, $member->role);?>
        </div>
      </div>
    </div>
    <?php $key++;?>
    <?php endforeach;?>
    <?php for($i = 0; $i < 3; $i++):?>
    <div class='row flex-nowrap'>
      <div class='cell-6'>
        <div class='select fluid'>
          <?php echo html::select("member[$key]", $users, '');?>
        </div>
      </div>
      <div class='cell-5'>
        <div class='select fluid'>
          <?php echo html::select("role[$key]", $lang->project->roleList, '');?>
        </div>
      </div>
      <div class='cell flex-none'>
        <a class='btn member-deleter'><i class='icon-trash text-danger'></i></a>
      </div>
    </div>
    <?php $key++;?>
    <?php endfor;?>
    <div class='row template flex-nowrap'>
      <div class='cell-6'>
        <div class='select fluid'>
          <?php echo html::select("member[key]", $users, '');?>
        </div>
      </div>
      <div class='cell-5'>
        <div class='select fluid'>
          <?php echo html::select("role[key]", $lang->project->roleList, '');?>
        </div>
      </div>
      <div class='cell flex-none'>
        <a class='btn member-deleter'><i class='icon-trash text-danger'></i></a>
      </div>
    </div>
    <a class="btn text-primary btn-add-member"><i class="icon-plus"></i>&nbsp; <?php echo $lang->add;?></a>
  </div>
</form>

<div class='warning box'><?php echo $lang->project->roleTip;?></div>

<div class='footer has-padding'>
  <button type='button' data-submit='#projectMemberForm' class='btn primary'><?php echo $lang->save;?></button>
</div>

<script>
$(function()
{
    $('#projectMemberForm').modalForm().listenScroll({container: 'parent'});
    
    var $members      = $('#members');
    var $template     = $members.children('.template.row');
    var $addMemberBtn = $members.find('.btn-add-member');
    var $key          = <?php echo $key;?>;
    var $manager      = <?php echo json_encode($project->PM);?>;

    var addMember = function()
    {
        var $member = $template.clone().removeClass('template');
        $member.html($member.html().replace(/key/g, $key));
        $addMemberBtn.before($member);
        $key ++;
    };

    $members.on($.TapName, '.member-deleter', function()
    {
        $(this).closest('.row').remove();
    })

    $addMemberBtn.on($.TapName, function(){addMember()});
    
    var updateMember = function()
    {
        $('[name^=member]').find('option').prop('disabled', '');
        $('[name^=member]').find('[value=' + $manager + ']').prop('disabled', 'disabled');
        $('[name^=member]').each(function()
        {
            var value = $(this).val();
            if(value != '')
            {
                $('[name^=member]').each(function()
                {
                    if($(this).val() == '')
                    {
                        $(this).find('[value=' + value + ']').prop('disabled', 'disabled');
                    }
                });
            }
        });
    }

    $('[name^=member]').on('change', function()
    {
        updateMember();
    })

    updateMember();
});
</script>
