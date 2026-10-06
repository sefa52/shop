jQuery(document).ready(function ($) {
    // 1. Core Variables
    var scrollTimer = null;
    var isHovered = false;
    
    // 2. Helper: Get current active menu (Smart Detection)
    function getActiveMenu() {
        var mobileHeader = $("#ast-mobile-header");
        var desktopHeader = $("#ast-desktop-header");
        
        // If mobile header exists and is not hidden by CSS
        if (mobileHeader.length && mobileHeader.css("display") !== "none") {
            return mobileHeader;
        }
        return desktopHeader;
    }

    // 3. Helper: Calculate Menu Top Offset
    // We calculate this once for the visible header
    var initialMenu = getActiveMenu();
    const menuTop = initialMenu.length ? initialMenu.offset().top : 0;

    // 4. Hover Protection
    $("#ast-desktop-header, #ast-mobile-header").on("mouseenter", function() {
        isHovered = true;
        if (scrollTimer !== null) clearTimeout(scrollTimer);
        $(this).removeClass("hidden-idle");
    }).on("mouseleave", function() {
        isHovered = false;
        if (sh_obj.reading_mode === 'yes' && $(this).hasClass("sticky")) {
            startHideTimer();
        }
    });

    // 5. Hide Logic (Reading Focus Mode)
    function startHideTimer() {
        if (scrollTimer !== null) clearTimeout(scrollTimer);
        
        var menu = getActiveMenu();
        var timeout = parseFloat(sh_obj.timeout) || 3;

        scrollTimer = setTimeout(function () {
            if (menu.hasClass("sticky") && !isHovered && sh_obj.reading_mode === 'yes') {
                menu.addClass("hidden-idle");
            }
        }, timeout * 1000);
    }

    // 6. Scroll Logic
    function handleScroll() {
        var menu = getActiveMenu();
        var isMobile = window.matchMedia("(max-width: 921px)").matches;
        
        var canBeSticky = true;
        if (isMobile && sh_obj.sticky_mobile !== 'yes') {
            canBeSticky = false;
        }

        if (window.pageYOffset > menuTop && canBeSticky) {
            if (!menu.hasClass("sticky")) {
                // Determine admin bar height to prevent overlapping
                var adminBarHeight = $("#wpadminbar").length ? $("#wpadminbar").outerHeight() : 0;
                
                // Insert a placeholder to prevent content from snapping up
                if ($(".sh-header-placeholder").length === 0) {
                    $('<div class="sh-header-placeholder"></div>')
                        .height(menu.outerHeight())
                        .insertBefore(menu);
                }
                
                menu.css("top", adminBarHeight + "px");
                menu.addClass("sticky");
            }
        } else {
            if (menu.hasClass("sticky")) {
                $(".sh-header-placeholder").remove();
                menu.css("top", "");
                menu.removeClass("sticky");
                menu.removeClass("hidden-idle");
            }
        }

        // Reading Focus Mode trigger
        var isReadingModeActive = (sh_obj.reading_mode === 'yes' && canBeSticky);
        
        if (isReadingModeActive) {
            menu.removeClass("hidden-idle");
            if (!isHovered) {
                startHideTimer();
            }
        } else {
            menu.removeClass("hidden-idle");
        }
    }

    // 7. Event Listeners
    window.addEventListener("scroll", handleScroll);
    
    // Initial check
    handleScroll();
});