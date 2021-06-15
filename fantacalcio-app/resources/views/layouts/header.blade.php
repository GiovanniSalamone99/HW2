        <nav>
            <div id="logo">
            <img src="img/logo.jpg" >
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
 