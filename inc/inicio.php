<?php 
/**
 * Esta funcion remuebe
 */
function remove_editor() {
    if (isset($_GET['post'])) {
        $id = $_GET['post'];
        $template = get_post_meta($id, '_wp_page_template', true);
        switch ($template) {
            case 'page-templates/Inicio.php':
            // the below removes 'editor' support for 'pages'
            // if you want to remove for posts or custom post types as well
            // add this line for posts:
            // remove_post_type_support('post', 'editor');
            // add this line for custom post types and replace 
            // custom-post-type-name with the name of post type:
            // remove_post_type_support('custom-post-type-name', 'editor');
            remove_post_type_support('page', 'editor');
            remove_post_type_support('page', 'author');
            remove_post_type_support('page', 'thumbnail');
            remove_post_type_support('page', 'excerpt');
            remove_post_type_support('page', 'trackbacks');
            remove_post_type_support('page', 'custom-fields');
            remove_post_type_support('page', 'comments');
            
            break;
            default :
            // Don't remove any other template.
            break;
        }
    }
}
add_action('init', 'remove_editor');


/**
 * Metaboxes por secciones
 */
/**
 * Seccion HERO
 */
add_action( 'cmb2_admin_init', 'cmb2_inicio_metaboxes' );
function cmb2_inicio_metaboxes() {
	$prefix = 'serasur_inicio_';
	/**
	 * Initiate the metabox
	 */
	$cmb = new_cmb2_box( array(
        'id'           => 'template-inicio',
        'title'        => 'Configuración de la página de inicio',
        'object_types' => array( 'page' ), // post type
        'show_on'      => array( 'key' => 'page-template', 'value' => 'page-templates/Inicio.php' ),
        'context'      => 'normal', //  'normal', 'advanced', or 'side'
        'priority'     => 'high',  //  'high', 'core', 'default' or 'low'
        'show_names'   => true, // Show field names on the left
    ) );

    /**
     * HERO options
     */

    $group_hero = $cmb->add_field( array(
        'id'          => $prefix . 'hero_section',
        'type'        => 'group',
        'repeatable'  => false, // use false if you want non-repeatable group
        'options'     => array(
            'group_title'       => __( 'SECCIÓN: HERO', 'cmb2' ), // since version 1.1.4, {#} gets replaced by row number
        ),
    ) );
    

    $cmb->add_group_field( $group_hero, array(
        'name'    => 'Titulo',
        'desc'    => 'Agregue el titulo principal del hero',
        'default' => 'SERASUR Agencias Aduanales',
        'id'      => 'titulo',
        'type'    => 'text',
    ) );

	$cmb->add_group_field( $group_hero, array(
        'name'      => 'Subtitulo',
        'desc'      => 'Agregue un subtitulo',
        'default'   => 'Una empresa Dedicada al Comercio Exterior',
        'id'        => 'subtitulo',
        'type'      => 'textarea_small'
    ) );

    $cmb->add_group_field( $group_hero, array(
        'name'      => 'Texto del botón',
        'desc'      => '',
        'default'   => 'Cotiza aquí',
        'id'        => 'texto_boton',
        'type'      => 'text'
    ) );

    $cmb->add_group_field( $group_hero, array(
		'name'             => 'URL del botón',
		'desc'             => 'Ingrese la dirección URL que abrirá el botón',
		'id'               => 'url_boton',
		'type'             => 'text',
		'default'          => '',
		
		
	) );



    /**
     * ACERCA DE OPTIONS
    */
    $group_about = $cmb->add_field( array(
        'id'          => $prefix . 'about_section',
        'type'        => 'group',
        'repeatable'  => false, // use false if you want non-repeatable group
        'options'     => array(
            'group_title'       => __( 'SECCIÓN: NOSOTROS', 'cmb2' ), // since version 1.1.4, {#} gets replaced by row number
        ),
    ) );
    

    $cmb->add_group_field( $group_about, array(
        'name' => 'Mostrar sección',
        'desc' => 'Marca si deseas mostrar esta sección',
        'id'   => 'active',
        'type' => 'checkbox',
    ) );

	$cmb->add_group_field( $group_about, array(
        'name'    => 'Titulo',
        'desc'    => 'Agregue el titulo de la sección',
        'default' => 'Facilitamos tu negocio en el extranjero',
        'id'      => 'titulo',
        'type'    => 'text',
    ) );

	$cmb->add_group_field( $group_about, array(
        'name'      => 'Subtitulo',
        'desc'      => 'Agregue el subtitulo de la sección',
        'default'   => 'Acerca de nosotros',
        'id'        => 'subtitulo',
        'type'      => 'text'
    ) );

    $cmb->add_group_field( $group_about, array(
        'name'    => 'Contenido',
        'desc'    => 'Escribe el contenido de la sección',
        'id'      => 'contenido',
        'type'    => 'textarea'
    ) );

    $cmb->add_group_field( $group_about, array(
        'name'    => 'Imagen',
        'desc'    => '',
        'id'      => 'imagen',
        'type'    => 'file',
        // Optional:
        'options' => array(
            'url' => false, // Hide the text input for the url
        ),
        'text'    => array(
            'add_upload_file_text' => 'Agregar imagen' // Change upload button text. Default: "Add or Upload File"
        ),
        // query_args are passed to wp.media's library query.
        'query_args' => array(
            //'type' => 'application/pdf', // Make library only display PDFs.
            // Or only allow gif, jpg, or png images
             'type' => array(
            	'image/gif',
            	'image/jpeg',
            	'image/png',
            ),
        ),
        'preview_size' => 'medium', // Image size to use when previewing in the admin.
    ) ); 

    $cmb->add_group_field( $group_about, array(
        'name'      => 'Texto del botón',
        'desc'      => '',
        'default'   => 'Contáctanos',
        'id'        => 'texto_boton',
        'type'      => 'text'
    ) );

    $cmb->add_group_field( $group_about, array(
		'name'             => 'URL del botón',
		'desc'             => 'Ingrese la URL del botón',
		'id'               => 'url_boton',
		'default'          => '',
		'type'             => 'text',
	) );
    
    /**
     * Misión
     */

    $cmb->add_group_field( $group_about, array(
        'name'    => 'Titulo de misión ',
        'desc'    => 'Ingrese un titulo de mision',
        'default' => 'Nuestra Misión',
        'id'      => 'titulo_mision',
        'type'    => 'text',
    ) );

    $cmb->add_group_field( $group_about, array(
        'name'    => 'Misión',
        'desc'    => 'Ingrese la misión',
        'default' => 'Somos una empresa dedicada al servicio en comercio exterior propocionando los recursos técnologicos, conocimiento legales y operativos de calidad.',
        'id'      => 'texto_mision',
        'type'    => 'textarea_small'
    ) );

    /**
     * Visión
     */

    $cmb->add_group_field( $group_about,array(
        'name'    => 'Titulo de visión ',
        'desc'    => 'Ingrese un titulo de vision',
        'default' => 'Nuestra Visión',
        'id'      => 'titulo_vision',
        'type'    => 'text',
    ) );

    $cmb->add_group_field( $group_about,array(
        'name'    => 'Visión ',
        'desc'    => 'Ingrese la visión',
        'default' => 'Consolidar una posición en el mercado siendo punta de lanza como la mejor opción en servicio aduanal en el ramo de comercio exterior a través de un servicio integral.',
        'id'      => 'texto_vision',
        'type'    => 'textarea_small'
    ) );

    /**
     * Valores
     */

    $cmb->add_group_field( $group_about, array(
        'name'    => 'Titulo de valores ',
        'desc'    => 'Ingrese un titulo de valores',
        'default' => 'Nuestros Valores',
        'id'      => 'titulo_valores',
        'type'    => 'text',
    ) );

    $cmb->add_group_field( $group_about,array(
        'name'    => 'Valores',
        'desc'    => 'Ingrese los valores',
        'default' => 'Calidad, Ética, Confidencialidad, Trabajo en Equipo, Honestidad, Respeto, Legalidad, Responsabilidad, Compromiso.',
        'id'      => 'texto_valores',
        'type'    => 'textarea_small'
    ) );




    /**
    * SERVICIOS OPTIONS
    */
    $group_servicios = $cmb->add_field( array(
        'id'          => $prefix . 'servicios_section',
        'type'        => 'group',
        'repeatable'  => false, // use false if you want non-repeatable group
        'options'     => array(
            'group_title'       => __( 'SECCIÓN: SERVICIOS', 'cmb2' ), // since version 1.1.4, {#} gets replaced by row number
        ),
    ) );
    

    $cmb->add_group_field( $group_servicios, array(
        'name' => 'Mostrar sección',
        'desc' => 'Marca si deseas mostrar esta sección',
        'id'   => 'active',
        'type' => 'checkbox',
    ) );

	$cmb->add_group_field( $group_servicios, array(
        'name'    => 'Titulo',
        'desc'    => 'Agregue el titulo de la sección',
        'default' => 'Que podemos hacer por ti',
        'id'      => 'titulo',
        'type'    => 'text',
    ) );

	$cmb->add_group_field( $group_servicios, array(
        'name'      => 'Subtitulo',
        'desc'      => 'Agregue un subtitulo',
        'default'   => 'Nuestros servicios',
        'id'        => 'subtitulo',
        'type'      => 'text'
    ) );

    $cmb->add_group_field( $group_servicios, array(
        'name'      => 'Texto del botón',
        'desc'      => '',
        'default'   => 'Ver todos los servicios',
        'id'        => 'texto_boton',
        'type'      => 'text'
    ) );

    


    /**
    * POR QUE ELEGISNOS OPTIONS
    */

    $group_porque = $cmb->add_field( array(
        'id'          => $prefix . 'porque_section',
        'type'        => 'group',
        'repeatable'  => false, // use false if you want non-repeatable group
        'options'     => array(
            'group_title'       => __( 'SECCIÓN: POR QUE ELEGIRNOS', 'cmb2' ), // since version 1.1.4, {#} gets replaced by row number
        ),
    ) );


    $cmb->add_group_field( $group_porque, array(
        'name' => 'Mostrar sección',
        'desc' => 'Marca si deseas mostrar esta sección',
        'id'   => 'active',
        'type' => 'checkbox',
    ) );

	$cmb->add_group_field( $group_porque, array(
        'name'    => 'Titulo',
        'desc'    => 'Agregue el titulo de la sección',
        'default' => 'Razones por la cual debes quedarte con nosotros',
        'id'      => 'titulo',
        'type'    => 'text',
    ) );

	$cmb->add_group_field( $group_porque, array(
        'name'      => 'Subtitulo',
        'desc'      => 'Agregue un subtitulo',
        'default'   => '¿Por qué elegirnos?',
        'id'        => 'subtitulo',
        'type'      => 'text'
    ) );

    $cmb->add_group_field( $group_porque, array(
        'name'    => 'Imagen de fondo',
        'desc'    => '',
        'id'      => 'imagen_bg',
        'type'    => 'file',
        // Optional:
        'options' => array(
            'url' => false, // Hide the text input for the url
        ),
        'text'    => array(
            'add_upload_file_text' => 'Agregar imagen' // Change upload button text. Default: "Add or Upload File"
        ),
        // query_args are passed to wp.media's library query.
        'query_args' => array(
            //'type' => 'application/pdf', // Make library only display PDFs.
            // Or only allow gif, jpg, or png images
             'type' => array(
            	'image/gif',
            	'image/jpeg',
            	'image/png',
            ),
        ),
        'preview_size' => 'large', // Image size to use when previewing in the admin.
    ) ); 




    /**
    * SUCURSALES - OPTIONS
    */
    $group_sucursales = $cmb->add_field( array(
        'id'          => $prefix . 'sucursales_section',
        'type'        => 'group',
        'repeatable'  => false, // use false if you want non-repeatable group
        'options'     => array(
            'group_title'       => __( 'SECCIÓN: SUCURSALES', 'cmb2' ), // since version 1.1.4, {#} gets replaced by row number
        ),
    ) );

    
    $cmb->add_group_field( $group_sucursales, array(
        'name' => 'Mostrar sección',
        'desc' => 'Marca si deseas mostrar esta sección',
        'id'   => 'active',
        'type' => 'checkbox',
    ) );

	$cmb->add_group_field( $group_sucursales, array(
        'name'    => 'Titulo',
        'desc'    => 'Agregue el titulo de la sección',
        'default' => 'Tenemos presencia en las principales aduanas del país',
        'id'      => 'titulo',
        'type'    => 'text',
    ) );

	$cmb->add_group_field( $group_sucursales, array(
        'name'      => 'Subtitulo',
        'desc'      => 'Agregue un subtitulo',
        'default'   => 'Nuestras sucursales',
        'id'        => 'subtitulo',
        'type'      => 'text'
    ) );


    /**
    * COLABORACIÓN - OPTIONS
    */
    $group_testimonial = $cmb->add_field( array(
        'id'          => $prefix . 'testimonial_section',
        'type'        => 'group',
        'repeatable'  => false, // use false if you want non-repeatable group
        'options'     => array(
            'group_title'       => __( 'SECCIÓN: EMPRESAS QUE CONFIAN EN NOSOTROS', 'cmb2' ), // since version 1.1.4, {#} gets replaced by row number
        ),
    ) );

    
    $cmb->add_group_field( $group_testimonial, array(
        'name' => 'Mostrar sección',
        'desc' => 'Marca si deseas mostrar esta sección',
        'id'   => 'active',
        'type' => 'checkbox',
    ) );

	$cmb->add_group_field( $group_testimonial, array(
        'name'    => 'Titulo',
        'desc'    => 'Agregue el titulo de la sección',
        'default' => 'Empresas que confían en nosotros',
        'id'      => 'titulo',
        'type'    => 'text',
    ) );

	$cmb->add_group_field( $group_testimonial, array(
        'name'      => 'Subtitulo',
        'desc'      => 'Agregue un subtitulo',
        'default'   => 'Colaboración',
        'id'        => 'subtitulo',
        'type'      => 'text'
    ) );





    /**
    * ULTIMAS ENTRADAS DEL BLOG - OPTIONS
    */

    $group_blog = $cmb->add_field( array(
        'id'          => $prefix . 'blog_section',
        'type'        => 'group',
        'repeatable'  => false, // use false if you want non-repeatable group
        'options'     => array(
            'group_title'       => __( 'SECCIÓN: ÚLTIMAS NOTICIAS', 'cmb2' ), // since version 1.1.4, {#} gets replaced by row number
        ),
    ) );


    
    $cmb->add_group_field( $group_blog, array(
        'name' => 'Mostrar sección',
        'desc' => 'Marca si deseas mostrar esta sección',
        'id'   => 'active',
        'type' => 'checkbox',
    ) );

	$cmb->add_group_field( $group_blog, array(
        'name'    => 'Titulo',
        'desc'    => 'Agregue el titulo de la sección',
        'default' => 'Mantente informado',
        'id'      => 'titulo',
        'type'    => 'text',
    ) );

	$cmb->add_group_field( $group_blog, array(
        'name'      => 'Subtitulo',
        'desc'      => 'Agregue un subtitulo',
        'default'   => 'Blog',
        'id'        => 'subtitulo',
        'type'      => 'text'
    ) );


    $cmb->add_group_field( $group_blog, array(
        'name'      => 'Texto del botón',
        'desc'      => '',
        'default'   => 'Ver más noticias',
        'id'        => 'texto_boton',
        'type'      => 'text'
    ) );

    $cmb->add_group_field( $group_blog, array(
		'name'             => 'URL del blog',
		'desc'             => 'Ingrese la dirección URL del blog',
		'id'               => 'url_boton',
		'type'             => 'text',
		'default'          => '',
	) );



    /**
    * DEPENDENCIAS - OPTIONS
    */
    $group_dependencias = $cmb->add_field( array(
        'id'          => $prefix . 'dependencias_section',
        'type'        => 'group',
        'repeatable'  => false, // use false if you want non-repeatable group
        'options'     => array(
            'group_title'       => __( 'SECCIÓN: DEPENDENCIAS QUE SE RELACIONAN CON NOSOTROS', 'cmb2' ), // since version 1.1.4, {#} gets replaced by row number
        ),
    ) );


    $cmb->add_group_field( $group_dependencias, array(
        'name' => 'Mostrar sección',
        'desc' => 'Marca si deseas mostrar esta sección',
        'id'   => 'active',
        'type' => 'checkbox',
    ) );

	$cmb->add_group_field( $group_dependencias, array(
        'name'    => 'Titulo',
        'desc'    => 'Agregue el titulo de la sección',
        'default' => 'Dependencias que se relacionan con las prestaciones de nuestros servicios',
        'id'      => 'titulo',
        'type'    => 'text',
    ) );

	$cmb->add_group_field( $group_dependencias, array(
        'name'      => 'Subtitulo',
        'desc'      => 'Agregue un subtitulo',
        'default'   => '',
        'id'        => 'subtitulo',
        'type'      => 'text'
    ) );





    /**
    * CONTACTO - OPTIONS
    */
    $group_contacto = $cmb->add_field( array(
        'id'          => $prefix . 'contacto_section',
        'type'        => 'group',
        'repeatable'  => false, // use false if you want non-repeatable group
        'options'     => array(
            'group_title'       => __( 'SECCIÓN: CONTACTO', 'cmb2' ), // since version 1.1.4, {#} gets replaced by row number
        ),
    ) );


    
    $cmb->add_group_field( $group_contacto, array(
        'name' => 'Mostrar sección',
        'desc' => 'Marca si deseas mostrar esta sección',
        'id'   => 'active',
        'type' => 'checkbox',
    ) );

	$cmb->add_group_field( $group_contacto, array(
        'name'    => 'Titulo',
        'desc'    => 'Agregue el titulo de la sección',
        'default' => 'Contáctanos estaremos contentos de poder ayudar en tu negocio',
        'id'      => 'titulo',
        'type'    => 'text',
    ) );

	$cmb->add_group_field( $group_contacto, array(
        'name'      => 'Subtitulo',
        'desc'      => 'Agregue un subtitulo',
        'default'   => 'Contacto',
        'id'        => 'subtitulo',
        'type'      => 'text'
    ) );

    $cmb->add_group_field( $group_contacto, array(
        'name' => 'Mostrar datos de contacto',
        'desc' => 'Marca si deseas mostrar los datos de contacto',
        'id'   => 'mostrar_datos',
        'type' => 'checkbox',
    ) );

    $cmb->add_group_field( $group_contacto, array(
        'name' => 'Mostrar mapa de ubicacion y formulario de contacto',
        'desc' => '',
        'id'   => 'mostrar_map_form',
        'type' => 'checkbox',
    ) );


}