#!/usr/bin/php
<?php

function initCurl( $url )
{
	$ch = curl_init();  

	// set URL and other appropriate options  
	curl_setopt( $ch, CURLOPT_URL, $url );  
	curl_setopt( $ch, CURLOPT_HEADER, 0 );  
	curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );  

	// grab URL and pass it to the browser  
	$output = curl_exec( $ch );  

	// close curl resource, and free up system resources  
	curl_close( $ch );  

	return $output;
}

$interface = initCurl( "http://169.254.169.254/latest/meta-data/network/interfaces/macs/" );  
$subnetId = initCurl( "http://169.254.169.254/latest/meta-data/network/interfaces/macs/${interface}/subnet-id" );
$vpcId = initCurl( "http://169.254.169.254/latest/meta-data/network/interfaces/macs/${interface}/vpc-id" );

echo $vpcId;
