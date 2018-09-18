<?php
/**
 * The browse mobile view file of resume module of RanZhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Hao Sun <sunhao@cnezsoft.com>
 * @package     resume 
 * @version     $Id: index.html.php 3830 2016-05-18 09:34:17Z liugang $
 * @link        http://www.ranzhico.com
 */
if($extView = $this->getExtViewFile(__FILE__)){include $extView; return helper::cd();}?>

<div class='heading'>
  <div class='title'><i class='icon muted icon-group'></i> <strong><?php echo $lang->resume->browse ?></strong><?php if(count($resumes)) echo ' (' . count($resumes) . ')'; ?></div>
  <nav class='nav'><a data-dismiss='display'><i class='icon-remove muted'></i></a></nav>
</div>

<div class='list with-divider content' id='resumesList'>
  <?php foreach($resumes as $resume):?>
  <div data-resume-id='<?php echo $resume->id ?>' class='item item-resume multi-lines'>
    <div class='content'>
      <div class='subtitle'><?php echo $resume->join . ' ~ ' . $resume->left;?></div>
      <div>
        <?php
        if(isset($customers[$resume->customer])) echo $lang->resume->customer . ': ' . $customers[$resume->customer] . ' &nbsp; ';
        if(!empty($resume->dept)) echo $lang->resume->dept . ': ' . $resume->dept . ' &nbsp; ';
        if(!empty($resume->title)) echo $lang->resume->title . ': ' . $resume->dept . ' &nbsp; ';
        ?>
      </div>
      <div class='space-sm'></div>
      <div>
        <a data-remote='<?php echo $this->createLink('resume', 'edit', "resumeID=$resume->id") ?>' class='btn gray' data-display='modal' data-placement='bottom'><?php echo $lang->edit ?></a>
        <a data-remote='<?php echo $this->createLink('resume', 'delete', "resumeID=$resume->id") ?>' class='text-danger gray btn'  data-display='ajaxAction' data-reset-locate='false' data-ajax-delete='.item-resume[data-resume-id="<?php echo $resume->id ?>"]'><?php echo $lang->delete ?></a>
      </div>
    </div>
  </div>
  <?php endforeach;?>
</div>

<?php if($contact):?>
<div class='footer nav justified'>
  <a data-remote='<?php echo $this->createLink('resume', 'create', "contactID=$contact->id") ?>' data-display='modal' data-placement='bottom' class='strong text-link' title='{$lang->resume->create}'><i class='icon-plus'></i>&nbsp;<?php echo $lang->resume->create ?></a>
</div>
<?php endif;?>
