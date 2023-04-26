<?php
/**
 * Displays content for Portfolio 
 */ 

$mypost = get_page_by_title( 'Portfolio', '', 'nav_menu_item' );
$parent_menu_id = $mypost->ID;   

$sub_menu_items = get_wow_sub_menu('top',$parent_menu_id);  
$total_submenu_count = count($sub_menu_items);

$current_page_id = get_the_ID(); 
if(count($sub_menu_items) > 0):
?>
<div class="container">
    <div class="tablist mb-5">
        <ul class="clearfix">
        	<?php
        	foreach( $sub_menu_items as $sub_menu_key=>$sub_menu_val):  
				$title = $sub_menu_val->title;
				$url = $sub_menu_val->url;
				$submenu_id = $sub_menu_val->object_id;
				$portfolio_active_class = '';
				if($current_page_id == $submenu_id)
					$portfolio_active_class = 'class="active"';
				?> 
				<li <?php echo $portfolio_active_class;?>><a href="<?php echo $url; ?>"><?php echo $title; ?></a></li>
				<?php 
			endforeach; 
        	?> 
        </ul>
    </div>
</div>
<?php endif; ?>