<?php include $this->app->getBasePath() . 'app/sys/common/view/header.lite.html.php'?>
<form class='form-condensed' enctype='multipart/form-data' method='post' target='hiddenwin' style='padding: 0 5% 30px'>
<table class='table table-form'>
  <tr>
    <td class='w-p70'><input type='file' name='file' class='form-control'/></td>
    <td><?php echo html::submitButton();?></td>
  </tr>
</table>
</form>
<iframe id='hiddenwin' name='hiddenwin' class='hidden'></iframe>
<?php include $this->app->getBasePath() . 'app/sys/common/view/footer.html.php'?>
