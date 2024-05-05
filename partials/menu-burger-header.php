<?php
wp_nav_menu(
    array(
        'theme_location' => 'main',
        'container' => 'ul', // Afin d'éviter d'avoir une div autour
        'menu_class' => 'site__header__menu', // class personnalisée
    )
);
?>