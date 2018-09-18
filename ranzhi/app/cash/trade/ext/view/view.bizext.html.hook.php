<?php if($trade->alipayTradeNo):?>
<div class='alipayTradeNo hide'>
  <table>
    <tbody>
      <tr>
        <th><?php echo $lang->trade->alipayTradeNo;?></th>
        <td><?php echo $trade->alipayTradeNo;?></td>
      </tr>
    </tbody>
  </table>
</div>

<script>
$('.col-side table tr:nth(0) > th').width('90px');
$('.col-side table tr:nth(2)').after($('.alipayTradeNo table tbody').html());
</script>
<?php endif;?>
