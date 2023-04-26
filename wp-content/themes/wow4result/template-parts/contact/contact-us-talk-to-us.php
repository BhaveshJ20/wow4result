<?php
/**
 * Displays Talk to Us
 */
?>
<?php
$talk_to_us_title = get_field('talk_to_us_title','option');
$talk_to_us_description = get_field('talk_to_us_description','option');
$talk_to_us_from = get_field('talk_to_us_from','option');
?>

<div class="talk-to-us">
	<div class="text-center">
		<?php if($talk_to_us_title):?>
			<div class="title"><h3 class="text-orange"><?php echo $talk_to_us_title; ?></h3></div>
		<?php endif;?>
		<?php if($talk_to_us_description):?>
			<p><?php echo $talk_to_us_description; ?></p>
		<?php endif;?>
	</div>
	<?php echo do_shortcode($talk_to_us_from);?> 
</div>