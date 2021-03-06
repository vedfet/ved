<?php
/**
 * Joomla! 1.5 component survey
 *
 * @version $Id: survey.php 2010-06-03 01:08:55 svn $
 * @author Kailash Pathak
 * @package Joomla
 * @subpackage survey
 * @license GNU/GPL
 *
 * It creates component for survey
 *
 */

defined( '_JEXEC' ) or die( 'Restricted access' );

jimport('joomla.application.component.controller');

//echo "helloo";exit;

JLoader::import("survey",SURVEY_ADMINPATH."/tables/");

class AdminSurveyController extends JController {
	var $component = null;
	var $surveyTable = null;
	var $surveyClassname = null;
	
	/**
	 * Controler for the Control Panel
	 * @param array		configuration
	 */
	function __construct($config = array())
	{
		parent::__construct($config);
		
		$this->registerTask( 'list', 'overview' );
		$this->registerDefaultTask("overview");
		
		$this->component = 	SURVEY_COM_COMPONENT;
		$this->nurseyTable = "#__survey";
		$this->surveyClassname = "TableSurvey";
		
	}

	/**
	 * Category Management code
	 *
	 * Author: Geraint Edwards
	 */
	/**
	 * Manage news - show lists
	 *
	 */
	function overview( )
	{
		global $mainframe,$option;
        $db		=& JFactory::getDBO();
		$uri	=& JFactory::getURI();
		$filter_catid		= $mainframe->getUserStateFromRequest( $option.'filter_catid',		'filter_catid',		0,				'int' );
		$filter_order		= $mainframe->getUserStateFromRequest( $option.'filter_order',		'filter_order',		'a.ordering',	'cmd' );
		$filter_order_Dir	= $mainframe->getUserStateFromRequest( $option.'filter_order_Dir',	'filter_order_Dir',	'',				'word' );
		$lists['catid'] = JHTML::_('list.category',  'filter_catid', $option, intval( $filter_catid ), $javascript );
        $lists['order_Dir'] = $filter_order_Dir;
		$lists['order'] = $filter_order;
			
		
		// TODO fix this when database is updated
		$db	=& JFactory::getDBO();
		$user =& JFactory::getUser();
		
		$archive=(int)$_REQUEST['archive'];
	    if (strtolower($user->usertype)!="super administrator" && strtolower($user->usertype)!="administrator"){
			$this->setRedirect( "index.php?option=$this->component&task=cpanel.cpanel", "Not Authorised - must be admin" );
			return;
		}

		$limit		= intval( $mainframe->getUserStateFromRequest( "listlimit", 'limit', 10 ));
		$limitstart = intval( $mainframe->getUserStateFromRequest( "{$this->component}limitstart", 'limitstart', 0 ));

				// get the total number of records
		//$query = "SELECT count(*) FROM $this->nurseyTable"
		//. "\n WHERE archive=$archive "	;
		$query="select * from #__survey";
		
		$db->setQuery( $query);
		$total = $db->loadResult();
		echo $db->getErrorMsg();
		if( $limit > $total ) {
			$limitstart = 0;
		}

		$db	=& JFactory::getDBO();

		//$sql = "SELECT c.* FROM $this->nurseyTable as c"
		//. "\n WHERE archive=$archive  "
		//. "\n ORDER BY ordering ";
		
		$sql="select * from #__survey" 
		. "\n ORDER BY ordering ";
		
		if ($limit>0){
			$sql .= "\n LIMIT $limitstart, $limit";
		}
		$db->setQuery( $sql);
	
		$row= $db->loadObjectlist();
	
		
		jimport('joomla.html.pagination');
		$pageNav = new JPagination( $total, $limitstart, $limit  );
    	// get the view
		$this->view = & $this->getView("survey","html");
		// Set the layout
		$this->view->setLayout('overview');
		//$items		= & $this->get( 'Data');
		//    $total		= & $this->get( 'Total');
		 //   $pagination = & $this->get( 'Pagination' );
		//$this->view->assign('user',		JFactory::getUser());
		//$this->view->assign('lists',		$lists);
		//$this->view->assign('items',		$items);
		//$this->view->assign('pagination',	$pagination);
		$this->view->assign('title'   , JText::_("Survey"));
		$this->view->assign('listsurvey',$row);
		
		$this->view->assign('pageNav',$pageNav);
		$this->view->display();

	}

	/**
	 * Category Editing code
	 *
	 * Author: Geraint Edwards
	 * 
	 */
	function edit(){
		$cid = JRequest::getVar(	'cid',	array(0) );
		JArrayHelper::toInteger($cid);
	    $uri =& JURI::getInstance();
		$params = &JComponentHelper::getParams( 'com_media' );                           
		$file_path=$params->get('file_path');
		$image_path=$params->get('image_path');
		
		
	//	$uri->root(); //root url
	//echo	$uri->base(); //		base url
//$uri->current(); //current url pathj

		// TODO fix this when database is updated
		$db =& JFactory::getDBO();
		if (count($cid)<=0){
			$this->setRedirect( "index.php?option=".SURVEY_COM_COMPONENT."&task=survey.list", "Invalid Category Selection" );
			return;
		}
		else {
			$cid=$cid[0];
		}
		
		$sql = "SELECT * FROM #__survey  where id=".$cid;
		
		$db->setQuery($sql);
		$rows = $db->loadObjectList();
	
	

		$sql = "SELECT * FROM #__survey_config";
		$db->setQuery($sql);
		$rows1 = $db->loadObjectList();
		
		
		
		$listsurvey = new $this->surveyClassname($db);
		$listsurvey->load($cid);
		
		$lists=array();
		$lists1=array();
		$lists2=array();
		$hour = $this->gethour();
		$minute = $this->getminute();
		$state = $this->getstate();
		
		list($y,$m,$d)=explode('-',$listsurvey->birth_date);
		
		list($shour,$sminute,$sec)=explode(':',$listsurvey->birth_time);
		
		$listsurvey->birth_date=$m.'/'.$d.'/'.$y;
		

		$lists['state'] = JHTML::_('select.genericlist',  $state, 'state', 'size ="1"' , 'value', 'text',$listsurvey->state);
		$lists1['hour'] = JHTML::_('select.genericlist',  $hour, 'hour', 'size ="1"' , 'value', 'text',$shour);
		$lists2['minute'] = JHTML::_('select.genericlist',  $minute, 'minute', 'size ="1"' , 'value', 'text',$sminute);
		
		
		if($listsurvey->birth_date=="//")
		{
			$listsurvey->birth_date="00/00/0000";
		}
	
		$files=array();
		
		$files[] = JHTML::_('select.option', 0, JText::_('Select'));
		$dir=trim(JPATH_BASE,"administrator");
		$current_dir=$dir.$file_path.'/survey';
		$this->getSurveyfile_path('',$current_dir,$files);
		$lists['survey_name']=JHTML::_('select.genericlist',  $files, 'survey_name', 'id="files" class="inputbox"  size="1" onchange="changeSurveyPlay();"' , 'value', 'text',$rows[0]->survey_name);
		// get news for parent info
		// authorised user to select admin
		$params = JComponentHelper::getParams("com_survey");
		
		
		
		// get the view
		$this->view = & $this->getView("survey","html");

		// Set the layout
		$this->view->setLayout('edit');
		
		$this->view->assign('title'   , JText::_("Survey Details"));
		$this->view->assign('listsurvey', $listsurvey);
		$this->view->assign('lists',$lists);	
		
		$this->view->assign('lists1',$lists1);
		$this->view->assign('file_path',$file_path);
		$this->view->assign('listsurveyconfig',$rows1);
		$this->view->display();
	}
     
	 
	function getstate()
	   {
		$state = array();
		$state[] = JHTML::_('select.option', '', JText::_('Select'));
		$state[] = JHTML::_('select.option', 'AK', JText::_('AK'));
		$state[] = JHTML::_('select.option', 'AL', JText::_('AL'));
		$state[] = JHTML::_('select.option', 'AR', JText::_('AR'));
		$state[] = JHTML::_('select.option', 'AZ', JText::_('AZ'));
		$state[] = JHTML::_('select.option', 'CA', JText::_('CA'));
		$state[] = JHTML::_('select.option', 'CO', JText::_('CO'));
		$state[] = JHTML::_('select.option', 'CT', JText::_('CT'));
		$state[] = JHTML::_('select.option', 'DE', JText::_('DE'));
		$state[] = JHTML::_('select.option', 'DC', JText::_('DC'));
		$state[] = JHTML::_('select.option', 'FL', JText::_('FL'));
		$state[] = JHTML::_('select.option', 'GA', JText::_('GA'));
		$state[] = JHTML::_('select.option', 'HI', JText::_('HI'));
		$state[] = JHTML::_('select.option', 'IA', JText::_('IA'));
		$state[] = JHTML::_('select.option', 'ID', JText::_('ID'));
		$state[] = JHTML::_('select.option', 'IL', JText::_('IL'));
		$state[] = JHTML::_('select.option', 'IN', JText::_('IN'));
		$state[] = JHTML::_('select.option', 'KS', JText::_('KS'));
		$state[] = JHTML::_('select.option', 'KY', JText::_('KY'));
		$state[] = JHTML::_('select.option', 'LA', JText::_('LA'));
		$state[] = JHTML::_('select.option', 'MA', JText::_('MA'));
		$state[] = JHTML::_('select.option', 'MD', JText::_('MD'));
		$state[] = JHTML::_('select.option', 'ME', JText::_('ME'));
		$state[] = JHTML::_('select.option', 'MI', JText::_('MI'));
		$state[] = JHTML::_('select.option', 'MN', JText::_('MN'));
		$state[] = JHTML::_('select.option', 'MO', JText::_('MO'));
		$state[] = JHTML::_('select.option', 'MS', JText::_('MS'));
		$state[] = JHTML::_('select.option', 'MT', JText::_('MT'));
		$state[] = JHTML::_('select.option', 'NC', JText::_('NC'));
		$state[] = JHTML::_('select.option', 'ND', JText::_('ND'));
		$state[] = JHTML::_('select.option', 'NE', JText::_('NE'));
		$state[] = JHTML::_('select.option', 'NH', JText::_('NH'));
		$state[] = JHTML::_('select.option', 'NJ', JText::_('NJ'));
		$state[] = JHTML::_('select.option', 'NM', JText::_('NM'));
		$state[] = JHTML::_('select.option', 'NV', JText::_('NV'));
		$state[] = JHTML::_('select.option', 'NY', JText::_('NY'));
		$state[] = JHTML::_('select.option', 'OH', JText::_('OH'));
		$state[] = JHTML::_('select.option', 'OK', JText::_('OK'));
		$state[] = JHTML::_('select.option', 'OR', JText::_('OR'));
		$state[] = JHTML::_('select.option', 'PA', JText::_('PA'));
		$state[] = JHTML::_('select.option', 'RI', JText::_('RI'));
		$state[] = JHTML::_('select.option', 'SC', JText::_('SC'));
		$state[] = JHTML::_('select.option', 'SD', JText::_('SD'));
		$state[] = JHTML::_('select.option', 'TN', JText::_('TN'));
		$state[] = JHTML::_('select.option', 'TX', JText::_('TX'));
		$state[] = JHTML::_('select.option', 'UT', JText::_('UT'));
		$state[] = JHTML::_('select.option', 'VA', JText::_('VA'));
		$state[] = JHTML::_('select.option', 'VT', JText::_('VT'));
		$state[] = JHTML::_('select.option', 'MT', JText::_('MT'));
		$state[] = JHTML::_('select.option', 'WA', JText::_('WA'));
		$state[] = JHTML::_('select.option', 'WI', JText::_('WI'));
		$state[] = JHTML::_('select.option', 'WV', JText::_('WV'));
		$state[] = JHTML::_('select.option', 'WY', JText::_('WY'));
		
		return $state;
	   }

       function gethour()
	   {
		$hour = array();
		$hour[] = JHTML::_('select.option', '', JText::_('Select'));
		$hour[] = JHTML::_('select.option', '01', JText::_('01'));
		$hour[] = JHTML::_('select.option', '02', JText::_('02'));
		$hour[] = JHTML::_('select.option', '03', JText::_('03'));
		$hour[] = JHTML::_('select.option', '04', JText::_('04'));
		$hour[] = JHTML::_('select.option', '05', JText::_('05'));
		$hour[] = JHTML::_('select.option', '06', JText::_('06'));
		$hour[] = JHTML::_('select.option', '07', JText::_('07'));
		$hour[] = JHTML::_('select.option', '08', JText::_('08'));
		$hour[] = JHTML::_('select.option', '09', JText::_('09'));

		$hour[] = JHTML::_('select.option', '10', JText::_('10'));
		$hour[] = JHTML::_('select.option', '11', JText::_('11'));
		$hour[] = JHTML::_('select.option', '12', JText::_('12'));
        return $hour;
	   }
	   
	   function getminute()
	   {
		$minute = array();
		$minute[] = JHTML::_('select.option', '', JText::_('Select'));
		$minute[] = JHTML::_('select.option', '01', JText::_('01'));
		$minute[] = JHTML::_('select.option', '02', JText::_('02'));
		$minute[] = JHTML::_('select.option', '03', JText::_('03'));
		$minute[] = JHTML::_('select.option', '04', JText::_('04'));
		$minute[] = JHTML::_('select.option', '05', JText::_('05'));
		$minute[] = JHTML::_('select.option', '06', JText::_('06'));
		$minute[] = JHTML::_('select.option', '07', JText::_('07'));
		$minute[] = JHTML::_('select.option', '08', JText::_('08'));
		$minute[] = JHTML::_('select.option', '09', JText::_('09'));
		$minute[] = JHTML::_('select.option', '10', JText::_('10'));
		$minute[] = JHTML::_('select.option', '11', JText::_('11'));
		$minute[] = JHTML::_('select.option', '12', JText::_('12'));
		$minute[] = JHTML::_('select.option', '13', JText::_('13'));
		$minute[] = JHTML::_('select.option', '14', JText::_('14'));
		$minute[] = JHTML::_('select.option', '15', JText::_('15'));
		$minute[] = JHTML::_('select.option', '16', JText::_('16'));
		$minute[] = JHTML::_('select.option', '17', JText::_('17'));
		$minute[] = JHTML::_('select.option', '18', JText::_('18'));
		$minute[] = JHTML::_('select.option', '19', JText::_('19'));
		$minute[] = JHTML::_('select.option', '20', JText::_('20'));
		$minute[] = JHTML::_('select.option', '21', JText::_('21'));
		$minute[] = JHTML::_('select.option', '22', JText::_('22'));
		$minute[] = JHTML::_('select.option', '23', JText::_('23'));
		$minute[] = JHTML::_('select.option', '24', JText::_('24'));
		$minute[] = JHTML::_('select.option', '25', JText::_('25'));
		$minute[] = JHTML::_('select.option', '26', JText::_('26'));
		$minute[] = JHTML::_('select.option', '27', JText::_('27'));
		$minute[] = JHTML::_('select.option', '28', JText::_('28'));
		$minute[] = JHTML::_('select.option', '29', JText::_('29'));
		$minute[] = JHTML::_('select.option', '30', JText::_('30'));
		$minute[] = JHTML::_('select.option', '31', JText::_('31'));
		$minute[] = JHTML::_('select.option', '32', JText::_('32'));
		$minute[] = JHTML::_('select.option', '33', JText::_('33'));
		$minute[] = JHTML::_('select.option', '34', JText::_('34'));
		$minute[] = JHTML::_('select.option', '35', JText::_('35'));
		$minute[] = JHTML::_('select.option', '36', JText::_('36'));
		$minute[] = JHTML::_('select.option', '37', JText::_('37'));
		$minute[] = JHTML::_('select.option', '38', JText::_('38'));
		$minute[] = JHTML::_('select.option', '39', JText::_('39'));
		$minute[] = JHTML::_('select.option', '40', JText::_('40'));
		$minute[] = JHTML::_('select.option', '41', JText::_('41'));
		$minute[] = JHTML::_('select.option', '42', JText::_('42'));
		$minute[] = JHTML::_('select.option', '43', JText::_('43'));
		$minute[] = JHTML::_('select.option', '44', JText::_('44'));
		$minute[] = JHTML::_('select.option', '45', JText::_('45'));
		$minute[] = JHTML::_('select.option', '46', JText::_('46'));
		$minute[] = JHTML::_('select.option', '47', JText::_('47'));
		$minute[] = JHTML::_('select.option', '48', JText::_('48'));
		$minute[] = JHTML::_('select.option', '49', JText::_('49'));
		$minute[] = JHTML::_('select.option', '50', JText::_('50'));
		$minute[] = JHTML::_('select.option', '51', JText::_('51'));
		$minute[] = JHTML::_('select.option', '52', JText::_('52'));
		$minute[] = JHTML::_('select.option', '53', JText::_('53'));
		$minute[] = JHTML::_('select.option', '54', JText::_('54'));
		$minute[] = JHTML::_('select.option', '55', JText::_('55'));
		$minute[] = JHTML::_('select.option', '56', JText::_('56'));
		$minute[] = JHTML::_('select.option', '57', JText::_('57'));
		$minute[] = JHTML::_('select.option', '58', JText::_('58'));
		$minute[] = JHTML::_('select.option', '59', JText::_('59'));
		return $minute;
	   }

    function view(){
		$cid = JRequest::getVar(	'cid',	array(0) );
		JArrayHelper::toInteger($cid);
	 	// TODO fix this when database is updated
		$db =& JFactory::getDBO();
		if (count($cid)<=0){
			$this->setRedirect( "index.php?option=".SURVEY_COM_COMPONENT."&task=survey.list&archive=-1", "Invalid Category Selection" );
			return;
		}
		else {
			$cid=$cid[0];
		}
		$lists=array();
	    $listsurvey = new $this->surveyClassname($db);
		$listsurvey->load($cid);
	    $params = JComponentHelper::getParams("com_survey");
		$this->view = & $this->getView("survey","html");
    	$this->view->setLayout('View');
		$this->view->assign('title'   , JText::_("Children Details"));
		$this->view->assign('listsurvey', $listsurvey);
		$this->view->assign('lists',$lists);	
		$this->view->display();
	}

	/**
	 * Category Saving code
	 *
	 * Author: Geraint Edwards
	 * 
	 */
	function save(){
		
		
		$user =& JFactory::getUser();
        $cid = JRequest::getVar('id',	0 );
		$id=$_GET['id'];
		$db	=& JFactory::getDBO();
		

		if (strtolower($user->usertype)!="super administrator" && strtolower($user->usertype)!="administrator"){
			$this->setRedirect( "index.php?option=$this->component&task=cpanel.cpanel", "Not Authorised - must be admin" );
			return;
		}
        $post = JRequest::get('post');
		

		$model = $this->getModel('survey');
		if($model->save($post)) 
		{
			$msg = JText::_('Survey Saved'); 
			$this->setRedirect("index.php?option=".SURVEY_COM_COMPONENT."&task=survey.list",$msg);
		} 
	    else
		{
		  	$msg = JText::_('Survey Not Saved'); 
			$this->setRedirect("index.php?option=".SURVEY_COM_COMPONENT."&task=survey.list",$msg);
		}
	
	}

	/**
	 * Category Ordering code
	 *
	 * Author: Geraint Edwards
	 * Copyright: 2007 Geraint Edwards
	 * 
	 */
	function saveorder(){

		$user =& JFactory::getUser();
		if (strtolower($user->usertype)!="super administrator" && strtolower($user->usertype)!="administrator"){
			$this->setRedirect( "index.php?option=$this->component&task=cpanel.cpanel", "Not Authorised - must be admin" );
			return;
		}
		$post = JRequest::get('post');

		$model = $this->getModel('survey');
		if ($model->saveorder()) 
		{
			$msg = JText::_( 'NEW ORDERING SAVED' );
		}
		$this->setRedirect("index.php?option=".SURVEY_COM_COMPONENT."&task=survey.list",$msg);
	}

	/**
	 * Category Deletion code
	 *
	 * Author: Geraint Edwards
	 * 
	 */	
	function delete(){
	    $post = JRequest::get('post');
		$model = $this->getModel('survey');
		$archive=$_POST[archive];
		if($model->delete($post)) 
		{
			$msg = JText::_('Record Successfully Deleted');
			if($archive==-1){ 
			$this->setRedirect("index.php?option=".SURVEY_COM_COMPONENT."&task=survey.list&archive=-1",$msg);
			}
			else
			{
			$this->setRedirect("index.php?option=".SURVEY_COM_COMPONENT."&task=survey.list",$msg);
			}
		} 
	    else
		{
		  	$msg = JText::_('Not able to Delete'); 
			if($archive==-1){ 
			$this->setRedirect("index.php?option=".SURVEY_COM_COMPONENT."&task=survey.list&archive=-1",$msg);
			}
			else
			{
			$this->setRedirect("index.php?option=".SURVEY_COM_COMPONENT."&task=survey.list",$msg);
			}
		}
	}

    function orderup()
	{
		$model = $this->getModel('survey');
		$model->move(-1);
		$this->setRedirect("index.php?option=".SURVEY_COM_COMPONENT."&task=survey.list");
	}
	
	function orderdown()
	{
		$model = $this->getModel('survey');
		$model->move(1);
		$this->setRedirect("index.php?option=".SURVEY_COM_COMPONENT."&task=survey.list");
	}
	
	function publish(){
		$model = $this->getModel('survey');
		$model->publish(1); 
		$this->setRedirect("index.php?option=".SURVEY_COM_COMPONENT."&task=survey.list");

	}

	function unpublish(){
	    $model = $this->getModel('survey');
		$model->publish(0); 
		$this->setRedirect("index.php?option=".SURVEY_COM_COMPONENT."&task=survey.list");
	}
	function archive(){
		$model = $this->getModel('survey');
		$model->archive(-1); 
		$this->setRedirect("index.php?option=".SURVEY_COM_COMPONENT."&task=survey.list");

	}
	function unarchive(){
	    $model = $this->getModel('survey');
		$model->archive(0); 
		$this->setRedirect("index.php?option=".SURVEY_COM_COMPONENT."&task=survey.list&archive=-1");
	}
			
	function getSurveyfile_path($original_dir,$current_dir,&$files){
		 //$dir=opendir($current_dir);
		 // while($file=readdir($dir)){
		 while($file=($dir)){
		  if ($file!="." and $file!=".."){
		   $vidfile=$file; 
		   $thumbdir="_thumbs";
		   if ($vidfile!=$thumbdir){
			$fullfile=$current_dir."/".$vidfile;
			if (!is_dir($fullfile)){
			 
				 $files[] = JHTML::_('select.option', $original_dir . $vidfile, $original_dir . $vidfile);
			 
			}else{
			 
			 $this->getSurveyfile_path($vidfile.'/',$fullfile,$files);
			}
		   }
		  }
		 }
		 //closedir($dir);
		}

}
