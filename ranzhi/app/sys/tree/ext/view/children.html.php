<?php
/**
 * The children view of tree module of RanZhi.
 *
 * @copyright   Copyright 2009-2017 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商业软件，非开源软件
 * @author      Gang Liu <liugang@cnezsoft.com> 
 * @package     tree
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */
?>
<?php $amebaDept    = $type == 'dept' && $config->ameba->turnon;?>
<?php $amebaAccount = $type == 'amebaAccount' && $config->ameba->turnon;?>
<?php $amebaAccount = $amebaAccount && !empty($parentObj->amebaAccount) && strpos(',externalIncome,internalExpense,shareExpense,', ",$parentObj->amebaAccount,") !== false;?>
<?php if($amebaDept):?>
<?php $app->loadLang('ameba', 'ameba');?>
<style>
  label.isAmebaDept {margin-left: 15px !important;}
  label.isAmebaDept input[type=checkbox]{margin-top: 0;}
  span.isAmebaDept, .amebaDept {border-left: 0;}
  #childList > .checkbox{margin-top: -5px; padding-top: 0; margin-bottom: 10px;}
</style>
<?php endif;?>
<form method='post' class='form-horizontal' id='childForm' action="<?php echo inlink('children', "type=$type&category=$parent&root=$root");?>">
  <div class='panel'>
    <div class='panel-heading'>
    <strong><?php echo $parent ? $lang->category->children . ' <i class="icon-double-angle-right"></i> ' : $lang->category->common; ?></strong>
    <?php
    foreach($origins as $origin)
    {
        echo html::a(inlink('browse', "type=$type&&category=$origin->id"), $origin->name . " <i class='icon-angle-right text-muted'></i> ");
    }
    ?>
    </div>

    <div class='panel-body' id='childList'>
      <?php
      $maxID = 0;
      $button = ($type == 'dept') ? html::submitButton() . ' ' . html::backButton() : html::submitButton();
      if($amebaAccount)
      {
          foreach($categories as $id => $category)
          {
              $checked = isset($children[$id]) ? "checked='checked'" : '';
              echo "<div class='checkbox'><label><input type='checkbox' name='children[$id]' value='$id' $checked id='children$id'>$category</label></div>";
          }
          foreach($children as $child)
          {
              echo html::hidden("accountList[$child->category]", $child->id);
          }
          if($categories) echo $button;
      }
      else
      {
          foreach($children as $child)
          {
              if($maxID < $child->id) $maxID = $child->id;
              $disabled = !$child->major ? '' : ($child->major < 5 ? "disabled='disabled'" : "readonly='readonly'");
              echo (!$child->major or $child->major > 4) ? "<div class='form-group category'>" : "<div class='form-group'>";
              
              echo "<div class='col-xs-6 col-md-6 col-md-offset-2'>";

              if($amebaDept)
              {
                  echo "<div class='input-group'>";
              }

              echo html::input("children[$child->id]", $child->name, "class='form-control' $disabled");

              if($amebaDept)
              {
                  $checked = $child->isAmebaDept ? "checked='checked'" : '';
                  echo "<span class='input-group-addon isAmebaDept'>";
                  echo "<label class='checkbox isAmebaDept'>";
                  echo "<input type='checkbox' name='isAmebaDept[$child->id]' id='isAmebaDept$child->id' value='1' $checked>{$lang->ameba->isAmebaDept}";
                  echo "</label>";
                  echo "</span>";
                  echo html::select("amebaDept[$child->id]", $lang->ameba->typeList, $child->isAmebaDept ? $child->amebaDept : 'profit', "class='form-control'");
                  echo "</div>";
              }

              echo "</div>";
              
              if(!$child->major or $child->major > 4) echo "<div class='col-xs-6 col-md-2'><i class='icon-move sort-handle'></i></div>";
              echo html::hidden("mode[$child->id]", 'update', "$disabled");
              echo "</div>";
          }

          for($i = 0; $i < TREE::NEW_CHILD_COUNT ; $i ++)
          {
              echo "<div class='form-group category'>";
              echo "<div class='col-xs-6 col-md-6 col-md-offset-2'>";

              if($amebaDept)
              {
                  echo "<div class='input-group'>";
              }

              echo html::input("children[]", '', "class='form-control' placeholder='{$this->lang->category->common}'");

              if($amebaDept)
              {
                  echo "<span class='input-group-addon isAmebaDept'>";
                  echo "<label class='checkbox isAmebaDept'>";
                  echo "<input type='checkbox' name='isAmebaDept[]' id='isAmebaDept$i' value='1'>{$lang->ameba->isAmebaDept}";
                  echo "</label>";
                  echo "</span>";
                  echo html::select("amebaDept[]", $lang->ameba->typeList, 'profit', "class='form-control'");
                  echo "</div>";
              }
              
              echo "</div>";

              echo "<div class='col-xs-6 col-md-2'><i class='icon-move sort-handle'></i></div>";
              echo html::hidden('mode[]', 'new');
              echo "</div>";
          }

          if(($type == 'forum') and ($boardChildrenCount == 0))
          {
              echo "<div class='form-group'><div class='col-xs-6 col-md-4 col-md-offset-2'><div class='alert alert-warning mg-0'>{$this->lang->board->placeholder->setChildren}</div></div></div>";
          }
          echo "<div class='form-group'><div class='col-xs-8 col-md-offset-2'>" . $button . "</div></div>";
      }
      echo html::hidden('parent',   $parent);
      ?>
    </div>
  </div>
</form>
<?php js::set('maxID', $maxID);?>
<?php if(isset($pageJS)) js::execute($pageJS);?>
<?php if($amebaDept):?>
<script>
$(function()
{
    $('[name*=isAmebaDept]').click(function()
    {
        $(this).parents('.form-group').find('[name*=amebaDept]').toggle($(this).prop(':checked'));
    });

    $('[name*=isAmebaDept]').each(function()
    {
        $(this).parents('.form-group').find('[name*=amebaDept]').toggle($(this).is(':checked'));
    });

    $('[value=new]').each(function()
    {
        var name = $(this).attr('name');
        var id   = name.slice(name.indexOf('[') + 1, name.indexOf(']'));
        $(this).parents('.form-group').find('[name*=isAmebaDept]').attr('name', 'isAmebaDept[' + id + ']');
        $(this).parents('.form-group').find('[name*=amebaDept]').attr('name', 'amebaDept[' + id + ']');
    });
})
</script>
<?php endif;?>
