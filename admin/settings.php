<?php
	// add top-level administrative menu
	function stevesweather_add_sublevel_menu() {	
		add_submenu_page(
			'options-general.php',
			'Steve\'s Weather Plugin Settings',
			'Weather Options',
			'manage_options',
			'stevesweather',
			'stevesweather_display_settings_page'
		);	
	}
	add_action('admin_menu', 'stevesweather_add_sublevel_menu');
	
	// display the plugin settings page
	function stevesweather_display_settings_page() {
	
		// check if user is allowed access
		if (!current_user_can('manage_options')) return;
	
		?>
	
		<div class="wrap">
	
			<h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
	
			<form action="options.php" method="post">
				<?php
					settings_fields('stevesweather_options');
					do_settings_sections('stevesweather');
					submit_button();
				?>
			</form>
	
		</div>
		
		<?php
	}
?>