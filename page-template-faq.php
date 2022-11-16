<?PHP
/* Template Name: FAQ */
get_header(); ?>
<?php get_template_part('template-parts/template-part-head-bg-black'); ?>


<div class="container">
        <!-- start content container -->
	<div class="page-content">
		<div class="page_sidebar_content">

				<!--  Page content  -->
				<?php
				if (have_posts()) {
					while (have_posts()) {
						the_post();
						get_template_part('templates/faq');
					}
				} else {
					
				} ?>
				
				

		</div>
		<div class="sidebar">				

		</div>
	</div>
</div>








<?php get_template_part('templates/equipment/another-equipments'); ?>
<?php get_footer(); ?>
