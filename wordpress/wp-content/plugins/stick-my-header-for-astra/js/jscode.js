jQuery(document).ready(function($) {         //wrapper

    
    $('a[href="#welcome"]').on('click', function (t) {        
        $('.nav-tab-wrapper a').removeClass('nav-tab-active');
        $('.nav-tab-wrapper a[href="#welcome"]').addClass('nav-tab-active');
        $('div.content').hide();
        $('div.tab-welcome').show();
    });

    $('a[href="#documentation"]').on('click', function (t) {        
        $('.nav-tab-wrapper a').removeClass('nav-tab-active');
        $('.nav-tab-wrapper a[href="#documentation"]').addClass('nav-tab-active');
        $('div.content').hide();
        $('div.tab-documentation').show();
    });

    $('a[href="#support"]').on('click', function (t) {         
        $('.nav-tab-wrapper a').removeClass('nav-tab-active');
        $('.nav-tab-wrapper a[href="#support"]').addClass('nav-tab-active');
        $('div.content').hide();
        $('div.tab-support').show();
    });

    $("button.close-alert").on("click", function (t) {       
        $(this).parent().fadeOut();
    });

    //----------- Donation Modal JS ------------
      
    var modal = document.getElementById("donationModal");      // Get the modal

    
    setTimeout(function() {      
        modal.style.display = "block";
    }, 3000);

    $("span.close-modal").on("click", function (t) {       
        modal.style.display = "none";
    });

    $("button.donation-button").on("click", function (t) { 
        window.location.href = 'https://donorbox.org/support-webtips';
    });

    window.onclick = function(event) {          
        if (event.target == modal) {
        modal.style.display = "none";
        }
    };

    //------------------------------------

    $("button.go-to-customizer").on("click", function (t) {        
        window.location.href = ash_ajax_obj.stickmyheader_section_customizer_url; 
    }); 

    $("button.go-to-video").on("click", function (t) {        
        window.location.href = 'https://www.youtube.com/watch?v=VTieXiRE0_4'; 
    });
    //----------- Rate And Donate Banner ------------

    var url = window.location.href;        

    if ( url.includes("page=webtips-stick-my-header-astra") ) {             
        $("div.notice-ash").remove();
        $("div.notice").hide(); 
        $("div.notice.notice-info.support").show(); 
    }


} );