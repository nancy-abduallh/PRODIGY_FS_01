<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require './Includes/config.php';

    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $confirm_password = trim($_POST['confirm_password']);
    
    // Validate inputs
    if (empty($username) || empty($email) || empty($password) || empty($confirm_password)) {
        $error = "All fields are required.";
    } elseif ($password !== $confirm_password) {
        $error = "Passwords do not match.";
    } else {
     // Check if email or username already exists
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ? OR username = ?");
        $stmt->execute([$email, $username]);
        if ($stmt->rowCount() > 0) {
            $error = "Email or Username already exists.";
        } else {
        // Hash the password and insert the user
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $pdo->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
            if ($stmt->execute([$username, $email, $hashed_password])) {
                header("Location: login.php");
                exit();
            } else {
                $error = "Registration failed. Please try again.";
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>
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
        <section class="signup_area signup_area_height">
            <div class="row ml-0 mr-0">
                <div class="sign_left signup_left">
                    <h2>User Authentication System</h2>
                    <img class="position-absolute top" src="img/signup/top_ornamate.png" alt="top">
                    <img class="position-absolute bottom" src="img/signup/bottom_ornamate.png" alt="bottom">
                    <img class="position-absolute middle wow fadeInRight" src="img/signup/depositphotos_83678144-stock-illustration-sign-up-icon-design.jpg" alt="bottom">
                    <div class="round wow zoomIn" data-wow-delay="0.2s"></div>
                </div>
                <div class="sign_right signup_right mb-5">
                    <div class="sign_inner signup_inner">
                        <div class="text-center">
                            <p>Already have an account? <a href="login.php" class="text-primary">Sign in</a></p>
                            <a href="#" class="btn-google"><img src="img/signup/gmail.png" alt=""><span class="btn-text">Sign up with Google</span></a>
                        </div>
                        <div class="divider">
                            <span class="or-text">or</span>
                        </div>
                        <?php if (isset($error)): ?>
                        <div class="alert alert-danger rounded-pill text-center"><?php echo $error; ?></div>
                    <?php endif; ?>
                    <form method="POST" action="register.php">
                            <div class="col-sm-6 form-group">
                                <div class="small_text">Username </div>
                                <input type="text" class="form-control" name="username" id="username" placeholder="Muhammad" required>
                            </div>
                            <div class="col-lg-12 form-group">
                                <div class="small_text">Your email</div>
                                <input type="email" class="form-control" name="email" id="email" placeholder="info@gmail.com" required>
                            </div>
                            <div class="col-lg-12 form-group">
                                <div class="small_text">Password</div>
                                <input type="password" name="password" class="form-control" id="password" required>
                                </div>
                            <div class="col-lg-12 form-group">
                                <div class="small_text">Confirm password</div>
                                <input id="confirm_password" name="confirm_password" type="password" class="form-control" placeholder="5+ characters" required >
                            </div>
                            <div class="col-lg-12 form-group">
                                <div class="check_box">
                                    <input type="checkbox" value="None" id="squared2" name="check">
                                    <label class="l_text" for="squared2">I accept the <span>politic of confidentiality</span></label>
                                </div>
                            </div>
                            <div class="col-lg-12 text-center">
                                <button type="submit" class="btn action_btn thm_btn">Create an account</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <footer class="doc_footer_area text-center mb-5">
            <div class="doc_footer_bottom">
                <div class="container d-flex justify-content-between">
                    <p class="wow fadeInUp " data-wow-delay="0.3s">© 2024 All Rights Reserved Design by
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