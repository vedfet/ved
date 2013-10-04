<?php
/**
 * Joomla! 1.5 component video
 *
 * @version $Id: video.php 2010-06-03 01:08:55 svn $
 * @author Vinod Dubey
 * @package Joomla
 * @subpackage video
 * @license GNU/GPL
 *
 * It creates component for video
 *

 */
// no direct access
defined( '_JEXEC' ) or die('Restricted access');
class TableVideoConfig extends JTable
{

	var $id = null;
	var $no_of_default_videos = null;
	var $order_by = null;
	var $from_email= null;
	var $from_name = null;
	var $email_needed = null;
 
	/** @var string */
	
	function __construct( &$_db )
	{
		parent::__construct( '#__video_config', 'id', $_db );

	}

	
		
	}
?>
