<?php
function monkeyinsilk_settings() {
  // If plugin settings don't exist, then create them
  if( !get_option( 'monkeyinsilk_settings' ) ) {
      add_option( 'monkeyinsilk_settings' );
  }

  // Define (at least) one section for our fields
  add_settings_section(
    // Unique identifier for the section
    'monkeyinsilk_settings_section',
    // Section Title
    __( 'Project settings', 'monkeyinsilk' ),
    // Callback for an optional description
    'monkeyinsilk_settings_section_callback',
    // Admin page to add section to
    'monkeyinsilk'
  );

  add_settings_field(
    // Unique identifier for field
    'monkeyinsilk_settings_project_id',
    // Field Title
    __( 'Project id', 'monkeyinsilk'),
    // Callback for field markup
    'monkeyinsilk_settings_project_id_callback',
    // Page to go on
    'monkeyinsilk',
    // Section to go in
    'monkeyinsilk_settings_section'
  );

  add_settings_field(
    // Unique identifier for field
    'monkeyinsilk_settings_homeselector_inline_menu',
    // Field Title
    __( 'Homeselector inline menu', 'monkeyinsilk'),
    // Callback for field markup
    'monkeyinsilk_settings_homeselector_inline_menu_cb',
    // Page to go on
    'monkeyinsilk',
    // Section to go in
    'monkeyinsilk_settings_section'
  );

  register_setting(
    'monkeyinsilk_settings',
    'monkeyinsilk_settings'
  );
}
add_action( 'admin_init', 'monkeyinsilk_settings' );

function monkeyinsilk_settings_section_callback() {
  echo 'Setup your project with the information provided from Monkey in Silk. Contact <a href="https://monkeyinsilk.se/contact">Monkey in Silk</a> if you need assistance in setting up your project in Wordpress';
}

function monkeyinsilk_settings_project_id_callback() {
  $options = get_option( 'monkeyinsilk_settings' );

	$pid = '';
	if( isset( $options[ 'project_id' ] ) ) {
		$pid = esc_html( strtolower(trim($options['project_id'])) );
	}

  echo '<input type="text" size="40" id="monkeyinsilk_customtext" name="monkeyinsilk_settings[project_id]" value="' . $pid . '" />';
}

function monkeyinsilk_settings_homeselector_inline_menu_cb() {
    $options = get_option( 'monkeyinsilk_settings' );
  
    $inline_menu = '1';
    if( isset( $options[ 'homeselector_inline_menu' ] ) ) {
        $inline_menu = esc_html( $options['homeselector_inline_menu'] );
    }
  
    $html = '<input type="hidden" id="monkeyinsilk_homeselector_inline_menu" name="monkeyinsilk_settings[homeselector_inline_menu]" value="0"/>';
    $html .= '<input type="checkbox" id="monkeyinsilk_homeselector_inline_menu" name="monkeyinsilk_settings[homeselector_inline_menu]" value="1" '. checked(1,$inline_menu,false) . '/>';
    $html .= '&nbsp;';
    $html .= '<label for="monkeyinsilk_homeselector_inline_menu">inline</label>';
    echo $html;
}


?>