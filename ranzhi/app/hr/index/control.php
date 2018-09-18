<?php
/**
 * The control file of index module of RanZhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商业软件，非开源软件
 * @author      Chunsheng Wang <chunsheng@cnezsoft.com>
 * @package     index
 * @version     $Id: control.php 7417 2013-12-23 07:51:50Z wwccss $
 * @link        http://www.ranzhico.com
 */
class index extends control
{
    public function __construct($moduleName = '', $methodName = '', $appName = '')
    {
        parent::__construct($moduleName, $methodName, $appName);
    }

    /**
     * Index page.
     * 
     * @access public
     * @return void
     */
    public function index()
    {
        $isMobile = $this->app->viewType === 'mhtml';
        if($isMobile)
        {
            $menuList  = $this->lang->menu->hr;
            $menuOrder = array_flip($this->lang->hr->menuOrder);
            unset($menuList->salary);
            unset($menuList->commission);
            unset($menuList->report);
            unset($menuOrder['salary']);
            unset($menuOrder['commission']);
            unset($menuOrder['report']);
            if(!empty($menuOrder))
            {
                $menuOrder = array_flip($menuOrder);
                ksort($menuOrder);
                $menu = current($menuOrder);
                list($label, $module, $method, $vars) = explode('|', $menuList->$menu);
                $this->locate($this->createLink($module, $method, $vars));
            }
            else
            {
                $this->view->title = $this->lang->app->name;
                $this->display();
            }
        }
        else
        {
            $this->locate($this->createLink('salary', 'company'));
        }
    }
}
