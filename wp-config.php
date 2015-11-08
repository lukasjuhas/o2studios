<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'wordpress');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '!--ca`m#Od~K$2,3*:]D(wpe7%5L.AD(ZQnh#y+OA1J]0|M:Jh9Bg*xadltQHNJp');
define('SECURE_AUTH_KEY',  '>ysBu=jwJIE:$|VZ95OomnmA-(6E%u 8A$oU+sejkaG(V+9YoKFYiC8=$yt`>5U~');
define('LOGGED_IN_KEY',    'NnJE$$+}H[vzV9x {1/S_2rdY`dd(0!#E5kuKe~4~%BeU&Ag;45l_`s&CH8[|=R`');
define('NONCE_KEY',        '^TeTCWUbxcyT<2:rT!u~??)Y7k8-F|:Glwn;m33gS*BHuRq7H5Ml_vlXe.!6Dz4)');
define('AUTH_SALT',        'U8Gy~zomQ<l{IVm7MvK{F<$#*~.}:0~j>L2{++eU`qD&B{7S4cZ+?s50#:/VuNSt');
define('SECURE_AUTH_SALT', 'h,ie_iTZ*|BOp=xPZFG~[S_z!$T<nkFjW&Q}SCZRwwIb!WdBePr+}TWMAi5OM:5M');
define('LOGGED_IN_SALT',   '5 caTOMPUC5/Ky>v`<U,HUiGm?rVy=#kA+U!Me@d:@i0^SCP0Bl~F3xr(ToJ:uAE');
define('NONCE_SALT',       '6sz^=->/u(xtY2=Q=>-UDUgcJ@>2{/j(jVDzd(G_c^Z&?dDDa@z.C`jV 5`xzW*3');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'os_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', true);

/* That's all, stop editing! Happy blogging. */

/* Multisite */
define( 'WP_ALLOW_MULTISITE', true );

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
