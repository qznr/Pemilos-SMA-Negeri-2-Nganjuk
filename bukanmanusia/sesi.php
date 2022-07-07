<?php
if(empty($_SESSION['idkasis']) AND empty($_SESSION['userkasis'])){
	header('location:login.php');
}
?>
