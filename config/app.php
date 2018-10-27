<?php

global $table_prefix;

/**
 * Load all environment variables for the .env.
 */
if (class_exists('Dotenv\Dotenv') && file_exists(ROOT_PATH . '.env')) {
    $dotenv = new Dotenv\Dotenv(ROOT_PATH);
    $dotenv->load();
    $dotenv->required(['DB_URL', 'WP_HOME', 'WP_SITEURL']);

    if (getenv('ENVIRONMENT') === 'testing') {
        $dotenv->required(['DB_TESTS_URL']);
        putenv('DB_URL='.getenv('DB_TESTS_URL'));
    }
}

/**
 * Define the environment.
 * If no evironment env is set fallback to production.
 */
define('ENVIRONMENT', getenv('ENVIRONMENT') ?: 'production');

/**
 * URLs.
 */
define('WP_HOME',    rtrim(getenv('WP_HOME'), '/'));
define('WP_SITEURL', rtrim(getenv('WP_SITEURL'), '/'));

/**
 * Custom content directory.
 */
define('WP_CONTENT_DIR', rtrim(PUBLIC_PATH, '/'));
define('WP_CONTENT_URL', WP_HOME);

/**
 * Custom plugin directory.
 */
define('WP_PLUGIN_DIR', PUBLIC_PATH . 'plugins');
define('WP_PLUGIN_URL', WP_HOME . '/plugins');

/**
 * Custom mu plugin directory.
 */
define('WPMU_PLUGIN_DIR', PUBLIC_PATH . 'mu-plugins');
define('WPMU_PLUGIN_URL', WP_HOME . 'mu-plugins');

define('THEMES_PATH', WP_CONTENT_DIR . '/themes/');
define('THEMES_URL',  WP_CONTENT_URL . '/themes/');

/**
 * Amazon Web Service keys for S3 etc.
 */
define('AWS_ACCESS_KEY_ID',     getenv('AWS_ACCESS_KEY_ID'));
define('AWS_SECRET_ACCESS_KEY', getenv('AWS_SECRET_ACCESS_KEY'));

/**
 * Define Redis connection.
 */
(function() {
    if ($redis = parse_url(getenv('REDIS_URL'))) {
        define('WP_REDIS_HOST', $redis['host']);
        define('WP_REDIS_PORT', $redis['port']);
        define('WP_REDIS_PASSWORD', $redis['pass']);
    }
})();

/**
 * Include settings for the environment.
 */
(function() {
    global $table_prefix;
    $environment = strtolower(ENVIRONMENT);
    require_once ROOT_PATH . "/config/environments/{$environment}.php";
})();

/**
 * Database settings.
 */
(function() {
    $DB = parse_url(getenv('DB_URL'));

    if (!defined('DB_NAME')) {
        define('DB_NAME', ltrim($DB['path'], '/'));
    }

    if (!defined('DB_USER')) {
        define('DB_USER', $DB['user']);
    }

    if (!defined('DB_PASSWORD')) {
        define('DB_PASSWORD', $DB['pass']);
    }

    if (!defined('DB_HOST')) {
        define('DB_HOST', $DB['host']);
    }

    if (!defined('DB_CHARSET')) {
        define('DB_CHARSET', 'utf8');
    }

    if (!defined('DB_COLLATE')) {
        define('DB_COLLATE', '');
    }
})();

/* Attendable Version 3 Check */
define('ATTENDABLE_API_VERSION_3', true);
