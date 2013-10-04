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
 
$editor =& JFactory::getEditor();
$row=$this->listiidtestimonial;

?>
<div id="video">
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
		
       <div class="adminform" align="left">
       	<div style="margin-bottom:20px;">
		
		<fieldset class="adminform">
		<legend><?php echo JText::_( 'IIDTESTIMONIAL_DETAILS' ); ?></legend>
	    <table cellpadding="4" cellspacing="0" border="0" >
	
        <table class="admintable">
    	<tbody>			

              <tr>
				  <td align="right" class = "key"> <?php echo JText::_('FIRST_NAME');?>:</td>
				  <td ><?php echo $row->firstname; ?></td>
		     </tr>
			 
			 
            <tr>
              <td align="right" class = "key"><?php echo JText::_('LAST_NAME');?>:</td>
              <td ><?php echo $row->lastname;?></td>
            </tr>
			
			
            <tr>
              <td width="24%" align="right" class = "key"> <?php echo JText::_('EMAIL');?>:</td>
              <td ><?php echo $row->email;?></td>
            </tr>

            <tr>
              <td align="right" class = "key"><?php echo JText::_('PHONE');?>:</td>
              <td ><?php echo $row->phone;?></td>
            </tr>
			
			
            <tr>
              <td align="right" class = "key"><?php echo JText::_('CITY');?>:</td>
              <td ><?php echo $row->city ?></td>
            </tr>

			  <tr>
              <td align="right" class = "key"><?php echo JText::_('TESTIMONIAL_STORY');?>:</td>
              <td ><?php echo $row->testimonial_story ?></td>
            </tr>

			  <tr>
              <td align="right" class = "key"><?php echo JText::_('VIDEOURL');?>:</td>
              <td ><?php echo $row->videourl ?></td>
            </tr>
           
		    <tr>
              <td align="right" class = "key"><?php echo JText::_('FRONT_PUBLISHED');?>:</td>
              <td ><?php echo ($row->front_page_publish == 1) ? 'Yes' : 'No'; ?></td>
            </tr>
			 
			<tr>
              <td align="right" class = "key"><?php echo JText::_('PUBLISHED');?>:</td>
              <td ><?php echo ($row->published == 1) ? 'Yes' : 'No'; ?></td>
            </tr>
           
    </tbody>      
</table>
    <input type="hidden" name="boxchecked" value="0" />
    <input type="hidden" name="task" value="iidtestimonial.list&archive=-1" />
	<input type="hidden" name="id" value="<?php echo (int)$row->id; ?>" />
	<input type="hidden" name="act" value="<?php echo $this->listiidtestimonial->cssclass; ?>" />
    <input type="hidden" name="option" value="<?php echo IIDTESTIMONIAL_COM_COMPONENT;?>" />
	<input type="hidden" name="archive" value="<?php echo $_REQUEST['archive']; ?>" />
</form>

</div>
