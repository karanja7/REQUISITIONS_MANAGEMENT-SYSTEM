
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RequiSmart </title>
         <link rel="stylesheet" href="login.css">
         <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
</head>

<body>
    <header>
        <h2 class="logo">REQUISMART <br></h2>
        <h3>COMPANY BUDGETS AND REQUISITIONS MANAGEMENT SYSTEM</h3>
        <nav class="navigation ">
            <a href="">Login</a>
            <a href="#">Register</a>
            <button class="btnlogin-popup" >login</button>
        </nav>
        
    </header>
   <div class="wrapper">
    <!--login form-->
        <span class="icon-close"><ion-icon name="close-outline"></ion-icon></span>
    
        <div class="form-box login">
        <h2>login</h2>
        <form name="frmlogin" action="valid.php" method="POST">
    <div class="input-box">
        <span class="icon">
            <ion-icon name="mail-outline"></ion-icon>
        </span>
        <input type="email" id="email" name="email" autocomplete="off" required>
        <label>Email</label>
    </div>
    <div class="input-box">
        <span class="icon">
            <ion-icon name="lock-closed-outline"></ion-icon>
        </span>
        <input type="password" id="pass" name="password" required>
        <label>Password</label>
    </div>
    <div class="remember-forgot">
        <label ><input type="checkbox">Remember me</label>
        <a href="home.html">Forgot Password?</a>
    </div>
    <button type="submit" value="login" class="btn">Login</button>
    <div class="login-register">
        <p>Don't have an account?<a href="#" class="register-link">Register</a></p>
    </div>
</form>
    </div>
<!--REGISTRATION form-->
    <div class="form-box register">
        <h2>Register</h2>
        <form action="register.php" method="POST">
            <div class="input-box">
                <span class="icon">
                    <ion-icon name="person-outline"></ion-icon>
                </span>
                <input type="text" name="username" required>
                <label>Username</label>
            </div>
            <div class="input-box">
                <span class="icon">
                    <ion-icon name="mail-outline"></ion-icon>
                </span>
                <input type="email" name="email" required>
                <label>Email</label>
            </div>
            <div class="input-box">
                <span class="icon">
                    <ion-icon name="lock-closed-outline"></ion-icon>
                </span>
                <input type="password" name="password" required>
                <label>Password</label>
            </div>
                <div class="remember-forgot">
                    <label ><input type="checkbox">I agree to the terms & conditions </label>
            </div>
            <input type="submit" class="btn">Register</input>
            <div class="login-register">
                <p>Already have an account? <a href="login.php" class="login-link">Login</a></p>
            </div>
        </form>
    </div>
   </div>
    <script src="loginscript.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>
