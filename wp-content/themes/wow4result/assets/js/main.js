/*-------------------------------

	STICKY_MENU.JS

-------------------------------*/
$(window).on('scroll', function () {
    var wSize = $(window).width();
    if ($(this).scrollTop() > 100) {
        $('.main-nav').addClass("sticky_animate");
    }
    else {
        $('.main-nav').removeClass("sticky_animate");
    }
});

/*-------------------------------

    MENU_COLLAPSE_REDIRECTS.JS

-------------------------------*/
/*$(document).ready(function(){
    $('.submenu').on('show.bs.collapse', function () {
     var prev_id = $(this).prev().attr('id'); 
     $("#"+prev_id).removeAttr('data-toggle');
     
        $(".submenu").each(function() {
            var sub_menu_id = $(this).attr('id');  
            var new_prev_id = $(this).prev().attr('id'); 
            if(new_prev_id != prev_id)
            {
                $("#"+new_prev_id).attr('data-toggle','collapse');
            }  
        });
     
    });
});*/
/*-------------------------------

	NAVIGATION.JS

-------------------------------*/

function openNav() {
    document.getElementById("nav").style.height = "100%";
}

function closeNav() {
    document.getElementById("nav").style.height = "0%";
}

/*-------------------------------

	BACK_TO_TOP.JS

-------------------------------*/
$(document).ready(function () {
    $(window).scroll(function () {
        if ($(this).scrollTop() > 500) {
            $('.backto-top').fadeIn();
        } else {
            $('.backto-top').fadeOut();
        }
    });

    $('.backto-top').click(function () {
        $("html, body").animate({
            scrollTop: 0
        }, 500);
        return false;
    });
});

/*-------------------------------

	BANNER_FULL_HEIGHT.JS

-------------------------------*/
$(".full-height").height($(window).height());

$(window).on('resize', function(){		

	if ($(window).width() > 767) {
		
		$(".full-height").height($(window).height());
	}
});
	
/*-------------------------------

	SCROLLBAR.JS

-------------------------------*/

/*(function($){
    $(window).on("load",function(){
        $('.scrollcontent').mCustomScrollbar({
        	// theme:"minimal"
        });
    });
})(jQuery);*/

/*-------------------------------

	CUSTOM SELECT.JS

-------------------------------*/

$('.b-select-wrap').click( function(){
    if ( $(this).hasClass('select-arrow') ) {
        $(this).removeClass('select-arrow');
    } else {
        $('.b-select-wrap').removeClass('select-arrow');
        $(this).addClass('select-arrow');    
    }
});

/*-------------------------------

	READ MORE AND READ LESS.JS

-------------------------------*/
/*$(document).ready(function(){

	$('.link-scroll').click(function(){

		if($(this).hasClass('read-more-text')){

			$(this).removeClass('read-more-text');
			$(this).addClass('read-less-text');
			$(this).text('Read Less');
			$(this).closest('.white-icon-desc').find('.half-content').hide();
			$(this).closest('.white-icon-desc').find('.full-content').show();

		}else if($(this).hasClass('read-less-text')){

			$(this).removeClass('read-less-text');
			$(this).addClass('read-more-text');
			$(this).text('Read More');
			$(this).closest('.white-icon-desc').find('.full-content').hide();
			$(this).closest('.white-icon-desc').find('.half-content').show();
			
		}
	});

})*/
/*-------------------------------

	EQUAL_HEIGHT.JS

-------------------------------*/

var height = 0;
$('.white-icon-desc h4').each(function(){
   var currentHeight= $(this).height();
    height = currentHeight > height ? currentHeight : height; 
});
$('.white-icon-desc h4').css('height', height); 
$(window).on("load",function(){
	if ($(window).width() < 768) {
			$('.white-icon-desc h4').height('auto');
	}
});

