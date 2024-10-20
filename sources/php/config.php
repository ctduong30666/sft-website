<?php

$config_servername = "localhost";
$config_username = "root";
$config_password = "";
$config_database = "sft_website";

$con = new mysqli($config_servername, $config_username, $config_password, $config_database, 3307);
mysqli_set_charset($con, "UTF8");
if ($con->connect_error) {
    echo "Không thể kết nối: " . $con->error;
} else {
}
