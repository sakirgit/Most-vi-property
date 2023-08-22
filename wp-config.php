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
define( 'DB_NAME', "most_highlandsproperties3" );

/** Database username */
define( 'DB_USER', "root" );

/** Database password */
define( 'DB_PASSWORD', "" );

/** Database hostname */
define( 'DB_HOST', "localhost" );

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
define( 'AUTH_KEY',         ' -Ec]`]U(8Z$z];-+J_bB*{^!,]bjR$*qfB30_yQ[Czc1_#],Sx>BiSC}8i>N9Du' );
define( 'SECURE_AUTH_KEY',  '1@e^BKg!oR#]PKSn/Kqfk/g5Z^`Y_C6@YchF/8x}`?kN)}|1XcY+Eb~n8%Kv-1Bm' );
define( 'LOGGED_IN_KEY',    ';&[*e0rPyzsw;tGg?51ZpxK[fmO9odYfQN>S+C6K:x|Jw$&I2h8LNqwq*QS4?GVn' );
define( 'NONCE_KEY',        'KZO{5X=h`gOR})xSahp#VP6e1l)1lW~U,y;>3@`%,~Sscfp+xQqIL*<FUWzl0X2h' );
define( 'AUTH_SALT',        '5RIv(mV.h;JZWv6&V9Jm*}]Bi0r-+hLCl]tE5uL`ChH2HGy#4bu/lcg)2/?WaiNb' );
define( 'SECURE_AUTH_SALT', 'nic31}dC=WL)3d7D0qP#EiOdT=]c/g]wIezW,mN`ET?~I.[xokpp9#Kc*Kpg%*]#' );
define( 'LOGGED_IN_SALT',   'YZ?7y3[x+f)4]U<$pD_sZU[1$Zp>^!5;p..l]YYSVs#l=^cZ+g/jTXwTFNyz|.8P' );
define( 'NONCE_SALT',       'x`:n7l)4l$wUqeS=(J^tjUaJ~=ENpkV7+k[2CZC-4S,f#t=xMEVI -:Y&u+ZwVwq' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'highlandspr_';

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



define( 'WP_SITEURL', 'http://highlandsproperties3.wplocal/' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname(__FILE__) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
