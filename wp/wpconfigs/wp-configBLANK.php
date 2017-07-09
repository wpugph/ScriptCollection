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
define('DB_NAME', 'DB_NAME_DEF');

/** MySQL database username */
define('DB_USER', 'DB_USER_DEF');

/** MySQL database password */
define('DB_PASSWORD', 'DB_PASS_DEF');

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
define('AUTH_KEY',         ')5CPwE`_*lnj=L2VJnb3.J{W5~IPW)|#$><4wkeywevh Ij{[`0l=dX>=sz?}E8w');
define('SECURE_AUTH_KEY',  'xVY)+.+2%EM!GK&&({<(L1S)!gU<zJc_E>T,Jb*Wxh$SA51fx)GEbDFf4SH&#T> ');
define('LOGGED_IN_KEY',    'BrJ|cg.vk9N;)nq#Z6&{~po9u</Dzf*dKerU|Dsteo%$-:AZ~SyA%B]? A=oH2&Q');
define('NONCE_KEY',        'Ayjcg0o>dj>sF=D<k/y(,nyK{t?ZHLTUV7^`CM54*A,MI rK#>GbMz<V`% -38$x');
define('AUTH_SALT',        'd$#gp3lh&G}3BG}9{9J|Qxnv4K7qnWt<HaAr|Bm&-DWhe5FqvY[G70T)xe<P~j7t');
define('SECURE_AUTH_SALT', 'R<@fDZq;emP@W?s?K(;|Cq#+U0!f}1b}u>JXd&Ju|H;b$_6UlC&T3<Ze8n)2v4q9');
define('LOGGED_IN_SALT',   'C:ccF(,M+tz6j^fk(0y|C=PZnX5Nj@6Vs]Q}C$hb}e^.i/b}q7o^T7M)rt)1NrVM');
define('NONCE_SALT',       ';OrNuR&t.-k}E*7a_UGd{|WysTw:,=#RdX]w&[ly#Y927`qmhni!8zM1LeI{kgoU');

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

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
