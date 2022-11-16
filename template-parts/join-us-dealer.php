<!-- Join us -->
<section class=" become_dealer fix-bg">
	<div class="become_dealer--wrapper container anim_fade">
	  <!-- <div class="card text-center join-us">
		<div class="dealer-body"> -->
			<?php
				$section_title = get_field('section_title');	
					if (!empty($section_title ))  { ?>
						<h3 class="section-title white-title">
							<?php echo $section_title; ?>	
		  				</h3>
			<?php }	?>
			<?php
				$section_description = get_field('section_description');	
					if (!empty($section_description ))  { ?>
						<div class="dealer-text">
							<p>
							<?php echo $section_description; ?>	
							</p>
		  				</div>
			<?php }	?>
			<?php
				$section_button = get_field('section_button');	
					if (!empty($section_button ))  { ?>
						<div class="join_us_dealer button red-button draw-red"><?php echo $section_button; ?></div>	
			<?php }	?>
		<!-- </div>
	  </div> -->
	</div>
</section>
<!-- End Join us -->