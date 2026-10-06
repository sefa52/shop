<?php
/**
 * Plugin Name: Stick My Header for Astra 
 * Description: It improves the Astra theme's efficiency, and visual appeal. With SH, your Header section becomes sticky when a user scrolls Up/Down on a page, and it edits the header section design settings like the background color, z-index, border bottom, blur, opacity, ...etc
 * Version: 1.2.1
 * Author: WebTips
 * Author URI: https://webtips.me/
 * Text Domain: stick-my-header-for-astra
 * Domain Path: /lang/
 * License: GPL2
 * 
 * Copyright (C) 2024 WebTips
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License, version 2, as
 * published by the Free Software Foundation.
 *
 * This program is distributed so it can be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 **/

// Exit if this file was accessed directly exit
if (!defined('ABSPATH'))
    exit;

//Define all CONSTANTS

define('STICKMYHEADER_PLUGIN_DIR', plugin_dir_path(__DIR__));
define('STICKMYHEADER_PLUGIN_ICON_PATH', plugins_url('img\sh-logo.svg', __FILE__));
define('STICKMYHEADER_BASE64_PLUGIN_ICON', base64_encode(wp_remote_retrieve_body(wp_remote_get(STICKMYHEADER_PLUGIN_ICON_PATH))));
define('STICKMYHEADER_SVG_PLUGIN_ICON', 'data:image/svg+xml;base64,' . STICKMYHEADER_BASE64_PLUGIN_ICON);
define('STICKMYHEADER_MYJQUERY_FILE_PATH', plugins_url('js/jscode.js', __FILE__));
define('STICKMYHEADER_STICK_HEADER_PATH', plugins_url('js/stick_header.js', __FILE__));

define('STICKMYHEADER_CUSTOMIZER_VIEW_CSS_PATH', plugin_dir_url(__FILE__) . '/css/dynamic-userview.css');
define('STICKMYHEADER_ADMIN_VIEW_CSS_PATH', plugins_url('css/adminview.css', __FILE__));
define('STICKMYHEADER_ADMIN_VIEW_PATH', plugin_dir_path(__FILE__) . '/view/admn-view.php');
define('STICKMYHEADER_BANNER_PATH', plugin_dir_path(__FILE__) . '/view/banner.php');
define('STICKMYHEADER_SCROLL_GIF_PATH', plugins_url('img/sticky-header.gif', __FILE__));
define('STICKMYHEADER_LOGO_PATH', plugins_url('img/astra-sticky-header-logo.jpg', __FILE__));
define('STICKMYHEADER_LOGO_GIF_PATH', plugins_url('img/astra-sticky-header-logo.gif', __FILE__));
define('STICKMYHEADER_WEBTIPS_LOGO_PATH', plugins_url('img/webtips-logo.png', __FILE__));
define('STICKMYHEADER_STARS_GIF_PATH', plugins_url('img/stars.gif', __FILE__));
define('STICKMYHEADER_SECTION_CUSTOMIZER_URL', admin_url('/customize.php?autofocus[section]=a_s_h_section'));
define('STICKMYHEADER_CUSTOMIZER_FILE_PATH', plugin_dir_path(__FILE__) . '/inc/customizer.php');
define('STICKMYHEADER_FUNCTIONS_PATH', plugin_dir_path(__FILE__) . '/functions.php');
define('STICKMYHEADER_BANNER_CSS_PATH', plugins_url('css/banner.css', __FILE__));
define('STICKMYHEADER_IMAGE_1_PATH', plugins_url('img/home-plugin-page.png', __FILE__));
define('STICKMYHEADER_IMAGE_2_PATH', plugins_url('img/sticky_header_section.png', __FILE__));
define('STICKMYHEADER_IMAGE_3_PATH', plugins_url('img/header_settings_part.png', __FILE__));
define('STICKMYHEADER_IMAGE_4_PATH', plugins_url('img/sticky_header_settings_part.png', __FILE__));
define('STICKMYHEADER_IMAGE_5_PATH', plugins_url('img/mobile_tablette_part.png', __FILE__));
define('STICKMYHEADER_IMAGE_6_PATH', plugins_url('img/change_header_bg_color.png', __FILE__));
define('STICKMYHEADER_IMAGE_7_PATH', plugins_url('img/change_sticky_header_bg_color.png', __FILE__));
define('STICKMYHEADER_IMAGE_8_PATH', plugins_url('img/change_header_zindex.png', __FILE__));
define('STICKMYHEADER_IMAGE_9_PATH', plugins_url('img/change_sticky_header_zindex.png', __FILE__));
define('STICKMYHEADER_IMAGE_10_PATH', plugins_url('img/add_sticky_header_shadow.png', __FILE__));
define('STICKMYHEADER_IMAGE_11_PATH', plugins_url('img/make_header_sticky_onmobile.png', __FILE__));
define('STICKMYHEADER_IMAGE_12_PATH', plugins_url('img/how_to_get_to_astra_customizer.png', __FILE__));
define('STICKMYHEADER_IMAGE_13_PATH', plugins_url('img/clickon_header_builder.png', __FILE__));
define('STICKMYHEADER_IMAGE_14_PATH', plugins_url('img/clickon_above_header.png', __FILE__));
define('STICKMYHEADER_IMAGE_15_PATH', plugins_url('img/clickon_design_above_header.png', __FILE__));
define('STICKMYHEADER_IMAGE_16_PATH', plugins_url('img/clickon_clear_above_header.png', __FILE__));
define('STICKMYHEADER_IMAGE_17_PATH', plugins_url('img/clickon_primary_header.png', __FILE__));
define('STICKMYHEADER_IMAGE_18_PATH', plugins_url('img/clickon_below_header.png', __FILE__));


global $stickmyheader_jal_db_version;
$stickmyheader_jal_db_version = '1.2.1';

//Include functions.php file
require STICKMYHEADER_FUNCTIONS_PATH;

//Include the customizer file
require STICKMYHEADER_CUSTOMIZER_FILE_PATH;

//Add actions and filters
stickmyheader_define_actions_filters();

?>