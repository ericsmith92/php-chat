<?php
/**
 * Created by PhpStorm.
 * User: erics
 * Date: 2017-05-03
 * Time: 4:57 PM
 */
//start session
session_start();
//database connection
require_once "Classes/DbConnect.php";
$dbc = new DbConnect();
$db = $dbc->getDb();

//instantiate User class, pass $db
require_once "Classes/User.php";
$user = new User($db);

//instantiate Chatroom class
require_once "Classes/Chatroom.php";
$chatroom = new Chatroom($db);

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>soapbox</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body>
        <div id="page_wrapper">
        <header id="header">
            <a id="sign_out" href="signout.php">Sign-Out</a>
            <img id="logo" alt="Chat Logo" src="images/speechBubble.svg">
            <h1>soapbox</h1>
        </header>

