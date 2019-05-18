<?php
require("header.php");
require("sessExpired.php");
require("functions.php");
?>
<!Doctype html>
<body>
<?php
	echo "<h4>".$_SESSION['nom']." ".$_SESSION['prenom']."</h4>";
	echo "<br>You have <b> ".getScore()."</b> /100 pts in the <b>".$_SESSION['currentLevel'].
		 " ".$_SESSION['descriptionLevel']." </b>level </h4><br>";
		$still = 96 - getScore();
	echo " You still have to gain at least more ".$still." points to pass this level<br> ";
	
?>
<ul>
	<li> <?php echo "<a href= http://localhost/proj2/".$_SESSION['currentLevel']."_comprehension.php >" ?> Comprehension</a>
		(<?php echo ($_SESSION['tests']["comprehension"])?> pts)</li>

	<li> <?php echo "<a href= http://localhost/proj2/".$_SESSION['currentLevel']."_grammar.php >" ?> Grammar</a>
		(<?php echo ($_SESSION['tests']["grammar"])?> pts)</li>

	<li> <?php echo "<a href= http://localhost/proj2/".$_SESSION['currentLevel']."_listening.php >" ?> Listening</a>
		(<?php echo ($_SESSION['tests']["listening"])?> pts)</li>

	<li> <?php echo "<a href= http://localhost/proj2/".$_SESSION['currentLevel']."_dictation.php >" ?> Dictation</a>
		(<?php echo ($_SESSION['tests']["dictation"])?> pts)</li>
</ul>

</body>