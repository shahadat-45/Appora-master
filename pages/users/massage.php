<?php session_start();
require '../../element/db_connection.php';

$msg = "SELECT * FROM massages ORDER BY id DESC ";
$msg_result = mysqli_query($db_connection, $msg);

?>

<?php require '../../element/head.php' ?>

<body class="with-welcome-text">
  <div class="container-scroller">
    <?php require '../../element/navbar.php' ?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper" style="padding-top: 53px;">
      <!-- partial:partials/_settings-panel.html -->

      <?php ///require 'element/settings-panel.php' ?>

      <!-- partial -->
      <?php require '../../element/side_bar.php' ?>
      <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <form class="card" action="all_checked_massage.php" method="POST" id="form">
                        <div class="card-body">
                          <div class="d-flex justify-content-between">
                            <h4 class="card-title">Massages from people</h4>
                            <div class="button">
                              <button type="submit" name="btn" value="1" id="mark_read" class="btn btn-info btn-sm">Mark as read</button>
                              <button type="submit" name="btn" value="2" id="mark_delete" class="btn btn-warning btn-sm">Delete</button>
                            </div>
                          </div>
                            <?php if(isset($_SESSION['massage_deleted'])) { ?>
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong><?=$_SESSION['massage_deleted']?></strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>                          
                            <?php } unset($_SESSION['massage_deleted']) ?>
                            <div class="table-responsive">                            
                            <table class="table table-striped" style="--bs-table-striped-bg: none;">
                                <thead>
                                  <tr>
                                    <th class="ps-1">
                                    <div class="form-check">
                                      <input class="form-check-input ms-0" type="checkbox" value="" id="flexCheckDefault">
                                      <label class="form-check-label" for="flexCheckDefault">
                                      Check all
                                      </label>
                                    </div>                                    
                                    </th>
                                    <th>
                                      Name
                                    </th>                                   
                                    <th>
                                      Email
                                    </th>
                                    <th>
                                      Subject
                                    </th>
                                    <th>
                                      Massage
                                    </th>
                                    <th>
                                      Action
                                    </th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php foreach ($msg_result as $key => $massage) { ?>
                                  <tr style="<?=$massage['status'] == 0 ? '--bs-table-bg: rgba(0, 0, 0, 0.10);' : '' ?>">
                                    <td class="py-1">
                                      <input class="form-check-input" type="checkbox" name="foo[]" id="flexCheckDefault" value="<?=$massage['id']?>">
                                    </td>
                                    <td class="text-wrap" style="line-height: 1.5;">
                                      <?=$massage['name']?>
                                    </td>
                                    <td>
                                     <?=$massage['email']?>
                                    </td>
                                    <td>
                                      <?=$massage['subject']?>
                                    </td>
                                    <td class="text-wrap">
                                      <?=substr($massage['massage'], 0, 25) . '... .' ?>
                                    </td>
                                    <td>
                                    <a href="mark_as_read.php?id=<?=$massage['id']?>"><button title="Mark as read" type="button" class="btn btn-primary btn-rounded btn-icon" style="padding: 0.3rem 0.6rem;"><i class="fa-regular fa-envelope-open"></i></button></a>
                                    <a href="delete_massage.php?id=<?=$massage['id']?>"><button title="Delete massage" type="button" class="btn btn-danger btn-rounded btn-icon" style="padding: 0.3rem 0.6rem;"><i class="fa-regular fa-trash-can"></i></button></a>
                                    </td>
                                  </tr>  
                                  <?php  } ?>                                
                                </tbody>
                              </table>
                              </form>
                            </div>
                        </div>
                      </form>
                </div>                
            </div>
        </div>
        <!-- content-wrapper ends -->
<?php require '../../element/footer.php'?>  
        <!-- partial -->
    </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

<?php require '../../element/footer_links.php'?>

<script language="JavaScript">
$("#flexCheckDefault").click(function(){
    $('input:checkbox').not(this).prop('checked', this.checked);
});
</script>
<!-- <script>
    document.getElementById("mark_read").onclick = function () {
        document.getElementById('form').submit();
    }
    document.getElementById("mark_delete").onclick = function () {
        document.getElementById('form').submit();
    }
</script> -->