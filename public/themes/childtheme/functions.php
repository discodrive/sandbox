<?php

if (!defined('THEME_PATH')) {
    define('THEME_PATH', get_stylesheet_directory() . '/');
}

if (!defined('THEME_URL')) {
    define('THEME_URL', get_template_directory_uri(). '/');
}

if (!defined('BASETHEME_PATH')) {
    define('BASETHEME_PATH', get_theme_root() . '/basetheme/');
}

if (!defined('BASETHEME_URL')) {
    define('BASETHEME_URL', get_theme_root_uri() . '/basetheme/');
}

if (!defined('CHILDTHEME_PATH')) {
    define('CHILDTHEME_PATH', get_theme_root() . '/childtheme/');
}

if (!defined('CHILDTHEME_URL')) {
    define('CHILDTHEME_URL', get_theme_root_uri() . '/childtheme/');
}

if (file_exists(CHILDTHEME_PATH . '/autoload.php')) {
    require CHILDTHEME_PATH . '/autoload.php';
}