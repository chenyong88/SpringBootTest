<?php
/**
 * The export detail view file of trade module of RanZhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商业软件，非开源软件
 * @author      Gang Liu <liugang@cnezsoft.com>
 * @package     trade 
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */
?>
<?php include $this->app->getBasePath() . '/app/sys/common/view/header.lite.html.php';?>
<?php if($mode != 'depositor') js::set('months', $months);?>
<style>
.checkbox {margin-top: 0px; margin-bottom: 0px; min-height: 0px;}
</style>
<script>
function changeYear(year)
{
    $('#month').empty();
    $('#month').append("<option></option>");
    var months = [];
    for(var i in v.months[year])
    {
        months.push(v.months[year][i]);
    }
    months = months.sort(function(a, b){return b - a;});
    for(var i in months)
    {
        $('#month').append("<option value='" + months[i] + "'>" + months[i] + "</option>");
    }
}

function setDownloading()
{
    if(/opera/.test(navigator.userAgent.toLowerCase())) return true;   // Opera don't support, omit it.

    $.cookie('downloading', 0);
    time = setInterval("closeWindow()", 300);
    return true;
}

function closeWindow()
{
    if($.cookie('downloading') == 1)
    {
        parent.$.zui.closeModal();
        $.cookie('downloading', null);
        clearInterval(time);
    }
}
</script>
<form class='form-condensed' method='post' target='hiddenwin' onsubmit='setDownloading();' style='padding: 0 5% 30px'>
  <table class='w-p100'>
    <tr>
      <?php $class = $mode != 'depositor' ? 'w-220px' : 'w-110px';?>
      <td class='<?php echo $class;?>'>
        <div class='input-group'>
          <span class='input-group-addon'><?php echo $lang->year;?></span>
          <?php $onChange = $mode != 'depositor' ? "onchange=\"changeYear(this.value)\"" : '';?>
          <?php echo html::select('year', $years, date('Y'), "class='form-control' $onChange");?>
          <?php if($mode != 'depositor'):?>
          <span class='input-group-addon fix-border'><?php echo $lang->month;?></span>
          <?php echo html::select('month', array('' => '') + $months[date('Y')], date('m'), "class='form-control'");?>
          <?php endif;?>
        </div>
      </td>
      <td>
        <div class='input-group'>
          <span class='input-group-addon'><?php echo $lang->setFileName;?></span>
          <?php echo html::input('fileName', isset($fileName) ? $fileName : '', 'class=form-control');?>
          <span class='input-group-addon'><?php echo $lang->setFileType;?></span>
          <?php echo html::select('fileType', array('xls' => 'xls', 'xlsx' => 'xlsx'), 'xls', "class='form-control'");?>
          <?php if($mode == 'depositor'):?>
          <span class='input-group-addon'>
            <label class='checkbox-inline'>
              <input type='checkbox' name='groupbytag' id='groupbytag' value='1' /> <?php echo $lang->trade->groupbytag;?>
            </label>
          </span>
          <?php endif;?>
        </div>
      </td>
      <td><?php echo html::submitButton($lang->export);?></td>
    </tr>
  </table>
</form>
<iframe id='hiddenwin' name='hiddenwin' class='hidden'></iframe>
<?php include $this->app->getBasePath() . '/app/sys/common/view/footer.html.php';?>
