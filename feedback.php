<?php
include_once 'db.php';
if(isset($_POST['submit']))
{	 
	$message = $_POST['message'];

	 $sql = "INSERT INTO feedback (message)
	 VALUES ('$message')";
	 if (mysqli_query($conn, $sql)) {
		echo ("<script LANGUAGE='JavaScript'> window.alert('Your feedback has been sent successfully. Thank you!'); window.location.href='homecustomer.php';</script>");
	 } else {
		echo "Error: " . $sql . "
" . mysqli_error($conn);
	 }
	 mysqli_close($conn);
}
?>