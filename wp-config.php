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

$hostname = strtolower($_SERVER['SERVER_NAME']);
define('WOW_HOSTNAME', $hostname);

if ($hostname == 'wow4result.deployme.co.za'):

    define('DB_NAME', 'wow4result');
    define('DB_USER', 'wow4result');
    define('DB_PASSWORD', '0738AX7KXNbzxj64');
    define('DB_HOST', '129.232.204.123'); 
 
else:
    define('DB_NAME', 'wow_staging');
    define('DB_USER', 'root');
    define('DB_PASSWORD', '');
    define('DB_HOST', 'localhost');  

endif; 
/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

define('DISALLOW_FILE_EDIT', true);

/*define('WPMU_PLUGIN_DIR', WP_CONTENT_DIR . '/mu-plugins/mu-autoloader.php');
define('WPMU_PLUGIN_URL', WP_CONTENT_URL . '/mu-plugins' ); */

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'QcMh>3~HXh+!P[Bzb|DP;5AIQ-D#W!/BBYbJOM;w@*(,J+Q`[l{/w&JWRR.?!n}o');
define('SECURE_AUTH_KEY',  'eXh6/2ZHa?e.JB-U#bEf3W|MRcz9$:S5uJM+6-Nab~&L8+%F)hR/(r@M W]#zDGm');
define('LOGGED_IN_KEY',    'MTh}PS|~GO&?Bp%`vyh;>{Dn$cG8*9>t4sdr{8I(Tj-oEmHQ)D*TmBJWKL]Z?m3 ');
define('NONCE_KEY',        'lVA]|q}WrUI~<rS#C,>|`3we2&o9}|{n0&8^=L.VM1OQ8)[%V9)zHF^bGA<{3p^H');
define('AUTH_SALT',        'Ovkx*d2)[G@?zOzPj3)<M0t{-X!l=~6JZ;>=5V=NIEtWGB|U#)TjUj{Sh2D=+yfE');
define('SECURE_AUTH_SALT', '(*19WY(xCjEoCv/+97}$8iZb$mS*_n@~xb[<7vX@z-+f-w7;3[lRzhw1[ia/wU10');
define('LOGGED_IN_SALT',   '_sj Hc_#.-UCj<N&{q:+wHCw54;{K%y<(P.+2WMs6q70,v+5aE$3G_wNNS@>I3GI');
define('NONCE_SALT',       'P@}4H(c&Xg rhtj[gutzOjA ]K<P/jT?vkA0Ro(F[5SY?<^pBS-r*: HTuNu+3?!');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wow_';

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
