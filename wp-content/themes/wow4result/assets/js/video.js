var xhr;
$(document).ready(function () {  
	getVideos(1); 
});
function getVideos(page) {
    $('#loader').show(); 

    var ajaxurl = $('#ajaxurl').val();
    if (xhr && xhr.readyState != 4 && xhr.readyState != 0) {
        xhr.abort();
    }
 
    data = {
        action: 'get_video', 
        page: page, 
        video_per_page : $('#video_per_page').val(),
        total_clients : $('#total_clients').val(),
    };
    xhr = jQuery.post(ajaxurl, data, function (response) { 
        var data = JSON.parse(response)

        $(data.html).appendTo("#video-list");  
        if(data.current_page > 1)
        {
        	$("#load_more_button").remove();
        } 
        if(data.max_pages > 1)
        {
        	var load_more_html = '';
	        load_more_html += '<div class="text-center mb-5" id="load_more_button">';
	            load_more_html += '<a href="javascript:getVideos('+data.next_page+');" class="btn btn-white btn-medium">Load More </a>';
	        load_more_html += '</div>';
	       // $("#video-list").after(load_more_html); 
	        $("#loader").after(load_more_html); 
        } 
        if(data.current_page ==  data.max_pages)
        {
        	$("#load_more_button").remove();
        } 
        $('#loader').hide();
    }); 
}

 
$('.client_loadmore').click(function(){

	var button = $(this),
	    data = {
		'action': 'get_video',
		'query': wow_loadmore_params.posts, // that's how we get params from wp_localize_script() function
		'page' : wow_loadmore_params.current_page
	};

	$.ajax({
		url : wow_loadmore_params.ajaxurl, // AJAX handler
		data : data,
		type : 'POST',
		beforeSend : function ( xhr ) {
			button.text('Loading...'); // change the button text, you can also add a preloader image
		},
		success : function( data ){
			if( data ) { 
				button.text( 'Read More posts' ).prev().before(data); // insert new posts
				wow_loadmore_params.current_page++;

				if ( wow_loadmore_params.current_page == wow_loadmore_params.max_page ) 
					button.remove(); // if last page, remove the button

				// you can also fire the "post-load" event here if you use a plugin that requires it
				// $( document.body ).trigger( 'post-load' );
			} else {
				button.remove(); // if no data, remove the button as well
			}
		}
	});
});