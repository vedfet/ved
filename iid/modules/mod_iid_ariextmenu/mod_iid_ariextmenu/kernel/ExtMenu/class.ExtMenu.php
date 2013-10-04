<?php
/*
 * ARI Ext menu
 *
 * @package		ARI Ext Menu
 * @version		1.0.0
 * @author		ARI Soft
 * @copyright	Copyright (c) 2009 www.ari-soft.com. All rights reserved
 * @license		GNU/GPL (http://www.gnu.org/copyleft/gpl.html)
 * 
 */

class AriExtMenuHelper
{
	function loadAssets($type = 'core')
	{
		static $loaded;
		
		if ($loaded)
			return ;
		
		$siteUrl = AriJoomlaUtils::getSiteUrl() . '/modules/mod_iid_ariextmenu/mod_iid_ariextmenu/';
		$jsUrl = $siteUrl . 'js/';
		$cssUrl = $jsUrl . 'css/';

		if ($type == 'inline')
		{
			printf('<link rel="stylesheet" href="%1$smenu.min.css" type="text/css" />' .
				'<!--[if IE]><link rel="stylesheet" type="text/css" href="%1$smenu.ie.min.css" /><![endif]-->'.
				'<script type="text/javascript" src="%2$sext-core.js"></script>' .
				'<script type="text/javascript" src="%2$smenu.min.js"></script>',
				$cssUrl,
				$jsUrl);
			
		}
		else
		{
			AriDocumentHelper::includeCssFile($cssUrl . 'menu.min.css');
			AriDocumentHelper::includeCustomHeadTag('<!--[if IE]><link rel="stylesheet" type="text/css" href="' . $cssUrl . 'menu.ie.min.css" /><![endif]-->');
			AriDocumentHelper::includeJsFile($jsUrl . 'ext-core.js');
			AriDocumentHelper::includeJsFile($jsUrl . 'menu.min.js');
		}
		
		$loaded = true;
	}
}
?>