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
define( 'DB_NAME', 'u618694637_ultrafec' );

/** MySQL database username */
define( 'DB_USER', 'u618694637_ultrafec' );

/** MySQL database password */
define( 'DB_PASSWORD', '2&uMim2j]z!Z' );

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
define( 'AUTH_KEY',         'G49XlfbBjZF(>%+WCVD6cRlvDsq=iEf(5T<k7K>CPMv3n8rg,ypPU*RsSoL_*:e]' );
define( 'SECURE_AUTH_KEY',  'C3ZM9keuIeV{ =,wH@b2roK!_0m5LaFqgK_[A@X$$!=F)Hk%;bX.@j^lA<SlGK6*' );
define( 'LOGGED_IN_KEY',    '34U[mMg8%l~&tFDgaBAqW-jDO|)63P<7ts:B3Xb4IcOD:tN*U@u?Kw=@wP^6&<4V' );
define( 'NONCE_KEY',        'Wj!rFYmei>2EdgL*:TZn-Tp!-KiH|z|?G^ghIN@m!${sC_xq}Kq?%AOYIOF!&J5k' );
define( 'AUTH_SALT',        'BQ|8fF&@$E6#m$!r6c:J?<S>^E=~E~{UP9W_e ]T%[ywpZ<20Cu:hH*m$r+umGMz' );
define( 'SECURE_AUTH_SALT', 'Z-qNc*{QGuZk1?P-Z2fX)Q+I&KDLO2T#RlzR<4D/2K/pn3VQMfX__{AG/2ZC/?q(' );
define( 'LOGGED_IN_SALT',   'd6ihScq]e~oV9D:64~QolMm%</0W5Ml)+(D<I#PI;GX`Y8P~y2V2;~kZ!FG(F+/@' );
define( 'NONCE_SALT',       'aqJ]4(JI[gS}&gVJ6TnuaCdV-4CTiz+Jx9-<UyZC5gry{Y44rL1/:6u..0[|X$C1' );

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
