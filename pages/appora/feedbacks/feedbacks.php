<?php session_start();
require '../../../element/db_connection.php';

$feedback = "SELECT * FROM feedbacks";
$feedback_result = mysqli_query($db_connection, $feedback);

$feedback_header = "SELECT * FROM feedback_header WHERE id = 1 ";
$feedback_header_result = mysqli_query($db_connection, $feedback_header);
$feedback_header_assoc = mysqli_fetch_assoc($feedback_header_result);
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
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Feedback items</h4>
                            <?php if(isset($_SESSION['feedbacks_deleted'])) { ?>
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong><?=$_SESSION['feedbacks_deleted']?></strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            <?php } unset($_SESSION['feedbacks_deleted']) ?>
                            <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                  <tr>
                                    <th>
                                      SL
                                    </th>
                                    <th>
                                        Name
                                    </th>                                   
                                    <th>
                                        Description
                                    </th>
                                    <th>
                                        Photo
                                    </th>
                                    <th class="text-center"> 
                                        Star
                                    </th>
                                    <th>
                                      Action
                                    </th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php foreach ($feedback_result as $key => $feedback) { ?>
                                  <tr>
                                    <td class="py-1">
                                      <?=$key+1?>
                                    </td>
                                    <td>
                                      <?=$feedback['name']?>
                                    </td>                                    
                                    <td class="text-wrap">
                                      <?=$feedback['description']?>
                                    </td>                                    
                                    <td>
                                    <img src="../../../images/feedback/<?=$feedback['photo']?>" alt="<?=$feedback['photo']?>" style="border-radius: 0; width: 80px;  height: auto; ">
                                    </td>                                    
                                    <td>
                                      <a href="feedback_status_plus.php?id=<?=$feedback['id']?>">
                                      <button type="button" class="btn btn-warning btn-sm text-white"><i class="fa-solid fa-plus"></i></button></a>
                                      
                                      <button type="button" class="btn btn-info btn-sm text-white"><?=$feedback['status']?></button>

                                      <a href="feedback_status_reduce.php?id=<?=$feedback['id']?>">
                                      <button type="button" class="btn btn-success btn-sm text-white"><i class="fa-solid fa-minus"></i></button></a>
                                    </td>
                                    <td>
                                      <a href="delete_feedback.php?id=<?=$feedback['id']?>">
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
                                <h4 class="card-title">Add Feedbacks</h4>
                                <p class="card-description">massages form people who loves us</p>
                                <?php if(isset($_SESSION['feedback_added'])) { ?>
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <strong><?=$_SESSION['feedback_added']?></strong>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                <?php } else if(isset($_SESSION['img_size_err'])) { ?>
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <strong><?=$_SESSION['img_size_err']?></strong>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                <?php } unset($_SESSION['img_size_err'],$_SESSION['feedback_added']) ?>
                                <form class="forms-sample" action="add_feedback.php" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" class="form-control <?=isset($_SESSION['name_emt']) ? 'border-danger' : '' ?> " id="name" placeholder="Who sent the massage">
                                </div>                                                                
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <input type="text" name="description" class="form-control <?=isset($_SESSION['description_emt']) ? 'border-danger' : '' ?>" id="description" placeholder="Enter the massage">
                                </div>
                                <div class="form-group mb-1">
                                    <label for="photo">Photo</label>
                                    <input type="file" name="photo" class="form-control mb-3" id="phpoto" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])" style="line-height: 0;">
                                    <img id="blah" width="150"/>
                                </div>
                                <button type="submit" class="btn btn-primary me-2">Add</button>                        
                                </form>
                            </div>
                        </div>
                </div>
                <div class="card col-md-4 mx-auto" style="height: auto">
                    <div class="card-body" >
                        <h4 class="card-title">Feedback Header </h4>
                        <p class="card-description">feedback head customize</p>
                        <?php if(isset($_SESSION['update_feedback_head'])) { ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong><?=$_SESSION['update_feedback_head']?></strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php } unset($_SESSION['update_feedback_head']) ?>
                        <form class="forms-sample" action="feedbacks_header.php" method="POST">
                        <div class="form-group">
                            <label for="icon">Feedback - H2</label>
                            <input type="text" name="feedback_h2" class="form-control" id="icon" value="<?=$feedback_header_assoc['title']?>">
                        </div>                               
                        <div class="form-group">
                            <label for="description">Description</label>                            
                            <textarea name="description" class="form-control" style="min-height: 8rem;" cols="53" rows="5"><?=$feedback_header_assoc['description']?></textarea>
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