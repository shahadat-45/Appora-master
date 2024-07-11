<?php
require '../element/db_connection.php';
$select_header = "SELECT * FROM headers WHERE status = 1";
$header_result = mysqli_query($db_connection, $select_header);

$select_logo = "SELECT * FROM header_logo";
$logo_result = mysqli_query($db_connection, $select_logo);
$logo_assoc = mysqli_fetch_assoc($logo_result);

$banner_img = "SELECT * FROM banner_img WHERE status = 1";
$banner_img_result = mysqli_query($db_connection, $banner_img);

$banner_text = "SELECT * FROM banner_content WHERE id = 1 ";
$text_result = mysqli_query($db_connection, $banner_text);
$text_assoc = mysqli_fetch_assoc($text_result);

$features = "SELECT * FROM features WHERE status = 1 ";
$features_result = mysqli_query($db_connection, $features);

$feature_head = "SELECT * FROM features_head WHERE id = 1 ";
$feature_head_result = mysqli_query($db_connection, $feature_head);
$feature_head_assoc = mysqli_fetch_assoc($feature_head_result);

$watch_videos = "SELECT * FROM `watch_videos` WHERE id = 1 ";
$videos_result = mysqli_query($db_connection, $watch_videos);
$videos_assoc = mysqli_fetch_assoc($videos_result);

$select_criteria = "SELECT * FROM `video_views`";
$criteria_result = mysqli_query($db_connection, $select_criteria);

$screenshots = "SELECT * FROM screenshots WHERE status = 1 ";
$screenshots_result = mysqli_query($db_connection, $screenshots);

$ss_content = "SELECT * FROM ss_content WHERE id = 1 ";
$ss_result = mysqli_query($db_connection, $ss_content);
$ss_content_assoc = mysqli_fetch_assoc($ss_result);

$feedback = "SELECT * FROM feedbacks";
$feedback_result = mysqli_query($db_connection, $feedback);

$feedback_header = "SELECT * FROM feedback_header WHERE id = 1 ";
$feedback_header_result = mysqli_query($db_connection, $feedback_header);
$feedback_header_assoc = mysqli_fetch_assoc($feedback_header_result);

$helps = "SELECT * FROM helps_header WHERE id = 1 ";
$helps_result = mysqli_query($db_connection, $helps);
$helps_assoc = mysqli_fetch_assoc($helps_result);

$helps_content = "SELECT * FROM helps";
$helps_assoc_result = mysqli_query($db_connection, $helps_content);

$faq_header = "SELECT * FROM faq_header WHERE id = 1 ";
$faq_header_result = mysqli_query($db_connection, $faq_header);
$faq_header_assoc = mysqli_fetch_assoc($faq_header_result);

$select_faq = "SELECT * FROM faqs";
$faq_result = mysqli_query($db_connection, $select_faq);

$team = "SELECT * FROM teams";
$team_result = mysqli_query($db_connection, $team);

$team_header = "SELECT * FROM team_header WHERE id = 1 ";
$team_header_result = mysqli_query($db_connection, $team_header);
$team_header_assoc = mysqli_fetch_assoc($team_header_result);

$contact = "SELECT * FROM contact WHERE id = 1 ";
$contact_result = mysqli_query($db_connection, $contact);
$contact_assoc = mysqli_fetch_assoc($contact_result);

$footer_content = "SELECT * FROM footer_content WHERE id = 1 ";
$footer_content_result = mysqli_query($db_connection, $footer_content);
$footer_content_assoc = mysqli_fetch_assoc($footer_content_result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appora</title>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;500;600;700&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="shortcut icon" href="images/fav-icon.png" type="image/x-icon">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/slick.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/venobox.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="font/flaticon.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/media.css">
</head>
<body>
    <!--Preloader part start-->
    <div class="preloader">
      <div class="pageloader-icon">
        <svg viewBox="0 0 120 120" class="svg-preloader">
            <symbol id="s-circle">
              <circle r="10" cx="10" cy="10"></circle>
            </symbol>
            <rect class="r-bounds" width="100%" height="100%" />
            <g id="circle" class="g-circles">
              <g class="g-circle">
                <use xlink:href="#s-circle" class="u-circle" /> </g>
              <g class="g-circle">
                <use xlink:href="#s-circle" class="u-circle" /> </g>
              <g class="g-circle">
                <use xlink:href="#s-circle" class="u-circle" /> </g>
              <g class="g-circle">
                <use xlink:href="#s-circle" class="u-circle" /> </g>
              <g class="g-circle">
                <use xlink:href="#s-circle" class="u-circle" /> </g>
              <g class="g-circle">
                <use xlink:href="#s-circle" class="u-circle" /> </g>
              <g class="g-circle">
                <use xlink:href="#s-circle" class="u-circle" /> </g>
              <g class="g-circle">
                <use xlink:href="#s-circle" class="u-circle" /> </g>
              <g class="g-circle">
                <use xlink:href="#s-circle" class="u-circle" /> </g>
              <g class="g-circle">
                <use xlink:href="#s-circle" class="u-circle" /> </g>
              <g class="g-circle">
                <use xlink:href="#s-circle" class="u-circle" /> </g>
              <g class="g-circle">
                <use xlink:href="#s-circle" class="u-circle" /> </g>
            </g>
          </svg>
      </div>
    </div>
    <!--Preloader part start-->
    <!--Navbar part start-->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
          <a class="navbar-brand" href="#">
              <img src="../images/logo/<?=$logo_assoc['photo']?>" alt="logo" class="img-fluid">
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa fa-bars"></i>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <?php foreach ($header_result as $key => $header) { ?>            
              <li class="nav-item active">
                <a class="nav-link scroll-link" href="#contact"><?=$header['item']?></a>
              </li>
            <?php  } ?>              
            </ul>
          </div>
        </div>
      </nav>
    <!--Navbar part end-->
    <!--Banner part start-->
    <section id="banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                  <div class="row">
                      <div class="col-lg-7 col-md-7">
                          <div class="banner-content">
                              <h1><?=$text_assoc['title']?></h1>
                              <p><?=$text_assoc['description']?></p>
                          </div>
                          <div class="banner-btn">
                            <a href="<?=$text_assoc['link1']?>"> <i class="fa fa-apple"></i> app store</a>
                            <a href="<?=$text_assoc['link2']?>"> <i class="fa fa-android"></i> play store</a>
                          </div>
                      </div>
                      <div class="col-xl-3 col-lg-4 ms-auto col-md-5">
                            <div class="main-banner-slider">
                              <div class="banner-right-phone text-end">
                                <img src="images/banner-shape.png" alt="banner-shape" class="w-100 img-fluid">
                              </div>
                              <div class="screen-banner-slider">
                                <?php foreach ($banner_img_result as $key => $banner_img) { ?>
                                 <div class="screen-inner">
                                  <img src="../images/banner/<?=$banner_img['photo']?>" alt="screen1" class="w-100 img-fluid">
                                </div>
                              <?php  } ?>
                              </div>
                            </div>
                      </div>
                  </div>
                </div>
            </div>
        </div>
        <div class="banner-shape">
            <div class="custom-shape-divider-bottom-1615658124">
                <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                    <path d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z" opacity=".25" class="shape-fill"></path>
                    <path d="M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z" opacity=".5" class="shape-fill"></path>
                    <path d="M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z" class="shape-fill"></path>
                </svg>
            </div>
        </div>
    </section>
    <!--Banner part end-->
    <!--Feature part start-->
    <section id="feature">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 m-auto">
            <div class="header text-center wow fadeInUp" data-wow-duration="1s" data-wow-delay=".6s">
              <h2><?=$feature_head_assoc['title']?></h2>
              <p><?=$feature_head_assoc['description']?></p>
            </div>
          </div>
        </div>
        <div class="row wow fadeInUp">
        <?php foreach($features_result as $key => $feature) { ?>
          <div class="col-lg-4 col-sm-6">
            <div class="main-features text-center p-4">
              <i class="<?=$feature['icon']?>"></i>
              <div class="feature-text">
                <h4><?=$feature['title']?></h4>
                <p><?=$feature['description']?></p>
              </div>
            </div>
          </div>
        <?php } ?>  
        </div>
      </div>
    </section>
    <!--Feature part end-->
    <!--Overview part start-->
    <div class="overview">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 m-auto">
            <div class="overview-text text-center">
              <h3><?=$videos_assoc['title']?></h3>
              <p><?=$videos_assoc['description']?></p>
            </div>
            <a class="venobox" data-autoplay="true" data-vbtype="video" href="<?=$videos_assoc['link']?>">
              <div class="pulse-main">
                <i class="fa fa-play"></i>
              </div>
            </a>
          </div>
        </div>
      </div>
      <div class="custom-shape-divider-bottom-1615988814">
        <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z" opacity=".25" class="shape-fill"></path>
            <path d="M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z" opacity=".5" class="shape-fill"></path>
            <path d="M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z" class="shape-fill"></path>
        </svg>
      </div>
    </div>
    <!--Overview part end-->
    <!--Counter-up part start-->
    <section id="counter">
      <div class="container">
        <div class="row">
          <?php foreach ($criteria_result as $key => $criteria) { ?>
            <div class="col-lg-3 col-6 col-md-3">
            <div class="main-counterup text-center wow bounceInUp" data-wow-duration=".6s" data-wow-delay=".<?=$key + 3 ?>s">
              <h3><span class="counter"><?=$criteria['number']?></span><span><?=$criteria['unit']?></span></h3>
              <p><?=$criteria['title']?></p>
            </div>
          </div> 
        <?php  } ?>                   
        </div>
      </div>
    </section>
    <!--Counter-up part end-->
    <!--Screenshots part start-->
    <section id="screenshot">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 m-auto">
            <div class="header text-center">
              <h2><?=$ss_content_assoc['title']?></h2>
              <p><?=$ss_content_assoc['description']?></p>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <div class="screen-slider">
              <div class="screenshot-frame d-none d-lg-block"></div>
              <div class="screen-main owl-carousel owl-theme">
                <?php foreach ($screenshots_result as $key => $screenshots) { ?>
                  <img src="../images/screenshots/<?=$screenshots['photo']?>" alt="screen<?=$key+1?>" class="img-fluid">
              <?php  } ?>
            </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--Screenshots part end-->
    <!------People part start------>
    <section id="people">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 m-auto">
            <div class="header text-center">
              <h2><?=$feedback_header_assoc['title']?></h2>
              <p><?=$feedback_header_assoc['description']?></p>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-8 m-auto">
              <div class="row">
                <div class="col-lg-4 col-md-4">
                  <div class="peoples-image-main">
                    <div class="inner-people-images">
                      <img src="images/people-1.jpg" alt="p-1" class="w-100 img-fluid">
                    </div>
                    <div class="inner-people-images">
                      <img src="images/people-2.jpg" alt="p-2" class="w-100 img-fluid">
                    </div>
                    <div class="inner-people-images">
                      <img src="images/people-3.jpg" alt="p-3" class="w-100 img-fluid">
                    </div>
                    <div class="inner-people-images">
                      <img src="images/people-4.jpg" alt="p-4" class="w-100 img-fluid">
                    </div>
                  </div>
                </div>
                <div class="col-lg-8 col-md-8 ps-md-4 arrows-people">
                  <div class="peoples-feedback pt-4">
                  <?php foreach ($feedback_result as $key => $feedback) { ?>
                   <div class="people-message">
                      <p><?=$feedback['description']?></p>
                      <div class="people-name">
                        <h4><?=$feedback['name']?></h4>
                      </div>
                      <div class="ratings">
                        <?php for ($i=0; $i < $feedback['status']; $i++) { ?>
                          <i class="fa fa-star"></i>                          
                      <?php  } ?>
                      </div>
                    </div>
                <?php  } ?>
                  </div>
                  <i class="fa fa-arrow-left left d-none d-md-block" aria-hidden="true"></i>
                  <i class="fa fa-arrow-right right  d-none d-md-block" aria-hidden="true"></i>
                </div>
              </div>
          </div>
        </div>
      </div>
    </section>
    <!------People part end------>
    <!------Price part start------>
    <section id="price">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 m-auto">
            <div class="header text-center">
              <h2>Pricing Plan</h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laborum obcaecati dignissimos quae quo ad iste ipsum officiis deleniti asperiores sit.</p>
            </div>
          </div>
        </div>
        <div class="main-pricing-card">
          <div class="row">
            <div class="col-lg-4 col-md-6">
              <div class="pricing-card wow bounceInDown">
                <h3 class="pricing-card-header header-gradient">gold</h3>
                <div class="price"><sup>$</sup>150<span>/Mo</span></div>
                <ul>
                  <li>Sell 1 product & accept donation</li>
                  <li>18 customize sub page</li>
                  <li>100 disk space</li>
                  <li>110 gb cloud storage</li>
                  <li>-</li>
                  <li>-</li>
                </ul>
                <a href="#" class="purchase-btn">Purchase Now</a>
              </div>
            </div>
            <div class="col-lg-4 col-md-6">
              <div class="pricing-card wow bounceInUp">
                <h3 class="pricing-card-header header-gradient">platinum</h3>
                <div class="price"><sup>$</sup>182<span>/Mo</span></div>
                <ul>
                  <li>Sell 5 product & accept donation</li>
                  <li>25 customize sub page</li>
                  <li>150 disk space</li>
                  <li>500 gb cloud storage</li>
                  <li>5 analyzer</li>
                  <li>-</li>
                </ul>
                <a href="#" class="purchase-btn">Purchase Now</a>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 m-md-auto">
              <div class="pricing-card wow bounceInDown">
                <h3 class="pricing-card-header header-gradient">diamond</h3>
                <div class="price"><sup>$</sup>200<span>/Mo</span></div>
                <ul>
                  <li>Sell 10 product & accept donation</li>
                  <li>32 customize sub page</li>
                  <li>250 disk space</li>
                  <li>1 tb cloud storage</li>
                  <li>8 analyzer</li>
                  <li>24/7 support</li>
                </ul>
                <a href="#" class="purchase-btn">Purchase Now</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!------Price part end------>
    <!------Communication part start------>
    <section id="communicate">
      <div class="container">
        <div class="row">
          <div class="col-lg-7">
            <div class="communication-left wow slideInLeft">
              <div class="left-communicate-header">
                <h2><?=$helps_assoc['title']?></h2>
              <p><?=$helps_assoc['description']?></p>
              </div>
              <div class="appora-lists">
                <ul>
                  <?php foreach ($helps_assoc_result as $key => $helps) { ?>
                     <li>
                    <div class="main-introduce d-flex">
                      <i class="fa fa-check"></i>
                      <p><?=$helps['description']?></p>
                    </div>
                  </li>
                <?php  } ?>                                   
                </ul>
              </div>
              <div class="read-left">
                <a href="<?=$helps_assoc['link']?>">read more</a>
              </div>
            </div>
          </div>
          <div class="col-lg-5">
            <div class="communication-right wow slideInRight">
              <img src="../images/<?=$helps_assoc['photo']?>" alt="mobile-sample" class="w-100 img-fluid">
            </div>
          </div>
        </div>
      </div>
    </section>
    <!------communication part end------>
    <!------Faq part start------>
    <section id="faq">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 m-auto">
            <div class="header text-center">
              <h2><?=$faq_header_assoc['title']?></h2>
              <p><?=$faq_header_assoc['description']?></p>
            </div>
          </div>
        </div>
        <div class="faq-body">
          <div class="row align-items-md-center">
            <div class="col-lg-3 col-md-6">
              <div class="phone-left">
                <img src="../images/<?=$faq_header_assoc['photo']?>" alt="left-phone" class="w-100 img-fluid">
              </div>
            </div>
            <div class="col-lg-6 col-md-6 offset-lg-3">
              <div class="main-accrdion">
                <div class="accordion" id="accordionExample">
                  <?php
                  $f = new NumberFormatter("en", NumberFormatter::SPELLOUT);                 
                  foreach ($faq_result as $key => $faq) { ?>
                    <div class="accordion-item">
                      <h2 class="accordion-header" id="heading<?=$f->format($key + 1)?>">
                        <button class="accordion-button <?=$key==0 ? '' : 'collapsed' ?> d-flex justify-content-between" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?=$f->format($key + 1)?>" aria-expanded="false" aria-controls="collapse<?=$f->format($key + 1)?>">
                          <?=$faq['question']?>
                            <i class="fa fa-plus" aria-hidden="true"></i>
                        </button>
                      </h2>
                      <div id="collapse<?=$f->format($key + 1)?>" class="accordion-collapse <?=$key==0 ? 'show' : '' ?> collapse" aria-labelledby="heading<?=$f->format($key + 1)?>" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                          <p><?=$faq['answer']?></p>
                        </div>
                      </div>
                    </div>
                 <?php } ?>
                  </div>
            </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!------Faq part end------>
    <!------Team part start------>
    <section id="team">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 m-auto">
            <div class="header text-center">
              <h2><?=$team_header_assoc['title']?></h2>
              <p><?=$team_header_assoc['description']?></p>
            </div>
          </div>
        </div>
        <div class="row main-team-slider">
          <?php foreach ($team_result as $key => $team) { ?>
            <div class="col-lg-3">
            <div class="inner-team">
              <div class="sub-team position-relative">
                <img src="../images/team/<?=$team['photo']?>" alt="team1" class="w-100 img-fluid">
                <div class="team-overlay position-absolute top-0 start-0 w-100 h-100 d-flex justify-content-center align-items-center">
                  <div class="team-social">
                    <a href="<?=$team['facebook']?>"><i class="fa fa-facebook"></i></a>
                    <a href="<?=$team['twitter']?>"><i class="fa fa-twitter"></i></a>
                    <a href="<?=$team['linkedin']?>"><i class="fa fa-linkedin"></i></a>
                    <a href="<?=$team['behance']?>"><i class="fa fa-behance"></i></a>
                  </div>
                </div>
              </div>
              <div class="team-name text-center">
                <h3><?=$team['name']?></h3>
                <p><?=$team['designation']?></p>
              </div>
            </div>
          </div>
         <?php }?>
        </div>
      </div>
    </section>
    <!------Team part end------>
    <!------Contact part start------>
    <section id="contact">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 m-auto">
            <div class="header text-center">
              <h2><?=$contact_assoc['title_h2']?></h2>
              <p><?=$contact_assoc['description_h2']?></p>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-4 col-md-12">
            <div class="left-contact-info wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s">
              <div class="row">
                <div class="col-lg-12 col-md-6">
                  <div class="left-header">
                    <h3><?=$contact_assoc['title_h3']?></h3>
                    <p><?=$contact_assoc['description_h3']?></p>
                  </div>
                </div>
                <div class=" col-lg-12 col-md-6">
                  <div class="row main-info mb-3 align-items-center">
                    <div class="col-lg-2 col-md-2">
                      <div class="social-info">
                        <i class="fa fa-home"></i>
                      </div>
                    </div>
                    <div class="col-lg-10 col-md-10">
                      <div class="info-add">
                        <a href="#"><?=$contact_assoc['address']?></a>
                      </div>
                    </div>
                  </div>
                  <div class="row main-info mb-3 align-items-center">
                    <div class="col-lg-2 col-md-2">
                      <div class="social-info">
                        <i class="fa fa-envelope"></i>
                      </div>
                    </div>
                    <div class="col-lg-10 col-md-10">
                      <div class="info-add">
                        <a href="#"><?=$contact_assoc['email']?></a>
                      </div>
                    </div>
                  </div>
                  <div class="row main-info align-items-center">
                    <div class="col-lg-2 col-md-2">
                      <div class="social-info">
                        <i class="fa fa-phone"></i>
                      </div>
                    </div>
                    <div class="col-lg-10 col-md-10">
                      <div class="info-add">
                        <a href="#"><?=$contact_assoc['phone']?></a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6 offset-lg-2 col-md-12">
            <div class="contact-form wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s">
              <form action="../pages/users/massage_post.php" method="POST">
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <input type="text" name="name" class="form-control" placeholder="Name" id="fname">
                      <div class="err_msg" id="err_name"></div>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <input type="email" name="email" class="form-control" placeholder="Email" id="gmail">
                      <div class="err_msg" id="err_mail"></div>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group">
                      <input type="text" name="subject" class="form-control" placeholder="Subject" id="sub">
                      <div class="err_msg" id="err_sub"></div>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group">
                      <textarea placeholder="Message" name="massage" id="cmmnt"></textarea>
                      <div class="err_msg" id="err_cmmnt"></div>
                    </div>
                  </div>
                  <div class="form-btn">
                    <button type="submit" onclick="return send()">Get In Touch</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!------Contact part end------>
    <!------Footer part start------>
    <footer id="footer">
      <div class="container">
        <div class="row">
          <div class="col-lg-3 col-md-6">
            <div class="footer-items">
              <div class="footer-header-icon">
                <img src="../images/logo/<?=$footer_content_assoc['photo']?>" alt="footer-logo" class="img-fluid">
              </div>
              <p class="pt-3"><?=$footer_content_assoc['description']?></p>
              <div class="footer-social-icons">
                <a href="<?=$footer_content_assoc['facebook']?>" class="fa fa-facebook"></a>
                <a href="<?=$footer_content_assoc['linkedin']?>" class="fa fa-linkedin"></a>
                <a href="<?=$footer_content_assoc['twitter']?>" class="fa fa-twitter"></a>
                <a href="<?=$footer_content_assoc['pinterest']?>" class="fa fa-pinterest-p"></a>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-sm-4 col-md-3">
            <div class="footer-items">
              <div class="main-links">
                <div class="footer-header">
                  <h3>Quick Links</h3>
                </div>
                <div class="main-footer-list">
                    <ul>
                      <li><a href="#">home</a></li>
                      <li><a href="#">about us</a></li>
                      <li><a href="#">terms & condition</a></li>
                      <li><a href="#">contact us</a></li>
                      <li><a href="#">FAQ's</a></li>
                    </ul>
              </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-sm-4 col-md-3">
            <div class="footer-items">
              <div class="main-links">
                <div class="footer-header">
                  <h3>Need Help?</h3>
                </div>
                <div class="main-footer-list">
                    <ul>
                      <li><a href="#">general help</a></li>
                      <li><a href="#">support</a></li>
                      <li><a href="#">privacy & policy</a></li>
                      <li><a href="#">testimonials</a></li>
                    </ul>
              </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-sm-4 col-md-6">
            <div class="footer-items">
              <div class="main-links">
                <div class="footer-header">
                  <h3>Service</h3>
                </div>
                <div class="main-footer-list">
                    <ul>
                      <li><a href="#">design</a></li>
                      <li><a href="#">development</a></li>
                      <li><a href="#">maintanance</a></li>
                      <li><a href="#">returns</a></li>
                    </ul>
              </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!------Back-to-top part start------>
      <div class="back-to-top">
        <i class="fa fa-chevron-up"></i>
      </div>
      <!------Back-to-top part end------>
    </footer>
    <!------Footer part end------>
    <!------Copyright part start------>
    <div class="copyright-area">
      <div class="container">
        <div class="main-copyright">
          <div class="row">
            <div class="col-lg-8 m-auto">
              <div class="copyright-inner text-center">
                <p>Copyright &copy; 2021.All rights reserved by<span> Appora</span></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!------Copyright part end------>
    <script src="js/jquery-1.12.4.min.js"></script>
    <script src="js/slick.min.js"></script>
    <script src="js/venobox.min.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/jquery.counterup.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/custom.js"></script>
</body>
</html>