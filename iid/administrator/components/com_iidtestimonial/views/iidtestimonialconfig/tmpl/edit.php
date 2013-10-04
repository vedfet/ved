<?php 
/**
 * Joomla! 1.5 component iidtestimonial
 *
 * @version $Id: iidtestimonial.php 2010-06-03 01:08:55 svn $
 * @author Vinod Dubey
 * @package Joomla
 * @subpackage iidtestimonial
 * @license GNU/GPL
 *
 * It creates component for iidtestimonial
 *
 */


// no direct access
defined('_JEXEC') or die('Restricted access');
 
//$cfg = & JDONATIONConfig::getInstance();

$editor =& JFactory::getEditor();
$row[0]=$this->iidtestimonialconfiglist;
$row=$row[0];



?>
	<form enctype="multipart/form-data" action="index.php" method="post" name="adminForm" >
	<script language="javascript" type="text/javascript">
	 function hideMailBoxx()
		 {
		 document.getElementById('emailbox').style.display='';
		 document.getElementById('emailbox1').style.display='';
		 }
	function hideMailBox()
 		{
 			document.getElementById('emailbox').style.display='none';
 			document.getElementById('emailbox1').style.display='none';
 		}
	</script>
	    <fieldset class="adminform">
		<legend><?php echo JText::_( 'IIDTESTIMONIAL_CONFIGURATION' ); ?></legend>
	    <table cellpadding="5" cellspacing="0" border="0" >
        <table class="admintable">
    	<tbody>			

             <!--  <tr>
			 <td>
			 <?php echo "E-mail Required";?> 
			 </td>
			 <td> 
        <input type="radio" name="email_needed" value="0" <?php if($row->email_needed ==0) echo "checked";?> onclick="hideMailBoxx()"/><?php echo  "Yes";?>
       
        <input type="radio" name="email_needed" value="1" <?php if($row->email_needed ==1) echo "checked";?> onclick="hideMailBox()"/><?php echo  "No";?> 
     		 </td>
			 </tr>
			  <tr>
				<td>
				<?php echo "No of photo upload ";?> 
				<td>
				<?php echo $this->lists['no_of_default_iidtestimonials'];?>
				</td>
			 </tr>
			  <tr>
				<td>
				<?php echo "Order By ";?> 
				<td>
				<?php echo $this->lists1['order_by'];?>
				</td>
			 </tr> -->
				<tr>
				<td >
				<?php echo JText::_( 'HEADER_TEXT' ); ?>
				</td>
				<td>
				<?php
							// parameters : areaname, content, width, height, cols, rows, show xtd buttons
							echo $editor->display( 'header_text',  htmlspecialchars($row->header_text, ENT_QUOTES), '450', '100', '60', '20', array('pagebreak', 'readmore') ) ;
							
							?>
				</td>
				</tr>
				<tr>
				<td>
				<?php echo JText::_( 'FOOTER_TEXT' ); ?>
				</td>
				<td>
				<?php
							// parameters : areaname, content, width, height, cols, rows, show xtd buttons
							echo $editor->display( 'footer_text',  htmlspecialchars($row->footer_text, ENT_QUOTES), '450', '100', '60', '20', array('pagebreak', 'readmore') ) ;
							?>
				</td>
				</tr>

				<tr id="emailbox">
					<td>Notification E-mail Id
				</td>
				<td>
					<input type="text" name="from_email" size="30" value="<?php echo $row->from_email;?>" />
				</td>
				</tr>
				<tr id="emailbox1">
						<td>Notification Name For the Mail
				</td>
				<td>
						<input type="text" size="30" name="from_name" value="<?php echo $row->from_name;?>" />
				</td>
				</tr>
				<tr id="emailbox1">
						<td>Notification Text
				</td>
				<td>
						<?php
							// parameters : areaname, content, width, height, cols, rows, show xtd buttons
							echo $editor->display( 'notification_text',  htmlspecialchars($row->notification_text, ENT_QUOTES), '450', '100', '60', '20', array('pagebreak', 'readmore')) ;
							?>
				</td>
				</tr>

			
	</table>
	</fieldset>
<input type="hidden" name="boxchecked" value="0" />
    <input type="hidden" name="task" value="iidtestimonialconfig.save" />
	<input type="hidden" name="id" value="<?php echo (int)$row->id; ?>" />
    <input type="hidden" name="option" value="<?php echo IIDTESTIMONIAL_COM_COMPONENT;?>" />
</form>
			