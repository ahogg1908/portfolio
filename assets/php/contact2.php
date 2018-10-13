<?php

	// Mail settings
	$from = "alana@alanagdesigns.com"; 
	$EmailTo = "alana_garrett@att.net";
	$subject = "AG Design - Contact Us Submission";

	// You can put here your email
	$header = "From: alana@alanagdesigns.com";
	$header.= "MIME-Version: 1.0\n";
	$header.= "Content-Type: text/plain; charset=utf-8\n";
	$header.= "Priority: Urgent\n";

	$name = $_POST['name'];
	$email = $_POST['email'];
	$tel = $_POST['tel'];
	$services = $_POST['services'];
	$budget = $_POST['budget'];
	$date = $_POST['date'];
	$message = $_POST['message'];

	if (isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["message"])) {
		
		$content  = "Name: "     . $_POST["name"]    . "\n";
		$content .= "Email: "    . $_POST["email"]   . "\n";
		$content .= "Tel: "		 . $_POST["tel"]	 . "\n";
		$content .= "Services: "    . $_POST["services"]   . "\n";
		$content .= "Budget: "    . $_POST["budget"]   . "\n";
		$content .= "Date: "    . $_POST["date"]   . "\n";
		$content .= "Message: "  . "\n" . $_POST["message"];

		
		if (mail($from, $to, $subject, $content, $header)) {

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