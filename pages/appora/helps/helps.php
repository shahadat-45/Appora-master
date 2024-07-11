<?php session_start();
require '../../../element/db_connection.php';

$select = "SELECT * FROM helps";
$select_result = mysqli_query($db_connection, $select);


$helps = "SELECT * FROM helps_header WHERE id = 1 ";
$helps_result = mysqli_query($db_connection, $helps);
$helps_assoc = mysqli_fetch_assoc($helps_result);

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
                            <h4 class="card-title">Helps content</h4>
                            <?php if(isset($_SESSION['content_deleted'])) { ?>
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong><?=$_SESSION['content_deleted']?></strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            <?php } else if(isset($_SESSION['update_content'])) { ?>
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong><?=$_SESSION['update_content']?></strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            <?php } unset($_SESSION['content_deleted'],$_SESSION['update_content']) ?>
                            <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                  <tr>
                                    <th>
                                      SL
                                    </th>
                                    <th>
                                      Helps
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
                                  <?php foreach ($select_result as $key => $helps) { ?>
                                  <tr>
                                    <td class="py-1">
                                      <?=$key+1?>
                                    </td>
                                    <td class="text-wrap" style="line-height: 1.5;">
                                      <?=$helps['description']?>
                                    </td>
                                    <td>
                                      <a href="update_page.php?id=<?=$helps['id']?>">
                                      <button type="button" id="helps_content" class="btn btn-info btn-sm text-white">Update</button></a>
                                    </td>
                                    <td>
                                      <a href="delete_helps.php?id=<?=$helps['id']?>">
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
                                <h4 class="card-title">Add helps</h4>
                                <p class="card-description">Add helps content</p>
                                <?php if(isset($_SESSION['helps_added'])) { ?>
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <strong><?=$_SESSION['helps_added']?></strong>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                <?php } unset($_SESSION['helps_added']) ?>
                                <form class="forms-sample" action="add_helps.php" method="POST">
                                <div class="form-group">
                                    <label for="content">content</label>
                                    <textarea name="content" class="form-control" style="min-height: 7rem;" cols="53" rows="5"></textarea>
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
                                <?php } else if(isset($_SESSION['update_content'])) { ?>
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <strong><?=$_SESSION['update_content']?></strong>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                <?php } else if(isset($_SESSION['size_error'])) { ?>
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <strong><?=$_SESSION['size_error']?></strong>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                <?php } unset($_SESSION['photo_updated'],$_SESSION['update_content'],$_SESSION['size_error']) ?>
                                <form class="forms-sample" action="helps_update.php" enctype="multipart/form-data" method="POST">
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" name="title" class="form-control" id="title" value="<?=$helps_assoc['title']?>">
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea name="description" class="form-control" style="min-height: 8rem;" cols="53" rows="5" spellcheck="false"><?=$helps_assoc['description']?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="link">Read more - link</label>
                                    <input type="text" name="link" class="form-control" id="link" value="<?=$helps_assoc['link']?>">
                                </div>
                                <div class="form-group">
                                    <label for="photo">Section Photo</label>
                                    <input type="file" name="photo" class="form-control mb-2" id="photo" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])" style="line-height: 0;">
                                    <img src="../../../images/<?=$helps_assoc['photo']?>" id="blah" alt="helps section photo" width="100"/>
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