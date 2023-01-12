<?PHP
/* Template Name: Support NEW*/
get_header(); 
get_template_part('templates/components/hero-section/template-part-head-big');
 ?>

<style>
<?php include __DIR__ . '/../css/components/hero-templates/hero-template.css';
// include __DIR__ . '/../css/components/template-form.css';
include __DIR__ . '/../css/components/support-section.css';
include __DIR__ . '/../css/components/get-in-touch.css';
include __DIR__ . '/../css/page-templates/page-support/support.css';
?>
</style>

<div class="support_top_section white-text">
    <div class="support_top--wrapper container">
        <h2 id="register_now" class="section_title regional-offices__title">
            <?php _e('Real Help from Real People', 'anatol'); ?></h2>
        <div class="support_top_pannel">
            <div class="column_support">
                <?PHP
					$cp_phone = get_field('cp_phone');
					$cp_short_description = get_field('cp_short_description');
					$content_phone = get_field('content_phone');
					// $content_email = get_field('content_email');
					$content_button_name = get_field('content_button_name');
					$content_button_url = get_field('content_button_url');
					?>
                <div class="stp_icon">
                    <span class="custom_icon text_icon wicon-phone-solid">
                        <svg fill="#cd2122" viewBox="0 0 28 28" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M17.167,16.155a2.5,2.5,0,0,0-3.535,0l-.385.384A46.692,46.692,0,0,1,7.458,10.75l.385-.385a2.5,2.5,0,0,0,0-3.536L5.721,4.708a2.5,2.5,0,0,0-3.535,0L1.022,5.872a3.51,3.51,0,0,0-.442,4.4A46.932,46.932,0,0,0,13.722,23.417a3.542,3.542,0,0,0,4.4-.442l1.165-1.164a2.5,2.5,0,0,0,0-3.535Z" />
                            <path
                                d="M11.5,0a1,1,0,0,0,0,2A10.512,10.512,0,0,1,22,12.5a1,1,0,1,0,2,0A12.515,12.515,0,0,0,11.5,0Z" />
                            <path
                                d="M11.5,6A6.508,6.508,0,0,1,18,12.5a1,1,0,0,0,2,0A8.51,8.51,0,0,0,11.5,4a1,1,0,1,0,0,2Z" />
                            <path
                                d="M11.5,10A2.5,2.5,0,0,1,14,12.5a1,1,0,0,0,2,0A4.505,4.505,0,0,0,11.5,8a1,1,0,1,0,0,2Z" />
                        </svg>
                    </span>
                </div>
                <div class="sp_top">
                    <h4 class="stp_title">
                        <?PHP echo get_field('cp_title'); ?>
                    </h4>
                </div>
                <div class="stp_content">
                    <div class="spm_contacts">
                        <?PHP if(!empty($cp_short_description)) { ?>
                        <div class="spm_short_description spm_contact">
                            <?PHP echo $cp_short_description; ?>
                        </div>
                        <?PHP } ?>
                        <?PHP if(!empty($cp_phone)) { ?>
                        <div class="spm_phone spm_contact">
                            <span class="text_icon wicon-phone-solid svg-wrapper">
                                <svg fill="#ffffff" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M17.167,16.155a2.5,2.5,0,0,0-3.535,0l-.385.384A46.692,46.692,0,0,1,7.458,10.75l.385-.385a2.5,2.5,0,0,0,0-3.536L5.721,4.708a2.5,2.5,0,0,0-3.535,0L1.022,5.872a3.51,3.51,0,0,0-.442,4.4A46.932,46.932,0,0,0,13.722,23.417a3.542,3.542,0,0,0,4.4-.442l1.165-1.164a2.5,2.5,0,0,0,0-3.535Z" />
                                    <path
                                        d="M11.5,0a1,1,0,0,0,0,2A10.512,10.512,0,0,1,22,12.5a1,1,0,1,0,2,0A12.515,12.515,0,0,0,11.5,0Z" />
                                    <path
                                        d="M11.5,6A6.508,6.508,0,0,1,18,12.5a1,1,0,0,0,2,0A8.51,8.51,0,0,0,11.5,4a1,1,0,1,0,0,2Z" />
                                    <path
                                        d="M11.5,10A2.5,2.5,0,0,1,14,12.5a1,1,0,0,0,2,0A4.505,4.505,0,0,0,11.5,8a1,1,0,1,0,0,2Z" />
                                </svg>
                            </span>
                            <a href="tel:8475821825">
                                <?PHP echo $cp_phone; ?>
                            </a>
                        </div>
                        <?PHP } ?>
                        <?PHP if(!empty($content_phone)) { ?>
                        <div class="spm_phone spm_contact">
                            <span class="text_icon wicon-phone-solid svg-wrapper">
                                <svg fill="#ffffff" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M17.167,16.155a2.5,2.5,0,0,0-3.535,0l-.385.384A46.692,46.692,0,0,1,7.458,10.75l.385-.385a2.5,2.5,0,0,0,0-3.536L5.721,4.708a2.5,2.5,0,0,0-3.535,0L1.022,5.872a3.51,3.51,0,0,0-.442,4.4A46.932,46.932,0,0,0,13.722,23.417a3.542,3.542,0,0,0,4.4-.442l1.165-1.164a2.5,2.5,0,0,0,0-3.535Z" />
                                    <path
                                        d="M11.5,0a1,1,0,0,0,0,2A10.512,10.512,0,0,1,22,12.5a1,1,0,1,0,2,0A12.515,12.515,0,0,0,11.5,0Z" />
                                    <path
                                        d="M11.5,6A6.508,6.508,0,0,1,18,12.5a1,1,0,0,0,2,0A8.51,8.51,0,0,0,11.5,4a1,1,0,1,0,0,2Z" />
                                    <path
                                        d="M11.5,10A2.5,2.5,0,0,1,14,12.5a1,1,0,0,0,2,0A4.505,4.505,0,0,0,11.5,8a1,1,0,1,0,0,2Z" />
                                </svg>
                            </span>
                            <a href="tel:8475821825">
                                <?PHP echo $content_phone; ?>
                            </a>
                        </div>
                        <?PHP } ?>
                        <?PHP if(!empty($content_email)) { ?>
                        <div class="spm_email spm_contact">
                            <span class="text_icon wicon-envelope-solid">

                            </span> <a href="mailto:<?PHP echo $content_email; ?>">
                                <?PHP echo $content_email; ?>
                            </a>
                        </div>
                        <?PHP } ?>
                    </div>
                </div>

                <?PHP if(!empty($content_button_name)) { ?>
                <!-- <div class="stp_button"> -->
                <a href="#request_service_form" class="button track-button" data-label="Contact Us">
                    <?PHP echo $content_button_name; ?>
                </a>
                <!-- </div> -->
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

            <div class="column_support">
                <?PHP if(!empty($icon_class)) { ?>
                <span class="stp_icon custom_icon <?PHP echo $icon_class; ?> svg-wrapper">
                    <!-- <svg version="1.1" viewBox="0 0 29 29" xmlns="http://www.w3.org/2000/svg"
                        xmlns:sketch="http://www.bohemiancoding.com/sketch/ns"
                        xmlns:xlink="http://www.w3.org/1999/xlink">
                        <g fill="none" fill-rule="evenodd" id="Page-1" stroke-width="1">
                            <g fill="none" id="icon-138-certificate">
                                <path
                                    d="M13,18.9494914 L13,22 L25.9950534,22 C27.1023548,22 28,21.1099416 28,19.9998938 L28,7.00010618 C28,5.89547804 27.1029738,5 25.9950534,5 L6.00494659,5 C4.89764516,5 4,5.89005841 4,7.00010618 L4,19.9998938 C4,21.104522 4.89702623,22 6.00494659,22 L8,22 L8,18.9494914 C7.38140648,18.3182229 7,17.4536526 7,16.5 C7,14.5670033 8.56700328,13 10.5,13 C12.4329967,13 14,14.5670033 14,16.5 C14,17.4536526 13.6185935,18.3182229 13,18.9494914 L13,18.9494914 L13,18.9494914 Z M9,19.6631845 L9,24.5999756 L10.5,23.1000061 L12,24.5999756 L12,19.6631845 C11.5453723,19.8791545 11.0367987,20 10.5,20 C9.96320134,20 9.45462768,19.8791545 9,19.6631845 L9,19.6631845 L9,19.6631845 Z M7,10 L7,11 L25,11 L25,10 L7,10 L7,10 Z M16,13 L16,14 L25,14 L25,13 L16,13 L16,13 Z M19,16 L19,17 L25,17 L25,16 L19,16 L19,16 Z M10.5,19 C11.8807119,19 13,17.8807119 13,16.5 C13,15.1192881 11.8807119,14 10.5,14 C9.11928806,14 8,15.1192881 8,16.5 C8,17.8807119 9.11928806,19 10.5,19 L10.5,19 Z"
                                    id="certificate" />
                            </g>
                        </g>
                    </svg> -->
                </span>
                <?PHP } ?>

                <?PHP if(!empty($title)) { ?>
                <h4 class="stp_title">
                    <?PHP echo $title; ?>
                </h4>
                <?PHP } ?>

                <div class="stp_content">
                    <?PHP echo get_sub_field('content'); ?>
                </div>
                <?PHP if(!empty($button_text)) {
                    if(strpos($button_url['url'], '#') === 0) {
                ?>

                <a id="<?php echo $button_class_click ?>" href="#"
                    class="stp_button button transparent_button track-button"
                    data-logined="<?php echo is_user_logged_in()?>" data-category="Buttons"
                    data-label="Warranty Registration - Support page">
                    <?PHP echo $button_text; ?>
                </a>
                <?PHP } else { ?>

                <a href="<?php echo $button_url['url']; ?>" target="<?php echo $button_url['target']; ?>"
                    class="stp_button button transparent_button track-button" data-category="Buttons"
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