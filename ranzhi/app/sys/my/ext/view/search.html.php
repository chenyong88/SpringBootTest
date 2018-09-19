<?php
/**
 * The search view file of my module of RanZhi.
 *
 * @copyright   Copyright 2009-2017 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商业软件，非开源软件
 * @author      Gang Liu <liugang@cnezsoft.com>
 * @package     my 
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */
?>
<style>
.panel .panel-body {overflow: scroll; padding-left: 0px; padding-right: 0px;}
.panel .panel-actions .pager {margin-right: 10px;}
.input-group .input-group-addon.fix-width {width: 0px;}
.input-group #module {min-width: 80px; border-left-width: 0px; border-right-width: 0px;}
.searchGroup{width: 60%; margin-left: 20%; margin-bottom: 10px;}
.execute-info{position:relative; top:2px;}

.list {color: #333; background-color: transparent; border-top: solid #DDD 1px; border-radius: 3px;}
.list-condensed > .items > .item {padding: 10px 15px; border-bottom: 1px solid #e5e5e5; transition: all .5s cubic-bezier(.175,.885,.32,1);}
.items .item .text-muted{color: #757575;}
.items .item-heading h4{margin-top: 5px; font-size:14px; line-height:1.5; font-weight:normal}
.item:hover{background-color:#f5f5f5}
</style>

<div class='panel'>
  <div class='panel-heading'>
    <strong><i class='icon icon-search'></i> <?php echo $lang->search->index;?></strong>
    <div class='pull-right'>
      <button type="button" class="close" aria-hidden="true">×</button>
    </div>
  </div>
  <div class='panel-body'>
    <div class='input-group searchGroup'>
      <?php echo html::input('words', $words, "class='form-control'")?>
      <span class='input-group-addon fix-border fix-padding fix-width'></span>
      <?php echo html::select('module', $lang->searchObjects, $module, "class='form-control'");?>
      <span class='input-group-btn'><?php echo html::a('#', $lang->search->common, "class='btn btn-primary searchBtn'");?></span>
    </div>
    <div class='list list-condensed'>
      <section class='items items-hover'>
        <?php foreach($results as $object):?>
        <?php $misc = strpos(',todo,effort,', ",$object->objectType,") !== false ? "data-toggle='modal'" : '';?>
        <div class='item'>
          <div class='item-heading'>
            <h4>
              <?php
              echo html::a($object->url, $object->title, "$misc title='" . strip_tags($object->title) . "'");
              echo "<small class=''>[{$lang->searchObjects[$object->objectType]} #{$object->objectID}]</small> ";
              ?>
            </h4>
          </div>
          <div class='item-content'>
            <div class='text text-muted pull-left'><?php echo $object->summary;?></div>
          </div>
        </div>
        <?php endforeach;?>
      </section>
    </div>
  </div>
  <div class='panel-actions col-md-12'>
    <?php if($results) echo str_replace($words, urlencode($words), $pager->get('right', 'short'));?>
    <span class='execute-info text-muted pull-left'><?php printf($lang->search->executeInfo, $pager->recTotal, $consumed);?></span> 
  </div>
</div>
<script>
$(function()
{
    $('.panel .panel-heading .close').click(function(){$('#searchModal').hide();});

    $('.panel .panel-body .searchBtn').click(function()
    {
        var words  = $(this).parents('.input-group').find('#words').val();
        var module = $(this).parents('.input-group').find('#module').val();
        if(!$.trim(words)) return false;

        var link = createLink('sys.my', 'search') + (config.requestType == 'GET' ? '&' : '?') + 'words=' + words + '&module=' + module;
        $('#searchModal').load(link, function(){fixSearchPanel();});
        return false;
    });

    $('.panel .panel-actions .pager a').click(function()
    {
        $('#searchModal').load($(this).prop('href'), function(){fixSearchPanel();});
        return false;        
    });

    $('.list .item a').click(function()
    {
        var href = $(this).prop('href');
        if($(this).data('toggle') == 'modal')
        {
            $.zui.modalTrigger.show({width: '70%', url: href, backdrop: 'static'});
            return false;
        }

        var app  = '';
        if(href.indexOf('/crm/') != -1)   app = 'crm';
        if(href.indexOf('/proj/') != -1)  app = 'proj';
        if(href.indexOf('/doc/') != -1)   app = 'doc';
        if(href.indexOf('/oa/') != -1)    app = 'oa';
        if(href.indexOf('/cash/') != -1)  app = 'cash';
        if(href.indexOf('/team/') != -1)  app = 'team';
        if(href.indexOf('/sys/') != -1)   app = 'superadmin';
        if(href.indexOf('/sys/my') != -1 || href.indexOf('/sys/index.php?' + config.moduleVar + '=my&' + config.methodVar) != -1) app = 'dashboard';
        if(href.indexOf('/sys/todo') != -1 || href.indexOf('/sys/index.php?' + config.moduleVar + '=todo&' + config.methodVar) != -1) app = 'dashboard';
        if(href.indexOf('/sys/effort') != -1 || href.indexOf('/sys/index.php?' + config.moduleVar + '=effort&' + config.methodVar) != -1) app = 'dashboard';

        if(app != '')
        {
            $.openEntry(app, href);
            return false;
        }
    });
});
