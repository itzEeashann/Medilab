<?php
include_once 'db.php';
if(isset($_POST['submit']))
{	 
	$name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $date = $_POST['date'];
    $department = $_POST['department'];
    $doctor = $_POST['doctor'];


	 $sql = "INSERT INTO appointment_details (name,email,phone,date,department,doctor)
	 VALUES ('$name','$email','$phone','$date','$department','$doctor')";
	 if (mysqli_query($conn, $sql)) {
		echo ("<script LANGUAGE='JavaScript'> window.alert('Your appointment request has been sent successfully. Thank you!'); window.location.href='homecustomer.php';</script>");
	 } else {
		echo "Error: " . $sql . "
" . mysqli_error($conn);
	 }
	 mysqli_close($conn);
}
?>