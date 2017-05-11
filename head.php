<?php
/**
 * @package      Qhtml5
 * @subpackage   Templates.qhtml5
 * @author       Quantility
 * @copyright    Copyright (C) 2017. All rights reserved.
 * @license      GNU General Public License version 2 or later; see LICENSE.txt
 */
// no direct access
defined('_JEXEC') or die;
?>
<?php header('X-UA-Compatible: IE=edge');?>
<meta name="viewport" content="width=device-width,initial-scale=<?php echo $params->get('initial-scale')?>,minimum-scale=<?php echo $params->get('minimum-scale')?>,maximum-scale=<?php echo $params->get('maximum-scale')?>,user-scalable=<?php echo $params->get('user-scalable')?>"/>
<?php if($params->get('handheldfriendly') == 1) { ?>
<meta name="HandheldFriendly" content="true" />
<?php } ?>
<?php if($params->get('apple-app-fullscreen') == 1) { ?>
<meta name="apple-mobile-web-app-capable" content="YES" />
<?php } ?>
<jdoc:include type="head" />
<jdoc:include type="modules" name="head" style="raw" />
<link rel="stylesheet" type="text/css" href="<?php echo $qhtml5_template; ?>">
<?php if(file_exists($qhtml5_magento)){ ?>
<link rel="stylesheet" type="text/css" href="<?php echo $qhtml5_magento; ?>">
<?php } ?>
<?php if(file_exists($qhtml5_responsive)){ ?>
<link rel="stylesheet" type="text/css" href="<?php echo $qhtml5_responsive; ?>">
<?php } ?>
