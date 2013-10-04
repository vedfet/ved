<?php
/**
 * Joomla! 1.5 component Video
 *
 * @version $Id: controller.php 2010-03-14 01:52:14 svn $
 * @author Vinod Dubey
 * @package Joomla
 * @subpackage Video
 * @license GNU/GPL
 *
 * Display and manage Video and related items 
 *
 * This component file was created using the Joomla Component Creator by Not Web Design
 * http://www.notwebdesign.com/joomla_component_creator/
 *
 */

// no direct access
 defined('_JEXEC') or die('Restricted access'); ?>

   <?php if ( $this->params->def( 'show_page_title', 1 ) ) : ?>
   <div class="componentheading<?php echo $this->escape($this->params->get('pageclass_sfx')); ?>">
    <?php echo $this->escape($this->params->get('page_title')); ?>
   </div>
   <?php endif; ?>
   <?php if($this->total >0)
   {
   ?>
     <table width="700" border="0" cellspacing="2" cellpadding="6" align="center" class="contentpane">
    	<?php if((int)$this->total >0){ ?>
			<tr style="background-color:#EEEEEE; color:#000000;">
			<th class="title" width="60">
			<?php echo JText::_( 'VIDEO_TITLE' ); ?></th>			  
		</tr>
		 <?php $count=1; foreach($this->videolist as $videorow) { ?>
		<tr >
						
		<td width="60"><a href="index.php?option=com_video&view=video_details&id=<?php echo $videorow->id;?>" title="video_title"><?php echo $videorow->video_title;?></a></td>
				
			</tr>
			  <?php $count++; } 
					  
					  }
					   ?>
					   
			<table class="contentpaneopen" width="100%" align="center" background=""> 
			<tr>
			             <td valign="top" align="center" style="color:#0000FF;">
			                   <?php echo $this->pagination->getPagesLinks(); ?>
			            </td>
			        </tr>
			 <tr>
			              <td valign="top" align="center" style="color:#0000FF;">
			                       <?php echo $this->pagination->getPagesCounter(); ?>
			              </td>
			 </tr>
			</table>
			                    
</table>
		</td>
	</tr>
</table>
<?php 
 } 
 else
 {
 ?>
 
 <table width="700" border="0" cellspacing="2" cellpadding="6" align="center" class="contentpane">
  			<tr style="background-color:#EEEEEE; color:#000000;">
			<th width="20">
	<?php echo JText::_( 'VIDEO_NAME' ); ?></th>
			<th class="title" width="60">
	<?php echo JText::_( 'FATHERS_NAME' ); ?></th>
			<th class="title" width="60">
	<?php echo JText::_( 'MOTHERS_NAME' ); ?></th>
			<th class="title" width="60">
	<?php echo JText::_( 'BIRTH_DATE' ); ?></th>
			  <th nowrap="nowrap" width="60">
	<?php echo JText::_( 'BIRTH_TIME' ); ?></th>
	<tr ><td colspan=2><b><?php echo JText::_( 'GREET_MSG' ); ?>
</b></td></tr>	
</table>
<?php 
 }
 ?>
 