<?php
/**
 * The control file for block module of RanZhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商业软件，非开源软件
 * @author      Yidong Wang <yidong@cnezsoft.com>
 * @package     block
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */
class block extends control
{
    /**
     * Block Index Page.
     * 
     * @access public
     * @return void
     */
    public function index()
    {
        $lang = $this->get->lang;
        $this->app->setClientLang($lang);
        $this->app->loadLang('common', 'psi');
        $this->app->loadLang('block');

        $mode = strtolower($this->get->mode);
        if($mode == 'getblocklist')
        {   
            echo $this->block->getAvailableBlocks();
        }   
        elseif($mode == 'getblockform')
        {   
            $code = strtolower($this->get->blockid);
            $func = 'get' . ucfirst($code) . 'Params';
            echo $this->block->$func();
        }   
        elseif($mode == 'getblockdata')
        {   
            $code = strtolower($this->get->blockid);
            $func = 'print' . ucfirst($code) . 'Block';
            $this->$func();
        }
    }

    /**
     * Block Admin Page.
     * 
     * @param  int    $index 
     * @param  string $blockID 
     * @access public
     * @return void
     */
    public function admin($index = 0, $blockID = '')
    {
        $this->app->loadLang('block', 'sys');
        $title = $index == 0 ? $this->lang->block->createBlock : $this->lang->block->editBlock;

        if(!$index) $index = $this->block->getLastKey('psi') + 1;

        if($_POST)
        {
            $this->block->save($index, 'system', 'psi');
            if(dao::isError())  $this->send(array('result' => 'fail', 'message' => dao::geterror())); 
            $this->send(array('result' => 'success', 'message' => $this->lang->saveSuccess, 'locate' => $this->server->http_referer));
        }

        $block   = $this->block->getBlock($index, 'psi');
        $blockID = $blockID ? $blockID : ($block ? $block->block : '');

        $this->view->title   = $title;
        $this->view->blocks  = array_merge(array(''), json_decode($this->block->getAvailableBlocks(), true));
        $this->view->params  = $blockID ? json_decode($this->block->{'get' . ucfirst($blockID) . 'Params'}(), true) : array();
        $this->view->blockID = $blockID;
        $this->view->block   = $block;
        $this->view->index   = $index;
        $this->display();
    }

    /**
     * Sort block. 
     * 
     * @param  string    $oldOrder 
     * @param  string    $newOrder 
     * @access public
     * @return void
     */
    public function sort($oldOrder, $newOrder)
    {
        $this->locate($this->createLink('sys.block', 'sort', "oldOrder=$oldOrder&newOrder=$newOrder&app=psi"));
    }

    /**
     * Resize block 
     * 
     * @param  int    $id 
     * @param  string $type 
     * @param  string $data 
     * @access public
     * @return void
     */
    public function resize($id, $type, $data)
    {
        $this->locate($this->createLink('sys.block', 'resize', "id=$id&type=$type&data=$data"));
    }

    /**
     * Delete block. 
     * 
     * @param  int    $index 
     * @access public
     * @return void
     */
    public function delete($index)
    {
        $this->locate($this->createLink('sys.block', 'delete', "index=$index&app=psi"));
    }

    /**
     * Print order block.
     * 
     * @access public
     * @return void
     */
    public function printSaleBlock()
    {
        $this->app->loadLang('sale', 'psi');

        $params = $this->get->param;
        $params = json_decode(base64_decode($params));
        if(!isset($params->type)) $params->type = '';

        $this->session->set('orderList', $this->createLink('psi.dashboard', 'index'));
        if($this->get->app == 'sys') $this->session->set('orderList', 'javascript:$.openEntry("home")');

        $this->view->sso       = base64_decode($this->get->sso);
        $this->view->code      = $this->get->blockid;
        $this->view->companies = $this->loadModel('customer')->getPairs();

        $this->view->orders = $this->dao->select('*')->from(TABLE_PSI_ORDER)
            ->where('deleted')->eq(0)
            ->andWhere('type')->eq('sale')
            ->beginIF($params->type == 'assignedToMe')->andWhere('assignedTo')->eq($params->account)->fi()
            ->beginIF($params->type == 'underway')->andWhere('status')->in('pending, toReceive, partReceived, toPurchase, purchasing, purchased, picking, toDeliver, partDelivered')->fi()
            ->beginIF($params->type == 'picking')->andWhere('status')->eq($params->type)->fi()
            ->orderBy($params->orderBy)
            ->limit($params->num)
            ->fetchAll('id');

        $this->display();
    }

    /**
     * Print purchase block.
     * 
     * @access public
     * @return void
     */
    public function printPurchaseBlock()
    {
        $this->app->loadLang('purchase', 'psi');

        $params = $this->get->param;
        $params = json_decode(base64_decode($params));
        if(!isset($params->type)) $params->type = '';

        $this->session->set('orderList', $this->createLink('psi.purchase', 'browse'));
        if($this->get->app == 'sys') $this->session->set('orderList', 'javascript:$.openEntry("home")');

        $this->view->sso       = base64_decode($this->get->sso);
        $this->view->code      = $this->get->blockid;
        $this->view->companies = $this->loadModel('customer')->getPairs();

        $this->view->orders = $this->dao->select('*')->from(TABLE_PSI_ORDER)
            ->where('deleted')->eq(0)
            ->andWhere('type')->eq('purchase')
            ->beginIF($params->type == 'assignedToMe')->andWhere('assignedTo')->eq($params->account)->fi()
            ->beginIF($params->type == 'underway')->andWhere('status')->in('pending, toReceive, partReceived, toPurchase, purchasing, purchased, picking, toDeliver, partDelivered')->fi()
            ->beginIF($params->type == 'picking')->andWhere('status')->eq($params->type)->fi()
            ->orderBy($params->orderBy)
            ->limit($params->num)
            ->fetchAll('id');

        $this->display();
    }

    /**
     * Print batch block.
     * 
     * @access public
     * @return void
     */
    public function printBatchBlock()
    {
        $this->app->loadLang('batch', 'psi');

        $params = $this->get->param;
        $params = json_decode(base64_decode($params));
        if(!isset($params->type)) $params->type = '';

        $this->session->set('batchList', $this->createLink('psi.batch', 'browse'));
        if($this->get->app == 'sys') $this->session->set('batchList', 'javascript:$.openEntry("home")');

        $this->view->sso       = base64_decode($this->get->sso);
        $this->view->code      = $this->get->blockid;
        $this->view->customers = $this->loadModel('customer')->getPairs();
        $this->view->orders    = $this->loadModel('order', 'psi')->getList();

        $this->view->batches = $this->dao->select('*')->from(TABLE_BATCH)
            ->where('1')
            ->beginIF($params->type == 'received')->andWhere('type')->eq('in')->fi()
            ->beginIF($params->type != 'received')->andWhere('type')->eq('out')->fi()
            ->andWhere('status')->eq($params->type)
            ->orderBy($params->orderBy)
            ->limit($params->num)
            ->fetchAll('id');

        $this->display();
    }
}
