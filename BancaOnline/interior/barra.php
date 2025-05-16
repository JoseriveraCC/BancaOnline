<?php 
   include "../inicia_conexion.php";
   session_start();
   $dpiuser = $_SESSION['dpi'];
   $paginas2 = isset($_GET['pa']) ? strtolower($_GET['pa']) : 'estadocuenta';
    require_once 'menu2.php';
    require_once ''.$paginas2.'.php';
 ?>  
