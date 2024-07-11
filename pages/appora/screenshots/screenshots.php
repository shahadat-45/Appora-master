<?php session_start();
require '../../../element/db_connection.php';

$screenshots = "SELECT * FROM screenshots";
$screenshots_result = mysqli_query($db_connection, $screenshots);

$ss_content = "SELECT * FROM ss_content WHERE id = 1 ";
$ss_result = mysqli_query($db_connection, $ss_content);
$ss_content_assoc = mysqli_fetch_assoc($ss_result);

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
                            <h4 class="card-title">App Screenshots</h4>
                            <?php if(isset($_SESSION['image_deleted'])) { ?>
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong><?=$_SESSION['image_deleted']?></strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            <?php } unset($_SESSION['image_deleted']) ?>
                            <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                  <tr>
                                    <th>
                                      SL
                                    </th>
                                    <th>
                                        Status
                                    </th>
                                    <th>
                                        Action
                                    </th>
                                    <th>
                                      Images
                                    </th>                                   
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php foreach ($screenshots_result as $key => $img) { ?>
                                  <tr>
                                    <td class="py-1">
                                      <?=$key+1?>
                                    </td>
                                    <td>
                                    <a href="image_status.php?id=<?=$img['id']?>">
                                        <button type="button" class="btn btn-sm text-white <?=$img['status']==1?'btn-primary':'btn-warning'?>"><?=$img['status']==1?'Active':'Deactive'?></button></a>
                                    </td>
                                    <td>
                                    <a href="image_delete.php?id=<?=$img['id']?>">
                                        <button type="button" class="btn btn-danger btn-sm text-white">Delete</button></a>
                                    </td>
                                    <td>
                                        <img src="../../../images/screenshots/<?=$img['photo']?>" alt="<?=$img['photo']?>" style="border-radius: 0; width: 60px;  height: auto; ">
                                        
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
                                <h4 class="card-title">Add screenshots</h4>
                                <p class="card-description">add screenshots in slider</p>
                                <?php if(isset( $_SESSION['screenshots_added'])) { ?>
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <strong><?= $_SESSION['screenshots_added']?></strong>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                <?php } unset( $_SESSION['screenshots_added']) ?>
                                <form class="forms-sample" action="add_screenshots.php" enctype="multipart/form-data" method="POST">
                                <div class="form-group">
                                    <label for="image">Selece image</label>
                                    <input type="file" name="image" class="form-control" id="image" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])" style="line-height: 0;">
                                    <img id="blah" width="150"/>
                                </div>
                                <button type="submit" class="btn btn-primary me-2">Add</button>                        
                                </form>
                            </div>
                        </div>
                        <div class="col-md-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                <h4 class="card-title">Section Content</h4>
                                <p class="card-description">
                                    screenshots section content 
                                </p>
                                <?php if(isset($_SESSION['content_updated'])) { ?>
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <strong><?=$_SESSION['content_updated']?></strong>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                <?php } unset($_SESSION['content_updated']) ?>
                                <form class="forms-sample" action="update_content.php" method="POST">
                                    <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control" name="title" id="title" value="<?=$ss_content_assoc['title']?>">
                                    </div>
                                    <div class="form-group">
                                    <label for="description">Description</label>                            
                                    <textarea name="description" class="form-control" style="min-height: 6rem;" cols="53" rows="5"><?=$ss_content_assoc['description']?></textarea>
                                    </div>                           
                                    <button type="submit" class="btn btn-primary me-2">Update</button>                            
                                </form>
                                </div>
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