<?php
global $themeHelper;
/*------------------------------*/

$query = new WP_Query(
    array(
      'post_type' => 'sales-dealers',
      //'orderby' => 'menu_order title',
	  
		'orderby' => 'menu_order date',
		'order'     => 'DESC',
		
      'showposts' => -1,
      'tax_query' => array(
        array(
          'taxonomy' => 'sales-dealers-category',
          'field'    => 'slug',
          'terms'    => array( 'representative' ),
        ),
      )
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
    <div class="profile-item" data-continent="<?php echo join( ',', $regions ); ?>"
        data-country="<?php echo join(',', $data_country ); ?>">
        <div class="thumbnail-wrap">
            <div class="thumbnail">
                <?php if(has_post_thumbnail()) {
               the_post_thumbnail('thumbnail');
            } else{
              if (get_field('chek') == 0) {?>
                <img loading="lazy" class="lozad"
                    src="https://anatol.com/wp-content/uploads/2021/07/no-profile-picture-150x150.jpg" alt="man">
                <?php  }else{?>
                <img loading="lazy" class="lozad"
                    src="https://anatol.com/wp-content/uploads/2022/06/no-profile-picture2-150x150.jpg" alt="woman">
                <?php }
            }
            ?>
            </div>
            <h3 class="name"><?php the_title(); ?></h3>
            <?php if(get_field('position')){ ?>
            <div class="position">
                <?php echo get_field('position'); ?>
            </div>
            <?php } ?>
            <a class="quote-button get_a_quote_sales-button" href="#"><?php _e('Get a Quote', ''); ?></a>
        </div>
        <div class="content-wrap">
            <div class="contacts-list">
                <?php if(get_field('phone')){
              $phones = explode(',', get_field('phone'));
              foreach( $phones as $phone ){
                ?>
                <div class="phone">
                    <i class="fa fa-phone"></i><a
                        href="tel:<?php echo trim($phone); ?>"><?php echo trim( $phone ); ?></a>
                </div>
                <?php }
             } ?>
                <?php if(get_field('skype')){ ?>
                <div class="skype">
                    <i class="fa fa-skype"></i><a
                        href="skype:<?php echo get_field('skype'); ?>?call"><?php if ( get_field( 'skype_name' ) ): ?><?php echo get_field('skype_name'); ?><?php else: ?><?php echo get_field('skype'); ?><?php endif; ?></a>
                </div>
                <?php } ?>
                <?php if(get_field('whatsapp')){ ?>
                <div class="whatsapp">
                    <i class="fa fa-whatsapp"></i><a
                        href="whatsapp://send?abid=<?php echo get_field('whatsapp'); ?>"><?php echo get_field('whatsapp'); ?></a>
                </div>
                <?php } ?>
                <?php if(get_field('email')){ ?>
                <div class="email">
                    <i class="fa fa-envelope-o"></i><a
                        href="mailto:<?php echo get_field('email'); ?>"><?php echo get_field('email'); ?></a>
                </div>
                <?php } ?>
            </div>
        </div> <!-- // content -->
        <div class="profile-content">
            <span class="more-info"><?php _e('More info', 'anatol'); ?></span>
            <div class="more-content">
                <?php the_content(); ?>
            </div>
        </div>
    </div>
    <?php
  endwhile; ?>
</div>
<?php
endif;
wp_reset_query();