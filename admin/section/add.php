<?php

require '../../app/start.php';

if (!empty($_POST))
{
	$notifications = validate($_POST, [
		'title' => 'length-min:3|length-max:30',
		'text' => 'required',
		'status' => 'required|integer'
	]);

	if (count($notifications) > 0)
	{
		$_SESSION['notifications'] = $notifications;

		header('Location: ' . $_SERVER['HTTP_REFERER']);
		die();
	}

	$sql = 'INSERT INTO section (title, text, status)
			VALUES (:title, :text, :status)';

	$insertSection = $db->prepare($sql);

	try {
		$insertSection->execute([
			'title' => e($_POST['title']),
			'text' => e($_POST['text']),
			'status' => ($_POST['status'] == 1) ? 1 : 0,
		]);
	} catch (PDOException $e) {
	    echo $e->getMessage();
	    exit();
	}

	// echo '<pre>', print_r($_POST), '</pre>';

	header('Location: ' . BASE_URL . '/admin/section');
}

// $scripts = ['tinymce.php'];

require VIEW_ROOT . '/admin/section/add.php';