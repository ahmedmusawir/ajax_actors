<?php
require("config.php");

function connect() {
	global $pdo;

	try{

		$pdo = new PDO("mysql:host=".DB_SERVER.";dbname=".DB_NAME.";charset=utf8", DB_USER, DB_PASS);
		$pdo->exec("set names utf8");
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
	}
	catch(PDOException $pe)
	{
	  die('Connection error, because: ' .$pe->getMessage());
	}
}
// function connect() {
// 	global $pdo;
// 	$pdo = new PDO("mysql:host=localhost;dbname=htmlcssj_sakila", "htmlcssj_root", "Keya5392");
// }

function isXHR () {
	return isset($_SERVER['HTTP_X_REQUESTED_WITH']);
}

function get_actors_by_last_name($letter) {
	global $pdo;

	$stmt = $pdo->prepare('
	SELECT actor_id, first_name, last_name 
	from actor
	WHERE last_name LIKE :letter
	LIMIT 50');

	$stmt->execute( array(':letter' => $letter . '%'));

	return $stmt->fetchAll( PDO::FETCH_OBJ );

}

function get_info_by_id($actor_id) {
	global $pdo;

	$stmt = $pdo->prepare('
	SELECT film_info, first_name, last_name 
	from actor_info
	WHERE actor_id LIKE :actor_id
	LIMIT 50');

	$stmt->execute( array(':actor_id' => $actor_id));

	return $stmt->fetchAll( PDO::FETCH_OBJ );

}