<?php
    include("./connect.php");

    if(isset($_POST["enter"])) {
        $username = mysqli_real_escape_string($connect, $_POST["username"]);
        $address = mysqli_real_escape_string($connect, $_POST["address"]);
        $password = mysqli_real_escape_string($connect, $_POST["password"]);
    
        $sql = "SELECT * FROM `account` WHERE `username` = '$username' AND `email` = '$address' AND `password` = '$password'";
        $result = mysqli_query($connect, $sql);
    
        if($result) {
            if(mysqli_num_rows($result) > 0) { 
                header("Location: ./pages/homepage.php");
            } else {
                echo "<script>alert('Wrong username, email or password')</script>";
            }
        }
    }    
?>

<!DOCTYPE html>
<html lang="en">
    <?php
        $pageTitle = "Log In"; 
        include("./components/head.php");
     ?>
<body>
    <section id="account">
        <form action="index.php" method="POST">
            <center><p class="form-head">Hired</p></center>
            <br>
            <input type="text" name="username" placeholder="Username" required>
            <br>
            <input type="email" name="address" placeholder="Email address" style="margin-top: 20px;" required>
            <br>
            <input type="password" name="password" placeholder="Password" style="margin-top: 20px;" required>
            <br>
            <button type="submit" name="enter" style="margin-top: 20px;"><i class='bx bxs-log-in-circle'></i> Enter account</button>
            <br><br>
            <center><a href="./sign-up.php">Don't have an account yet?</a></center>
        </form>
    </section>
</body>
</html>