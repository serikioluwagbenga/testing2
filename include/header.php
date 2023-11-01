<!DOCTYPE html>
<html lang="en">
<?php
require_once "include/ini.php";
require_once "include/head.php";
require_once "include/session.php";
require_once "functions/todo.php";
$t = new todo;
?>

<body>
    <div class="page-content page-container" id="page-content">
     
            <header class="d-flex flex-wrap py-3 mb-4 border-bottom container">
                <a href="/" class="d-flex align-items-center mb-3  text-dark text-decoration-none">
                   <img width="40px" src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/6e/Microsoft_To-Do_icon.svg/2515px-Microsoft_To-Do_icon.svg.png" alt="">
                    <span class="fs-4">MyTODO</span>
                </a>

                <ul class="nav nav-pills ml-auto">
                    <li class="nav-item"><a href="index.php" class="nav-link" aria-current="page">Home</a></li>
                    <li class="nav-item"><a href="add_cat.php" class="nav-link">Add category</a></li>
                    <li class="nav-item"><a href="cat.php" class="nav-link">Categories</a></li>
                    <li class="nav-item"><a href="index.php?logout=" class="nav-link text-danger">Logout</a></li>
                </ul>
            </header>

            <div class="padding">
            <div class="row container d-flex justify-content-center">