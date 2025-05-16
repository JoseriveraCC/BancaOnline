<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <meta charset="UTF-8">
        <title>
            DINERS CLUB
        </title>
        <style type="text/css">
             @import url(https://fonts.googleapis.com/css?family=Roboto:300,400);
@import url(https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css);
:root {
  --surface-color: #fff;
  --curve: 40;
}

* {
  box-sizing: border-box;
}

body {
  font-family: "Noto Sans JP", sans-serif;
  background-color: #fef8f8;
}

.cards {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
  gap: 2rem;
  margin: 4rem 5vw;
  padding: 0;
  list-style-type: none;
}

.card {
  position: relative;
  display: block;
  height: 100%;
  border-radius: calc(var(--curve) * 1px);
  overflow: hidden;
  text-decoration: none;
}

.card__image {
  width: 100%;
  height: 90%;
}

.card__overlay {
  position: absolute;
  bottom: 0;
  left: 0;
  right: 0;
  z-index: 1;
  border-radius: calc(var(--curve) * 1px);
  background-color: var(--surface-color);
  transform: translateY(100%);
  transition: 0.2s ease-in-out;
}

.card:hover .card__overlay {
  transform: translateY(0);
}

.card__header {
  position: relative;
  display: flex;
  align-items: center;
  gap: 2em;
  padding: 2em;
  border-radius: calc(var(--curve) * 1px) 0 0 0;
  background-color: var(--surface-color);
  transform: translateY(-100%);
  transition: 0.2s ease-in-out;
}

.card__arc {
  width: 80px;
  height: 80px;
  position: absolute;
  bottom: 100%;
  right: 0;
  z-index: 1;
}

.card__arc path {
  fill: var(--surface-color);
  d: path("M 40 80 c 22 0 40 -22 40 -40 v 40 Z");
}

.card:hover .card__header {
  transform: translateY(0);
}

.card__thumb {
  flex-shrink: 0;
  width: 50px;
  height: 50px;
  border-radius: 50%;
}

.card__title {
  font-size: 1em;
  margin: 0 0 0.3em;
  color: #6a515e;
}

.card__tagline {
  display: block;
  margin: 1em 0;
  font-family: "MockFlowFont";
  font-size: 0.8em;
  color: black;
}

.card__status {
  font-size: 0.8em;
  color: black;
}

.card__description {
  padding: 0 2em 2em;
  margin: 0;
  color: black;
  font-family: 'Space Mono', monospace;
  display: -webkit-box;
  -webkit-box-orient: vertical;
  -webkit-line-clamp: 3;
  overflow: hidden;
}


/* Demo purposes only */

body {
  background-color: #212121;
  text-align: center;
}
</style>    
    </head>
    <body>
    <ul class="cards">
      <li>
        <a class="card">
          <img src="https://images.unsplash.com/photo-1637262448017-0fbbec87a898?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80" class="card__image" alt="" />
          <div class="card__overlay">
            <div class="card__header">
              <svg class="card__arc" xmlns="http://www.w3.org/2000/svg"><path /></svg>                     
              <img class="card__thumb" src="https://cdn-icons-png.flaticon.com/512/5968/5968148.png" alt="" />
              <div class="card__header-text">
                <h3 class="card__title">Credito/Debito</h3>            
                <span class="card__status">*Cada 100 puntos son Q10</span>
              </div>
            </div>
            <p class="card__description">Al utilizar cualquiera de nuestras tarjetas obtendras puntos que podras canjear en las tiendas que mas te gusten.</p>
          </div>
        </a>      
      </li>
      <li>
        <a  class="card">
          <img src="https://images.unsplash.com/photo-1566997560041-002fd549180b?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1169&q=80" class="card__image" alt="" />
          <div class="card__overlay">        
            <div class="card__header">
              <svg class="card__arc" xmlns="http://www.w3.org/2000/svg"><path /></svg>                 
              <img class="card__thumb" src="https://cdn-icons-png.flaticon.com/512/5968/5968148.png" alt="" />
              <div class="card__header-text">
                <h3 class="card__title">Descuentos</h3>
                <span class="card__status"></span>
              </div>
            </div>
            <p class="card__description">Cuando pagues con nuestras tarjetas en nuestras tiendas seleccionadas puedes obtener hasta un 30% de descuento!</p>
          </div>
        </a>
      </li>
      <li>
        <a class="card">
          <img src="https://images.unsplash.com/photo-1506654013677-20cac9a8a9e9?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=723&q=80" class="card__image" alt="" />
          <div class="card__overlay">
            <div class="card__header">
              <svg class="card__arc" xmlns="http://www.w3.org/2000/svg"><path /></svg>                     
              <img class="card__thumb" src="https://cdn-icons-png.flaticon.com/512/5968/5968148.png" alt="" />
              <div class="card__header-text">
                <h3 class="card__title">Aerolineas</h3>     
              </div>
            </div>
            <p class="card__description">Puedes utilizar los puntos acumulados en cualquier aerolinea que desees para disfrutar de un viaje extraordinario.</p>
          </div>
        </a>
      </li>  
  </ul>    
    </body>
</html>