<?php 

// get the q parameter from URL
$cmd = $_REQUEST["cmd"];
if($cmd==='clear'){
	try{
        $db_conn = new PDO('sqlite:mydb.sqlite');
	}catch(PDOException $e){
        echo 'Error';
	}
	$stmt = "DELETE FROM mytable";
	$response = $db_conn->exec($stmt);
	echo 'clear ' . $response;
}
elseif($cmd==='download'){
	try{
        $db_conn = new PDO('sqlite:mydb.sqlite');
	}catch(PDOException $e){
        echo 'Error';
	}
	$sth = $db_conn->prepare("SELECT name, data FROM mytable");
	$sth->execute();
	$file = '';
	while($row = $sth->fetch(PDO::FETCH_ASSOC)){
		$name = $row['name'];
		$data = $row['data'];
		$file = $file . '\n' . $name . $data;
	}
	header('Location: /SSE/database.txt');
	header("Content-Type: text/force-download");
	header('Content-disposition: attachment; filename=Downloads/database.txt');
}
?>