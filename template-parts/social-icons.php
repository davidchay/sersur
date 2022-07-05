<?php 
$is_footer = get_query_var( 'is_footer' );
$classBtn = "p-2 hover:scale-125 duration-200 ease-in-out";

?>
<div class="w-auto flex flex-col lg:flex-row <?php echo ($is_footer) ? 'justify-start':'justify-around items-center'; ?>  divide-x divide-white divide-opacity-25">
    <? if(!$is_footer):?>
        <div>
        <?php if(get_serasur_info('telefono')): ?>    
        <span class="block tracking-widest uppercase text-center text-gray-400 mt-6 lg:hidden">
            Llámanos
        </span>
        <div class="flex justify-around items-center">
            <a href="tel:<?php echo get_serasur_info('telefono'); ?>" class="p-2 ">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />
                </svg>
                <span class="lg:text-sm">
                    <?php echo get_serasur_info('telefono'); ?>
                </span>
            </a>
        </div>
        <?php endif; ?>
    </div>
    <?php endif; ?>
    <div>
        <? if(!$is_footer):?>
        <span class="block tracking-widest uppercase text-center text-gray-400 mt-6 lg:hidden">
            Siguenos en redes sociales
        </span>
        <?php endif; ?>
        <div class="flex  <?php echo ($is_footer) ? 'justify-start':'justify-around items-center'; ?>">
            <!-- Icono de WhatsApp -->
            <?php if(get_serasur_info('whatsapp')): ?>
            <!-- <a href="#" class="p-3 rounded-full bg-gradient-to-r from-blue-900 to-blue-600 text-white"> -->
            <a href="https://wa.me/<?php echo get_serasur_info('whatsapp'); ?>?text=<?php echo get_serasur_info('whatsapp_msj'); ?>" target="_blank" rel="nofollow" class="<?php echo $classBtn;  ?> ">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 inline-block" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <path d="M3 21l1.65 -3.8a9 9 0 1 1 3.4 2.9l-5.05 .9" />
                    <path d="M9 10a0.5 .5 0 0 0 1 0v-1a0.5 .5 0 0 0 -1 0v1a5 5 0 0 0 5 5h1a0.5 .5 0 0 0 0 -1h-1a0.5 .5 0 0 0 0 1" />
                </svg>
            </a>
            <?php endif; ?>
            <!-- Icono de facebook -->
            <!-- <a href="#" class="p-3 rounded-full bg-gradient-to-r from-blue-900 to-blue-600 text-white"> -->
            <?php if(get_serasur_info('facebook')): ?>
            <a href="<?php echo get_serasur_info('facebook'); ?>" target="_blank"  class="<?php echo $classBtn;  ?> ">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 inline-block" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <path d="M7 10v4h3v7h4v-7h3l1 -4h-4v-2a1 1 0 0 1 1 -1h3v-4h-3a5 5 0 0 0 -5 5v2h-3" />
                </svg>
                
            </a>
            <?php endif; ?>
            <!-- icono de instagram -->
            <!-- <a href="" class="p-3 rounded-full bg-gradient-to-r from-fuchsia-800 to-rose-500 text-white "> -->
            <?php if(get_serasur_info('instagram')): ?>
            <a href="<?php echo get_serasur_info('instagram') ?>" target="_blank" class="<?php echo $classBtn;  ?>2">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6"  viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                <rect x="4" y="4" width="16" height="16" rx="4" />
                <circle cx="12" cy="12" r="3" />
                <line x1="16.5" y1="7.5" x2="16.5" y2="7.501" />
                </svg>
            </a>
            <?php endif; ?>
            <!-- icono de twitter -->
            <!-- <a href="" class="p-3 rounded-full bg-gradient-to-r from-blue-500 to-blue-300 text-white"> -->
            <?php if(get_serasur_info('twitter')): ?>
            <a href="<?php echo get_serasur_info('twitter'); ?>" target="_blank" class="<?php echo $classBtn;  ?>">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                <path d="M22 4.01c-1 .49 -1.98 .689 -3 .99c-1.121 -1.265 -2.783 -1.335 -4.38 -.737s-2.643 2.06 -2.62 3.737v1c-3.245 .083 -6.135 -1.395 -8 -4c0 0 -4.182 7.433 4 11c-1.872 1.247 -3.739 2.088 -6 2c3.308 1.803 6.913 2.423 10.034 1.517c3.58 -1.04 6.522 -3.723 7.651 -7.742a13.84 13.84 0 0 0 .497 -3.753c-.002 -.249 1.51 -2.772 1.818 -4.013z" />
                </svg>
            </a>
            <?php endif; ?>
            <!-- icono de youtube -->
            <!-- <a href="" class="p-3 rounded-full bg-gradient-to-r from-red-700 to-red-400 text-white"> -->
            <?php if(get_serasur_info('youtube')): ?>
            <a href="<?php echo get_serasur_info('youtube'); ?>" target="_blank" class="<?php echo $classBtn;  ?>">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                <rect x="3" y="5" width="18" height="14" rx="4" />
                <path d="M10 9l5 3l-5 3z" />
                </svg>
            </a>
            <?php endif; ?>
        </div>
    </div>
</div><!--divide-->