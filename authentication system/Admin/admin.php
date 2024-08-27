<?php
    require './Includes/config.php';
session_start();
// Check if the user is logged in and is an admin
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin' ) {
    header("Location: login.php");
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/bootstrap/css/bootstrap-select.min.css">

    <!-- icon css-->
    <link rel="stylesheet" href="./assets/elagent-icon/style.css">
    <link rel="stylesheet" href="./assets/animation/animate.css">

    <link href="./CSS/style.css" rel="stylesheet">
    <link rel="stylesheet" href="./CSS/style-main.css">
    <link rel="stylesheet" href="./CSS/responsive.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="body_wrapper">
        <nav class="navbar navbar-expand-lg menu_one menu_purple sticky-nav">
            <div class="container">

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <div class="d-flex justify-content-between w-100">
                <a href="logout.php" class="btn btn-outline-light ms-auto" 
                   style="color: white; border:3px groove white; border-radius:6px; padding:3px;">
                    Log out
                </a>
            </div>     
            </div>
            </div>
        </nav>
        <section class="doc_banner_area single_breadcrumb">
            <ul class="list-unstyled banner_shap_img">
                <li><img src="img/new/banner_shap1.png" alt=""></li>
                <li><img src="img/new/banner_shap4.png" alt=""></li>
                <li><img src="img/new/banner_shap3.png" alt=""></li>
                <li><img src="img/new/banner_shap2.png" alt=""></li>
                <li><img data-parallax='{"x": -180, "y": 80, "rotateY":2000}' src="img/new/plus1.png" alt=""></li>
                <li><img data-parallax='{"x": -50, "y": -160, "rotateZ":200}' src="img/new/plus2.png" alt=""></li>
                <li></li>
                <li></li>
                <li></li>
            </ul>
            <div class="container">
                <div class="doc_banner_content">
                <p>Welcome, Admin <?php echo htmlspecialchars($_SESSION['username']); ?>!</p>

                    <ul class="nav justify-content-center">
                        <li><a href="#">Role</a></li>
                        <li><a class="active" href="#"><p><?php echo htmlspecialchars($_SESSION['role']); ?></p>
                        </a></li>
                    </ul>
                </div>
            </div>
        </section>

        <!--================Forum Content Area =================-->
        <section class="forum-user-wrapper">
            <div class="container">
                <div class="row forum_main_inner">
                    <div class="col-lg-3">
                        <div class="author_option">
                            <div class="author_img">
                                <img class="img-fluid" src="img/encyclopedia.png" alt="">
                            </div>
                            <ul class="nav nav-tabs flex-column" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                                        aria-controls="home" aria-selected="true">
                                        <i class="icon_profile"></i> Profile
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="forum_body_area">
                            <div class="forum_topic_list">
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="home" role="tabpanel"
                                        aria-labelledby="home-tab">
                                        <div class="profile_info">
                                            <ul class="navbar-nav info_list">
                                            <li><span>ID:</span><a href="#"><?php echo  $_SESSION['user_id'] ; ?></a></li>
                                                <li><span>Name:</span><a href="#"><?php echo  $_SESSION['username'] ; ?></a></li>
                                                <li><span>Email:</span><a href="#"><?php echo $_SESSION['email'] ; ?></a></li>

                                            
                                            </ul>
                                            <ul class="nav p_social">
                                                <li><a href="#"><i class="social_facebook"></i></a></li>
                                                <li><a href="#"><i class="social_twitter"></i></a></li>
                                                <li><a href="#"><i class="social_pinterest"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    </div>

                            </div>
                        </div>
                    </div>
                </div>

                </div>
            </div>
        </section>
       
        <footer class="doc_footer_area">
            <div class="doc_footer_bottom">
                <div class="container d-flex justify-content-between">
                    
                    <p class="wow fadeInUp" data-wow-delay="0.3s" style="font-size: larger;" >© 2024 All Rights Reserved Design by
                        <span>Nancy Abduallh</span>
                    </p>
                </div>
            </div>
        </footer>
    </div>

</body>
</html>