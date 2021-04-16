<?php 
include 'database.php';
$db = new Database();
 
$aksi = $_GET['aksi'];
 if($aksi == "save"){
 	$db->save($_POST['nama'],$_POST['alamat'],$_POST['usia']);
 }elseif($aksi == "destroy"){ 	
 	$db->destroy($_GET['id']);
 }elseif($aksi == "update"){
 	$db->update($_POST['id'],$_POST['nama'],$_POST['alamat'],$_POST['usia']);
 }
?>