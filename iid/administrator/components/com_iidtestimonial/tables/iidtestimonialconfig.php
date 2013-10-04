<?php
/**
 * Joomla! 1.5 component iidtestimonial
 *
 * @version $Id: iidtestimonial.php 2010-06-03 01:08:55 svn $
 * @author Vinod Dubey
 * @package Joomla
 * @subpackage iidtestimonial
 * @license GNU/GPL
 *
 * It creates component for iidtestimonial
 *

 */
// no direct access
defined( '_JEXEC' ) or die('Restricted access');
class TableIidtestimonialConfig extends JTable
{

	var $id = null;
	var $header_text=NULL;
	var $footer_text=NULL;
	var $from_email=NULL;
    var $from_name=NULL;
	 var $notification_text=NULL;
	
 
	/** @var string */
	
	function __construct( &$_db )
	{
		parent::__construct( '#__iidtestimonial_config', 'id', $_db );

	}

		
	}
?>
