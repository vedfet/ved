<?php
defined( '_JEXEC' ) or die( 'Restricted access' );

jimport('joomla.application.component.model');

class TableProperty_details extends JTable
{
  var $id  =  null; 
  var $purpose  =  null; 
  var $title  =  null; 
  var $country  =  null; 
  var $address  =  null; 
  var $city  =  null; 
  var $zip  =  null; 
  var $mlsid  =  null; 
  var $acerage  =  null; 
  var $annual_taxes  =  null; 
  var $total_price  =  null; 
  var $per_acre_price  =  null; 
  var $owner_subdivide  =  null; 
  var $current_zoning  =  null; 
  var $terrain  =  null; 
  var $access  =  null; 
  var $landuse1  =  null; 
  var $landuse2  =  null; 
  var $landuse3  =  null; 
  var $landuse4  =  null; 
  var $land_features  =  null; 
  var $location_directions  =  null; 
  var $longitude  =  null; 
  var $latitude  =  null; 
  var $map_on_listing  =  null; 
  var $video_link  =  null; 
  var $virtual_tour_link  =  null; 
  var $uts_electricity  =  null; 
  var $uts_county_water  =  null; 
  var $uts_sever  =  null; 
  var $uts_natural_gas  =  null; 
  var $uts_cell_service  =  null; 
  var $uts_telephone  =  null; 
  var $uts_well_water  =  null; 
  var $uts_septic  =  null; 
  var $uts_cable_sat_tv  =  null; 
  var $uts_broadband  =  null; 
  var $txp_price_reduced  =  null; 
  var $txp_owner_financing  =  null; 
  var $txp_shown_by_appointment  =  null; 
  var $txp_covenants_restrictions  =  null; 
  var $txp_sealed_bid  =  null; 
  var $txp_foreclosure  =  null; 
  var $txp_owner_will_lease  =  null; 
  var $published  =  null; 
  var $featured  =  null; 
  var $ordering  =  null; 
  var $created_date= null;
  var $modified_date= null;
  var $views= null;
  
	function __construct( &$db ) {
        parent::__construct('#__property_details', 'id', $db);
    }

	

}
?>
