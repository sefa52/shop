(function( $ ) {

    //-----------------------------------------     HEADER SETTINGS      ------------------------------

    // Listen to background color setting
    wp.customize( 'header_background_color_settings', function( value ) {
        value.bind( function( newval ) {
            color = newval;
            opacity = wp.customize('header_opacity_settings')();
            $('#ast-desktop-header').not('.sticky').css(
                'background-color',
                stickmyheader_convert_hex_to_rgba(color, opacity)
            );
        });
    });

    // listen to Opacity setting
    wp.customize( 'header_opacity_settings', function( value ) {
        value.bind( function( newval ) {
            opacity = newval;
            color = wp.customize('header_background_color_settings')();
            $('#ast-desktop-header').not('.sticky').css(
                'background-color',
                stickmyheader_convert_hex_to_rgba(color, opacity)
            );
        });
    });

    // listen to Zindex setting
    wp.customize( 'header_ZIndex_settings', function( value ) {
        value.bind( function( newval ) {
            $('#ast-desktop-header').css(
                'z-index',
                newval
            );
        });
    });
    
    // listen to border bottom size setting
    wp.customize( 'header_border_bottom_size_settings', function( value ) {
        value.bind( function( newval ) {
            color = wp.customize('header_border_bottom_color_settings')();
            $('#ast-desktop-header').css(
                'border-bottom',
                newval + "px solid " + color
            );
        });
    });

    // listen to border bottom color setting
    wp.customize( 'header_border_bottom_color_settings', function( value ) {
        value.bind( function( newval ) {
            size = wp.customize('header_border_bottom_size_settings')();
            $('#ast-desktop-header').css(
                'border-bottom',
                size + "px solid " + newval
            );
        });
    });
    
    // listen to box shadow size setting
    wp.customize( 'header_box_shadow_Y_length_settings', function( value ) {
        value.bind( function( newval ) {
            blur_value = wp.customize('header_box_shadow_blur_settings')() || 0;
            color = wp.customize('header_box_shadow_color_settings')() || '#000000';
            opacity = wp.customize('header_box_shadow_opacity_settings')() || 0,1;
                            
            $('#ast-desktop-header').css(
                'box-shadow',
                "0px " + newval + "px " + blur_value + "px " + stickmyheader_convert_hex_to_rgba(color, opacity)
            );
        });
    });

    // listen to box shadow blur setting
    wp.customize( 'header_box_shadow_blur_settings', function( value ) {
        value.bind( function( newval ) {
            ylength_value = wp.customize('header_box_shadow_Y_length_settings')() || 0;
            color = wp.customize('header_box_shadow_color_settings')() || '#000000';
            opacity = wp.customize('header_box_shadow_opacity_settings')() || 0,1;
                            
            $('#ast-desktop-header').css(
                'box-shadow',
                "0px " + ylength_value + "px " + newval + "px " + stickmyheader_convert_hex_to_rgba(color, opacity)
            );
        });
    });

    // listen to box shadow color setting
    wp.customize( 'header_box_shadow_color_settings', function( value ) {
        value.bind( function( newval ) {
            ylength_value = wp.customize('header_box_shadow_Y_length_settings')() || 0;
            blur_value = wp.customize('header_box_shadow_blur_settings')() || 0;
            opacity = wp.customize('header_box_shadow_opacity_settings')() || 0,1;
                            
            $('#ast-desktop-header').css(
                'box-shadow',
                "0px " + ylength_value + "px " + blur_value + "px " + stickmyheader_convert_hex_to_rgba(newval, opacity)
            );
        });
    });

    // listen to box shadow opacity setting
    wp.customize( 'header_box_shadow_opacity_settings', function( value ) {
        value.bind( function( newval ) {
            ylength_value = wp.customize('header_box_shadow_Y_length_settings')() || 0;
            blur_value = wp.customize('header_box_shadow_blur_settings')() || 0;
            color = wp.customize('header_box_shadow_color_settings')() || '#000000';
                            
            $('#ast-desktop-header').css(
                'box-shadow',
                "0px " + ylength_value + "px " + blur_value + "px " + stickmyheader_convert_hex_to_rgba(color, newval)
            );
        });
    });    

    //-----------------------------------------     STICKY HEADER SETTINGS      ------------------------------
    
    // Listen to background color setting
    wp.customize( 'sticky_header_background_color_settings', function( value ) {
        value.bind( function( newval ) {
            color = newval;
            opacity = wp.customize('sticky_header_background_opacity_settings')();
            $('#ast-desktop-header.sticky').css(
                'background-color',
                stickmyheader_convert_hex_to_rgba(color, opacity)
            );
        });
    });

    // listen to Opacity setting
    wp.customize( 'sticky_header_background_opacity_settings', function( value ) {
        value.bind( function( newval ) {
            opacity = newval;
            color = wp.customize('sticky_header_background_color_settings')();
            $('#ast-desktop-header.sticky').css(
                'background-color',
                stickmyheader_convert_hex_to_rgba(color, opacity)
            );
        });
    });

    // listen to Zindex setting
    wp.customize( 'sticky_header_ZIndex_settings', function( value ) {
        value.bind( function( newval ) {
            $('#ast-desktop-header.sticky').css(
                'z-index',
                newval
            );
        });
    });

    // --- READING FOCUS MODE (Smart) ---
    wp.customize( 'reading_focus_mode_settings', function( value ) {
        value.bind( function( newval ) {
            if (typeof window.sh_obj !== 'undefined') {
                window.sh_obj.reading_mode = newval ? 'yes' : 'no';
                if (!newval) {
                    $('#ast-desktop-header, #ast-mobile-header').removeClass('hidden-idle');
                }
            }
        });
    });

    wp.customize( 'reading_focus_mode_timeout_settings', function( value ) {
        value.bind( function( newval ) {
            if (typeof window.sh_obj !== 'undefined') {
                window.sh_obj.timeout = newval;
            }
        });
    });

    // Listen to Mobile Sticky toggle (Dependency)
    wp.customize( 'sticky_onmobile_checkbox_settings', function( value ) {
        value.bind( function( newval ) {
            if (typeof window.sh_obj !== 'undefined') {
                window.sh_obj.sticky_mobile = newval ? 'yes' : 'no';
                if (!newval) {
                    // Force removal of sticky classes if mobile sticky is turned off
                    $('#ast-mobile-header').removeClass('sticky hidden-idle');
                }
            }
        });
    });
    
 




    function stickmyheader_convert_hex_to_rgba(hex, opacity) {
        // Remove # if present
        hex = hex.replace(/^#/, '');

        // Parse shorthand hex (#fff → #ffffff)
        if (hex.length === 3) {
            hex = hex.split('').map(c => c + c).join('');
        }

        // Convert hex → RGB
        let bigint = parseInt(hex, 16);
        let r = (bigint >> 16) & 255;
        let g = (bigint >> 8) & 255;
        let b = bigint & 255;

        // Return RGBA string
        return `rgba(${r}, ${g}, ${b}, ${opacity})`;
    }

})( jQuery );
