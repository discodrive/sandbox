<?php

namespace Basetheme\Images;

/**
 * Registers image sizes to be used across the site.
 */
if (!function_exists('\Basetheme\Images\sizes')) {
    function sizes(): void
    {
        // Use a human-readable representation of the image size
        // e.g '300x200', as opposed to words like 'thumb-small' or 'hero'.
        // add_image_size($name, $width, $height, ['center', 'center']);
    }
    add_action('after_setup_theme', '\Basetheme\Images\sizes');
}

/**
 * Reduces the file size of images uploaded
 * to the media library
 * @return integer
 */
if (!function_exists('\Basetheme\Images\quality')) {
    function quality(): int
    {
        return 70;
    }
    add_action('jpeg_quality', '\Basetheme\Images\quality');
}
