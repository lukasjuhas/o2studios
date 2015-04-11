<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link http://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */

/** MySQL database username */

/** MySQL database password */

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
define('FS_METHOD', 'direct');
define('AUTH_KEY',         'W}.a0l+|+[&Nf9~NNt|>;-2Ux)G75MXapJF#pY-T?M|8/K0Q~$nJ=c{>NDC1fHd`');
define('SECURE_AUTH_KEY',  '7YtNS(#@B@,.>+O73/U`&Lj)7}%zGTK0hid!_*%#1q6-h(w`5P-doeY$g|SN]P*O');
define('LOGGED_IN_KEY',    '7[=r/)DPp0NCOG(!=W_skXH()V{h+|Ue-^d,$CeupL3!N-i^>u/E{$`Z2juQcBR?');
define('NONCE_KEY',        '.gdEKbVfgcsu;0`JGQe)nsQ)cyeD>g[T+zB!b>/$&|U2B3X|~*YP[556P1!BB0Zv');
define('AUTH_SALT',        'zd2ofIOT|I<Mg1*x8V7k|Pf04pi.,Ob]!BLZIgYol|Fg.{AdB$|%)ALrJ+4hr84O');
define('SECURE_AUTH_SALT', '%IcT(RzS0Q~??nzm8T8bG(Qe4$@J[?LE~r>~VMLklV|.82%RK-bU`~]yi;,)8ou&');
define('LOGGED_IN_SALT',   'M[s+CQ>|!A=Bc#{5}lOhj$,4dE+~Xuolj#G[4_JwBcOXJm8xg@9-ZF<u]u7+E$-s');
define('NONCE_SALT',       'hMsws6o?w]hNV;B3Ky3+k$8HTI bI{F%Xt?4d+h?0ohl;F4t4+poeT|A|HSN[@1`');
define('DB_NAME', 'wordpress');
define('DB_USER', 'wordpress');
define('DB_PASSWORD', 'L1JNwhpjoh');
require_once(ABSPATH . 'wp-settings.php');
