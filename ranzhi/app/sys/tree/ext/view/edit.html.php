<?php
/**
 * The edit view of tree module of RanZhi.
 *
 * @copyright   Copyright 2009-2017 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商业软件，非开源软件
 * @author      Gang Liu <liugang@cnezsoft.com> 
 * @package     tree
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */
?>
<?php
$webRoot   = $config->webRoot;
$jsRoot    = $webRoot . "js/";
$themeRoot = $webRoot . "theme/";
?>
<?php include '../../../common/view/chosen.html.php';?>
<?php include '../../../common/view/kindeditor.html.php';?>
<?php js::set('type', $category->type);?>
<?php js::set('root', $category->type == 'projectdoc' ? 'project' : ($category->type == 'productdoc' ? 'product' : $category->root));?>
<?php $isAmebaAccount = strpos(',income,internalIncome,externalIncome,expense,internalDeal,internalExpense,shareExpense,', ",$category->type,") !== false;?>
<?php $parentDisabled = (($category->major and $category->major < 5) or ($isAmebaAccount && (strpos(',internalIncome,internalDeal,', ",$category->type,") === false or $category->grade < 3))) ? "disabled='disabled'" : '';?>
<?php $nameDisabled   = ($category->major or ($isAmebaAccount && (strpos(',internalIncome,internalDeal,', ",$category->type,") === false or $category->grade < 3))) ? "disabled='disabled'" : '';?>
<?php $amebaDept      = $category->type == 'dept' && $config->ameba->turnon;?>
<?php if($amebaDept):?>
<?php $app->loadLang('ameba', 'ameba');?>
<style>
  label.isAmebaDept {margin-left: 15px !important;}
  label.isAmebaDept input[type=checkbox]{margin-top: 0;}
</style>
<?php endif;?>
<form method='post' class='form-horizontal' id='editForm' action="<?php echo inlink('edit', 'categoryID='.$category->id);?>">
  <div class='panel'>
    <div class='panel-heading'><strong><i class="icon-pencil"></i> <?php echo $lang->tree->edit;?></strong></div>
    <div class='panel-body'>
      <div class='form-group'> 
        <label class='col-md-2 control-label'><?php echo ($amebaDept && $category->isAmebaDept) ? $lang->ameba->parent : $lang->category->parent;?></label>
        <div class='col-md-4'><?php echo html::select('parent', $optionMenu, $category->parent, "class='chosen form-control' $parentDisabled");?></div>
      </div>
      <div class='form-group'> 
        <label class='col-md-2 control-label'><?php echo ($amebaDept && $category->isAmebaDept) ? $lang->ameba->name : $lang->category->name;?></label>
        <div class='col-md-4'>
          <?php if($amebaDept):?>
          <div class='input-group'>
          <?php endif;?>
          <?php echo html::input('name', $category->name, "class='form-control' $nameDisabled");?>
          <?php if($amebaDept):?>
            <span class='input-group-addon'>
              <label class='checkbox isAmebaDept'>
                <?php $checked = $category->isAmebaDept ? "checked='checked'" : '';?>
                <input type='checkbox' name='isAmebaDept' id='isAmebaDept' value='1' <?php echo $checked;?>><?php echo $lang->ameba->isAmebaDept;?>
              </label>
            </span>
          </div>
          <?php endif;?>
        </div>
      </div>
      <?php if($amebaDept):?>
      <div class='form-group'>
        <label class='col-md-2 control-label'><?php echo $lang->ameba->type;?></label>
        <div class='col-md-4'><?php echo html::select('amebaDept', $lang->ameba->typeList, $category->isAmebaDept ? $category->amebaDept : 'profit', "class='form-control'");?></div>
      </div>
      <?php endif;?>
      <?php if($category->type == 'dept'):?>
      <div class='form-group'> 
        <label class='col-md-2 control-label'><?php echo ($amebaDept && $category->isAmebaDept) ? $lang->ameba->moderators : $lang->category->moderators;?></label>
        <div class='col-md-4'><?php echo html::select('moderators[]', $users, $category->moderators, "class='chosen form-control'");?></div>
      </div>
      <?php endif;?>
      <?php if($category->type == 'out'):?>
      <div class='form-group'> 
        <label class='col-md-2 control-label'><?php echo $lang->category->rights;?></label>
        <div class='col-md-9'>
          <div class='group-item'><?php echo html::checkbox('rights', $groups, $category->rights);?></div>
        </div>
      </div>
      <div class='form-group'> 
        <label class='col-md-2 control-label'><?php echo $lang->category->refund;?></label>
        <div class='col-md-9'>
          <div class='group-item'><?php echo html::radio('refund', $lang->category->refundList, $category->refund);?></div>
        </div>
      </div>
      <?php endif;?>
      <div class='form-group'> 
        <label class='col-md-2 control-label'><?php echo $lang->category->desc;?></label>
        <div class='col-md-9'><?php echo html::textarea('desc', $category->desc, "class='form-control' rows=3'");?></div>
      </div>
      <?php if($category->type == 'forum'):?>
      <div class='form-group'>
        <label class='col-md-2 control-label'><?php echo $lang->category->moderators;?></label>
        <div class='col-md-9'><?php echo html::select('moderators[]', $users, array_keys($category->moderators), "class='form-control chosen' multiple='multiple'");?></div>
      </div>  
      <div class='form-group'>
        <label class='col-md-2 control-label'><?php echo $lang->category->readonly;?></label>
        <div class='col-md-4'><?php echo html::radio('readonly', $lang->category->readonlyList, $category->readonly);?></div>
      </div>  
      <?php endif;?>
      <?php if($category->type == 'forum' || $category->type == 'blog'):?>
      <div class='form-group'>
        <label class='col-md-2 control-label'><?php echo $lang->category->users;?></label>
        <div class='col-md-9'><?php echo html::select('users[]', $users, $category->users, "class='form-control chosen' multiple");?></div>
      </div>
      <div class='form-group'> 
        <label class='col-md-2 control-label'><?php echo $lang->category->groups;?></label>
        <div class='col-md-9'>
          <div class='group-item'><?php echo html::checkbox('rights', $groups, $category->rights);?></div>
        </div>
      </div>
      <?php endif;?>
      <div class='form-group'>
        <label class='col-md-2'></label>
        <div class='col-md-4'><?php echo html::submitButton() . html::hidden('type', $category->type);?></div>
      </div>
    </div>
  </div>
</form>
<?php if(isset($pageJS)) js::execute($pageJS);?>
<?php if($amebaDept):?>
<script>
$(function()
{
    $('#isAmebaDept').click(function()
    {
        $('#amebaDept').parents('.form-group').toggle($(this).prop(':checked'));
    });

    $('#amebaDept').parents('.form-group').toggle($('#isAmebaDept').is(':checked'));
})
</script>
<?php endif;?>
