<?php
    include "../inicia_conexion.php";
?>
<meta charset="UTF-8">
<html>
    <head>
        <title>Bienvenido</title>
    </head>
    <body>
        <div align = "center">
            <?php
                $sql = "Insert INTO usuario(dpi,nombres,apellidos,correo,direccion,telefono,clave)
                values('".$_POST["dpi"]."','".$_POST["nombres"]."','".$_POST["apellidos"]."','".$_POST["correo"]."','".$_POST["direccion"]."',
                '".$_POST["telefono"]."','".$_POST["clave"]."')";
                $status = mysqli_query($conexion,$sql);
                if($status){
                    $alerta = 'Proceso realizado con exito.';
                    echo '<script language="javascript">alert("'.$alerta.'");
                    window.location="https://cb55-2803-d100-e100-205-9100-eb13-5edd-3daf.ngrok.io/BancaOnline/map.php"
                    </script>'; 
                        
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
            ?>
            </div>
    </body>
</html>