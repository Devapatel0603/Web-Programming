<!-- Write a PHP script for user authentication using PHP-MYSQL. Use session for
storing username. -->

<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['login'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $conn = mysqli_connect("localhost", "root", "", "wp");
  if (!$conn) {
    die("Sorry, We failed to connect: " . mysqli_connect_error());
  }
  $query = "SELECT * FROM user WHERE username = '$username';";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $_SESSION['username'] = $username;
    header("Location:index.php");
    exit();
  } else {
    $error_msg = "Invalid username or password";
  }
  mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en" <head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    text-decoration: none;
    list-style-type: none;
    font-family: poppins;
}

html {
    -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
    scroll-behavior: smooth;
}

.login {
    padding-left: 20px;
}

.container {
    min-height: calc(100vh - 40px * 2);
    display: grid;
    grid-template-columns: 50% 50%;
    border-radius: 10px;
    overflow: hidden;
}

.login-left {
    display: flex;
    flex-direction: column;
    justify-content: content;
    padding-left: 100px;
    background-color: white;
}

.login-right {
    display: flex;
    justify-content: center;
}

.form-item {
    position: relative;
    margin-bottom: 15px;
}

.pass-key {
    padding-right: 30px;
}

.password-toggle {
    position: absolute;
    top: 70%;
    right: 10px;
    transform: translateY(-50%);
    cursor: pointer;
    width: 30px;
}

.remember-forgot {
    margin-top: 246px;
    padding: 10px 0;
    font-size: 16px;
    position: absolute;
    transform: translate(30px, -10px);
    margin-left: 250px;
}

.bg-grey {
    width: 100%;
    border-top: 0;
    border-bottom-left-radius: 10px;
    border-bottom-right-radius: 10px;
    padding: 1em;
    padding-top: 0.5rem;
    text-align: center;
    color: #212022a9;
}

.login-right img {
    width: 100%;
}

.login-header {
    margin-top: 15px;
}

.login-header h1 {
    font-size: 2rem;
    font-weight: 700;
}

.login-header p {
    margin-top: 15px;
    opacity: .7;
}

.login-form {
    width: 450px;
    margin-top: 15px;
}

.login-content {
    display: flex;
    flex-direction: column;
    gap: 20px;
}

.form-tem label:not(.checkboxLabel) {
    display: inline-block;
    background-color: white;
    margin-bottom: 10px;
    position: absolute;
    padding: 0 10px;
    transform: translate(30px, -10px);
    font-size: 14px;
}

input[type='text'],
input[type='password'] {
    border: 1px solid black;
    height: 55px;
    padding: 0 2rem;
    width: 100%;
    outline: none;
    transition: background .5s;
    font-size: 18px;
    border-radius: 100px;
}

.pass-key {
    border: 1px solid black;
    height: 55px;
    padding: 0 2rem;
    width: 100%;
    outline: none;
    transition: background .5s;
    font-size: 18px;
    border-radius: 100px;
}

.show {
    display: block;
    position: absolute;
    margin-left: 380px;
    bottom: 250px;
    font-size: 15px;
    color: black;
    cursor: pointer;
}

label[for=username],
label[for=password] {
    font-size: 1.1rem;
    padding-left: 20px;
    font-weight: 4600;
    ;
}

.checkbox {
    display: flex;
    align-items: center;
    gap: 7px;
}

input[type="checkbox"] {
    width: 20px;
    height: 20px;
    accent-color: black;
}

button {
    border: none;
    padding: 1rem;
    height: 55px;
    font-size: 18px;
    border-radius: 100px;
    text-transform: uppercase;
    cursor: pointer;
    margin-bottom: 30px;
    transition: .5s;
}

button:hover {
    background: black;
    color: white;
}

::placeholder {
    color: grey;
    font-size: 1rem;
}
</style>
<title>Login-Form</title>
</head>

<body>
    <?php if (isset($_SESSION['username'])) { ?>
    <h1 class="text-center mt-5">Welcome, <?php echo $_SESSION['username']; ?></h1>
    <?php session_destroy();
    } else { ?>
    <div class="container" id="home">
        <div class="login-left">
            <div class="login-header">
                <h1>Welcome</h1>
                <p>Please login to continue......</p>
            </div>
            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" class="login-form" autocomplete="off">
                <div class="login-content">
                    <div class="form-item">
                        <label for="username">Enter Username</label>
                        <input type="text" name="username" id="username" placeholder="Enter Username">
                    </div>
                    <div class="form-item">
                        <label for="password">Enter Password</span></label>
                        <label for="text"></label>
                        <input type="password" name="password" id="password" placeholder="Enter your Password" required
                            class="pass-key">
                        <img src="eye-close.png" id="eyeicon" class="password-toggle">
                    </div>
                    <?php if (isset($error_msg)) { ?>
                    <div style="color: red;">
                        <?php echo $error_msg; ?>
                    </div>
                    <?php } ?>
                    <div class="form-item">
                        <div class="checkbox">
                            <input type="checkbox" name="" id="rememberMeCheckbox" checked>
                            <label for="rememberMeCheckbox" class="checkboxlabel">Remember Me</label>
                        </div>
                    </div>
                    <div class="remember-forgot">
                        <a href="#">Forgot password?</a>
                    </div>
                    <div class="bg-grey">
                        <div class="sing-up">Don't have an account? <a href="" class="text-link" id="sign-up">Sign
                                up</a></div>
                    </div>
                    <button type="submit" name="login">LogIn</button>
                </div>
            </form>
        </div>
        <div class="login-right">
            <img src="Data Arranging_Two Color.svg" alt="">
        </div>
    </div>
    </div>
    <?php } ?>
    <div>
        <script>
        let eyeicon = document.getElementById("eyeicon");
        let password = document.getElementById("password");
        eyeicon.onclick = function() {
            if (password.type == "password") {
                password.type = "text";
                eyeicon.src = "eye-open.png";
            } else {
                password.type = "password";
                eyeicon.src = "eye-close.png";
            }
        }
        </script>
</body>

</html>
