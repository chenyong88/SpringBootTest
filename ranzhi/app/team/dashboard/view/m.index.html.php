<?php
/**
 * The index mobile view file of dashboard module of RanZhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Tingting Dai <daitingting@xirangit.com>
 * @package     index 
 * @version     $Id
 * @link        http://www.ranzhico.com
 */

include "../../common/view/m.header.html.php";
echo $this->fetch('block', 'dashboard', array('appName' => $appName), 'sys');
include "../../common/view/m.footer.html.php"; ?>
