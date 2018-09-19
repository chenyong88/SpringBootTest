<?php
/**
 * The manage privilege by group view of group module of RanZhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商业软件，非开源软件
 * @author      Xiying Guan <guanxiying@xirangit.com>
 * @package     group
 * @version     $Id: managepriv.html.php 1517 2011-03-07 10:02:57Z wwccss $
 * @link        http://www.ranzhico.com
 */
?>
<style>
td.menus{border-right: 0; padding-right: 0; width: 210px !important;}
td.menus + td{border-left: 0; padding-left: 0;}
</style>
<div class='list'>
<form id='ajaxForm' method='post'>
  <?php $productLang = $lang->resource->product;?>
  <?php foreach($lang->appModule as $app => $modules):?>
  <?php 
  if($app == 'crm')
  {
      $lang->resource->product = clone $productLang;
      foreach($config->group->methods->product->psi as $method)
      {
          unset($lang->resource->product->$method);
      }
  }
  elseif($app == 'psi')
  {
      $lang->resource->product = clone $productLang;
      foreach($lang->resource->product as $method)
      {
          if(!in_array($method, $config->group->methods->product->common) && !in_array($method, $config->group->methods->product->psi))
          {
              unset($lang->resource->product->$method);
          }
      }
  }
  ?>
  <?php if($app != 'sys' and !isset($groupPrivs['apppriv'][$app])) continue;?>
  <div class='item'>
    <div class='item-content'>
      <table class='table table-hover table-bordered table-priv'> 
        <?php $i = 1;?>
        <?php foreach($lang->resource as $moduleName => $moduleActions):?>
        <?php if(!in_array($moduleName, $modules)) continue;?>
        <?php if(!$this->group->checkMenuModule($menu, $moduleName)) continue;?>
        <?php
        $this->app->loadLang($moduleName, $app);
        /* Check method in select version. */
        if($version)
        {
            $hasMethod = false;
            foreach($moduleActions as $action => $actionLabel)
            {
                if(strpos($changelogs, ",$moduleName-$actionLabel,") !== false)
                {
                    $hasMethod = true;
                    break;
                }
            }
            if(!$hasMethod) continue;
        }
        ?>
        <tr>
          <?php if($i == 1):?>
          <?php $rowspan = $app == 'crm' ? count($lang->appModule->$app) + 1 : count($lang->appModule->$app);?>
          <th rowspan="<?php echo $rowspan;?>" class='w-80px'>
            <label class='checkbox-inline'>
              <?php echo $lang->apps->$app;?>
              <input type='checkbox' class='checkApp' /> 
            </label>
          </th>
          <?php endif;?>
          <th class='text-right w-120px'>
            <label class='checkbox-inline'>
              <?php 
              if($app == 'superadmin' && $moduleName == 'adminUser') 
              {
                  echo $this->lang->user->adminUser;
              }
              elseif($moduleName == 'user')
              {
                  echo $this->lang->user->colleagueMenu;
              }
              else
              {
                  echo isset($this->lang->$moduleName->common) ? $this->lang->$moduleName->common : $moduleName;
              }
              ?>
              <input type='checkbox' class='checkModule' /> 
            </label>
          </th>
          <?php if(isset($lang->$moduleName->menus)):?>
          <td class='menus'>
            <?php echo html::checkbox("actions[$moduleName]", array('browse' => $lang->$moduleName->browse . " <a href='javascript:;'><i class='icon icon-plus-sign'></i></a>"), isset($groupPrivs[$moduleName]) ? $groupPrivs[$moduleName] : '');?>
            <?php echo html::checkbox("actions[$moduleName]", $lang->$moduleName->menus, isset($groupPrivs[$moduleName]) ? $groupPrivs[$moduleName] : '');?>
          </td>
          <?php endif;?>
          <td id='<?php echo $moduleName;?>' colspan='<?php echo !empty($lang->$moduleName->menus) ? 1 : 2?>'>
            <?php
            if($app == 'superadmin' && $moduleName == 'adminUser') $moduleName = 'user';
            $options = array();
            foreach($moduleActions as $action => $actionLabel)
            {
                if(!empty($lang->$moduleName->menus) and $action == 'browse') continue;
                if(!empty($version) and strpos($changelogs, ",$moduleName-$actionLabel,") === false) continue;
                $options[$action] = is_object($lang->$moduleName->$actionLabel) ? $lang->$moduleName->$actionLabel->common : $lang->$moduleName->$actionLabel;
            }
            echo html::checkbox("actions[$moduleName]", $options, isset($groupPrivs[$moduleName]) ? $groupPrivs[$moduleName] : '');
            ?>
          </td>
        </tr>
        <?php $i++;?>
        <?php endforeach;?>
        <?php if($app == 'crm'):?>
        <tr>
          <th class='text-right'><?php echo $lang->group->extent;?></th>
          <td>
            <label class='checkbox-inline'>
              <?php $checked = isset($groupPrivs['crm']['manageAll']) ? 'checked' : '';?>
              <input type='checkbox' name='actions[crm][]' value='manageAll' class='manageAll' <?php echo $checked?> />
              <?php echo $lang->group->manageAll;?>
            </label>
          </td>
        </tr>
        <?php endif;?>
      </table>
    </div>
  </div>
  <?php endforeach;?>
  <div class='panel'>
    <div class='panel-footer text-center'>
    <?php 
    echo html::submitButton($lang->save);
    echo html::linkButton($lang->goback, $this->createLink('group', 'browse'));
    echo html::hidden('foo'); // Just a hidden var, to make sure $_POST is not empty.
    echo html::hidden('noChecked'); // Save the value of no checked.
    ?>
    </div>
  </div>
</form>
<script type='text/javascript'>
var groupID = <?php echo $groupID?>;
var menu    = "<?php echo $menu?>";

$(document).ready(function()
{
    $('.menus input[name*=actions]:not(input[value=browse])').parent('.checkbox').hide();

    $('.menus input[value=browse]').click(function()
    {
        if($(this).prop('checked'))
        {
            $(this).parents('.table td').find('[name*=actions]').prop('checked', true);
        }
        else
        {
            $(this).parents('.table td').find('[name*=actions]').prop('checked', false);
        }
    });

    $('.icon-plus-sign').click(function()
    {
        $(this).parents('.menus').find('input[name*=actions]:not(input[value=browse])').parent('.checkbox').toggle();
    })

    $('.menus input[name*=actions]:not(input[value=browse])').click(function()
    {
        var browse = false;
        $(this).parents('.menus').find('input[name*=actions]:not(input[value=browse])').each(function()
        {
            if($(this).prop('checked')) browse = true;
        })

        if(browse)  $(this).parents('.menus').find('input[value=browse]').prop('checked', true);
        if(!browse) $(this).parents('.menus').find('input[value=browse]').prop('checked', false);
    })
});
</script>
