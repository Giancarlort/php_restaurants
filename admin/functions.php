<?php
require_once('db.php');

// routes
if(isset($_GET['f'])){
	if($_GET['f']=='login') login();
	if($_GET['f']=='getUser') getUser();
	if($_GET['f']=='register') register();
	if($_GET['f']=='getRestaurants') getRestaurants();
	if($_GET['f']=='getRestaurant') getRestaurant();
	if($_GET['f']=='search') search();
	if($_GET['f']=='add') add();
	if($_GET['f']=='update') update();
	if($_GET['f']=='deleteRestaurant') deleteRestaurant();
	if($_GET['f']=='like') like();
	if($_GET['f']=='unlike') unlike();
	if($_GET['f']=='getLikes') getLikes();
	if($_GET['f']=='doILikeIt') doILikeIt();

}

//functions here after


function login(){
	global $conn;
	$email = $_POST['email'];
	$pw = $_POST['password'];

	$sql = "SELECT * FROM `users` WHERE `email` = '".$email."' AND `password` = '".md5($pw)."'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			setcookie('uid', $row['id'], time() + (86400 * 30), "/"); // 86400 = 1 day
			header('location: index.php');
		}
	} else {
		header('location: login.php?m=Wrong Password');
	}

}

function register(){
	global $conn;
	$email = $_POST['email'];
	$pw = $_POST['password'];

	$sql = "INSERT INTO `users` (`id`, `email`, `password`) VALUES (NULL, '".$email."', MD5('".$pw."'));";
	$result = $conn->query($sql);
	header('location: login.php?m=User created. You may now login');
}

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

function add(){
	global $conn;
	$name = $_POST['name'];
	$location = $_POST['location'];
	$type = $_POST['type'];
	$price = $_POST['price'];
	$picture = $_POST['picture'];

	$sql = "INSERT INTO `restaurants` (`id`, `name`, `location`, `tags`, `price`, `picture`) VALUES (NULL, '".$name."', '".$location."', '".$type."', '".$price."', '".$picture."');";
	// INSERT INTO `restaurants` (`id`, `name`, `location`, `tags`, `price`, `picture`) VALUES (NULL, 'Le Chef at The Manor', 'Camp John Hay', '[\'fine dining\']', '4', 'le-chef-at-the-manor.jpg'), (NULL, 'Good Taste Cafe & Restaurant', 'City Proper', '[\'Local Cuisine\']', '2', 'photo8jpg.jpg');

	$result = $conn->query($sql);
	header('location: index.php');
}


function update(){
	global $conn;
	$name = $_POST['name'];
	$location = $_POST['location'];
	$type = $_POST['type'];
	$price = $_POST['price'];
	$picture = $_POST['picture'];

	$sql = "UPDATE `restaurants` SET `name` = '".$name."', `location` = '".$location."', `price` = '".$price."', `picture` = '".$picture."' WHERE `restaurants`.`id` = ".$_GET['id'].";";
	$result = $conn->query($sql);
	header('location: index.php');

}

function deleteRestaurant(){
	global $conn;
	$sql = "DELETE FROM `restaurants` WHERE `id` = ".$_GET['id'].";";
	$result = $conn->query($sql);

	$sql = "DELETE FROM `likes` WHERE `rid` = ".$_GET['id'].";";
	$result = $conn->query($sql);


	header('location: index.php');
}



function getUser(){
	global $conn;
	$response = '[';
	// SELECT * FROM `restaurants` WHERE `name` LIKE '%a%'
	$sql = "SELECT * FROM `users` WHERE `id` = '".$_GET['id']."'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$response.='{';
			$response.='"id":"'.$row['id'].'",';
			$response.='"email":"'.$row['email'].'",';
			$response.='"name":"'.explode('@',$row['email'])[0].'"';
			$response.='},';
		}
	} else {
		$response .= '{"status": "No Restaurants Found"}';
	}
	$response.=']';
	$response = str_replace("},]","}]", $response);
	echo $response;
}

function like(){
	global $conn;
	$rid = $_GET['id'];
	$uid = $_COOKIE['uid'];

	$sql = "INSERT INTO `likes` (`id`, `rid`, `uid`) VALUES (NULL, '".$rid."', '".$uid."');";
	$result = $conn->query($sql);

	header('location: index.php');
}

function getLikes(){
	global $conn;
	// SELECT * FROM `restaurants` WHERE `name` LIKE '%a%'
	$sql = "SELECT * FROM `likes` WHERE `rid` = '".$_GET['id']."'";
	$result = $conn->query($sql);
	echo $result->num_rows;
}

function doILikeIt(){
	global $conn;
	$sql = "SELECT * FROM `likes` WHERE `rid` = ".$_GET['id']." AND `uid` = ".$_COOKIE['uid']."";
	// echo $sql;
	$result = $conn->query($sql);
	if($result->num_rows>0){
		echo $result->num_rows;
	} else {
		echo 0;
	}
}
function unlike(){
	global $conn;
	$rid = $_GET['id'];
	$uid = $_COOKIE['uid'];

	$sql = "DELETE FROM `likes` WHERE `rid` = ".$_GET['id']." AND `uid` = ".$_COOKIE['uid']."";
	$result = $conn->query($sql);

	header('location: index.php');
}

?>