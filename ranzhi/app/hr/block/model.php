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
helper::import(realpath('../../sys/block/model.php'));
class hrblockModel extends blockModel
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
     * Get salary params.
     * 
     * @access public
     * @return string
     */
    public function getSalaryParams()
    {
        $params = new stdclass();
        $params->num['name']        = $this->lang->block->num;
        $params->num['default']     = 15; 
        $params->num['control']     = 'input';

        return json_encode($params);
    }
}
