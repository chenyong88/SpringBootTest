<?php
/**
 * The batch create view file of commission module of RanZhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商业软件，非开源软件
 * @author      Tingting Dai <daitingting@xirangit.com>
 * @package     trade
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */
?>
<?php include '../../common/view/header.html.php';?>
<?php include '../../../sys/common/view/chosen.html.php';?>
<?php js::set('noResultsMatch', $lang->noResultsMatch);?>
<?php js::set('errorContribution', $lang->commission->errorContribution);?>
<?php js::set('errorRate', $lang->commission->errorRate);?>
<form method='post' id='singleForm' action='<?php echo inlink('batchCreate', "mode=save&referer=$referer")?>'>
  <div class='panel'>
    <div class='panel-heading'>
      <strong><?php echo $lang->commission->batchCreate;?></strong>
      <div class='btn-group panel-actions pull-right'>
        <button type='button' class='btn single-btn'><?php echo $lang->commission->single;?></button>
        <button type='button' class='btn together-btn'><?php echo $lang->commission->together;?></button>
      </div>
    </div>
    <table class='table'>
      <thead>
        <tr class='text-center'>
          <th class='w-100px'><?php echo $lang->trade->date;?></th>
          <th class='w-100px'><?php echo $lang->trade->depositor;?></th>
          <th class='w-200px'><?php echo $lang->trade->trader;?></th>
          <th class='w-100px'><?php echo $lang->trade->category;?></th>
          <th class='w-120px text-right'><?php echo $lang->trade->money;?></th>
          <th class='w-120px'><?php echo $lang->commission->base;?></th>
        </tr>
      </thead>
      <?php foreach($trades as $trade):?>
      <tr>
        <td><?php echo formatTime($trade->date, DT_DATE1);?></td>
        <td class='text-left'><?php echo zget($depositorList, $trade->depositor, ' ');?></td>
        <td class='text-left' title="<?php echo zget($customerList, $trade->trader, '');?>"><?php if($trade->trader) echo zget($customerList, $trade->trader);?></td>
        <td class='text-left' title="<?php echo zget($categories, $trade->category, '');?>"><?php echo zget($categories, $trade->category, ' ');?></td>
        <td class='text-right'><?php echo zget($currencySign, $trade->currency) . formatMoney($trade->money);?></td>
        <td><?php echo html::input("commission[{$trade->id}]", $trade->commission == 0.00 ? $trade->money : $trade->commission, "class='form-control'")?></td>
      </tr>
      <tr>
        <td colspan='6'>
          <div class='panel'>
            <table class='table table-bordered table-commission'>
              <thead>
                <tr class='text-center'>
                  <th class='w-100px'><?php echo $lang->commission->type;?></th>
                  <th class='w-160px'><?php echo $lang->commission->handlers;?></th>
                  <th class='w-200px'>
                    <?php echo $lang->commission->contribution;?>
                    <?php echo html::a('javascript:void(0)', "<i class='icon-question-sign'></i>", "class='tips' data-original-title='{$lang->commission->contributionTips}' data-toggle='tooltip' data-placement='right' ");?>
                  </th>
                  <th class='w-200px'><?php echo $lang->commission->rate;?></th>
                  <th class='w-150px'>
                    <?php echo $lang->commission->amount;?>
                    <?php echo html::a('javascript:void(0)', "<i class='icon-question-sign'></i>", "class='tips' data-original-title='{$lang->commission->amountTips}' data-toggle='tooltip' data-placement='right' ");?>
                  </th>
                  <th><?php echo $lang->trade->desc;?></th>
                  <th class='w-100px'></th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 0;?>
                <?php if(!empty($commissionList[$trade->id]->lineCommissionList)):?>
                <?php foreach($commissionList[$trade->id]->lineCommissionList as $account => $rate):?>
                <tr class='text-center'>
                  <?php if($i == 0):?>
                  <th class='text-center text-middle' rowspan='<?php echo count($commissionList[$trade->id]->lineCommissionList);?>'><?php echo $lang->commission->lineCommission->common;?></th>
                  <?php endif;?>
                  <td><?php echo zget($userList, $account);?></td>
                  <td><?php echo html::hidden("contribution[$trade->id][$i]", 0);?></td>
                  <td>
                    <?php echo $rate . $lang->percent;?>
                    <?php echo html::hidden("rate[$trade->id][$i]", $rate);?>
                  </td>
                  <td>
                    <span class='amount'></span>
                    <?php echo html::hidden("amount[$trade->id][$i]");?>
                  </td>
                  <td></td>
                  <td></td>
                </tr>
                <?php $i++;?>
                <?php endforeach;?>
                <?php endif;?>
                <?php $j = 0;?>
                <?php if(!empty($commissionList[$trade->id]->saleCommissionList)):?>
                <?php foreach($commissionList[$trade->id]->saleCommissionList as $commission):?>
                <tr>
                  <?php if($j == 0):?>
                  <th id='rowspanTH' class='text-center text-middle' rowspan='<?php echo count($commissionList[$trade->id]->saleCommissionList);?>'><?php echo $lang->commission->saleCommission->common;?></th>
                  <?php endif;?>
                  <td><?php echo html::select("account[$trade->id][$i]", $userList, $commission->account, "class='form-control'")?></td>
                  <td>
                    <div class='input-group'>
                      <?php echo html::input("contribution[{$trade->id}][$i]", $commission->contribution, "class='form-control'")?>
                      <span class='input-group-addon percent'><?php echo $lang->percent;?></span>
                    </div>
                  </td>
                  <td>
                    <div class='input-group'>
                      <?php echo html::input("rate[{$trade->id}][$i]", $commission->rate, "class='form-control'")?>
                      <span class='input-group-addon percent'><?php echo $lang->percent;?></span>
                    </div>
                  </td>
                  <td><?php echo html::input("amount[{$trade->id}][$i]", $commission->amount, "class='form-control'")?></td>
                  <td><?php echo html::textarea("desc[$trade->id][$i]", $commission->desc, "rows='1' class='form-control'")?></td>
                  <td><div class='btn-group'><a href ='#' class='btn'> <i class='icon icon-plus'></i></a><a href='#' class='btn'><i class='icon icon-remove'></i></a></div></td>
                </tr>
                <?php $i++;$j++;?>
                <?php endforeach;?>
                <?php elseif(!empty($handlersList[$trade->id])):?>
                <?php $k = 0;?>
                <?php foreach($handlersList[$trade->id] as $account):?>
                <tr>
                  <?php if($k == 0):?>
                  <th id='rowspanTH' class='text-center text-middle' rowspan="<?php echo count($handlersList[$trade->id]);?>"><?php echo $lang->commission->saleCommission->common;?></th>
                  <?php endif;?>
                  <td><?php echo html::select("account[$trade->id][$i]", $userList, $account, "class='form-control'")?></td>
                  <td>
                    <div class='input-group'>
                      <?php echo html::input("contribution[{$trade->id}][$i]", '', "class='form-control'")?>
                      <span class='input-group-addon percent'><?php echo $lang->percent;?></span>
                    </div>
                  </td>
                  <td>
                    <div class='input-group'>
                      <?php echo html::input("rate[{$trade->id}][$i]", '', "class='form-control'")?>
                      <span class='input-group-addon percent'><?php echo $lang->percent;?></span>
                    </div>
                  </td>
                  <td><?php echo html::input("amount[{$trade->id}][$i]", '', "class='form-control'")?></td>
                  <td><?php echo html::textarea("desc[$trade->id][$i]", '', "rows='1' class='form-control'")?></td>
                  <td><div class='btn-group'><a href ='#' class='btn'> <i class='icon icon-plus'></i></a><a href='#' class='btn'><i class='icon icon-remove'></i></a></div></td>
                </tr>
                <?php $i++;$k++;?>
                <?php endforeach;?>
                <?php else:?>
                <tr>
                  <th id='rowspanTH' class='text-center text-middle' rowspan='1'><?php echo $lang->commission->saleCommission->common;?></th>
                  <td><?php echo html::select("account[$trade->id][$i]", $userList, '', "class='form-control'")?></td>
                  <td>
                    <div class='input-group'>
                      <?php echo html::input("contribution[{$trade->id}][$i]", '', "class='form-control'")?>
                      <span class='input-group-addon percent'><?php echo $lang->percent;?></span>
                    </div>
                  </td>
                  <td>
                    <div class='input-group'>
                      <?php echo html::input("rate[{$trade->id}][$i]", '', "class='form-control'")?>
                      <span class='input-group-addon percent'><?php echo $lang->percent;?></span>
                    </div>
                  </td>
                  <td><?php echo html::input("amount[{$trade->id}][$i]", '', "class='form-control'")?></td>
                  <td><?php echo html::textarea("desc[$trade->id][$i]", '', "rows='1' class='form-control'")?></td>
                  <td><div class='btn-group'><a href ='#' class='btn'> <i class='icon icon-plus'></i></a><a href='#' class='btn'><i class='icon icon-remove'></i></a></div></td>
                </tr>
                <?php endif;?>
                <tr class='hide'>
                  <td colspan='6'>
                    <table>
                      <tbody id='commissionTR'>  
                        <tr>
                          <td><?php echo html::select("account[$trade->id][]", $userList, '', "class='form-control'")?></td>
                          <td>
                            <div class='input-group'>
                              <?php echo html::input("contribution[$trade->id][]", '', "class='form-control'")?>
                              <span class='input-group-addon percent'><?php echo $lang->percent;?></span>
                            </div>
                          </td>
                          <td>
                            <div class='input-group'>
                              <?php echo html::input("rate[$trade->id][]", '', "class='form-control'")?>
                              <span class='input-group-addon percent'><?php echo $lang->percent;?></span>
                            </div>
                          </td>
                          <td><?php echo html::input("amount[$trade->id][]", '', "class='form-control'")?></td>
                          <td><?php echo html::textarea("desc[$trade->id][]", '', "class='form-control'")?></td>
                          <td><div class='btn-group'><a href ='#' class='btn'> <i class='icon icon-plus'></i></a><a href='#' class='btn'><i class='icon icon-remove'></i></a></div></td>
                        </tr>
                      </tbody>
                    </table>
                  </td>
                </tr>
              </tbody>
              <tfoot>
                <tr class='text-center'>
                  <td><?php echo $lang->trade->total;?></td>
                  <td></td>
                  <td class='total-contribution'></td>
                  <td class='total-rate'></td>
                  <td class='total-amount'></td>
                  <td></td>
                  <td></td>
                </tr>
              </tfoot>
            </table>
          </div>
        </td>
      </tr>
      <?php endforeach;?>
    </table>
  </div>
  <div class='page-actions'><?php echo html::submitButton() . html::hidden('tradeIDList', $tradeIDList);?></div>
</form>

<form method='post' id='togetherForm' action='<?php echo inlink('batchCreate', "mode=save&referer=$referer")?>' class='hide'>
  <div class='panel'>
    <div class='panel-heading'>
      <strong><?php echo $lang->commission->batchCreate;?></strong>
      <div class='btn-group panel-actions pull-right'>
        <button type='button' class='btn single-btn'><?php echo $lang->commission->single;?></button>
        <button type='button' class='btn together-btn'><?php echo $lang->commission->together;?></button>
      </div>
    </div>
    <table class='table'>
      <thead>
        <tr class='text-center'>
          <th class='w-100px'><?php echo $lang->trade->date;?></th>
          <th class='w-100px'><?php echo $lang->trade->depositor;?></th>
          <th class='w-200px'><?php echo $lang->trade->trader;?></th>
          <th class='w-100px'><?php echo $lang->trade->category;?></th>
          <th class='w-120px text-right'><?php echo $lang->trade->money;?></th>
          <th class='w-120px'><?php echo $lang->commission->base;?></th>
        </tr>
      </thead>
      <?php foreach($trades as $trade):?>
      <tr>
        <td><?php echo formatTime($trade->date, DT_DATE1);?></td>
        <td class='text-left'><?php echo zget($depositorList, $trade->depositor, ' ');?></td>
        <td class='text-left' title="<?php echo zget($customerList, $trade->trader, '');?>"><?php if($trade->trader) echo zget($customerList, $trade->trader);?></td>
        <td class='text-left' title="<?php echo zget($categories, $trade->category, '');?>"><?php echo zget($categories, $trade->category, ' ');?></td>
        <td class='text-right'><?php echo zget($currencySign, $trade->currency) . formatMoney($trade->money);?></td>
        <td><?php echo html::input("commission[{$trade->id}]", $trade->commission == 0.00 ? $trade->money : $trade->commission, "class='form-control'")?></td>
      </tr>
      <?php endforeach;?>
    </table>
  </div>
  <div class='panel'>
    <table class='table table-commission'>
      <thead>
        <tr class='text-center'>
          <th class='w-160px'><?php echo $lang->commission->handlers;?></th>
          <th class='w-200px'>
            <?php echo $lang->commission->contribution;?>
            <?php echo html::a('javascript:void(0)', "<i class='icon-question-sign'></i>", "class='tips' data-original-title='{$lang->commission->contributionTips}' data-toggle='tooltip' data-placement='right' ");?>
          </th>
          <th class='w-200px'><?php echo $lang->commission->rate;?></th>
          <th class='w-150px'>
            <?php echo $lang->commission->amount;?>
            <?php echo html::a('javascript:void(0)', "<i class='icon-question-sign'></i>", "class='tips' data-original-title='{$lang->commission->amountTips}' data-toggle='tooltip' data-placement='right' ");?>
          </th>
          <th><?php echo $lang->trade->desc;?></th>
          <th class='w-100px'></th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td><?php echo html::select("account[]", $userList, '', "class='form-control'")?></td>
          <td>
            <div class='input-group'>
              <?php echo html::input("contribution[]", '', "class='form-control'")?>
              <span class='input-group-addon percent'><?php echo $lang->percent;?></span>
            </div>
          </td>
          <td>
            <div class='input-group'>
              <?php echo html::input("rate[]", '', "class='form-control'")?>
              <span class='input-group-addon percent'><?php echo $lang->percent;?></span>
            </div>
          </td>
          <td><?php echo html::input("amount[]", '', "class='form-control'")?></td>
          <td><?php echo html::textarea("desc[]", '', "rows='1' class='form-control'")?></td>
          <td><i class='btn icon icon-plus'></i> <i class='btn icon icon-remove'></i></td>
        </tr>
      </tbody>
      <tfoot>
        <tr class='text-center'>
          <td><?php echo $lang->trade->total;?></td>
          <td class='total-contribution'></td>
          <td class='total-rate'></td>
          <td class='total-amount'></td>
          <td></td>
          <td></td>
        </tr>
      </tfoot>
    </table>
  </div>
  <div class='page-actions'><?php echo html::submitButton() . html::hidden('tradeIDList', $tradeIDList);?></div>
  <table class='hide'>
    <tbody id='commissionTR'>  
      <tr>
        <td><?php echo html::select("account[]", $userList, '', "class='form-control'")?></td>
        <td>
          <div class='input-group'>
            <?php echo html::input("contribution[]", '', "class='form-control'")?>
            <span class='input-group-addon percent'><?php echo $lang->percent;?></span>
          </div>
        </td>
        <td>
          <div class='input-group'>
            <?php echo html::input("rate[]", '', "class='form-control'")?>
            <span class='input-group-addon percent'><?php echo $lang->percent;?></span>
          </div>
        </td>
        <td><?php echo html::input("amount[]", '', "class='form-control'")?></td>
        <td><?php echo html::textarea("desc[]", '', "class='form-control'")?></td>
        <td><i class='btn icon icon-plus'></i> <i class='btn icon icon-remove'></i></td>
      </tr>
    </tbody>
  </table>
</form>

<?php js::set('tips', html::a('javascript:void(0)', " <i class='icon-question-sign'></i>", "class='tips' data-original-title='{$lang->commission->totalTips}' data-toggle='tooltip' data-placement='right' "));?>
<?php include '../../common/view/footer.html.php';?>
