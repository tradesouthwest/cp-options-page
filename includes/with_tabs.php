<?php
class WOP_Page_With_Tabs extends WP_Options_Page {

	private static $instance = null;

	public static function instance () {
		if ( ! self::$instance ) self::$instance = new self();
		return self::$instance;
	}

	public function __construct () {
		add_action( 'init', [ $this, 'init' ] );
	}

	public function init () {
		$this->id = 'wop_with_tabs';
		$this->menu_title = 'With Tabs';
		$this->menu_position = 9999;

		// declare the "page_tabs" feature
		$this->supports['page_tabs'] = [
			// declare my tabs
			'branding' => 'Branding',
			'styles' => 'Styles'
		];
        // see addons/rich_text_field.php
		$this->supports[] = 'rich_text_field';
		//$this->supports[] = 'code_editor_field';


		parent::init();
	}

	public function get_fields () {
		return [
			[
				'title' => 'Branding, Colors/Logo',
				'description' => 'Change colors and add logo.',
				'type' => 'title',
				'tab' => 'branding', // set the field tab
			],
			[
				'id' => 'text_1',
				'title' => 'Public E-mail',
				'type' => 'text',
				'tab' => 'branding', // set the field tab
			],
			[
				'id' => 'color_1',
				'title' => 'Content Links Color',
				'type' => 'color',
				'tab' => 'branding', // set the field tab
			],
			[
				'id' => 'code_editor_page_css',
				'title' => 'Additional CSS',
				'type' => 'code_editor',
				'description' => 'Use cursor to refresh frame below when ready to see changes.',
				'tab' => 'styles',
                
			],
			[
				'id' => 'preview_1',
				'title' => 'Theme Styles',
				'type' => 'iframe',
				'scr' => \site_url(),
				'tab' => 'styles',
			],
           
		];
	}
}

// start your class
WOP_Page_With_Tabs::instance();