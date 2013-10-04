<?php
/**
 * Joomla! 1.5 component news
 *
 * @version $Id: router.php 2010-06-03 02:04:32 svn $
 * @author Diwakar
 * @package Joomla
 * @subpackage news
 * @license GNU/GPL
 *
 * Every Days News
 *
 * This component file was created using the Joomla Component Creator by Not Web Design
 * http://www.notwebdesign.com/joomla_component_creator/
 *
 */

// no direct access
 
defined( '_JEXEC' ) or die( 'Restricted access' );
 
jimport( 'joomla.application.component.view');
 
/**
 * HTML View class for the HelloWorld Component
 *
 * @package    HelloWorld
 */
 
class propertyViewAdd extends JView
{
    function display($tpl = null)
    {
        $step = JRequest::getVar('step', 0);
		$id = JRequest::getVar('id', 0);
        $this->assignRef( 'step', $step );
		$this->assignRef( 'id', $id );
		$db =& JFactory::getDBO();
		
		$query = 'SELECT * FROM #__property_details WHERE published = 1 AND id="'.$id.'"';
		$db->setQuery($query);
		$propertylist = $db->loadObjectList();
		
		$lists=array();
		
		$query = 'SELECT c.country_3_code as value, c.country_name as text' .
				' FROM #__country AS c' .
				' ORDER BY c.country_name';
		$countries[] = JHTML::_('select.option', '0', '- '.JText::_('Select Country').' -', 'value', 'text');
		$db->setQuery($query);
		$countries = array_merge($countries, $db->loadObjectList());
		$lists['countries'] = JHTML::_('select.genericlist',  $countries, 'country', 'class="inputbox" size="1" ', 'value', 'text', $propertylist[0]->country);
		
		$current_zoning=$this->getZoning();
		$lists['current_zoning'] = JHTML::_('select.genericlist',  $current_zoning, 'current_zoning', 'class="txtfeild04" size="1" ', 'value', 'text', $propertylist[0]->current_zoning);

		$terrain=$this->getTerrain();
		$lists['terrain'] = JHTML::_('select.genericlist',  $terrain, 'terrain', 'class="txtfeild04" size="1" ', 'value', 'text', $propertylist[0]->terrain);

		$access=$this->getAccess();
		$lists['access'] = JHTML::_('select.genericlist',  $access, 'access', 'class="txtfeild04" size="1" ', 'value', 'text', $propertylist[0]->access);

		
		
		$usages=$this->getUsages();
		$lists['landuse1'] = JHTML::_('select.genericlist',  $usages, 'landuse1', 'class="txtfeild04" size="1" ', 'value', 'text', $propertylist[0]->landuse1);
		$lists['landuse2'] = JHTML::_('select.genericlist',  $usages, 'landuse2', 'class="txtfeild04" size="1" ', 'value', 'text', $propertylist[0]->landuse2);
		$lists['landuse3'] = JHTML::_('select.genericlist',  $usages, 'landuse3', 'class="txtfeild04" size="1" ', 'value', 'text', $propertylist[0]->landuse3);
		$lists['landuse4'] = JHTML::_('select.genericlist',  $usages, 'landuse4', 'class="txtfeild04" size="1" ', 'value', 'text', $propertylist[0]->landuse4);
		

		$this->assignRef( 'propertylist', $propertylist[0] );
		$this->assignRef( 'lists', $lists );
        parent::display($tpl);
    }
	
	function getUsages()
	{
		$usages = array();
		$usages[] = JHTML::_('select.option', ' ', JText::_('Select'));
		$usages[] = JHTML::_('select.option', 'Agriculture', JText::_('Agriculture'));
		$usages[] = JHTML::_('select.option', 'Cattle Farm', JText::_('Cattle Farm'));
		$usages[] = JHTML::_('select.option', 'Clearcut', JText::_('Clearcut'));
		$usages[] = JHTML::_('select.option', 'Commercial', JText::_('Commercial'));
		$usages[] = JHTML::_('select.option', 'CRP', JText::_('CRP'));
		$usages[] = JHTML::_('select.option', 'Dairy Farm', JText::_('Dairy Farm'));
		$usages[] = JHTML::_('select.option', 'Desert', JText::_('Desert'));
		$usages[] = JHTML::_('select.option', 'Development', JText::_('Development'));
		$usages[] = JHTML::_('select.option', 'Estate Home', JText::_('Estate Home'));
		$usages[] = JHTML::_('select.option', 'Fishing', JText::_('Fishing'));
		$usages[] = JHTML::_('select.option', 'High Fence', JText::_('High Fence'));
		$usages[] = JHTML::_('select.option', 'Historic', JText::_('Historic'));
		$usages[] = JHTML::_('select.option', 'Homesite', JText::_('Homesite'));
		$usages[] = JHTML::_('select.option', 'Horse Farm', JText::_('Horse Farm'));
		$usages[] = JHTML::_('select.option', 'Hunting', JText::_('Hunting'));
		$usages[] = JHTML::_('select.option', 'Industrial', JText::_('Industrial'));
		$usages[] = JHTML::_('select.option', 'Minerals', JText::_('Minerals'));
		$usages[] = JHTML::_('select.option', 'Minifarm', JText::_('Minifarm'));
		$usages[] = JHTML::_('select.option', 'Mountain', JText::_('Mountain'));
		$usages[] = JHTML::_('select.option', 'Natural Forest', JText::_('Natural Forest'));
		$usages[] = JHTML::_('select.option', 'Nursery', JText::_('Nursery'));
		$usages[] = JHTML::_('select.option', 'Oil/Gas', JText::_('Oil/Gas'));
		$usages[] = JHTML::_('select.option', 'Orchard/Grove', JText::_('Orchard/Grove'));
		$usages[] = JHTML::_('select.option', 'Pasture', JText::_('Pasture'));
		$usages[] = JHTML::_('select.option', 'Plantation', JText::_('Plantation'));
		$usages[] = JHTML::_('select.option', 'Ranch', JText::_('Ranch'));
		$usages[] = JHTML::_('select.option', 'Recreational', JText::_('Recreational'));
		$usages[] = JHTML::_('select.option', 'Residential', JText::_('Residential'));
		$usages[] = JHTML::_('select.option', 'Row Crop', JText::_('Row Crop'));
		$usages[] = JHTML::_('select.option', 'Sod Farm', JText::_('Sod Farm'));
		$usages[] = JHTML::_('select.option', 'Timber', JText::_('Timber'));
		$usages[] = JHTML::_('select.option', 'Undeveloped', JText::_('Undeveloped'));
		$usages[] = JHTML::_('select.option', 'Vineyard', JText::_('Vineyard'));
		$usages[] = JHTML::_('select.option', 'Waterfront', JText::_('Waterfront'));
		$usages[] = JHTML::_('select.option', 'Wetlands', JText::_('Wetlands'));
		$usages[] = JHTML::_('select.option', 'Wind Farm', JText::_('Wind Farm'));

		return $usages;
	}
	function getZoning()
	{
		$zoning = array();
		$zoning[] = JHTML::_('select.option', 'No Zoning', JText::_('No Zoning'));
		$zoning[] = JHTML::_('select.option', 'Agricultural', JText::_('Agricultural'));
		$zoning[] = JHTML::_('select.option', 'Residential', JText::_('Residential'));
		$zoning[] = JHTML::_('select.option', 'Commercial', JText::_('Commercial'));
		$zoning[] = JHTML::_('select.option', 'Industrial', JText::_('Industrial'));
		$zoning[] = JHTML::_('select.option', 'Mixed Use', JText::_('Mixed Use'));
        return $zoning;
	}
	function getTerrain()
	{
		$terrain = array();
		$terrain[] = JHTML::_('select.option', '', JText::_('Select'));
		$terrain[] = JHTML::_('select.option', 'Flat', JText::_('Flat'));
		$terrain[] = JHTML::_('select.option', 'Gently Rolling', JText::_('Gently Rolling'));
		$terrain[] = JHTML::_('select.option', 'Hilly', JText::_('Hilly'));
		$terrain[] = JHTML::_('select.option', 'Mountainous', JText::_('Mountainous'));
		$terrain[] = JHTML::_('select.option', 'Wetland', JText::_('Wetland'));
		$terrain[] = JHTML::_('select.option', 'Desert', JText::_('Desert'));
		$terrain[] = JHTML::_('select.option', 'Various', JText::_('Various'));
		$terrain[] = JHTML::_('select.option', 'Other', JText::_('Other'));
        return $terrain;
	}
	function getAccess()
	{
		$access = array();
		$access[] = JHTML::_('select.option', '', JText::_('Select'));
		$access[] = JHTML::_('select.option', 'Paved Road', JText::_('Paved Road'));
		$access[] = JHTML::_('select.option', 'Dirt Road', JText::_('Dirt Road'));
		$access[] = JHTML::_('select.option', 'Gravel Road', JText::_('Gravel Road'));
		$access[] = JHTML::_('select.option', 'Multiple Roads', JText::_('Multiple Roads'));
		$access[] = JHTML::_('select.option', 'State Highway', JText::_('State Highway'));
		$access[] = JHTML::_('select.option', 'Interstate Highway', JText::_('Interstate Highway'));
		$access[] = JHTML::_('select.option', 'Deeded Easement', JText::_('Deeded Easement'));
		$access[] = JHTML::_('select.option', 'Land Locked', JText::_('Land Locked'));
		$access[] = JHTML::_('select.option', 'Other', JText::_('Other'));
		return $access;
	}
	
}

