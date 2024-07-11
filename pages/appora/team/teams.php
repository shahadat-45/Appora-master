<?php session_start();
require '../../../element/db_connection.php';

$team = "SELECT * FROM teams";
$team_result = mysqli_query($db_connection, $team);

$team_header = "SELECT * FROM team_header WHERE id = 1 ";
$team_header_result = mysqli_query($db_connection, $team_header);
$team_header_assoc = mysqli_fetch_assoc($team_header_result);
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
                            <h4 class="card-title">Team members</h4>
                            <?php if(isset($_SESSION['member_deleted'])) { ?>
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong><?=$_SESSION['member_deleted']?></strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            <?php } else if(isset($_SESSION['member_updated'])) { ?>
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong><?=$_SESSION['member_updated']?></strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            <?php } unset($_SESSION['member_deleted'],$_SESSION['member_updated']) ?>
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
                                        Designation
                                    </th>
                                    <th>
                                        Photo
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
                                  <?php foreach ($team_result as $key => $team) { ?>
                                  <tr>
                                    <td class="py-1">
                                      <?=$key+1?>
                                    </td>
                                    <td>
                                      <?=$team['name']?>
                                    </td>                                    
                                    <td class="text-wrap">
                                      <?=$team['designation']?>
                                    </td>                                    
                                    <td>
                                    <img src="../../../images/team/<?=$team['photo']?>" alt="<?=$team['photo']?>" style="border-radius: 0; width: 80px;  height: auto; ">
                                    </td>                                    
                                    <td>
                                        <a href="update_page.php?id=<?=$team['id']?>">
                                      <button type="button" class="btn btn-primary btn-sm text-white">Update</button></a>
                                    </td>
                                    <td>
                                      <a href="delete_team.php?id=<?=$team['id']?>">
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
                <div class="col-lg-6 mx-auto">
                        <div class="card mx-auto mb-4">
                            <div class="card-body">
                                <h4 class="card-title">Add team members</h4>
                                <p class="card-description">Our team members slider</p>
                                <?php if(isset($_SESSION['teams_added'])) { ?>
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <strong><?=$_SESSION['teams_added']?></strong>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                <?php } else if(isset($_SESSION['img_size_err'])) { ?>
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <strong><?=$_SESSION['img_size_err']?></strong>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                <?php } unset($_SESSION['img_size_err'],$_SESSION['teams_added']) ?>
                                <form class="forms-sample" action="add_team_member.php" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="name">Name</label>     
                                    <input type="text" name="name" class="form-control" placeholder="<?=isset($_SESSION['name_null']) ? $_SESSION['name_null'] : "" ; unset($_SESSION['name_null']) ?>">
                                </div>                                                                
                                <div class="form-group">
                                    <label for="designation">Designation</label>
                                    <input type="text" name="designation" class="form-control" placeholder="<?=isset($_SESSION['designation_null']) ? $_SESSION['designation_null'] : "" ; unset($_SESSION['designation_null']) ?>">
                                </div>
                                <div class="d-flex justify-content-between">
                                <div class="form-group">
                                    <label for="facebook">Facebook</label>
                                    <input type="text" name="facebook" class="form-control" placeholder="Paste facebook link.." >
                                </div>                                                                
                                <div class="form-group">
                                    <label for="twitter">Twitter</label>
                                    <input type="text" name="twitter" class="form-control" placeholder="Paste twitter link..">
                                </div>
                                </div>
                                <div class="d-flex justify-content-between">
                                <div class="form-group">
                                    <label for="linkedin">Linkedin</label>
                                    <input type="text" name="linkedin" class="form-control" placeholder="Paste linkedin link.." >
                                </div>                                                                
                                <div class="form-group">
                                    <label for="behance">Behance</label>
                                    <input type="text" name="behance" class="form-control" placeholder="Paste behance link..">
                                </div>
                                </div>
                                <div class="form-group mb-1">
                                    <label for="photo">Photo</label>
                                    <input type="file" name="photo" class="form-control mb-3" id="photo" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])" style="line-height: 0;">
                                    <?php if(isset($_SESSION['photo_null'])) { ?>
                                        <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                                        <symbol id="exclamation-triangle-fill" viewBox="0 0 16 16">
                                            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                                        </symbol>
                                        </svg>
                                        <div class="alert alert-danger d-flex align-items-center p-1 mb-0" role="alert">
                                        <svg style="height: 20px; width: 20px;" class="bi flex-shrink-0 me-2" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                        <div>                                            
                                            <?=$_SESSION['photo_null']?>
                                        </div>
                                        </div>
                                    <?php } unset($_SESSION['photo_null']) ?>
                                    <img id="blah" width="150"/>
                                </div>
                                <button type="submit" class="btn btn-primary me-2">Add Member</button>                        
                                </form>
                            </div>
                        </div>
                </div>
                <div class="card col-md-4 mx-auto" style="height: auto">
                    <div class="card-body" >
                        <h4 class="card-title">Feedback Header </h4>
                        <p class="card-description">feedback head customize</p>
                        <?php if(isset($_SESSION['update_team_head'])) { ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong><?=$_SESSION['update_team_head']?></strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php } unset($_SESSION['update_team_head']) ?>
                        <form class="forms-sample" action="teams_header.php" method="POST">
                        <div class="form-group">
                            <label for="icon">Team Section - H2</label>
                            <input type="text" name="team_h2" class="form-control" id="icon" value="<?=$team_header_assoc['title']?>">
                        </div>                               
                        <div class="form-group">
                            <label for="description">Description</label>                            
                            <textarea name="description" class="form-control" style="min-height: 8rem;" cols="53" rows="5"><?=$team_header_assoc['description']?></textarea>
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