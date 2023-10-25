<?php
	include('db.php'); 
	if (isset($_POST['approve'])){
		$ap_id = $_POST['ap_id'];
		$sql = "UPDATE appointment_details SET status='Rejected' WHERE ap_id = '$ap_id'";
		$run = mysqli_query($conn,$sql);
		if($run == true){
			
			echo "<script> 
					alert('Appointment Rejected Successfully');
					window.open('homeadmin.php','_self');
				  </script>";
		}else{
			echo "<script> 
			alert('Appointment was not Rejected');
			</script>";
		}
	}
 ?>