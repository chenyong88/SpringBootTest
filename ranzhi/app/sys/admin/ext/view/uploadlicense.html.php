<?php
/**
 * The upload license view file of admin module of ZenTaoPMS.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商业软件，非开源软件
 * @author      Yidong Wang <yidong@cnezsoft.com>
 * @package     admin
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */
?>
<?php include '../../../common/view/header.modal.html.php';?>
<?php if(empty($fixFile)):?>
<form method='post' action="<?php echo inlink('uploadLicense');?>" enctype='multipart/form-data' style='padding: 5% 20%'>
  <div class='input-group'>
    <input type='file' name='file' class='form-control' />
    <span class='input-group-btn'><?php echo html::submitButton();?></span>
  </div>
</form>
<?php else:?>
<div class='alert alert-info'>
  <p><?php printf($lang->admin->notWritable, join('</code><code>', $fixFile))?></p>
</div>
<p style='padding:0 0 20px 20px;'><?php echo html::a(inlink('uploadLicense'), $lang->admin->refresh, "class='btn refresh'")?></p>
<?php endif;?>
<?php include '../../../common/view/footer.modal.html.php';?>
