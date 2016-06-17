<?php

require '../../app/start.php';

$sql = 'SELECT id, title, text, status
		FROM section';

$section = $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);

// echo '<pre>', print_r($section), '</pre>';
// exit();

require VIEW_ROOT . '/admin/section/index.php';
