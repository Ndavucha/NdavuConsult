<?php

if(!empty($_POST["submit"])) {
	
	$email = $_POST["email"];

	$conn = mysql_connect("localhost","root","contact_form");
	mysql_select_db("contact_form",$conn);
	mysql_query("INSERT INTO tbl_contact ( email) VALUES ('" . $email. "')");
	$insert_id = mysql_insert_id();
	if(!empty($insert_id)) {
	$message = "Successfully Added.";
	}
}
?>
