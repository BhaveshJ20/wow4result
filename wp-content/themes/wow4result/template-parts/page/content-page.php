<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?>
<div class="heading">
    <div class="title"><h2 class="text-orange"><?php the_title();?></h2></div>
</div>
<div>
	<?php the_content(); ?>
</div>