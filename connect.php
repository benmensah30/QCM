<?php 
//connexion à la base de donnée*
$id = mysqli_connect("localhost","root","","youtube_qcm");
mysqli_query($id,"SET NAMES UTF8") ;
if(!$id) echo "la connexion a échoué";
?>