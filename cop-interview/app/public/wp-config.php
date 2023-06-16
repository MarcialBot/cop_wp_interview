<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'DvEbNy2WM++b++EpgnJ0EUEAqAc2wQ8hDGVw5m7oeMHXJAz/A6xgu2huyRNCn93y6U6E1pYmwM65WTJ6vP17bg==');
define('SECURE_AUTH_KEY',  'GspGrVkmFbkBqCkV/bY4RYk+qtFIlU3nLm2wp1Xkm5TgQmJZdESapsCp5vyJC7p/cZNyFFA2K/hlOkdJ8JUDiA==');
define('LOGGED_IN_KEY',    'I6uLCRgc7yA3T1tqy+6iEJ3ZX4IyvC+nxpMIgrhzKXW+/i/GeV+/NBzAGveUUXJ5EvW7lgrTdh/+L2EAUrwIow==');
define('NONCE_KEY',        'jtkwYYS8QLwYz5TtFf5q6xWnsBWgLFIJTUuCP++Rnecraht4Adhu9v+Fku+6xjZAYeGjm1zQS3FpzHMP9s3uvw==');
define('AUTH_SALT',        'r+j7yY24/IwBdLwh+6oxlvFfcfvzDg6nJXUJ9+4M8aHVOrmtUoOweRSSyk3RNzSATyzdHWo86wgX9NyIw2Xdjg==');
define('SECURE_AUTH_SALT', 'Wqj4Y+hBPwlJ6pf50Hglgo/q1paQY3+39zGhPjumtBLw2qFgkUzxMjF566CvmVNn5Q4eX5xp9ozhpnEdxo3U+A==');
define('LOGGED_IN_SALT',   'e0wMjZm56fdhY0FoAZK0BtmHXPGYj9YQBClnkAtS/AhezM2BGPSG2pUXl0EHNrJigh0lzj2EaHB5y1YbLQBdYQ==');
define('NONCE_SALT',       'nKfBhKUoSCfi/tBRihUsP0zpMkgIxDfANxpGFH/II7uxba7Tp6rMxWpBNTQEvEAZcgly1Da6es5H0AE5mkX6bg==');


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
