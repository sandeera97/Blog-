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
define('DB_NAME', 'wordpress');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         '{R`zKdq]M:DcL9WR lk$06L>9IFYKWZiePOT|i7AV/Wpv fof.rtpfqJ?5FdIk/x');
define('SECURE_AUTH_KEY',  'Mh.j87`@h]egPJJQ$0RFsD%4AY+2T-gL_~UunC^:$c=!UZRL*>=/XP2oymmXdR>b');
define('LOGGED_IN_KEY',    '1w)zKSr}IbMP@ENBFg/r#OLm+ZIz=;R<0c]UfZ3k]cBa9M1Tf14V,5nue1VIF8n.');
define('NONCE_KEY',        '&0dN Djrm+G#E7_pYW5T|yZ:@BJ[e,TVDc#r5dZ)A+ZdI.1|J~=Q1dH&k}AckT{_');
define('AUTH_SALT',        'V[ov/qOKpzI_Pn2{Bs6{YVf-I6.yNn#~6S[8wxI[39#LDK<gL;<]N=Eutn%Pvo_}');
define('SECURE_AUTH_SALT', 'p>LUg[c%r)|Gd%0(_@B+^Y+u{o!x$B$s:yLt.CCvUipw>WaHKpuzFuJ]#!;t4|xz');
define('LOGGED_IN_SALT',   '8jGj]H3j&qbuI]!y<5YDYS1ciA Njt>q)X]+&aILu/=mxOoEI+juvuAHg|5lyM>E');
define('NONCE_SALT',       '2wk}|Bd@FCD/#u:GXR7E[/E?3C#rzQ|GGQ(6{zMDDs%3%NDi.kr^7cIQgR)N!+3S');

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
