<?php
if (!isset($_SESSION['user_id'])) 
{
   header("location:connexion.php");
   exit;
}
?>