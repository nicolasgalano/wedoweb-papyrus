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
define('DB_NAME', 'wedowebc_papyrus');

/** MySQL database username */
define('DB_USER', 'wedowebc_papyrus');

/** MySQL database password */
define('DB_PASSWORD', 'BP;yn(To}m~L');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

define('FS_METHOD','direct');
define("FTP_HOST", "localhost");
define("FTP_USER", "adminpapyrus");
define("FTP_PASS", "!8HPu2wuQoSKwsL1Me");

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'G_y@@JM;^5-/1bX2B,LK !&VAMb=-]ok8bE-~]1}K[fJ8Xt_l$T;dku=)SYXCiuV');
define('SECURE_AUTH_KEY',  '{=Zv/MoS:l4)E+(YkUSop(|3Ljr06^6sHcY{SzPfZ2Ujh9r^ejI, !9krK}}5_ZT');
define('LOGGED_IN_KEY',    ' K~TK0!9M-uHSADGQyEXYC_c6]iyS:Nk[2hhGY=JN%)2&5uR~h>=|sit]J7gQ9rl');
define('NONCE_KEY',        'AdI3u{d/b?L&oe!1}pS|wF]~S++l[Kw2+H~7^P@POw:3PO;#17LAv6KQ^%/*~=@q');
define('AUTH_SALT',        'N$a,8lXtN+zyOh}0lf_$iNc_WW|j:p;s!^y5=#tMM@,Ao!5DC/`@6A1N7?JcTu8b');
define('SECURE_AUTH_SALT', ';H67N6m&/_$[Fc}ff97D}uq}t3zmk/xpHf_$W$SExdEheW<2uU%tshFouP.Y?sL|');
define('LOGGED_IN_SALT',   '!I ``^9y;}aci44qUlez3~tffIkFS(W,todDT!G4b8pqwb#AJ#uP{S`SX8#s*TjH');
define('NONCE_SALT',       'i&Xo4c<<a=dFu{Wt/Fv2&Ub|(DIJ7L)Lsg _6Kx46R&m*>V}]<8A|d$l>N</hhZw');

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
