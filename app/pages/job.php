<?php
    include("../connect.php");

    if(isset($_GET["id"])) {
        $id = $_GET["id"];

        $sql = "SELECT * FROM `jobs` WHERE id = '$id'";

        $query = mysqli_query($connect, $sql);

        if($query) {
            $job = mysqli_fetch_assoc($query);
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<?php
    $pageTitle = $job["title"]; 
    include("../components/head.php");
?>
<body style="background-color: #030712;">
    <?php include("../components/navbar.php") ?>
    <section id="job">
        <div class="job-flex">
            <div class="job-d">
                <b>About</b>
                <p><?php echo $job["description"] ?></p>
            </div>
            <div class="job-i">
            <p class="title"><?php echo $job["title"] ?></p>
                <p class="company"><?php echo $job["company"] ?></p>
                <p class="location" style="margin-top: 2px;"><?php echo $job["location"] ?></p>
                <div class="j-icons">
                    <div>
                        <i class='bx bx-money'></i>
                        <p>$<?php echo $job["salary"] ?></p>
                    </div>
                    <div>
                        <i class='bx bx-calendar'></i>
                        <p><?php echo $job["type"] ?></p>
                    </div>
                    <div>
                        <i class='bx bx-bar-chart-alt-2'></i>
                        <p><?php echo $job["level"] ?></p>
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