<?php session_start() ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Log to Your Profile</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../../vendors/feather/feather.css">
  <link rel="stylesheet" href="../../vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../../vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="../../vendors/typicons/typicons.css">
  <link rel="stylesheet" href="../../vendors/simple-line-icons/css/simple-line-icons.css">
  <link rel="stylesheet" href="../../vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../../css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../../images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
            <div class="col-md-6 grid-margin stretch-card mx-auto">
                <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Register form</h4>
                    <p class="card-description">Basic form layout</p>
                    <form class="forms-sample" action="register_post.php" method="POST">
                    <div class="form-group">
                        <label for="exampleInputUsername1">Username</label>
                        <input type="text" class="form-control <?=isset($_SESSION['name_error'])? 'border-danger' : '' ?>" name="username" id="exampleInputUsername1" placeholder="<?php if (isset($_SESSION['name_error'])) {echo $_SESSION['name_error'];} 
                        else{echo 'Username';} unset($_SESSION['name_error']) ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" 
                        class="form-control <?=isset($_SESSION['email_null'])? 'border-danger': '' ?> 
                        <?=isset($_SESSION['email_error'])? 'border-danger': '' ?>" 
                        name="email" id="exampleInputEmail1" 
                        placeholder="<?php if (isset($_SESSION['email_null'])) 
                        {echo $_SESSION['email_null'];}
                        else if (isset($_SESSION['email_error'])) {
                            echo $_SESSION['email_error'];}                        
                        else{echo 'Email';} unset($_SESSION['email_null'], $_SESSION['email_error']) ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control <?=isset($_SESSION['pass_error'])? 'border-danger': '' ?> 
                        <?=isset($_SESSION['pass_null'])? 'border-danger': '' ?>" name="password" id="exampleInputPassword1" placeholder="<?php if (isset($_SESSION['pass_null'])) 
                        {echo $_SESSION['pass_null'];}
                        else if (isset($_SESSION['pass_error'])) {
                            echo $_SESSION['pass_error'];}                        
                        else{echo 'Password';} unset($_SESSION['pass_null'], $_SESSION['pass_error']) ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputConfirmPassword1">Confirm Password</label>
                        <input type="password" class="form-control <?=isset($_SESSION['pass_not_match'])? 'border-danger': '' ?>" name="cnfm_password" id="exampleInputConfirmPassword1" placeholder="<?php if (isset($_SESSION['pass_not_match'])) {echo $_SESSION['pass_not_match'];} 
                        else{echo 'Confirm Password';} unset($_SESSION['pass_not_match']) ?>">
                    </div>
                    <div class="form-check form-check-flat form-check-primary">
                        <label class="form-check-label">
                        <input type="checkbox" class="form-check-input">
                        Remember me
                        </label>
                    </div>
                    <button type="submit" class="btn btn-primary me-2">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                    </form>
                </div>
                </div>
            </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <?php if(isset($_SESSION['success'])) { ?>
  ?><script>Swal.fire({
  position: "top-end",
  icon: "success",
  title: "Registration Successfully",
  showConfirmButton: false,
  timer: 1500
  });</script>
  <?php }unset($_SESSION['success']) ?>
  <!-- plugins:js -->
  <script src="../../vendors/js/vendor.bundle.base.js"></script>
  <script src="../../vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="../../vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="../../js/off-canvas.js"></script>
  <script src="../../js/hoverable-collapse.js"></script>
  <script src="../../js/template.js"></script>
  <script src="../../js/settings.js"></script>
  <script src="../../js/todolist.js"></script>
  <!-- endinject -->
</body>

</html>
