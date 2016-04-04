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
define('DB_NAME', 'u998692852_parla');

/** MySQL database username */
define('DB_USER', 'u998692852_parla');

/** MySQL database password */
define('DB_PASSWORD', 'cientoporuno_');

/** MySQL hostname */
define('DB_HOST', 'mysql.hostinger.es');

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
define('AUTH_KEY',         'u|#3~1?Jcb]g-W8b5.JWBV8ulv?3hL9-Nm`+))1d16A(m9ki; Km}sZ{W-PR6-CY');
define('SECURE_AUTH_KEY',  'jFRr--3=(|*?];%t>g<_|a?[;pXBU^PZ`C{:5mKHWk39Q_vb>])(r@{MsJZaoG1B');
define('LOGGED_IN_KEY',    '&^Qdnt-hUG<PvjDh%M2nDX0$0/(BI#KrZqwn6%n-s8`>(pES0ej!0`;zd>}7VA}S');
define('NONCE_KEY',        '&WVP,l ]&<,cNIoIX?nD%+:QL5:%u+v<$k[h3fEhcMasZw6$J3(BVm-E{^bsm~G5');
define('AUTH_SALT',        '$J0Sx7NWy;[}9!g.K@Z;;+Oj62b-1yY-P2Kl+b|/?**A)k({.vYP`h|2w=wQg,[Y');
define('SECURE_AUTH_SALT', ',pk/lO..B^ xZ_vU%a[4N#*;XKf,;k6qE9+RaeY~hO}S0NP&lea(np_]fcu/;@TK');
define('LOGGED_IN_SALT',   '%,J-.>:gGS+x)Sp_f5^+Mv4q%[(R0J=/{+.6u|yX$ra36c0z+,]ZSiOK)$X:X@(d');
define('NONCE_SALT',       'K!ZG?5tIflG:U$Q(Iv:C.nN$@[&Q)ph:F-b89=b@j-A3p4a|U=ryV,,+%KU#O]]>');

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
