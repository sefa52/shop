<?php     
    // Exit if this file was accessed directly, exit
    if ( ! defined( 'ABSPATH' ) ) exit; 

    $current_user = wp_get_current_user(); 
    $username = $current_user->user_login;
    $activeTab = 'welcome';

?>


<div class="ash-header flex white-background">
    <div class="flex">
        <div>                           
            <img class="sh-logo" src="<?php echo esc_html( STICKMYHEADER_LOGO_PATH ); ?>" alt="Stick My Header for Astra plugin logo" >
        </div>

        <h2 class="nav-tab-wrapper">
            <a class="nav-tab welcome <?php if ($activeTab == 'welcome') { echo 'nav-tab-active'; } ?>" href="#welcome"><?php echo esc_html_x( 'Welcome', 'Noun: Welcome to our store.', 'stick-my-header-for-astra' ); ?></a>
            <a class="nav-tab documentation <?php if ($activeTab == 'documentation') { echo 'nav-tab-active'; } ?>" href="#documentation"><?php esc_html_e('Documentation', 'stick-my-header-for-astra'); ?></a>
            <a class="nav-tab support <?php if ($activeTab == 'support') { echo 'nav-tab-active'; } ?>" href="#support"><?php echo esc_html_x( 'Support', 'Noun: communication and support.', 'stick-my-header-for-astra' ); ?></a>
        </h2>
    </div>
    <div class="rate-and-donate">
            <a class="rate" href="https://wordpress.org/support/plugin/stick-my-header-for-astra/reviews/#new-post">
                <?php esc_html_e( 'Rate Us', 'stick-my-header-for-astra' ); ?>
                <img class="stars-gif" src="<?php echo esc_html( STICKMYHEADER_STARS_GIF_PATH ); ?>" alt="A GIF image of 5 stars for rating" >
            </a>
        <a href="https://donorbox.org/support-webtips"><?php esc_html_e( 'Donate to SH', 'stick-my-header-for-astra' ); ?></a> 
    </div>
</div>
<br>
<div class="content tab-welcome white-background <?php if ($activeTab != 'welcome') {echo 'hidden';}?>">
    <br>

    <div>
        <p class="hello-text"><?php printf( /* translators: Name: Name of any user of this plugin. */esc_html__( 'Hello %s,', 'stick-my-header-for-astra' ), esc_html( $username ) ); ?></p>
        <div class="flex">
            <div class="left-section">
                <div class="welcome-title flex">
                    <h1><?php printf( /* translators: Name: The name of this plugin. */ esc_html__('Welcome To %s', 'stick-my-header-for-astra'), 'Stick My Header for Astra'); ?></h1>
                    <span><?php esc_html_e('FREE', 'stick-my-header-for-astra'); ?></span>
                </div>
                <p class="text-desc"><?php esc_html_e("This plugin is an Astra theme Add-on, it improves your theme's functionality, allowing the website's header to elegantly stick to the top, and enhances user navigation and visual appeal effortlessly.", 'stick-my-header-for-astra'); ?></p>
                <span class="buttons inline-flex">
                    <button type="button" class="inline-flex items-center text-btn go-to-customizer"><?php esc_html_e( 'Start Header Customizing', 'stick-my-header-for-astra' ); ?></button>
                    <button class="items-center text-btn go-to-video">
                        <span class="right-btn-container"> 
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none">
                                <path d="M12.7519 9.16795L9.5547 7.03647C8.89015 6.59343 8 7.06982 8 7.86852V12.1315C8 12.9302 8.89015 13.4066 9.5547 12.9635L12.7519 10.8321C13.3457 10.4362 13.3457 9.56377 12.7519 9.16795Z" stroke="#046BD2" stroke-width="2"></path>
                                <path d="M19 10C19 14.9706 14.9706 19 10 19C5.02944 19 1 14.9706 1 10C1 5.02944 5.02944 1 10 1C14.9706 1 19 5.02944 19 10Z" stroke="#046BD2" stroke-width="2"></path>
                            </svg>
                        </span>
                        <?php esc_html_e('Check SH Demo', 'stick-my-header-for-astra'); ?>
                    </button>
                </span>
            </div>
            <div>                
                <img class="scroll-gif" src="<?php echo esc_html( STICKMYHEADER_SCROLL_GIF_PATH ); ?>" alt="<?php esc_attr_e( 'An illustration which represents and highlights the stickiness of a header section in a web page', 'stick-my-header-for-astra'); ?>">
            </div>
        </div>
    </div>

</div>

<div class="content tab-documentation <?php if ($activeTab != 'documentation') {echo 'hidden';}?>">
    <br>

    <h1><?php printf( /* translators: Name: Name of this plugin. */esc_html__( 'Thanks for using the %s,' , 'stick-my-header-for-astra' ) , 'Stick My Header for Astra' ); ?></h1>
    <br>                                                                         
    <h2><?php esc_html_e( 'Header Configuration', 'stick-my-header-for-astra'); ?></h2>
    <p class="text">
        1- <?php esc_html_e('After installing and activating our plugin, the Header will become', 'stick-my-header-for-astra'); ?> <strong><?php esc_html_e('sticky automatically', 'stick-my-header-for-astra'); ?></strong>.<br>
        2- <?php esc_html_e('If you have already set a Background Color for the Header before activating this plugin, 
        the same color will be applied after activating Stick My Header for Astra for the first time.', 'stick-my-header-for-astra'); ?>
    </p>

    <div class="separator">___________________________________________________________________________________________ <br><br>

    </div> 
    <h2><?php esc_html_e( "Getting Started With Stick My Header for Astra", 'stick-my-header-for-astra' ); ?></h2>             
    <p class="text"> 
        <?php esc_html_e('This plugin will allow you to have a sticky header, and customize it as you wish.', 'stick-my-header-for-astra'); ?> <br>
        <?php esc_html_e('In order to start header customization', 'stick-my-header-for-astra'); ?> : <br>
        1- <?php esc_html_e('you need to click on', 'stick-my-header-for-astra'); ?> <strong><?php esc_html_e('Start Header Customizing', 'stick-my-header-for-astra'); ?></strong> <?php esc_html_e('button that you\'ll find under', 'stick-my-header-for-astra'); ?> <strong><?php esc_html_e('Welcome', 'stick-my-header-for-astra'); ?></strong> <?php esc_html_e('tab as you can see below', 'stick-my-header-for-astra'); ?>.
    </p>
    <img class="" src="<?php echo esc_html( STICKMYHEADER_IMAGE_1_PATH ); ?>" alt="Home plugin page screenshot showing where is customization button" >
    <p class="text">
        2- <?php esc_html_e('This will redirect you to the', 'stick-my-header-for-astra'); ?> <strong><?php esc_html_e('Sticky Header', 'stick-my-header-for-astra'); ?></strong> <?php esc_html_e('section (see more about it in the next paragraph below) in the WordPress Customizer where you can edit your Header settings', 'stick-my-header-for-astra'); ?>.
    </p>

    <div class="separator">___________________________________________________________________________________________ <br><br>
    </div> 

    <h2><?php esc_html_e( 'Sticky Header section', 'stick-my-header-for-astra' ); ?></h2>         
    <p class="text">
        <?php esc_html_e( 'This section is devided to 4 parts', 'stick-my-header-for-astra' ); ?> : <br>
        - <?php esc_html_e( 'Header Settings', 'stick-my-header-for-astra' ); ?>. <br>
        - <?php esc_html_e( 'Sticky Header Settings', 'stick-my-header-for-astra' ); ?>. <br>
        - <?php esc_html_e( 'Mobile/Tablette', 'stick-my-header-for-astra' ); ?>. <br>
        - <?php esc_html_e( 'Custom CSS', 'stick-my-header-for-astra' ); ?>. <br>
        <?php esc_html_e( 'They contain design parameters so you can customize your header design as you like it', 'stick-my-header-for-astra' ); ?>. <br>
        <?php esc_html_e( 'These 4 parts are described below', 'stick-my-header-for-astra' ); ?>. <br>
    </p>
    <img class="" src="<?php echo esc_html( STICKMYHEADER_IMAGE_2_PATH ); ?>" alt="Sticky Header section screenshot showing this section" >  
    
    <div class="separator">___________________________________________________________________________________________ <br><br>
    </div> 
    
    <h2><?php esc_html_e( 'Part 1 : Header Settings', 'stick-my-header-for-astra' ); ?></h2>         
    <p class="text">
        <?php esc_html_e( 'This part will allow you to edit your header\'s design when it is', 'stick-my-header-for-astra' ); ?> <strong><?php esc_html_e( 'not sticky', 'stick-my-header-for-astra' ); ?></strong>, <?php esc_html_e( 'which means, you should use this part if you want 
        to edit your header design when it is displayed in the top of pages', 'stick-my-header-for-astra' ); ?>. <br>
        <?php esc_html_e( 'So make sure to have your page\'s', 'stick-my-header-for-astra' ); ?> <strong><?php esc_html_e( 'header in top', 'stick-my-header-for-astra' ); ?></strong> <?php esc_html_e( 'so you 
        can view the changes in', 'stick-my-header-for-astra' ); ?> <strong><?php esc_html_e( 'realtime', 'stick-my-header-for-astra' ); ?></strong> <?php esc_html_e( '(see the picture below)', 'stick-my-header-for-astra' ); ?>. <br>
    </p>
    <img class="" src="<?php echo esc_html( STICKMYHEADER_IMAGE_3_PATH ); ?>" alt="Header Settings part screenshot showing this section" >

    <div class="separator">___________________________________________________________________________________________ <br><br>
    </div> 

    <h2><?php esc_html_e( 'Part 2 : Sticky Header Settings', 'stick-my-header-for-astra' ); ?></h2>         
    <p class="text">
        <?php esc_html_e( 'This part allows you to edit your header\'s design when', 'stick-my-header-for-astra' ); ?> <strong><?php esc_html_e( 'it is sticky', 'stick-my-header-for-astra' ); ?></strong>, <?php esc_html_e( 'which means, you should use this part if you want 
        to display your header in a certain way when', 'stick-my-header-for-astra' ); ?> <strong><?php esc_html_e( 'users are scrolling down', 'stick-my-header-for-astra' ); ?></strong> <?php esc_html_e( 'your pages', 'stick-my-header-for-astra' ); ?>. <br>
        <?php esc_html_e( 'So before starting editing in this part, make sure to', 'stick-my-header-for-astra' ); ?> <strong><?php esc_html_e( 'scroll a bit down', 'stick-my-header-for-astra' ); ?></strong> <?php esc_html_e( 'your home page so you can view the changes in realtime (see the picture below)', 'stick-my-header-for-astra' ); ?>. <br>
    </p> 
    <img class="" src="<?php echo esc_html( STICKMYHEADER_IMAGE_4_PATH ); ?>" alt="Sticky Header Settings part screenshot showing how to use this section" >

    <div class="separator">___________________________________________________________________________________________ <br><br>
    </div> 

    <h2><?php esc_html_e( 'Part 3 : Mobile/Tablette', 'stick-my-header-for-astra' ); ?></h2>         
    <p class="text">
        <?php esc_html_e( 'This part will allow you to have a', 'stick-my-header-for-astra' ); ?> <strong><?php esc_html_e( 'sticky header on Mobile/Tablette', 'stick-my-header-for-astra' ); ?></strong> <?php esc_html_e( 'screens, and edit its design', 'stick-my-header-for-astra' ); ?>. <br>
        <?php esc_html_e( 'You should use this part if you want to have a sticky header on', 'stick-my-header-for-astra' ); ?> <strong><?php esc_html_e( 'small screens', 'stick-my-header-for-astra' ); ?></strong>.
        <?php esc_html_e( 'So before starting editing in this part, make sure to switch the interface', 'stick-my-header-for-astra' ); ?> <strong><?php esc_html_e( 'from Laptop to Mobile', 'stick-my-header-for-astra' ); ?></strong> <?php esc_html_e( 'so you can view the changes in realtime (see the picture below)', 'stick-my-header-for-astra' ); ?>. <br>
    </p> 
    <img class="" src="<?php echo esc_html( STICKMYHEADER_IMAGE_5_PATH ); ?>" alt="Mobile/Tablette part screenshot showing how to use this section" >

    <div class="separator">___________________________________________________________________________________________ <br><br>
    </div> 

    <h2><?php esc_html_e( 'Part 4 : Custom CSS', 'stick-my-header-for-astra' ); ?></h2>         
    <p class="text">
        <?php esc_html_e( 'This part will allow you to add CSS code in order to customize your website\'s header', 'stick-my-header-for-astra' ); ?>.
    </p>

    <div class="separator">___________________________________________________________________________________________ <br><br>
    </div> 

    <h2><?php esc_html_e( "Useful Examples", 'stick-my-header-for-astra' ); ?></h2>

        <p class="text question"><strong><?php esc_html_e( 'How to change Header Background Color', 'stick-my-header-for-astra' ); ?> ?</strong></p>
        <p class="text">
            <?php esc_html_e( 'Here you have 2 cases, it depends on you and how you want your header to be displayed', 'stick-my-header-for-astra' ); ?> : <br>
            <strong><?php esc_html_e( '1st case : when the header is not sticky', 'stick-my-header-for-astra' ); ?></strong> <br>
            <?php esc_html_e( 'Let\'s presume you\'re already in the', 'stick-my-header-for-astra' ); ?> <strong><?php esc_html_e( 'Sticky Header', 'stick-my-header-for-astra' ); ?></strong> <?php esc_html_e( 'section, make sure to have the Header section positionned on top of the home page so you can view the changes in realtime (see the picture below)', 'stick-my-header-for-astra' ); ?>. <br>
        </p> 
        <img class="" src="<?php echo esc_html( STICKMYHEADER_IMAGE_3_PATH ); ?>" alt="Header Settings part screenshot showing the conditions mentioned above this image" >
        <p class="text">
            <?php esc_html_e( 'In', 'stick-my-header-for-astra' ); ?> <strong><?php esc_html_e( 'Header Settings', 'stick-my-header-for-astra' ); ?></strong> <?php esc_html_e( 'part', 'stick-my-header-for-astra' ); ?> : <br>
            1- <?php esc_html_e( 'Click on', 'stick-my-header-for-astra' ); ?> <strong><?php esc_html_e( 'Background Color', 'stick-my-header-for-astra' ); ?></strong>. <br>
            2- <?php esc_html_e( 'Choose the color, or add a color using the Hexadecimal field', 'stick-my-header-for-astra' ); ?>. <br> 
            3- <?php esc_html_e( 'Click on', 'stick-my-header-for-astra' ); ?> <strong><?php esc_html_e( 'Enter', 'stick-my-header-for-astra' ); ?></strong> <?php esc_html_e( 'on your keyboard', 'stick-my-header-for-astra' ); ?>. <br>
            4- <?php esc_html_e( 'Save By clicking on', 'stick-my-header-for-astra' ); ?> <strong><?php esc_html_e( 'Publish', 'stick-my-header-for-astra' ); ?></strong> <?php esc_html_e( 'button (see the picture below)', 'stick-my-header-for-astra' ); ?>. <br>
        </p>
        <img class="" src="<?php echo esc_html( STICKMYHEADER_IMAGE_6_PATH ); ?>" alt="Stick My Header for Astra Customizer screenshot showing how to change header's background color" >
        <p class="text">
            <strong><?php esc_html_e( '2nd case : when the header is sticky', 'stick-my-header-for-astra' ); ?></strong> <br>
            <?php esc_html_e( 'Let\'s presume you\'re already in the', 'stick-my-header-for-astra' ); ?> <strong><?php esc_html_e( 'Sticky Header', 'stick-my-header-for-astra' ); ?></strong> <?php esc_html_e( 'section, make sure to', 'stick-my-header-for-astra' ); ?> <strong><?php esc_html_e( 'scroll a bit down', 'stick-my-header-for-astra' ); ?></strong> <?php esc_html_e( 'the home page so you can view the changes in realtime (see the picture below)', 'stick-my-header-for-astra' ); ?>. <br>
        </p>    
        <img class="" src="<?php echo esc_html( STICKMYHEADER_IMAGE_4_PATH ); ?>" alt="Sticky Header Settings part screenshot showing how to use this section" >
        <p class="text">
            1- <?php esc_html_e( 'Scroll Down to', 'stick-my-header-for-astra' ); ?> <strong><?php esc_html_e( 'Sticky Header Settings', 'stick-my-header-for-astra' ); ?></strong> <?php esc_html_e( 'part', 'stick-my-header-for-astra' ); ?>. <br>
            2- <?php esc_html_e( 'Click on', 'stick-my-header-for-astra' ); ?> <strong><?php esc_html_e( 'Background Color', 'stick-my-header-for-astra' ); ?></strong>. <br>
            3- <?php esc_html_e( 'Choose the color, or add a color using the Hexadecimal field', 'stick-my-header-for-astra' ); ?>. <br> 
            4- <?php esc_html_e( 'Click on', 'stick-my-header-for-astra' ); ?> <strong><?php esc_html_e( 'Enter', 'stick-my-header-for-astra' ); ?></strong> <?php esc_html_e( 'on your keyboard', 'stick-my-header-for-astra' ); ?>. <br>
            5- <?php esc_html_e( 'Save By clicking on', 'stick-my-header-for-astra' ); ?> <strong><?php esc_html_e( 'Publish', 'stick-my-header-for-astra' ); ?></strong> <?php esc_html_e( 'button', 'stick-my-header-for-astra' ); ?>. <br>
        </p>
        <img class="" src="<?php echo esc_html( STICKMYHEADER_IMAGE_7_PATH ); ?>" alt="Stick My Header for Astra Customizer screenshot showing how to change header's background color" >

        <div class="separator">___________________________________________________________________________________________ <br><br>
        </div> 

        <p class="text question"><strong><?php esc_html_e( 'My Header section disappeared, what is the reason', 'stick-my-header-for-astra' ); ?> ?</strong></p>
        <p class="text">
            <?php esc_html_e( 'may be because of', 'stick-my-header-for-astra' ); ?> <strong><?php esc_html_e( 'Z-index', 'stick-my-header-for-astra' ); ?></strong> <?php esc_html_e( 'parameter which has a small value, 
            in this case, you should set it at least to', 'stick-my-header-for-astra' ); ?> <strong>1000</strong>.
            <?php esc_html_e( 'To do so', 'stick-my-header-for-astra' ); ?> : <br>
            1- <?php esc_html_e( 'Go to', 'stick-my-header-for-astra' ); ?> <strong><?php esc_html_e( 'Header Settings', 'stick-my-header-for-astra' ); ?></strong> <?php esc_html_e( 'part', 'stick-my-header-for-astra' ); ?>. <br>
            2- <?php esc_html_e( 'Update', 'stick-my-header-for-astra' ); ?> <strong><?php esc_html_e( 'Z-index', 'stick-my-header-for-astra' ); ?></strong> <?php esc_html_e( 'value (see the picture below)', 'stick-my-header-for-astra' ); ?>. <br>
        </p> 
        <img class="" src="<?php echo esc_html( STICKMYHEADER_IMAGE_8_PATH ); ?>" alt="Stick My Header for Astra Customizer screenshot showing how to change header's z-index" >            
        <p class="text">
            3- <?php esc_html_e( 'Scroll down to', 'stick-my-header-for-astra' ); ?> <strong><?php esc_html_e( 'Sticky Header Settings', 'stick-my-header-for-astra' ); ?></strong> <?php esc_html_e( 'part', 'stick-my-header-for-astra' ); ?>. <br>
            4- <?php esc_html_e( 'Update', 'stick-my-header-for-astra' ); ?> <strong><?php esc_html_e( 'Z-index', 'stick-my-header-for-astra' ); ?></strong> <?php esc_html_e( 'value', 'stick-my-header-for-astra' ); ?>. <br>
            5- <?php esc_html_e( 'Save By clicking on', 'stick-my-header-for-astra' ); ?> <strong><?php esc_html_e( 'Publish', 'stick-my-header-for-astra' ); ?></strong> <?php esc_html_e( 'button (see the picture below)', 'stick-my-header-for-astra' ); ?>. <br>
        </p>
            <img class="" src="<?php echo esc_html( STICKMYHEADER_IMAGE_9_PATH ); ?>" alt="Stick My Header for Astra Customizer screenshot showing how to change sticky header's z-index" >
        <p class="text">
            <strong><?php esc_html_e( 'Note', 'stick-my-header-for-astra' ); ?> :</strong> <?php esc_html_e( 'you can set', 'stick-my-header-for-astra' ); ?> <strong><?php esc_html_e( 'Z-index', 'stick-my-header-for-astra' ); ?></strong> <?php esc_html_e( 'value between', 'stick-my-header-for-astra' ); ?> <strong><?php esc_html_e( '1 to 100000', 'stick-my-header-for-astra' ); ?></strong> <?php esc_html_e( 'only', 'stick-my-header-for-astra' ); ?>. <br>
        </p>

        <div class="separator">___________________________________________________________________________________________ <br><br>
        </div> 

        <p class="text question"><strong><?php esc_html_e( 'How to add a bottom shadow to the sticky header', 'stick-my-header-for-astra' ); ?> ?</strong></p>
        <p class="text"> 
            <?php esc_html_e( 'Let\'s presume you\'re already in the', 'stick-my-header-for-astra' ); ?> <strong><?php esc_html_e( 'Sticky Header', 'stick-my-header-for-astra' ); ?></strong> <?php esc_html_e( 'section, 
            make sure to', 'stick-my-header-for-astra' ); ?> <strong><?php esc_html_e( 'scroll a bit down', 'stick-my-header-for-astra' ); ?></strong> <?php esc_html_e( 'the home page so you can view the changes in realtime
            (Check the', 'stick-my-header-for-astra' ); ?> <strong><?php esc_html_e( 'Sticky Header Settings', 'stick-my-header-for-astra' ); ?></strong> <?php esc_html_e( 'part image above)', 'stick-my-header-for-astra' ); ?>. <br>
            <?php esc_html_e( 'So the steps are', 'stick-my-header-for-astra' ); ?> : <br>
            1- <?php esc_html_e( 'Scroll down to', 'stick-my-header-for-astra' ); ?> <strong><?php esc_html_e( 'Sticky Header Settings', 'stick-my-header-for-astra' ); ?></strong> <?php esc_html_e( 'part', 'stick-my-header-for-astra' ); ?>. <br>
            2- <?php esc_html_e( 'Go to', 'stick-my-header-for-astra' ); ?> <strong><?php esc_html_e( 'Shadow', 'stick-my-header-for-astra' ); ?></strong>. <br>
            3- <?php esc_html_e( 'Set', 'stick-my-header-for-astra' ); ?> <strong><?php esc_html_e( 'Vertical Alignment', 'stick-my-header-for-astra' ); ?></strong> <?php esc_html_e( '(in the image underneath it\'s 10), as soon as you increase this, the header shadow will start appearing below the header', 'stick-my-header-for-astra' ); ?>. <br>
            4- <?php esc_html_e( 'Set', 'stick-my-header-for-astra' ); ?> <strong><?php esc_html_e( 'Blur', 'stick-my-header-for-astra' ); ?></strong> <?php esc_html_e( '(in the image underneath it\'s 5)', 'stick-my-header-for-astra' ); ?>. <br> 
            5- <?php esc_html_e( 'Change the color as you wish. In the image underneath it\'s', 'stick-my-header-for-astra' ); ?> <strong><?php esc_html_e( '#2ecc82', 'stick-my-header-for-astra' ); ?></strong>. <br>
            <strong><?php esc_html_e( 'Note', 'stick-my-header-for-astra' ); ?>:</strong> <?php esc_html_e( 'it\'s important to add Blur and Opacity for a better design results', 'stick-my-header-for-astra' ); ?>. <br>
        </p> 
        <img class="" src="<?php echo esc_html( STICKMYHEADER_IMAGE_10_PATH ); ?>" alt="Stick My Header for Astra Customizer screenshot showing how to change sticky header's shadow" >

        <div class="separator">___________________________________________________________________________________________ <br><br>
        </div> 

        <p class="text question"><strong><?php esc_html_e( 'How to make the header sticky on mobile/tablette', 'stick-my-header-for-astra' ); ?> ?</strong></p>
        <p class="text"> 
            <?php esc_html_e( 'Let\'s presume you\'re already in the', 'stick-my-header-for-astra' ); ?> <strong><?php esc_html_e( 'Sticky Header', 'stick-my-header-for-astra' ); ?></strong> <?php esc_html_e( 'section, 
            make sure to', 'stick-my-header-for-astra' ); ?> <strong><?php esc_html_e( 'switch on', 'stick-my-header-for-astra' ); ?></strong> <?php esc_html_e( 'the', 'stick-my-header-for-astra' ); ?> <strong><?php esc_html_e( 'mobile interface', 'stick-my-header-for-astra' ); ?></strong> <?php esc_html_e( 'by clicking on the mobile icon so you can view the changes in realtime.
            (see the image above in the', 'stick-my-header-for-astra' ); ?> <strong><?php esc_html_e( 'Mobile/Tablette', 'stick-my-header-for-astra' ); ?></strong> <?php esc_html_e( 'section)', 'stick-my-header-for-astra' ); ?>. <br>
            <?php esc_html_e( 'So the steps are', 'stick-my-header-for-astra' ); ?> : <br>
            1- <?php esc_html_e( 'Scroll down till getting to the', 'stick-my-header-for-astra' ); ?> <strong><?php esc_html_e( 'Mobile/Tablette', 'stick-my-header-for-astra' ); ?></strong> <?php esc_html_e( 'part', 'stick-my-header-for-astra' ); ?>. <br>
            2- <?php esc_html_e( 'Check', 'stick-my-header-for-astra' ); ?> <strong><?php esc_html_e( 'Sticky Header on Mobile/Tablette', 'stick-my-header-for-astra' ); ?></strong>. <br>
            3- <?php esc_html_e( 'Save By clicking on', 'stick-my-header-for-astra' ); ?> <strong><?php esc_html_e( 'Publish', 'stick-my-header-for-astra' ); ?></strong> <?php esc_html_e( 'button (see the picture below)', 'stick-my-header-for-astra' ); ?>. <br>
        </p>
        <img class="" src="<?php echo esc_html( STICKMYHEADER_IMAGE_11_PATH ); ?>" alt="Stick My Header for Astra Customizer screenshot showing how to make a website's header sticy on mobile/tablette" >

        <div class="separator">___________________________________________________________________________________________ <br><br>
        </div> 

        <p class="text question"><strong><?php esc_html_e( 'How to make my website\'s header transparent using SH', 'stick-my-header-for-astra' ); ?> ?</strong></p>
        <p class="text">
            <?php esc_html_e( 'After Activating SH plugin, you should', 'stick-my-header-for-astra' ); ?> : <br>
            1- <?php esc_html_e( 'Hover over the Astra icon in the', 'stick-my-header-for-astra' ); ?> <strong><?php esc_html_e( 'Admin interface', 'stick-my-header-for-astra' ); ?></strong>, <?php esc_html_e( 'then click on', 'stick-my-header-for-astra' ); ?> <strong><?php esc_html_e( 'customize', 'stick-my-header-for-astra' ); ?></strong> <?php esc_html_e( '(see the picture below)', 'stick-my-header-for-astra' ); ?>. <br>
        </p>  
        <img class="" src="<?php echo esc_html( STICKMYHEADER_IMAGE_12_PATH ); ?>" alt="WordPress admin interface screenshot showing how to get to Astra theme customizer" >
        <p class="text">
            2- <?php esc_html_e( 'Click on', 'stick-my-header-for-astra' ); ?> <strong><?php esc_html_e( 'Header Builder', 'stick-my-header-for-astra' ); ?></strong> <?php esc_html_e( 'section (see the picture below)', 'stick-my-header-for-astra' ); ?>. <br>
        </p>
        <img class="" src="<?php echo esc_html( STICKMYHEADER_IMAGE_13_PATH ); ?>" alt="Astra theme customizer screenshot showing where to click on Header Builder" >
        <p class="text">
            3- <?php esc_html_e( 'Click on', 'stick-my-header-for-astra' ); ?> <strong><?php esc_html_e( 'Above Header', 'stick-my-header-for-astra' ); ?></strong> <?php esc_html_e( '(see the picture below)', 'stick-my-header-for-astra' ); ?>. <br>
        </p>     
        <img class="" src="<?php echo esc_html( STICKMYHEADER_IMAGE_14_PATH ) ; ?>" alt="Astra theme customizer screenshot showing where to click on Above Header section" >
        <p class="text">
            4- <?php esc_html_e( 'Click on', 'stick-my-header-for-astra' ); ?> <strong><?php esc_html_e( 'Design', 'stick-my-header-for-astra' ); ?></strong> <?php esc_html_e( 'tab (see the picture below)', 'stick-my-header-for-astra' ); ?>. <br>
        </p>            
        <img class="" src="<?php echo esc_html( STICKMYHEADER_IMAGE_15_PATH ); ?>" alt="Astra theme customizer screenshot showing where to click on Design tab in the Above Header section" >
        <p class="text">
            5- <?php esc_html_e( 'Click on', 'stick-my-header-for-astra' ); ?> <strong><?php esc_html_e( 'Background', 'stick-my-header-for-astra' ); ?></strong> <?php esc_html_e( 'then on', 'stick-my-header-for-astra' ); ?> <strong><?php esc_html_e( 'Clear', 'stick-my-header-for-astra' ); ?></strong> <?php esc_html_e( 'button (see the picture below)', 'stick-my-header-for-astra' ); ?>. <br>
        </p>    
        <img class="" src="<?php echo esc_html( STICKMYHEADER_IMAGE_16_PATH ); ?>" alt="Astra theme customizer screenshot showing where to click on Clear button in the Above Header section" >
        <p class="text">
            6- <?php esc_html_e( 'Click on', 'stick-my-header-for-astra' ); ?> <strong><?php esc_html_e( 'Primary Header', 'stick-my-header-for-astra' ); ?></strong> <?php esc_html_e( '(see the picture below)', 'stick-my-header-for-astra' ); ?>. <br>
        </p>    
        <img class="" src="<?php echo esc_html( STICKMYHEADER_IMAGE_17_PATH ); ?>" alt="Astra theme customizer screenshot showing where to click on Primary Header section" >
        <p class="text">
            7- <?php esc_html_e( 'Same as the', 'stick-my-header-for-astra' ); ?> <strong><?php esc_html_e( 'Above Header', 'stick-my-header-for-astra' ); ?></strong> <?php esc_html_e( 'section, click on', 'stick-my-header-for-astra' ); ?> <strong><?php esc_html_e( 'Design', 'stick-my-header-for-astra' ); ?>.</strong> <br>
            8- <?php esc_html_e( 'Same as the', 'stick-my-header-for-astra' ); ?> <strong><?php esc_html_e( 'Above Header', 'stick-my-header-for-astra' ); ?></strong> <?php esc_html_e( 'section, click on', 'stick-my-header-for-astra' ); ?> <strong><?php esc_html_e( 'Background', 'stick-my-header-for-astra' ); ?></strong> <?php esc_html_e( 'then on', 'stick-my-header-for-astra' ); ?> <strong><?php esc_html_e( 'Clear', 'stick-my-header-for-astra' ); ?></strong> <?php esc_html_e( 'button', 'stick-my-header-for-astra' ); ?>. <br>
            9- <?php esc_html_e( 'Click on', 'stick-my-header-for-astra' ); ?> <strong><?php esc_html_e( 'Below Header', 'stick-my-header-for-astra' ); ?></strong> <?php esc_html_e( '(see the picture below)', 'stick-my-header-for-astra' ); ?>. <br>
        </p>    
        <img class="" src="<?php echo esc_html( STICKMYHEADER_IMAGE_18_PATH ); ?>" alt="Astra theme customizer screenshot showing where to click on Below Header section" >
        <p class="text">
            10- <?php esc_html_e( 'Same as the', 'stick-my-header-for-astra' ); ?> <strong><?php esc_html_e( 'Above Header', 'stick-my-header-for-astra' ); ?></strong> <?php esc_html_e( 'section, click on', 'stick-my-header-for-astra' ); ?> <strong><?php esc_html_e( 'Design', 'stick-my-header-for-astra' ); ?></strong> <br>
            11- <?php esc_html_e( 'Same as the', 'stick-my-header-for-astra' ); ?> <strong><?php esc_html_e( 'Above Header', 'stick-my-header-for-astra' ); ?></strong> <?php esc_html_e( 'section, click on', 'stick-my-header-for-astra' ); ?> <strong><?php esc_html_e( 'Background', 'stick-my-header-for-astra' ); ?></strong> <?php esc_html_e( 'then on', 'stick-my-header-for-astra' ); ?> <strong><?php esc_html_e( 'Clear', 'stick-my-header-for-astra' ); ?></strong> <?php esc_html_e( 'button', 'stick-my-header-for-astra' ); ?>. <br>
            12- <?php esc_html_e( 'Save By clicking on', 'stick-my-header-for-astra' ); ?> <strong><?php esc_html_e( 'Publish', 'stick-my-header-for-astra' ); ?></strong> <?php esc_html_e( 'button', 'stick-my-header-for-astra' ); ?>. <br><br>

            <?php esc_html_e( 'For further questions, go to the', 'stick-my-header-for-astra' ); ?> <strong><?php esc_html_e( 'Support', 'stick-my-header-for-astra' ); ?></strong> <?php esc_html_e( 'tab where you\'ll find our contact details, thanks', 'stick-my-header-for-astra' ); ?>.
        </p>    
        
</div> 

<div class="content tab-support <?php if ($activeTab != 'support') {echo 'hidden';}?>">
    <br>

    <div class="notice notice-info support">
            <p> <?php esc_html_e( 'Please, if you have any issue with this plugin, or if you have any suggestion to make, contact us to WebTips email adress below, thanks', 'stick-my-header-for-astra' ); ?>.</p>
    </div>                                                                            

    <div class="support-content flex">

        <div class="contact-details">
            <br><br>                        
            <h3><?php esc_html_e( "Email Adress", 'stick-my-header-for-astra' ); ?></h3><p class="text">contact@webtips.me</p>
            <div class="separator">___________________________________________________________________________________________ <br><br>
            </div> 
            <h3><?php esc_html_e( "WebTips Website", 'stick-my-header-for-astra' ); ?></h3><p class="text"><a href="https://webtips.me">https://webtips.me</a></p>
            <div class="separator">___________________________________________________________________________________________ <br><br>
            </div> 
            <h3><?php esc_html_e( "WebTips Youtube Channel", 'stick-my-header-for-astra' ); ?></h3><p class="text"><a href="https://www.youtube.com/channel/UCl_xBbKo5BVJ_-dgOP-iEWg">WebTips Channel</a></p>
        </div>

        <div class="further-customization">
            <br><br>

            <div class="title">
                <h1><?php esc_html_e( 'For PRO Website Customization', 'stick-my-header-for-astra' ); ?></h1>
            </div>
            
            <div class="offers">
                <li><?php esc_html_e( 'Fix website bugs/issues', 'stick-my-header-for-astra' ); ?></li>
                <li><?php esc_html_e( 'Speed up website', 'stick-my-header-for-astra' ); ?></li>
                <li><?php esc_html_e( 'Website redesign', 'stick-my-header-for-astra' ); ?></li>
                <li><?php esc_html_e( 'Analyse/Optimise website', 'stick-my-header-for-astra' ); ?></li>
            </div>
            
            <br><br>
            <a href="#" class="button-link"><?php esc_html_e( 'Reach Out To Us : contact@webtips.me', 'stick-my-header-for-astra' ); ?></a>

            <br><br>
        </div>
    </div>

</div>

<div class="plugin-footer">
    <div class="banner flex">
        <div class="thank-you flex">                       
            <img class="sh-logo-banner" src="<?php echo esc_html( STICKMYHEADER_LOGO_PATH ); ?>" alt="Stick My Header for Astra plugin logo" >
            <h2><?php esc_html_e( 'Thank you for Activing Stick My Header for Astra', 'stick-my-header-for-astra' ); ?></h2>
        </div>
        <div>
            <p><strong>⭐️ <?php esc_html_e( 'Rate Our Plugin', 'stick-my-header-for-astra' ); ?>!</strong><br>
            <?php esc_html_e( 'Your feedback helps us improve and serve you better. If you enjoy using our plugin, please rate it on WordPress.org.', 'stick-my-header-for-astra' ); ?><br>
            <a href="https://wordpress.org/support/plugin/stick-my-header-for-astra/reviews/#new-post" target="_blank"><?php esc_html_e( 'Rate Now', 'stick-my-header-for-astra' ); ?></a></p>
        </div>
        <div>
            <p><strong>❤️ <?php esc_html_e( 'Love our plugin? Help us keep it going', 'stick-my-header-for-astra' ); ?>!</strong><br>
            <?php esc_html_e( 'Your donation can make a big difference. By supporting us, you enable continued development, new features, and better support.', 'stick-my-header-for-astra' ); ?><br>
            <a href="https://donorbox.org/support-webtips" target="_blank"><?php esc_html_e( 'Donate Now', 'stick-my-header-for-astra' ); ?></a></p>
        </div>
    </div>
</div>

<div id="donationModal" class="modal">
  <div class="modal-content">
    <span class="close-modal">&times;</span>
    <h1><?php esc_html_e( 'Thanks For Using Our Plugin', 'stick-my-header-for-astra' ); ?> !</h1>
    <p class="text"><?php esc_html_e( 'Enjoying our free plugin ? Consider making a donation to support its development and future improvements, we really need it', 'stick-my-header-for-astra' ); ?>.</p>
    <button class="donation-button"><?php esc_html_e( 'Donate Now', 'stick-my-header-for-astra' ); ?></button>
    <div class="flex">                
        <img class="modal-logo sh" src="<?php echo esc_html( STICKMYHEADER_LOGO_PATH ); ?>" alt="Stick My Header for Astra plugin logo">
        <img class="modal-logo webtips" src="<?php echo esc_html( STICKMYHEADER_WEBTIPS_LOGO_PATH ); ?>" alt="WebTips Logo">
    </div>
  </div>
</div>
