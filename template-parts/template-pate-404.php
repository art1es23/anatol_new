<?php
/*
* Template Name: 404 page
*/
?>


<?php get_header(); ?>

<?php get_template_part('template-parts/template-part-head-part1'); ?>
<div class="simple_bg_head index_template not-found-page-header-wrap">
  <?php
  global $title_icon_class;
  global $anatol_cat_title;
  $anatol_cat_title = '404';
  $title_icon_class = 'default';

  get_template_part('template-parts/template-part-head-part2'); ?>
  <div class="clear clearfix"></div>
</div>
<div class="container dmbs-container">
  <!-- start content container -->
  <div class="row dmbs-content">
    <div class="col-md-12 dmbs-main">
      <h2 class="text-center"><?php if( !empty( get_field('404_page_title', 'options') ) ) { echo get_field('404_page_title', 'options'); } ?></h2>
    </div>
  </div>
  <div class="row dmbs-content">
    <div class="col-xs-12">
      <div class="row">
        <div class="col-xs-12 text-center">
          <p><?php if( !empty( get_field('404_page_description', 'options') ) ) { echo get_field('404_page_description', 'options'); } ?></p>
        </div>
      </div>
    </div>
  </div>
  <div class="row cat_content_row">
    <div class="col-md-12">
      <?php
      if(have_rows('404_card_repeater', 'option')) {
        echo '<div class="equipments_list">';
        while (have_rows('404_card_repeater', 'option')){
          the_row();
          ?>
          <a href="<?php if(!empty(get_sub_field('url'))) { echo get_sub_field('url'); } ?>" class="equipment_item aos-init aos-animate" data-aos="zoom-in-down">
            <div class="image_part">
              <?php echo wp_get_attachment_image( get_sub_field('image'), array(410, 300) ); ?>
              <!-- <img width="210" height="210" src="" class="attachment-300x210 size-300x210 wp-post-image" alt=""> -->
            </div>
            <div class="content_part">
              <div class="c_icon">
                <div class="c_default"></div>
              </div>
              <div class="equipment_box_title"><?php if(!empty(get_sub_field('title'))) { echo get_sub_field('title'); } ?></div>
            </div>
          </a>
          <?php
        }
        echo '</div>';
      }
      ?>
    </div>
  </div>
  <div class="row dmbs-content">
    <div class="col-xs-12">
      <div class="row">
        <div class="col-xs-12 text-center">
          <?php if( !empty( get_field('404_contacts', 'options') ) ) { echo get_field('404_contacts', 'options'); } ?>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- end content container -->
</div>
</div>

<div class="container-fluid full_bottom_container">
  <div class="row ofices_row">
    <?php get_template_part('template-parts/widgets/offices'); ?>
  </div>

  <!-- end content container -->
  <!--</div>
  <div class="container-fluid">-->
  <?php get_footer(); ?>
