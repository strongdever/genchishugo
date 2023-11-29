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
define( 'DB_NAME', 'genchishugo' );

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
define( 'AUTH_KEY',         '[ABXJu-Fv!d%PX[LIZ),dm;Jw$Ns!AevpqO+w2=G*[SJF|>aLUqtO=` $sd.SCzv' );
define( 'SECURE_AUTH_KEY',  'TV{>Qwh1g]c]`-vc|Ro9H]fqW{j)CeACjyq5nUH}8C!X]AI}5/nc%9$>5xXHsXdB' );
define( 'LOGGED_IN_KEY',    '@-@a*sO{{B@F:WjrHdNOIUk^`)vCw?+vwQ6y9-f9izh2><uNs:vLYA:%Fi*)ROD1' );
define( 'NONCE_KEY',        'u@k1p>VC~WoAK=.;FkGEG2nhxJG4W31hykiQ5S<&NSn%kSgr~Dx[uA^>5VB#_dk4' );
define( 'AUTH_SALT',        'v(H&-GUMMVI{qW#Sg>}z6CMn<m>?p0ig3@~Ghm-%~wV73c^}6aHQlWLXDY(j_5yr' );
define( 'SECURE_AUTH_SALT', '&L>^ZRAo(nwZyNoj_>nX8[A,*`^n&jiLBp=dt?F3.9DW>n0RLjbL&bG7jU} 7aZF' );
define( 'LOGGED_IN_SALT',   'U@9yNBvMiK9-iR[{LaA?e!0?B_B{(X9)v@[+H!ZqDQc{|K>DNZVns}Xm4PCEP8VN' );
define( 'NONCE_SALT',       'H-E^k1t#+wr?d]@Mn.@E(Y!SgW&4GPm~rH63!r@>,q/[KP`wd2|xs+OKze6o=G8;' );

/**#@-*/

/**
 * WordPress database table prefix.
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
