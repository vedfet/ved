<?php 
/**
 * Joomla! 1.5 component iidtestimonial
 *
 * @version $Id: edit.php 2010-06-03 01:08:55 svn $
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
JHTML::_('behavior.calendar');
$editor =& JFactory::getEditor();
$row=$this->listiidtestimonial;
$rows=$this->listiidtestimonialconfig;
$uri =& JURI::getInstance();
$url=$uri->root(); //root url

$dir=trim($url,"administrator");
$iidtestimonial_path=$dir.$this->file_path.'/iidtestimonial';
?>


<div id="iidtestimonial">



<script language="javascript" type="text/javascript">
	
		function submitbutton(pressbutton) {
			var form = document.adminForm;
			
			// do field validation
			if ((pressbutton == 'cancel') || (pressbutton == 'iidtestimonial.list')) 
			{
				submitform( pressbutton );
				return;
			}
			if (form.firstname.value =='')
			{
				alert( "Enter first name" );
				form.firstname.focus();
				return;
			}
			if (form.lastname.value =='') 
			{
				alert( "Enter a lastname" );
				form.lastname.focus();
				return;
			}
	
////////////////// email validation start /////////////////////////			
			
			if(form.email.value==""){
			
					alert("Please Enter Email Id");
					form.email.focus();
					return;
				}
             if(form.email.value!=""){
			
					var emailPattern = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
					var emailTest = emailPattern.test(form.email.value);
					if(!emailTest){
					
						alert("Please Enter Valid Email Id");
						form.email.focus();
						return;
					}
				}  
////////////////// email validation end /////////////////////////			

////////////////// phone validation start /////////////////////////

			var telcheck = /^\(?(\d{3})\)?[- ]?(\d{3})[- ]?(\d{4})$/;	
			
			if (form.phone.value == ""){
				alert( "<?php echo JText::_( 'Please enter Phone Number', true ); ?>");
				return;
				}
			if(!form.phone.value.match(telcheck)){ 
				alert( "<?php echo JText::_( 'Please enter Phone Number in proper format "(111)-111-1111".', true ); ?>");	
				return;
				}
			
/////////////// phone validation end ////////////////////////////

			if (form.city.value =='') 
			{
				alert( "Enter city name" );
				form.city.focus();
				return;
			}
			if (form.videourl.value =='') 
			{
				alert( "Enter video URL" );
				form.videourl.focus();
				return;
			}
			else 
			{
				submitform( pressbutton );
		    }
		
		}

		</script>
		<?php 	
		?>
<form enctype="multipart/form-data" action="index.php" method="post" name="adminForm" >		
  <div class="adminform" align="left">
       	<div style="margin-bottom:20px;">
		
		<fieldset class="adminform">
		<legend><?php echo JText::_( 'IIDTESTIMONIAL_DETAILS' ); ?></legend>
	    <table cellpadding="5" cellspacing="0" border="0" >
        <table class="admintable">
    	<tbody>			
            <tr>
              <td align="right" class = "key"><?php echo JText::_('FIRST_NAME');?>:</td>
              <td colspan="2"><input class="text_area" type="text" name="firstname" size="50" maxlength="250" value="<?php echo $row->firstname;?>" /></td>
            </tr>
			 <tr>
              <td align="right" class = "key"><?php echo JText::_('LAST_NAME');?>:</td>
              <td colspan="2"><input class="text_area" type="text" name="lastname" size="50" maxlength="250" value="<?php echo $row->lastname;?>" /></td>
            </tr>
			 <tr>
              <td align="right" class = "key"><?php echo JText::_('EMAIL');?>:</td>
              <td colspan="2"><input class="text_area" type="text" name="email" size="50" maxlength="250" value="<?php echo $row->email;?>" /></td>
            </tr>
           <tr>
              <td align="right" class = "key"><?php echo JText::_('PHONE');?>:</td>
              <td colspan="2"><input class="text_area" type="text" name="phone" size="50" maxlength="250" value="<?php echo $row->phone;?>" />Ex: (111)111-1111</td>
            </tr>
			
			 <tr>
              <td align="right" class = "key"><?php echo JText::_('CITY');?>:</td>
              <td colspan="2"><input class="text_area" type="text" name="city" size="50" maxlength="250" value="<?php echo $row->city;?>" />
			  
			  
			  </td>
            </tr>
            
			
			<tr>
              <td align="right" class = "key"><?php echo JText::_('TESTIMONIAL_STORY');?>:</td>
              <td colspan="2"><?php
                    // parameters : areaname, content, hidden field, width, height, rows, cols
                    echo $editor->display( 'testimonial_story',  htmlspecialchars( $row->testimonial_story, ENT_QUOTES, 'UTF-8'), "100%", 250, '70', '10', $row->testimonial_story) ;
                    ?>
              </td>
            </tr>
			 
			 <tr>
              <td align="right" class = "key"><?php echo JText::_('VIDEOURL');?>:</td>
              <td colspan="2"><input class="text_area" type="text" name="videourl" size="50" maxlength="250" value="<?php echo $row->videourl;?>" /></td>
            </tr>

			<tr>
              <td valign="top" align="right" class = "key"> <?php echo JText::_('FRONT_PUBLISHED');?>:  </td>
              <td>
					<?php echo JHTML::_('select.booleanlist',  'front_page_publish', 'class="inputbox"', $row->front_page_publish );?>
			 </td>
            </tr>
             <tr>
              <td valign="top" align="right" class = "key"> <?php echo JText::_('PUBLISHED');?>:  </td>
              <td>
					<?php echo JHTML::_('select.booleanlist',  'published', 'class="inputbox"', $row->published );?>
			 </td>
            </tr>
             
    </tbody>      
</table>
    <input type="hidden" name="boxchecked" value="0" />
    <input type="hidden" name="task" value="iidtestimonial.save" />
	<input type="hidden" name="id" value="<?php echo (int)$row->id; ?>" />
    <input type="hidden" name="act" value="<?php echo $this->listiidtestimonial->cssclass; ?>" />
    <input type="hidden" name="option" value="<?php echo IIDTESTIMONIAL_COM_COMPONENT;?>" />
</form>

</div>
