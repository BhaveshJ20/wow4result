<?php
/**
 * Displays header banner on all pages
 */
global $wp_query;
if ( $wp_query->is_posts_page ) :
	get_template_part('template-parts/banner/banner', 'posts'); 
elseif ( ( wow4result_is_frontpage()) || ( is_home() && is_front_page() ) ) :
	get_template_part('template-parts/banner/banner', 'home'); 
else :
	if (is_singular('our_offering')):  
		get_template_part('template-parts/banner/banner', 'what-we-offer');  
	elseif(is_page('about-us')) :
		get_template_part('template-parts/banner/banner', 'about-us'); 
	elseif(is_page('team')) :
		get_template_part('template-parts/banner/banner', 'team'); 	
	elseif(is_page( array( 'clients', 'campaigns', 'mobile-apps' ) )) :
 		get_template_part('template-parts/banner/banner', 'portfolio');
 	elseif(is_page( array('video','the-wow-way','information-sheets' ) )) :
 		get_template_part('template-parts/banner/banner', 'resource-centre'); 
 	elseif(is_page('contact-us')) : 
 	elseif(is_404()):
 		get_template_part('template-parts/banner/banner', '404'); 
 	elseif(is_page('thank-you')):
 		get_template_part('template-parts/banner/banner', 'thank-you'); 
	else:  
		echo "GEneral";
 		get_template_part('template-parts/banner/banner', 'general');		 
	endif;
endif; 
?>
<?php // get_template_part( 'template-parts/contact/contact', 'talk_to_us' ); ?>
<!-- // INNER BANNER -->