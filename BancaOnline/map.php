<?php 
    $paginas = isset($_GET['p']) ? strtolower($_GET['p']) : 'inicio';
    require_once 'exterior/menu.php';
    require_once 'exterior/'.$paginas.'.php';
 ?>   