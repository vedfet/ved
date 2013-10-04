<?php
	

class captcha_image 
{

	var $font = 'MONOFONT.TTF';
	var $captcha_value = '';
	var $captcha_hash = '';
	

	function captcha_image()
	{
		$db =& JFactory::getDBO();
		
		$query = "CREATE TABLE IF NOT EXISTS `#__captcha` 
		(
		`id` int(11) NOT NULL auto_increment,
        `captcha_value` varchar(255) NOT NULL,
        `captcha_hash` varchar(255) NOT NULL,
        `created` datetime NOT NULL default '0000-00-00 00:00:00',
         PRIMARY KEY  (`id`)
			
			) ENGINE=MyISAM";

   		$db->setQuery( $query );
     	$db->query();
		
		$query = "DELETE FROM `#__captcha` WHERE DATE_ADD(`created`, INTERVAL 1 DAY) < NOW()";
   		$db->setQuery( $query );
     	$db->query();
	}

	function validate_captcha($captcha_hash, $captcha_value)
	{  
		$db =& JFactory::getDBO();
		  		
		if($captcha_value == '') return false;
		
      	$query=" select captcha_value 
		from #__captcha 
		where captcha_hash='".$captcha_hash."' 
		and captcha_value = '".$captcha_value."'";
     	$db->setQuery( $query );
     	$db_captcha_value = $db->loadObjectList();
		if($db_captcha_value[0]->captcha_value == $captcha_value)
		{
			return true;
		}else{
			return false;
		}
	}

	 
	function generate_hash($characters='6')
	{

		$db =& JFactory::getDBO();

		$possible = '23456789bcdfghjkmnpqrstvwxyz';
		$captcha_value = '';
		$i = 0;
		while ($i < $characters) { 
			$captcha_value .= substr($possible, mt_rand(0, strlen($possible)-1), 1);
			$i++;
		}

		$captcha_hash = md5($captcha_value.time());

		$query = "INSERT INTO `#__captcha` (captcha_value, captcha_hash, created)
		VALUES('$captcha_value', '$captcha_hash', NOW())";

   		$db->setQuery( $query );
     	$db->query();

		$this->captcha_hash = $captcha_hash;
		$this->captcha_value = $captcha_value;

		return $captcha_hash;
	}

	function generate_captcha_image($captcha_hash,$width='140',$height='40',$characters='6'){
		
		global $database, $mosConfig_absolute_path;
		$db =& JFactory::getDBO();
		
		$query = "SELECT captcha_value
		FROM #__captcha
		WHERE captcha_hash='".$captcha_hash."'";

		$db->setQuery( $query );
			
		$captcha_value = $db->loadObjectList();
		
		if($captcha_value[0]->captcha_value== ''){
			$captcha_value = 'xxxxxx';
		}

		$this->captcha_value = $captcha_value[0]->captcha_value;
		$this->captcha_hash = $captcha_hash;
		echo "Captcha value=".$this->captcha_value;
		echo "Captcha hash=".$this->captcha_hash;
		$font_size = $height * 0.75;
		$image = @imagecreate($width, $height) or die('Cannot initialize new GD image stream');

		/* set the colours */
		$background_color = imagecolorallocate($image, 255, 255, 255);
		$text_color = imagecolorallocate($image, 20, 40, 100);
		$noise_color = imagecolorallocate($image, 100, 120, 180);

		/* generate random dots in background */
		for( $i=0; $i<($width*$height)/3; $i++ ) {
			imagefilledellipse($image, mt_rand(0,$width), mt_rand(0,$height), 1, 1, $noise_color);
		}

		/* generate random lines in background */
		for( $i=0; $i<($width*$height)/150; $i++ ) {
			imageline($image, mt_rand(0,$width), mt_rand(0,$height), mt_rand(0,$width), mt_rand(0,$height), $noise_color);
		}

		/* create textbox and add text */
		
		$uri =& JURI::getInstance();
		$uri->root(); //root url
		$uri->base(); //		base url
		$uri->current(); //current url pathj
        //echo $uri->root();
		
		$textbox = imagettfbbox($font_size, 0,JPATH_BASE.'/'.$this->font,$this->captcha_value) or die('Error in imagettfbbox function');
		
		$x = ($width - $textbox[4])/2;
		$y = ($height - $textbox[5])/2;
		
		 imagettftext($image, $font_size, 0, $x, $y, $text_color,JPATH_BASE.'/'.$this->font , $this->captcha_value) or die('Error in imagettftext function');
	

		/* output captcha image to browser */
		ob_clean();
		header('Content-Type: image/jpeg');
		imagejpeg($image);	
		imagedestroy($image);
	}
}


?>