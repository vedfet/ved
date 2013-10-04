<?php 
/**
 * Joomla! 1.5 component survey
 *
 * @version $Id: edit.php 2010-06-03 01:08:55 svn $
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
JHTML::_('behavior.calendar');

$row=$this->listsurvey;
$rows=$this->listsurveyconfig;

$uri =& JURI::getInstance();
$url=$uri->root(); //root url

$dir=trim($url,"administrator");
$survey_path=$dir.$this->file_path.'/surveyquestion';
?>

<script type="text/javascript" language="javascript">

function answerType()
		{
			
			
			var form = document.adminForm;
			i=document.getElementById('answer_type').options[document.getElementById('answer_type').selectedIndex].value;
			if(i == 'checkbox' || i == 'radio')
			{
				document.getElementById('answeroption').style.display='block';answer_options
				form.answer_options.value='';
			}
			else
			{
				document.getElementById('answeroption').style.display='none';
				form.answer_options.value='';
			}
		}

</script>


<div id="survey">

<script language="javascript" type="text/javascript">
		
		
		function isFormat(ffname)
		{
			var extension = new Array();
			extension[0] = ".png";
			extension[1] = ".jpeg";
			extension[2] = ".jpg";
			extension[3] = ".gif";
			extension[4] = ".PNG";
			extension[5] = ".JPEG";
			extension[6] = ".JPG";
			extension[7] = ".GIF";
			var thisext = ffname.substr(ffname.lastIndexOf('.'));
			var x=0;
			for(var i = 0; i < extension.length; i++) {
				if(thisext == extension[i]) { x=1;}
			}
			return x;
		}
		function IsNumeric(sText)
        {
              var ValidChars = "0123456789.";
              var IsNumber=true;
              var Char;

              for (i = 0; i < sText.length && IsNumber == true; i++) 
              { 
                       Char = sText.charAt(i); 
                       if (ValidChars.indexOf(Char) == -1) 
                       {
                            IsNumber = false;
                       }
              }
              return IsNumber;
   
        }

		function submitbutton(pressbutton) {
			var form = document.adminForm;
			
			// do field validation
			if ((pressbutton == 'cancel') || (pressbutton == 'surveyquestion.list')) 
			{
				submitform( pressbutton );
				return;
			}
			if (form.title.value =='')
			{
				alert( "Enter Survey Title" );
				form.survey_name.focus();
				return;
			}
			/* if ((form.survey_name.value =='') && (form.survey_name_list.selectedIndex==0))
			{
				alert( "Enter select or browse a survey" );
				form.survey_name.focus();
				return;
			}
			else if((form.image_name.value !='') && (isFormat(form.image_name.value)==0) ) 
			{
				alert( "Survey Thumbnail must be in png,jpeg,gif format" );
				form.image_name.value='';
				form.image_name.focus();
				return;
			} */
			else 
			{
				submitform( pressbutton );
		    }
		
		}
		
		function surveyList()
		{
			document.getElementById('surveylist').style.display='block';
			document.getElementById('newsurvey').style.display='none';
			document.getElementById('newsurveyclick').style.display='block';
			document.getElementById('surveylistclick').style.display='none';
			document.getElementById('survey_name').value='';
		}
		function newSurvey()
		{
			document.getElementById('surveylist').style.display='none';
			document.getElementById('newsurvey').style.display='block';
			document.getElementById('newsurveyclick').style.display='none';
			document.getElementById('surveylistclick').style.display='block';
			form.survey_name_list.selectedIndex=0;
		}
		function changeSurveyPlay()
		{
			
			document.getElementById('rowSurvey').style.display='none';
			document.getElementById('changeSurvey').style.display='block';
			document.getElementById('changeSurvey').innerHTML='<embed height="247" width="368" flashvars="file='+document.getElementById('files').value+'&autostart=false" wmode="opaque" allowscriptaccess="always" allowfullscreen="true" quality="high" bgcolor="#FFFFFF" name="ply1" id="ply1" style="" src="<?php echo $uri->root().'/images/survey/jwplayer.swf'; ?>" type="application/x-shockwave-flash"/></embed>'
		}
		</script>
		</script>
		<?php 	
		?>
<form enctype="multipart/form-data" action="index.php" method="post" name="adminForm" >		
  <div class="adminform" align="left">
       	<div style="margin-bottom:20px;">
		
		<fieldset class="adminform">
		<legend><?php echo JText::_( 'SURVEY_DETAILS' ); ?></legend>
	    <table cellpadding="5" cellspacing="0" border="0" >
        <table class="admintable">
    	<tbody>			

             <tr>
              <td align="right" class = "key"><?php echo JText::_('TITLE');?>:</td>
              <td colspan="2">
			 
				
						<?php 
									$default = 0;
									
										foreach($rows as $value) :
										
											 $survey_id[] = JHTML::_('select.option', $value->id, $value->title);
										 endforeach;
									
							echo JHTML::_('select.genericlist',$survey_id, 'survey_id' ,'class="inputbox"', 'value', 'text',$row->survey_id);	
						?>
					
			  </td>
            </tr>
			
            <tr>
              <td align="right" class = "key"><?php echo JText::_('QUESTION');?>:</td>
              <td colspan="2"><?php
                    // parameters : areaname, content, hidden field, width, height, rows, cols
                    echo $editor->display( 'question_description',  htmlspecialchars( $row->question_description, ENT_QUOTES), '450','150', '70', '10', array("readmore","pagebreak")) ;

					
                    ?>
              </td>
            </tr>

			<tr>
              <td align="right" class = "key"><?php echo JText::_('ANSWER_TYPE');?>:</td>
              <td colspan="2">
						<?php 
						
						$answer_type=array();
						$answer_type[] = JHTML::_('select.option', 'text', JText::_('Text'));
						$answer_type[] = JHTML::_('select.option', 'checkbox', JText::_('Checkbox'));
						$answer_type[] = JHTML::_('select.option', 'radio', JText::_('Radio'));
				
			echo JHTML::_('select.genericlist', $answer_type, 'answer_type' ,'id="answer_type" class="inputbox"  size="1" onchange="answerType();"','value', 'text', $row->answer_type);
	
              ?>
			  </td>
            </tr>
            <tr>
					<td colspan="2">
						<?php if($row->answer_type=='checkbox' || $row->answer_type=='radio') {?>
							<div id="answeroption" style="display:block;">
								<div style="width: 52px;float:left;margin-left:97px;background-color:#f6f6f6;"><?php echo Answer; ?></div>
								<div style="width:600px;float:left;" >
								<textarea  name="answer_options" class="inputbox" size="" rows="3" cols="29"><?php echo $row->answer_options; ?></textarea>
								<br>
								<span><?php echo "Please input a answers seprated by comma(,)" ; ?></span>
								</div>
							</div>
						<?php 
							}
							else
							{
						?>
								<div id="answeroption" style="display:none;">
									<div style="width: 52px;float:left;margin-left:97px;background-color:#f6f6f6;"><?php echo Answer; ?></div>
									<div style="width:400px;float:left;">
									<textarea  name="answer_options" class="inputbox" size="" rows="3" cols="29"><?php echo $row->answer_options; ?></textarea>
									<br>
									<span><?php echo "Please input a answers seprated by comma(,)" ; ?></span>
									</div>
								</div>
						<?php }?>
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
    <input type="hidden" name="task" value="surveyquestion.save" />
	<input type="hidden" name="id" value="<?php echo (int)$row->id; ?>" />
    <input type="hidden" name="act" value="<?php echo $this->listsurvey->cssclass; ?>" />
    <input type="hidden" name="option" value="<?php echo SURVEY_COM_COMPONENT;?>" />
</form>

</div>
