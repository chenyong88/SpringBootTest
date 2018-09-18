<?php
/**
 * The license view file of admin module of Ranzhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商业软件，非开源软件
 * @author      Yidong Wang <yidong@cnezsoft.com>
 * @package     admin
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */
?>
<?php include '../../../common/view/header.html.php';?>
<div class='col-xs-4'>
</div>
<div class='col-xs-4'>
  <div class='panel'>
    <h3 class='text-center'><?php echo $lang->admin->license?></h3>
    <table class='table table-borderless table-hover table-striped'>
      <?php foreach($lang->admin->property as $key => $name):?>
      <tr>
        <th class='w-100px text-right'><?php echo $name?></th>
        <?php
        $property = zget($ioncubeProperties, $key, ' ');
        if($key == 'expireDate' and $property == 'All Life') $property = $lang->admin->licenseInfo['alllife'];
        if($key == 'user' and empty($property)) $property = $lang->admin->licenseInfo['nouser'];
        ?>
        <td class='text-left'><?php echo $property?></td>
      </tr>
      <?php endforeach;?>
    </table>
  </div>
  <p class='text-center'><?php echo html::a(inlink('uploadLicense'), $lang->admin->uploadLicense, "class='btn btn-primary' data-toggle='modal'");?></p>
</div>
<div class='col-xs-4'>
</div>
<?php include '../../../common/view/footer.html.php';?>
