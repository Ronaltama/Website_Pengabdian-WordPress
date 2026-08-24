<?php
/**
 * The base configuration for WordPress
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// a helper function to lookup "env_FILE", "env", then fallback
if (!function_exists('getenv_docker')) {
	function getenv_docker($env, $default) {
		if ($fileEnv = getenv($env . '_FILE')) {
			return rtrim(file_get_contents($fileEnv), "\r\n");
		}
		else if (($val = getenv($env)) !== false) {
			return $val;
		}
		else {
			return $default;
		}
	}
}

// ** Database settings - Configured for CWP Host ** //
define( 'DB_NAME', 'pimuns20_wp' );
define( 'DB_USER', 'pimuns20_wpuser' );
define( 'DB_PASSWORD', 'pimuns12345!' );
define( 'DB_HOST', 'localhost' );
define( 'DB_CHARSET', 'utf8mb4' );
define( 'DB_COLLATE', '' );

// MEMAKSA WORDPRESS MENGGUNAKAN DOMAIN ASLI TANPA PORT :8080 DOCKER
define( 'WP_HOME', 'http://pim-uns2026.online' );
define( 'WP_SITEURL', 'http://pim-uns2026.online' );

/** Authentication unique keys and salts. */
define( 'AUTH_KEY',         'af8dca50aa6cfb0e8509f830a7f72f11441dd4f2' );
define( 'SECURE_AUTH_KEY',  '6e311b5b14e2ac3269b5e9eb3f5b051f4061375a' );
define( 'LOGGED_IN_KEY',    '59a3460ba3176c5d32cee14e4681a88309cf915a' );
define( 'NONCE_KEY',        'db7f9a5b3c09f01cb5398d5d5e306f295a960934' );
define( 'AUTH_SALT',        '1c440eb2faa692358697248928b32c74b81fbf2d' );
define( 'SECURE_AUTH_SALT', '211e04e467a860824d60cc75b3c776dda75ade66' );
define( 'LOGGED_IN_SALT',   '510c00df1d57420b7397697a874f8dc41bbb4a24' );
define( 'NONCE_SALT',       '7d2fb9a2b38bb512f482c0013a9d50310715610f' );

/** WordPress database table prefix. */
$table_prefix = 'wp_';

/** WordPress debugging mode. */
define( 'WP_DEBUG', false );

if (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && strpos($_SERVER['HTTP_X_FORWARDED_PROTO'], 'https') !== false) {
	$_SERVER['HTTPS'] = 'on';
}

if ($configExtra = getenv_docker('WORDPRESS_CONFIG_EXTRA', '')) {
	eval($configExtra);
}

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
