<?php

defined( '_JEXEC' ) or die( 'Restricted access' );


class plgSystemCrawler extends JPlugin
{
         
    function plgSystemCrawler(&$subject, $config) 
    {
	    $this->_db = JFactory::getDBO();
		parent::__construct($subject, $config);
	}
	function onAfterRender() {
		global $mainframe;
		if ($mainframe->isAdmin()) return;
		$plugin			=& JPluginHelper::getPlugin('system', 'crawler');
		$pluginParams	= new JParameter( $plugin->params );
		$links   = $pluginParams->get('links', '');
		$html	= JResponse::getBody();		
		$regex = '|<html\s*[^\>]*>|s';
		preg_match ($regex, $html, $htmltags);
		$htmltag	= $htmltags[0];
		unset($htmltags);
		
		$crawler = $this->getIsCrawler($_SERVER['HTTP_USER_AGENT']);	
		if($crawler){
		    $query = "SELECT * FROM #__jsefurls WHERE published = '1'";
			$this->_db->setQuery($query);
			$links = $this->_db->loadObjectList();
			
			$strlink='<div style="display:none;">';
			foreach($links as $link){				
				$strlink.='<a href="'.$link->link.'" >'.$link->name.'</a> '."\n";		
			}
			 $strlink.='</div>'."\n";
			// Update HTML tag with facebook xml
			$html = str_replace ("</body>", $strlink."</body>", $html);
			JResponse::setBody($html);
			unset($html);
			return true;
		}
	}
	function getIsCrawler($userAgent) {
		$crawlers = 'Google|msnbot|Rambler|Yahoo|AbachoBOT|accoona|' .
		'AcioRobot|ASPSeek|CocoCrawler|Dumbot|FAST-WebCrawler|' .
		'GeonaBot|Gigabot|Lycos|MSRBOT|Scooter|AltaVista|IDBot|eStyle|Scrubby';
		$isCrawler = (preg_match("/$crawlers/i", $userAgent) > 0);
		return $isCrawler;
	}
}
