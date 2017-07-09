<?php
/**
 * Zip extractor.
 * TODO: try exporting db using the wp cli to see if theme options are missing
*/

define('URL_LOC', 'URL_LOC_DEF');
define('URL_LIVE', 'URL_LIVE_DEF');

define('DB_NAME', 'DB_NAME');
define('DB_USER', 'DB_USER');
define('DB_PASSWORD', 'DB_PASSWORD');
define('DB_HOST', 'localhost');

echo 'From: ' . DB_NAME . '<br />';

$filename = 'db2.sql';

if ( sqlextract( $filename ) ) {
	echo 'ecxtracted: ' . $filename;
} else {
	echo 'error';
}


/**
 * Should be a zipfile $dbfile.
 */
function extract_db( $dbfile ) {
	$zip = new ZipArchive;
	$filename = $dbfile;
	$res = $zip->open( $filename . '.zip' );
	var_dump($res);
	if ( TRUE === $res ) {

		echo '<br>unzipped<br>';
		if ( 1 == $zip->extractTo( '.' ) ) {
			$zip->close();
			echo DB_NAME . '-DBextracted properly!<br />';

			mysql_connect( DB_HOST, DB_USER, DB_PASSWORD ) or die('Error connecting to MySQL server: ' . mysql_error());
			mysql_select_db( DB_NAME ) or die( 'Error selecting MySQL database: ' . mysql_error() );
			$templine = '';
			$lines = file($filename);
			$str_count =  0;
			// echo URL_LOC;
			// echo URL_LIVE;
			foreach ($lines as $line) {
//				echo $line .'<br /><br />';

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
			return true;
		} else {
			echo 'DBextract error<br />';
			return false;
		}

	} else {
	  echo 'DB unzip failed!<br />';
	  return false;
	}
}

function sqlextract( $filename ) {

		mysql_connect( DB_HOST, DB_USER, DB_PASSWORD ) or die('Error connecting to MySQL server: ' . mysql_error());
		mysql_select_db( DB_NAME ) or die( 'Error selecting MySQL database: ' . mysql_error() );
		$templine = '';
		$lines = file($filename);
		$str_count =  0;
		// echo URL_LOC;
		// echo URL_LIVE;
		foreach ($lines as $line) {
//				echo $line .'<br /><br />';
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
		return true;

}




function cleanup_wp() {
	unlink( 'wp-content.zip' );
	unlink( 'db.sql.zip' );
	unlink( 'db.sql' );
	unlink( 'wpupdate.php' );
	echo '<br /><br />All uploaded files are deleted!';
}

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
	  return true;
	} else {
	  echo 'wp CONTENT failed!<br />';
	  return false;
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

function clear_db() {
	mysql_connect( DB_HOST, DB_USER, DB_PASSWORD ) or die('Error connecting to MySQL server: ' . mysql_error());
	mysql_select_db( DB_NAME ) or die( 'Error selecting MySQL database: ' . mysql_error() );


}



function rename_config() {
	# will put error correction
	rename('wp-configUP.php' , 'wp-config.php');
}

//rename_config();
//extract_wp();

 ?>
