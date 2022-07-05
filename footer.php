


<?php do_action( 'tailpress_content_end' ); ?>

</div>

<?php do_action( 'tailpress_content_after' ); ?>

<footer id="colophon" class="site-footer bg-gray-50 " role="contentinfo">

	<?php do_action( 'tailpress_footer' ); ?>

	<div class="bg-secondary">
		<div class="container py-10 text-white grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10">
			<div class="">
				<div class="logo-fotter">
					<?php if ( has_custom_logo() ) { ?>
								<a class="custom-logo serasur-logo" href="<?php echo get_bloginfo( 'url' ); ?>" rel="home" aria-current="page">
									<img class="w-32 md:w-44 lg:w-48" src="<?php echo esc_url( wp_get_attachment_url( get_theme_mod( 'custom_logo' ) ) ); ?>" alt="<?php echo get_bloginfo( 'name' ); ?>">
								</a>
							<?php } else { ?>
								<div class="">
									<a href="<?php echo get_bloginfo( 'url' ); ?>" class="font-bold font-title text-4xl uppercase">
										<?php echo get_bloginfo( 'name' ); ?>
									</a>
								</div>
	
								<p class="text-lg font-light ">
									<?php echo get_bloginfo( 'description' ); ?>
								</p>
	
					<?php } ?>

				</div><!--logo fotter-->
				<div class="custom-description mt-5">
					
					<?php echo get_serasur_info('descripcion'); ?>
				</div>
				<div class="social-fotter my-5">
					<?php 
						set_query_var( 'is_footer', true );
						get_template_part( 'template-parts/social-icons', get_post_format() ); 
					?>
				</div>
			</div>
			<div class="">
				<h3 class="font-bold uppercase text-2xl tracking-wider ">Servicios</h3>
				<nav>
				<?php 
					wp_nav_menu(  array(
						'theme_location'  => 'clientes',
						'menu'            => 'clientes',
						'container'       => 'div',
						'container_class' => 'my-5',
						'a_class'			=> 'block py-1 text-sm text-gray-300 hover:text-white hover:ml-2 transition-all ease-in-out delay-150 ',
						'link_after'      => ' &rhard;',
						'depth'           => 0,
						
					) );
				?>
				</nav>
			</div>
			<div class="">
				<h3 class="font-bold uppercase text-2xl tracking-wider ">Empresa</h3>
				<nav>
				<?php 
					wp_nav_menu(  array(
						'theme_location'  => 'clientes',
						'menu'            => 'clientes',
						'container'       => 'div',
						'container_class' => 'my-5',
						'a_class'			=> 'block py-1 text-sm text-gray-300 hover:text-white hover:ml-2 transition-all ease-in-out delay-150',
						'link_after'      => ' &rhard;',
						'depth'           => 0,
						
					) );
				?>	
				</nav>	
			</div>
			<div class="">
				<h3 class="font-bold uppercase text-2xl tracking-wider ">Contácto</h3>

				<ul class="my-5">
					<!-- Dirección -->
					<?php if(get_serasur_info('direccion')): ?>
					<li>
						<div class=" flex  items-start justify-center text-gray-300 py-1 ">
						<!-- <div class="flex items-center justify-start flex-wrap w-full block py-1  text-gray-300 "> -->
							<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2 flex-none inline-block" viewBox="0 0 20 20" fill="currentColor">
								<path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
							</svg>
							<span>
								<?php echo get_serasur_info('direccion'); ?>
							</span>
						</div>
					</li>
					<?php endif; ?>
					<!-- email -->
					<?php if(get_serasur_info('email')): ?>
					<li>
						<a href="mailto:<?php echo get_serasur_info('email'); ?>" target="_blank" class="flex flex-wrap items-center justify-start w-full  py-1  text-gray-300 hover:text-white transition-all ease-in-out delay-150">
							<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 inline-block " viewBox="0 0 20 20" fill="currentColor">
							<path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
							<path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
							</svg>
							<span>
							<?php echo get_serasur_info('email'); ?>
							</span>
						</a>
					</li>
					<?php endif; ?>
					<!-- Teléfono oficina -->
					<?php if(get_serasur_info('telefono')): ?>
					<li>
						<a href="tel:<?php echo get_serasur_info('telefono'); ?>" class="flex flex-wrap items-center justify-start w-full py-1  text-gray-300 hover:text-white transition-all ease-in-out delay-150">
							<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 inline-block" viewBox="0 0 20 20" fill="currentColor">
							<path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />
							</svg>
							<?php echo get_serasur_info('telefono'); ?>
						</a>
					</li>
					<?php endif; ?>
					<!-- WhatsApp -->
					<?php if(get_serasur_info('whatsapp')): ?>
					<li>
						<a href="https://wa.me/<?php echo get_serasur_info('whatsapp'); ?>?text=<?php echo get_serasur_info('whatsapp_msj'); ?>" target="_blank" class="flex flex-wrap items-center justify-start w-full  py-1  text-gray-300 hover:text-white transition-all ease-in-out delay-150">
							<svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mr-2"  viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
							<path stroke="none" d="M0 0h24v24H0z" fill="none"/>
							<path d="M3 21l1.65 -3.8a9 9 0 1 1 3.4 2.9l-5.05 .9" />
							<path d="M9 10a0.5 .5 0 0 0 1 0v-1a0.5 .5 0 0 0 -1 0v1a5 5 0 0 0 5 5h1a0.5 .5 0 0 0 0 -1h-1a0.5 .5 0 0 0 0 1" />
							</svg>
							<?php echo get_serasur_info('whatsapp'); ?>
						</a>
					</li>
					<?php endif; ?>
					
					<?php if(get_serasur_info('horario')): ?>
					<!-- Horario -->
					<li>
					<div class=" flex  items-start justify-center text-gray-300 py-1 ">
						<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2 flex-none inline-block" viewBox="0 0 20 20" fill="currentColor">
						<path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd" />
						</svg>
						<span class=" ">
						<?php echo get_serasur_info('horario'); ?>
						</span>
							
					</div>
					</li>
					<?php endif; ?>
				</ul>

			</div>
		</div>
	</div>
	
	<div class="bg-secondary-dark  py-4">
		<div class="container grid grid-cols-1  lg:grid-cols-2   text-center text-white">
			<span class="text-center lg:text-left">
				&copy; <?php echo date_i18n( 'Y' );?> - <?php echo get_bloginfo( 'name' ).'&nbsp;'. get_bloginfo( 'description' );?>
			</span>
			<p class="text-center lg:text-right">
				Creado con <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-600 inline-block" viewBox="0 0 20 20" fill="currentColor">
				<path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd" />
				</svg> por <a href="https://codipix.com" target="_blank" rel="nofollow">codipix</a>
			</p>
		</div>
	</div>
</footer>

</div>

<?php wp_footer(); ?>

</body>
</html>
