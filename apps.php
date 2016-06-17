<?php

require_once 'app/start.php';

if (!empty($_POST))
{
	$notifications = validate($_POST, [
		'name' => 'length-min:3|length-max:40',
		'phone' => 'length-min:3|length-max:40',
	]);

	if (count($notifications) > 0)
	{
		$_SESSION['notifications'] = $notifications;

		header('Location: ' . BASE_URL . '#contacts');
		die();
	}

	$sql = 'INSERT INTO apps (name, phone)
			VALUES (:name, :phone)';

	$insertApps = $db->prepare($sql);

	try {
		$insertApps->execute([
			'name' => $_POST['name'],
			'phone' => $_POST['phone'],
		]);
	} catch (PDOException $e) {
	    echo $e->getMessage();
	    // exit();
	}

	// echo '<pre>', print_r($_POST), '</pre>';

	$_SESSION['success'] = 'success';

	header('Location: ' . BASE_URL . '#contacts');
}
