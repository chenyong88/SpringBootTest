<?php
public static function createCommissionSettingLink($category)
{
    return html::a(helper::createLink('commission', 'setting', "mode={$_SESSION['commissionMode']}&categoryID={$category->id}"), $category->name);
}
