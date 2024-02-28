<?php
$phone = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $phone = $_POST["number"];
    }
?>