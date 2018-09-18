<?php
/**
 * ZenTaoPHP的前端类。
 * The front class file of ZenTaoPHP framework.
 *
 * The author disclaims copyright to this source code.  In place of
 * a legal notice, here is a blessing:
 *
 *  May you do good and not evil.
 *  May you find forgiveness for yourself and forgive others.
 *  May you share freely, never taking more than you give.
 */

helper::import(dirname(dirname(__FILE__)) . '/base/front/front.class.php');
/**
 * html类，生成html标签。
 * The html class, to build html tags.
 *
 * @package framework
 */
class html extends baseHTML
{
    /**
     * 生成select标签。
     * Create tags like "<select><option></option></select>"
     *
     * @param  string $name          the name of the select tag.
     * @param  array  $options       the array to create select tag from.
     * @param  string $selectedItems the item(s) to be selected, can like item1,item2.
     * @param  string $attrib        other params such as multiple, size and style.
     * @param  string $append        adjust if add options[$selectedItems].
     * @static
     * @access public
     * @return string
     */
    static public function select($name = '', $options = array(), $selectedItems = "", $attrib = "", $append = false)
    {
        $options = (array)($options);
        if($append and !isset($options[$selectedItems])) $options[$selectedItems] = $selectedItems;
        if(!is_array($options) or empty($options)) return false;

        /* The begin. */
        $id = $name;
        if(strpos($name, '[') !== false) $id = trim(str_replace(']', '', str_replace('[', '', $name)));
        $id = "id='{$id}'";
        if(strpos($attrib, 'id=') !== false) $id = '';

        $string = "<select name='$name' {$id} $attrib>\n";

        /* The options. */
        if(is_array($selectedItems)) $selectedItems = implode(',', $selectedItems);
        $selectedItems   = ",$selectedItems,";
        $convertedPinYin = class_exists('commonModel') ? commonModel::convert2Pinyin($options) : array();
        foreach($options as $key => $value)
        {
            $optionPinyin = zget($convertedPinYin, $value, '');

            $key      = str_replace('item', '', $key);
            $selected = strpos($selectedItems, ",$key,") !== false ? " selected='selected'" : '';
            $string  .= "<option value='$key'$selected data-keys='{$optionPinyin}'>$value</option>\n";
        }

        /* End. */
        return $string .= "</select>\n";
    }

    /**
     * 生成input输入标签。
     * Create tags like "<input type='text' />"
     *
     * @param  string $name     the name of the text input tag.
     * @param  string $value    the default value.
     * @param  string $attrib   other attribs.
     * @static
     * @access public
     * @return string
     */
    static public function input($name, $value = "", $attrib = "")
    {
        global $config;

        $id = "id='$name'";
        if(strpos($attrib, 'id=') !== false) $id = '';
        $value = str_replace("'", '&#039;', $value);

        $originalName = $name;
        if(strpos($name, '[') !== false) $name = substr($name, 0, strpos($name, '['));
        $autocomplete = strpos($config->inputTag->disableAutocomplete, ",$name,") !== false ? 'off' : 'on';
        $name = $originalName;

        return "<input type='text' name='$name' {$id} value='$value' autocomplete='$autocomplete' $attrib />\n";
    }
}

/**
 * JS类。
 * JS class.
 *
 * @package front
 */
class js extends baseJS
{

    /**
     * Export the config vars for createLink() js version.
     *
     * @static
     * @access public
     * @return void
     */
    static public function exportConfigVars()
    {
        global $app, $config, $lang;
        $defaultViewType = $app->getViewType();
        $themeRoot       = $app->getWebRoot() . 'theme/';
        $moduleName      = $app->getModuleName();
        $methodName      = $app->getMethodName();
        $clientLang      = $app->getClientLang();
        $runMode         = RUN_MODE;
        $requiredFields  = '';
        if(isset($config->$moduleName->require->$methodName)) $requiredFields = str_replace(' ', '', $config->$moduleName->require->$methodName);

        $jsConfig = new stdclass();
        $jsConfig->webRoot        = $config->webRoot;
        $jsConfig->appName        = $app->getAppName();
        $jsConfig->cookieLife     = ceil(($config->cookieLife - time()) / 86400);
        $jsConfig->requestType    = $config->requestType;
        $jsConfig->requestFix     = $config->requestFix;
        $jsConfig->moduleVar      = $config->moduleVar;
        $jsConfig->methodVar      = $config->methodVar;
        $jsConfig->viewVar        = $config->viewVar;
        $jsConfig->defaultView    = $defaultViewType;
        $jsConfig->themeRoot      = $themeRoot;
        $jsConfig->currentModule  = $moduleName;
        $jsConfig->currentMethod  = $methodName;
        $jsConfig->clientLang     = $clientLang;
        $jsConfig->requiredFields = $requiredFields;
        $jsConfig->save           = $lang->save;
        $jsConfig->router         = $app->server->SCRIPT_NAME;
        $jsConfig->runMode        = $runMode;
        $jsConfig->timeout        = $config->timeout;
        $jsConfig->pingInterval   = $config->pingInterval;

        $js  = self::start(false);
        $js .= 'var config=' . json_encode($jsConfig);
        $js .= self::end();
        echo $js;
    }
}

/**
 * css类。
 * css class.
 *
 * @package front
 */
class css extends baseCSS
{
    /**
     * 引入css文件。
     * Import a css file.
     *
     * @param  string $url
     * @access public
     * @return void
     */
    public static function import($url, $attrib = '')
    {
        global $config;
        if(!empty($attrib)) $attrib = ' ' . $attrib;
        echo "<link rel='stylesheet' href='$url?v={$config->version}' type='text/css' media='screen'{$attrib} />\n";
        echo "<link rel='stylesheet' href='$url?v={$config->version}' type='text/css' media='print'{$attrib} />\n";
    }
}
