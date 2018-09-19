<?php 
/**
 * The order->report view of order module of Ranzhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商业软件，非开源软件
 * @author      Gang Liu <liugang@cnezsoft.com>
 * @package     Order 
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */
?>
<?php include '../../common/view/header.html.php';?>
<?php include '../../../sys/common/view/chosen.html.php';?>
<?php include '../../../sys/common/view/datepicker.html.php';?>
<?php js::set('searchType', $searchType);?>
<div class='panel'>
  <div class='panel-heading'>
    <ul class='nav'>
      <?php foreach($lang->order->report->date as $key => $value):?>
      <li id='<?php echo $key;?>'><?php echo html::a(inlink("report", "type={$type}&searchType={$key}"), $value);?></li> 
      <?php endforeach;?>
      <li id='searchTab'><?php echo html::a('#', "<i class='icon icon-search'></i>" . $lang->order->report->search);?></li>
    </ul>
    <div id='querybox' class='hide'>
      <form id='searchForm' method='post' action='<?php echo inlink("report", "type={$type}&searchType=bysearch");?>'>
        <table class='table table-condensed table-borderless' style='margin: 0 auto'>
          <tr>
            <td class='w-130px'><?php echo html::select('trader', $customers, $this->post->trader, "class='form-control chosen' data-placeholder='{$lang->order->report->select[$companyType]}'");?></td>
            <td class='w-130px'><?php echo html::select('product', $products, $this->post->product, "class='form-control chosen' data-placeholder='{$lang->order->report->select['product']}'");?></td>
            <td class='w-120px'><?php echo html::select('category', $categories, $this->post->category, "class='form-control chosen' data-placeholder='{$lang->order->report->select['category']}'");?></td>
            <td class='w-150px'><?php echo html::select('model', $models, $this->post->model, "class='form-control chosen' data-placeholder='{$lang->order->report->select['model']}'");?></td>
            <td class='w-120px'><?php echo html::input('begin', $this->post->begin, "class='form-control form-date' placeholder='{$lang->order->report->select['begin']}'");?></td>
            <td class='w-120px'><?php echo html::input('end', $this->post->end, "class='form-control form-date' placeholder='{$lang->order->report->select['end']}'");?></td>
            <td class='w-120px'>
              <div class='btn-group'>
                <?php echo html::submitButton($lang->order->report->search);?>
              </div>
            </td>
          </tr>
        </table>
      </form>
    </div>
  </div>
  <table class='table table-condensed table-striped table-hover tablesorter'>
    <thead>
      <tr>
        <?php $vars = "searchType={$searchType}&orderBy=%s&recTotal={$pager->recTotal}&recPerPage={$pager->recPerPage}&pageID={$pager->pageID}";?>
        <th class='w-140px'><?php commonModel::printOrderLink('orderNo', $orderBy, $vars, $lang->order->orderNo->common);?></th>
        <th><?php commonModel::printOrderLink('trader', $orderBy, $vars, $lang->order->trader[$type]);?></th>
        <th class='w-100px'><?php commonModel::printOrderLink('createdDate', $orderBy, $vars, $lang->order->createdDate);?></th>
        <th class='w-200px'><?php commonModel::printOrderLink('product', $orderBy, $vars, $lang->order->product);?></th>
        <th class="w-180px"  ><?php commonModel::printOrderLink('model', $orderBy, $vars, $lang->orderProduct->model);?></th>
        <th class='w-60px' ><?php commonModel::printOrderLink('unit', $orderBy, $vars, $lang->orderProduct->unit);?></th>
        <th class='w-80px text-right' ><?php commonModel::printOrderLink('price', $orderBy, $vars, $lang->orderProduct->price);?></th>
        <th class='w-80px text-right' ><?php commonModel::printOrderLink('amount', $orderBy, $vars, $lang->orderProduct->amount);?></th>
        <th class='w-80px text-right' ><?php commonModel::printOrderLink('money', $orderBy, $vars, $lang->order->money);?></th>
        <th class='w-80px text-right' ><?php commonModel::printOrderLink('taxed', $orderBy, $vars, $lang->order->taxed);?></th>
        <th class='w-70px' ><?php echo $lang->order->desc;?></th>
      </tr>
    </thead>
    <tbody>
      <?php $pageTotalMoney = 0;?>
      <?php foreach($orders as $order):?>
      <tr>
        <td><?php if(!commonModel::printLink($type, 'detail', "id={$order->id}&status=all", $order->orderNo)) echo $order->orderNo;?></td>
        <td>
          <?php if(!commonModel::printLink($type == 'sale' ? 'customer' : 'provider', 'view', "id=$order->trader", zget($customers, $order->trader))) echo zget($customers, $order->trader);?>
        </td>
        <td><?php echo formatTime($order->createdDate, DT_DATE1);?></td>
        <td><?php if(!commonModel::printLink('product', 'view', "id={$order->productID}", $order->product)) echo $order->product;?></td>
        <td><?php echo zget($models, $order->model, ' ');?></td>
        <td><?php echo zget($units, $order->unit, ' ');?></td>
        <td class='text-right'><?php echo $order->price;?></td>
        <td class='text-right'><?php echo $order->amount;?></td>
        <td class='text-right'><?php echo $order->money;?></td>
        <td class='text-right'><?php echo zget($lang->order->taxedList, $order->taxed);?></td>
        <?php $desc = empty($order->desc) ? $lang->order->report->noDesc : $order->desc;?>
        <td><?php echo html::a('#', $lang->order->report->showDesc, "data-toggle='tooltip' data-placement='left' title='{$desc}'");?></td>
      </tr>
      <?php $pageTotalMoney += $order->money;?>
      <?php endforeach;?>
    </tbody>
    <tfoot>
      <tr>
        <th colspan='5' class='text-danger'>
          <?php echo sprintf($lang->order->report->money, $totalMoney, $pageTotalMoney);?>
        </th>
        <td colspan='7'><?php $pager->show();?></td>
      </tr>
    </tfoot>
  </table>
</div>
<?php include '../../common/view/footer.html.php';?>
