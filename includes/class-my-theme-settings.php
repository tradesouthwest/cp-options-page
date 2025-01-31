<?php

class My_Settings_Page extends WP_Options_Page {
	// I recommend using Singleton pattern
	// So you can easily retrieve the class later
	// example: My_Settings_Page::instance()->get_option( 'api_key' );
	private static $instance = null;
	public static function instance () {
		if ( ! self::$instance ) self::$instance = new self();
		return self::$instance;
	}

	private function __construct () {
		add_action( 'init', [ $this, 'init' ] );
	}

	// overrides the `init` method to setup your page
	public function init () {
		// give your page a ID
		$this->id = 'my_settings_page';

		// set the menu name
		$this->menu_title = 'My Settings';

		// register the page
		parent::init();
	}

	// overrides the `get_fields` method to register your fields
	public function get_fields () {
		return [
			[
				'id' => 'api_key',
				'title' => 'API Key',
				'type' => 'text',
			]
		];
	}
}

// start your class
My_Settings_Page::instance();