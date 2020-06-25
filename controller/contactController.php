<?php

  /******************************
 * ----- LOAD CONTACT PAGE ----*
******************************/

/*
	Get all inputs in the contact form and send a mail to 'contact@codflix.com'

	A message warns the user that his message has been sent. Then send him back to the home page.
*/


function contactPage() {


	if (!empty($_POST)) {
		$mail = htmlentities($_POST['email']);
	    $message = htmlentities($_POST['message']);
	    $name = htmlentities($_POST['name']);

	    $headers = "'FROM: ". $mail."'";

	    $newMail = mail('contact@codflix.com', 'Formulaire de contact', $message, $headers);
	    echo "<script>alert('Votre message nous a été transmis'); window.location = 'index.php?action=mediaList';</script>";

	 
	}


	require_once("view/contact.php");

}