<?php if(isset($_SESSION['user_deleted'])) { ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong><?=$_SESSION['user_deleted']?></strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php } unset($_SESSION['user_deleted']) ?>