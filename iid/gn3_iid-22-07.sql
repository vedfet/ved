-- MySQL dump 10.11
--
-- Host: localhost    Database: gn3_iid
-- ------------------------------------------------------
-- Server version	5.0.45-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `jos_banner`
--

DROP TABLE IF EXISTS `jos_banner`;
CREATE TABLE `jos_banner` (
  `bid` int(11) NOT NULL auto_increment,
  `cid` int(11) NOT NULL default '0',
  `type` varchar(30) NOT NULL default 'banner',
  `name` varchar(255) NOT NULL default '',
  `alias` varchar(255) NOT NULL default '',
  `imptotal` int(11) NOT NULL default '0',
  `impmade` int(11) NOT NULL default '0',
  `clicks` int(11) NOT NULL default '0',
  `imageurl` varchar(100) NOT NULL default '',
  `clickurl` varchar(200) NOT NULL default '',
  `date` datetime default NULL,
  `showBanner` tinyint(1) NOT NULL default '0',
  `checked_out` tinyint(1) NOT NULL default '0',
  `checked_out_time` datetime NOT NULL default '0000-00-00 00:00:00',
  `editor` varchar(50) default NULL,
  `custombannercode` text,
  `catid` int(10) unsigned NOT NULL default '0',
  `description` text NOT NULL,
  `sticky` tinyint(1) unsigned NOT NULL default '0',
  `ordering` int(11) NOT NULL default '0',
  `publish_up` datetime NOT NULL default '0000-00-00 00:00:00',
  `publish_down` datetime NOT NULL default '0000-00-00 00:00:00',
  `tags` text NOT NULL,
  `params` text NOT NULL,
  PRIMARY KEY  (`bid`),
  KEY `viewbanner` (`showBanner`),
  KEY `idx_banner_catid` (`catid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jos_banner`
--

LOCK TABLES `jos_banner` WRITE;
/*!40000 ALTER TABLE `jos_banner` DISABLE KEYS */;
/*!40000 ALTER TABLE `jos_banner` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jos_bannerclient`
--

DROP TABLE IF EXISTS `jos_bannerclient`;
CREATE TABLE `jos_bannerclient` (
  `cid` int(11) NOT NULL auto_increment,
  `name` varchar(255) NOT NULL default '',
  `contact` varchar(255) NOT NULL default '',
  `email` varchar(255) NOT NULL default '',
  `extrainfo` text NOT NULL,
  `checked_out` tinyint(1) NOT NULL default '0',
  `checked_out_time` time default NULL,
  `editor` varchar(50) default NULL,
  PRIMARY KEY  (`cid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jos_bannerclient`
--

LOCK TABLES `jos_bannerclient` WRITE;
/*!40000 ALTER TABLE `jos_bannerclient` DISABLE KEYS */;
/*!40000 ALTER TABLE `jos_bannerclient` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jos_bannertrack`
--

DROP TABLE IF EXISTS `jos_bannertrack`;
CREATE TABLE `jos_bannertrack` (
  `track_date` date NOT NULL,
  `track_type` int(10) unsigned NOT NULL,
  `banner_id` int(10) unsigned NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jos_bannertrack`
--

LOCK TABLES `jos_bannertrack` WRITE;
/*!40000 ALTER TABLE `jos_bannertrack` DISABLE KEYS */;
/*!40000 ALTER TABLE `jos_bannertrack` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jos_captcha`
--

DROP TABLE IF EXISTS `jos_captcha`;
CREATE TABLE `jos_captcha` (
  `id` int(11) NOT NULL auto_increment,
  `captcha_value` varchar(255) NOT NULL,
  `captcha_hash` varchar(255) NOT NULL,
  `created` datetime NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9481 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jos_captcha`
--

LOCK TABLES `jos_captcha` WRITE;
/*!40000 ALTER TABLE `jos_captcha` DISABLE KEYS */;
INSERT INTO `jos_captcha` VALUES (9475,'sbnz5y','56a04f2887615fa58acb4915b3cf64d9','2013-08-21 16:40:28'),(9476,'66p56d','bde0a336b31ed68737666ec48c715d91','2013-08-21 17:59:45'),(9477,'vnjpb5','33d3d5b3ee3b2299be317362bfbba15f','2013-08-21 18:08:48'),(9478,'zpg337','d212aaf72e51eddd35e096fba14a3275','2013-08-21 19:29:19'),(9479,'tz4dy4','2b73e9ccbbed2486d2dec8e70d52c898','2013-08-21 22:14:22'),(9480,'sxtsww','29b7b68c51bc97eb0f7248960df452f7','2013-08-22 00:50:35'),(9471,'2bcvr2','ade7eb927a6f853d80e8168fe3533620','2013-08-21 14:18:32'),(9472,'643wqq','1cc20b327482a5303541966cfef881c0','2013-08-21 14:18:35'),(9473,'vfxbty','8f3c36dad87f085820f400d1ec1c673a','2013-08-21 14:18:49'),(9474,'j8tz9v','37497c0c097af04ee2c0a3fb1b4cf3e5','2013-08-21 14:18:58');
/*!40000 ALTER TABLE `jos_captcha` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jos_categories`
--

DROP TABLE IF EXISTS `jos_categories`;
CREATE TABLE `jos_categories` (
  `id` int(11) NOT NULL auto_increment,
  `parent_id` int(11) NOT NULL default '0',
  `title` varchar(255) NOT NULL default '',
  `name` varchar(255) NOT NULL default '',
  `alias` varchar(255) NOT NULL default '',
  `image` varchar(255) NOT NULL default '',
  `section` varchar(50) NOT NULL default '',
  `image_position` varchar(30) NOT NULL default '',
  `description` text NOT NULL,
  `published` tinyint(1) NOT NULL default '0',
  `checked_out` int(11) unsigned NOT NULL default '0',
  `checked_out_time` datetime NOT NULL default '0000-00-00 00:00:00',
  `editor` varchar(50) default NULL,
  `ordering` int(11) NOT NULL default '0',
  `access` tinyint(3) unsigned NOT NULL default '0',
  `count` int(11) NOT NULL default '0',
  `params` text NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `cat_idx` (`section`,`published`,`access`),
  KEY `idx_access` (`access`),
  KEY `idx_checkout` (`checked_out`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jos_categories`
--

LOCK TABLES `jos_categories` WRITE;
/*!40000 ALTER TABLE `jos_categories` DISABLE KEYS */;
INSERT INTO `jos_categories` VALUES (1,0,'General','','general','','1','left','',1,0,'0000-00-00 00:00:00',NULL,1,0,0,'');
/*!40000 ALTER TABLE `jos_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jos_components`
--

DROP TABLE IF EXISTS `jos_components`;
CREATE TABLE `jos_components` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(50) NOT NULL default '',
  `link` varchar(255) NOT NULL default '',
  `menuid` int(11) unsigned NOT NULL default '0',
  `parent` int(11) unsigned NOT NULL default '0',
  `admin_menu_link` varchar(255) NOT NULL default '',
  `admin_menu_alt` varchar(255) NOT NULL default '',
  `option` varchar(50) NOT NULL default '',
  `ordering` int(11) NOT NULL default '0',
  `admin_menu_img` varchar(255) NOT NULL default '',
  `iscore` tinyint(4) NOT NULL default '0',
  `params` text NOT NULL,
  `enabled` tinyint(4) NOT NULL default '1',
  PRIMARY KEY  (`id`),
  KEY `parent_option` (`parent`,`option`(32))
) ENGINE=MyISAM AUTO_INCREMENT=75 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jos_components`
--

LOCK TABLES `jos_components` WRITE;
/*!40000 ALTER TABLE `jos_components` DISABLE KEYS */;
INSERT INTO `jos_components` VALUES (1,'Banners','',0,0,'','Banner Management','com_banners',0,'js/ThemeOffice/component.png',0,'track_impressions=0\ntrack_clicks=0\ntag_prefix=\n\n',1),(2,'Banners','',0,1,'option=com_banners','Active Banners','com_banners',1,'js/ThemeOffice/edit.png',0,'',1),(3,'Clients','',0,1,'option=com_banners&c=client','Manage Clients','com_banners',2,'js/ThemeOffice/categories.png',0,'',1),(4,'Web Links','option=com_weblinks',0,0,'','Manage Weblinks','com_weblinks',0,'js/ThemeOffice/component.png',0,'show_comp_description=1\ncomp_description=\nshow_link_hits=1\nshow_link_description=1\nshow_other_cats=1\nshow_headings=1\nshow_page_title=1\nlink_target=0\nlink_icons=\n\n',1),(5,'Links','',0,4,'option=com_weblinks','View existing weblinks','com_weblinks',1,'js/ThemeOffice/edit.png',0,'',1),(6,'Categories','',0,4,'option=com_categories&section=com_weblinks','Manage weblink categories','',2,'js/ThemeOffice/categories.png',0,'',1),(7,'Contacts','option=com_contact',0,0,'','Edit contact details','com_contact',0,'js/ThemeOffice/component.png',1,'contact_icons=0\nicon_address=\nicon_email=\nicon_telephone=\nicon_fax=\nicon_misc=\nshow_headings=1\nshow_position=1\nshow_email=0\nshow_telephone=1\nshow_mobile=1\nshow_fax=1\nbannedEmail=\nbannedSubject=\nbannedText=\nsession=1\ncustomReply=0\n\n',1),(8,'Contacts','',0,7,'option=com_contact','Edit contact details','com_contact',0,'js/ThemeOffice/edit.png',1,'',1),(9,'Categories','',0,7,'option=com_categories&section=com_contact_details','Manage contact categories','',2,'js/ThemeOffice/categories.png',1,'contact_icons=0\nicon_address=\nicon_email=\nicon_telephone=\nicon_fax=\nicon_misc=\nshow_headings=1\nshow_position=1\nshow_email=0\nshow_telephone=1\nshow_mobile=1\nshow_fax=1\nbannedEmail=\nbannedSubject=\nbannedText=\nsession=1\ncustomReply=0\n\n',1),(10,'Polls','option=com_poll',0,0,'option=com_poll','Manage Polls','com_poll',0,'js/ThemeOffice/component.png',0,'',1),(11,'News Feeds','option=com_newsfeeds',0,0,'','News Feeds Management','com_newsfeeds',0,'js/ThemeOffice/component.png',0,'',1),(12,'Feeds','',0,11,'option=com_newsfeeds','Manage News Feeds','com_newsfeeds',1,'js/ThemeOffice/edit.png',0,'show_headings=1\nshow_name=1\nshow_articles=1\nshow_link=1\nshow_cat_description=1\nshow_cat_items=1\nshow_feed_image=1\nshow_feed_description=1\nshow_item_description=1\nfeed_word_count=0\n\n',1),(13,'Categories','',0,11,'option=com_categories&section=com_newsfeeds','Manage Categories','',2,'js/ThemeOffice/categories.png',0,'',1),(14,'User','option=com_user',0,0,'','','com_user',0,'',1,'',1),(15,'Search','option=com_search',0,0,'option=com_search','Search Statistics','com_search',0,'js/ThemeOffice/component.png',1,'enabled=0\n\n',1),(16,'Categories','',0,1,'option=com_categories&section=com_banner','Categories','',3,'',1,'',1),(17,'Wrapper','option=com_wrapper',0,0,'','Wrapper','com_wrapper',0,'',1,'',1),(18,'Mail To','',0,0,'','','com_mailto',0,'',1,'',1),(19,'Media Manager','',0,0,'option=com_media','Media Manager','com_media',0,'',1,'upload_extensions=bmp,csv,doc,epg,gif,ico,jpg,odg,odp,ods,flv,odt,pdf,png,ppt,swf,txt,xcf,xls,BMP,CSV,DOC,EPG,GIF,ICO,JPG,ODG,ODP,ODS,ODT,PDF,PNG,PPT,SWF,TXT,XCF,XLS\nupload_maxsize=10000000\nfile_path=images/iid_images\nimage_path=images/iid_images/stories\nrestrict_uploads=1\nallowed_media_usergroup=3\ncheck_mime=1\nimage_extensions=bmp,gif,jpg,png\nignore_extensions=\nupload_mime=image/jpeg,image/gif,image/png,image/bmp,application/x-shockwave-flash,application/msword,application/excel,application/pdf,application/powerpoint,text/plain,application/x-zip\nupload_mime_illegal=text/html\nenable_flash=0\n\n',1),(20,'Articles','option=com_content',0,0,'','','com_content',0,'',1,'show_noauth=0\nshow_title=1\nlink_titles=0\nshow_intro=0\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_author=0\nshow_create_date=0\nshow_modify_date=0\nshow_item_navigation=0\nshow_readmore=0\nshow_vote=0\nshow_icons=0\nshow_pdf_icon=0\nshow_print_icon=0\nshow_email_icon=0\nshow_hits=0\nfeed_summary=0\nfilter_tags=\nfilter_attritbutes=\n\n',1),(21,'Configuration Manager','',0,0,'','Configuration','com_config',0,'',1,'',1),(22,'Installation Manager','',0,0,'','Installer','com_installer',0,'',1,'',1),(23,'Language Manager','',0,0,'','Languages','com_languages',0,'',1,'',1),(24,'Mass mail','',0,0,'','Mass Mail','com_massmail',0,'',1,'mailSubjectPrefix=\nmailBodySuffix=\n\n',1),(25,'Menu Editor','',0,0,'','Menu Editor','com_menus',0,'',1,'',1),(27,'Messaging','',0,0,'','Messages','com_messages',0,'',1,'',1),(28,'Modules Manager','',0,0,'','Modules','com_modules',0,'',1,'',1),(29,'Plugin Manager','',0,0,'','Plugins','com_plugins',0,'',1,'',1),(30,'Template Manager','',0,0,'','Templates','com_templates',0,'',1,'',1),(31,'User Manager','',0,0,'','Users','com_users',0,'',1,'allowUserRegistration=1\nnew_usertype=Registered\nuseractivation=1\nfrontend_userparams=1\n\n',1),(32,'Cache Manager','',0,0,'','Cache','com_cache',0,'',1,'',1),(33,'Control Panel','',0,0,'','Control Panel','com_cpanel',0,'',1,'',1),(35,'Web Video','option=com_video',0,0,'option=com_video','Web Video','com_video',0,'js/ThemeOffice/component.png',0,'',1),(36,'Video Manager','',0,35,'option=com_video','Video Manager','com_video',0,'js/ThemeOffice/component.png',0,'',1),(37,'News','option=com_news',0,0,'option=com_news','News','com_news',0,'js/ThemeOffice/component.png',0,'',1),(38,'News','',0,37,'option=com_news','News','com_news',0,'js/ThemeOffice/component.png',0,'',1),(66,'JCE','option=com_jce',0,0,'option=com_jce','JCE','com_jce',0,'components/com_jce/img/logo.png',0,'\npackage=1',1),(67,'JCE MENU CPANEL','',0,66,'option=com_jce','JCE MENU CPANEL','com_jce',0,'templates/khepri/images/menu/icon-16-cpanel.png',0,'',1),(43,'homegallery','option=com_homegallery',0,0,'option=com_homegallery','homegallery','com_homegallery',0,'js/ThemeOffice/component.png',0,'',1),(44,'homegallery','',0,43,'option=com_homegallery','homegallery','com_homegallery',0,'js/ThemeOffice/component.png',0,'',1),(48,'Web Survey','option=com_survey',0,0,'option=com_survey','Web Survey','com_survey',0,'js/ThemeOffice/component.png',0,'',1),(49,'Survey Manager','',0,48,'option=com_survey','Survey Manager','com_survey',0,'js/ThemeOffice/component.png',0,'',1),(47,'','option=com_pdfgen',0,0,'option=com_pdfgen','PDFGen','com_pdfgen',0,'js/ThemeOffice/component.png',0,'',1),(64,'iidtestimonial','option=com_iidtestimonial',0,0,'option=com_iidtestimonial','iidtestimonial','com_iidtestimonial',0,'js/ThemeOffice/component.png',0,'',1),(65,'iidtestimonial','',0,64,'option=com_iidtestimonial','iidtestimonial','com_iidtestimonial',0,'js/ThemeOffice/component.png',0,'',1),(68,'JCE MENU CONFIG','',0,66,'option=com_jce&type=config','JCE MENU CONFIG','com_jce',1,'templates/khepri/images/menu/icon-16-config.png',0,'',1),(69,'JCE MENU GROUPS','',0,66,'option=com_jce&type=group','JCE MENU GROUPS','com_jce',2,'templates/khepri/images/menu/icon-16-user.png',0,'',1),(70,'JCE MENU PLUGINS','',0,66,'option=com_jce&type=plugin','JCE MENU PLUGINS','com_jce',3,'templates/khepri/images/menu/icon-16-plugin.png',0,'',1),(71,'JCE MENU INSTALL','',0,66,'option=com_jce&type=install','JCE MENU INSTALL','com_jce',4,'templates/khepri/images/menu/icon-16-install.png',0,'',1);
/*!40000 ALTER TABLE `jos_components` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jos_contact_details`
--

DROP TABLE IF EXISTS `jos_contact_details`;
CREATE TABLE `jos_contact_details` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(255) NOT NULL default '',
  `alias` varchar(255) NOT NULL default '',
  `con_position` varchar(255) default NULL,
  `address` text,
  `suburb` varchar(100) default NULL,
  `state` varchar(100) default NULL,
  `country` varchar(100) default NULL,
  `postcode` varchar(100) default NULL,
  `telephone` varchar(255) default NULL,
  `fax` varchar(255) default NULL,
  `misc` mediumtext,
  `image` varchar(255) default NULL,
  `imagepos` varchar(20) default NULL,
  `email_to` varchar(255) default NULL,
  `default_con` tinyint(1) unsigned NOT NULL default '0',
  `published` tinyint(1) unsigned NOT NULL default '0',
  `checked_out` int(11) unsigned NOT NULL default '0',
  `checked_out_time` datetime NOT NULL default '0000-00-00 00:00:00',
  `ordering` int(11) NOT NULL default '0',
  `params` text NOT NULL,
  `user_id` int(11) NOT NULL default '0',
  `catid` int(11) NOT NULL default '0',
  `access` tinyint(3) unsigned NOT NULL default '0',
  `mobile` varchar(255) NOT NULL default '',
  `webpage` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`id`),
  KEY `catid` (`catid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jos_contact_details`
--

LOCK TABLES `jos_contact_details` WRITE;
/*!40000 ALTER TABLE `jos_contact_details` DISABLE KEYS */;
/*!40000 ALTER TABLE `jos_contact_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jos_content`
--

DROP TABLE IF EXISTS `jos_content`;
CREATE TABLE `jos_content` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `title` varchar(255) NOT NULL default '',
  `alias` varchar(255) NOT NULL default '',
  `title_alias` varchar(255) NOT NULL default '',
  `introtext` mediumtext NOT NULL,
  `fulltext` mediumtext NOT NULL,
  `state` tinyint(3) NOT NULL default '0',
  `sectionid` int(11) unsigned NOT NULL default '0',
  `mask` int(11) unsigned NOT NULL default '0',
  `catid` int(11) unsigned NOT NULL default '0',
  `created` datetime NOT NULL default '0000-00-00 00:00:00',
  `created_by` int(11) unsigned NOT NULL default '0',
  `created_by_alias` varchar(255) NOT NULL default '',
  `modified` datetime NOT NULL default '0000-00-00 00:00:00',
  `modified_by` int(11) unsigned NOT NULL default '0',
  `checked_out` int(11) unsigned NOT NULL default '0',
  `checked_out_time` datetime NOT NULL default '0000-00-00 00:00:00',
  `publish_up` datetime NOT NULL default '0000-00-00 00:00:00',
  `publish_down` datetime NOT NULL default '0000-00-00 00:00:00',
  `images` text NOT NULL,
  `urls` text NOT NULL,
  `attribs` text NOT NULL,
  `version` int(11) unsigned NOT NULL default '1',
  `parentid` int(11) unsigned NOT NULL default '0',
  `ordering` int(11) NOT NULL default '0',
  `metakey` text NOT NULL,
  `metadesc` text NOT NULL,
  `access` int(11) unsigned NOT NULL default '0',
  `hits` int(11) unsigned NOT NULL default '0',
  `metadata` text NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `idx_section` (`sectionid`),
  KEY `idx_access` (`access`),
  KEY `idx_checkout` (`checked_out`),
  KEY `idx_state` (`state`),
  KEY `idx_catid` (`catid`),
  KEY `idx_createdby` (`created_by`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jos_content`
--

LOCK TABLES `jos_content` WRITE;
/*!40000 ALTER TABLE `jos_content` DISABLE KEYS */;
INSERT INTO `jos_content` VALUES (1,'About Us','about-us','','<p>The <a href=\"http://www.iid.state.ia.us/about_us/index.asp\" target=\"_blank\" title=\"Iowa Insurance Division\">Iowa Insurance Division</a>, the <a href=\"http://www.iowadnr.gov/\" target=\"_blank\" title=\"Iowa Department of Natural Resources\">Iowa Department of Natural Resources</a>, the <a href=\"http://www.iowahomelandsecurity.org/\" target=\"_blank\" title=\"Iowa Homeland Security and Emergency Management Division \">Iowa Homeland Security and Emergency Management Division</a> and the <a href=\"http://www.rio.iowa.gov/\" target=\"_blank\" title=\"Rebuild Iowa Office\">Rebuild Iowa Office</a> have combined expertise in an effort to better serve and inform Iowans of flood mitigation resources available. The goal of this informational campaign will be to maintain a steady level of awareness for the need for flood mitigation efforts. These agencies have prepared a plan that will reach Iowans on state-, community- and individual-based levels.</p>\r\n<p>The funding for this campaign is from a federal Community Development Block Grant (CDBG). <br />No Iowa General Fund Revenue was used for this campaign.</p>','',1,1,0,1,'2010-12-03 06:59:36',63,'','2010-12-29 22:28:35',64,0,'0000-00-00 00:00:00','2010-12-03 06:59:36','0000-00-00 00:00:00','','','show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=',8,0,17,'','',0,4859,'robots=\nauthor='),(2,'Prepare','prepare','','Find helpful links and resources from our partners below:<br />\r\n<p><a target=\"_blank\" title=\"What causes a flood\" href=\"http://www.floodsmart.gov/floodsmart/pages/flooding_flood_risks/what_causes_flooding.jsp\">What causes a flood?</a></p>\r\n<p><a target=\"_blank\" title=\"Before a Flood\" href=\"http://www.floodsmart.gov/floodsmart/pages/preparation_recovery/before_a_flood.jsp\">Before a flood</a></p>\r\n<p><a target=\"_blank\" title=\"Create a family emergency plan\" href=\"http://bereadyiowa.org/plan.html\">Create a family emergency plan</a></p>\r\n<p><a target=\"_blank\" title=\"Flood Risk Scenarios\" href=\"http://www.floodsmart.gov/floodsmart/pages/flooding_flood_risks/flood_scenarios.jsp\">Flood risk scenarios</a></p>\r\n<p><a target=\"_blank\" title=\"How to determine your flood risk.\" href=\"http://flash.org/peril_inside.php?id=51\">Flood risk: how to determine</a><a target=\"_blank\" title=\"Understand flood warnings\" href=\"http://flash.org/peril_inside.php?id=47\"></a></p>\r\n<p><a target=\"_blank\" title=\"Understand flood warnings\" href=\"http://flash.org/peril_inside.php?id=47\">Understand flood warnings</a></p>\r\n<p><a target=\"_blank\" title=\"Preparing and protecting your pets\" href=\"http://bereadyiowa.org/pets.html\">Preparing and protecting your pets</a></p>','',1,1,0,1,'2010-12-03 07:21:53',63,'','2011-02-14 23:23:29',64,0,'0000-00-00 00:00:00','2010-12-03 07:21:53','0000-00-00 00:00:00','','','show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=',26,0,16,'','',0,5207,'robots=\nauthor='),(3,'Protect','protect','','<p>Find helpful links and resources from our partners below:<br /><br /><a target=\"_blank\" title=\"Assembling a disaster kit. \" href=\"http://bereadyiowa.org/kit.html\">Assembling a disaster kit </a></p>\r\n<p><a target=\"_blank\" title=\"Defining flood risks.\" href=\"http://www.floodsmart.gov/floodsmart/pages/flooding_flood_risks/defining_flood_risks.jsp\">Defining flood risks</a></p>\r\n<p><a target=\"_blank\" title=\"Undergoing a map change.\" href=\"http://www.floodsmart.gov/floodsmart/pages/flooding_flood_risks/map_change.jsp\">Undergoing a map change</a></p>\r\n<p><a target=\"_blank\" title=\"Basic flood safety rules.\" href=\"http://flash.org/peril_inside.php?id=44\">Basic flood safety rules</a></p>\r\n<p><a target=\"_blank\" title=\"Flood proofing (dry.)\" href=\"http://flash.org/peril_inside.php?id=59\">Flood proofing (dry)</a></p>\r\n<p><a target=\"_blank\" title=\"Flood proofing (wet.)\" href=\"http://flash.org/peril_inside.php?id=60\">Flood proofing (wet)</a></p>\r\n<p><a target=\"_blank\" title=\"Fuel tank anchoring.\" href=\"http://flash.org/peril_inside.php?id=61\">Fuel tank anchoring</a></p>\r\n<p><a target=\"_blank\" title=\"Inspecting your drains. \" href=\"http://flash.org/peril_inside.php?id=52\">Inspecting your drains </a></p>\r\n<p><a target=\"_blank\" title=\"Major applicance elevating.\" href=\"http://flash.org/peril_inside.php?id=62\">Major applicance elevating</a></p>\r\n<p><a target=\"_blank\" title=\"Conduct a household inventory.\" href=\"http://ezasset.appspot.com/viewOnlyNoLogin.do?page=front_kys&amp;brand=iii\">Conduct a household inventory </a></p>\r\n<p><a target=\"_blank\" title=\"Preparing and protecting your pets.\" href=\"http://bereadyiowa.org/pets.html\">Preparing and protecting your pets</a> <br /><br /></p>','',1,1,0,1,'2010-12-03 07:28:20',63,'','2011-02-14 23:24:30',64,0,'0000-00-00 00:00:00','2010-12-03 07:28:20','0000-00-00 00:00:00','','','show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=',8,0,15,'','',0,4989,'robots=\nauthor='),(4,'Purchase','purchase','','<p>Find helpful links and resources from our partners below:<br /><br /><a target=\"_blank\" title=\"The cost of flooding\" href=\"http://www.floodsmart.gov/floodsmart/pages/flooding_flood_risks/the_cost_of_flooding.jsp\">The cost of flooding</a></p>\r\n<p><a target=\"_blank\" title=\"File your claim\" href=\"http://www.floodsmart.gov/floodsmart/pages/preparation_recovery/file_your_claim.jsp\">File your claim </a></p>\r\n<p><a target=\"_blank\" title=\"Agent locator\" href=\"http://www.floodsmart.gov/floodsmart/pages/choose_your_policy/agent_locator.jsp\">Agent locator</a></p>\r\n<p><a target=\"_blank\" title=\"About NFIP. \" href=\"http://www.floodsmart.gov/floodsmart/pages/about/nfip_overview.jsp\">About NFIP</a></p>\r\n<p><a target=\"_blank\" title=\"When insurance is required. \" href=\"http://www.floodsmart.gov/floodsmart/pages/about/when_insurance_is_required.jsp\">When insurance is required?</a></p>\r\n<p><a target=\"_blank\" title=\"Residential coverage. \" href=\"http://www.floodsmart.gov/floodsmart/pages/residential_coverage/rc_overview.jsp\">Residential coverage </a></p>\r\n<p><a target=\"_blank\" title=\"Policy rates. \" href=\"http://www.floodsmart.gov/floodsmart/pages/residential_coverage/policy_rates.jsp\">Policy rates </a></p>\r\n<p><a target=\"_blank\" title=\"What\'s covered. \" href=\"http://www.floodsmart.gov/floodsmart/pages/residential_coverage/whats_covered.jsp\">What\'s covered?</a></p>\r\n<p><a target=\"_blank\" title=\"Understanding the basics. \" href=\"http://www.floodsmart.gov/floodsmart/pages/residential_coverage/understanding_the_basics.jsp\">Understanding the basics </a></p>\r\n<p><a target=\"_blank\" title=\"Questions for your agent.\" href=\"http://www.floodsmart.gov/floodsmart/pages/residential_coverage/questions_to_ask_your_agent.jsp\">Questions for your agent </a></p>','',1,1,0,1,'2010-12-03 07:33:37',63,'','2011-02-14 23:25:14',64,64,'2011-02-14 23:25:14','2010-12-03 07:33:37','0000-00-00 00:00:00','','','show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=',10,0,14,'','',0,4799,'robots=\nauthor='),(5,'Share Your Story','share-your-story','','<p>Coming soon...</p>\r\n<p><input id=\"gwProxy\" type=\"hidden\" /><input id=\"jsProxy\" onclick=\"if(typeof(jsCall)==\'function\'){jsCall();}else{setTimeout(\'jsCall()\',500);}\" type=\"hidden\" /></p>','',1,1,0,1,'2010-12-03 07:34:54',63,'','0000-00-00 00:00:00',0,0,'0000-00-00 00:00:00','2010-12-03 07:34:54','0000-00-00 00:00:00','','','show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=',1,0,13,'','',0,9,'robots=\nauthor='),(6,'Contact Us','contact-us','','<p><strong>Iowa Insurance Division </strong></p>\r\n<p>330 Maple Street					      			       <br />Des Moines, Iowa 50319 				   			       <br /><br />PH 515.242.5179 <br />FX 515.281.3059</p>\r\n<p><a target=\"_blank\" title=\"contact us e-mail\" href=\"http://www.iid.state.ia.us/contact_us/contactus.asp?linksback=contactinfo\">Click here</a> to e-mail us.</p>','',1,1,0,1,'2010-12-03 07:49:32',63,'','2011-01-18 17:02:46',64,0,'0000-00-00 00:00:00','2010-12-03 07:49:32','0000-00-00 00:00:00','','','show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=',4,0,12,'','',0,4643,'robots=\nauthor='),(7,'Resources','resources','','<p><a target=\"_blank\" title=\"Agent Locator\" href=\"http://www.floodsmart.gov/floodsmart/pages/choose_your_policy/agent_locator.jsp\">Agent Locator</a></p>\r\n<p><a target=\"_blank\" title=\"File Your Claim\" href=\"http://www.floodsmart.gov/floodsmart/pages/preparation_recovery/file_your_claim.jsp\">File Your Claim </a></p>\r\n<p><a target=\"_blank\" title=\"Flood FAQs\" href=\"http://www.floodsmart.gov/floodsmart/pages/faqs.jsp\">Flood FAQs</a></p>\r\n<p><a target=\"_blank\" title=\"Flood Glossary\" href=\"http://www.floodsmart.gov/floodsmart/pages/glossary_A-I.jsp\">Flood Glossary</a></p>\r\n<p><a target=\"_blank\" title=\"Flood Facts\" href=\"http://www.floodsmart.gov/floodsmart/pages/flood_facts.jsp\">Flood Facts</a></p>\r\n<p><a target=\"_self\" title=\"Toolkits\" href=\"http://www.floodsmart.gov/toolkits/\">Toolkits</a></p>\r\n<p>Important Websites:</p>\r\n<p><a href=\"http://www.weather.gov\">http://www.weather.gov</a></p>\r\n<p><a href=\"http://www.floodsafety.noaa.gov/\">http://www.floodsafety.noaa.gov/</a></p>\r\n<p><a href=\"http://floodplain.iowadnr.gov\">http://floodplain.iowadnr.gov</a></p>\r\n<p><a href=\"http://www.iowafloodcenter.org\">http://www.iowafloodcenter.org</a></p>\r\n<p><a href=\"http://www.floodsmart.gov\">http://www.floodsmart.gov</a></p>\r\n<p><a target=\"_blank\" href=\"http://water.usgs.gov/wateralert\">http://water.usgs.gov/wateralert</a></p>\r\n<p><a href=\"http://www.fema.gov/business/nfip/\">http://www.fema.gov/business/nfip/</a></p>\r\n<p><a target=\"_blank\" href=\"http://www.rivergages.com\">http://www.rivergages.com</a></p>\r\n<p>Presentations:</p>\r\n<p><a target=\"_self\" href=\"index.php?option=com_content&view=article&id=14%3Ades-moines-presentations&catid=1%3Ageneral&Itemid=25\">Polk County</a></p>\r\n<p><a target=\"_self\" href=\"index.php?option=com_content&view=article&id=15%3Awapello-county-presentations&catid=1%3Ageneral&Itemid=25\">Wapello County</a></p>\r\n<p><a target=\"_self\" href=\"index.php?option=com_content&view=article&id=16:pottawattamie-county-presentations&catid=1:general\">Pottawattamie County</a></p>\r\n<p><a target=\"_self\" href=\"index.php?option=com_content&view=article&id=17:linn-county&catid=1:general\">Linn County</a></p>','',1,1,0,1,'2010-12-03 08:12:14',63,'','2011-06-16 13:57:22',67,0,'0000-00-00 00:00:00','2010-12-03 08:12:14','0000-00-00 00:00:00','','','show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=',16,0,11,'','',0,2918,'robots=\nauthor='),(8,'Flood Testimonials','flood-testimonials-','','Videos here<br />','',1,1,0,1,'2010-12-10 17:15:58',64,'','2011-01-18 17:19:42',64,0,'0000-00-00 00:00:00','2010-12-10 17:15:58','0000-00-00 00:00:00','','','show_title=0\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=',12,0,10,'','',0,92,'robots=\nauthor='),(9,'Videos','videos','','<p>Flood Awareness Video Archives<br /><br />{loadposition video}</p>','',1,1,0,1,'2010-12-30 15:18:23',63,'','2011-01-05 22:07:14',64,0,'0000-00-00 00:00:00','2010-12-30 15:18:23','0000-00-00 00:00:00','','','show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=',3,0,9,'','',0,2390,'robots=\nauthor='),(12,'Take A Quiz','take-a-quiz','','<p> </p>\r\n<p><a href=\"index.php?option=com_content&amp;view=article&amp;id=3&amp;Itemid=12\">Take Another Quiz Question</a></p>\r\n<p>{loadposition poll}</p>','',1,1,0,1,'2011-02-08 08:13:57',63,'','2011-02-08 08:29:24',63,0,'0000-00-00 00:00:00','2011-02-08 08:13:57','0000-00-00 00:00:00','','','show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=',8,0,6,'','',0,32,'robots=\nauthor='),(13,'My Risk','my-risk-','','<p>Thank you for visiting Don\'t Test the Waters Iowa.</p>\r\n<a target=\"_blank\" title=\"My Risk\" href=\"http://www.floodsmart.gov/floodsmart/pages/landing_pages/landing0000_1.jsp\">Click here</a> to assess your home\'s flood risk.','',1,1,0,1,'2011-02-10 15:40:43',64,'','0000-00-00 00:00:00',0,0,'0000-00-00 00:00:00','2011-02-10 15:40:43','0000-00-00 00:00:00','','','show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=',1,0,5,'','',0,2,'robots=\nauthor='),(11,'Media','media','','<strong>TV PSAs</strong><br /><a target=\"_blank\" href=\"http://video.meandv.com/flash/flashpreview.html?file=video/iid-23703_v2_checklist.mov\">PSA 1</a><br /><a target=\"_blank\" href=\"http://video.meandv.com/flash/flashpreview.html?file=video/iid-23703_v4.mov\">PSA 2</a><br /><br /><strong>Download program advertisements and collateral materials below. </strong><br /><a target=\"_blank\" title=\"Newspaper Ad\" href=\"images/iid_images/media/iid%2023708%20newspaper%20ad.pdf\">Newspaper Ad</a><br /><a target=\"_blank\" href=\"images/iid_images/media/brochure_web_23713.pdf\">Brochure</a><br /><a target=\"_blank\" title=\"Direct Mail\" href=\"images/iid_images/media/iid%2023714%20direct%20mail.pdf\">Direct Mail</a><br /><a target=\"_blank\" title=\"Bill Stuffer\" href=\"images/iid_images/media/iid%2023715%20bill%20stuffer.pdf\">Bill Stuffer</a>','',1,1,0,1,'2011-02-07 22:51:07',64,'','2011-02-21 16:41:46',67,0,'0000-00-00 00:00:00','2011-02-07 22:51:07','0000-00-00 00:00:00','','','show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=',3,0,7,'','',0,110,'robots=\nauthor='),(10,'My Risk','my-risk','','<p><a target=\"_blank\" href=\"http://www.floodsmart.gov/floodsmart/pages/landing_pages/landing0000_1.jsp\"><img style=\"border-width: 0px; border-style: none;\" alt=\"clickherered\" src=\"images/iid_images/clickherered.png\" width=\"193\" height=\"68\" /></a></p>\r\n<p>Click to assess your flood risk.</p>','',1,1,0,1,'2011-01-18 17:20:21',64,'','2011-02-17 17:08:27',67,0,'0000-00-00 00:00:00','2011-01-18 17:20:21','0000-00-00 00:00:00','','','show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=',2,0,8,'','',0,30,'robots=\nauthor='),(14,'Polk County Presentations','polk-county-presentations','','<p><a target=\"_blank\" href=\"images/iid_images/des_presentations/weatherservice.pdf\">National Weather Service</a></p>\r\n<p><a target=\"_blank\" href=\"images/iid_images/des_presentations/nfip.pdf\">National Flood Insurance Program</a></p>\r\n<p><a target=\"_blank\" href=\"images/iid_images/des_presentations/ifc.pdf\">Iowa Flood Center</a></p>\r\n<p><a target=\"_blank\" href=\"images/iid_images/des_presentations/dnr.pdf\">Department of Natural Resources</a></p>\r\n<p><a target=\"_blank\" href=\"images/iid_images/des_presentations/city.pdf\">City Information</a></p>','',1,1,0,1,'2011-06-09 17:09:20',67,'','2011-06-09 17:21:25',67,0,'0000-00-00 00:00:00','2011-06-09 17:09:20','0000-00-00 00:00:00','','','show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=',4,0,4,'','',0,616,'robots=\nauthor='),(15,'Wapello County Presentations','wapello-county-presentations','','<p><a target=\"_blank\" href=\"images/iid_images/Ottumwa/weatherservice.pdf\">National Weather Service</a></p>\r\n<p><a target=\"_blank\" href=\"images/iid_images/Ottumwa/dnr.pdf\">Department of Natural Resources</a></p>\r\n<p><a target=\"_blank\" href=\"images/iid_images/Ottumwa/ifc.pdf\">Iowa Flood Center</a></p>\r\n<p><a target=\"_blank\" href=\"images/iid_images/Ottumwa/nfip.pdf\">National Flood Insurance Program</a></p>','',1,1,0,1,'2011-06-09 17:22:42',67,'','2011-06-09 17:39:37',67,0,'0000-00-00 00:00:00','2011-06-09 17:22:42','0000-00-00 00:00:00','','','show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=',3,0,3,'','',0,555,'robots=\nauthor='),(16,'Pottawattamie County Presentations','pottawattamie-county-presentations','','<p><a target=\"_blank\" href=\"images/iid_images/Council_Bluffs/weatherservice.pdf\">National Weather Service</a></p>\r\n<p><a target=\"_blank\" href=\"images/iid_images/Council_Bluffs/dnr.pdf\">Department of Natural Resources</a></p>\r\n<p><a target=\"_blank\" href=\"images/iid_images/des_presentations/ifc.pdf\">Iowa Flood Center</a></p>\r\n<p><a target=\"_blank\" href=\"images/iid_images/Council_Bluffs/nfip.pdf\">National Flood Insurance Program</a></p>\r\n<p><a target=\"_blank\" href=\"images/iid_images/Council_Bluffs/city.pdf\">City Information</a></p>','',1,1,0,1,'2011-06-09 17:35:39',67,'','2011-06-09 18:05:26',67,0,'0000-00-00 00:00:00','2011-06-09 17:35:39','0000-00-00 00:00:00','','','show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=',2,0,2,'','',0,544,'robots=\nauthor='),(17,'Linn County','linn-county','','<p><a target=\"_blank\" href=\"images/iid_images/cedar_rapids/nws_donttestthewaterscedarrapids_20110615.pdf\">National Weather Service</a></p>\r\n<p><a target=\"_blank\" href=\"images/iid_images/cedar_rapids/dnr%20-%20cedar%20rapids%20flood%20forum_jason%20conn.pdf\">Iowa Department of Natural Resources</a></p>\r\n<p><a target=\"_blank\" href=\"images/iid_images/cedar_rapids/flood%20center%20ifc.pdf\">Iowa Flood Center</a></p>\r\n<p><a target=\"_blank\" href=\"images/iid_images/cedar_rapids/nfip.pdf\">National Flood Insurance Program</a></p>\r\n<p><a target=\"_blank\" href=\"images/iid_images/cedar_rapids/city%20elgin%20-dont%20test%20the%20waters.pdf\">City Information</a></p>','',1,1,0,1,'2011-06-16 13:50:44',67,'','2011-06-16 21:17:28',67,0,'0000-00-00 00:00:00','2011-06-16 13:50:44','0000-00-00 00:00:00','','','show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=',2,0,1,'','',0,470,'robots=\nauthor=');
/*!40000 ALTER TABLE `jos_content` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jos_content_frontpage`
--

DROP TABLE IF EXISTS `jos_content_frontpage`;
CREATE TABLE `jos_content_frontpage` (
  `content_id` int(11) NOT NULL default '0',
  `ordering` int(11) NOT NULL default '0',
  PRIMARY KEY  (`content_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jos_content_frontpage`
--

LOCK TABLES `jos_content_frontpage` WRITE;
/*!40000 ALTER TABLE `jos_content_frontpage` DISABLE KEYS */;
/*!40000 ALTER TABLE `jos_content_frontpage` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jos_content_rating`
--

DROP TABLE IF EXISTS `jos_content_rating`;
CREATE TABLE `jos_content_rating` (
  `content_id` int(11) NOT NULL default '0',
  `rating_sum` int(11) unsigned NOT NULL default '0',
  `rating_count` int(11) unsigned NOT NULL default '0',
  `lastip` varchar(50) NOT NULL default '',
  PRIMARY KEY  (`content_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jos_content_rating`
--

LOCK TABLES `jos_content_rating` WRITE;
/*!40000 ALTER TABLE `jos_content_rating` DISABLE KEYS */;
/*!40000 ALTER TABLE `jos_content_rating` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jos_core_acl_aro`
--

DROP TABLE IF EXISTS `jos_core_acl_aro`;
CREATE TABLE `jos_core_acl_aro` (
  `id` int(11) NOT NULL auto_increment,
  `section_value` varchar(240) NOT NULL default '0',
  `value` varchar(240) NOT NULL default '',
  `order_value` int(11) NOT NULL default '0',
  `name` varchar(255) NOT NULL default '',
  `hidden` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `jos_section_value_value_aro` (`section_value`(100),`value`(100)),
  KEY `jos_gacl_hidden_aro` (`hidden`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jos_core_acl_aro`
--

LOCK TABLES `jos_core_acl_aro` WRITE;
/*!40000 ALTER TABLE `jos_core_acl_aro` DISABLE KEYS */;
INSERT INTO `jos_core_acl_aro` VALUES (10,'users','62',0,'Administrator',0),(19,'users','71',0,'72um8rk6',0),(17,'users','69',0,'halissty1905',0),(18,'users','70',0,'hongrpuu',0),(15,'users','67',0,'Sarah Albertson',0),(20,'users','72',0,'Dyetetz0',0),(21,'users','73',0,'rolex0watch',0),(22,'users','74',0,'olasamnzh',0),(23,'users','75',0,'x13o2we368',0),(24,'users','76',0,'4ci8xie76zs',0),(25,'users','77',0,'feiktianh',0),(26,'users','78',0,'feibntian',0),(27,'users','79',0,'hongpduu',0),(28,'users','80',0,'feintianq',0),(29,'users','81',0,'feizutian',0),(30,'users','82',0,'hongiiuu',0),(31,'users','83',0,'feintiank',0),(32,'users','84',0,'hongwtuu',0),(33,'users','85',0,'hongxxuu',0),(34,'users','86',0,'hongbauu',0),(35,'users','87',0,'eritmbod',0),(36,'users','88',0,'jqbcvbaci',0);
/*!40000 ALTER TABLE `jos_core_acl_aro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jos_core_acl_aro_groups`
--

DROP TABLE IF EXISTS `jos_core_acl_aro_groups`;
CREATE TABLE `jos_core_acl_aro_groups` (
  `id` int(11) NOT NULL auto_increment,
  `parent_id` int(11) NOT NULL default '0',
  `name` varchar(255) NOT NULL default '',
  `lft` int(11) NOT NULL default '0',
  `rgt` int(11) NOT NULL default '0',
  `value` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`id`),
  KEY `jos_gacl_parent_id_aro_groups` (`parent_id`),
  KEY `jos_gacl_lft_rgt_aro_groups` (`lft`,`rgt`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jos_core_acl_aro_groups`
--

LOCK TABLES `jos_core_acl_aro_groups` WRITE;
/*!40000 ALTER TABLE `jos_core_acl_aro_groups` DISABLE KEYS */;
INSERT INTO `jos_core_acl_aro_groups` VALUES (17,0,'ROOT',1,22,'ROOT'),(28,17,'USERS',2,21,'USERS'),(29,28,'Public Frontend',3,12,'Public Frontend'),(18,29,'Registered',4,11,'Registered'),(19,18,'Author',5,10,'Author'),(20,19,'Editor',6,9,'Editor'),(21,20,'Publisher',7,8,'Publisher'),(30,28,'Public Backend',13,20,'Public Backend'),(23,30,'Manager',14,19,'Manager'),(24,23,'Administrator',15,18,'Administrator'),(25,24,'Super Administrator',16,17,'Super Administrator');
/*!40000 ALTER TABLE `jos_core_acl_aro_groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jos_core_acl_aro_map`
--

DROP TABLE IF EXISTS `jos_core_acl_aro_map`;
CREATE TABLE `jos_core_acl_aro_map` (
  `acl_id` int(11) NOT NULL default '0',
  `section_value` varchar(230) NOT NULL default '0',
  `value` varchar(100) NOT NULL,
  PRIMARY KEY  (`acl_id`,`section_value`,`value`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jos_core_acl_aro_map`
--

LOCK TABLES `jos_core_acl_aro_map` WRITE;
/*!40000 ALTER TABLE `jos_core_acl_aro_map` DISABLE KEYS */;
/*!40000 ALTER TABLE `jos_core_acl_aro_map` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jos_core_acl_aro_sections`
--

DROP TABLE IF EXISTS `jos_core_acl_aro_sections`;
CREATE TABLE `jos_core_acl_aro_sections` (
  `id` int(11) NOT NULL auto_increment,
  `value` varchar(230) NOT NULL default '',
  `order_value` int(11) NOT NULL default '0',
  `name` varchar(230) NOT NULL default '',
  `hidden` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `jos_gacl_value_aro_sections` (`value`),
  KEY `jos_gacl_hidden_aro_sections` (`hidden`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jos_core_acl_aro_sections`
--

LOCK TABLES `jos_core_acl_aro_sections` WRITE;
/*!40000 ALTER TABLE `jos_core_acl_aro_sections` DISABLE KEYS */;
INSERT INTO `jos_core_acl_aro_sections` VALUES (10,'users',1,'Users',0);
/*!40000 ALTER TABLE `jos_core_acl_aro_sections` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jos_core_acl_groups_aro_map`
--

DROP TABLE IF EXISTS `jos_core_acl_groups_aro_map`;
CREATE TABLE `jos_core_acl_groups_aro_map` (
  `group_id` int(11) NOT NULL default '0',
  `section_value` varchar(240) NOT NULL default '',
  `aro_id` int(11) NOT NULL default '0',
  UNIQUE KEY `group_id_aro_id_groups_aro_map` (`group_id`,`section_value`,`aro_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jos_core_acl_groups_aro_map`
--

LOCK TABLES `jos_core_acl_groups_aro_map` WRITE;
/*!40000 ALTER TABLE `jos_core_acl_groups_aro_map` DISABLE KEYS */;
INSERT INTO `jos_core_acl_groups_aro_map` VALUES (18,'',17),(18,'',18),(18,'',19),(18,'',20),(18,'',21),(18,'',22),(18,'',23),(18,'',24),(18,'',25),(18,'',26),(18,'',27),(18,'',28),(18,'',29),(18,'',30),(18,'',31),(18,'',32),(18,'',33),(18,'',34),(18,'',35),(18,'',36),(24,'',15),(25,'',10);
/*!40000 ALTER TABLE `jos_core_acl_groups_aro_map` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jos_core_log_items`
--

DROP TABLE IF EXISTS `jos_core_log_items`;
CREATE TABLE `jos_core_log_items` (
  `time_stamp` date NOT NULL default '0000-00-00',
  `item_table` varchar(50) NOT NULL default '',
  `item_id` int(11) unsigned NOT NULL default '0',
  `hits` int(11) unsigned NOT NULL default '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jos_core_log_items`
--

LOCK TABLES `jos_core_log_items` WRITE;
/*!40000 ALTER TABLE `jos_core_log_items` DISABLE KEYS */;
/*!40000 ALTER TABLE `jos_core_log_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jos_core_log_searches`
--

DROP TABLE IF EXISTS `jos_core_log_searches`;
CREATE TABLE `jos_core_log_searches` (
  `search_term` varchar(128) NOT NULL default '',
  `hits` int(11) unsigned NOT NULL default '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jos_core_log_searches`
--

LOCK TABLES `jos_core_log_searches` WRITE;
/*!40000 ALTER TABLE `jos_core_log_searches` DISABLE KEYS */;
/*!40000 ALTER TABLE `jos_core_log_searches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jos_groups`
--

DROP TABLE IF EXISTS `jos_groups`;
CREATE TABLE `jos_groups` (
  `id` tinyint(3) unsigned NOT NULL default '0',
  `name` varchar(50) NOT NULL default '',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jos_groups`
--

LOCK TABLES `jos_groups` WRITE;
/*!40000 ALTER TABLE `jos_groups` DISABLE KEYS */;
INSERT INTO `jos_groups` VALUES (0,'Public'),(1,'Registered'),(2,'Special');
/*!40000 ALTER TABLE `jos_groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jos_homegallery`
--

DROP TABLE IF EXISTS `jos_homegallery`;
CREATE TABLE `jos_homegallery` (
  `id` int(11) NOT NULL auto_increment,
  `homegallery_title` varchar(255) default NULL,
  `homegallery_discription` varchar(255) default NULL,
  `logo_image` varchar(255) default NULL,
  `website_url` varchar(255) default NULL,
  `description` text,
  `created_by` int(11) default NULL,
  `created_date` datetime default NULL,
  `last_update` datetime default NULL,
  `hits` int(11) default '0',
  `published` tinyint(1) unsigned NOT NULL,
  `checked_out` int(11) unsigned NOT NULL,
  `chedked_out_time` datetime NOT NULL default '0000-00-00 00:00:00',
  `ordering` int(11) NOT NULL,
  `slide_text` text,
  `new_window` tinyint(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jos_homegallery`
--

LOCK TABLES `jos_homegallery` WRITE;
/*!40000 ALTER TABLE `jos_homegallery` DISABLE KEYS */;
INSERT INTO `jos_homegallery` VALUES (16,'girl w/ laptop','I entered my address at www.FloodSmart.gov and learned my personal flood risk. ','younger-girl-w-laptop.png','http://www.floodsmart.gov/floodsmart/',NULL,NULL,'0000-00-00 00:00:00',NULL,0,1,0,'0000-00-00 00:00:00',2,NULL,2),(15,'Dad and kid','I learned how important it is to keep my kids away from flood waters.','dad-and-kid.png','/index.php?option=com_content&view=article&id=3&Itemid=4',NULL,NULL,'0000-00-00 00:00:00',NULL,0,1,0,'0000-00-00 00:00:00',3,NULL,2),(10,'Kristin Teig Torres','I signed up for local weather alerts that dial my phone and send me text messages during an emergency.','kristintt-with-phone.png','index.php?option=com_content&view=article&id=2&Itemid=3',NULL,NULL,'0000-00-00 00:00:00',NULL,0,1,0,'0000-00-00 00:00:00',8,NULL,2),(14,'Woman w/ laptop','I developed an inventory of household items for my insurance.','woman-with-laptop.png','index.php?option=com_content&view=article&id=3&Itemid=4',NULL,NULL,'0000-00-00 00:00:00',NULL,0,1,0,'0000-00-00 00:00:00',4,NULL,2),(11,'Kristin Kline & Henry','I made a plan for my pet in case of an evacuation.','kristin-with-dog.png','index.php?option=com_content&view=article&id=2&Itemid=3',NULL,NULL,'0000-00-00 00:00:00',NULL,0,1,0,'0000-00-00 00:00:00',7,NULL,2),(13,'Linda B. ','I made sure I had the right insurance coverage, including flood insurance and sewer backup.','linda-b.png','index.php?option=com_content&view=article&id=4&Itemid=5',NULL,NULL,'0000-00-00 00:00:00',NULL,0,1,0,'0000-00-00 00:00:00',5,NULL,2),(12,'Judy','I learned how to shut off all my utilities in case I have to evacuate.','judy_crossed-arms.png','index.php?option=com_content&view=article&id=3&Itemid=4',NULL,NULL,'0000-00-00 00:00:00',NULL,0,1,0,'0000-00-00 00:00:00',6,NULL,2),(17,'mom and kid','We made and practiced a flood evacuation route.','mom-and-kid.png','index.php?option=com_content&view=article&id=2&Itemid=3',NULL,NULL,'0000-00-00 00:00:00',NULL,0,1,0,'0000-00-00 00:00:00',1,NULL,2);
/*!40000 ALTER TABLE `jos_homegallery` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jos_iidtestimonial`
--

DROP TABLE IF EXISTS `jos_iidtestimonial`;
CREATE TABLE `jos_iidtestimonial` (
  `id` int(11) NOT NULL auto_increment,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `city` varchar(1000) NOT NULL,
  `testimonial_story` text NOT NULL,
  `videourl` varchar(255) NOT NULL,
  `archive` tinyint(1) NOT NULL default '1',
  `front_page_publish` tinyint(1) NOT NULL default '1',
  `published` tinyint(1) NOT NULL default '1',
  `created` datetime NOT NULL,
  `created_by` smallint(4) NOT NULL,
  `checked_out` smallint(4) NOT NULL,
  `checked_out_time` datetime NOT NULL,
  `ordering` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jos_iidtestimonial`
--

LOCK TABLES `jos_iidtestimonial` WRITE;
/*!40000 ALTER TABLE `jos_iidtestimonial` DISABLE KEYS */;
INSERT INTO `jos_iidtestimonial` VALUES (24,'Anonymous','Anonymous','salbertson@meandv.com','(319) 268-9151','Newton','This footage was taken soon after we discovered that our basement was flooding with sewage due to the overwhelming amount of rain in the city of Newton. Newton\'s city mains were completely full - and therefore sewage began to pour out of our basement toilet & shower drain. You can see it here & the extent of all the damage it did in just a matter of minutes. The sewage rose to 18 inches in about 2 hours, and once the city mains weren\'t full anymore, the sewage all left our home. Our basement is now gutted and much of what we had has been thrown away. BUMMER!','http://www.youtube.com/v/A6hEqwLVSao?version=3',0,1,1,'0000-00-00 00:00:00',0,0,'0000-00-00 00:00:00',2),(25,'Flood of 2008','NA','salbertson@meandv.com','3192689151','Cedar Rapids','Here is just a glimpse of the devastation caused by the recent  floods in Cedar Rapids.','http://www.youtube.com/v/lPGQmvN6iAQ',0,0,1,'0000-00-00 00:00:00',0,0,'0000-00-00 00:00:00',1),(26,'Kristin','','','','Waterloo','story here','',0,1,0,'0000-00-00 00:00:00',0,0,'0000-00-00 00:00:00',3),(27,'test','test','dxt.anshuman@gmail.com','(111) 111-1111','City','Testimonial Story * 	','',0,1,0,'0000-00-00 00:00:00',0,0,'0000-00-00 00:00:00',4),(28,'test','test','dxt.anshuman@dd.com','(111) 111-1111','City','Testimonial Story * 	Testimonial Story * 	Testimonial Story * 	','',0,1,0,'0000-00-00 00:00:00',0,0,'0000-00-00 00:00:00',5),(29,'Test','Test','salbertson@cfu.net','(319) 239-3800','test','test','',0,1,0,'0000-00-00 00:00:00',0,0,'0000-00-00 00:00:00',6),(30,'test','test','test@test.com','(319) 239-3800','test','test','',0,1,0,'0000-00-00 00:00:00',0,0,'0000-00-00 00:00:00',7);
/*!40000 ALTER TABLE `jos_iidtestimonial` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jos_iidtestimonial_config`
--

DROP TABLE IF EXISTS `jos_iidtestimonial_config`;
CREATE TABLE `jos_iidtestimonial_config` (
  `id` int(3) default '0',
  `from_email` varchar(100) NOT NULL,
  `from_name` varchar(100) NOT NULL,
  `header_text` text NOT NULL,
  `footer_text` text NOT NULL,
  `notification_text` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jos_iidtestimonial_config`
--

LOCK TABLES `jos_iidtestimonial_config` WRITE;
/*!40000 ALTER TABLE `jos_iidtestimonial_config` DISABLE KEYS */;
INSERT INTO `jos_iidtestimonial_config` VALUES (1,'salbertson@meandv.com','Sarah Albertson','<p>Do you have a flood story you\'d like to share with us? Please fill out the form below to share your story and to have it featured on our Flood Testimonials page.</p>','','Thank you for submitting your Iowa flood testimonial at www.DontTesttheWatersIowa.gov. Our staff will review your testimonial before publishing on our website. If you have any questions or concerns, please fill out the form at this URL http://www.iid.state.ia.us/contact_us/contactus.asp?linksback=contactinfo. Thank you.');
/*!40000 ALTER TABLE `jos_iidtestimonial_config` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jos_jce_groups`
--

DROP TABLE IF EXISTS `jos_jce_groups`;
CREATE TABLE `jos_jce_groups` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `users` text NOT NULL,
  `types` varchar(255) NOT NULL,
  `components` text NOT NULL,
  `rows` text NOT NULL,
  `plugins` varchar(255) NOT NULL,
  `published` tinyint(3) NOT NULL,
  `ordering` int(11) NOT NULL,
  `checked_out` tinyint(3) NOT NULL,
  `checked_out_time` datetime NOT NULL,
  `params` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jos_jce_groups`
--

LOCK TABLES `jos_jce_groups` WRITE;
/*!40000 ALTER TABLE `jos_jce_groups` DISABLE KEYS */;
INSERT INTO `jos_jce_groups` VALUES (1,'Default','Default group for all users with edit access','','19,20,21,23,24,25','','5,6,7,8,9,10,11,12,13,14,15,16,17,18;19,20,21,22,23,24,25,26,27,29,30,31,34,46;35,36,37,38,39,40,41,42,43,44,45;47,48,49,50,51,52,53,55,56','1,2,3,4,5,19,20,35,36,37,38,39,40,47,48,49,50,51,52,53,55,56',1,1,0,'0000-00-00 00:00:00','editor_width=\neditor_height=\neditor_theme_advanced_toolbar_location=top\neditor_theme_advanced_toolbar_align=center\neditor_skin=default\neditor_skin_variant=default\neditor_inlinepopups_skin=clearlooks2\nadvcode_toggle=1\nadvcode_editor_state=1\nadvcode_toggle_text=[show/hide]\neditor_relative_urls=1\neditor_invalid_elements=\neditor_extended_elements=\neditor_event_elements=a,img\ncode_allow_javascript=0\ncode_allow_css=0\ncode_allow_php=0\ncode_cdata=1\neditor_allow_iframes=0\neditor_allow_applet=0\neditor_theme_advanced_blockformats=p,div,h1,h2,h3,h4,h5,h6,blockquote,dt,dd,code,samp,pre\neditor_theme_advanced_fonts_add=\neditor_theme_advanced_fonts_remove=\neditor_theme_advanced_font_sizes=8pt,10pt,12pt,14pt,18pt,24pt,36pt\neditor_theme_advanced_default_foreground_color=#000000\neditor_theme_advanced_default_background_color=#FFFF00\neditor_dir=images/iid_images\neditor_restrict_dir=administrator,cache,components,includes,language,libraries,logs,media,modules,plugins,templates,xmlrpc\neditor_max_size=1024\neditor_upload_conflict=\neditor_preview_height=550\neditor_preview_width=750\neditor_custom_colors=\nbrowser_dir=\nbrowser_max_size=\nbrowser_extensions=xml=xml;html=htm,html;word=doc,docx;powerpoint=ppt;excel=xls;text=txt,rtf;image=gif,jpeg,jpg,png;acrobat=pdf;archive=zip,tar,gz;flash=swf;winrar=rar;quicktime=mov,mp4,qt;windowsmedia=wmv,asx,asf,avi;audio=wav,mp3,aiff;openoffice=odt,odg,odp,ods,odf\nbrowser_extensions_viewable=html,htm,doc,docx,ppt,rtf,xls,txt,gif,jpeg,jpg,png,pdf,swf,mov,mpeg,mpg,avi,asf,asx,dcr,flv,wmv,wav,mp3\nbrowser_upload=1\nbrowser_upload_conflict=\nbrowser_folder_new=1\nbrowser_folder_delete=1\nbrowser_folder_rename=1\nbrowser_file_delete=1\nbrowser_file_rename=1\nbrowser_file_move=1\nmedia_use_script=0\nmedia_strict=0\nmedia_html5=0\nmedia_version_flash=10,0,32,18\nmedia_version_windowsmedia=5,1,52,701\nmedia_version_quicktime=6,0,2,0\nmedia_version_realmedia=7,0,0,0\nmedia_version_shockwave=11,0,0,458\npaste_dialog_width=450\npaste_dialog_height=400\npaste_html=1\npaste_text=1\npaste_use_dialog=0\npaste_strip_class_attributes=all\npaste_remove_spans=0\npaste_remove_styles=0\npaste_retain_style_properties=\npaste_remove_empty_paragraphs=1\npaste_remove_styles_if_webkit=0\nimgmanager_dir=\nimgmanager_max_size=\nimgmanager_extensions=image=jpeg,jpg,png,gif\nimgmanager_margin_top=default\nimgmanager_margin_right=default\nimgmanager_margin_bottom=default\nimgmanager_margin_left=default\nimgmanager_border=0\nimgmanager_border_width=default\nimgmanager_border_style=default\nimgmanager_border_color=#000000\nimgmanager_align=default\nimgmanager_upload=1\nimgmanager_upload_conflict=\nimgmanager_folder_new=1\nimgmanager_folder_delete=1\nimgmanager_folder_rename=1\nimgmanager_file_delete=1\nimgmanager_file_rename=1\nimgmanager_file_move=1\nadvlink_target=default\nadvlink_content=1\nadvlink_static=1\nadvlink_contacts=1\nadvlink_weblinks=1\nadvlink_menu=1\nspellchecker_engine=googlespell\nspellchecker_languages=English=en\nspellchecker_pspell_mode=PSPELL_FAST\nspellchecker_pspell_spelling=\nspellchecker_pspell_jargon=\nspellchecker_pspell_encoding=\nspellchecker_pspell_dictionary=plugins/editors/jce/tiny_mce/plugins/spellchecker/dictionary.pws\nspellchecker_pspellshell_aspell=/usr/bin/aspell\nspellchecker_pspellshell_tmp=/tmp\n\n'),(2,'Front End','Sample Group for Authors, Editors, Publishers','','19,20,21','','5,6,7,8,9,12,13,14,15,16,17,18,26,27;19,20,24,25,29,30,34,41,42,43,45,46,48,49;23,31,37,38,40,44,47,50,51,52,53,55,56','5,19,20,48,49,1,3,37,38,40,47,50,51,52,53,55,56',0,2,0,'0000-00-00 00:00:00','');
/*!40000 ALTER TABLE `jos_jce_groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jos_jce_plugins`
--

DROP TABLE IF EXISTS `jos_jce_plugins`;
CREATE TABLE `jos_jce_plugins` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `layout` varchar(255) NOT NULL,
  `row` int(11) NOT NULL,
  `ordering` int(11) NOT NULL,
  `published` tinyint(3) NOT NULL,
  `editable` tinyint(3) NOT NULL,
  `iscore` tinyint(3) NOT NULL,
  `elements` varchar(255) NOT NULL,
  `checked_out` int(11) NOT NULL,
  `checked_out_time` datetime NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `plugin` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=57 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jos_jce_plugins`
--

LOCK TABLES `jos_jce_plugins` WRITE;
/*!40000 ALTER TABLE `jos_jce_plugins` DISABLE KEYS */;
INSERT INTO `jos_jce_plugins` VALUES (1,'Context Menu','contextmenu','plugin','','',0,0,1,0,1,'',0,'0000-00-00 00:00:00'),(2,'File Browser','browser','plugin','','',0,0,1,1,1,'',0,'0000-00-00 00:00:00'),(3,'Inline Popups','inlinepopups','plugin','','',0,0,1,0,1,'',0,'0000-00-00 00:00:00'),(4,'Media Support','media','plugin','','',0,0,1,1,1,'',0,'0000-00-00 00:00:00'),(5,'Help','help','plugin','help','help',1,1,1,0,1,'',0,'0000-00-00 00:00:00'),(6,'New Document','newdocument','command','newdocument','newdocument',1,2,1,0,1,'',0,'0000-00-00 00:00:00'),(7,'Bold','bold','command','bold','bold',1,3,1,0,1,'',0,'0000-00-00 00:00:00'),(8,'Italic','italic','command','italic','italic',1,4,1,0,1,'',0,'0000-00-00 00:00:00'),(9,'Underline','underline','command','underline','underline',1,5,1,0,1,'',0,'0000-00-00 00:00:00'),(10,'Font Select','fontselect','command','fontselect','fontselect',1,6,1,0,1,'',0,'0000-00-00 00:00:00'),(11,'Font Size Select','fontsizeselect','command','fontsizeselect','fontsizeselect',1,7,1,0,1,'',0,'0000-00-00 00:00:00'),(12,'Style Select','styleselect','command','styleselect','styleselect',1,8,1,0,1,'',0,'0000-00-00 00:00:00'),(13,'StrikeThrough','strikethrough','command','strikethrough','strikethrough',1,9,1,0,1,'',0,'0000-00-00 00:00:00'),(14,'Justify Full','full','command','justifyfull','justifyfull',1,10,1,0,1,'',0,'0000-00-00 00:00:00'),(15,'Justify Center','center','command','justifycenter','justifycenter',1,11,1,0,1,'',0,'0000-00-00 00:00:00'),(16,'Justify Left','left','command','justifyleft','justifyleft',1,12,1,0,1,'',0,'0000-00-00 00:00:00'),(17,'Justify Right','right','command','justifyright','justifyright',1,13,1,0,1,'',0,'0000-00-00 00:00:00'),(18,'Format Select','formatselect','command','formatselect','formatselect',1,14,1,0,1,'',0,'0000-00-00 00:00:00'),(19,'Paste','paste','plugin','cut,copy,paste','paste',2,1,1,1,1,'',0,'0000-00-00 00:00:00'),(20,'Search Replace','searchreplace','plugin','search,replace','searchreplace',2,2,1,0,1,'',0,'0000-00-00 00:00:00'),(21,'Font ForeColour','forecolor','command','forecolor','forecolor',2,3,1,0,1,'',0,'0000-00-00 00:00:00'),(22,'Font BackColour','backcolor','command','backcolor','backcolor',2,4,1,0,1,'',0,'0000-00-00 00:00:00'),(23,'Unlink','unlink','command','unlink','unlink',2,5,1,0,1,'',0,'0000-00-00 00:00:00'),(24,'Indent','indent','command','indent','indent',2,6,1,0,1,'',0,'0000-00-00 00:00:00'),(25,'Outdent','outdent','command','outdent','outdent',2,7,1,0,1,'',0,'0000-00-00 00:00:00'),(26,'Undo','undo','command','undo','undo',2,8,1,0,1,'',0,'0000-00-00 00:00:00'),(27,'Redo','redo','command','redo','redo',2,9,1,0,1,'',0,'0000-00-00 00:00:00'),(28,'HTML','html','command','code','code',2,10,1,0,1,'',0,'0000-00-00 00:00:00'),(29,'Numbered List','numlist','command','numlist','numlist',2,11,1,0,1,'',0,'0000-00-00 00:00:00'),(30,'Bullet List','bullist','command','bullist','bullist',2,12,1,0,1,'',0,'0000-00-00 00:00:00'),(31,'Anchor','anchor','command','anchor','anchor',2,13,1,0,1,'',0,'0000-00-00 00:00:00'),(32,'Image','image','command','image','image',2,14,1,0,1,'',0,'0000-00-00 00:00:00'),(33,'Link','link','command','link','link',2,15,1,0,1,'',0,'0000-00-00 00:00:00'),(34,'Code Cleanup','cleanup','command','cleanup','cleanup',2,16,1,0,1,'',0,'0000-00-00 00:00:00'),(35,'Directionality','directionality','plugin','ltr,rtl','directionality',3,1,1,0,1,'',0,'0000-00-00 00:00:00'),(36,'Emotions','emotions','plugin','emotions','emotions',3,2,1,0,1,'',0,'0000-00-00 00:00:00'),(37,'Fullscreen','fullscreen','plugin','fullscreen','fullscreen',3,3,1,0,1,'',0,'0000-00-00 00:00:00'),(38,'Preview','preview','plugin','preview','preview',3,4,1,0,1,'',0,'0000-00-00 00:00:00'),(39,'Tables','table','plugin','tablecontrols','buttons',3,5,1,0,1,'',0,'0000-00-00 00:00:00'),(40,'Print','print','plugin','print','print',3,6,1,0,1,'',0,'0000-00-00 00:00:00'),(41,'Horizontal Rule','hr','command','hr','hr',3,7,1,0,1,'',0,'0000-00-00 00:00:00'),(42,'Subscript','sub','command','sub','sub',3,8,1,0,1,'',0,'0000-00-00 00:00:00'),(43,'Superscript','sup','command','sup','sup',3,9,1,0,1,'',0,'0000-00-00 00:00:00'),(44,'Visual Aid','visualaid','command','visualaid','visualaid',3,10,1,0,1,'',0,'0000-00-00 00:00:00'),(45,'Character Map','charmap','command','charmap','charmap',3,11,1,0,1,'',0,'0000-00-00 00:00:00'),(46,'Remove Format','removeformat','command','removeformat','removeformat',2,1,1,0,1,'',0,'0000-00-00 00:00:00'),(47,'Styles','style','plugin','styleprops','style',4,1,1,0,1,'',0,'0000-00-00 00:00:00'),(48,'Non-Breaking','nonbreaking','plugin','nonbreaking','nonbreaking',4,2,1,0,1,'',0,'0000-00-00 00:00:00'),(49,'Visual Characters','visualchars','plugin','visualchars','visualchars',4,3,1,0,1,'',0,'0000-00-00 00:00:00'),(50,'XHTML Xtras','xhtmlxtras','plugin','cite,abbr,acronym,del,ins,attribs','xhtmlxtras',4,4,1,0,1,'',0,'0000-00-00 00:00:00'),(51,'Image Manager','imgmanager','plugin','imgmanager','imgmanager',4,5,1,1,1,'',0,'0000-00-00 00:00:00'),(52,'Advanced Link','advlink','plugin','advlink','advlink',4,6,1,1,1,'',0,'0000-00-00 00:00:00'),(53,'Spell Checker','spellchecker','plugin','spellchecker','spellchecker',4,7,1,1,1,'',0,'0000-00-00 00:00:00'),(54,'Layers','layer','plugin','insertlayer,moveforward,movebackward,absolute','layer',4,8,1,0,1,'',0,'0000-00-00 00:00:00'),(55,'Advanced Code Editor','advcode','plugin','advcode','advcode',4,9,1,0,1,'',0,'0000-00-00 00:00:00'),(56,'Article Breaks','article','plugin','readmore,pagebreak','article',4,10,1,0,1,'',0,'0000-00-00 00:00:00');
/*!40000 ALTER TABLE `jos_jce_plugins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jos_jsefurls`
--

DROP TABLE IF EXISTS `jos_jsefurls`;
CREATE TABLE `jos_jsefurls` (
  `name` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `published` tinyint(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jos_jsefurls`
--

LOCK TABLES `jos_jsefurls` WRITE;
/*!40000 ALTER TABLE `jos_jsefurls` DISABLE KEYS */;
INSERT INTO `jos_jsefurls` VALUES ('SEO Iowa','http://www.meandv.com/Web-SEO',1),('Dermatologist Florida','http://www.wederm.com/Medical--Surgical',0),('Mohs Surgery','http://www.wederm.com/The-Mohs-Surgery-florida',0),('Truck Driving Jobs','http://www.heartlandexpress.com',1),('Truck Driving Job','http://www.heartlandexpress.com',1),('Truck Driver Jobs','http://www.heartlandexpress.com',1),('Truck Driver Job','http://www.heartlandexpress.com',1),('MBA','http://uiu.edu/programs/mba.html',0),('Rubber Sheet','http://www.gcpindustrial.com/gcp-approved-suppliers',1),('Criminal Justice Degree','http://www.uiu.edu/programs/criminal-justice-degree.html',0),('Online Courses','http://www.uiu.edu/programs/online-courses.html',0),('Online Schools','http://www.uiu.edu/programs/online-schools.html',0),('breast cancer treatment','http://www.sfrollc.com/breast-cancer-treatment',0),('Cancer Care','http://www.sfrollc.com/',0),('Prostate Cancer Treatment','http://www.sfrollc.com/prostate-cancer-treatment',0),('proton therapy','http://www.sfrollc.com/proton-therapy',0),('Brain Cancer Treatment','http://www.sfrollc.com/brain-cancer-treatment',0),('cancer treatment','http://www.sfrollc.com/',0),('Skin Cancer Treatment','http://www.sfrollc.com/skin-cancer-treatment',0),('Prostate Cancer Treatment','http://www.sfrollc.com/prostate-cancer-treatment',0),('Skin Rashes','http://www.wederm.com/allergic-contact-rashes',0),('Acne Treatments','http://www.wederm.com/acne',0),('Skin cancer treatment','http://www.wederm.com/skin-cancer',0),('Online Schools','http://www.uiu.edu/programs/online-schools.html',0),('Marketing Degrees','http://uiu.edu/factsheets/marketing.html',0),('accredited online university ','http://uiu.edu/aboutuiu/Accreditation.html',0),('College Credit Online','http://www.uiu.edu/academics/certificate/index.html',0),('university transfer credits','http://www.uiu.edu/admissions/transfer/index.html',0),('accredited online university','http://uiu.edu/aboutuiu/Accreditation.html',0),('Online Universities Accredited','http://www.sfrollc.com/',0),('cancer treatment','http://www.uiu.edu/aboutuiu/Accreditation.html',0),('Health Services Administration','http://uiu.edu/factsheets/health-service-administration.html',0);
/*!40000 ALTER TABLE `jos_jsefurls` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jos_menu`
--

DROP TABLE IF EXISTS `jos_menu`;
CREATE TABLE `jos_menu` (
  `id` int(11) NOT NULL auto_increment,
  `menutype` varchar(75) default NULL,
  `name` varchar(255) default NULL,
  `alias` varchar(255) NOT NULL default '',
  `link` text,
  `type` varchar(50) NOT NULL default '',
  `published` tinyint(1) NOT NULL default '0',
  `parent` int(11) unsigned NOT NULL default '0',
  `componentid` int(11) unsigned NOT NULL default '0',
  `sublevel` int(11) default '0',
  `ordering` int(11) default '0',
  `checked_out` int(11) unsigned NOT NULL default '0',
  `checked_out_time` datetime NOT NULL default '0000-00-00 00:00:00',
  `pollid` int(11) NOT NULL default '0',
  `browserNav` tinyint(4) default '0',
  `access` tinyint(3) unsigned NOT NULL default '0',
  `utaccess` tinyint(3) unsigned NOT NULL default '0',
  `params` text NOT NULL,
  `lft` int(11) unsigned NOT NULL default '0',
  `rgt` int(11) unsigned NOT NULL default '0',
  `home` int(1) unsigned NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `componentid` (`componentid`,`menutype`,`published`,`access`),
  KEY `menutype` (`menutype`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jos_menu`
--

LOCK TABLES `jos_menu` WRITE;
/*!40000 ALTER TABLE `jos_menu` DISABLE KEYS */;
INSERT INTO `jos_menu` VALUES (1,'mainmenu','Home','home','index.php?option=com_content&view=frontpage','component',1,0,20,0,6,0,'0000-00-00 00:00:00',0,0,0,3,'num_leading_articles=1\nnum_intro_articles=4\nnum_columns=2\nnum_links=4\norderby_pri=\norderby_sec=front\nmulti_column_order=1\nshow_pagination=2\nshow_pagination_results=1\nshow_feed_link=1\nshow_noauth=1\nshow_title=0\nlink_titles=0\nshow_intro=0\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_author=0\nshow_create_date=0\nshow_modify_date=0\nshow_item_navigation=0\nshow_readmore=0\nshow_vote=0\nshow_icons=0\nshow_pdf_icon=0\nshow_print_icon=0\nshow_email_icon=0\nshow_hits=0\nfeed_summary=\npage_title=Don\'t Test the Waters Iowa Flood Awareness - Iowa Insurance Division\nshow_page_title=0\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n',0,0,1),(2,'mainmenu','About Us','about-us','index.php?option=com_content&view=article&id=1','component',1,0,20,0,7,0,'0000-00-00 00:00:00',0,0,0,0,'show_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=Don\'t Test the Waters Iowa Flood Awareness - About Us\nshow_page_title=0\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n',0,0,0),(3,'mainmenu','Prepare','prepare','index.php?option=com_content&view=article&id=2','component',1,0,20,0,8,0,'0000-00-00 00:00:00',0,0,0,0,'show_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=Don\'t Test the Waters Iowa Flood Awareness - Prepare\nshow_page_title=0\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n',0,0,0),(4,'mainmenu','Protect','protect','index.php?option=com_content&view=article&id=3','component',1,0,20,0,9,0,'0000-00-00 00:00:00',0,0,0,0,'show_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=Don\'t Test the Waters Iowa Flood Awareness - Protect\nshow_page_title=0\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n',0,0,0),(5,'mainmenu','Purchase','purchase','index.php?option=com_content&view=article&id=4','component',1,0,20,0,10,0,'0000-00-00 00:00:00',0,0,0,0,'show_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=Don\'t Test the Waters Iowa Flood Awareness - Purchase\nshow_page_title=0\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n',0,0,0),(6,'mainmenu','Share Your Story','share-your-story','index.php?option=com_content&view=article&id=5','component',-2,0,20,0,4,0,'0000-00-00 00:00:00',0,0,0,0,'show_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n',0,0,0),(7,'Top-Menu','Contact Us','contact-us','index.php?option=com_content&view=article&id=6','component',1,0,20,0,1,0,'0000-00-00 00:00:00',0,0,0,0,'show_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=Don\'t Test the Waters Iowa Flood Awareness -  Contact Us\nshow_page_title=0\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n',0,0,0),(8,'Footer-Menu','About Us','about-us','index.php?option=com_content&view=article&id=1','component',1,0,20,0,5,0,'0000-00-00 00:00:00',0,0,0,0,'show_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n',0,0,0),(9,'Footer-Menu','Prepare','prepare','index.php?option=com_content&view=article&id=2','component',1,0,20,0,6,0,'0000-00-00 00:00:00',0,0,0,0,'show_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n',0,0,0),(10,'Footer-Menu','Protect','protect','index.php?option=com_content&view=article&id=3','component',1,0,20,0,7,0,'0000-00-00 00:00:00',0,0,0,0,'show_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n',0,0,0),(11,'Footer-Menu','Purchase','purchase','index.php?option=com_content&view=article&id=4','component',1,0,20,0,8,0,'0000-00-00 00:00:00',0,0,0,0,'show_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n',0,0,0),(12,'Footer-Menu','Resources','resources','index.php?option=com_content&view=article&id=7','component',-2,0,20,0,1,0,'0000-00-00 00:00:00',0,0,0,0,'show_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n',0,0,0),(13,'Footer-Menu','Share Your Story','share-your-story','index.php?option=com_content&view=article&id=5','component',-2,0,20,0,4,0,'0000-00-00 00:00:00',0,0,0,0,'show_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n',0,0,0),(14,'Footer-Menu','Contact Us','contact-us','index.php?option=com_content&view=article&id=6','component',1,0,20,0,9,0,'0000-00-00 00:00:00',0,0,0,0,'show_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n',0,0,0),(15,'Footer-Menu','Share Your Story','share-your-story','index.php?option=com_testimonial&view=testimonial','component',-2,0,39,0,3,0,'0000-00-00 00:00:00',0,0,0,0,'page_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n',0,0,0),(25,'mainmenu','Resources','resources','index.php?option=com_content&view=article&id=7','component',1,0,20,0,11,0,'0000-00-00 00:00:00',0,0,0,0,'show_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=Don\'t Test the Waters Iowa Flood Awareness -  Resources\nshow_page_title=0\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n',0,0,0),(16,'mainmenu','News','news','index.php?option=com_news&view=news','component',0,0,37,0,3,0,'0000-00-00 00:00:00',0,0,0,0,'page_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n',0,0,0),(17,'mainmenu','Survey','survey','index.php?option=com_survey&view=survey','component',-2,0,45,0,5,0,'0000-00-00 00:00:00',0,0,0,0,'background_image=-1\npage_discription=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n',0,0,0),(18,'mainmenu','Video Archives','video-archives','index.php?option=com_content&view=article&id=9','component',1,2,20,1,1,0,'0000-00-00 00:00:00',0,0,0,0,'show_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=Don\'t Test the Waters Iowa Flood Awareness -- Video Archives\nshow_page_title=0\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n',0,0,0),(19,'mainmenu','Share Your Story','share-your-story','index.php?option=com_iidtestimonial&view=iidtestimonial','component',-2,0,50,0,2,0,'0000-00-00 00:00:00',0,0,0,0,'page_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n',0,0,0),(20,'Footer-Menu','Share Your Story','share-your-story','index.php?option=com_iidtestimonial&view=iidtestimonial','component',-2,0,50,0,2,0,'0000-00-00 00:00:00',0,0,0,0,'page_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n',0,0,0),(21,'mainmenu','Share Your Story','share-your-story','index.php?option=com_iidtestimonial&view=iidtestimonial','component',-2,0,58,0,1,0,'0000-00-00 00:00:00',0,0,0,0,'page_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n',0,0,0),(22,'mainmenu','Share Your Story','share-your-story','index.php?option=com_iidtestimonial&view=iidtestimonial','component',1,0,64,0,12,0,'0000-00-00 00:00:00',0,0,0,0,'page_title=Don\'t Test the Waters Iowa Flood Awareness - Share Your Story\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n',0,0,0),(23,'Footer-Menu','Share Your Story','share-your-story','index.php?option=com_iidtestimonial','url',1,0,0,0,10,0,'0000-00-00 00:00:00',0,0,0,0,'menu_image=-1\n\n',0,0,0),(24,'mainmenu','Flood Testimonials','flood-testimonials','index.php?option=com_content&view=article&id=8','component',0,22,20,1,1,0,'0000-00-00 00:00:00',0,0,0,0,'show_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=Don\'t Test the Waters Iowa Flood Awareness -  Flood Testimonials\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n',0,0,0),(26,'Footer-Menu','Flood Awareness Survey','flood-awareness-survey','index.php?option=com_survey&view=survey','component',1,0,48,0,11,0,'0000-00-00 00:00:00',0,0,0,0,'page_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n',0,0,0),(27,'Footer-Menu','News','news','index.php?option=com_news&view=news','component',1,0,37,0,12,0,'0000-00-00 00:00:00',0,0,0,0,'page_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n',0,0,0),(28,'mainmenu','Testimonials','testimonials','index.php?option=com_iidtestimonial&view=list','component',0,22,64,1,2,0,'0000-00-00 00:00:00',0,0,0,0,'page_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n',0,0,0),(29,'Top-Menu','| Survey','survey','index.php?option=com_survey&view=survey','component',0,0,48,0,2,0,'0000-00-00 00:00:00',0,0,0,0,'page_title=Flood Awareness Survey\nshow_page_title=0\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n',0,0,0),(30,'mainmenu','Flood Testimonials','flood-testimonials','index.php?option=com_iidtestimonial&view=list','component',1,22,64,1,3,0,'0000-00-00 00:00:00',0,0,0,0,'page_title=FLOOD TESTIMONIALS\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n',0,0,0),(31,'Hidden-Menu','Take A Quiz','take-a-quiz','index.php?option=com_poll&view=poll&id=1','component',1,0,10,0,1,0,'0000-00-00 00:00:00',0,0,0,0,'page_title=Take A Quiz \nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n',0,0,0);
/*!40000 ALTER TABLE `jos_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jos_menu_types`
--

DROP TABLE IF EXISTS `jos_menu_types`;
CREATE TABLE `jos_menu_types` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `menutype` varchar(75) NOT NULL default '',
  `title` varchar(255) NOT NULL default '',
  `description` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `menutype` (`menutype`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jos_menu_types`
--

LOCK TABLES `jos_menu_types` WRITE;
/*!40000 ALTER TABLE `jos_menu_types` DISABLE KEYS */;
INSERT INTO `jos_menu_types` VALUES (1,'mainmenu','Main Menu','The main menu for the site'),(2,'Top-Menu','Top Menu','Top Menu'),(3,'Footer-Menu','Footer Menu','Footer Menu'),(4,'Hidden-Menu','Hidden Menu','');
/*!40000 ALTER TABLE `jos_menu_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jos_messages`
--

DROP TABLE IF EXISTS `jos_messages`;
CREATE TABLE `jos_messages` (
  `message_id` int(10) unsigned NOT NULL auto_increment,
  `user_id_from` int(10) unsigned NOT NULL default '0',
  `user_id_to` int(10) unsigned NOT NULL default '0',
  `folder_id` int(10) unsigned NOT NULL default '0',
  `date_time` datetime NOT NULL default '0000-00-00 00:00:00',
  `state` int(11) NOT NULL default '0',
  `priority` int(1) unsigned NOT NULL default '0',
  `subject` text NOT NULL,
  `message` text NOT NULL,
  PRIMARY KEY  (`message_id`),
  KEY `useridto_state` (`user_id_to`,`state`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jos_messages`
--

LOCK TABLES `jos_messages` WRITE;
/*!40000 ALTER TABLE `jos_messages` DISABLE KEYS */;
/*!40000 ALTER TABLE `jos_messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jos_messages_cfg`
--

DROP TABLE IF EXISTS `jos_messages_cfg`;
CREATE TABLE `jos_messages_cfg` (
  `user_id` int(10) unsigned NOT NULL default '0',
  `cfg_name` varchar(100) NOT NULL default '',
  `cfg_value` varchar(255) NOT NULL default '',
  UNIQUE KEY `idx_user_var_name` (`user_id`,`cfg_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jos_messages_cfg`
--

LOCK TABLES `jos_messages_cfg` WRITE;
/*!40000 ALTER TABLE `jos_messages_cfg` DISABLE KEYS */;
/*!40000 ALTER TABLE `jos_messages_cfg` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jos_migration_backlinks`
--

DROP TABLE IF EXISTS `jos_migration_backlinks`;
CREATE TABLE `jos_migration_backlinks` (
  `itemid` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `url` text NOT NULL,
  `sefurl` text NOT NULL,
  `newurl` text NOT NULL,
  PRIMARY KEY  (`itemid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jos_migration_backlinks`
--

LOCK TABLES `jos_migration_backlinks` WRITE;
/*!40000 ALTER TABLE `jos_migration_backlinks` DISABLE KEYS */;
/*!40000 ALTER TABLE `jos_migration_backlinks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jos_modules`
--

DROP TABLE IF EXISTS `jos_modules`;
CREATE TABLE `jos_modules` (
  `id` int(11) NOT NULL auto_increment,
  `title` text NOT NULL,
  `content` text NOT NULL,
  `ordering` int(11) NOT NULL default '0',
  `position` varchar(50) default NULL,
  `checked_out` int(11) unsigned NOT NULL default '0',
  `checked_out_time` datetime NOT NULL default '0000-00-00 00:00:00',
  `published` tinyint(1) NOT NULL default '0',
  `module` varchar(50) default NULL,
  `numnews` int(11) NOT NULL default '0',
  `access` tinyint(3) unsigned NOT NULL default '0',
  `showtitle` tinyint(3) unsigned NOT NULL default '1',
  `params` text NOT NULL,
  `iscore` tinyint(4) NOT NULL default '0',
  `client_id` tinyint(4) NOT NULL default '0',
  `control` text NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `published` (`published`,`access`),
  KEY `newsfeeds` (`module`,`published`)
) ENGINE=MyISAM AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jos_modules`
--

LOCK TABLES `jos_modules` WRITE;
/*!40000 ALTER TABLE `jos_modules` DISABLE KEYS */;
INSERT INTO `jos_modules` VALUES (1,'Main Menu','',1,'user1',0,'0000-00-00 00:00:00',0,'mod_mainmenu',0,0,0,'menutype=mainmenu\nmenu_style=horiz_flat\nstartLevel=0\nendLevel=0\nshowAllChildren=0\nwindow_open=\nshow_whitespace=0\ncache=1\ntag_id=\nclass_sfx=\nmoduleclass_sfx=_menu\nmaxdepth=10\nmenu_images=0\nmenu_images_align=0\nmenu_images_link=0\nexpand_menu=0\nactivate_parent=0\nfull_active_id=0\nindent_image=0\nindent_image1=\nindent_image2=\nindent_image3=\nindent_image4=\nindent_image5=\nindent_image6=\nspacer=\nend_spacer=\n\n',1,0,''),(2,'Login','',1,'login',0,'0000-00-00 00:00:00',1,'mod_login',0,0,1,'',1,1,''),(3,'Popular','',3,'cpanel',0,'0000-00-00 00:00:00',1,'mod_popular',0,2,1,'',0,1,''),(4,'Recent added Articles','',4,'cpanel',0,'0000-00-00 00:00:00',1,'mod_latest',0,2,1,'ordering=c_dsc\nuser_id=0\ncache=0\n\n',0,1,''),(5,'Menu Stats','',5,'cpanel',0,'0000-00-00 00:00:00',1,'mod_stats',0,2,1,'',0,1,''),(6,'Unread Messages','',1,'header',0,'0000-00-00 00:00:00',1,'mod_unread',0,2,1,'',1,1,''),(7,'Online Users','',2,'header',0,'0000-00-00 00:00:00',1,'mod_online',0,2,1,'',1,1,''),(8,'Toolbar','',1,'toolbar',0,'0000-00-00 00:00:00',1,'mod_toolbar',0,2,1,'',1,1,''),(9,'Quick Icons','',1,'icon',0,'0000-00-00 00:00:00',1,'mod_quickicon',0,2,1,'',1,1,''),(10,'Logged in Users','',2,'cpanel',0,'0000-00-00 00:00:00',1,'mod_logged',0,2,1,'',0,1,''),(11,'Footer','',0,'footer',0,'0000-00-00 00:00:00',1,'mod_footer',0,0,1,'',1,1,''),(12,'Admin Menu','',1,'menu',0,'0000-00-00 00:00:00',1,'mod_menu',0,2,1,'',0,1,''),(13,'Admin SubMenu','',1,'submenu',0,'0000-00-00 00:00:00',1,'mod_submenu',0,2,1,'',0,1,''),(14,'User Status','',1,'status',0,'0000-00-00 00:00:00',1,'mod_status',0,2,1,'',0,1,''),(15,'Title','',1,'title',0,'0000-00-00 00:00:00',1,'mod_title',0,2,1,'',0,1,''),(16,'Search','',1,'right',0,'0000-00-00 00:00:00',1,'mod_search',0,0,0,'moduleclass_sfx=\nwidth=20\ntext=\nbutton=1\nbutton_pos=right\nimagebutton=\nbutton_text=\nset_itemid=\ncache=1\ncache_time=900\n\n',0,0,''),(17,'TAKE A QUIZ','',1,'poll',0,'0000-00-00 00:00:00',1,'mod_poll',0,0,1,'id=1\nmoduleclass_sfx=\ncache=1\ncache_time=900\n\n',0,0,''),(18,'Top Menu','',0,'top',0,'0000-00-00 00:00:00',1,'mod_mainmenu',0,0,0,'menutype=Top-Menu\nmenu_style=horiz_flat\nstartLevel=0\nendLevel=0\nshowAllChildren=0\nwindow_open=\nshow_whitespace=0\ncache=1\ntag_id=\nclass_sfx=-nav\nmoduleclass_sfx=\nmaxdepth=10\nmenu_images=0\nmenu_images_align=0\nmenu_images_link=0\nexpand_menu=0\nactivate_parent=0\nfull_active_id=0\nindent_image=0\nindent_image1=\nindent_image2=\nindent_image3=\nindent_image4=\nindent_image5=\nindent_image6=\nspacer=\nend_spacer=\n\n',0,0,''),(19,'Video First','',2,'right',0,'0000-00-00 00:00:00',0,'mod_iid_video',0,0,0,'background_image=images/iid_images/neighborhood_flood_1.jpg\nclasssufix=\nvideo_type=youtubevideo\nid=http://www.youtube.com/v/c63v9aQCg14\nheight=\nwidth=\n\n',0,0,''),(20,'Footer Menu','',1,'footer',0,'0000-00-00 00:00:00',1,'mod_mainmenu',0,0,0,'menutype=Footer-Menu\nmenu_style=horiz_flat\nstartLevel=0\nendLevel=0\nshowAllChildren=0\nwindow_open=\nshow_whitespace=0\ncache=1\ntag_id=\nclass_sfx=-footer\nmoduleclass_sfx=\nmaxdepth=10\nmenu_images=0\nmenu_images_align=0\nmenu_images_link=0\nexpand_menu=0\nactivate_parent=0\nfull_active_id=0\nindent_image=0\nindent_image1=\nindent_image2=\nindent_image3=\nindent_image4=\nindent_image5=\nindent_image6=\nspacer=\\|\nend_spacer=\n\n',0,0,''),(21,'Footer Icons','<table border=\"0\">\r\n<tbody>\r\n<tr>\r\n<td valign=\"middle\"><a href=\"http://www.iid.state.ia.us/\" target=\"_blank\" title=\"Iowa Insurance Division\"><img src=\"images/iid_images/logo1.png\" border=\"0\" width=\"63\" height=\"67\" /></a></td>\r\n<td valign=\"middle\"><a href=\"http://www.FloodSmart.gov\" target=\"_blank\" title=\"www.FloodSmart.gov\"><img src=\"images/iid_images/logo2.png\" border=\"0\" width=\"137\" height=\"31\" /></a></td>\r\n<td valign=\"middle\"><a href=\"http://www.iowadnr.gov/\" target=\"_blank\" title=\"Iowa DNR\"><img src=\"images/iid_images/logo3.png\" border=\"0\" width=\"70\" height=\"46\" /></a></td>\r\n<td valign=\"middle\"><a href=\"http://www.weather.gov/\" target=\"_blank\" title=\"National Weather Service\"><img src=\"images/iid_images/logo4.png\" border=\"0\" width=\"63\" height=\"63\" /></a></td>\r\n<td valign=\"middle\"><a href=\"http://www.fema.gov/\" target=\"_blank\" title=\"Federal Emergency Management Agency\"><img src=\"images/iid_images/logo5.png\" border=\"0\" width=\"132\" height=\"48\" /></a></td>\r\n<td valign=\"middle\"><a href=\"http://www.iowahomelandsecurity.org/\" target=\"_blank\" title=\"Iowa Homeland Security and Emergency Management Division\"><img src=\"images/iid_images/logo6.png\" border=\"0\" width=\"57\" height=\"57\" /></a></td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p><input id=\"gwProxy\" type=\"hidden\" /><input id=\"jsProxy\" onclick=\"if(typeof(jsCall)==\'function\'){jsCall();}else{setTimeout(\'jsCall()\',500);}\" type=\"hidden\" /></p>',0,'footerlogo',0,'0000-00-00 00:00:00',1,'mod_custom',0,0,0,'moduleclass_sfx=\n\n',0,0,''),(22,'Copyright','<p>© 2011 Iowa Insurance Divison, All Rights Reserved</p>',0,'copyright',0,'0000-00-00 00:00:00',1,'mod_custom',0,0,0,'moduleclass_sfx=\n\n',0,0,''),(23,'Home Button','<p><a href=\"http://www.floodsmart.gov/floodsmart/pages/choose_your_policy/agent_locator.jsp\" target=\"_New\"><img src=\"images/iid_images/button1.png\" style=\"padding-top: 10px; margin-bottom: 0px;\" border=\"0\" height=\"68\" width=\"193\" /></a> <a href=\"index.php?option=com_survey&amp;view=survey&amp;Itemid=18\"><img src=\"images/iid_images/button2.png\" style=\"padding-top: 10px; margin-bottom: 0px;\" border=\"0\" height=\"68\" width=\"193\" /></a><a href=\"index.php?option=com_news&amp;view=news&amp;Itemid=27\"> <img src=\"images/iid_images/button3.png\" style=\"padding-top: 10px; margin-bottom: 0px;\" border=\"0\" height=\"68\" width=\"193\" /></a></p>',3,'left',0,'0000-00-00 00:00:00',1,'mod_custom',0,0,0,'moduleclass_sfx=\n\n',0,0,''),(24,'Logo','<p><a href=\"index.php\"><img src=\"images/iid_images/logo.png\" border=\"0\" width=\"170\" height=\"107\" style=\"border:0px;\" /></a><a></a></p>',1,'left',0,'0000-00-00 00:00:00',1,'mod_custom',0,0,0,'moduleclass_sfx=\n\n',0,0,''),(25,'Font Resizer','',0,'user7',0,'0000-00-00 00:00:00',1,'mod_iid_fontresize',0,0,0,'defaultsizefront=16\ndefaultsizeinner=16\nmaxsizefront=26\nmaxsizeinner=26\nminsizefront=6\nminsizeinner=6\ntypefront=px\ntypeinner=px\n\n',0,0,''),(26,'Homegallery','',1,'user8',0,'0000-00-00 00:00:00',0,'mod_iid_homegallery',0,0,0,'image_path=homegallery\nmoduleclass_sfx=\n\n',0,0,''),(27,'Homegallery','',0,'user8',0,'0000-00-00 00:00:00',1,'mod_iid_homegalleryrotate',0,0,0,'image_path=homegallery\nmoduleclass_sfx=\n\n',0,0,''),(28,'Prepare','<ul>\r\n<li>Learn your flood risk: Anywhere it can rain, it can flood. </li>\r\n<li>1 out of every 4 flood claims comes from a moderate- to low-risk flood area. </li>\r\n<li>Learn your individual flood risk by entering your address at <a href=\"http://www.floodsmart.gov/\" target=\"_blank\" title=\"www.FloodSmart.gov\">www.FloodSmart.gov</a>.</li>\r\n<li>Make an evacuation plan: Prepare and practice a flood evacuation route. </li>\r\n<li>Ask someone out of state to be your family contact in an emergency. </li>\r\n<li>Make sure everyone knows the contact’s address and phone number.</li>\r\n<li>Plan where to park and leave your car in case of an evacuation.</li>\r\n<li>Build an emergency supply kit: Food, bottled water, first aid supplies, medicines, etc. </li>\r\n<li>Visit <a href=\"http://www.BeReadyIowa.org\" target=\"_blank\" title=\"www.BeReadyIowa.org\">www.BeReadyIowa.org</a> for a disaster supply checklist.</li>\r\n<li>Monitor the weather and sign up for free phone and text alerts in your community.</li>\r\n<li>Know and understand conditions that cause flooding.</li>\r\n<li>Plan for your pets: Many shelters do not allow pets. </li>\r\n</ul>',0,'prepare',0,'0000-00-00 00:00:00',1,'mod_custom',0,0,0,'moduleclass_sfx=\n\n',0,0,''),(29,'Protect','<ul>\r\n<li>Consider taking some simple steps to reduce the risk of flood damage to your home and your belongings.</li>\r\n<li>Visit <a href=\"http://www.flash.org/\" target=\"_blank\" title=\"www.Flash.org\">www.FLASH.org</a>. for ideas and information.</li>\r\n<li>Check if you can install a valve to stop sewer back-up into your basement.</li>\r\n<li>Consider options during construction: Elevate your property and use flood-resistant materials.</li>\r\n<li>Conduct a household inventory: For help in conducting a home inventory, visit <a href=\"http://www.knowyourstuff.org/\" target=\"_blank\" title=\"www.KnowYourStuff.org\">www.KnowYourStuff.org</a>.</li>\r\n<li>Store copies of irreplaceable documents (birth certificates, passports, etc.) in a safe, dry place. </li>\r\n<li>Keep original documents in a safe deposit box.</li>\r\n<li>Learn how to shut off all your utilities in case you have to evacuate.</li>\r\n<li>Elevate and anchor your tanks (such as hot water heater or LP tank) and furnace.</li>\r\n<li>Keep kids away from flood waters. They are less likely to understand the dangers.</li>\r\n</ul>',0,'protect',0,'0000-00-00 00:00:00',1,'mod_custom',0,0,0,'moduleclass_sfx=\n\n',0,0,''),(36,'Take a Quiz','<a href=\"index.php?option=com_poll&amp;view=poll&amp;Itemid=31\"><img style=\"margin-left: 15px; margin-top: 10px;\" src=\"images/iid_images/take_a_quiz.png\" border=\"0\" /></a> <br /> \r\n<table width=\"100%\">\r\n<tbody>\r\n<tr>\r\n<td height=\"180\">&nbsp;</td>\r\n</tr>\r\n</tbody>\r\n</table>',5,'right',0,'0000-00-00 00:00:00',1,'mod_custom',0,0,0,'moduleclass_sfx=\n\n',0,0,''),(30,'Purchase','<ul>\r\n<li>Make sure you have the right insurance coverage:</li>\r\n<li>Most homeowners insurance policies do not cover flood damage or sewer backup, so be sure to consider flood insurance for both your structure and its contents. </li>\r\n<li>There is typically a 30-day wait for a flood insurance policy to take effect.</li>\r\n<li>Ask your insurance agent if an additional rider for water in your basement from sewer backup is right for you.</li>\r\n<li>Consider flood insurance: The average flood insurance policy premium is around $750 a year and provides structure and contents coverage. In moderate- to low risk areas, homeowners can protect their properties with lower-cost Preferred Risk Policies (PRPs).</li>\r\n<li>Find out if your community participates in the National Flood Insurance Program at <a href=\"http://www.floodsmart.gov/\" target=\"_blank\" title=\"www.FloodSmart.gov\">www.FloodSmart.gov</a>.</li>\r\n<li>If it doesn’t, ask your community leaders about participation in this free program. It can make flood insurance an option for you.</li>\r\n</ul>',0,'purchase',0,'0000-00-00 00:00:00',1,'mod_custom',0,0,0,'moduleclass_sfx=\n\n',0,0,''),(38,'Hidden Menu','',2,'left',0,'0000-00-00 00:00:00',0,'mod_mainmenu',0,0,1,'menutype=Hidden-Menu',0,0,''),(31,'ARI Ext Menu','',0,'user1',0,'0000-00-00 00:00:00',1,'mod_iid_ariextmenu',0,0,1,'menutype=mainmenu\nmoduleclass_sfx=\nloadMethod=ready\nstartLevel=0\nendLevel=-1\nonlyActiveItems=0\ndelay=0.2\nzIndex=\nloadAssets=core\nuniqId=0\nautoWidth=1\ntransitionType=fade\ntransitionDuration=0.2\nanimate=1\nfontSize=12px\nfontWeight=normal\ntextTransform=none\ndirection=horizontal\nstyle=\n\n',0,0,''),(35,'download_brochure','<a target=\"_blank\" href=\"images/iid_images/media/brochure_web_23713.pdf\"><img style=\"margin-left: 15px; margin-top: 10px;\" src=\"images/iid_images/download_brochure.png\" border=\"0\" /></a>',4,'right',0,'0000-00-00 00:00:00',1,'mod_custom',0,0,0,'moduleclass_sfx=\n\n',0,0,''),(34,'Flood Testimonials','<a href=\"index.php?option=com_iidtestimonial&amp;view=list&amp;Itemid=30\"><img style=\"margin-left: 15px; margin-top: 10px;\" src=\"images/iid_images/neighborhood_flood_1.jpg\" border=\"0\" /></a>',3,'right',0,'0000-00-00 00:00:00',1,'mod_custom',0,0,0,'moduleclass_sfx=\n\n',0,0,''),(33,'Flood Preparedness Floodsmart PSA','',0,'video',0,'0000-00-00 00:00:00',1,'mod_iid_video',0,0,1,'background_image=images/iid_images/neighborhood_flood_1.jpg\nclasssufix=\nvideo_type=youtubevideo\nid=http://www.youtube.com/v/l_gK3Qmi4RY\nheight=\nwidth=\n\n',0,0,'');
/*!40000 ALTER TABLE `jos_modules` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jos_modules_menu`
--

DROP TABLE IF EXISTS `jos_modules_menu`;
CREATE TABLE `jos_modules_menu` (
  `moduleid` int(11) NOT NULL default '0',
  `menuid` int(11) NOT NULL default '0',
  PRIMARY KEY  (`moduleid`,`menuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jos_modules_menu`
--

LOCK TABLES `jos_modules_menu` WRITE;
/*!40000 ALTER TABLE `jos_modules_menu` DISABLE KEYS */;
INSERT INTO `jos_modules_menu` VALUES (1,0),(16,0),(17,0),(18,0),(19,0),(20,0),(21,0),(22,0),(23,0),(24,0),(25,0),(26,0),(27,0),(28,0),(29,0),(30,0),(31,0),(33,0),(34,0),(35,0),(36,0),(38,0);
/*!40000 ALTER TABLE `jos_modules_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jos_news`
--

DROP TABLE IF EXISTS `jos_news`;
CREATE TABLE `jos_news` (
  `id` int(11) NOT NULL auto_increment,
  `news_title` varchar(255) default NULL,
  `short_description` text,
  `contact_person` varchar(50) NOT NULL,
  `contact_title` varchar(50) NOT NULL,
  `address_line1` varchar(50) NOT NULL,
  `address_line2` varchar(50) default NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(20) NOT NULL,
  `zip_code` int(11) NOT NULL,
  `phone` varchar(20) default NULL,
  `email` varchar(50) default NULL,
  `description` text NOT NULL,
  `logo_image` longblob NOT NULL,
  `website_url` varchar(255) default NULL,
  `news_layout` tinyint(1) NOT NULL default '1',
  `created_by` int(11) default NULL,
  `created_date` date default NULL,
  `last_update` date default NULL,
  `hits` int(11) default '0',
  `file_name` varchar(50) NOT NULL,
  `file_type` varchar(50) NOT NULL,
  `file_size` int(11) NOT NULL default '0',
  `file_width` int(11) NOT NULL default '0',
  `file_height` int(11) NOT NULL default '0',
  `publish_frontpage` tinyint(1) unsigned NOT NULL,
  `published` tinyint(1) unsigned NOT NULL default '1',
  `checked_out` int(11) unsigned NOT NULL,
  `chedked_out_time` datetime NOT NULL default '0000-00-00 00:00:00',
  `ordering` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jos_news`
--

LOCK TABLES `jos_news` WRITE;
/*!40000 ALTER TABLE `jos_news` DISABLE KEYS */;
INSERT INTO `jos_news` VALUES (2,' Insurance Commissioner Voss Announces “Don’t Test the Waters”','Flood Awareness Program to Prepare, Protect and Possibly Purchase Flood Insurance.','Tom Alger','Communications Director','330 Maple Street','','Des Moines','IA',50319,'(515) 242-5179','Tom.Alger@iid.state.ia.us','Iowa Insurance Commissioner Susan E. Voss announced today that the Iowa Insurance Division (IID), in collaboration with the Department of Natural Resources and Homeland Security and Emergency Management, has launched a statewide flood awareness program. The “Don’t Test the Waters” public information program will educate Iowans on how to prepare for a flood, protect property from flooding and determine if flood insurance is appropriate for them.\r\n<p>“The Floods of 2008 caused 85 of 99 Iowa counties to be declared disaster areas,” said Commissioner Voss.  “Unfortunately, many Iowans learned the hard way that you don’t have to be in a high-risk zone to become a victim of flood devastation—a flood can happen to anyone and at any time of the year.”</p>\r\n<p>Floods are normally associated with spring snow thaw and heavy rains, causing rivers or lakes to rise above the flood plain levels. Last year, Iowa also saw flooding from levee or dam overflow or failure. New construction and development along with changes in agricultural drainage and changes in crops being planted may also contribute to an increased likelihood of more flooding in the future. Even for residents who live miles from any body of water, quick snowmelt, ice dams and intense rains can cause flash flooding in low-lying areas or cause sewers to back up in basements.</p>\r\n<p>“That is why it is more important than ever to educate Iowans of their flood risk. It only takes a few inches of floodwater to cause tens of thousands of dollars in damages. Flood-related damage, and that from sewer backups, is not covered in most homeowner policies,” said Voss. “It is equally important to help Iowans start planning now to be ready for potential floods by taking the appropriate steps to reduce the impact of flooding to their homes, businesses, families, pets and finances.”</p>\r\n<p>One option that becomes apparent during the planning process is purchasing National Flood Insurance Program (NFIP) flood insurance, which is sold through qualified insurance agents and administered by the Federal Emergency Management Agency (FEMA). The NFIP offers flood insurance to homeowners, renters, and business owners, if their community participates in the NFIP. As a condition of making it possible for their residents to purchase this important protection from flooding. Participating communities agree to adopt and enforce ordinances that meet or exceed FEMA requirements in order to reduce the risk of property damage from flooding.</p>\r\n<p>Flood insurance is required for buildings in high-risk flood areas as a condition of receiving a mortgage from a federally regulated or insured lender, as well as for properties that have received FEMA assistance in a previous flood. Failure to carry flood insurance could result in the denial of future federal disaster assistance.</p>\r\n<p>“In addition to those Iowans who are required to carry flood insurance, residents living in low- to medium-risk areas may find purchasing flood insurance voluntarily is also a good option for them, with Prefered Risk Policy (PRP) rates starting as low as $129 per year for building and contents protection,” said Voss.  “Nearly 25 percent of flood insurance claims come from residents and businesses in these lower-risk areas.”</p>\r\n<p>The Iowa Insurance Division and its agency partners have created several online planning tools to assess flood risk and insurance rates, determine in which communities NFIP flood insurance is offered and decide whether NFIP flood insurance is a suitable purchase for each individual’s unique situation. The assessment and other guidance, such as tips for preparing for a flood and protecting assets and family, a list of local flood insurance agents and important policy questions to ask insurance agents, can be found on the program website, <a target=\"_self\" title=\"www.DontTestTheWatersIowa.gov\" href=\"http://www.DontTestTheWatersIowa.gov\">www.DontTestTheWatersIowa.gov</a>.</p>\r\n<p>“Flood Safety Awareness Week presents a good opportunity to prepare by making a plan and putting together an emergency kit; protecting your property by installing a valve to stop sewer backup in your basement; and purchasing flood insurance, if it’s right for you,” said Voss. “We encourage Iowans to visit <a target=\"_self\" title=\"www.DontTestTheWatersIowa.gov\" href=\"http://www.DontTestTheWatersIowa.gov\">www.DontTestTheWatersIowa.gov</a> and discover many other tips on how to prepare, protect and possibly purchase flood insurance for peace-of-mind. Most flood insurance policies take 30 days to become effective, so the time to take action is now, not when you hear that the river is rising.”</p>\r\n<p>In addition to a website, the public education program includes a brochure, an advertising campaign to raise awareness of the program, direct marketing and town hall meetings in communities most heavily affected by the Floods of 2008.  The state of Iowa’s Flood Awareness Month is March and the National Flood Safety Awareness Week runs March 14-18. Funding for the program is provided through a federal Community Development Block Grant.</p>\r\n<p><strong>About the Iowa Insurance Division</strong></p>\r\n<p>The Iowa Insurance Division (IID) has general control, supervision and direction over all insurance and securities business transacted in the state, and enforces Iowa’s laws and regulations. The IID investigates consumer complaints and prosecutes companies, agents and brokers engaging in unfair trade practices. Consumers with insurance or investment questions or complaints may contact the IID toll-free at 877-955-1212, or visit the division on the Web at <a target=\"_blank\" title=\"www.iid.state.ia.us\" href=\"http://www.iid.state.ia.us\">www.iid.state.ia.us</a>.</p>','','www.DontTestTheWatersIowa.gov',1,NULL,'2011-02-21',NULL,127,'','',0,0,0,0,0,0,'0000-00-00 00:00:00',8),(3,'Governor Proclaims Flood Awareness Month','Today marks the start of Gov. Terry Branstad’s proclaimed Flood Awareness Month, which will focus on teaching Iowans about flood risks and ways to prevent destruction. And officials say now is the time to start preparing.\r\n\r\n','Tom Alger','Iowa Insurance Division','','','','',50309,'(515) 242-5179','tom.alger@iid.iowa.gov','<p>\r\n<p>On March 1 several state agencies will kick off a month-long Flood Awareness Month campaign to assist Iowans in preparing for and remaining safe during flood events. Flood awareness is particularly important when considering the damage caused by flooding in 2008 and 2010. Already this year homes have been damaged in Fort Dodge in a flood created by high river levels and ice jams.</p>\r\n<p>Governor Terry Branstad has signed a proclamation officially declaring March Flood Awareness Month. “It is important for Iowans to know the steps they can take to protect themselves and their property from future flood events,” said Governor Branstad. “The Flood Awareness Month campaign will help educate Iowans about resources available to minimize loss when flooding occurs.”</p>\r\n<p>Flood-related information and safety tips will be shared throughout March with the media and the public by officials from the Iowa Insurance Division, the Rebuild Iowa Office, the Iowa Department of Natural Resources and the Iowa Homeland Security and Emergency Management Division.</p>\r\n<p>State officials advise people to begin assessing their flood risk by being aware of whether they live in or near a flood plain, discussing flood preparations with their families, and considering whether flood insurance would be a good choice for them. Iowans who rent or own a home or business should also be aware of the availability of flood insurance. Iowans want to consider looking into the insurance as soon as possible, because unlike homeowner’s insurance, there is a 30-day waiting period before flood insurance begins once a person purchases a policy. Iowans can find out more by visiting the Iowa Insurance Division’s new flood awareness Web site at <a target=\"_blank\" href=\"http://www.donttestthewatersiowa.gov/\">www.DontTestTheWatersIowa.gov</a>.</p>\r\n<p>Another helpful Web site for Iowans to refer to is <a target=\"_blank\" href=\"http://www.floodsmart.gov/\">www.FloodSmart.gov</a>. Homeowners, renters and small business owners can estimate their premiums, calculate their flood insurance rate and find a local insurance agent qualified to sell flood insurance on this site. There are currently 17,164 policies in Iowa, up 56-percent from the time prior to the 2008 floods.</p>\r\n<p>Lastly, Iowa’s Homeland Security and Emergency Management Division (HSEMD) offers three simple steps for Iowans to protect themselves and their families before a flood or disaster occurs:</p>\r\n<ul>\r\n<li>Learn about and stay aware of flood risks in your community. </li>\r\n<li>Work with family members to put together a family emergency and evacuation plan. </li>\r\n<li>Put together an emergency kit before a disaster strikes. </li>\r\n</ul>\r\n</p>\r\n<p>Iowans can learn more about flood safety tips, evacuation plans and how to prepare for a disaster at HSEMD’s Web site <a target=\"_blank\" href=\"http://www.bereadyiowa.org/\">www.bereadyiowa.org</a>.</p>','','',1,NULL,'2011-03-01',NULL,425,'','',0,0,0,1,1,0,'0000-00-00 00:00:00',7),(4,'Insurance Commissioner Voss Announces “Don’t Test the Waters” ','Flood Awareness Program to Prepare, Protect and Possibly Purchase Flood Insurance Launched Statewide for Flood Awareness Month in March.','Tom Alger','Communications Director','','','','',50309,'515.242.5179','Tom.Alger@iid.state.ia.us','<p>Iowa Insurance Commissioner Susan E. Voss announced today that the Iowa Insurance Division (IID), in collaboration with the Department of Natural Resources and Homeland Security and Emergency Management, has launched its flood awareness program statewide for Flood Awareness Month. Iowa Governor Terry Branstad signed a proclamation officially declaring March as Flood Awareness Month in Iowa.  </p>\r\n<p>The “Don’t Test the Waters” public information program will educate Iowans on how to prepare for a flood, protect property from flooding and determine if flood insurance is appropriate for them. <br />“The Floods of 2008 caused 85 of 99 Iowa counties to be declared disaster areas,” said Commissioner Voss.  “Unfortunately, many Iowans learned the hard way that you don’t have to be in a high-risk zone to become a victim of flood devastation—a flood can happen to anyone and at any time of the year.”<br /><br />Floods are normally associated with spring snow thaw and heavy rains, causing rivers or lakes to rise above the flood plain levels. Last year, Iowa also saw flooding from levee or dam overflow or failure. New construction and development along with changes in agricultural drainage and changes in crops being planted may also contribute to an increased likelihood of more flooding in the future. Even for residents who live miles from any body of water, quick snowmelt, ice dams and intense rains can cause flash flooding in low-lying areas or cause sewers to back up in basements.</p>\r\n<p>“That is why it is more important than ever to educate Iowans of their flood risk. It only takes a few inches of floodwater to cause tens of thousands of dollars in damages. Flood-related damage, and that from sewer backups, is not covered in most homeowner policies,” said Voss. “It is equally important to help Iowans start planning now to be ready for potential floods by taking the appropriate steps to reduce the impact of flooding to their homes, businesses, families, pets and finances.”       <br /><br />One option that becomes apparent during the planning process is purchasing National Flood Insurance Program (NFIP) flood insurance, which is sold through qualified insurance agents and administered by the Federal Emergency Management Agency (FEMA). The NFIP offers flood insurance to homeowners, renters, and business owners, if their community participates in the NFIP. As a condition of making it possible for their residents to purchase this important protection from flooding. Participating communities agree to adopt and enforce ordinances that meet or exceed FEMA requirements in order to reduce the risk of property damage from flooding.<br /><br />Flood insurance is required for buildings in high-risk flood areas as a condition of receiving a mortgage from a federally regulated or insured lender, as well as for properties that have received FEMA assistance in a previous flood. Failure to carry flood insurance could result in the denial of future federal disaster assistance. <br /><br />“In addition to those Iowans who are required to carry flood insurance, residents living in low- to medium-risk areas may find purchasing flood insurance voluntarily is also a good option for them, with Prefered Risk Policy (PRP) rates starting as low as $129 per year for building and contents protection,” said Voss.  “Nearly 25 percent of flood insurance claims come from residents and businesses in these lower-risk areas.”<br /><br /> The Iowa Insurance Division and its agency partners have created several online planning tools to assess flood risk and insurance rates, determine in which communities NFIP flood insurance is offered and decide whether NFIP flood insurance is a suitable purchase for each individual’s unique situation. The assessment and other guidance, such as tips for preparing for a flood and protecting assets and family, a list of local flood insurance agents and important policy questions to ask insurance agents, can be found on the program website, www.DontTestTheWatersIowa.gov.     <br /><br />“Flood Safety Awareness Week presents a good opportunity to prepare by making a plan and putting together an emergency kit; protecting your property by installing a valve to stop sewer backup in your basement; and purchasing flood insurance, if it’s right for you,” said Voss. “We encourage Iowans to visit www.DontTestTheWatersIowa.gov and discover many other tips on how to prepare, protect and possibly purchase flood insurance for peace-of-mind. Most flood insurance policies take 30 days to become effective, so the time to take action is now, not when you hear that the river is rising.” <br /><br />In addition to a website, the public education program includes a brochure, an advertising campaign to raise awareness of the program, direct marketing and town hall meetings in communities most heavily affected by the floods in 2008 and 2010.  The state of Iowa’s Flood Awareness Month is March and the National Flood Safety Awareness Week runs March 14-18. Funding for the program is provided through a federal Community Development Block Grant.<br /> <br />About the Iowa Insurance Division<br />The Iowa Insurance Division (IID) has general control, supervision and direction over all insurance and securities business transacted in the state, and enforces Iowa’s laws and regulations. The IID investigates consumer complaints and prosecutes companies, agents and brokers engaging in unfair trade practices. Consumers with insurance or investment questions or complaints may contact the IID toll-free at 877-955-1212, or visit the division on the Web at www.iid.state.ia.us.</p>','','',1,NULL,'2011-03-03',NULL,820,'','',0,0,0,1,1,0,'0000-00-00 00:00:00',6),(5,'Iowa Insurance Division and Interagency Partners Host  Flood Awareness Community Meetings','Don’t Test the Waters Iowa—Community Forums by Iowa’s Flood Awareness Interagency Coalition','Tom Alger','Communications Director','330 Maple','','Des Moines','Iowa',50319,'515.242.5179','Tom.Alger@iid.iowa.gov','<p>Iowa Insurance Commissioner Susan E. Voss, along with interagency partners, today announced the schedule for flood awareness community meetings being held throughout Iowa this May and June. The schedule for “Don’t Test The Waters Iowa: Community Forums by Iowa’s Flood Awareness Interagency Coalition” is as follows:</p>\r\n<ul>\r\n<li>Ottumwa, May 5, 6:30 p.m. at Indian Hills Community College</li>\r\n<li>Council Bluffs, May 26, 6:30 p.m. at the Council Bluffs Public Library</li>\r\n<li>Des Moines, June 8, 7 p.m. at the Des Moines Botanical Center</li>\r\n<li>Cedar Rapids, June 15, 6 p.m. at Coe College Auditorium </li>\r\n</ul>\r\n<p>The Iowa Insurance Division (IID), in collaboration with the Iowa Department of Natural Resources, Iowa Homeland Security and Emergency Management, Iowa Flood Center, Rebuild Iowa Office, National Weather Service, U.S. Army Corp of Engineers and U.S. Geological Survey, along with a number of local community leaders will present the “Don’t Test the Waters” public information program.  </p>\r\n<p>The presentation will educate residents on flood preparation efforts and resources available to them as well as the flood protection efforts that are being provided by the federal, state, and local governments. Following the presentation, a panel made up of national, state and local government officials and other flood experts will be available to answer questions from community members.</p>\r\n<p>Planning tools, tips and other guidance can also be found on the state’s website, www.DontTestTheWatersIowa.gov.</p>','','',1,NULL,'2011-04-19',NULL,476,'','',0,0,0,1,1,0,'0000-00-00 00:00:00',5),(6,'Don’t Test The Waters - Ottumwa A Community Forum by Iowa’s Flood Awareness Interagency Coalition','Local, state and federal representatives will discuss flood preparation, prevention and protection with opportunities for audience questions and input.','Angel Robinson','Consumer Advocate','330 Maple','','Des Moines','Iowa',50319,'515 281 4038','angel.robinson@iid.iowa.gov','<p>May 5, 6:30 p.m. at Indian Hills Community College﻿</p>\r\n<p>Agenda:<br /><br />Welcome<br />The Iowa Flood Center: Why preparation, prevention and protection from floods is relevant to Iowans</p>\r\n<p>Iowa Department of Natural Resources: How the DNR is making efforts to map Iowa’s floodplains, and how these new maps fit in with the National Flood Insurance Program<br /><br />National Weather Service: How floods are forecasted and where Iowans can go for flood outlooks</p>\r\n<p>Ottumwa Flood Protection and Prevention: What the City of Ottumwa is doing to improve flood protection in preparing for future flood events</p>\r\n<p>Panel with audience Q and A</p>\r\n<p>Contact:<br />Angel Robinson<br />Consumer Advocate, Iowa Insurance Division<br />(515) 281-4038; <a href=\"mailto:angel.robinson@iid.iowa.gov\">angel.robinson@iid.iowa.gov</a></p>','','',1,NULL,'2011-04-19',NULL,379,'','',0,0,0,1,1,0,'0000-00-00 00:00:00',4),(7,'Iowa Insurance Division Hosts Interagency Partners Flood Awareness Community Meeting In Council Bluffs','Pottawattamie County residents can learn how to prepare for floods and protect against property losses at a flood awareness community meeting on May 26. Iowa Insurance Commissioner Susan E. Voss, along with interagency partners, invites residents to heighten their flood awareness at 6:30 p.m. at the Council Bluffs Public Library, located at 400 Willow Ave, in rooms A and B.','Tom Alger','Communications Director','','','','',50319,'515 281 5705','Tom.Alger@iid.iowa.gov','<p>Pottawattamie County residents can learn how to prepare for floods and protect against property losses at a flood awareness community meeting on May 26. Iowa Insurance Commissioner Susan E. Voss, along with interagency partners, invites residents to heighten their flood awareness at 6:30 p.m. at the Council Bluffs Public Library, located at 400 Willow Ave, in rooms A and B.<br /><br />“This meeting presents a good opportunity for citizens to get an update on flood mitigation efforts from our national, state and local officials, including important progress on our levee systems,” says Council Bluffs Mayor Tom Hanafan. “I encourage you all to attend and learn how to put together a flood preparation plan for your home or business.”  <br /><br />The Iowa Flood Awareness Interagency Coalition’s “Don’t Test The Waters” community forum will educate residents on flood preparation efforts and resources available to them, as well as the flood protection efforts that are being provided by the federal, state and local governments. <br /><br />“The Floods of 2008 caused 85 of 99 Iowa counties to be declared disaster areas, and caused great hardship for many Pottawattamie County residents,” said Nathan Young, associate director of the Iowa Flood Center.        <br />                                                                                  <br />Young will share Iowa Flood Center research projects intended to provide immediate and relevant data to communities and individuals, empowering them to make informed decisions about their flood risks.<br /><br />Ken Bouma of the Iowa Department of Natural Resources’ (DNR) floodplain management program will discuss the new flood maps for Pottawattamie County that are currently being developed by the Federal Emergency Management Agency. He’ll also present information about the DNR’s mapping efforts that use state-of-the-art technology to provide even more accurate maps in the future. The maps help residents determine the flood risk zone for their homes or businesses.<br /><br />The National Weather Service’s David Pearson will talk about flood forecasting and where residents can obtain forecasts as a preparation resource. Clark Patterson, representing the National Flood Insurance Program, will discuss flood insurance and provide resources for residents to determine if flood insurance is right for them. <br /><br />Local government officials will also share flood preparation and protection efforts. Greg Reeder and Pat Miller of the City of Council Bluffs public works department will provide information on the city’s flood mitigation and response efforts, including pump station and levee system updates, while Matt Cox, city engineer, will discuss the levee certification process. Alan Byers, Council Bluffs fire chief, will discuss the use of technology to alert local residents of emergencies. <br /><br />Following the presentations, a panel made up of the presenters and other flood experts from national, state and local governments, including the U.S. Army Corp of Engineers, will be available to answer questions from community members.<br />Planning tools, tips and other guidance can also be found on the state’s website, www.DontTestTheWatersIowa.gov.<br /><br />The Iowa Insurance Division (IID) will host this public information program presented by the Iowa DNR, Iowa Homeland Security and Emergency Management, Iowa Flood Center, Rebuild Iowa Office, National Weather Service, U.S. Army Corp of Engineers and U.S. Geological Survey, along with a number of local community leaders.</p>','','',1,NULL,'2011-05-18',NULL,1267,'','',0,0,0,1,1,0,'0000-00-00 00:00:00',3),(8,'Iowa Insurance Division Hosts Interagency Partners Flood Awareness Community Meeting in Des Moines','Polk County residents can learn how to prepare for floods and protect against property losses at a flood awareness community meeting on June 8. Iowa Insurance Commissioner Susan E. Voss, along with interagency partners, invites residents to heighten their flood awareness at 7 p.m. in the Des Moines Botanical Center’s Oak-Willow Room, located at 909 Robert D. Ray Drive. ','Tom Alger','Communications Director','','','','',50319,'515 281 5705','Tom.Alger@iid.iowa.gov','<p>Polk County residents can learn how to prepare for floods and protect against property losses at a flood awareness community meeting on June 8. Iowa Insurance Commissioner Susan E. Voss, along with interagency partners, invites residents to heighten their flood awareness at 7 p.m. in the Des Moines Botanical Center’s Oak-Willow Room, located at 909 Robert D. Ray Drive.</p>\r\n<p>“This meeting presents a good opportunity for citizens to get an update on flood mitigation efforts from our national, state and local officials, including increasing the height of the new Birdland and Central Place levees,” says Des Moines Mayor Frank Cownie. “I encourage you all to attend and learn how to put together a flood preparation plan for your home or business.” </p>\r\n<p>The Iowa Flood Awareness Interagency Coalition’s “Don’t Test The Waters” community forum will educate residents on flood preparation efforts and resources available to them, as well as the flood protection efforts that are being provided by the federal, state and local governments.</p>\r\n<p>“The Floods of 2008 caused 85 of 99 Iowa counties to be declared disaster areas, including Polk County, and flash flooding in 2010 again caused great hardship for many Polk County residents,” said Dr. Larry Weber of the Iowa Flood Center.    <br /><br />Weber will share Iowa Flood Center research projects intended to provide immediate and relevant data to communities and individuals, empowering them to make informed decisions about their flood risks.                                                                                                                                  <br />Bill Cappuccio of the Iowa Department of Natural Resources’ (DNR) floodplain management program will discuss the new flood maps for Polk County that are currently being developed by the Federal Emergency Management Agency. He’ll also present information about the DNR’s mapping efforts that use state-of-the-art technology to provide even more accurate maps in the future. The maps help residents determine the flood risk zone for their homes or businesses.<br /><br />The National Weather Service’s Jeff Zogg will talk about flood forecasting and where residents can obtain forecasts as a preparation resource. Clark Patterson, representing the National Flood Insurance Program, will discuss flood insurance and provide resources for residents to determine if flood insurance is right for them. <br /><br />Local government officials will also share flood preparation and protection efforts. Dan Pritchard of the Department of Public Works for the City of Des Moines will provide information on the city’s flood mitigation and response efforts, including levee system updates, on behalf of public works director Bill Stowe.  A.J. Mumm, Polk County Emergency Management director, will discuss the use of technology to alert local residents of emergencies. <br />Following the presentations, a panel made up of the presenters and other flood experts from national, state and local governments will be available to answer questions from community members. Representatives from the U.S. Geological Survey and the U.S. Army Corp of Engineers will join presenters on the panel and will be available to answer questions pertaining to Saylorville Lake’s floodwater management plan.  <br /><br />The Iowa Insurance Division (IID) will host this public information program presented by the Iowa DNR, Iowa Homeland Security and Emergency Management, Iowa Flood Center, Rebuild Iowa Office, National Weather Service, U.S. Army Corp of Engineers and U.S. Geological Survey, along with a number of local community leaders.</p>','','',1,NULL,'2011-06-01',NULL,920,'','',0,0,0,1,1,0,'0000-00-00 00:00:00',2),(9,'Iowa Insurance Division Hosts Interagency Partners Flood Awareness Community Meeting in Cedar Rapids',' Don’t Test the Waters Linn County—Community Forum by Iowa’s Flood Awareness Interagency Coalition Helps Iowans Prepare for and Protect Against Floods\r\n\r\n','Tom Alger','','','','','',50319,'515-281-5705','tom.alger@iid.iowa.gov','<p>Linn County residents can learn how to prepare for floods and protect against property losses at a flood awareness community meeting on June 15. Iowa Insurance Commissioner Susan E. Voss, along with interagency partners, invites residents to heighten their flood awareness at 6 p.m. in the Sinclair Auditorium at Coe College, located at 1220 First Avenue.</p>\r\n<p>\"This meeting, which comes almost three years to the date of the historic flood of 2008, presents a good opportunity for citizens to get an update on flood mitigation efforts from our national, state and local officials,\" says Cedar Rapids Mayor Ron Corbett. \"I encourage you all to attend and learn about new resources and tools available to you to prepare for and protect against flooding.\"</p>\r\n<p>The Iowa Flood Awareness Interagency Coalition\'s \"Don\'t Test The Waters\" community forum will educate residents on flood preparation efforts and resources available to them, as well as the flood protection efforts that are being provided by the federal, state and local governments.</p>\r\n<p>\"The Floods of 2008 caused 85 of 99 Iowa counties to be declared disaster areas, and caused the greatest hardship for the residents and businesses of Linn County,\" said Dr. Witold Krajewski of the Iowa Flood Center.</p>\r\n<p>Krajewski will share Iowa Flood Center research projects intended to provide immediate and relevant data to communities and individuals, empowering them to make informed decisions about their flood risks.</p>\r\n<p>Bill Cappuccio of the Iowa Department of Natural Resources\' (DNR) floodplain management program will discuss the new flood maps for Linn County that are currently being developed by the Federal Emergency Management Agency. He\'ll also present information about the DNR\'s mapping efforts that use state-of-the-art technology to provide even more accurate maps in the future. The maps help residents determine the flood risk zone for their homes or businesses.</p>\r\n<p>The National Weather Service\'s Maren Stoflet will talk about flood forecasting and where residents can obtain forecasts as a preparation resource. Clark Patterson, representing the National Flood Insurance Program, will discuss flood insurance and provide resources for residents to determine if flood insurance is right for them.</p>\r\n<p>Local government officials will also share their experiences with flood preparation and mitigation efforts. David Elgin, Cedar Rapid Public Works Director and City Engineer, will provide information about the City\'s recent flood mitigation and response efforts, including the interim flood response plan and the proposed long-term flood management strategies.</p>\r\n<p>Michael Goldberg, Linn County Emergency Management director, will discuss emergency preparedness tips and the county\'s emergency action plan.</p>\r\n<p>Following the presentations, a panel made up of the presenters and other flood experts from national, state and local governments, including representatives from the U.S. Geological Survey and the U.S. Army Corp of Engineers, will be available to answer questions from community members. Other local, state and federal government representatives and elected officials will be available as informational resources.</p>\r\n<p>The Iowa Insurance Division (IID) will host this public information program presented by the Iowa DNR, Iowa Homeland Security and Emergency Management, Iowa Flood Center, Rebuild Iowa Office, National Weather Service, U.S. Army Corp of Engineers and U.S. Geological Survey, along with a number of local community leaders.</p>','','',1,NULL,'2011-06-12',NULL,842,'','',0,0,0,1,1,0,'0000-00-00 00:00:00',1);
/*!40000 ALTER TABLE `jos_news` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jos_newsfeeds`
--

DROP TABLE IF EXISTS `jos_newsfeeds`;
CREATE TABLE `jos_newsfeeds` (
  `catid` int(11) NOT NULL default '0',
  `id` int(11) NOT NULL auto_increment,
  `name` text NOT NULL,
  `alias` varchar(255) NOT NULL default '',
  `link` text NOT NULL,
  `filename` varchar(200) default NULL,
  `published` tinyint(1) NOT NULL default '0',
  `numarticles` int(11) unsigned NOT NULL default '1',
  `cache_time` int(11) unsigned NOT NULL default '3600',
  `checked_out` tinyint(3) unsigned NOT NULL default '0',
  `checked_out_time` datetime NOT NULL default '0000-00-00 00:00:00',
  `ordering` int(11) NOT NULL default '0',
  `rtl` tinyint(4) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `published` (`published`),
  KEY `catid` (`catid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jos_newsfeeds`
--

LOCK TABLES `jos_newsfeeds` WRITE;
/*!40000 ALTER TABLE `jos_newsfeeds` DISABLE KEYS */;
/*!40000 ALTER TABLE `jos_newsfeeds` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jos_plugins`
--

DROP TABLE IF EXISTS `jos_plugins`;
CREATE TABLE `jos_plugins` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(100) NOT NULL default '',
  `element` varchar(100) NOT NULL default '',
  `folder` varchar(100) NOT NULL default '',
  `access` tinyint(3) unsigned NOT NULL default '0',
  `ordering` int(11) NOT NULL default '0',
  `published` tinyint(3) NOT NULL default '0',
  `iscore` tinyint(3) NOT NULL default '0',
  `client_id` tinyint(3) NOT NULL default '0',
  `checked_out` int(11) unsigned NOT NULL default '0',
  `checked_out_time` datetime NOT NULL default '0000-00-00 00:00:00',
  `params` text NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `idx_folder` (`published`,`client_id`,`access`,`folder`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jos_plugins`
--

LOCK TABLES `jos_plugins` WRITE;
/*!40000 ALTER TABLE `jos_plugins` DISABLE KEYS */;
INSERT INTO `jos_plugins` VALUES (1,'Authentication - Joomla','joomla','authentication',0,1,1,1,0,0,'0000-00-00 00:00:00',''),(2,'Authentication - LDAP','ldap','authentication',0,2,0,1,0,0,'0000-00-00 00:00:00','host=\nport=389\nuse_ldapV3=0\nnegotiate_tls=0\nno_referrals=0\nauth_method=bind\nbase_dn=\nsearch_string=\nusers_dn=\nusername=\npassword=\nldap_fullname=fullName\nldap_email=mail\nldap_uid=uid\n\n'),(3,'Authentication - GMail','gmail','authentication',0,4,0,0,0,0,'0000-00-00 00:00:00',''),(4,'Authentication - OpenID','openid','authentication',0,3,0,0,0,0,'0000-00-00 00:00:00',''),(5,'User - Joomla!','joomla','user',0,0,1,0,0,0,'0000-00-00 00:00:00','autoregister=1\n\n'),(6,'Search - Content','content','search',0,1,1,1,0,0,'0000-00-00 00:00:00','search_limit=50\nsearch_content=1\nsearch_uncategorised=1\nsearch_archived=1\n\n'),(7,'Search - Contacts','contacts','search',0,3,1,1,0,0,'0000-00-00 00:00:00','search_limit=50\n\n'),(8,'Search - Categories','categories','search',0,4,1,0,0,0,'0000-00-00 00:00:00','search_limit=50\n\n'),(9,'Search - Sections','sections','search',0,5,1,0,0,0,'0000-00-00 00:00:00','search_limit=50\n\n'),(10,'Search - Newsfeeds','newsfeeds','search',0,6,1,0,0,0,'0000-00-00 00:00:00','search_limit=50\n\n'),(11,'Search - Weblinks','weblinks','search',0,2,1,1,0,0,'0000-00-00 00:00:00','search_limit=50\n\n'),(12,'Content - Pagebreak','pagebreak','content',0,10000,1,1,0,0,'0000-00-00 00:00:00','enabled=1\ntitle=1\nmultipage_toc=1\nshowall=1\n\n'),(13,'Content - Rating','vote','content',0,4,1,1,0,0,'0000-00-00 00:00:00',''),(14,'Content - Email Cloaking','emailcloak','content',0,5,1,0,0,0,'0000-00-00 00:00:00','mode=1\n\n'),(15,'Content - Code Hightlighter (GeSHi)','geshi','content',0,5,0,0,0,0,'0000-00-00 00:00:00',''),(16,'Content - Load Module','loadmodule','content',0,6,1,0,0,0,'0000-00-00 00:00:00','enabled=1\nstyle=table\n\n'),(17,'Content - Page Navigation','pagenavigation','content',0,2,1,1,0,0,'0000-00-00 00:00:00','position=1\n\n'),(18,'Editor - No Editor','none','editors',0,0,1,1,0,0,'0000-00-00 00:00:00',''),(19,'Editor - TinyMCE','tinymce','editors',0,0,1,1,0,0,'0000-00-00 00:00:00','mode=advanced\nskin=0\ncompressed=0\ncleanup_startup=0\ncleanup_save=2\nentity_encoding=raw\nlang_mode=0\nlang_code=en\ntext_direction=ltr\ncontent_css=1\ncontent_css_custom=\nrelative_urls=1\nnewlines=0\ninvalid_elements=applet\nextended_elements=\ntoolbar=top\ntoolbar_align=left\nhtml_height=550\nhtml_width=750\nelement_path=1\nfonts=1\npaste=1\nsearchreplace=1\ninsertdate=1\nformat_date=%Y-%m-%d\ninserttime=1\nformat_time=%H:%M:%S\ncolors=1\ntable=1\nsmilies=1\nmedia=1\nhr=1\ndirectionality=1\nfullscreen=1\nstyle=1\nlayer=1\nxhtmlxtras=1\nvisualchars=1\nnonbreaking=1\nblockquote=1\ntemplate=0\nadvimage=1\nadvlink=1\nautosave=1\ncontextmenu=1\ninlinepopups=1\nsafari=1\ncustom_plugin=\ncustom_button=\n\n'),(20,'Editor - XStandard Lite 2.0','xstandard','editors',0,0,0,1,0,0,'0000-00-00 00:00:00',''),(21,'Editor Button - Image','image','editors-xtd',0,0,1,0,0,0,'0000-00-00 00:00:00',''),(22,'Editor Button - Pagebreak','pagebreak','editors-xtd',0,0,1,0,0,0,'0000-00-00 00:00:00',''),(23,'Editor Button - Readmore','readmore','editors-xtd',0,0,1,0,0,0,'0000-00-00 00:00:00',''),(24,'XML-RPC - Joomla','joomla','xmlrpc',0,7,0,1,0,0,'0000-00-00 00:00:00',''),(25,'XML-RPC - Blogger API','blogger','xmlrpc',0,7,0,1,0,0,'0000-00-00 00:00:00','catid=1\nsectionid=0\n\n'),(27,'System - SEF','sef','system',0,1,1,0,0,0,'0000-00-00 00:00:00',''),(28,'System - Debug','debug','system',0,2,1,0,0,0,'0000-00-00 00:00:00','queries=1\nmemory=1\nlangauge=1\n\n'),(29,'System - Legacy','legacy','system',0,3,1,1,0,0,'0000-00-00 00:00:00','route=0\n\n'),(30,'System - Cache','cache','system',0,4,0,1,0,0,'0000-00-00 00:00:00','browsercache=0\ncachetime=15\n\n'),(31,'System - Log','log','system',0,5,0,1,0,0,'0000-00-00 00:00:00',''),(32,'System - Remember Me','remember','system',0,6,1,1,0,0,'0000-00-00 00:00:00',''),(33,'System - Backlink','backlink','system',0,7,0,1,0,0,'0000-00-00 00:00:00',''),(34,'System - Mootools Upgrade','mtupgrade','system',0,8,0,1,0,0,'0000-00-00 00:00:00',''),(35,'Editor - JCE','jce','editors',0,0,1,0,0,0,'0000-00-00 00:00:00',''),(36,'System - Crawler Plugin','crawler','system',0,0,1,0,0,0,'0000-00-00 00:00:00','');
/*!40000 ALTER TABLE `jos_plugins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jos_poll_data`
--

DROP TABLE IF EXISTS `jos_poll_data`;
CREATE TABLE `jos_poll_data` (
  `id` int(11) NOT NULL auto_increment,
  `pollid` int(11) NOT NULL default '0',
  `text` text NOT NULL,
  `hits` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `pollid` (`pollid`,`text`(1))
) ENGINE=MyISAM AUTO_INCREMENT=157 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jos_poll_data`
--

LOCK TABLES `jos_poll_data` WRITE;
/*!40000 ALTER TABLE `jos_poll_data` DISABLE KEYS */;
INSERT INTO `jos_poll_data` VALUES (1,1,'True ',34),(2,1,'False',14),(3,1,'',0),(4,1,'',0),(5,1,'',0),(6,1,'',0),(7,1,'',0),(8,1,'',0),(9,1,'',0),(10,1,'',0),(11,1,'',0),(12,1,'',0),(13,2,'True',6),(14,2,'False',22),(15,2,'',0),(16,2,'',0),(17,2,'',0),(18,2,'',0),(19,2,'',0),(20,2,'',0),(21,2,'',0),(22,2,'',0),(23,2,'',0),(24,2,'',0),(25,3,'True',16),(26,3,'False',2),(27,3,'',0),(28,3,'',0),(29,3,'',0),(30,3,'',0),(31,3,'',0),(32,3,'',0),(33,3,'',0),(34,3,'',0),(35,3,'',0),(36,3,'',0),(37,4,'True',19),(38,4,'False',5),(39,4,'',0),(40,4,'',0),(41,4,'',0),(42,4,'',0),(43,4,'',0),(44,4,'',0),(45,4,'',0),(46,4,'',0),(47,4,'',0),(48,4,'',0),(49,5,'True',4),(50,5,'False',17),(51,5,'',0),(52,5,'',0),(53,5,'',0),(54,5,'',0),(55,5,'',0),(56,5,'',0),(57,5,'',0),(58,5,'',0),(59,5,'',0),(60,5,'',0),(61,6,'True',13),(62,6,'False',2),(63,6,'',0),(64,6,'',0),(65,6,'',0),(66,6,'',0),(67,6,'',0),(68,6,'',0),(69,6,'',0),(70,6,'',0),(71,6,'',0),(72,6,'',0),(73,7,'True',1),(74,7,'False',18),(75,7,'',0),(76,7,'',0),(77,7,'',0),(78,7,'',0),(79,7,'',0),(80,7,'',0),(81,7,'',0),(82,7,'',0),(83,7,'',0),(84,7,'',0),(85,8,'True',0),(86,8,'False',16),(87,8,'',0),(88,8,'',0),(89,8,'',0),(90,8,'',0),(91,8,'',0),(92,8,'',0),(93,8,'',0),(94,8,'',0),(95,8,'',0),(96,8,'',0),(97,9,'True',19),(98,9,'False',4),(99,9,'',0),(100,9,'',0),(101,9,'',0),(102,9,'',0),(103,9,'',0),(104,9,'',0),(105,9,'',0),(106,9,'',0),(107,9,'',0),(108,9,'',0),(109,10,'True',2),(110,10,'False',12),(111,10,'',0),(112,10,'',0),(113,10,'',0),(114,10,'',0),(115,10,'',0),(116,10,'',0),(117,10,'',0),(118,10,'',0),(119,10,'',0),(120,10,'',0),(121,11,'True',1),(122,11,'False',14),(123,11,'',0),(124,11,'',0),(125,11,'',0),(126,11,'',0),(127,11,'',0),(128,11,'',0),(129,11,'',0),(130,11,'',0),(131,11,'',0),(132,11,'',0),(133,12,'True',2),(134,12,'False',14),(135,12,'',0),(136,12,'',0),(137,12,'',0),(138,12,'',0),(139,12,'',0),(140,12,'',0),(141,12,'',0),(142,12,'',0),(143,12,'',0),(144,12,'',0),(145,13,'True',0),(146,13,'False',11),(147,13,'',0),(148,13,'',0),(149,13,'',0),(150,13,'',0),(151,13,'',0),(152,13,'',0),(153,13,'',0),(154,13,'',0),(155,13,'',0),(156,13,'',0);
/*!40000 ALTER TABLE `jos_poll_data` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jos_poll_date`
--

DROP TABLE IF EXISTS `jos_poll_date`;
CREATE TABLE `jos_poll_date` (
  `id` bigint(20) NOT NULL auto_increment,
  `date` datetime NOT NULL default '0000-00-00 00:00:00',
  `vote_id` int(11) NOT NULL default '0',
  `poll_id` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `poll_id` (`poll_id`)
) ENGINE=MyISAM AUTO_INCREMENT=269 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jos_poll_date`
--

LOCK TABLES `jos_poll_date` WRITE;
/*!40000 ALTER TABLE `jos_poll_date` DISABLE KEYS */;
INSERT INTO `jos_poll_date` VALUES (1,'2010-12-07 02:52:37',1,1),(2,'2010-12-08 05:16:35',2,1),(3,'2010-12-08 11:11:09',2,1),(4,'2010-12-10 04:55:59',1,1),(5,'2010-12-10 21:20:54',1,1),(6,'2010-12-14 04:39:56',1,1),(7,'2010-12-15 11:39:53',1,1),(8,'2010-12-15 21:42:10',1,1),(9,'2010-12-30 19:18:15',1,1),(10,'2011-01-05 22:26:09',1,1),(11,'2011-01-10 09:34:35',1,1),(12,'2011-01-12 12:12:33',1,1),(13,'2011-01-12 12:14:12',1,1),(14,'2011-01-12 12:15:03',1,1),(15,'2011-01-13 00:01:31',2,1),(16,'2011-01-27 15:12:59',110,10),(17,'2011-01-27 19:32:03',1,1),(18,'2011-01-27 19:32:18',97,9),(19,'2011-02-02 16:16:12',74,7),(20,'2011-02-04 17:57:08',38,4),(21,'2011-02-04 17:57:30',86,8),(22,'2011-02-04 17:57:53',122,11),(23,'2011-02-07 17:13:07',1,1),(24,'2011-02-07 17:13:14',61,6),(25,'2011-02-07 17:13:21',49,5),(26,'2011-02-07 17:13:24',97,9),(27,'2011-02-07 17:13:28',25,3),(28,'2011-02-07 17:13:33',86,8),(29,'2011-02-07 17:13:49',134,12),(30,'2011-02-07 17:13:59',37,4),(31,'2011-02-07 17:14:06',122,11),(32,'2011-02-07 20:06:46',74,7),(33,'2011-02-08 07:29:19',13,2),(34,'2011-02-08 07:59:40',109,10),(35,'2011-02-08 08:29:47',61,6),(36,'2011-02-09 17:16:42',97,9),(37,'2011-02-09 17:25:27',122,11),(38,'2011-02-09 17:38:19',1,1),(39,'2011-02-10 08:05:42',98,9),(40,'2011-02-10 08:52:35',13,2),(41,'2011-02-10 10:05:17',61,6),(42,'2011-02-10 10:36:05',134,12),(43,'2011-02-10 10:36:25',25,3),(44,'2011-02-10 10:42:23',1,1),(45,'2011-02-10 10:42:50',97,9),(46,'2011-02-10 10:47:35',50,5),(47,'2011-02-10 10:54:44',122,11),(48,'2011-02-10 11:06:58',74,7),(49,'2011-02-10 11:21:59',86,8),(50,'2011-02-10 12:13:39',1,1),(51,'2011-02-10 12:17:52',13,2),(52,'2011-02-10 12:23:04',37,4),(53,'2011-02-10 12:25:46',109,10),(54,'2011-02-11 01:40:09',50,5),(55,'2011-02-11 01:40:49',146,13),(56,'2011-02-14 21:12:45',86,8),(57,'2011-02-14 21:13:11',14,2),(58,'2011-02-14 21:13:42',121,11),(59,'2011-02-14 21:13:53',1,1),(60,'2011-02-14 22:26:57',1,1),(61,'2011-02-15 08:19:24',49,5),(62,'2011-02-15 08:25:49',13,2),(63,'2011-02-16 21:59:14',74,7),(64,'2011-02-16 21:59:37',1,1),(65,'2011-02-16 21:59:48',14,2),(66,'2011-02-16 22:00:18',86,8),(67,'2011-02-18 16:12:25',97,9),(68,'2011-02-18 16:12:46',14,2),(69,'2011-02-18 16:12:59',61,6),(70,'2011-02-18 16:13:15',37,4),(71,'2011-02-18 16:13:28',86,8),(72,'2011-02-18 16:54:16',1,1),(73,'2011-02-18 16:54:35',37,4),(74,'2011-02-18 18:04:30',50,5),(75,'2011-02-23 15:01:25',1,1),(76,'2011-02-25 19:43:36',38,4),(77,'2011-02-28 05:09:54',2,1),(78,'2011-02-28 12:14:35',25,3),(79,'2011-02-28 12:15:31',14,2),(80,'2011-02-28 12:15:57',38,4),(81,'2011-02-28 14:36:28',14,2),(82,'2011-02-28 14:36:55',1,1),(83,'2011-02-28 14:37:19',49,5),(84,'2011-03-01 12:35:41',37,4),(85,'2011-03-01 22:12:32',97,9),(86,'2011-03-01 22:12:53',14,2),(87,'2011-03-01 22:13:07',25,3),(88,'2011-03-01 22:13:22',146,13),(89,'2011-03-04 20:33:00',50,5),(90,'2011-03-04 20:33:28',2,1),(91,'2011-03-07 17:32:06',14,2),(92,'2011-03-07 19:39:12',1,1),(93,'2011-03-08 21:58:57',110,10),(94,'2011-03-08 21:59:22',97,9),(95,'2011-03-08 21:59:47',146,13),(96,'2011-03-08 22:02:06',86,8),(97,'2011-03-08 22:02:14',74,7),(98,'2011-03-08 22:02:23',61,6),(99,'2011-03-08 22:02:37',50,5),(100,'2011-03-08 22:02:53',37,4),(101,'2011-03-08 22:03:08',25,3),(102,'2011-03-08 22:03:15',14,2),(103,'2011-03-08 22:03:29',2,1),(104,'2011-03-08 22:03:57',122,11),(105,'2011-03-08 22:04:04',134,12),(106,'2011-03-13 23:34:10',134,12),(107,'2011-03-15 18:57:13',62,6),(108,'2011-03-17 18:45:58',74,7),(109,'2011-03-18 15:31:40',1,1),(110,'2011-03-18 15:32:07',14,2),(111,'2011-03-18 15:32:19',25,3),(112,'2011-03-18 15:32:34',37,4),(113,'2011-03-18 15:32:47',50,5),(114,'2011-03-18 15:33:00',61,6),(115,'2011-03-18 15:33:11',74,7),(116,'2011-03-18 15:33:22',86,8),(117,'2011-03-18 15:33:35',97,9),(118,'2011-03-18 15:33:50',110,10),(119,'2011-03-18 15:34:09',122,11),(120,'2011-03-18 15:34:26',134,12),(121,'2011-03-18 15:34:41',146,13),(122,'2011-03-20 22:35:02',2,1),(123,'2011-03-23 18:03:22',2,1),(124,'2011-03-24 21:26:06',38,4),(125,'2011-03-24 21:26:38',61,6),(126,'2011-03-24 21:26:56',86,8),(127,'2011-03-24 21:27:13',122,11),(128,'2011-03-24 21:27:27',1,1),(129,'2011-03-24 21:27:48',25,3),(130,'2011-03-24 21:28:10',50,5),(131,'2011-04-04 17:00:59',97,9),(132,'2011-04-04 17:01:37',38,4),(133,'2011-04-25 17:47:36',134,12),(134,'2011-04-25 17:47:58',110,10),(135,'2011-04-25 17:48:15',13,2),(136,'2011-04-25 17:48:38',37,4),(137,'2011-04-25 18:11:25',97,9),(138,'2011-04-25 18:11:57',14,2),(139,'2011-04-25 18:12:32',61,6),(140,'2011-04-25 18:12:58',110,10),(141,'2011-04-25 18:13:25',50,5),(142,'2011-04-25 18:13:44',37,4),(143,'2011-04-25 18:14:00',74,7),(144,'2011-04-25 18:14:20',1,1),(145,'2011-05-24 17:30:19',97,9),(146,'2011-05-24 17:30:43',14,2),(147,'2011-05-24 17:31:11',37,4),(148,'2011-05-26 13:56:45',133,12),(149,'2011-06-03 15:27:18',14,2),(150,'2011-06-05 11:56:42',37,4),(151,'2011-06-05 11:57:09',2,1),(152,'2011-06-05 11:57:32',134,12),(153,'2011-06-05 11:57:47',146,13),(154,'2011-06-05 11:58:09',50,5),(155,'2011-06-05 11:58:22',74,7),(156,'2011-06-07 13:29:45',49,5),(157,'2011-06-08 12:17:52',86,8),(158,'2011-06-08 12:18:26',2,1),(159,'2011-06-08 12:18:49',97,9),(160,'2011-06-08 14:03:30',74,7),(161,'2011-06-09 10:43:11',25,3),(162,'2011-06-09 12:41:29',1,1),(163,'2011-06-09 20:09:07',110,10),(164,'2011-06-09 21:39:46',1,1),(165,'2011-06-15 13:21:12',110,10),(166,'2011-06-15 13:21:33',2,1),(167,'2011-06-15 13:21:42',14,2),(168,'2011-06-15 13:21:50',26,3),(169,'2011-06-15 13:21:59',37,4),(170,'2011-06-15 13:22:13',50,5),(171,'2011-06-15 13:22:22',62,6),(172,'2011-06-15 13:22:27',74,7),(173,'2011-06-15 13:22:36',86,8),(174,'2011-06-15 13:22:42',98,9),(175,'2011-06-15 13:22:57',122,11),(176,'2011-06-15 13:23:09',134,12),(177,'2011-06-15 13:23:15',146,13),(178,'2011-06-15 18:55:03',50,5),(179,'2011-06-15 18:55:33',2,1),(180,'2011-06-15 18:55:46',14,2),(181,'2011-06-15 18:55:57',25,3),(182,'2011-06-15 18:56:17',37,4),(183,'2011-06-15 18:56:41',61,6),(184,'2011-06-15 18:56:51',74,7),(185,'2011-06-15 18:57:05',86,8),(186,'2011-06-15 18:57:24',97,9),(187,'2011-06-15 18:57:32',110,10),(188,'2011-06-15 18:57:42',122,11),(189,'2011-06-15 18:57:57',134,12),(190,'2011-06-15 18:58:06',146,13),(191,'2011-06-16 17:25:58',14,2),(192,'2011-06-18 06:04:10',74,7),(193,'2011-06-20 19:04:19',14,2),(194,'2011-08-15 03:32:16',50,5),(195,'2011-09-27 14:38:11',25,3),(196,'2012-02-15 17:49:53',98,9),(197,'2012-03-08 15:22:03',74,7),(198,'2012-03-08 15:23:14',25,3),(199,'2012-03-08 15:24:28',37,4),(200,'2012-03-08 15:24:55',50,5),(201,'2012-03-08 15:27:19',61,6),(202,'2012-03-08 15:28:28',86,8),(203,'2012-03-08 15:29:00',97,9),(204,'2012-03-08 15:29:37',110,10),(205,'2012-03-08 15:30:09',122,11),(206,'2012-03-08 15:30:33',134,12),(207,'2012-03-08 15:30:49',146,13),(208,'2012-03-13 18:37:32',86,8),(209,'2012-03-13 18:37:56',1,1),(210,'2012-03-13 18:38:16',14,2),(211,'2012-03-13 18:38:30',25,3),(212,'2012-03-13 18:38:43',37,4),(213,'2012-03-13 18:38:57',50,5),(214,'2012-03-13 18:39:08',61,6),(215,'2012-03-13 18:40:00',74,7),(216,'2012-03-13 18:40:31',97,9),(217,'2012-03-13 18:40:38',110,10),(218,'2012-03-13 18:40:50',122,11),(219,'2012-03-13 18:41:03',134,12),(220,'2012-03-13 18:41:13',146,13),(221,'2012-03-18 23:15:06',97,9),(222,'2012-03-18 23:15:41',1,1),(223,'2012-03-18 23:16:00',14,2),(224,'2012-03-18 23:16:13',25,3),(225,'2012-03-20 03:17:58',74,7),(226,'2012-03-20 22:11:16',1,1),(227,'2012-03-22 23:58:13',97,9),(228,'2012-03-26 15:54:02',86,8),(229,'2012-03-26 15:54:31',1,1),(230,'2012-03-26 15:54:59',14,2),(231,'2012-03-26 15:56:37',25,3),(232,'2012-03-26 15:56:50',37,4),(233,'2012-03-26 15:59:09',50,5),(234,'2012-03-26 16:00:57',61,6),(235,'2012-03-26 16:01:11',73,7),(236,'2012-03-26 16:01:48',97,9),(237,'2012-03-26 16:01:57',110,10),(238,'2012-03-26 16:02:07',122,11),(239,'2012-03-26 16:02:23',133,12),(240,'2012-03-26 16:02:32',146,13),(241,'2012-03-26 16:38:24',26,3),(242,'2012-03-26 20:24:22',2,1),(243,'2012-03-26 20:24:36',14,2),(244,'2012-03-26 20:24:57',37,4),(245,'2012-03-26 20:25:07',25,3),(246,'2012-03-26 20:25:22',50,5),(247,'2012-03-26 20:25:33',61,6),(248,'2012-03-26 20:25:40',74,7),(249,'2012-03-26 20:25:50',86,8),(250,'2012-03-26 20:26:00',97,9),(251,'2012-03-26 20:26:06',110,10),(252,'2012-03-26 20:26:16',122,11),(253,'2012-03-26 20:26:23',134,12),(254,'2012-03-26 20:26:29',146,13),(255,'2012-04-02 09:31:16',13,2),(256,'2012-04-03 19:40:18',134,12),(257,'2012-04-03 19:40:49',2,1),(258,'2012-05-01 14:07:41',14,2),(259,'2012-05-24 02:14:57',25,3),(260,'2012-05-24 02:15:08',50,5),(261,'2012-05-31 17:52:52',74,7),(262,'2012-05-31 17:53:38',14,2),(263,'2012-05-31 17:54:21',122,11),(264,'2012-07-26 12:22:42',37,4),(265,'2012-11-21 22:30:57',134,12),(266,'2013-08-06 17:48:43',1,1),(267,'2013-08-06 18:51:10',98,9),(268,'2013-08-06 19:07:01',37,4);
/*!40000 ALTER TABLE `jos_poll_date` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jos_poll_menu`
--

DROP TABLE IF EXISTS `jos_poll_menu`;
CREATE TABLE `jos_poll_menu` (
  `pollid` int(11) NOT NULL default '0',
  `menuid` int(11) NOT NULL default '0',
  PRIMARY KEY  (`pollid`,`menuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jos_poll_menu`
--

LOCK TABLES `jos_poll_menu` WRITE;
/*!40000 ALTER TABLE `jos_poll_menu` DISABLE KEYS */;
/*!40000 ALTER TABLE `jos_poll_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jos_polls`
--

DROP TABLE IF EXISTS `jos_polls`;
CREATE TABLE `jos_polls` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `title` varchar(255) NOT NULL default '',
  `alias` varchar(255) NOT NULL default '',
  `voters` int(9) NOT NULL default '0',
  `checked_out` int(11) NOT NULL default '0',
  `checked_out_time` datetime NOT NULL default '0000-00-00 00:00:00',
  `published` tinyint(1) NOT NULL default '0',
  `access` int(11) NOT NULL default '0',
  `lag` int(11) NOT NULL default '0',
  `poll_manager` varchar(255) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jos_polls`
--

LOCK TABLES `jos_polls` WRITE;
/*!40000 ALTER TABLE `jos_polls` DISABLE KEYS */;
INSERT INTO `jos_polls` VALUES (1,'20% of flood insurance claims come from moderate-to-low risk areas? ','claims-come-from-moderate-to-low-risk-areas-',48,0,'0000-00-00 00:00:00',1,0,86400,'								Answer: True								'),(2,'Floods only happen in mapped flood zones. ','true-or-false-floods-only-happen-in-mapped-flood-zones-',28,0,'0000-00-00 00:00:00',1,0,86400,'												Answer: False										'),(3,'Approximately 25% percent of flood insurance claims come from moderate-to-low risk flood areas?','true-or-false-approximately-25-percent-of-flood-insurance-claims-come-from-moderate-to-low-risk-flood-areas',18,0,'0000-00-00 00:00:00',1,0,86400,'				Answer: True				'),(4,'If your home is located in a high-risk flood area and you have a mortgage from a federally regulated or insured lender, flood insurance is mandatory.','true-or-false-if-your-home-is-located-in-a-high-risk-flood-area-and-you-have-a-mortgage-from-a-federally-regulated-or-insured-lender-flood-insurance-is-mandatory',24,0,'0000-00-00 00:00:00',1,0,86400,'								Answer: True				'),(5,'If you’ve received a federal disaster grant or loan for previous flood losses, you don’t need a flood policy to qualify for future aid.','true-or-false-if-youve-received-a-federal-disaster-grant-or-loan-for-previous-flood-losses-you-dont-need-a-flood-policy-to-qualify-for-future-aid',21,0,'0000-00-00 00:00:00',1,0,86400,'								Answer: False						'),(6,'As long as your community participates in the National Flood Insurance Program (NFIP), you are eligible to purchase flood insurance. ','true-or-false-as-long-as-your-community-participates-in-the-national-flood-insurance-program-nfip-you-are-eligible-to-purchase-flood-insurance-',15,0,'0000-00-00 00:00:00',1,0,86400,'								Answer: True					'),(7,'All Iowa communities participate in the National Flood Insurance Program.','all-iowa-communities-participate-in-the-national-flood-insurance-program',19,0,'0000-00-00 00:00:00',1,0,86400,'				Answer: False		'),(8,'When you purchase a flood insurance policy, there’s typically a no waiting period for coverage to become effective.','when-you-purchase-a-flood-insurance-policy-theres-typically-a-no-waiting-period-for-coverage-to-become-effective',16,0,'0000-00-00 00:00:00',1,0,86400,'				Answer: False	'),(9,'Up to $250,000 of flood insurance coverage can be purchased or a residential building. For non-residential buildings, the coverage limit is $500,000.','up-to-250000-of-flood-insurance-coverage-can-be-purchased-or-a-residential-building-for-non-residential-buildings-the-coverage-limit-is-500000',23,0,'0000-00-00 00:00:00',1,0,86400,'				Answer: True'),(10,'Contents coverage is automatically included in a standard flood policy.','contents-coverage-is-automatically-included-in-a-standard-flood-policy',14,0,'0000-00-00 00:00:00',1,0,86400,'				Answer: False	'),(11,'Coverage for flood damage is included in a standard homeowner\'s insurance policy.','coverage-for-flood-damage-is-included-in-a-standard-homeowners-insurance-policy',15,0,'0000-00-00 00:00:00',1,0,86400,'Answer: False			'),(12,'You can’t buy flood insurance if your property has been flooded.','you-cant-buy-flood-insurance-if-your-property-has-been-flooded',16,0,'0000-00-00 00:00:00',1,0,86400,'Answer: False		'),(13,'Flood insurance is only available for homeowners.','flood-insurance-is-only-available-for-homeowners',11,0,'0000-00-00 00:00:00',1,0,86400,'				Answer: False			');
/*!40000 ALTER TABLE `jos_polls` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jos_sections`
--

DROP TABLE IF EXISTS `jos_sections`;
CREATE TABLE `jos_sections` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(255) NOT NULL default '',
  `name` varchar(255) NOT NULL default '',
  `alias` varchar(255) NOT NULL default '',
  `image` text NOT NULL,
  `scope` varchar(50) NOT NULL default '',
  `image_position` varchar(30) NOT NULL default '',
  `description` text NOT NULL,
  `published` tinyint(1) NOT NULL default '0',
  `checked_out` int(11) unsigned NOT NULL default '0',
  `checked_out_time` datetime NOT NULL default '0000-00-00 00:00:00',
  `ordering` int(11) NOT NULL default '0',
  `access` tinyint(3) unsigned NOT NULL default '0',
  `count` int(11) NOT NULL default '0',
  `params` text NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `idx_scope` (`scope`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jos_sections`
--

LOCK TABLES `jos_sections` WRITE;
/*!40000 ALTER TABLE `jos_sections` DISABLE KEYS */;
INSERT INTO `jos_sections` VALUES (1,'General','','general','','content','left','',1,0,'0000-00-00 00:00:00',1,0,2,'');
/*!40000 ALTER TABLE `jos_sections` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jos_session`
--

DROP TABLE IF EXISTS `jos_session`;
CREATE TABLE `jos_session` (
  `username` varchar(150) default '',
  `time` varchar(14) default '',
  `session_id` varchar(200) NOT NULL default '0',
  `guest` tinyint(4) default '1',
  `userid` int(11) default '0',
  `usertype` varchar(50) default '',
  `gid` tinyint(3) unsigned NOT NULL default '0',
  `client_id` tinyint(3) unsigned NOT NULL default '0',
  `data` longtext,
  PRIMARY KEY  (`session_id`(64)),
  KEY `whosonline` (`guest`,`usertype`),
  KEY `userid` (`userid`),
  KEY `time` (`time`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jos_session`
--

LOCK TABLES `jos_session` WRITE;
/*!40000 ALTER TABLE `jos_session` DISABLE KEYS */;
INSERT INTO `jos_session` VALUES ('','1377151449','e84355797e4bd4744695a4445f19d6de',1,0,'',0,0,'__default|a:7:{s:15:\"session.counter\";i:1;s:19:\"session.timer.start\";i:1377151449;s:18:\"session.timer.last\";i:1377151449;s:17:\"session.timer.now\";i:1377151449;s:22:\"session.client.browser\";s:66:\"Mozilla/5.0 (compatible; AhrefsBot/5.0; +http://ahrefs.com/robot/)\";s:8:\"registry\";O:9:\"JRegistry\":3:{s:17:\"_defaultNameSpace\";s:7:\"session\";s:9:\"_registry\";a:1:{s:7:\"session\";a:1:{s:4:\"data\";O:8:\"stdClass\":0:{}}}s:7:\"_errors\";a:0:{}}s:4:\"user\";O:5:\"JUser\":19:{s:2:\"id\";i:0;s:4:\"name\";N;s:8:\"username\";N;s:5:\"email\";N;s:8:\"password\";N;s:14:\"password_clear\";s:0:\"\";s:8:\"usertype\";N;s:5:\"block\";N;s:9:\"sendEmail\";i:0;s:3:\"gid\";i:0;s:12:\"registerDate\";N;s:13:\"lastvisitDate\";N;s:10:\"activation\";N;s:6:\"params\";N;s:3:\"aid\";i:0;s:5:\"guest\";i:1;s:7:\"_params\";O:10:\"JParameter\":7:{s:4:\"_raw\";s:0:\"\";s:4:\"_xml\";N;s:9:\"_elements\";a:0:{}s:12:\"_elementPath\";a:1:{i:0;s:68:\"/usr/local/apache/htdocs/iid/libraries/joomla/html/parameter/element\";}s:17:\"_defaultNameSpace\";s:8:\"_default\";s:9:\"_registry\";a:1:{s:8:\"_default\";a:1:{s:4:\"data\";O:8:\"stdClass\":0:{}}}s:7:\"_errors\";a:0:{}}s:9:\"_errorMsg\";N;s:7:\"_errors\";a:0:{}}}'),('','1377151176','d7e3155af1c4be6116ede2cec72e61b1',1,0,'',0,0,'__default|a:7:{s:15:\"session.counter\";i:2;s:19:\"session.timer.start\";i:1377150892;s:18:\"session.timer.last\";i:1377150892;s:17:\"session.timer.now\";i:1377151176;s:22:\"session.client.browser\";s:65:\"Mozilla/5.0 (Windows NT 6.1; rv:24.0) Gecko/20100101 Firefox/24.0\";s:8:\"registry\";O:9:\"JRegistry\":3:{s:17:\"_defaultNameSpace\";s:7:\"session\";s:9:\"_registry\";a:1:{s:7:\"session\";a:1:{s:4:\"data\";O:8:\"stdClass\":0:{}}}s:7:\"_errors\";a:0:{}}s:4:\"user\";O:5:\"JUser\":19:{s:2:\"id\";i:0;s:4:\"name\";N;s:8:\"username\";N;s:5:\"email\";N;s:8:\"password\";N;s:14:\"password_clear\";s:0:\"\";s:8:\"usertype\";N;s:5:\"block\";N;s:9:\"sendEmail\";i:0;s:3:\"gid\";i:0;s:12:\"registerDate\";N;s:13:\"lastvisitDate\";N;s:10:\"activation\";N;s:6:\"params\";N;s:3:\"aid\";i:0;s:5:\"guest\";i:1;s:7:\"_params\";O:10:\"JParameter\":7:{s:4:\"_raw\";s:0:\"\";s:4:\"_xml\";N;s:9:\"_elements\";a:0:{}s:12:\"_elementPath\";a:1:{i:0;s:68:\"/usr/local/apache/htdocs/iid/libraries/joomla/html/parameter/element\";}s:17:\"_defaultNameSpace\";s:8:\"_default\";s:9:\"_registry\";a:1:{s:8:\"_default\";a:1:{s:4:\"data\";O:8:\"stdClass\":0:{}}}s:7:\"_errors\";a:0:{}}s:9:\"_errorMsg\";N;s:7:\"_errors\";a:0:{}}}'),('','1377150636','be7574a04c0f949cbbb45d6d9b6b0a07',1,0,'',0,0,'__default|a:8:{s:15:\"session.counter\";i:3;s:19:\"session.timer.start\";i:1377150602;s:18:\"session.timer.last\";i:1377150635;s:17:\"session.timer.now\";i:1377150636;s:22:\"session.client.browser\";s:65:\"Mozilla/5.0 (Windows NT 5.1; rv:23.0) Gecko/20100101 Firefox/23.0\";s:8:\"registry\";O:9:\"JRegistry\":3:{s:17:\"_defaultNameSpace\";s:7:\"session\";s:9:\"_registry\";a:1:{s:7:\"session\";a:1:{s:4:\"data\";O:8:\"stdClass\":0:{}}}s:7:\"_errors\";a:0:{}}s:4:\"user\";O:5:\"JUser\":19:{s:2:\"id\";i:0;s:4:\"name\";N;s:8:\"username\";N;s:5:\"email\";N;s:8:\"password\";N;s:14:\"password_clear\";s:0:\"\";s:8:\"usertype\";N;s:5:\"block\";N;s:9:\"sendEmail\";i:0;s:3:\"gid\";i:0;s:12:\"registerDate\";N;s:13:\"lastvisitDate\";N;s:10:\"activation\";N;s:6:\"params\";N;s:3:\"aid\";i:0;s:5:\"guest\";i:1;s:7:\"_params\";O:10:\"JParameter\":7:{s:4:\"_raw\";s:0:\"\";s:4:\"_xml\";N;s:9:\"_elements\";a:0:{}s:12:\"_elementPath\";a:1:{i:0;s:68:\"/usr/local/apache/htdocs/iid/libraries/joomla/html/parameter/element\";}s:17:\"_defaultNameSpace\";s:8:\"_default\";s:9:\"_registry\";a:1:{s:8:\"_default\";a:1:{s:4:\"data\";O:8:\"stdClass\":0:{}}}s:7:\"_errors\";a:0:{}}s:9:\"_errorMsg\";N;s:7:\"_errors\";a:0:{}}s:13:\"session.token\";s:32:\"1c69083bd4f27cf77dc1af44d3a744ed\";}'),('','1377150651','808fde1365d9736cebd339c922278f31',1,0,'',0,0,'__default|a:7:{s:15:\"session.counter\";i:1;s:19:\"session.timer.start\";i:1377150651;s:18:\"session.timer.last\";i:1377150651;s:17:\"session.timer.now\";i:1377150651;s:22:\"session.client.browser\";s:166:\"Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1; Trident/4.0; SLCC2; .NET CLR 2.0.50727; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0; Tablet PC 2.0)\";s:8:\"registry\";O:9:\"JRegistry\":3:{s:17:\"_defaultNameSpace\";s:7:\"session\";s:9:\"_registry\";a:1:{s:7:\"session\";a:1:{s:4:\"data\";O:8:\"stdClass\":0:{}}}s:7:\"_errors\";a:0:{}}s:4:\"user\";O:5:\"JUser\":19:{s:2:\"id\";i:0;s:4:\"name\";N;s:8:\"username\";N;s:5:\"email\";N;s:8:\"password\";N;s:14:\"password_clear\";s:0:\"\";s:8:\"usertype\";N;s:5:\"block\";N;s:9:\"sendEmail\";i:0;s:3:\"gid\";i:0;s:12:\"registerDate\";N;s:13:\"lastvisitDate\";N;s:10:\"activation\";N;s:6:\"params\";N;s:3:\"aid\";i:0;s:5:\"guest\";i:1;s:7:\"_params\";O:10:\"JParameter\":7:{s:4:\"_raw\";s:0:\"\";s:4:\"_xml\";N;s:9:\"_elements\";a:0:{}s:12:\"_elementPath\";a:1:{i:0;s:68:\"/usr/local/apache/htdocs/iid/libraries/joomla/html/parameter/element\";}s:17:\"_defaultNameSpace\";s:8:\"_default\";s:9:\"_registry\";a:1:{s:8:\"_default\";a:1:{s:4:\"data\";O:8:\"stdClass\":0:{}}}s:7:\"_errors\";a:0:{}}s:9:\"_errorMsg\";N;s:7:\"_errors\";a:0:{}}}'),('','1377150668','ed8aaf87284acf57e3eb855d4ab1f6fa',1,0,'',0,0,'__default|a:7:{s:15:\"session.counter\";i:1;s:19:\"session.timer.start\";i:1377150668;s:18:\"session.timer.last\";i:1377150668;s:17:\"session.timer.now\";i:1377150668;s:22:\"session.client.browser\";s:107:\"Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/536.11 (KHTML, like Gecko) DumpRenderTree/0.0.0.0 Safari/536.11\";s:8:\"registry\";O:9:\"JRegistry\":3:{s:17:\"_defaultNameSpace\";s:7:\"session\";s:9:\"_registry\";a:1:{s:7:\"session\";a:1:{s:4:\"data\";O:8:\"stdClass\":0:{}}}s:7:\"_errors\";a:0:{}}s:4:\"user\";O:5:\"JUser\":19:{s:2:\"id\";i:0;s:4:\"name\";N;s:8:\"username\";N;s:5:\"email\";N;s:8:\"password\";N;s:14:\"password_clear\";s:0:\"\";s:8:\"usertype\";N;s:5:\"block\";N;s:9:\"sendEmail\";i:0;s:3:\"gid\";i:0;s:12:\"registerDate\";N;s:13:\"lastvisitDate\";N;s:10:\"activation\";N;s:6:\"params\";N;s:3:\"aid\";i:0;s:5:\"guest\";i:1;s:7:\"_params\";O:10:\"JParameter\":7:{s:4:\"_raw\";s:0:\"\";s:4:\"_xml\";N;s:9:\"_elements\";a:0:{}s:12:\"_elementPath\";a:1:{i:0;s:68:\"/usr/local/apache/htdocs/iid/libraries/joomla/html/parameter/element\";}s:17:\"_defaultNameSpace\";s:8:\"_default\";s:9:\"_registry\";a:1:{s:8:\"_default\";a:1:{s:4:\"data\";O:8:\"stdClass\":0:{}}}s:7:\"_errors\";a:0:{}}s:9:\"_errorMsg\";N;s:7:\"_errors\";a:0:{}}}');
/*!40000 ALTER TABLE `jos_session` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jos_stats_agents`
--

DROP TABLE IF EXISTS `jos_stats_agents`;
CREATE TABLE `jos_stats_agents` (
  `agent` varchar(255) NOT NULL default '',
  `type` tinyint(1) unsigned NOT NULL default '0',
  `hits` int(11) unsigned NOT NULL default '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jos_stats_agents`
--

LOCK TABLES `jos_stats_agents` WRITE;
/*!40000 ALTER TABLE `jos_stats_agents` DISABLE KEYS */;
/*!40000 ALTER TABLE `jos_stats_agents` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jos_survey`
--

DROP TABLE IF EXISTS `jos_survey`;
CREATE TABLE `jos_survey` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(255) NOT NULL,
  `header_descriptions` text NOT NULL,
  `footer_descriptions` text NOT NULL,
  `created` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified` datetime NOT NULL,
  `modified_by` int(11) NOT NULL,
  `checked_out` int(11) NOT NULL,
  `checked_out_time` datetime NOT NULL,
  `published` tinyint(1) NOT NULL,
  `ordering` int(11) NOT NULL,
  `archive` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jos_survey`
--

LOCK TABLES `jos_survey` WRITE;
/*!40000 ALTER TABLE `jos_survey` DISABLE KEYS */;
INSERT INTO `jos_survey` VALUES (3,'Flood Awareness Survey','','Thank you for taking our Flood Awareness Survey.','2010-12-10 00:00:00',0,'0000-00-00 00:00:00',0,0,'0000-00-00 00:00:00',1,2,0);
/*!40000 ALTER TABLE `jos_survey` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jos_survey_answer`
--

DROP TABLE IF EXISTS `jos_survey_answer`;
CREATE TABLE `jos_survey_answer` (
  `id` int(11) NOT NULL auto_increment,
  `survey_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `ipaddress` varchar(255) NOT NULL,
  `browser` text NOT NULL,
  `created` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified` datetime NOT NULL,
  `modified_by` int(11) NOT NULL,
  `checked_out` int(11) NOT NULL,
  `checked_out_time` datetime NOT NULL,
  `published` tinyint(1) NOT NULL,
  `ordering` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jos_survey_answer`
--

LOCK TABLES `jos_survey_answer` WRITE;
/*!40000 ALTER TABLE `jos_survey_answer` DISABLE KEYS */;
INSERT INTO `jos_survey_answer` VALUES (1,1,'kailash','pathak27@gmail.com','','','0000-00-00 00:00:00',0,'0000-00-00 00:00:00',0,0,'0000-00-00 00:00:00',0,0),(2,1,'kailash','pathak27@gmail.com','','','0000-00-00 00:00:00',0,'0000-00-00 00:00:00',0,0,'0000-00-00 00:00:00',0,0),(3,2,'kailash','pathak27@gmail.com','','','0000-00-00 00:00:00',0,'0000-00-00 00:00:00',0,0,'0000-00-00 00:00:00',0,0),(4,2,'kailash','pathak27@gmail.com','','','0000-00-00 00:00:00',0,'0000-00-00 00:00:00',0,0,'0000-00-00 00:00:00',0,0),(5,1,'kailash','pathak27@gmail.com','','','0000-00-00 00:00:00',0,'0000-00-00 00:00:00',0,0,'0000-00-00 00:00:00',0,0),(8,3,'pranshu','ashish@yahoo.com','','','0000-00-00 00:00:00',0,'0000-00-00 00:00:00',0,0,'0000-00-00 00:00:00',0,0),(9,3,'TEST','kandre@meandv.com','','','0000-00-00 00:00:00',0,'0000-00-00 00:00:00',0,0,'0000-00-00 00:00:00',0,0),(10,3,'Test','dxt.anshuman@gmail.com','','','0000-00-00 00:00:00',0,'0000-00-00 00:00:00',0,0,'0000-00-00 00:00:00',0,0),(11,3,'Kristin','kkline@meandv.com','','','0000-00-00 00:00:00',0,'0000-00-00 00:00:00',0,0,'0000-00-00 00:00:00',0,0),(12,3,'dfdfd','veenod.dubey@gmail.com','','','0000-00-00 00:00:00',0,'0000-00-00 00:00:00',0,0,'0000-00-00 00:00:00',0,0),(13,3,'dfdfd','veenod.dubey@gmail.com','','','0000-00-00 00:00:00',0,'0000-00-00 00:00:00',0,0,'0000-00-00 00:00:00',0,0),(14,3,'ashish','ashish@yahoo.com','','','0000-00-00 00:00:00',0,'0000-00-00 00:00:00',0,0,'0000-00-00 00:00:00',0,0),(15,3,'Kristin','Kline','','','0000-00-00 00:00:00',0,'0000-00-00 00:00:00',0,0,'0000-00-00 00:00:00',0,0),(16,3,'Test','dxt.anshuman@gmail.com','','','0000-00-00 00:00:00',0,'0000-00-00 00:00:00',0,0,'0000-00-00 00:00:00',0,0),(17,3,'mary hill','tahoemary626@hotmail.com','','','0000-00-00 00:00:00',0,'0000-00-00 00:00:00',0,0,'0000-00-00 00:00:00',0,0),(18,3,'','','','','0000-00-00 00:00:00',0,'0000-00-00 00:00:00',0,0,'0000-00-00 00:00:00',0,0),(19,3,'Tim Sickel','disaster93@aol.com','','','0000-00-00 00:00:00',0,'0000-00-00 00:00:00',0,0,'0000-00-00 00:00:00',0,0),(20,3,'Troy  Daugherty','gaspdesign@earthlink.net','','','0000-00-00 00:00:00',0,'0000-00-00 00:00:00',0,0,'0000-00-00 00:00:00',0,0),(21,3,'T L Zvokel','ztraincrzy@aol.com','','','0000-00-00 00:00:00',0,'0000-00-00 00:00:00',0,0,'0000-00-00 00:00:00',0,0),(22,3,'K. Timmer','kathy.timmer@gmail.com','','','0000-00-00 00:00:00',0,'0000-00-00 00:00:00',0,0,'0000-00-00 00:00:00',0,0),(23,3,'Jake Hartz','dethfinmetal@hotmail.com','','','2011-03-07 19:51:05',0,'0000-00-00 00:00:00',0,0,'0000-00-00 00:00:00',0,0),(24,3,'Kelly','McPartland','','','2011-03-08 15:06:29',0,'0000-00-00 00:00:00',0,0,'0000-00-00 00:00:00',0,0),(25,3,'Susan Judkins Josten','sjudkins3@gmail.com','','','2011-03-10 22:02:31',0,'0000-00-00 00:00:00',0,0,'0000-00-00 00:00:00',0,0),(26,3,'abby','dustinandabby@yahoo.com','','','2011-03-12 16:45:47',0,'0000-00-00 00:00:00',0,0,'0000-00-00 00:00:00',0,0),(27,3,'jeannie clark','clarkcnc@cox.net','','','2011-06-03 18:31:02',0,'0000-00-00 00:00:00',0,0,'0000-00-00 00:00:00',0,0),(28,3,'Kelly','huipana@yahoo.com','','','2011-06-08 19:33:55',0,'0000-00-00 00:00:00',0,0,'0000-00-00 00:00:00',0,0),(29,3,'Jason','Rush8112@live.com','','','2011-06-09 15:14:34',0,'0000-00-00 00:00:00',0,0,'0000-00-00 00:00:00',0,0),(30,3,'Sandra Pickup','s.pickup@mchsi.com','','','2012-03-02 17:34:17',0,'0000-00-00 00:00:00',0,0,'0000-00-00 00:00:00',0,0),(31,3,'Doug Davis','dbd1956@mchsi.com','','','2012-03-09 22:49:30',0,'0000-00-00 00:00:00',0,0,'0000-00-00 00:00:00',0,0),(32,3,'','','','','2012-08-03 09:44:57',0,'0000-00-00 00:00:00',0,0,'0000-00-00 00:00:00',0,0),(33,3,'dfg','d','','','2012-08-03 09:51:01',0,'0000-00-00 00:00:00',0,0,'0000-00-00 00:00:00',0,0),(34,3,'','','','','2012-08-03 10:02:40',0,'0000-00-00 00:00:00',0,0,'0000-00-00 00:00:00',0,0),(35,3,'Emma Jane Reed','mj50613@gmail.com','','','2012-11-23 13:53:44',0,'0000-00-00 00:00:00',0,0,'0000-00-00 00:00:00',0,0);
/*!40000 ALTER TABLE `jos_survey_answer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jos_survey_answer_details`
--

DROP TABLE IF EXISTS `jos_survey_answer_details`;
CREATE TABLE `jos_survey_answer_details` (
  `id` int(11) NOT NULL auto_increment,
  `survey_id` int(11) NOT NULL,
  `survey_answer_id` int(11) NOT NULL,
  `survey_question_id` int(11) NOT NULL,
  `answer` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=227 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jos_survey_answer_details`
--

LOCK TABLES `jos_survey_answer_details` WRITE;
/*!40000 ALTER TABLE `jos_survey_answer_details` DISABLE KEYS */;
INSERT INTO `jos_survey_answer_details` VALUES (1,1,1,1,'1.agara'),(2,1,2,1,'1.agara'),(3,2,3,2,'1.asia'),(4,3,4,2,'1.asia'),(5,2,4,3,'b.7'),(6,1,5,1,'2.deli'),(15,3,8,8,'TV'),(16,3,8,9,'No'),(17,3,8,10,'Yes'),(18,3,8,11,'None'),(19,3,8,12,'When I bought my house'),(20,3,8,13,'No'),(21,3,8,14,'No'),(22,3,8,15,'No risk'),(23,16,8,16,'helloo'),(24,3,9,8,'TV'),(25,3,9,9,'Yes'),(26,3,9,10,'Yes'),(27,3,9,11,'Heavy rain / Flash floods River going above flood plain levels (Levees & Dams)'),(28,3,9,12,'When I bought my house'),(29,3,9,13,'No'),(30,3,9,14,'No'),(31,3,9,15,'Moderate risk'),(32,16,9,16,'TEST'),(33,3,10,8,'TV,Newspaper,Radio'),(34,3,10,9,'Yes'),(35,3,10,10,'Yes'),(36,3,10,11,'Spring thaw'),(37,3,10,13,'Yes'),(38,3,10,15,'High risk'),(39,16,10,16,'zxccxzcx'),(40,3,11,8,'Other'),(41,3,11,9,'Yes'),(42,3,11,10,'No'),(43,3,11,11,'Heavy rain / Flash floods River going above flood plain levels (Levees & Dams)'),(44,3,11,12,'Other'),(45,3,11,13,'No'),(46,3,11,14,'No'),(47,3,11,15,'Low risk'),(48,16,11,16,''),(49,3,12,8,'Internet search'),(50,3,12,9,'Yes'),(51,3,12,10,'Yes'),(52,3,12,11,'New development (construction changing landscape)'),(53,3,12,12,'I review it annually'),(54,3,12,13,'Yes'),(55,3,12,14,'No'),(56,3,12,15,'Moderate risk'),(57,16,12,16,'test'),(58,3,13,8,'Newspaper'),(59,3,13,9,'Yes'),(60,3,13,10,'Yes'),(61,3,13,11,'Spring thaw'),(62,3,13,12,'When I bought my house'),(63,3,13,13,'Yes'),(64,3,13,14,'No'),(65,3,13,15,'Moderate risk'),(66,16,13,16,'gfgf'),(67,3,14,8,'Newspaper'),(68,3,14,10,'No'),(69,3,14,11,'New development (construction changing landscape)'),(70,3,14,12,'I review it annually'),(71,3,14,14,'No'),(72,3,14,15,'Moderate risk'),(73,16,14,16,',jhklhjkl'),(74,3,15,8,'TV'),(75,3,15,9,'Yes'),(76,3,15,10,'Yes'),(77,3,15,11,'Spring thaw'),(78,3,15,12,'When I bought my house'),(79,3,15,13,'Yes'),(80,3,15,14,'Yes'),(81,3,15,15,'High risk'),(82,16,15,16,'test '),(83,3,16,8,'TV'),(84,3,16,9,'Yes'),(85,3,16,10,'Yes'),(86,3,16,12,'When I bought my house'),(87,3,16,15,'No risk'),(88,16,16,16,''),(89,3,17,8,'TV'),(90,3,17,9,'Yes'),(91,3,17,10,'Yes'),(92,3,17,11,'Heavy rain / Flash floods River going above flood plain levels (Levees & Dams)'),(93,3,17,12,'When I bought my house'),(94,3,17,13,'No'),(95,3,17,14,'No'),(96,3,17,15,'Low risk'),(97,16,17,16,'5298 Oakcrest Hill Rd SE'),(98,16,18,16,'5298 Oakcrest Hill Rd Se. Riverside, Ia 52327'),(99,3,19,8,'TV'),(100,3,19,9,'Yes'),(101,3,19,10,'Yes'),(102,3,19,11,'Spring thaw,Heavy rain / Flash floods River going above flood plain levels (Levees & Dams)'),(103,3,19,12,'I review it annually'),(104,3,19,13,'Yes'),(105,3,19,14,'No'),(106,3,19,15,'High risk'),(107,16,19,16,'disaster93@aol.com'),(108,3,20,8,'TV'),(109,3,20,9,'Yes'),(110,3,20,10,'Yes'),(111,3,20,11,'New development (construction changing landscape)'),(112,3,20,12,'I review it annually'),(113,3,20,13,'Yes'),(114,3,20,14,'No'),(115,3,20,15,'Low risk'),(116,16,20,16,'415 15th St. SE\r\nCedar Rapids, IA. 52403'),(117,3,21,8,'TV'),(118,3,21,9,'Yes'),(119,3,21,10,'Yes'),(120,3,21,11,'New development (construction changing landscape)'),(121,3,21,12,'Other'),(122,3,21,13,'Yes'),(123,3,21,14,'No'),(124,3,21,15,'Low risk'),(125,16,21,16,'402 Deer Ridge Dr NW\r\nBondurant, IA  50035'),(126,3,22,8,'Other'),(127,3,22,9,'Yes'),(128,3,22,10,'Yes'),(129,3,22,11,'Spring thaw,New development (construction changing landscape),Heavy rain / Flash floods River going above flood plain levels (Levees & Dams)'),(130,3,22,12,'When I bought my house'),(131,3,22,13,'No'),(132,3,22,14,'No'),(133,3,22,15,'Low risk'),(134,16,22,16,'2427 Eddie St.  \r\nCedar Falls, Iowa  50613                '),(135,3,23,8,'TV'),(136,3,23,9,'Yes'),(137,3,23,10,'Yes'),(138,3,23,11,'Spring thaw,Heavy rain / Flash floods River going above flood plain levels (Levees & Dams)'),(139,3,23,12,'When I bought my house'),(140,3,23,13,'No'),(141,3,23,14,'No'),(142,3,23,15,'Low risk'),(143,16,23,16,'810 Englewood Ave\r\nWaterloo, IA 50701'),(144,3,24,8,'TV'),(145,3,24,9,'Yes'),(146,3,24,10,'Yes'),(147,3,24,11,'Heavy rain / Flash floods River going above flood plain levels (Levees & Dams)'),(148,3,24,12,'I review it annually'),(149,3,24,13,'Yes'),(150,3,24,14,'Yes'),(151,3,24,15,'Low risk'),(152,16,24,16,'3607 Annear Street   Ames, IA 50014'),(153,3,25,8,'Other'),(154,3,25,9,'Yes'),(155,3,25,10,'Yes'),(156,3,25,11,'Heavy rain / Flash floods River going above flood plain levels (Levees & Dams)'),(157,3,25,12,'I review it annually'),(158,3,25,13,'Yes'),(159,3,25,14,'Yes'),(160,3,25,15,'Low risk'),(161,16,25,16,''),(162,3,26,8,'TV'),(163,3,26,9,'Yes'),(164,3,26,10,'Yes'),(165,3,26,11,'Spring thaw'),(166,3,26,12,'When I bought my house'),(167,3,26,13,'No'),(168,3,26,14,'No'),(169,3,26,15,'Moderate risk'),(170,16,26,16,''),(171,3,27,8,'Internet search'),(172,3,27,9,'Yes'),(173,3,27,10,'No'),(174,3,27,11,'Heavy rain / Flash floods River going above flood plain levels (Levees & Dams)'),(175,3,27,13,'Yes'),(176,3,27,14,'No'),(177,3,27,15,'Moderate risk'),(178,16,27,16,'2817 macineery dr. aptment 1202 cb, ia 51501'),(179,3,28,8,'Internet search'),(180,3,28,9,'Yes'),(181,3,28,10,'Yes'),(182,3,28,11,'Heavy rain / Flash floods River going above flood plain levels (Levees & Dams)'),(183,3,28,12,'Other'),(184,3,28,13,'No'),(185,3,28,14,'No'),(186,3,28,15,'Other'),(187,16,28,16,''),(188,3,29,8,'TV'),(189,3,29,9,'Yes'),(190,3,29,10,'Yes'),(191,3,29,11,'Heavy rain / Flash floods River going above flood plain levels (Levees & Dams)'),(192,3,29,12,'I review it annually'),(193,3,29,13,'No'),(194,3,29,14,'Yes'),(195,3,29,15,'Low risk'),(196,16,29,16,''),(197,3,30,8,'TV'),(198,3,30,9,'Yes'),(199,3,30,10,'Yes'),(200,3,30,11,'New development (construction changing landscape)'),(201,3,30,12,'I review it when there is a threat of bad weather'),(202,3,30,13,'Yes'),(203,3,30,14,'No'),(204,3,30,15,'Moderate risk'),(205,16,30,16,'818 3rd Ave\r\nIowa City, IA 52245'),(206,3,31,8,'TV'),(207,3,31,9,'Yes'),(208,3,31,10,'Yes'),(209,3,31,11,'Heavy rain / Flash floods River going above flood plain levels (Levees & Dams)'),(210,3,31,12,'When I bought my house'),(211,3,31,13,'No'),(212,3,31,14,'Yes'),(213,3,31,15,'Moderate risk'),(214,16,31,16,'dbd1956@mchsi.com'),(215,16,32,16,''),(216,16,33,16,''),(217,16,34,16,''),(218,3,35,8,'Other'),(219,3,35,9,'Yes'),(220,3,35,10,'Yes'),(221,3,35,11,'Spring thaw,New development (construction changing landscape)'),(222,3,35,12,'When I bought my house'),(223,3,35,13,'No'),(224,3,35,14,'No'),(225,3,35,15,'Low risk'),(226,16,35,16,'');
/*!40000 ALTER TABLE `jos_survey_answer_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jos_survey_configuration`
--

DROP TABLE IF EXISTS `jos_survey_configuration`;
CREATE TABLE `jos_survey_configuration` (
  `id` int(11) NOT NULL auto_increment,
  `email` text NOT NULL,
  `thankmessage` text NOT NULL,
  `created` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified` datetime NOT NULL,
  `modified_by` int(11) NOT NULL,
  `checked_out` int(11) NOT NULL,
  `checked_out_time` datetime NOT NULL,
  `published` tinyint(1) NOT NULL,
  `ordering` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jos_survey_configuration`
--

LOCK TABLES `jos_survey_configuration` WRITE;
/*!40000 ALTER TABLE `jos_survey_configuration` DISABLE KEYS */;
INSERT INTO `jos_survey_configuration` VALUES (1,'salbertson@meandv.com, mfischer@meandv.com','Thank you for completing the Don’t Test the Waters Iowa survey.','0000-00-00 00:00:00',0,'0000-00-00 00:00:00',0,0,'0000-00-00 00:00:00',0,1);
/*!40000 ALTER TABLE `jos_survey_configuration` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jos_survey_questions`
--

DROP TABLE IF EXISTS `jos_survey_questions`;
CREATE TABLE `jos_survey_questions` (
  `id` int(11) NOT NULL auto_increment,
  `survey_id` int(11) NOT NULL,
  `question_description` text NOT NULL,
  `answer_type` varchar(255) NOT NULL,
  `answer_options` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified` datetime NOT NULL,
  `modified_by` int(11) NOT NULL,
  `checked_out` int(11) NOT NULL,
  `checked_out_time` datetime NOT NULL,
  `published` tinyint(1) NOT NULL,
  `ordering` int(11) NOT NULL,
  `archive` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jos_survey_questions`
--

LOCK TABLES `jos_survey_questions` WRITE;
/*!40000 ALTER TABLE `jos_survey_questions` DISABLE KEYS */;
INSERT INTO `jos_survey_questions` VALUES (8,3,'How did you learn about this website?','checkbox','TV,Newspaper,Radio,News Story,Internet search,Other','2013-12-10 00:00:00',0,'0000-00-00 00:00:00',0,0,'0000-00-00 00:00:00',1,2,0),(9,3,'Do you live in Iowa?','checkbox','Yes,No','2013-12-10 00:00:00',0,'0000-00-00 00:00:00',0,0,'0000-00-00 00:00:00',1,3,0),(10,3,'Do you own a home?','checkbox','Yes,No','2013-12-10 00:00:00',0,'0000-00-00 00:00:00',0,0,'0000-00-00 00:00:00',1,4,0),(11,3,'I am most concerned/aware of flooding caused by:','checkbox','Spring thaw,New development (construction changing landscape),Heavy rain / Flash floods River going above flood plain levels (Levees & Dams),None','2013-12-10 00:00:00',0,'0000-00-00 00:00:00',0,0,'0000-00-00 00:00:00',1,5,0),(12,3,'When did you last review or purchase your home owner\'s insurance policy?','checkbox','When I bought my house,I review it annually,I review it when there is a threat of bad weather,Other','2013-12-10 00:00:00',0,'0000-00-00 00:00:00',0,0,'0000-00-00 00:00:00',1,6,0),(13,3,'Have you researched flood insurance?','checkbox','Yes,No','2013-12-10 00:00:00',0,'0000-00-00 00:00:00',0,0,'0000-00-00 00:00:00',1,7,0),(14,3,'Have you done anything in the last two years to reduce your risk of flood damage or prepare for a flood emergency?','checkbox','Yes,No','2013-12-10 00:00:00',0,'0000-00-00 00:00:00',0,0,'0000-00-00 00:00:00',1,8,0),(15,3,'How would you rate your risk of potential flood damage to your home or property?','checkbox','High risk,Moderate risk,Low risk,No risk,Other','2013-12-10 00:00:00',0,'0000-00-00 00:00:00',0,0,'0000-00-00 00:00:00',1,9,0),(16,3,'If you would you like a free brochure about preparing for a flood, please enter your mailing address here.','text','','2013-12-10 00:00:00',0,'0000-00-00 00:00:00',0,0,'0000-00-00 00:00:00',1,10,0);
/*!40000 ALTER TABLE `jos_survey_questions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jos_templates_menu`
--

DROP TABLE IF EXISTS `jos_templates_menu`;
CREATE TABLE `jos_templates_menu` (
  `template` varchar(255) NOT NULL default '',
  `menuid` int(11) NOT NULL default '0',
  `client_id` tinyint(4) NOT NULL default '0',
  PRIMARY KEY  (`menuid`,`client_id`,`template`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jos_templates_menu`
--

LOCK TABLES `jos_templates_menu` WRITE;
/*!40000 ALTER TABLE `jos_templates_menu` DISABLE KEYS */;
INSERT INTO `jos_templates_menu` VALUES ('iid_home',0,0),('meandv3',0,1);
/*!40000 ALTER TABLE `jos_templates_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jos_testimonial`
--

DROP TABLE IF EXISTS `jos_testimonial`;
CREATE TABLE `jos_testimonial` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(20) NOT NULL,
  `name` varchar(200) NOT NULL,
  `designation` varchar(200) NOT NULL,
  `company_name` varchar(200) NOT NULL,
  `details` varchar(1000) NOT NULL,
  `image` varchar(150) NOT NULL,
  `archive` tinyint(1) NOT NULL default '1',
  `front_page_publish` tinyint(1) NOT NULL default '1',
  `published` tinyint(1) NOT NULL default '1',
  `created` datetime NOT NULL,
  `created_by` smallint(4) NOT NULL,
  `checked_out` smallint(4) NOT NULL,
  `checked_out_time` datetime NOT NULL,
  `ordering` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jos_testimonial`
--

LOCK TABLES `jos_testimonial` WRITE;
/*!40000 ALTER TABLE `jos_testimonial` DISABLE KEYS */;
/*!40000 ALTER TABLE `jos_testimonial` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jos_users`
--

DROP TABLE IF EXISTS `jos_users`;
CREATE TABLE `jos_users` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(255) NOT NULL default '',
  `username` varchar(150) NOT NULL default '',
  `email` varchar(100) NOT NULL default '',
  `password` varchar(100) NOT NULL default '',
  `usertype` varchar(25) NOT NULL default '',
  `block` tinyint(4) NOT NULL default '0',
  `sendEmail` tinyint(4) default '0',
  `gid` tinyint(3) unsigned NOT NULL default '1',
  `registerDate` datetime NOT NULL default '0000-00-00 00:00:00',
  `lastvisitDate` datetime NOT NULL default '0000-00-00 00:00:00',
  `activation` varchar(100) NOT NULL default '',
  `params` text NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `usertype` (`usertype`),
  KEY `idx_name` (`name`),
  KEY `gid_block` (`gid`,`block`),
  KEY `username` (`username`),
  KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=89 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jos_users`
--

LOCK TABLES `jos_users` WRITE;
/*!40000 ALTER TABLE `jos_users` DISABLE KEYS */;
INSERT INTO `jos_users` VALUES (62,'Administrator','admin','dxt.anshuman@gmail.com','6edbbe7c5ba13859d3f77dcfd8db7130:FLZ4WioKwrq7XmXyMWxUNGyVMY5x6TCv','Super Administrator',0,1,25,'2010-12-03 00:18:17','2013-08-19 07:33:05','','admin_language=\nlanguage=\neditor=jce\nhelpsite=\ntimezone=0\n\n'),(74,'olasamnzh','olasamnzh','gumpkfdq@hotmail.com','4cbab4629e38c44c86a3f875c87bd690:06WrxBkrv3qDlNejSJAkKU0Jq9ofYdtM','Registered',1,0,18,'2013-08-13 08:01:26','0000-00-00 00:00:00','3603b546b6f56dedc0c392a52c4eaa34','\n'),(73,'rolex0watch','rolex0watch','nestli.n.g.nffx@gmail.com','2c01bf7cd8c2dc73c606a1d4ad27f5d0:Zn0O37i2x8lh9rh59Q8MZaHczWnq47lP','Registered',0,0,18,'2013-08-13 05:45:10','0000-00-00 00:00:00','','\n'),(72,'Dyetetz0','Dyetetz0','bwxa.d.tms.b.s.s@gmail.com','b8c52ddca16eab1f3479c98065fc4bbe:9FX5PWVMeVSJdqncnUBaOOwmuxeSnnrU','Registered',0,0,18,'2013-08-13 04:37:11','0000-00-00 00:00:00','','\n'),(70,'hongrpuu','hongrpuu','0.0054.l.iy.a.n5.2.0@gmail.com','205b43a9079477a2a26e0015537421bc:TLWpnyGlOycB7nmtCoqPTfa0xK73rhxq','Registered',0,0,18,'2013-08-13 00:37:45','0000-00-00 00:00:00','','\n'),(76,'4ci8xie76zs','4ci8xie76zs','omiroxuan@hotmail.com','d2d1aa0e2d22c6901d505e0913e75d10:VhrMiZXrJLvOO8B8eH9kQK2IEwa3WAgG','Registered',1,0,18,'2013-08-15 11:10:15','0000-00-00 00:00:00','a01c0e7fe8be8dcae474162b37d283b6','\n'),(69,'halissty1905','halissty1905','ppwoppfttppp@gmail.com','3fdc52bb7b1cb3f36b361a1f3a31160a:tdb5KWEm6VWdf6Z03L4Nc6hYGFlyNI7k','Registered',0,0,18,'2013-03-08 12:53:25','0000-00-00 00:00:00','','\n'),(71,'72um8rk6','72um8rk6','or.i.gin.ateiy.y@gmail.com','c0f9588a828c92eb05e2283c843bc505:QFsDjzEaytlrtD3vioqc5fk8OJtDKcJM','Registered',0,0,18,'2013-08-13 00:37:53','0000-00-00 00:00:00','','\n'),(67,'Sarah Albertson','salbertson','salbertson@meandv.com','39e573c86a03f34d0587df5e7629c104:P411ueR5CrLjpwUzum2QsRG7rE3vcydy','Administrator',0,0,24,'2011-02-07 17:15:05','2011-06-16 21:16:23','','admin_language=\nlanguage=\neditor=jce\nhelpsite=\ntimezone=0\n\n'),(75,'x13o2we368','x13o2we368','yahaha045@gmail.com','6fb4cefd9d0cfd9afd09fcb452d26dcc:yBZo0c25nj3k0OjzxR5yiAmJI5lcadkE','Registered',0,0,18,'2013-08-14 01:27:56','2013-08-22 02:34:41','','\n'),(77,'feiktianh','feiktianh','fe.it.i.a.nc.l.e.at@gmail.com','eaaa1cc0ded25a4cb2a668063a37e2aa:JmPco1P065EACCaW9toIU2ALW500dKbF','Registered',1,0,18,'2013-08-17 02:44:09','0000-00-00 00:00:00','bed8545fb0d81115db40c52d4c7528d3','\n'),(78,'feibntian','feibntian','fe.i.ti.an.clt.to.m@gmail.com','fcc7ea1d2551d4ab412824a7ad1303a1:DPCD5KX99HgTZc1Pf1hAKqLslzaaymje','Registered',0,0,18,'2013-08-17 02:47:57','0000-00-00 00:00:00','','\n'),(79,'hongpduu','hongpduu','fe.it.i.an.r.e.d.cl@gmail.com','13b465648732c549597a5d028384bf99:TYhMYRc3v4bMIKs4ryAnjIXAmiGwjdYm','Registered',1,0,18,'2013-08-17 02:51:04','0000-00-00 00:00:00','1d95a240d3d5d5de03c1fe27bf893fb5','\n'),(80,'feintianq','feintianq','feit.i.a.n.c.l.eat@gmail.com','d79da32f4ad321dd203623c91191562f:QK9kLanww2HZWhSQ2Lah4bYjscDVIyBS','Registered',1,0,18,'2013-08-17 08:56:39','0000-00-00 00:00:00','59a76e307e15e1706d2f89de0f632e6e','\n'),(81,'feizutian','feizutian','fe.it.ia.n.clt.t.o.m@gmail.com','93ad46ce367d3ba3cd1c8b1945892b55:DGtKwTmIzGvgkxgN1no9VKabybONPf9c','Registered',1,0,18,'2013-08-17 11:15:24','0000-00-00 00:00:00','63c6681d1d65841e2d01da6561a16692','\n'),(82,'hongiiuu','hongiiuu','feiti.an.re.d.c.l@gmail.com','2f3a2171b534a60bdfd48f3dd28275fb:qE91Oo7JwJhy9jBjURK8zLRTaUIGRf14','Registered',1,0,18,'2013-08-17 15:09:44','0000-00-00 00:00:00','46bfaa08be04ba78ad2fecb4ad579c23','\n'),(83,'feintiank','feintiank','f.e.it.i.a.n.c.leat@gmail.com','e979fc5043c8921a126612bdfe9cdaea:lwX0xBBBvzybq7jLJKcbURW7jCkh9NDT','Registered',1,0,18,'2013-08-18 06:04:04','0000-00-00 00:00:00','75953b88520a8bdc6225677549ed7ffc','\n'),(84,'hongwtuu','hongwtuu','fe.it.i.a.n.r.ed.c.l@gmail.com','ca9aea297e9bd0b16eb5177f43f4eebd:e9KXlCf6HJWsOVeAlxJSVFWiLLP1cKE6','Registered',1,0,18,'2013-08-18 07:50:32','0000-00-00 00:00:00','dea6cf9b94de6ddfa45d2963f796ae74','\n'),(85,'hongxxuu','hongxxuu','fei.ti.a.nre.d.c.l@gmail.com','45df62c1392b0ae052803238e95d2bd1:oCDKTsFfE1ZR3LwOWAvo1DUdMd5QXGoX','Registered',1,0,18,'2013-08-18 08:03:52','0000-00-00 00:00:00','a538fef2f2fef0e272097c8d38bc7b01','\n'),(86,'hongbauu','hongbauu','f.e.iti.a.nre.dc.l@gmail.com','e71bea33e461e7d46fc6d12c7f993104:4M0LkBhe5s7wNYyvY1RIpUAsR6lV2AYw','Registered',0,0,18,'2013-08-19 13:00:46','0000-00-00 00:00:00','','\n'),(87,'eritmbod','eritmbod','adamskicai@hotmail.com','c85c538261782c6a15f6fa7e05df978d:LOVCxbp7QfrasCTCqdW1SheRKg4LFR6q','Registered',1,0,18,'2013-08-19 13:14:49','0000-00-00 00:00:00','82fde7153c980c64c26a0e1d6517b16b','\n'),(88,'jqbcvbaci','jqbcvbaci','btfbewjk2223@hotmail.com','0da906b39d9d0b8af041be61206560bc:m7hUY8r06vOjHarNnSkZUQzmfm0nffqu','Registered',0,0,18,'2013-08-19 15:57:52','0000-00-00 00:00:00','','\n');
/*!40000 ALTER TABLE `jos_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jos_video_config`
--

DROP TABLE IF EXISTS `jos_video_config`;
CREATE TABLE `jos_video_config` (
  `id` int(3) default '0',
  `no_of_default_videos` smallint(4) NOT NULL,
  `order_by` smallint(4) NOT NULL,
  `from_email` varchar(100) NOT NULL,
  `from_name` varchar(100) NOT NULL,
  `email_needed` smallint(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jos_video_config`
--

LOCK TABLES `jos_video_config` WRITE;
/*!40000 ALTER TABLE `jos_video_config` DISABLE KEYS */;
INSERT INTO `jos_video_config` VALUES (1,1,0,'','',0);
/*!40000 ALTER TABLE `jos_video_config` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jos_video_details`
--

DROP TABLE IF EXISTS `jos_video_details`;
CREATE TABLE `jos_video_details` (
  `id` int(11) NOT NULL auto_increment,
  `video_name` varchar(250) NOT NULL,
  `image_name` varchar(250) NOT NULL,
  `video_title` varchar(250) default NULL,
  `description` text,
  `frontpage` tinyint(1) NOT NULL default '0',
  `published` tinyint(1) unsigned NOT NULL,
  `checked_out` int(11) unsigned NOT NULL,
  `checked_out_time` datetime NOT NULL default '0000-00-00 00:00:00',
  `ordering` int(11) NOT NULL,
  `archive` int(2) default '0',
  `created` varchar(255) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jos_video_details`
--

LOCK TABLES `jos_video_details` WRITE;
/*!40000 ALTER TABLE `jos_video_details` DISABLE KEYS */;
INSERT INTO `jos_video_details` VALUES (5,'demo.flv','','Welcome','',0,1,0,'0000-00-00 00:00:00',1,0,'03-12-10');
/*!40000 ALTER TABLE `jos_video_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jos_weblinks`
--

DROP TABLE IF EXISTS `jos_weblinks`;
CREATE TABLE `jos_weblinks` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `catid` int(11) NOT NULL default '0',
  `sid` int(11) NOT NULL default '0',
  `title` varchar(250) NOT NULL default '',
  `alias` varchar(255) NOT NULL default '',
  `url` varchar(250) NOT NULL default '',
  `description` text NOT NULL,
  `date` datetime NOT NULL default '0000-00-00 00:00:00',
  `hits` int(11) NOT NULL default '0',
  `published` tinyint(1) NOT NULL default '0',
  `checked_out` int(11) NOT NULL default '0',
  `checked_out_time` datetime NOT NULL default '0000-00-00 00:00:00',
  `ordering` int(11) NOT NULL default '0',
  `archived` tinyint(1) NOT NULL default '0',
  `approved` tinyint(1) NOT NULL default '1',
  `params` text NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `catid` (`catid`,`published`,`archived`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jos_weblinks`
--

LOCK TABLES `jos_weblinks` WRITE;
/*!40000 ALTER TABLE `jos_weblinks` DISABLE KEYS */;
/*!40000 ALTER TABLE `jos_weblinks` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-08-22  6:25:42
