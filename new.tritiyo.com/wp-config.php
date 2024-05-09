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
define( 'DB_NAME', 'tritiyo_trtk' );

/** MySQL database username */
define( 'DB_USER', 'tritiyo_info' );

/** MySQL database password */
define( 'DB_PASSWORD', 'samraj77' );

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
define( 'AUTH_KEY',         'J>kCCVd@!F}3_aFxb?4}[8Al{uh}8Bra>wC3#n2W:?MF!)@7m<!n`X&n+?RuUb^b' );
define( 'SECURE_AUTH_KEY',  '[B:fiuLX`G)cxXc8ryCA3SSse5n$nxGlXz;Cx 1jiQ6H1=x]d,LV)qK*yXw:KZ-?' );
define( 'LOGGED_IN_KEY',    ' DjYGeN <!36<T])%](bGe].@mc@bYnVcf)/mQ*i*KxAV$YN*^D[9=>79Y@ ?mR-' );
define( 'NONCE_KEY',        'sU1|&A7[F5Ggo43fL+%o*]MG3 rrN@=?2 O?{x{2jopkpxP`O49J<9c3TT[GD]4Q' );
define( 'AUTH_SALT',        ';1Pp9<yK1cpnBO}U]hkM }SJc~p+:-7yMk 4rCEC,ERVRIG4=_O_X9I2t}^HKwu{' );
define( 'SECURE_AUTH_SALT', 'ih-T0w<v o[Xdbp(20gs#dcibHuO6*F2U/*?*}D[j?K/;Y7c1.By!BPu06|Fbq:J' );
define( 'LOGGED_IN_SALT',   'tuQ`+@lS_>=`o[)^D{vAF[tU]nDf:M`Yy-IPN+`V~$fj%cbf6}cl?>Okbp=5u`12' );
define( 'NONCE_SALT',       'aa>;U(iZ1g9}QGmXp-CMR4eFL9-@}&}4I1jsExa <&55Ier%Kp`1Xw>8>q 64]rW' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'tr_';

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
