<?php require_once('security.php')?>
<!doctype html>
<html lang="en" class="perfect-scrollbar-on">
  <head>
    <title>Restaurants Admin</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />

    <!-- Material Kit CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/paper-dashboard.css?v=2.0.0" rel="stylesheet" />

  <link href="style.css" rel="stylesheet">


  </head>
  <body>
    <div class="wrapper">
      <div class="sidebar" data-color="white">
      <!--
      Tip 1: You can change the color of the sidebar using: data-color="white | black"

      -->

        <div class="logo">
          <a href="index.php" class="simple-text logo-normal">
              Restaurants Admin
          </a>
        </div>

        <div class="sidebar-wrapper">
        	<ul class="nav">
        		<li class="active"><a href="index.php">Main Page</a></li>
				<li><a href="add.php">Add restaurants</a></li>
        		<li><a href="login.php?m=Logged out">Log out</a></li>
			</ul>
			<form action="functions.php?f=search" method="post">
			  Search: <input type="text" name="search" class="form-control">
			  <input type="submit" value="Search" class="btn btn-primary">
			</form>


        </div>
      </div>

      <div class="main-panel">
<!--         <nav class="navbar navbar-expand-lg sticky-top">
          <div class="container-fluid">
          	<h2>Restaurants Admin</h2>
          </div>
        </nav> -->

