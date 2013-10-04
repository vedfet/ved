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

defined('ARI_FRAMEWORK_LOADED') or die('Direct Access to this location is not allowed.');

AriKernel::import('Web.JSON.JSONHelper');

$moduleParams = $params['moduleParams'];
$moduleId = $params['moduleId'];
$menu = $params['menu']; 
$selectedId = $params['selectedId'];
$gid = $params['gid'];
$assetsMethod = $moduleParams->get('loadAssets', 'core');
$loadMethod = $moduleParams->get('loadMethod', 'ready');
?>
<!-- ARI Ext Menu Joomla! module. Copyright (c) 2009 ARI Soft, www.ari-soft.com -->
<?php
if ($menu):

$defMenuConfig = array(
	'direction' => 'horizontal',
	'delay' => 0.2,
	'autoWidth' => true,
	'transitionType' => 'fade',
	'transitionDuration' => 0.3,
	'animate' => true
	);

$config = array();
foreach ($defMenuConfig as $key => $defValue)
{
	$value = AriUtils2::parseValueBySample($moduleParams->get($key, $defValue), $defValue);
	if ($value != $defValue) $config[$key] = $value;
}

$zIndex = intval($moduleParams->get('zIndex', -1), 10);
if ($zIndex > 0) $config['zIndex'] = $zIndex;
	
$menuId = 'ariext' . $moduleId;

$siteUrl = AriJoomlaUtils::getSiteUrl() . '/modules/mod_iid_ariextmenu/mod_iid_ariextmenu/';
$jsUrl = $siteUrl . 'js/';
$cssUrl = $jsUrl . 'css/';

AriExtMenuHelper::loadAssets($assetsMethod);

if ($assetsMethod == 'inline')
{
	printf('<style type="text/css">#%1$s A{ font-weight: %3$s !important; text-transform: %4$s !important; }</style>',
			'ariextmenu_' . $menuId,
			$moduleParams->get('fontSize', '12px'),
			$moduleParams->get('fontWeight', 'normal'),
			$moduleParams->get('textTransform', 'none'));
	if ($loadMethod == 'load')
	{
		printf('<script type="text/javascript">Ext.EventManager.on(window, "load", function() { new Ext.ux.Menu("ariextmenu_' . $menuId . '", %1$s); Ext.get("ariextmenu_' . $menuId . '").select(".ux-menu-sub").removeClass("ux-menu-init-hidden"); });</script>',
			AriJSONHelper::encode($config));
	}
	else
	{
		printf('<script type="text/javascript">Ext.onReady(function() { new Ext.ux.Menu("ariextmenu_' . $menuId . '", %1$s); Ext.get("ariextmenu_' . $menuId . '").select(".ux-menu-sub").removeClass("ux-menu-init-hidden"); });</script>',
			AriJSONHelper::encode($config));
	}
}
else
{
	AriDocumentHelper::includeCustomHeadTag(
		sprintf('<style type="text/css">#%1$s A{  font-weight: %3$s !important; text-transform: %4$s !important; }</style>',
			'ariextmenu_' . $menuId,
			$moduleParams->get('fontSize', '12px'),
			$moduleParams->get('fontWeight', 'normal'),
			$moduleParams->get('textTransform', 'none')));
	if ($loadMethod == 'load')
	{
		AriDocumentHelper::includeCustomHeadTag(
			sprintf('<script type="text/javascript">Ext.EventManager.on(window, "load", function() { new Ext.ux.Menu("ariextmenu_' . $menuId . '", %1$s); Ext.get("ariextmenu_' . $menuId . '").select(".ux-menu-sub").removeClass("ux-menu-init-hidden"); });</script>',
				AriJSONHelper::encode($config)));
	}
	else
	{
		AriDocumentHelper::includeCustomHeadTag(
			sprintf('<script type="text/javascript">Ext.onReady(function() { new Ext.ux.Menu("ariextmenu_' . $menuId . '", %1$s); Ext.get("ariextmenu_' . $menuId . '").select(".ux-menu-sub").removeClass("ux-menu-init-hidden"); });</script>',
				AriJSONHelper::encode($config)));
	}
}
		
AriTemplate::display(dirname(__FILE__) . '/menu.html.php',
	array('menuId' => 'ariextmenu_' . $menuId,
		'menu' => $menu,
		'level' => 0,
		'parentId' => 0,
		'selectedId' => $selectedId,
		'gid' => $gid,
		'direction' => AriUtils2::getParam($config, 'direction', $defMenuConfig['direction'])));
		
endif;
?>