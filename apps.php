<?php

require_once 'app/start.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

	$notifications = validate($_POST, [
		'name' => 'length-min:3|length-max:40',
		'phone' => 'length-min:3|length-max:40',
	], 'ru');

	if (count($notifications) > 0) {

		$_SESSION['notifications'] = $notifications;

		header('Location: ' . BASE_URL . '#contacts');
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
    $recipient = "is.adilet@mail.ru";
    // aikune.centr@gmail.com
    // olsalogistics@mail.ru

    // Set the email subject.
    $subject = "Новая заявка от $name";

    // Build the email content.
    $email_content = "Имя: $name\n Номер: $phone\n";

    // Send the email.
    if (mail($recipient, $subject, $email_content)) {

        // Set a 200 (okay) response code.
        http_response_code(200);

		$_SESSION['success'] = 'success';

		header('Location: ' . BASE_URL . '#contacts');
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