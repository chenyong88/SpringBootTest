<div class='panel'>
  <table class='table table-bordered table-striped table-hover'>
    <thead>
      <tr class='text-center'>
        <th class='w-100px'><?php echo $lang->salary->account;?></th>
        <th><?php echo $lang->salary->setSSF;?></th>
        <th class='w-70px'><?php echo $lang->actions;?></th>
      </tr>
    </thead>
    <?php foreach($users as $account => $realname):?>
    <tr>
      <td class='text-center text-middle'><?php echo $realname;?></td>
      <td>
        <?php if(isset($ssfList[$account])):?>
        <table class='table table-condensed noborder'>
          <tr>
            <th class='w-90px'></th>
            <?php foreach($ssfList[$account] as $type => $ssf):?>
            <th class='text-right'><?php echo $type;?></th>
            <?php endforeach;?>
          </tr>
          <tr>
            <th><?php echo $lang->salary->base;?></th>
            <?php foreach($ssfList[$account] as $type => $ssf):?>
            <td class='text-right'><?php echo $ssf->amount;?></td>
            <?php endforeach;?>  
          </tr>
          <tr>
            <th><?php echo $lang->salary->personalRate;?></th>
            <?php foreach($ssfList[$account] as $type => $ssf):?>
            <td class='text-right'><?php if($ssf->personalRate) echo $ssf->personalRate . '%';?></td>
            <?php endforeach;?>  
          </tr>
          <tr>
            <th><?php echo $lang->salary->companyRate;?></th>
            <?php foreach($ssfList[$account] as $type => $ssf):?>
            <td class='text-right'><?php if($ssf->companyRate) echo $ssf->companyRate . '%';?></td>
            <?php endforeach;?>  
          </tr>
        </table>
        <?php endif;?>
      </td>
      <td class='text-center text-middle'>
        <?php echo html::a(inlink('setSSF', "mode=edit&dept=$dept&account=$account"), "<i class='icon-pencil'></i>", "class='btn btn-default btn-mini' title='{$lang->edit}'");?>
        <?php echo html::a(inlink('setSSF', "mode=delete&dept=$dept&account=$account"), "<i class='icon-remove'></i>", "class='btn btn-default btn-mini deleter' title='{$lang->delete}'");?>
      </td>
    </tr>
    <?php endforeach;?>
  </table>
  <div class='table-footer'><?php $pager->show();?></div>
</div>
