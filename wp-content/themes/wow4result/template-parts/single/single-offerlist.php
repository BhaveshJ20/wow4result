<?php 
$what_we_offer_page_title = get_field('what_we_offer_page_title','option'); 
$what_we_offer_page = get_page_by_title( 'What We Offer', '', 'nav_menu_item' );
$what_we_offer_menu_id = $what_we_offer_page->ID; 

$what_we_offer_sub_menu_items = get_wow_sub_menu('top',$what_we_offer_menu_id);  
$total_what_we_offer_submenu_count = count($what_we_offer_sub_menu_items);
$current_page_id = get_the_ID(); 
$ws=1;

if(count($what_we_offer_sub_menu_items) > 0):
	?>
	<div class="contentarea">
        <div class="container">
            <div class="tablist mb-5">
                <ul class="clearfix">
					<?php
					foreach( $what_we_offer_sub_menu_items as $sub_menu_key=>$sub_menu_val):
						$what_we_offer_title = $sub_menu_val->title;
						$what_we_offer_url = $sub_menu_val->url;
						$what_we_offer_submenu_id = $sub_menu_val->object_id;
				 
						$active_class = '';
						if($current_page_id == $what_we_offer_submenu_id)
							$active_class = 'class="active"'; 

						?>
						<li <?php echo $active_class;?>>
							<a href="<?php echo $what_we_offer_url;?>"><?php echo $what_we_offer_title?></a>
						</li>
					<?php endforeach; ?>
					</ul>
            </div>
        </div>
    </div>
<?php	 
endif;  
wp_reset_query();
wp_reset_postdata();
?>