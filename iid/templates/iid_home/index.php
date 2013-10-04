<?php
defined( '_JEXEC' ) or die( 'Restricted access' );
$this->setGenerator('Generator 3.0'); 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" >
<head>
	<jdoc:include type="head" />
	<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/iid_home/css/template.css" type="text/css" />
<link rel="stylesheet" type="text/css" href="<?php echo $this->baseurl ?>/shadowbox/shadowbox.css">
<script type="text/javascript" src="<?php echo $this->baseurl ?>/shadowbox/shadowbox.js"></script>
<script type="text/javascript">
 Shadowbox.init();
</script>
	 <script language="JavaScript" type="text/javascript">
hover1 = new Image(546,23);
hover1.src = "<?php echo $this->baseurl ?>/templates/iid_home/images/paneltop2.png";
hover2 = new Image(546,10);
hover2.src = "<?php echo $this->baseurl ?>/templates/iid_home/images/pannelcenter2.png";
hover3 = new Image(546,26);
hover3.src = "<?php echo $this->baseurl ?>/templates/iid_home/images/pannelbottom2.png";

hover4 = new Image(546,23);
hover4.src = "<?php echo $this->baseurl ?>/templates/iid_home/images/paneltop3.png";
hover5 = new Image(546,10);
hover5.src = "<?php echo $this->baseurl ?>/templates/iid_home/images/pannelcenter3.png";
hover6 = new Image(546,26);
hover6.src = "<?php echo $this->baseurl ?>/templates/iid_home/images/pannelbottom3.png";
<?php  if($_GET['view'] == 'frontpage' ){ ?>
      var panels = new Array('panel1', 'panel2', 'panel3');
      var selectedTab = null;
      function showPanel(tab, name)
      {
        if (selectedTab) 
        {
          selectedTab.style.backgroundColor = '';
          selectedTab.style.paddingTop = '';
        }
        selectedTab = tab;     
        for(i = 0; i < panels.length; i++)
        {
          document.getElementById(panels[i]).style.display = (name == panels[i]) ? 'block':'none';
        }
        return false;
      }
<?php } else { ?>
function showPanel(tab, name)
      {
}
<?php } ?>
    </script>
</head>
<body onload="showPanel(document.getElementById('tab1'), 'panel1');">
	<div id="outer-wrap">
		<div id="outer-inner-bg">
			<div id="header">
				<div class="page_top">
					<div class="page_top_left">
						
						<jdoc:include type="modules" name="left" />
						
					</div>
					<div class="page_top_right">
						<div class="topmeu">
							<div class="topright">
								
<div class="fontsizea"><div style="float:left;_width:75px;">Font Resize</div> <jdoc:include type="modules" name="user7" />	

<div class="addthis_toolbox addthis_default_style ">
<a href="http://www.addthis.com/bookmark.php?v=250&amp;username=xa-4cf8de4700c45b39" class="addthis_button_compact">Share |</a>
</div>
<div class="topmenuwidth"><jdoc:include type="modules" name="top" /></div>
<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#username=xa-4cf8de4700c45b39"></script>

					 
								</div>
							</div>
						</div>
						<div class="google">
							<div class="topright1">
								<div id="google_translate_element"></div><script>
									function googleTranslateElementInit() {
									  new google.translate.TranslateElement({
										pageLanguage: 'en',
										includedLanguages: 'es',
										layout: google.translate.TranslateElement.InlineLayout.HORIZONTAL
									  }, 'google_translate_element');
									}
									</script><script src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
							</div>
						</div>
						<div class="mainmenu">
							<jdoc:include type="modules" name="user1" />
						</div>
						<div class="line">
							<img src="<?php echo $this->baseurl ?>/templates/iid_home/images/line.png" width="980" height="1" />
						</div>
						<div class="center_content">
						
							<div id="content" class="tab">
								<?php  if($_GET['view'] == 'frontpage' ){ ?>
								<div id="tabs">
									<a href="" class="tab1" onmousedown="return event.returnValue = showPanel(this, 'panel1');" id="tab1" onclick="return false;"></a>
									<a href="" class="tab2" onmousedown="return event.returnValue = showPanel(this, 'panel2');" onclick="return false;"></a>
									<a  href="" class="tab3" onmousedown="return event.returnValue = showPanel(this, 'panel3');" onclick="return false;"></a>
								</div>
								<div class="panel" id="panel1" style="display: block;">
								  	<div class="toppanel">
									</div>
									<div class="centerpanel">
									  <jdoc:include type="modules" name="prepare" />
									</div>
									<div class="bottompanel">
<a href="index.php?option=com_pdfgen&view=pdf&id=28"><div style="float:left;font-size:12px;">Click here to export this information as a PDF.</div><img style="float:left;" src="<?php echo $this->baseurl ?>/templates/iid_home/images/pdf_button.png" width="16" height="16" /></a>
									</div>
								</div>
								<div class="panel" id="panel2" style="display: none;">
								  <div class="toppanel2">
									</div>
									<div class="centerpanel2">
										<jdoc:include type="modules" name="protect" />
									  
									</div>
									<div class="bottompanel2">
<a href="index.php?option=com_pdfgen&view=pdf&id=29"><div style="float:left;font-size:12px;">Click here to export this information as a PDF.</div><img style="float:left;" src="<?php echo $this->baseurl ?>/templates/iid_home/images/pdf_button.png" width="16" height="16" /></a>
									</div>
								</div>
								<div class="panel" id="panel3" style="display: none;">
								 	<div class="toppanel3">
									</div>
									<div class="centerpanel3">
										
									  <jdoc:include type="modules" name="purchase" />
									</div>
									<div class="bottompanel3">
<a href="index.php?option=com_pdfgen&view=pdf&id=30"><div style="float:left;font-size:12px;">Click here to export this information as a PDF.</div><img style="float:left;" src="<?php echo $this->baseurl ?>/templates/iid_home/images/pdf_button.png" width="16" height="16" /></a>
									</div>
								</div>
								<?php } else { ?>
								<div id="content" class="padd">
								  <jdoc:include type="component" />
								 </div>
								<?php } ?>
									
								
							</div>
							<div class="tabright">
								<jdoc:include type="modules" name="right" />
								
								
							</div>
						</div>
					</div>
				</div>
				<div class="banner">
					<jdoc:include type="modules" name="user8" />
				</div>
				<div style="clear:both;"></div>

					<div class="footer">
						<div class="footercontent">
							<div class="footermenudiv"><jdoc:include type="modules" name="footer" /></div>
							<div class="copyright"><jdoc:include type="modules" name="copyright" /></div>
							<div class="logofooter">
								<jdoc:include type="modules" name="footerlogo" />
							</div>
						</div>			
					</div>
				</div>
				
			</div>			
		</div>
	</div>
    
    
    
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-17117799-16']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

</body>
</html>