<form id='ajaxForm' method='post'>
  <div class='panel'>
    <div class='panel-heading'><strong><i class="icon-wrench"></i> <?php echo $mode == 'default' ? $lang->salary->defaultSSF : $lang->salary->personalSSF;?></strong></div>
    <div class='panel-body'>
      <table class='table table-condensed table-borderless'>
        <?php if($mode != 'default'):?>
        <tr>
          <th class='w-100px text-center text-middle'><?php echo $lang->salary->account;?></th>
          <td colspan='2'>
            <div class='required required-wrapper'></div>
            <?php echo html::select('account', $users, $account, "class='form-control chosen'");?>
          </td>
          <td colspan='2'></td>
        </tr>
        <?php endif;?>
        <tr class='text-center'>
          <th class='w-100px'><?php echo $lang->salary->name;?></th>
          <th class='w-120px'><?php echo $lang->salary->base;?></th>
          <th class='w-120px'><?php echo $lang->salary->companyRate;?></th>
          <th class='w-120px'><?php echo $lang->salary->personalRate;?></th>
          <th></th>
        </tr>
        <?php foreach($ssfList as $name => $ssf):?>
        <?php if($name == 'default') continue;?>
        <tr class='text-center text-middle'>
          <td>
            <?php echo $name;?>
            <?php echo html::hidden('names[]', $name);?>
          </td>
          <td><?php echo html::input("amounts[]", $ssf->amount, "class='form-control ssf amount'");?></td>
          <td>
            <div class='input-group'>
              <?php echo html::input("companyRates[]", $ssf->companyRate, "class='form-control ssf companyRate'");?>
              <span class='input-group-addon'><?php echo $lang->percent;?></span>
            </div>
          </td>
          <td>
            <div class='input-group'>
              <?php echo html::input("personalRates[]", $ssf->personalRate, "class='form-control ssf personalRate'");?>
              <span class='input-group-addon'><?php echo $lang->percent;?></span>
            </div>
          </td>
          <td></td>
        </tr>
        <?php endforeach;?>
        <tr>
          <th class='text-center'><?php echo $lang->salary->total;?></td>
          <td></td>
          <td class='text-right' id='totalCompany'></td>
          <td class='text-right' id='totalPersonal'></td>
          <td></td>
        </tr>
        <tr>
          <td colspan='5'>
            <?php if($mode == 'default') echo html::hidden('account', 'default');?>
            <?php echo html::submitButton();?>
          </td>
        </tr>
      </table>
    </div>
  </div>
</form>
