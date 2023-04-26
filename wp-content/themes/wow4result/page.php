<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>
<?php 
$pt_87 = 'pt-87';
if(is_general_banner_set == '1'):
    $pt_87 = '';
endif;
?>
<section class="defaultpage <?php echo $pt_87;?>">
    <div class="default-block">
        <div class="default-block-content">
            <div class="container">
             <?php
	        if (have_posts()): 
	            while (have_posts()) : the_post();
	                get_template_part( 'template-parts/page/content', 'page' );
	            endwhile;  
	        endif;
	        ?>
            </div>
        </div>
    </div>
</section>
<?php get_footer();