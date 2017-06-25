<?php  
	header('Content-Type: text/event-stream');
	header('Cache-Control: no-cache');

	try{
        $db_conn = new PDO('sqlite:mydb.sqlite');
	}catch(PDOException $e){
        echo 'Error';
	}
	$sth = $db_conn->prepare("SELECT name, data FROM mytable");
	$sth->execute();
	while($row = $sth->fetch(PDO::FETCH_ASSOC)){
		$name = $row['name'];
		$data = $row['data'];
	}
	echo "name: $name" . PHP_EOL;
	echo "data: $data" . PHP_EOL;
	echo PHP_EOL;
	
	ob_flush();
	flush();
?>
