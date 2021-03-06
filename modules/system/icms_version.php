<?php
// $Id: icms_version.php 12455 2014-06-24 09:30:49Z sato-san $
//  ------------------------------------------------------------------------ //
//  ------------------------------------------------------------------------ //
//                XOOPS - PHP Content Management System                      //
//                    Copyright (c) 2000 XOOPS.org                           //
//                       <http://www.xoops.org/>                             //
//  ------------------------------------------------------------------------ //
//  This program is free software; you can redistribute it and/or modify     //
//  it under the terms of the GNU General Public License as published by     //
//  the Free Software Foundation; either version 2 of the License, or        //
//  (at your option) any later version.                                      //
//                                                                           //
//  You may not change or alter any portion of this comment or credits       //
//  of supporting developers from this source code or any supporting         //
//  source code which is considered copyrighted (c) material of the          //
//  original comment or credit authors.                                      //
//                                                                           //
//  This program is distributed in the hope that it will be useful,          //
//  but WITHOUT ANY WARRANTY; without even the implied warranty of           //
//  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the            //
//  GNU General Public License for more details.                             //
//                                                                           //
//  You should have received a copy of the GNU General Public License        //
//  along with this program; if not, write to the Free Software              //
//  Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307 USA //
//  ------------------------------------------------------------------------ //
// Author: Kazumi Ono (AKA onokazu)                                          //
// URL: http://www.myweb.ne.jp/, http://www.xoops.org/, http://jp.xoops.org/ //
// Project: The XOOPS Project                                                //
// ------------------------------------------------------------------------- //
/**
 * Config file of the System module
 *
 * This file holds the configuration information of this module
 *
 * @copyright	http://www.XOOPS.org/
 * @copyright	http://www.impresscms.org/ The ImpressCMS Project
 * @license		http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License (GPL)
 *
 * @package		core
 * @since		1.2
 */

/*  General Information  */
$modversion = array(
	'name'=> _MI_SYSTEM_NAME,
	'version'=> 2.0,
	'description'=> _MI_SYSTEM_DESC,
	'author'=> "",
	'credits'=> "The ImpressCMS Project",
	'help'=> "",
	'license'=> "GNU General Public License (GPL)",
	'official'=> true,
	'dirname'=> basename(__DIR__),
	'modname' => 'system',

/*  Images information */
	'iconsmall'=> "images/icon_small.png",
	'iconbig'=> "images/system_big.png",
	'image'=> "images/system_slogo.png", /* for backward compatibility */

/*  Development information */
	'status_version'=> "Alpha 7",
	'status'=> "Alpha",
	'date'=> "26 April 2018",
	'author_word'=> "",
	'warning'=>_CO_ICMS_WARNING_ALPHA,

/* Contributors */
	'developer_website_url' => "https://www.impresscms.org",
	'developer_website_name' => "ImpressCMS Core & Module developers",
	'developer_email' => "contact@impresscms.org" );

$modversion['people']['developers'][] = "[url=https://www.impresscms.org/userinfo.php?uid=168]marcan[/url] (Marc-Andr&eacute; Lanciault)";
$modversion['people']['developers'][] = "[url=https://www.impresscms.org/userinfo.php?uid=392]stranger[/url] (Sina Asghari)";
$modversion['people']['developers'][] = "[url=https://www.impresscms.org/userinfo.php?uid=106]TheRplima[/url]";
$modversion['people']['developers'][] = "[url=https://www.impresscms.org/userinfo.php?uid=69]vaughan[/url]";
$modversion['people']['developers'][] = "[url=https://www.impresscms.org/userinfo.php?uid=340]nekro[/url]";
$modversion['people']['developers'][] = "[url=https://www.impresscms.org/userinfo.php?uid=1168]phoenyx[/url]";
$modversion['people']['developers'][] = "[url=https://www.impresscms.org/userinfo.php?uid=1102]fiammybe[/url]";
$modversion['people']['developers'][] = "[url=https://www.impresscms.org/userinfo.php?uid=54]Skenow[/url]";
$modversion['people']['testers'][] = "[url=https://www.impresscms.org/userinfo.php?uid=53]davidl2[/url]";
$modversion['people']['testers'][] = "[url=https://www.impresscms.org/userinfo.php?uid=392]stranger[/url] (Sina Asghari)";
$modversion['people']['testers'][] = "[url=https://www.impresscms.org/userinfo.php?uid=10]sato-san[/url]";
$modversion['people']['testers'][] = "[url=https://www.impresscms.org/userinfo.php?uid=1102]fiammybe[/url]";
$modversion['people']['translators'][] = "";

$modversion['people']['documenters'][] = "[url=https://www.impresscms.org/userinfo.php?uid=372]UnderDog[/url]";
$modversion['people']['documenters'][] = "[url=https://www.impresscms.org/userinfo.php?uid=54]Skenow[/url]";

//$modversion['people']['other'][] = "";

// Autotasks
$modversion['autotasks'][] = array(
	'enabled' => true,
	'name' => _MI_SYSTEM_REMOVEUSERS,
	'code' => 'autotask.php',
	'interval' => 1440
);

/* Manual */
$modversion['manual']['wiki'][] = "<a href='https://www.impresscms.org/modules/simplywiki/index.php?page=System' target='_blank'>" . _MI_SYSTEM_NAME . "</a>";

/* Administrative information */
$modversion['hasAdmin'] = true;
$modversion['adminindex'] = "admin.php";
$modversion['adminmenu'] = "menu.php";

/* Database information */
/*  @todo once the conversion is completed, we can use this
$modversion['object_items'] = icms_core_Filesystem::getDirList(
	ICMS_MODULES_PATH . '/system/admin/',
	array('findusers', 'mailusers', 'preferences', 'version')
);
*/

/* This represents the objects that can be automatically updated via IPF */
$modversion['object_items'] = array(
	'adsense',
	'autotasks',
	'customtag',
	'mimetype',
	'pages',
	'rating',
	'blocks',
	'positions',
	'userrank'
);

/* This will be the list of database tables for the above objects */
$modversion['tables'] = icms_getTablesArray($modversion['dirname'], $modversion['object_items']);

/* Search information */
$modversion['hasSearch'] = false;

/* Menu information */
$modversion['hasMain'] = false;

/* Blocks information */
$modversion['blocks'][1] = array(
	'file' => 'system_blocks.php',
	'name' => _MI_SYSTEM_BNAME2,
	'description' => '',
	'show_func' => 'b_system_user_show',
	'edit_func' => 'b_system_user_edit',
	'options' => '0',
	'template' => 'system_block_user.html'
	);

$modversion['blocks'][] = array(
	'file' => 'system_blocks.php',
	'name' => _MI_SYSTEM_BNAME3,
	'description' => '',
	'show_func' => 'b_system_login_show',
	'template' => 'system_block_login.html'
	);

$modversion['blocks'][] = array(
	'file' => 'system_blocks.php',
	'name' => _MI_SYSTEM_BNAME4,
	'description' => '',
	'show_func' => 'b_system_search_show',
	'template' => 'system_block_search.html'
	);

$modversion['blocks'][] = array(
	'file' => 'system_waiting.php',
	'name' => _MI_SYSTEM_BNAME5,
	'description' => '',
	'show_func' => 'b_system_waiting_show',
	'edit_func' => 'b_system_waiting_edit',
	'options' => '1|5',
	'template' => 'system_block_waiting.html'
	);

$modversion['blocks'][] = array(
	'file' => 'system_blocks.php',
	'name' => _MI_SYSTEM_BNAME6,
	'description' => '',
	'show_func' => 'b_system_main_show',
	'template' => 'system_block_mainmenu.html'
	);

$modversion['blocks'][] = array(
	'file' => 'system_blocks.php',
	'name' => _MI_SYSTEM_BNAME7,
	'description' => '',
	'show_func' => 'b_system_info_show',
	'edit_func' => 'b_system_info_edit',
	'options' => '320|190|s_poweredby.gif|1',
	'template' => 'system_block_siteinfo.html'
	);

$modversion['blocks'][] = array(
	'file' => 'system_blocks.php',
	'name' => _MI_SYSTEM_BNAME8,
	'description' => '',
	'show_func' => 'b_system_online_show',
	'template' => 'system_block_online.html'
	);

$modversion['blocks'][] = array(
	'file' => 'system_blocks.php',
	'name' => _MI_SYSTEM_BNAME9,
	'description' => '',
	'show_func' => 'b_system_topposters_show',
	'edit_func' => 'b_system_topposters_edit',
	'options' => '10|1',
	'template' => 'system_block_topusers.html'
	);

$modversion['blocks'][] = array(
	'file' => 'system_blocks.php',
	'name' => _MI_SYSTEM_BNAME10,
	'description' => '',
	'show_func' => 'b_system_newmembers_show',
	'edit_func' => 'b_system_newmembers_edit',
	'options' => '10|1|1',
	'template' => 'system_block_newusers.html'
	);

$modversion['blocks'][] = array(
	'file' => 'system_blocks.php',
	'name' => _MI_SYSTEM_BNAME11,
	'description' => '',
	'show_func' => 'b_system_comments_show',
	'edit_func' => 'b_system_comments_edit',
	'options' => '10',
	'template' => 'system_block_comments.html'
	);

$modversion['blocks'][] = array(
	'file' => 'system_blocks.php',
	'name' => _MI_SYSTEM_BNAME12,
	'description' => '',
	'show_func' => 'b_system_notification_show',
	'template' => 'system_block_notification.html'
	);

$modversion['blocks'][] = array(
	'file' => 'system_blocks.php',
	'name' => _MI_SYSTEM_BNAME13,
	'description' => '',
	'show_func' => 'b_system_themes_show',
	'edit_func' => 'b_system_themes_edit',
	'options' => '0|80',
	'template' => 'system_block_themes.html'
	);

$modversion['blocks'][] = array(
	'file' => 'system_blocks.php',
	'name' => _MI_SYSTEM_BNAME14,
	'description' => '',
	'show_func' => 'b_system_multilanguage_show',
	'template' => 'system_block_multilanguage.html'
	);

$modversion['blocks'][] = array(
	'file' => 'system_blocks.php',
	'name' => _MI_SYSTEM_BNAME18,
	'description' => '',
	'show_func' => 'b_system_social_show',
	'edit_func' => 'b_system_social_edit',
	'options' => '1|1|1|1|0|0|0|0|0|0|0|0|0|1|0|0|0|0|1|0|1|0|0|1|0|0|0|0|0|0|0|0',
	'template' => 'system_block_socialbookmark.html'
	);

$modversion['blocks'][] = array(
	'file' => 'system_admin_blocks.php',
	'name' => _MI_SYSTEM_BNAME101,
	'description' => '',
	'show_func' => 'b_system_admin_warnings_show',
	'template' => 'system_admin_block_warnings.html'
	);

$modversion['blocks'][] = array(
	'file' => 'system_admin_blocks.php',
	'name' => _MI_SYSTEM_BNAME102,
	'description' => '',
	'show_func' => 'b_system_admin_cp_show',
	'template' => 'system_admin_block_cp.html'
	);

$modversion['blocks'][] = array(
	'file' => 'system_admin_blocks.php',
	'name' => _MI_SYSTEM_BNAME103,
	'description' => '',
	'show_func' => 'b_system_admin_modules_show',
	'template' => 'system_admin_block_modules.html'
	);

$modversion['blocks'][] = array(
	'file' => 'system_blocks.php',
	'name' => _MI_SYSTEM_BLOCK_BOOKMARKS,
	'description' => _MI_SYSTEM_BLOCK_BOOKMARKS_DESC,
	'show_func' => 'b_system_bookmarks_show',
	'template' => 'system_block_bookmarks.html'
	);

$modversion['blocks'][] = array(
	'file' => 'system_admin_blocks.php',
	'name' => _MI_SYSTEM_BLOCK_CP_NEW,
	'description' => '',
	'show_func' => 'b_system_admin_cp_new_show',
	'template' => 'system_admin_block_cp_new.html'
	);

/* Templates information */
$modversion['templates'][1] = array(
	'file' => 'system_imagemanager.html',
	'description' => '');

$modversion['templates'][] = array(
	'file' => 'system_imagemanager2.html',
	'description' => ''
	);

$modversion['templates'][] = array(
	'file' => 'system_userinfo.html',
	'description' => ''
	);

$modversion['templates'][] = array(
	'file' => 'system_userform.html',
	'description' => ''
	);

$modversion['templates'][] = array(
	'file' => 'system_comment.html',
	'description' => ''
	);

$modversion['templates'][] = array(
	'file' => 'system_comments_flat.html',
	'description' => ''
	);

$modversion['templates'][] = array(
	'file' => 'system_comments_thread.html',
	'description' => ''
	);

$modversion['templates'][] = array(
	'file' => 'system_comments_nest.html',
	'description' => ''
	);

$modversion['templates'][] = array(
	'file' => 'system_siteclosed.html',
	'description' => ''
	);

$modversion['templates'][] = array(
	'file' => 'system_redirect.html',
	'description' => ''
	);

$modversion['templates'][] = array(
	'file' => 'system_dummy.html',
	'description' => ''
	);

$modversion['templates'][] = array(
	'file' => 'system_notification_list.html',
	'description' => ''
	);

$modversion['templates'][] = array(
	'file' => 'system_notification_select.html',
	'description' => ''
	);

$modversion['templates'][] = array(
	'file' => 'system_block_dummy.html',
	'description' => ''
	);

$modversion['templates'][] = array(
	'file' => 'system_privpolicy.html',
	'description' => ''
	);

$modversion['templates'][] = array(
	'file' => 'system_error.html',
	'description' => ''
	);

$modversion['templates'][] = array(
	'file' => 'system_openid.html',
	'description' => ''
	);

$modversion['templates'][] = array(
	'file' => 'admin/positions/system_adm_positions.html',
	'description' => ''
	);

$modversion['templates'][] = array(
	'file' => 'admin/pages/system_adm_pagemanager_index.html',
	'description' => ''
	);

$modversion['templates'][] = array(
	'file' => 'admin/blocks/system_adm_blocks.html',
	'description' => ''
	);

$modversion['templates'][] = array(
	'file' => 'admin/modules/system_adm_modules.html',
	'description' => ''
	);

$modversion['templates'][] = array(
	'file' => 'system_common_form.html',
	'description' => ''
	);

$modversion['templates'][] = array(
	'file' => 'system_persistabletable_display.html',
	'description' => ''
	);

$modversion['templates'][] = array(
	'file' => 'admin/customtag/system_adm_customtag.html',
	'description' => ''
	);

$modversion['templates'][] = array(
	'file' => 'system_default_form.html',
	'description' => ''
	);

$modversion['templates'][] = array(
	'file' => 'admin/images/system_adm_imagemanager.html',
	'description' => ''
	);

$modversion['templates'][] = array(
	'file' => 'admin/images/system_adm_imagemanager_imglist.html',
	'description' => ''
	);

$modversion['templates'][] = array(
	'file' => 'admin/images/system_adm_imagemanager_img.html',
	'description' => ''
	);

$modversion['templates'][] = array(
	'file' => 'admin/images/system_adm_imagemanager_editimg.html',
	'description' => ''
	);

$modversion['templates'][] = array(
	'file' => 'admin/images/system_adm_imagemanager_cloneimg.html',
	'description' => ''
	);

$modversion['templates'][] = array(
	'file' => 'admin/system_adm_rss.html',
	'description' => ''
	);

$modversion['templates'][] = array(
	'file' => 'system_search.html',
	'description' => ''
	);

$modversion['templates'][] = array(
	'file' => 'system_persistable_singleview.html',
	'description' => ''
	);

$modversion['templates'][] = array(
	'file' => 'system_breadcrumb.html',
	'description' => ''
	);

$modversion['templates'][] = array(
	'file' => 'admin/adsense/system_adm_adsense.html',
	'description' => ''
	);

$modversion['templates'][] = array(
	'file' => 'system_print.html',
	'description' => ''
	);

$modversion['templates'][] = array(
	'file' => 'admin/rating/system_adm_rating.html',
	'description' => ''
	);

$modversion['templates'][] = array(
	'file' => 'system_rating_form.html',
	'description' => ''
	);

$modversion['templates'][] = array(
	'file' => 'admin/mimetype/system_adm_mimetype.html',
	'description' => ''
	);

$modversion['templates'][] = array(
	'file' => 'admin/userrank/system_adm_userrank.html',
	'description' => ''
	);

$modversion['templates'][] = array(
	'file' => 'admin/autotasks/system_adm_autotasks.html',
	'description' => ''
	);

$modversion['templates'][] = array(
		'file' => 'system_readmsg.html',
		'description' => ''
);

$modversion['templates'][] = array(
		'file' => 'system_viewmsgs.html',
		'description' => ''
);

$modversion['templates'][] = array(
		'file' => 'admin/groups/system_adm_groups.html',
		'description' => ''
);

$modversion['templates'][] = array(
		'file' => 'admin/comments/system_adm_comments.html',
		'description' => ''
);

$modversion['templates'][] = array(
		'file' => 'admin/system_adm_version.html',
		'description' => ''
);

$modversion['templates'][] = array(
		'file' => 'admin/smilies/system_adm_smilies.html',
		'description' => ''
);

$modversion['templates'][] = array(
		'file' => 'admin/avatars/system_adm_avatars.html',
		'description' => ''
);

$modversion['templates'][] = array(
		'file' => 'admin/findusers/system_adm_findusers.html',
		'description' => ''
);

$modversion['templates'][] = array(
		'file' => 'admin/system_adm_modulemenu.html',
		'description' => ''
);

$modversion['templates'][] = array(
		'file' => 'admin/system_adm_moduleabout.html',
		'description' => ''
);

$modversion['templates'][] = array(
		'file' => 'system_blank.html',
		'description' => ''
);
