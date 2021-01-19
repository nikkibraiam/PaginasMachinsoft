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
define( 'DB_NAME', 'machinsoft_web' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '123456' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

define ('WP_HOME', 'https://www.machinsoft.com');

define ('WP_SITEURL', 'https://www.machinsoft.com');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '4(X d1ttzX5}93}(OZ)Vd=o1o3Ik>%&~:i.91E@=ec HN@5}tDCPvo ZY7m@;]Wd' );
define( 'SECURE_AUTH_KEY',  '.&.kV,kU>f-Ud$Bs;]/>BkiGyKk{K3AM^9D,6zBfFXo{*wnJ2l(]zXm3|?00m,X1' );
define( 'LOGGED_IN_KEY',    '1q=QFY?mcp$})rn@NMSA2obDywd)S|j@BIt<2>fngN[}=N 8+v=v5 ?kC_F/@J0k' );
define( 'NONCE_KEY',        'hR?4%[wik(~MRYmjN;]!%a>v#i.sP]`c?D?;MPUa(V2vJebILvm3xrFcbME2HiRz' );
define( 'AUTH_SALT',        '[dlNoTHDDyc{xbPYbt?J]&2-1c`5Xk[GI{0+F8$^MQh@-:Spp{=A^QlwOw[e)%3!' );
define( 'SECURE_AUTH_SALT', 'u&|i2k9c_Cds{?]1z[J0iA4,bH@u9Ku?r8KP*g:$Z!5:*Q#8HeG0-q[9 Aq6|I%]' );
define( 'LOGGED_IN_SALT',   '!(g5UX6U[Q@IVeNyR|#)?I;_gGQzD-|T3{4M.hD}X@9Wo*RUwT(zzTeC-Y_wv!Dw' );
define( 'NONCE_SALT',       'ws,n)@2G{(WLo&!9A+Z~o GF75h+kv~JB$HhD7)ZymHF41Px|_A-x`c<ME!..Kc)' );

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
