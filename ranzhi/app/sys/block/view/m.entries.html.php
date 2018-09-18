<style>
.entries-grid {margin: .25rem 0;}
.entries-grid > .block {text-align: center; padding: .25rem; width: 3.5rem}
.entries-grid > .block > .title {font-size: .6rem; margin-top: .15rem}
</style>
<div class='clearfix entries-grid'>
<?php foreach ($entries as $entry):?>
  <a class='block pull-left<?php if($entry->code !== 'dashboard' and $entry->code !== 'crm' and $entry->buildin) echo ' disabled' ?>' data-entry-code='<?php echo $entry->code ?>' href='<?php echo $entry->url ?>'<?php if(!$entry->buildin) echo ' target="_blank"' ?>>
    <div class='avatar avatar-lg avatar-no-fix' data-skin='<?php if(!$entry->buildin) echo '@' ?><?php echo $entry->code ?>'>
      <?php
      if($entry->code == 'oa') echo 'OA';
      elseif(isset($entry->logo)) echo '<img src="' . $entry->logo . '">';
      else if($entry->icon) echo '<i class="icon ' . $entry->icon . '"></i>';
      ?>
    </div>
    <div class='title text-ellipsis'><?php echo $entry->name ?></div>
  </a>
<?php endforeach; ?>
</div>
