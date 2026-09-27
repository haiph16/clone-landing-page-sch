<?php
/**
 * The base configuration for WordPress with SQLite Integration
 *
 * @package Soonchunhyang
 */

// Database configuration for SQLite
define( 'DB_NAME', 'soonchunhyang' );
define( 'DB_USER', 'root' );
define( 'DB_PASSWORD', '' );
define( 'DB_HOST', 'localhost' );
define( 'DB_CHARSET', 'utf8mb4' );
define( 'DB_COLLATE', '' );

// SQLite database storage location
define( 'DB_DIR', __DIR__ . '/wp-content/database/' );
define( 'DB_FILE', '.ht.sqlite' );

// Default theme
define( 'WP_DEFAULT_THEME', 'soonchunhyang-tailwind' );

// Dynamic Site URLs for flexible local dev port
if ( isset( $_SERVER['HTTP_HOST'] ) ) {
    $protocol = ( ! empty( $_SERVER['HTTPS'] ) && $_SERVER['HTTPS'] !== 'off' ) ? 'https://' : 'http://';
    define( 'WP_HOME', $protocol . $_SERVER['HTTP_HOST'] );
    define( 'WP_SITEURL', $protocol . $_SERVER['HTTP_HOST'] );
} else {
    define( 'WP_HOME', 'http://localhost:8000' );
    define( 'WP_SITEURL', 'http://localhost:8000' );
}

/**#@+
 * Authentication unique keys and salts.
 */
define( 'AUTH_KEY',         'soonchunhyang-auth-key-random-token-2026-vn' );
define( 'SECURE_AUTH_KEY',  'soonchunhyang-sec-auth-key-random-token-2026-vn' );
define( 'LOGGED_IN_KEY',    'soonchunhyang-logged-in-key-random-token-2026-vn' );
define( 'NONCE_KEY',        'soonchunhyang-nonce-key-random-token-2026-vn' );
define( 'AUTH_SALT',        'soonchunhyang-auth-salt-random-token-2026-vn' );
define( 'SECURE_AUTH_SALT', 'soonchunhyang-sec-auth-salt-random-token-2026-vn' );
define( 'LOGGED_IN_SALT',   'soonchunhyang-logged-in-salt-random-token-2026-vn' );
define( 'NONCE_SALT',       'soonchunhyang-nonce-salt-random-token-2026-vn' );
/**#@-*/

$table_prefix = 'wp_';

define( 'WP_DEBUG', false );
define( 'WP_DEBUG_LOG', false );
define( 'WP_DEBUG_DISPLAY', false );

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
    define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
