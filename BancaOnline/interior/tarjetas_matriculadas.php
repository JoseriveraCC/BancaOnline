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
                
.card{
width: 320px;
height: 190px;
  -webkit-perspective: 600px;
  -moz-perspective: 600px;
  perspective:600px;
  
}

.card__part{
  box-shadow: 1px 1px #aaa3a3;
    top: 0;
  position: absolute;
z-index: 1000;
  left: 0;
  display: inline-block;
    width: 320px;
    height: 190px;
    background-image: url(mapa.png), linear-gradient(#000033,#000033 );; /*linear-gradient(to right bottom, #fd8369, #fc7870, #f96e78, #f56581, #ee5d8a)*/
    background-repeat: no-repeat;
    background-position: center;
    background-size: cover;
    border-radius: 8px;
   
    -webkit-transition: all .5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    -moz-transition: all .5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    -ms-transition: all .5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    -o-transition: all .5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    transition: all .5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    -webkit-transform-style: preserve-3d;
    -moz-transform-style: preserve-3d;
    -webkit-backface-visibility: hidden;
    -moz-backface-visibility: hidden;
}

.card__front{
  padding: 18px;
-webkit-transform: rotateY(0);
-moz-transform: rotateY(0);
}

.card__back {
  padding: 18px 0;
-webkit-transform: rotateY(-180deg);
-moz-transform: rotateY(-180deg);
}

.card__black-line {
    margin-top: 5px;
    height: 38px;
    background-color: #303030;
}

.card__logo {
    height: 150px;
    width: 150px;
}

.card__front-logo{
    position: absolute;
    bottom: 80px;
    left: 190px;
}
.card__front-square{
    position: absolute;
    top: 20px;
    right: 260px;
}
.card__square {
    border-radius: 5px;
    height: 30px;
    width: 40px;
}

.card_numer {
    display: block;
    width: 100%;
    word-spacing: 3px;
    font-size: 20px;
    letter-spacing: 3px;
    color: #fff;
    text-align: center;
    margin-bottom: 30px;
    margin-top: 60px;
}

.card__space-75 {
    width: 65%;
    float: left;
}

.card__space-25 {
    width: 25%;
    float: left;
}

.card__label {
    font-size: 10px;
    text-transform: uppercase;
    color: rgba(255,255,255,0.8);
    letter-spacing: 1px;
}

.card__info {
    margin-bottom: 0;
    margin-top: 5px;
    font-size: 16px;
    line-height: 18px;
    color: #fff;
  letter-spacing: 1px;
  text-transform: uppercase;
}

.card__back-content {
    padding: 18px 18px 0;
}
.card__secret--last {
    color: #303030;
    text-align: right;
    margin: 0;
    font-size: 14px;
}

.card__secret {
    padding: 5px 12px;
    background-color: #fff;
    position:relative;
}

.card__secret:before{
  content:'';
  position: absolute;
top: -3px;
left: -3px;
height: calc(100% + 6px);
width: calc(100% - 42px);
border-radius: 4px;
  background: repeating-linear-gradient(45deg, #ededed, #ededed 5px, #f9f9f9 5px, #f9f9f9 10px);
}

.card__back-logo {
    position: absolute;
    top: 90px;
    left: 179px;
}

.card:hover .card__front {
    -webkit-transform: rotateY(180deg);
    -moz-transform: rotateY(180deg);

}

.card:hover .card__back {
    -webkit-transform: rotateY(0deg);
    -moz-transform: rotateY(0deg);
}
.controles{
    width: 95%;
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
  .tarjetas{
    display: inline-block;
    padding: 10px;
  }
        </style>   
       </head>
    <body>
        <div align="center" class="example-card" >
        <br>
            <div class="arreglar">
            <font size="5"><h1>Listado de Tarjetas</h1></font><br><br>
            <form name="datos" method="post">
                <?php
                        $dpiuser = $_SESSION['dpi'];
                        $sql ="SELECT t.numerotarjeta,t.nombretitular,t.fechavencimiento,t.numseguridad,t.montoaut,t.montodis, i.tiponombre FROM tarjetas t,tipotarjeta i where t.cliente = $dpiuser and i.tipoid = t.tipotarjeta
                        ";
                        $resultado = mysqli_query($conexion,$sql);
                        while($fila = mysqli_fetch_array($resultado)){
                            echo "<div class='tarjetas'>";
                            echo "<div class='card'>
                            <div class='card__front card__part'>
                            <img class='card__front-square card__square' src='chip.png'>
                            <img class='card__front-logo card__logo' src='logo.png'>" ;   
                            echo "<p class='card_numer'>". $fila["numerotarjeta"]."</p>";
                            echo "<div class='card__space-75'>
                            <span class='card__label'>Card holder</span>";
                            echo "<p class='card__info'>". $fila["nombretitular"]."</p>";
                            echo "</div>";

                            echo "<div class='card__space-25'>
                                    <span class='card__label'>Expires</span>";
                            echo "<p class='card__info'>". $fila["fechavencimiento"]."</p>";
                            echo "</div>";
                            echo "</div>";

                            echo "<div class='card__back card__part'>";
                            echo "<div class='card__black-line'></div>";
                            echo "<div class='card__back-content'>";
                            echo "<div class='card__secret'>";
                            echo "<p class='card__secret--last'>". $fila["numseguridad"]."</p>";
                            echo "</div>";
                            echo "<img class='card__back-logo card__logo' src='logo.png'>";
                            echo "</div>";
                            echo "</div>";
                            echo "</div>";
                            echo "MONTO AUTORIZADO: Q". $fila["montoaut"].".00 <br>";
                            echo "MONTO DISPONIBLE: Q". $fila["montodis"].".00";
                            echo "</div>";
                        }
                    ?>    
            </form>
        </div>
        </div>
    </body>
</html>
