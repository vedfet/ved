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




  $id = JRequest::getVar('id');
  $header=JRequest::getVar('header');
  $footer=JRequest::getVar('footer');
 
  $date =& JFactory::getDate();
  $created= $date->toFormat();
 
  $ip = getenv("REMOTE_ADDR");
  $browser = $_SERVER['HTTP_USER_AGENT'];

 defined('_JEXEC') or die('Restricted access'); ?>

 <form action="<?php echo JRoute::_( 'index.php?option=com_survey' );?>" method="post" name="adminForm" onsubmit="return validate();">


					<?php  
					$count_title=count($this->result);
					//echo $count_title;
					
					
					if($id==""){
								
							echo '<table width="100%" border="0" cellspacing="5" cellpadding="2" align="left" >';
  							echo '<tr style="background-color:#d9eaf4; color:#00749a;">';
							echo '<td width="10">Flood Awareness Survey</td>';
							echo '</tr>';	
								echo "<tr>";
								echo "<td>";
								

								foreach($this->result as $result)
								{
									
									
									echo "<a 
									
									href='index.php?option=com_survey&view=survey_details&id=".$result->id."'>$result->title</a><br>";
									
									
									?>
								
								<?php
								}
								echo "</td>";
								echo "</tr>";
						}
						echo '</table>';	

						?> 
					
</form>

	