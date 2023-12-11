<?php
    include("./connect.php");

    if(isset($_POST["create"])) {
        $username = mysqli_real_escape_string($connect, $_POST["username"]);
        $address = mysqli_real_escape_string($connect, $_POST["address"]);
        $password = mysqli_real_escape_string($connect, $_POST["password"]);

        $sql = "INSERT INTO `account` (`username`, `email`, `password`) VALUES ('$username', '$address', '$password')";

        $result = mysqli_query($connect, $sql);

        if($result) {
            header("Location: index.php");
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
    <?php
        $pageTitle = "Sign Up"; 
        include("./components/head.php");
     ?>
<body>
    <section id="account">
        <form action="sign-up.php" method="POST">
            <center><p class="form-head">Hired</p></center>
            <br>
            <input type="text" name="username" placeholder="Username" required>
            <br>
            <input type="email" name="address" placeholder="Email address" style="margin-top: 20px;" required>
            <br>
            <input type="password" name="password" placeholder="Password" style="margin-top: 20px;" required>
            <br>
            <button name="create" style="margin-top: 20px;"><i class='bx bxs-plus-circle'></i> Create account</button>
            <br><br>
            <center><a href="./index.php">Already have an account?</a></center>
        </form>
    </section>
</body>
</html>