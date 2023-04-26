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
        <?php if( have_rows('add_information_pdfs_section') ):  ?>
        <div class="row"> 
        	<?php 

        	$info_pdf = 1;
            while ( have_rows('add_information_pdfs_section') ) : the_row();
            	$cover_image_of_pdf_image = get_sub_field('cover_image_of_pdf');
            	$cover_image_of_pdf_image_id = $cover_image_of_pdf_image['id'];  
				//$cover_image_of_pdf_image = fly_get_attachment_image_src($cover_image_of_pdf_image_id, 'infromation-sheet');
				//$cover_image_of_pdf_image = ($cover_image_of_pdf_image['src']) ? $cover_image_of_pdf_image['src'] : '';  
                $cover_image_of_pdf_image = ($cover_image_of_pdf_image['url']) ? $cover_image_of_pdf_image['url'] : '';

            	$upload_information_pdf   = get_sub_field('upload_information_pdf');
            	$information_pdf_title	  = get_sub_field('information_pdf_title');
            	$information_pdf_description = get_sub_field('information_pdf_description');  
            ?> 
            <div class="col-lg-3 col-md-6 mb-30">
                <div class="resource-block">
                	<?php if($cover_image_of_pdf_image):?>
                    <div class="resource-top">
                        <div class="text-center infosheet">
                            <!-- Button trigger modal -->
                            <a href="javascript:void(0)" data-toggle="modal" data-target="#infosheetModalCenter_<?php echo $info_pdf;?>"><img class="img-full" src="<?php echo $cover_image_of_pdf_image;?>">
                            <div class="infosheet-popup">
                                <div class="infosheet-trigger">
                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/plus-round.svg" alt="Open PDF">
                                </div>
                            </div>
                            </a>
                        
                            <!-- Modal -->
                            <div class="modal fade" id="infosheetModalCenter_<?php echo $info_pdf;?>" tabindex="-1" role="dialog" aria-labelledby="<?php echo $information_pdf_title;?>" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <?php if( $information_pdf_title): ?>
                                    <h5 class="modal-title" id="infosheetModalLongTitle"><?php echo $information_pdf_title;?></h5>
                                	<?php endif;?>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                  	<div style="text-align: center;"> 
										<object style="width:100%;height:500px;border:1px solid #000;" data="<?php echo $upload_information_pdf;?>?#view=fitW&scrollbar=0&toolbar=0&navpanes=0" type="application/pdf">
											<embed src="<?php echo $upload_information_pdf;?>?#zoom=100&scrollbar=0&toolbar=0&navpanes=0" type="application/pdf" />
										</object>
									</div> 
                                  </div> 
                                </div>
                              </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
                    <?php if($information_pdf_title || $upload_information_pdf): ?>
                    <div class="resource-text">
                        <div class="text-center">
                        	<?php if( $information_pdf_title): ?>
                            <h4><?php echo $information_pdf_title;?></h4>
                            <?php endif; ?>
                            <a href="<?php echo $upload_information_pdf;?>" download><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/download.svg" alt=""></a>
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