<?php
/**
 * The create view file of commission module of RanZhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商业软件，非开源软件
 * @author      Gang Liu <liugang@cnezsoft.com>
 * @package     trade
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */
?>
<?php include '../../common/view/header.html.php';?>
<?php include '../../../sys/common/view/chosen.html.php';?>
<?php js::set('type', $type);?>
<?php js::set('confirmReset', $salaryList ? $lang->commission->salaryExist : $lang->commission->confirmReset);?>
<form method='post' id='ajaxForm' action='<?php echo inlink('create', "type={$type}&tradeID={$trade->id}");?>'>
  <div class='panel'>
    <table class='table table-condensed table-borderless'>
      <thead>
        <tr class='text-center'>
          <th class='w-100px'><?php echo $lang->trade->date;?></th>
          <th class='w-200px'><?php echo $lang->trade->trader;?></th>
          <th class='w-100px'><?php echo $lang->trade->product;?></th>
          <th class='w-100px'><?php echo $lang->commission->money;?></th>
          <th class='w-100px'><?php echo $lang->commission->base;?></td>
        </tr>
      </thead>
      <tr class='text-center text-middle'>
        <td><?php echo formatTime($trade->date, DT_DATE1);?></td>
        <td title="<?php echo zget($customerList, $trade->trader, '');?>"><?php if($trade->trader) echo zget($customerList, $trade->trader, '');?></td>
        <td title="<?php echo zget($productList, $trade->product, '');?>"><?php echo zget($productList, $trade->product, '');?></td>
        <td><?php echo zget($lang->currencySymbols, $config->setting->mainCurrency, '') . formatMoney($trade->money * $trade->exchangeRate);?></td>
        <td><?php echo html::input('commission', $trade->commission != 0.00 ? $trade->commission : ($trade->money * $trade->exchangeRate), "class='form-control'")?></td>
      </tr>
    </table>
  </div>
  <?php $lineCommissionList = $commissions->lineCommissionList;?>
  <?php $saleCommissionList = $commissions->saleCommissionList;?>
  <?php $saleRules          = $commissions->saleRules;?>
  <?php $i = 0;?>
  <div class='row'>
    <div class='col-md-4'>
      <div class='panel panel-success'>
        <div class='panel-heading'>
          <strong><?php echo $lang->commission->typeList['line'];?></strong>
        </div>
        <table class='table table-bordered table-line'>
          <tr class='text-center'>
            <th class='text-left'><?php echo $lang->commission->handlers;?></th>
            <th class='w-80px'><?php echo $lang->commission->rate . ' (' . $lang->percent . ')';?></th>
            <th class='w-120px'><?php echo $lang->commission->amount;?></th>
          </tr>
          <?php $rateTotal = 0;?>
          <?php $lineCommissionTotal= 0;?>
          <?php foreach($lineCommissionList as $lineCommission):?>
          <?php if(!isset($userList[$lineCommission->account])) continue;?>
          <?php $rateTotal += $lineCommission->rate;?>
          <?php $lineCommissionTotal += $lineCommission->amount;?>
          <tr class='text-center'>
            <td class='text-left'>
              <?php echo zget($userList, $lineCommission->account);?>
              <?php echo html::hidden("account[$i]", $lineCommission->account);?>
            </td>
            <td>
              <?php echo $lineCommission->rate;?>
              <?php echo html::hidden("rate[$i]", $lineCommission->rate);?>
              <?php echo html::hidden("contribution[$i]", '');?>
            </td>
            <td>
              <span class='amount'><?php echo $lineCommission->amount;?></span>
              <?php echo html::hidden("amount[$i]", $lineCommission->amount) . html::hidden("type[$i]", 'line');?>
            </td>
          </tr>
          <?php $i++;?>
          <?php endforeach;?>
          <tfoot>
            <tr class='text-center'>
              <td class='text-left'><?php echo $lang->commission->total;?></td>
              <td><?php echo $rateTotal;?></td>
              <td><?php echo $lineCommissionTotal;?></td>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
    <div class='col-md-4'>
      <div class='panel panel-primary'>
        <div class='panel-heading'>
          <strong><?php echo $lang->commission->saleCommission->ruleList['fixed'];?></strong>
        </div>
        <table class='table table-fixedCommission table-bordered table-condensed'>
          <tr class='text-center text-middle'>
            <th class='text-left'><?php echo $lang->commission->handlers;?></th>
            <th class='w-80px'><?php echo $lang->commission->rate . ' (' . $lang->percent . ')';?></th>
            <th class='w-120px'><?php echo $lang->commission->amount;?></th>
            <th class='w-60px'><?php echo $lang->actions;?></th>
          </tr>
          <?php foreach($handlers as $account):?>
          <?php if(!$account) continue;?>
          <?php if(!isset($fixedUsers[$account])) continue;?>
          <?php $saleCommissionRule = zget($saleRules, $account);?>
          <?php if($saleCommissionRule->rule != 'fixed') continue;?>
          <?php $saleCommission = isset($saleCommissionList[$account]) ? $saleCommissionList[$account] : null;?>
          <tr class='text-center text-middle'>
            <td class='text-left'>
              <?php if($type == 'commissioned' and !empty($saleCommission->account)):?>
              <?php echo zget($userList, $saleCommission->account);?>
              <?php echo html::hidden("account[$i]", $account);?>
              <?php else:?>
              <?php echo html::select("account[$i]", $fixedUsers, $account, "class='form-control chosen'");?>
              <?php endif;?>
            </td>
            <td>
              <?php if($type == 'commissioned' and !empty($saleCommission->rate)):?>
              <span class='saleCommission'><?php echo (float)$saleCommission->rate;?></span>
              <span class='saleCommission' style='display:none;'><?php echo html::input("rate[$i]", (float)$saleCommission->rate, "class='form-control'");?></span>
              <?php else:?>
              <?php echo html::input("rate[$i]", '', "class='form-control'");?>
              <?php endif;?>
              <?php echo html::hidden("contribution[$i]", '');?>
            </td>
            <td>
              <?php if($type == 'commissioned' and !empty($saleCommission->amount)):?>
              <span class='saleCommission'><?php echo (float)$saleCommission->amount;?></span>
              <span class='saleCommission' style='display:none;'><?php echo html::input("amount[$i]", (float)$saleCommission->amount, "class='form-control'");?></span>
              <?php else:?>
              <?php echo html::input("amount[$i]", '', "class='form-control'");?>
              <?php endif;?>
              <?php echo html::hidden("type[$i]", 'sale');?>
            </td>
            <td class='text-left'>
              <a href='#' class='addItem'><i class='icon-plus'></i></a>
              <a href='#' class='delItem'><i class='icon-remove'></i></a>
              <?php if(!empty($saleCommissionList)):?>
              <a href='#' class='editItem'><i class='icon-pencil'></i></a>
              <?php endif;?>
            </td>
          </tr>
          <?php $i++;?>
          <?php endforeach;?>
          <tr class='text-center text-middle'>
            <td class='text-left'><?php echo html::select("account[$i]", $fixedUsers, '', "class='form-control chosen'");?></td>
            <td><?php echo html::input("rate[$i]", '', "class='form-control'")?></td>
            <td>
              <?php echo html::input("amount[$i]", '', "class='form-control'");?>
              <?php echo html::hidden("contribution[$i]", '', "class='form-control'");?>
              <?php echo html::hidden("type[$i]", 'sale');?>
            </td>
            <td class='text-left'>
              <a href='#' class='addItem'><i class='icon-plus'></i></a>
              <a href='#' class='delItem'><i class='icon-remove'></i></a>
            </td>
          </tr>
          <?php $i++;?>
          <tfoot>
            <tr class='text-center'>
              <td class='text-left'><?php echo $lang->commission->total;?></td>
              <td class='rate'></td>
              <td class='amount'></td>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
    <div class='col-md-4'>
      <div class='panel panel-info'>
        <div class='panel-heading'>
          <strong><?php echo $lang->commission->saleCommission->ruleList['multistep'];?></strong>
        </div>
        <table class='table table-multistepCommission table-bordered table-condensed'>
          <tr class='text-center text-middle'>
            <th class='text-left'><?php echo $lang->commission->handlers;?></th>
            <th class='w-80px'><?php echo $lang->commission->contribution . ' (' . $lang->percent . ')';?></th>
            <th class='w-60px'><?php echo $lang->actions;?></th>
          </tr>
          <?php foreach($handlers as $account):?>
          <?php if(!$account) continue;?>
          <?php if(!isset($multistepUsers[$account])) continue;?>
          <?php $saleCommissionRule = zget($saleRules, $account);?>
          <?php if($saleCommissionRule->rule != 'multistep') continue;?>
          <?php $saleCommission = isset($saleCommissionList[$account]) ? $saleCommissionList[$account] : null;?>
          <tr class='text-center text-middle'>
            <td class='text-left'>
              <?php if($type == 'commissioned' and !empty($saleCommission->account)):?>
              <?php echo zget($userList, $saleCommission->account);?>
              <?php echo html::hidden("account[$i]", $account);?>
              <?php else:?>
              <?php echo html::select("account[$i]", $multistepUsers, $account, "class='form-control chosen'");?>
              <?php endif;?>
            </td>
            <td>
              <?php if($type == 'commissioned' and !empty($saleCommission->contribution)):?>
              <span class='saleCommission'><?php echo (float)$saleCommission->contribution;?></span>
              <span class='saleCommission' style='display:none;'><?php echo html::input("contribution[$i]", (float)$saleCommission->contribution, "class='form-control'");?></span>
              <?php else:?>
              <?php echo html::input("contribution[$i]", '', "class='form-control'");?>
              <?php endif;?>
              <?php echo html::hidden("rate[$i]", '');?>
              <?php echo html::hidden("amount[$i]", '');?>
              <?php echo html::hidden("type[$i]", 'sale');?>
            </td>
            </td>
            <td class='text-left'>
              <a href='#' class='addItem'><i class='icon-plus'></i></a>
              <a href='#' class='delItem'><i class='icon-remove'></i></a>
              <?php if(!empty($saleCommissionList)):?>
              <a href='#' class='editItem'><i class='icon-pencil'></i></a>
              <?php endif;?>
            </td>
          </tr>
          <?php $i++;?>
          <?php endforeach;?>
          <tr class='text-center text-middle'>
            <td class='text-left'><?php echo html::select("account[$i]", $multistepUsers, '', "class='form-control chosen'");?></td>
            <td>
              <?php echo html::input("contribution[$i]", '', "class='form-control'")?>
              <?php echo html::hidden("rate[$i]", '');?>
              <?php echo html::hidden("amount[$i]", '');?>
              <?php echo html::hidden("type[$i]", 'sale');?>
            </td>
            <td class='text-left'>
              <a href='#' class='addItem'><i class='icon-plus'></i></a>
              <a href='#' class='delItem'><i class='icon-remove'></i></a>
            </td>
          </tr>
          <?php $i++;?>
          <tfoot>
            <tr class='text-center'>
              <td class='text-left'><?php echo $lang->commission->total;?></td>
              <td class='contribution'></td>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
  </div>
  <div class='text-center'>
    <?php echo html::submitButton();?>
    <?php if($type == 'commissioned') echo html::a(inlink('create', "type=$type&tradeID=$trade->id&reset=1"), $lang->commission->reset, "class='btn btn-primary reset'");?>
    <?php echo html::backButton();?>
  </div>
</form>
<?php
foreach($lang->commission->saleCommission->ruleList as $key => $rule)
{
    echo html::hidden($key, $rule);
}
$fixedSelect = html::select("account[key]", $fixedUsers, '', "class='form-control'");
$fixedItemRow = <<<EOT
  <tr class='text-center text-middle'>
    <td class='text-left'>{$fixedSelect}</td>
    <td>
      <input type='text' value='' name='rate[key]' class='form-control'>
      <input type='hidden' value='' name='contribution[key]'>
    </td>
    <td>
      <input type='text' value='' name='amount[key]' class='form-control'>
      <input type='hidden' value='sale' name='type[key]'>
    </td>
    <td class='text-left'>
      <a href='#' class='addItem'><i class='icon-plus'></i></a>
      <a href='#' class='delItem'><i class='icon-remove'></i></a>
    </td>
  </tr>
EOT;

$multistepSelect = html::select("account[key]", $multistepUsers, '', "class='form-control'");
$multistepItemRow = <<<EOT
  <tr class='text-center text-middle'>
    <td class='text-left'>{$multistepSelect}</td>
    <td>
      <input type='text' value='' name='contribution[key]' class='form-control'>
      <input type='hidden' value='' name='rate[key]'>
      <input type='hidden' value='' name='amount[key]'>
      <input type='hidden' value='sale' name='type[key]'>
    </td>
    <td class='text-left'>
      <a href='#' class='addItem'><i class='icon-plus'></i></a>
      <a href='#' class='delItem'><i class='icon-remove'></i></a>
    </td>
  </tr>
EOT;

js::set('fixedItemRow', $fixedItemRow);
js::set('multistepItemRow', $multistepItemRow);
js::set('key', ++$i);
?>
<?php include '../../common/view/footer.html.php';?>
