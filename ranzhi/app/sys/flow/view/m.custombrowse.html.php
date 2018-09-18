<div class='heading'>
  <div class='title'>
    <a id='sortTrigger' class='text-right sort-trigger' data-display data-target='#sortPanel' data-backdrop='true'><i class='icon icon-sort'></i>&nbsp;<span class='sort-name'><?php echo $lang->sort;?></span></a>
  </div>
  <nav class='nav'>
    <a class='btn primary' data-display='modal' data-placement='bottom' data-remote='<?php echo $this->createLink('flow', 'displayLayout', "module={$currentModule->module}&method=create") ?>'>
      <i class='icon icon-plus'> </i> &nbsp;&nbsp;<?php echo $lang->create;?>
    </a>
  </nav>
</div>

<section id='page' class='section list-with-pager'>
  <?php $refreshUrl = $this->createLink('flow', 'displayLayout', "module={$currentModule->module}&method=$currentMethod&id=&mode=$mode&moduleMenuID=$moduleMenuID&orderBy=$orderBy&recTotal={$pager->recTotal}&recPerPage={$pager->recPerPage}&pageID={$pager->pageID}");?>
  <div class='box' data-page='<?php echo $pager->pageID ?>' data-refresh-url='<?php echo $refreshUrl ?>'>
    <table class='table bordered'>
      <thead>
        <?php $i = 0;?>
        <?php foreach($fields as $field):?>
        <?php if($i > 4) continue;?>
        <?php if(!$field->mobileShow || $field->field == 'actions') continue;?>
        <th class="text-<?php echo $field->position;?>" style="width:<?php echo $field->width ? $field->width . 'px' : '';?>">
          <?php echo $field->name;?>
        </th>
        <?php $i++;?>
        <?php endforeach;?>
      </thead>
      <tbody>
        <?php foreach($dataList as $data):?>
        <tr class='text-center' data-url='<?php echo $this->createLink('flow', 'displaylayout', "moduleID={$currentModule->module}&method=view&id={$data->id}"); ?>' data-id='<?php echo $data->id;?>'>
          <?php $i = 0;?>
          <?php foreach($fields as $field):?>
          <?php if($i > 4) continue;?>
          <?php if(!$field->mobileShow || $field->field == 'actions') continue;?>
          <td class="text-<?php echo $field->position;?> align-middle">
          <?php 
          if(is_array($data->{$field->field}))
          {
              foreach($data->{$field->field} as $value) echo zget($field->options, $value) . ' ';
          }
          else
          {
              if($field->field == 'id' && commonModel::hasPriv($currentModule->module, 'view'))
              {
                  $action = $this->workflow->getActionByModuleAndAction($currentModule->module, 'view');
                  if($action->open == 'none')
                  {
                      echo $data->id;
                  }
                  else
                  {
                      $attr = $action->open == 'modal' ? "data-toggle='modal'" : '';
                      echo html::a(helper::createLink('flow', 'displayLayout', "module={$currentModule->module}&method=view&id={$data->id}"), $data->id, $attr);
                  }
              }
              else
              {
                  echo zget($field->options, $data->{$field->field});
              }
          }
          ?>
          </td>
          <?php $i++;?>
          <?php endforeach;?>
        </tr>
        <?php endforeach;?>
      </tbody>
    </table>
  </div>

  <nav class='nav justify pager'>
    <?php $pager->show($align = 'justify');?>
  </nav>
</section>

<div class='list sort-panel hidden affix enter-from-bottom layer' id='sortPanel'>
  <?php
  $vars = "moduleID={$currentModule->module}&method=$currentMethod&id=&mode=$mode&moduleMenuID=$moduleMenuID&orderBy=%s&recTotal={$pager->recTotal}&recPerPage={$pager->recPerPage}&pageID={$pager->pageID}";
  foreach ($fields as $field)
  {
      if($field->field == 'deleted' or $field->field == 'desc') continue;
      commonModel::printOrderLink($field->field, $orderBy, $vars, '<i class="icon icon-sort-indicator"></i>' . $field->name);
  }
  ?>
</div>

<script>
$(function()
{
    $(document).on($.TapName, 'tr[data-url]', function()
    {
        window.location.href = $(this).data('url');
    });
});
</script>
