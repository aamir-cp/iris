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
define( 'DB_NAME', 'lookwhat_iris' );

/** MySQL database username */
define( 'DB_USER', 'lookwhat_irisuse' );

/** MySQL database password */
define( 'DB_PASSWORD', 'P_ncOb=W#F#4' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '8rjQOO,qZ:`Lx]>5=/ghuDJ *1F c8ikn*&--7uGC0$iWudKyf4gnv:N41LtP}]!' );
define( 'SECURE_AUTH_KEY',  'EdJi(6W-~<]{$b2yGW3OdvvWpMc4#F;-1,MCRj>@mvIo3p7hHAVx:bF9.8ZOXGSm' );
define( 'LOGGED_IN_KEY',    'yhq+6?Tl&1bn)RDlwMB>hf.l5y*}j(9U-|[hn(J&z<3nv_;6O8q<MXjw}fb$W(6)' );
define( 'NONCE_KEY',        '_-o7<|`J3E|zd9y8fBu|g@hOEX_X0}T:K%s-VH%/S-C)PUj7LfN_:+&b=H@KO0$[' );
define( 'AUTH_SALT',        'XaFoP80bC<#o2>kTK;O)<yjq}*?U~SdT1}HvJHA+px9bw *#`JV1$R)6c5A5]Py|' );
define( 'SECURE_AUTH_SALT', 'xL++;mM-p&<cF)_;o|Hgu97c`~;sxYf()POo2`#ty]-6=tnFGoT!Hx3 5vmD=}Ls' );
define( 'LOGGED_IN_SALT',   '>8sX).wV]eF- 8tP8L.C-i]qHWrNVhJ_IOF=<:`)Ok*:&7`ze6tku:%>B+N3%GgX' );
define( 'NONCE_SALT',       'peoC)sDb2n?e45FxbW`j/Gu!*&Y6j~L7.5sxpv//KGITT$Lr41JWy%O_Re2ijjdi' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

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
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );