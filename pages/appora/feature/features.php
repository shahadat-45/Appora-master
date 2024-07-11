<?php session_start();
require '../../../element/db_connection.php';

$feature = "SELECT * FROM features";
$feature_result = mysqli_query($db_connection, $feature);


$feature_head = "SELECT * FROM features_head WHERE id = 1 ";
$feature_head_result = mysqli_query($db_connection, $feature_head);
$feature_head_assoc = mysqli_fetch_assoc($feature_head_result);

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
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Features items</h4>
                            <?php if(isset($_SESSION['features_deleted'])) { ?>
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong><?=$_SESSION['features_deleted']?></strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            <?php } unset($_SESSION['features_deleted']) ?>
                            <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                  <tr>
                                    <th>
                                      SL
                                    </th>
                                    <th>
                                      Icons
                                    </th>                                   
                                    <th>
                                      Title
                                    </th>                                   
                                    <th>
                                      Description
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
                                  <?php foreach ($feature_result as $key => $features) { ?>
                                  <tr>
                                    <td class="py-1">
                                      <?=$key+1?>
                                    </td>
                                    <td>
                                      <?=$features['icon']?>
                                    </td>                                    
                                    <td>
                                      <?=$features['title']?>
                                    </td>                                    
                                    <td class="text-wrap">
                                      <?=$features['description']?>
                                    </td>                                    
                                    <td>
                                      <a href="features_status.php?id=<?=$features['id']?>">
                                      <button type="button" class="btn  btn-sm text-white <?=$features['status']==1?'btn-primary':'btn-warning'?>"><?=$features['status']==1?'Active':'Deactive'?></button></a>
                                    </td>
                                    <td>
                                      <a href="delete_features.php?id=<?=$features['id']?>">
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
                <div class="col-lg-4 mx-auto">
                        <div class="card mx-auto mb-4">
                            <div class="card-body">
                                <h4 class="card-title">Add items</h4>
                                <p class="card-description">Add features</p>
                                <?php if(isset($_SESSION['feature_added'])) { ?>
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <strong><?=$_SESSION['feature_added']?></strong>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                <?php } unset($_SESSION['feature_added']) ?>
                                <form class="forms-sample" action="add_features.php" method="POST">
                                <div class="form-group">
                                    <label for="icon">Icons name</label>
                                    <input type="text" name="icon" class="form-control" id="icon">
                                </div>                                
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" name="title" class="form-control" id="title">
                                </div>                                
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <input type="text" name="description" class="form-control" id="description">
                                </div>                                
                                <button type="submit" class="btn btn-primary me-2">Add</button>                        
                                </form>
                            </div>
                        </div>
                </div>
                <div class="card col-md-4 mx-auto" style="height: auto">
                    <div class="card-body" >
                        <h4 class="card-title">Features Header </h4>
                        <p class="card-description">features head customize</p>
                        <?php if(isset($_SESSION['update_feature_head'])) { ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong><?=$_SESSION['update_feature_head']?></strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php } unset($_SESSION['update_feature_head']) ?>
                        <form class="forms-sample" action="features_head.php" method="POST">
                        <div class="form-group">
                            <label for="icon">Features - H2</label>
                            <input type="text" name="feature_h2" class="form-control" id="icon" value="<?=$feature_head_assoc['title']?>">
                        </div>                               
                        <div class="form-group">
                            <label for="description">Description</label>                            
                            <textarea name="description" class="form-control" style="min-height: 8rem;" cols="53" rows="5"><?=$feature_head_assoc['description']?></textarea>
                        </div>                                
                        <button type="submit" class="btn btn-primary me-2">Update</button>                        
                        </form>
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