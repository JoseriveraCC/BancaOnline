
<?php   include "../inicia_conexion.php";
                session_start();
                $dpiuser = $_SESSION['dpi'];
                $DateAndTime = date('Y-m-d h:i:s a', time());
                $sql = "Insert INTO pagos(numerotar,fecha,monto) 
                values('".$_POST["numerotar"]."','".$DateAndTime."','".$_POST["monto"]."')";
                $status = mysqli_query($conexion,$sql);
                if($status){
                    $tarjetas =$_POST["numerotar"];
                    $montoabono = $_POST["monto"];
                    $sql ="select * from tarjetas t where (t.numerotarjeta = $tarjetas)";
                    $resultado1 = mysqli_query($conexion,$sql);
                    while($fila1 = mysqli_fetch_array($resultado1)){
                        $montoguar = $fila1["montodis"];
                        $montosuma = $montoguar + $montoabono;
                        $sql = "update tarjetas set
                        montodis = $montosuma
                        where numerotarjeta =$tarjetas";
                        $status = mysqli_query($conexion,$sql);
                        if($status){ 
                            $alerta = 'Abono realizado con exito.';
                            echo '<script language="javascript">alert("'.$alerta.'");
                            </script>';   
                        }
                        else{
                            $alerta = 'Sucedio un error con su solicitud';
                            echo '<script language="javascript">alert("'.$alerta.'");
                            </script>'; 
                                }
                        }
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