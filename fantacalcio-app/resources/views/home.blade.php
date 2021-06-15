@routes

  <head>
    @include('layouts.head')
    <script src="{{asset('js/ultime_news.js')}}" defer="true"></script>
  </head>
  <body>
    <header class="head">
      <nav>
        <div id="logo">

        </div>
        
        <div id="links">
          <a href="http://localhost/fantacalcio-app/public/podcast"><img src="img/Spotify_icon.png" id="spotify"></a>
          <a href="http://localhost/fantacalcio-app/public/home">Home</a>
          <a href="http://localhost/fantacalcio-app/public/highlights">Highlights</a>
            @if($user['username'] != null)
              <a href='http://localhost/fantacalcio-app/public/squadra'>Squadra</a>
              <a href='http://localhost/fantacalcio-app/public/leghe'>Leghe</a>
              <div class='dropdown'>
                      <button onclick='showTendina()' class='button' >{{$user['username']}}</button>
                      <div id='myDropdown' class='dropdown-content'>
                        <a href='http://localhost/fantacalcio-app/public/preferiti'>Preferiti <img id='preferiti' src='img/star.png'></a>
                        <a href='http://localhost/fantacalcio-app/public/logout'>Logout <img id='logout' src='img/logout.png'></a>
                      </div>
              </div>
            @else
            <button class='button' onclick='accedi()'>Accedi</button>
            @endif
        </div>
	  	<div id="menu">
          <div></div>
          <div></div>
          <div></div>
        </div>
    </nav>

    </header>
    

    <section>
        
      <div id="main">
        <h1>Benvenuto su LEGHE FANTACALCIO</h1>
        <p>Qui potrai creare la tua squadra e competere nelle migliori leghe di fantacalcio.</p>
      </div>

      <div id="details">
          <div>
            <img src="img/leghe.jpg" />
            <h1>LEGHE</h1>
            <p>
             Ecco qui l'elenco delle leghe già presenti all'interno della nostra app.
            </p>
          </div>
          <div>
            <img src="img/tutorial.jpg" />
            <h1>INIZIA</h1>
            <p>
            Scopri come creare la tua lega ed iniziare a competere con i tuoi amici.
            </p>
          </div>
      </div>

      <div id="ultime_news">
        <p>Ultime news </p>
      </div>
      
        <div id="news">
              
        </div>
    
    </section>

    @include('layouts.footer')
  </body>
</html>



