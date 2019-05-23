<?php

$host = 'localhost';            //myHostAdress
$dbname = 'aagef_fff_gironde';
$dbuser = 'aagef_fff_gironde';  //myUserName
$dbpw = 'root';                 //myPassword

$pdoReqArg1 = "mysql:host=". $host .";dbname=". $dbname .";";
$pdoReqArg2 = $dbuser;
$pdoReqArg3 = $dbpw;

try {

    $db = new \PDO($pdoReqArg1, $pdoReqArg2, $pdoReqArg3);
    $db->setAttribute(\PDO::ATTR_CASE, \PDO::CASE_LOWER);   
    $db->setAttribute(\PDO::ATTR_ERRMODE , \PDO::ERRMODE_EXCEPTION);
    $db->exec("SET NAMES 'utf8'");

} catch(\PDOException $e) {

    $errorMessage = $e->getMessage();
}

function treatAjax() {

	if (isset($_POST['id']) && !empty($_POST['id'])) {
		
		global $db;

		try {

			$query = "SELECT text FROM contents WHERE id=" . $_POST['id'];

			$sets = $db->prepare($query);
            $sets->execute();
            $content = $sets->fetchAll(\PDO::FETCH_ASSOC);
            echo $content[0]['text'];

		} catch(\PDOException $e) {

		    $errorMessage = $e->getMessage();
		}
	}
}

treatAjax();