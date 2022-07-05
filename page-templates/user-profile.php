<?php
/**
 * Template Name: SERASUR: Perfil de usuario
 *
 * Allow users to update their profiles from Frontend.
 *
 
*/
if(!is_user_logged_in()) {
    wp_redirect( home_url(), 302 );
    exit();
}
/* Get user info. */
global $current_user, $wp_roles;
//get_currentuserinfo(); //deprecated since 3.1

/* Load the registration file. */
//require_once( ABSPATH . WPINC . '/registration.php' ); //deprecated since 3.1
$error = array();    
/* If profile was saved, update profile. */
$mjsUpdate = '';
if ( 'GET' == $_SERVER['REQUEST_METHOD'] && $_GET['up'] == 'ok'  ) {
    $mjsUpdate = "Los datos se actualizarón corretamente";
}
if ( 'POST' == $_SERVER['REQUEST_METHOD'] && !empty( $_POST['action'] ) && $_POST['action'] == 'update-user' ) {

    /* Update user password. */
    if ( !empty($_POST['pass1'] ) && !empty( $_POST['pass2'] ) ) {
        if ( $_POST['pass1'] == $_POST['pass2'] )
            wp_update_user( array( 'ID' => $current_user->ID, 'user_pass' => esc_attr( $_POST['pass1'] ) ) );
        else
            $error[] = __('Las contraseñas no coinciden .  Tu contraseña no fue actualizada.', 'profile');
    }

    /* Update user information. */
    if ( !empty( $_POST['url'] ) )
        wp_update_user( array( 'ID' => $current_user->ID, 'user_url' => esc_url( $_POST['url'] ) ) );
    if ( !empty( $_POST['email'] ) &&  ($_POST['email'] != $current_user->user_email ) ){
        if (!is_email(esc_attr( $_POST['email'] )))
            $error[] = __('El correo electrónico no es valido,  por favor intenta de nuevo.', 'profile');
        elseif(email_exists(esc_attr( $_POST['email'] )) )
            $error[] = __('El correo electrónico esta siendo usado por otro usuario, intenta con uno diferente.', 'profile');
        else{
            wp_update_user( array ('ID' => $current_user->ID, 'user_email' => esc_attr( $_POST['email'] )));
        }
    }

    if ( !empty( $_POST['first-name'] ) )
        update_user_meta( $current_user->ID, 'first_name', esc_attr( $_POST['first-name'] ) );
    if ( !empty( $_POST['last-name'] ) )
        update_user_meta($current_user->ID, 'last_name', esc_attr( $_POST['last-name'] ) );
    if ( !empty( $_POST['description'] ) )
        update_user_meta( $current_user->ID, 'description', esc_attr( $_POST['description'] ) );

    /* Redirect so the page will show updated info.*/
  /*I am not Author of this Code- i dont know why but it worked for me after changing below line to if ( count($error) == 0 ){ */
    if ( count($error) == 0 ) {
        //action hook for plugins and extra fields saving
        do_action('edit_user_profile_update', $current_user->ID);
        wp_redirect( get_permalink().'?up=ok' );
        exit;
    }
}
?>
<?php get_header(); ?>

<div class="wrapper">

    <main>
  
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <div id="post-<?php the_ID(); ?>">
        <?php get_template_part( 'template-parts/hero-title', get_post_format() ); ?>


        

        <div class="entry-content entry bg-white shadow-lg my-10 py-5 max-w-content mx-auto px-5 lg:px-10">
        
            <?php the_content(); ?>
            <?php if ( !is_user_logged_in() ) : ?>
                    <p class="warning p-5 bg-yellow-600 text-white mb-4">
                        <?php _e('Deberias iniciar sesión para poder editar tu perfil.', 'profile'); ?>
                    </p><!-- .warning -->
            <?php else : ?>
                <?php if ( count($error) > 0 ) echo '<p class="error p-5 bg-red-500 text-white mb-4">' . implode("<br />", $error) . '</p>'; ?>
                <?php if(!empty($mjsUpdate)) echo '<p class="error p-5 bg-emerald-500 text-white mb-4">' . $mjsUpdate . '</p>'; ?>
                
                        
                <h2 class="text-4xl border-b border-gray-300 py-3 mb-10" >
                    <span class="text-gray-900">Perfil de</span> <?php echo $current_user->user_login; ?> 
                </h2>
                        
                
                <form method="post" id="adduser" action="<?php the_permalink(); ?>">
                    <p class="form-username text-lg lg:text-xl flex flex-col items-start  lg:flex-row lg:items-center gap-3">
                        <label class="lg:w-1/4  lg:text-right font-bold" for="first-name"><?php _e('Nombre', 'profile'); ?></label>
                        <input class="text-input w-full lg:w-3/4 rounded border py-1 px-2" name="first-name" type="text" id="first-name" value="<?php the_author_meta( 'first_name', $current_user->ID ); ?>" />
                    </p><!-- .form-username -->
                    <p class="form-last-name text-lg lg:text-xl flex flex-col items-start  lg:flex-row lg:items-center gap-3">
                        <label class="lg:w-1/4  lg:text-right font-bold" for="last-name"><?php _e('Apellido', 'profile'); ?></label>
                        <input class="text-input w-full lg:w-3/4 rounded border py-1 px-2" name="last-name" type="text" id="last-name" value="<?php the_author_meta( 'last_name', $current_user->ID ); ?>" />
                    </p><!-- .form-username -->
                    <p class="form-email text-lg lg:text-xl flex flex-col items-start  lg:flex-row lg:items-center gap-3">
                        <label class="lg:w-1/4  lg:text-right font-bold " for="email"><?php _e('Correo electrónico *', 'profile'); ?></label>
                        <input class="text-input w-full lg:w-3/4 rounded border py-1 px-2" name="email" type="text" id="email" value="<?php the_author_meta( 'user_email', $current_user->ID ); ?>" />
                    </p><!-- .form-email -->
                    <p class="form-url text-lg lg:text-xl flex flex-col items-start  lg:flex-row lg:items-center gap-3">
                        <label class="lg:w-1/4  lg:text-right font-bold " for="url"><?php _e('Página web', 'profile'); ?></label>
                        <input class="text-input w-full lg:w-3/4 rounded border py-1 px-2" name="url" type="text" id="url" value="<?php the_author_meta( 'user_url', $current_user->ID ); ?>" />
                    </p><!-- .form-url -->
                    <p class="form-password text-lg lg:text-xl flex flex-col items-start  lg:flex-row lg:items-center gap-3">
                        <label class="lg:w-1/4  lg:text-right font-bold " for="pass1"><?php _e('Contraseña *', 'profile'); ?> </label>
                        <input class="text-input w-full lg:w-3/4 rounded border py-1 px-2" name="pass1" type="password" id="pass1" />
                    </p><!-- .form-password -->
                    <p class="form-password text-lg lg:text-xl flex flex-col items-start  lg:flex-row lg:items-center gap-3">
                        <label class="lg:w-1/4  lg:text-right font-bold " for="pass2"><?php _e('Repetir contraseña *', 'profile'); ?></label>
                        <input class="text-input w-full lg:w-3/4 rounded border py-1 px-2" name="pass2" type="password" id="pass2" />
                    </p><!-- .form-password -->
                    <p class="form-textarea text-lg lg:text-xl flex flex-col items-start  lg:flex-row lg:items-center gap-3">
                        <label class="lg:w-1/4  lg:text-right font-bold " for="description"><?php _e('Información personal', 'profile') ?></label>
                        <textarea class="w-full lg:w-3/4 rounded border py-1 px-2" name="description" id="description" rows="3" cols="50"><?php the_author_meta( 'description', $current_user->ID ); ?></textarea>
                    </p><!-- .form-textarea -->

                    <?php 
                        //action hook for plugin and extra fields
                        do_action('edit_user_profile',$current_user); 
                    ?>
                    <p class="form-submit text-lg lg:text-xl flex  gap-3">
                        

                            <?php echo $referer; ?>
                            <input name="updateuser" type="submit" id="updateuser" class="py-3 px-6 text-white bg-primary ml-auto hover:cursor-pointer hover:bg-primary-dark hover:shadow" value="<?php _e('Actualizar información', 'profile'); ?>" />
                            <?php wp_nonce_field( 'update-user' ) ?>
                            <input name="action" type="hidden" id="action" value="update-user" />
                        
                    </p><!-- .form-submit -->
                </form><!-- #adduser -->
            <?php endif; ?>
            
        </div><!-- .entry-content -->
    </div><!-- .hentry .post -->
    <?php endwhile; ?>
    <?php else: ?>
        <p class="no-data">
            <?php _e('Sorry, no page matched your criteria.', 'profile'); ?>
        </p><!-- .no-data -->
        <?php endif; ?>
        </main>
   
</div>
<?php get_footer(); ?>