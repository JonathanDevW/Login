<?php

$conn = new mysqli($server, $user, $password, $dataBase);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }