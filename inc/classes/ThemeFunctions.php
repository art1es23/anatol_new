<?php

/**
*/
defined('ABSPATH') or die();

if( !class_exists('ThemeFunctions')){

  class ThemeFunctions
  {
    /**
    * Hook into the appropriate actions when the class is constructed.
    */
    public function __construct()
    {
      add_action('after_setup_theme', array($this, 'theme_setup'));
      // add_action('widgets_init', array($this, 'widgets_init'));
      add_action('wp_enqueue_scripts', array( $this, 'enqueue_theme_css' ));
      add_action('admin_enqueue_scripts', array( $this, 'enqueue_admin_js'));
      add_action('wp_enqueue_scripts', array( $this, 'enqueue_theme_js'));

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
      dd_theme_support( 'title-tag' );
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
      //   'name'          => __('Мови', TEXT_DOMAIN),
      //   'id'            => 'lang',
      //   'description'   => '',
      //   'before_widget' => '<aside id="%1$s" class="widget %2$s">',
      //   'after_widget'  => '</aside>',
      //   'before_title'  => '<h1 class="widget-title">',
      //   'after_title'   => '</h1>',
      // ));
    }

    /**
    * Enqueue scripts and styles in admin panel.
    */

    function include_admin_css()
    {
      wp_enqueue_style('admin', get_template_directory_uri() . '/css/admin.css');
      wp_enqueue_script('jquery-ui-core');
      wp_enqueue_script('jquery-ui-accordion');
      wp_enqueue_script('jquery-ui-tabs');
      wp_enqueue_script('jquery-ui-sortable');

      wp_enqueue_script('admin-bootstrap', get_template_directory_uri() . '/admin-bootstrap/js/bootstrap.js');

      // wp_enqueue_script('admin', get_template_directory_uri() . '/js/admin.js');

    }
    /***************************
    ***************************/
    function enqueue_admin_js($hook) {

    	if(get_post_type()!== 'sales-dealers') return;

    	wp_enqueue_style('tokenize', get_template_directory_uri() . '/js/tokenize/jquery.tokenize.css');
    	wp_enqueue_script('tokenize', get_template_directory_uri() . '/js/tokenize/jquery.tokenize.js');
    	wp_enqueue_script('admin_custom_script', get_template_directory_uri() . '/js/admin.js');
    }
    /***************************
    ***************************/

    function enqueue_theme_css() {

    	wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '1', 'all' );

    	wp_enqueue_style('chosen', get_template_directory_uri() . '/css/chosen.min.css', array(), '1', 'all' );
    	wp_enqueue_style('fancybox', get_template_directory_uri() . '/js/fancybox/jquery.fancybox.min.css', '', '1.0', 'all');
    	wp_enqueue_style('nice-select', get_template_directory_uri() . '/css/nice-select.min.css', '', '1.0', 'all');
    	wp_enqueue_style('slick', get_template_directory_uri() . '/js/slick/slick.min.css', '', '1.0', 'all');
    	wp_enqueue_style('slick-theme', get_template_directory_uri() . '/js/slick/slick-theme.min.css', '', '1.0', 'all');
    	wp_enqueue_style('google-font', '//fonts.googleapis.com/css?family=Exo+2:400,700,900|Open+Sans:400,600,700,800&amp;subset=cyrillic', '', 'all');

    	wp_enqueue_style('fontawesome', get_template_directory_uri() . '/css/font-awesome.min.css', '', '4.7', 'all');
    	wp_enqueue_style('AnatolIconsFont', get_template_directory_uri() . '/css/anatol-font.min.css', '', '1.1', 'all');

    	if(!is_front_page() && !is_home()){
    		wp_enqueue_style('stacktable-css',get_template_directory_uri().'/css/stacktable.min.css', '', '1.0', 'all');
    		wp_enqueue_style('equipment_gallery',get_template_directory_uri().'/css/equipment_gallery.min.css', array(), '1.0', 'all');
    		wp_enqueue_style('ideaboxTimeline-css', get_template_directory_uri() . '/css/ideaboxTimeline.min.css', '', '1.0', 'all');
    		wp_enqueue_style('owl.carousel.css',get_template_directory_uri().'/js/owl/owl.carousel.min.css', '', '1.0', 'all');
    	}
    	wp_enqueue_style('stylesheet', get_stylesheet_uri(), array(), '2.2.1', 'all' );
    }

    /*
    *
    */
    function enqueue_theme_js()
    {
    	global $version, $google_api_key;
    	wp_enqueue_script('chosen', get_template_directory_uri().'/js/chosen.jquery.min.js', '', '', true);
    	wp_enqueue_script('theme', get_template_directory_uri().'/js/bootstrap.min.js', '', '', true );
    	wp_enqueue_script('fancybox', get_template_directory_uri().'/js/fancybox/jquery.fancybox.min.js', '', '', true);
    	wp_enqueue_script('nice-select', get_template_directory_uri().'/js/jquery.nice-select.js', '', '', true);
    	wp_enqueue_script('fluidvids', get_template_directory_uri().'/js/fluidvids.min.js', '', '', true);
    	// wp_enqueue_script('acf_gmap', get_template_directory_uri().'/js/acf_gmap.js', '', '', true);
    	// wp_enqueue_script('uikit',  get_template_directory_uri().'/js/uikit.js', '', '', true);
    	// wp_enqueue_script('uikit-notify',  get_template_directory_uri().'/js/components/notify.js', '', 1.0, true);
    	wp_enqueue_script('slick', get_template_directory_uri().'/js/slick/slick.min.js', '', 1.0, true);
    	// wp_enqueue_script('recaptcha-js', 'https://www.google.com/recaptcha/api.js', '', 1.0, true);

    	if(!is_front_page() && !is_home()){

    		wp_enqueue_script('stacktable',  get_template_directory_uri().'/js/stacktable.js', '', 1.0, true);
    		//	wp_enqueue_script('aos.js',  get_template_directory_uri().'/js/aos.js', '', 1.0, true);
    		// wp_enqueue_script('TweenMax.js',  get_template_directory_uri().'/js/TweenMax.min.js', '', 1.0, true);
    		wp_enqueue_script('ideaboxTimeline', get_template_directory_uri().'/js/ideaboxTimeline.js', '', 1.0, true);
    		wp_enqueue_script('owl.carousel',  get_template_directory_uri().'/js/owl/owl.carousel.min.js', '', 1.0, true);
    		wp_enqueue_script('gmaps', 'https://maps.googleapis.com/maps/api/js?key='.$google_api_key, '', 1.0, true);

    	}

    	wp_enqueue_script('anatol-js', get_template_directory_uri().'/js/anatol.js', '', '1.3.3', true);
    }



    /***************************
    ***************************/

    function manage_roles()
    {
      // get the the role object
      $role_object = get_role('editor');

      // add $cap capability to this role object
      $role_object->add_cap('edit_theme_options');
    }

    /***************************
    ***************************/
    function excerpt_length($length)
    {
      if (is_home()) return 20;
      if (is_category()) return 30;
      else return 20;
    }
    /***************************
    ***************************/
    function excerpt_more($more)
    {
      return ' ...';
    }
    /***************************
    ***************************/
    function pre_get_posts($query)
    {

      if ( $query->is_tag() ) {
        $query->set( 'post_type', array( 'post', 'page', 'editions' ) );
      }

      return $query;
    }
    /******************************
    Check if the array exists
    ******************************/
    public function ch_index($index, $array)
    {
      if (!is_array($array)) return '';

      if (array_key_exists($index, $array))
      return $array[$index];
      else
      return '';
    }

    /******************************
    * Get term image url
    - term
    - type
    - size
    ******************************/

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

    /******************************

    ******************************/

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

      /***********************************
        Add custom layout to gallery
      ************************************/
      function gallery_layout(){

        ?>
        <script type="text/html" id="tmpl-layout-gallery-setting">
          <label class="setting">
            <span><?php _e('Шаблон галереї', TEXT_DOMAIN); ?></span>
            <select data-setting="layout">
              <option value="grid">Grid</option>
              <option value="slides">Slides</option>
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

      /*******************
      *
      ********************/

      function special_nav_class($classes, $item){
        global $post;
        if( is_single() ){
          $top_parent = ThemeFunctions::get_top_parent_page( $post->ID );
          // echo '<pre>';
          // print_r($item);
          // echo '</pre>';

          if($item->object_id == $top_parent->ID){

            $classes[] = 'current-menu-item';
          }
        }
        return $classes;
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


    }

    $ThemeFunctions = new ThemeFunctions();
  }
