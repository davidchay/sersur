<?php

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

function serasur_customize_register( $wp_customize ) {
    // Theme Options Panel
    $wp_customize->add_panel( 'serasur_theme_options', 
    array(
        'priority'       => 100,
        'capability'       => 'edit_theme_options',
        'title'            => __( 'SERASUR', 'serasur' ),
        'description'      => __( 'Opciones del tema', 'serasur' ),
    ) 
    );
     /*------SECCIÓN DESCRIPCIPN DE LA EMPRESA ------ */
     $wp_customize->add_section(
        'serasur_general_section',
        array(
            'title'       => __( 'General', 'serasur' ),
            'capability'  => 'edit_theme_options',
            'description' => __( 'Ingrese los datos de contácto de la empresa', 'serasur' ),
            'priority'    => 160,
            'panel'       => 'serasur_theme_options',
        )
    );
    /*----------------SETTING Y CONROLES DATOS DE CONTACTO----------------------- */
                //Direccion
                $wp_customize->add_setting(
                    'serasur_general_descripcion_setting',
                    array(
                        'default'           => '',
                        'type'              => 'theme_mod',
                        'sanitize_callback' => 'sanitize_textarea_field',
                        'capability'        => 'edit_theme_options',
                        'transport'         => 'refresh', // or postMessage
                    )
                );

                $wp_customize->add_control(
                    new WP_Customize_Control(
                        $wp_customize,
                        'serasur_general_descripcion_control',
                        array(
                            'label'       => __( 'Descripción', 'serasur' ),
                            'description' => __( 'Escriba la descripcion de la empresa. Esta información se mostrará en la parte inferior del logo en el pie de página', 'serasur' ),
                            'section'     => 'serasur_general_section',
                            'settings'    => 'serasur_general_descripcion_setting',
                            'type'        => 'textarea',
                            'priority'    =>  10 ,
                            'active_callback' => 'is_front_page',
                        )
                    )
                );
    /*------SECCIÓN DATOS DE CONTACTO------ */
            $wp_customize->add_section(
                'serasur_datos_contacto_section',
                array(
                    'title'       => __( 'Datos de contacto', 'serasur' ),
                    'capability'  => 'edit_theme_options',
                    'description' => __( 'Ingrese los datos de contácto de la empresa', 'serasur' ),
                    'priority'    => 160,
                    'panel'       => 'serasur_theme_options',
                )
            );
            /*----------------SETTING Y CONROLES DATOS DE CONTACTO----------------------- */
                        //Direccion
                        $wp_customize->add_setting(
                            'serasur_contacto_direccion_setting',
                            array(
                                'default'           => '',
                                'type'              => 'theme_mod',
                                'sanitize_callback' => 'sanitize_textarea_field',
                                'capability'        => 'edit_theme_options',
                                'transport'         => 'refresh', // or postMessage
                            )
                        );

                        $wp_customize->add_control(
                            new WP_Customize_Control(
                                $wp_customize,
                                'serasur_contacto_direccion_control',
                                array(
                                    'label'       => __( 'Dirección', 'serasur' ),
                                    'description' => __( 'Ingrese la dirección de la empresa', 'serasur' ),
                                    'section'     => 'serasur_datos_contacto_section',
                                    'settings'    => 'serasur_contacto_direccion_setting',
                                    'type'        => 'textarea',
                                    'priority'    =>  10 ,
                                    'active_callback' => 'is_front_page',
                                )
                            )
                        );
                        
                        //Teléfono
                        $wp_customize->add_setting(
                            'serasur_contacto_telefono_setting',
                            array(
                                'default'           => '',
                                'type'              => 'theme_mod',
                                'sanitize_callback' => 'sanitize_text_field',
                                'capability'        => 'edit_theme_options',
                                'transport'         => 'refresh', // or postMessage
                            )
                        );
                        $wp_customize->add_control(
                            new WP_Customize_Control(
                                $wp_customize,
                                'serasur_contacto_telefono_control',
                                array(
                                    'label'       => __( 'Teléfono', 'serasur' ),
                                    'description' => __( 'Teléfono principal de contacto', 'serasur' ),
                                    'section'     => 'serasur_datos_contacto_section',
                                    'settings'    => 'serasur_contacto_telefono_setting',
                                    'type'        => 'text',
                                    'priority'    =>  10 ,
                                )
                            )
                        );

                        //Email
                        $wp_customize->add_setting(
                            'serasur_contacto_email_setting',
                            array(
                                'default'           => '',
                                'type'              => 'theme_mod',
                                'sanitize_callback' => 'sanitize_text_field',
                                'capability'        => 'edit_theme_options',
                                'transport'         => 'refresh', // or postMessage
                            )
                        );
                        $wp_customize->add_control(
                            new WP_Customize_Control(
                                $wp_customize,
                                'serasur_contacto_email_control',
                                array(
                                    'label'       => __( 'Email', 'serasur' ),
                                    'description' => __( 'Email de contacto', 'serasur' ),
                                    'section'     => 'serasur_datos_contacto_section',
                                    'settings'    => 'serasur_contacto_email_setting',
                                    'type'        => 'email',
                                    'priority'    =>  10 ,
                                )
                            )
                        );

                        //Horario
                        $wp_customize->add_setting(
                            'serasur_contacto_horario_setting',
                            array(
                                'default'           => '',
                                'type'              => 'theme_mod',
                                'sanitize_callback' => 'sanitize_textarea_field',
                                'capability'        => 'edit_theme_options',
                                'transport'         => 'refresh', // or postMessage
                            )
                        );
                        $wp_customize->add_control(
                            new WP_Customize_Control(
                                $wp_customize,
                                'serasur_contacto_horario_control',
                                array(
                                    'label'       => __( 'Horario', 'serasur' ),
                                    'description' => __( 'Horario de atención', 'serasur' ),
                                    'section'     => 'serasur_datos_contacto_section',
                                    'settings'    => 'serasur_contacto_horario_setting',
                                    'type'        => 'textarea',
                                    'priority'    =>  10 ,
                                )
                            )
                        );

                        //WhastApp
                        $wp_customize->add_setting(
                            'serasur_contacto_whatsapp_setting',
                            array(
                                'default'           => '',
                                'type'              => 'theme_mod',
                                'sanitize_callback' => 'sanitize_text_field',
                                'capability'        => 'edit_theme_options',
                                'transport'         => 'refresh', // or postMessage
                            )
                        );
                        $wp_customize->add_control(
                            new WP_Customize_Control(
                                $wp_customize,
                                'serasur_contacto_whatsapp_control',
                                array(
                                    'label'       => __( 'WhatsApp', 'serasur' ),
                                    'description' => __( 'Ingrese el número de teléfono completo en formato internacional. Ej. 521123456XXXX', 'serasur' ),
                                    'section'     => 'serasur_datos_contacto_section',
                                    'settings'    => 'serasur_contacto_whatsapp_setting',
                                    'type'        => 'text',
                                    'priority'    =>  10 ,
                                )
                            )
                        );

                        //Messaje personalizado WhatsApp
                        $wp_customize->add_setting(
                            'serasur_contacto_msj_wa_setting',
                            array(
                                'default'           => '',
                                'type'              => 'theme_mod',
                                'sanitize_callback' => 'sanitize_textarea_field',
                                'capability'        => 'edit_theme_options',
                                'transport'         => 'refresh', // or postMessage
                            )
                        );
                        $wp_customize->add_control(
                            new WP_Customize_Control(
                                $wp_customize,
                                'serasur_contacto_msj_wa_control',
                                array(
                                    'label'       => __( 'Mensaje personalizado de WhatsApp', 'serasur' ),
                                    'description' => __( 'Ingresa el texto del mensaje predeterminado para WhatsApp', 'serasur' ),
                                    'section'     => 'serasur_datos_contacto_section',
                                    'settings'    => 'serasur_contacto_msj_wa_setting',
                                    'type'        => 'textarea',
                                    'priority'    =>  10 ,
                                )
                            )
                        );

                        //Latitud
                        $wp_customize->add_setting(
                            'serasur_contacto_latitud_setting',
                            array(
                                'default'           => '',
                                'type'              => 'theme_mod',
                                'sanitize_callback' => 'sanitize_text_field',
                                'capability'        => 'edit_theme_options',
                                'transport'         => 'refresh', // or postMessage
                            )
                        );
                        $wp_customize->add_control(
                            new WP_Customize_Control(
                                $wp_customize,
                                'serasur_contacto_latitud_control',
                                array(
                                    'label'       => __( 'Latitud. Ubicación en el mapa de contacto', 'serasur' ),
                                    'description' => __( 'Ingrese la latidud para que aparesca en el mapa de contacto', 'serasur' ),
                                    'section'     => 'serasur_datos_contacto_section',
                                    'settings'    => 'serasur_contacto_latitud_setting',
                                    'type'        => 'text',
                                    'priority'    =>  10 ,
                                )
                            )
                        );
                       
                        //Longitud
                        $wp_customize->add_setting(
                            'serasur_contacto_longitud_setting',
                            array(
                                'default'           => '',
                                'type'              => 'theme_mod',
                                'sanitize_callback' => 'sanitize_text_field',
                                'capability'        => 'edit_theme_options',
                                'transport'         => 'refresh', // or postMessage
                            )
                        );
                        $wp_customize->add_control(
                            new WP_Customize_Control(
                                $wp_customize,
                                'serasur_contacto_longitud_control',
                                array(
                                    'label'       => __( 'Longitud. Ubicación en el mapa de contacto', 'serasur' ),
                                    'description' => __( 'Ingrese la longitud para que aparesca en el mapa de contacto', 'serasur' ),
                                    'section'     => 'serasur_datos_contacto_section',
                                    'settings'    => 'serasur_contacto_longitud_setting',
                                    'type'        => 'text',
                                    'priority'    =>  10 ,
                                )
                            )
                        );
                        
                        //Shortcode formulario de cotacto
                        $wp_customize->add_setting(
                            'serasur_contacto_contactform_shortcode_setting',
                            array(
                                'default'           => '',
                                'type'              => 'theme_mod',
                                'capability'        => 'edit_theme_options',
                                'transport'         => 'refresh', // or postMessage
                            )
                        );
                        $wp_customize->add_control(
                            new WP_Customize_Control(
                                $wp_customize,
                                'serasur_contacto_form_shortcode_control',
                                array(
                                    'label'       => __( 'Formulario de contacto', 'serasur' ),
                                    'description' => __( 'Ingrese el shortcode del formulario de contacto ej. [wpforms id="1"]', 'serasur' ),
                                    'section'     => 'serasur_datos_contacto_section',
                                    'settings'    => 'serasur_contacto_contactform_shortcode_setting',
                                    'type'        => 'text',
                                    'priority'    =>  10 ,
                                )
                            )
                        );

    /*------SECCIÓN DATOS DE REDES SOCIALES------ */
            $wp_customize->add_section(
                'serasur_rrss_section',
                array(
                    'title'       => __( 'Redes sociales', 'serasur' ),
                    'capability'  => 'edit_theme_options',
                    'description' => __( '', 'serasur' ),
                    'priority'    => 160,
                    'panel'       => 'serasur_theme_options',
                )
            );
            /*----------------SETTING Y CONROLES REDES SOCIALES----------------------- */
                        //Facebook
                        $wp_customize->add_setting(
                            'serasur_rrss_facebook_setting',
                            array(
                                'default'           => '',
                                'type'              => 'theme_mod',
                                'sanitize_callback' => 'sanitize_text_field',
                                'capability'        => 'edit_theme_options',
                                'transport'         => 'refresh', // or postMessage
                            )
                        );

                        $wp_customize->add_control(
                            new WP_Customize_Control(
                                $wp_customize,
                                'serasur_rrss_facebook_control',
                                array(
                                    'label'       => __( 'Facebook', 'serasur' ),
                                    'description' => __( 'Ingrese la URL de su cuenta en Facebook', 'serasur' ),
                                    'section'     => 'serasur_rrss_section',
                                    'settings'    => 'serasur_rrss_facebook_setting',
                                    'type'        => 'url',
                                    'priority'    =>  10 ,
                                    'active_callback' => 'is_front_page',
                                )
                            )
                        );

                        //Instagram
                        $wp_customize->add_setting(
                            'serasur_rrss_instagram_setting',
                            array(
                                'default'           => '',
                                'type'              => 'theme_mod',
                                'sanitize_callback' => 'sanitize_text_field',
                                'capability'        => 'edit_theme_options',
                                'transport'         => 'refresh', // or postMessage
                            )
                        );

                        $wp_customize->add_control(
                            new WP_Customize_Control(
                                $wp_customize,
                                'serasur_rrss_instagram_control',
                                array(
                                    'label'       => __( 'Instagram', 'serasur' ),
                                    'description' => __( 'Ingrese la URL de su cuenta en Instagram', 'serasur' ),
                                    'section'     => 'serasur_rrss_section',
                                    'settings'    => 'serasur_rrss_instagram_setting',
                                    'type'        => 'url',
                                    'priority'    =>  10 ,
                                    'active_callback' => 'is_front_page',
                                )
                            )
                        );

                        //Twitter
                        $wp_customize->add_setting(
                            'serasur_rrss_twitter_setting',
                            array(
                                'default'           => '',
                                'type'              => 'theme_mod',
                                'sanitize_callback' => 'sanitize_text_field',
                                'capability'        => 'edit_theme_options',
                                'transport'         => 'refresh', // or postMessage
                            )
                        );

                        $wp_customize->add_control(
                            new WP_Customize_Control(
                                $wp_customize,
                                'serasur_rrss_twitter_control',
                                array(
                                    'label'       => __( 'Twitter', 'serasur' ),
                                    'description' => __( 'Ingrese la URL de su cuenta en Twitter', 'serasur' ),
                                    'section'     => 'serasur_rrss_section',
                                    'settings'    => 'serasur_rrss_twitter_setting',
                                    'type'        => 'url',
                                    'priority'    =>  10 ,
                                    'active_callback' => 'is_front_page',
                                )
                            )
                        );

                        //Youtube
                        $wp_customize->add_setting(
                            'serasur_rrss_youtube_setting',
                            array(
                                'default'           => '',
                                'type'              => 'theme_mod',
                                'sanitize_callback' => 'sanitize_text_field',
                                'capability'        => 'edit_theme_options',
                                'transport'         => 'refresh', // or postMessage
                            )
                        );

                        $wp_customize->add_control(
                            new WP_Customize_Control(
                                $wp_customize,
                                'serasur_rrss_youtube_control',
                                array(
                                    'label'       => __( 'Youtube', 'serasur' ),
                                    'description' => __( 'Ingrese la URL de su cuenta en Youtube', 'serasur' ),
                                    'section'     => 'serasur_rrss_section',
                                    'settings'    => 'serasur_rrss_youtube_setting',
                                    'type'        => 'url',
                                    'priority'    =>  10 ,
                                    'active_callback' => 'is_front_page',
                                )
                            )
                        );
    
    /*------SECCIÓN PORTADAS------ */
            $wp_customize->add_section(
                'serasur_covers_section',
                array(
                    'title'       => __( 'Portadas', 'serasur' ),
                    'capability'  => 'edit_theme_options',
                    'description' => __( '', 'serasur' ),
                    'priority'    => 160,
                    'panel'       => 'serasur_theme_options',
                )
            );
            /*----------------SETTING Y CONROLES PORTADAS----------------------- */
                //Archivos
                $wp_customize->add_setting(
                    'serasur_cover_archivos_setting',
                    array(
                        'default'           => '',
                        'type'              => 'theme_mod',
                        'sanitize_callback' => 'ic_sanitize_image',
                        'capability'        => 'edit_theme_options',
                        'transport'         => 'refresh', // or postMessage
                    )
                );

                $wp_customize->add_control(
                    new WP_Customize_Image_Control(
                        $wp_customize,
                        'serasur_cover_archivos_control',
                        array(
                            'label'       => __( 'Archivos', 'serasur' ),
                            'description' => __( 'Ingrese la imagen de cover para la página de archivos', 'serasur' ),
                            'section'     => 'serasur_covers_section',
                            'settings'    => 'serasur_cover_archivos_setting',
                            'priority'    =>  10 ,
                            'active_callback' => 'is_front_page',
                        )
                    )
                );

                //Documentos
                $wp_customize->add_setting(
                    'serasur_cover_documentos_setting',
                    array(
                        'default'           => '',
                        'type'              => 'theme_mod',
                        'sanitize_callback' => 'ic_sanitize_image',
                        'capability'        => 'edit_theme_options',
                        'transport'         => 'refresh', // or postMessage
                    )
                );

                $wp_customize->add_control(
                    new WP_Customize_Image_Control(
                        $wp_customize,
                        'serasur_cover_documentos_control',
                        array(
                            'label'       => __( 'Documentos', 'serasur' ),
                            'description' => __( 'Ingrese la imagen de cover para la página de documentos', 'serasur' ),
                            'section'     => 'serasur_covers_section',
                            'settings'    => 'serasur_cover_documentos_setting',
                            'priority'    =>  10 ,
                            'active_callback' => 'is_front_page',
                        )
                    )
                );

                //Perfil de usuario
                $wp_customize->add_setting(
                    'serasur_cover_perfil_setting',
                    array(
                        'default'           => '',
                        'type'              => 'theme_mod',
                        'sanitize_callback' => 'ic_sanitize_image',
                        'capability'        => 'edit_theme_options',
                        'transport'         => 'refresh', // or postMessage
                    )
                );

                $wp_customize->add_control(
                    new WP_Customize_Image_Control(
                        $wp_customize,
                        'serasur_cover_perfil_control',
                        array(
                            'label'       => __( 'Perfil de usuario', 'serasur' ),
                            'description' => __( 'Ingrese la imagen de cover para la página de perfil de usuario', 'serasur' ),
                            'section'     => 'serasur_covers_section',
                            'settings'    => 'serasur_cover_perfil_setting',
                            'priority'    =>  10 ,
                            'active_callback' => 'is_front_page',
                        )
                    )
                );

                //Search
                $wp_customize->add_setting(
                    'serasur_cover_search_setting',
                    array(
                        'default'           => '',
                        'type'              => 'theme_mod',
                        'sanitize_callback' => 'ic_sanitize_image',
                        'capability'        => 'edit_theme_options',
                        'transport'         => 'refresh', // or postMessage
                    )
                );

                $wp_customize->add_control(
                    new WP_Customize_Image_Control(
                        $wp_customize,
                        'serasur_cover_search_control',
                        array(
                            'label'       => __( 'Página de busqueda', 'serasur' ),
                            'description' => __( 'Ingrese la imagen de cover para la página de busqueda', 'serasur' ),
                            'section'     => 'serasur_covers_section',
                            'settings'    => 'serasur_cover_search_setting',
                            'priority'    =>  10 ,
                            'active_callback' => 'is_front_page',
                        )
                    )
                );
		
 }
 add_action( 'customize_register', 'serasur_customize_register' );


 /**
 * Validation: image
 * Control: text, WP_Customize_Image_Control
 *
 * @uses    wp_check_filetype()        https://developer.wordpress.org/reference/functions/wp_check_filetype/
 * @uses    in_array()                http://php.net/manual/en/function.in-array.php
 */
function ic_sanitize_image( $file, $setting ) {
 
    $mimes = array(
        'jpg|jpeg|jpe' => 'image/jpeg',
        'gif'          => 'image/gif',
        'png'          => 'image/png',
        'bmp'          => 'image/bmp',
        'tif|tiff'     => 'image/tiff',
        'ico'          => 'image/x-icon'
    );
 
    //check file type from file name
    $file_ext = wp_check_filetype( $file, $mimes );
 
    //if file has a valid mime type return it, otherwise return default
    return ( $file_ext['ext'] ? $file : $setting->default );
}