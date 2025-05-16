
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
            width: 296px;
            }
            nav{
            display: flex;
            height: 80px;
            width: 100%;
            background: #000000;
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
            color: #f2f2f2;
            padding: 8px 15px;
            border-radius: 5px;
            letter-spacing: 1px;
            text-decoration: none;
            font-size: 18px;
            font-weight: 500;
            transition: all 0.3s ease;
            }
            nav ul li a.active,
            nav ul li a:hover{
            color: #111;
            background: rgb(255, 255, 255);
            }
        </style>    
    </head>
    <body>
    <header>
        <nav>
            <div class="logo">
                <img src="FINBANK ONLINE.png">
            </div>  
            <ul class="active">
                <li class="<?php echo $paginas == 'inicio' ? 'active':'';?>"><a href="?p=inicio">Inicio</a></li>
                <li class="<?php echo $paginas == 'productosyservicios' ? 'active':'';?>"><a href="?p=productosyservicios">Productos y Servicios</a></li>
                <li class="<?php echo $paginas == 'promociones' ? 'active':'';?>"><a href="?p=promociones">Promociones</a></li>
                <li class="<?php echo $paginas == 'login' ? 'active':'';?>"><a href="?p=login">Banca Online</a></li>
            </ul>      
        </nav>
    </header>
    </body>
</html>
