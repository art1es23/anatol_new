<?php

/**
*/
defined('ABSPATH') or die();

if( !class_exists('ThemeHelper')){

  class ThemeHelper
  {
    /**
    * Hook into the appropriate actions when the class is constructed.
    */
    public function __construct()
    {
      // add_action('after_setup_theme', array($this, 'theme_setup'));
      // add_action('widgets_init', array($this, 'widgets_init'));
    }

    function futurenow_do_not_set_posts_to_future( $data ) {
        if ( $data['post_status'] == 'future' && $data['post_type'] == 'event' )
            $data['post_status'] = 'publish';
        return $data;
    }

    public function extend_myme_types($mime_types){
      $mime_types['ttf'] = 'application/x-font-ttf'; //Adding photoshop files
      $mime_types['svg'] = 'image/svg+xml';     // Adding .svg extension
      return $mime_types;
    }

    public function theme_setup()
    {

      /*
      * Make theme available for translation.
      * Translations can be filed in the /languages/ directory.
      */
      load_theme_textdomain( TEXT_DOMAIN, get_template_directory() . '/languages' );

      // Add default posts and comments RSS feed links to head.
      //add_theme_support('automatic-feed-links');
      add_theme_support('post-thumbnails');
      add_image_size('hero', 1920, 950, true);
      add_image_size('slide', 1200, 750, true);

      /**
      * Add editor-style
      */
      add_editor_style('css/editor-style.css');


      // This theme uses wp_nav_menu() in one location.
      register_nav_menus(array(
        'primary' => __('Головне меню', TEXT_DOMAIN),
        'footer' => __('Футер меню', TEXT_DOMAIN),
        'products' => __('Продукти', TEXT_DOMAIN)
      ));

      /*
      * Switch default core markup for search form, comment form, and comments
      * to output valid HTML5.
      */
      add_theme_support('html5', array(
        'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
      ));

      /*
      * Enable support for Post Formats.
      * See http://codex.wordpress.org/Post_Formats
      */
      add_theme_support('post-formats', array(
        'image', 'gallery', 'video', 'quote', 'link'
      ));


    }

    /**
    * Register widget area.
    * @link http://codex.wordpress.org/Function_Reference/register_sidebar
    */
    public function widgets_init()
    {
      // register_sidebar(array(
      //   'name'          => __('Підвал сайту. 1', TEXT_DOMAIN),
      //   'id'            => 'footer-1',
      //   'description'   => '',
      //   'before_widget' => '<aside id="%1$s" class="widget %2$s">',
      //   'after_widget'  => '</aside>',
      //   'before_title'  => '<h1 class="widget-title">',
      //   'after_title'   => '</h1>',
      // ));
      register_sidebar(array(
        'name'          => __('Мови', TEXT_DOMAIN),
        'id'            => 'lang',
        'description'   => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h1 class="widget-title">',
        'after_title'   => '</h1>',
      ));

      register_sidebar(array(
        'name'          => __('Блог', TEXT_DOMAIN),
        'id'            => 'blog',
        'description'   => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h1 class="widget-title">',
        'after_title'   => '</h1>',
      ));
    }
    /**/
    function include_css_scripts()
    {
      wp_enqueue_style('bootstrap', get_template_directory_uri() . '/bootstrap/css/bootstrap.min.css');
    }

    function include_scripts_styles_to_footer() {

    }


    /**
    * Enqueue scripts and styles in admin panel.
    */

    function include_admin_scripts()
    {
      wp_enqueue_style('admin-bootstrap', get_template_directory_uri() . '/admin-bootstrap/css/bootstrap-admin.css');
      wp_enqueue_style('admin', get_template_directory_uri() . '/css/admin.css');
      wp_enqueue_script('jquery-ui-core');
      wp_enqueue_script('jquery-ui-accordion');
      wp_enqueue_script('jquery-ui-tabs');
      wp_enqueue_script('jquery-ui-sortable');

      wp_enqueue_script('admin-bootstrap', get_template_directory_uri() . '/admin-bootstrap/js/bootstrap.js');

      // wp_enqueue_script('admin', get_template_directory_uri() . '/js/admin.js');

    }
    /*
    *
    */

    function manage_roles()
    {
      // get the the role object
      $role_object = get_role('editor');

      // add $cap capability to this role object
      $role_object->add_cap('edit_theme_options');
    }

    /**
    *
    */
    function excerpt_length($length)
    {
      if (is_home()) return 20;
      if (is_category()) return 30;
      else return 20;
    }
    /**
    *
    */
    function excerpt_more($more)
    {
      return ' ...';
    }
    /**
    *
    */
    function pre_get_posts($query)
    {

      if ( $query->is_tag() ) {
        $query->set( 'post_type', array( 'post', 'page', 'editions' ) );
      }

      return $query;
    }


    /**
    * Check if index exists
    */
    public function ch_index($index, $array)
    {
      if (!is_array($array)) return '';

      if (array_key_exists($index, $array))
      return $array[$index];
      else
      return '';
    }


    /*
    * Get term image url
    */

    public function get_term_thumbnail_url($term = null, $type = 'image',  $size = 'full')
    {

      $image = '';
      if (!empty($term)) {
        // image id is stored as term meta
        $image_id = get_term_meta($term->term_id, $type, true);

        // image data stored in array, second argument is which image size to retrieve
        $image_data = wp_get_attachment_image_src($image_id, $size);

        // image url is the first item in the array (aka 0)
        $image = $image_data[0];
      }
      return $image;
    }


    function fields_to_array($post_id = 0)
    {
      $page_meta = $fields = array();
      if(get_post_meta($post_id, '_custom_fields', true))
      $fields = explode(',', get_post_meta($post_id, '_custom_fields', true));

      foreach ($fields as $key) {
        $page_meta[$key] = get_post_meta($post_id, '_' . $key, true) ? get_post_meta($post_id, '_' . $key, true) : '';
      }
      return $page_meta;
    }

    /**
    * Extend WordPress search to include custom fields
    *
    * http://adambalee.com
    */

    /**
    * Join posts and postmeta tables
    *
    * http://codex.wordpress.org/Plugin_API/Filter_Reference/posts_join
    */
    function cf_search_join($join)
    {
      global $wpdb;

      if (is_search()) {
        $join .= ' LEFT JOIN ' . $wpdb->postmeta . ' ON ' . $wpdb->posts . '.ID = ' . $wpdb->postmeta . '.post_id ';
      }

      return $join;
    }

    /**
    * Modify the search query with posts_where
    *
    * http://codex.wordpress.org/Plugin_API/Filter_Reference/posts_where
    */
    function cf_search_where($where)
    {
      global $pagenow, $wpdb;

      if (is_search()) {
        $where = preg_replace(
          "/\(\s*" . $wpdb->posts . ".post_title\s+LIKE\s*(\'[^\']+\')\s*\)/",
          "(" . $wpdb->posts . ".post_title LIKE $1) OR (" . $wpdb->postmeta . ".meta_value LIKE $1)", $where);
        }

        return $where;
      }

      /**
      * Prevent duplicates
      *
      * http://codex.wordpress.org/Plugin_API/Filter_Reference/posts_distinct
      */
      function cf_search_distinct($where)
      {
        global $wpdb;

        if (is_search()) {
          return "DISTINCT";
        }

        return $where;
      }


      /**
      * Filters wp_title to print a neat <title> tag based on what is being viewed.
      *
      * @param string $title Default title text for current view.
      * @param string $sep Optional separator.
      * @return string The filtered title.
      */

      function wp_title( $title, $sep ) {
        if ( is_feed() ) {
          return $title;
        }

        global $page, $paged;

        // Add the blog name
        $title .= get_bloginfo( 'name', 'display' );

        // Add the blog description for the home/front page.
        $site_description = get_bloginfo( 'description', 'display' );
        if ( $site_description && ( is_home() || is_front_page() ) ) {
          $title .= " $sep $site_description";
        }

        // Add a page number if necessary:
        if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
          $title .= " $sep " . sprintf( __( 'Page %s', TEXT_DOMAIN), max( $paged, $page ) );
        }

        return $title;
      }

      /*
      * Add custom layout to gallery
      */
      function gallery_layout(){

        // define your backbone template;
        // the "tmpl-" prefix is required,
        // and your input field should have a data-setting attribute
        // matching the shortcode name
        ?>
        <script type="text/html" id="tmpl-layout-gallery-setting">
          <label class="setting">
            <span><?php _e('Шаблон галереї', TEXT_DOMAIN); ?></span>
            <select data-setting="layout">
              <option value="grid">Сітка</option>
              <option value="slides">Слайди</option>
            </select>
          </label>
        </script>

        <script>

        jQuery(document).ready(function(){

          // add your shortcode attribute and its default value to the
          // gallery settings list; $.extend should work as well...
          _.extend(wp.media.gallery.defaults, {
            my_custom_attr: 'grid'
          });

          // merge default gallery settings template with yours
          wp.media.view.Settings.Gallery = wp.media.view.Settings.Gallery.extend({
            template: function(view){
              return wp.media.template('gallery-settings')(view)
              + wp.media.template('layout-gallery-setting')(view);
            }
          });
        });

        </script>
        <?php
      }

      /**
      */

      function special_nav_class($classes, $item){
        global $post;
        if( is_single() ){
          $top_parent = ThemeHelper::get_top_parent_page( $post->ID );
          // echo '<pre>';
          // print_r($item);
          // echo '</pre>';

          if($item->object_id == $top_parent->ID){

            $classes[] = 'current-menu-item';
          }
        }
        return $classes;
      }

      //------------------------

      public function googleform_action(){

        if( !isset( $_POST ) ||
        empty( $_POST ) ||
        !isset( $_POST['form'] ) ||
        empty( $_POST['form'] ) ||
        !isset( $_POST['email'] ) ||
        empty( $_POST['email'] ) ||
        !isset( $_POST['google_form_id'] ) ||
        empty( $_POST['google_form_id'] ) ){

          echo 'error';
          wp_die();
        }

        $data = '';
        $google_form_url = 'https://docs.google.com/forms/d/'.$_POST['google_form_id'].'/formResponse';

        parse_str( $_POST['form'], $data);

        $google_response = $this->send_form_to_google( $data, $google_form_url );


        if ( $google_response === FALSE ) {
          echo 'fail';
          wp_die();
        }
        else{
          if( isset( $_POST['letter_id']) && !empty($_POST['letter_id'])){
            $this->send_email_to_user( $_POST['email'], $_POST['letter_id'] );
          }
          echo 'success';
          wp_die();
        }
        wp_die();

      }

      public function send_form_to_google( $form_fields, $url ){

        $options = array(
          'http' => array(
            'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
            'method'  => 'POST',
            'content' => http_build_query( $form_fields )
          )
        );
        $context  = stream_context_create( $options );
        $result = file_get_contents( $url, false, $context );
        return $result;
      }

      public function send_email_to_user( $to, $letter_id ){

        $post_object = get_post( $letter_id );


        $subject = 'Вітання з COSMOSу';
        $body = apply_filters( 'the_content', $post_object->post_content );
        $body = '<div style="max-width: 640px; font-size: 15px;">'. $body .'</div>';
        // $body = $post_object->post_content;
        // $headers = array('Content-Type: text/html; charset=UTF-8');

        // $to = 'mykola.stetsyshyn@gmail.com';
        // $subject = 'The subject';
        // $body = 'The email body content';
        // $headers = array('Content-Type: text/html; charset=UTF-8');

        $headers = "From: COSMOS Prefab <hello@cosmosprefab.com>" . "\r\n";
        $headers .= "Content-Type: text/html; charset=UTF-8";

        wp_mail( $to, $subject, $body, $headers );

      }

      // -------------------

      function image_crop_dimensions($default, $orig_w, $orig_h, $new_w, $new_h, $crop){
        if ( !$crop ) return null; // let the wordpress default function handle this

        $aspect_ratio = $orig_w / $orig_h;
        $size_ratio = max($new_w / $orig_w, $new_h / $orig_h);

        $crop_w = round($new_w / $size_ratio);
        $crop_h = round($new_h / $size_ratio);

        $s_x = floor( ($orig_w - $crop_w) / 2 );
        $s_y = floor( ($orig_h - $crop_h) / 2 );

        return array( 0, 0, (int) $s_x, (int) $s_y, (int) $new_w, (int) $new_h, (int) $crop_w, (int) $crop_h );
      }

      function set_content_type(){
        return "text/html";
      }



      //-----------------------

      static function hex2rgb( $colour ) {
        if ( $colour[0] == '#' ) {
          $colour = substr( $colour, 1 );
        }
        if ( strlen( $colour ) == 6 ) {
          list( $r, $g, $b ) = array( $colour[0] . $colour[1], $colour[2] . $colour[3], $colour[4] . $colour[5] );
        } elseif ( strlen( $colour ) == 3 ) {
          list( $r, $g, $b ) = array( $colour[0] . $colour[0], $colour[1] . $colour[1], $colour[2] . $colour[2] );
        } else {
          return false;
        }
        $r = hexdec( $r );
        $g = hexdec( $g );
        $b = hexdec( $b );
        return implode( ', ', array( 'red' => $r, 'green' => $g, 'blue' => $b ));
      }

      //-----------------------

      public function check_array( $array ){
        $result = array();
        if( !is_array( $array) ) {
          $result[] = $array;
        }else{
          $result = $array;
        }
        return $result;
      }

      //----------------------------

      public function convert_names_to_codes( $names, $region = false){
        $array = $this->check_array($names);

        if($region == 'usa'){
          return( array_map( array($this, 'state_to_code_map_callback') , $array ));
        }elseif($region == 'ca'){
          return( array_map( array($this, 'ca_country_to_code_map_callback') , $array ));
        }else{
          return( array_map( array($this, 'country_to_code_map_callback') , $array ));
        }
      }

      public function convert_continents_to_num( $names, $is_usa = false){
        $array = $this->check_array($names);
        return( array_map( array($this, 'continent_to_code_map_callback') , $array ));
      }

      public function continent_to_code_map_callback( $continent ){

        $continents = array(
          '1' => 'United States',
          '2' => 'South America',
          '3' => 'Europe',
          '4' => 'Africa',
          '5' => 'Asia',
          '6' => 'Oceania',
          '7' => 'Central America',
          '8' => 'North America',
          '9' => 'Caribbean'
        );
        return ( array_search( $continent, $continents ));
      }

      public function state_to_code_map_callback( $state ){

        $states = array(
          'US-AL'=>'Alabama',
          'US-AK'=>'Alaska',
          'US-AZ'=>'Arizona',
          'US-AR'=>'Arkansas',
          'US-CA'=>'California',
          'US-CO'=>'Colorado',
          'US-CT'=>'Connecticut',
          'US-DE'=>'Delaware',
          'US-DC'=>'District of Columbia',
          'US-FL'=>'Florida',
          'US-GA'=>'Georgia',
          'US-HI'=>'Hawaii',
          'US-ID'=>'Idaho',
          'US-IL'=>'Illinois',
          'US-IN'=>'Indiana',
          'US-IA'=>'Iowa',
          'US-KS'=>'Kansas',
          'US-KY'=>'Kentucky',
          'US-LA'=>'Louisiana',
          'US-ME'=>'Maine',
          'US-MD'=>'Maryland',
          'US-MA'=>'Massachusetts',
          'US-MI'=>'Michigan',
          'US-MN'=>'Minnesota',
          'US-MS'=>'Mississippi',
          'US-MO'=>'Missouri',
          'US-MT'=>'Montana',
          'US-NE'=>'Nebraska',
          'US-NV'=>'Nevada',
          'US-NH'=>'New Hampshire',
          'US-NJ'=>'New Jersey',
          'US-NM'=>'New Mexico',
          'US-NY'=>'New York',
          'US-NC'=>'North Carolina',
          'US-ND'=>'North Dakota',
          'US-OH'=>'Ohio',
          'US-OK'=>'Oklahoma',
          'US-OR'=>'Oregon',
          'US-PA'=>'Pennsylvania',
          'US-RI'=>'Rhode Island',
          'US-SC'=>'South Carolina',
          'US-SD'=>'South Dakota',
          'US-TN'=>'Tennessee',
          'US-TX'=>'Texas',
          'US-UT'=>'Utah',
          'US-VT'=>'Vermont',
          'US-VA'=>'Virginia',
          'US-WA'=>'Washington',
          'US-WV'=>'West Virginia',
          'US-WI'=>'Wisconsin',
          'US-WY'=>'Wyoming',
        );
        return ( array_search( $state, $states ));
      }

      public function ca_country_to_code_map_callback( $country ){

        $countries = array(
          'CA-BZ' => 'Belize',
          'CA-CR' => 'Costa Rica',
          'CA-SV' => 'El Salvador',
          'CA-GT' => 'Guatemala',
          'CA-HN' => 'Honduras',
          'CA-NI' => 'Nicaragua',
          'CA-PA' => 'Panama'
        );
        return ( array_search( $country, $countries ));
      }

      public function country_to_code_map_callback( $country ){
        $countries = array
        (
          'AF' => 'Afghanistan',
          'AX' => 'Aland Islands',
          'AL' => 'Albania',
          'DZ' => 'Algeria',
          'AS' => 'American Samoa',
          'AD' => 'Andorra',
          'AO' => 'Angola',
          'AI' => 'Anguilla',
          'AQ' => 'Antarctica',
          'AG' => 'Antigua And Barbuda',
          'AR' => 'Argentina',
          'AM' => 'Armenia',
          'AW' => 'Aruba',
          'AU' => 'Australia',
          'AT' => 'Austria',
          'AZ' => 'Azerbaijan',
          'BS' => 'Bahamas',
          'BH' => 'Bahrain',
          'BD' => 'Bangladesh',
          'BB' => 'Barbados',
          'BY' => 'Belarus',
          'BE' => 'Belgium',
          'BZ' => 'Belize',
          'BJ' => 'Benin',
          'BM' => 'Bermuda',
          'BT' => 'Bhutan',
          'BO' => 'Bolivia',
          'BA' => 'Bosnia and Herz.',
          'BW' => 'Botswana',
          'BV' => 'Bouvet Island',
          'BR' => 'Brazil',
          'IO' => 'British Indian Ocean Territory',
          'BN' => 'Brunei Darussalam',
          'BG' => 'Bulgaria',
          'BF' => 'Burkina Faso',
          'BI' => 'Burundi',
          'KH' => 'Cambodia',
          'CM' => 'Cameroon',
          'CA' => 'Canada',
          'CV' => 'Cape Verde',
          'KY' => 'Cayman Islands',
          'CF' => 'Central African Rep.',
          'TD' => 'Chad',
          'CL' => 'Chile',
          'CN' => 'China',
          'CX' => 'Christmas Island',
          'CC' => 'Cocos (Keeling) Islands',
          'CO' => 'Colombia',
          'KM' => 'Comoros',
          'CG' => 'Congo',
          'CD' => 'Dem. Rep. Congo',
          'CK' => 'Cook Islands',
          'CR' => 'Costa Rica',
          'CI' => 'Cote D\’Ivoire',
          'HR' => 'Croatia',
          'CU' => 'Cuba',
          'CY' => 'Cyprus',
          'CZ' => 'Czech Rep.',
          'DK' => 'Denmark',
          'DJ' => 'Djibouti',
          'DM' => 'Dominica',
          'DO' => 'Dominican Republic',
          'EC' => 'Ecuador',
          'EG' => 'Egypt',
          'SV' => 'El Salvador',
          'GQ' => 'Eq. Guinea',
          'ER' => 'Eritrea',
          'EE' => 'Estonia',
          'ET' => 'Ethiopia',
          'FK' => 'Falkland Is.',
          'FO' => 'Faroe Islands',
          'FJ' => 'Fiji',
          'FI' => 'Finland',
          'FR' => 'France',
          'GF' => 'French Guiana',
          'PF' => 'Fr. Polynesia',
          'TF' => 'French Southern Territories',
          'GA' => 'Gabon',
          'GM' => 'Gambia',
          'GE' => 'Georgia',
          'DE' => 'Germany',
          'GH' => 'Ghana',
          'GI' => 'Gibraltar',
          'GR' => 'Greece',
          'GL' => 'Greenland',
          'GD' => 'Grenada',
          'GP' => 'Guadeloupe',
          'GU' => 'Guam',
          'GT' => 'Guatemala',
          'GG' => 'Guernsey',
          'GN' => 'Guinea',
          'GW' => 'Guinea-Bissau',
          'GY' => 'Guyana',
          'HT' => 'Haiti',
          'HM' => 'Heard Island & Mcdonald Islands',
          'VA' => 'Holy See (Vatican City State)',
          'HN' => 'Honduras',
          'HK' => 'Hong Kong',
          'HU' => 'Hungary',
          'IS' => 'Iceland',
          'IN' => 'India',
          'ID' => 'Indonesia',
          'IR' => 'Iran',
          'IQ' => 'Iraq',
          'IE' => 'Ireland',
          'IM' => 'Isle Of Man',
          'IL' => 'Israel',
          'IT' => 'Italy',
          'JM' => 'Jamaica',
          'JP' => 'Japan',
          'JE' => 'Jersey',
          'JO' => 'Jordan',
          'KZ' => 'Kazakhstan',
          'KE' => 'Kenya',
          'KI' => 'Kiribati',
          'KR' => 'Korea',
          'KP' => 'Dem. Rep. Korea',
          'XK' => 'Kosovo',
          'KW' => 'Kuwait',
          'KG' => 'Kyrgyzstan',
          'LA' => 'Lao PDR',
          'LV' => 'Latvia',
          'LB' => 'Lebanon',
          'LS' => 'Lesotho',
          'LR' => 'Liberia',
          'LY' => 'Libya',
          'LI' => 'Liechtenstein',
          'LT' => 'Lithuania',
          'LU' => 'Luxembourg',
          'MO' => 'Macao',
          'MK' => 'Macedonia',
          'MG' => 'Madagascar',
          'MW' => 'Malawi',
          'MY' => 'Malaysia',
          'MV' => 'Maldives',
          'ML' => 'Mali',
          'MT' => 'Malta',
          'MH' => 'Marshall Islands',
          'MQ' => 'Martinique',
          'MR' => 'Mauritania',
          'MU' => 'Mauritius',
          'YT' => 'Mayotte',
          'MX' => 'Mexico',
          'FM' => 'Micronesia, Federated States Of',
          'MD' => 'Moldova',
          'MC' => 'Monaco',
          'MN' => 'Mongolia',
          'ME' => 'Montenegro',
          'MS' => 'Montserrat',
          'MA' => 'Morocco',
          'MZ' => 'Mozambique',
          'MM' => 'Myanmar',
          'NA' => 'Namibia',
          'NR' => 'Nauru',
          'NP' => 'Nepal',
          'NL' => 'Netherlands',
          'AN' => 'Netherlands Antilles',
          'NC' => 'New Caledonia',
          'NZ' => 'New Zealand',
          'NI' => 'Nicaragua',
          'NE' => 'Niger',
          'NG' => 'Nigeria',
          'NU' => 'Niue',
          'NF' => 'Norfolk Island',
          'MP' => 'Northern Mariana Islands',
          'NO' => 'Norway',
          'OM' => 'Oman',
          'PK' => 'Pakistan',
          'PW' => 'Palau',
          'PS' => 'Palestine',
          'PA' => 'Panama',
          'PG' => 'Papua New Guinea',
          'PY' => 'Paraguay',
          'PE' => 'Peru',
          'PH' => 'Philippines',
          'PN' => 'Pitcairn',
          'PL' => 'Poland',
          'PT' => 'Portugal',
          'PR' => 'Puerto Rico',
          'QA' => 'Qatar',
          'RE' => 'Reunion',
          'RO' => 'Romania',
          'RU' => 'Russia',
          'RW' => 'Rwanda',
          'BL' => 'Saint Barthelemy',
          'SH' => 'Saint Helena',
          'KN' => 'Saint Kitts And Nevis',
          'LC' => 'Saint Lucia',
          'MF' => 'Saint Martin',
          'PM' => 'Saint Pierre And Miquelon',
          'VC' => 'Saint Vincent And Grenadines',
          'WS' => 'Samoa',
          'SM' => 'San Marino',
          'ST' => 'Sao Tome and Principe',
          'SA' => 'Saudi Arabia',
          'SN' => 'Senegal',
          'RS' => 'Serbia',
          'SC' => 'Seychelles',
          'SL' => 'Sierra Leone',
          'SG' => 'Singapore',
          'SK' => 'Slovakia',
          'SI' => 'Slovenia',
          'SB' => 'Solomon Is.',
          'SO' => 'Somalia',
          'XS' => 'Somaliland',
          'ZA' => 'South Africa',
          'GS' => 'South Georgia And Sandwich Isl.',
          'ES' => 'Spain',
          'LK' => 'Sri Lanka',
          'SD' => 'Sudan',
          'SS' => 'S. Sudan',
          'SR' => 'Suriname',
          'SJ' => 'Svalbard And Jan Mayen',
          'SZ' => 'Swaziland',
          'SE' => 'Sweden',
          'CH' => 'Switzerland',
          'SY' => 'Syria',
          'TW' => 'Taiwan',
          'TJ' => 'Tajikistan',
          'TZ' => 'Tanzania',
          'TH' => 'Thailand',
          'TL' => 'Timor-Leste',
          'TG' => 'Togo',
          'TK' => 'Tokelau',
          'TO' => 'Tonga',
          'TT' => 'Trinidad & Tobago',
          'TN' => 'Tunisia',
          'TR' => 'Turkey',
          'TM' => 'Turkmenistan',
          'TC' => 'Turks And Caicos Islands',
          'TV' => 'Tuvalu',
          'UG' => 'Uganda',
          'UA' => 'Ukraine',
          'AE' => 'United Arab Emirates',
          'GB' => 'United Kingdom',
          'US' => 'United States',
          'UM' => 'United States Outlying Islands',
          'UY' => 'Uruguay',
          'UZ' => 'Uzbekistan',
          'VU' => 'Vanuatu',
          'VE' => 'Venezuela',
          'VN' => 'Vietnam',
          'VG' => 'Virgin Islands, British',
          'VI' => 'Virgin Islands, U.S.',
          'WF' => 'Wallis And Futuna',
          'EH' => 'W. Sahara',
          'YE' => 'Yemen',
          'ZM' => 'Zambia',
          'ZW' => 'Zimbabwe',
        );
        return ( array_search( $country, $countries ));
      }

    }

    $themeHelper = new ThemeHelper();
  }
