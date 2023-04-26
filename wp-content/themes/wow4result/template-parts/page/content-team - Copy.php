<?php
if(have_rows('add_teams')):
	?>
	<div class="contentarea">
		<div class="container">
			<div class="team-list">
				<div class="row">
					<?php					
					while(have_rows('add_teams')):
						the_row();
						$staff_profile_picture = get_sub_field('staff_profile_picture');
						$staff_profile_picture_id = $staff_profile_picture['id']; 
						$staff_profile_picture = fly_get_attachment_image_src($staff_profile_picture_id, 'team-thumb');
						$staff_profile_picture = ($staff_profile_picture['src']) ? $staff_profile_picture['src'] : '';
						$staff_name = get_sub_field('staff_name');
						$staff_position = get_sub_field('staff_position');
						?>
						<div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-pic mb-30">
                        <div class="team-box">
                        	<?php if ($staff_profile_picture): ?>
                            <div class="team-member-pic">
                                <img class="img-full" src="<?php echo $staff_profile_picture; ?>" alt="<?php echo $staff_name; ?>">
                            </div>
                        <?php endif; ?>
                            <div class="team-info">
                                <h5><?php echo $staff_name; ?></h5>
                                <p><?php echo $staff_position; ?></p>
                            </div>
                        </div>
                    </div>
						<?php
					endwhile;
					?>
				</div>
			</div>
		</div>
	</div>
	<?php 
endif; 
?>