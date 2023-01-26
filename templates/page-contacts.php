<?PHP
/* Template Name: ContactsNEW */

get_header(); ?>

<style>
<?php include locate_template('css/components/hero-templates/hero-template.css');
// include locate_template('css/components/template-form.css');
include locate_template('css/components/sections/section-regional-offices.css');
include locate_template('css/page-templates/page-contact/contacts.css');
?>
</style>

<div class="hero" style="linear-gradient(
      180deg,
      rgba(255, 255, 255, 0.9) 0%,
      #ffffff 100%
    ), url(<?php echo bloginfo('url');?>/wp-content/themes/anatol/assets/images/bg-group.jpg);">
    <div class="hero--wrapper container">
        <h1 class="hero__title page-title">
            <?php if( get_field( "alternative_title" )) { the_field("alternative_title"); } ?></h1>

        <?php if( get_field( "title_description" )) { ?>
        <div class="hero__description page-description"><?php the_field("title_description"); ?></div>
        <?php } ?>
    </div>
</div>

<div class="contact-us">
    <div class="contact-us--wrapper container">

        <div class="contact-us__item contact-us-info">
            <h3 class="contact-us-info__item contact-us-info__title"><?php _e('World Headquarters', 'anatol'); ?></h3>

            <div class="contact-us-info__item">
                <h4 class="contact-us-info__subtitle contact-us-info__subtitle--location">
                    <?php _e('Location', 'anatol'); ?>
                </h4>
                <p class="contact-us-info__description">919 Sherwood Drive<br>
                    Lake Bluff, IL 60044, USA</p>
            </div>
            <div class="contact-us-info__item">
                <h4 class="contact-us-info__subtitle contact-us-info__subtitle--phone">
                    <?php _e('Phone', 'anatol'); ?>
                </h4>
                <a class="contact-us-info__phone" href="tel:8473679760">847-367-9760</a>
            </div>
        </div>

        <?php get_template_part('templates/components/forms/default-contact-form'); ?>
    </div>

    <?php get_template_part('templates/components/section-templates/regional-offices'); ?>

    <?php get_footer(); ?>