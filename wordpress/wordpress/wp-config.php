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
define('DB_NAME', 'aprendiendo-wp');

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
define('AUTH_KEY',         'aRpk|~CT0<ilV71[{avT;u[3.|@vcX3O=k5LU0oK}Cl6;SA)l3ex:4VN#s[y;KR;');
define('SECURE_AUTH_KEY',  'TE)}GGB:UjabyX!5A[+8@gH9DaX!dD^dtK^f;V5IH2!F=I%6y9[i^jo+}z(MmTm2');
define('LOGGED_IN_KEY',    'hhsi*.DR#w&SnOq<U#Hv)U1GTvNf]ak~*I x_]C)M{rk*o}nBy(W2qmL;yb&1=K!');
define('NONCE_KEY',        'h+JYaoCs -sEeSFP1R^;~u BeOaJJ2GJ,}I!M/Zs`B0g4T;ai!En;j%ga7u!5&Ui');
define('AUTH_SALT',        '>t 6S::2(R0o9#L.j|*GA4x5A-BL>QwAnY5bEJa%#kj1`3Jj|-~VxF<U[)1-Vm}B');
define('SECURE_AUTH_SALT', 'djs-79e9-_`fvS$b1>n;eI`lkO;vm#,Z]J;w/?Fe>&w#7UUM]Y7JjS.s}|CR#ZeY');
define('LOGGED_IN_SALT',   '/Ax@3&|L;j/m|vulDU!>^?&xj|y7Q]$,uEDD$H`3W?6pU/3s]RtU35aGbhcV.sWp');
define('NONCE_SALT',       ':N<,H/qyKt=G*PMlwCXjbG+x)Jz,rD(f5(&i/4W0nrR/E27XVt4tO+ZA[R4kAA]<');

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
