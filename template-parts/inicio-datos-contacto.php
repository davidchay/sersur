<div class="relative bg-white rounded-lg p-4 border border-gray-100 flex items-start shadow-lg hover:shadow-xl wow animate__animated animate__bounceInLeft">
    <div class="icon text-white p-1 bg-primary rounded-full mr-2 flex-0">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
        <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
        </svg>
    </div>
    <div class="">
        <h3 class="font-title text-2xl font-bold tracking-wide">Dirección</h3>
        <p class="text-gray-700">
        <?php echo get_serasur_info('direccion'); ?>
        </p>
    </div>
    
</div>
<div class="relative bg-white rounded-lg p-4 border border-gray-100 flex items-start shadow-lg hover:shadow-xl wow animate__animated animate__bounceInUp">
    <div class="icon text-white p-1 bg-primary rounded-full mr-2 flex-0">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
    <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />
    </svg>
    </div>
    <div class="">
        <h3 class="font-title text-2xl font-bold tracking-wide">Teléfono</h3>
        <p class="text-gray-700">
        <?php echo get_serasur_info('telefono'); ?>
        </p>
    </div>
    <?php if(get_serasur_info('telefono')): ?>
    <a class="absolute inset-0" href="tel:<?php echo get_serasur_info('telefono'); ?>" target="_blank" rel="nofollow"></a>
    <?php endif; ?>
</div>
<div class="relative bg-white rounded-lg p-4 border border-gray-100 flex items-start shadow-lg hover:shadow-xl wow animate__animated animate__bounceInDown">
    <div class="icon text-white p-1 bg-primary rounded-full mr-2 flex-0">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
        <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
        <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
        </svg>
    </div>
    <div class="">
        <h3 class="font-title text-2xl font-bold tracking-wide">Email</h3>
        <p class="text-gray-700">
        <?php echo get_serasur_info('email'); ?>
        </p>
    </div>
    <?php if(get_serasur_info('email')): ?>
    <a class="absolute inset-0" href="mailto:<?php echo get_serasur_info('email'); ?>" target="_blank"  rel="nofollow"></a>
    <?php endif; ?>
</div>
<div class="relative bg-white rounded-lg p-4 border border-gray-100 flex items-start shadow-lg hover:shadow-xl wow animate__animated animate__bounceInRight">
    <div class="icon text-white p-1 bg-primary rounded-full mr-2 flex-0">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd" />
        </svg>
    </div>
    <div class="">
        <h3 class="font-title text-2xl font-bold tracking-wide">Horario</h3>
        <p class="text-gray-700 text-sm">
        <?php echo get_serasur_info('horario'); ?> 
        </p>
    </div>
    <!-- <a class="absolute inset-0" href="#" target="_blank" rel="nofollow"></a>  -->
</div>