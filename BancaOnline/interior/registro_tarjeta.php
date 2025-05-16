
<meta charset="UTF-8">
<html>
	<?php
        include "../inicia_conexion.php";
 	?>
    <head>
    <title>
        DINERS CLUB
    </title>
    <style type="text/css">
@import url('https://fonts.googleapis.com/css2?family=Bungee&family=Pontano+Sans&display=swap');
.controles{
    width: 95%;
}
.formulario{
    width: 80%;
    margin: auto;
    height: 80%;
    padding: auto;
    text-align: center;
    display: flex;
    flex-direction: column;
    align-items: center;   
    background-color: white;
}
.example-card {
  background-image: url(https://images.unsplash.com/photo-1656038513458-7501879e84e2?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=386&q=80);
  background-repeat: no-repeat;
  height: 100%;
  background-size: cover;
  font-size: large;
  font-family: 'Pontano Sans', sans-serif;
  color: black;
}
.fondo{
  background-color: black;
  width: 100%;  
  height: auto;
}
h1{
    font-family: 'Bungee', cursive;
    font-size: 30px;
    text-align: center;
}
.example-form {
    min-width: 150px;
    max-width: 500px;
    width: 100%;
    text-align: center;
    font-size: large; 
    display: flex;
    align-items: center;
  justify-content: center;
  }
  b{
    text-align: center;
    font-size: 150%; 
    font-family: 'Pontano Sans', sans-serif;
    color: black;
  }
.button{
    background-color: #26589f;
    height: 50px;
    width: 200px;
    font-family: 'Pontano Sans', sans-serif;
  }
 
@charset "UTF-8";
.c-smileyButton {
  font-size: 20px;
  height: 50px;
width: 200px;
    font-family: 'Pontano Sans', sans-serif;
  font-weight: 600;
  color: #ffffff;
  border: 0;
  outline: 0;
  height: 2.5em;
  padding: 0.5em 0.75em;
  border-radius: 0.25em;
  box-sizing: border-box;
  background-color: #000066 ;
  box-shadow: 0 0.15em 1em rgba(0, 0, 0, 0.2);
  z-index: 1;
}
</style>   
</head>  
    <body>
    <div class="example-card" >
    <br><br>
        <div align="center" class="formulario">
        <h1>Registro de Tarjeta</h1>
        <div class = "example-form">
            <br><br>
            <form name="datos" method="post" action="registro_tarjeta_insert.php">
            <table border="0">
                <tr>
                    <td>
                        <b>Numero de Tarjeta</b>
                    </td>
                    <td>
                        <?php 
                        $numerotarjeta = rand(1000000000000000,9999999999999999);
                        echo " <input type='text' name='numerotarjeta'  minlength='16' value='$numerotarjeta' readonly> ";
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <b>Nombre del Titular</b>
                    </td>
                    <td>
                        <?php
                             $dpiuser = $_SESSION['dpi'];
                             $sql ="SELECT u.nombres,u.apellidos FROM usuario u where u.dpi = $dpiuser ";
                             $resultado = mysqli_query($conexion,$sql);
                             while($fila = mysqli_fetch_array($resultado)){
                                $nombre=$fila["nombres"];
                                $separanombre = " ";
                                $separada = explode($separanombre, $nombre);
                                $nombres=$separada[0];

                                $apellido=$fila["apellidos"];
                                $separaapellido = " ";
                                $separada2 = explode($separaapellido, $apellido);
                                $apellidos=$separada2[0];
                                echo " <input type='text' name='nombretitular' value='$nombres $apellidos' readonly>";
                             }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <b>Fecha de Vencimiento&nbsp;</b>
                    </td>
                    <td>
                        <?php
                        $fecha = array("2024","2025","2026","2027","2028","2029");
                        $seleccion = array_rand($fecha);
                        $mes = array("01","02","03","04","05","06","07","08","09","10","11","12");
                        $seleccion1 = array_rand($mes);
                        echo "<input type='text' name='fechavencimiento' value='$fecha[$seleccion]$mes[$seleccion1]' readonly>";

                        ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <b>Numero de Seguridad</b>
                    </td>
                    <td>
                        <?php
                        $numeroseguridad = rand(100,999);
                        echo "<input type='text' name='numseguridad' value='$numeroseguridad' readonly>";
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <b>Monto Autorizado</b>
                    </td>
                    <td>
                        <?php
                            $montot = array(1000,3000,5000,7000,9000,11000);
                            $seleccion = array_rand($montot);
                            echo "<input type='text' name='montoaut' value=' $montot[$seleccion]' readonly>";
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <b>Tipo de Tarjeta</b>
                    </td>
                    <td>
                        <select name="tipotarjeta">
                            <option value="" selected></option>
                                <?php
                                    $sql ="select tipoid,tiponombre from tipotarjeta order by tiponombre";
                                    $membre = mysqli_query($conexion,$sql);
                                    while($subs = mysqli_fetch_array($membre)){
                                        echo '<option value = "' . $subs["tipoid"] . '">' . $subs["tiponombre"] . '</option>';
                                    } 
                                ?>
                        </select>
                    </td>
                </tr>
            </table>
            <br>&nbsp;<button class="c-smileyButton" type="submit" >
            &nbsp;Guardar Tarjeta</button>
            </form>
            </div>
        </div>
        </div>
    </body>
</html>