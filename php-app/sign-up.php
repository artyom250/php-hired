<?php
    include("./connect.php");

    if(isset($_POST["create"])) {
        $username = mysqli_real_escape_string($connect, $_POST["username"]);
        $address = mysqli_real_escape_string($connect, $_POST["address"]);
        $password = mysqli_real_escape_string($connect, $_POST["password"]);

        // Check if the username already exists
        $checkUsernameSql = "SELECT * FROM `account` WHERE `username` = ?";
        $checkUsernameStmt = mysqli_prepare($connect, $checkUsernameSql);
        mysqli_stmt_bind_param($checkUsernameStmt, "s", $username);
        mysqli_stmt_execute($checkUsernameStmt);
        $checkResult = mysqli_stmt_get_result($checkUsernameStmt);

        if(mysqli_num_rows($checkResult) > 0) {
            // Username already exists, display an error message or redirect to a signup page
            echo "<script>alert('Username already exists. Please choose a different username.')</script>";
        } else {
            // Continue with the signup process

            // Use prepared statements to prevent SQL injection
            $sql = "INSERT INTO `account` (`username`, `email`, `password`) VALUES (?, ?, ?)";
            $stmt = mysqli_prepare($connect, $sql);

            // Hash the password (optional, but recommended for security)
            // $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // Bind parameters
            mysqli_stmt_bind_param($stmt, "sss", $username, $address, $password);

            // Execute the statement
            $result = mysqli_stmt_execute($stmt);

            if($result) {
                header("Location: index.php");
                exit();
            }

            // Close the statement
            mysqli_stmt_close($stmt);
        }

        // Close the check username statement
        mysqli_stmt_close($checkUsernameStmt);
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