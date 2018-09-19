<?php
/**
 * The review mobile view file of refund module of RanZhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Tingting Dai <daitingting@xirangit.com>
 * @package     refund 
 * @version     $Id
 * @link        http://www.ranzhico.com
 */

if($extView = $this->getExtViewFile(__FILE__)){include $extView; return helper::cd();}?>

<div class='heading divider'>
  <div class='title'><?php echo $lang->refund->review;?></div>
  <nav class='nav'><a data-dismiss='display'><i class='icon-remove muted'></i></a></nav>
</div>

<form class='content box' id='reviewForm' data-form-refresh='#page' method='post' action='<?php echo $this->createLink('refund', 'review', "refundID=$refund->id");?>'>
  <div class='list with-divider with-avatar'>
    <?php if(!empty($refund->detail)):?>
    <?php foreach($refund->detail as $key => $detail):?>
    <div data-id='<?php echo $detail->id;?>' class='item item-detail multi-lines'>
      <div data-skin='<?php echo $detail->id;?>' class='avatar text-tint circle'><?php echo $key;?></div>
      <div class='content'>
        <div class='subtitle'><?php echo $lang->refund->date . $lang->colon . $detail->date;?></div>
        <div class='subtitle refundMoney' data-money='<?php echo $detail->money;?>'><?php echo $lang->refund->money . $lang->colon . $detail->money;?></div>
        <div class='subtitle'><?php echo $lang->refund->status . $lang->colon . zget($lang->refund->statusList, $detail->status);?></div>
        <div class='subtitle'><?php echo $lang->refund->category . $lang->colon . zget($categories, $detail->category);?></div>
        <div class='subtitle'><?php echo $lang->refund->desc . $lang->colon . $detail->desc;?></div>
        <div class='subtitle'>
          <?php foreach($lang->refund->reviewStatusList as $key => $reviewStatus):?>
          <?php $checked = ($key == 'pass' or $refund->status == $key) ? " checked='checked'" : '';?>
          <div class='radio inline-block'>
            <input type='radio' name='status<?php echo $detail->id;?>' value='<?php echo $key?>' <?php echo $checked;?>>
            <label for='status<?php echo $detail->id;?>'><?php echo $reviewStatus;?></label>
          </div>
          <?php endforeach;?>
        </div> 
      </div>
    </div>
    <?php endforeach;?>
    <?php else:?>
    <div data-id='<?php echo $refund->id;?>' class='item item-refund multi-lines'>
      <div data-skin='<?php echo $refund->id;?>' class='avatar text-tint circle'><?php echo $refund->id;?></div>
      <div class='content'>
        <div class='subtitle'><?php echo $lang->refund->date . $lang->colon . $refund->date;?></div>
        <div class='subtitle'><?php echo $lang->refund->money . $lang->colon . $refund->money;?></div>
        <div class='subtitle'><?php echo $lang->refund->status . $lang->colon . zget($lang->refund->statusList, $refund->status);?></div>
        <div class='subtitle'><?php echo $lang->refund->category . $lang->colon . zget($categories, $refund->category);?></div>
        <div class='subtitle'><?php echo $lang->refund->desc . $lang->colon . $refund->desc;?></div>
        <div class='subtitle'>
          <?php foreach($lang->refund->reviewStatusList as $key => $reviewStatus):?>
          <?php $checked = ($key == 'pass' or $refund->status == $key) ? " checked='checked'" : '';?>
          <div class='radio inline-block'>
            <input type='radio' name='status<?php echo $refund->id;?>' value='<?php echo $key?>' <?php echo $checked;?>>
            <label for='status<?php echo $refund->id;?>'><?php echo $reviewStatus;?></label>
          </div>
          <?php endforeach;?>
        </div> 
      </div>
    </div>
    <?php endif;?>
  </div>

  <div class='control reviewMoney'>      
    <label for='money'><?php echo $lang->refund->money;?></label>
    <?php echo html::input('money', $refund->money, "class='input'")?> 
  </div>

  <div class='control reason hidden'>      
    <label for='reason'><?php echo $lang->refund->reason;?></label>
    <?php echo html::textarea('reason', '', "rows='5' class='textarea'");?> 
  </div>
</form>

<div class='footer has-padding'>
  <button class='btn primary' type='button' data-submit='#reviewForm'><?php echo $lang->save;?></button>
</div>


<script>
$(document).ready(function()
{
    $('#reviewForm').modalForm().listenScroll({container:'parent'});

    var $detail = <?php echo $refund->detail ? json_encode($refund->detail) : "''";?>;

    if($detail)
    {
        $('input[name^=status]').click(function()
        {
            var reviewStatus = 'reject';

            $('input[name^=status]').each(function()
            {
                if($(this).prop('checked'))
                {
                    if(reviewStatus != $(this).val())
                    {
                        reviewStatus = $(this).val();
                        return false;
                    }
                }
            })

            if(reviewStatus == 'reject')
            {
                $('.reviewMoney').addClass('hidden');
                $('.reason').removeClass('hidden');
            }
            else
            {
                $('.reviewMoney').removeClass('hidden');
                $('.reason').addClass('hidden');
            }
        })

        $('input[name^=status]').click(function()
        {
            var money = 0;
            $('input[name^=status]').each(function()
            {
                if($(this).prop('checked'))
                {
                    if($(this).val() == 'pass')
                    {
                        money += parseInt($(this).parents('.item').find('.refundMoney').data('money'));
                    }
                }
            })

            $('#money').val(money);
        })
    }
    else
    {
        $('input[name^=status]').click(function()
        {
            if($('input[value=pass]').prop('checked'))
            {
                $('.reviewMoney').removeClass('hidden');
                $('.reason').addClass('hidden');
            }
            else
            {
                $('.reviewMoney').addClass('hidden');
                $('.reason').removeClass('hidden');
            }
        })
    }
})
</script>
