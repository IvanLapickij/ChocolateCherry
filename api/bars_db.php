<?php
function getBars() {
	$query = "select * FROM cbtable ORDER BY name";
	try {
	global $db;
		$bars = $db->query($query);  
		$bars = $bars->fetchAll(PDO::FETCH_ASSOC);
		header("Content-Type: application/json", true);
		echo '{"cbtable": ' . json_encode($bars) . '}';
	} catch(PDOException $e) {
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	}
}

function getBar($id) {
	$query = "SELECT * FROM cbtable WHERE id = '$id'";
    try {
		global $db;
		$bars = $db->query($query);  
		$bar = $bars->fetch(PDO::FETCH_ASSOC);
        header("Content-Type: application/json", true);
        echo json_encode($bar);
    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }
}

function findByName($name) {
$query = "SELECT * FROM cbtable WHERE UPPER(name) LIKE ". '"%'.$name.'%"'." ORDER BY name";
    try {
		global $db;
		$bars = $db->query($query);  
		$bar = $bars->fetch(PDO::FETCH_ASSOC);
        header("Content-Type: application/json", true);
        echo json_encode($bar);
    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }
}
function addBar() {
    global $app;
	$request = $app->request();
	$bar = json_decode($request->getBody());
	$name = $bar->name;
	$price = $bar->price;
	$chocolate_type = $bar->chocolate_type;
	$taste = $bar->taste;
	$sugar_percent = $bar->sugar_percent;
	$description = $bar->description;
	$query= "INSERT INTO bar
                 (name, price, chocolate_type, taste, sugar_percent, description)
              VALUES
                 ('$name', '$price', '$chocolate_type', '$taste', '$sugar_percent', '$description')";
	try {
		global $db;
		$db->exec($query);
		$bar->id = $db->lastInsertId();
		echo json_encode($bar); 
	} catch(PDOException $e) {
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	}
}
function deleteBar($id) {
	$query = "DELETE FROM cbtable WHERE id=:id";
	try {
		global $db;
		$db->exec($query);
	} catch(PDOException $e) {
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	}
}

function updateBar($id) {
	global $app;
	$request = $app->request();
	$bar = json_decode($request->getBody());
	$name = $bar->name;
	$price = $bar->price;
	$chocolate_type = $bar->chocolate_type;
	$taste = $bar->taste;
	$sugar_percent = $bar->sugar_percent;
	$description = $bar->description;
	$query = "UPDATE cbtable SET name='$name', price='$price', chocolate_type='$chocolate_type', taste='$taste', sugar_percent='$sugar_percent', description='$description' WHERE id='$id'";
	try {
		global $db;
		 $db->exec($query); 
		 echo json_encode($bar);
	} catch(PDOException $e) {
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	}
}

?>