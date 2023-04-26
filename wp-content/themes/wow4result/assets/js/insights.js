var xhr;
    jQuery(document).ready(function () { 
    	jQuery('#limitstart').val(0);
		jQuery('#insight_page').val(1);
		loaddata(); 

		jQuery('#sort_by').change(function(){ 
			jQuery("#load_more_button").remove();
			jQuery('#limitstart').val(0);
			jQuery('#insight_page').val(1);
			jQuery('#list_insights').html('');
			loaddata();
		}); 
    });
    function loaddata() {
    	jQuery('#loader').show(); 
       	var sort_by = jQuery('#sort_by').val();        
        var ajaxurl = jQuery('#ajax_url').val();
        var limitstart = jQuery('#limitstart').val();
        var limit = jQuery('#limit').val();
        var page = jQuery('#insight_page').val();
        var total = jQuery('#total').val();
        var max_pages = jQuery('#max_pages').val();

        var data = {
            'action': 'get_insights',
            'sort_by': sort_by,            
            'limitstart': limitstart,
            'limit' : limit
        };
        if (xhr && xhr.readyState != 4 && xhr.readyState != 0) {
            xhr.abort();
        }
        xhr = jQuery.post(ajaxurl, data, function (response) {
           if(response){
           	var res = JSON.parse(response);
           	jQuery('#list_insights').append(res.html);
             
            if(page > 1)
	        {
	        	jQuery("#load_more_button").remove();
	        } 
	        if(max_pages > 1)
        	{
        		var load_more_html = '';
		        load_more_html += '<div class="text-center mb-5" id="load_more_button">';
		            load_more_html += '<a href="javascript:loaddata();" class="btn btn-white btn-medium">Load More </a>';
		        load_more_html += '</div>'; 
		        $("#loader").after(load_more_html); 
        	}	
        	if(page ==  max_pages)
	        {
	        	jQuery("#load_more_button").remove();
	        } 

            if(res.record_found == 1)
            {
    	        var current_page = 0;
    	        current_page = parseInt(page)+parseInt(1); 
    	        jQuery('#insight_page').val(current_page); 

    	        var new_limitstart = 0;
               	new_limitstart = parseInt(limitstart) + parseInt(limit);
                jQuery('#limitstart').val(new_limitstart); 
            }    
            if(res.record_found == 0)
            {
                $("#list_insights"). removeAttr("class");
            }

            jQuery('#loader').hide();
           }
        });
    }