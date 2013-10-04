<?php // no direct access
defined('_JEXEC') or die('Restricted access'); ?>
<form action="

<?php 
	global $mainframe;
 	$router =& $mainframe->getRouter();
	//if($router->getMode())
	//{
	//	// We have SEF turned on !
	//	echo 'index.php?option=com_spsnewsletter&view=spsNewsletter';
		
	//} 
	//else
	//{
		echo JRoute::_( 'index.php?option=com_spsnewsletter&view=spsnewsletter', true, 0);
	//}

?>" method="post" name="subscribeFormModule" id="subscribeFormModule">
	<div class="newslatter png">
		<div class="width">
		<div class="newslatter-text"><?php echo $moduleText;?></div>
		<input class="moduleInput" type="text" name="email" id="email" value="enter your e-mail here:" onfocus="this.value=''" size="10" maxlength="250" value="" />
		<input class="moduleButton png"type="submit" name="Submit" value="Go" /></div>
	</div>	
<input type="hidden" name="option" value="com_spsnewsletter" />
<input type="hidden" name="task" value="addSubscriber" />
</form>