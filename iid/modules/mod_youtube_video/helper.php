<?php
/**
* @version		$Id: mod_ser_video.php 14401 2010-01-26 14:10:00Z louis $
* @package		Joomla
* @Author		Diwakar
*/

// no direct access
defined('_JEXEC') or die('Restricted access');

class modVideoHelper
{
	function getVideo($id)
	{
		$db		=& JFactory::getDBO();
		$result	= null;

		$result = null;
		$query = "SELECT * FROM #__video_details where id=".$id." AND published = 1";
		$db->setQuery($query);
		$result = $db->loadObject();

		if ($db->getErrorNum()) 
		{
			JError::raiseWarning( 500, $db->stderr() );
		}

		return $result;
	}


}
?>
