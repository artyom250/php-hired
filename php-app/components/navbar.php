<?php
    session_start();

    if (isset($_POST["logout"])) {
        // Destroy the session and redirect to index.php
        session_destroy();
        header("Location: ../index.php");
        exit();
    }
?>

<nav>
    <a href="../pages/homepage.php" class="logo">Hired</a>
    <div>
        <a href="../pages/add.php" class="logout"><i class='bx bx-plus-circle'></i></a>
        <form method="post">
            <button type="submit" class="logout" name="logout"><i class='bx bx-log-out'></i></button>
        </form>
    </div>
</nav>