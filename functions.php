<?php


/*
*	user registration : add new user 
*/
function newUser()
{	
	include("db_param.php");
	$idCon = mysqli_connect(MYHOST, MYUSER, MYPASS, MYDATABASE);
	
	if(!$idCon){
		die("Impossible de se connecter au serveur de la base de données");
	}
	else{
		$Nom = $_POST['Nom'];
	    $Prenom = $_POST['Prenom'];
	    $Sexe = $_POST['Sexe'];
	    $Telephone = $_POST['Telephone'];
	    $Pays = $_POST['Pays'];
	    $Age = $_POST['Age'];
	    $Email = $_POST['Email'];
	    $Password = $_POST['mdp1'];


	    $sql  =  "INSERT INTO utilisateurs (nom, prenom, sexe, telephone, pays, age, email, password) 
  			  VALUES('".$Nom."', '".$Prenom."', '".$Sexe."', '".$Telephone."', '".$Pays."', '".$Age."', '".$Email."', '".$Password."')";

	    if( mysqli_query($idCon,$sql) ) {
	        echo "Utilisateur ajouté avec succès";
	        header("Location: http://localhost/proj2/connexion.php?email=".$Email."&password=".$Password."");
	    }
	    else{
	    	die("Erreur lors de l'ajout");
	    }
	}
}

/**
*	return the current level of a user 
*
**/
function getCurrentLevel($levels){
	foreach ($levels as $key_level => $value_level) {
		if(($value_level != (-1))&&($value_level != Null)){
			return $key_level;
		}
	}
}

/*
*	
*	login a user with email and password	
*
*	- e:email, p:password, c:connection_id, r:request
*/
function login($e, $p, $c)
{	
	$r = "SELECT * FROM utilisateurs WHERE email = '".$e."' AND password='".$p."'"; 
	
	if($result = mysqli_query($c, $r)){

		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

	    if(($row['email'] == $e)&&($row['password'] == $p))
	    {
	    	echo " login success <br>";

	    	$levels = array('A1'=>$row['A1'], 'A2'=>$row['A2'], 'B1'=>$row['B1'], 'B2'=>$row['B2'], 'C1'=>$row['C1'], 'C2'=>$row['C2']);
	    	$tests = array('comprehension'=>$row['comprehension'],'grammar'=>$row['grammar'],'listening'=>$row['listening'],'dictation'=>$row['dictation']);

	    	$_SESSION['user_id'] = $row['id'];
	    	$_SESSION['nom'] = $row['nom'];
	    	$_SESSION['prenom'] = $row['prenom'];
	    	$_SESSION['email'] = $row['email'];
	    	$_SESSION['levels'] = $levels;
	    	$_SESSION['tests'] = $tests;
	    	$_SESSION['currentLevel'] = getCurrentLevel($levels);

	        header("Location: http://localhost/proj2/welcomeuser.php");
	    }else{
	    	echo " login failed";
	    }
	    	    
	}
}

/**
*
*	return the current level's description
*	-cl :current level
*/
function getDescriptionLevel($cl){

	if($cl == "A1"){
		return "BEGINNER";
	}
	if($cl == "A2"){
		return "ELEMENTARY";
	}
	if($cl == "B1"){
		return "INTERMEDIATE";
	}
	if($cl == "B2"){
		return "UPPER INTERMEDIATE";
	}
	if($cl == "C1"){
		return "ADVANCED";
	}
	if($cl == "C2"){
		return "PROFICIENT";
	}
}

/*
* return the total score of a single test 
*/
function sumTest($q1, $q2, $q3, $q4, $q5){
 	$sum = 0;
 	if($q1 == 5)
 		$sum = $sum + 5;

 	if($q2 == 5)
 		$sum = $sum + 5;

 	if($q3 == 5)
 		$sum = $sum + 5;

 	if($q4 == 5)
 		$sum = $sum + 5;

 	if($q5 == 5)
 		$sum = $sum + 5;
 	return $sum;
 }

/*
* return true if one of the tests (comprehension, grammar, listening, dictation)
* have value < 24
*/

function failedTest(){
	
	$b = true;
	foreach ($_SESSION['tests'] as $test => $value) {
		if($value>=24)
			$b = false;
	}
	return $b;
}

/**
*  log out  the user , close database access, destroy the session 
*  then redirect to connexion page
**/
function deconnecter(){
	//TO_DO : - store the session values : tests into database
	mysqli_close($idCon);
	session_destroy();
	header("Location: http://localhost/proj2/connexion.php");
}

/*
*
*	print final result of a level(test de niveau)
*/
function printresult(){
	echo "Votre score est ".$_SESSION['score']."<br>";
	echo "<ul>";
	foreach ($_SESSION['tests'] as $test => $value) {
		echo " <li> (".$value.") ". $test." </li>"; 
	}
	echo "</ul>";
}

/*
*remove user rrom database 
*/
function removeUser(){
	$r = "DELETE FROM utilisateurs WHERE id = ".$_SESSION['user_id']."";

	 if( mysqli_query($idCon,$r) ) {
	        echo "Utilisateur supprimé avec succès";
	    }
	  else{
	  		die("Erreur de suppression de l utilisateur");
	   }

}

/*
*	Reset value 
*/
function resetTest($key, $val){
	$val = 0;
} 

function updateRecord(){
	$_SESSION['currentLevel'] = getCurrentLevel($_SESSION['levels']);
		//effectue reset sur chaque element du tableau
		array_walk($_SESSION['tests'], 'resetTest');
	$req = "UPDATE utilisateurs SET 
		  A1=".$_SESSION['levels']['A1'].
		",A2= ".$_SESSION['levels']['A2'].
		",B1= ".$_SESSION['levels']['B1'].
		",B2= ".$_SESSION['levels']['B2'].
		",C1= ".$_SESSION['levels']['C1'].
		",C2= ".$_SESSION['levels']['C2'].
		"WHERE id='".$_SESSION["user_id"]."'";
	mysqli_query($idCon,$req); 

}

/*
*	passed level (test de niveau)
*	
*/
function passedLevel(){
	
	if($_SESSION['currentLevel']=="A1"){

		$_SESSION['levels']['A1'] = -1;
		$_SESSION['levels']['A2'] = 0;
		updateRecord();

	}
	if($_SESSION['currentLevel']=="A2"){
		
		$_SESSION['levels']['A2'] = -1;
		$_SESSION['levels']['B1'] = 0;
		updateRecord();

	}
	if($_SESSION['currentLevel']=="B1"){

		$_SESSION['levels']['B1'] = -1;
		$_SESSION['levels']['B2'] = 0;
		updateRecord();
		
	}
	if($_SESSION['currentLevel']=="B2"){
		
		$_SESSION['levels']['B2'] = -1;
		$_SESSION['levels']['C1'] = 0;
		updateRecord();	
	}
	if($_SESSION['currentLevel']=="C1"){
		
		$_SESSION['levels']['C1'] = -1;
		$_SESSION['levels']['C2'] = 0;
		updateRecord();
	}
	if($_SESSION['currentLevel']=="C2"){
		//if last level delete user and disconnect 
		removeUser();
		echo "<script>alert(\"Congratulations ! You master english language now :D !! \");</script>";
		deconnecter();
	}
}

?>