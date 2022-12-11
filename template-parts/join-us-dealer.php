<!-- Join us -->
<section class="available_opportunities">
    <div class="available_opportunities--wrapper container">
        <?php
				$section_title = get_field('section_title');	
					if (!empty($section_title ))  { ?>
        <h2 class="section-title">
            <?php echo $section_title; ?>
        </h2>
        <?php }	?>
        <?php
				$section_description = get_field('section_description');	
					if (!empty($section_description ))  { ?>
        <div class="section_content">
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
    </div>
</section>
<!-- End Join us -->