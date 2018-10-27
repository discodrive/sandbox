<?php

namespace Basetheme\Enqueues;

if (!function_exists('\Basetheme\Enqueues\stylesheets')) {
    /**
     * Enqueues stylesheets
     */
    function stylesheets(): void
    {
        $filePath = 'assets/css/main.css';
        wp_enqueue_style('basetheme', CHILDTHEME_URL . $filePath, [], lastModifiedTime($filePath));
    }
    add_action('wp_enqueue_scripts', '\Basetheme\Enqueues\stylesheets');
}

if (!function_exists('\Basetheme\Enqueues\javascript')) {
    /**
     * Enqueues JavaScript
     */
    function javascript(): void
    {
        // Deregister jQuery and reregister it via a CDN into the footer
        wp_deregister_script('jquery');
        wp_enqueue_script('jquery', '//code.jquery.com/jquery-3.2.1.min.js', [], '3.2.1', true);

        // Enqueue the compressed concatenated file. Use the Gulp script to create it.
        wp_enqueue_script('basetheme', CHILDTHEME_URL . 'assets/js/all.js', ['jquery'], '1.0.0', true);
    }
    add_action('wp_enqueue_scripts', '\Basetheme\Enqueues\javascript');
}
