<?php







































/*c4938*/



/*c4938*/
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'highpf_wrdprs');


/** MySQL database username */
define('DB_USER', 'highpf_img');


/** MySQL database password */
define('DB_PASSWORD', 'admin4web');


/** MySQL hostname */
define('DB_HOST', 'localhost');


/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         'uL[nr&]$w3K>&qM|Q^K._&+Y;QkqjzQEDG|*[w ()O,w65WU30Gq=Yh;I%Jl;-;3');

define('SECURE_AUTH_KEY',  'h~,S|)zA+55s>Ws LjcEi~:#X$B(1ND#!&|&I~A4Dx@m.Z7V<?B<MyDOOwHU~I{O');

define('LOGGED_IN_KEY',    '*|d%51A[pDo/tA|]ye=%+0PO{RyCp<|ITyW?tYrD!PsE*w!9*o::.XPv>Eg+vxZ.');

define('NONCE_KEY',        'J|857clT p;C+tX4L6h3ms |-8Q1r^-b$-s@kZ|ZZSy,bf#vA.oO/!7$D^;vjk@g');

define('AUTH_SALT',        ')(U/,R6m|)N/^++pvc&g)m|$ai%-*Gd,[<#RU*vYqQd=%Isd^)%<#i,(]|;@zkYa');

define('SECURE_AUTH_SALT', 'l*Vk` ajizuo8az(a*Ae<5an#2H sr:;;mT]CbS`(b.c=3cP,ga]&6X-fWbGFs{D');

define('LOGGED_IN_SALT',   'jm7_V^>YZ%codhR|*F-tF@y9B3&0B9S+Km_nFB!J+{/@v[|-+Ztc^}*foSm(]+{K');

define('NONCE_SALT',       '/u]Fb[Vi7p:uY_F*,I@MZq;4<3Wa3~<r4D.$_,V};7FRwt-S[!aZ3X@GFB3_EqAN');


/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';


/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
