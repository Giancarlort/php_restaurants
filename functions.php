<?php
require_once('db.php');

// routes
if(isset($_GET['f'])){
	if($_GET['f']=='getRestaurants') getRestaurants();
	if($_GET['f']=='getRestaurant') getRestaurant();
	if($_GET['f']=='search') search();
}

//functions here after

function getRestaurants(){
	global $conn;
	$response = '[';
	$sql = "SELECT * FROM `restaurants`";
	// SELECT * FROM `restaurants` WHERE `name` LIKE '%a%'
	if(isset($_GET['search'])) $sql = "SELECT * FROM `restaurants` WHERE `name` LIKE '%".$_GET['search']."%'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$response.='{';
			$response.='"id":"'.$row['id'].'",';
			$response.='"name":"'.$row['name'].'",';
			$response.='"location":"'.$row['location'].'",';
			$response.='"picture":"'.$row['picture'].'",';
			$response.='"price":"'.$row['price'].'"';
			$response.='},';
		}
	} else {
		$response .= '{"status": "No Restaurants Found"}';
	}
	$response.=']';
	$response = str_replace("},]","}]", $response);
	echo $response;
}


function getRestaurant(){
	global $conn;
	$response = '[';
	// SELECT * FROM `restaurants` WHERE `name` LIKE '%a%'
	$sql = "SELECT * FROM `restaurants` WHERE `id` = '".$_GET['id']."'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$response.='{';
			$response.='"id":"'.$row['id'].'",';
			$response.='"name":"'.$row['name'].'",';
			$response.='"location":"'.$row['location'].'",';
			$response.='"picture":"'.$row['picture'].'",';
			$response.='"price":"'.$row['price'].'"';
			$response.='},';
		}
	} else {
		$response .= '{"status": "No Restaurants Found"}';
	}
	$response.=']';
	$response = str_replace("},]","}]", $response);
	echo $response;
}

function search(){
	$search = $_POST['search'];
	header('location: index.php?search='.$search);
}


?>