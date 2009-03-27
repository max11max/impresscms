<?php
/**
* Admin control panel entry page
*
* This page is responsible for
* - displaying the home of the Control Panel
* - checking for cache/adminmenu.php
* - displaying RSS feed of the ImpressCMS Project
*
* @copyright	http://www.xoops.org/ The XOOPS Project
* @copyright	XOOPS_copyrights.txt
* @copyright	http://www.impresscms.org/ The ImpressCMS Project
* @license		http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License (GPL)
* @package		core
* @since		XOOPS
* @author		http://www.xoops.org The XOOPS Project
* @author		modified by marcan <marcan@impresscms.org>
* @version		$Id: admin.php 8006 2009-01-28 17:04:55Z malanciault $
*/

$xoopsOption['pagetype'] = 'admin';
include 'mainfile.php';
include ICMS_ROOT_PATH.'/include/cp_functions.php';

// Admin Authentication
if($xoopsUser)
{
	if(!$xoopsUser->isAdmin(-1)) {redirect_header('index.php',2,_AD_NORIGHT);}
}
else {redirect_header('index.php',2,_AD_NORIGHT);}
// end Admin Authentication

$op = isset($_GET['rssnews']) ? intval($_GET['rssnews']) : 0;
if(!empty($_GET['op'])) {$op = intval($_GET['op']);}
if(!empty($_POST['op'])) {$op = intval($_POST['op']);}

if(!file_exists(ICMS_CACHE_PATH.'/adminmenu_'.$xoopsConfig['language'].'.php'))
{
xoops_module_write_admin_menu(impresscms_get_adminmenu());
}

switch($op)
{
	case 1:
		 icms_cp_header();
		 showRSS();
	break;
/*	case 2:
		xoops_module_write_admin_menu(impresscms_get_adminmenu());
		redirect_header('javascript:history.go(-1)', 1, _AD_LOGINADMIN);
	break;*/

	default:
		icms_cp_header();
	break;
}

function showRSS()
{
	global $icmsAdminTpl;

	$config_handler =& xoops_gethandler('config');
	$xoopsConfigPersona =& $config_handler->getConfigsByCat(XOOPS_CONF_PERSONA);
	$rssurl = $xoopsConfigPersona['rss_local'];
	$rssfile = ICMS_CACHE_PATH.'/adminnews_'._LANGCODE.'.xml';

	include_once(ICMS_ROOT_PATH . '/class/icmssimplerss.php');

	// Create a new instance of the SimplePie object
	$feed = new IcmsSimpleRss();
	$feed->set_feed_url($rssurl);
	$feed->set_cache_duration(3600);
	$feed->set_autodiscovery_level(SIMPLEPIE_LOCATOR_NONE);
	$feed->init();
	$feed->handle_content_type();

	if (!$feed->error) {
		$icmsAdminTpl->assign('admin_rss_feed_link', $feed->get_link());
		$icmsAdminTpl->assign('admin_rss_feed_title', $feed->get_title());
		$icmsAdminTpl->assign('admin_rss_feed_dsc', $feed->get_description());
		$feeditems = array();
		foreach($feed->get_items() as $item) {
			$feeditem = array();
			$feeditem['link'] = $item->get_permalink();
			$feeditem['title'] = $item->get_title();
			$feeditem['description'] = $item->get_description();
			$feeditem['date'] = $item->get_date();
			$feeditem['guid'] = $item->get_id();
			$feeditems[] = $feeditem;
		}
		$icmsAdminTpl->assign('admin_rss_feeditems', $feeditems);
	}

	$icmsAdminTpl->display('db:admin/system_adm_rss.html');
}
icms_cp_footer();
?>