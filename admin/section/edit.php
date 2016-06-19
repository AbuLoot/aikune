<?php

require '../../app/start.php';

if (!empty($_POST))
{
	$notifications = validate($_POST, [
		'id' => 'required|integer',
		'title' => 'length-min:3|length-max:30',
		'text' => 'required',
		'status' => 'integer',
	]);

	if (count($notifications) > 0)
	{
		$_SESSION['notifications'] = $notifications;

		header('Location: ' . $_SERVER['HTTP_REFERER']);
		die();
	}

	$sql = 'UPDATE section
			SET title = :title,
				text = :text,
				status = :status
			WHERE id = :id';

	$updateSection = $db->prepare($sql);

	try {
		$updateSection->execute([
			'id' => (int) $_POST['id'],
			'title' => e($_POST['title']),
			'text' => html_entity_decode($_POST['text']),
			'status' => ($_POST['status'] == 1) ? 1 : 0,
		]);
	} catch (PDOException $e) {
	    echo $e->getMessage();
	    exit();
	}

	header('Location: ' . BASE_URL . '/admin/section/index.php');
}

if (!isset($_GET['id']))
{
	header('Location: ' . BASE_URL . '/admin/section/index.php');
	die();
}

$sql = 'SELECT id, title, text, status
		FROM section
		WHERE id = :id';

$item = $db->prepare($sql);
$item->execute(['id' => (int) $_GET['id']]);
$item = $item->fetch(PDO::FETCH_ASSOC);

// $scripts = ['tinymce.php'];

require VIEW_ROOT . '/admin/section/edit.php';