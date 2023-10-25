<?php
    include_once 'db.php';
    $sql = "DELETE FROM appointment_details WHERE ap_id='" . $_GET["ap_id"] . "'";
    if (mysqli_query($conn, $sql)) {
        echo ("<script LANGUAGE='JavaScript'> window.alert('Appointment has been removed sucessfully!'); window.location.href='homeadmin.php';</script>");
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
    mysqli_close($conn);
?>

