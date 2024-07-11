<?php session_start();
require '../../../element/db_connection.php';

$watch_videos = "SELECT * FROM `watch_videos` WHERE 1 ";
$videos_result = mysqli_query($db_connection, $watch_videos);
$videos_assoc = mysqli_fetch_assoc($videos_result);

$select_criteria = "SELECT * FROM `video_views`";
$criteria_result = mysqli_query($db_connection, $select_criteria);

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
                            <h4 class="card-title">Video views criteria</h4>
                            <?php if(isset($_SESSION['criteria_deleted'])) { ?>
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong><?=$_SESSION['criteria_deleted']?></strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            <?php } else if(isset($_SESSION['criteria_updated'])) { ?>
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong><?=$_SESSION['criteria_updated']?></strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            <?php } unset($_SESSION['criteria_updated'], $_SESSION['criteria_deleted']) ?>
                            <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                  <tr>
                                    <th>
                                      SL
                                    </th>
                                    <th>
                                    Criteria
                                    </th>
                                    <th>
                                    Views
                                    </th>
                                    <th class="text-center">
                                      Action
                                    </th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php foreach ($criteria_result as $key => $views) { ?>
                                  <tr>
                                    <td class="py-1">
                                      <?=$key+1?>
                                    </td>
                                    <td>
                                      <?=$views['title']?>
                                    </td>                                    
                                    <td>
                                    <?=$views['number']?><?=$views['unit']?>
                                    </td>
                                    <td class="text-center">
                                      <a href="delete_criteria.php?id=<?=$views['id']?>">
                                      <button type="button" class="btn btn-danger btn-sm text-white">Delete</button></a>
                                      <a href="update_criteria.php?id=<?=$views['id']?>">
                                      <button type="button" class="btn btn-warning btn-sm text-white">Update</button></a>
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
                                <h4 class="card-title">Add Criteria</h4>
                                <p class="card-description">Add more features for your videos</p>
                                <?php if(isset($_SESSION['criteria_added'])) { ?>
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <strong><?=$_SESSION['criteria_added']?></strong>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                <?php } unset($_SESSION['criteria_added']) ?>
                                <form class="forms-sample" action="views_post.php" method="POST">
                                <div class="form-group">
                                    <label for="title">Criteria title</label>
                                    <input type="text" name="title" class="form-control" id="title" placeholder="enter a name for criteria">
                                </div>                                
                                <div class="form-group">
                                    <label for="number">Views Number</label>
                                    <input type="text" name="number" class="form-control" id="number" placeholder="example : 12 , 15 , 20">
                                </div>                                
                                <div class="form-group">
                                    <label for="unit">Unit</label>
                                    <input type="text" name="unit" class="form-control" id="unit" placeholder="example : K , M , B">
                                </div>                                
                                <button type="submit" class="btn btn-primary me-2">Add</button>                        
                                </form>
                            </div>
                        </div>
                </div>
                <div class="col-md-6 grid-margin stretch-card mx-auto">
                    <div class="card">
                        <div class="card-body">
                        <h4 class="card-title">Video Content</h4>
                        <p class="card-description">
                            Display your youtube videos
                        </p>
                        <?php if(isset($_SESSION['videos_content_updated'])) { ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong><?=$_SESSION['videos_content_updated']?></strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php } unset($_SESSION['videos_content_updated']) ?>
                        <form class="forms-sample" action="video_post.php" method="POST">
                            <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" name="title" id="title" value="<?=$videos_assoc['title']?>">
                            </div>
                            <div class="form-group">
                            <label for="description">Description</label>                            
                            <textarea name="description" class="form-control" style="min-height: 6rem;" cols="53" rows="5"><?=$videos_assoc['description']?></textarea>
                            </div>                            
                            <div class="form-group">
                            <label for="video_link">Video - link</label>
                            <input type="text" class="form-control" name="video_link" id="video_link" value="<?=$videos_assoc['link']?>">
                            </div>                                                        
                            <button type="submit" class="btn btn-primary me-2">Update</button>                            
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