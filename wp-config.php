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
define( 'DB_NAME', 'school' );

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
define('AUTH_KEY',         '<&tj$8!Bxm$)H$J+F1+.;f#m2P/P$/^o-foS;en0Fa9k~zY=Rr7-ZI-4:<Go?QzQ');
define('SECURE_AUTH_KEY',  'lLapzsP#5xqK,R&Oi_@2ZK#qQz|n-a6:hG)s<nG,kt=|)j1:xfu1Q$W-aK-s_0a:');
define('LOGGED_IN_KEY',    'OhnD|w2Yn`{^R(E8)dEBe|]dE)}J-`7_VF9iWb=&~~*VC_o .hny7?Z00z(D,g0A');
define('NONCE_KEY',        'Lmb6o{Vabj[y)&ZP`%K&ib84$6[J#A+FI#$7bo5EG_|=a+O;#Q7^-GAis+6b>k;(');
define('AUTH_SALT',        '&z-YBgsz(fWqW|;n+r+@MNyo?XVqqYx{BZA{;0uya}*yO|W?2&CYX`]W$d1`^,Do');
define('SECURE_AUTH_SALT', '5O7D4l,Ln4qEJZ@rITBC)C [n]qW_JpY$1}2-GUiqPG)T> +*k[)/o+3x[-(TP;$');
define('LOGGED_IN_SALT',   'cRFU(NLqY}L(rs{r0@|=W-/*^F,^mx;yC5(dUN?Ahs[a*o;3CwRMWJlV:@^7q//F');
define('NONCE_SALT',       '@wM.Kl#h+X8 `c5Y]~AkdKV*a.V`|_0~B&7k1Ilup=Q2A%D29=(S7Fb1hqq93^U>');

define( 'WPMDB_LICENCE', '0d1c0c43-b04b-49f6-b598-be2d39e698ba' );

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
