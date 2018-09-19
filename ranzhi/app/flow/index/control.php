<?php
/**
 * The control file of index module of RanZhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商业软件，非开源软件
 * @author      Gang Liu <liugang@cnezsoft.com>
 * @package     index
 * @version     $Id$
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
            $menuList  = $this->lang->menu->flow;
            $menuOrder = array_flip($this->lang->flow->menuOrder);
            unset($menuList->workflow);
            unset($menuOrder['workflow']);
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
            $this->locate($this->createLink('workflow', 'browse'));
        }
    }
}
