<?php
require("header.php");?>

<!Doctype html>

<body>
<form method="post" action="">
	<input type="text" name="Nom" placeholder="Nom"><br/><br/>
	<input type="text" name="Prenom" placeholder="Prenom"><br/><br/>
	<input type="radio" name="Sexe" value="male"> Homme<br>
  	<input type="radio" name="Sexe" value="female"> Femme<br><br/>
	<input type="tel" name="Telephone" placeholder="Telephone"><br/><br/>
	<p><label for="pays">Pays :</label>
		<select id="pays" name="Pays"> 
		<option value="Afghanistan">Afghanistan</option>
		<option value="Alg�rie">Alg�rie</option>
		<option value="Afrique du Sud">Afrique du Sud</option>
		<option value="Allemagne">Allemagne</option>
		<option value="Angola">Angola</option>
		<option value="Antigua">Antigua</option>
		<option value="Arabie saoudite">Arabie saoudite</option>
		<option value="Argentine">Argentine</option>
		<option value="Arm�nie">Arm�nie</option> Australie
		<option value="Autrich">Autrich</option>
		<option value="Bahamas">Bahamas</option>
		<option value="Bahre�n">Bahre�n</option>
		<option value="Belgique">Belgique</option>
		<option value="Bangladesh">Bangladesh</option>
		<option value="Br�sil">Br�sil</option>
		<option value="Bulgarie">Bulgarie</option>
		<option value="Canada">Canada</option>
		<option value="Chili">Chili</option>
		<option value="Chine">Chine</option>
		<option value="Cor�e du Nord">Cor�e du Nord</option>
		<option value="Cor�e du sud">Cor�e du sud</option>
		<option value="Cuba">Cuba</option>
		<option value="Danemark">Danemark</option>
		<option value="�gypte">�gypte</option>
		<option value="�mirats arabes unis">�mirats arabes unis</option>
		<option value="Espagne">Espagne</option>
		<option value="�tats-Unis">�tats-Unis</option>
		<option value="Finlande">Finlande</option>
		<option value="France">France</option>
		<option value="Ghana">Ghana</option>
		<option value="Gr�ce">Gr�ce</option>
		<option value="Hongrie">Hongrie</option>
		<option value="Inde">Inde</option>
		<option value="Indon�sie">Indon�sie</option>
		<option value="Iran">Iran</option>
		<option value="Irak">Irak</option>
		<option value="Irlande">Irlande</option> 
		<option value="Islande">Islande</option>
		<option value="Italie">Italie</option>
		<option value="Japon">Japon</option>
		<option value="Jordani">Jordani</option>
		<option value="kenya">kenya</option>
		<option value="Kowe�t">Kowe�t</option> 
		<option value="Liban">Liban</option>
		<option value="Libye">Libye</option>
		<option value="Malawi">Malawi</option>
		<option value="Malaisie">Malaisie</option>
		<option value="Maldives">Maldives</option>
		<option value="Malte">Malte</option>
		<option value="Nouvelle-Z�lande">Nouvelle-Z�lande</option>
		<option value="Norv�ge">Norv�ge</option>
		<option value="Oman">Oman</option>
		<option value="Palestine">Palestine</option> 
		<option value="Panama">Panama</option>
		<option value="Pays-Bas">Pays-Bas</option>
		<option value="Roumanie">Roumanie</option>
		<option value="Russie">Russie</option>
		<option value="Rwand">Rwand</option>
		<option value="Seychelles">Seychelles</option>
		<option value="Tha�lande">Tha�lande</option>
		<option value="Turquie">Turquie</option> 
		<option value="Tunisie" selected="selected">Tunisie</option> 
		<option value="Ukraine">Ukraine</option>    
		<option value="Uruguay">Uruguay</option> 
		<option value="Y�men">Y�men</option>    
		<option value="Yougoslavie">Yougoslavie</option> 
		<option value="Zambie">Zambie</option>    
		<option value="Zimbabwe">Zimbabwe</option> 
		</select></p>
	<input type="text" name="Age" placeholder="Age"><br/><br/>
	<input type="email" name="Email" placeholder="email"><br/><br/>
	<input type="password" name="mdp1" placeholder="Donner un mot de passe"  id="mdp1"><br/><br/>
	<input type="password" name="mdp2" placeholder="retaper votre mot de passe" id="mdp2" /><br/><br/>
	<div style="text-align:center;"><input type="submit" name="submit" value="Envoyer"  /><br/><br/>
</div>
</form></body>

<?php

function enregistrerUtilisateur()
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

if(isset($_POST['submit']))
{
   enregistrerUtilisateur();
} 

?>