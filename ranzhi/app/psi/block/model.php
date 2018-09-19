<?php
/**
 * The model file for block module of RanZhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商业软件，非开源软件
 * @author      Yidong Wang <yidong@cnezsoft.com>
 * @package     block
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */
if(strpos(realpath('./'), '/ext/') !== false) helper::import(realpath('../../../../sys/block/model.php'));
if(strpos(realpath('./'), '/ext/') === false) helper::import(realpath('../../sys/block/model.php'));
class psiblockModel extends blockModel
{
    /**
     * Get block list.
     * 
     * @access public
     * @return string
     */
    public function getAvailableBlocks()
    {
        foreach($this->lang->block->availableBlocks as $key => $block)
        {
            if(!commonModel::hasPriv($key, 'browse')) unset($this->lang->block->availableBlocks->$key);
        }

        return json_encode($this->lang->block->availableBlocks);
    }

    /**
     * Get order params.
     * 
     * @access public
     * @return string
     */
    public function getSaleParams()
    {
        $this->app->loadLang('sale', 'psi');

        $params = new stdclass();

        $params->type['name']    = $this->lang->block->type;
        $params->type['options'] = $this->lang->block->typeList->sale;
        $params->type['control'] = 'select';

        $params->num['name']        = $this->lang->block->num;
        $params->num['default']     = 15; 
        $params->num['control']     = 'input';

        $params->orderBy['name']    = $this->lang->block->orderBy;
        $params->orderBy['default'] = 'id_desc';
        $params->orderBy['options'] = $this->lang->block->orderByList->sale;
        $params->orderBy['control'] = 'select';

        return json_encode($params);
    }

    /**
     * Get purchase params.
     * 
     * @access public
     * @return string
     */
    public function getPurchaseParams()
    {
        $this->app->loadLang('purchase', 'psi');

        $params = new stdclass();
        $params->type['name']    = $this->lang->block->type;
        $params->type['options'] = $this->lang->block->typeList->purchase;
        $params->type['control'] = 'select';

        $params->num['name']        = $this->lang->block->num;
        $params->num['default']     = 15; 
        $params->num['control']     = 'input';

        $params->orderBy['name']    = $this->lang->block->orderBy;
        $params->orderBy['default'] = 'id_desc';
        $params->orderBy['options'] = $this->lang->block->orderByList->purchase;
        $params->orderBy['control'] = 'select';

        return json_encode($params);
    }

    /**
     * Get batch params.
     * 
     * @access public
     * @return string
     */
    public function getBatchParams()
    {
        $this->app->loadLang('batch', 'psi');

        $params = new stdclass();
        $params->type['name']    = $this->lang->block->type;
        $params->type['options'] = $this->lang->block->typeList->batch;
        $params->type['control'] = 'select';

        $params->num['name']        = $this->lang->block->num;
        $params->num['default']     = 15; 
        $params->num['control']     = 'input';

        $params->orderBy['name']    = $this->lang->block->orderBy;
        $params->orderBy['default'] = 'id_desc';
        $params->orderBy['options'] = $this->lang->block->orderByList->batch;
        $params->orderBy['control'] = 'select';

        return json_encode($params);
    }
}
