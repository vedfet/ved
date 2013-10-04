<?php defined('_JEXEC') or die('Restricted access'); 

$live_site=JURI::base();
?>
<script src="components/<?php echo $option;?>/js/phone_format.js" type="text/javascript"></script>
 <?php  if ( $this->params->def( 'show_page_title', 1 ) ) : ?>
   <div class="componentheading<?php echo $this->escape($this->params->get('pageclass_sfx')); ?>">
    <?php echo 'Share your story'; //$this->escape($this->params->get('page_title')); ?>
   </div>
 <?php endif; ?>

	<form method="post" action="<?php echo JRoute::_( 'index.php?option=com_iidtestimonial&view=iidtestimonial' );?>" onsubmit="return validate();" name="myform">

		<table border="0" cellspacing="5" cellpadding="5" width="100%">
	
		<tr>
			<td colspan="2"><?php echo $this->result[0]->header_text; ?></td>
		</tr>
		<!--<tr><td colspan="2"><span style="font-weight:bold;"> Share your story</span></td></tr>-->
		
		<tr>
			<td>First Name <span style="color:#FF0000;">*</span></td>
			<td><input type="text" name="firstname" size="21" value="<?php echo $_SESSION['post_back']['firstname'] ?>"></td>
		</tr>
		<tr>
			<td>Last Name</td>
			<td><input type="text" name="lastname" size="21" value="<?php echo $_SESSION['post_back']['lastname'] ?>"></td>
		</tr>
		<tr>
			<td>E-mail</td>
			<td><input type="text" name="email" size="21" value="<?php echo $_SESSION['post_back']['email'] ?>"></td>
		</tr>
		<tr>
			<td>Phone</td>
			<td><input type="text" name="phone" size="21" onkeyup="javascript:backspacerUP(this,event);" onkeydown="javascript:backspacerDOWN(this,event);" value="<?php echo $_SESSION['post_back']['phone'] ?>">&nbsp;Ex:(111)111-1111</td>
		</tr>
		<tr>
			<td>City <span style="color:#FF0000;">*</span></td>
			<td><input type="text" name="city" size="21" value="<?php echo $_SESSION['post_back']['city'] ?>"></td>
		</tr>
		<tr>
			<td>Testimonial Story <span style="color:#FF0000;">*</span></td>
			<td>
				<textarea rows="6" cols="32" name="testimonial_story"><?php echo $_SESSION['post_back']['testimonial_story']; ?></textarea>
			
		</tr>
		<tr>
			<td>You Tube Video Link</td>
			<td><input type="text" name="videourl" size="21" value="<?php echo $_SESSION['post_back']['videourl'] ?>"></td>
		</tr>
		<!-- captcha code start -->
					<tr>
						
						<td><?php echo JText::_('VERIFICATION_CODE');?>:</td>
						<td><?php if(JRequest::getVar('r')=='err'){ echo "<font color='#FF3300'>You Enter wrong code</font>";} else {"";}?></td>
					</tr>
						<td colspan="2"><em><?php echo JText::_('TYPE_IN_NUMBER_LETTER');?></em></td>
					</tr>
					<tr>
						<td colspan="2">
							<div>
								<input type="text" name="captcha_value" id="captcha_value" maxlength="8" class="inputbox" maxlength="5" value="" onfocus="document.getElementById('captchaerrorid').innerHTML='';" />
								<input type="hidden" name="captcha_hash" value="<?php echo $this->captcha_hash;?>">
								
		<img src="<?php  echo $live_site . "index.php?option=".$option."&task=generate_captcha_image&captcha_hash=".$this->captcha_hash;?>" width="140" height="40" />

							</div>
							<div id="captchaerrorid"></div>	
						</td>
						
					</tr>
					<!-- captcha code end -->
		
		<tr>
			<td colspan="2"><span style="color:#FF0000;">*</span><span style="font-style:italic">Fields are required for submission.</span></td>
		</tr>
		<tr>
			<td colspan="2"><?php echo $this->result[0]->footer_text; ?></td>
		</tr>
		
		<tr>
			<td>
				<input type="submit" value="Submit" name="submit">
				<!-- <input type="hidden" name="option" value="com_iidtestimonial"> -->
				<input type="hidden" name="task" value="savetestimonial">
			
			</td>
			<td>&nbsp;</td>
		</tr>

		
	</table>
<?php echo JHTML::_( 'form.token' ); ?>
</form>

<script language="JavaScript" type="text/javascript">

 
  function validate()
	{
			
			if(document.myform.firstname.value==""){
				alert("<?php echo JText::_('JAVASCRIPT_FIRST_NAME'); ?>");
				document.myform.firstname.focus();
				return false;
			}
			
///// email validation start ////////////			
			
			
             if(document.myform.email.value!=""){
			
					var emailPattern = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
					var emailTest = emailPattern.test(document.myform.email.value);
					if(!emailTest){
					
						alert("Please Enter Valid email Id");
						document.myform.email.focus();
						return false;
					}
				}  
///// email validation end /////////////				
		
	
			if(document.myform.city.value==""){
				alert("<?php echo JText::_('JAVASCRIPT_CITY'); ?>");
				document.myform.city.focus();
				return false;
			}
			if(document.myform.testimonial_story.value==""){
				alert("<?php echo JText::_('JAVASCRIPT_TESTIMONIAL_STORY'); ?>");
				document.myform.testimonial_story.focus();
				return false;
			}
			if(document.myform.captcha_value.value==""){
				alert("<?php echo JText::_('JAVASCRIPT_CAPTCHA'); ?>");
				document.myform.captcha_value.focus();
				return false;
			}
	

		else{
				return true;
			}
	
	}

  /////////// phone validation start /////////////

  function validphone()
  {
	
			var telcheck = /^\(?(\d{3})\)?[- ]?(\d{3})[- ]?(\d{4})$/;	
			
			if (document.myform.phone.value == ""){
			alert( "<?php echo JText::_( 'Please enter phone Number', true ); ?>");
			return false;
		}
		if(!document.myform.phone.value.match(telcheck)){ 
			alert( "<?php echo JText::_( 'Please enter phone Number in proper format "(111)-111-1111".', true ); ?>");	
			return false;
		}

  }
  ////// phone validation end ////////////////
</script>

