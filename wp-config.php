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
define('AUTH_KEY',         'GL[cd%@0Y/t_pt-jhHKYFPM;;14/uiJFX<]K@K:=~q}Ls;Us,3`=T5M-6H< taNi');
define('SECURE_AUTH_KEY',  ']R.H;J;XjbO{tDi](Xv]p6{,D$aS;}MKZwe)H;Rvw`SajeBt(IE-L30o_or#R2Oe');
define('LOGGED_IN_KEY',    ']x0N 9EI_qPTl&;TUEO<>+7Id!vL+RL6LY{V1%=z!VAxTf,/m7yKRs4lA WQM8{t');
define('NONCE_KEY',        'pTo,IP!VR$kz5;jh~!VpB3R;sOxwIHiD)zSd<oS=&f9];FN@xU~R a,L;GSShBm=');
define('AUTH_SALT',        '0P:WUU6r{#&=w$yBg`#Ymz~tnX<wi`p+6s$D+t/F%^_[AL)4(3-==1,eO9X!v*!*');
define('SECURE_AUTH_SALT', '>A=X`wgl!lMPCK!4M|L~c#vD`P$Aj&BXSA0kp~8tDhhJR_,`nV&|)z}km4Q@?Q?f');
define('LOGGED_IN_SALT',   '5_ Jf>4(q@.mn=Sp*~>d[^BhQVE[u*,N_o1RsR{<b_d !~! .l)N+lon=9$q?C]B');
define('NONCE_SALT',       'O;8$i&J0w}{2c(-,]^ta7{XD#Q0~ZMt1Nndf}qYGvM/]SKOx>^n4DBnPv1_2CGp-');

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
