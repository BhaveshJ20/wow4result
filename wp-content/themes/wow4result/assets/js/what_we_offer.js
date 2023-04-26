(function($){
    $(window).on("load",function(){
        $('.scrollcontent').mCustomScrollbar({
        	// theme:"minimal"
        });
    });
})(jQuery);
function read_more(id){
	$('#half_'+id).hide();
	$('#full_'+id).show();

	$("#read_button_link_"+id).removeClass('read-more-text');
	$("#read_button_link_"+id).addClass('read-less-text');	
	$("#read_button_link_"+id).attr('onclick','read_less("'+id+'")');
	$("#read_button_link_"+id).text('Read Less');
}
function read_less(id){
	$('#full_'+id).hide();
	$('#half_'+id).show();
	$("#read_button_link_"+id).removeClass('read-less-text');
	$("#read_button_link_"+id).addClass('read-more-text');
	$("#read_button_link_"+id).attr('onclick','read_more("'+id+'")');	
	$("#read_button_link_"+id).text('Read More');
}
$(document).ready(function(){

	// $('.link-scroll').click(function(){

	// 	if($(this).hasClass('read-more-text')){

	// 		$(this).removeClass('read-more-text');
	// 		$(this).addClass('read-less-text');
	// 		$(this).text('Read Less');
	// 		$(this).closest('.white-icon-desc').find('.half-content').hide();
	// 		$(this).closest('.white-icon-desc').find('.full-content').show();

	// 	}else if($(this).hasClass('read-less-text')){

	// 		$(this).removeClass('read-less-text');
	// 		$(this).addClass('read-more-text');
	// 		$(this).text('Read More');
	// 		$(this).closest('.white-icon-desc').find('.full-content').hide();
	// 		$(this).closest('.white-icon-desc').find('.half-content').show();
			
	// 	}
	// });

});