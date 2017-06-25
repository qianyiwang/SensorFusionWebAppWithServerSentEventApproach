<?php
	// $data = $_POST['Data'];
	// $name = $_POST['Name'];
	$inputJSON = file_get_contents('php://input');
	$input = json_decode($inputJSON, TRUE); //convert JSON into array
	$data = $input['Data'];
	$name = $input['Name'];
	try{
        $db_conn = new PDO('sqlite:mydb.sqlite');
	}catch(PDOException $e){
        echo 'Error';
	}
	$stmt = "CREATE TABLE mytable(name, data)";
	$db_conn->exec($stmt);
	
	$stmt = "INSERT INTO mytable(name, data) VALUES ('$name', '$data')";
	$db_conn->exec($stmt);
	echo $name . $data;
?>