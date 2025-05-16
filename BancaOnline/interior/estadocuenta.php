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
            @import url('https://fonts.googleapis.com/css?family=Space+Mono:400,400i,700,700i');             
            *{
                box-sizing:border-box;
                font-family: 'Space Mono', monospace;
                }
.example-card {
  background-image: url(https://images.unsplash.com/photo-1656038513458-7501879e84e2?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=386&q=80);
  background-repeat: no-repeat;
  height: 200%;
  background-size: cover;
  font-size: large;
  font-family: 'Pontano Sans', sans-serif;
  color: black;
}
.arreglar{
    width: 90%;
    height: auto;
    margin: auto;
    background-color: white;
}
h1{
    font-family: 'Bungee', cursive;
    font-size: 30px;
    text-align: center;
}
b{
    text-align: center;
    font-size: 120%; 
    font-family: 'Pontano Sans', sans-serif;
    color: black;
}
.tarjetas{
    display: flex;
    height: auto;
    width: auto;
    padding: 10px;
    gap:10px;
    flex-direction: row;
    flex-wrap: nowrap;
    justify-content: space-around;
    border: 2px solid black;
}
.card_numer {
    display: block;
    width: 100%;
    word-spacing: 1px;
    font-size: 15px;
    letter-spacing: 2px;
    color: black;
    text-align: left;
    margin-bottom: 30px;
    margin-top: 30px;
}
p{
    display:flex;
    flex-direction:column;
    text-align:left;
}
.c-smileyButton {
  font-size: 20px;
  height: 70px;
width: 220px;
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
th, td {
  padding-left: 30px;
  padding-right: 40px;
}
        </style>   
       </head>
    <body>
        <div align="center" class="example-card" >
        <br>
            <div class="arreglar">
            <font size="5"><h1>Estado de Cuenta</h1></font>
                <?php 
                     $dpiuser = $_SESSION['dpi'];
                     $sql ="SELECT u.nombres,u.apellidos FROM usuario u where u.dpi = $dpiuser ";
                     $resultado = mysqli_query($conexion,$sql);
                     while($fila = mysqli_fetch_array($resultado)){
                        echo "Bienvenido(a) ".$fila["nombres"]." ".$fila["apellidos"]."";
                     }
                ?>
                <br><br>
                    <form name="datos" method="post" action="">
                        <table border="0">
                            <tr>
                                <td>
                                <b>Ingrese el No. de Tarjeta que desea ver:</b>
                                </td>
                                <td>
                                <input type="text" name="tarjeta_num">
                                </td>
                            </tr>
                        </table>
                        <br>&nbsp;<button class="c-smileyButton" type="submit" name ="submit"> &nbsp;Buscar Cuenta</button><br><br>
                    <?php
                        $noerrors=true;
                    if( isset($_POST['submit']) && $noerrors){
                        $busqueda = $_POST['tarjeta_num'];
                        $dpiuser = $_SESSION['dpi'];                    
                        $sql ="SELECT t.numerotarjeta,t.nombretitular,t.montoaut,t.montodis FROM tarjetas t where t.cliente = $dpiuser and t.numerotarjeta like '%".$busqueda."%'";
                        $resultado = mysqli_query($conexion,$sql);
                        while($fila = mysqli_fetch_array($resultado)){
                            $autmonto = $fila["montoaut"];
                            $dismonto = $fila["montodis"];
                            $saldopagar = $autmonto - $dismonto;
                            echo " <div class='tarjetas'>";
                            echo "<p> Tarjeta No.". $fila["numerotarjeta"]."<br>";
                            echo " Nombre del Titular: ". $fila["nombretitular"]."<br><br>";
                            echo "Monto Autorizado: Q". $fila["montoaut"].".00 <br>";
                            echo "Monto Disponible: Q". $fila["montodis"].".00<br><br>";
                            echo "Saldo a Pagar: Q".$saldopagar.".00</p>";
                        }
                        echo "<p><table class='unfixed-table' border=1>
                        <tr>
                            <th>Fecha</th>
                            <th>Descripcion</th>
                            <th>Consumo</th>
                            <th>Abono</th>
                        </tr>";
                        $sql ="SELECT c.fecha,c.tienda,c.monto from consumos c, tarjetas t where c.tarjeta = t.numerotarjeta and t.cliente = $dpiuser and c.tarjeta like '%".$busqueda."%'";
                        $resultado = mysqli_query($conexion,$sql);
                        $sumaconsumos =0;
                        while($fila = mysqli_fetch_array($resultado)){
                            echo "<tr>";
                            echo "<td>". $fila["fecha"]."</td>";
                            echo "<td>". $fila["tienda"]."</td>";
                            echo "<td>Q". $fila["monto"].".00</td>";
                            echo "<td></td>";
                            echo "</tr>";
                            $montoconsumo =$fila["monto"];
                            $sumaconsumos=$montoconsumo+$sumaconsumos;   
                        }   
                        //----------------------------------------------------------------------------------------------------------------
                        $sql ="SELECT p.fecha ,p.monto from pagos p, tarjetas t where  p.numerotar= t.numerotarjeta and t.cliente = $dpiuser and p.numerotar like '%".$busqueda."%'";
                        $resultado = mysqli_query($conexion,$sql);
                        $sumaabonos =0;
                        while($fila = mysqli_fetch_array($resultado)){
                            echo "<tr>";
                            echo "<td>". $fila["fecha"]."</td>";
                            echo "<td>PAGO A TARJETA</td>";
                            echo "<td></td>";
                            echo "<td>Q". $fila["monto"].".00</td>";
                            echo "</tr>";
                            $montoabon =$fila["monto"];
                            $sumaabonos=$montoabon+$sumaabonos; 
                        }
                        echo "<tfoot>";
                        echo "<tr>
                                <td></td>";
                        echo "<td>Totales</td>";
                        echo "<td>Q$sumaconsumos.00</td>";
                        echo "<td>Q$sumaabonos.00</td>";
                        echo "</tfoot>";
                        echo "</table>"; 

                        echo "<br></p> </div>";
                        
                    }
                    ?>
                    </form>
            </div>
        </div>
    </body>
</html>