<?php

require '../../app/start.php';

$sql = 'SELECT id, name, phone
		FROM apps
		GROUP BY id DESC';

$apps = $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);

require VIEW_ROOT . '/admin/apps/index.php';
