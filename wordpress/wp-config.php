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
define( 'DB_NAME', 'shop' );

/** Database username */
define( 'DB_USER', 'admin' );

/** Database password */
define( 'DB_PASSWORD', 'admin' );

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
define( 'AUTH_KEY',         'Uu*9s$J.MmBg&!oZYj)=kG`A>%R)Fdz%u;11=gu>4;]Jukb]r KV(;/e[UtSZ?MR' );
define( 'SECURE_AUTH_KEY',  '@qS m&SaAWqa6kQR*W*DDI74oIWN4z[{5fZZGZI#sk>[(_-dnoc^ %09`-w=<wl*' );
define( 'LOGGED_IN_KEY',    'nfuU.)Y>N=#ocM:po[0;/vjO)/pj:}D6$HMN_SY?m;u$x!2@83ii7},GfDNIq0.?' );
define( 'NONCE_KEY',        'Ge60(1 31I=/ZQF&XmN<W.:Ps/(h5e!Pz[g|wZ~0FUjl!nnd0YUX+VMUZNA$MMKk' );
define( 'AUTH_SALT',        '|;Fd)ypmz!%7.a&YUIvms+Vd]_1$D!C/ N&b4u!R_+)<`xx~sxmeYnlhR+KTk7=*' );
define( 'SECURE_AUTH_SALT', 'Q@01/A_}:l6T8T@670[WQ%}Q]~_K;>Id| eoUK;|D)i0r[+Hz75-G%8,tDhh1jj{' );
define( 'LOGGED_IN_SALT',   'M!5yv<SW.0NFF_KN@uk$5jre-uPYO<B|}FFG`ouZ|$lGJfO4_7,0@=2!>[xVA]hk' );
define( 'NONCE_SALT',       '9ltyXFIpcw>Qx.@Kv_A,=#=&t3M.wKM::Sp~V7O:N3{kzV0Q|.rSo%9RA0N{mt#j' );

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
