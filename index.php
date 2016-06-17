<?php

require_once 'app/start.php';

$sql = 'SELECT id, title, text, status
		FROM section
		WHERE id = :id';

$item = $db->prepare($sql);
$item->execute(['id' => 1]);

try {
	$item = $item->fetch(PDO::FETCH_ASSOC);
} catch (Exception $e) {
	echo $e->getMessage();
	exit();
}

require VIEW_ROOT . '/content/main.php';