<?php
session_start();
session_destroy();

// unset($_SESSION['nama']);
// unset($_SESSION['username']);
// unset($_SESSION['password']);
// unset($_SESSION['pos']);

header('location:login.php');
