<?php session_start();
require '../../../element/db_connection.php';

$footer_content = "SELECT * FROM footer_content WHERE id = 1 ";
$footer_content_result = mysqli_query($db_connection, $footer_content);
$footer_content_assoc = mysqli_fetch_assoc($footer_content_result);
?>

<?php require '../../../element/head.php' ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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
                <div class="col-lg-6 mx-auto">
                        <div class="card mx-auto mb-4">
                            <div class="card-body">
                                <h4 class="card-title">Footer content</h4>
                                <p class="card-description">update footer contents</p>
                                <?php if(isset($_SESSION['footer_updated'])) { ?>
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <strong><?=$_SESSION['footer_updated']?></strong>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                <?php } else if(isset($_SESSION['img_size_err'])) { ?>
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <strong><?=$_SESSION['img_size_err']?></strong>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                <?php } unset($_SESSION['img_size_err'],$_SESSION['footer_updated']) ?>
                                <form class="forms-sample" action="footer_head_post.php" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <input type="text" name="description" class="form-control" value="<?=$footer_content_assoc['description']?>">
                                </div>
                                <div class="d-flex justify-content-between">
                                <div class="form-group">
                                    <label for="facebook">Facebook</label>
                                    <input type="text" name="facebook" class="form-control" value="<?=$footer_content_assoc['facebook']?>" >
                                </div>                                                                
                                <div class="form-group">
                                    <label for="twitter">Twitter</label>
                                    <input type="text" name="twitter" class="form-control" value="<?=$footer_content_assoc['twitter']?>">
                                </div>
                                </div>
                                <div class="d-flex justify-content-between">
                                <div class="form-group">
                                    <label for="linkedin">Linkedin</label>
                                    <input type="text" name="linkedin" class="form-control" value="<?=$footer_content_assoc['linkedin']?>" >
                                </div>                                                                
                                <div class="form-group">
                                    <label for="pinterest">Pinterest</label>
                                    <input type="text" name="pinterest" class="form-control" value="<?=$footer_content_assoc['pinterest']?>">
                                </div>
                                </div>
                                <div class="form-group mb-1">
                                    <label for="photo">Photo</label>
                                    <input type="file" name="photo" class="form-control mb-3" id="photo" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])" style="line-height: 0;">
                                    <img src="../../../images/logo/<?=$footer_content_assoc['photo']?>" id="blah" width="150" class="bg-dark"/>
                                </div>
                                <button type="submit" class="btn btn-primary me-2">Update footer</button>                        
                                </form>
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