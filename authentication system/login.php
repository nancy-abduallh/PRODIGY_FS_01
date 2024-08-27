<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require './Includes/config.php';

    $username_or_email = trim($_POST['username_or_email']);
    $password = trim($_POST['password']);

    // Validate inputs
    if (empty($username_or_email) || empty($password)) {
        $error = "All fields are required.";
    } else {
        // Check if user exists
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ? OR username = ?");
        $stmt->execute([$username_or_email, $username_or_email]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password'])) {
            // Set session variables
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'];
            $_SESSION['email'] = $user['email'];

            header("Location: dashboard.php");
            exit();
        } else {
            $error = "Invalid username/email or password.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
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
    <div class="body_wrapper ">
        <section class="signup_area mb-5">
            <div class="row ml-0 mr-0">
                <div class="sign_left signin_left">
                    <h2>User Authentication System</h2>
                    <img class="position-absolute top" src="img/signup/top_ornamate.png" alt="top">
                    <img class="position-absolute bottom" src="img/signup/bottom_ornamate.png" alt="bottom">
                    <img class="position-absolute middle" src="img/signup/depositphotos_63366419-stock-illustration-sign-in-icon-design.jpg" alt="bottom">
                    <div class="round"></div>
                </div>
                <div class="sign_right signup_right">
                    <div class="sign_inner signup_inner">
                        <div class="text-center mb-5">
                            <p>Don’t have an account yet? <a href="register.php" class="text-primary">Sign up here</a></p>
                            <a href="#" class="btn-google"><img src="img/signup/gmail.png" alt=""><span class="btn-text mb-5">Sign in with Gmail</span></a>
                        </div>
                        <div class="divider">
                            <span class="or-text">or</span>
                        </div>
                        <?php if (isset($error)): ?>
                            <div class="alert alert-danger rounded-pill text-center "><?php echo $error; ?></div>
                        <?php endif; ?>
                        <form method="POST" action="login.php">
                            <div class="col-lg-12 form-group">
                                <label for="username_or_email" class="small_text">Username or Email</label>
                                <input type="text" name="username_or_email" class="form-control" id="username_or_email" required>
                            </div>
                            <div class="col-lg-12 form-group">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" id="password" required>
                                <a href="#" class="forget_btn">Forgotten password?</a>
                            </div>


                            <div class="col-lg-12 text-center">
                                <button type="submit" class="btn action_btn thm_btn">Sign in</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <footer class="doc_footer_area mb-5">
        <div class="doc_footer_bottom">
            <div class="container d-flex justify-content-between">
                <p class="wow fadeInUp" data-wow-delay="0.3s">© 2024 All Rights Reserved Design by
                    <span>Nancy Abdullah</span>
                </p>
            </div>
        </div>
    </footer>
    <script src="./js/jquery-3.5.1.min.js"></script>
    <script src="./js/pre-loader.js"> </script>
    <script src="./assets/bootstrap/js/popper.min.js"></script>
    <script src="./assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="./js/parallaxie.js"></script>
    <script src="./js/TweenMax.min.js"></script>
    <script src="./assets/wow/wow.min.js"></script>
    <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
    <script src="./js/main.js"></script>
</body>

</html>