<?php

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;


/**
 * Add a sidebar.
 */
function wpdocs_theme_codipix_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Sidebar Blog', 'codipix' ),
        'id'            => 'sidebar-blog',
        'description'   => __( 'Coloque en esta area los widgets que desea mostrar en el blog y publicaciones .', 'codipix' ),
        'before_widget' => '<div id="%1$s" class="widget py-6 px-5 mb-6 bg-white border-t-8 border-secondary shadow-lg %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widgettitle font-bold text-2xl font-title mb-4">',
        'after_title'   => '</h3>',
    ) );
}
add_action( 'widgets_init', 'wpdocs_theme_codipix_widgets_init' );