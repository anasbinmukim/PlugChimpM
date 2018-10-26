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
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'mailchimpmgt');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         '?1tdWW}!E3rc_W]UL*$`n/mA(3uio<AY,T4gRfPoMBm?opO^p)!a<G.~,~:wq;lW');
define('SECURE_AUTH_KEY',  'h&G_5r%[;corBkwg<%,Gnkbw(?.Cur/:=(8*0UC#kA:=82;O?9m1lr+=T xW4e7=');
define('LOGGED_IN_KEY',    '}D)Qd3Ux.wB4x*rzW(N[}9%`h|qfF$t+%B_=N?c,z!CLm?y&7f[mVnypuj9ge<zR');
define('NONCE_KEY',        'lDe`OL!*@7$A;ZK.>b`B=xx^MthUPl{|ZsqN*NE3;Mydlce#VHpB.&,4|uOZv4*!');
define('AUTH_SALT',        'q%] cG-{&{0*g*r2.%#PaY(2|Oo~--1ge.g$ay.GzafW75X*}O[t[K}:X,esNMl%');
define('SECURE_AUTH_SALT', '&vz-uQ7A:!|#:z4=R ])r[z-588#7w8bXAQ4lcwwawz!:7K_d?G(7&iq<c5#Jwd1');
define('LOGGED_IN_SALT',   '&SD6n*Wp9zEAF!4:f7kNoOg@n$mj?]RD-fhF2~j4VlGQElK6J4nQ8 5^pSgV17Im');
define('NONCE_SALT',       'RZ*)D9WoW.<Jwzreap=R[p>G#1O aEw/rx bC^|_`PWjsP^h- $1i0=.:G{yl;@o');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
