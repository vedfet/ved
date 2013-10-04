<?php // @version $Id: default.php 9830 2008-01-03 01:09:39Z eddieajau $
defined('_JEXEC') or die('Restricted access');
?>
<?php
$return = base64_encode(base64_decode($return).'#content');

if ($type == 'logout') : ?>

<form action="index.php" method="post" name="login" class="log">
    <?php if ($params->get('greeting')) : ?>
    <p style="float:left; padding-top:0;"> <?php echo JText::sprintf('HINAME', $user->get('name')); ?> </p>
    <?php endif; ?>
    <p style="float:left; padding-top:0;">
        <input type="submit" name="Submit" class="button png" value="<?php echo JText::_('BUTTON_LOGOUT'); ?>" />
    </p>
    <div class="clear"></div>
    <input type="hidden" name="option" value="com_user" />
    <input type="hidden" name="task" value="logout" />
    <input type="hidden" name="return" value="<?php echo $return; ?>" />
</form>
<?php else : ?>
<form action="<?php echo JRoute::_( 'index.php', true, $params->get('usesecure')); ?>" method="post" name="login" class="form-login">
    <?php if ($params->get('pretext')) : ?>
    <p> <?php echo $params->get('pretext'); ?> </p>
    <?php endif; ?>
    
    <div class="row-logo-form clear">
        <div class="col-4 fleft">
        	 <div class="bg-input"><label for="modlgn_username"><?php echo JText::_('Username') ?></label><input name="username" id="mod_login_username" type="text" class="inputbox" value="<?php echo JText::_('Username'); ?>" onblur="if(this.value=='') this.value=''" onfocus="if(this.value =='<?php echo JText::_('Username')?>' ) this.value=''" alt="<?php echo JText::_('Username'); ?>" /></div>
        </div>
        <div class="col-3 fleft">
        	<div class="bg-input bg-input1"><label for="modlgn_passwd"><?php echo JText::_('Password') ?></label><input type="password" id="mod_login_password" name="passwd" class="inputbox"  alt="<?php echo JText::_('Password'); ?>" value="password" onfocus="this.value=null" /></div>
        </div>
        <div class="col-5 fleft">
        	<input type="submit" name="Submit" class="button" value="<?php echo JText::_('BUTTON_LOGIN'); ?>" />
         </div>
    	<div class="col-1 fleft">
        	<a href="<?php echo JRoute::_('index.php?option=com_user&view=reset#content'); ?>"> <?php echo JText::_('Lost password?'); ?></a>
        </div>
        <div class="col-2 fleft">
        	<?php $usersConfig =& JComponentHelper::getParams('com_users');
			if ($usersConfig->get('allowUserRegistration')) : ?>
			No account yet? <a href="<?php echo JRoute::_('index.php?option=com_user&task=register#content'); ?>"> <?php echo JText::_('Register!'); ?></a>
			<?php endif;
			echo $params->get('posttext'); ?>
        </div><br class="clear" />
    </div>
    
    <input type="hidden" name="option" value="com_user" />
    <input type="hidden" name="task" value="login" />
    <input type="hidden" name="return" value="<?php echo $return; ?>" />
    <?php echo JHTML::_( 'form.token' ); ?>
</form>
<?php endif;
