<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'news' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'jE,_sE,8KaIuQYbTbrT]+sAx4Vt_Q_Kcoq$g/1O;n?syV&3Dx>YTh)qO31&k6s2F' );
define( 'SECURE_AUTH_KEY',  '+>D}2<I^e7-MRVkSY pbNxagA|7gNnaZsB)+3$[?sLe|}|!|9ux4}eAD6nbM^Sk=' );
define( 'LOGGED_IN_KEY',    '5lF53Yl.)@~U|TO?<l hlNdi>qIA6N `#Bw3%nXMJ>.lI)5BSfwLD3&XgMbneT[{' );
define( 'NONCE_KEY',        '^.2/`s4Bn]q?4R1S[uOm$({reodcoqD{-5Q].b8d:`F3.!Q[pt5G=C]o?]#,KT-o' );
define( 'AUTH_SALT',        '{xN!UOj}eI|<w2_Tkq_4eHvtZWp) |QhCI`wcC?)m_]V{7JO$U@tklRsyDL/2AME' );
define( 'SECURE_AUTH_SALT', '_Wsu8}qMD^o~Vi#oAoLZze8/x;1TtYe0bkMmP$L2lD37`KWb7fAUbR0UGUX^#?:j' );
define( 'LOGGED_IN_SALT',   'Ce1*Zj[3_>-bxQ%i<<-fbkZ:#]O jJii<+{JM|pmiSg!]_t?7F37C.}p={N9hM<E' );
define( 'NONCE_SALT',       '`UPwJz>BmC Bk(9_L!IH6_Z@2aogJ&A:g;uZcBE<69C^e[+%;q!h=u rt<M |+u3' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'news_';

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
