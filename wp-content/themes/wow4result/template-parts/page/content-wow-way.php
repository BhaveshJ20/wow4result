<?php
/**
 * Displays content for Information Sheets
 */
?>
<div class="contentarea">
	<?php get_template_part( 'template-parts/page/content', 'resource-centre');?>
	<div class="container">
		<div class="mb-4">
            <p><?php the_content(); ?></p>
        </div> 
        <?php if( have_rows('add_pdfs_section') ):  ?>
        <div class="row"> 
        	<?php  
        	$info_pdf = 1;
            while ( have_rows('add_pdfs_section') ) : the_row();
            	$wow_way_cover_image = get_sub_field('wow_way_cover_image_of_pdf');
            	$wow_way_cover_image_id = $wow_way_cover_image['id'];  
				//$wow_way_cover_image = fly_get_attachment_image_src($wow_way_cover_image_id, 'infromation-sheet');
				//$wow_way_cover_image = ($wow_way_cover_image['src']) ? $wow_way_cover_image['src'] : '';  
                $wow_way_cover_image = ($wow_way_cover_image['url']) ? $wow_way_cover_image['url'] : '';  

            	$wow_way_upload_pdf   = get_sub_field('wow_way_upload_pdf');
            	$wow_way_pdf_title	  = get_sub_field('wow_way_pdf_title');
            	$wow_way_pdf_description = get_sub_field('wow_way_pdf_description');  
            ?> 
            <div class="col-lg-3 col-md-6 mb-30">
                <div class="resource-block">
                	<?php if($wow_way_cover_image):?>
                    <div class="resource-top">
                        <div class="text-center infosheet">
                            <!-- Button trigger modal -->
                            <a href="javascript:void(0)" data-toggle="modal" data-target="#infosheetModalCenter_<?php echo $info_pdf;?>"><img class="img-full" src="<?php echo $wow_way_cover_image;?>">
                            <div class="infosheet-popup">
                                <div class="infosheet-trigger">
                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/plus-round.svg" alt="">
                                </div>
                            </div>
                            </a>
                        
                            <!-- Modal -->
                            <div class="modal fade" id="infosheetModalCenter_<?php echo $info_pdf;?>" tabindex="-1" role="dialog" aria-labelledby="<?php echo $information_pdf_title;?>" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <?php if( $wow_way_pdf_title): ?>
                                    <h5 class="modal-title" id="infosheetModalLongTitle"><?php echo $wow_way_pdf_title;?></h5>
                                	<?php endif;?>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                  	<div style="text-align: center;">
										 
										<object style="width:100%;height:500px;border:1px solid #000;" data="<?php echo $wow_way_upload_pdf;?>?#view=fitW&scrollbar=0&toolbar=0&navpanes=0" type="application/pdf">
											<embed src="<?php echo $wow_way_upload_pdf;?>?#zoom=100&scrollbar=0&toolbar=0&navpanes=0" type="application/pdf" />
										</object>
									</div> 
                                  </div> 
                                </div>
                              </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
                    <?php if($wow_way_pdf_title || $wow_way_pdf_description): ?>
                    <div class="resource-text">
                        <div class="text-center">
                        	<?php if( $wow_way_pdf_title): ?>
                            <h4><?php echo $wow_way_pdf_title;?></h4>
                            <?php endif; ?>
                            <a href="<?php echo $wow_way_upload_pdf;?>" download><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/download.svg" alt=""></a>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>  
        	<?php 
        	$info_pdf++;
        	endwhile; 
        	?> 
        </div>
        <?php endif; ?>
	</div>	
</div>