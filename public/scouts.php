<?php
session_start();

if(!isset($_SESSION['login']))
{
	header('location: login.php');
}

try{
	include __DIR__ . '/../includes/DatabaseConnection.php';
	include __DIR__ . '/../includes/DatabaseFunctions.php';

	$scouts = allScouts($pdo);

	$total = totalScouts($pdo);

	$title = 'All Scouts';

	ob_start();

	include __DIR__ . '/../templates/scouts.html.php';

	$output = ob_get_clean();
}

catch (PDOException $e) {
	$title = 'An error has occurred';

	$output = 'Database error: ' . $e->getMessage() . ' in ' .
		$e->getFile() . ":" . $e->getLine();
}

include __DIR__ . '/../templates/layout.html.php';