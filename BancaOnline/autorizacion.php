<?php
include "inicia_conexion.php";
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method, ngrok-skip-browser-warning");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");

$tarjeta = $_GET['tarjeta'];
$nombre = $_GET['nombre'];
$fecha_venc = $_GET['fecha_venc'];
$num_seguridad = $_GET['num_seguridad'];
$monto= $_GET['monto'];
$tienda = $_GET['tienda'];
$formato = $_GET['formato'];


$sql ="select * from tarjetas t where (t.numerotarjeta = $tarjeta) and (t.numseguridad = $num_seguridad)";
$resultado = mysqli_query($conexion,$sql);
$totalrows = mysqli_num_rows($resultado);

while($fila = mysqli_fetch_array($resultado)){
    $fecha= $fila["fechavencimiento"];
    $separaraño = str_split($fecha,4);
    $separaraño1 = str_split($fecha_venc,4);
    $fecha_tar_año = $separaraño[0];
    $fecha_tar_mes = $separaraño[1];
    $fecha_entrada_año = $separaraño1[0];
    $fecha_entrada_mes = $separaraño1[1];

    // Extraer fecha actual
    $date   = new DateTime(); //this returns the current date time
    $result = $date->format('Y-m-d-H-i-s');

    $krr    = explode('-', $result);
    $result = implode("", $krr);

    $resultano[0] = substr($result, 0, 4);
    $resultmes[0] = substr($result, 4, 2);
    $resultadoano = $resultano[0];
    $resultadomes = $resultmes[0];

    $numerorandom = rand(000000,1000000);
    if(($formato == "XML")||($formato == "xml") ){
        if(($fecha_entrada_año > $resultadoano)&&($fila["montodis"] >= $monto)){
            if(($fecha_entrada_año != $fecha_tar_año) || ($fecha_entrada_mes != $fecha_tar_mes)){
                echo "Por favor ingresar fecha_venc correctamente. (El mismo que la tarjeta guardada que desea utilizar)";
                break;
            };
            echo "<autorizacion>\n";
            print("\t<emisor>Diners Club</emisor>\n");
            echo "\t<tarjeta>$tarjeta</tarjeta>\n";
            echo "\t<status>APROBADO</status>\n";
            echo "\t<numero>$numerorandom</numero>\n";
            echo "</autorizacion>\n";
             $sql = "Insert INTO consumos(fecha,tienda,monto,autorizacion,tarjeta)
             values(curdate(),'$tienda',$monto,$numerorandom,'$tarjeta')";
             $status = mysqli_query($conexion,$sql);
             if($status){
                $montoguar = $fila["montodis"];
                $montoresta = $montoguar - $monto;
                $sql = "update tarjetas set
                montodis = $montoresta
                where numerotarjeta =$tarjeta";
                $status = mysqli_query($conexion,$sql);
             }
             else{
                 if(mysqli_errno($conexion)==1062){
                     $alert = 'ERROR- el usuario ya existe';
                     echo '<font color ="red"><script language="javascript">alert("'.$alert.'");</script> </font>';
                 }else{
                     $errormes = 'Sucedio un error con su solicitud';
                     echo '<font color ="red"><script language="javascript">alert("'.$errormes.'");</script></font>';
                 }
             }
        }elseif (($fecha_entrada_año = $resultadoano)&&($fecha_entrada_mes >= $resultadomes)&&($fila["montodis"] >= $monto)) {
            if(($fecha_entrada_año != $fecha_tar_año) || ($fecha_entrada_mes != $fecha_tar_mes)){
                echo "Por favor ingresar fecha_venc correctamente. (El mismo que la tarjeta guardada que desea utilizar)";
                break;
            }
            echo "<autorizacion>\n";
            print("\t<emisor>Diners Club</emisor>\n");
            echo "\t<tarjeta>$tarjeta</tarjeta>\n";
            echo "\t<status>APROBADO</status>\n";
            echo "\t<numero>$numerorandom</numero>\n";
            echo "</autorizacion>\n";
             $sql = "Insert INTO consumos(fecha,tienda,monto,autorizacion,tarjeta)
             values(curdate(),'$tienda',$monto,$numerorandom,'$tarjeta')";
             $status = mysqli_query($conexion,$sql);
             if($status){
                $montoguar = $fila["montodis"];
                $montoresta = $montoguar - $monto;
                $sql = "update tarjetas set
                montodis = $montoresta
                where numerotarjeta =$tarjeta";
                $status = mysqli_query($conexion,$sql); 
             }
             else{
                 if(mysqli_errno($conexion)==1062){
                     $alert = 'ERROR- el usuario ya existe';
                     echo '<font color ="red"><script language="javascript">alert("'.$alert.'");</script> </font>';
                 }else{
                     $errormes = 'Sucedio un error con su solicitud';
                     echo '<font color ="red"><script language="javascript">alert("'.$errormes.'");</script></font>';
                 }
             }
        } else {
            echo "<autorizacion>\n";
            echo "\t<emisor>Diners Club</emisor>\n";
            echo "\t<tarjeta>$tarjeta</tarjeta>\n";
            echo "\t<status>DENEGADO</status>\n";
            echo "\t<numero></numero>\n";
            echo "</autorizacion>\n";
        }
    }elseif (($formato == "json")||($formato == "JSON")){
        if(($fecha_entrada_año > $resultadoano)&&($fila["montodis"] >= $monto)){
            if(($fecha_entrada_año != $fecha_tar_año) || ($fecha_entrada_mes != $fecha_tar_mes)){
                echo "Por favor ingresar fecha_venc correctamente. (El mismo que la tarjeta guardada que desea utilizar)";
                break;
            }
            //$formatoJSON = array("emisor" => "Diners Club", "tarjeta" => $tarjeta, "status" => "APROBADO", "numero" => $numerorandom);
            //$formatoCompleto = array("autorizacion" => $formatoJSON);
            //header("Content-Type: application/json");
            //echo json_encode($formatoCompleto);
            echo '{"autorizacion" :';
            echo '{"emisor" : "Diners Club",';
            echo '"tarjeta" : '.$tarjeta.',';
            echo '"status" : "APROBADO",';
            echo '"numero" : '.$numerorandom.'';
            echo '}';
            echo '}';
             $sql = "Insert INTO consumos(fecha,tienda,monto,autorizacion,tarjeta)
             values(curdate(),'$tienda',$monto,$numerorandom,'$tarjeta')";
             $status = mysqli_query($conexion,$sql);
             if($status){
                $montoguar = $fila["montodis"];
                $montoresta = $montoguar - $monto;
                $sql = "update tarjetas set
                montodis = $montoresta
                where numerotarjeta =$tarjeta";
                $status = mysqli_query($conexion,$sql); 
             }
             else{
                 if(mysqli_errno($conexion)==1062){
                     $alert = 'ERROR- el usuario ya existe';
                     echo '<font color ="red"><script language="javascript">alert("'.$alert.'");</script> </font>';
                 }else{
                     $errormes = 'Sucedio un error con su solicitud';
                     echo '<font color ="red"><script language="javascript">alert("'.$errormes.'");</script></font>';
                 }
             }
        }elseif (($fecha_entrada_año = $resultadoano)&&($fecha_entrada_mes >= $resultadomes)&&($fila["montodis"] >= $monto)) {
            if(($fecha_entrada_año != $fecha_tar_año) || ($fecha_entrada_mes != $fecha_tar_mes)){
                echo "Por favor ingresar fecha_venc correctamente. (El mismo que la tarjeta guardada que desea utilizar)";
                break;
            }

            echo '{"autorizacion" :';
            echo '{"emisor" : "Diners Club",';
            echo '"tarjeta" : '.$tarjeta.',';
            echo '"status" : "APROBADO",';
            echo '"numero" : '.$numerorandom.'';
            echo '}';
            echo '}';
             $sql = "Insert INTO consumos(fecha,tienda,monto,autorizacion,tarjeta)
             values(curdate(),'$tienda',$monto,$numerorandom,'$tarjeta')";
             $status = mysqli_query($conexion,$sql);
             if($status){
                $montoguar = $fila["montodis"];
                $montoresta = $montoguar - $monto;
                $sql = "update tarjetas set
                montodis = $montoresta
                where numerotarjeta =$tarjeta";
                $status = mysqli_query($conexion,$sql);
             }
             else{
                 if(mysqli_errno($conexion)==1062){
                     $alert = 'ERROR- el usuario ya existe';
                     echo '<font color ="red"><script language="javascript">alert("'.$alert.'");</script> </font>';
                 }else{
                     $errormes = 'Sucedio un error con su solicitud';
                     echo '<font color ="red"><script language="javascript">alert("'.$errormes.'");</script></font>';
                 }
             }
        } else {
            echo '{"autorizacion" :';
            echo '{"emisor" : "Diners Club",';
            echo '"tarjeta" : '.$tarjeta.',';
            echo '"status" : "DENEGADO",';
            echo '"numero" : 0';
            echo '}';
            echo '}';
        }
    } else {
        echo "Ingrese formato correcto.";
    }
}
if(($totalrows == 0) && (($formato == "xml") || ($formato == "XML"))) {
    echo "<autorizacion>\n";
    echo "\t<emisor>Diners Club</emisor>\n";
    echo "\t<tarjeta>$tarjeta</tarjeta>\n";
    echo "\t<status>DENEGADO</status>\n";
    echo "\t<numero></numero>\n";
    echo "</autorizacion>\n";
}

if(($totalrows == 0) && (($formato == "json") || ($formato == "JSON"))) {
    echo '{"autorizacion" :';
    echo '{"emisor" : "Diners Club",';
    echo '"tarjeta" : '.$tarjeta.',';
    echo '"status" : "DENEGADO",';
    echo '"numero" : 0';
    echo '}';
    echo '}';
}

?>