<?php session_start();
require '../../../element/db_connection.php';

$select_faq = "SELECT * FROM faqs";
$faq_result = mysqli_query($db_connection, $select_faq);


$faq_header = "SELECT * FROM faq_header WHERE id = 1 ";
$faq_header_result = mysqli_query($db_connection, $faq_header);
$faq_header_assoc = mysqli_fetch_assoc($faq_header_result);

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
                            <h4 class="card-title">FAQs</h4>
                            <?php if(isset($_SESSION['content_deleted'])) { ?>
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong><?=$_SESSION['content_deleted']?></strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            <?php } else if(isset($_SESSION['update_faq'])) { ?>
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong><?=$_SESSION['update_faq']?></strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            <?php } unset($_SESSION['content_deleted'],$_SESSION['update_faq']) ?>
                            <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                  <tr>
                                    <th>
                                      SL
                                    </th>
                                    <th>
                                      Answer
                                    </th>                                   
                                    <th>
                                      Question
                                    </th>                                   
                                    <th>
                                      Update
                                    </th>
                                    <th>
                                      Action
                                    </th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php foreach ($faq_result as $key => $faq) { ?>
                                  <tr>
                                    <td class="py-1">
                                      <?=$key+1?>
                                    </td>
                                    <td class="text-wrap" style="line-height: 1.5;">
                                        <?=$faq['question']?>
                                    </td>
                                    <td class="text-wrap" style="line-height: 1.5;">
                                      <?=$faq['answer']?>
                                    </td>
                                    <td>
                                      <a href="update_page.php?id=<?=$faq['id']?>">
                                      <button type="button" id="helps_content" class="btn btn-info btn-sm text-white">Update</button></a>
                                    </td>
                                    <td>
                                      <a href="delete_helps.php?id=<?=$faq['id']?>">
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
                        <div class="card col-md-12 mx-auto mb-4">
                            <div class="card-body">
                                <h4 class="card-title">Add faqs</h4>
                                <p class="card-description">Add faqs & answers</p>
                                <?php if(isset($_SESSION['faq_added'])) { ?>
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <strong><?=$_SESSION['faq_added']?></strong>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                <?php } unset($_SESSION['faq_added']) ?>
                                <form class="forms-sample" action="add_faqs.php" method="POST">                                                                
                                <div class="form-group">
                                    <label for="content">Question</label>
                                    <input type="text" class="form-control" name="question">
                                </div>
                                <div class="form-group">
                                    <label for="content">Answer</label>
                                    <textarea name="answer" class="form-control" style="min-height: 4rem;" cols="53" rows="5"></textarea>
                                </div>                                
                                <button type="submit" class="btn btn-primary me-2">Add</button>                        
                                </form>
                            </div>
                        </div>
                        <div class="card col-md-12 mx-auto">
                            <div class="card-body">
                                <h4 class="card-title">Appora helps</h4>
                                <p class="card-description">helps section customize</p>
                                <?php if(isset($_SESSION['photo_updated'])) { ?>
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <strong><?=$_SESSION['photo_updated']?></strong>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                <?php } else if(isset($_SESSION['update_faq'])) { ?>
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <strong><?=$_SESSION['update_faq']?></strong>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                <?php } else if(isset($_SESSION['size_error'])) { ?>
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <strong><?=$_SESSION['size_error']?></strong>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                <?php } unset($_SESSION['photo_updated'],$_SESSION['update_faq'],$_SESSION['size_error']) ?>
                                <form class="forms-sample" action="faq_update.php" enctype="multipart/form-data" method="POST">
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" name="title" class="form-control" id="title" value="<?=$faq_header_assoc['title']?>">
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea name="description" class="form-control" style="min-height: 8rem; line-height: 1.5;" cols="53" rows="5" spellcheck="false"><?=$faq_header_assoc['description']?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="photo">Section Photo</label>
                                    <input type="file" name="photo" class="form-control mb-2" id="photo" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])" style="line-height: 0;">
                                    <img src="../../../images/<?=$faq_header_assoc['photo']?>" id="blah" alt="helps section photo" width="100"/>
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
<?php require '../../../element/footer.php'?>  
        <!-- partial -->
    </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

<?php require '../../../element/footer_links.php'?>