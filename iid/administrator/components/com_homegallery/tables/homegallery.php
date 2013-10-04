<?php
defined( '_JEXEC' ) or die( 'Restricted access' );

jimport('joomla.application.component.model');

class TableHomegallery extends JTable
{
	var $id 			= null;
	
	/** @var string */
	var $homegallery_title 	= null;
	
	/** @var string */
	var $homegallery_discription = null;
	var $logo_image 	= null;
	
	/** @var string */
	var $website_url	= null;
	var $description	= null;
	/** @var string */
	
	var $created_by		    = null;
	var $created_date	        = null;
	
	var $last_update		= null;
	var $hits 			= null;
	var $published 			= null;
	
	var $checked_out	= null;
	var $chedked_out_time		= null;
	var $ordering 		= null;
	
	var $slide_text 		= null;
	var $new_window =null;


	/**
	* @param database A database connector object
	*/
	
function TableHomegallery(& $db) 
	{
		parent::__construct('#__homegallery', 'id', $db);
	}

}
?>
