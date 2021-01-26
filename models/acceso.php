<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, GET');
header('Access-Control-Allow-Headers: token, Content-Type');
header('Access-Control-Max-Age: 1728000');
header('Content-Length: 0');
header('Content-Type: application/json');
include 'conexion.php';
$op=$_POST['op'];
if($op===null)
{
    echo "Error";
}
else{
switch($op)
{
        case 'insertarAlumno':
            header('Content-Type: application/json');
            $cedula=$_POST['EST_CEDULA'];
            $nombre=$_POST['EST_NOMBRE'];
            $apellido=$_POST['EST_APELLIDO'];
            $direccion=$_POST['EST_DIRECCION'];
            $telefono=$_POST['EST_TEL'];
            $sexo=$_POST['EST_SEXO'];
            $sqlInsert="INSERT INTO estudiantes(EST_CEDULA,EST_NOMBRE,EST_APELLIDO,EST_DIRECCION,EST_TEL,EST_SEXO) VALUES ('$cedula','$nombre','$apellido','$direccion','$telefono','$sexo')";
            if($mysqli->query($sqlInsert)===TRUE)
            {
            echo json_encode("Se guardo correctamente");
            echo $sqlInsert;
            }
            else
            {
            echo "Error:".$sqlInsert."<br>".$mysqli->error;
            echo  $sqlInsert;
            }
            $mysqli->close();
        break;
        
            case 'editarAlumno':
                header('Content-Type: application/json');
                $cedula=$_POST['EST_CEDULA'];
                $nombre=$_POST['EST_NOMBRE'];
                $apellido=$_POST['EST_APELLIDO'];
                $direccion=$_POST['EST_DIRECCION'];
                $telefono=$_POST['EST_TEL'];
                $sexo=$_POST['EST_SEXO'];
                $sqlUpdate="UPDATE estudiantes SET EST_NOMBRE = '$nombre',
                EST_APELLIDO = '$apellido', EST_DIRECCION = '$direccion',
                EST_TEL = '$telefono', EST_SEXO = '$sexo'
                WHERE EST_CEDULA = '$cedula'";
                if($mysqli->query($sqlUpdate)===TRUE)
                {
                echo json_encode("Se actualizo correctamente");
                }
                else
                {
                echo "Error:".$sqlUpdate."<br>".$mysqli->error;
                }
                $mysqli->close();
            break;

            case 'deleteMarca':
                header('Content-Type: application/json');
                $codigo=$_POST['MAR_CODIGO'];
                if(isset($codigo)){
                $sqlDelete="DELETE FROM marca WHERE MAR_CODIGO = $codigo";
                 $resultado= $mysqli->query($sqlDelete);
                 echo json_encode(array("correcto" => $resultado));
            }
              
            break;
}
}

?>