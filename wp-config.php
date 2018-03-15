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
define('DB_NAME', 'nhathongminhfata');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '123456');

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
define('AUTH_KEY',         'ys#Dkm;JUyXh#2F:{8>^x1E|BySj3Vl{7a$^5I^paK!P_W)zrW|0O.J_T65{v+f/');
define('SECURE_AUTH_KEY',  '*f}f_t_&LQS(YVX~yVRGW2VCPkJA+:>jT4e|y6K71pk.@D[x@=TH/TN`zMP9][D}');
define('LOGGED_IN_KEY',    'c]/`i%V+~^XWK6^mZc?Cyqv9#s61Wn0(qcN~QK2H<{Tejsw<$M{]I=|cxaQMyTpT');
define('NONCE_KEY',        '|}XC}M3/>:Dd;mX6U*nUt#])lP[nA5wqol$vz>ih/B9[XMLU:_8Hv mmY$KrmAad');
define('AUTH_SALT',        'f7*Cwv-|x$UiMqeCA{U-J/<dXEX$qh`.[9th_z~3nL?-P.BY}F%h7fSr3YsqLD$E');
define('SECURE_AUTH_SALT', 'y5.8bZl/K oFJb}NyZTg`)@{t`*1U< HtwB5*!:.8N<Wsv,~>U{q~gDQ&oTwZCT ');
define('LOGGED_IN_SALT',   'XL)~5#B$LTN4T?Ha+r2n.#^258jQ#58 D3>S/Innf}t$z,_G&C2O]xz@eojz# -7');
define('NONCE_SALT',       ' dAPoP%&g5l!(xr cn/8838? +KT:*)6|=ay_s3<J]OL#|uNc>MW,$0U7fmJb8`y');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'xzv_';

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
