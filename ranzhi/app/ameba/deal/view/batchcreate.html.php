<?php
/**
 * The batch create view file of deal module of RanZhi.
 *
 * @copyright   Copyright 2009-2017 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Gang Liu <liugang@cnezsoft.com>
 * @package     deal 
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */
?>
<?php include '../../common/view/header.html.php';?>
<?php include '../../../sys/common/view/datepicker.html.php';?>
<?php include '../../../sys/common/view/chosen.html.php';?>
<div id='menuActions'>
  <?php commonModel::printLink('deal', 'create', '', "<i class='icon icon-plus'> </i>" . $lang->deal->create, "class='btn btn-primary' data-toggle='modal'");?>
  <?php commonModel::printLink('deal', 'batchCreate', '', "<i class='icon icon-sitemap'> </i>" . $lang->deal->batchCreate, "class='btn btn-primary'");?>
</div>
<div class='panel'>
  <form id='ajaxForm' method='post'>
    <table class='table table-condensed table-borderless'>
      <thead>
        <tr class='text-center'>
          <th class='w-120px required'><?php echo $lang->deal->date;?></th>
          <th class='dept required'><?php echo $lang->deal->fromDept;?></th>
          <th class='dept required'><?php echo $lang->deal->toDept;?></th>
          <th class='w-110px'><?php echo $lang->deal->amebaAccount;?></th>
          <th class='product'><?php echo $lang->deal->product;?></th>
          <th class='category required'><?php echo $lang->deal->category;?></th>
          <th class='w-140px required'><?php echo $lang->deal->money;?></th>
          <th><?php echo $lang->deal->desc;?></th>
        </tr>
      </thead>
      <tbody>
        <?php for($i = 0; $i < $config->deal->batchCreateNumber; $i++):?>
        <?php 
        if($i == 0) 
        {
            $fromDept = $this->app->user->dept;
            $category = $product = '';
        }
        if($i >  0) 
        {
            $deptPairs['ditto']     = $lang->ditto;
            $categoryPairs['ditto'] = $lang->ditto;
            $productPairs['ditto']  = $lang->ditto;
            $fromDept = $category = $product = 'ditto';
        }
        ?>
        <tr>
          <td><?php echo html::input('date[]', '', "class='form-control form-date'");?></td>
          <td><?php echo html::select('fromDept[]', $deptPairs, $fromDept, "class='form-control chosen'");?></td>
          <td><?php echo html::select('toDept[]', $deptPairs, '', "class='form-control chosen'");?></td>
          <td><?php echo html::select('amebaAccount[]', $lang->deal->amebaAccountList, '', "class='form-control'");?></td>
          <td><?php echo html::select('product[]', $productPairs, $product, "class='form-control chosen'");?></td>
          <td><?php echo html::select('category[]', $categoryPairs, $category, "class='form-control chosen'");?></td>
          <td><?php echo html::input('money[]', '', "class='form-control'");?></td>
          <td><?php echo html::textarea('desc[]', '', "rows='1' class='form-control'");?></td>
        </tr>
        <?php endfor;?>
      </tbody>
    </table>
    <div class='page-actions'>
      <?php echo html::submitButton();?>
      <?php echo html::backButton();?>
      <span class='text-danger'><strong><?php echo $lang->deal->tips->empty;?></strong></span>
    </div>
  </form>
</div>
<?php include '../../common/view/footer.html.php';?>
