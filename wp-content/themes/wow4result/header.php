<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials  
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="profile" href="http://gmpg.org/xfn/11">
  <link rel="shortcut icon" href="<?php echo get_field('favicon_icon', 'option'); ?>" sizes="any" type="image/png">

  <title>WOW <?php wp_title(); ?></title>
  <?php wp_head(); ?>   
  <?php if(WOW_HOSTNAME == "wow4result.deployme.co.za"):?>
  <script type='text/javascript'>
	(function (d, t) {
	  var bh = d.createElement(t), s = d.getElementsByTagName(t)[0];
	  bh.type = 'text/javascript';
	  bh.src = 'https://www.bugherd.com/sidebarv2.js?apikey=bbyljkwr4jorrduhdkl4ua';
	  s.parentNode.insertBefore(bh, s);
	  })(document, 'script');
  </script>
  <?php endif; ?>
</head>

<body <?php body_class(); ?>>
	<!-- START HEADER -->
  <header class="main-nav">
    <div class="container">
     <div class="d-flex">
      <div class="header-logo">
       <?php 
       $logo = get_field('logo', 'option'); 
       ?> 
       <a href="<?php echo get_site_url(); ?>"><img src="<?php echo $logo['url']; ?>" width="138" alt="<?php bloginfo('title'); ?>" title="<?php bloginfo('title'); ?>"></a>
     </div>
     <div class="header-menu ml-auto">
      <!-- Button trigger modal -->
      <?php 

      $header_menu_coll_class = '';

      if(!is_page('contact-us') && (!wow4result_is_frontpage())) :  
        $header_menu_coll_class = ' class="ml-5" ';
       ?>
     <button type="button" class="btn btn-orange btn-talk-us" data-toggle="modal" data-target="#ContactModalCenter">
       Talk to Us
     </button>
     <?php
   endif;
   ?>
   <a onClick="openNav()" href="javascript:void(0)" <?php echo $header_menu_coll_class; ?>><span></span><span></span><span></span></a>
 </div> 
</div>
</div>

</header> 
<div id="nav" class="nav-overlay">
  <a href="javascript:void(0)" class="close-btn" onClick="closeNav()"><img src="<?php echo bloginfo('template_url').'/assets/images/close.svg';?>"></a>
  <div class="nav-overlay-content">
    <p>Menu</p>
    <?php get_template_part( 'template-parts/navigation/navigation', 'top' ); ?>  
  </div>
</div>	
<!-- END HEADER -->
<!-- START BANNER -->
<?php get_template_part( 'template-parts/header/header', 'banner' ); ?> 
<!-- END BANNER -->
<div class="site-content-contain">
  <div id="content" class="site-content">