<?php 
session_start();
 
$testconfig = mysqli_connect('localhost', 'root', '', 'appointment');
 
$username = $_POST['username'];
$password = $_POST['password'];
 
 
$login = mysqli_query($testconfig,"select * from accounts where username='$username' and password='$password'");
$cek = mysqli_num_rows($login);

if($cek > 0){
 
	$data = mysqli_fetch_assoc($login);
 
	if($data['role']=="Admin"){
 
		$_SESSION['username'] = $username;
		$_SESSION['role'] = "Admin";
		header("location:homeadmin.php");

	}elseif($data['role']=="customer"){
		$_SESSION['username'] = $username;
		$_SESSION['role'] = "customer";
		header("location:homecustomer.php");
	}
	else
	{
		
	echo ("<script LANGUAGE='JavaScript'> window.alert('Wrong Credential'); window.location.href='login.php';</script>");
	}	

}else{
	echo ("<script LANGUAGE='JavaScript'> window.alert('Wrong Credential'); window.location.href='login.php';</script>");
}

?>