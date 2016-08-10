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
define('DB_NAME', 'zabala_wp');

/** MySQL database username */
define('DB_USER', 'zabala_wp');

/** MySQL database password */
define('DB_PASSWORD', 'uHQe4mDu6VJQbQbj');

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
 * You can generate these using the {@link  WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'L#kC/n21D>~HVvIbfo.I%b9U>12a,%(TQFG4*NKo720Ry||-xU76,zBCSd1+3|:W');
define('SECURE_AUTH_KEY',  '=+3h$EL=t-FKx^21|?9`-G|oD$&%O1GG~Q.Vb{dF[)]K8tHu-4/sg#l!N PmCvnK');
define('LOGGED_IN_KEY',    '`hB**E1y#K3*VixBe~L34 ~cT%yzxC}FX|(Hamm0S:oJ/6h`tRyv|@$I|%6i3`Jb');
define('NONCE_KEY',        'GSK{{L^-%_IT_{P^~Y&h-F64O&/4S)W+t^}EE;D+d.*lHjwqVG,`pJA8?h:BQc-_');
define('AUTH_SALT',        '`/}s865eA=~:+,Dy_}gdm{1bjhLd^q)|>j|!@O35T--uhFYqH{zOPS@=4ZziU|(%');
define('SECURE_AUTH_SALT', '^HIf?O_r~d($oT}EPeu`o~SVNWO/2!2^l:TY[g(r*Ro vFMY6vwp`59|?(ls|A+z');
define('LOGGED_IN_SALT',   't&pRnM>+$SPs]|?^R&bn?7K^de-t27{d.t3ZF)u;#XeE,M+0kp2LxZEZ6{*!(RV+');
define('NONCE_SALT',       '}?-3=<5B}b_g[M*k[T>gFCA}1 l_TLwJq=lsFl$$2N4~lS;~o$f1xMSJv!Ia(/S;');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please! wag wp kasi aram na yan kang ppls
 */
$table_prefix  = 'asshole_';

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
