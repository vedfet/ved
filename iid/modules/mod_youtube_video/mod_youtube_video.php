<?php
/**
* @version		$Id: mod_ser_video.php 14401 2010-01-26 14:10:00Z louis $
* @package		Joomla
* @Author		Diwakar
*/
// no direct access

defined('_JEXEC') or die('Restricted access');
// Include the syndicate functions only once
require_once (dirname(__FILE__).DS.'helper.php');

$background_image	= $params->get('background_image', '');
$classsufix	 = $params->get('classsufix', '');
$id		 = $params->get('id', '');
$type	 = $params->get('module_text', '');
$height		 = $params->get('height', '');
$width	 = $params->get('width', '');
$video_type=$params->get('video_type');

//Getting the video name based on id
$video   = modVideoHelper::getVideo($params->get( 'id', 0 ));

require(JModuleHelper::getLayoutPath('mod_youtube_video'));

?>
