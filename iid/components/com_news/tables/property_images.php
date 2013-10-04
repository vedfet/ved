<?php
defined( '_JEXEC' ) or die( 'Restricted access' );

jimport('joomla.application.component.model');

class TableProperty_images extends JTable
{
  var $id  =  null; 
  var $property_id  =  null; 
  var $caption  =  null; 
  var $image_path  =  null; 
  var $isdefault  =  null; 
  var $published  =  null; 
  
	function __construct( &$db ) {
        parent::__construct('#__property_images', 'id', $db);
    }

	

}
?>
