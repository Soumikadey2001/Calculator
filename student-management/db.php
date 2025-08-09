<?php
// ডেভেলপমেন্টে error দেখা যাবে এমন করে রাখছি (প্রসোডাকশনে সরাবে)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// mysqli দিয়ে কানেকশন তৈরি
$servername = "localhost";    // XAMPP এ সবসময় localhost
$username = "root";           // ডিফল্ট XAMPP ইউজার
$password = "";               // ডিফল্ট XAMPP পাসওয়ার্ড খালি
$dbname = "student_db";       // তুমি phpMyAdmin এ যেটা তৈরি করেছো

$conn = new mysqli($servername, $username, $password, $dbname);

// যদি কানেকশন এরর হয় থেটা দেখাবে
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>