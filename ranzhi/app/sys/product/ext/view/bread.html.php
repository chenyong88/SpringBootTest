<?php
/**
 * The bread view file of product module of RanZhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商业软件，非开源软件
 * @author      Gang Liu <liugang@cnezsoft.com>
 * @package     product 
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */
?>
<ul id='menuTitle'>
  <li><?php if(!commonModel::printLink('product', 'browse', '', $lang->product->all)) echo $lang->product->all;?></li>
  <li class='divider angle'></li>
  <li style='padding: 11px 10px;'><?php echo $product->name;?></li>
  <li class='divider angle'></li>
  <li class='title'><?php echo str_replace('-', '', $title);?></li>
</ul>
