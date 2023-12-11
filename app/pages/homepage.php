<?php
    include("../connect.php");

    $sql = "SELECT * FROM `jobs`";
    
    $query = mysqli_query($connect, $sql);
    
    $jobs = mysqli_fetch_all($query, MYSQLI_ASSOC);

    if(isset($_GET["delete"])) {
        $id = $_GET["id"];

        $sql = "DELETE FROM `jobs` WHERE id = $id";

        $query = mysqli_query($connect, $sql);

        if($query) {
            header("Location: homepage.php");
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<?php
    $pageTitle = "Homepage"; 
    include("../components/head.php");
?>
<body style="background-color: #030712;">
    <?php include("../components/navbar.php") ?>
    <section id="homepage">
        <div class="jobs-grid">
            <?php foreach($jobs as $job) { ?>
                <div class="job">
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
                    <p class="description"><?php echo $job["description"] ?></p>
                    <form action="homepage.php" method="GET">
                        <input type="hidden" name="id" value="<?php echo $job['id']; ?>">
                        <a href="./job.php?id=<?php echo $job["id"] ?>" class="more">
                            <i class='bx bx-help-circle'></i>
                            <span>Learn more</span>
                        </a>
                        <button name="delete">
                            <i class='bx bx-trash'></i>
                            <span>Delete job</span>
                        </button>
                    </form>
                </div>
            <?php } ?>
        </div>
    </section>
    <?php include("../components/footer.php") ?>
</body>
</html>