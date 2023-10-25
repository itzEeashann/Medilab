<?php
    include_once 'db.php';
    $sql = "DELETE FROM feedback WHERE feedbackid='" . $_GET["feedbackid"] . "'";
    if (mysqli_query($conn, $sql)) {
        echo ("<script LANGUAGE='JavaScript'> window.alert('Feedback has been removed sucessfully!'); window.location.href='homeadmin.php';</script>");
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
    mysqli_close($conn);
?>

