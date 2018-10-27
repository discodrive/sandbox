<?php

namespace Basetheme\Menus;

/**
 * Registers navigation menus
 */
if (!function_exists('\Basetheme\Menus\register')) {
    function register(): void
    {
        register_nav_menus([
            'header-menu' => 'Header Menu',
            'footer-menu' => 'Footer Menu'
        ]);
    }
    add_action('init', '\Basetheme\Menus\register');
}
