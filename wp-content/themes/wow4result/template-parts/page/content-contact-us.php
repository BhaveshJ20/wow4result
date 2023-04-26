<?php
/**
 * Displays content for Contact Us page.
 */
get_template_part('template-parts/contact/contact-us', 'map');
?>
<section class="contacus-wrap">
	<div class="container">
		<div class="row"> 
			<div class="col-lg-6">
				<div class="contactus-form">
				<?php
				get_template_part('template-parts/contact/contact-us', 'talk-to-us'); 
				?>
				</div>
			</div>
			<div class="col-lg-6">
				<?php
				get_template_part('template-parts/contact/contact-us', 'details'); 
				?>
			</div>
		</div>
	</div>
</section>