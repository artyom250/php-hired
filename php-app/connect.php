<?php
    $connect = mysqli_connect("localhost", "root", "", "php_app");

    if(!$connect) {
        echo mysqli_connect_error();
    }
?>