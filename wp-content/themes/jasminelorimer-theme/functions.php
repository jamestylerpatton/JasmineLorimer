<?php

if ( ! class_exists( 'Timber' ) ) {
	add_action( 'admin_notices', function() {
		echo '<div class="error"><p>Timber not activated. Make sure you activate the plugin in <a href="' . esc_url( admin_url( 'plugins.php#timber' ) ) . '">' . esc_url( admin_url( 'plugins.php') ) . '</a></p></div>';
	});

	add_filter('template_include', function($template) {
		return get_stylesheet_directory() . '/static/no-timber.html';
	});

	return;
}

Timber::$dirname = array('templates', 'views');

class StarterSite extends TimberSite {

	function __construct() {
		add_theme_support( 'post-formats', ['video'] );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'menus' );
		add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );

		add_filter( 'timber_context', array( $this, 'add_to_context' ) );
		add_filter( 'get_twig', array( $this, 'add_to_twig' ) );

		add_action( 'init', array( $this, 'register_post_types' ) );
		add_action( 'init', array( $this, 'register_taxonomies' ) );

		add_action( 'wp_enqueue_scripts', array( $this, 'load_styles' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'load_scripts' ) );
		parent::__construct();
	}

	function register_post_types() {
		//this is where you can register custom post types
	}

	function register_taxonomies() {
		//this is where you can register custom taxonomies
	}

	function add_to_context( $context ) {
		$context['mainNav'] = $this->main_nav();
		$context['menu'] = new TimberMenu();
		$context['site'] = $this;
		return $context;
	}

	function myfoo( $text ) {
		$text .= ' bar!';
		return $text;
	}

	function main_nav() {
		$nav_arr = [
			[
				'name' => 'Beauty',
				'link' => '/',
				'slug' => 'beauty'
			],
			[
				'name' => 'Travel',
				'link' => '/',
				'slug' => 'travel'
			],
			[
				'name' => 'Relationships',
				'link' => '/',
				'slug' => 'relationships'
			],
			[
				'name' => 'Q&A',
				'link' => '/',
				'slug' => 'q-a'
			],
			[
				'name' => 'About',
				'link' => '/about',
				'slug' => 'about'
			]
		];
		return $nav_arr;
	}

	function add_to_twig( $twig ) {
		/* this is where you can add your own functions to twig */
		$twig->addExtension( new Twig_Extension_StringLoader() );
		$twig->addFilter('myfoo', new Twig_SimpleFilter('myfoo', array($this, 'myfoo')));
		return $twig;
	}

	function load_styles() {
		wp_enqueue_style('fontawesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css', null, '4.7.0');
		wp_enqueue_style('app-styles', get_template_directory_uri() . '/css/style.css', null, '20180426');
	}
	function load_scripts() {
		wp_deregister_script( 'jquery' );

		wp_enqueue_script('app-scripts', get_template_directory_uri() . '/js/app.js', null, '20180426', true);
	}

}

new StarterSite();
