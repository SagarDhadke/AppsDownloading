WP-APPBOX ERRORLOG
		
==============================================================
		
Plugin version: <?php echo( WPAPPBOX_PLUGIN_VERSION ); ?>&#013;
Installed version: <?php echo( get_option('wpAppbox_pluginVersion') ); ?>&#013;
Database version: <?php echo( get_option('wpAppbox_dbVersion') ); ?>&#013;
Apps in cache: <?php echo( wpAppbox_countCachedApps() ); ?>&#013;

WordPress version: <?php echo( bloginfo('version') ); ?>&#013;
WordPress URL: <?php echo( bloginfo('wpurl') ); ?>&#013;
Site URL: <?php echo( bloginfo('url') ); ?>&#013;
SSL activated: <?php echo( ( is_ssl() ? 'yes' : 'no') ); ?>&#013;

PHP version: <?php echo( phpversion() ); ?>&#013;
cURL activated: <?php echo( ( function_exists('curl_version') ? 'yes' : 'no') ); ?>&#013;
allow_url_fopen activated: <?php echo( ( ini_get('allow_url_fopen') ? 'yes' : 'no') ); ?>&#013;
Server IP: <?php echo( $_SERVER['SERVER_ADDR'] ); ?>&#013;
Server Port: <?php echo( $_SERVER['SERVER_PORT'] ); ?>&#013;
<?php if ( function_exists('curl_version') ) {
	$ch = curl_init();
	curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false );
	curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
	curl_setopt( $ch, CURLOPT_URL, 'https://api.ip2country.info/ip?' . $_SERVER['SERVER_ADDR'] );
	$result = curl_exec( $ch );
	curl_close( $ch );
	$json = json_decode( $result );
	print_r( 'IP2Country: ' . $json->countryCode . ' // ' . $json->countryCode3 . ' // ' . $json->countryName . '&#013;' );
	print_r( '* https://api.ip2country.info/ip?' . $_SERVER['SERVER_ADDR'] . ' *&#013;&#013;' );
} ?>

==============================================================

defaultStyle => <?php echo( get_option( 'wpAppbox_defaultStyle' ) ); ?>&#013;
colorfulIcons => <?php echo( ( get_option('wpAppbox_colorfulIcons') ? 'true' : 'false') ); ?>&#013;
showRating => <?php echo( ( get_option('wpAppbox_showRating') ? 'true' : 'false') ); ?>&#013;
nofollow => <?php echo( ( get_option('wpAppbox_nofollow') ? 'true' : 'false') ); ?>&#013;
targetBlank => <?php echo( ( get_option('wpAppbox_targetBlank') ? 'true' : 'false') ); ?>&#013;

cacheTime => <?php echo( get_option( 'wpAppbox_cacheTime' ) ); ?> minutes&#013;
cacheMode => <?php echo( get_option( 'wpAppbox_cacheMode' ) ); ?>&#013;
blockMissing => <?php echo( ( get_option('wpAppbox_blockMissing') ? 'true' : 'false') ); ?>&#013;
blockMissingTime => <?php echo( get_option( 'wpAppbox_blockMissingTime' ) ); ?> minutes&#013;
cachePlugin => <?php echo( get_option( 'wpAppbox_cachePlugin' ) ); ?>&#013;

imgCache => <?php echo( ( get_option('wpAppbox_imgCache') ? 'true' : 'false') ); ?>&#013;
imgCache => <?php echo( wpAppbox_imageCache::checkImageCache( true ) ); ?>&#013;
imgCacheMode => <?php print_r( get_option('wpAppbox_imgCacheMode') ); ?>&#013;
imgCacheDelay => <?php echo( ( get_option('wpAppbox_imgCacheDelay') ? 'true' : 'false') ); ?>&#013;
imgCacheDelayTime => <?php echo( get_option( 'imgCacheDelayTime' ) ); ?> hours&#013;
imgProxy => <?php echo( ( get_option('wpAppbox_imgProxy') ? 'true' : 'false') ); ?>&#013;

<?php if ( 'cronjob' == get_option( 'wpAppbox_cacheMode' ) ): ?>
cronIntervall => <?php echo( get_option('wpAppbox_cronIntervall') ); ?> minutes&#013;
cronCount => <?php echo( get_option('wpAppbox_cronCount') ); ?> apps at once&#013;
<?php endif; ?>

<?php foreach( $wpAppbox_storeNames as $storeID => $storeName ) {
	if ( !in_array( $storeID, $wpAppbox_storeURL_noLanguages ) ) {
		echo( $storeName . ' => ' );
		echo( get_option( 'wpAppbox_storeURL_' . $storeID ) == '0' ) ? get_option('wpAppbox_storeURL_URL_' . $storeID) : $wpAppbox_storeURL[$storeID][get_option( 'wpAppbox_storeURL_' . $storeID )];
		echo( '&#013;' );
	}
} ?>&#013;
affiliateAmazonDev => <?php echo( ( get_option('wpAppbox_affiliateAmazonDev') ? 'true' : 'false') ); ?>&#013;
affiliateMicrosoftDev => <?php echo( ( get_option('wpAppbox_affiliateMicrosoftDev') ? 'true' : 'false') ); ?>&#013;

autoLinks => <?php echo( ( get_option('wpAppbox_autoLinks') ? 'true' : 'false') ); ?>&#013;
anonymizeLinks => <?php echo( ( get_option('wpAppbox_anonymizeLinks') ? 'true' : 'false') ); ?>&#013;
includeCSS => <?php echo( get_option('wpAppbox_includeCSS') ); ?>&#013;
disableDefer => <?php echo( ( get_option('wpAppbox_disableDefer') ? 'true' : 'false') ); ?>&#013;
disableFonts => <?php echo( ( get_option('wpAppbox_disableFonts') ? 'true' : 'false') ); ?>&#013;
curlTimeout => <?php echo( get_option( 'wpAppbox_curlTimeout' ) ); ?> seconds&#013;
eOnlyAuthors => <?php echo( ( get_option('wpAppbox_eOnlyAuthors') ? 'true' : 'false') ); ?>&#013;
eOutput => <?php echo( ( get_option('wpAppbox_eOutput') ? 'true' : get_option('wpAppbox_eOutput') ) ); ?>&#013;
is_ssl() => <?php echo( ( is_ssl() ? 'true' : 'false') ); ?>&#013;
forceSSL => <?php echo( ( get_option('wpAppbox_forceSSL') ? 'true' : 'false') ); ?>&#013;

==============================================================

<?php 
if ( !function_exists( 'get_plugins' ) ) require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
$activePluginsO = get_option('active_plugins');
$allPlugins = get_plugins();
$activatedPlugins = array();
foreach ( $activePluginsO as $p ){           
    if ( isset( $allPlugins[$p] ) ) array_push( $activatedPlugins, $allPlugins[$p] );           
}
foreach ( $activatedPlugins as $p ){   
	print_r( $p['Name'] . ' v' . $p['Version'] . ' (' . $p['PluginURI'] . ') ' . '&#013;' );                
}
?>

&#013;==============================================================

<?php 
	global $wpdb;
	foreach ( $wpdb->get_col( 'DESC ' . wpAppbox_databaseName(), 0 ) as $column_name ) {
		print_r( $column_name . '&#013;' );
	}
?>