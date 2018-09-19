<?php
/**
 * The edit mobile view file of provider module of RanZhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Tingting Dai <daitingting@xirangit.com>
 * @package     provider 
 * @version     $Id
 * @link        http://www.ranzhico.com
 */

if($extView = $this->getExtViewFile(__FILE__)){include $extView; return helper::cd();}?>

<div class='heading divider'>
  <div class='title'><i class='icon-plus muted'></i> <strong><?php echo $lang->provider->edit ?></strong></div>
  <nav class='nav'><a data-dismiss='display'><i class='icon-remove muted'></i></a></nav>
</div>

<form class='content box' data-form-refresh='#page' method='post' id='editProviderForm' action='<?php echo $this->createLink('provider', 'edit', "providerID=$provider->id")?>'>
  <div class='control'>
    <label for='name'><?php echo $lang->provider->name;?></label>
    <?php echo html::input('name', $provider->name, "class='input'");?>
  </div>
  <div class='control'>
    <label for='category'><?php echo $lang->provider->category;?></label>
    <div class='select'><?php echo html::select('category', $categories, $provider->category);?></div>
  </div>
  <div class='control'>
    <label for='relation'><?php echo $lang->provider->relation;?></label>
    <div class='select'><?php echo html::select('relation', $lang->provider->relationList, $provider->relation);?></div>
  </div>
  <div class='row'>
    <div class='cell-6'>
      <div class='control'>
        <label for='type'><?php echo $lang->provider->type;?></label>
        <div class='select'>
          <?php echo html::select('type', $lang->provider->typeList, $provider->type);?>
        </div>
      </div>
    </div>
    <div class='cell-6'>
      <div class='control'>
        <label for='size'><?php echo $lang->provider->size;?></label>
        <div class='select'>
          <?php echo html::select('size', $lang->provider->sizeList, $provider->size);?>
        </div>
      </div>
    </div>
    <div class='cell-6'>
      <div class='control'>
        <label for='industry'><?php echo $lang->provider->industry;?></label>
        <div class='select'>
          <?php echo html::select('industry', $industries, $provider->industry);?>
        </div>
      </div>
    </div>
    <div class='cell-6'>
      <div class='control'>
        <label for='area'><?php echo $lang->provider->area;?></label>
        <div class='select'>
          <?php echo html::select('area', $areas, $provider->area);?>
        </div>
      </div>
    </div>
  </div>
  <div class='control'>
    <label for='weibo'><?php echo $lang->provider->weibo;?></label>
    <input type='text' class='input' name='weibo' value="<?php echo $provider->weibo ? $provider->weibo : 'http://weibo.com';?>" id='weibo'>
  </div>
  <div class='control'>
    <label for='weixin'><?php echo $lang->provider->weixin;?></label>
    <input type='text' class='input' name='weixin' id='weixin' value='<?php echo $provider->weixin;?>'>
  </div>
  <div class='control'>
    <label for='site'><?php echo $lang->provider->site;?></label>
    <input type='text' class='input' name='site' id='site' value="<?php echo $provider->site ? $provider->site : 'http://';?>">
  </div>
  <div class='control'>
    <label for='desc'><?php echo $lang->provider->desc;?></label>
    <?php echo html::textarea('desc', $provider->desc, "rows='2' class='textarea'");?>
  </div>
</form>

<div class='footer has-padding'>
  <button type='button' data-submit='#editProviderForm' class='btn primary'><?php echo $lang->save ?></button>
</div>

<script>
$(function()
{
    $('#editProviderForm').modalForm().listenScroll({container: 'parent'});
});
</script>
