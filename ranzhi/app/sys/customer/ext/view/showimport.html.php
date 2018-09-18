<?php include '../../../common/view/header.html.php';?>
<?php include $this->app->getBasePath() . 'app/sys/common/view/chosen.html.php'?>
<form target='hiddenwin' method='post'>
<table class='table active-disabled table-fixed'>
<thead class='text-center'>
  <tr>
    <th class='w-100px'><?php echo $lang->customer->name?></th>
    <th class='w-80px'><?php echo $lang->customer->public?></th>
    <th class='w-100px'><div class="required"><?php echo $lang->customer->contact?></div></th>
    <th class='w-100px'><?php echo $lang->customer->type?></th>
    <th class='w-90px'><?php echo $lang->customer->size?></th>
    <th class='w-130px'><?php echo $lang->customer->industry?></th>
    <th class='w-130px'><?php echo $lang->customer->area?></th>
    <th class='w-100px'><?php echo $lang->customer->status?></th>
    <th class='w-80px'><?php echo $lang->customer->level?></th>
    <th class='w-100px'><?php echo $lang->customer->phone?></th>
    <th class='w-100px'><?php echo $lang->customer->email?></th>
    <th class='w-90px'><?php echo $lang->customer->qq?></th>
    <th><?php echo $lang->customer->desc?></th>
  </tr>
</thead>
<tbody>
  <?php foreach($customerList as $key => $customer):?>
  <tr class='text-top'>
    <td><?php echo html::input("name[$key]", htmlspecialchars($customer->name, ENT_QUOTES), "id='name$key' class='form-control'");?></td>
    <td><?php echo html::select("public[$key]", array($lang->no, $lang->yes), $customer->public, "id='public$key' class='form-control'");?></td>
    <td><?php echo html::input("contact[$key]", htmlspecialchars($customer->contact, ENT_QUOTES), "id='contact$key' class='form-control'");?></td>
    <td><?php echo html::select("type[$key]", $lang->customer->typeList, $customer->type, "id='type$key' class='form-control'");?></td>
    <td><?php echo html::select("size[$key]", $sizeList, $customer->size, "id='size$key' class='form-control'")?></td>
    <td style='overflow:visible'><?php echo html::select("industry[$key]", $industryList, $customer->industry, "id='industry$key' class='form-control chosen'")?></td>
    <td style='overflow:visible'><?php echo html::select("area[$key]", $areaList, $customer->area, "id='area$key' class='form-control chosen'")?></td>
    <td><?php echo html::select("status[$key]", $lang->customer->statusList, $customer->status, "id='status$key' class='form-control'")?></td>
    <td><?php echo html::select("level[$key]", $levelList, $customer->level, "id='level$key' class='form-control'")?></td>
    <td><?php echo html::input("phone[$key]", $customer->phone, "id='phone$key' class='form-control'")?></td>
    <td><?php echo html::input("email[$key]", $customer->email, "id='email$key' class='form-control'")?></td>
    <td><?php echo html::input("qq[$key]", $customer->qq, "id='qq$key' class='form-control'")?></td>
    <td><?php echo html::textarea("desc[$key]", $customer->desc, "id='desc$key' class='form-control customer-area' rows='1'")?></td>
  </tr>
  <?php endforeach;?>
</tbody>
<tfoot>
  <tr>
    <td colspan='13' class='text-center'><?php echo html::submitButton() . ' &nbsp; ' . html::backButton();?></td>
  </tr>
</tfoot>
</table>
<iframe id='hiddenwin' name='hiddenwin' class='hidden'></iframe>
<?php include '../../../common/view/footer.html.php';?>
