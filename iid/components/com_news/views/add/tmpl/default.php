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
 
defined('_JEXEC') or die('Restricted access');
$editor =& JFactory::getEditor();


 ?>
<?php if((int)$this->step==0 || (int)$this->step==1) { ?>
<script>
function validate()
{
	var form=document.userform;
	if(form.purpose.value=='')
	{
		alert('Please select the purpose..')
		form.purpose.focus();
		return false;
	}
	else if(form.title.value=='')
	{
		alert('Please enter the title..')
		form.title.focus();
		return false;
	}
	else if(form.address.value=='')
	{
		alert('Please enter the address..')
		form.address.focus();
		return false;
	}
	else if(form.city.value=='')
	{
		alert('Please enter the city or town..')
		form.city.focus();
		return false;
	}
	else if(form.zip.value=='')
	{
		alert('Please enter the zip..')
		form.zip.focus();
		return false;
	}
	else if(form.acerage.value=='' || parseFloat(form.acerage.value)==0 || parseFloat(form.acerage.value)==NaN)
	{
		alert('Please enter a valid acerage..')
		form.acerage.focus();
		return false;
	}
	else if(form.annual_taxes.value=='' || isNaN(form.annual_taxes.value)==true)
	{
		alert('Please enter valid annual taxes..')
		form.annual_taxes.focus();
		return false;
	}
	else if(form.total_price.value=='' || isNaN(form.total_price.value)==true)
	{
		alert('Please enter valid total price..')
		form.total_price.focus();
		return false;
	}
	else if(form.per_acre_price.value=='' || isNaN(form.per_acre_price.value)==true)
	{
		alert('Please enter valid per acre price..')
		form.per_acre_price.focus();
		return false;
	}
	if(form.owner_subdivide.value=='')
	{
		alert('Please select the owner subdivide..')
		form.owner_subdivide.focus();
		return false;
	}
}
</script>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
			<tr>
              <td><h1>Add Your  <span class="colorgreen">Land</span></h1></td>
            </tr>
            <tr>
              <td>
			  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                
                <tr>
                  <td>
				  <div class="relative">
                    <div class="icondiv"><img src="images/clipboard-icon.gif" alt="Mail Icon" width="71" height="63" /></div>
                    <div><img src="images/spacer.gif" alt="Terraveno" width="1" height="17" /></div>
					<form name="userform" action="index.php" method="post" onsubmit="return validate();" >
                    <div class="formbox">
                      <table width="100%" border="0" cellpadding="0" cellspacing="5">
						<tr>
                          <td colspan="2"><h3>Basic Listing Information</h3></td>
                        </tr>
                        
                         
                        <tr>
                          <td colspan="2"><input name="purpose" type="radio" value="1" <?php if((int)$this->propertylist->purpose==1 || (int)$this->propertylist->purpose==0) { echo 'checked'; } ?> />                            
                             For Sale  
                            &nbsp; &nbsp; 
                            <input name="purpose" type="radio" value="2" <?php if((int)$this->propertylist->purpose==2) { echo 'checked'; } ?> />                            
                             Auction 
                             &nbsp; &nbsp; &nbsp;
                             <input name="purpose" type="radio" value="3" <?php if((int)$this->propertylist->purpose==3) { echo 'checked'; } ?> />
                             For Lease </td>
                          </tr>
                        
                        <tr>
                          <td height="20" colspan="2"><hr size="1" color="#D6D6D6" /></td>
                          </tr>
                        <tr>
                          <td colspan="2"><h3>Creative Title</h3></td>
                          </tr>
                        <tr>
                          <td width="50%" valign="top"><input name="title" type="text" class="txtfeild03" value="<?php echo $this->propertylist->title; ?>" /></td>
                          <td width="50%">No need to include the state or county in the title. It's added to the creative title automatically.</td>
                        </tr>
                        <tr>
                          <td height="20" colspan="2"><hr size="1" color="#D6D6D6" /></td>
                        </tr>
                        <tr>
                          <td colspan="2"><h3>Location &amp; Address</h3></td>
                        </tr>
                        <tr>
                          <td>Country <span class="colororange">Required</span></td> <td></td>
                        </tr>
                        <tr>
                          <td><?php echo $this->lists['countries']; ?></td> <td></td>
                        </tr>
                        <tr>
                          <td height="25" valign="bottom">Address<span class="colorbrown"> (if available)</span></td>
                          <td height="25" valign="bottom"> City or Town<span class="colororange"> Required</span></td>
                        </tr>
                        <tr>
                          <td><input name="address" type="text" class="txtfeild03"  value="<?php echo $this->propertylist->address; ?>" /></td>
                          <td><input name="city" type="text" class="txtfeild03" value="<?php echo $this->propertylist->city; ?>" /></td>
                        </tr>
                        <tr>
                          <td height="25" valign="bottom"> Zip or Postal Code<span class="colorbrown"> (optional)</span></td>
                          <td height="25" valign="bottom"> MLS or Other ID <span class="colorbrown">(optional)</span></td>
                        </tr>
                        <tr>
                          <td><input name="zip" type="text" class="txtfeild03" value="<?php echo $this->propertylist->zip; ?>" /></td>
                          <td><input name="mlsid" type="text" class="txtfeild03" value="<?php echo $this->propertylist->mlsid; ?>" /></td>
                        </tr>
                        <tr>
                          <td height="20" colspan="2"><hr size="1" color="#D6D6D6" /></td>
                        </tr>
                        <tr>
                          <td colspan="2"><h3>Acreage, Taxes &amp; Price</h3></td>
                        </tr>
                        <tr>
                          <td>Acreage <span class="colororange">Required</span></td> <td></td>
                        </tr>
                        <tr>
                          <td valign="top"><input name="acerage" type="text" class="txtfeild03" value="<?php echo $this->propertylist->acerage; ?>" onblur="(isNaN(parseFloat(this.value))==true)? this.value=0 : this.value=parseFloat(this.value); " /></td>
                          <td valign="top">Acreage must be more than 0. <br />
                            Cannot contain a range (i.e. 5-10). <br />
                            If less than 1 acre, enter a 0 before the decimal.</td>
                        </tr>
                        <tr>
                          <td>Annual Taxes <span class="colororange">Required</span></td> <td></td>
                        </tr>
                        <tr>
                          <td valign="top"><input name="annual_taxes" type="text" class="txtfeild03" value="<?php if($this->propertylist->annual_taxes) echo $this->propertylist->annual_taxes; else echo '$'; ?>" onfocus="if(this.value=='$') this.value='';" onblur="(isNaN(parseInt(this.value))==true)? this.value=0 : this.value=parseInt(this.value); " /></td>
                          <td>Enter 0 to omit annual taxes. <br />
                            No $, commas or decimal.</td>
                        </tr>
                        <tr>
                          <td>Total Price <span class="colororange">Required</span></td> <td></td>
                        </tr>
                        <tr>
                          <td valign="top"><input name="total_price" type="text" class="txtfeild03" value="<?php if($this->propertylist->total_price) echo $this->propertylist->total_price; else echo '$'; ?>" onfocus="if(this.value=='$') this.value='';" onblur="(isNaN(parseInt(this.value))==true)? this.value=0 : this.value=parseInt(this.value);" /></td>
                          <td valign="top">Enter a 0 to omit total price. <br />
                            No $, commas or decimal.</td>
                        </tr>
                        <tr>
                          <td>Per Acre Price <span class="colororange">Required</span></td> <td></td>
                        </tr>
                        <tr>
                          <td><input name="per_acre_price" type="text" class="txtfeild03" value="<?php if($this->propertylist->per_acre_price) echo $this->propertylist->per_acre_price; else echo '$'; ?>"  onfocus="if(this.value=='$') this.value='';" onblur="(isNaN(parseInt(this.value))==true)? this.value=0 : this.value=parseInt(this.value);"/></td>
                          <td> Enter a 0 to omit per acre price.<br />
                            No $, commas or decimal.</td>
                        </tr>
                        <tr>
                          <td height="20" colspan="2"><hr size="1" color="#D6D6D6" /></td>
                        </tr>
                        <tr>
                          <td colspan="2"><h3>Acreage, Taxes &amp; Price</h3></td>
                        </tr>
                        <tr>
                          <td height="25" colspan="2" valign="top">Will Owner Subdivide? &nbsp; &nbsp; 
						   <input name="owner_subdivide" type="radio" value="1" <?php if((int)$this->propertylist->owner_subdivide==1) { echo 'checked'; } ?> />
                            Yes 
                            &nbsp; &nbsp; 
                            <input name="owner_subdivide" type="radio" value="2" <?php if((int)$this->propertylist->owner_subdivide==2) { echo 'checked'; } ?>/> 
                            No 
                            &nbsp; &nbsp;
							<input name="owner_subdivide" type="radio" value="0" <?php if((int)$this->propertylist->owner_subdivide==0) { echo 'checked'; } ?> /> 
                            Don't Show</td>
                        </tr>
                        <tr>
                          <td height="25" valign="middle"><input type="checkbox" name="txp_price_reduced" value="1" <?php if((int)$this->propertylist->txp_price_reduced==1) { echo 'checked'; } ?> />Price Reduced</td>
                          <td height="25" valign="middle"><input type="checkbox" name="txp_sealed_bid" value="1" <?php if((int)$this->propertylist->txp_sealed_bid==1) { echo 'checked'; } ?> />
                            Offered by Sealed Bid</td>
                        </tr>
                        <tr>
                          <td height="25" valign="middle"><input type="checkbox" name="txp_owner_financing" value="1" <?php if((int)$this->propertylist->txp_owner_financing==1) { echo 'checked'; } ?> />Owner Financing Available</td>
                          <td height="25" valign="middle"><input type="checkbox" name="txp_foreclosure" value="1" <?php if((int)$this->propertylist->txp_foreclosure==1) { echo 'checked'; } ?> />
                            Foreclosure</td>
                        </tr>
                        <tr>
                          <td height="25" valign="middle"><input type="checkbox" name="txp_shown_by_appointment" value="1" <?php if((int)$this->propertylist->txp_shown_by_appointment==1) { echo 'checked'; } ?> />Shown by Appointment Only</td>
                          <td height="25" valign="middle"><input type="checkbox" name="txp_owner_will_lease" value="1" <?php if((int)$this->propertylist->txp_owner_will_lease==1) { echo 'checked'; } ?> />
                            Owner Will Lease Land</td>
                        </tr>
                        <tr>
                          <td height="25" valign="middle"><input type="checkbox" name="txp_covenants_restrictions" value="1" <?php if((int)$this->propertylist->txp_covenants_restrictions==1) { echo 'checked'; } ?> />Covenants or Restrictions</td>
                          <td height="25" valign="middle"></td>
                        </tr>
                        <tr>
                          <td height="20" colspan="2"><hr size="1" color="#D6D6D6" /></td>
                        </tr>
                        <tr>
                          <td colspan="2" align="center">
						  <input name="Submit" type="submit" class="button05" value="Continue" />
						   <input name="Submit222" type="submit" class="button05" value="Cancel" />
							<input type="hidden" name="option" value="com_property" />
							<input type="hidden" name="task" value="save" />
							<input type="hidden" name="step" value="1" />
<input type="hidden" name="id" value="<?php echo (int)$this->id; ?>" />
							</td>
                          </tr>
                      </table>
                    </div>
					</form>
                  </div>
				  </td>
                </tr>
			</table>
			</td>
         </tr>
	</table>
<?php } elseif((int)$this->step==2) { ?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
			<tr>
              <td><h1>Add Your  <span class="colorgreen">Land</span></h1></td>
            </tr>
            <tr>
              <td>
			  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                
                <tr>
                  <td>
				  <div class="relative">
                    <div class="icondiv"><img src="images/clipboard-icon.gif" alt="Mail Icon" width="71" height="63" /></div>
                    <div><img src="images/spacer.gif" alt="Terraveno" width="1" height="17" /></div>
					<form name="userform" action="index.php" method="post" >
                    <div class="formbox">
                      <table width="100%" border="0" cellpadding="0" cellspacing="5">
                        <tr>
							<td><h1>Description &amp; <span class="colorgreen">Directions</span></h1></td>
						</tr>
               
                            <tr>
                              <td height="20" colspan="4"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                  <td><h3>Current Zoning</h3></td>
                                  <td> <h3>Terrain</h3></td>
                                  <td> <h3>Access</h3></td>
                                </tr>
                                <tr>
                                  <td><?php echo $this->lists['current_zoning']; ?></td>
                                  <td> <?php echo $this->lists['terrain']; ?> </td>
                                  <td><?php echo $this->lists['access']; ?></td>
                                </tr>
                                
                              </table></td>
                            </tr>
                            
                            <tr>
                              <td height="20" colspan="4"><hr size="1" color="#D6D6D6" /></td>
                            </tr>
                            <tr>
                              <td colspan="4"><h3>Land Use or Type</h3></td>
                            </tr>
                            
                            <tr>
                              <td width="50%" valign="top"><?php echo $this->lists['landuse1']; ?></td>
                              <td width="50%"><?php echo $this->lists['landuse2']; ?></td>
                              <td width="50%"><?php echo $this->lists['landuse3']; ?></td>
                              <td width="50%"><?php echo $this->lists['landuse4']; ?></td>
                            </tr>
                            <tr>
                              <td height="20" colspan="4"><hr size="1" color="#D6D6D6" /></td>
                            </tr>
                            
                            <tr>
                              <td colspan="4"><h3>Utilities &amp; Services</h3></td>
                            </tr>
                            <tr>
                              <td height="20" colspan="4"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                  <td width="18%" height="25"><input type="checkbox" name="uts_electricity" value="1" <?php if((int)$this->propertylist->uts_electricity==1) { echo 'checked'; } ?> />
                                    Electricity</td>
                                  <td width="26%"><input type="checkbox" name="uts_county_water" value="1" <?php if((int)$this->propertylist->uts_county_water==1) { echo 'checked'; } ?> />
                                    City/County Water</td>
                                  <td width="15%"><input type="checkbox" name="uts_sever" value="1" <?php if((int)$this->propertylist->uts_sever==1) { echo 'checked'; } ?> />
                                    Sewer</td>
                                  <td width="21%"><input type="checkbox" name="uts_natural_gas" value="1" <?php if((int)$this->propertylist->uts_natural_gas==1) { echo 'checked'; } ?> />
                                    Natural Gas</td>
                                  <td width="20%"><input type="checkbox" name="uts_cell_service" value="1" <?php if((int)$this->propertylist->uts_cell_service==1) { echo 'checked'; } ?> />
                                    Cell Service</td>
                                </tr>
                                <tr>
                                  <td height="25"><input type="checkbox" name="uts_telephone" value="1" <?php if((int)$this->propertylist->uts_telephone==1) { echo 'checked'; } ?> />
                                    Telephone</td>
                                  <td><input type="checkbox" name="uts_well_water" value="1" <?php if((int)$this->propertylist->uts_well_water==1) { echo 'checked'; } ?> />
                                    Well Water</td>
                                  <td><input type="checkbox" name="uts_septic" value="1" <?php if((int)$this->propertylist->uts_septic==1) { echo 'checked'; } ?> />
                                    Septic</td>
                                  <td><input type="checkbox" name="uts_cable_sat_tv" value="1" <?php if((int)$this->propertylist->uts_cable_sat_tv==1) { echo 'checked'; } ?> />
                                    Cable/Sat TV</td>
                                  <td><input type="checkbox" name="uts_broadband" value="1" <?php if((int)$this->propertylist->uts_broadband==1) { echo 'checked'; } ?> />
                                    Broadband</td>
                                </tr>
                              </table></td>
                            </tr>
                            <tr>
                              <td height="20" colspan="4"><hr size="1" color="#D6D6D6" /></td>
                            </tr>
                            <tr>
                              <td colspan="4"><h3>Land Features &amp; Description</h3></td>
                            </tr>
                            <tr>
                              <td colspan="4"><strong>PLEASE DO NOT USE ALL CAPS OR HTML</strong></td>
                            </tr>
                            <tr>
                              <td colspan="4"><textarea name="land_features" rows="4" class="txtfeild05"><?php echo $this->propertylist->land_features; ?></textarea></td>
                            </tr>
                            
                            <tr>
                              <td height="20" colspan="4"><hr size="1" color="#D6D6D6" /></td>
                            </tr>
                            <tr>
                              <td colspan="4"><h3>Location &amp; Directions (optional)</h3></td>
                            </tr>
                            <tr>
                              <td colspan="4"><strong>PLEASE DO NOT USE ALL CAPS OR HTML</strong></td>
                            </tr>
                            <tr>
                              <td colspan="4" valign="top"><textarea name="location_directions" rows="4" class="txtfeild05"><?php echo $this->propertylist->location_directions; ?></textarea>                              </td>
                            </tr>

                        <tr>
                          <td colspan="2" align="center">
						  <input name="Submit" type="submit" class="button05" value="Continue" />
						    <input name="Submit222" type="submit" class="button05" value="Cancel" />
							<input type="hidden" name="option" value="com_property" />
							<input type="hidden" name="task" value="save" />
							<input type="hidden" name="step" value="2" />
							<input type="hidden" name="id" value="<?php echo (int)$this->id; ?>" />
							</td>
                          </tr>
                      </table>
                    </div>
					</form>
                  </div>
				  </td>
                </tr>
			</table>
			</td>
         </tr>
	</table>


<?php } elseif((int)$this->step==3) { ?>


<script src="http://maps.google.com/maps?file=api&amp;v=2&amp;sensor=true&amp;key=ABQIAAAAZOCZ_maxjzjPJEsjNETKNBT2fBrfHQZF7MjeG9YlM965Uadv4RRibr5UVystswvtQBfRAgC2-5ruKg" type="text/javascript"></script>

<script type="text/javascript">
  
  window.onload=initialize;
  window.unload=GUnload;
  var geocoder;
  var map;
  var address = "<?php echo $this->propertylist->title; ?>, <?php echo $this->propertylist->city;?>";
  //var address2 = "821 Mohawk St, Columbus, OH 43206, USA";


  function initialize() {
  var map = new GMap2(document.getElementById("map"));
    map.addControl(new GSmallMapControl());
	map.addControl(new GMapTypeControl());


    map.setCenter(new GLatLng(<?php echo $this->propertylist->latitude;?>, <?php echo $this->propertylist->longitude;?>), 13);
	point = new GLatLng(<?php echo $this->propertylist->latitude;?>, <?php echo $this->propertylist->longitude;?>);

  // Create a marker
	marker = new GMarker(point);
	GEvent.addListener(marker, "click", function() {
	marker.openInfoWindowHtml(address);
	});
	// Add the marker to map
	map.addOverlay(marker);
    
	// Add address information to marker
	marker.openInfoWindowHtml(address);

  // Add 10 markers to the map at random locations
/*  var bounds = map.getBounds();
  var southWest = bounds.getSouthWest();
  var northEast = bounds.getNorthEast();
  var lngSpan = northEast.lng() - southWest.lng();
  var latSpan = northEast.lat() - southWest.lat();
  for (var i = 0; i < 10; i++) {
    var point = new GLatLng(southWest.lat() + latSpan * Math.random(),
        southWest.lng() + lngSpan * Math.random());
    map.addOverlay(new GMarker(point));
  }*/
}
  
</script>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
			<tr>
              <td><h1>Add Your  <span class="colorgreen">Land</span></h1></td>
            </tr>
            <tr>
              <td>
			  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                
                <tr>
                  <td>
				  <div class="relative">
                    <div class="icondiv"><img src="images/clipboard-icon.gif" alt="Mail Icon" width="71" height="63" /></div>
                    <div><img src="images/spacer.gif" alt="Terraveno" width="1" height="17" /></div>
					<form name="userform" action="index.php" method="post" >
                    <div class="formbox">
                      <table width="100%" border="0" cellpadding="0" cellspacing="5">
                        <tr>
							<td><h1>Location <span class="colorgreen">Map</span></h1></td>
						</tr>
                        <tr>
						  <td height="20" colspan="2"><div id="map" style="width: 532px; height: 317px;"></div></td>
						</tr>
						<tr>
						  <td height="20" colspan="2"><hr size="1" color="#D6D6D6" /></td>
						</tr>
						<tr>
						  <td width="50%" height="20"><strong>Longitude</strong></td>
						  <td width="50%" height="20"><strong> Latitude</strong></td>
						</tr>
						<tr>
						  <td height="20"><input name="longitude" type="text" class="txtfeild03" value="<?php echo $this->propertylist->longitude; ?>" /></td>
						  <td height="20"><input name="latitude" type="text" class="txtfeild03" value="<?php echo $this->propertylist->latitude; ?>" /></td>
						</tr>
						<tr>
						  <td height="30" colspan="2"><strong>Show a location, satellite, and terrain map on your listing?</strong>                              &nbsp; &nbsp; 
						  <input name="map_on_listing" type="radio" value="1" <?php if((int)$this->propertylist->map_on_listing==1) { echo 'checked'; } ?> />                              
						   Yes &nbsp; &nbsp; <input name="map_on_listing" type="radio" value="0" <?php if((int)$this->propertylist->map_on_listing==0) { echo 'checked'; } ?> />
						  No</td>
						</tr>
                        <tr>
                          <td colspan="2" align="center">
						  <input name="Submit" type="submit" class="button05" value="Continue" />
						      <input name="Submit222" type="submit" class="button05" value="Cancel" />
							<input type="hidden" name="option" value="com_property" />
							<input type="hidden" name="task" value="save" />
							<input type="hidden" name="step" value="3" />
							<input type="hidden" name="id" value="<?php echo (int)$this->id; ?>" />
							</td>
                          </tr>
                      </table>
                    </div>
					</form>
                  </div>
				  </td>
                </tr>
			</table>
			</td>
         </tr>
	</table>


<?php } elseif((int)$this->step==4) { ?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
			<tr>
              <td><h1>Add Your  <span class="colorgreen">Land</span></h1></td>
            </tr>
            <tr>
              <td>
			  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                
                <tr>
                  <td>
				  <div class="relative">
                    <div class="icondiv"><img src="images/clipboard-icon.gif" alt="Mail Icon" width="71" height="63" /></div>
                    <div><img src="images/spacer.gif" alt="Terraveno" width="1" height="17" /></div>
					<form name="userform" action="index.php" method="post" >
                    <div class="formbox">
                      <table width="100%" border="0" cellpadding="0" cellspacing="5">
                        <tr>
							<td><h1>Upload <span class="colorgreen">Video</span></h1></td>
						</tr>
                        <tr>
						  <td height="20"> Add a land tour video to your listing! Copy and paste your YourTube video URL link (not embed code) in the box below and click Save. You will need a <strong class="colororange">YouTube account</strong> to use this feature. <strong class="colororange">Terraveno</strong> only supports YouTube for video.</td>
						</tr>
						<tr>
						  <td height="20"><hr size="1" color="#D6D6D6" /></td>
						</tr>
						<tr>
						  <td width="50%" height="20"><strong>Copy and paste your YouTube video URL link here (not the embed code).</strong></td>
						</tr>
						<tr>
						  <td height="20"><input name="video_link" type="text" class="txtfeild05" value="<?php echo $this->propertylist->video_link; ?>" /></td>
						</tr>
						<tr>
						  <td height="20"><hr size="1" color="#D6D6D6" /></td>
						</tr>
						<tr>
						  <td>If you have a virtual tour with another provider other than YouTube, you may copy and paste a link to the video using the field below. A virtual tour link will be added to your listing.</td>
						</tr>
						<tr>
						  <td valign="bottom"><strong>Copy and paste the virtual tour link here.</strong></td>
						</tr>
						<tr>
						  <td><input name="virtual_tour_link" type="text" class="txtfeild05" value="<?php echo $this->propertylist->virtual_tour_link; ?>"  /></td>
						</tr>
                        <tr>
                          <td colspan="2" align="center">
						  <input name="Submit" type="submit" class="button05" value="Continue" />
						         <input name="Submit222" type="submit" class="button05" value="Cancel" />
							<input type="hidden" name="option" value="com_property" />
							<input type="hidden" name="task" value="save" />
							<input type="hidden" name="step" value="4" />
							<input type="hidden" name="id" value="<?php echo (int)$this->id; ?>" />
							</td>
                          </tr>
                      </table>
                    </div>
					</form>
                  </div>
				  </td>
                </tr>
			</table>
			</td>
         </tr>
	</table>

<?php }  ?>


