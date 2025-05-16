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
  }
  b{
    text-align: center;
    font-size: 150%; 
    font-family: 'Pontano Sans', sans-serif;
    color: black;
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
        <h1>Registro de Abonos</h1>
        <div class = "example-form">
            <br><br>
            <form name="datos" method="post" action="registro_abonos_insert.php">
            <table border="0">
                <tr>
                    <td>
                        <b>Numero de Tarjeta&nbsp;</b>
                    </td>
                    <td>
                        <input type="text" name="numerotar">
                    </td>
                </tr>
                <tr>
                    <td>
                        <b>Monto a Pagar </b>
                    </td>
                    <td>
                        <input type="number" name="monto">
                    </td>
                </tr>
            </table>
            <br>&nbsp;<button class="c-smileyButton" type="submit" >
            &nbsp;Guardar Abono</button>
            </form>
        </div>
</div>
</div>
    </body>
</html>