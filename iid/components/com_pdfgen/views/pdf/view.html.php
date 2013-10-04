<?php
/**
 * Joomla! 1.5 component Nursery
 *
 * @version $Id: controller.php 2010-03-14 01:52:14 svn $
 * @author Vinod Dubey
 * @package Joomla
 * @subpackage Nursery
 * @license GNU/GPL
 *
 * Display and manage Nursery and related items 
 *
 * This component file was created using the Joomla Component Creator by Not Web Design
 * http://www.notwebdesign.com/joomla_component_creator/
 *
 */

// no direct access
 
defined( '_JEXEC' ) or die( 'Restricted access' );
 
jimport( 'joomla.application.component.view');
 
/**
 * HTML View class for the HelloWorld Component
 *
 * @package    HelloWorld
 */
 
class PdfgenViewPdf extends JView
{
    function display($tpl = null)
    {
        global $mainframe, $option;
		$db =& JFactory::getDBO();
		 //set mime type
		$this->_mime = 'application/pdf';

		//set document type
		$this->_type = 'pdf';
		
		$this->_charset='utf-8';
		
		// * Setup external configuration options
		
		define('K_TCPDF_EXTERNAL_CONFIG', true);

		/*
		 * Path options
		 */
	
		// Installation path
		define("K_PATH_MAIN", JPATH_LIBRARIES.DS."tcpdf");

		// URL path
		define("K_PATH_URL", JPATH_BASE);

		// Fonts path
		define("K_PATH_FONTS", JPATH_SITE.DS.'language'.DS."pdf_fonts".DS);

		// Cache directory path
		define("K_PATH_CACHE", K_PATH_MAIN.DS."cache");

		// Cache URL path
		define("K_PATH_URL_CACHE", K_PATH_URL.DS."cache");

		// Images path
		define("K_PATH_IMAGES", K_PATH_MAIN.DS."images");

		// Blank image path
		define("K_BLANK_IMAGE", K_PATH_IMAGES.DS."_blank.png");

		/*
		 * Format options
		 */

		// Cell height ratio
		define("K_CELL_HEIGHT_RATIO", 1.25);

		// Magnification scale for titles
		define("K_TITLE_MAGNIFICATION", 1.3);

		// Reduction scale for small font
		define("K_SMALL_RATIO", 2/3);

		// Magnication scale for head
		define("HEAD_MAGNIFICATION", 1);
		//index.php?option=com_pdfgen&view=pdf&id=9
		
		//$id = JRequest::getVar('id', array(0), '', '');
		$id=JRequest::getVar('id');

		$query = "SELECT id,title,content FROM #__modules WHERE id=$id";
		$db->setQuery($query);
		$db->getQuery($query);
		$rows = $db->loadObjectList();	
		

	
		
		jimport('tcpdf.tcpdf');

		// Default settings are a portrait layout with an A4 configuration using millimeters as units
		$pdf = new TCPDF();	
		
		//set margins
		$pdf->SetMargins(10,50, 15);		
		//set auto page breaks
		$pdf->SetAutoPageBreak(True, 10);
		$pdf->SetHeaderMargin(5);
		$pdf->SetFooterMargin(10);
		$pdf->setImageScale(0);
		
		// Fonts path
		// Set PDF Header data
		$title		=$rows[0]->title;
		$content 	=$rows[0]->content;
		$params = &JComponentHelper::getParams( 'com_media' );               
		$file_path=$params->get('file_path');
		$image_path=$params->get('image_path');
		
		$dir=trim(JPATH_BASE,"administrator");
		$video_path=$dir.$file_path.'/video';
		
		if($rows[0]->title=="Prepare")
		{
			 $image_file = JPATH_ROOT.DS.$file_path.DS.'prepare.jpg';
		}
		if($rows[0]->title=="Protect")
		{
			 $image_file = JPATH_ROOT.DS.$file_path.DS.'protect.jpg';
		}
		if($rows[0]->title=="Purchase")
		{
			 $image_file = JPATH_ROOT.DS.$file_path.DS.'purchase.jpg';
		}
		
		//$pdf->setHeaderData('',0,$title,'header' );
		
		$lang = &JFactory::getLanguage();
		$font = $lang->getPdfFontName();		
		$font = ($font) ? $font : 'freesans';	
		
	    $pdf->setRTL($lang->isRTL());
		$pdf->setHeaderFont(array($font, '', 10));
		$pdf->setFooterFont(array($font, '', 8));

		// Initialize PDF Document
		$pdf->AliasNbPages();
		$pdf->AddPage();

		// Build the PDF Document string from the document buffer
		$this->fixLinks();
		$x='10';
		$y='10';
		$w='190px';
		$h='45px';
		$pdf->Image($image_file, $x, $y, $w, $h, 'JPG', '', '', true, 10, '', false, false, 1, false, false, false);
		$pdf->Link('130', '48', 70, 7, JURI::base());

		$pdf->WriteHTML($content, true);
if($rows[0]->title=="Prepare")
		{
			 
$pdf->Output(JPATH_ROOT.DS.$file_path.DS.'prepare.pdf', 'F');
			
		// Set document type headers
		$file =JPATH_ROOT.DS.$file_path.DS.'prepare.pdf';
		}
		if($rows[0]->title=="Protect")
		{
			 
$pdf->Output(JPATH_ROOT.DS.$file_path.DS.'protect.pdf', 'F');
			
		// Set document type headers
		$file =JPATH_ROOT.DS.$file_path.DS.'protect.pdf';
		}
		if($rows[0]->title=="Purchase")
		{
			
$pdf->Output(JPATH_ROOT.DS.$file_path.DS.'purchase.pdf', 'F');
			
		// Set document type headers
		$file =JPATH_ROOT.DS.$file_path.DS.'purchase.pdf';
		}
		
		  if (file_exists($file)) {
				header('Content-Description: File Transfer');				
				header('Content-Type: application/pdf');
				header('Content-Disposition: attachment; filename='.basename($file));
				header('Content-Transfer-Encoding: binary');
				header('Expires: 0');
				header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
				header('Pragma: public');
				header('Content-Length: ' . filesize($file));
				ob_clean();
				flush();
				readfile($file);
				mosChmod($file);
				unlink($file);	
				exit;
			}
		
		//Close and output PDF document
		
		
	
		
	}
function fixLinks()
	{

	}
	function setName($name = 'joomla') {
		$this->_name = $name;
	}

	/**
	 * Returns the document name
	 *
	 * @access public
	 * @return string
	 */
	function getName() {
		 $name		= 'joomla';
		return $name;
	}

	 /**
	 * Sets the document header string
	 *
	 * @param   string   $text	Document header string
	 * @access  public
	 * @return  void
	 */
	function setHeader($text) {
		$this->_header = $text;
	}

	/**
	 * Returns the document header string
	 *
	 * @access public
	 * @return string
	 */
	function getHeader() {
		return $this->_header;
	}	
}
