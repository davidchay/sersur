<div class="my-20  grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 ">
            <?php 
            $ppp =  cmb2_get_option( 'config-servicios', 'serasur_servicios_cuantos_inicio' ) ;
            if(!$ppp) $ppp=6;
            $args = array(  
                'post_type' => 'servicios',
                'post_status' => 'publish',
                'posts_per_page' => $ppp, 
                'orderby' => 'menu_order', 
                'order' => 'ASC', 
                'meta_key' => 'serasur_inicio_servicio',
            );
        
            
            $loop = new WP_Query( $args ); 
                
            while ( $loop->have_posts() ) : $loop->the_post(); 
                $icono  = get_post_meta( get_the_ID(), 'serasur_icono', true );
                $page_url = get_post_meta( get_the_ID(), 'serasur_page_url', true );
               
            ?>
             <div class="service-card wow animate__animated animate__bounceIn">
                    <div class="service-card_overlay"></div>
                    <div class="service-card_content">
                        <div class="service-card_content-icon">
                            <?php echo get_icon_svg ( $icono ); ?>  
                            
                        </div>
                        <h3 class="font-title text-xl font-bold text-secondary my-5">
                            <?php print the_title(); ?>
                        </h3>
                        
                        <?php the_content(); ?>
                        <?php if($page_url): ?>
                            
                            <a href="<?php echo get_permalink( $page_url) ?>" class="service-card_content-button">
                                Saber más
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </a>
                        <?php endif;?>


                    </div>
                </div><!-- service-card -->
               
                
                
                 
           <?php endwhile;
        
            wp_reset_postdata(); 
                    ?>   
                
            </div><!-- grid -->