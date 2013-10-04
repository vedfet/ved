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
 
$editor =& JFactory::getEditor();
$row=$this->listsurvey;

?>
<div id="survey">
<form enctype="multipart/form-data" action="index.php" method="post" name="adminForm" >
<script language="javascript" type="text/javascript">

		function submitbutton(pressbutton) {
		      var form = document.adminForm;
			  if (pressbutton == 'cancel'){
					submitform( pressbutton );
					return ;
		       }
			   else 
			  {
				submitform( pressbutton );
		       }
		}
		

</script>
	<?php 	$uri =& JURI::getInstance();
			$uri->root(); //root url
			$uri->base(); //		base url
			$uri->current(); //current url pathj
	?>
		 <link rel="stylesheet" type="text/css" media="all" href="<?php echo $uri->root();?>/administrator/components/<?php echo $option;?>/jscalendar/calendar-win2k-cold-1.css">
		<script type="text/javascript" src="<?php echo $uri->root();?>/administrator/components/<?php echo $option;?>/jscalendar/calendar.js"></script>
		<script type="text/javascript" src="<?php echo $uri->root();?>/administrator/components/<?php echo $option;?>/jscalendar/lang/calendar-en.js"></script>
		<script type="text/javascript" src="<?php echo $uri->root();?>/administrator/components/<?php echo $option;?>/jscalendar/calendar-setup.js"></script>
        <div class="adminform" align="left">
       	<div style="margin-bottom:20px;">
		
		<fieldset class="adminform">
		<legend><?php echo JText::_( 'SURVEY_DETAILS' ); ?></legend>
	    <table cellpadding="4" cellspacing="0" border="0" >
	
        <table class="admintable">
    	<tbody>			

              <tr>
				  <td align="right" class = "key"> <?php echo JText::_('SURVEY_NAME');?>:</td>
				  <td ><?php echo $row->survey_name; ?></td>
		     </tr>
			 
			 
            <tr>
              <td align="right" class = "key"><?php echo JText::_('FATHERS_NAME');?>:</td>
              <td ><?php echo $row->father_name;?></td>
            </tr>
			
			
            <tr>
              <td width="24%" align="right" class = "key"> <?php echo JText::_('MOTHERS_NAME');?>:</td>
              <td ><?php echo $row->mother_name;?></td>
            </tr>

            <tr>
              <td align="right" class = "key"><?php echo JText::_('CITY');?>:</td>
              <td ><?php echo $row->city;?></td>
            </tr>
			
			
            <tr>
              <td align="right" class = "key"><?php echo JText::_('STATE');?>:</td>
              <td ><?php echo $row->state ?></td>
            </tr>
           
		    <tr>
              <td align="right" class = "key"><?php echo JText::_('BIRTH_DATE');?>:</td>
              <td ><?php echo $row->birth_date; ?></td>
            </tr>
			 
			<tr>
              <td align="right" class = "key"><?php echo JText::_('BIRTH_TIME');?>:</td>
              <td ><?php echo $row->birth_time?>&nbsp;<?php echo ($row->time_unit == 1) ? 'AM' : 'PM'; ?></td>
            </tr>
			
            <tr>
              <td align="right" class = "key"><?php echo JText::_('SEX');?>:</td>
              <td ><?php echo ($row->sex == 1) ? 'MALE' : 'FEMALE'; ?></td>
            </tr>
            
			<tr>
              <td align="right" class = "key"><?php echo JText::_('WEIGHT');?>:</td>
              <td colspan="2"><?php echo $row->weight; ?>&nbsp;<?php echo ($row->weight_unit == 1) ? 'Pound' : 'Gm'; ?></td>
            </tr>
			
            <tr>
              <td align="right" class = "key"><?php echo JText::_('LENGTH');?>:</td>
              <td ><?php echo $row->length;?>&nbsp;&nbsp;&nbsp;<?php echo ($row->length_unit == 1) ? 'Inch' : 'Cm'; ?></td>
            </tr>
			
            <tr>
              <td align="right" class = "key"><?php echo JText::_('WELCOME_MESSAGE');?>:</td>
              <td ><?php echo $row->welcome_message; ?>  </td>
            </tr>

            <tr>
              <td valign="top" align="right" class = "key"><?php echo JText::_('IMAGE');?>: </td>
              <td ><img src="<?php echo "../components/".SURVEY_COM_COMPONENT."/images/".$row->file_name3;?>" width="105" height="78" align="left" /></td>
           </tr>
		   
		    <tr>
              <td valign="top" align="right" class = "key"><?php echo JText::_('IMAGE');?>: </td>
              <td ><img src="<?php echo "../components/".SURVEY_COM_COMPONENT."/images/".$row->file_name2;?>" width="105" height="78" align="left" /></td>
           </tr>
           <tr>
              <td valign="top" align="right" class = "key"><?php echo JText::_('IMAGE');?>: </td>
              <td ><img src="<?php echo "../components/".SURVEY_COM_COMPONENT."/images/".$row->file_name1;?>" width="105" height="78" align="left" /></td>
           </tr>
           <tr>
              <td valign="top" align="right" class = "key"> <?php echo JText::_('PUBLISHED');?>:  </td>
              <td>
				<?php echo ($row->published == 1) ? 'Yes' : 'No'; ?>
			 </td>
            </tr>
    </tbody>      
</table>
    <input type="hidden" name="boxchecked" value="0" />
    <input type="hidden" name="task" value="survey.list&archive=-1" />
	<input type="hidden" name="id" value="<?php echo (int)$row->id; ?>" />
	<input type="hidden" name="act" value="<?php echo $this->listsurvey->cssclass; ?>" />
    <input type="hidden" name="option" value="<?php echo SURVEY_COM_COMPONENT;?>" />
	<input type="hidden" name="archive" value="<?php echo $_REQUEST['archive']; ?>" />
</form>

</div>
