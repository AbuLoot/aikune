<?php

require '../../app/start.php';

if (isset($_GET['id']))
{
	$sql = 'DELETE FROM apps
			WHERE id = :id';

	$deleteApp = $db->prepare($sql);
	$deleteApp->execute(['id' => (int) $_GET['id']]);
}

header('Location: ' . BASE_URL . '/admin/apps/index.php');
