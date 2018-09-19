<?php
/**
 * The control file of product module of RanZhi.
 *
 * @copyright   Copyright 2009-2018 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Tingting Dai <daitingting@xirangit.com>
 * @package     product
 * @version     $Id$
 * @link        http://www.ranzhi.org
 */
class product extends control
{
    /** 
     * The index page, locate to browse.
     * 
     * @access public
     * @return void
     */
    public function index()
    {   
        $this->locate(inlink('browse'));
    }   

    /**
     * Browse product.
     * 
     * @param string $mode
     * @param string $staus
     * @param string $line
     * @param string $orderBy     the order by
     * @param int    $recTotal 
     * @param int    $recPerPage 
     * @param int    $pageID 
     * @access public
     * @return void
     */
    public function browse($mode = 'browse', $status = 'all', $category = '', $orderBy = 'order_desc', $recTotal = 0, $recPerPage = 20, $pageID = 1)
    {   
        $this->app->loadClass('pager', $static = true);
        $pager = new pager($recTotal, $recPerPage, $pageID);

        /* Build search form. */
        $this->loadModel('search', 'sys');
        $this->config->product->search['actionURL'] = $this->createLink('product', 'browse', 'mode=bysearch');
        $this->config->product->search['params']['category']['values'] = $this->loadModel('tree')->getOptionMenu('product', 0);
        $this->search->setSearchParams($this->config->product->search);
        
        $this->view->title      = $this->lang->product->browse;
        $this->view->products   = $this->product->getList($mode, $status, $category, $orderBy, $pager);
        $this->view->categories = $this->loadModel('tree')->getPairs(0, 'product');
        $this->view->treeMenu   = $this->tree->getTreeMenu('product', 0, array('treeModel', 'createProductAdminLink'));
        $this->view->mode       = $mode;
        $this->view->status     = $status;
        $this->view->category   = $category;
        $this->view->orderBy    = $orderBy;
        $this->view->pager      = $pager;
        $this->display();
    }   

    /**
     * Create a product.
     * 
     * @access public
     * @return void
     */
    public function create()
    {
        if($_POST)
        {
            $productID = $this->product->create();       
            if(dao::isError())  $this->send(array('result' => 'fail', 'message' => dao::getError()));

            $this->loadModel('action')->create('product', $productID, 'Created');
            $this->send(array('result' => 'success', 'message' => $this->lang->saveSuccess, 'locate' => inlink('browse')));
        }

        $maxID = $this->dao->select('max(id) as maxID')->from(TABLE_PRODUCT)->fetch('maxID');

        $this->view->title      = $this->lang->product->create;
        $this->view->order      = $maxID + 1;
        $this->view->categories = $this->loadModel('tree')->getOptionMenu('product', 0, $removeRoot = true);
        $this->display();
    }

    /**
     * Edit a product.
     * 
     * @param  int $productID 
     * @access public
     * @return void
     */
    public function edit($productID)
    {
        if($_POST)
        {
            $changes = $this->product->update($productID);
            if(dao::isError()) $this->send(array('result' => 'fail', 'message' => dao::getError()));

            $files = $this->loadModel('file', 'sys')->saveUpload('product', $productID);
            if($changes or $files)
            {
                $fileAction = $files ? $this->lang->addFiles . join(',', $files) : '';

                $actionID = $this->loadModel('action')->create('product', $productID, 'Edited', $fileAction);
                if($changes) $this->action->logHistory($actionID, $changes);
            }

            $this->send(array('result' => 'success', 'message' => $this->lang->saveSuccess, 'locate' => 'reload'));
        }

        $this->view->title      = $this->lang->product->edit;
        $this->view->product    = $this->product->getByID($productID);
        $this->view->categories = $this->loadModel('tree')->getOptionMenu('product', 0);
        $this->display();
    }

    /**
     * View a product.
     * 
     * @param  int    $productID 
     * @access public
     * @return void
     */
    public function view($productID)
    {
        $this->view->title      = $this->lang->product->view;
        $this->view->categories = $this->loadModel('tree')->getOptionMenu('product', 0);
        $this->view->product    = $this->product->getByID($productID);
        $this->view->users      = $this->loadModel('user')->getPairs();
        
        $this->display();
    }

    /**
     * Delete a product.
     * 
     * @param  int      $productID 
     * @access public
     * @return void
     */
    public function delete($productID)
    {
        $this->product->delete(TABLE_PRODUCT, $productID);
        if(dao::isError()) $this->send(array('result' => 'fail', 'message' => dao::getError()));
        $this->send(array('result' => 'success'));
    }

    /**
     * Ajax get product by category.
     * 
     * @param  string $status 
     * @param  string $line 
     * @access public
     * @return void
     */
    public function ajaxGetByCategory($status = '', $category = '')
    {
        $products = $this->product->getPairs($status, $category);

        echo html::select('product', array('') + $products, '', "class='form-control chosen'");
    }
}
