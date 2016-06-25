<?php

require_once 'app/start.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

	$notifications = validate($_POST, [
		'name' => 'length-min:3|length-max:60',
		'phone' => 'length-min:3|length-max:60',
	], 'ru');

	if (count($notifications) > 0) {

		$_SESSION['notifications'] = $notifications;

		if (isset($_POST['first-form'])) {
			header('Location: ' . BASE_URL . '#app');
		} else {
			header('Location: ' . BASE_URL . '#contacts');
		}

		die();
	}

	$sql = 'INSERT INTO apps (name, phone)
			VALUES (:name, :phone)';

	$insertApp = $db->prepare($sql);

	try {
		$insertApp->execute([
			'name' => clear_data($_POST['name']),
			'phone' => clear_data($_POST['phone']),
		]);
	} catch (PDOException $e) {
	    echo $e->getMessage();
	}

    $name = clear_data($_POST["name"]);
    $phone = clear_data($_POST["phone"]);

    // Set the recipient email address.
    // FIXME: Update this to your desired email address.
    // aikune.centr@gmail.com
    $recipient = "is.adilet@mail.ru, olsalogistics@mail.ru, adetbekov222@gmail.com, elmirok_89@mail.ru";

    // Set the email subject.
    $subject = "Новая заявка от $name";

    // Build the email content.
    $content = "<h2>Aikune.kz</h2>";
    $content .= "<b>Имя: $name</b><br>";
    $content .= "<b>Номер: $phone</b><br>";
    $content .= "<b>Дата: " . date('Y-m-d') . "</b><br>";
    $content .= "<b>Время: " . date('G:i') . "</b><br>";

	$headers = "From: Aikune.kz < email >\r\n" .
               "MIME-Version: 1.0" . "\r\n" . 
               "Content-type: text/html; charset=UTF-8" . "\r\n"; 

    // Send the email.
    if (mail($recipient, $subject, $content, $headers)) {

        // Set a 200 (okay) response code.
        http_response_code(200);

		$_SESSION['success'] = 'success';

		if (isset($_POST['first-form'])) {
			header('Location: ' . BASE_URL . '#app');
		} else {
			header('Location: ' . BASE_URL . '#contacts');
		}

		exit();
    }
    else {

        // Set a 500 (internal server error) response code.
        http_response_code(500);
        echo "Oops! Something went wrong and we couldn't send your message.";
        exit();
    }
}

header('Location: ' . BASE_URL . '#contacts');