<?php 

/**
 * function form_contact_inicio()
 * devuelve el formulario de contacto 
 */


 function form_contact_inicio() {
    $form_shortcode = get_theme_mod('serasur_contacto_contactform_shortcode_setting');
    echo do_shortcode( $form_shortcode );
 }


 function get_serasur_info($data) {
     $value='';
     switch($data){
        
        case 'telefono':
            $value = get_theme_mod('serasur_contacto_telefono_setting');
        break;

        case 'direccion':
            $value = get_theme_mod('serasur_contacto_direccion_setting');
        break;     

        case 'email':
            $value = get_theme_mod('serasur_contacto_email_setting');
        break;

        case 'horario':
            $value = get_theme_mod('serasur_contacto_horario_setting');
        break;

        case 'latitud':
            $value = get_theme_mod('serasur_contacto_latitud_setting');
        break;
        
        case 'longitud':
            $value = get_theme_mod('serasur_contacto_longitud_setting');
        break;

        case 'facebook':
            $value = get_theme_mod('serasur_rrss_facebook_setting');
        break;
        
        case 'instagram':
            $value = get_theme_mod('serasur_rrss_instagram_setting');
        break;

        case 'twitter':
            $value = get_theme_mod('serasur_rrss_twitter_setting');
        break;
        
        case 'youtube':
            $value = get_theme_mod('serasur_rrss_youtube_setting');
        break;

        case 'whatsapp':
            $value = get_theme_mod('serasur_contacto_whatsapp_setting');
        break;

        case 'whatsapp_msj':
            $value = get_theme_mod('serasur_contacto_msj_wa_setting');
        break;

        case 'descripcion':
            $value = get_theme_mod('serasur_general_descripcion_setting');
        break;


    }
    return $value;

 }