
          <?php   include "../inicia_conexion.php";
                session_start();
                $dpiuser = $_SESSION['dpi'];
                $sql = "Insert INTO tarjetas(numerotarjeta,nombretitular,fechavencimiento,numseguridad,montoaut,montodis,cliente,tipotarjeta)
                values('".$_POST["numerotarjeta"]."','".$_POST["nombretitular"]."','".$_POST["fechavencimiento"]."','".$_POST["numseguridad"]."','".$_POST["montoaut"]."','".$_POST["montoaut"]."',
                $dpiuser,'".$_POST["tipotarjeta"]."')";
                $status = mysqli_query($conexion,$sql);
                if($status){
                    $alerta = 'Proceso realizado con exito.';
                    echo '<script language="javascript">alert("'.$alerta.'");
                    window.location="https://cb55-2803-d100-e100-205-9100-eb13-5edd-3daf.ngrok.io/BancaOnline/interior/barra.php"
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
