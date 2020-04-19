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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'aprendiendowp' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         'hw,pa?0P_yJFhugrG|+(h+uC?R`N3&6n`j[#/GVDsM|SAtluDGe)g_>BaTISqZnI' );
define( 'SECURE_AUTH_KEY',  '8bj8._F_Yi?jwc>tx(:tAVJv5n)@#W(dqS}7c3[/65PK5ziVxpsk_mYB#k{zQQnj' );
define( 'LOGGED_IN_KEY',    'JxQ4uK.Vu=eYOZNEK&DK#ouxe+=6e,y.NkA=tO$z(x^o$,dY1Lb.hH4cJ-?K;lxv' );
define( 'NONCE_KEY',        '!FPR3{j1AqId]3@$[Q3<~b (Hj1x^0@22C[@ ZkUxpzCNeS[Mk1c&desLU,5Q#;j' );
define( 'AUTH_SALT',        'Q(7x#KEf.L0]Tgh1P{+|?yK@%h~gIl@R1p5SX$qF/5WiLPmY3U#-NOgZ,WPnq_Yt' );
define( 'SECURE_AUTH_SALT', '}r!dOvU.Zx47zXx5~3n/^.^+gIR255Nm/jF<B--$Du,.91^#J1`p<D5>IflXCL# ' );
define( 'LOGGED_IN_SALT',   'nT#i.1_2 `oU}8+f#wj{AmhcYIi(LrV:E~mc|>V:&riHl;{D(I/?oJ-g&y2^6Ev*' );
define( 'NONCE_SALT',       'j?$-c!:eeG48VOD3QX!^*d+[IHOx*8FE>/[w,4YwGwP~[%jLXmpfPc[lD=CS5n&L' );

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
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
