<?php 
$this->app->loadlang('effort');
$effortHtml = $this->loadModel('effort')->createAppendLink('task', $task->id);
?>
<script language='Javascript'>
$(function()
{
    $('.page-actions').prepend(<?php echo json_encode($effortHtml);?>);
    $.setAjaxLoader('#triggerModal .ajaxEdit', '#triggerModal');
    $.setAjaxLoader('#ajaxModal .ajaxEdit', '#ajaxModal');
})
</script>
