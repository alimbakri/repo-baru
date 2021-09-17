<?php 
session_start();


require __DIR__."/bootstrap.php";

$conn = new mysqli($host,$user,$password,$db);
