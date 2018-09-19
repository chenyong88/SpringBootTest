<?php if($todo->account == $this->app->user->account):?>
<?php 
$this->app->loadlang('effort');
$effortHtml = $this->loadModel('effort')->createAppendLink('todo', $todo->id);
?>
<script language='Javascript'>
$(function()
{
    $('.actions').prepend(<?php echo json_encode($effortHtml);?>);
    $.setAjaxLoader('#triggerModal .effort', '#triggerModal');
    $.setAjaxLoader('#triggerModal .ajaxEdit', '#triggerModal');
    $.setAjaxLoader('#ajaxModal .ajaxEdit', '#ajaxModal');
})
</script>
<?php endif;?>
