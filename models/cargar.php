<?php
include "conexion.php";
$query="SELECT * FROM estudiantes";
if(isset($_POST['EST_CEDULA'])!= ""){
    $q=$conn->real_escape_string($_POST['EST_CEDULA']);
    $query="SELECT * FROM estudiantes WHERE EST_CEDULA LIKE '%".$q."%'";
}
$buscarEstudiante=$conn->query($query);
$result=array();
if($buscarEstudiante->num_rows > 0){
    while ($filaMarca=$buscarEstudiante->fetch_assoc()) {
        array_push($result,$filaMarca);
    }
}else{
    $result="No se encontraron marcas";
}

echo json_encode($result);
?>