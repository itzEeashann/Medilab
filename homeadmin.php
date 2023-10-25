<!DOCTYPE html>
<?php 
	include('db.php'); 
	include('session.php'); 

	if (isset($_SESSION['username'])) {
		$result = mysqli_query($conn,"select * from accounts where username='".$_SESSION['username']."'");
        $row = mysqli_fetch_array($result);
	}

?>

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Customer Page</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>
  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <h1 class="me-auto"><a href="index.html">MediGuru</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#appointment_list">Appointment List</a></li>
          <li><a class="nav-link scrollto" href="#Approve">Approve/Decline</a></li>
          <li><a class="nav-link scrollto" href="#edit_appointment">Edit Appointment</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
      <a href="logout.php" class="appointment-btn scrollto"><span class="d-none d-md-inline">Log Out</a>
    </div>
  </header><!-- End Header -->
    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container">
      <h1 style="font-size: 400%;">Welcome <?php echo $_SESSION['username'];?></h1>
      <h2>This is the admin page</h2>
    </div>
  </section><!-- End Hero -->

  <main id="main">
    <section id="appointment_list" class="appointment section-bg">
      <div class="container">

      <h2>List of Appointment</h2>
            <p>List of Appointment Booked by End-User</p>
            <?php
                include_once('db.php');
                $query=
                "SELECT * FROM appointment_details";
                $result= mysqli_query($conn, $query);
            ?>            
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Date</th>
                    <th>Department</th>
                    <th>Doctor</th>
                    <th>Status</th>
                    <th>Delete</th>
                </tr>
                <?php
                while($row=mysqli_fetch_assoc($result))
                {
                ?>
                <tr>
                    <td><?php echo $row['ap_id'] ?></td>
                    <td><?php echo $row['name'] ?></td>
                    <td><?php echo $row['email'] ?></td>
                    <td><?php echo $row['phone'] ?></td>
                    <td><?php echo $row['date'] ?></td>
                    <td><?php echo $row['department'] ?></td>
                    <td><?php echo $row['doctor'] ?></td>
                    <td><?php echo $row['status'] ?></td>
                    <td><a href="delete-appoitment.php?ap_id=<?php echo $row["ap_id"]; ?>">Remove?</a></td>
                </tr>
                <?php  
                }
                ?>
                </thead>
                <tbody>
                </tbody>
            </table>
      </div>
    </section><!-- End Appointment Section -->
    <section id="Approve" class="appointment section-bg">
      <div class="container">

      <h2>Approve/Decline Appointment</h2>
            <p>Pls choose to whether Approve or Decline Appointment</p>
            <?php
                include_once('db.php');
                $query=
                "SELECT * FROM appointment_details WHERE status='Pending'";
                $result= mysqli_query($conn, $query);
            ?>            
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Date</th>
                    <th>Department</th>
                    <th>Doctor</th>
                    <th>Approve</th>
                    <th>Reject</th>
                </tr>
                <?php
                while($row=mysqli_fetch_assoc($result))
                {
                ?>
                <tr>
                    <td><?php echo $row['ap_id'] ?></td>
                    <td><?php echo $row['name'] ?></td>
                    <td><?php echo $row['email'] ?></td>
                    <td><?php echo $row['phone'] ?></td>
                    <td><?php echo $row['date'] ?></td>
                    <td><?php echo $row['department'] ?></td>
                    <td><?php echo $row['doctor'] ?></td>
                    <td>
                        <form action="approve.php" <?php echo $row['ap_id']; ?> method="POST">
                            <input type="hidden" name="ap_id" value="<?php echo $row['ap_id']; ?>">
                            <input type="submit" class="btn btn-sm" name="approve" value="accept">
                        </form>
                    </td>
                    <td>
                        <form action="reject.php" <?php echo $row['ap_id']; ?> method="POST">
                            <input type="hidden" name="ap_id" value="<?php echo $row['ap_id']; ?>">
                            <input type="submit" class="btn btn-sm" name="approve" value="reject">
                        </form>
                    </td>
                </tr>
                <?php  
                }
                ?>
                </thead>
                <tbody>
                </tbody>
            </table>
      </div>
    </section><!-- End Appointment Section -->
        <!-- ======= Appointment Section ======= -->
        <section id="edit_appointment" class="appointment section-bg">
      <div class="container">
      <?php
            include_once('db.php');
            $query=
            "SELECT * FROM appointment_details";
            $result= mysqli_query($conn, $query);
        ?>        
        <div class="section-title">
          <h2>Edit Appointment Information</h2>
          <p>You can edit Appointment Information here!</p>
        </div>
        <form action="edit_info.php" method="post">
          <div class="row">
            <div class="col-md-4 form-group">
              <input type="text" name="ap_id" class="form-control" id="ap_id" placeholder="Enter the respective ID" data-rule="minlen:4" data-msg="Please enter at least 4 chars" value="" required>
            </div>
            <div class="col-md-4 form-group mt-3 mt-md-0">
              <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email"required>
            </div>
            <div class="col-md-4 form-group mt-3 mt-md-0">
              <input type="tel" class="form-control" name="phone" id="phone" placeholder="Your Phone" data-rule="minlen:4" data-msg="Please enter at least 4 chars"required>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4 form-group mt-3">
              <input type="datetime" name="date" class="form-control datepicker" id="date" placeholder="Appointment Date" data-rule="minlen:4" data-msg="Please enter at least 4 chars"required>
            </div>
            <div class="col-md-4 form-group mt-3">
              <select name="department" id="department" class="form-select" required>
                <option value="">Select Department</option>
                <option value="Cardiology">Cardiology</option>
                <option value="Neurology">Neurology</option>
                <option value="Hepatology">Hepatology</option>
                <option value="Pediatrics">Pediatrics</option>
                <option value="Eye Care">Eye Care</option>
              </select>
            </div>
            <div class="col-md-4 form-group mt-3">
              <select name="doctor" id="doctor" class="form-select" required>
                <option value="">Select Doctor</option>
                <option value="Walter White">Walter White</option>
                <option value="Sarah Jhonson">Sarah Jhonson</option>
                <option value="William Anderson">William Anderson</option>
                <option value="Amanda Jepson">Amanda Jepson</option>
                <option value="John Wick">John Wick</option>
              </select>
            </div>
          </div>
          <div class="mb-3">
            <div class="loading"></div>
            <div class="error-message"></div>
            <div class="sent-message"></div>
          </div>
          <div class="text-center"><button id="submit" name="submit" type="submit">Submit</button></div>
        </form>
      </div>
    </section><!-- End Appointment Section -->
    <section id="Approve" class="appointment section-bg">
      <div class="container">

      <h2>Feedback</h2>
            <p>Feedback from Customer</p>
            <?php
                include_once('db.php');
                $query=
                "SELECT * FROM feedback";
                $result= mysqli_query($conn, $query);
            ?>            
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Feedback ID</th>
                    <th>Message</th>
                    <th>Delete</th>
                </tr>
                <?php
                while($row=mysqli_fetch_assoc($result))
                {
                ?>
                <tr>
                    <td><?php echo $row['feedbackid'] ?></td>
                    <td><?php echo $row['message'] ?></td>
                    <td><a href="delete-feedback.php?feedbackid=<?php echo $row["feedbackid"]; ?>">Remove?</a></td>
                </tr>
                <?php  
                }
                ?>
                </thead>
                <tbody>
                </tbody>
            </table>
      </div>
    </section><!-- End Appointment Section -->
  </main><!-- End #main -->

    <div class="container d-md-flex py-4">

      <div class="me-md-auto text-center text-md-start">
        <div class="copyright">
          &copy; Copyright <strong><span>MediGuru</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
          <!-- All the links in the footer should remain intact. -->
          <!-- You can delete the links only if you purchased the pro version. -->
          <!-- Licensing information: https://bootstrapmade.com/license/ -->
          <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/MediGuru-free-medical-bootstrap-theme/ -->
        </div>
      </div>
      <div class="social-links text-center text-md-right pt-3 pt-md-0">
        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>