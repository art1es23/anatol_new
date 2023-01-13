<?php
  function remove_menus(){

	global $menu;
	$restricted = array(
	__('Dashboard'),
	//__('Pages'),
	//__('Appearance'),
	//__('Tools'),
	//__('Media'),
	//__('Users'),
	//__('Settings'),
	//__('Comments'),
	//__('Plugins')
	);
	end ($menu);
	while (prev($menu)){
		$value = explode(' ', $menu[key($menu)][0]);
		if( in_array( ($value[0] != NULL ? $value[0] : "") , $restricted ) ){
			unset($menu[key($menu)]);
		}
	}	
}
add_action('admin_menu', 'remove_menus');
function remove_editor_menu() {
  remove_action('admin_menu', '_add_themes_utility_last', 101);
}

add_action('_admin_menu', 'remove_editor_menu', 1); 
////////////////////////////////////////////////////////////////////
// Theme Information
////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////////////
//  Theme-options.php for Admin Theme settings
////////////////////////////////////////////////////////////////////

//include 'theme-options.php';
include_once get_template_directory() . '/inc/classes/ThemeHelper.php';
include_once get_template_directory() . '/inc/classes/ROICalculator.php';
include_once get_template_directory() . '/inc/classes/Warranty.php';

require_once('lib/add_custom_field_accounts.php');

//--------------------------------

add_role( 'sales_manager_role', 'Sales Manager', array( 'read' => true, 'edit_posts' => false ) );

// add_action( 'wp_ajax_roi_register_user_action', 'roi_register_user_action' );
// add_action( 'wp_ajax_nopriv_roi_register_user_action', 'roi_register_user_action' );
// function roi_register_user_action(){
// 	$data = $_POST['formData'];
//
// 	// $first_name = $_POST['first_name'];
// 	// $last_name = $_POST['last_name'];
// 	// $email = $_POST['email'];
// 	// $location = $_POST['country'];
// 	// $region = $_POST['region'];
// 	echo 'work';
// 	wp_die();
// }

//--------------------------------
add_filter( 'wpcf7_autop_or_not', '__return_false' );
// Отключаем любые CSS стили плагинов

function custom_dequeue() {
	wp_dequeue_style( 'select2' );
	wp_dequeue_style( 'prdctfltr' );
	wp_dequeue_style( 'beautiful-taxonomy-filters-basic' );
    wp_dequeue_style('wc-blocks-style');
    wp_deregister_style('wc-blocks-style');
    wp_dequeue_style('jquery.fancybox.min');
    wp_deregister_style('jquery.fancybox.min');

	// wp_deregister_style('vendor-fontawesome', get_template_directory_uri() . '/wp-content/plugins/easy-login-woocommerce/xoo-form-fields-fw/lib/fontawesome5/css/all.min.css');
	wp_deregister_style('beautiful-taxonomy-filters');
	wp_dequeue_style( 'contact-form-7' );
	wp_deregister_style( 'easy-login-woocommerce' );

	wp_deregister_style( 'xoo-el-fonts' );
	wp_deregister_style( 'xoo-aff-style' );
	// wp_deregister_script( 'smooth-scrollbar' );

	wp_deregister_style( 'advanced-custom-fields' );
	
	wp_dequeue_style('classic-theme-styles');
	
	// wp_deregister_script('admin-bar');
		
	if ( !is_archive('vacancies')) {
		wp_dequeue_script( 'contact-form-7' );
		wp_deregister_script('select2'); 
		wp_deregister_script('beautiful-taxonomy-filters');
		
		wp_dequeue_style('vacancies-css'); 
	}

	if ( is_archive('customer-stories') ) {
		wp_dequeue_script( 'contact-form-7' );
		wp_deregister_script('select2'); 
		wp_deregister_script('beautiful-taxonomy-filters');
		
		wp_deregister_style('vacancies-css'); 
		
	}
	
	if (is_archive('vacancies')) {
		
		wp_enqueue_script('beautiful-taxonomy-filters');
		wp_enqueue_script('select2');
		// wp_enqueue_style('select2.min.css', get_template_directory_uri() .'/wp-content/plugins/beautiful-taxonomy-filters/public/css/select2.min.css', '', '1.0', 'all');
	}

}
add_action( 'wp_enqueue_scripts', 'custom_dequeue', 9999 );
add_action( 'wp_head', 'custom_dequeue', 9999 );

// DISABLE WOOCOMMERCE STYLES
add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

/****************************/
function is_post_type($type){
    global $wp_query;
    if($type == get_post_type($wp_query->post->ID)) 
        return true;
    return false;
}

////////////////////////////////////////////////////////////////////
// Enqueue Styles (normal style.css and bootstrap.css)
////////////////////////////////////////////////////////////////////16792
function theme_stylesheets() {
	// wp_enqueue_style('AnatolIconsFont', get_template_directory_uri() . '/css/anatol-font.min.css', '', '1.1', 'all');

	wp_enqueue_style('swiper-css', get_template_directory_uri() . '/css/libs/swiper-bundle.css');
	wp_enqueue_style('style-main', get_template_directory_uri() . '/style.css');

	if ( is_shop() ||  is_product() || is_product_category() || is_page('cart') ) { 
		wp_enqueue_style( 'another-equipment-css', get_template_directory_uri() . '/css/components/another-equipments.css' );
		wp_enqueue_style( 'hero-section-css', get_template_directory_uri() . '/css/components/hero-templates/hero-template.css' );

		// wp_enqueue_style( 'product-css', get_template_directory_uri() . '/css/components/equipments-list.css' );
		
		wp_enqueue_style( 'equip-item-css', get_template_directory_uri() . '/css/components/equipments-list.css' );
		wp_enqueue_style( 'press-item-css', get_template_directory_uri() . '/css/components/presses-item.css' );
		wp_enqueue_style( 'woo-related-products-css', get_template_directory_uri() . '/css/components/related-products-slider.css' );
		wp_enqueue_style( 'woo-css', get_template_directory_uri() . '/css/page-templates/store/woo.css' );
		wp_enqueue_style( 'woo-sidebar-filter', get_template_directory_uri() . '/css/components/sidebars/sidebar-woocommerce.css' );
		wp_enqueue_style( 'woo-product-css', get_template_directory_uri() . '/css/page-templates/store/page-woo-item.css' );
		

		// wp_enqueue_style( 'woocommerce-css', get_template_directory_uri() . '/css/woocommerce.css' );
		///////// wp_enqueue_style('style.min.css','/wp-content/plugins/prdctfltr/lib/css/style.min.css', '', '6.5.8', 'all');
	}

	if (is_page(1360)) {
		wp_enqueue_style( 'hero-section-css', get_template_directory_uri() . '/css/components/hero-templates/hero-template.css' );
		// wp_enqueue_style( 'default-form-template', get_template_directory_uri() . '/css/components/template-form.css' );
		wp_enqueue_style( 'woo-css', get_template_directory_uri() . '/css/page-templates/store/woo.css' );		
		wp_enqueue_style( 'woo-product-css', get_template_directory_uri() . '/css/page-templates/store/page-woo-item.css' );
		wp_enqueue_style( 'woo-cart-css', get_template_directory_uri() . '/css/page-templates/store/cart.css' );

	}

	if ( is_archive('vacancies')) {

		wp_enqueue_style('select2.min.css','/wp-content/plugins/beautiful-taxonomy-filters/public/css/select2.min.css', '', '1.0', 'all');
		// wp_enqueue_style('select2');
		wp_enqueue_style( 'vacancies-css', get_template_directory_uri() . '/css/components/vacancies.css' );
	}

	if (is_page(1228)) {
		wp_enqueue_style('chosen.css', get_template_directory_uri() . '/css/chosen.min.css', array(), '1', 'all' );
	}
			
	if(!is_front_page() && !is_home()){
		// wp_enqueue_style('select2.min.css','/wp-content/plugins/beautiful-taxonomy-filters/public/css/select2.min.css', '', '1.0', 'all');
		// wp_enqueue_style('chosen.css', get_template_directory_uri() . '/css/chosen.min.css', array(), '1', 'all' );
		// wp_enqueue_style('select2.min.css','/wp-content/plugins/beautiful-taxonomy-filters/public/css/select2.min.css', '', '1.0', 'all');
		
		// wp_enqueue_style('stacktable-css',get_template_directory_uri().'/css/stacktable.min.css', '', '1.0', 'all');
		
		// wp_enqueue_style( 'section-choose-us-css', get_template_directory_uri() . '/css/components/frontpage/section-choose-us.css' );
		// wp_enqueue_style( 'another-equipments-css', get_template_directory_uri() . '/css/components/frontpage/another-equipments.css' );
		// wp_enqueue_style( 'testimonials-css', get_template_directory_uri() . '/css/components/frontpage/testimonials.css' );
		// wp_enqueue_style( 'section-video-css', get_template_directory_uri() . '/css/components/frontpage/section-video.css' );
		// wp_enqueue_style( 'header-hero-slider-css', get_template_directory_uri() . '/css/components/frontpage/header-hero-slider.css' );

		// wp_enqueue_style('ideaboxTimeline-css', get_template_directory_uri() . '/css/ideaboxTimeline.css', '', '1.0', 'all');
		// wp_enqueue_style('style.min.css','/wp-content/plugins/prdctfltr/lib/css/style.min.css', '', '6.5.8', 'all');
	}
	// wp_enqueue_style('slick-css', get_template_directory_uri() . '/js/libs/slick/slick.css', '', '1.0', 'all');
	// wp_enqueue_style('slick-theme-css', get_template_directory_uri() . '/js/libs/slick/slick-theme.css', '', '1.0', 'all');
	//wp_enqueue_style('google-font', '//fonts.googleapis.com/css?family=Exo+2:400,700,900|Open+Sans:400,600,700,800&amp;subset=cyrillic', '', 'all');
	// wp_enqueue_style('google-font', '//fonts.googleapis.com/css?family=Open+Sans:400,600,700,800&amp;subset=cyrillic', '', 'all');

	// wp_enqueue_style('google-font', '//fonts.googleapis.com/css?family=Roboto:400,500,700&display=swap', '', 'all');
	// wp_enqueue_style('vendor-fontawesome', get_template_directory_uri() . '/css/font-awesome/css/fontawesome-all.min.css', '', '1.0', 'all');
	// wp_enqueue_style('fontawesome', get_template_directory_uri() . '/css/font-awesome.min.css', '', '4.7', 'all');
	
	// wp_enqueue_style('aos-css',get_template_directory_uri().'/css/new-style.css', '', '1.0', 'all');
	// wp_enqueue_style('style-fin-css',get_template_directory_uri().'/css/components/style-fin.css', '', '1.0', 'all');

	//wp_enqueue_style('theme-style',get_template_directory_uri().'/css/app.css', array('stylesheet'), '2.0.0', 'all');
	// if ( is_front_page() ) {
	// 	wp_enqueue_style( 'homepage-css', get_template_directory_uri() . '/css/components/homepage.css' );
	// }
	
	//about
	// if ( is_page('1526') || is_page('about') ) {
	// 	wp_enqueue_style( 'about-css', get_template_directory_uri() . '/css/components/about.css' );
	// }
	//blog
	// if ( is_page('1190') ) {
	// 	wp_enqueue_style( 'blogs-css', get_template_directory_uri() . '/css/components/blogs.css' );
	// }
	//calculator
	// if ( is_page('1206') || is_page('1210') || is_page('calculator'))  {
	// 	wp_enqueue_style( 'calculator-css', get_template_directory_uri() . '/css/components/calculator.css' );
	// }
	//sales
	// if ( is_page('1214') || is_page('1228') || is_page('where-to-buy')) {
	// 	wp_enqueue_style( 'sales-css', get_template_directory_uri() . '/css/components/sales.css' );
	// }
	//compare
	// if ( is_page('1872') || is_page('compare')) {
	// 	wp_enqueue_style( 'compare-css', get_template_directory_uri() . '/css/components/compare.css' );
	// }
	//contacts
	// if ( is_page('19305') || is_page('contact')) {
	// 	wp_enqueue_style( 'contacts-css', get_template_directory_uri() . '/css/components/contacts.css' );
	// }
	//events
	// if ( is_page('1513') || is_page('events-board')) {
	// 	wp_enqueue_style( 'events-css', get_template_directory_uri() . '/css/components/events.css' );
	// }
	//financing
	// if ( is_page('2204') || is_page('financing')) {
	// 	wp_enqueue_style( 'financing-css', get_template_directory_uri() . '/css/components/financing.css' );
	// }
	//Support
	// if ( is_page('2037') || is_page('1513') || is_page('support')) {
	// 	wp_enqueue_style( 'support-css', get_template_directory_uri() . '/css/components/support.css' );
	// }
	//Support
	// if ( is_single()) {
	// 	wp_enqueue_style( 'press-css', get_template_directory_uri() . '/css/components/press.css' );
	// }	
	// if ( is_page('2037') || is_page('1513') || is_page('1206')) {
	
	// }
	//equipments
	// if ( is_page('32') || is_page('equipment')) {
	// 	wp_enqueue_style( 'equipments-css', get_template_directory_uri() . '/css/components/equipments.css' );
	// }
	//vacancies
	
	// wp_enqueue_style('stylesheet', get_stylesheet_uri(), array(), date("d.m.Y"), 'all' );
    // wp_enqueue_style('mediacss', get_template_directory_uri() . '/css/mediacss.css', '', '', 'all');
   // wp_enqueue_style('media', get_template_directory_uri() . '/media.css', '', '', 'all');
}

add_action('wp_enqueue_scripts', 'theme_stylesheets');

//////////////////////////////////////////
// DISABLED
// function prefix_add_footer_styles() {
//     wp_enqueue_style('fancybox', 'csc/libs/jquery.fancybox.min.css', '', '1.0', 'all');
// };
// add_action( 'get_footer', 'prefix_add_footer_styles' );
//------------------------------

function anatol_enqueue_admin_scripts($hook) {
	if(get_post_type()!== 'sales-dealers') return;

	wp_enqueue_style('tokenize-css', get_template_directory_uri() . '/js/libs/tokenize/jquery.tokenize.css');
	wp_enqueue_script('tokenize-js', get_template_directory_uri() . '/js/libs/tokenize/jquery.tokenize.js');
	wp_enqueue_script('admin_custom_script', get_template_directory_uri() . '/js/admin.js');
}

add_action('admin_enqueue_scripts', 'anatol_enqueue_admin_scripts');
//-------------------------------

//Editor Style
add_editor_style('css/editor-style.css');

////////////////////////////////////////////////////////////////////
// Register Bootstrap JS with jquery
////////////////////////////////////////////////////////////////////
// include custom jQuery
//  DISABLED
// function shapeSpace_include_custom_jquery() {
	// if ( !is_shop() ||  !is_product() || !is_product_category()  || !is_page('cart') ) { 
	// 	wp_deregister_script('jquery');
	// }
	// if ( is_shop() ||  is_product() || is_product_category()  || is_page('cart') ) { 
		// wp_enqueue_script('jquery', 'js/libs/jquery/jquery-1.12.4.min.js', array(), null, false);
	// }
// }
// add_action('wp_enqueue_scripts', 'shapeSpace_include_custom_jquery'); 
// 
function theme_js()
{
	global $version, $google_api_key;
	wp_enqueue_script('header-js', get_template_directory_uri().'/js/headerPosition.js', false, null, 'footer');
	wp_enqueue_script('popup-js', get_template_directory_uri().'/js/openModal.js', false, null, 'footer');
	// wp_enqueue_script('main-js', get_template_directory_uri().'/js/main.js', false, null, 'footer');
	wp_enqueue_script('submit-form-js', get_template_directory_uri().'/js/submitForm.js', false, null, 'footer');

	if (is_page(1228)) {
		wp_enqueue_script('chosen.js', get_template_directory_uri().'/js/modules/chosen.jquery.min.js', '', '', true);
	}

}
add_action('wp_enqueue_scripts', 'theme_js');

////////////////////////////////////////////////////////////////////
// Add Title Tag Support with Regular Title Tag injection Fall back.
////////////////////////////////////////////////////////////////////
/* add_filter('script_loader_tag', 'clean_script_tag');
  function clean_script_tag($input) {
  $input = str_replace("type='text/javascript' ", '', $input);
  return str_replace("'", '"', $input);
} */
add_filter('style_loader_tag', 'codeless_remove_type_attr', 10, 2);
add_filter('script_loader_tag', 'codeless_remove_type_attr', 10, 2);
function codeless_remove_type_attr($tag, $handle) {
    return preg_replace( "/type=['\"]text\/(javascript|css)['\"]/", '', $tag );
}

function title_tag() {
	add_theme_support( 'title-tag' );
}

add_action( 'after_setup_theme', 'title_tag' );

if(!function_exists( '_wp_render_title_tag')) {

function render_title() {
?>
<title><?php wp_title( '|', true, 'right' ); ?></title>
<?php }

add_action( 'wp_head', 'render_title' );
}

////////////////////////////////////////////////////////////////////
// Register Custom Navigation Walker include custom menu widget to use walkerclass
////////////////////////////////////////////////////////////////////

require_once('lib/media.php');

////////////////////////////////////////////////////////////////////
// Register Menus
////////////////////////////////////////////////////////////////////

register_nav_menus(
	array(
		'main_menu' => 'Main Menu',
		'top_line_menu' => 'Top Line Menu',
		'footer_menu1' => 'Footer Menu 1',
		'footer_menu2' => 'Footer Menu 2'
	)
);

// <div class=\"back\"></div>"
/**
 * Custom walker class.
 */
//Add "parent" class to pages with subpages, change submenu class name, add depth class

    class Prio_Walker extends Walker_Nav_Menu {
    function display_element( $element, &$children_elements, $max_depth, $depth=0, $args, &$output ){
        $GLOBALS['dd_children'] = ( isset($children_elements[$element->ID]) )? 1:0;
        $GLOBALS['dd_depth'] = (int) $depth;
        parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
    }

	function start_lvl( &$output, $depth = 0, $args = array() ) {
		$indent = str_repeat("\t", $depth);
		$output .= "\n$indent<div class=\"dropdown dropdown-level-". $depth . "\"><ul class=\"dropdown-menu level-".$depth."\">";
	}
   function end_lvl( &$output, $depth = 0, $args = array() )
   {
       $indent = str_repeat("\t", $depth);
       $output .= "$indent</ul></div>\n";
   }
}

add_filter('nav_menu_css_class','add_parent_css',10,2);
function  add_parent_css($classes, $item){
     global  $dd_depth, $dd_children;
     $classes[] = 'depth'.$dd_depth;
     if($dd_children)
         $classes[] = 'parent_item';
    return $classes;
}
//Add class to parent pages to show they have subpages (only for automatic wp_nav_menu)

function add_parent_class( $css_class, $page, $depth, $args )
{
   if ( ! empty( $args['has_children'] ) )
       $css_class[] = 'parent_item';
   return $css_class;
}
add_filter( 'page_css_class', 'add_parent_class', 10, 4 );
/**
 * Custom walker class.
 */
 
 
 /* 
Альтернатива wp_pagenavi (без лишних обращений к данным)
*/
// удаляет H2 из шаблона пагинации
add_filter('navigation_markup_template', 'my_navigation_template', 10, 2 );
function my_navigation_template( $template, $class ){
	/*
	Вид базового шаблона:
	<nav class="navigation %1$s" role="navigation">
		<h2 class="screen-reader-text">%2$s</h2>
		<div class="nav-links">%3$s</div>
	</nav>
	*/

	return '
	<nav class="navigation %1$s" role="navigation">
		<div class="nav-links">%3$s</div>
	</nav>    
	';
}

function wp_corenavi() {
  global $wp_query;
  $total = isset( $wp_query->max_num_pages ) ? $wp_query->max_num_pages : 1;
  $a['total'] = $total;
  $a['mid_size'] = 3; // сколько ссылок показывать слева и справа от текущей
  $a['end_size'] = 1; // сколько ссылок показывать в начале и в конце
  $a['prev_text'] = '&laquo;'; // текст ссылки "Предыдущая страница"
  $a['next_text'] = '&raquo;'; // текст ссылки "Следующая страница"

  if ( $total > 1 ) echo '<nav class="pagination">';
  echo paginate_links( $a );
  if ( $total > 1 ) echo '</nav>';
}

 
// Register the Sidebar(s)
////////////////////////////////////////////////////////////////////
register_sidebar(
    array(
        'name' => 'Bottom Product Sidebar',
        'id' => 'bproduct-sidebar',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
      //  'before_title' => '<span class="widget-title">',
      //  'after_title' => '</span>',
    )
);

register_sidebar(
    array(
        'name' => 'Mobil filter Product Sidebar',
        'id' => 'mfproduct-sidebar',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
      //  'before_title' => '<span class="widget-title">',
      //  'after_title' => '</span>',
    )
);

register_sidebar(
	array(
		'name' => 'Right Sidebar',
		'id' => 'right-sidebar',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		// 'before_title' => '<h3>',
		// 'after_title' => '</h3>',
		'before_title' => '<span class="widget-title">',
		'after_title' => '</span>',
	)
);

register_sidebar(
	array(
		'name' => 'Left Sidebar',
		'id' => 'left-sidebar',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<span class="widget-title">',
		'after_title' => '</span>',
	)
);

register_sidebar( array(
	'name' => 'Vacancy Sidebar',
	'id' => 'vacancy_sidebar',
	'before_widget' => '',
	'after_widget' => '',
	'before_title' => '',
	'after_title' => '',
)
);

register_sidebar(
	array(
		'name' => 'Footer Equipment',
		'id' => 'footer-equipment',
		'before_widget' => '<div id="%1$s" class="widget"><ul id="menu-footer-menu" class="menu">',
		'after_widget' => '</ul></div>',
		'before_title' => '<div class="widget_title"><span>',
		'after_title' => '</span></div>',
	)
);
register_sidebar(
	array(
		'name' => 'Footer Info',
		'id' => 'footer-info',
		'before_widget' => '<div id="%1$s" class="widget"><ul id="menu-footer-menu" class="menu">',
		'after_widget' => '</ul></div>',
		'before_title' => '<div class="widget_title"><span>',
		'after_title' => '</span></div>',
	)
);

register_sidebar( array(
	'name' => 'Sidebar Filter for Woocoomerce',
	'id' => 'shop_wc',
	'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget' => '</div>',
	'before_title' => '<div class="widget_title">',
	'after_title' => '</div>',
	)
);

////////////////////////////////////////////////////////////////////
// Register hook and action woocommerce
////////////////////////////////////////////////////////////////////

add_theme_support( 'woocommerce' );
/* function mytheme_add_woocommerce_support() {
	add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );
 */

add_filter( 'loop_shop_per_page', 'custom_loop_shop_per_page', 20 );

function custom_loop_shop_per_page($cols) {
	global $wp_query;
	$slug = $wp_query->get_queried_object();
	$usedequipment_slugs = array(
		'usedequipment',
		'uzywany-sprzet',
		'б-у-оборудование',
		'equipo-usado',
	);

	if (isset($slug->slug) && in_array($slug->slug, $usedequipment_slugs)) {
		return 21;
	}

	return 21;
}

add_action('woocommerce_single_product_summary', function() {
	//template for this is in storefront-child/woocommerce/single-product/product-attributes.php
	global $product;
	echo $product->list_attributes();
}, 25);

function excerpt($limit) {
	$excerpt = explode(' ', get_the_content(), $limit);
	if (count($excerpt)>=$limit) {
		array_pop($excerpt);
		$excerpt = implode(" ",$excerpt).'...';
	} else {
		$excerpt = implode(" ",$excerpt);
	}
	$excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
	return $excerpt;
}

////////////////////////////////////////////////////////////////////
// Register hook and action to set Main content area col-md- width based on sidebar declarations
////////////////////////////////////////////////////////////////////

add_action( 'main_content_width_hook', 'main_content_width_columns');

function main_content_width_columns () {

	global $dm_settings;

	$columns = '12';

	if ($dm_settings['right_sidebar'] != 0) {
		$columns = $columns - $dm_settings['right_sidebar_width'];
	}

	if ($dm_settings['left_sidebar'] != 0) {
		$columns = $columns - $dm_settings['left_sidebar_width'];
	}

	echo $columns;
}

function main_content_width() {
	do_action('main_content_width_hook');
}

////////////////////////////////////////////////////////////////////
// Add support for a featured image and the size
////////////////////////////////////////////////////////////////////

add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size(300,300, true);

add_image_size( 'product_thumb', 1200, 1200, true );

//add_image_size( 'thumbnails-feed', 300, 180, true );
////////////////////////////////////////////////////////////////////
// Adds RSS feed links to for posts and comments.
////////////////////////////////////////////////////////////////////

add_theme_support( 'automatic-feed-links' );

////////////////////////////////////////////////////////////////////
// Set Content Width
////////////////////////////////////////////////////////////////////

// if ( ! isset( $content_width ) ) $content_width = 800;

if( function_exists('acf_add_options_page') ) {
	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
}

function create_anatol_posttypes() {
/* 	register_post_type( 'faq',
		array(
			'labels' => array(
				'name' 			=> __( 'Knowledge base' ),
				'singular_name'	=> __( 'Knowledge base' )
			),
			'public' => true,
			'has_archive' => true,
			'rewrite' => array('slug' => 'faq'),
			'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'custom-fields'),
			'menu_icon'   		=> 'dashicons-format-status'
		)
	);
	 */
	
	
    //-------- FAQ ---------
    register_post_type(
      'faq',
      array(
        'labels' => array(
          'name'             => __('FAQs'),
          'singular_name'    => __('Question')
        ),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'rewrite'             => array('slug' => 'faq'),
        'supports'             => array('title', 'editor', 'thumbnail', 'custom-fields'),
        'menu_icon'           => 'dashicons-editor-help',
      )
    );
	    //-------- FAQ categories ---------
    register_taxonomy(
      'topic',
      'faq',
      array(
        'label' => __('Topics'),
        'rewrite' => array('slug' => 'topic'),
        'hierarchical' => true,
      )
    );
	register_post_type( 'customer-stories',
		array(
			'labels' => array(
				'name' 			=> __( 'Customer Stories' ),
				'singular_name'	=> __( 'Customer Story' )
			),
			'public' => true,
			'has_archive' => true,
			'rewrite' => array('slug' => 'customer-stories'),
			'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments', 'custom-fields'),
			'menu_icon'   		=> 'dashicons-format-status'
		)
	);
	register_post_type( 'anatol-products-conv',
	array(
		'labels' => array(
			'name' 			=> __( 'Conveyor Dryers' ),
			'singular_name'	=> __( 'Conveyor Dryer' )
		),
		'public' => true,
		'has_archive' => false,
		'rewrite' => array('slug' => 'conveyor-dryers'),
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments', 'custom-fields'),
		'menu_icon'   		=> 'dashicons-awards'
	)
	);
/* 	register_post_type( 'dryers',
	array(
		'labels' => array(
			'name' 			=> __( 'Conveyor Dryers' ),
			'singular_name'	=> __( 'Conveyor Dryer' )
		),
		'public' => true,
		'has_archive' => false,
		//'rewrite' => array('slug' => 'dryers'),
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments', 'custom-fields'),
		'menu_icon'   		=> 'dashicons-awards'
	)
	); */
	register_post_type( 'anatol-products-acce',
	array(
		'labels' => array(
			'name' 			=> __( 'Accessories' ),
			'singular_name'	=> __( 'Accessory' )
		),
		'public' => true,
		'has_archive' => false,
		'rewrite' => array('slug' => 'accessories'),
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments', 'custom-fields'),
		'menu_icon'   		=> 'dashicons-awards'
	)
	);
	register_post_type( 'anatol-products-flas',
	array(
		'labels' => array(
			'name' 			=> __( 'Flash Cure Units' ),
			'singular_name'	=> __( 'Flash Cure Unit' )
		),
		'public' => true,
		'has_archive' => false,
		'rewrite' => array('slug' => 'flash-cure-units'),
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments', 'custom-fields'),
		'menu_icon'   		=> 'dashicons-awards'
	)
	);
	register_post_type( 'anatol-products-pre-',
	array(
		'labels' => array(
			'name' 			=> __( 'Pre-Presses' ),
			'singular_name'	=> __( 'Pre-Press' )
		),
		'public' => true,
		'has_archive' => false,
		'rewrite' => array('slug' => 'pre-press'),
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments', 'custom-fields'),
		'menu_icon'   		=> 'dashicons-awards'
	)
	);
	register_post_type('anatol-products-pres',
	array(
		'labels' => array(
			'name' 			=> __( 'Presses' ),
			'singular_name'	=> __( 'Press' )
		),
		'public' 			=> true,
		'has_archive' 		=> false,
		'rewrite' 			=> array('slug' => 'presses'),
		'supports'     		=> array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments', 'custom-fields'),
		'menu_icon'   		=> 'dashicons-awards'
	)
	);

	register_post_type('events',
	array(
		'labels' => array(
			'name' 			=> __('Events'),
			'singular_name'	=> __('Event')
		),
		'public' 			=> true,
		'has_archive' 		=> false,
		'rewrite' 			=> array('slug' => 'events'),
		'supports'     		=> array('title', 'editor', 'author'),
		'menu_icon'   		=> 'dashicons-megaphone',
	)
	);
	register_post_type('ebooks',
	array(
		'labels' => array(
			'name' 			=> __('Ebooks'),
			'singular_name'	=> __('Ebook')
		),
		'public' 			=> true,
		'has_archive'   	=> true,
		'rewrite' 			=> array('slug' => 'ebooks'),
		'supports'     		=> array('title', 'editor', 'author'),
        'show_in_rest' 		=> true,
		'supports'     		=> array( 'title', 'editor', 'thumbnail', 'excerpt'),
		'menu_icon'   		=> 'dashicons-book-alt',
	)
	);

	register_post_type('press-compare',
	array(
		'labels' => array(
			'name' 			=> __('Press compare'),
			'singular_name'	=> __('Compare')
		),
		'public' 			=> true,
		'has_archive' 		=> false,
		'rewrite' 			=> array('slug' => 'press-compare'),
		'supports'     		=> array('title', 'thumbnail', 'custom-fields'),
		'menu_icon'   		=> 'dashicons-editor-spellcheck',
	)
	);

	register_post_type('press-filter',
	array(
		'labels' => array(
			'name' 			=> __('Press filter'),
			'singular_name'	=> __('Filter')
		),
		'public' 			=> true,
		'has_archive' 		=> false,
		'rewrite' 			=> array('slug' => 'press-filter'),
		'supports'     		=> array('title', 'custom-fields'),
		'menu_icon'   		=> 'dashicons-filter',
	)
	);

	register_post_type('vacancies',
	array(
		'labels' => array(
			'name' 			=> __('Opportunities'),
			'singular_name'	=> __('Vacancy')
		),
		'public' 			=> true,
		'has_archive' 		=> true,
		'rewrite' 			=> array('slug' => 'vacancies'),
		'supports'     		=> array('title', 'editor', 'excerpt'),
		'menu_icon'   		=> 'dashicons-businessman',
	)
	);

 
 
 	register_post_type('feedbacks',
	array(
		'labels' => array(
			'name' 			=> __('Feedbacks'),
			'singular_name'	=> __('Feedback')
		),
		'public' 			=> true,
		'has_archive' 		=> true,
		'rewrite' 			=> array('slug' => 'feedbacks'),
		'supports'     		=> array('title', 'editor', 'excerpt'),
		'menu_icon'   		=> 'dashicons-format-chat',
	)
	);
 
	/**************************
	*       Direct sales
	***************************/
	register_post_type('sales-dealers',
	array(
		'labels' => array(
			'name' 			=> __('Sales & dealers'),
			'singular_name'	=> __('Dealer')
		),
		'hierarchical' => false,
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'show_in_nav_menus' => true,
		'show_in_admin_bar' => true,
		'can_export' => true,
		'has_archive' => true,
		'exclude_from_search' => true,
		'publicly_queryable' => true,
		'rewrite' 			=> array('slug' => 'sales-dealers'),
		'supports'     		=> array('title', 'editor', 'thumbnail'),
		'menu_icon'   		=> 'dashicons-businessman',
	 )
	);

	register_taxonomy(
		'sales-dealers-category',
		'sales-dealers',
		array(
			'label' => __( 'Categories' ),
			'hierarchical' => true,
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true
		)
	);
	/**************************
	*       Anatol TV
	***************************/
	register_post_type('anatoltv',
	array(
		'labels' => array(
			'name' 			=> __('Anatol TV'),
			'singular_name'	=> __('Video')
		),
		'hierarchical' => false,
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'show_in_nav_menus' => true,
		'show_in_admin_bar' => true,
		'can_export' => true,
		'has_archive' => true,
		'exclude_from_search' => true,
		'publicly_queryable' => true,
		'rewrite' 			=> array('slug' => 'video'),
		'supports'     		=> array('title', 'editor', 'thumbnail'),
		'menu_icon'   		=> 'dashicons-format-video',
	 )
	);

	register_taxonomy(
		'video-category',
		'anatoltv',
		array(
			'label' => __( 'Categories' ),
			'hierarchical' => true,
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true
		)
	);

	/**************************
	*       Calculator
	***************************/
	register_post_type('calculation',
	array(
		'labels' => array(
			'name' 			=> __('ROI Calculations'),
			'singular_name'	=> __('ROI Calculation')
		),
		'public' 			=> true,
		'publicly_queryable' => false,
		'has_archive' 		=> true,
		'rewrite' 			=> array('slug' => 'calculation'),
		'supports'     		=> array('title'),
		'menu_icon'   		=> 'dashicons-businessman'
		)
	);

	/**************************
	*    
	
	***************************/
	register_post_type('warranty',
	array(
		'labels' => array(
			'name' 			=> __('Warranty Registration'),
			'singular_name'	=> __('Warranty')
		),
		'public' 			=> true,
		//'publicly_queryable' => false,
		'has_archive' 		=> true,
		'rewrite' 			=> array('slug' => 'warranty'),
		'supports'     		=> array('title'),
		'menu_icon'   		=> 'dashicons-businessman'
		)
	);

	
	register_taxonomy(
		'anatol-products_cat',
		array(
			'anatol-products-conv',
			'anatol-products-acce',
			'anatol-products-flas',
			'anatol-products-pre-',
			'anatol-products-pres',
		),
		array(
			'label' => __( 'Equipment Cat' ),
			'rewrite' => array( 'slug' => 'products-category' ),
			'hierarchical' => true,
		)
	);

	register_taxonomy(
		'g-store_cat',
		'g-store',
		array(
			'label' => __( 'Category' ),
			'rewrite' => array( 'slug' => 'store-category' ),
			'hierarchical' => true,
		)
	);

	register_taxonomy(
		'country',
		'vacancies',
		array(
			'label' => __('Country'),
			'hierarchical' => true,
		)
	);

	register_taxonomy(
		'position',
		'vacancies',
		array(
			'label' => __('Position'),
			'hierarchical' => true
		)
	);


}
add_action( 'init', 'create_anatol_posttypes' );



/* Pages templates in sub folders */
/* --------------------------------------------------------------------------------- */

// add_filter('theme_page_templates', function($post_templates) {
//   $directories = glob(get_template_directory() . '/page/*' , GLOB_ONLYDIR);
  
//   foreach ($directories as $dir) {
//     $templates = glob($dir.'/*.php');

	
//     foreach ($templates as $template) {
// 		// print_r("<span>${template}</span>");
//       if (preg_match('|Template'.' '.'Name: (.*)$|mi', file_get_contents($template), $name)) {
//         $post_templates['/page/'.basename($dir).'/'.basename($template)] = $name[1];
//       }
//     }
//   }

//   return $post_templates;
// });

// 

// CREATE PATH TO CUSTOM ARCHIVES TEMPLATES
add_filter( 'template_include', 'wpse119820_use_different_template' );
function wpse119820_use_different_template( $template ){
	
	$url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	// $slug = trim(parse_url($url, PHP_URL_PATH), '/');

	$parsed = parse_url($url);
	$path = $parsed['path'];
	$path_parts = explode('/', $path);
	$slug = $path_parts[1];

	// $current_slug = explode("/", $_GET['params']);
	// if (str_contains($slug, 'product-category')) {
	// 	$slug = 'product-directory';
	// }

	// print_r("<span>${slug}</span>");
   if( is_post_type_archive( $slug ) || is_tax()) {
       //"Entry" Post type archive. Find template in sub-dir. Look in child then parent theme

       if( $_template = locate_template( 'templates/archive/archive-' . $slug . '.php' ) ){
            //Template found, - use that
            $template = $_template;
       }
   }            

   return $template;
}

// CHANGE THE ROOT FOLDER FOR SINGLE PAGES

function change_template_path($templates) {

  // The custom sub-directory for page templates in your theme. 
//   $custom_sub_dir = 'templates/single';
  global $wp_query;
  $custom_sub_dir = 'templates';

  if ($wp_query->is_single) {
	  $custom_sub_dir = 'templates/single';
  } 

//   print_r("<span>${custom_sub_dir}</span>");

  // Don't use the custom template directory in unexpected cases.
  if(empty($templates) || ! is_array($templates)) {
    return $templates;
  }

  $page_template_id = 0;
  $count = count( $templates);
  if($templates[0] === get_page_template_slug()) {
    // if there is a custom template, then our page-{slug}.php template is at the next index
    $page_template_id = 1;
  }

  // The last one in $templates is page.php, single.php, or archives.php depending on the type of template hierarchy being read.
  // Paths of all items starting from $page_template_id will get updated
  for($i = $page_template_id; $i < $count ; $i++) {
    $templates[$i] = $custom_sub_dir . '/' . $templates[$i];
  }

  return $templates;
}

// add_filter('page_template_hierarchy', 'change_template_path');
// add_filter('paged_template_hierarchy', 'change_template_path');
add_filter('single_template_hierarchy', 'change_template_path');

// END

function goingOn($ste, $sto){
	$strme = trim($ste); $endme = trim($sto);
	if(!empty($strme)){
		if(!empty($strme)){
			$stexp = explode('-', $strme); $enexp = explode('-', $endme); 
			$tisstart = mktime(00, 00, 00, $stexp[1], $stexp[2], $stexp[0]);
			$tisende = mktime(23, 59, 00, $enexp[1], $enexp[2], $enexp[0]);
			$remait = $tisende - $tisstart;
			if($remait>0){
				$nowitim = time();
				if($tisstart < $nowitim){
					if($tisende > $nowitim){
						return true;
					}
				}
			}
		}
	}
}

function goingOff($ste, $sto){
	$strme = trim($ste); $endme = trim($sto);
	if(!empty($strme)){
		if(!empty($strme)){
			$stexp = explode('-', $strme); $enexp = explode('-', $endme); 

			$tisstart = mktime(00, 00, 00, $stexp[1], $stexp[2], $stexp[0]);
			$tisende = mktime(23, 59, 00, $enexp[1], $enexp[2], $enexp[0]);
			$remait = $tisende - $tisstart ;
			if($remait>0){
				$nowitim = time();
				if($tisstart < $nowitim){
					if($tisende < $nowitim){
						return true;
					}
				}
			}
		}
	}
}

function goingFuture($ste, $sto){
	$strme = trim($ste); $endme = trim($sto);
	if(!empty($strme)){
		if(!empty($strme)){
			$stexp = explode('-', $strme); $enexp = explode('-', $endme); 

			$tisstart = mktime(00, 00, 00, $stexp[1], $stexp[2], $stexp[0]);
			$tisende = mktime(23, 59, 00, $enexp[1], $enexp[2], $enexp[0]);
			$remait = $tisende - $tisstart ;
			if($remait>0){
				$nowitim = time();
				if($tisstart > $nowitim){
					if($tisende > $nowitim){
						return true;
					}
				}
			}
		}
	}
}



function getTextBetweenTags($string, $tagname) {
	$pattern = "/<$tagname>(.*)<\/$tagname>/";
	preg_match($pattern, $string, $matches);
	$return = $matches[1];

	$return = preg_replace("/<\\/?a(\\s+.*?>|>)/", "", $return);
return $return;
}
/* */

//Exclude pages from WordPress Search
if (!is_admin()) {
function anatol_search_filter($query) {
if ($query->is_search) {
$query->set('post_type', 'post');
}
return $query;
}
add_filter('pre_get_posts','anatol_search_filter');
}

add_action( 'template_redirect', 'frontend_products', 1 );
function frontend_products() {
global $wp_query;

if (
$wp_query->is_404 &&
$wp_query->query_vars['paged'] > 1
) {
$url = $_SERVER['REQUEST_URI'];
$url = str_replace('/page/'.$wp_query->query_vars['paged'], '', $url);
wp_redirect($url);
}

if($wp_query->is_404 && strpos($_SERVER['REQUEST_URI'], '/blog/') !== false) {
wp_redirect(str_replace('/blog/', '/', $_SERVER['REQUEST_URI']));
}
}

/*
function anatol_acf_init() {
global $google_api_key;
acf_update_setting('google_api_key', $google_api_key);
}

add_action('acf/init', 'anatol_acf_init');
*/

/*function getTitleBetweenTags($string, $tagname) {
$d = new DOMDocument();
$d->loadHTML($string);
$return = array();
foreach($d->getElementsByTagName($tagname) as $item){
$return[] = $item->textContent;
}
return $return;
}*/


function language_selector_flags(){
$languages = icl_get_languages('skip_missing=0&orderby=code');
if(!empty($languages)){
echo'<div class="lang_dropdoun">';
    foreach($languages as $l){
    if($l['active']) {
    echo '<div class="lang_icon_active icon_'.$l['language_code'].'">'.$l['language_code'].'<span
            class="sub-toggle"></span></div>';
    }
    }
    }
    if(!empty($languages)){
    echo'<ul class="sub-menu">';
        foreach($languages as $l){
        echo '<li>';
            if(!$l['active']) {
            echo '<a class="lang_icon icon_'.$l['language_code'].'" href="'.$l['url'].'">';
                echo $l['language_code'];
                echo '</a>';
            }
            echo '</li>';
        }
        echo'</ul>
</div>';
}
}



function remove_menu_items( $menu_links ) {
unset ( $menu_links['subscriptions'] );
unset( $menu_links['dashboard'] );
unset( $menu_links['downloads'] );
return $menu_links;
}
add_filter( 'woocommerce_account_menu_items','remove_menu_items' );
/************************/
class My_Custom_My_Account_Endpoint {
/**
* Custom endpoint name.
*
* @var string
*/
public static $endpoint = 'registered-equipments';
/**
* Plugin actions.
*/
public function __construct() {
// Actions used to insert a new endpoint in the WordPress.
add_action( 'init', array( $this, 'add_endpoints' ) );
add_filter( 'query_vars', array( $this, 'add_query_vars' ), 0 );
// Change the My Accout page title.
add_filter( 'the_title', array( $this, 'endpoint_title' ) );
// Insering your new tab/page into the My Account page.
add_filter( 'woocommerce_account_menu_items', array( $this, 'new_menu_items' ) );
add_action( 'woocommerce_account_' . self::$endpoint . '_endpoint', array( $this, 'endpoint_content' ) );
}
/**
* Register new endpoint to use inside My Account page.
*
* @see https://developer.wordpress.org/reference/functions/add_rewrite_endpoint/
*/
public function add_endpoints() {
add_rewrite_endpoint( self::$endpoint, EP_ROOT | EP_PAGES );
}
/**
* Add new query var.
*
* @param array $vars
* @return array
*/
public function add_query_vars( $vars ) {
$vars[] = self::$endpoint;
return $vars;
}



/**
* Set endpoint title.
*
* @param string $title
* @return string
*/
public function endpoint_title( $title ) {
global $wp_query;
$is_endpoint = isset( $wp_query->query_vars[ self::$endpoint ] );
if ( $is_endpoint && ! is_admin() && is_main_query() && in_the_loop() && is_account_page() ) {
// New page title.
$title = __( 'Registered Warranty', 'woocommerce' );
remove_filter( 'the_title', array( $this, 'endpoint_title' ) );
}
return $title;
}
/**
* Insert the new endpoint into the My Account menu.
*
* @param array $items
* @return array
*/
public function new_menu_items( $items ) {
// Remove the logout menu item.
$logout = $items['customer-logout'];
unset( $items['customer-logout'] );
// Insert your custom endpoint.
$current_language_code = apply_filters( 'wpml_current_language', null );
if($current_language_code == 'en'): $items[ self::$endpoint ] = __( 'Registered Warranty', 'woocommerce' );
elseif($current_language_code == 'ru'): $items[ self::$endpoint ] = __( 'Зарегистрированные продукты', 'woocommerce' );
elseif($current_language_code == 'es'): $items[ self::$endpoint ] = __( 'Garantía registrada', 'woocommerce' );
endif;
// Insert back the logout item.
$items['customer-logout'] = $logout;
return $items;
}
/**
* Endpoint HTML content.
*/
public function endpoint_content() {
include('woocommerce/myaccount/my-warranty.php');
}
/**
* Plugin install action.
* Flush rewrite rules to make our custom endpoint available.
*/
public static function install() {
flush_rewrite_rules();
}
}
new My_Custom_My_Account_Endpoint();
// Flush rewrite rules on plugin activation.
register_activation_hook( __FILE__, array( 'My_Custom_My_Account_Endpoint', 'install' ) );


/* language dropdown */
/*
function language_selector_flags(){
$languages = icl_get_languages('skip_missing=0&orderby=code');
if(!empty($languages)){
echo'<div class="lang_dropdoun">';
    foreach($languages as $l){
    if($l['active']) echo '<div class="lang_icon_active icon_'.$l['language_code'].'">'.$l['language_code'].'<i
            class="fal fa-angle-down"></i></div>'; // Print active language inside dropdown button
    }
    echo''; // Add fontawesome " angle down " icon https://fontawesome.com/icons/angle-down?style=solid
    echo'<ul class="sub-menu">'; // Crete the "Dropdown-pane"
        foreach($languages as $l){ // add all languages
        echo '<li>';
            if(!$l['active']) echo '<a class="notactive_lang" href="'.$l['url'].'">'; // add link only to not active
                languages
                echo '<img src="'.$l['country_flag_url'].'" height="12" alt="'.$l['language_code'].'" width="18" />';
                if(!$l['active']) echo '</a>';
            echo '</li>';
        }
        echo'</ul>
</div>';
}
}
*/

function languages_list_mob(){
$languages = icl_get_languages('skip_missing=0&orderby=code');
if(!empty($languages)){
echo '<div id="mob_language_list">
    <ul>';
        foreach($languages as $l){
        echo '<li>';
            if($l['country_flag_url']){
            if(!$l['active']) echo '<a href="'.$l['url'].'">';
                echo $l['language_code'];
                if(!$l['active']) echo '</a>';
            }

            echo '</li>';
        }
        echo '</ul>
</div>';
}
}

// /////////////////////

function modify_categories_dropdown($args, $taxonomy) {
if($taxonomy == 'country') {
$args['show_option_all'] = __('All countries');
}
if($taxonomy == 'position') {
$args['show_option_all'] = __('All positions');
}
return $args;
}
add_filter('beautiful_filters_dropdown_categories', 'modify_categories_dropdown', 10, 2 );

function term_link_filter($url, $term, $taxonomy) {
if($taxonomy == 'country' || $taxonomy == 'position') {
$url = get_home_url().'/vacancies/'.$taxonomy.'/'.$term->slug.'/';
}
return $url;
}
add_filter('term_link', 'term_link_filter', 10, 3);

// add_action( 'after_setup_theme', 'anatol_image_sizes' );
add_action( 'after_setup_theme', 'anatol_image_sizes' );
function anatol_image_sizes() {
add_image_size('300x210', 300, 210, true);
add_image_size('ebook_img', 300, 400, true);
add_image_size('800x600', 800, 600, false);
//add_image_size('1920x1000', 1920, 1000, false);
}

/*function custom_pre_get_posts_query( $q ) {
$tax_query = (array) $q->get( 'tax_query' );

$tax_query[] = array(
'taxonomy' => 'product_cat',
'field' => 'slug',
'terms' => array( 'clothing' ), // Don't display products in the clothing category on the shop page.
'operator' => 'NOT IN'
);


$q->set( 'tax_query', $tax_query );

}
add_action( 'woocommerce_product_query', 'custom_pre_get_posts_query' ); */


function searchfilter($query) {
if ($query->is_search && !is_admin() && isset($_GET['post_type'])) {
$query->set('post_type', array($_GET['post_type']));
}
return $query;
}

add_filter('pre_get_posts','searchfilter');

function anatol_posts_where($where, $query) {
global $wpdb;

if($query->is_search && !is_admin() && !empty($query->query['s'])) {
$sql = "(({$wpdb->prefix}postmeta.meta_key = '_sku' AND {$wpdb->prefix}postmeta.meta_value LIKE
'%".addslashes($query->query['s'])."%')) OR ";
if(!empty($_REQUEST['s']) && is_numeric($_REQUEST['s'])) {
$sql .= "({$wpdb->prefix}posts.ID = '".intval($_REQUEST['s'])."') OR ";
}
$where = str_replace("({$wpdb->prefix}posts.post_title LIKE", $sql."({$wpdb->prefix}posts.post_title LIKE", $where);
}
return $where;
}
add_filter( 'posts_where' , 'anatol_posts_where', 10, 2 );

function anatol_posts_join($join, $query) {
global $wpdb;
if($query->is_search && !is_admin() && !empty($query->query['s'])) {
$join = "LEFT JOIN {$wpdb->prefix}postmeta ON ({$wpdb->prefix}posts.ID = {$wpdb->prefix}postmeta.post_id) ".$join;
}
return $join;
}
add_filter( 'posts_join' , 'anatol_posts_join', 10, 2 );

add_action('template_redirect', 'anatol_shop_redirect');

function anatol_shop_redirect() {
if(is_woocommerce() || is_shop()) {
if(ICL_LANGUAGE_CODE != 'en') {
$languages = icl_get_languages('skip_missing=0&orderby=code');
if(isset($languages['en']['url'])) {
$search = array('/ru/', '/es/', '/pl/', '/fr/');
$replace = array('/', '/', '/', '/');
$languages['en']['url'] = str_replace($search, $replace, $languages['en']['url']);

//if(!strpos($languages['en']['url'], '/ru/') && !strpos($languages['en']['url'], '/es/') &&
// !strpos($languages['en']['url'], '/pl/')) {
if(wp_redirect($languages['en']['url'])) {
exit;
}
//}
}
}
}
}

function filter_bcn_breadcrumb_url( $url, $this_type, $this_id ) {
// make filter magic happen here...
$url = remove_query_arg('post_type', $url);
return $url;
};

// add the filter
add_filter( 'bcn_breadcrumb_url', 'filter_bcn_breadcrumb_url', 10, 3 );


/**************************************************
Add structured markup data for Organization
***************************************************/

function anatol_contacts_json_ld_markup(){ ?>
<!-- JSON-LD markup generated by Google Structured Data Markup Helper. -->
<script type="application/ld+json">
{
    "@context": "http://schema.org",
    "@type": "Organization",
    "url": "<?php echo get_field('company_contact_url', 'option'); ?>",
    "name": "<?php echo get_field('company_contact_name', 'option'); ?>",
    "logo": "<?php echo get_field('company_contact_image', 'option'); ?>",
    "telephone": "<?php echo get_field('company_contact_telephone', 'option'); ?>",
    "faxNumber": "<?php echo get_field('company_contact_fax', 'option'); ?>",
    "email": "<?php echo get_field('company_contact_email', 'option'); ?>",
    "address": {
        "@type": "PostalAddress",
        "streetAddress": "<?php echo get_field('company_contact_address', 'option'); ?>",
        "addressLocality": "<?php echo get_field('company_contact_city', 'option'); ?>",
        "addressRegion": "<?php echo get_field('anatol_c_region', 'option'); ?>",
        "addressCountry": "<?php echo get_field('company_contact_country', 'option'); ?>",
        "postalCode": "<?php echo get_field('company_contact_postal_code', 'option'); ?>"
    }
}
</script>
<?php }
add_action('wp_footer', 'anatol_contacts_json_ld_markup' );

/**********************************************
Add stuctured markup for post
***********************************************/
function anatol_post_json_ld_markup(){

	if(!is_single() || get_post_type() != 'post') return '';
	global $post;
	?>
<!-- JSON-LD markup generated by Google Structured Data Markup Helper. -->
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "Article",
    "mainEntityOfPage": {
        "@type": "WebPage",
        "@id": "<?php echo get_the_permalink( $post ); ?>"
    },
    "headline": "<?php echo get_the_title( $post ); ?>",
    "image": "<?php echo get_the_post_thumbnail_url( $post, 'thumbnail' ); ?>",
    "datePublished": "<?php echo get_the_date( 'c', $post ); ?>", // 2015-02-05T08:00:00+08:00
    "dateModified": "<?php echo get_the_modified_date( 'c', $post ); ?>",
    "author": {
        "@type": "Person",
        "name": "Anatol Blog"
    },
    "publisher": {
        "@type": "Organization",
        "name": "<?php echo get_bloginfo('name'); ?>",
        "logo": {
            "@type": "ImageObject",
            "url": "https://anatol.com/wp-content/uploads/2018/03/screen-printing-equipment-anatol.png"
        }
    }
}
</script>
<?php }
add_action('wp_footer', 'anatol_post_json_ld_markup' );

/**************************************
Add redirection for 404 page
**************************************/

function anatol_404_redirect()
{
	if(is_404())
	{
		header ('HTTP/1.1 301 Moved Permanently');
		header ("Location: " . site_url('/page-404/') ); //get_permalink(13946)
		exit();
	}
}

//add_action('wp', 'anatol_404_redirect');

/**********************************
Remove unnecessary tags
**********************************/
function disable_wp_emojicons() {
	remove_action('wp_head', 'rsd_link'); //removes EditURI/RSD (Really Simple Discovery) link.
	// all actions related to emojis
	remove_action( 'admin_print_styles', 'print_emoji_styles' );
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );

	// filter to remove TinyMCE emojis
	//  add_filter( 'tiny_mce_plugins', 'disable_emojicons_tinymce' );
	add_filter( 'emoji_svg_url', '__return_false' );
}
add_action( 'init', 'disable_wp_emojicons' );


/******************************
expand shortcode
******************************/
function anatol_expand_shortcode($atts, $content){
	$html = '';
	$html .= '<div class="expand__wrap">';
	$html .= '<span class="expand__button"></span>';
	$html .= '<div class="expand__content">'. $content .'</div>';
	$html .= '</div>';

	return $html;
}
add_shortcode('expand', 'anatol_expand_shortcode');

// Add Cart to menu
/* 
function add_nav_menu_items( $items, $args ) {
	$cart_item_count = WC()->cart->get_cart_contents_count();
    $cart_count_span = '';
	if ( $cart_item_count ) {
        $cart_count_span = '<span class="count">'.$cart_item_count.'</span>';
	}
	if ($cart_item_count > 0) {
		$cart_link = '<li class="cart menu-item menu-item-type-post_type menu-item-object-page notnull"><a href="' . get_permalink( wc_get_page_id( 'cart' ) ) . '"><i class="fa fa-shopping-cart"></i>'.$cart_count_span.'</a></li>';
	} 
	else {$cart_link = '<li class="cart menu-item menu-item-type-post_type menu-item-object-page"><a href="' . get_permalink( wc_get_page_id( 'cart' ) ) . '"><i class="fa fa-shopping-cart"></i><span class="count">0</span></a></li>';

}
// Add the cart link to the end of the menu.
	$items = $items . $cart_link;
    return $items;
}
add_filter('wp_nav_menu_items','add_nav_menu_items', 10, 2); */


	/***********************************************************************
WordPress - Отключаем загрузку файла dashicons.min.css стилей, не для Админов
************************************************************************/
// remove dashicons
function wpdocs_dequeue_dashicon() {
    if (current_user_can( 'update_core' )) {
        return;
    }	
    wp_deregister_style('dashicons');
}
add_action( 'wp_enqueue_scripts', 'wpdocs_dequeue_dashicon' ); 

/********************************************************
Remove unnecessary scripts and css from home page
********************************************************/
// Remove the generator tag
remove_action( 'wp_head', array( $GLOBALS['woocommerce'], 'generator' ) );

add_action( 'wp_enqueue_scripts', 'anatol_dequeue_scripts', 9999 );
function anatol_dequeue_scripts() {

	wp_dequeue_script('slider-jquery-init', get_template_directory_uri().'/wp-includes/js/jquery/ui/slider.min.js');
	wp_dequeue_script('ini-css-init', get_template_directory_uri().'/wp-includes/css/classic-themes.min.css');
	
	if( is_home() || is_front_page() ){
		//---------- scripts ------------
		wp_dequeue_script('addtoany'); // remove add to any from home page
		wp_dequeue_script('wpp-js');
		wp_dequeue_script( 'wp-embed' );
		
		//---------- styles ------------
		// wp_dequeue_style('beautiful-taxonomy-filters-basic'); 
		// wp_dequeue_style('select2'); 
		
		wp_dequeue_style('recent-posts-widget-with-thumbnails-public-style'); //
	}

	//---------- woocommerce ------------
	if ( ! is_woocommerce() && ! is_cart() && ! is_checkout() ) {
		wp_dequeue_script( 'woocommerce_frontend_styles' );
		wp_dequeue_script( 'woocommerce-general');
		wp_dequeue_script( 'woocommerce-layout' );
		wp_dequeue_script( 'woocommerce-smallscreen' );
		wp_dequeue_script( 'woocommerce_fancybox_styles' );
		wp_dequeue_script( 'woocommerce_chosen_styles' );
		wp_dequeue_script( 'woocommerce_prettyPhoto_css' );
		wp_dequeue_script( 'selectWoo' );
		wp_deregister_script( 'selectWoo' );
		wp_dequeue_script( 'wc-add-payment-method' );
		wp_dequeue_script( 'wc-lost-password' );
		wp_dequeue_script( 'wc_price_slider' );
		wp_dequeue_script( 'wc-single-product' );
		wp_dequeue_script( 'wc-add-to-cart' );
		wp_dequeue_script( 'wc-cart-fragments' );
		wp_dequeue_script( 'wc-credit-card-form' );
		wp_dequeue_script( 'wc-checkout' );
		wp_dequeue_script( 'wc-add-to-cart-variation' );
		wp_dequeue_script( 'wc-single-product' );
		wp_dequeue_script( 'wc-cart' );
		wp_dequeue_script( 'wc-chosen' );
		wp_dequeue_script( 'woocommerce' );
		wp_dequeue_script( 'prettyPhoto' );
		wp_dequeue_script( 'prettyPhoto-init' );
		wp_dequeue_script( 'jquery-blockui' );
		wp_dequeue_script( 'jquery-placeholder' );
		wp_dequeue_script( 'jquery-payment' );
		wp_dequeue_script( 'fancybox' );
		wp_dequeue_script( 'jqueryui' );
	}
}

// add_action('wp_enqueue_scripts', function () {
// 	wp_deregister_style('woocommerce-general');
// 	wp_deregister_style('woocommerce-layout');
// });

// Remove style.min.css
function wpassist_remove_block_library_css(){
wp_dequeue_style( 'wp-block-library' );
}
add_action( 'wp_enqueue_scripts', 'wpassist_remove_block_library_css' );




/**
*
* DISABLED
*
* Add Invisible reCaptcha v3 script
*/
// function add_recaptcha() {
// if(!is_single('new')) {
// // if the page is not where we have the form, returns early
// return;
// }
// // actually adds the reCaptcha
// do_action('google_invre_render_widget_action');
// }

/**
* Validate with Invisible reCaptcha
* Returns bool
*/
// function recaptcha_validate() {
// $is_valid = apply_filters('google_invre_is_valid_request_filter', true);
// return $is_valid;
// }

/***ADD PLU MINUS TO woocommerce CART****/
add_action( 'wp_footer' , 'custom_quantity_fields_script' );
function custom_quantity_fields_script(){
?>
<script type='text/javascript'>
jQuery(function($) {
    if (!String.prototype.getDecimals) {
        String.prototype.getDecimals = function() {
            var num = this,
                match = ('' + num).match(/(?:\.(\d+))?(?:[eE]([+-]?\d+))?$/);
            if (!match) {
                return 0;
            }
            return Math.max(0, (match[1] ? match[1].length : 0) - (match[2] ? +match[2] : 0));
        }
    }
    // Quantity "plus" and "minus" buttons
    $(document.body).on('click', '.plus, .minus', function() {
        var $qty = $(this).closest('.quantity').find('.qty'),
            currentVal = parseFloat($qty.val()),
            max = parseFloat($qty.attr('max')),
            min = parseFloat($qty.attr('min')),
            step = $qty.attr('step');

        // Format values
        if (!currentVal || currentVal === '' || currentVal === 'NaN') currentVal = 0;
        if (max === '' || max === 'NaN') max = '';
        if (min === '' || min === 'NaN') min = 0;
        if (step === 'any' || step === '' || step === undefined || parseFloat(step) === 'NaN') step = 1;

        // Change the value
        if ($(this).is('.plus')) {
            if (max && (currentVal >= max)) {
                $qty.val(max);
            } else {
                $qty.val((currentVal + parseFloat(step)).toFixed(step.getDecimals()));
            }
        } else {
            if (min && (currentVal <= min)) {
                $qty.val(min);
            } else if (currentVal > 0) {
                $qty.val((currentVal - parseFloat(step)).toFixed(step.getDecimals()));
            }
        }

        // Trigger change event
        $qty.trigger('change');
    });
});
</script>
<?php
}

// My custom comments output html
function better_comments( $comment, $args, $depth ) {

	// Get correct tag used for the comments
	if ( 'div' === $args['style'] ) {
		$tag       = 'div';
		$add_below = 'comment';
	} else {
		$tag       = 'li';
		$add_below = 'div-comment';
	} ?>

<<?php echo $tag; ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?>
    id="comment-<?php comment_ID() ?>">

    <?php
	// Switch between different comment types
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' : ?>
    <div class="pingback-entry"><span class="pingback-heading"><?php esc_html_e( 'Pingback:', 'textdomain' ); ?></span>
        <?php comment_author_link(); ?></div>
    <?php
		break;
		default :

		if ( 'div' != $args['style'] ) { ?>
    <div id="div-comment-<?php comment_ID() ?>" class="comment-body">
        <?php } ?>
        <div class="meta_avtor">
            <div class="comment-author vcard">
                <?php
				// Display avatar unless size is set to 0
				if ( $args['avatar_size'] != 0 ) {
					$avatar_size = ! empty( $args['avatar_size'] ) ? $args['avatar_size'] : 70; // set default avatar size
						echo get_avatar( $comment, $avatar_size );
				}
				// Display author name
				printf( __( '<cite class="fn">%s</cite>', 'textdomain' ), get_comment_author_link() ); ?>
            </div><!-- .comment-author -->
            <div class="comment-meta commentmetadata">
                <a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>"><?php
						/* translators: 1: date, 2: time */
						printf(
							__( '%1$s at %2$s', 'textdomain' ),
							get_comment_date(),
							get_comment_time()
						); ?>
                </a><?php
					edit_comment_link( __( '(Edit)', 'textdomain' ), '  ', '' ); ?>
            </div><!-- .comment-meta -->
        </div><!-- .comment-author -->
        <div class="comment-details">
            <div class="comment-text"><?php comment_text(); ?></div><!-- .comment-text -->
            <?php
				// Display comment moderation text
				if ( $comment->comment_approved == '0' ) { ?>
            <em
                class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'textdomain' ); ?></em><br /><?php
				} ?>
            <div class="reply">
                <span><?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?></span>
            </div>

        </div><!-- .comment-details -->
        <?php
		if ( 'div' != $args['style'] ) { ?>
    </div>
    <?php }
	// IMPORTANT: Note that we do NOT close the opening tag, WordPress does this for us
		break;
	endswitch; // End comment_type check.
}