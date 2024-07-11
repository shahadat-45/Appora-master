<?php session_start();
require '../../../element/db_connection.php';

$id = $_GET['id'];

$faqs = "SELECT * FROM faqs WHERE id = $id ";
$faqs_result = mysqli_query($db_connection, $faqs);
$faqs_assoc = mysqli_fetch_assoc($faqs_result);

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
            <div class="card col-md-6 mx-auto mb-4">
                            <div class="card-body">
                                <h4 class="card-title">Update faqs</h4>
                                <p class="card-description">Update faqs & answers</p>                                
                                <form class="forms-sample" action="update_faq_content.php?id=<?=$faqs_assoc['id']?>" method="POST">                                                                
                                <div class="form-group">
                                    <label for="content">Question</label>
                                    <input type="text" class="form-control" name="question" value="<?=$faqs_assoc['question']?>">
                                </div>
                                <div class="form-group">
                                    <label for="content">Answer</label>
                                    <textarea name="answer" class="form-control" style="min-height: 6rem;" cols="53" rows="5"><?=$faqs_assoc['answer']?></textarea>
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