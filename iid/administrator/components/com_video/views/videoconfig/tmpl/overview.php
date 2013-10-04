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
$ordering = ($this->lists['order'] == 'a.ordering');
JHTML::_('behavior.tooltip');
$pathIMG = JURI::root().'/administrator/images/';

?>
        <div class="adminform" align="left">
       	<div style="margin-bottom:20px;">
		<fieldset class="adminform">
		<legend><?php echo JText::_( 'VIDEO_CONFIGURATION' ); ?></legend>
	    <table cellpadding="5" cellspacing="0" border="0" >
<form action="index.php" method="post" name="adminForm" id="adminForm">
<table class="adminlist">
	
	            <tr>
			 		<td>
						 <?php echo "E-mail Required";?> <?php $tip='E-mail to be sent to the parents'; 
						  echo mosToolTip($tip);?>
			 		</td>
			 		<td> 
        <input type="radio" name="email_needed" value="0" <?php if($row->email_needed ==0) echo "checked";?> onclick="hideMailBoxx()"/><?php echo  "Yes";?>
       
        <input type="radio" name="email_needed" value="1" <?php if($row->email_needed ==1) echo "checked";?> onclick="hideMailBox()"/><?php echo  "No";?> 
     				 </td>
			 </tr>
			  <tr>
      <td> <?php  echo "Time Format";  ?>
           <?php $tip='Time Format -Birth Time Format to be shown '; 
					echo mosToolTip($tip);?>
      </td>
      <td colspan="2"> 
        <input type="radio" name="time_format" value="0" <?php if($row->time_format ==0) echo "checked";?> /><?php echo "24 -Hour format"; ?>
        
        <input type="radio" name="time_format" value="1" <?php if($row->time_format ==1) echo "checked";?> /><?php echo "12-Hour format"; ?>
      </td>
    </tr>
				
				
				<tr>
				<td>
				<?php echo "No of photo upload ";?> <?php $tip='Photos of Baby to be uploaded '; 
					echo mosToolTip($tip);?>
				</td>
				<td>
				<?php echo $lists['no_of_default_videos'];?>
				</td>
				</tr>
				
				<tr>
				<td>
				<?php echo "Show records by";?> <?php $tip='Order of Contents You want to see'; 
					echo mosToolTip($tip);?>
				</td>
				<td>
				<?php echo $lists['order_of_records'];?>
				</td>
				</tr>
				
				<tr id="emailbox">
				<td >
				
				<?php echo "Your E-mail Id";?> <?php $tip='Your E-mail id you \n want to  use for sending E-mail'; 
					echo mosToolTip($tip);?>
				</td>
				<td>
				<input type="text" name="from_email" size="50" value="<?php echo $row->from_email;?>" />
				</td>
				</tr>
				<tr id="emailbox1">
				<td>
				<?php echo "Your Name For the Mail";?> <?php $tip='Name you want to use in Mail'; 
					echo mosToolTip($tip);?>
				</td>
				<td>
				<input type="text" size="50" name="from_name" value="<?php echo $row->from_name;?>" />
				</td>
				</tr>
			 			  

</table>


<input type="hidden" name="boxchecked" value="0" />
<input type="hidden" name="task" value="videoconfig.edit" />
<input type="hidden" name="act" value="" />
<input type="hidden" name="option" value="com_video" />
</form>
</fieldset>	  
</div>
</div>      