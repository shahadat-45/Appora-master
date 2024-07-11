<?php session_start();
if (!isset($_SESSION['admin_page'])) {
  header('location:/template/pages/users/login.php');
}
require 'db_connection.php';
$email = $_SESSION['profile_email'];
$profile_image = "SELECT * FROM users WHERE email = '$email' ";;
$profile_image_result = mysqli_query($db_connection, $profile_image);
$profile_image_assoc = mysqli_fetch_assoc($profile_image_result);

$massage = "SELECT * FROM massages ORDER BY created_at DESC LIMIT 4";
$massage_result = mysqli_query($db_connection, $massage);

$unread_msg = "SELECT COUNT(*) as total FROM massages WHERE status = 0";
$unread_msg_res = mysqli_query($db_connection, $unread_msg);
$unread_msg_assoc = mysqli_fetch_assoc($unread_msg_res);
?>
<nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
  <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
    <div class="me-3">
      <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-bs-toggle="minimize">
        <span class="icon-menu"></span>
      </button>
    </div>
    <div>
      <a class="navbar-brand brand-logo" href="index.html">
        <img src="/template/images/logo.svg" alt="logo" />
      </a>
      <a class="navbar-brand brand-logo-mini" href="index.html">
        <img src="/template/images/logo-mini.svg" alt="logo" />
      </a>
    </div>
  </div>
  <div class="navbar-menu-wrapper d-flex align-items-top"> 
    <ul class="navbar-nav">
      <li class="nav-item font-weight-semibold d-none d-lg-block ms-0">
        <h1 class="welcome-text">Good Morning, <span class="text-black fw-bold">John Doe</span></h1>
        <h3 class="welcome-sub-text">Your performance summary this week </h3>
      </li>
    </ul>
    <ul class="navbar-nav ms-auto">
      <li class="nav-item dropdown d-none d-lg-block">
        <a class="nav-link dropdown-bordered dropdown-toggle dropdown-toggle-split" id="messageDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false"> Select Category </a>
        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list pb-0" aria-labelledby="messageDropdown">
          <a class="dropdown-item py-3" >
            <p class="mb-0 font-weight-medium float-left">Select category</p>
          </a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item preview-item">
            <div class="preview-item-content flex-grow py-2">
              <p class="preview-subject ellipsis font-weight-medium text-dark">Bootstrap Bundle </p>
              <p class="fw-light small-text mb-0">This is a Bundle featuring 16 unique dashboards</p>
            </div>
          </a>
          <a class="dropdown-item preview-item">
            <div class="preview-item-content flex-grow py-2">
              <p class="preview-subject ellipsis font-weight-medium text-dark">Angular Bundle</p>
              <p class="fw-light small-text mb-0">Everything you’ll ever need for your Angular projects</p>
            </div>
          </a>
          <a class="dropdown-item preview-item">
            <div class="preview-item-content flex-grow py-2">
              <p class="preview-subject ellipsis font-weight-medium text-dark">VUE Bundle</p>
              <p class="fw-light small-text mb-0">Bundle of 6 Premium Vue Admin Dashboard</p>
            </div>
          </a>
          <a class="dropdown-item preview-item">
            <div class="preview-item-content flex-grow py-2">
              <p class="preview-subject ellipsis font-weight-medium text-dark">React Bundle</p>
              <p class="fw-light small-text mb-0">Bundle of 8 Premium React Admin Dashboard</p>
            </div>
          </a>
        </div>
      </li>
      <li class="nav-item d-none d-lg-block">
        <div id="datepicker-popup" class="input-group date datepicker navbar-date-picker">
          <span class="input-group-addon input-group-prepend border-right">
            <span class="icon-calendar input-group-text calendar-icon"></span>
          </span>
          <input type="text" class="form-control">
        </div>
      </li>
      <li class="nav-item">
        <form class="search-form" action="#">
          <i class="icon-search"></i>
          <input type="search" class="form-control" placeholder="Search Here" title="Search here">
        </form>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link count-indicator" id="notificationDropdown" href="#" data-bs-toggle="dropdown">
          <i class="icon-mail icon-lg"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list pb-0" aria-labelledby="notificationDropdown">
          <a class="dropdown-item py-3 border-bottom">
            <p class="mb-0 font-weight-medium float-left">You have 4 new notifications </p>
            <span class="badge badge-pill badge-primary float-right">View all</span>
          </a>
          <a class="dropdown-item preview-item py-3">
            <div class="preview-thumbnail">
              <i class="mdi mdi-alert m-auto text-primary"></i>
            </div>
            <div class="preview-item-content">
              <h6 class="preview-subject fw-normal text-dark mb-1">Application Error</h6>
              <p class="fw-light small-text mb-0"> Just now </p>
            </div>
          </a>
          <a class="dropdown-item preview-item py-3">
            <div class="preview-thumbnail">
              <i class="mdi mdi-settings m-auto text-primary"></i>
            </div>
            <div class="preview-item-content">
              <h6 class="preview-subject fw-normal text-dark mb-1">Settings</h6>
              <p class="fw-light small-text mb-0"> Private message </p>
            </div>
          </a>
          <a class="dropdown-item preview-item py-3">
            <div class="preview-thumbnail">
              <i class="mdi mdi-airballoon m-auto text-primary"></i>
            </div>
            <div class="preview-item-content">
              <h6 class="preview-subject fw-normal text-dark mb-1">New user registration</h6>
              <p class="fw-light small-text mb-0"> 2 days ago </p>
            </div>
          </a>
        </div>
      </li>
      <li class="nav-item dropdown"> 
        <a class="nav-link count-indicator" id="countDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
          <i class="icon-bell"></i>
          <span class="<?=$unread_msg_assoc['total'] == 0 ? '' : 'count' ?>"></span>
        </a>
        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list pb-0" aria-labelledby="countDropdown">
          <a class="dropdown-item py-3" href="/template/pages/users/massage.php">
            <p class="mb-0 font-weight-medium float-left">You have <?=$unread_msg_assoc['total']?> unread massages </p>
            <span class="badge badge-pill badge-primary float-right">View all</span>
          </a>
          <div class="dropdown-divider"></div>
          <?php foreach ($massage_result as $key => $masge) { ?>
             <a class="dropdown-item preview-item">
            <div class="preview-thumbnail">
              <img src="/template/images/profile/default_picture.webp" alt="default_picture" class="img-sm profile-pic">
            </div>
            <div class="preview-item-content flex-grow py-2">
              <p class="preview-subject ellipsis font-weight-medium text-dark"><?=$masge['name']?></p>
              <p class="fw-light small-text mb-0">Sent The massage at <?=$masge['created_at']?></p>
            </div>
          </a>
        <?php  } ?>
        </div>
      </li>
      <li class="nav-item dropdown d-none d-lg-block user-dropdown">
        <a class="nav-link" id="UserDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
          <img class="img-xs rounded-circle" src="/template/images/profile/<?=$profile_image_assoc['photo'] == null ? 'default_picture.webp' : $profile_image_assoc['photo'] ?>" alt="Profile image"> </a>
        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
          <div class="dropdown-header text-center">
            <img class="rounded-circle" src="/template/images/profile/<?=$profile_image_assoc['photo'] == null ? 'default_picture.webp' : $profile_image_assoc['photo'] ?>" alt="Profile image" width="40px">
            <p class="mb-1 mt-3 font-weight-semibold">Allen Moreno</p>
            <p class="fw-light text-muted mb-0">allenmoreno@gmail.com</p>
          </div>
          <a href="/template/pages/profile/profile.php" class="dropdown-item"><i class="dropdown-item-icon mdi mdi-account-outline text-primary me-2"></i> My Profile <span class="badge badge-pill badge-danger">1</span></a>
          <a class="dropdown-item" href="/template/pages/users/massage.php" ><i class="dropdown-item-icon mdi mdi-message-text-outline text-primary me-2"></i> Messages</a>
          <a class="dropdown-item"><i class="dropdown-item-icon mdi mdi-calendar-check-outline text-primary me-2"></i> Activity</a>
          <a class="dropdown-item"><i class="dropdown-item-icon mdi mdi-help-circle-outline text-primary me-2"></i> FAQ</a>
          <a class="dropdown-item" href="/template/pages/users/logout.php"><i class="dropdown-item-icon mdi mdi-power text-primary me-2"></i>Sign Out</a>
        </div>
      </li>
    </ul>
    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-bs-toggle="offcanvas">
      <span class="mdi mdi-menu"></span>
    </button>
  </div>
</nav>
