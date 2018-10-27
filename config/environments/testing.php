<?php

if (getenv('WP_DEBUG')) {
    define('WP_DEBUG', getenv('WP_DEBUG'));
}

if (getenv('WP_DEBUG_LOG')) {
    define('WP_DEBUG_LOG', getenv('WP_DEBUG_LOG'));
}

if (getenv('DISABLE_WP_CRON')) {
    define('DISABLE_WP_CRON', getenv('DISABLE_WP_CRON'));
}

if (getenv('WP_REDIS_DISABLED')) {
    define('WP_REDIS_DISABLED', getenv('WP_REDIS_DISABLED'));
}

define('WP_MEMORY_LIMIT',     getenv('WP_MEMORY_LIMIT')     ?: -1);
define('WP_MAX_MEMORY_LIMIT', getenv('WP_MAX_MEMORY_LIMIT') ?: -1);

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_test_';
