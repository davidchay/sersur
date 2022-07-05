<?php
/**
 * 
 * Estas funciones ayudan a optener los iconos personalizados de la parpeta /images/icons
 * 
 */

 $iconNames = array(
    'almacen', 
    'almacen-1',
    'apreton-de-manos',
    'buscar',
    'caja',
    'caja-1',
    'camion',
    'documentos',
    'entrega',
    'ftp',
    'ftp-1',
    'maquina-elevadora',
    'monitor',
    'oficial',
    'oficial-2',
    'portapapeles',
    'portapapeles-1',
    'servicio-al-cliente',
    'soporte-tecnico',
    'soporte-tecnico-1',
    'check',
    'content-management-system',
    'dashboard',
    'data-complexity',
    'e-business',
    'immunity',
    'monitoring',
    'system',
);
 
function get_url_icon_image($image){
    global $iconNames;
    if ( in_array( $image, $iconNames ) ){
        return get_template_directory_uri() . '/images/icons/png/' . $image .'.png';
    }
    return '';
}

function get_url_icon_svg($image){
    global $iconNames;
    if ( in_array( $image, $iconNames ) ){
        return get_template_directory_uri() . '/images/icons/svg/' . $image .'.svg';
    }
    return '';
}

function get_icon_svg( $image ) {
    if(!is_admin()) {
        global $iconNames;
        if ( in_array( $image, $iconNames ) ){
            $url = get_template_directory_uri() . '/images/icons/svg/' . $image .'.svg';
            return file_get_contents($url);
        }
    }
    return '';
}

function get_icon_array_images_names(){
    global $iconNames;
    $array = [];
    foreach ($iconNames as $value) {
        
        $array[$value] = __(ucfirst(str_replace('-',' ',$value)),'codipix');
    }
   return $array;
} 

function get_icon_array_images_uri($size='full'){
    global $iconNames;
    $array = [];
    foreach ($iconNames as $value) {
        if($size=='full'){
            $array[$value] = 'images/icons/png/' . $value .'.png';

        }elseif($size=='tiny'){
            $array[$value] = 'images/icons/png/tiny/' . $value .'.png';
        }
    }
  
   return $array;
} 