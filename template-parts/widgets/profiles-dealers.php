<?php
global $themeHelper;
/*------------------------------*/
$query = new WP_Query(
    array(
      'post_type' => 'sales-dealers',
      'tax_query' => array(
        array(
          'taxonomy' => 'sales-dealers-category',
          'field'    => 'slug',
          'terms'    => 'dealer',
        ),
      ),
      'orderby' => 'menu_order date',
      'showposts' => -1
  )
);
if( $query->have_posts() ): ?>
<div class="profiles-list">
  <?php
  while( $query->have_posts()):
    $query->the_post();

    $regions = $themeHelper->check_array( get_field('continent') );
    $regions = array_filter( $themeHelper->convert_continents_to_num( $regions ) );

    $united_states_subregions = $themeHelper->check_array( get_field('united_states_subregions'));
    $north_america_subregions = $themeHelper->check_array( get_field('north_america_subregions'));
    $central_america_subregions = $themeHelper->check_array( get_field('central_america_subregions'));
    $caribbean_subregions = $themeHelper->check_array( get_field('caribbean_subregions'));
    $south_america_subregions = $themeHelper->check_array( get_field('south_america_subregions'));
    $europe_subregions = $themeHelper->check_array( get_field('europe_subregions'));
    $africa_subregions = $themeHelper->check_array( get_field('africa_subregions'));
    $asia_subregions = $themeHelper->check_array( get_field('asia_subregions'));
    $oceania_subregions = $themeHelper->check_array( get_field('oceania_subregions'));

    $countries = array_merge( $north_america_subregions, $caribbean_subregions, $south_america_subregions, $europe_subregions, $africa_subregions, $asia_subregions, $oceania_subregions );

    $countries = $themeHelper->convert_names_to_codes( $countries );
    $ca_countries = $themeHelper->convert_names_to_codes( $central_america_subregions, 'ca' );   
 
    $states = $themeHelper->convert_names_to_codes( $united_states_subregions, 'usa' );

    $data_country = array_filter(array_merge( $countries, $ca_countries, $states ));
    ?>
    <div class="profile-item dealer-item" data-continent="<?php echo join( ',', $regions ); ?>" data-country="<?php echo join(',', $data_country ); ?>">
      <div class="row">
        <div class="col-xs-12">
          <h3 class="name"><?php the_title(); ?></h3>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="content-wrap">
            <div class="contacts-list">
              <?php if(get_field('phone')){
                  $phones = explode(',', get_field('phone'));
                  foreach( $phones as $phone ){
                    ?>
                    <div class="phone">
                      <i class="fa fa-phone"></i><a href="tel:<?php echo trim($phone); ?>" ><?php echo trim($phone); ?></a>
                    </div>
                    <?php }
                 } ?>
              <?php if(get_field('phone2')){
                  $phones2 = explode(',', get_field('phone2'));
                  foreach( $phones2 as $phone2 ){
                    ?>
                    <div class="phone">
                      <i class="fa fa-phone"></i><a href="tel:<?php echo trim($phone2); ?>" ><?php echo trim($phone2); ?></a>
                    </div>
                    <?php }
                 } ?>
              <?php if(get_field('website')){ ?>
                <div class="website">
                  <i class="fa fa-globe"></i><a href="<?php echo get_field('website'); ?>" target="_blank"><?php echo get_field('website'); ?></a>
                </div>
              <?php } ?>
              <?php if(get_field('website_2')){ ?>
                <div class="website">
                  <i class="fa fa-globe"></i><a href="<?php echo get_field('website_2'); ?>" target="_blank"><?php echo get_field('website_2'); ?></a>
                </div>
              <?php } ?>
              <?php if(get_field('email')){ ?>
                <div class="email">
                  <i class="fa fa-envelope-o"></i><a href="mailto:<?php echo get_field('email'); ?>"><?php echo get_field('email'); ?></a>
                </div>
              <?php } ?>
              <?php if(get_field('skype')){ ?>
                <div class="skype">
                  <i class="fa fa-skype"></i><a href="skype:<?php echo get_field('skype'); ?>?call"><?php echo get_field('skype'); ?></a>
                </div>
              <?php } ?>
              <?php if(get_field('whatsapp')){ ?>
                <div class="whatsapp">
                  <i class="fa fa-whatsapp"></i><a href="whatsapp://send?abid=<?php echo get_field('whatsapp'); ?>" ><?php echo get_field('whatsapp'); ?></a>
                </div>
              <?php } ?>
            </div>
          </div> <!-- // content -->
        </div>
        <div class="col-md-6">
          <div class="address-wrap">
            <div class="address-title">
              <i class="fa fa-map-marker"></i><?php _e('Address', 'anatol'); ?>
            </div>
            <div class="address-content">
              <?php the_content(); ?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php
  endwhile; ?>
</div>
<?php
endif;
wp_reset_query();
