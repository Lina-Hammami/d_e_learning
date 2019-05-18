<?php
require("header.php");
require("sessExpired.php");
require("functions.php");
?>

<!Doctype html>
<body>
	<input type="submit" name="home" value="Home" /><br/>
<?php
	$page = $_GET['pg'];
	printresult();
	echo "Echec :/ <br>";

?>
	<form method="post" action="">

		<input type="submit" name="submit" value="Refair le test de niveau" /><br/>
		<input type="submit" name="disconnect" value="Déconnecter" /><br/>
	</form>
<?php
			
	if(isset($_POST['submit'])){
		header("Location: http://localhost/proj2/".$_SESSION['currentLevel']."_comprehension.php ");

	}
	if(isset($_POST['disconnect'])){
		deconnecter();
	}
	if(isset($_POST['home'])){
		header("Location: http://localhost/proj2/welcomeuser.php");
	}

?>