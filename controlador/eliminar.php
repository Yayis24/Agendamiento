<?php

include_once("../modelo/conedit.php");
$id=$_POST['id'];

$sentencia= $bd->prepare("DELETE FROM citas INNER JOIN paciente WHERE id=:id;");
$sentencia->bindParam(':id',$id);

if($sentencia->execute()){
    echo "<script> alert ('Eliminacion exitosa') 
    location.href='../index.php'; </script>";

} else{
    return "Error";
}


?>