<?php

define('URL', get_template_directory_uri());
define('IMG_URL', URL . '/assets/images');
define('VENDOR_URL', URL . '/assets/vendors');
define('CSS_URL', URL . '/assets/css');
define('JS_URL', URL . '/assets/js');

add_filter('show_admin_bar', '__return_false');

session_start();
global $locale;
if($_GET['lang'] == 'ar') $locale = 'ar_JO';
if($_GET['lang'] == 'en') $locale = 'en_US';
if(!$_GET['lang']) $locale = $_SESSION['lang'] == 'ar' ? 'ar_JO' : 'en_US';
if($_GET['lang']) $_SESSION['lang'] = $_GET['lang'];

function set_locale(){
	global $locale;
	return $locale;
}
add_filter( 'locale', 'set_locale', 10 );

function ar(){
	return get_locale() == 'ar_JO';
}

function the_locale(){
	echo ar() ? 'ar' : 'en';
}

function get_trans($en, $ar){
	if(ar() && $ar) return $ar;
	return $en;
}

function trans($en, $ar){
	echo get_trans($en, $ar);
}

function get_trans_field($key){
	return get_trans(get_field($key), get_field('ar_'.$key));
}

function trans_field($key){
	echo get_trans_field($key);
}

function get_trans_term($term){
	return get_trans($term->name, get_field('ar_name', $term));
}

function trans_term($term){
	echo get_trans_term($term);
}

function get_trans_date($date){
	if(ar()){
		$months = array(
			"Jan" => "يناير",
			"Feb" => "فبراير",
			"Mar" => "مارس",
			"Apr" => "أبريل",
			"May" => "مايو",
			"Jun" => "يونيو",
			"Jul" => "يوليو",
			"Aug" => "أغسطس",
			"Sep" => "سبتمبر",
			"Oct" => "أكتوبر",
			"Nov" => "نوفمبر",
			"Dec" => "ديسمبر"
		);

		$d = date_i18n('d', strtotime($date));
		$m = $months[date_i18n('M', strtotime($date))];
		$y = date_i18n('Y', strtotime($date));
		return $d.' '.$m.' '.$y;
	}

	return $date;
}

function trans_date($date){
	echo get_trans_date($date);
}

function get_trans_time($time){
	if(ar()){
		$time = str_ireplace('AM', 'صباحا', $time);
		$time = str_ireplace('PM', 'مساء', $time);
		return $time;
	}
	return $time;
}

function trans_time($time){
	echo get_trans_Time($time);
}

function arabic_title_filter( $title, $id = null ) {
	if(ar()){
		return get_field('ar_title', $id) ? get_field('ar_title', $id) : $title;
	}

	return $title;
}
add_filter( 'the_title', 'arabic_title_filter', 10, 2 );

function arabic_content_filter( $content, $id = null ) {
	if(ar()){
		return get_field('ar_content', $id) ? get_field('ar_content', $id) : $content;
	}

	return $content;
}
add_filter( 'the_content', 'arabic_content_filter', 10, 2 );

function jngfa_setup() {
	load_theme_textdomain( 'jngfa' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );

	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size(400, 400);
	add_image_size( 'featured', 1200, 1200);
	add_image_size( 'header', 1920, 800, true);

	// Set the default content width.
	$GLOBALS['content_width'] = 525;

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'main'    => 'Main Menu',
	) );

	add_theme_support('html5', array(
		'gallery',
		'caption',
	));

	add_editor_style(array('assets/css/editor-style.css', 'https://use.fontawesome.com/releases/v5.0.9/css/all.css'));
}
add_action( 'after_setup_theme', 'jngfa_setup' );

/**
 * Register custom fonts.
 */
function jngfa_fonts_url() {
	return esc_url_raw('https://fonts.googleapis.com/css');
}

function jngfa_excerpt_more( $link ) {
	$link = sprintf( '<p class="link-more"><a href="%1$s" class="more-link">%2$s</a></p>',
		esc_url( get_permalink( get_the_ID() ) ),
		sprintf( __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'jngfa' ), get_the_title( get_the_ID() ) )
	);
	return ' &hellip; ' . $link;
}
add_filter( 'excerpt_more', 'jngfa_excerpt_more' );

function jngfa_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">' . "\n", get_bloginfo( 'pingback_url' ) );
	}
}
add_action( 'wp_head', 'jngfa_pingback_header' );

function jngfa_scripts() {
	//wp_enqueue_style('jngfa-fonts', jngfa_fonts_url(), array(), null);
	wp_enqueue_style('icons', 'https://use.fontawesome.com/releases/v5.0.9/css/all.css');
	wp_enqueue_style('slick',  get_theme_file_uri('/assets/js/slick/slick.css'));
	wp_enqueue_style('slick-theme', get_theme_file_uri('/assets/js/slick/slick-theme.css'));
	wp_enqueue_style('fancybox', 'https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.5/jquery.fancybox.min.css');
	wp_enqueue_style('datepicker', get_theme_file_uri('/assets/js/datepicker/datepicker.min.css'));
	wp_enqueue_style('jngfa-style', get_stylesheet_uri());

	if(ar()){
		wp_enqueue_style('jngfa-style-ar', get_theme_file_uri('/rtl.css'));
	}

	wp_enqueue_script('slick', 'https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.5/jquery.fancybox.min.js', array('jquery'), '1.0.0', true);
	wp_enqueue_script('fancybox', get_theme_file_uri('/assets/js/slick/slick.min.js'), array('jquery'), '1.0.0', true);
	wp_enqueue_script('moment', get_theme_file_uri('/assets/js/moment.min.js'), array('jquery'), '1.0.0', true);
	wp_enqueue_script('datepicker', get_theme_file_uri('/assets/js/datepicker/datepicker.min.js'), array('jquery'), '1.0.0', true);
	wp_enqueue_script('mainjs', get_theme_file_uri('/assets/js/main.js'), array('jquery', 'moment', 'datepicker'), '1.0.0', true);
}
add_action( 'wp_enqueue_scripts', 'jngfa_scripts' );


//Gallery
function jngfa_post_gallery($string, $attr){
	$posts_order_string = $attr['ids'];
	$posts_order = explode(',', $posts_order_string);

	$output = '<div class="gallery box-list"><div class="row">';
	$posts = get_posts(array(
				'include' => $posts_order,
				'post_type' => 'attachment', 
				'orderby' => 'post__in'
	));

	if($attr['orderby'] == 'rand') {
			shuffle($posts); 
	} 

	foreach($posts as $imagePost){
			$output .= '<div class="col-lg-3">';
			$output .= '<a href="'.wp_get_attachment_image_src($imagePost->ID, 'full')[0].'" class="box purple gallery-item" data-fancybox="event_photo">';
			$output .= '<div class="img" style="background-image: url('.wp_get_attachment_image_src($imagePost->ID, 'thumb')[0].');"></div>';
			$output .= '<div class="content flex"><h3 class="title">'.$imagePost->post_excerpt.'</h3><div class="icon"><i class="far fa-plus-square"></i></div></div>';
			$output .= '</a>';
			$output .= '</div>';
	}

	$output .= "</div></div>";

	return $output;
}
add_filter('post_gallery', 'jngfa_post_gallery', 10, 2);

// Search
function searchfilter($query) {
	if ($query->is_search) {
			$query->set('post_type',array('artist','event'));
	}
	return $query;
}
add_filter('pre_get_posts','searchfilter');

//Post Types
function create_galleries_posttype() {
	register_post_type( 'gallery',
	  array(
		'labels' => array(
		  'name' => 'Galleries',
		  'singular_name' => 'Gallery'
		),
		'public' => true,
		'menu_position' => 5,
		'publicly_queryable' => false,
		'supports' => array('title', 'editor', 'thumbnail', 'page-attributes'),
		'hierarchical' => true,
	  )
	);
}
add_action('init', 'create_galleries_posttype');

function create_creation_factory_posttype() {
	register_post_type( 'creation_factory',
	  array(
		'labels' => array(
		  'name' => 'Creation Factory',
		  'singular_name' => 'Creation Factory'
		),
		'public' => true,
		'menu_position' => 5,
		'publicly_queryable' => false,
		'supports' => array('title', 'editor', 'thumbnail'),
		'hierarchical' => true,
	  )
	);
}
add_action('init', 'create_creation_factory_posttype');

function create_events_posttype() {
	register_taxonomy('event_types', array('event'), array(
		'hierarchical'      => true,
		'label'             => 'Event Types',
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'event_type'),
));

	register_post_type( 'event',
	  array(
		'labels' => array(
		  'name' => 'Events',
		  'singular_name' => 'Event'
		),
		'public' => true,
		'menu_position' => 5,
		'publicly_queryable' => true,
		'supports' => array('title', 'editor', 'thumbnail'),
	  )
	);
}
add_action('init', 'create_events_posttype');

function create_artists_posttype() {
	register_taxonomy('countries', array('artist'), array(
		'hierarchical'      => true,
		'label'             => 'Countries',
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'country'),
));

	register_post_type( 'artist',
	  array(
		'labels' => array(
		  'name' => 'Artists',
		  'singular_name' => 'Artist'
		),
		'public' => true,
		'menu_position' => 5,
		'publicly_queryable' => true,
		'supports' => array('title', 'editor', 'thumbnail', 'page-attributes'),
		'hierarchical' => true,

	  )
	);
}
add_action('init', 'create_artists_posttype');

function create_publications_posttype() {
	register_post_type( 'Publication',
	  array(
		'labels' => array(
		  'name' => 'Publications',
		  'singular_name' => 'Publication'
		),
		'public' => true,
		'menu_position' => 5,
		'publicly_queryable' => true,
		'supports' => array('title', 'editor', 'thumbnail'),
	  )
	);
}
add_action('init', 'create_publications_posttype');

function create_member_posttype() {
	register_post_type( 'member',
	  array(
		'labels' => array(
		  'name' => 'Team Members',
		  'singular_name' => 'Team Member'
		),
		'public' => true,
		'menu_position' => 5,
		'publicly_queryable' => false,
		'supports' => array('title', 'thumbnail'),
	  )
	);
}
add_action('init', 'create_member_posttype');

function create_news_posttype() {
	register_post_type( 'news',
	  array(
		'labels' => array(
		  'name' => 'News',
		  'singular_name' => 'News'
		),
		'public' => true,
		'menu_position' => 5,
		'publicly_queryable' => true,
		'supports' => array('title', 'editor', 'thumbnail'),
	  )
	);
}
add_action('init', 'create_news_posttype');

function create_pr_posttype() {
	register_post_type( 'pr',
	  array(
		'labels' => array(
		  'name' => 'Press Releases',
		  'singular_name' => 'Press Release'
		),
		'public' => true,
		'menu_position' => 5,
		'publicly_queryable' => false,
		'supports' => array('title'),
	  )
	);
}
add_action('init', 'create_pr_posttype');


  //Helper Functions
function sort_terms_hierarchicaly(Array &$cats, Array &$into, $parentId = 0) {
    foreach ($cats as $i => $cat) {
        if ($cat->parent == $parentId) {
            $into[$cat->term_id] = $cat;
            unset($cats[$i]);
        }
    }

    foreach ($into as $topCat) {
        $topCat->children = array();
        sort_terms_hierarchicaly($cats, $topCat->children, $topCat->term_id);
    }
}

function remove_menus(){
  remove_menu_page( 'edit.php' );                   //Posts
  remove_menu_page( 'upload.php' );                 //Media
  remove_menu_page( 'edit-comments.php' );          //Comments  
}
add_action( 'admin_menu', 'remove_menus' );

// get comma separated terms
function get_post_terms($tax){
	$product_terms = get_the_terms(get_the_ID(), $tax);
	$term_list = [];
	if ($product_terms && !is_wp_error( $product_terms)) {
		foreach ($product_terms as $term){
			$term_list[] = esc_html( $term->name);
		}
	}
	return implode(', ', $term_list);
}

//get page content
function page_content($slug, $type='page'){
	$page = get_page_by_path($slug, OBJECT, $type);
	return apply_filters('the_content', $page->post_content, $page->ID); 
}

function page_title($slug, $type='page'){
	$page = get_page_by_path($slug, OBJECT, $type);
	return apply_filters('the_title', $page->post_title, $page->ID); 
}

function page_thumb($slug, $size, $type='page'){
	$page = get_page_by_path($slug, OBJECT, $type);
	return get_The_post_thumbnail_url($page->ID, $size);
}

function page_link($slug, $type='page'){
	$page = get_page_by_path($slug, OBJECT, $type);
	return get_page_link($page->ID);
}

function post_term($type){
	$terms = get_the_terms(get_the_ID(), $type);
	if($terms[0]){
		$term = $terms[0];
		$ar = get_field('ar_name', $term);
		return $ar ? $ar : $term->name;
	}
	return '';
}