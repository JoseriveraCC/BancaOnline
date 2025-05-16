<?php
    include "inicia_conexion.php";
    session_start();
    $dpi = $_POST['dpi'];
    $clave = $_POST['clave'];

    $sql = "select * from usuario u where u.dpi ='$dpi' and u.clave = '$clave'";
    $status = $conexion->query($sql);

    $filas = $status->fetch_assoc();
                
    if($status->num_rows >0){
        $_SESSION['dpi'] = $dpi;
        header("Location: interior/barra.php");
    }else{
        
}
?>
   