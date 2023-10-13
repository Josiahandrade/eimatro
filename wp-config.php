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
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'eimatro' );

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
define( 'AUTH_KEY',         '_HiPzMPxW[DY!BMAxaanbp,)*aDM&;azo/m(Qj2sAB_2-1rctA2:{c/Uzwq([K&V' );
define( 'SECURE_AUTH_KEY',  'uh&f+?wrad[{4.AQ:bP-6IJ2v@2R~3)vrXM#7.g+o||LA}}icoa^jc. h@8()%gR' );
define( 'LOGGED_IN_KEY',    'aCveb)|I|Lu79WO_ev<B8H!W6LpBDXRL0MHZe)=Ls!|o||sn5Da5FWk#r-%Rz%K`' );
define( 'NONCE_KEY',        'jp(UG|M>7#N-a.R9gZjullbJK[xc@rs,V:U&b/]cN!$ !,2|v2ju2>J3|[Vk;ooS' );
define( 'AUTH_SALT',        'oh^Lf)%Hh4}Y~FSrPXt&w>?P?Pm1B(phdb8nxCa5PI>jD8EzCA9Iqf;]C0W~ghTv' );
define( 'SECURE_AUTH_SALT', 'bRW{gKgVLx.+fIMvTh{ piRi(3wJ+H|jQ`?UUFK6i*N2oAgmO!N?[w,}~5L9%5<j' );
define( 'LOGGED_IN_SALT',   ' .S*B@<,V#,nKxw4l-&1=@kd*Z2?qR ;:NW`(Nl2|mGxd~&-vaBg&=7BMS.z[o<E' );
define( 'NONCE_SALT',       ')w2r=>|lJivfN(GfpHKG~t?hCHZP-~2AR:KWlu7:>L#}Q8]S+Xzj0T<P+I7qfbte' );

/**#@-*/

/**
 * WordPress database table prefix.
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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
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
