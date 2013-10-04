<?php
/**
 * @copyright	Copyright (C) 2005 - 2008 Open Source Matters. All rights reserved.
 * @license		GNU/GPL, see LICENSE.php
 * Joomla! is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 * See COPYRIGHT.php for copyright notices and details.
 */

defined('_JEXEC') or die('Restricted access');
$url = clone(JURI::getInstance());
$path = $this->baseurl.'/templates/'.$this->template;
$showRightColumn = ($this->countModules('right'));
$showFooterColumn = ($this->countModules('user6'));
if(JRequest::getCmd('task') != 'edit') $Edit = false; else $Edit = true;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>" >
<head>
<jdoc:include type="head" />
<link rel="stylesheet" href="<?php echo $path ?>/css/constant.css" type="text/css" />
<link rel="stylesheet" href="<?php echo $path ?>/css/template.css" type="text/css" />
<link rel="stylesheet" href="<?php echo $path ?>/css/imagegallery.css" type="text/css" />
<!--[if lt IE 7]>
	<script type="text/javascript" src="<?php echo $path ?>/scripts/ie_png.js"></script>
    <script type="text/javascript">
       ie_png.fix('.png');
   </script>
<![endif]-->

<?php
$user =& JFactory::getUser();
if ($user->get('guest') == 1) {
  $headerstuff = $this->getHeadData();
  $scripts = $headerstuff['scripts'];
  $headerstuff['scripts'] = array();
  foreach($scripts as $url=>$type) {
    if (strpos($url, 'js/mootools.js') === false && strpos($url, 'js/caption.js') === false && strpos($url, 'js/validate.js') === false) {
      $headerstuff['scripts'][$url] = $type;
    }
  }
  $this->setHeadData($headerstuff);
}
if (!JPluginHelper::isEnabled('system', 'mtupgrade')) {
?>
<script type="text/javascript" src="<?php echo $this->baseurl?>/media/system/js/mootools.js"></script>
<?php
}
?>

<!--cufon-->

<script type="text/javascript" src="<?php echo $path ?>/scripts/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="<?php echo $path ?>/scripts/jquery-ui.min.js"></script>
<script type="text/javascript" src="<?php echo $path ?>/scripts/cufon-yui.js"></script>
<script type="text/javascript" src="<?php echo $path ?>/scripts/NewsGoth_BT_400.font.js"></script>
<script type="text/javascript" src="<?php echo $path ?>/scripts/cufon-replace.js"></script>
<!--end cufon-->

<script type="text/javascript" src="<?php echo $path ?>/scripts/tabs.js"></script>


<script type="text/javascript">
	$(document).ready(function(){
		$("#featured > ul").tabs({fx:{opacity: "toggle"}}).tabs("rotate", 5000, true);
	});
</script>

</head>
<body id="body">
        <div class="bg-body">
        	<div class="bg-body-2">
                <div id="header">
                    <div class="main">
                        <div class="indent-header">
                            <div id="mid">
                                <div class="block-top-menu">
                                    <jdoc:include type="modules" name="user3" style="user" />
                                </div>
                                <div id="logo">
                                    <a href="index.php"><img src="<?php echo $path ?>/images/logo.gif" alt="" /></a>
                                </div>
                                <div class="search-block">
                                    <jdoc:include type="modules" name="user4" style="topmenu" />
                                </div><br class="clear" />
                            </div>
                            
									<jdoc:include type="modules" name="user1" style="user" />
                        </div>
                    </div>
                </div>
                <div id="wrapper">
                    <div class="main">
                        <div class="indent-main">
                            <div class="clear-block">
                                <?php if ($showRightColumn && !$Edit) : ?>
                                <div id="right">
                                    <div class="space">
                                        <div class="width">
                                            <jdoc:include type="modules" name="right" style="user" />
                                            <div class="newsletter-block"><jdoc:include type="modules" name="user2" style="user" /></div>
                                        </div>
                                    </div>
                                </div>
                                <?php endif; ?>
                                <div class="container">
                                    <jdoc:include type="modules" name="user5" style="user" />
                                    <div class="indent-container">
                                        <?php if ($this->getBuffer('message')) : ?>
                                        <div class="error err-space">
                                            <jdoc:include type="message" />
                                        </div>
                                        <?php endif; ?>
                                        <jdoc:include type="component" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="footer" class="png">
                    	<?php if ($showFooterColumn) : ?>
                        <div class="footer-blocks"> 
                            <div class="main">
                            	<div class="indent-footer-blocks">
                                	<jdoc:include type="modules" name="user6" style="user" />
                                    <div class="clear"></div>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                        <div class="copyright"><?php echo JText::_('Powered by <span>Joomla!</span>') ?>&nbsp;More Business Joomla Themes at <a  rel='nofollow' href='http://www.templatemonster.com/category/business-joomla-themes/' target='_blank'>TemplateMonster.com</a></div>
                    </div>
                </div>
            </div>
        </div>
</body>
</html> 
