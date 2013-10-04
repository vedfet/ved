<?php
/**
 * Joomla! 1.5 component Survey
 *
 * @version $Id: controller.php 2010-03-14 01:52:14 svn $
 * @author Vinod Dubey
 * @package Joomla
 * @subpackage Survey
 * @license GNU/GPL
 *
 * Display and manage Survey and related items 
 *
 * This component file was created using the Joomla Component Creator by Not Web Design
 * http://www.notwebdesign.com/joomla_component_creator/
 *
 */

// no direct access

 defined('_JEXEC') or die('Restricted access'); 
$dir=trim($url,"administrator");
 $uri =& JURI::getInstance();
$url=$uri->root(); 
$params = &JComponentHelper::getParams( 'com_media' );     


if(count($this->question)==0 && $_REQUEST['save']==""){

	echo "There is no survey";
}
else{
if($_REQUEST['save']==""){


?>
 
<form action="<?php echo JRoute::_( 'index.php?option=com_survey' );?>" method="post" name="adminForm" onsubmit="return validate();">
<?php 
		$headfoot=$this->headfoot;
	
	
	?>
		
			
			<table class="componentheading">
          <tr><td>
            <?php //if ( $this->params->def( 'show_page_title', 1) ) : ?>
    			<?php echo 'Flood Awareness Survey'; //$this->escape($this->params->get('page_title')); ?>
			   <?php //endif; ?>
            </td></tr></table>
			<table width="100%" border="0" cellspacing="5" cellpadding="2" align="left">		
							
					<tr>
						<td colspan='2' align="left"><?php echo $headfoot[0]->header_descriptions; ?></td>
					</tr>
					
					<tr>
						<td colspan='2'>User Details:</td>
					</tr>
					
					<tr>
						<td width="15%">
							<?php echo NAME; ?>:
						</td>
						<td width="85%">
							<input type="text" name="name" value="<?php echo $_SESSION['post_back']['name']; ?>" />
						</td>
					</tr>

					<tr>
						<td>
							<?php echo EMAIL; ?>:
						</td>
						<td>
							<input type="text" name="email" value="<?php echo $_SESSION['post_back']['email']; ?>" />
						</td>
					</tr>

					<tr>
						<td colspan="2">
							<?php echo QUESTION; ?>:
						</td>
					</tr>

		<!-- g code start -->

					<?php
		$list=$this->question;
	
		 $total_rows = count($list);
		for($i=0; $i < $total_rows; $i++)
		{
			$answer_option=$list[$i]->answer_options;
			$answers = explode(",", $answer_option);

		?>
				
				<tr>
					<td width="10%" align="left">
						Ques <?php echo $i+1; ?>.
					</td>
					<td align="left">	
						<?php echo $list[$i]->question_description; ?>
					</td>
				</tr>
				<tr>
					<td valign="top" width="10%" align="left">
						Ans .
					</td>
					<td align="left">	
						<?php if($list[$i]->answer_type=='text')
						{ 
						
						
						?>
							<textarea id="answer" name="answer<?php echo $list[$i]->id; ?>" rows="3" cols="30"><?php echo $_SESSION['post_back']['answer'.$list[$i]->id]; ?></textarea>
						<?php 
						} 
						else if($list[$i]->answer_type=='checkbox')
						{
							
							for($n=0;$n<count($answers);$n++)
							{
							    
								
								
				if(is_array($_SESSION['post_back']['answer'.$list[$i]->id]) && @in_array(trim($answers[$n]),$_SESSION['post_back']['answer'.$list[$i]->id]))
								{
							
								?>
								<div><input type="checkbox" value="<?php echo $answers[$n]; ?>" name="answer<?php echo $list[$i]->id."[]"; ?>" checked="checked"/><?php echo $answers[$n]; ?></div>
								<?php
								}
								else{
								
							?>							
								<div><input type="checkbox" value="<?php echo $answers[$n]; ?>" name="answer<?php echo $list[$i]->id."[]"; ?>"/><?php echo $answers[$n]; ?></div>
							<?php 
								   }
							
						
							}
						} 
						else
						{	
							for($n=0;$n<count($answers);$n++)
							{
							
							if($_SESSION['post_back']['answer'.$list[$i]->id]==trim($answers[$n]))
							{
							?>
							<div><input type="radio" value="<?php echo $answers[$n]; ?>" name="answer<?php echo $list[$i]->id; ?>" checked="checked"/><?php echo $answers[$n]; ?></div>
							<?php
							}
							else{
							
						?>							
							<div><input type="radio" value="<?php echo $answers[$n]; ?>" name="answer<?php echo $list[$i]->id; ?>"/><?php echo $answers[$n]; ?></div>
						<?php 
						       }
							}
						}
						?>
					</td>
				</tr>	
				
				<tr>
					<td>
						<input type="hidden" name="id" value="<?php echo $list[$i]->id; ?>">
						<input type="hidden" name="survey_id" value="<?php echo $list[$i]->survey_id; ?> ">
						<input type="hidden" name="created" value="<?php echo $created; ?>">
						<input type="hidden" name="ipaddress" value="<?php echo $ip; ?>">
						<input type="hidden" name="browser" value="<?php echo $browser; ?>">
						


					</td>
				</tr>
		<?php
		}
		?>
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
								<img src="index.php?option=<?php echo $option;?>&task=generate_captcha_image&captcha_hash=<?php echo $this->captcha_hash;?>" 
								width="140" height="40"/>
							</div>
							<div id="captchaerrorid"></div>	
						</td>
						
					</tr>
					<!-- captcha code end -->

					<tr>
						<td colspan='2' align="left">
							<input type="submit" value="submit" name="submit">
							<!-- <input type="hidden" name="option" value="com_suvey"> -->
							<input type="hidden" name="task" value="surveyanswer">
						</td>
						
					</tr>
					
				
					<tr>
						<td colspan='2' align="left"><?php echo $headfoot[0]->footer_descriptions; ?></td>
						
					</tr>


		<!-- g code end -->

			
			</table>				
	
	<?php echo JHTML::_( 'form.token' ); ?>	
	</form>
<script language="JavaScript" type="text/javascript">
//You should create the validator only after the definition of the HTML form
 
  function validate()
	{
			
			/*
			if(document.adminForm.name.value==""){
				alert("<?php echo JText::_('JAVASCRIPT_NAME'); ?>");
				document.adminForm.name.focus();
				return false;
			}
			

			///// email validation start ////////////			
			
			if(document.adminForm.email.value==""){
			
					alert("Please Enter email Id");
					document.adminForm.email.focus();
					return false;
				}
             if(document.adminForm.email.value!=""){
			
					var emailPattern = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
					var emailTest = emailPattern.test(document.adminForm.email.value);
					if(!emailTest){
					
						alert("Please Enter Valid email Id");
						document.adminForm.email.focus();
						return false;
					}
				} */ 
///// email validation end /////////////	
			if(document.adminForm.captcha_value.value==""){
				alert("<?php echo JText::_('JAVASCRIPT_CAPTCHA'); ?>");
				document.adminForm.captcha_value.focus();
				return false;
			}
			
			
	}		
			
</script>

<?php
	}
}
?>		

<?php 
		$emsg=$this->emailmsg;
		
		
		if($_REQUEST['save']=="save") {
		
		echo $emsg[0]->thankmessage;
}


?>