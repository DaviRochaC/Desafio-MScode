<?php


session_start();
session_unset();
session_destroy();

header('Location:http://localhost/mscode/desafio/views/admin/login.php');
die();


