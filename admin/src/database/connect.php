<?php 

include 'config.php'; 

$dsn = 'mysql:host=' . DB_HOST .';dbname=' . DB_NAME;

try {
	
	$db = new PDO($dsn, DB_USER, DB_PASSWORD);
	
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
} catch (PDOException $e) {
	
	echo 'Error';
	
}
