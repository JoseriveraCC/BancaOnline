<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <meta charset="UTF-8">
        <title>
            DINERS CLUB
        </title>
        <style type="text/css">
             @import url('https://fonts.googleapis.com/css2?family=Bungee&family=Pontano+Sans&display=swap');
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
} 
img{
  height: 80px;
  width: 260px;
}
nav{
  display: flex;
  height: 80px;
  width: 100%;
  background: black;
  align-items: center;
  justify-content: space-between;
  padding: 0 50px 0 100px;
  flex-wrap: wrap;
}
nav .logo{
  color: #fff;
  font-size: 35px;
  font-weight: 600;
  margin-left: -40px;
  height: 100px;
  width: 100px;
}
nav ul{
  display: flex;
  flex-wrap: wrap;
  list-style: none;
}
nav ul li{
  margin: 0 5px;
}
nav ul li a {
  color: white;
  padding: 8px 10px;
  border-radius: 5px;
  letter-spacing: 1px;
  text-decoration: none;
  font-size: 13px;
  font-weight: 500;
  font-family: 'Pontano Sans', sans-serif;
  transition: all 0.3s ease;
}
nav ul li a.active,
nav ul li a:hover{
  color: #111;
  background: white;
}
    </style>    
    </head>
    <body>
        <header>
        <nav>
            <div class="logo">
                <img src="../FINBANK ONLINE.png">
            </div>  
            <ul class="active">
                <li class="<?php echo $paginas2 == 'estadocuenta' ? 'active':'';?>"><a  href="?pa=estadocuenta">Estado de Cuenta</a></li>
                <li class="<?php echo $paginas2 == 'registro_tarjeta' ? 'active':'';?>"><a href="?pa=registro_tarjeta">Registro de Tarjetas</a></li>
                <li class="<?php echo $paginas2 == 'tarjetas_matriculadas' ? 'active':'';?>"><a href="?pa=tarjetas_matriculadas">Tarjetas Matriculadas</a></li>
                <li class="<?php echo $paginas2 == 'registro_abonos' ? 'active':'';?>"><a href="?pa=registro_abonos">Registro de Abonos</a></li>
                <li class="<?php echo $paginas2 == 'abonos_efectuados' ? 'active':'';?>"><a href="?pa=abonos_efectuados">Abonos efectuados</a></li>
                <li class="<?php echo $paginas2 == 'historial_consumos' ? 'active':'';?>"><a href="?pa=historial_consumos">Historial Consumos</a></li>
                <li ><a href="../map.php">Cerrar Sesion </a></li>
            </ul>      
        </nav>    
        </header>
    </body>
</html>