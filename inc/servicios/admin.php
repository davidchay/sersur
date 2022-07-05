<?php

/**
 * Hook in and register a submenu options page for the Page post-type menu.
 */
function serasur_register_options_servicios() {

	/**
	 * Registers options page menu item and form.
	 */
    $prefix = 'serasur_';
	$cmb = new_cmb2_box( array(
		'id'           => 'serasur_options_servicios',
		'title'        => esc_html__( 'Opciones', 'cmb2' ),
		'object_types' => array( 'options-page' ),

		/*
		 * The following parameters are specific to the options-page box
		 * Several of these parameters are passed along to add_menu_page()/add_submenu_page().
		 */

		'option_key'      => 'config-servicios', // The option key and admin menu page slug.
		// 'icon_url'        => '', // Menu icon. Only applicable if 'parent_slug' is left empty.
		// 'menu_title'      => esc_html__( 'Options', 'cmb2' ), // Falls back to 'title' (above).
		'parent_slug'     => 'edit.php?post_type=servicios', // Make options page a submenu item of the themes menu.
		// 'capability'      => 'manage_options', // Cap required to view options-page.
		// 'position'        => 1, // Menu position. Only applicable if 'parent_slug' is left empty.
		// 'admin_menu_hook' => 'network_admin_menu', // 'network_admin_menu' to add network-level options page.
		// 'display_cb'      => false, // Override the options-page form output (CMB2_Hookup::options_page_output()).
		// 'save_button'     => esc_html__( 'Save Theme Options', 'cmb2' ), // The text for the options-page save button. Defaults to 'Save'.
		// 'disable_settings_errors' => true, // On settings pages (not options-general.php sub-pages), allows disabling.
		// 'message_cb'      => 'yourprefix_options_page_message_callback',
	) );

	$cmb->add_field( array(
        'name'             => 'Cuántos servicios se muestran en inicio',
        'desc'             => 'Seleccione cuántos servicios desea que se muestren en la página de inicio',
        'id'               => $prefix . 'servicios_cuantos_inicio',
        'type'             => 'select',
        'show_option_none' => false,
        'default'          => '6',
        'options'          => array(
            '3' => __( '3', 'cmb2' ),
            '6'   => __( '6', 'cmb2' ),
            '9'     => __( '9', 'cmb2' ),
        ),
    ) );

    $cmb->add_field( array(
		'name'             => 'Página de servicios',
		'desc'             => 'Seleccione la página de servicios',
		'id'               => $prefix . 'servicios_pagina',
		'type'             => 'select',
		'show_option_none' => false,
		'default'          => '',
		'options'          => codipix_get_pages_options(),
		
	) );

}
add_action( 'cmb2_admin_init', 'serasur_register_options_servicios' );

