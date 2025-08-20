<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'medico' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

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
define( 'AUTH_KEY',         'z9skx g2p?$xl}UY|kG:dPSRq3,>=as={f90Fas5X^3UHH91_;VC&H3S!N)ob!_z' );
define( 'SECURE_AUTH_KEY',  'Z1;1DP #=_C6b8,ioECucj(NLS,U@5tqka8^`kd?`g[]3WvF$~voo=CSr-]h2$(u' );
define( 'LOGGED_IN_KEY',    'FtY_jz>[4%7}2YnOD?%W]!>~!@p!OrX8>?W_HOYbD{CO54N{Edb[I2R-A@`]:=4(' );
define( 'NONCE_KEY',        'IOD>%H7~IvWl|4Ms>&<EDP^~[L@znfQg(;:ge=X(}i+VxZ!7Lsd+5*V`]?9Cr:SR' );
define( 'AUTH_SALT',        '[xVhm5C5Z;V5SLzG_A 7,OnohFS6rBYR94iq^VAK00z]qulB8QkQXylHGD0Axz&6' );
define( 'SECURE_AUTH_SALT', '4mNcqowD_,+PZ&Z&mxqV$Q.8,W>>#%V|;kq&tlcPr:2Q9AM`@49Am$F#$4}}^i!4' );
define( 'LOGGED_IN_SALT',   'wl9 }(oi}R|p<<b}mF{C-rSLLB4W7Pdsu.{ %xz.c9DaLw/9Xz&^Z|m9~rvhsXSV' );
define( 'NONCE_SALT',       'NQ-k%F|p?,sI:lR0O**f}Y>3YXr68se0MV*]snRh:j7+A-_yK,% 69t8Y,OE2;`+' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
 */
$table_prefix = 'wp_';

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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
