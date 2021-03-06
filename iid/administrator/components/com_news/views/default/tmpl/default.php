<?php
/**
 * Joomla! 1.5 component News
 *
 * @version $Id: News.php 2010-03-14 01:52:14 svn $
 * @author Diwakar Kumar Singh
 * @package Joomla
 * @subpackage News
 * @license GNU/GPL
 *
 * Display and manage News and related items 
 *
 * This component file was created using the Joomla Component Creator by Not Web Design
 * http://www.notwebdesign.com/joomla_component_creator/
 *
 */

// no direct access
defined('_JEXEC') or die('Restricted access');
JToolBarHelper::title(JText::_('news'), 'generic.png');
JToolBarHelper::preferences('com_news');
?>
<!-- Deafult administrator message -->
This is the default administrator view of your component. To edit it please edit the file:<br />
/administrator/components/com_news/views/default/tmpl/default.php