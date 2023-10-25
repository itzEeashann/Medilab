<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = $_POST["username"];
    $password = $_POST["password"];
    $role = $_POST["role"];

    if($username == "" || $password == "" || $role == ""){
    echo ("<script LANGUAGE='JavaScript'> window.alert('Please fill out all the column!'); window.location.href='login.php#'; </script>");
    }else{
        $conn = mysqli_connect("localhost", "root", "", "appointment");

    if(!$conn){
      die("Could not connect to database: " . mysqli_connect_error());
    }

    $stmt = mysqli_prepare($conn, "INSERT INTO accounts (username,password, role) VALUES (?, ?, ?)");
    mysqli_stmt_bind_param($stmt, "sss", $username, $password, $role);

    if(mysqli_stmt_execute($stmt)){
      echo ("<script LANGUAGE='JavaScript'> window.alert('Successfully Registered'); window.location.href='login.php';</script>");
      } else {
        echo "Error registering: " . mysqli_stmt_error($stmt);
      }
  
      mysqli_stmt_close($stmt);
      mysqli_close($conn);
    }
  }
?>
<body>
    <link href="assets/css/login.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" crossorigin="anonymous"></script>
    <script></script>
    <div class="wrapper">
        <div class="text-center mt-4 name">
        Register!
        </div>
        <form class="p-3 mt-3" action="" method="POST">
            <div class="form-field d-flex align-items-center">
                <span class="far fa-user"></span>
                <input type="text" name="username" id="username" placeholder="Username">
            </div>
            <input type="role" name="role" id="role" placeholder="role" value="customer" hidden>
            <div class="form-field d-flex align-items-center">
                <span class="fas fa-key"></span>
                <input type="password" name="password" id="password" placeholder="Password">
            </div>
            <button class="btn mt-3" name="submit">Sign Up</button>
        </form>
        <div class="text-center fs-6">
            <a href="login.php">Sign In</a>
        </div>
    </div>
</body>