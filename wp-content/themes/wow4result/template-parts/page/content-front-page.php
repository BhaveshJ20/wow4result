<?php
/**
 * Displays content for front page 
 */
?> 
<!-- START SOME OF OUR CLIENTS -->
<?php 
    get_template_part('template-parts/home/home', 'client');
    get_template_part('template-parts/home/home', 'contactus'); 
?> 
<!-- END SOME OF OUR CLIENTS -->
<article id="post-<?php the_ID(); ?>" <?php post_class( 'wow4result-panel ' ); ?> > 
	<div class="panel-content">
		<div class="wrap">  
			<!-- Client end -->
			<?php //get_template_part( 'template-parts/contact/contact','talk_to_us'); ?>
			<?php //get_template_part( 'template-parts/contact/contact','us'); ?>
 
		</div><!-- .wrap -->
	</div><!-- .panel-content -->

</article><!-- #post-## -->