<?php
//error_reporting(E_ALL); ini_set('display_errors', 1);
//mysqli_report(MYSQLI_REPORT_ERROR);

$host = "localhost";
$user = "root";
$pass = "";
$database = "desa_cipetir";

// $db = mysqli_connect($host, $user, $pass, $database) or die("gagal koneksi ke database");

$db = mysqli_connect($host, $user, $pass, $database);
		if (mysqli_connect_errno()) {
		echo "Gagal terhubung MySQL: " . mysqli_connect_error();}
