<?php
/*
 * ARI Ext menu Joomla! module
 *
 * @package		ARI Ext Menu Joomla! module.
 * @version		1.0.0
 * @author		ARI Soft
 * @copyright	Copyright (c) 2009 www.ari-soft.com. All rights reserved
 * @license		GNU/GPL (http://www.gnu.org/copyleft/gpl.html)
 * 
 */

defined('_JEXEC') or die('Restricted access');

require_once dirname(__FILE__) . '/mod_iid_ariextmenu/kernel/class.AriKernel.php';

global $Itemid;

AriKernel::import('Utils.Utils2');
AriKernel::import('Joomla.JoomlaUtils');
AriKernel::import('Menu.MenuHelper');
AriKernel::import('Document.DocumentHelper');
AriKernel::import('Template.Template');
AriKernel::import('Web.HtmlHelper');
AriKernel::import('ExtMenu.ExtMenu');

$menuType = $params->get('menutype', 'mainmenu');
$uniqueId = (bool)$params->get('uniqId', false);

$startLevel = intval($params->get('startLevel', 0), 10);
$endLevel = intval($params->get('endLevel', 0), 10);
$onlyActiveItems = (bool)$params->get('onlyActiveItems', false);

$user =& JFactory::getUser();
$menu = AriJoomlaMenuHelper::getHierarchialMenu(
	$menuType, 
	AriJoomlaUtils::isRegistered(),
	$startLevel,
	$endLevel,
	$onlyActiveItems ? $Itemid : null);
$selectedId = $Itemid;
$cssStyles = $params->get('style');
$assetsMethod = $params->get('loadAssets', 'core');
$modId = !$uniqueId ? $module->id : uniqid('aext', false);

if ($cssStyles)
{
	if ($assetsMethod == 'inline')
	{
		echo '<style type="text/css">' . str_replace(array('{$id}'), array('ariextmenu_ariext' . $modId), $cssStyles) . '</style>';
	}
	else
	{
		$document =& JFactory::getDocument();
		$document->addStyleDeclaration(str_replace(array('{$id}'), array('ariextmenu_ariext' . $modId), $cssStyles));
	}
}

AriTemplate::display(dirname(__FILE__) . '/mod_iid_ariextmenu/templates/main.html.php',
	array('menu' => $menu, 
		'moduleParams' => $params, 
		'selectedId' => $selectedId,
		'moduleId' => $modId,
		'gid' => $user->get('gid')));
?>