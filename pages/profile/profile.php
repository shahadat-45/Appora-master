<?php session_start();
    require '../../element/head.php';
    require '../../element/db_connection.php';
  $email = $_SESSION['profile_email'];
  $select = "SELECT * FROM users WHERE email = '$email' ";
  $select_result = mysqli_query($db_connection, $select);
  $select_assoc = mysqli_fetch_assoc($select_result);
?>
<body>
  <div class="container-scroller">
    <!-- partial:../../partials/_navbar.html -->
    <?php include '../../element/navbar.php' ?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper" style="padding-top: 53px;">

      <?php include '../../element/side_bar.php' ?>
      <!-- partial -->
<div class="main-panel">        
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-6 grid-margin stretch-card mx-auto">
                <div class="card" style="height: 600px;">
                    <div class="card-body">
                        <h4 class="card-title">Profile Information</h4>
                        <p class="card-description">
                        Update your profile
                        </p>
                        <?php if(isset($_SESSION['update_success'])) { ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong><?=$_SESSION['update_success']?></strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php } unset($_SESSION['update_success'])?>
                        <form class="forms-sample" action="profile_post.php" method="POST">
                        <div class="form-group">
                            <label for="exampleInputUsername1">Username</label>
                            <input type="text" name="username" class="form-control" id="exampleInputUsername1" value="<?=$select_assoc['name']?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" name="email" class="form-control" id="exampleInputEmail1" value="<?=$select_assoc['email']?>">
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" name="address" class="form-control" id="address" value="<?=$select_assoc['address']?>">
                        </div>
                        <div class="form-group">
                            <label for="bio">Bio</label>
                            <input type="text" name="bio" class="form-control" id="bio" value="<?=$select_assoc['bio']?>">
                        </div>
                        <div class="form-group mb-0">
                            <label for="form-check-label">Gender</label>
                                <div class="form-check mt-0">
                                    <input class="form-check-input ms-0" type="radio" name="gender" value="male" id="male" <?=$select_assoc['gender']=='male'? 'checked' : ''?>>
                                    <label class="form-check-label" for="male">
                                        Male
                                    </label>
                                </div>
                                <div class="form-check mt-0">
                                    <input class="form-check-input ms-0" type="radio" name="gender" value="female" id="female" <?=$select_assoc['gender']=='female'? 'checked' : ''?>>
                                    <label class="form-check-label" for="female">
                                        Female
                                    </label>
                                </div>
                        </div>
                        <button type="submit" class="btn btn-primary me-2">Update</button>                        
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4 grid-marfin stretch-card mx-auto">
                <div class="row">                    
                    <div class="card col-md-12 mb-3" style="background-color: var(--bs-card-cap-bg);">                    
                        <div class="card-profile">
                            <img src="../../images/profile/bg-profile.jpg" alt="Image placeholder" class="card-img-top">
                            <div class="row justify-content-center">
                                <form class="col-4 col-lg-4 order-lg-2 position-relative rounded-circle" id="form" action="profile_pic_change.php?id=<?=$select_assoc['id']?>" enctype="multipart/form-data" method="POST">
                                    <div style="height:40px">
                                        <a href="change_profile_pic.php">
                                            <img src="../../images/profile/<?=$select_assoc['photo'] == null ? 'default_picture.webp' : $select_assoc['photo'] ?>" style="transform: translateY(-50%); object-fit: cover;" width="74px" height="74px" class="rounded-circle border border-2 border-white">
                                        </a>
                                    </div>
                                    <input type="file" name="profile_image" id="profile_image" accept=".jpg, .jpeg, .png" class="position-absolute rounded-circle py-3" style="top: -30px; overflow: hidden; width: 73px; opacity: 0;">
                                </form>                            
                            </div>
                            <?php if(isset($_SESSION['size_error'])) { ?>
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong><?=$_SESSION['size_error']?></strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            <?php } unset($_SESSION['size_error'])?>
                            <div class="card-header text-center border-0 pt-0 pt-lg-2 pb-4 pb-lg-3 bg-transparent">
                            <div class="d-flex justify-content-between">
                                <a href="javascript:;" class="btn btn-sm btn-info mb-0 d-none d-lg-block">Connect</a>
                                <a href="javascript:;" class="btn btn-sm btn-info mb-0 d-block d-lg-none"><i class="ni ni-collection"></i></a>
                                <a href="javascript:;" class="btn btn-sm btn-dark float-right mb-0 d-none d-lg-block">Message</a>
                                <a href="javascript:;" class="btn btn-sm btn-dark float-right mb-0 d-block d-lg-none"><i class="ni ni-email-83"></i></a>
                            </div>
                            </div>
                            <div class="card-body pt-0">
                            <div class="row">
                                <div class="col">
                                <div class="d-flex justify-content-center">
                                    <div class="d-grid text-center">
                                    <span class="text-lg font-weight-bolder">22</span>
                                    <span class="text-sm opacity-8">Friends</span>
                                    </div>
                                    <div class="d-grid text-center mx-4">
                                    <span class="text-lg font-weight-bolder">10</span>
                                    <span class="text-sm opacity-8">Photos</span>
                                    </div>
                                    <div class="d-grid text-center">
                                    <span class="text-lg font-weight-bolder">89</span>
                                    <span class="text-sm opacity-8">Comments</span>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <div class="text-center mt-4">
                                <h5>
                                <?=$select_assoc['name']?><span class="font-weight-light">, 35</span>
                                </h5>
                                <div class="h6 font-weight-300">
                                <i class="ni location_pin mr-2"></i><?=$select_assoc['address']?>
                                </div>
                                <div class="h6 mt-4">
                                <i class="ni business_briefcase-24 mr-2"></i>Solution Manager - Creative Tim Officer
                                </div>
                                <div>
                                <i class="ni education_hat mr-2"></i><?=$select_assoc['bio']?>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="card col-md-12">
                        <div class="card-body">
                            <h4 class="card-title">Change Password</h4>
                            <p class="card-description">Change profile password</p>
                            <?php if(isset($_SESSION['old_pass_null'])) { ?>
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <strong><?=$_SESSION['old_pass_null']?></strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            <?php } else if(isset($_SESSION['old_pass_error'])) { ?>
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <strong><?=$_SESSION['old_pass_error']?></strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            <?php } else if(isset($_SESSION['pass_error'])) { ?>
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <strong><?=$_SESSION['pass_error']?></strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            <?php } else if(isset($_SESSION['con_pass_not_match'])) { ?>
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <strong><?=$_SESSION['con_pass_not_match']?></strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            <?php } else if(isset($_SESSION['pass_changed'])) { ?>
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong><?=$_SESSION['pass_changed']?></strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            <?php } unset($_SESSION['old_pass_error'], $_SESSION['old_pass_null'], $_SESSION['pass_error'],$_SESSION['con_pass_not_match'],$_SESSION['pass_changed'])?>

                            <form class="forms-sample" action="pass_change.php?id=<?=$select_assoc['id']?>" method="POST">
                            <div class="form-group">
                                <label for="old_pass">Old password</label>
                                <input type="password" name="old_password" class="form-control" id="old_pass">
                            </div>
                            <div class="form-group">
                                <label for="new_pass">New password</label>
                                <input type="password" name="new_password" class="form-control" id="new_pass">
                            </div>
                            <div class="form-group">
                                <label for="con_pass">Confirm password</label>
                                <input type="password" name="con_password" class="form-control" id="con_pass">
                            </div>
                            <button type="submit" class="btn btn-primary me-2">Update</button>                        
                            </form>
                        </div>
                    </div>
                </div>
            </div>            
        </div>
    </div>
<!-- content-wrapper ends -->
<!-- partial:../../partials/_footer.html -->
<?php include '../../element/footer.php' ?>
<!-- partial -->
</div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <?php require '../../element/footer_links.php' ?>
  <script>
    document.getElementById("profile_image").onchange = function () {
        document.getElementById('form').submit();
    }
  </script>