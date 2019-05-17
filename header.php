<?php
session_start();
require("db_param.php");
	//mysql was deprecated hetheka 3leh I used mysqli instead
	//mysql tekhdem lel php5 wena 3andi php7 so i used mysqli
	$idCon = mysqli_connect(MYHOST, MYUSER, MYPASS, MYDATABASE);
    
	if(!$idCon){
		die("Impossible de se connecter au serveur de la base de données");
	}
?>