<?php
/*
 *
 * Template Name: The Wow Way
 *
 */ 
get_header();
?>
<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
        <?php
        if (have_posts()):
            while (have_posts()) : the_post();
                get_template_part('template-parts/page/content', 'wow-way');
            endwhile;
        endif;
        ?>
    </main><!-- #main -->
</div><!-- #primary -->
<?php get_footer(); ?>