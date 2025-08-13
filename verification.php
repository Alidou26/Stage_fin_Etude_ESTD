<?php

session_start();

if(!isset($_SESSION['admin_connecte'])){

    header('location: index.php');
}

require("BD.php");

?>