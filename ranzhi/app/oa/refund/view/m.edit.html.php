<?php
/**
 * The edit mobile view file of refund module of RanZhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Tingting Dai <daitingting@xirangit.com>
 * @package     refund 
 * @version     $Id
 * @link        http://www.ranzhico.com
 */

if($extView = $this->getExtViewFile(__FILE__)){include $extView; return helper::cd();}?>

<style>
#editRefundForm.detail .refund-detail.row {background: #ebf2f9; padding: 0 .5rem .5rem; margin-right: -.5rem; margin-left: -.5rem;}
#editRefundForm.detail .refund-detail.row {margin-right: -.75rem; margin-left: -.75rem;}
</style>

<div class='heading divider'>
  <div class='title'><i class='icon-plus muted'></i> <strong><?php echo $lang->refund->edit;?></strong></div>
  <nav class='nav'>
    <a class='text-primary' data-display='modal' data-remote='<?php echo $this->createLink('action', 'history', "objectType=refund&objectID={$refund->id}") ?>' data-placement='bottom'><i class='icon-history'></i>&nbsp;<?php echo $lang->history;?></a>
    <a data-dismiss='display'><i class='icon-remove muted'></i></a>
  </nav>
</div>

<form class='content box' id='editRefundForm' data-form-refresh='#page' method='post' action='<?php echo $this->createLink('refund', 'edit', "refundID=$refund->id");?>'>
  <div class='control'>
    <label for='name'><?php echo $lang->refund->name;?></label>
    <?php echo html::input('name', $refund->name, "class='input' placeholder='{$lang->required}'");?>
  </div>
  <div class='control'>
    <label for='category'><?php echo $lang->refund->category;?></label>
    <div class='select'><?php echo html::select('category', $categories, $refund->category);?></div>
  </div>
  <div class='row'>
    <div class='cell-4'>
      <div class='control'>
        <label for='currency'><?php echo $lang->refund->currency;?></label>
        <div class='select'><?php echo html::select('currency', $currencyList, $refund->currency);?></div>
      </div>
    </div>
    <div class='cell-8'>
      <div class='control'>
        <div class='pull-right'>
          <a class='btn gray detail' href='javascript:void(0)'><i class='icon-double-angle-down'></i><?php echo $lang->refund->detail;?></a>
        </div>
        <label for='money'><?php echo $lang->refund->money;?></label>
        <?php echo html::input('money', $refund->money, "class='input'");?>
      </div>
    </div>
  </div>
  <div class='control' id='refund-date'>
    <label for='date'><?php echo $lang->refund->date;?></label>
    <input type='date' class='input' id='date' name='date' value='<?php echo $refund->date;?>'>
  </div>
  <div class='control' id='refund-related'>
    <label for='related'><?php echo $lang->refund->related;?></label>
    <div class='select multiple'><?php echo html::select('related[]', $users, $refund->related, 'multiple')?></div>
  </div>

  <div id='details' class='hidden'>
    <?php $key = 0;?>
    <?php foreach($refund->detail as $d):?>
    <div class='row refund-detail'>
      <div class='cell-3'>
        <div class='control'>
          <label for='dateList[<?php echo $key;?>]'><?php echo $lang->refund->date;?></label>
          <input type='date' class='input' id='dateList' name='dateList[<?php echo $key;?>]' value='<?php $d->date;?>'>
        </div>
      </div>
      <div class='cell-6'>
        <div class='control'>
          <label for='categoryList[<?php echo $key;?>]'><?php echo $lang->refund->category;?></label>
          <div class='select'><?php echo html::select("categoryList[$key]", $categories, $d->category);?></div>
        </div>
      </div>
      <div class='cell-3'>
        <div class='control'>
          <div class='pull-right'><a class='btn detail-deleter'><i class='icon-trash text-danger'></i></a></div>
          <label for='moneyList[<?php echo $key;?>]'><?php echo $lang->refund->money;?></label>
          <?php echo html::input("moneyList[$key]", $d->money, "class='input'");?>
        </div>
      </div>
      <div class='cell-12'>
        <div class='control'>
          <label for='relatedList[<?php echo $key;?>][]'><?php echo $lang->refund->related;?></label>
          <div class='select multiple'><?php echo html::select("relatedList[$key][]", $users, $d->related, 'multiple');?></div>
        </div>
      </div>
      <div class='cell-12'>
        <div class='control'>
          <label for='descList[<?php echo $key;?>]'><?php echo $lang->refund->desc;?></label>
          <?php echo html::textarea("descList[$key]", $d->desc, "class='textarea' rows='5'");?>
        </div>
      </div>
    </div>
    <?php $key ++;?>
    <?php endforeach;?>
    <a class='btn text-primary btn-add-detail'><i class='icon-plus'></i>&nbsp; <?php echo $lang->add;?></a>

    <div class='row refund-detail template'>
      <div class='cell-3'>
        <div class='control'>
          <label for='dateList[key]'><?php echo $lang->refund->date;?></label>
          <input type='date' class='input' id='dateList' name='dateList[key]'>
        </div>
      </div>
      <div class='cell-6'>
        <div class='control'>
          <label for='categoryList[key]'><?php echo $lang->refund->category;?></label>
          <div class='select'><?php echo html::select('categoryList[key]', $categories);?></div>
        </div>
      </div>
      <div class='cell-3'>
        <div class='control'>
          <div class='pull-right'><a class='btn detail-deleter'><i class='icon-trash text-danger'></i></a></div>
          <label for='moneyList[key]'><?php echo $lang->refund->money;?></label>
          <?php echo html::input('moneyList[key]', '', "class='input'");?>
        </div>
      </div>
      <div class='cell-12'>
        <div class='control'>
          <label for='relatedList[key][]'><?php echo $lang->refund->related;?></label>
          <div class='select multiple'><?php echo html::select('relatedList[key][]', $users, '', 'multiple');?></div>
        </div>
      </div>
      <div class='cell-12'>
        <div class='control'>
          <label for='descList[key]'><?php echo $lang->refund->desc;?></label>
          <?php echo html::textarea('descList[key]', '', "class='textarea' rows='5'");?>
        </div>
      </div>
    </div>
  </div>

  <div class='control'>
    <label for='desc'><?php echo $lang->refund->desc;?></label>
    <?php echo html::textarea('desc', $refund->desc, "class='textarea' rows='5'");?>
  </div>
  <div class='control'>
    <?php echo $this->fetch('file', 'buildForm', 'fileCount=1');?>
  </div>
</form>

<div class='footer has-padding'>
  <button type='button' data-submit='#editRefundForm' class='btn primary'><?php echo $lang->save;?></button>
</div>

<script>
$(function()
{
    var $form = $('#editRefundForm').modalForm().listenScroll({container:'parent'});

    $('.btn.detail').on('click', function()
    {
        $form.toggleClass('detail');

        if($(this).find('i').hasClass('icon-double-angle-down'))
        {   
            $('#details').removeClass('hidden');
            $('#money').prop('readonly', 'readonly');
            $('#refund-date').addClass('hidden');
            $('#refund-related').addClass('hidden');
            $(this).find('i').removeClass('icon-double-angle-down');
            $(this).find('i').addClass('icon-double-angle-up');
        }   
        else
        {   
            $('input[name^=moneyList]').val('');
            $('#details').addClass('hidden');
            $('#money').prop('readonly', '');
            $('#refund-date').removeClass('hidden');
            $('#refund-related').removeClass('hidden');
            $(this).find('i').removeClass('icon-double-angle-up');
            $(this).find('i').addClass('icon-double-angle-down');
        }   
        return false;
    });

    /* update money. */
    function updateMoney()
    {
        var money = 0;
        $('input[name^=moneyList]').each(function()
        {
            if($(this).val() != '')
            {
                var value = parseFloat($(this).val());
                if(isNaN(value))
                {
                    $(this).val('');
                    $.zui.messager.show('money must a number.');
                }
                else money += value;
            }
        });
        $('#money').val(money);
        return false;
    }

    $(document).on('change', 'input[name^=moneyList]', function(){ updateMoney(); });

    var $details      = $('#details');
    var $template     = $details.children('.template.row');
    var $addDetailBtn = $details.find('.btn-add-detail');
    var $key          = <?php echo $key?>;

    var addDetail = function()
    {
        var $detail = $template.clone().removeClass('template');
        $detail.html($detail.html().replace(/key/g, $key));
        $addDetailBtn.before($detail);
        $key ++;
    };

    $details.on($.TapName, '.detail-deleter', function()
    {
        $(this).closest('.row').remove();
    })

    $addDetailBtn.on($.TapName, function(){addDetail()});

    if($('#details .refund-detail').size() > 1)
    {
        $('.btn.detail').click();
    }
});
</script>
