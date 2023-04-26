<?php
/*
* Plugin Name: Code implemented By Niyati (Maven)
* Description: Custom Coding <strong> (PLEASE DON'T REMOVE THIS PLUGIN)</strong>
* Author: <strong>Niyati Parekh (Maven)</strong>
*/
remove_action('wp_head', 'wp_generator');
function get_wow_sub_menu($theme_location,$parent_menu_id,$depth = true)
{
	if ( ($theme_location) && ($locations = get_nav_menu_locations()) && isset($locations[$theme_location]) ) {

        $menu = get_term( $locations[$theme_location], 'nav_menu' );
        $menu_items = wp_get_nav_menu_items($menu->term_id);  

        $nav_menu_item_list = array(); 
        foreach( $menu_items as $menu_item ) 
        { 
            if ( $parent_menu_id == $menu_item->menu_item_parent )
            {
            	$nav_menu_item_list[] = $menu_item; 
            	if ( $depth ) 
                { 
                   if ( $children = get_wow_sub_menu($theme_location,$menu_item->ID))
                   {
                      $nav_menu_item_list = array_merge( $nav_menu_item_list, $children );
                  }
              }
          } 
      } 

  }  
  return $nav_menu_item_list;
} 

if (function_exists('acf_add_options_page')) 
{
    acf_add_options_page(array(
        'page_title' => 'Theme Settings',
        'menu_title' => 'Theme Settings',
        'menu_slug' => 'wow-common-settings',
        'capability' => 'edit_posts',
        'redirect' => false
    ));

    acf_add_options_page(array(
        'page_title' => 'Banner Settings',
        'menu_title' => 'Banner Settings',
        'menu_slug' => 'wow-banner-settings', 
        'capability' => 'edit_posts',
        'redirect' => true
    ));

    acf_add_options_sub_page(array(
        'page_title'    => 'Home',
        'menu_title'    => 'Home',
        'menu_slug'     => 'home-banner',
        'parent_slug'   => 'wow-banner-settings',
        'redirect'      => false 
    ));

    acf_add_options_sub_page(array(
      'page_title' 	=> 'What we offer',
      'menu_title' 	=> 'What we offer',
      'menu_slug' 	=> 'what-we-offer-banner',
      'parent_slug' 	=> 'wow-banner-settings',
      'redirect' 		=> false 
  ));

    acf_add_options_sub_page(array(
        'page_title'    => 'About Us',
        'menu_title'    => 'About Us',
        'menu_slug'     => 'about-us-banner',
        'parent_slug'   => 'wow-banner-settings',
        'redirect'      => false 
    ));

    acf_add_options_sub_page(array(
      'page_title' 	=> 'Portfolio',
      'menu_title' 	=> 'Portfolio',
      'menu_slug' 	=> 'portfolio-banner',
      'parent_slug' 	=> 'wow-banner-settings',
  ));

    acf_add_options_sub_page(array(
        'page_title'    => 'Resource Centre',
        'menu_title'    => 'Resource Centre',
        'menu_slug'     => 'resource-centre-banner',
        'parent_slug'   => 'wow-banner-settings',
    ));

    acf_add_options_sub_page(array(
        'page_title'    => '404 page',
        'menu_title'    => '404 page',
        'menu_slug'     => '404-banner',
        'parent_slug'   => 'wow-banner-settings',
    ));

    acf_add_options_sub_page(array(
        'page_title'    => 'Thank you page',
        'menu_title'    => 'Thank you page',
        'menu_slug'     => 'thank-you-banner',
        'parent_slug'   => 'wow-banner-settings',
    ));
} 

function maven_custom_meta() 
{
    add_meta_box( 'maven_meta', __( 'Want to Make this post as Featured Post ??', 'maven-textdomain' ), 'maven_meta_callback', 'post' );
}
function maven_meta_callback( $post ) 
{
    $featured = get_post_meta( $post->ID );
    ?> 
    <p>
      <div class="sm-row-content">
         <label for="meta-checkbox">
            <input type="checkbox" name="meta-checkbox" id="meta-checkbox" value="yes" <?php if ( isset ( $featured['_is_featured'] ) ) checked( $featured['_is_featured'][0], 'yes' ); ?> />
            <?php _e( 'Yes', 'maven-textdomain' )?>
        </label>

    </div>
</p> 
<?php
}
add_action( 'add_meta_boxes', 'maven_custom_meta' );
function maven_post_meta_save( $post_id )
{

    // Checks save status
    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'sm_nonce' ] ) && wp_verify_nonce( $_POST[ 'sm_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';

    // Exits script depending on save status
    if ( $is_autosave || $is_revision || !$is_valid_nonce ) 
    {
        return;
    }

    delete_post_meta($post_id, '_is_featured');
	 // Checks for input and saves

    $newStatus = 'no'; 
    if( isset( $_POST[ 'meta-checkbox' ] ) ) 
    {
      $newStatus = 'yes';
  }  
  add_post_meta($post_id, '_is_featured', $newStatus); 
}
add_action( 'save_post', 'maven_post_meta_save' );

add_action( 'init', 'maven_unregister_tags' );
function maven_unregister_tags() {
    unregister_taxonomy_for_object_type( 'post_tag', 'post' );
} 
add_action( 'init', 'maven_unregister_categories' );
function maven_unregister_categories() {
    unregister_taxonomy_for_object_type( 'category', 'post' );
    unregister_taxonomy('aiovg_categories');
}
add_action( 'init', 'maven_remove_post_type_support', 10 );
function maven_remove_post_type_support() {
    remove_post_type_support( 'post', 'editor');
	// remove_post_type_support( 'post', 'thumbnail');
    remove_post_type_support( 'post', 'excerpt'); 
}  

function my_acf_init() {
	$key = get_field('map_api_key', 'option');
	acf_update_setting('google_api_key', $key);
}
add_action('acf/init', 'my_acf_init');

add_filter('body_class', 'custom_class');
function custom_class($classes) {

	if ( ( wow4result_is_frontpage()) || ( is_home() && is_front_page() ) ) 
	{
         $classes[] = 'homepage';   
    }
     else
    {
        $classes[] = 'innerpage';   
    }

    if(is_page('contact-us'))
    {
        $classes[] = 'contactuspage';
    }
    if(is_404() || is_page('thank-you'))
    {
        $classes[] = 'notfound-page';
    }
return $classes;
}

function youtubeEmbedFromUrl($youtube_url){
    $vid_id = extractUTubeVidId($youtube_url);
    return generateYoutubeEmbedCode($vid_id);
}

function extractUTubeVidId($url){
    /*
    * type1: http://www.youtube.com/watch?v=H1ImndT0fC8
    * type2: http://www.youtube.com/watch?v=4nrxbHyJp9k&feature=related
    * type3: http://youtu.be/H1ImndT0fC8
    * type4: https://www.youtube.com/embed/H1ImndT0fC8
    */
    $vid_id = "";
    $flag = false;
    if(isset($url) && !empty($url)){
        /*case1 and 2*/
        $parts = explode("?", $url);
        if(isset($parts) && !empty($parts) && is_array($parts) && count($parts)>1){
            $params = explode("&", $parts[1]);
            if(isset($params) && !empty($params) && is_array($params)){
                foreach($params as $param){
                    $kv = explode("=", $param);
                    if(isset($kv) && !empty($kv) && is_array($kv) && count($kv)>1){
                        if($kv[0]=='v'){
                            $vid_id = $kv[1];
                            $flag = true;
                            break;
                        }
                    }
                }
            }
        }
        
        /*case 3*/
        if(!$flag){
            $needle = "youtu.be/";
            $pos = null;
            $pos = strpos($url, $needle);
            if ($pos !== false) {
                $start = $pos + strlen($needle);
                $vid_id = substr($url, $start, 11);
                $flag = true;
            }
        }
        /*case 4*/
        if(!$flag){
            $needle = "www.youtube.com/embed/";
            $pos = null;
            $pos = strpos($url, $needle);
            if ($pos !== false) {
                $start = $pos + strlen($needle);
                $vid_id = substr($url, $start, 11);
                $flag = true;
            }
        }
    }
    return $vid_id;
}
function generateYoutubeEmbedCode($vid_id){ 
    $html = '<iframe class="embed-responsive-item" width="100%" height="auto"  src="http://www.youtube.com/embed/'.$vid_id.'?rel=0" frameborder="0" allow="encrypted-media" allowfullscreen></iframe>';
    return $html;
}


add_action('wp_ajax_get_video', 'get_video');
add_action('wp_ajax_nopriv_get_video', 'get_video');
function get_video() {

    $response = array(); 
    $html = '';
    //$video_per_page = get_field('video_per_page', 'option');
    //$video_per_page = ($video_per_page) ? $video_per_page : -1;
    $video_per_page = $_POST['video_per_page'];

    $page = intval($_POST['page']);
    $limitstart = intval($page - 1) * $video_per_page;
    $total_clients = intval($_POST['total_clients']);
    /*$count_args = array(
        'post_type' => 'wow_video',
        'post_status' => 'publish', 
        'orderby' => date,
        'order' => 'DESC' 
    );

    $count_query = new WP_Query($count_args);

    $total_clients = $count_query->found_posts;*/

    $max_pages = ceil($total_clients / $video_per_page); 

    $args = array(
        'posts_per_page' => $video_per_page,
        'offset' => $limitstart,
        'post_type' => 'wow_video',
        'post_status' => 'publish' 
    );
    $the_query = new WP_Query($args); 

    if ($the_query->have_posts()): 

        while ($the_query->have_posts()):
            $the_query->the_post();

            $video_id    = get_the_ID();
            $video_title = get_the_title();  
            $video_desc = get_field('video_description',$video_id);
            $video_type = get_field('video_type',$video_id);
            $video_html = '';
            $video_url = '';

            if($video_type == 'Youtube'):
                $video_url = get_field('video_url',$video_id); 
                $video_html = youtubeEmbedFromUrl($video_url,'100%','auto'); 
            endif;  
            if($video_type == 'Custom'):
                $video_url = get_field('select_video',$video_id);
                $video_html = '<video src="'.$video_url.'" controls></video>';
            endif;   

            $html .= '<div class="col-lg-4 col-md-6 mb-30">';
                $html .= '<div class="resource-block">';
                    if($video_url):
                        $html .= '<div class="resource-top">'; 
                            $html .= '<div class="embed-responsive embed-responsive-16by9">';
                                $html .= $video_html;
                            $html .= '</div>';
                        $html .= '</div>';
                    endif;  
                    $html .= '<div class="resource-text">';
                        $html .= '<div class="text-center">';
                            $html .= '<h4>'.$video_title.'</h4>';
                            $html .= '<p>'.$video_desc.'</p>';
                        $html .= '</div>';
                    $html .= '</div>'; 
                $html .= '</div>';
            $html .= '</div>'; 
        endwhile;
        wp_reset_postdata();
        wp_reset_query(); 
    else:
        $html = '<p>No records found!</p>';
    endif; 
    $response['html'] = $html;
   // $response['total_clients'] = $total_clients;
    $response['current_page'] = $page;
    $response['next_page'] = intval($page + 1);
    $response['max_pages'] = $max_pages;
    echo json_encode($response); 
    die();
}
if (function_exists('fly_add_image_size')) {
    fly_add_image_size('top-banner', 2878, 2127, true); 
    fly_add_image_size('about-us-banner', 2882, 839, true);  
    fly_add_image_size('about-us-mission', 950, 770, true); 
    fly_add_image_size('what-we-offer-banner', 2877, 843, true); 
    fly_add_image_size('what-we-offer-quote-banner', 1920, 397, true);  
    fly_add_image_size('portfolio-banner', 2883, 837, true);
    fly_add_image_size('resource-banner', 2883, 875, true);
    fly_add_image_size('blog-banner', 370, 370, true);
    fly_add_image_size('team-banner', 1922, 635, true);
    fly_add_image_size('404-banner', 3000, 1684, true);
    fly_add_image_size('client', 130, 130, true);

    fly_add_image_size('infromation-sheet', 146, 211);


    fly_add_image_size('campaigns-left', 336, 179, true);
    fly_add_image_size('campaigns-left-2x', 671, 387, true);
    fly_add_image_size('campaigns-left-3x', 1007, 581, true);
    fly_add_image_size('campaigns-right', 269, 253, true);
    fly_add_image_size('campaigns-right-2x', 538, 506, true);
    fly_add_image_size('campaigns-right-3x', 807, 759, true);
    

    fly_add_image_size('mobile-app-left', 246, 216, true);
    fly_add_image_size('mobile-app-left-2x', 493, 430, true);
    fly_add_image_size('mobile-app-left-3x', 742, 650, true);
    fly_add_image_size('mobile-app-right', 283, 233, true);
    fly_add_image_size('mobile-app-right-2x', 567, 467, true);
    fly_add_image_size('mobile-app-right-3x', 849, 701, true);


    fly_add_image_size('home-client', 62, 62, false);
    fly_add_image_size('home-client-2x', 124, 124, true);
    fly_add_image_size('home-client-3x', 186, 186, true);
    fly_add_image_size('team-thumb', 286, 286, true);
    fly_add_image_size('featured-post-thumb', 960, 465, true);
    fly_add_image_size('post-thumb', 290, 290, true);

    fly_add_image_size('author-pic', 147, 147, true);
    fly_add_image_size('author-pic-2x', 294, 293, true);
    fly_add_image_size('author-pic-3x', 441, 440, true);
}
function get_insights(){

    $response = array();
    $html = '';
    $limitstart = $_POST['limitstart'];
    $limit = $_POST['limit'];
    $sort_by = $_POST['sort_by'];
    $order_by = 'date';
    $order= 'DESC';

    if($sort_by == 'date_desc'):
        $order_by = 'date';
        $order= 'DESC';
    elseif($sort_by == 'alpha_asc'):
        $order_by = 'title';
        $order= 'ASC';
    elseif($sort_by == 'alpha_desc'):
        $order_by = 'title';
        $order= 'DESC';
    else:
        $order_by = 'date';
        $order= 'DESC';
    endif;

    $meta_query = array(
        'relation' => 'AND',
        array(
            'key' => '_is_featured',
            'compare' => '!=',
            'value' =>'yes',
        ),
    );

    $args = array(
        'posts_per_page' => $limit,
        'offset' => $limitstart,
        'post_type' => 'post',
        'post_status' => 'publish',
        'meta_query' => $meta_query,
        'orderby' => $order_by,
        'order' => $order
    );

    $record_found = 0;

    $the_query = new WP_Query($args);
    // echo $the_query->request;exit;
    if($the_query->have_posts()):

         $record_found = 1;

        while($the_query->have_posts()):
            $the_query->the_post();

            $thumb_id = get_post_thumbnail_id();
            $post_thumb = fly_get_attachment_image_src($thumb_id, 'post-thumb');
            $post_thumb = ($post_thumb['src']) ? $post_thumb['src'] : get_stylesheet_directory_uri().'/assets/images/blog_img.jpg';

            $html .= '<div class="col-lg-4 col-md-6">';
            $html .= '<div class="blog-box">';
            $html .= '<a href="'.get_the_permalink().'" title="'.get_the_title().'">';
            $html .= '<div class="blog-img">';
            if($post_thumb):
                $html .= '<img class="img-full" src="'.$post_thumb.'" alt="'.get_the_title().'">';
            endif;
            $html .= '<div class="blog-img-text">';
            $html .= '<h3>'.get_the_title().'</h3>';
            $html .= '<p>'.get_the_date('d | m | y').'</p>';
            $html .= '</div>';
            $html .= '</div>';
            $html .= '</a>';
            $html .= '<div class="blog-text">';
            $html .= '<p>'.get_field('blog_short_desctiption').'</p>';
            $html .= '<a href="'.get_the_permalink().'" class="btn btn-orange" title="Read More">READ MORE</a>';
            $html .= '</div>';
            $html .= '</div>';
            $html .= '</div>';
        endwhile;
    else:
        $html = '<p>No records found!</p>';
    endif;
    $response['html'] =  $html;
    $response['record_found'] =  $record_found;

    
    echo json_encode($response);
    exit;
}
add_action('wp_ajax_get_insights', 'get_insights');
add_action('wp_ajax_nopriv_get_insights', 'get_insights');
?>