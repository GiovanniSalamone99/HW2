@routes
<!DOCTYPE html>
<html>
  <head>
    @include('layouts.head')
    <script src="{{asset('js/validazione_iscrizione.js')}}" defer="true"></script>
  </head>
  <body>
    <header>
      <nav>
        <div id="logo">
          <img src="img/logo.jpg" >
        </div>
        <div id="links">
          <a href="http://localhost/fantacalcio-app/public/podcast"><img src="img/Spotify_icon.png" id="spotify"></a>
          <a href="http://localhost/fantacalcio-app/public/home">Home</a>
          <a href="http://localhost/fantacalcio-app/public/highlights">Highlights</a>
          <button class='button' onclick='accedi()'>Accedi</button>
        </div>
		    <div id="menu">
          <div></div>
          <div></div>
          <div></div>
        </div>
      </nav>

    </header>
    

    <section>
        
      <div id="iscriviti">

          <img src="https://content.fantacalcio.it/web/img/logo-fantacalcio.png" >

          <form action="" name="iscriviti2" method="POST">
          @csrf 
                <label>Nome</label><br>
                <input type="text" name="nome" value="{{ old('nome') }}" pattern="[A-Za-z ]{2,20}$" title="Il nome deve contenere solo lettere, deve avere una lunghezza minima di 2 e massima di 20">
              <br>
                <label>Cognome</label><br>
                <input type="text" name="cognome" value="{{ old('cognome') }}" pattern="[A-Za-z ]{2,20}$" title="Il cognome deve contenere solo lettere, deve avere una lunghezza minima di 2 e massima di 20">
              <br>
                <label id="username_label">Username</label><br>
                <input type="text" id="username" name="username" value="{{ old('username') }}" pattern="[A-Za-z0-9]{6,20}$" title="L'username deve contenere solo caratteri alfanumerici, deve avere una lunghezza minima di 6 e massima di 20">
              <br>
                <label>Password</label><br>
                <div class="password"><input type="password" name="password" id="password" value="{{ old('password') }}" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,20}$" title="La password deve contenere minimo 8, massimo 20 caratteri tra cui: una lettera maiuscola, una minuscola, un numero e un carattere speciale">
                <button class="submit" id="visible"></button></div>
                <br>
              
                <input type="submit" name="iscrizione" id="iscrizione" value="Iscriviti"  disabled>
          </form>          
      </div>
    
    </section>

    @include('layouts.footer')
  </body>
</html>
