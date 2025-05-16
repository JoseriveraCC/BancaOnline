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
*{
                box-sizing:border-box;
                font-family: 'Space Mono', monospace;
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
  }
  b{
    text-align: center;
    font-size: 120%; 
    font-family: 'Pontano Sans', sans-serif;
    color: black;
  }
  .arreglar{
    width: 80%;
    height: 90%;
    margin: auto;
    background-color: white;
}
.button{
    background-color: #26589f;
    height: 50px;
    width: 200px;
    font-family: 'Pontano Sans', sans-serif;
  }
  th, td {
  padding-left: 30px;
  padding-right: 40px;
  text-align:center;
}
        </style>   
       </head>
    <body>
        <div align="center" class="example-card" >
            <br>
            <div class="arreglar">
            <font size="5"><h1>Abonos Efectuados</h1></font><br><br>
            <form name="datos" method="post">
                <tr>
                <table border ="1">
                    <tr>
                        <td><b>&nbsp;Numero de Tarjeta&nbsp;</b></td>
                        <td><b>&nbsp;Fecha del Deposito&nbsp;</b></td>
                        <td><b>&nbsp;Monto a Pagar&nbsp;</b></td>       
                    </tr>
                    <?php
                        
                        $dpiuser = $_SESSION['dpi'];
                        $sql ="select p.numerotar,p.fecha,p.monto from pagos p,tarjetas t where t.cliente = $dpiuser and  p.numerotar=t.numerotarjeta
                        ";
                        $resultado = mysqli_query($conexion,$sql);
                        while($fila = mysqli_fetch_array($resultado)){
                            echo "<tr>";
                            echo "<td>". $fila["numerotar"]."</td>";
                            echo "<td>". $fila["fecha"]."</td>";
                            echo "<td>Q". $fila["monto"].".00</td>";
                            echo "</tr>";
                        }
                    ?>  
                </table>   
            </form>
        </div>
    </body>
</html>