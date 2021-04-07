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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'appsdownloading_db' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '@OzRt]Gr/lDX%`w>MNQGCy@$zoMHg3/wMg2Sg%qO6FW(={e@Ql/;?+}T+T-Z~>uJ' );
define( 'SECURE_AUTH_KEY',  '$?Ho,mxk@L{8LZZVDL{tuoK|*bL0&{_[2VlPa~1Bx*1S=%&^H7(%@e^G@wz|,!8m' );
define( 'LOGGED_IN_KEY',    'ByfRldvzABuS~3vs2.;yXgh_G$*siC5{TUIP,`zH%MfOxk=r=/P2U-%rR,76r.Ry' );
define( 'NONCE_KEY',        '$F*D!0,yD#:HO+T0a*(r=>]jtJriWn]!jvZxyY7*,5$Aa67?lWoohyz}uZ#H3Y/H' );
define( 'AUTH_SALT',        'Ds:O8i0mg%GVn}LaEkZ`FFy]$}f-tbei|;6d ~(QHg0tCiu8C$M]vf(`pp-0.&Bf' );
define( 'SECURE_AUTH_SALT', 'AqY}.:9S_H]+up3xB,6M?I5hCX+m7oUm3viF)A+!uF4Xj6p-!z2sbIC7lJo(lJR ' );
define( 'LOGGED_IN_SALT',   'I^/!nWE@Xt&eNMM5~$6tM?NUOML4Ier[}=9<J{lh 8nFP9 o%<b3RF;;Lg6&Jnd{' );
define( 'NONCE_SALT',       'u&}<u+Z#v9[4OJ~DA9F^[As#K*H0&``4rrRqdnBRd]muvEbp&([.}6/N`at<+R=6' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
