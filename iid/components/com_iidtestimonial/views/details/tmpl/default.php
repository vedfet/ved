<?php
/**
 * Joomla! 1.5 component Iidtestimonial_list
 *
 * @version $Id: controller.php 2010-03-14 01:52:14 svn $
 * @author Vinod Dubey
 * @package Joomla
 * @subpackage Iidtestimonial_list
 * @license GNU/GPL
 *
 * Display and manage Iidtestimonial_list and related items 
 *
 * This component file was created using the Joomla Component Creator by Not Web Design
 * http://www.notwebdesign.com/joomla_component_creator/
 *
 */

// no direct access
 defined('_JEXEC') or die('Restricted access'); ?>

   <?php if ( $this->params->def( 'show_page_title', 1 ) ) : ?>
  
   <div class="componentheading"><?php echo $this->escape($this->params->get('page_title')); ?></div>
   
   <?php endif; ?>
   <?php if($this->total >0)
   {
   ?>
     <table width="100%" border="0" cellspacing="2" cellpadding="6" align="left" class="contentpane">
    	<?php if((int)$this->total >0){ ?>
			
		 <?php $count=1;
		  foreach($this->iidtestimonial_listlist as $iidtestimonial_listrow) {
		  	$link 	= 'index.php?option='.$option.'&task=view&view=detailstestimonial&hidemainmenu=1&id='.$iidtestimonial_listrow->id;
			
		  
		   ?>
		<tr>
		<td valign="top">
		
		<?php if($iidtestimonial_listrow->videourl) {?>
		<div style="background-image:url(images/iid_images/thumbanail_video.png);width:132px;height:72px;">
			<a href="<?php echo $iidtestimonial_listrow->videourl;?>" rel="shadowbox;width=840;height=450">
				<img src="images/iid_images/video/images/thumbnail_video_top.png" border="0">
			</a>
		</div>
		<?php }?>
	</td>
						
		<td>
			<?php echo $iidtestimonial_listrow->testimonial_story;  ?> <br/>
		</td>
		</tr>
		<tr>
		<td colspan="2"><a href="index.php?option=com_iidtestimonial&view=list&Itemid=30">Back</a></td>
		</tr>
		<?php $count++; } 
		
		}
		?>
		<tr>
			<td>			   
				<table class="contentpaneopen" width="100%" align="center" background="" border="0"> 
					<tr>
			             <td valign="top" align="center" style="color:#00749a;">
			                   <?php echo $this->pagination->getPagesLinks(); ?>
			            </td>
			        </tr>
					<tr>
			             <td valign="top" align="center" style="color:#00749a;">
			                       <?php echo $this->pagination->getPagesCounter(); ?>
			             </td>
					</tr>
				</table>
			</td>
		</tr>
</table>
<?php 
 } 
 else
 {
 ?>
 
 <table width="100%" border="0" cellspacing="2" cellpadding="3" align="center" class="contentpane">
  			
			
			<tr>
				<td colspan='7' align="center"><?php echo "No Data Available"; ?></td>
			</tr>	


</table>
<?php 
 }
 ?>
 