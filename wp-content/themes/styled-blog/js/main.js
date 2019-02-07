jQuery(window).load(function() {
    // Animate loader off screen
    jQuery(".bazz_loader").fadeOut("slow"); 
  });


jQuery(document).ready(function($){
// jQuery script for toggle menu

   jQuery(function($) {
            $('ul.nav-menu').addClass('navmenu');
            var children_link = $('ul.navmenu').find('li.menu-item-has-children > a');
            var children_link_main = $('ul.navmenu').find('li.menu-item-has-children');
            $(children_link).prepend('<i class="fa fa-plus"></i> &nbsp');

            $(children_link_main).find('i').toggle(function() {
                    $(this).removeClass('fa-plus');
                    $(this).addClass('fa-minus');
                    $("ul.sub-menu li").show();
                    $(".styled_blog__navigation--style li.menu-item-has-children").removeClass('sub_menu_show');
                    $(".styled_blog__navigation--style li.menu-item-has-children").removeAttr('style');
                    
                    var newheight = $(this).parent().parent().height();
                    var sub_menu_height = $(this).parent().parent().find('.styled_blog-sub-menu-wrap ul').height();
                    $(".styled_blog__navigation--style li.menu-item-has-children").removeAttr('style');
                    $(this).parent().parent().css({'height':newheight + sub_menu_height});
                    $(this).parent().parent().addClass('sub_menu_show'); 
            },
            function() {
                    $(this).removeClass('fa-minus');
                    $(this).addClass('fa-plus');
                    $("ul.sub-menu li").hide();
                    $(".styled_blog__navigation--style li.menu-item-has-children").removeClass('sub_menu_show');
                    $(".styled_blog__navigation--style li.menu-item-has-children").removeAttr('style');
            });

            $('ul.sub-menu > li a').click(function() {
                var href = $(this).attr('href'); 
                window.location.replace(href);
            });
            $('.menu-toggle').click(function(){
                $('.nav-menu').css({"overflow":"scroll"});
            });

            var count = 0;
            var last, diff
            $( 'li.menu-item-has-children > a' ).click(function( event  ) {
                diff = event.timeStamp - last;
                count += 1;
                if ( count > 1 && diff < 1000 ) {
                    var href_parent = $(this).attr("href");
                    location.href = href_parent;
                } else {
                    $('li.menu-item-has-children > a').click(function ( event ) {
                    event.preventDefault();
                    });
                }
                last = event.timeStamp;

            });

    });


	$(".styled_blog__latest__ticker--message").lightSlider({
		item: 1,
        vertical: true,
       loop: true,
        verticalHeight: 46,
        pager: false,
        enableTouch: false,
        enableDrag: false,
        auto: true,
        controls: true,
        speed: 1350,
        adaptiveHeight:true,
        prevHtml: '<i class="fa fa-chevron-left"></i>',
        nextHtml: '<i class="fa fa-chevron-right"></i>',
        responsive : [
            {
                breakpoint:640,
                settings: {
                    verticalHeight :46,
                  }
            },
            ]
    });

    // For masonary in category page
     // set the container that Masonry will be inside of in a var
    var container = document.querySelector('.styled_blog_masonry_wrap');
    if(container){
        //create empty var msnry
        var msnry;
        // initialize Masonry after all images have loaded
        imagesLoaded( container, function() {
          msnry = new Masonry( container, {
            columnWidth: '.styled_blog_masonry_item',
            itemSelector: '.styled_blog_masonry_item',
            originLeft: 'true',
            percentPosition: true,
            gutter: 0
          });
        });
    }
// aos animation init/*

window.addEventListener('load', AOS.refresh);
    AOS.init({
      disable: 'mobile',
      easing: 'ease-in-sine',
      duration: 300,
      once: true,
    });


//Scroll To Top
  var window_height = $(window).height();
  var window_height = (window_height) + (50);
$(window).scroll(function() {
    var scroll_top = $(window).scrollTop();
    if (scroll_top > window_height) {
        $('.styled_blog_move_to_top').show();
    }
    else {
        $('.styled_blog_move_to_top').hide();   
    }
});
    
$('.styled_blog_move_to_top').click(function(){
    $('html, body').animate({scrollTop:0}, 'slow');
    return false; 
});


$('.menu-toggle').click(function(){
    $('body').toggleClass('bodyfixed');
});



});

