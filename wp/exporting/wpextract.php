<?php
/**
 * Used to extract Initial files to the server.
 * For updating the wpcontents and db use wpupdate.php
*/

define('URL_LOC', 'URL_LOC_DEF');
define('URL_LIVE', 'URL_LIVE_DEF');

define('DB_NAME', 'DB_NAME_DEF');
define('DB_USER', 'DB_USER_DEF');
define('DB_PASSWORD', 'DB_PASS_DEF');
define('DB_HOST', 'localhost');

function extract_wp() {
	$zip = new ZipArchive;
	$res = $zip->open( 'wp.zip' );
	if ( TRUE === $res ) {
	  echo $zip->extractTo( '.' );
	  $zip->close();
	  echo 'Wp extracted properly!<br />';
	} else {
	  echo 'wp failed!<br />';
	}
}

function extract_wp_content() {
	$zip = new ZipArchive;
	$res = $zip->open( 'wp-content.zip' );
	if ( TRUE === $res ) {
	  echo $zip->extractTo( 'wp-content/' );
	  $zip->close();
	  echo 'WP CONTENT extracted properly!<br />';
	} else {
	  echo 'wp CONTENT failed!<br />';
	}
}

function extract_search() {
	$zip = new ZipArchive;
	$res = $zip->open( 'search.zip' );
	if ( TRUE === $res ) {
	  echo $zip->extractTo( '.' );
	  $zip->close();
	  echo 'WP CONTENT extracted properly!<br />';
# redirect to config page on success
	} else {
	  echo 'wp CONTENT failed!<br />';
	}
}

function extract_db() {
	$zip = new ZipArchive;
	$filename = 'db.sql';
	$res = $zip->open( $filename . '.zip' );
	if ( TRUE === $res ) {
		if ( 1 == $zip->extractTo( '.' ) ) {
			$zip->close();
			echo DB_NAME . '-DBextracted properly!<br />';

			mysql_connect( DB_HOST, DB_USER, DB_PASSWORD ) or die('Error connecting to MySQL server: ' . mysql_error());
			mysql_select_db( DB_NAME ) or die( 'Error selecting MySQL database: ' . mysql_error() );
			$templine = '';
			$lines = file($filename);
			$str_count =  0;
			echo URL_LOC;
			echo URL_LIVE;
			foreach ($lines as $line) {
//				echo $line .'<br /><br />';
// can be skipped if used the wp db export tool
//				$line = str_replace( URL_LOC, URL_LIVE, $line, $str_count );

				if (substr($line, 0, 2) == '--' || $line == '') {
				    continue;
				}
				$templine .= $line;
				if (substr(trim($line), -1, 1) == ';') {
				    mysql_query($templine) or print('Error performing query \'<strong>' . $templine . '\': ' . mysql_error() . '<br /><br />');
				    $templine = '';
				}
			}
			echo "Tables imported successfully from " . $filename . ' Occured: ' . $str_count;
		} else {
			echo 'DBextract error<br />';
		}

	} else {
	  echo 'DB unzip failed!<br />';
	}
}

function rename_config() {
	# will put error correction
	rename('wp-configUP.php' , 'wp-config.php');
}

//rename_config();
extract_wp();
extract_wp_content();
extract_search();
extract_db();

 ?>
