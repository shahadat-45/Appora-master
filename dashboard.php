<?php session_start();
require 'element/db_connection.php';
$select = "SELECT * FROM users";
$select_result = mysqli_query($db_connection, $select);
?>

<?php require 'element/head.php' ?>

<body class="with-welcome-text">
  <div class="container-scroller">
    <?php require 'element/navbar.php' ?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper" style="padding-top: 53px;">
      <!-- partial:partials/_settings-panel.html -->

      <?php ///require 'element/settings-panel.php' ?>

      <!-- partial -->
      <?php require 'element/side_bar.php' ?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-sm-12">
              <div class="home-tab">
                <div class="d-sm-flex align-items-center justify-content-between border-bottom">
                  <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active ps-0" id="home-tab" data-bs-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-selected="true">Overview</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#audiences" role="tab" aria-selected="false">Audiences</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="contact-tab" data-bs-toggle="tab" href="#demographics" role="tab" aria-selected="false">Demographics</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link border-0" id="more-tab" data-bs-toggle="tab" href="#more" role="tab" aria-selected="false">More</a>
                    </li>
                  </ul>
                  <div>
                    <div class="btn-wrapper">
                      <a href="#" class="btn btn-otline-dark align-items-center"><i class="icon-share"></i> Share</a>
                      <a href="#" class="btn btn-otline-dark"><i class="icon-printer"></i> Print</a>
                      <a href="#" class="btn btn-primary text-white me-0"><i class="icon-download"></i> Export</a>
                    </div>
                  </div>
                </div>
                <div class="tab-content tab-content-basic">
                  <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview"> 
                    <div class="row">                      
                      <div class="col-lg-12 grid-margin stretch-card">
                        <div class="card">
                          <div class="card-body">
                            <h4 class="card-title">User Table</h4>
                            <?php if(isset($_SESSION['user_deleted'])) { ?>
                              <div class="alert alert-success alert-dismissible fade show" role="alert">
                              <strong>User Delete Successfully!</strong>
                              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            <?php } unset($_SESSION['user_deleted']) ?>
                            <div class="table-responsive">
                              <table class="table table-striped">
                                <thead>
                                  <tr>
                                    <th>
                                      Photo
                                    </th>
                                    <th>
                                      Username
                                    </th>
                                    <th>
                                      Email
                                    </th>
                                    <th>
                                      Status
                                    </th>
                                    <th>
                                      Action
                                    </th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php foreach ($select_result as $key => $users) { ?>
                                  <tr>
                                    <td class="py-1">
                                      <img src="images/profile/<?=$users['photo'] == null ? 'default_picture.webp' : $users['photo'] ?>" alt="image"/>
                                    </td>
                                    <td>
                                      <?=$users['name']?>
                                    </td>
                                    <td>
                                      <?=$users['email']?>
                                    </td>
                                    <td>
                                      <a href="pages/users/user_status.php?id=<?=$users['id']?>">
                                      <button type="button" class="btn  btn-sm text-white <?=$users['status']==1?'btn-primary':'btn-warning'?>"><?=$users['status']==1?'Active':'Deactive'?></button></a>
                                    </td>
                                    <td>
                                      <a href="pages/users/delete_user.php?id=<?=$users['id']?>">
                                      <button type="button" class="btn btn-danger btn-sm text-white">Delete</button></a>
                                    </td>
                                  </tr>  
                                  <?php  } ?>                                
                                </tbody>
                              </table>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
<?php require 'element/footer.php'?>  
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

<?php require 'element/footer_links.php'?>  

<?php if (isset($_SESSION['login_success'])) { ?>
  <script>
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
      toast.addEventListener('mouseenter', Swal.stopTimer)
      toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
  })
  
  Toast.fire({
    icon: 'success',
    title: 'Loged in successfully'
  })
  </script>
<?php } unset($_SESSION['login_success'])?>