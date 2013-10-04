<?php
/**
 * Joomla! 1.5 component iidtestimonial
 *
 * @version $Id: controller.php 2010-11-28 23:39:36 svn $
 * @author Gajendra Kumar Jain
 * @package Joomla
 * @subpackage iidtestimonial
 * @license GNU/GPL
 *
 * This component is used for iidtestimonial given by someone.
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
 * iidtestimonial Controller
 *
 * @package Joomla
 * @subpackage iidtestimonial
 */
class IidtestimonialController extends JController {
    /**
     * Constructor
     * @access private
     * @subpackage iidtestimonial
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