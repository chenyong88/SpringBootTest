<?php
/**
 * The browse mobile view file of leads module of RanZhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Hao Sun <sunhao@cnezsoft.com>
 * @package     leads
 * @version     $Id: index.html.php 3830 2016-05-18 09:34:17Z liugang $
 * @link        http://www.ranzhico.com
 */

if($extView = $this->getExtViewFile(__FILE__)){include $extView; return helper::cd();}

include "../../common/view/m.header.html.php";
?>

<div class='section'>
  <div class='heading'>
    <div class='title'><i class='icon icon-cog muted'></i> <?php echo $lang->leads->applyRule;?></div>
  </div>
  <form id='applyRuleForm' method='post' class='box'>
    <div class='control'>
      <label for='applyLimit'><?php echo $lang->leads->applyLimit;?></label>
      <div class='select'><?php echo html::select('applyLimit', $lang->leads->applyLimitList, $applyLimit)?></div>
    </div>
    <div class='control'>
      <label for='applyRemain'><?php echo $lang->leads->applyRemain;?></label>
      <div class='select'><?php echo html::select('applyRemain', $lang->leads->applyRemainList, $applyRemain)?></div>
      <div class='help-text'><?php echo $lang->leads->tips->applyRemain;?></div>
    </div>
    <div class="control">
      <button type='submit' class='btn primary'><?php echo $lang->save ?></button>
    </div>
  </form>
</div>


<script>
$(function(){$('#applyRuleForm').ajaxform();});
</script>
<?php include "../../common/view/m.footer.html.php"; ?>
