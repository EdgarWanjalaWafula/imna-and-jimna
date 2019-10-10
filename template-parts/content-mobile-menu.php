<?php

// Custom mobile menu for Imna and Jimna. 
?>

<div class="mobile-menu">
    <?php   
        wp_nav_menu([
            'menu'            => 'menu-4',
            'theme_location'  => 'menu-4',
            'container'       => 'div',
            'container_id'    => false,
            'container_class' => 'mobile',
            'menu_id'         => false,
            'menu_class'      => 'navbar-nav animated fadeIn slow',
            'depth'           => 2,
            'fallback_cb'     => 'bs4navwalker::fallback',
            'walker'          => new bs4navwalker()
        ]);
    ?>
</div>