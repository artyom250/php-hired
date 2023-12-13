<?php
    include("../connect.php");

    if(isset($_POST["add"])) {
        $title = $_POST["title"];
        $company = $_POST["company"];
        $location = $_POST["location"];
        $salary = $_POST["salary"];
        $type = $_POST["type"];
        $level = $_POST["level"];
        $description = $_POST["description"];

        $sql = "INSERT INTO `jobs` (`title`, `company`, `location`, `salary`, `type`, `level`, `description`) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($connect, $sql);

        mysqli_stmt_bind_param($stmt, "sssssss", $title, $company, $location, $salary, $type, $level, $description);

        $result = mysqli_stmt_execute($stmt);

        if ($result) {
            header("Location: homepage.php");
        } else {
            echo "Error: " . mysqli_error($connect);
        }

        mysqli_stmt_close($stmt);
        mysqli_close($connect);
    }
?>

<!DOCTYPE html>
<html lang="en">
<?php
    $pageTitle = "Add"; 
    include("../components/head.php");
?>
<body style="background-color: #030712;">
    <?php include("../components/navbar.php") ?>
    <section id="add">
        <form action="add.php" method="POST">
            <center><p class="form-head">Create Job</p></center>
            <br>
            <input type="text" name="title" placeholder="Job title" required>
            <br>
            <input type="text" name="company" placeholder="Company" style="margin-top: 20px;" required>
            <br>
            <input type="text" name="location" placeholder="Location (e.x. New York, US)" style="margin-top: 20px;" required>
            <br>
            <input type="number" name="salary" placeholder="Salary (e.x. 50.000)" style="margin-top: 20px;" required>
            <br>
            <select name="type" style="margin-top: 20px;">
                <option value="Part Time">Part Time</option>
                <option value="Full Time">Full Time</option>
                <option value="Internship">Internship</option>
            </select>
            <br>
            <select name="level" style="margin-top: 20px;">
                <option value="Junior">Junior</option>
                <option value="Middle">Middle</option>
                <option value="Senior">Senior</option>
            </select>
            <br>
            <textarea name="description" style="margin-top: 20px;" placeholder="Description" required></textarea>
            <br>
            <button type="submit" name="add" style="margin-top: 20px;"><i class='bx bxs-plus-circle'></i>Add job</button>
        </form>
    </section>
    <?php include("../components/footer.php") ?>
</body>
</html>