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
define( 'DB_NAME', 'local' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'OzdmOpo8gHBYY3Q5wm/Ha/qGdmKf0+04WdA/QlmdKew0Mn+O2grAevU6L2d+/isXv5J47TvklNBykVpodn/0og==');
define('SECURE_AUTH_KEY',  'jSoiuudLapakQ5zhBcdAYrcBPURSbeIISYHBgzGw2fkl93LienxAVxkxgRZHpryFFk9634VsDvksVeG0qcL96g==');
define('LOGGED_IN_KEY',    'em4U79INRM6bnzCADs25H1XCAONPYkswTQS/eGmPR7W9xHwlADC9LOJnu2DsMZP/cWsCtg8dI4VcmjdnTmsluQ==');
define('NONCE_KEY',        'ORRCQ5Qk4bpJsEZVPVqB46tkwqap68pcdz/aLFRR2UKTLfsLoHHE+Jm5MmQNlylfGp5mpSX9AjaQ53wStLI4tQ==');
define('AUTH_SALT',        'Qx9alWM75taCi4AdXQOib0HA75m2X9JGrlaHS7RyV/VoDI2BRoormkH5otjvuMtMewppoQuTq7hLzij9HcDfCQ==');
define('SECURE_AUTH_SALT', 'kZbIB3i6xRjwBVo6zenQ/avGn6QBgvat9z/UlyDVSPd1wawgNDohekGgyoDj0KssvWZtfnq927ZFrWxMY2D5Kg==');
define('LOGGED_IN_SALT',   '1em2W1sQO4YIF3D7ewsSRx+j/3L7aflrga36i7vngsgWYxOt2ohURGc8pbZK0inGBC9KNud0WAcd6iQvBmmuDQ==');
define('NONCE_SALT',       'BwGxFQlaXldD3nuidisDOjbC/LIMcOOrpeykPqZqmHCqfxC42O3M/ETnat/JQ+b1nC950G+xIogmglgfUNOI8w==');

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';




/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
