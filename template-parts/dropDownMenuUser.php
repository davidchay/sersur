<?php if ( is_user_logged_in() ) : 
    $current_user = wp_get_current_user();
?>
<div class="relative">


    <button @click="dropdownUser()" class="
        flex
        items-center
        justify-between
        font-medium 
        border border-white rounded-lg border-opacity-25 px-2 py-1 mr-2 hover:bg-white hover:bg-opacity-25
        ">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-1" viewBox="0 0 20 20" fill="currentColor">
        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd" />
    </svg>
    <span class="capitalize">

        <?php echo esc_html( $current_user->user_firstname ) ?></span> 
        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                </svg>
    </button>
    <!-- Dropdown menu -->
    <div x-show="dropDownUserOpen" @click.away="dropDownUserOpen=false" x-transition 
        class="z-40 
        absolute
        --bottom-16
        -md:-bottom-8
        -lg:-bottom-7
        bg-white 
        divide-y 
      divide-gray-100 
        rounded shadow w-44 ">
        <nav id="navUser" class="py-1 text-sm text-gray-400  " >
            <?php 
                $menuParameters = array(
                    'menu'		      => 'clientes',
                    'theme_location'  => 'clientes',
                    'container'       => false,
                    'echo'            => false,
                    'items_wrap'      => '%3$s',

                    'depth'           => 0,
                );
               echo strip_tags(wp_nav_menu( $menuParameters ), '<a>' );
            ?>
        </nav>
        <div class="py-1">
        <a href="<?php echo wp_logout_url(); ?>" class="flex justify-between items-center px-4 py-2 text-sm text-gray-400 hover:bg-gray-100 hover:text-gray-800">
            Salir
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
            </svg>
        </a>
        </div>
    </div>

</div><!--relative-->

<?php else: ?>
    <!-- boton usuario -inicio de sesión-->
    <a href="<?php echo codipix_get_url_login(); ?>" class="border border-white rounded-lg border-opacity-25 px-2 py-1 mr-2 hover:bg-white hover:bg-opacity-25 ">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
        </svg>
        Iniciar sesión
    </a>
<?php endif;?>