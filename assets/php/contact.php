<?php

	// Mail settings
	$to      = "alana_garrett@att.net";
	$subject = "AG Design - Contact Us Submission";

	// You can put here your email
	$header = "From: alana_garrett@att.net";
	$header.= "MIME-Version: 1.0\r\n";
	$header.= "Content-Type: text/plain; charset=utf-8\r\n";
	$header.= "Priority: Urgent\r\n";

	if (isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["message"])) {

		$content  = "Name: "     . $_POST["name"]    . "\r\n";
		$content .= "Email: "    . $_POST["email"]   . "\r\n";
		$content .= "Telephone: ". $_POST["telephone"]. "\r\n";
		$content .= "Services: "    . $_POST["services"]   . "\r\n";
		$content .= "Budget: "    . $_POST["budget"]   . "\r\n";
		$content .= "Deadline: "    . $_POST["deadline"]   . "\r\n";
		$content .= "Message: "  . "\r\n" . $_POST["message"];

		if (mail($to, $subject, $content, $header)) {

			$result = array(
				"message"    => "Thanks for contacting us.",
				"sendstatus" => 1
			);

			echo json_encode($result);

		} else {

			$result = array(
				"message"    => "Sorry, something is wrong.",
				"sendstatus" => 0
			);

			echo json_encode($result);

		}

	}

?>