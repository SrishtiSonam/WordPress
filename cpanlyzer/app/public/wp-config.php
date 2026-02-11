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
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

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
define( 'AUTH_KEY',          '&s%WHC`susM-~h%qQ;Jp< ;kyUb31K.{Cl:I)VDk)_P5}|r#*$UjER<OoDrycFZO' );
define( 'SECURE_AUTH_KEY',   '$Ctvp$XR7C3&c;55HI*^:DU|Eo|J>]Ilu)4+2DK%[~0=zzKI}!bw 7*QPRaDn[qV' );
define( 'LOGGED_IN_KEY',     'Rv(Jk9gWAfm,@5*)=W?BW2wM22oIUH=#ikB]|H{Mj!PRl|@/+Fw9}-.Ww6J@.O;6' );
define( 'NONCE_KEY',         '_^-VKl,rIZ-95v,E*cP<^fF_]f(cX#Q1](*`bH8^L9|`&~EikIT}03)gK[dAdo6F' );
define( 'AUTH_SALT',         ']gfo{Z?Ao,U=-HwO[6z-IJeH&F-R7Z[M}<ygrEj7gB9(~ip%bKXsWr78KYvmSZoq' );
define( 'SECURE_AUTH_SALT',  '&cVNl<@w<O:TeYpbJk$+7l^aj1&J)p-W?:rL DB@j& ]F2x0@^O_.~-T6Q#)QP+7' );
define( 'LOGGED_IN_SALT',    'G-X.V72Z.jKs@*nJKNOF:Zn&GA#C|aJ|/qn,?2Ln|t|PTh57VG//H=ZJ}.Rgva/]' );
define( 'NONCE_SALT',        '.D2T`KL#w?}OwZ99EO_9,J!q2ggf2XnzOMH ^=&k~`lprh.[O<.s8c;WU;0%*k,r' );
define( 'WP_CACHE_KEY_SALT', ' Fc^%`bf^.KV^y*E:BkaI0(V@lU>15*!w9pwwQ{+L{5z%rN{zUM^q8{&L^,_MwyM' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



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
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
