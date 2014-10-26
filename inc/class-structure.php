<?php

Class Storyteller_Structure extends Storyteller_Plugin {

	function __construct() {

		$this->setup( 'storyteller', 'plugin' );
		$this->version = 0.1;

		$this->add_action('init');

	}

	public function init() {

		if ( ! class_exists('Plugin_Dependencies') ) {
			$this->set_admin_error( __('You are missing the WP Plugin Dependencies plugin by X-Team. Please install and activate it!') );
		}

	}

}

$Storyteller_Structure = new Storyteller_Structure();