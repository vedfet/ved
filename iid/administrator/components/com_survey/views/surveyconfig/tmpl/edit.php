<?php 
/**
 * Joomla! 1.5 component survey
 *
 * @version $Id: survey.php 2010-06-03 01:08:55 svn $
 * @author Kailash Pathak
 * @package Joomla
 * @subpackage survey
 * @license GNU/GPL
 *
 * It creates component for survey
 *
 */


// no direct access
defined('_JEXEC') or die('Restricted access');
 
//$cfg = & JDONATIONConfig::getInstance();

$editor =& JFactory::getEditor();
$row[0]=$this->surveyconfiglist;
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
		<legend><?php echo JText::_( 'SURVEY_CONFIGURATION' ); ?></legend>
	    <table cellpadding="5" cellspacing="0" border="0" >
        <table class="admintable">
    	<tbody>			

              <!-- <tr>
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
				<?php echo $this->lists['no_of_default_surveys'];?>
				</td>
			 </tr>
			  <tr>
				<td>
				<?php echo "Order By ";?> 
				<td>
				<?php echo $this->lists1['order_by'];?>
				</td>
			 </tr> -->
				<tr id="emailbox">
				<td >
				<?php echo "Notification E-mail Id";?> 
				</td>
				<td>
				<input type="text" name="email" size="50" value="<?php echo $row->email;?>" />
				</td>
				</tr>
				<tr id="emailbox1">
				<td>
				<?php echo "Thanks Message";?> 
				</td>
				<td>
				<textarea rows="2" cols="28" name="thankmessage"><?php echo $row->thankmessage;?></textarea>
				
				
				</td>
				</tr>
			
	</table>
	</fieldset>
<input type="hidden" name="boxchecked" value="0" />
    <input type="hidden" name="task" value="surveyconfig.save" />
	<input type="hidden" name="id" value="<?php echo (int)$row->id; ?>" />
    <input type="hidden" name="option" value="<?php echo SURVEY_COM_COMPONENT;?>" />
</form>
			