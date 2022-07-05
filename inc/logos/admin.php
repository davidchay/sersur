<?php 

/**
 * configuracion de logos carousel
 * Agrega submenu de configuracion a logos custom type
 */


 /**
 * Hook in and register a metabox to handle a theme options page and adds a menu item.
 */
function logo_carousel_config_register() {

    /**
     * Registers main options page menu item and form.
	 */
    $prefix = 'logo_testimoniales_';
	$args = array(
		'id'           => 'serasur_config_logos_carousel_testimoniales',
		'title'        => 'Configuracion del carousel de logos para testimoniales ',
		'menu_title'   => 'Testimoniales',
		'object_types' => array( 'options-page' ),
		'option_key'   => 'config-logos-testimoniales',
        'capability'   => 'manage_options',
        'parent_slug'  => 'edit.php?post_type=logos',
		'tab_group'    => 'logos_carousel_config',
		'tab_title'    => 'Testimoniales',
	);

	// 'tab_group' property is supported in > 2.4.0.
	if ( version_compare( CMB2_VERSION, '2.4.0' ) ) {
		$args['display_cb'] = 'yourprefix_options_display_with_tabs';
	}

	$main_options = new_cmb2_box( $args );

	/**
     * shortcode 
     **/
    $main_options->add_field( array(
        'name' => 'shortcode',
        'desc' => '<code>[logos-testimoniales]</code>  ',
        'type' => 'title',
        'id'   => $prefix . 'logo_shortcode'
    ) );
    /*
    * diseño carusel
    */
    $main_options->add_field( array(
		'name'             => __( 'Diseño del carrusel', 'cmb2' ),
		'desc'             => __( 'Seleccione si deseas que el carousel sea de una o dos filas.', 'cmb2' ),
		'id'               => $prefix . 'carousel_row',
		'type'             => 'radio_image',
		'options'          => array(
            'slide_1'   =>  'Una fila',
            'slide_2'   =>  'Doble fila',
        ),
		'images_path'      => get_template_directory_uri(),
		'images'           => array(
            'slide_1'   =>  'images/carousel-1.png',
            'slide_2'  =>  'images/carousel-2.png',
        )
	) );

    //estilo
    $main_options->add_field( array(
        'name'             => 'Diseño del logo',
        'desc'             => 'Selecione un diseño del logo',
        'id'               => $prefix . 'slider_style',
        'type'             => 'select',
        'show_option_none' => false,
        'default'          => 'style_1',
        'options'          => array(
            'style_1'   => __( 'Diseño 1', 'cmb2' ),
            'style_2'   => __( 'Diseño 2', 'cmb2' ),
            'style_3'   => __( 'Diseño 3', 'cmb2' ),
            'style_4'   => __( 'Diseño 4', 'cmb2' ),
        ),
    ) );
    
    //velocidad
    $main_options->add_field( array(
        'name'             => 'Velocidad del carrusel',
        // 'desc'             => 'Select an option',
        'id'               => $prefix . 'slider_velocity',
        'type'             => 'select',
        'show_option_none' => false,
        'default'          => '2500',
        'options'          => array(
            '6000'   => __( 'Lento', 'cmb2' ),
            '3000'   => __( 'Normal', 'cmb2' ),
            '900'    => __( 'Repido', 'cmb2' ),
            
        ),
    ) );

    //direccion
    $main_options->add_field( array(
        'name'             => 'Dirección del carrusel',
        'id'               => $prefix . 'carousel_direction',
        'type'             => 'radio',
        'default'          => 'ltr',
        'options'          => array(
            'lrt' => __( 'Izquierda a derecha', 'cmb2' ),
            'rtl'   => __( 'Derecha a izquierda', 'cmb2' ),
            
        ),
    ) );

    $main_options->add_field( array(
        'name' => 'Mostrar borde',
        'desc' => '',
        'id'   => $prefix . 'logo_border',
        'type' => 'checkbox',
    ) );
    
    $main_options->add_field( array(
        'name' => 'Esquinas redondeadas',
        'desc' => '',
        'id'   => $prefix . 'logo_rounded',
        'type' => 'checkbox',
    ) );

    $main_options->add_field( array(
        'name' => 'Activar navegación',
        'desc' => '',
        'id'   => $prefix . 'carousel_nav',
        'type' => 'checkbox',
    ) );

    $main_options->add_field( array(
        'name' => 'Activar paginación',
        'desc' => '',
        'id'   => $prefix . 'carousel_pages',
        'type' => 'checkbox',
    ) );

	

	/**
	 * Registers secondary options page, and set main item as parent.
	 */
    $prefix_2 = 'logo_dependencias_';
	
	$args = array(
		'id'           => 'serasur_config_logos_carousel_dependencias',
		'title'        => 'Configuracion del carousel de logos para dependencias ',
		'menu_title'   => 'Dependencias', // Use menu title, & not title to hide main h2.
		'object_types' => array( 'options-page' ),
		'option_key'   => 'config-logos-dependencias',
		'parent_slug'  => 'edit.php?post_type=logos',
		'tab_group'    => 'logos_carousel_config',
		'tab_title'    => 'Dependencias',
	);

	//'tab_group' property is supported in > 2.4.0.
	if ( version_compare( CMB2_VERSION, '2.4.0' ) ) {
		$args['display_cb'] = 'yourprefix_options_display_with_tabs';
	}

	$dependencias_options = new_cmb2_box( $args );

	/**
     * shortcode 
     **/
    $dependencias_options->add_field( array(
        'name' => 'shortcode',
        'desc' => '<code>[logos-dependencias]</code>  ',
        'type' => 'title',
        'id'   => $prefix_2 . 'logo_shortcode'
    ) );
    /*
    * diseño carusel
    */
    $dependencias_options->add_field( array(
		'name'             => __( 'Diseño del carrusel', 'cmb2' ),
		'desc'             => __( 'Seleccione si deseas que el carousel sea de una o dos filas.', 'cmb2' ),
		'id'               => $prefix_2 . 'carousel_row',
		'type'             => 'radio_image',
		'options'          => array(
            'slide_1'   =>  'Una fila',
            'slide_2'   =>  'Doble fila',
        ),
		'images_path'      => get_template_directory_uri(),
		'images'           => array(
            'slide_1'   =>  'images/carousel-1.png',
            'slide_2'  =>  'images/carousel-2.png',
        )
	) );

    //estilo
    $dependencias_options->add_field( array(
        'name'             => 'Diseño del logo',
        'desc'             => 'Selecione un diseño del logo',
        'id'               => $prefix_2 . 'slider_style',
        'type'             => 'select',
        'show_option_none' => false,
        'default'          => 'style_1',
        'options'          => array(
            'style_1'   => __( 'Diseño 1', 'cmb2' ),
            'style_2'   => __( 'Diseño 2', 'cmb2' ),
            'style_3'   => __( 'Diseño 3', 'cmb2' ),
            'style_4'   => __( 'Diseño 4', 'cmb2' ),
        ),
    ) );
    
    //velocidad
    $dependencias_options->add_field( array(
        'name'             => 'Velocidad del carrusel',
        // 'desc'             => 'Select an option',
        'id'               => $prefix_2 . 'slider_velocity',
        'type'             => 'select',
        'show_option_none' => false,
        'default'          => '2500',
        'options'          => array(
            '6000'   => __( 'Lento', 'cmb2' ),
            '3000'   => __( 'Normal', 'cmb2' ),
            '900'    => __( 'Repido', 'cmb2' ),
            
        ),
    ) );

    //direccion
    $dependencias_options->add_field( array(
        'name'             => 'Dirección del carrusel',
        'id'               => $prefix_2 . 'carousel_direction',
        'type'             => 'radio',
        'default'          => 'ltr',
        'options'          => array(
            'lrt' => __( 'Izquierda a derecha', 'cmb2' ),
            'rtl'   => __( 'Derecha a izquierda', 'cmb2' ),
            
        ),
    ) );
    
    // border
    $dependencias_options->add_field( array(
        'name' => 'Mostrar borde',
        'desc' => '',
        'id'   => $prefix_2 . 'logo_border',
        'type' => 'checkbox',
    ) );
    
    //esquinas redondeadas
    $dependencias_options->add_field( array(
        'name' => 'Esquinas redondeadas',
        'desc' => '',
        'id'   => $prefix_2 . 'logo_rounded',
        'type' => 'checkbox',
    ) );

    //activar navegacion
    $dependencias_options->add_field( array(
        'name' => 'Activar navegación',
        'desc' => '',
        'id'   => $prefix_2 . 'carousel_nav',
        'type' => 'checkbox',
    ) );

    //activar paginacion
    $dependencias_options->add_field( array(
        'name' => 'Activar paginación',
        'desc' => '',
        'id'   => $prefix_2 . 'carousel_pages',
        'type' => 'checkbox',
    ) );




	
}
add_action( 'cmb2_admin_init', 'logo_carousel_config_register' );

/**
 * A CMB2 options-page display callback override which adds tab navigation among
 * CMB2 options pages which share this same display callback.
 *
 * @param CMB2_Options_Hookup $cmb_options The CMB2_Options_Hookup object.
 */
function yourprefix_options_display_with_tabs( $cmb_options ) {
	$tabs = yourprefix_options_page_tabs( $cmb_options );
	?>
	<div class="wrap cmb2-options-page option-<?php echo $cmb_options->option_key; ?>">
		<?php if ( get_admin_page_title() ) : ?>
			<h2><?php echo wp_kses_post( get_admin_page_title() ); ?></h2>
		<?php endif; ?>
		<h2 class="nav-tab-wrapper">
			<?php foreach ( $tabs as $option_key => $tab_title ) : ?>
				<a class="nav-tab<?php if ( isset( $_GET['page'] ) && $option_key === $_GET['page'] ) : ?> nav-tab-active<?php endif; ?>" href="<?php menu_page_url( $option_key ); ?>"><?php echo wp_kses_post( $tab_title ); ?></a>
			<?php endforeach; ?>
		</h2>
		<form class="cmb-form" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" method="POST" id="<?php echo $cmb_options->cmb->cmb_id; ?>" enctype="multipart/form-data" encoding="multipart/form-data">
			<input type="hidden" name="action" value="<?php echo esc_attr( $cmb_options->option_key ); ?>">
			<?php $cmb_options->options_page_metabox(); ?>
			<?php submit_button( esc_attr( $cmb_options->cmb->prop( 'save_button' ) ), 'primary', 'submit-cmb' ); ?>
		</form>
	</div>
	<?php
}

/**
 * Gets navigation tabs array for CMB2 options pages which share the given
 * display_cb param.
 *
 * @param CMB2_Options_Hookup $cmb_options The CMB2_Options_Hookup object.
 *
 * @return array Array of tab information.
 */
function yourprefix_options_page_tabs( $cmb_options ) {
	$tab_group = $cmb_options->cmb->prop( 'tab_group' );
	$tabs      = array();

	foreach ( CMB2_Boxes::get_all() as $cmb_id => $cmb ) {
		if ( $tab_group === $cmb->prop( 'tab_group' ) ) {
			$tabs[ $cmb->options_page_keys()[0] ] = $cmb->prop( 'tab_title' )
				? $cmb->prop( 'tab_title' )
				: $cmb->prop( 'title' );
		}
	}

	return $tabs;
}



































