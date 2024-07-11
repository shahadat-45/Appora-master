<?php session_start();
require '../../../element/db_connection.php';
$select = "SELECT * FROM headers";
$select_result = mysqli_query($db_connection, $select);


$logo = "SELECT * FROM header_logo WHERE id = 1 ";
$logo_result = mysqli_query($db_connection, $logo);
$logo_assoc = mysqli_fetch_assoc($logo_result);

?>

<?php require '../../../element/head.php' ?>

<body class="with-welcome-text">
  <div class="container-scroller">
    <?php require '../../../element/navbar.php' ?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper" style="padding-top: 53px;">
      <!-- partial:partials/_settings-panel.html -->

      <?php ///require 'element/settings-panel.php' ?>

      <!-- partial -->
      <?php require '../../../element/side_bar.php' ?>
      <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-8 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Navbar items</h4>
                            <?php if(isset($_SESSION['item_deleted'])) { ?>
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>User Delete Successfully!</strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            <?php } unset($_SESSION['item_deleted']) ?>
                            <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                  <tr>
                                    <th>
                                      SL
                                    </th>
                                    <th>
                                      Items
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
                                      <?=$key+1?>
                                    </td>
                                    <td>
                                      <?=$users['item']?>
                                    </td>                                    
                                    <td>
                                      <a href="header_status.php?id=<?=$users['id']?>">
                                      <button type="button" class="btn  btn-sm text-white <?=$users['status']==1?'btn-primary':'btn-warning'?>"><?=$users['status']==1?'Active':'Deactive'?></button></a>
                                    </td>
                                    <td>
                                      <a href="delete_items.php?id=<?=$users['id']?>">
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
                <div class="col-lg-4">
                    <div class="row">
                        <div class="card col-md-10 mx-auto mb-4">
                            <div class="card-body">
                                <h4 class="card-title">Add items</h4>
                                <p class="card-description">Add navbar links</p>
                                <form class="forms-sample" action="add_item.php" method="POST">
                                <div class="form-group">
                                    <label for="item">Items name</label>
                                    <input type="text" name="item" class="form-control" id="item">
                                </div>                                
                                <button type="submit" class="btn btn-primary me-2">Add</button>                        
                                </form>
                            </div>
                        </div>
                        <div class="card col-md-10 mx-auto" style="background-color: var(--bs-card-cap-bg)">
                            <div class="card-body">
                                <h4 class="card-title">Change logo</h4>
                                <p class="card-description">change header logo</p>
                                <?php if(isset($_SESSION['logo_updated'])) { ?>
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <strong>User Delete Successfully!</strong>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                <?php } unset($_SESSION['logo_updated']) ?>
                                <form class="forms-sample" action="change_logo.php" enctype="multipart/form-data" method="POST">
                                <div class="form-group">
                                    <label for="logo">Selece logo</label>
                                    <input type="file" name="logo" class="form-control mb-2" id="logo" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])" style="line-height: 0;">
                                    <img src="../../../images/logo/<?=$logo_assoc['photo']?>" id="blah" alt="your logo" width="100"/>
                                </div>
                                <button type="submit" class="btn btn-primary me-2">Change</button>                        
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
<?php require '../../../element/footer.php'?>  
        <!-- partial -->
    </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

<?php require '../../../element/footer_links.php'?>