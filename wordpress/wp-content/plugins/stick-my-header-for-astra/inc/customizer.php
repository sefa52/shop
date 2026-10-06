<?php


function stickmyheader_customize_register( $wp_customize ) 
{

    $wp_customize->add_section( 'a_s_h_section' , array(
        'title'    => __( 'Sticky Header', 'stick-my-header-for-astra' ),
        'priority' => 30
    ) );

    if ( class_exists( 'WP_Customize_Control' ) ) {
        
        class StickMyHeader_My_Custom_Title_Control extends WP_Customize_Control {
            public $type = 'custom_title';
            public $description = '';
            public $tag ='';
            public $background_color ='white';
            public $color = '#1d2327';

            public function render_content() {
                if (! empty( $this->tag )) {
                    if ($this->tag == 'h2') {   
                        ?><div style= 'background-color:<?php echo esc_html( $this->background_color ); ?>;height: 59px;margin-left: -25px;padding-left: 25px;padding-top: 3px;width: 270px;'; >
                        <h2 style='color:<?php echo esc_html( $this->color ); ?>;'><?php echo esc_html( $this->label ); ?></h2></div>
                        <?php if ( ! empty( $this->description ) ) : ?>
                            <p><?php echo esc_html( $this->description ); ?></p>
                        <?php endif; 
                    }else {
                        ?>
                        <h3><?php echo esc_html( $this->label ); ?></h3>
                        <?php if ( ! empty( $this->description ) ) : ?>
                            <p><?php echo esc_html( $this->description ); ?></p>
                        <?php endif; ?>
                        <?php
                    }
                }
            }
        }
    }
    

    //----------------------------------------------------------------------------------------------------
    //------------------------------------  HEADER SETTINGS/CONTROLS  ------------------------------------
    //----------------------------------------------------------------------------------------------------    


    $wp_customize->add_setting( 'header_settings_title_setting');

    $wp_customize->add_control( new StickMyHeader_My_Custom_Title_Control( $wp_customize, 'header_settings_title_control', array(
        'label'       => __( 'HEADER SETTINGS' , 'stick-my-header-for-astra' ),
        'description' => __( 'Here, you can edit your website\'s header settings like the background, border bottom and shadow, any editing of these parameters have to be done when the Header is not sticky (in the top page).', 'stick-my-header-for-astra' ),
        'tag'         => __('h2', 'stick-my-header-for-astra'), 
        'section'     => 'a_s_h_section',
        'settings'    => 'header_settings_title_setting',
    )));

    $wp_customize->add_setting( 'header_background_color_settings' , array(
        'type' => 'option',
        'capability' => 'manage_options',
        'default' => '#00',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'refresh',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_background_color_control', array(
        'label'    => __( 'Background Color', 'stick-my-header-for-astra' ),
        'description' => __( 'Header Background Color. Default value : none', 'stick-my-header-for-astra' ), // Tooltip
        'section'  => 'a_s_h_section',
        'settings' => 'header_background_color_settings',
    ) ) );

    $input_attrs = array(
        'min'  => 0,
        'max'  => 1.000,
        'step' => 0.001,
    );

    $wp_customize->add_setting('header_opacity_settings', array(
        'type'              => 'option',
        'capability'        => 'manage_options',
        'default'           => 1,
        'sanitize_callback' => function($number) use ($input_attrs) {
            return stickmyheader_sanitize_color_opacity($number, $input_attrs);
        },
        'transport' => 'refresh',
    ));

    $wp_customize->add_control( 'header_opacity_control', array(
        'type'     => 'number',
        'label'    => __( 'Background Opacity', 'stick-my-header-for-astra' ),
        'description' => __( 'Header Background Opacity. Default value : 1. You can edit it from 0 to 1 only', 'stick-my-header-for-astra' ), // Tooltip 
        'section'  => 'a_s_h_section',
        'settings' => 'header_opacity_settings',
        'input_attrs' => $input_attrs
    ) );

    $wp_customize->add_setting( 'header_ZIndex_settings' , array(
        'type' => 'option',
        'capability' => 'manage_options',
        'default' => 1,
        'sanitize_callback' => 'absint',
        'transport' => 'refresh', 
    ) );

    $wp_customize->add_control( 'header_ZIndex_control', array(
        'type'     => 'number',
        'label'    => __( 'Z-index', 'stick-my-header-for-astra' ),
        'description' => __( 'Header Z-Index. Default value : 1. If your header is not visible, set this to 1000 minimum', 'stick-my-header-for-astra' ), // Tooltip
        'section'  => 'a_s_h_section',
        'settings' => 'header_ZIndex_settings',
        'input_attrs' => array( //for security reasons, Z-index is limited between 1 to 10000
            'min' => 1,
            'max' => 10000
        )
    ) );

    $wp_customize->add_setting( 'header_border_bottom_size_settings' , array(
        'type' => 'option',
        'capability' => 'manage_options',
        'default' => '#',
        'sanitize_callback' => 'stickmyheader_is_numeric_number',
        'transport' => 'refresh',
    ) );

    $wp_customize->add_control( 'header_border_bottom_size_control', array(
        'type'     => 'number',
        'label'    => __( 'Border Bottom Size (px)', 'stick-my-header-for-astra' ),
        'description' => __( 'Header Border Bottom Size. Default value : unset.', 'stick-my-header-for-astra' ), // Tooltip
        'section'  => 'a_s_h_section',
        'settings' => 'header_border_bottom_size_settings',
    ) );
    
    $wp_customize->add_setting( 'header_border_bottom_color_settings' , array(
        'type' => 'option',
        'capability' => 'manage_options',
        'default' => '#00',
        'sanitize_callback' => 'sanitize_hex_color', 
        'transport' => 'refresh',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_border_bottom_color_control', array(
        'label'    => __( 'Border Bottom Color', 'stick-my-header-for-astra' ),
        'description' => __( 'Header Border Bottom Color. Default value : unset.', 'stick-my-header-for-astra' ), // Tooltip
        'section'  => 'a_s_h_section',
        'settings' => 'header_border_bottom_color_settings',
    ) ) );

    $wp_customize->add_setting( 'header_shadow_title_setting');

    $wp_customize->add_control( new StickMyHeader_My_Custom_Title_Control( $wp_customize, 'header_shadow_title_control', array(
        'label'       => __( 'HEADER SHADOW', 'stick-my-header-for-astra' ),
        'description' => __( 'Here, you can edit your website\'s header shadow settings when it is not sticky (in the top page).', 'stick-my-header-for-astra' ),
        'tag'         => __('h3', 'stick-my-header-for-astra'), 
        'section'     => 'a_s_h_section',
        'settings'    => 'header_shadow_title_setting',
    )));

    $wp_customize->add_setting( 'header_box_shadow_Y_length_settings' , array(
        'type' => 'option',
        'capability' => 'manage_options',
        'default' => 0,
        'sanitize_callback' => 'stickmyheader_is_numeric_number',
        'transport' => 'refresh',
    ) );

    $wp_customize->add_control( 'header_box_shadow_Y_length_control', array(
        'type'     => 'number',
        'label'    => __( 'Vertical Alignment (px)', 'stick-my-header-for-astra' ),
        'description' => __( 'Header Shadow appearance from bottom. Default value : 0. As soon as you increase this value, you see it displaying.', 'stick-my-header-for-astra' ), // Tooltip
        'section'  => 'a_s_h_section',
        'settings' => 'header_box_shadow_Y_length_settings',
    ) );

    $wp_customize->add_setting( 'header_box_shadow_blur_settings' , array(
        'type' => 'option',
        'capability' => 'manage_options',
        'default' => 0,
        'sanitize_callback' => 'absint',
        'transport' => 'refresh',
    ) );

    $wp_customize->add_control( 'header_box_shadow_blur_control', array(
        'type'     => 'number',
        'label'    => __( 'Blur (px)', 'stick-my-header-for-astra' ),
        'description' => __( 'Header Shadow Blur. Default value : 0.', 'stick-my-header-for-astra' ), // Tooltip
        'section'  => 'a_s_h_section',
        'settings' => 'header_box_shadow_blur_settings',
    ) );

    $wp_customize->add_setting( 'header_box_shadow_color_settings' , array(
        'type' => 'option',
        'capability' => 'manage_options',
        'default' => '#000000',                      //default color is Black 
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'refresh',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_box_shadow_color_control', array(
        'label'    => __( 'Color', 'stick-my-header-for-astra' ),
        'description' => __( 'Header Shadow Color. Default value : black.', 'stick-my-header-for-astra' ), // Tooltip
        'section'  => 'a_s_h_section',
        'settings' => 'header_box_shadow_color_settings',
    ) ) );

    $wp_customize->add_setting('header_box_shadow_opacity_settings', array(
        'type'              => 'option',
        'capability'        => 'manage_options',
        'default'           => 0.1,
        'sanitize_callback' => function($number) use ($input_attrs) {
            return stickmyheader_sanitize_color_opacity($number, $input_attrs);
        },
        'transport' => 'refresh',
    ));

    $wp_customize->add_control( 'header_box_shadow_opacity_control', array(
        'type'     => 'number',
        'label'    => __( 'Opacity', 'stick-my-header-for-astra' ),
        'description' => __( 'Header Shadow Opacity. Default value : 0.1, recommended.', 'stick-my-header-for-astra' ), // Tooltip
        'section'  => 'a_s_h_section',
        'settings' => 'header_box_shadow_opacity_settings',
        'input_attrs' => $input_attrs
    ) );


    //----------------------------------------------------------------------------------------------------
    //------------------------------------  STICKY HEADER SETTINGS/CONTROLS  -----------------------------
    //----------------------------------------------------------------------------------------------------


    $wp_customize->add_setting( 'sticky_header_settings_title_setting');

    $wp_customize->add_control( new StickMyHeader_My_Custom_Title_Control( $wp_customize, 'sticky_header_settings_title_control', array(
        'label'       => __( 'STICKY HEADER SETTINGS', 'stick-my-header-for-astra' ),
        'description' => __( 'Here, you can make your header sticky. To be able to see the editings, you should scroll your page a bit down.', 'stick-my-header-for-astra' ),
        'tag'         => __('h2', 'stick-my-header-for-astra'),
        'section'     => 'a_s_h_section',
        'settings'    => 'sticky_header_settings_title_setting',
    )));


    $wp_customize->add_setting( 'sticky_header_background_color_settings' , array(
        'type' => 'option',
        'capability' => 'manage_options',
        'default' => '#00',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'refresh',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'sticky_header_background_color_control', array(
        'label'    => __( 'Background Color', 'stick-my-header-for-astra' ),
        'description' => __( 'Sticky Header Background Color. Default value : unset.', 'stick-my-header-for-astra' ),
        'section'  => 'a_s_h_section',
        'settings' => 'sticky_header_background_color_settings',
    ) ) );

    $wp_customize->add_setting('sticky_header_background_opacity_settings', array(
        'type'              => 'option',
        'capability'        => 'manage_options',
        'default'           => 1,
        'sanitize_callback' => function($number) use ($input_attrs) {
            return stickmyheader_sanitize_color_opacity($number, $input_attrs);
        },
        'transport' => 'refresh',
    ));

    $wp_customize->add_control( 'sticky_header_background_opacity_control', array(
        'type'     => 'number',
        'label'    => __( 'Background Opacity', 'stick-my-header-for-astra' ),
        'description' => __( 'Sticky Header Background Opacity. Default value : 1. You can edit it from 0 to 1 only.', 'stick-my-header-for-astra' ),
        'section'  => 'a_s_h_section',
        'settings' => 'sticky_header_background_opacity_settings',
        'input_attrs' => $input_attrs
    ) );

    $wp_customize->add_setting( 'sticky_header_ZIndex_settings' , array(
        'type' => 'option',
        'capability' => 'manage_options',
        'default' => 1,
        'sanitize_callback' => 'absint', 
        'transport' => 'refresh',
    ) );

    $wp_customize->add_control( 'sticky_header_ZIndex_control', array(
        'type'     => 'number',
        'label'    => __( 'Z-index', 'stick-my-header-for-astra' ),
        'description' => __( 'Sticky Header Z-Index. Default value : 1. If your header is not visible, set this to 1000 minimum.', 'stick-my-header-for-astra' ),
        'section'  => 'a_s_h_section',
        'settings' => 'sticky_header_ZIndex_settings',
        'input_attrs' => array( //for security reasons, Z-index is limited between 1 to 10000
            'min' => 1,
            'max' => 10000
        )
    ) );


    $wp_customize->add_setting( 'sticky_header_border_bottom_size_settings' , array(
        'type' => 'option',
        'capability' => 'manage_options',
        'default' => '#',
        'sanitize_callback' => 'stickmyheader_is_numeric_number',
        'transport' => 'refresh',
    ) );

    $wp_customize->add_control( 'sticky_header_border_bottom_size_control', array(
        'type'     => 'number',
        'label'    => __( 'Border Bottom Size (px)', 'stick-my-header-for-astra' ),
        'description' => __( 'Sticky Header Border Bottom Size. Default value : unset.', 'stick-my-header-for-astra' ),
        'section'  => 'a_s_h_section',
        'settings' => 'sticky_header_border_bottom_size_settings',
    ) );

    $wp_customize->add_setting( 'sticky_header_border_bottom_color_settings' , array(
        'type' => 'option',
        'capability' => 'manage_options',
        'default' => '#00',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'refresh',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'sticky_header_border_bottom_color_control', array(
        'label'    => __( 'Border Bottom Color', 'stick-my-header-for-astra' ),
        'description' => __( 'Sticky Header Border Bottom Color. Default value : unset.', 'stick-my-header-for-astra' ),
        'section'  => 'a_s_h_section',
        'settings' => 'sticky_header_border_bottom_color_settings',
    ) ) );

    $wp_customize->add_setting( 'sticky_header_shadow_title_setting');

    $wp_customize->add_control( new StickMyHeader_My_Custom_Title_Control( $wp_customize, 'sticky_header_shadow_title_control', array(
        'label'       => __( 'SHADOW', 'stick-my-header-for-astra' ),
        'description' => __( 'In this subsection, you can edit your sticky header shadow settings. To be able to see the editings, scroll down your page a bit, then start editing.', 'stick-my-header-for-astra' ),
        'tag'         => __('h3', 'stick-my-header-for-astra'), 
        'section'     => 'a_s_h_section',
        'settings'    => 'sticky_header_shadow_title_setting',
    )));

    $wp_customize->add_setting( 'sticky_header_box_shadow_Y_length_settings' , array(
        'type' => 'option',
        'capability' => 'manage_options',
        'default' => 0,
        'sanitize_callback' => 'stickmyheader_is_numeric_number',
        'transport' => 'refresh',
    ) );

    $wp_customize->add_control( 'sticky_header_box_shadow_Y_length_control', array(
        'type'     => 'number',
        'label'    => __( 'Vertical Alignment (px)', 'stick-my-header-for-astra' ),
        'description' => __( 'Sticky Header Shadow Appearance. Default value : 0. Once you start increasing it, you will see it in your header bottom', 'stick-my-header-for-astra' ),
        'section'  => 'a_s_h_section',
        'settings' => 'sticky_header_box_shadow_Y_length_settings',
    ) );

    $wp_customize->add_setting( 'sticky_header_box_shadow_blur_settings' , array(
        'type' => 'option',
        'capability' => 'manage_options',
        'default' => 0,
        'sanitize_callback' => 'absint',
        'transport' => 'refresh',
    ) );

    $wp_customize->add_control( 'sticky_header_box_shadow_blur_control', array(
        'type'     => 'number',
        'label'    => __( 'Blur (px)', 'stick-my-header-for-astra' ),
        'description' => __( 'Sticky Header Shadow Blur. Default value : 0.', 'stick-my-header-for-astra' ),
        'section'  => 'a_s_h_section',
        'settings' => 'sticky_header_box_shadow_blur_settings',
    ) );

    $wp_customize->add_setting( 'sticky_header_box_shadow_color_settings' , array(
        'type' => 'option',
        'capability' => 'manage_options',
        'default' => '#000000',                      //default color is Black 
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'refresh',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'sticky_header_box_shadow_color_control', array(
        'label'    => __( 'Color', 'stick-my-header-for-astra' ),
        'description' => __( 'Sticky Header Shadow Color. Default value : black.', 'stick-my-header-for-astra' ),
        'section'  => 'a_s_h_section',
        'settings' => 'sticky_header_box_shadow_color_settings',
    ) ) );

    $wp_customize->add_setting('sticky_header_box_shadow_opacity_settings', array(
        'type'              => 'option',
        'capability'        => 'manage_options',
        'default'           => 0.1,
        'sanitize_callback' => function($number) use ($input_attrs) {
            return stickmyheader_sanitize_color_opacity($number, $input_attrs);
        },
        'transport' => 'refresh',
    ));

    $wp_customize->add_control( 'sticky_header_box_shadow_opacity_control', array(
        'type'     => 'number',
        'label'    => __( 'Opacity', 'stick-my-header-for-astra' ),
        'description' => __( 'Sticky Header Shadow Opacity. Default value : 0.1, recommended.', 'stick-my-header-for-astra' ),
        'section'  => 'a_s_h_section',
        'settings' => 'sticky_header_box_shadow_opacity_settings',
        'input_attrs' => $input_attrs
    ) );

    $wp_customize->add_setting( 'sticky_header_main_nav_menu_title_setting');

    $wp_customize->add_control( new StickMyHeader_My_Custom_Title_Control( $wp_customize, 'sticky_header_main_nav_menu_title_control', array(
        'label'       => __( 'PRIMARY MENU', 'stick-my-header-for-astra' ),
        'description' => __( 'In this subsection, you can edit your website\'s main navigation menu when your header is sticky (after scrolling a bit down).', 'stick-my-header-for-astra' ),
        'tag'         => __('h3', 'stick-my-header-for-astra'), 
        'section'     => 'a_s_h_section',
        'settings'    => 'sticky_header_main_nav_menu_title_setting',
    )));

    $wp_customize->add_setting( 'sticky_main_nav_menu_background_color_settings' , array(
        'type' => 'option',
        'capability' => 'manage_options',
        'default' => '#00',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'refresh',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'sticky_main_nav_menu_background_color_control', array(
        'label'    => __( 'Background Color', 'stick-my-header-for-astra' ),
        'description' => __( 'Sticky Header Main menu Background Color. Default value : unset.', 'stick-my-header-for-astra' ),
        'section'  => 'a_s_h_section',
        'settings' => 'sticky_main_nav_menu_background_color_settings',
    ) ) );

    $wp_customize->add_setting( 'sticky_main_nav_menu_normal_links_color_settings' , array(
        'type' => 'option',
        'capability' => 'manage_options',
        'default' => '#00',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'refresh',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'sticky_main_nav_menu_normal_links_color_control', array(
        'label'    => __( 'Links Color - Normal', 'stick-my-header-for-astra' ),
        'description' => __( 'Sticky Header Main menu Links Color in a normal state. Default value : unset.', 'stick-my-header-for-astra' ),
        'section'  => 'a_s_h_section',
        'settings' => 'sticky_main_nav_menu_normal_links_color_settings',
    ) ) );

    $wp_customize->add_setting( 'sticky_main_nav_menu_hover_links_color_settings' , array(
        'type' => 'option',
        'capability' => 'manage_options',
        'default' => '#00',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'refresh',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'sticky_main_nav_menu_hover_links_color_control', array(
        'label'    => __( 'Links Color - Hover', 'stick-my-header-for-astra' ),
        'description' => __( 'Sticky Header Main menu Links Color in a hover state. Default value : unset.', 'stick-my-header-for-astra' ),
        'section'  => 'a_s_h_section',
        'settings' => 'sticky_main_nav_menu_hover_links_color_settings',
    ) ) );

    $wp_customize->add_setting( 'sticky_main_nav_menu_active_links_color_settings' , array(
        'type' => 'option',
        'capability' => 'manage_options',
        'default' => '#00',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'refresh',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'sticky_main_nav_menu_active_links_color_control', array(
        'label'    => __( 'Links Color - Active', 'stick-my-header-for-astra' ),
        'description' => __( 'Sticky Header Main menu Links Color in a active state. Default value : unset.', 'stick-my-header-for-astra' ),
        'section'  => 'a_s_h_section',
        'settings' => 'sticky_main_nav_menu_active_links_color_settings',
    ) ) );

    $wp_customize->add_setting( 'sticky_header_sub_main_nav_menu_title_setting');

    $wp_customize->add_control( new StickMyHeader_My_Custom_Title_Control( $wp_customize, 'sticky_header_sub_main_nav_menu_title_control', array(
        'label'       => __( 'SUB PRIMARY MENU', 'stick-my-header-for-astra' ),
        'description' => __( 'In this subsection, you can edit your website\'s submenu of the main navigation menu when your header is sticky (after scrolling a bit down).', 'stick-my-header-for-astra' ),
        'tag'         => __('h3', 'stick-my-header-for-astra'), 
        'section'     => 'a_s_h_section',
        'settings'    => 'sticky_header_sub_main_nav_menu_title_setting',
    )));

    $wp_customize->add_setting( 'sticky_sub_nav_menu_background_color_settings' , array(
        'type' => 'option',
        'capability' => 'manage_options',
        'default' => '#00',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'refresh',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'sticky_sub_nav_menu_background_color_control', array(
        'label'    => __( 'Background Color', 'stick-my-header-for-astra' ),
        'description' => __( 'Sticky Header Sub Primary Menu Background Color. Default value : unset.', 'stick-my-header-for-astra' ),
        'section'  => 'a_s_h_section',
        'settings' => 'sticky_sub_nav_menu_background_color_settings',
    ) ) );

    $wp_customize->add_setting( 'sticky_sub_nav_menu_normal_links_color_settings' , array(
        'type' => 'option',
        'capability' => 'manage_options',
        'default' => '#00',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'refresh',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'sticky_sub_nav_menu_normal_links_color_control', array(
        'label'    => __( 'Links Color - Normal', 'stick-my-header-for-astra' ),
        'description' => __( 'Sticky Header Sub Primary Menu Links Color (Normal State). Default value : unset.', 'stick-my-header-for-astra' ),
        'section'  => 'a_s_h_section',
        'settings' => 'sticky_sub_nav_menu_normal_links_color_settings',
    ) ) );

    $wp_customize->add_setting( 'sticky_sub_nav_menu_hover_links_color_settings' , array(
        'type' => 'option',
        'capability' => 'manage_options',
        'default' => '#00',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'refresh',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'sticky_sub_nav_menu_hover_links_color_control', array(
        'label'    => __( 'Links Color - Hover', 'stick-my-header-for-astra' ),
        'description' => __( 'Sticky Header Sub Primary Menu Links Color (Hover State). Default value : unset.', 'stick-my-header-for-astra' ),
        'section'  => 'a_s_h_section',
        'settings' => 'sticky_sub_nav_menu_hover_links_color_settings',
    ) ) );

    $wp_customize->add_setting( 'sticky_header_secondary_nav_menu_title_setting');

    $wp_customize->add_control( new StickMyHeader_My_Custom_Title_Control( $wp_customize, 'sticky_header_secondary_nav_menu_title_control', array(
        'label'       => __( 'SECONDARY NAVIGATION MENU', 'stick-my-header-for-astra' ),
        'description' => __( 'In this subsection, you can edit your website\'s secondary navigation menu when it\'s sticky (after scrolling a bit down).', 'stick-my-header-for-astra' ),
        'tag'         => __('h3', 'stick-my-header-for-astra'), 
        'section'     => 'a_s_h_section',
        'settings'    => 'sticky_header_secondary_nav_menu_title_setting',
    )));

    $wp_customize->add_setting( 'sticky_secondary_nav_menu_background_color_settings' , array(
        'type' => 'option',
        'capability' => 'manage_options',
        'default' => '#00',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'refresh',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'sticky_secondary_nav_menu_background_color_control', array(
        'label'    => __( 'Background Color', 'stick-my-header-for-astra' ),
        'description' => __( 'Sticky Header Secondary Menu Background Color. Default value : unset.', 'stick-my-header-for-astra' ),
        'section'  => 'a_s_h_section',
        'settings' => 'sticky_secondary_nav_menu_background_color_settings',
    ) ) );

    $wp_customize->add_setting( 'sticky_secondary_nav_menu_normal_links_color_settings' , array(
        'type' => 'option',
        'capability' => 'manage_options',
        'default' => '#00',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'refresh',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'sticky_secondary_nav_menu_normal_links_color_control', array(
        'label'    => __( 'Links Color - Normal', 'stick-my-header-for-astra' ),
        'description' => __( 'Sticky Header Secondary Menu Links Color (Normal State). Default value : unset.', 'stick-my-header-for-astra' ),
        'section'  => 'a_s_h_section',
        'settings' => 'sticky_secondary_nav_menu_normal_links_color_settings',
    ) ) );

    $wp_customize->add_setting( 'sticky_secondary_nav_menu_hover_links_color_settings' , array(
        'type' => 'option',
        'capability' => 'manage_options',
        'default' => '#00',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'refresh',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'sticky_secondary_nav_menu_hover_links_color_control', array(
        'label'    => __( 'Links Color - Hover', 'stick-my-header-for-astra' ),
        'description' => __( 'Sticky Header Secondary Menu Links Color (Hover State). Default value : unset.', 'stick-my-header-for-astra' ),
        'section'  => 'a_s_h_section',
        'settings' => 'sticky_secondary_nav_menu_hover_links_color_settings',
    ) ) );


    $wp_customize->add_setting( 'reading_focus_mode_title_setting');

    $wp_customize->add_control( new StickMyHeader_My_Custom_Title_Control( $wp_customize, 'reading_focus_mode_title_control', array(
        'label'       => __( 'READING FOCUS MODE', 'stick-my-header-for-astra' ),
        'description' => __( 'In this subsection, you can edit the Reading Focus Mode settings to hide the header during inactivity.', 'stick-my-header-for-astra' ),
        'tag'         => __('h3', 'stick-my-header-for-astra'), 
        'section'     => 'a_s_h_section',
        'settings'    => 'reading_focus_mode_title_setting',
    )));


    $wp_customize->add_setting( 'reading_focus_mode_settings', array(
        'type' => 'theme_mod',
        'capability' => 'manage_options',
        'default' => false,
        'sanitize_callback' => 'stickmyheader_themeslug_sanitize_checkbox',
        'transport' => 'postMessage',
    ) );

    $wp_customize->add_control( 'reading_focus_mode_control', array(
        'type' => 'checkbox',
        'label' => __( 'Reading Focus Mode', 'stick-my-header-for-astra' ),
        'description' => __( 'When you check this, the sticky header will disappear when you stop scrolling for a few seconds (to read something), and it shows up again as soon as you scroll up or down.', 'stick-my-header-for-astra' ),
        'section'  => 'a_s_h_section',
        'settings' => 'reading_focus_mode_settings',
    ) );

    $wp_customize->add_setting( 'reading_focus_mode_timeout_settings', array(
        'type' => 'theme_mod',
        'capability' => 'manage_options',
        'default' => 3,
        'sanitize_callback' => 'stickmyheader_sanitize_float',
        'transport' => 'postMessage',
    ) );

    $wp_customize->add_control( 'reading_focus_mode_timeout_control', array(
        'type' => 'number',
        'label' => __( 'Hide after (seconds)', 'stick-my-header-for-astra' ),
        'description' => __( 'The number of seconds to wait after the scroll stops before hiding the sticky header. Default value : 3.', 'stick-my-header-for-astra' ),
        'section'  => 'a_s_h_section',
        'settings' => 'reading_focus_mode_timeout_settings',
        'input_attrs' => array(
            'min' => 0.1,
            'max' => 60,
            'step' => 0.1,
        ),
    ) );

    //----------------------------------------------------------------------------------------------------
    //----------------------------------  MOBILE/TABLETTE SETTINGS/CONTROLS  -----------------------------
    //----------------------------------------------------------------------------------------------------    


    $wp_customize->add_setting( 'sticky_header_mobile_tablette_title_setting');

    $wp_customize->add_control( new StickMyHeader_My_Custom_Title_Control( $wp_customize, 'sticky_header_mobile_tablette_title_control', array(
        'label'       => __( 'MOBILE/TABLETTE', 'stick-my-header-for-astra' ),
        'description' => __( 'Here, you can make your website\'s header sticky in mobile screens and tablettes. Don\'t forget to switch the display mode to Mobile view so you can see the changes', 'stick-my-header-for-astra' ),
        'tag'         => __('h2', 'stick-my-header-for-astra'), 
        'section'     => 'a_s_h_section',
        'settings'    => 'sticky_header_mobile_tablette_title_setting',
    )));

    $wp_customize->add_setting( 'sticky_onmobile_checkbox_settings', array(
        'type' => 'theme_mod',
        'capability' => 'manage_options',
        'default' => false,
        'sanitize_callback' => 'stickmyheader_themeslug_sanitize_checkbox',
        'transport' => 'postMessage',
    ) );

    $wp_customize->add_control( 'sticky_onmobile_checkbox_control', array(
        'type' => 'checkbox',
        'label' => __( 'Sticky Header on Mobile/Tablette', 'stick-my-header-for-astra' ),
        'description' => __( 'When you check this, your website header will be sticky on smartphones screen and tablettes. Default value : unchecked.', 'stick-my-header-for-astra' ),
        'section'  => 'a_s_h_section',
        'settings' => 'sticky_onmobile_checkbox_settings',
      ) );

    $wp_customize->add_setting( 'mobile_tablette_sticky_header_title_setting');

    $wp_customize->add_control( new StickMyHeader_My_Custom_Title_Control( $wp_customize, 'mobile_tablette_sticky_header_title_control', array(
        'label'       => __( 'STICKY HEADER', 'stick-my-header-for-astra' ),
        'description' => __( 'In this subsection, you can edit the background, border bottom and shadow of the Header when it\'s sticky for mobile screens and tablettes only. Scroll your page a bit down so you can view the changes', 'stick-my-header-for-astra' ),
        'tag'         => __('h3', 'stick-my-header-for-astra'), 
        'section'     => 'a_s_h_section',
        'settings'    => 'mobile_tablette_sticky_header_title_setting',
    )));

    $wp_customize->add_setting( 'sticky_onmobile_header_background_color_settings' , array(
        'type' => 'option',
        'capability' => 'manage_options',
        'default' => '#00',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'refresh',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'sticky_onmobile_header_background_color_control', array(
        'label'    => __( 'Background Color', 'stick-my-header-for-astra' ),
        'description' => __( 'Mobile/Tablette Sticky Header Background Color. Default value : unset.', 'stick-my-header-for-astra' ),
        'section'  => 'a_s_h_section',
        'settings' => 'sticky_onmobile_header_background_color_settings',
    ) ) );
      
    $wp_customize->add_setting('sticky_onmobile_header_background_opacity_settings', array(
        'type'              => 'option',
        'capability'        => 'manage_options',
        'default'           => 1,
        'sanitize_callback' => function($number) use ($input_attrs) {
            return stickmyheader_sanitize_color_opacity($number, $input_attrs);
        },
        'transport' => 'refresh',
    ));

    $wp_customize->add_control( 'sticky_onmobile_header_background_opacity_control', array(
        'type'     => 'number',
        'label'    => __( 'Background Opacity', 'stick-my-header-for-astra' ),
        'description' => __( ' Mobile/Tablette Sticky Header Background Opacity. Default value : 1.', 'stick-my-header-for-astra' ),
        'section'  => 'a_s_h_section',
        'settings' => 'sticky_onmobile_header_background_opacity_settings',
        'input_attrs' => $input_attrs
    ) );

    $wp_customize->add_setting( 'sticky_onmobile_header_border_bottom_size_settings' , array(
        'type' => 'option',
        'capability' => 'manage_options',
        'default' => '#',
        'sanitize_callback' => 'stickmyheader_is_numeric_number',
        'transport' => 'refresh',
    ) );

    $wp_customize->add_control( 'sticky_onmobile_header_border_bottom_size_control', array(
        'type'     => 'number',
        'label'    => __( 'Border Bottom Size (px)', 'stick-my-header-for-astra' ),
        'description' => __( ' Mobile/Tablette Sticky Header Border Bottom Size. Default value : unset.', 'stick-my-header-for-astra' ),
        'section'  => 'a_s_h_section',
        'settings' => 'sticky_onmobile_header_border_bottom_size_settings',
    ) );

    $wp_customize->add_setting( 'sticky_onmobile_header_border_bottom_color_settings' , array(
        'type' => 'option',
        'capability' => 'manage_options',
        'default' => '#00',
        'sanitize_callback' => 'sanitize_hex_color', 
        'transport' => 'refresh',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'sticky_onmobile_header_border_bottom_color_control', array(
        'label'    => __( 'Border Bottom Color', 'stick-my-header-for-astra' ),
        'description' => __( ' Mobile/Tablette Sticky Header Border Bottom Color. Default value : unset.', 'stick-my-header-for-astra' ),
        'section'  => 'a_s_h_section',
        'settings' => 'sticky_onmobile_header_border_bottom_color_settings',
    ) ) );    

    $wp_customize->add_setting( 'mobile_tablette_sticky_header_shadow_title_setting');

    $wp_customize->add_control( new StickMyHeader_My_Custom_Title_Control( $wp_customize, 'mobile_tablette_sticky_header_shadow_title_control', array(
        'label'       => __( 'HEADER SHADOW', 'stick-my-header-for-astra' ),
        'description' => __( 'Here, you can add a shadow to your website\'s sticky header, you can edit settings like appearance, blur, color, and shadow opacity for mobile screens and tablettes only. Scroll your page a bit down so you can view the changes.', 'stick-my-header-for-astra' ),
        'tag'         => __('h3', 'stick-my-header-for-astra'), 
        'section'     => 'a_s_h_section',
        'settings'    => 'mobile_tablette_sticky_header_shadow_title_setting',
    )));

    $wp_customize->add_setting( 'sticky_onmobile_header_box_shadow_Y_length_settings' , array(
        'type' => 'option',
        'capability' => 'manage_options',
        'default' => 0,
        'sanitize_callback' => 'stickmyheader_is_numeric_number',
        'transport' => 'refresh',
    ) );

    $wp_customize->add_control( 'sticky_onmobile_header_box_shadow_Y_length_control', array(
        'type'     => 'number',
        'label'    => __( 'Vertical Alignment (px)', 'stick-my-header-for-astra' ),
        'description' => __( ' Mobile/Tablette Sticky Header Shadow Appearance. Default value : 0. As soon as you start increasing it, you will see it appearing (if you activated the Mobile view interface)', 'stick-my-header-for-astra' ),
        'section'  => 'a_s_h_section',
        'settings' => 'sticky_onmobile_header_box_shadow_Y_length_settings',
    ) );

    $wp_customize->add_setting( 'sticky_onmobile_header_box_shadow_blur_settings' , array(
        'type' => 'option',
        'capability' => 'manage_options',
        'default' => 0,
        'sanitize_callback' => 'absint',
        'transport' => 'refresh',
    ) );

    $wp_customize->add_control( 'sticky_onmobile_header_box_shadow_blur_control', array(
        'type'     => 'number',
        'label'    => __( 'Blur (px)', 'stick-my-header-for-astra' ),
        'description' => __( ' Mobile/Tablette Sticky Header Shadow Blur. Default value : 0. Do not forget to switch the display mode to Mobile view so you can see the editings.', 'stick-my-header-for-astra' ),
        'section'  => 'a_s_h_section',
        'settings' => 'sticky_onmobile_header_box_shadow_blur_settings',
    ) );

    $wp_customize->add_setting( 'sticky_onmobile_header_box_shadow_color_settings' , array(
        'type' => 'option',
        'capability' => 'manage_options',
        'default' => '#000000',                      //default color is Black 
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'refresh',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'sticky_onmobile_header_box_shadow_color_control', array(
        'label'    => __( 'Color', 'stick-my-header-for-astra' ),
        'description' => __( ' Mobile/Tablette Sticky Header Shadow Color. Default value : black. Do not forget to switch the display mode to Mobile view so you can see the editings.', 'stick-my-header-for-astra' ),        
        'section'  => 'a_s_h_section',
        'settings' => 'sticky_onmobile_header_box_shadow_color_settings',
    ) ) );

    $wp_customize->add_setting('sticky_onmobile_header_box_shadow_opacity_settings', array(
        'type'              => 'option',
        'capability'        => 'manage_options',
        'default'           => 0.1,
        'sanitize_callback' => function($number) use ($input_attrs) {
            return stickmyheader_sanitize_color_opacity($number, $input_attrs);
        },
        'transport' => 'refresh',
    ));

    $wp_customize->add_control( 'sticky_onmobile_header_box_shadow_opacity_control', array(
        'type'     => 'number',
        'label'    => __( 'Opacity', 'stick-my-header-for-astra' ),
        'description' => __( 'Mobile/Tablette Sticky Header Shadow Opacity. Default value : 0.1, recommended. Do not forget to switch the display mode to Mobile view so you can see the editings.', 'stick-my-header-for-astra' ),
        'section'  => 'a_s_h_section',
        'settings' => 'sticky_onmobile_header_box_shadow_opacity_settings',
        'input_attrs' => $input_attrs
    ) );

    $wp_customize->add_setting( 'css_title_setting');

    $wp_customize->add_control( new StickMyHeader_My_Custom_Title_Control( $wp_customize, 'css_title_control', array(
        'label'       => __( 'CUSTOM CSS', 'stick-my-header-for-astra' ),
        'description' => __( 'Here, you can add any CSS code that you want, in order to customize your header.', 'stick-my-header-for-astra' ),
        'tag'         => __('h2', 'stick-my-header-for-astra'), 
        'section'     => 'a_s_h_section',
        'settings'    => 'css_title_setting',
    )));
    
    $wp_customize->add_setting( 'textarea_for_css_settings', array(
        'type' => 'option',
        'capability' => 'manage_options',
        'default' => '',
        'sanitize_callback' => 'sanitize_textarea_field',
        'transport' => 'refresh',
      ) );

    $wp_customize->add_control( 'textarea_for_css_control', array(
        'type' => 'textarea',
        'label' => __( 'CUSTOM CSS', 'stick-my-header-for-astra' ),
        'description' => __( 'If you want to add any CSS code to customize your header, you can write it inside the box bellow.', 'stick-my-header-for-astra' ),
        'section'  => 'a_s_h_section',
        'settings' => 'textarea_for_css_settings',
    ) );

    $wp_customize->add_setting( 'pro_customization_setting');

    $wp_customize->add_control( new StickMyHeader_My_Custom_Title_Control( $wp_customize, 'pro_customization_control', array(
        'label'            => __( 'For Further PRO Customization', 'stick-my-header-for-astra' ),
        'description'      => __( 'Contact Us to : contact@webtips.me', 'stick-my-header-for-astra' ),
        'tag'              => __('h2', 'stick-my-header-for-astra'), 
        'background_color' => __('#1db594', 'stick-my-header-for-astra'),
        'color'            => __('white', 'stick-my-header-for-astra'),
        'section'          => 'a_s_h_section',
        'settings'         => 'pro_customization_setting',
    )));

}

?>