<?php
// This gets a zip file from another server

$url = "http://path.com/file.zip";
$fh = fopen(basename($url), "wb");
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_FILE, $fh);
curl_exec($ch);
curl_close($ch);

?>
