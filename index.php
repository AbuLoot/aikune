<?php

require_once 'app/start.php';

// ОТЗЫВЫ И РЕЗУЛЬТАТЫ НАШИХ ПАЦИЕНТОВ
$sql = 'SELECT id, title, text, status
		FROM section
		WHERE id = :id';

$reviews = $db->prepare($sql);
$reviews->execute(['id' => 3]);

try {
	$reviews = $reviews->fetch(PDO::FETCH_ASSOC);
} catch (Exception $e) {
	echo $e->getMessage();
}

// АКЦИИ И СКИДКИ
$sql = 'SELECT id, title, text, status
		FROM section
		WHERE id = :id';

$shares = $db->prepare($sql);
$shares->execute(['id' => 1]);

try {
	$shares = $shares->fetch(PDO::FETCH_ASSOC);
} catch (Exception $e) {
	echo $e->getMessage();
}

// FOOTER
$sql = 'SELECT id, title, text, status
		FROM section
		WHERE id = :id';

$footer = $db->prepare($sql);
$footer->execute(['id' => 2]);

try {
	$footer = $footer->fetch(PDO::FETCH_ASSOC);
} catch (Exception $e) {
	echo $e->getMessage();
}

require VIEW_ROOT . '/content/main.php';