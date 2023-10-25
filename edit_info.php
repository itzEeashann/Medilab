<?php
    $conn=mysqli_connect("localhost","root","");
    $db=mysqli_select_db($conn,'appointment');
    if(isset($_POST['submit']))
    {
        $ap_id=$_POST['ap_id'];
        $query="UPDATE appointment_details SET email='$_POST[email]', phone='$_POST[phone]', date='$_POST[date]', department='$_POST[department]', doctor='$_POST[doctor]' WHERE ap_id='$_POST[ap_id]'";
        if (mysqli_query($conn,$query)) {
            echo ("<script LANGUAGE='JavaScript'> window.alert('Updated!'); window.location.href='homeadmin.php';</script>");
        } else {
            echo "Error: " . $query . "
    " . mysqli_error($conn);
        }
        mysqli_close($conn);
    }
?>