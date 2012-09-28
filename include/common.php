<?php
/**
 * All common information used in the core goes from here.
 * Be careful while editing this file!
 *
 * @copyright	http://www.impresscms.org/ The ImpressCMS Project
 * @license		http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License (GPL)
 * @package		core
 * @version		$Id: common.php 11604 2012-02-27 03:12:10Z skenow $
 */

/** make sure mainfile is included, for security and functionality */
defined("XOOPS_MAINFILE_INCLUDED") or die();

/** @todo This funtion has been deprecated in PHP 5.3.0 - need to adjust in 1.4 ~skenow */
@set_magic_quotes_runtime(0);

// -- Include common functions and constants file
require_once ICMS_ROOT_PATH . "/include/constants.php";
include_once ICMS_INCLUDE_PATH . "/functions.php";
include_once ICMS_INCLUDE_PATH . "/version.php";

if (!isset($xoopsOption)) $xoopsOption = array();

// -- Initialize kernel and launch bootstrap
require_once ICMS_LIBRARIES_PATH . "/icms.php";
icms::setup();
icms::boot();

// -- Easiest ML by Gijoe (no longer needed here)

// Disable gzip compression if PHP is run under CLI mode
// To be refactored
if (empty($_SERVER['SERVER_NAME']) || substr(PHP_SAPI, 0, 3) == 'cli') {
	$icmsConfig['gzip_compression'] = 0;
}

if ($icmsConfig['gzip_compression'] == 1
	&& extension_loaded('zlib')
	&& !ini_get('zlib.output_compression')
	) {
		ini_set('zlib.output_compression', TRUE);
		if (ini_get( 'zlib.output_compression_level') < 0 ) {
			ini_set( 'zlib.output_compression_level', 6 );
		}
		if (!zlib_get_coding_type()) {
			ini_set('zlib.output_compression', FALSE);
			ob_start('ob_gzhandler');
		}
}

// Include openid common functions if needed
if (defined('ICMS_INCLUDE_OPENID')) {
	require_once ICMS_LIBRARIES_PATH . "/phpopenid/occommon.php";
}
/* This address the strict compliance for PHP 5.3/5.4, but the rest of our timezone handling
 * can be improved beyond this. ~skenow
 */
date_default_timezone_set(timezone_name_from_abbr("", $icmsConfig['default_TZ'] * 3600, 0));

// -- Include site-wide lang file
icms_loadLanguageFile('core', 'global');
icms_loadLanguageFile('core', 'theme');
icms_loadLanguageFile('core', 'core');
icms_loadLanguageFile('system', 'common');
@define('_GLOBAL_LEFT', @_ADM_USE_RTL == 1 ? 'right' : 'left');
@define('_GLOBAL_RIGHT', @_ADM_USE_RTL == 1 ? 'left' : 'right');

// -- Include page-specific lang file
if (isset($xoopsOption['pagetype']) && FALSE === strpos($xoopsOption['pagetype'], '.')) {
	icms_loadLanguageFile('core', $xoopsOption['pagetype']);
}

defined("XOOPS_USE_MULTIBYTES") or define("XOOPS_USE_MULTIBYTES", 0);

if (!empty($_POST['xoops_theme_select']) && in_array($_POST['xoops_theme_select'], $icmsConfig['theme_set_allowed'])) {
	$icmsConfig['theme_set'] = $_POST['xoops_theme_select'];
	$_SESSION['xoopsUserTheme'] = $_POST['xoops_theme_select'];
} elseif (!empty($_POST['theme_select']) && in_array($_POST['theme_select'], $icmsConfig['theme_set_allowed'])) {
	$icmsConfig['theme_set'] = $_POST['theme_select'];
	$_SESSION['xoopsUserTheme'] = $_POST['theme_select'];
} elseif (!empty($_SESSION['xoopsUserTheme'])
		&& in_array($_SESSION['xoopsUserTheme'], $icmsConfig['theme_set_allowed'])) {
	$icmsConfig['theme_set'] = $_SESSION['xoopsUserTheme'];
}

icms::launchModule();

if ($icmsConfigPersona['multi_login']) {
	if (is_object(icms::$user)) {
		$online_handler = icms::handler('icms_core_Online');
		$online_handler->write(icms::$user->getVar('uid'), icms::$user->getVar('uname'),
							   time(), 0, $_SERVER['REMOTE_ADDR']);
	}
}

// -- finalize boot process
icms::$preload->triggerEvent('finishCoreBoot');