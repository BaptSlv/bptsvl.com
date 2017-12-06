<?php
session_start ();
require '../models/modelArchives.php';

if(isset($_POST['editer'], $_POST['description'], $_POST['categoryId'], $_POST['lvltache'], $_POST['tacheid'])
	&& !empty($_POST['description']) 
	&& !empty($_POST['categoryId']) 
	&& !empty($_POST['lvltache'])
	&& !empty($_POST['tacheid'])) {
	if(getEdit(htmlspecialchars($_POST['description']), htmlspecialchars($_POST['categoryId']), htmlspecialchars($_POST['lvltache']), htmlspecialchars($_POST['tacheid']), $_SESSION['userid'])) {
		header('Location:/bptslv.com/controlers/indexArchives.php');
	}
} else if(isset($_POST['reactiver'], $_POST['tacheid']) 
	&& !empty($_POST['tacheid'])) {
	if(getRecreate(htmlspecialchars($_POST['tacheid']), $_SESSION['userid'])) {
		header('Location:/bptslv.com/controlers/indexArchives.php');
	}
}

$CateOns = getCateOn();
if( $CateOns ) {
	require '../views/vueCtg.php';
} else {
	$msgErreur = 'Category introuvable';
	require '../views/vueErreur.php';
}

$reads = getRead();
if($reads) {
	require '../views/vueArchives.php';
} else {
	$msgErreur = 'Tache introuvable';
	require '../views/vueErreur.php';
}

require '../templates/archives.php';