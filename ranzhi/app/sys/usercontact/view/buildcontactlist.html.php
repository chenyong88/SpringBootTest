<?php 
if($contacts)
{
    echo html::select('contactList', array('' => $this->lang->usercontact->common) + $contacts, '', "class='form-control chosen' onchange=\"setMailto('toList', this.value)\"");
}
elseif(commonModel::hasPriv('usercontact', 'create'))
{
    echo '<span class="input-group-btn">';
    echo html::a($this->createLink('usercontact', 'create'), "<i class='icon icon-cog'></i>", "class='btn btn-icon createContact' title='{$lang->usercontact->create}'");
    echo '</span>';
}
?>
<style>
.input-group .chosen-container {min-width: 100px; display: table-cell;}
.input-group #toList_chosen .chosen-choices {height: 34px; border-radius: 4px 0 0 4px;}
.input-group #toList_chosen .chosen-choices .search-field > input {min-width: 150px;}
.input-group #contactList_chosen {width: 150px !important;}
.input-group #contactList_chosen .chosen-single {height: 34px; border-left: 0; border-radius: 0 4px 4px 0; width: 150px; max-width: 150px;}
.input-group .createContact {height: 34px; border-left: 0; border-radius: 0 4px 4px 0;}
</style>
<script>
function loadInModal()
{
    $('.createContact').addClass('loadInModal');
    $.setAjaxForm('#createContactForm', function(data)
    {
        if(data.result == 'success')
        {
            $.reloadAjaxModal(1500);
        }
    })
}

function toggleModal()
{
    $('.createContact').attr('data-toggle', 'modal');
}
</script>
