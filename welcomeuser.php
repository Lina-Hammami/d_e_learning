<?php
require("header.php");
?>

<!Doctype html>
<body>

<?php
	echo "<h3> Welcome ".$_SESSION['nom']."<br>You have ".$_SESSION['score'].
	" /100 pts in the ".$_SESSION['currentLevel']." level </h3>";
	$still = 96 - $_SESSION['score'];
	echo " You still have to gain at least more ".$still." points to pass this level<br> ";
	
	echo "<br> List of next Levels : ";
	echo "<ul>";
		printNextLevels($_SESSION['levels']);
	echo "</ul>";

	echo "<br> List of done Levels : ";
	echo "<ul>";
		printDoneLevels($_SESSION['levels']);
	echo "</ul>";



?>
<!--
<ul>
	<li><a href="niveau.php?var=''">A1 BEGINNER</a>
	</li>
	<li><a href="niveau.php?var='A1'">A2 ELEMENTARY</a>
	</li>
	<li><a href="niveau.php?var='A1'">B1 INTERMEDIATE</a>
	</li>
	<li><a href="niveau.php?var='A1'">B2 UPPER INTERMEDIATE</a>
	</li>
	<li><a href="niveau.php?var='A1'">C1 ADVANCED</a>
	</li>
	<li><a href="niveau.php?var='A1'">C2 PROFICIENT</a>
	</li>
</ul>
<br>
-->

<form method="post" action="welcomeuser.php">
	<button type="submit" class="btn" value="nl" name="nextlevel">nl</button>
</form>

<form method="post" action="welcomeuser.php">
	<input type="submit" name="disconnect" value="Disconnect"  />
</form>


</body>

<?php

	if(isset($_POST['nextlevel'])){
		nextLevel();
	}

	if(isset($_POST['disconnect'])){
		disconnect();
	}

	function nextLevel(){
		var_dump(key($_SESSION['levels']));
		
	}

	function disconnect(){
		//TO_DO : - store the session values into database
		//		  - clear session
		//        - disconnect database		 
	}

	function printNextLevels($levels){
		foreach ($levels as $key_level => $value_level) {
			if(($value_level != (-1))&&($key_level != $_SESSION['currentLevel'])){
				echo "<li>".$key_level."</li>";
			}
		}
	}

	function printDoneLevels($levels){
		foreach ($levels as $key_level => $value_level) {
			if($value_level == (-1)){
				echo "<li>".$key_level."</li>";
			}
		}
	}
	
	function changeCurrentLevelPosition(){
		//set array pointer to the current level position
				while (key($_SESSION['levels']) !== $_SESSION['currentLevel'])
				 next($_SESSION['levels']);
	}
?>