<?php

/**
 * Class Storyteller_Structure
 *
 * Sets up structural requirements of the Storyteller plugin
 */
Class Storyteller_Structure extends Storyteller_Plugin {

	/**
	 * Uses parent Plugin class to set up locale and other useful bits.
	 *
	 * @throws exception
	 */
	function __construct() {

		$this->setup( 'storyteller', 'plugin' );
		$this->version = 0.1;

		$this->add_action( 'init' );
		$this->add_action( 'init', 'custom_post_types' );

	}

	/**
	 * Warn users if they are missing the Dependencies plugin
	 */
	public function init() {

		if ( ! class_exists('Plugin_Dependencies') ) {
			$this->set_admin_error( __('You are missing the WP Plugin Dependencies plugin by X-Team. Please install and activate it!') );
		}

	}

	public function custom_post_types() {

		// Stories
		register_extended_post_type(
			'story',
			array(
				'cols' => array(
					'published' => array(
						'title' => __('Published'),
						'meta_key' => 'published_date',
						'date_format' => get_option('date_format'),
					),
				),
			),
			array(
				'singular' => __('Story'),
				'plural' => __('Stories'),
				'slug' => __('stories'),
			)
		);

	}

}

/** @var Storyteller_Structure $Storyteller_Structure Initiates the structure class */
$Storyteller_Structure = new Storyteller_Structure();