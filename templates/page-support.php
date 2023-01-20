<?PHP
/* Template Name: Support NEW*/
get_header(); 
get_template_part('templates/components/hero-templates/template-part-head-big');
 ?>

<style>
<?php // include locate_template('css/components/hero-templates/hero-template.css');
// include locate_template('css/components/template-form.css');
include locate_template('css/components/support-section.css');
include locate_template('css/components/get-in-touch.css');
include locate_template('css/page-templates/page-support/support.css');
?>
</style>

<div class="support_top_section white-text">
    <div class="support_top--wrapper container">
        <h2 id="register_now" class="section_title regional-offices__title">
            <?php _e('Real Help from Real People', 'anatol'); ?></h2>
        <div class="support-inner">
            <div class="support-inner__item suppport-info">
                <?PHP
					$cp_phone = get_field('cp_phone');
					$cp_short_description = get_field('cp_short_description');
					$content_phone = get_field('content_phone');
					// $content_email = get_field('content_email');
					$content_button_name = get_field('content_button_name');
					$content_button_url = get_field('content_button_url');
					?>

                <span class="suppport-info__icon svg-wrapper svg-phone--red"></span>
                <h4 class="suppport-info__title">
                    <?PHP echo get_field('cp_title'); ?>
                </h4>

                <div class="suppport-info__description">
                    <?PHP if(!empty($cp_short_description)) { ?>
                    <p class="spm_short_description suppport-info__excerpt">
                        <?PHP echo $cp_short_description; ?>
                    </p>
                    <?PHP } ?>
                    <?PHP if(!empty($cp_phone)) { ?>
                    <a class="contact-link" href="tel:8475821825">
                        <?PHP echo $cp_phone; ?>
                    </a>
                    <?PHP } ?>
                    <?PHP if(!empty($content_phone)) { ?>
                    <a class="contact-link" href="tel:8475821825">
                        <?PHP echo $content_phone; ?>
                    </a>
                    <?PHP } ?>
                    <?PHP if(!empty($content_email)) { ?>
                    <a class="contact-link" href="mailto:<?PHP echo $content_email; ?>">
                        <?PHP echo $content_email; ?>
                    </a>
                    <?PHP } ?>
                </div>

                <?PHP if(!empty($content_button_name)) { ?>
                <a href="#request_service_form" class="button red-button draw-red" data-label="Contact Us">
                    <?PHP echo $content_button_name; ?>
                </a>
                <?PHP } ?>
            </div>
            <?PHP
				if(have_rows('header_part_content')){
				  while (have_rows('header_part_content')) {
					the_row();
					$icon_class = get_sub_field('icon_class');
					$title = get_sub_field('title');
					$button_text = get_sub_field('button_text');
					$button_url = get_sub_field('button_url');
					$button_class_click = get_sub_field('button_class_click');
					?>

            <div class="support-inner__item suppport-info">
                <?PHP if(!empty($icon_class)) { ?>
                <span class="suppport-info__icon svg-wrapper <?PHP echo $icon_class; ?>"></span>
                <?PHP } ?>

                <?PHP if(!empty($title)) { ?>
                <h4 class="suppport-info__title">
                    <?PHP echo $title; ?>
                </h4>
                <?PHP } ?>

                <div class="stp_content">
                    <?PHP echo get_sub_field('content'); ?>
                </div>
                <?PHP if(!empty($button_text)) {
                    if(strpos($button_url['url'], '#') === 0) {
                ?>

                <a id="<?php echo $button_class_click ?>" href="#" class="stp_button button red-button draw-red"
                    data-logined="<?php echo is_user_logged_in()?>" data-category="Buttons"
                    data-label="Warranty Registration - Support page">
                    <?PHP echo $button_text; ?>
                </a>
                <?PHP } else { ?>

                <a href="<?php echo $button_url['url']; ?>" target="<?php echo $button_url['target']; ?>"
                    class="stp_button button red-button draw-red" data-category="Buttons"
                    data-label="View Faqs - Support page">
                    <?PHP echo $button_text; ?>
                </a>
                <?PHP }} ?>
            </div>
            <?PHP }} ?>
        </div>
    </div>
</div>

<section class="section support_team">
    <div class="swiper support_team--wrapper container">
        <div class="section_title support_team-title"><?php _e('Support Team', 'anatol'); ?></div>
        <div class="swiper-wrapper support_team_cont sldots ">
            <?PHP
			if(have_rows('support_team')){
			while (have_rows('support_team')) {
				the_row();
				$name = get_sub_field('name');
				$photo = get_sub_field('photo');
				$short_description = get_sub_field('short_description');
				$phone = get_sub_field('phone');
				$skype = get_sub_field('skype');
				$email = get_sub_field('email');
				$email_2 = get_sub_field('email_2');
				?>
            <div class="swiper-slide support_item">
                <?PHP if(!empty($photo)) { ?>
                <div class="st_photo">
                    <?PHP echo wp_get_attachment_image($photo, 'large'); ?>
                    <?PHP if(!empty($name)) { ?>
                    <h4 class="st_item_name sbn_title">
                        <?PHP echo $name; ?>
                    </h4>
                    <?PHP } ?>
                </div>
                <?PHP } ?>
                <div class="st_content">
                    <?PHP if(!empty($short_description)) { ?>
                    <div class="sbn_sub_title">
                        <?PHP echo $short_description; ?>
                    </div>
                    <?PHP } ?>
                    <?PHP if(!empty($phone)) { ?>
                    <div class="st_phone"><span class="text_icon wicon-phone-solid"></span>
                        <?PHP echo $phone; ?>
                    </div>
                    <?PHP } ?>
                    <?PHP if(!empty($skype)) { ?>
                    <div class="st_phone"><span class="fab fa-skype"></span>
                        <?PHP echo $skype; ?>
                    </div>
                    <?PHP } ?>
                    <?PHP if(!empty($email)) { ?>
                    <div class="st_email"><span class="text_icon wicon-envelope-solid"></span><a
                            href="mailto:<?PHP echo $email; ?>">
                            <?PHP echo $email; ?>
                        </a></div>
                    <?PHP } ?>
                    <?PHP if(!empty($email_2)) { ?>
                    <div class="st_email"><span class="text_icon wicon-envelope-solid"></span><a
                            href="mailto:<?PHP echo $email_2; ?>">
                            <?PHP echo $email_2; ?>
                        </a></div>
                    <?PHP } ?>
                </div>
            </div>
            <?PHP
			}
			}
			?>
        </div>
    </div>

</section>


<section id="feedbacks" class="support-feedbacks">

    <div class="swiper support-feedbacks--wrapper container">
        <div class="section_title feedbacks__title"><?php _e('What Anatol Customers Are Saying', 'anatol'); ?></div>
        <div class="swiper-wrapper feedbacks-posts-block sldots ">
            <?php $the_query = new WP_Query(array('post_type' => 'feedbacks')); ?>
            <?php if ($the_query->have_posts()) : ?>
            <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
            <div class="swiper-slide feedback">
                <div class="feedback_title_block"><?php the_title(); ?></div>
                <div class="feedback_customer_company"><?php the_field( "customer_company" );?></div>
                <?php $customer_photologo = get_field('customer_photologo');
						$size = 'thumbnails-feed'; 
						if( $customer_photologo ) {?>
                <div class="feedback_photo">
                    <?php echo wp_get_attachment_image( $customer_photologo, $size );?>
                </div>
                <?php } ?>
                <div class="feedback-txt-block"><?php the_field( "short_review" );?></div>
                <?php 
							$show_more_review = get_field('show_more_review');
							if( !empty($show_more_review) ): ?>
                <div class="feedback-txt_block-hide">
                    <p><?php the_field( "show_more_review" );?></p>
                </div>
                <div class="feedback-show-more">Show more</div>
                <?php endif; ?>
            </div>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
            <?php endif; ?>

        </div>
    </div>
</section>

<!--------Request Service Form----------------->

<section class="request_service_form" id="request_service_form">
    <div class="request_service_form--wrapper container">
        <?php
            $support_form_title= get_field('support_form_title');	
            if (!empty($support_form_title ))  { ?>
        <div class="section_title"><?php echo $support_form_title; ?></div>
        <?php }	?>

        <div class="service_form_description">
            <?php
                $support_form_description_title= get_field('support_form_description_title');	
                if (!empty($support_form_description_title ))  { ?>
            <div class="form_description_strong"><?php echo $support_form_description_title; ?></div>
            <?php }	?>

            <?php
                $support_form_description= get_field('support_form_description');	
                if (!empty($support_form_description ))  { ?>
            <div class="form_description"><?php echo $support_form_description; ?></div>
            <?php }	?>
        </div>

        <?php get_template_part('templates/components/forms/support-service-form');?>
    </div>
</section>

<script>
function yesnoCheckSer(that) {
    if (that.value == "United States") {
        document.getElementById("ifYesSer").style.display = "block";
        document.getElementById("state_required").setAttribute("required", "");
        document.querySelectorAll('.usa_state').forEach(item => item.style.display = 'block')
        document.querySelectorAll('.canadian_province').forEach(item => item.style.display = 'none')
    } else if (that.value == "Canada") {
        document.getElementById("ifYesSer").style.display = "block";
        document.querySelectorAll('.usa_state').forEach(item => item.style.display = 'none');
        document.querySelectorAll('.canadian_province').forEach(item => item.style.display = 'block');
    } else {
        document.getElementById("ifYesSer").style.display = "none";
    }
}
</script>

<!-- Slider Init -->
<script defer src="<?php echo get_template_directory_uri();?>/js/libs/swiper/swiper-bundle.min.js"></script>
<script defer src="<?php echo get_template_directory_uri();?>/js/sliders-swiper.js"></script>


<?php get_footer(); ?>