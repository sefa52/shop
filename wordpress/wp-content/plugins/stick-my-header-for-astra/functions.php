<?php

// Exit if this file was accessed directly, exit
if (!defined('ABSPATH'))
    exit;

//----------------------------------------------------------------------------------------------------
//-----------------------------------  ADMIN INTERFACE FUNCTIONS  ------------------------------------
//----------------------------------------------------------------------------------------------------   


function stickmyheader_sticky_header()
{

    wp_enqueue_script(
        'stick_header',
        STICKMYHEADER_STICK_HEADER_PATH,
        array('jquery'),
        time(),
        array(
            'strategy' => 'defer',
        )
    );

    wp_localize_script(
        'stick_header',
        'sh_obj',
        array(
            'reading_mode' => get_theme_mod('reading_focus_mode_settings', false) ? 'yes' : 'no',
            'timeout' => floatval(str_replace(',', '.', get_theme_mod('reading_focus_mode_timeout_settings', 3))),
            'sticky_mobile' => get_theme_mod('sticky_onmobile_checkbox_settings', false) ? 'yes' : 'no',
        )
    );

}

function stickmyheader_sticky_Header_plugin()
{

    if (stickmyheader_user_is_admin()) {

        add_menu_page(
            'Sticky Header Plugin Options',
            'Stick My Header for Astra',
            'manage_options',
            'webtips-stick-my-header-astra',
            'stickmyheader_sticky_Header_plugin_options',
            STICKMYHEADER_SVG_PLUGIN_ICON
        );

    }
}

function stickmyheader_sticky_Header_plugin_options()
{

    include(STICKMYHEADER_ADMIN_VIEW_PATH);
}

function ash_enqueue_js_Ajax($hook)
{

    if ('toplevel_page_webtips-stick-my-header-astra' !== $hook) {
        return;
    }

    if (stickmyheader_user_is_admin()) {

        wp_enqueue_script(
            'ash-ajax-script',
            STICKMYHEADER_MYJQUERY_FILE_PATH,
            array('jquery'),
            '1.0.0',
            array(
                'strategy' => 'defer',
            )
        );

        wp_localize_script(
            'ash-ajax-script',
            'ash_ajax_obj',
            array(
                'stickmyheader_section_customizer_url' => STICKMYHEADER_SECTION_CUSTOMIZER_URL,
            )
        );

    }

}

function stickmyheader_user_is_admin()
{

    $current_user = wp_get_current_user();

    if ($current_user->has_cap('administrator')) {
        return TRUE;
    } else {
        return FALSE;
    }
}

function stickmyheader_enqueue_css($hook)
{

    if ('toplevel_page_webtips-stick-my-header-astra' !== $hook) {
        return;
    }

    if (stickmyheader_user_is_admin()) {
        wp_enqueue_style('adminview', STICKMYHEADER_ADMIN_VIEW_CSS_PATH, array(), '1.0.0');
    }

}

function stickmyheader_display_banner()
{

    include(STICKMYHEADER_BANNER_PATH);

}

function stickmyheader_enqueue_banner_css($hook)
{

    wp_enqueue_style('adminview', STICKMYHEADER_BANNER_CSS_PATH, array(), '1.0.0');

}

function stickmyheader_define_actions_filters()
{

    add_action('admin_menu', 'stickmyheader_sticky_Header_plugin', );

    add_action('admin_enqueue_scripts', 'ash_enqueue_js_Ajax');

    add_action('admin_enqueue_scripts', 'stickmyheader_enqueue_css');

    add_action('wp_footer', 'stickmyheader_sticky_header', 1);

    add_action('admin_notices', 'stickmyheader_display_banner');

    add_action('customize_register', 'stickmyheader_customize_register');

    add_action('admin_enqueue_scripts', 'stickmyheader_enqueue_banner_css');

    add_action('wp_enqueue_scripts', 'stickmyheader_add_css_inline');

    add_action('customize_preview_init', 'stickmyheader_customizer_live_preview_css');

    add_action('customize_preview_init', 'stickmyheader_customizer_live_preview_js');
}


//----------------------------------------------------------------------------------------------------
//-------------------------------------  TEXT DOMAIN FUNCTIONS  --------------------------------------
//----------------------------------------------------------------------------------------------------   

//This section's has been deleted (WP team asked for it)


//----------------------------------------------------------------------------------------------------
//-------------------------------------  CUSTOMIZER FUNCTIONS  ---------------------------------------
//----------------------------------------------------------------------------------------------------


function stickmyheader_convert_hex_to_rgba($hex, $opacity)
{
    list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");

    $rgba_color = 'rgb(' . $r . ',' . $g . ',' . $b . ',' . $opacity . ')';

    return $rgba_color;
}

function stickmyheader_themeslug_sanitize_checkbox($checked)
{
    // Boolean check.
    return ((isset($checked) && true == $checked) ? true : false);
}

function stickmyheader_sanitize_color_opacity($number, $attrs)
{
    $min = $attrs['min'];
    $max = $attrs['max'];
    $step = $attrs['step'];

    $number = floor($number / $attrs['step']) * $attrs['step'];

    return ($min <= $number && $number <= $max) ? $number : $setting->default;
}

function stickmyheader_is_numeric_number($number, $setting)
{
    $numb = is_numeric($number);
    return ($numb == true) ? $number : $setting->default;
}

function stickmyheader_sanitize_float($number)
{
    $number = str_replace(',', '.', $number);
    return is_numeric($number) ? floatval($number) : 3; // Default to 3 if invalid
}

/**
 * Add inline header styling using the plugin
 */
function stickmyheader_add_css_inline()
{
    wp_enqueue_style(
        'custom-style',
        STICKMYHEADER_CUSTOMIZER_VIEW_CSS_PATH,
        array(),
        '1.1'
    );

    wp_add_inline_style('custom-style', stickmyheader_css_customizer());
}

function stickmyheader_css_customizer()
{

    $color = esc_html(stickmyheader_convert_hex_to_rgba(get_option('header_background_color_settings', '#00'), get_option('header_opacity_settings', 1)));  /* stickmyheader_convert_hex_to_rgba converts "the header background color + opacity" from HEXA to RGB-A format  */
    $zindex = esc_html(get_option('header_ZIndex_settings', 1)); /* 1 is the default value of Z-index */
    $border_bottom = "solid " . esc_html(get_option('header_border_bottom_size_settings', '#')) . "px " . esc_html(get_option('header_border_bottom_color_settings', '#00')); /* # is the default value of border bottom */
    $box_shadow = "0px " . esc_html(get_option('header_box_shadow_Y_length_settings', 0)) . "px " . esc_html(get_option('header_box_shadow_blur_settings', 0)) . "px " . esc_html(stickmyheader_convert_hex_to_rgba(get_option('header_box_shadow_color_settings', '#000000'), get_option('header_box_shadow_opacity_settings', 0.1)));
    $background_color_sticky = esc_html(stickmyheader_convert_hex_to_rgba(get_option('sticky_header_background_color_settings', '#00'), get_option('sticky_header_background_opacity_settings', 1))); /* stickmyheader_convert_hex_to_rgba converts "the header background color + opacity" from HEXA to RGB-A format  */
    $zindex_sticky = esc_html(get_option('sticky_header_ZIndex_settings', 1)); /* 1 is the default value of Z-index */
    $border_bottom_sticky = "solid " . esc_html(get_option('sticky_header_border_bottom_size_settings', '#')) . "px " . esc_html(get_option('sticky_header_border_bottom_color_settings', '#00')); /* # is the default value of border bottom */
    $box_shadow_sticky = "0px " . esc_html(get_option('sticky_header_box_shadow_Y_length_settings', 0)) . "px " . esc_html(get_option('sticky_header_box_shadow_blur_settings', 0)) . "px " . esc_html(stickmyheader_convert_hex_to_rgba(get_option('sticky_header_box_shadow_color_settings', '#000000'), get_option('sticky_header_box_shadow_opacity_settings', 0.1)));
    $bg_color_main_menu = esc_html(get_option('sticky_main_nav_menu_background_color_settings', '#00'));
    $link_color_main_menu = esc_html(get_option('sticky_main_nav_menu_normal_links_color_settings', '#00'));
    $link_color_hover_main_menu = esc_html(get_option('sticky_main_nav_menu_hover_links_color_settings', '#00'));
    $link_color_active_main_menu = esc_html(get_option('sticky_main_nav_menu_active_links_color_settings', '#00'));
    $bg_color_sub_main_menu = esc_html(get_option('sticky_sub_nav_menu_background_color_settings', '#00'));
    $link_color_sub_main_menu = esc_html(get_option('sticky_sub_nav_menu_normal_links_color_settings', '#00'));
    $link_color_hover_sub_main_menu = esc_html(get_option('sticky_sub_nav_menu_hover_links_color_settings', '#00'));
    $bg_color_secondary_menu = esc_html(get_option('sticky_secondary_nav_menu_background_color_settings', '#00'));
    $link_color_secondary_menu = esc_html(get_option('sticky_secondary_nav_menu_normal_links_color_settings', '#00'));
    $link_color_hover_secondary_menu = esc_html(get_option('sticky_secondary_nav_menu_hover_links_color_settings', '#00'));
    $bg_color_sticky_header_mobile_screen = esc_html(stickmyheader_convert_hex_to_rgba(get_option('sticky_onmobile_header_background_color_settings', '#00'), get_option('sticky_onmobile_header_background_opacity_settings', 1))); /* stickmyheader_convert_hex_to_rgba converts "the header background color + opacity" from HEXA to RGB-A format  */
    $border_bottom_sticky_header_mobile_screen = "solid " . esc_html(get_option('sticky_onmobile_header_border_bottom_size_settings', '#')) . "px " . esc_html(get_option('sticky_onmobile_header_border_bottom_color_settings', '#00')); /* # is the default value of border bottom */
    $box_shadow_sticky_header_mobile_screen = "0px " . esc_html(get_option('sticky_onmobile_header_box_shadow_Y_length_settings', 0)) . "px " . esc_html(get_option('sticky_onmobile_header_box_shadow_blur_settings', 0)) . "px " . esc_html(stickmyheader_convert_hex_to_rgba(get_option('sticky_onmobile_header_box_shadow_color_settings', '#000000'), get_option('sticky_onmobile_header_box_shadow_opacity_settings', 0.1)));

    $custom_css = "
            @media (min-width: 921px) {
                /*Simple Mode*/
                    #ast-desktop-header {                    
                        background-color: {$color};
                        z-index: {$zindex};
                        border-bottom: {$border_bottom};
                        box-shadow: {$box_shadow};
                    }
                        
                /*Sticky Mode*/
                    #ast-desktop-header.sticky { 
                        position: fixed;
                        width: 100%;
                        background-color:{$background_color_sticky};
                        z-index: {$zindex_sticky};
                        border-bottom: {$border_bottom_sticky};
                        box-shadow: {$box_shadow_sticky};
                        transition: transform 0.3s ease, opacity 0.3s ease;
                    }  

                    #ast-desktop-header.sticky.hidden-idle {
                        transform: translateY(-100%) !important;
                        opacity: 0 !important;
                        pointer-events: none !important;
                    }
                /* Main Nav Menu Background Color (sticky) */
                    #ast-desktop-header.sticky .ast-builder-menu-1 .main-header-menu { 
                        background-color: {$bg_color_main_menu};
                    }  
                    
                /* Main Nav Menu NORMAL Link Color (sticky) */            
                    #ast-desktop-header.sticky #ast-hf-menu-1.main-header-menu > .menu-item > .menu-link { 
                        color: {$link_color_main_menu};
                    }    
                    
                /* Main Nav Menu HOVER Link Color (sticky) */            
                    #ast-desktop-header.sticky #ast-hf-menu-1.main-header-menu > .menu-item > .menu-link:hover { 
                        color: {$link_color_hover_main_menu};
                    }

                /* Main Nav Menu ACTIVE Link Color (sticky) */
                    #ast-desktop-header.sticky #ast-hf-menu-1.main-header-menu > .menu-item.current-menu-item > .menu-link { 
                        color: {$link_color_active_main_menu};
                    }    

                /* Sub Nav Menu NORMAL Link Color + background color (sticky) */            
                    #ast-desktop-header.sticky .submenu-with-border .sub-menu>.menu-item>.menu-link {  
                        background-color: {$bg_color_sub_main_menu};
                        color: {$link_color_sub_main_menu};
                    }  
                
                /* Sub Nav Menu HOVER Link Color (sticky) */            
                    #ast-desktop-header.sticky .submenu-with-border .sub-menu>.menu-item>.menu-link:hover {  
                        color: {$link_color_hover_sub_main_menu};
                    }
                    
                /* Secondary Nav Menu NORMAL Text + Background Color (sticky) */
                    #ast-desktop-header.sticky #ast-hf-menu-2 > .menu-item > .menu-link {
                        background-color: {$bg_color_secondary_menu};
                        color: {$link_color_secondary_menu};
                    }

                /* Secondary Nav Menu HOVER Text Color (sticky) */
                    #ast-desktop-header.sticky #ast-hf-menu-2 > .menu-item > .menu-link:hover { 
                        color: {$link_color_hover_secondary_menu};
                    }
            
            }

    ";

    $custom_css .= "
                    /*------------------------------TABLETTE/MOBILE SCREEN------------------------------*/

                    @media (max-width: 921px) {
                        #ast-mobile-header.sticky {
                            position: fixed;
                            top: 0;
                            width: 100%;
                            background-color: {$bg_color_sticky_header_mobile_screen};
                            border-bottom: {$border_bottom_sticky_header_mobile_screen};
                            box-shadow: {$box_shadow_sticky_header_mobile_screen};
                            transition: transform 0.3s ease, opacity 0.3s ease;
                        }

                        #ast-mobile-header.sticky.hidden-idle {
                            transform: translateY(-100%) !important;
                            opacity: 0 !important;
                            pointer-events: none !important;
                        }
                    }
    ";

    $custom_css .= esc_html(get_option('textarea_for_css_settings', ''));     /* Add Custom CSS TextArea field */

    return $custom_css;
}

function stickmyheader_customizer_live_preview_css()
{
    // Shared handle custom-style already handles this.
}

function stickmyheader_customizer_live_preview_js()
{
    wp_enqueue_script(
        'stickmyheader-customizer-preview',
        plugin_dir_url(__FILE__) . 'js/customizer-preview.js',
        array('customize-preview', 'jquery'), // depends on customize-preview
        time(),
        true
    );
}

?>