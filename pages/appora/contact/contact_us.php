<?php session_start();
require '../../../element/db_connection.php';

$contact = "SELECT * FROM contact WHERE id = 1 ";
$contact_result = mysqli_query($db_connection, $contact);
$contact_assoc = mysqli_fetch_assoc($contact_result);

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
                <div class="card col-md-6 mx-auto">
                    <div class="card-body">
                        <h4 class="card-title">Contact Us</h4>
                        <p class="card-description">contact section information</p>
                        <?php if(isset($_SESSION['update_contant_info'])) { ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong><?=$_SESSION['update_contant_info']?></strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php } unset($_SESSION['update_contant_info']) ?>
                        <form class="forms-sample" action="contact_update.php" method="POST">
                        <div class="form-group">
                            <label for="title">Main Title</label>
                            <input type="text" name="main_title" class="form-control" id="title" value="<?=$contact_assoc['title_h2']?>">
                        </div>
                        <div class="form-group">
                            <label for="description">Main Description</label>
                            <textarea name="main_description" class="form-control" style="min-height: 8rem;" cols="53" rows="5"><?=$contact_assoc['description_h2']?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="2nd_title">2nd Title</label>
                            <input type="text" name="2nd_title" class="form-control" id="2nd_title" value="<?=$contact_assoc['title_h3']?>">
                        </div>
                        <div class="form-group">
                            <label for="2nd_description">2nd Description</label>
                            <textarea name="2nd_description" class="form-control" style="min-height: 8rem;" cols="53" rows="5"><?=$contact_assoc['description_h3']?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" name="address" class="form-control" id="address" value="<?=$contact_assoc['address']?>">
                        </div>                               
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" name="email" class="form-control" id="email" value="<?=$contact_assoc['email']?>">
                        </div>                               
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" name="phone" class="form-control" id="phone" value="<?=$contact_assoc['phone']?>">
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