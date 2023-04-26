<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.2
 */

?> 
		<?php 
			$copyright = get_field('footer_text', 'option'); 
			if ($copyright): 
		?>		
		<!-- START FOOTER --> 
		<footer class="orange_bg" id="footer_section">
			<div class="container">
				<div class="copyright">
					<?php echo str_replace("%%YEAR%%", date('Y'), $copyright); ?>
				</div>
			</div>
		</footer>
		<?php
		endif; 
		?>
		<!-- END FOOTER -->
		<!-- START BACK TO TOP -->
	    <div class="container">
	        <div class="backto-top-btn">
	            <a href="javascript:void(0);" class="backto-top" title="Back To Top"><span><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/up-arrow.svg" width="20" alt="Up Arrow"></span></a>
	        </div>
	    </div>
    <!-- END BACK TO TOP --> 

    <?php 
		if ( (!wow4result_is_frontpage()) || (!is_home() && !is_front_page() ) ) :

		$talk_to_us_title = get_field('talk_to_us_title','option');
		$talk_to_us_description = get_field('talk_to_us_description','option');
		$talk_to_us_from = get_field('talk_to_us_from','option');
		?>
		<div class="modal fade" id="ContactModalCenter" tabindex="-1" role="dialog" aria-labelledby="ContactModalCenterTitle" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		        <!-- START TALK TO US -->
		        <div class="talk-to-us">
		          <?php 
		          if($talk_to_us_description) :
		            ?>
		            <div class="text-center">
		              <?php if($talk_to_us_title) : ?>
		                <div class="title">
		                  <h3 class="text-orange"><?php echo $talk_to_us_title;?></h3>
		                </div>
		                <?php 
		              endif;
		              if($talk_to_us_description) :
		                ?>
		                <p><?php echo $talk_to_us_description;?></p>
		              <?php endif; ?>
		            </div>
		          <?php endif; ?>  
		          <?php echo do_shortcode($talk_to_us_from);?>
		        </div>
		        <!-- END TALK TO US -->
		      </div>
		    </div>
		  </div>
		</div>
		<?php
		endif;
		?> 
	</div><!-- .site-content-contain -->
</div><!-- #page -->
<?php wp_footer(); ?>
</body>
</html>
