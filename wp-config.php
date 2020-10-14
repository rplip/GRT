<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en « wp-config.php » et remplir les
 * valeurs.
 *
 * Ce fichier contient les réglages de configuration suivants :
 *
 * Réglages MySQL
 * Préfixe de table
 * Clés secrètes
 * Langue utilisée
 * ABSPATH
 *
 * @link https://fr.wordpress.org/support/article/editing-wp-config-php/.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define( 'DB_NAME', 'grt' );

/** Utilisateur de la base de données MySQL. */
define( 'DB_USER', 'grt' );

/** Mot de passe de la base de données MySQL. */
define( 'DB_PASSWORD', 'grt' );

/** Adresse de l’hébergement MySQL. */
define( 'DB_HOST', '192.168.64.2' );

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/**
 * Type de collation de la base de données.
 * N’y touchez que si vous savez ce que vous faites.
 */
define( 'DB_COLLATE', '' );

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clés secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'Gh_VTN3p}Ce^rsc+-si_B,pECun= DvwX+L}2}v?+0R/RZU/x_UU>f(->?(iPar>' );
define( 'SECURE_AUTH_KEY',  '`K<h3fFu}r<>#fx(&XZ3$ zx/P+Y1ZId;YzV]M{d;C6JIcYCzuuQs-9UZ70l=GDi' );
define( 'LOGGED_IN_KEY',    'KJL%/z8&/nrr!?mmt9=tS@Hoz4U~kFL^/PtP`8X%AFL8e$3D&/Tas0^Y2XJCuZ^w' );
define( 'NONCE_KEY',        'n*/Q$u0jfPYs^Q BJ&3qolfLbB(]k`#JR0=BKB$HwTvy>#-O8th}=sf:%zHs&D+*' );
define( 'AUTH_SALT',        'j+G@;7AN@[0c6yH7054s^Ah-v43p<l&{D{ZeC,<f;(PVHc4|TmX=bopNy@=?Kw|f' );
define( 'SECURE_AUTH_SALT', '5E)@#<M}YAH/Q)S56a+%zT`(|Bd3<F.RuNBY5N2EbQn[8kGxCI7kmvN|g;}9?o/a' );
define( 'LOGGED_IN_SALT',   'OFK5N/[O0Rs~dX8^@jfs=I|@{/8@DqXvz-g5(ut4:Z]1_&(u4aZMcooz<DW(I&)~' );
define( 'NONCE_SALT',       ' YzxT%D.S8p@7^;E`oK;;V%N%)[nKAQLS)@l$*OdJbOnu^Pd>7ZD%c_r[f6#.vOA' );
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix = 'wp_';

/**
 * Pour les développeurs : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortemment recommandé que les développeurs d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur le Codex.
 *
 * @link https://fr.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', true );
define( 'WP_DEBUG_DISPLAY', true );
define('FS_METHOD', 'direct');

/* C’est tout, ne touchez pas à ce qui suit ! Bonne publication. */

/** Chemin absolu vers le dossier de WordPress. */
if ( ! defined( 'ABSPATH' ) )
  define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once( ABSPATH . 'wp-settings.php' );
