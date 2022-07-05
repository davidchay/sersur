<div class="my-10 md:my-20 grid  grid-cols-1 lg:grid-cols-5 gap-4">
                    <div class="lg:col-span-3 wow animate__animated animate__bounceInLeft">
                        <?php echo do_shortcode('[mapa-sucursales]');?>
                      
                        
                    </div>
                    <div class="grid  grid-cols-2 col-span lg:col-span-2 gap-4 wow animate__animated animate__bounceInRight">
                        <?php
                        $args = array(  
                            'post_type' => 'ubicaciones',
                            'post_status' => 'publish',
                            //'posts_per_page' => 5, 
                            'orderby' => 'menu_order', 
                            'order' => 'ASC', 
                        );
                        // The Query
                        $loop = new WP_Query( $args );
                
                        // The Loop
                        while ( $loop->have_posts() ) : $loop->the_post(); 
                        $bg_image = get_the_post_thumbnail_url(get_the_ID(),'full'); 
                        ?>
                            <div class="flip-ubicacion text-white">
                                <a href="#" class="openMapLeaft" data-latitude="<?php echo get_post_meta( get_the_ID(), 'serasur_ubicacion_latitud', true ); ?>" data-longitude="<?php echo get_post_meta( get_the_ID(), 'serasur_ubicacion_longitud', true ); ?>" >
                                    <div class="flip-ubicacion-inner">
                                        <div class="flip-ubicacion-front bg-gradient-to-br from-secondary to-secondary-dark">
                                            <?php if($bg_image): ?>
                                                <div class="absolute inset-0 z-0 opacity-10 bgImage" style="background-image:url('<?php echo $bg_image; ?>')"></div>
                                            <?php endif; ?>
        
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 mx-auto mb-2"  viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                            <line x1="5" y1="5" x2="5" y2="21" />
                                            <line x1="19" y1="5" x2="19" y2="14" />
                                            <path d="M5 5a5 5 0 0 1 7 0a5 5 0 0 0 7 0" />
                                            <path d="M5 14a5 5 0 0 1 7 0a5 5 0 0 0 7 0" />
                                            </svg>
                                            <h3 class="font-bold text-2xl font-title tracking-wide">
                                                <?php echo get_the_title(); ?> 
                                            </h3>
                                            <span class="text-sm">
                                                <?php echo get_post_meta( get_the_ID(), 'serasur_ubicacion_subtitulo', true ); ?>    
                                            </span>
                                        </div>
                                        <div class="flip-ubicacion-back bg-gradient-to-tr from-primary to-primary-dark">
                                            <div>
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 mx-auto my-2"  viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                <line x1="18" y1="6" x2="18" y2="6.01" />
                                                <path d="M18 13l-3.5 -5a4 4 0 1 1 7 0l-3.5 5" />
                                                <polyline points="10.5 4.75 9 4 3 7 3 20 9 17 15 20 21 17 21 15" />
                                                <line x1="9" y1="4" x2="9" y2="17" />
                                                <line x1="15" y1="15" x2="15" y2="20" />
                                                </svg>
                                                <p class="overflow-y-auto m-0 text-sm">
                                                    <?php echo get_post_meta( get_the_ID(), 'serasur_ubicacion_direccion', true ); ?>    
                                                </p>
                                            </div>
                                       
                                        </div><!-- flip-ubicacion-back -->
                                    </div><!-- flip-ubicacion-inner -->
                                </a>
                            </div>
                        <?php endwhile;
                        wp_reset_postdata();
                        ?>
                    </div><!-- grid -->    
            </div><!-- grid -->