<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<!-- <meta name="viewport" content="initial-scale=1, user-scalable=no, width=device-width" /> -->
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_head(); ?>
</head>

<body  <?php body_class( 'overflow-x-hidden text-gray-900 antialiased ' ); ?>>
	<?php do_action( 'tailpress_site_before' ); ?>
	<!-- <div id="loader-screen" class="bg-white fixed inset-0 z-50 w-screen h-screen flex justify-center items-center">
		<div class="spinner ">
			<div class="bounce1 bg-primary"></div>
			<div class="bounce2 bg-gradient-to-r from-primary to-secondary "></div>
			<div class="bounce3 bg-secondary"></div>
		</div>
	</div> -->

<div id="page" class="min-h-screen flex flex-col relative">

	<?php do_action( 'tailpress_header' ); ?>
	<!-- Header del sitio web -->
	<header x-data="header()" @resize.window="resize()"  class="bg-white relative " >
		<!-- TOPBAR -->
		<div class="  bg-secondary  py-1 lg:py-3 ">
			<div class="container mx-auto flex justify-between items-center text-white">
				<div class="lg:divide-x lg:divide-white lg:divide-opacity-25 w-full flex items-center justify-between lg:w-auto lg:justify-start">
					<!-- DropdownMenuUser -->
					<?php get_template_part( 'template-parts/dropDownMenuUser', get_post_format() ); ?>
					<!-- traduccion -->
					
					<span class="lg:pl-2 z-30 lg:z-40">
						<?php echo do_shortcode( '[language-switcher]' );?>
					</span>
				</div>
				<!-- Iconos sociales -->
				<div class="hidden lg:flex lg:justify-between lg:items-center">
					<?php get_template_part( 'template-parts/social-icons', get_post_format() ); ?>
				</div>
			</div>
		</div><!-- END TOPBAR -->
		<!--  LOGO Y MENU DE NAVEGACIÓN -->
		<div id="navBar-block" class="absolute w-full bg-white/40 box-shadow-2xl z-30" >
			<div  class="container lg:flex lg:justify-between lg:items-center py-2  
			relative h-auto  ">
				<div id="navBar" class="flex justify-between items-center h-auto w-full">
					<div class="logo">
						<?php if ( has_custom_logo() ) { ?>
							<a class="custom-logo serasur-logo" href="<?php echo get_bloginfo( 'url' ); ?>" rel="home" aria-current="page">
								<img class="w-32 md:w-44 lg:w-48" src="<?php echo esc_url( wp_get_attachment_url( get_theme_mod( 'custom_logo' ) ) ); ?>" alt="<?php echo get_bloginfo( 'name' ); ?>">
							</a>
						<?php } else { ?>
							<div class="">
								<a href="<?php echo get_bloginfo( 'url' ); ?>" class="font-bold text-white font-title text-2xl uppercase">
									<?php echo get_bloginfo( 'name' ); ?>
								</a>
							</div>

							<p class="text-lg text-gray-200 font-light ">
								<?php echo get_bloginfo( 'description' ); ?>
							</p>

						<?php } ?>
					</div><!-- ./logo -->

					<!-- iconos navegacion -->
					<div class="lg:flex lg:flex-row-reverse"> 
						<div class="flex  items-center">
							
							
							<!-- boton buscar -->
							<a href="#" @click="searchBar()" class="mr-4 lg:m-0 text-white">
								<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
								<path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
								</svg>
							</a>
							
							<!-- botón cerrar menu: sm -->
						
							<a id="menuToggle" href="#" class="lg:hidden" aria-label="Toggle navigation" @click="menu()" >
								<svg viewBox="0 0 20 20" class="inline-block w-6 h-6 text-white" version="1.1"
									xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
									<g stroke="none" stroke-width="1" fill="currentColor" fill-rule="evenodd">
										<g id="icon-shape">
											<path d="M0,3 L20,3 L20,5 L0,5 L0,3 Z M0,9 L20,9 L20,11 L0,11 L0,9 Z M0,15 L20,15 L20,17 L0,17 L0,15 Z"
												id="Combined-Shape"></path>
										</g>
									</g>
								</svg>
							</a><!-- botón menu: sm  --> 
						</div> <!-- iconos  -->

				

						<!-- Menu de navegacion -->
						<div id="primary-menu" x-show="menuOpen" @click.away="hiddenMenu()" x-transition class="fixed  inset-y-0 right-0 flex  shadow-2xl lg:shadow-none lg:relative lg:flex lg:mt-0 lg:right-auto">
							<div class="w-screen z-50 max-w-sm lg:max-w-none	lg:w-auto">
								<div class="flex flex-col h-full divide-y divide-gray-200 bg-gray-50 lg:h-auto lg:divide-none lg:bg-transparent ">	
									<div  class="overflow-y-scroll lg:overflow-auto">
										<header class="flex items-center justify-between h-16 pl-6 lg:hidden">
											<span class="text-sm font-title font-bold tracking-widest uppercase">
												Menú
											</span>
											<button	aria-label="Close menu"	class="w-16 h-16 border-l border-gray-200"	type="button" @click="menu" >
												<svg xmlns="http://www.w3.org/2000/svg"class="w-6 h-6 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor" >
													<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"	/>
												</svg>
											</button>
										</header>
								
										<?php
											$class="flex flex-col lg:flex-row text-sm font-medium text-gray-500 lg:text-white border-t border-b lg:border-none lg:divide-none border-gray-200 divide-y divide-gray-200";
											wp_nav_menu(
												array(
													'container' => false,
													'menu_id'		=> 'primary-menu',
													'menu_class'      => $class,
													'theme_location'  => 'primary',
													'li_class'        => 'px-6 py-3 lg:mr-5 lg:p-0  font-semibold uppercase',
													'fallback_cb'     => false,
													)
											);
										?>
							
										<!-- iconos de redes sociales -->	
										<div class="lg:hidden">
																
											<!-- Iconos sociales -->
											<?php get_template_part( 'template-parts/social-icons', get_post_format() ); ?>
											
										</div><!-- iconos redes sociales -->
									</div> <!-- contenedor overflow del menu sm -->
								</div> <!-- flex flex-cols -->
							</div><!-- w-screen --> 
						</div><!-- Primary menu -->
					</div><!-- contenedor de iconos y navegacion -->
				
				</div><!-- Alineacion del logo y barra de navgacion -->
			</div><!-- Finaliza: LOGO Y MENUY DE NAVEGACIÓN -->
		</div><!-- contenedor -->
		
		<div id="search-bar"
			
			x-show="searchOpen" 
			@keydown.escape="searchOpen=false" 
			x-transition 
			class="header_search_container bg-white -opacity-90 z-30 absolute w-full drop-shadow-2xl" 
			>
			<div class="header_search_content mx-auto container flex items-center px-2 ">
				<form method="get" class="header_search_form flex flex-row w-full items-center py-2 relative" action="<?php echo home_url('/'); ?>">
					<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 absolute left-2 text-gray-600 " fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
  						<path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
					</svg>						
					<input type="text" name="s" class="search_input border-2 border-secondary bg-white py-3 px-10 text-lg rounded-lg w-full" placeholder="Buscar..." value="<?php the_search_query(); ?>">
					<button class="header_search_button flex flex-col items-center justify-center absolute right-6">
						<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400 "  viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
							<path stroke="none" d="M0 0h24v24H0z" fill="none"/>
							<path d="M18 6v6a3 3 0 0 1 -3 3h-10l4 -4m0 8l-4 -4" />
						</svg>
					</button>
					<button type="button" @click="searchBar()"  id="close_search_header" class=" right-1  absolute " >
						<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 " viewBox="0 0 20 20" fill="currentColor">
							<path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
						</svg>
					</button>
				</form>
			</div>
		</div><!-- header_search_container -->
	</header>



	<div id="content" class="site-content flex-grow">

		

		<?php do_action( 'tailpress_content_start' ); ?>



		
