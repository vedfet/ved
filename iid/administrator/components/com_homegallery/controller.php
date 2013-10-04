<?php
/**
 * Joomla! 1.5 component homegallery
 *
 * @version $Id: controller.php 2010-11-09 02:17:03 svn $
 * @author Gajendra Kumar Jain
 * @package Joomla
 * @subpackage homegallery
 * @license GNU/GPL
 *
 * 
 *
 * This component file was created using the Joomla Component Creator by Not Web Design
 * http://www.notwebdesign.com/joomla_component_creator/
 *
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

jimport( 'joomla.application.component.controller' );
require_once( JPATH_COMPONENT.DS.'helpers'.DS.'helper.php' );

/**
 * homegallery Controller
 *
 * @package Joomla
 * @subpackage homegallery
 */
class HomegalleryController extends JController {
    /**
     * Constructor
     * @access private
     * @subpackage homegallery
     */
    function __construct() {
        //Get View
        if(JRequest::getCmd('view') == '') {
            JRequest::setVar('view', 'default');
        }
        $this->item_type = 'Default';
        parent::__construct();
    }
}
?>