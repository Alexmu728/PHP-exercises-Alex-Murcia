<?php

    session_start();

    require "Model.php";

    if(!isset($_SESSION["movies"])){
        $_SESSION["movies"]=[];
    }
    $movies=&$_SESSION["movies"];

    if(!isset($_SESSION["username"])){
        $_SESSION["username"]="";
    } 
    $username=$_SESSION["username"];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["user"])) {
            $_SESSION["username"] = $_POST["user"];
            $username = $_SESSION["username"]; 
        }
        if (isset($_POST["name"], $_POST["isan"], $_POST["year"], $_POST["punctuation"])) {
            $name = $_POST["name"];
            $isan = $_POST["isan"];
            $year = $_POST["year"];
            $punctuation = $_POST["punctuation"];
            
            $function = moviesInputs($movies, $name, $isan, $year, $punctuation);  
            $_SESSION["movies"] = $movies; 
        }
    }
    
    include "View.php";
?>