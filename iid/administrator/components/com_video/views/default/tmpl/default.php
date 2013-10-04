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
defined('_JEXEC') or die('Restricted access');
JToolBarHelper::title(JText::_('property'), 'generic.png');
JToolBarHelper::preferences('com_property');
?>
<!-- Deafult administrator message -->
This is the default administrator view of your component. To edit it please edit the file:<br />
/administrator/components/com_property/views/default/tmpl/default.php