<?php
    include("../connect.php");

    $job = []; // Initialize $job array

    if(isset($_GET["id"])) {
        $id = $_GET["id"];

        // Use prepared statement to prevent SQL injection
        $sql = "SELECT * FROM `jobs` WHERE id = ?";
        $stmt = mysqli_prepare($connect, $sql);
        mysqli_stmt_bind_param($stmt, "i", $id);
        $queryResult = mysqli_stmt_execute($stmt);

        if($queryResult) {
            $query = mysqli_stmt_get_result($stmt);
            $job = mysqli_fetch_assoc($query);
        } else {
            // Handle the error, maybe log it or display a message
            echo "Error fetching job: " . mysqli_error($connect);
        }

        // Close the statement
        mysqli_stmt_close($stmt);
    }
?>

<!DOCTYPE html>
<html lang="en">
<?php
    $pageTitle = isset($job["title"]) ? $job["title"] : "Job Details"; 
    include("../components/head.php");
?>
<body style="background-color: #030712;">
    <?php include("../components/navbar.php") ?>
    <section id="job">
        <div class="job-flex">
            <div class="job-d">
                <b>About</b>
                <p><?php echo isset($job["description"]) ? $job["description"] : ""; ?></p>
            </div>
            <div class="job-i">
                <p class="title"><?php echo isset($job["title"]) ? $job["title"] : ""; ?></p>
                <p class="company"><?php echo isset($job["company"]) ? $job["company"] : ""; ?></p>
                <p class="location" style="margin-top: 2px;"><?php echo isset($job["location"]) ? $job["location"] : ""; ?></p>
                <div class="j-icons">
                    <div>
                        <i class='bx bx-money'></i>
                        <p>$<?php echo isset($job["salary"]) ? $job["salary"] : ""; ?></p>
                    </div>
                    <div>
                        <i class='bx bx-calendar'></i>
                        <p><?php echo isset($job["type"]) ? $job["type"] : ""; ?></p>
                    </div>
                    <div>
                        <i class='bx bx-bar-chart-alt-2'></i>
                        <p><?php echo isset($job["level"]) ? $job["level"] : ""; ?></p>
                    </div>
                </div>
                <a href="#" class="apply">
                    <i class='bx bx-briefcase'></i>
                    <span>Apply now</span>
                </a>
            </div>
        </div>
    </section>
    <?php include("../components/footer.php") ?>
</body>
</html>