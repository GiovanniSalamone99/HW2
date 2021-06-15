@routes
<!DOCTYPE html>
<html>

  <head>
    @include('layouts.head')
    <script src="{{asset('js/script_preferiti.js')}}" defer="true"></script>
  </head>

  <body>

    <header>
        @include('layouts.header') 
    </header>

    <section>
          <div id="ricerca">
              <h1>Preferiti</h1>
          </div>

          <div class="highlights">
            
          </div>

          <p id="risultato" class="hidden">Non hai ancora nessun preferito.</p>
    </section>

    @include('layouts.footer')

  </body>

</html>