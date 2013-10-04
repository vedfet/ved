<?php
/**
 * @version		$Id: video_details.php  $
 * @package		Joomla
 * @subpackage	Video
  */

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

/**
 * @package		Joomla
 * @subpackage	Video
 */
class TableVideo_details extends JTable
{
  /** @var int Primary key */

	var $id	    		   = null;
/** @var string */
	var $video_name  	            = null;
/** @var string */
	var $video_title	            = null;
	
	var $image_name	            = null;
/** @var string */
/** @var int */
    var $description			= null;
		
	var $published			= null;
	var $created = null;
	var $created_by = null;
/** @var int */
	var $checked_out		= null;
/** @var datetime */
	var $checked_out_time	= null;
/** @var int */
	var $ordering			= null;
    var $archive			= null;
	
	function __construct( &$_db )
	{
		parent::__construct( '#__video_details', 'id', $_db );

	}

	
		
	}
?>
