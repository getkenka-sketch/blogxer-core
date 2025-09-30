<?php
/**
 * Blogxer Theme Configuration File.
 *
 * @package Radiustheme\Blogxer
 */

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'This script cannot be accessed directly.' );
}

/**
 * Blogxer Demo Importer Configuration File.
 */
class Blogxer_Demo_Importer {
	/**
	 * Class Constructor.
	 */
	public function __construct() {
		// Importer config.
		add_filter( 'sd/edi/importer/config', [ $this, 'blogxer_import_config' ] );

		// Before import action.
		add_action( 'sd/edi/before_import', [ $this, 'before_import_actions' ] );

		// After import action.
		add_action( 'sd/edi/after_import', [ $this, 'after_import_actions' ], 99 );

		// Server requirements.
		add_filter( 'sd/edi/server_requirements', [ $this, 'adjust_server_requirements' ] );
	}

	/**
	 * Blogxer theme import config.
	 *
	 * @return array
	 */
	public function blogxer_import_config() {
		return [
			'themeName'             => 'Blogxer',
			'themeSlug'             => 'blogxer',
			'multipleZip'           => false,
			'demoZip'               => $this->get_demo_importer_url( 'demo-content.zip' ),
			'blogSlug'              => 'blog',
			'urlToReplace'          => 'https://radiustheme.com/demo/wordpress/themes/blogxer/',
			'replaceCommenterEmail' => 'lipu.techlabpro@gmail.com',
			'elementor_data_fix'    => [
				'rt-post-slider'     => [
					'cat_single_grid',
					'repeater_category_list' => 'cat_multi_grid',
				],
				'rt-post-grid'       => [
					'cat_single_grid',
					'repeater_category_list' => 'cat_multi_grid',
				],
				'rt-post-list'       => [
					'cat_single_grid',
					'repeater_category_list' => 'cat_multi_grid',
				],
				'rt-post-box'        => [
					'cat_single_grid',
					'repeater_category_list' => 'cat_multi_grid',
				],
				'rt-post-single'     => [
					'cat',
				],
				'wp-widget-nav_menu' => [
					'nav_menu',
				],
			],
			'settingsJson'          => [
				'blogxer',
				'wp_social_options',
				'xs_counter_options',
				'mc4wp_default_form_id',
				'xs_counter_providers_data',
				'xs_providers_enabled_counter',
				'xs_style_setting_data_counter',
				'xs_counter_global_setting_data',
			],
			'menus'                 => [
				'primary'  => 'Main Menu',
				'topright' => 'Offcanvas Menu',
			],
			'demoData'              => [
				'home-1'  => [
					'name'         => 'Home 1',
					'previewImage' => $this->get_demo_importer_url( 'screenshots/home-1.jpg' ),
					'previewUrl'   => 'https://radiustheme.com/demo/wordpress/themes/blogxer/',
				],
				'home-2'  => [
					'name'         => 'Home 2',
					'previewImage' => $this->get_demo_importer_url( 'screenshots/home-2.jpg' ),
					'previewUrl'   => 'https://radiustheme.com/demo/wordpress/themes/blogxer/home-2/',
				],
				'home-3'  => [
					'name'         => 'Home 3',
					'previewImage' => $this->get_demo_importer_url( 'screenshots/home-3.jpg' ),
					'previewUrl'   => 'https://radiustheme.com/demo/wordpress/themes/blogxer/home-3/',
				],
				'home-4'  => [
					'name'         => 'Home 4',
					'previewImage' => $this->get_demo_importer_url( 'screenshots/home-4.jpg' ),
					'previewUrl'   => 'https://radiustheme.com/demo/wordpress/themes/blogxer/home-4/',
				],
				'home-5'  => [
					'name'         => 'Home 5',
					'previewImage' => $this->get_demo_importer_url( 'screenshots/home-5.jpg' ),
					'previewUrl'   => 'https://radiustheme.com/demo/wordpress/themes/blogxer/home-5/',
				],
				'home-6'  => [
					'name'         => 'Home 6',
					'previewImage' => $this->get_demo_importer_url( 'screenshots/home-6.jpg' ),
					'previewUrl'   => 'https://radiustheme.com/demo/wordpress/themes/blogxer/home-6/',
				],
				'home-7'  => [
					'name'         => 'Home 7',
					'previewImage' => $this->get_demo_importer_url( 'screenshots/home-7.jpg' ),
					'previewUrl'   => 'https://radiustheme.com/demo/wordpress/themes/blogxer/home-7/',
				],
				'home-8'  => [
					'name'         => 'Home 8',
					'previewImage' => $this->get_demo_importer_url( 'screenshots/home-8.jpg' ),
					'previewUrl'   => 'https://radiustheme.com/demo/wordpress/themes/blogxer/home-8/',
				],
				'home-9'  => [
					'name'         => 'Home 9',
					'previewImage' => $this->get_demo_importer_url( 'screenshots/home-9.jpg' ),
					'previewUrl'   => 'https://radiustheme.com/demo/wordpress/themes/blogxer/home-9/',
				],
				'home-10' => [
					'name'         => 'Home 10',
					'previewImage' => $this->get_demo_importer_url( 'screenshots/home-10.jpg' ),
					'previewUrl'   => 'https://radiustheme.com/demo/wordpress/themes/blogxer/home-10/',
				],
				'home-11' => [
					'name'         => 'Home 11',
					'previewImage' => $this->get_demo_importer_url( 'screenshots/home-11.jpg' ),
					'previewUrl'   => 'https://radiustheme.com/demo/wordpress/themes/blogxer/home-11/',
				],
				'home-12' => [
					'name'         => 'Home 12',
					'previewImage' => $this->get_demo_importer_url( 'screenshots/home-12.jpg' ),
					'previewUrl'   => 'https://radiustheme.com/demo/wordpress/themes/blogxer/home-12/',
				],
			],
			'plugins'               => [
				'contact-form-7'                    => [
					'name'     => 'Contact Form 7',
					'source'   => 'wordpress',
					'filePath' => 'contact-form-7/wp-contact-form-7.php',
				],
				'elementor'                         => [
					'name'     => 'Elementor Page Builder',
					'source'   => 'wordpress',
					'filePath' => 'elementor/elementor.php',
				],
				'instagram-feed'                    => [
					'name'     => 'Instagram Feed',
					'source'   => 'wordpress',
					'filePath' => 'instagram-feed/instagram-feed.php',
				],
				'mailchimp-for-wp'                  => [
					'name'     => 'MailChimp for WordPress',
					'source'   => 'wordpress',
					'filePath' => 'mailchimp-for-wp/mailchimp-for-wp.php',
				],
				'redux-framework'                   => [
					'name'     => 'Redux Framework',
					'source'   => 'wordpress',
					'filePath' => 'redux-framework/redux-framework.php',
				],
				'rt-framework'                      => [
					'name'     => 'RT Framework',
					'source'   => 'bundled',
					'filePath' => 'rt-framework/rt-framework.php',
					'location' => get_parent_theme_file_uri( 'inc/plugins/rt-framework.zip' ),
				],
				'woocommerce'                       => [
					'name'     => 'WooCommerce',
					'source'   => 'wordpress',
					'filePath' => 'woocommerce/woocommerce.php',
				],
				'wp-seo-structured-data-schema-pro' => [
					'name'     => 'WP Seo Structured Data Schema Pro',
					'source'   => 'bundled',
					'filePath' => 'wp-seo-structured-data-schema-pro/wp-seo-structured-data-schema-pro.php',
					'location' => get_parent_theme_file_uri( 'inc/plugins/wp-seo-structured-data-schema-pro.zip' ),
				],
				'wp-social'                         => [
					'name'     => 'WP Social',
					'source'   => 'wordpress',
					'filePath' => 'wp-social/wp-social.php',
				],
			],
		];
	}

	/**
	 * Before import actions.
	 *
	 * @return void
	 */
	public function before_import_actions() {
		// Disable big image scaling.
		add_filter( 'big_image_size_threshold', '__return_false' );

		// Disable Elementor features.
		update_option( 'elementor_experiment-e_font_icon_svg', 'inactive' );
		update_option( 'elementor_experiment-container', 'inactive' );
		update_option( 'elementor_experiment-nested-elements', 'inactive' );
		update_option( 'elementor_load_fa4_shim', 'yes' );
	}

	/**
	 * After import actions.
	 *
	 * @return void
	 */
	public function after_import_actions() {
		flush_rewrite_rules();
	}

	/**
	 * Adjust server requirements.
	 *
	 * @param array $requirements Server requirements.
	 *
	 * @return array
	 */
	public function adjust_server_requirements( $requirements ) {
		$requirements['max_execution_time'] = '2000';

		return $requirements;
	}

	/**
	 * Get demo importer URL.
	 *
	 * @param string $file File name.
	 *
	 * @return string
	 */
	private function get_demo_importer_url( $file ) {
		return esc_url( BLOGXER_CORE_URL . '/demo-importer/' . $file );
	}
}

new Blogxer_Demo_Importer();
