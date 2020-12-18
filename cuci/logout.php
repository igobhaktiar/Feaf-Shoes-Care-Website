<?php
session_start();

unset($_SESSION['nama']);
unset($_SESSION['username']);
unset($_SESSION['password']);
unset($_SESSION['pos']);

header('location:index.php');
